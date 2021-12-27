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







<!-- end main nav -->
<!DOCTYPE html>
<html>
 
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" id="insert-subcategory" action="  " method="post" enctype="multipart/form-data">
            <h2 style="text-align:center">Sub Category</h2><br>
            
            <div>
              <label for="exampleInputEmail1">Category Title</label>
                <input type="text" class="form-control" placeholder="Title" name="name" required=""/>
            </div>
            <div>
              <label >Sub Category</label>
               <select name="parent_category" class="label-subcategory"class=" ">
                 <?php categoryTree(); ?>
              </select>
            </div>
            <div>
                <label >Description</label>
                <input type="text" class="form-control" placeholder="Descriptoin" name="description" required=""/>
            </div>
            <div>
                 <label class="title-lebel">Status</label>
                 <select name="status" class="label-subcategory1">
                    <option value="">1</option>
                    <option value="">0</option>  
              </select>
            </div>
            <label >upload image</label>
           <div>
                <input type="file" class="form-control" placeholder="image" name="image" required=""/>
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="Insert subcategory">
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


</div>




<?php
// require('fotter.php');

?>

</body>
</html>

<?php
}
?>