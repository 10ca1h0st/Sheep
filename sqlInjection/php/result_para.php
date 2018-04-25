<html>
<head>
    <title>Information</title>
    <meta charset="GBK"/>
</head>

<body>
<h1>Your informations:<br /></h1>
<?php
$username=$_POST['username'];
$password=$_POST['password'];

if(!$username||!$password)
{
    echo "You have not entered username or password. Please go back and enter both of them.";
    exit;
}

/*        if(!get_magic_quotes_gpc())
        {
            $username=addslashes($username);
            $password=addslashes($password);
        }
*/
@ $db=new mysqli('localhost','root','971018','users');

if (mysqli_connect_errno())
{
    echo "Error:Could not connect to database,please try again later";
}

$db->prepare('set names \'GBK\'');
$stmt = $db->prepare('select * from user where username=? and password=?');
$stmt->bind_param('ss', $username,$password);

$stmt->execute();

$result = $stmt->get_result();

//$charset="";
//$db->query($charset);

//$query="select id,username,password,realname from user where username='".$username."' and password='".$password."'";
//$result=$db->query($query);
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

for($i=0;$i<$num_result;$i++){
    $result_info=$result->fetch_assoc();
    echo "<tr>
                   <td>".$result_info['id']."</td>
                   <td>".$result_info['username']."</td>
                   <td>".$result_info['password']."</td>
                   <td>".$result_info['realname']."</td>
           </tr>";
}
echo "</table>";
$stmt->close();
$result->free();
$db->close();

if ($num_result>1) {
    echo "
            <button id=\"btn\">
        Congratulations!You have succeed!
    </button>";
}
?>

<script>
    function event() {
        window.location.href='test.php';
    }

    btn.addEventListener("click",event)
</script>
</body>
</html>