// <?php


session_start();
$salt = 'left';
$username = mysql_real_escape_string($_POST["username"]);
$password = mysql_real_escape_string(md5($salt.$_POST['password']));
$checkNum = $_POST["checkNum"];
$feedback = "注册失败";

if($checkNum==$_SESSION["validcode"]){
    $con=mysql_connect("localhost:3306","root","");

    if(!$con){
    die('Clould not connect:'.mysql_errno());
    }
    mysql_select_db("mysql",$con); 

    $SQL="select * from login where username='$username'";
    $result=mysql_query($SQL);
    $rows=mysql_num_rows($result);
    if($rows>=1){  
        $feedback="该用户已经存在";
    }                                                        
    else{  
        $sql_insert = "insert into login (username,password) 
        values ("."'$username',"."'$password')" ;  
                    $res_insert = mysql_query($sql_insert);   
                    if($res_insert)  
                    {  
                       $feedback="注册成功";  
                    }  
                    else  
                    {  
                       $feedback="注册失败";  
                    }  
                }  
}

echo $feedback;
mysql_close();
?>