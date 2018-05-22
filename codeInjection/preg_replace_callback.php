<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./css/result.css" rel="stylesheet">
        <link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
        <title>代码执行(preg_replace_callback)</title>
    </head>
    <body>
        <a href='../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <h1>preg_replace_callback函数造成的代码执行漏洞</h1>
        <?php
            $pattern = $_GET['pattern'];
            $callback = $_GET['callback'];
            $subject = $_GET['subject'];
            //$callback = "echo 'should return<br />';return 'callback';";
            eval("function func(){".$callback."}");
            echo "<h2>替换之前:</h2>";
            echo "<h2>$subject</h2>";
            echo "<h2>替换结果:</h2>";
            echo "<h2>".preg_replace_callback("/".$pattern."/",func,$subject)."</h2>";

            //执行代码的示例
            //preg_replace_callback.php?pattern=lambda&callback=return+system('ls');&subject=hhh,lambda,jjj&submit=submit
        ?>
        <p><a href='preg_replace_callback.html' style='color:yellow;'>再试一次&#160<i class='fas fa-undo'></i></a></p>
    </body>
</html>