<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-3</title>
</head>
<body>
<form action="xss-3.php" method="get">
<input type="text" name="xss_input">
<input type="submit">
</form>
<hr>
<?<?php
//�滻<script>��ǩ,����Сд����
$xss = $_GET['xss_input'];
$xss=str_replace("<script>","",$xss);
$xss=str_replace("</script>","",$xss);
echo '��������ַ�Ϊ<br>'.$xss;
//answer:<scRipt>alert('xss')<scRpt)
?>
</body>
</html>

	