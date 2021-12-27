<?php 
session_start();
include('header.php');
include('connect.php');
 if (empty($_SESSION['cart'])) {
 	# code...
 	?>
 	<div class="sms">You are not Selected any Item!!!<button class="btn btn-cart btn-info" onclick="location.href='all_product.php'">Countinue Shopping<i class="fas fa-shopping-cart"></i></button></div>

 	<?php
 }
 else{
?>
<!DOCTYPE html>
<html>
<head>
	<title>cart</title>
</head>
<body>
	<div class="container">
		<p class="my-cart text-center mt-4" style="">MY CART</p>
		<div class="row">
		<div class="col-lg-8">
		
		<?php 
			if (isset($_SESSION['cart'])) {
				# code...
					$number = 1;
					 
				?>
				<table class="table table-striped">
					 <thead class="text-center">
							    <tr>
							      <th scope="col">ID No</th>
							      <th scope="col">Image</th>
							      <th scope="col">Title</th>
							      <th scope="col">Item Price</th>
							      <th scope="col">Quantity</th>
							      <th scope="col">Total price</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
				<?php 	
				foreach ($_SESSION['cart'] as $key => $value) {
					# code...
					
					?>
					
							 
							  <tbody class="text-center">
							    <tr>
							      <th scope="row"><?php echo "$number"; ?></th>
							      <td><img class="card-img-top" src='admin/images/product/<?php echo "$value[image]"  ?>' width='50' height='50' alt="Card image cap"></td>
							      <td><?php echo"$value[product_title]"?></td>
							      <td><?php echo"$value[product_price]"?> <input type="hidden" name="price" class="iprice" value="<?php echo"$value[product_price]"?>">   </td>

							      <form action="" method="POST">
							      <td><input type="number" class="text-center iquantity" onclick="this.form.submit()" value="<?php echo"$value[quantity]"?>" name="quantity" min="1" max="5">
							      </td>
							     
							      <input type="hidden" name="item_name" value="<?php echo"$value[product_title]"?>">
								  
								  </form>

							      <td class="itotal">
							        
							      </td>
							      <td>
							      	<form action="" method="POST">
							      	<button class="btn btn-outline-danger" name="remove"><i class="fas fa-trash-alt"></i></button>
							      	<input type="hidden" name="item_name" value="<?php echo"$value[product_title]"?>">
							      	</form>
							      </td>
							    </tr>
							  </tbody>
							
					<?php
					 
					$number = $number+1;
				}
				?>
				</table>
				<?php
			}

		?>
	</div>
	
	<div class="col-lg-4">
	 <div class="border bg-light rounded p-4">

	 	<h6>Sub Total : <span class="taka">Tk.<span class="text-right" style="text-align: right;" id="gtotal"> </span></span></h6>
	 	<h6>Vat(5%) : <span class="taka">Tk.<span id="vat"> </span></span></h6>
	 	<h6>Delivery charge :<span class="taka ml-3">Tk.<?php 
	 	 
	 	 
	 		   // if (isset($_SESSION['dc'])) {
	 		   // 	# code...
	 		   // 	echo $_SESSION['dc'];
	 		   // }
	 		$dc = 150;
	 		echo $dc;
	 		
	  
			?></span></h6>
	 	<h4>Grand Total: <span class="taka">Tk.<span class="text-right" id="stotal"></span></span></h4>
	 	<button class="btn btn-info" onclick="location.href='all_product.php'">Countinue Shopping<i class="fas fa-shopping-cart"></i></button>
	 	<button class="btn btn-shopping btn-info" onclick="location.href='cheackout.php'">Cheack out</button>
	 	
	 </div>
	</div>
 
 
<!-- remove item -->
<?php 
 		if (isset($_POST['remove'])) {
 			# code...
 			foreach ($_SESSION['cart'] as $key => $value) {
 				# code...
 				if ($value['product_title'] == $_POST['item_name']) {
 					# code...
 					unset($_SESSION['cart'][$key]);
 					$_SESSION['cart']=array_values($_SESSION['cart']);
 						echo "<script>
							 	window.location.href='cart.php' ;
							</script>";
 				}
 			}
 		}
 		// update quantity
 		if (isset($_POST['quantity'])) {
 			# code...
 			foreach ($_SESSION['cart'] as $key => $value) {
 				# code...
 				if ($value['product_title'] == $_POST['item_name']) {
 					# code...
 					$_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
 					echo "<script>
						 	window.location.href='cart.php' ;
						 </script>";
 				}
 			}
 		}

?>

<script>
	var gt 			= 0;
	var st 			= 0;
	var vt 			= 0;
	var iprice 		=  document.getElementsByClassName("iprice");
	var iquantity 	=  document.getElementsByClassName("iquantity");
	var itotal 		=  document.getElementsByClassName("itotal");
	// var gtotal 		=  document.getElementsById("gtotal");
	 
	var jsvar 		=<?=$dc?>;
	 

	function subtotal() {
		// body...
		gt = 0;
		for (var i = 0; i < iprice.length; i++) {
			itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
			gt=gt + (iprice[i].value)*(iquantity[i].value);
			vt = (5*gt)/100;
		}
		 gtotal.innerText = gt;
		 stotal.innerText = gt+vt+jsvar;
		 vat.innerText 	  = vt; 
		 
	}
  subtotal();

</script>
</body>
</html>
<?php
}
?>