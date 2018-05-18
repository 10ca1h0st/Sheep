<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>服务端文件扩展名检测的文件上传漏洞</title>
</head>
<body>
<?php
//var_dump($_FILES['file']);
echo "<br />";
$filename = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];
$des = "./upload/".$filename;
$file_ext = substr(strrchr($filename, '.'), 1);
//echo substr(strrchr($filename, '.'), 1);
//$file_ext = substr($filename, strrpos($file, '.')+1);




//白名单
/*
$type = array("png","gif","jpg","jpeg");

if(in_array($file_ext, $type)){
	copy($tmp_name,$des);
	//move_uploaded_file($tmp_name,$des_addr/$filename);
	if ($error == 0 ){
		echo "上传成功。";
	}
	echo ("<img src = $des width='500' height='300'  /> ");
}
else {
	echo "请选择正确类型的文件！";
}
*/


//黑名单
$type = array("php","php3");
if(in_array($file_ext,$type)){
	echo "请选择正确类型的文件！"."<br/>";
	exit();
}
//copy($tmp_name,$des);
move_uploaded_file($tmp_name,$des);
if ($error == 0){
	echo "上传成功。"."<br />";
}
echo ("<img src = $des /> ");
?>
</body>
</html>
