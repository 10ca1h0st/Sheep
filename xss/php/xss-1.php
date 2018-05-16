<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<title>XSS-1</title>
</head>
<body>
<h1>最基本的XSS</h1>
<form action="xss-1.php" method="get">
<input type="text" name="xss_input" placeholder="这里填写的内容会在下面显示">
<input type="submit" value="显示">
</form>
<hr>
<?php
$xss = $_GET['xss_input'];
echo '你所输入的字符为:'.($xss?$xss:"你所输入的内容");

echo "<!--绕过方法:<script>alert('xss')</script>-->";
?>
<br/><br/><br/>
<a href="xss-2.php">下一关</a>
</body>
</html>

	