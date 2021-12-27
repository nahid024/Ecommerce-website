<?php
// include('header.php');
include ('connect.php');
 

?> 
 <!DOCTYPE html>
 <html>
 <head>
     <title>admin</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="main.css?ver=1.2">
    <link rel="stylesheet" type="text/css" href="css/slick-theme.css?ver=1.2">
    <link rel="stylesheet" type="text/css" href="css/slick.css?ver=1.2">
 </head>
 <body>
 <div class="section-topnav">
  <div class="container">
     <nav class="navbar navbar-expand-sm nav nav-a">             
                      <ul class="navbar-nav navbar-nav-a">
                           <li class="nav-item"> <picture>
                              <source srcset="images/ship.png" type="image/svg+xml">
                              <img src="images/ship.png" class="   image    " alt="icon">
                            </picture>
                            <a class="  nav-link-a noHover" >FREE STANDARD SHIPPING ON ORDERS OVER $200!</a>
                             </li>
                              
                <li class="nav-item nav-item-a nav-item-aa"><picture>
                      <source srcset="images/phone.png" type="image/svg+xml">
                      <img src="images/phone.png" class="    image    " alt="icon">
                </picture>
                            <a class="  nav-link-a noHover " href="#">(222)44 55 55</a></li>
                             <li class="nav-item"><picture>
                              <source srcset="images/mail.png" type="image/svg+xml">
                              <img src="images/mail.png" class="  image  " alt="icon">
                            </picture>
                            <a class="nav-link-a noHover" href="#">SEND US EMAIL</a></li>
                            <li>
                               
                            </li>

                            
                        </ul>
                    
                </nav>
  </div>
  
</div>
<div class="section-main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
         <a href="home.php" class="navbar-brand">
                    <img src="images/logo.png" class="header-logo" alt="logo" style=" ">
                </a> 
      </div>
 </body>
 </html>

 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" action="" method="POST">
            <h2 style="text-align:center   ">ADMIN LOGIN</h2><br>

             
             

            <div>
                <input type="email" class="form-control form-control-a" placeholder="Email" name="email" required=""/>
            </div>
            <div>
                <input type="password" class="form-control form-control-a" placeholder="Password" name="password" required=""/>
            </div>
            
             
            <div class="col-lg-12  col-lg-push-3">
                <input class="btn btn-default  submit " type="submit" name="submit1" value="LOG IN">
            </div>
            <div class="create-acc">
              <!-- <p class="">You have no account?? Create New Account</p> -->
            </div>

        </form>
    
    </section>

    <?php
     $flag = false;

    if (isset($_POST['submit1'])) {
        
           
            $admin_email = $_POST['email'];
            $admin_pass = $_POST['password'];

            $qry = "SELECT * FROM  admin where email = '$admin_email ' AND password = '$admin_pass'";
            $res = $con->query($qry) or die('Bad Query');

            if ($res->num_rows>0) {
                # code...
                     session_start();

                        $_SESSION['loggedin'] = true;
                      
                        $_SESSION['username'] = $admin_email ;
                     header("location: dashboard.php");
                    $flag = true;


            }
            else{
                echo "incorrect";
            }
            
}
            // if($flag){
               
            //    header("location:header.php");
            //    //exit(1);
            //    }

    ?>
     


</div>


<?php
 // include('fotter.php');

?>
