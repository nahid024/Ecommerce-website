
<?php
 session_start();
 if(!isset($_SESSION['username'])){
  
    header("location:index.php");
}
else{
include('header.php');

 ?>
 
<?php
// include('fotter.php');
}
?>