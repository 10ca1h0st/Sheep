<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<title>文件包含漏洞</title>
</head>
<body>
<a href='../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;background-color:transparent;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
<?php
$file = $_GET['file'];
$path = substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],'/'));

if(is_file($path.'/upload/'.$file.'.php')){
    include $path.'/upload/'.$file.'.php';
}

?>
</body>
</html>