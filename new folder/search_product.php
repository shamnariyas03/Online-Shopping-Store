<?php
include('./includes/connect.php');
require_once('./functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce Website</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">
  
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background: linear-gradient(135deg, #5f2c82, #49a09d);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .navbar {
      background: rgba(30, 30, 50, 0.9) !important;
      box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    }

    .navbar .nav-link {
      color: #fff !important;
      transition: all 0.3s ease;
    }

    .navbar .nav-link:hover {
      color: #a855f7 !important;
      transform: translateY(-2px);
    }

    .hero {
      background: rgba(0,0,0,0.5);
      padding: 50px 20px;
      text-align: center;
      border-radius: 20px;
      margin: 20px auto;
      max-width: 900px;
      color: #fff;
      animation: fadeIn 1.2s ease-in-out;
    }

    .hero h3 {
      font-size: 2rem;
      color: #fff;
    }

    .hero p {
      font-size: 1.2rem;
      color: #ddd;
    }

    .bg-secondary {
      background: #2e2e42 !important;
    }

    .nav-item h4 {
      color: #fff;
    }

    .nav-item a {
      color: #ddd !important;
    }

    .nav-item a:hover {
      color: #a855f7 !important;
    }

    .card {
      border: none;
      border-radius: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 28px rgba(0,0,0,0.35);
    }

    footer {
      background: rgba(30,30,50,0.95);
      color: #bbb;
      text-align: center;
      padding: 20px 10px;
      margin-top: 40px;
      border-radius: 20px 20px 0 0;
    }

    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(30px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <img src="./images/logo.jpeg" alt="logo" width="40" height="40" class="rounded-circle">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="display_all.php">Products</a></li>
            <?php
              if(!isset($_SESSION['username'])){
                echo "<li class='nav-item'><a class='nav-link' href='./user_area/user_registration.php'>Register</a></li>";
              } else {
                echo "<li class='nav-item'><a class='nav-link' href='./user_area/profile.php'>My Account</a></li>";
              }
            ?>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="cart.php">
              <i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup>
            </a></li>
            <li class="nav-item"><a class="nav-link" href="#">Total: <?php total_cart_price(); ?></a></li>
          </ul>

          <form class="d-flex" role="search" action="search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" name="search_data"/>
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>
    <!--calling cart function-->
    <?php cart(); ?>

    <!-- Session Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
          }

          if(!isset($_SESSION['username']) && !isset($_SESSION['admin_name'])){
            echo "<li class='nav-item'><a class='nav-link' href='login.php'>Login</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
          }
        ?>
      </ul>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
      <h3>Welcome to our Ecommerce Website</h3>
      <p class="lead">We sell the best products at the best prices</p>
    </div>
<!--navbar fourth child-->
<div class="row">
<div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center">
      <li class="nav-item"><h4>Brands</h4></li>
        <?php getbrands(); ?>
    </ul>
    <ul class="navbar-nav me-auto text-center mt-4">
      <li class="nav-item"><h4>Categories</h4></li>
      <?php getcategories(); ?>
    </ul>
  </div>
  <div class="col-md-10">
    <!--products-->
    <div class="row">
      <!-- Fetching products from the database -->
       <?php
        search_products();
        get_unique_categories();
        get_unique_brands();
       ?>

      </div> 
    </div>
  </div>
  </div>


  <!--last child-->
  <!--includes footer-->
  <?php
  include('./includes/footer.php');
  ?>
</div>
    </div>




<!--bootsrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>