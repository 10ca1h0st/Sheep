<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<link href="../fontawesome/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">
<title>验证Cookie的CSRF</title>
</head>
<body>
<a href='../index.html' style='position:absolute;top:20px;left:20px;text-decoration:none;color:white;'><i class='fas fa-home' style='font-size:20px;'></i>&#160Home</a>
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<h1>验证Cookie的CSRF</h1>
<?php

    @ $username = addslashes($_GET['username']);
    @ $password = addslashes($_GET['password']);

    $config = fopen("../configure",'r');
    $config_username =  ltrim(rtrim(fgets($config)));
    $config_password = ltrim(rtrim(fgets($config)));
    $config_username = substr($config_username,strpos($config_username,':')+1);
    $config_password = substr($config_password,strpos($config_password,':')+1);
    

    
    @ $db=new mysqli('localhost',$config_username,$config_password,'Sheep');
    if (mysqli_connect_errno())
    {
        die("Error:Could not connect to database,please try again later");
    }

    $query = "select * from csrf where username='"."$username' and password='"."$password'";
    $result=$db->query($query);
    $num_result=$result->num_rows;
    if($num_result != 1){
        die('login failed');
    }

    session_start();

?>
<form action="pay_medium.php" method="post">
    <p>转账对象:<input type="text" name="to" size="40" /></p>
    <p>转账金额:<input type="text" name="money" size="40" /></p>
    <input type="submit" name="pay" value="转账" />
</form>
</body>
</html>