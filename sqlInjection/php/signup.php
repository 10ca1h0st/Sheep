<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
    </head>

    <body>
    <?php
        $username=$_GET['username'];
        $password=$_GET['password'];
        $realname=$_GET['realname'];

        if(!get_magic_quotes_gpc()){
            $username=addslashes($username);
            $password=addslashes($password);
            $realname=addslashes($realname);
        }

        if (!$username||!$password||!$realname){
            echo "You have not entered username,password or realname.Please go back and try again.";
            exit();
        }

    if (preg_match("/^.*((union)|(select)|\'|\-|#|insert|update|delete)+.*$/",$username)){
            echo "Please don't use quotes,'union','select','insert','update' or 'delete' as your username!";
            exit();
    }

        @ $db=new mysqli('localhost','root','971018','users');
        $db->query("set names 'utf8'");
        if (mysqli_connect_errno()){
            echo "Error:database connect failed,please try again later.";
            exit();
        }

        $query1="select * from user where username='".$username."'";
        $result=$db->query($query1);
        $num_results=$result->num_rows;

        if ($num_results){
            echo "You input the username '".$username."' already exists,please re-entry";
            exit();
        }


        $query2="INSERT INTO `user` (`username`, `password`) VALUES ('".$username."','".$password."')";


        echo $db->error;
        if (!$db->errno){
            echo "Registration successful!";
        }
        else{
            echo "Error:Register failed,please try again.";
            exit();
        }

        $result->free();
        $db->close();
    ?>
    </body>
</html>