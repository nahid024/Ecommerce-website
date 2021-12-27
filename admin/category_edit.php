 <?php
 session_start();
 if(!isset($_SESSION['username'])){
  
  echo   "you are not admin" ;
}
else {

require('header.php');
include ('connect.php');

?>
<!-- end main nav -->
<?php

 if (isset($_GET['edit'])) {
            $id = $_GET['edit'];

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



      function categoryTree($parent_id = 0, $sub_mark = ''){
        
                $con = mysqli_connect("localhost","root","","ecommerce_site");

                $query = "SELECT * FROM category WHERE parent_id = $parent_id  ORDER BY title ASC";

                $res = $con->query($query) or die('bad query');
          
           
                if( $res->num_rows > 0){
                while($row =  $res->fetch_assoc()){
 
                    echo '<option value="'.$row['id'].'">'.$sub_mark.$row['title'].'</option>';
                    categoryTree($row['id'], $sub_mark.'---');
                }
            }
          }
                 
  ?>

<!DOCTYPE html>
<html>
 
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" action="  " method="post" enctype="multipart/form-data">
            <h2 style="text-align:center   ">update category</h2><br>

            <div>
               <label>title:</label>
                <input type="text" class="form-control" placeholder="Title" name="name" value="<?php echo $title ?>" required=""/>
            </div>
 

            <div>
               <label>description:</label>
                <input type="text" class="form-control" placeholder="Descriptoin" name="description" value="<?php echo $des ?>" required=""/>
            </div>

            <div>
              <label >Category</label>
               <select name="parent_category" class="label-subcategory"class=" ">
                 <?php categoryTree(); ?>
              </select>
            </div>
           
             <div>
               <label>status:</label>
                <input type="text" class="form-control" placeholder="Status" name="status" value="<?php echo $status ?>" required=""/>
            </div>
            <div>
            <label for="">Image:</label>
           
             <img class="div-image" src="images/product/<?php echo $img; ?>" width="60" height="60"/>
              <input type="file" class="form-control" placeholder="image" value="<?php echo $img ?>" name="image"/>
               
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="update category">
            </div>

        </form>
    
    </section>


<?php 
$dir = pathinfo(__FILE__);
//print_r($dir);
//echo $dir['dirname'];
  if(isset($_POST['submit1'])){
  
    //$id = $_POST['id'];
      $p_name = $_POST['name'];
      $p_des = $_POST['description'];
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
          $insert_c ="UPDATE `category` SET `title` = '$p_name', `description` = '$p_des', `status` = '$p_status', `image` = '$p_image' WHERE `category`.`id` = $id";
        
          $run_c = mysqli_query($con, $insert_c); 



          }else{
             
           $insert_c ="UPDATE `category` SET `title` = '$p_name', `description` = '$p_des', `status` = '$p_status',  WHERE `category`.`id` = $id";

           $run_c = mysqli_query($con, $insert_c); 

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




<?php
// require('fotter.php');

?>

</body>
</html>

<?php
}
?>