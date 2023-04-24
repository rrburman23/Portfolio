<?php
session_start();
if(!isset($_SESSION['senduname'])|| $_SESSION['loggedin']!=true){
    header(location: login.html);
}
echo "Welcome ".$_SESSION['senduname'];