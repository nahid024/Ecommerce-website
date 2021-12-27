<?php
session_start();
if(!isset($_SESSION['username'])){
  
  header("location:index.php");
}
else {
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

 $title='';
 $des='';
 $update=false;
if (isset($_GET['new']) || isset($_GET['edit'])) {

	
	if (isset($_GET['edit'])) {
            $id = $_GET['edit'];
            $update = true;
            $qry = "SELECT * FROM category WHERE id = $id";
            $res = $con->query($qry) or die('bad query');
             // if (count($res)==true) {
            $row = $res->fetch_assoc();
            $title = $row['title'];
            $des = $row['description'];
            $status = $row['status'];
            $img = $row['image'];

             // }
          }


      ?>



 <?php 
function categories()
{
  // $conn = dbconnect();
  $con = mysqli_connect("localhost","root","","ecommerce_site");

  
  $sql = "SELECT * FROM category WHERE parent_id=0";

  $result = $con->query($sql);
  
  $categories = array();
  
  while($row = $result->fetch_assoc())
  {
    $categories[] = array(
      'id' => $row['id'],
      'parent_id' => $row['parent_id'],
      'category_name' => $row['title'],
      'subcategory' => sub_categories($row['id']),
    );
  }
  
  return $categories;
}
?>

<?php
function sub_categories($id)
{ 
  // $con = dbconnect();
  $con = mysqli_connect("localhost","root","","ecommerce_site");

  
  $sql = "SELECT * FROM category WHERE parent_id=$id";
  $result = $con->query($sql);
  
  $categories = array();
  
  while($row = $result->fetch_assoc())
  {
    $categories[] = array(
      'id' => $row['id'],
      'parent_id' => $row['parent_id'],
      'category_name' => $row['title'],
      'subcategory' => sub_categories($row['id']),
    );
  }
  return $categories;
}




function viewsubcat($categories)
{
  $html = '<ul class="sub-category">';
  foreach($categories as $category){

    $html .= '<input type ="checkbox">'. '<li>'.$category['category_name'].'</li>';
    
    if( ! empty($category['subcategory'])){
      $html .= viewsubcat($category['subcategory']);
    }
  }
  $html .= '</ul>';
  
  return $html;
}

?>







<!-- end main nav -->
<!DOCTYPE html>
<html>
 
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" id="insert-subcategory" action="  " method="post" enctype="multipart/form-data">
        	<?php 
        		if ($update==true) {
        			?>
        			 <h2 style="text-align:center">Update Category</h2><br>
        			 <?php 
        			}
        			 else{
        		
        	?>
            <h2 style="text-align:center">Add Category</h2><br>
        <?php 
    		} 
				

        ?>
            
            <div>
              <!-- <label for="exampleInputEmail1">Category Title</label> -->
                <input type="text" class="form-control" placeholder="Title" name="name" value="<?php echo $title ?>" required=""/>
            </div>
            <div>
              <!-- <label >Sub Category</label> -->
            <?php $categories = categories(); ?>
              <?php foreach($categories as $category){ ?>
                <ul class=" ">
                  <input type ="checkbox" value="<?php echo $category['id']; ?>"> <li><?php echo $category['category_name'] ?></li>
                <?php 
                  if( ! empty($category['subcategory'])){ ?>
                 <li> <?php echo viewsubcat($category['subcategory']); ?> </li>
                 <?php
                  } 
                ?>
              </ul>
              <?php } ?>
   
            </div>
            <div>
                <!-- <label >Description</label> -->
                <input type="text" class="form-control" placeholder="Descriptoin" name="description" value="<?php echo $des ?>" required=""/>
            </div>
            <div>
                 <!-- <label class="title-lebel">Status</label> -->
                 <select name="status" class="label-subcategory1">
                    <option value="1">1</option>
                    <option value="0">0</option>  
              </select>
            </div>
            <!-- <label >upload image</label> -->
           <div>
           	<?php 
           		if ($update ==true) {
           			?>
           			<img class="div-image" src="images/product/<?php echo $img; ?>" width="60" height="60"/>
           			<input type="file" class="form-control" placeholder="image" name="image"  value="<?php echo $img ?>"/>
           			<?php
           		}else{
           	?>

                <input type="file" class="form-control" placeholder="image" name="image"  value="<?php echo $img ?>"/>
            <?php } ?>
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
            	<?php 
            	if ($update==true) {
            		?>
            		<input class="btn btn-default  submit " type="submit" name="submit2" value="update category">
            		<?php
            	}else{

            	?>
                <input class="btn btn-default  submit " type="submit" name="submit1" value="Insert category">
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
    $p_des = $_POST['description'];
    $p_id = $_POST['parent_category'];
    $p_status = $_POST['status'];
    $p_image = $_FILES['image']['name'];
    $p_image_tmp = $_FILES['image']['tmp_name'];
    $folder = $dir['dirname']."/images/product/".$p_image;
      
    move_uploaded_file($p_image_tmp, $folder);   

    // $destination = $_SERVER['DOCUMENT_ROOT'].'ecommerce/admin/images/product/'.$p_image;
    // move_uploaded_file($p_image_tmp,$destination);

    $insert_c = "insert into category (title,parent_id,description,status,image) values ('$p_name',$p_id, '$p_des','$p_status','$p_image')";
  
    $run_c = mysqli_query($con, $insert_c); 
    
 ?>
    <div><p class="sucessfull-sms">category added sucessfully..thank you!</p></div>

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
  if(isset($_POST['submit2'])){
  
     // $P_id = $_POST['id'];
      $p_name = $_POST['name'];
     
      $p_des = $_POST['description'];
        $p_id = $_POST['parent_category'];
      $p_status = $_POST['status'];
      $p_image = $_FILES['image']['name'];


        if($p_image != "")
       {


         $p_image_tmp = $_FILES['image']['tmp_name'];
         $folder = $dir['dirname']."/images/product/".$p_image;
         move_uploaded_file($p_image_tmp, $folder);   

         $destination = $_SERVER['DOCUMENT_ROOT'].'ecommerce/admin/images/product/'.$p_image;
         move_uploaded_file($p_image_tmp,$destination);


   
 
         // $insert_c = "UPDATE product SET title='$p_name', price='$p_price' descriptoin='$p_des', status='$p_status', stock='$p_stock', category_name='$p_cat', image='$p_image' WHERE product.id='$id'";
          $insert_c ="UPDATE `category` SET   `parent_id` = '$id', `description` = '$p_des', `status` = '$p_status', `image` = '$p_image' WHERE `category`.`id` = $id";
        
          $run_c = mysqli_query($con, $insert_c); 
          print_r( $insert_c);



          }else{
             
           $insert_c ="UPDATE `category` SET   `parent_id` = '$p_id', `title` = '$p_name', `description` = '$p_des', `status` = '$p_status'  WHERE `category`.`id` = $id";

           $run_c = mysqli_query($con, $insert_c); 
           print_r( $insert_c);

          }
            
            
          ?>
            <div ><p class="sucessfull-sms">category updated sucessfully..thank you!</p></div>
  <?php 
       
      }
      else{
    ?>
   <!--  <div ><p class="sucessfull-pass">  does not match.please try again</p></div> -->
    <?php
  }
  
?>


</div>

?>
<?php
	
}
else{
?>

	<!-- show all category -->
	<div class="container"> 
	<div><p style="text-align: right;"><a href="all_category.php?new=1" title="" class="btn btn-info"> Add category</a></p></div>
			<?php 
  			$qry = "select * from category ";
			$res = $con->query($qry) or die('bad query');
			$res->num_rows." "."<br>";
  		?>
  		<table class='table table-border' >
  			 
  			<tr>
					<th>category title</th>
					<th> description </th>
					<th> status </th>
					<th> image </th>
					<th colspan='2'>Action </th>
			</tr>
		
				<?php 
				$dir = pathinfo(__FILE__);
				
				while($row = $res->fetch_assoc()) {
				?>
				<tr>
				<td> <?php echo $row["title"]; ?></td>
				<td> <?php echo $row["description"]; ?></td>
				<td> <?php echo $row["status"]; ?></td>
				<?php $p_image=$row["image"]; ?>
				<td>  <img src='images/product/<?php echo $p_image ?>' width='100' height='100'/></td>
				<td> <a href="all_category.php?edit= <?php echo $row["id"] ?>" title="" class="btn btn-info"> Edit</a>   </td>
				<td> <a href="category_delete.php?delete= <?php echo $row["id"] ?>" title="" class="btn btn-danger"> Delete</a></td>
			</tr>

			<?php 
			 
		}

					  	if (isset($_GET['delete'])) {
						// $id = $_GET['delete'];

						// $qry = "DELETE FROM product WHERE id = $id";
						// $res = $con->query($qry) or die('bad query');

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