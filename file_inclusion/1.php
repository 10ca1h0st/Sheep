<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./result.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<title>无验证的文件上传漏洞</title>
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
	echo "上传成功。";
}
echo "<p>文件路径如下:<br/><p><strong>$des_addr</strong></p>";

?>
<br /><br /><br />
<h2>开始文件包含漏洞实战演练</h2>
<a class="btn btn-info" href="forinclude1.php">无限制的文件包含漏洞</a>
<a class="btn btn-info" href="forinclude2.php">限制路径的文件包含漏洞</a>
</body>
</html>
