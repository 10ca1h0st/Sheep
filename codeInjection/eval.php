<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./css/result.css" rel="stylesheet">
        <link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
        <title>代码执行(eval)</title>
    </head>
    <body>
        <a href='../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
        <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
        <h1>eval函数造成的代码执行漏洞</h1> 
        <br/>       
        <?php
            $guest = $_GET['guest'];
            $hello = "echo '<h2>hello , ".$guest."</h2>';";
            eval($hello);

            //执行代码的示例:
            //eval.php?guest=';system('ls');//&submit=向他打招呼
        ?>
        <br/><br/>
        <p><a href="preg_replace_callback.html" style='color:yellow;'>preg_replace_callback函数造成的代码执行漏洞&#160<i class='fas fa-arrow-right'></i></a></p>
        <p><a href='eval.html' style='color:yellow;'>再试一次&#160<i class='fas fa-undo'></i></a></p>
    </body>
</html>