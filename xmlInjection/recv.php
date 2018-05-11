<?php
    $data = $_GET['data'];
    $fp = fopen("data","w") or die("can not open file");
    fwrite($fp,$data);
    fclose($fp);
?>