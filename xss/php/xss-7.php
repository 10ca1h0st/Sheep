<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/result.css" rel="stylesheet">
<link href="../../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<title>XSS-7</title>
</head>
<body>
<a href='../../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
<br /><br /><br /><br /><br />
<h1>使用img标签的onerror属性实现XSS</h1>
<form action="" method="get" >
<input type="text" name="xss_input" placeholder="想要显示的图片(比如:xss.jpg)"/>
<input type="submit"  value="显示"/>
</form>
<button onclick="help()" style="background-color:transparent;border:none;">
    <i class='far fa-question-circle' style='font-size:15px;color:white;'></i><span style='color:white;'>帮助</span>
</button>
<br /><br />
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
<div style='position: absolute;top:100px;left:20px;'>
    <div class="dropdown">
        <button class="btn btn-outline-dark dropdown-toggle" style="font-size:20px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            关卡列表
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="xss-1.php" class="dropdown-item" style="color:green;">最基本的XSS</a>
            <a href="xss-2.php" class="dropdown-item" style='color:green;'>闭合标签的XSS</a>
            <a href="xss-3.php" class="dropdown-item" style="color:green;">循环过滤关键字的XSS(大小写敏感)</a>
            <a href="xss-4.php" class="dropdown-item" style="color:green;">过滤关键字的XSS(大小写不敏感)</a>
            <a href="xss-5.php" class="dropdown-item" style="color:green;">过滤单引号和双引号的XSS</a>
            <a href="xss-6.php" class="dropdown-item" style="color:green;">使用htmlspecialchars函数过滤输入的XSS</a>
            <a href="xss-7.php" class="dropdown-item" style="color:gray;">使用img标签的onerror属性实现XSS</a>
            <a href="xss-impossible.php" class="dropdown-item" style="color:green;">无法绕过产生XSS</a>
        </div>
    </div>
</div>
<script src="../../jquery.js"></script>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>

<script>

    function help(){
        alert("绕过方法:no.jpg' onerror='alert(\"xss\");");
    }

</script>
</body>
</html>