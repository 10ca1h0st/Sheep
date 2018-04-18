<?php
//var_dump($_FILES['file']);
echo "<br />";
$filename = $_FILES['upfile']['name'];
$tmp_name = $_FILES['upfile']['tmp_name'];
$error = $_FILES['upfile']['error'];
//$des_addr = "../uploads";
$des_addr = "./upload/".$filename;
copy($tmp_name,$des_addr);
//move_uploaded_file($tmp_name,$des_addr/$filename);
if (error == 0 ){
	echo "上传成功。";
}
echo ("<img src = $des_addr width='500' height='300'  /> ");
?>
