<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   header("location: viewBlog.php");
   exit;
}
 require_once "config.php";

$uname = mysqli_real_escape_string($conn, $_POST["username"]);  
$pwd = mysqli_real_escape_string($conn, $_POST['pswrd']);  
$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

 $sql = "SELECT * FROM accounts WHERE uname = '$uname' AND pwd = '$pwd'";
 $result = mysqli_query($conn, $sql);

 $count = mysqli_num_rows($result);

 //echo $count;  

 if ($count == 0 || !(password_verify($pwd,$hashPwd))){
   echo "Details inccorect. Please try again";
   header("location: viewBlog.php");
 }
 else{
   session_start();
   $_SESSION['loggedin'] = true;
   $_SESSION['senduname']=$uname;
   header("location: viewBlog.php");
 }    
     
?>