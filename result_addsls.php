<html>
<head>
    <title>Information</title>
    <meta charset="GBK"/>
</head>

<body>
<h1>Your informations:<br /></h1>
<?php
$username=$_GET['username'];
$password=$_GET['password'];

if(!$username||!$password)
{
    echo "You have not entered username or password. Please go back and enter both of them.";
    exit;
}

        if(!get_magic_quotes_gpc())
        {
            $username=addslashes($username);
            $password=addslashes($password);
        }

@ $db=new mysqli('localhost','root','971018','users');

if (mysqli_connect_errno())
{
    echo "Error:Could not connect to database,please try again later";
}

$charset="set names 'GBK'";
$db->query($charset);

$query="select id,username,password,realname from user where username='".$username."' and password='".$password."'";
$result=$db->query($query);
$num_result=$result->num_rows;

if (!$num_result){
    echo "Your username or password is wrong.Please go back and enter again.";
    exit;
}

echo " <table border=\"1\" width=\"4\">
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>PASSWORD</th>
                    <th>REALNAME</th>
                </tr>";

for ($i=0;$i<$num_result;$i++){
    $result_info=$result->fetch_assoc();
    echo "<tr>
                   <td>".$result_info['id']."</td>
                   <td>".$result_info['username']."</td>
                   <td>".$result_info['password']."</td>
                   <td>".$result_info['realname']."</td>
                   </tr>";
}

echo "</table>";
$result->free();
$db->close();
?>
</body>
</html>