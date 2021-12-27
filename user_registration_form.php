 <?php
require('header.php');
include ('connect.php');

?>
<!-- end main nav -->
<!DOCTYPE html>
<html>
 
<body>


 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" action="  " method="post">
            <h2 style="text-align:center   ">User Registration Form</h2><br>

            <div>
                <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/>
            </div>

            <div>
                <input type="email" class="form-control" placeholder="Email" name="email" required=""/>
            </div>
            <div>
                <input type="password" class="form-control" placeholder="Password" name="password" required=""/>
            </div>

             <div>
                <input type="password" class="form-control" placeholder="Retype Password" name="retypepassword" required=""/>
            </div>
            <div>
                <input type="text" class="form-control" placeholder="phone" name="phone" required=""/>
            </div>
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="Register">
            </div>

        </form>
    
    </section>


<?php 
  if(isset($_POST['submit1'])){
  
    
    
    
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $repass = md5($_POST['retypepassword']);
     $phone = $_POST['phone'];
     
     //check password
    if ($_POST['password']==$_POST['retypepassword']) { 


    //check email
      // $check_mail = "select email from user where email='$email'";
      // $check_mail1 = mysqli_query($con, $check_mail); 
      // if ($_POST['email'] == $check_mail1  ) {
      //   # code...
      





     $insert_c = "insert into user (first_name,last_name,email,password,phone) values ('$first_name','$last_name',' $email','$pass','$phone')";
  
    $run_c = mysqli_query($con, $insert_c); 
    
 ?>
    <div ><p class="sucessfull-sms">registration sucessfull..thank you!</p></div>
 <?php 
     // }  
    }
    else{
    ?>
    <div ><p class="sucessfull-pass">password does not match.please try again</p></div>
    <?php
  }
  }
?>


</div>




<?php
require('fotter.php');

?>

 </body>
</html>