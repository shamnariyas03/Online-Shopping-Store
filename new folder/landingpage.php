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

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

  <!-- AOS (Animate on Scroll) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <style>
    * { scrollbar-width: none; }
    .hero {
      height: 90vh;
      background: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),
                  url('./images/banner.jpg') center/cover no-repeat;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
      animation: fadeInDown 2s;
    }
    .hero p {
      font-size: 1.3rem;
      margin-top: 15px;
      animation: fadeInUp 2s;
    }
    .btn-hero {
      margin-top: 20px;
      padding: 12px 30px;
      font-size: 18px;
      border-radius: 30px;
    }
    @keyframes fadeInDown {
      from {opacity:0; transform:translateY(-50px);}
      to {opacity:1; transform:translateY(0);}
    }
    @keyframes fadeInUp {
      from {opacity:0; transform:translateY(50px);}
      to {opacity:1; transform:translateY(0);}
    }
    .feature-box {
      padding: 30px;
      border-radius: 15px;
      background: white;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }
    .feature-box:hover {
      transform: translateY(-10px);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <img src="./images/logo.jpeg" alt="logo" width="40" class="logo me-2 img-fluid">
      <a class="navbar-brand" href="index.php">MyShop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="display_all.php">Products</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link">Total: ₹<?php total_cart_price() ?></a>
          </li>
        </ul>
        <form class="d-flex" role="search" action="search_product.php" method="get">
          <input class="form-control me-2" type="search" placeholder="Search" name="search_data"/>
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
      </div>
    </div>
  </nav>
  <!-- User Greeting & Login -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
      <?php
        if(!isset($_SESSION['username']) && !isset($_SESSION['admin_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Guest</a>
          </li>";
        } elseif (isset($_SESSION['username'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
          </li>";
        } elseif (isset($_SESSION['admin_name'])) {
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>Welcome Admin ".$_SESSION['admin_name']."</a>
          </li>";
        }

        // Login/Logout button
        if(!isset($_SESSION['username']) && !isset($_SESSION['admin_name'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='login.php'>Login</a>
          </li>";
        } else {
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>Logout</a>
          </li>";
        }
      ?>
    </ul>
  </nav>
</div>

<!-- Hero Section-->
<section class="hero d-flex flex-column justify-content-center align-items-center text-center w-100" style="min-height: 60vh;">
  <h1 data-aos="zoom-in">Welcome to MyShop</h1>
  <p data-aos="fade-up">Best Products • Best Prices • Fast Delivery</p>
  <a href="login.php" class="btn btn-warning btn-hero">Login to Continue</a>
</section>

<!-- Features Section -->
<section class="container py-5">
  <div class="row text-center">
    <div class="col-md-4 col-12 mb-3" data-aos="fade-right">
      <div class="feature-box h-100">
        <h3>🛍 Wide Range</h3>
        <p>Thousands of products at the best prices.</p>
      </div>
    </div>
    <div class="col-md-4 col-12 mb-3" data-aos="zoom-in">
      <div class="feature-box h-100">
        <h3>💳 Secure Payments</h3>
        <p>Safe & trusted payment options for you.</p>
      </div>
    </div>
    <div class="col-md-4 col-12 mb-3" data-aos="fade-left">
      <div class="feature-box h-100">
        <h3>⚡ Fast Delivery</h3>
        <p>Quick & reliable delivery at your doorstep.</p>
      </div>
    </div>
  </div>
</section>

<!-- Products + Categories -->


<!-- Footer -->
<?php include('./includes/footer.php'); ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>AOS.init({ duration: 1000 });</script>

</body>
</html>