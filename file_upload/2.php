<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>Content-Type字段校验的文件上传漏洞</title>
</head>
<body>
<?php
//var_dump($_FILES['file']);
//echo "<br />";
$filename = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];
$type = $_FILES['file']['type'];
if($type != "image/png" && $type != "image/gif" && $type != "image/bmp" && $type != "image/jpeg" && $type != "image/pjpeg" && $type != "image/x-png"){
	echo "请选择正确类型的文件！"."<br />";
	exit;
}
//$des_addr = "../uploads";
$des_addr = "./upload/".$filename;
//copy($tmp_name,$des_addr);
move_uploaded_file($tmp_name,$des_addr);
if (error == 0 ){
        echo "上传成功。";
}
echo ("<img src = $des_addr width='500' height='300'  /> ");
?>
</body>
</html>
