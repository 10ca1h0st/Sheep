<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-Impossible</title>
</head>
<body>
<form action="xss-impossible" method="get">
<input type="text" name="xss_input">
<input type="submit">
</form>
<hr>
<?php
//impossible
function xss_filter($xss) {
	while(str_ireplace("<script>","",$xss)!=$xss) {
		$xss=str_ireplace("<script>","",$xss);
	}
	while(str_ireplace("</script>","",$xss)!=$xss) {
		$xss=str_ireplace("</script>","",$xss);
	}
	$xss=str_replace("'","",$xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace("/","",$xss);
	$xss=str_replace("`","",$xss);
	$xss=str_replace("<","&#60;",$xss);
	$xss=str_replace(">","&#62;",$xss);
	
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo '你输入的字符为<br>'.$xss;
//answer:
?>
</body>
</html>

	