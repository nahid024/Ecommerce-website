<?php

 session_start();
 if(!isset($_SESSION['username'])){
  
    header("location:index.php");
}
else {
  

require('header.php');
include ('connect.php');

?>
<!-- end main nav -->
<!DOCTYPE html>
<html>
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" id="insert-product" action="  " method="post" enctype="multipart/form-data">
            <h2 style="text-align:center   ">insert product</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="Title" name="name" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Price" name="price" required=""/>
            </div>

            <div>
                <input type="text" class="form-control" placeholder="Descriptoin" name="description" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="Status" name="status" required=""/>
            </div>
             <div>
                <input type="text" class="form-control" placeholder="Stock" name="stock" required=""/>
            </div>
            <div>
            <label class="label-category">category:</label>
            <select name="product_category"    class=" " selected >

                  
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
                <input type="file" class="form-control" placeholder="image" name="image" required=""/>
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="Insert Product">
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


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="form.js"></script>

<!-- <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/my.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->

<?php
// require('fotter.php');

?>

</body>
</html>

<?php
}
?>