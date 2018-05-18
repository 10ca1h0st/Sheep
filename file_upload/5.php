<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>JS验证的文件上传漏洞</title>
</head>
<body>
<?php
//var_dump($_FILES['file']);
echo "<br />";
$filename = $_FILES['upfile']['name'];
$tmp_name = $_FILES['upfile']['tmp_name'];
$error = $_FILES['upfile']['error'];
//$des_addr = "../uploads";
$des_addr = "./upload/".$filename;
//copy($tmp_name,$des_addr);
move_uploaded_file($tmp_name,$des_addr);
if (error == 0 ){
        echo "上传成功。"."<br />";
    }
    echo ("<img src = $des_addr /> ");
    ?>
</body>
</html>
