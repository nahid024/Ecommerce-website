<?php 
ob_start();
session_start();
include('header.php');
include ('connect.php');
 if(!isset($_SESSION['username'])){

   header("Location:user_login.php");
}
else {
  
echo "nahid";
 
}
ob_end_flush();
?>