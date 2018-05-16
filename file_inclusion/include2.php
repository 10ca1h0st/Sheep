<?php
$file = $_GET['file'];
$path = substr($_SERVER['SCRIPT_FILENAME'],0,strrpos($_SERVER['SCRIPT_FILENAME'],'/'));


if(is_file($path.'/upload/'.$file.'.php')){
    include $path.'/'.$file.'.php';
}

?>