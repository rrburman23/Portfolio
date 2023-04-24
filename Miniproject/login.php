<?php
 include("config.php");
 session_start();

 $uname = $_POST["username"];
 $pwd = $_POST['pswrd'];

 //prevent from mysqli injection
$uname = stripcslashes($uname);
$pwd = stripcslashes($pwd);  
$uname = mysqli_real_escape_string($conn, $uname);  
$pwd = mysqli_real_escape_string($conn, $pwd);  

 $hashPwd = password_hash($pwd, PASSWORD_DEFAULT);


 $sql = "SELECT * FROM accounts WHERE uname ='$uname' AND pwd = '$pwd'";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $uname;
         
         header("location: viewBlog.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }

?>