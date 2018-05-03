<?php
$file = $_GET['file'];
if(file_exists('/var/www/html/file_inclusion/'.$file.'.php')){
    include'/var/www/html/file_inclusion/'.$file.'.php';
}