<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/result.css" rel="stylesheet"> 
<title>XSS-Impossible</title>
</head>
<body>
<h1>无法绕过产生XSS</h1>
<form action="xss-impossible" method="get">
<input type="text" name="xss_input" placeholder="这里填写的内容会在下面显示">
<input type="submit" value="显示">
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
	$xss = htmlspecialchars($xss);
	$xss=str_replace("'","",$xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace("/","",$xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace("<","&#60;",$xss);
	$xss=str_replace(">","&#62;",$xss);
	
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo '你所输入的字符为:'.($xss?$xss:"你所输入的内容");

?>
</body>
</html>

	