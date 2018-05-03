<?php
$file = $_GET['file'];
if (file_exists($file)){
//include '/var/www/html/file_inclusion/'.$file.'.php';
    include $file;
}
?>