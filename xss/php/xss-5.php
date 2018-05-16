<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<title>XSS-5</title>
</head>
<body>
<h1>过滤单引号和双引号的XSS</h1>
<form action="xss-5.php" method="get">
<input type="text" name="xss_input" placeholder="这里填写的内容会在下面显示">
<input type="submit" value="显示">
</form>
<hr>
<?php
//转义过滤引号
function xss_filter($xss) {
	$xss=str_ireplace("<script>","",$xss);
	$xss=str_ireplace("</script>","",$xss);
	$xss=str_replace("'","",$xss);
	$xss=str_ireplace("\"","",$xss);
	$xss=str_replace(";","",$xss);
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo '你所输入的字符为:'.($xss?$xss:"你所输入的内容");

echo "<!--绕过方法:<scr<script>ipt>alert(String.fromCharCode(88,83,83));</s</script>cript>-->";
?>
<br/><br/><br/>
<a href="xss-6.php">下一关</a>
</body>

</html>