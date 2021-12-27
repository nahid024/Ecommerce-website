 

<?php
	 session_start();
	 
	$input2=$_POST['email'];
	$pas=$_POST['password'];
 
	 
 

	$user = 'root';
	$pass = '';
	$db = 'ecommerce_site';
	
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
	 

	$qry = "select * from user where email='$input2' and password='$pas'";
	 
	$res = $db_connect->query($qry) or die('bad query');
	if($res->num_rows>0){
		header("location:user_registration_form.php");
		//$_SESSION["std"] ='$input3';
		
	}
	 

	 
?>
 
 