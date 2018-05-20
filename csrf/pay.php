<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>不验证Cookie的CSRF</title>
</head>
<body>
<h1>不验证Cookie的CSRF</h1>
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
        echo '<h2>恭喜! 攻击者成功地通过CSRF攻击攻击了受害者。:):):)</h2>';
    }

    /**
     * the way to attack victim by csrf
     * http://localhost[:port]/Sheep/practice/csrf/pay.php?to=attacker&money=1&pay=pay
     */


?>
</body>
</html>