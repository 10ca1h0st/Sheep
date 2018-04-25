<?php
    
    echo '<h1>CSRF</h1>';

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

<html>
    <head><title>Victim</title></head>
    <body>
        <form action="pay.php" method="get">
            <p>to:<input type="text" name="to" size="40" /></p>
            <p>money:<input type="text" name="money" size="40" /></p>
            <input type="submit" name="pay" value="pay" />
        </form>
    </body>
</html>