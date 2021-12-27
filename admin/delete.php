<?php 
include("connect.php");



if (isset($_GET['delete'])) {
	$id = $_GET['delete'];

	$qry = "DELETE FROM product WHERE id = $id";
	$res = $con->query($qry) or die('bad query');
	header("location:all_product.php");
}
?>