<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<title>XSS-6</title>
</head>
<body>
<center>
<h1>使用htmlspecialchars函数过滤输入的XSS</h1>
<br />
<h4>把我们输入的字符串 输出到input里的value属性里</h4>
<form action="" method="get">
<h4>请输入你想显示的字符串</h4>
<input type="text" name="xss_input_value" placeholder="输入"><br>
<input type="submit" value="显示">
</form>
<hr>
<?php
$xss = $_GET['xss_input_value'];
function xss_filter($xss) {
	$xss=htmlspecialchars($xss);
	Return $xss;
}

if(isset($xss)){
	$xss=xss_filter($xss);
	echo $xss;
	echo "<input type='text' value='".$xss."'>";
}else{
	echo '<input type="type" placeholder="输出">';
}

echo "<!--绕过方法:show' onmouseover='alert(\"xss\");   因为htmlspecialchars函数默认不对单引号作处理-->";
?>
</center>
<br/><br/><br/>
<a href="xss-7.php">下一关</a>
</body>
</html>