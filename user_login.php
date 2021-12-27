<?php
ob_start();
session_start();
include('header.php');
include('connect.php');

?> 
 <!DOCTYPE html>
 <html>
 <head>
     <title>user</title>
     <link rel="stylesheet" type="text/css" href="main.css">
 </head>
 <body>
 
 </body>
 </html>

 <div class="container">

 <section class="login_content login_conten1 mt-5 mb-5" style="margin-top: -40px;">
        <form name="form1" action="" method="POST">
            <h2 style="text-align:center   ">Login your Account</h2><br>

             
             

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

            $qry = "SELECT * FROM  user where email = '$admin_email ' AND password = '$admin_pass'";
            $res = $con->query($qry) or die('Bad Query');


            if ($res->num_rows>0) {
                # code...
                     // session_start();

                        $_SESSION['loggedin'] = true;
                      
                        $_SESSION['username'] = $admin_email;
                     header("location: home.php");
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
// require('fotter.php');
ob_end_flush();

?>
