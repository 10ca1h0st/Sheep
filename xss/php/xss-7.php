<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../css/result.css" rel="stylesheet">
<title>XSS-7</title>
</head>
<body>
<h1>使用img标签的onerror属性实现XSS</h1>
<form action="" method="get" >
<input type="text" name="xss_input" placeholder="想要显示的图片(比如:xss.jpg)"/>
<input type="submit"  value="显示"/>
</form>
<hr/>
<?php
$img = $_GET["xss_input"];
if(isset($img)){
    echo "<img src='../picture/".$img."' />";
}
else{
    echo "<p>在这里显示你要显示的图片</p>";
}

echo "<!--绕过方法:no.jpg' onerror='alert(\"xss\");-->";
?>
<br/><br/><br/>
<a href="xss-impossible.php">下一关</a>
</body>
</html>