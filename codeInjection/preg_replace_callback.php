<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>代码执行(preg_replace_callback)</title>
    </head>
    <body>
        <?php
            $pattern = $_GET['pattern'];
            $callback = $_GET['callback'];
            $subject = $_GET['subject'];
            //$callback = "echo 'should return<br />';return 'callback';";
            eval("function func(){".$callback."}");
            echo preg_replace_callback("/".$pattern."/",func,$subject);
        ?>
    </body>
</html>