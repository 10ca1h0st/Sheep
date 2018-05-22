<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<link href="../../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<title>XSS-6</title>
</head>
<body>
<a href='../../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
<br /><br /><br /><br /><br />
<h1>使用htmlspecialchars函数过滤输入的XSS</h1>
<br />
<h4>把我们输入的字符串 输出到input里的value属性里</h4>
<form action="" method="get">
<h4>请输入你想显示的字符串</h4>
<input type="text" name="xss_input_value" placeholder="输入"><br>
<input type="submit" value="显示">
</form>
<button onclick="help()" style="background-color:transparent;border:none;">
    <i class='far fa-question-circle' style='font-size:15px;color:white;'></i><span style='color:white;'>帮助</span>
</button>
<br /><br />
<?php
$xss = $_GET['xss_input_value'];
function xss_filter($xss) {
	$xss=htmlspecialchars($xss);
	Return $xss;
}

if(isset($xss)){
	$xss=xss_filter($xss);
	echo "<input type='text' value='".$xss."'>";
}else{
	echo '<input type="type" placeholder="输出">';
}

echo "<!--绕过方法:show' onmouseover='alert(\"xss\");   因为htmlspecialchars函数默认不对单引号作处理-->";
?>
<div style='position: absolute;top:100px;'>
<table style='text-align:left;' cellspacing="20">
    <tr><th>关卡列表:</th></tr>
    <tr>
        <td><a href="xss-1.php" style='color:yellow;'>最基本的XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-2.php" style='color:yellow;'>闭合标签的XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-3.php" style='color:yellow;'>循环过滤关键字的XSS(大小写敏感)&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-4.php" style='color:yellow;'>过滤关键字的XSS(大小写不敏感)&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-5.php" style='color:yellow;'>过滤单引号和双引号的XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-6.php" style='color:yellow;'>使用htmlspecialchars函数过滤输入的XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-7.php" style='color:yellow;'>使用img标签的onerror属性实现XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
    <tr>
        <td><a href="xss-impossible.php" style='color:yellow;'>无法绕过产生XSS&#160<i class='fas fa-arrow-right'></i></a></td>
    </tr>
</table>
</div>
<script>

    function help(){
        alert("绕过方法:show'"+" onmouseover='alert(\"xss\");");
    }

</script>
</body>
</html>