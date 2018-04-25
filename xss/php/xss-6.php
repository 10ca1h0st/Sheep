<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>XSS-6</title>
</head>
<body>
<center>
<h6>把我们输入的字符串 输出到input里的value属性里</h6>
<form action="" method="get">
<h6>请输入你想显现的字符串</h6>
<input type="text" name="xss_input_value" value="输入"><br>
<input type="submit">
</form>
<hr>
<?php
$xss = $_GET['xss_input_value'];
function xss_filter($xss) {
	$xss=htmlspecialchars($xss);
	$xss=str_replace("\"","",$xss);
	$xss=str_replace("<","&#60;",$xss);
	$xss=str_replace(">","&#62;",$xss);
	Return $xss;
}
$xss=xss_filter($xss);
if(isset($xss)){
echo '<input type="text" value='.$xss.'>';
}else{
echo '<input type="type" value="输出">';
}
#answer:'' onmouseover='alert('xss')'
?>
</center>
</body>
</html>