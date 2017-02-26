<?php
session_start();
$con=mysql_connect("localhost:3306","root","");
if(!$con){
    die('Clould not connect:'.mysql_errno());
}


$salt = 'left';
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string(md5($salt.$_POST['password']));
$checkNum = $_POST["checkNum"];
mysql_select_db("mysql",$con);
$feedback = "账户密码错误";

if($checkNum==$_SESSION["validcode"]){

   $SQL="select username from login where username='$username' and password='$password'"; 
   $result=mysql_query($SQL);
   $rows=mysql_num_rows($result);
   if($rows!==1){
       echo $feedback;
   }
   else{
   $_SESSION["admin"]=true;
   setcookie("username", $username);    
   header("location: main.php");
   }
}
?>
