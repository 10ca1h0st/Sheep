<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="./css/result.css" rel="stylesheet">
        <link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet">
        <title>代码执行(eval)</title>
    </head>
    <body class='text-center'>
        <h1>eval函数造成的代码执行漏洞</h1> 
        <br/>       
        <?php
            $guest = $_GET['guest'];
            $hello = "echo '<h2>hello , ".$guest."</h2>';";
            eval($hello);

            //执行代码的示例:
            //eval.php?guest=';system('ls');//&submit=submit
        ?>
        <br/><br/>
        <a href="preg_replace_callback.html" style='color:yellow;'>preg_replace_callback函数造成的代码执行漏洞&#160<i class='fas fa-arrow-right'></i></a>
    </body>
</html>