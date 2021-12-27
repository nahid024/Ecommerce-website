<?php
// session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html>
<head>
  <title>project</title>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- bootstrap4 cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- custom css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="form.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css?ver=1.2">
    <!-- for tree -->
    <link rel="stylesheet" href="tree/hierarchical-checkboxes.css" />
  <!--   <script src="path/to/cdn/jquery.min.js"></script> -->
    <script src="tree/hierarchical-checkboxes.js"></script>
     
</head>
<body>
<!-- start top nav -->
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
                              <?php


                            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                echo "Welcome to the admin's area, " . $_SESSION['username'] . "!";
                                ?>
                                    <a href="logout.php" title="">logout</a>
                                <?php 
                            }
                            else {
                                echo "Please log in first to see this page.";
                            }
                             ?>
                            </li>

                            
                        </ul>
                    
                </nav>
  </div>
  
</div>

<!-- end top nav -->
<!-- start main nav -->

<div class="section-main-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
         <a href="home.php" class="navbar-brand">
                    <img src="images/logo.png" class="header-logo" alt="logo" style=" ">
                </a> 
      </div>
       <!-- <div class="col-lg-8">
        <div class="serach1">
          <ul class="navbar-nav-search ">
            <li  class="search "><input class="search"type="text" placeholder="Search" name="search2"></li>
            <li  class=" login "><p><a class="nav-link-aa" href="user_login.php"> LOGIN </a> |
              <span><a href="user_registration_form.php" title=""> REGISTER</a></span></p></li>
            <li class=" cart"><picture>
                      <source srcset="images/cart.png" type="image/svg+xml">
                      <img src="images/cart.png" class="       " alt="icon">
                    </picture></li>
          </ul>
          
          
        </div> -->
        <nav class="navbar navbar-expand-sm nav nav-a"> 
          <button class="navbar-toggler navbar-toggler-a bg-primary" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="  navbar-toggler-icon-a ml-auto"></span>
                </button> 
          <div class="collapse navbar-collapse navbar-collapse-a " id="navbarTogglerDemo02">

                        <ul class="navbar-nav ">
                        <li class="nav-item"><a class="nav-link-b text-center noHover" href="add_product.php">ADD PRODUCT</a></li>
                        <li class="nav-item nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">SHOP</a></li>
                        <li class="nav-item"><a class="nav-link-b text-center noHover" href="all_product1.php">ALL PRODUCT</a></li>
                        <li class="nav-item"><a class="nav-link-b text-center noHover" href="add_category.php">ADD CATEGORY</a></li>
                        <li class="nav-item"><a class="nav-link-b text-center noHover" href="all_category.php">CATEGORY</a></li>
                        <li class="nav-item"><a class="nav-link-b text-center noHover" href="#"><picture>
                      <source srcset="images/facebook.png" type="image/svg+xml">
                      <img src="images/facebook.png" class="       " alt="icon">
                    </picture></a></li>
                    <li class="nav-item"><a class="nav-link-b text-center noHover" href="#"><picture>
                      <source srcset="images/twiter.png" type="image/svg+xml">
                      <img src="images/twiter.png" class="       " alt="icon">
                    </picture></a></li>
                    <li class="nav-item"><a class="nav-link-b text-center noHover" href="#"><picture>
                      <source srcset="images/insta.png" type="image/svg+xml">
                      <img src="images/insta.png" class="       " alt="icon">
                    </picture></a></li>

                         


                    </ul>
                </div>
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- end main nav -->
</body>
</html>