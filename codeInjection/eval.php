<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>代码执行(eval)</title>
    </head>
    <body>
        <?php
            $guest = $_GET['guest'];
            $hello = "echo 'hello , $guest';";
            eval($hello);
        ?>
    </body>
</html>