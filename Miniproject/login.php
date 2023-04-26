<?php
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
   header("location: viewBlog.php");
   exit;
}
 require "config.php";

$uname = mysqli_real_escape_string($conn, $_POST["username"]);  
$pwd = mysqli_real_escape_string($conn, $_POST['pswrd']);  
$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

 $sql = "SELECT * FROM accounts WHERE uname = '$uname' AND pwd = '$pwd'";
 $result = mysqli_query($conn, $sql);
 $count = mysqli_num_rows($result);
 $row = mysqli_fetch_assoc($result);

 if ($count >=1){
   echo "Details inccorect. Please try again";
   header("location: viewBlog.php");
 }
 else if ($count ==1 && password_verify($pwd,$hashPwd)){
   session_start();
   $_SESSION["loggedin"] = true;
   $_SESSION["senduname"]= $uname;
   $_SESSION["userType"]=$row['type'];
   header("location: viewBlog.php");
 }
 else{
  echo 'unknown error occured <br>Please contact an admin';
 }
     
?>