<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
<title>开始实战</title>
</head>
<body>
<?php
//var_dump($_FILES['file']);
echo "<br />";
$filename = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$error = $_FILES['file']['error'];
//$des_addr = "../uploads";
$des_addr = "./upload/".$filename;
//copy($tmp_name,$des_addr);
move_uploaded_file($tmp_name,$des_addr);
if (error == 0 ){
	echo "<h2>上传成功</h2>";
	echo "<p>文件路径如下:<br/><p><strong>$des_addr</strong></p>";
	echo "
		<br /><br /><br />
		<h2>开始文件包含漏洞实战演练</h2>
		<p><a class='btn btn-info' href='forinclude1.php' style='color:yellow;'>无限制的文件包含漏洞&#160<i class='fas fa-arrow-right'></i></a></p>
		<p><a class='btn btn-info' href='forinclude2.php' style='color:yellow;'>限制后缀名和路径的文件包含漏洞&#160<i class='fas fa-arrow-right'></i></a></p>
	";
}
else{
	echo "<h2>上传失败</h2>";
}

?>


</body>
</html>
