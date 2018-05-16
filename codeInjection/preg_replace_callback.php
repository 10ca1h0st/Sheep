<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./css/result.css" rel="stylesheet">
        <title>代码执行(preg_replace_callback)</title>
    </head>
    <body>
        <h1>preg_replace_callback函数造成的代码执行漏洞</h1>
        <?php
            $pattern = $_GET['pattern'];
            $callback = $_GET['callback'];
            $subject = $_GET['subject'];
            //$callback = "echo 'should return<br />';return 'callback';";
            eval("function func(){".$callback."}");
            echo preg_replace_callback("/".$pattern."/",func,$subject);

            //执行代码的示例
            //preg_replace_callback.php?pattern=lambda&callback=return+system('ls');&subject=hhh,lambda,jjj&submit=submit
        ?>
    </body>
</html>