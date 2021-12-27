<?php 
include("connect.php");



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$qry = "DELETE FROM category WHERE id = $id";
	$res = $con->query($qry) or die('bad query');
	header("location:all_category.php");
}
?>