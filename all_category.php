<?php
session_start();
include('header.php');
include('connect.php');
?>

 

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  		<?php 

  			$qry = "select * from category where parent_id = 0 ";
			$res = $con->query($qry) or die('bad query');
			$res->num_rows." "."<br>";

  		?>
  		 
  		<div class="container mt-5 mb-3"> 
  			<div class="row">
  			<?php 

  				while($row = $res->fetch_assoc()) { 

  			?>
				<div class="col-lg-3 col-md-3">
  					<?php $p_image=$row["image"];?>
		  			<div class="card mb-2" style="width: 18rem;">
					  <img class="card-img-top" src='admin/images/product/<?php echo $p_image ?>' width='180' height='180' alt="Card image cap">
					  	<div class="card-body">
					    <h5 class="card-title"> <?php echo $row["title"];?> </h5>
					     
					    <p class="card-text"> <?php echo $row["description"]; ?> </p>
					    <a href="categorical_product.php?cart= <?php echo $row["parent_id"] ?>" title="" class="btn btn-info">VIEW ALL PRODUCT</a>
					  	</div>
					</div>
  				</div>

  			<?php 

				}
			?>
  				
  	 
  		</div>		
</div>
</body>
</html>

<?php
include("fotter.php");
?>