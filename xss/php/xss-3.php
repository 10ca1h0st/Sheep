<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<title>XSS-3</title>
</head>
<body>
<h1>循环过滤关键字的XSS(大小写敏感)</h1>
<form action="xss-3.php" method="get">
<input type="text" name="xss_input" placeholder="这里填写的内容会在下面显示">
<input type="submit" value="显示">
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
	Return $xss;
}
$xss = $_GET['xss_input'];
$xss=xss_filter($xss);
echo '你所输入的字符为:'.($xss?$xss:"你所输入的内容");

echo "<!--绕过方法:<scRipt>alert('xss');</scRipt>-->";
?>
<br/><br/><br/>
<a href="xss-4.php">下一关</a>
</body>
</html>

	