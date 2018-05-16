<?php
    
    $to = $_GET['to'] or die('');
    $from = $to==='attacker'?'victim':'attacker';
    $money = $_GET['money'] or die('');

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

    $query = "update csrf set money=csrf.money-$money where username='"."$from'";
    $db->query($query);
    $query = "update csrf set money=csrf.money+$money where username='"."$to'";
    $db->query($query);

    $db->close();

    if(strpos($_SERVER['HTTP_REFERER'],'/Sheep/practice/csrf/victim.php') === false){
        echo 'victim has attacked by csrf';
    }

    /**
     * the way to attack victim by csrf
     * http://localhost[:port]/Sheep/practice/csrf/pay.php?to=attacker&money=1&pay=pay
     */


?>