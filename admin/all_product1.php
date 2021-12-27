<?php
session_start();
if(!isset($_SESSION['username'])){
  
  header("location:index.php");
}
else {
include('header.php');
include('connect.php');
?>
<?php 
$title='';
$price='';
$des='';
$status='';
$stock='';
$update=false;

?>

<?php
if(isset($_GET['new']) || isset($_GET['edit']) ){

	if (isset($_GET['edit'])) {
          $id = $_GET['edit'];
          $update = true;
          $qry = "SELECT * FROM product WHERE id = $id";
          $res = $con->query($qry) or die('bad query');
             // if (count($res)==true) {
          $row = $res->fetch_assoc();
          $title = $row['title'];
          $price = $row['price'];
          $des = $row['descriptoin'];
          $status = $row['status'];
          $stock= $row['stock'];

          $cat = $row['category_name'];
          $img = $row['image'];
}



?>
<div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" id="insert-product" action="  " method="post" enctype="multipart/form-data">
        	<?php
        	if ($update == true) {
        		?>
        		   <h2 style="text-align:center">update product</h2><br>
        		<?php 
        	}else{
        	?>
            <h2 style="text-align:center">insert product</h2><br>
        <?php } ?>
            <div>
                <input type="text" class="form-control" placeholder="Title" name="name" value="<?php echo $title ?>" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $price ?>" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="Descriptoin" name="description" value="<?php echo $des ?>" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $status ?>" required=""/>
            </div>
             <div>
                <input type="text" class="form-control" placeholder="Stock" name="stock" value="<?php echo $stock ?>" required=""/>
            </div>
            <div>
            <label class="label-category">category:</label>
            <select name="product_category"    class=" " selected>

                  
              <?php

              $qry = "select title from category";
              $res = $con->query($qry) or die('bad query');
              // $res->num_rows." "."<br>";
              while($row = $res->fetch_assoc()) 
              {
                               
                 echo"<option>";
                 echo $row["title"];
                 echo"</option>"; 
                 
              }

              ?>

            </select>
             

            </div>
           <div>
           	<?php 
           		if($update == true){
           			?>
           			<img class="div-image" src="images/product/<?php echo $img; ?>" width="60" height="60"/>
           			<input type="file" class="form-control" placeholder="image" name="image"/>
           			<?php
           		}else{
           	?>
           	  
                <input type="file" class="form-control" placeholder="image" name="image" required=""/>
            <?php } ?>
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
            	<?php
            		if ($update == true) {
            			?>
            			<input class="btn btn-default  submit " type="submit" name="submit2" value="update">
            			<?php
            		}
            		else{
            	?>
                <input class="btn btn-default  submit " type="submit" name="submit1" value="insert product">
            <?php } ?>
            </div>

        </form>
    
    </section>


<?php 
  $dir = pathinfo(__FILE__);
//print_r($dir);
//echo $dir['dirname'];
  if(isset($_POST['submit1']))
  {
    $p_name = $_POST['name'];
    $p_price = $_POST['price'];
    $p_des = $_POST['description'];
    $p_status = $_POST['status'];
    $p_stock = $_POST['stock'];
    $p_cat = $_POST['product_category'];
    $p_image = $_FILES['image']['name'];
    $p_image_tmp = $_FILES['image']['tmp_name'];
    $folder = $dir['dirname']."/images/product/".$p_image;
      
    move_uploaded_file($p_image_tmp, $folder);   

    // $destination = $_SERVER['DOCUMENT_ROOT'].'ecommerce/admin/images/product/'.$p_image;
    // move_uploaded_file($p_image_tmp,$destination);

    $insert_c = "insert into product (title,price,descriptoin,status,stock,category_name,image) values ('$p_name ','  $p_price ',' $p_des','$p_status','$p_stock','$p_cat','$p_image')";
  
    $run_c = mysqli_query($con, $insert_c); 
    
 ?>
    <div ><p class="sucessfull-sms">product added sucessfully..thank you!</p></div>

 <?php 
       
    }
    else{
    ?>
   <!--  <div ><p class="sucessfull-pass">  does not match.please try again</p></div> -->
    <?php
  }
  
?>
<!-- update -->
<?php
$dir = pathinfo(__FILE__);
//print_r($dir);
//echo $dir['dirname'];
  if(isset($_POST['submit1'])){
  
    //$id = $_POST['id'];
    $p_name = $_POST['name'];
    $p_price = $_POST['price'];
    $p_des = $_POST['description'];
    $p_status = $_POST['status'];
    $p_stock = $_POST['stock'];
    $p_cat = $_POST['product_category'];
 
    $p_image = $_FILES['image']['name'];


        if($p_image != "")
       {


         $p_image_tmp = $_FILES['image']['tmp_name'];
         $folder = $dir['dirname']."/images/product/".$p_image;
         move_uploaded_file($p_image_tmp, $folder);   

        $destination = $_SERVER['DOCUMENT_ROOT'].'ecommerce/admin/images/product/'.$p_image;
        move_uploaded_file($p_image_tmp,$destination);


   
 
   // $insert_c = "UPDATE product SET title='$p_name', price='$p_price' descriptoin='$p_des', status='$p_status', stock='$p_stock', category_name='$p_cat', image='$p_image' WHERE product.id='$id'";
    $insert_c ="UPDATE `product` SET `title` = '$p_name', `price` = '$p_price', `descriptoin` = '$p_des', `status` = '$p_status', `stock` = '$p_stock', `category_name` = '$p_cat', `image` = '$p_image' WHERE `product`.`id` = $id";
  
    $run_c = mysqli_query($con, $insert_c); 



  }else{
     
      $insert_c ="UPDATE `product` SET `title` = '$p_name', `price` = '$p_price', `descriptoin` = '$p_des', `status` = '$p_status', `stock` = '$p_stock', `category_name` = '$p_cat'  WHERE `product`.`id` = $id";
  
    $run_c = mysqli_query($con, $insert_c); 

  }
    
    
 ?>
    <div ><p class="sucessfull-sms">product updated sucessfully..thank you!</p></div>
 <?php 
       
    }
    else{
    ?>
   <!--  <div ><p class="sucessfull-pass">  does not match.please try again</p></div> -->
    <?php
  }
  

?>

</div>

<?php
}

else{
?>

<!-- view all product -->

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 
  <div class="container">
     <div><p style="text-align: right;"><a href="all_product1.php?new=1" title="" class="btn btn-info"> Add New Product</a></p></div>
  		<?php 
  		$qry = "select * from product ";
			$res = $con->query($qry) or die('bad query');
			$res->num_rows." "."<br>";
  		?>
  		<table class='table'>
  			 
  			<tr>
					<th>product title</th>
					 <th> price</th>
					 <th> description </th>
					 <th> status </th>
				 	<th> stock </th>
					<th> category </th>
					<th> image </th>
					<th colspan='2'>Action </th>
          

						 
			</tr>
		
				<?php 
				$dir = pathinfo(__FILE__);
				
				while($row = $res->fetch_assoc()) {
				?>
				<tr>
				<td> <?php echo $row["title"]; ?></td>
				<td> <?php echo $row["price"]; ?></td>
				<td> <?php echo $row["descriptoin"]; ?></td>
				<td> <?php echo $row["status"]; ?></td>
				<td> <?php echo $row["stock"]; ?></td>
				<td> <?php echo $row["category_name"]; ?></td>

				<?php $p_image=$row["image"];?>
				<td>  <img src='images/product/<?php echo $p_image ?>' width='100' height='100'/></td>
				<td> <a href="all_product1.php?edit= <?php echo $row["id"] ?>" title="" class="btn btn-info"> Edit</a></td>
				<td> <a href="all_product.php?delete= <?php echo $row["id"]?>" title="" class="btn btn-danger"> Delete</a></td>
			</tr>

			<?php 
			 
		}

					  	if (isset($_GET['delete'])) {
						$id = $_GET['delete'];

						$qry = "DELETE FROM product WHERE id = $id";
						$res = $con->query($qry) or die('bad query');

					}
		?>
  		</table>
  		
</div>
</body>
</html>









<?php  
}
}

?>