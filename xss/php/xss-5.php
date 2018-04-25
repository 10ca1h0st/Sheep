<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-5</title>
</head>
<body>
<form action="xss-5.php" method="get">
<input type="text" name="xss_input">
<input type="submit">
</form>
<hr>
<?php
//转义过滤引号,`
function xss_filter($xss) {
	$xss=str_ireplace("<script>","",$xss);
	$xss=str_ireplace("</script>","",$xss);
	$xss=str_ireplace("'","",$xss);
	$xss=str_ireplace("\"","",$xss);
	$xss=str_ireplace("`","",$xss);
	$xss=str_replace(";","",$xss);
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo 'You input is<br>'.$xss;
#answer:<scr<script>ipt>alert(String.fromCharCode(88,83,83))</s</script>cript>
?>
</body>

</html>