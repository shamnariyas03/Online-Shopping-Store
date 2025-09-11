<?php
include('../includes/connect.php');
require_once('../functions/common_function.php');
session_start();
cart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome <?php echo $_SESSION['username'] ?></title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="../style.css">

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

    .welcome-banner {
      background: rgba(0, 0, 0, 0.5);
      padding: 30px;
      text-align: center;
      border-radius: 15px;
      margin: 20px auto;
      max-width: 900px;
      color: #fff;
      animation: fadeIn 1s ease-in-out;
    }

    .sidebar {
      min-height: 100vh;
      background: #2e2e42;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar .list-group-item {
      background: transparent;
      border: none;
      color: #ddd;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .sidebar .list-group-item:hover {
      background: #4332af;
      color: #fff;
      transform: translateX(5px);
    }

    .profile_img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin: 15px auto;
      display: block;
      border: 3px solid #a855f7;
      box-shadow: 0 6px 20px rgba(0,0,0,0.3);
      animation: zoomIn 0.8s ease;
    }

    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 6px 15px rgba(0,0,0,0.25);
      transition: all 0.3s ease;
      background: #fff;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.35);
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

    @keyframes zoomIn {
      from {transform: scale(0.7); opacity: 0;}
      to {transform: scale(1); opacity: 1;}
    }
  </style>
</head>
<body>
  <div class="container-fluid p-0">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <img src="../images/logo.jpeg" alt="logo" width="40" height="40" class="rounded-circle">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link active" href="../index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../display_all.php">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="profile.php">My Account</a></li>
            <li class="nav-item"><a class="nav-link" href="../contact.php">Contact</a></li>
            <li class="nav-item">
              <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#">Total: <?php total_cart_price(); ?></a></li>
          </ul>

          <form class="d-flex" role="search" action="../search_product.php" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" name="search_data"/>
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
          </form>
        </div>
      </div>
    </nav>

    <!-- Session Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
      <ul class="navbar-nav me-auto">
        <?php
          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
          }

          if(!isset($_SESSION['username'])){
            echo "<li class='nav-item'><a class='nav-link' href='./user_login.php'>Login</a></li>";
          } else {
            echo "<li class='nav-item'><a class='nav-link' href='logout.php'>Logout</a></li>";
          }
        ?>
      </ul>
    </nav>

    <!-- Welcome Banner -->
    <div class="welcome-banner">
      <h2>Welcome 
        <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : "Guest"; ?>
      </h2>
      <p class="lead">Manage your orders, account, and more</p>
    </div>

    <!-- Sidebar + Content -->
    <div class="row">
      <div class="col-md-2 sidebar">
        <ul class="list-group text-center">
          <li class="list-group-item text-light fw-bold">Your Profile</li>

          <?php
            $username = $_SESSION['username'];
            $user_image = "select * from user_table where username='$username'";
            $user_image = mysqli_query($con, $user_image);
            $row_image = mysqli_fetch_array($user_image);
            $user_image = $row_image['user_image'];
            echo "<li class='list-group-item'><img src='./user_images/$user_image' alt='Profile' class='profile_img'></li>";
          ?>

          <li class="list-group-item"><a class="nav-link text-light" href="profile.php">Pending Orders</a></li>
          <li class="list-group-item"><a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a></li>
          <li class="list-group-item"><a class="nav-link text-light" href="profile.php?my_orders">My Orders</a></li>
          <li class="list-group-item"><a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a></li>
          <li class="list-group-item"><a class="nav-link text-light" href="../logout.php">Logout</a></li>
        </ul>
      </div>

      <div class="col-md-10 p-3">
        <div class="card p-3">
          <?php 
            get_user_order_details();

            if(isset($_GET['edit_account'])){
              include('edit_account.php');
            }
            if(isset($_GET['my_orders'])){
              include('user_orders.php');
            }
            if(isset($_GET['delete_account'])){
              include('delete_account.php');
            }
          ?>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <?php include('../includes/footer.php'); ?>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>