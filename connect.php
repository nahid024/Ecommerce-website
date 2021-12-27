<?php
	// $input=$_POST['firstname'];
	// $input1=$_POST['lastname'];
	// $input2=$_POST['email'];
	// $pas=md5($_POST['password']);
	// // $repass=md5($_POST['retypepassword']);
	// $phn=$_POST['phone'];
	
	 
	
	// $user = 'root';
	// $pass = '';
	// $db = 'ecommerce_site';
	
	// $db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');

 //    if ($db_connect->connect_error) {
 //    die("Connection failed: " . $db_connect->connect_error);
 //    } 

$con = mysqli_connect("localhost","root","","ecommerce_site");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

    //echo "Registration successfully";
	 
	
	 
	// $sql="insert into user values(' ','$input','$input1','$input2','$pas','$phn')";
	// $res = $db_connect->query($sql) or die('bad query');
	 
?>
 