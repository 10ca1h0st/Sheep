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
<?php
//循环替换<script>标签,但大小写敏感
function xss_filter($xss) {
	while(str_replace("<script>","",$xss)!=$xss) {
		$xss=str_replace("<script>","",$xss);
	}
	while(str_replace("</script>","",$xss)!=$xss) {
		$xss=str_replace("</script>","",$xss);
	}
	$xss=str_replace("'","",$xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace(";","",$xss);
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo '你输入的字符为<br>'.$xss;
//answer:<scRipt>alert(`xss`)</scRipt>
?>
</body>
</html>

	