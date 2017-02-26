<?php 
session_start(); 
if(isset($_COOKIE['username'])) 
{ 
    $con=mysql_connect("localhost:3306","root","");
    if(!$con){
      die('Clould not connect:'.mysql_errno());
    }
    mysql_select_db("mysql",$con);    

    $username = $_COOKIE['username'];
    
    $feedback = "false";


    $SQL="select * from login where username='$username'"; 
    $result=mysql_query($SQL);
    $rows=mysql_num_rows($result);
    if($rows==1){
    $feedback="success"; 
// echo "<a href="logout.php" href="logout.php">注销</a>"; 
    } 
}
echo $feedback;
?> 