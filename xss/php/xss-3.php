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
//替换<script>标签,但大小写敏感
$xss = $_GET['xss_input'];
$xss=str_replace("<script>","",$xss);
$xss=str_replace("</script>","",$xss);
echo '你输入的字符为<br>'.$xss;
//answer:<scRipt>alert('xss')<scRpt)
?>
</body>
</html>

	