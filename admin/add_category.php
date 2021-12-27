<?php

 session_start();
 if(!isset($_SESSION['username'])){
  
    header("location:index.php");
}
else {
  

require('header.php');
include ('connect.php');

?>

 <?php



      function categoryTree($parent_id = 0, $sub_mark = ''){
        
               $con = mysqli_connect("localhost","root","","ecommerce_site");

            $query = "SELECT * FROM category WHERE parent_id = $parent_id ORDER BY title ASC";

           $res = $con->query($query) or die('bad query');
          
           
            if( $res->num_rows > 0){
                while($row =  $res->fetch_assoc()){
                    echo '<option value="'.$row['id'].'">'.$sub_mark.$row['title'].'</option>';
                    categoryTree($row['id'], $sub_mark.'---');
                }
            }
          }
                 
        
   
          

  ?>







<!-- end main nav -->
<!DOCTYPE html>
<html>
 
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" id="insert-category" action="  " method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Insert Category <a href="add_subcategory.php" title="" class="btn btn-info"> Insert sub category</a></h2><br>

            <div>
              
                <input type="text" class="form-control" placeholder="Title" name="name" >
            </div>



           
<!--      
            <div>
               
               <select name="category" class="form-control">
                 <?php categoryTree(); ?>
              </select>
            </div>
 -->

            <div>
                <input type="text" class="form-control" placeholder="Descriptoin" name="description">
            </div>
            <div>
                
                 <select name="status" class="label-subcategory1">
                    <option value="1">active</option>
                    <option value="0">inactive</option>  
              </select>
            </div>
           <div>
              
                <input type="file" class="form-control" placeholder="image" name="image" >
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="Insert category">
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
    $p_status = $_POST['status'];
    $p_image = $_FILES['image']['name'];
    $p_image_tmp = $_FILES['image']['tmp_name'];
    $folder = $dir['dirname']."/images/product/".$p_image;
      
    move_uploaded_file($p_image_tmp, $folder);   

    // $destination = $_SERVER['DOCUMENT_ROOT'].'ecommerce/admin/images/product/'.$p_image;
    // move_uploaded_file($p_image_tmp,$destination);

    $insert_c = "insert into category (title,description,status,image) values ('$p_name', '$p_des','$p_status','$p_image')";
  
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


</div>




<?php
// require('fotter.php');

?>

</body>
</html>

<?php
}
?>