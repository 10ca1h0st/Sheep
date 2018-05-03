<?php
$file = $_GET['file'];
if (is_file($file)){
    include $file;
}
?>