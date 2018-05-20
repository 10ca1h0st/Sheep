<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<link href="./css/result.css" rel="stylesheet">
<title>验证Cookie的CSRF</title>
</head>
<body>
<h1>验证Cookie的CSRF</h1>
<?php
    if(!isset($_COOKIE['PHPSESSID'])){
        die('<h2>CSRF攻击失败</h2>');
    }
    
    
    $to = $_POST['to'] or die('');
    $from = $to==='attacker'?'victim':'attacker';
    $money = $_POST['money'] or die('');

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

    if(strpos($_SERVER['HTTP_REFERER'],'/Sheep/practice/csrf/victim_medium.php') === false){
        echo '<h2>恭喜! 攻击者成功地通过CSRF攻击攻击了受害者。:):):)</h2>';
    }


?>
</body>
</html>