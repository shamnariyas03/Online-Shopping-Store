<?php
include('../includes/connect.php');
require_once('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!-- Bootstrap -->
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

    .bg-secondary {
      background: #2e2e42 !important;
    }

    .sidebar {
      min-height: 100vh;
      background: rgba(20, 20, 35, 0.95);
      box-shadow: 4px 0 12px rgba(0,0,0,0.25);
      padding-top: 20px;
    }

    .sidebar a {
      display: block;
      color: #ddd;
      padding: 12px 15px;
      margin: 6px 10px;
      border-radius: 10px;
      transition: all 0.3s ease;
      text-decoration: none;
    }
    .sidebar a:hover {
      background: #a855f7;
      color: #fff;
      transform: translateX(5px);
    }

    .content-area {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 15px;
      padding: 20px;
      margin: 20px;
      min-height: 80vh;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      animation: fadeIn 0.8s ease-in-out;
    }

    footer {
      background: rgba(30,30,50,0.95);
      color: #bbb;
      text-align: center;
      padding: 15px;
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

    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="../images/admin.jpeg" alt="Admin" width="40" height="40" class="rounded-circle me-2">
          <b>Admin Dashboard</b>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <?php
              if(!isset($_SESSION['admin_name'])){
                echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome Guest</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='./admin_login.php'>Login</a></li>";
              } else {
                echo "<li class='nav-item'><a class='nav-link' href='#'>Welcome ".$_SESSION['admin_name']."</a></li>";
                echo "<li class='nav-item'><a class='nav-link' href='../logout.php'>Logout</a></li>";
              }
            ?>
          </ul>
        </div>
      </div>
    </nav>

    <div class="row g-0">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar">
        <a href="insert-product.php"><i class="fa fa-plus-circle me-2"></i> Insert Products</a>
        <a href="index.php?view_products"><i class="fa fa-box me-2"></i> View Products</a>
        <a href="index.php?insert-category"><i class="fa fa-list me-2"></i> Insert Categories</a>
        <a href="index.php?view-categories"><i class="fa fa-eye me-2"></i> View Categories</a>
        <a href="index.php?insert-brands"><i class="fa fa-tag me-2"></i> Insert Brands</a>
        <a href="index.php?view-brands"><i class="fa fa-tags me-2"></i> View Brands</a>
        <a href="index.php?list_orders"><i class="fa fa-shopping-cart me-2"></i> All Orders</a>
        <a href="index.php?list_payments"><i class="fa fa-credit-card me-2"></i> All Payments</a>
        <a href="index.php?list_users"><i class="fa fa-users me-2"></i> List Users</a>
        <a href="../logout.php"><i class="fa fa-sign-out-alt me-2"></i> Logout</a>
      </div>

      <!-- Main Content -->
      <div class="col-md-10">
        <div class="content-area">
        <!-- Dashboard Cards -->
<div class="row text-center mb-4">
  <div class="col-md-3 mb-3">
    <div class="card dashboard-card shadow-sm">
      <div class="card-body">
        <i class="fa fa-box fa-2x text-purple mb-2"></i>
        <h5>Total Products</h5>
        <h3>
          <?php
            $count_products = mysqli_num_rows(mysqli_query($con, "SELECT * FROM products"));
            echo $count_products;
          ?>
        </h3>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card dashboard-card shadow-sm">
      <div class="card-body">
        <i class="fa fa-shopping-cart fa-2x text-success mb-2"></i>
        <h5>Total Orders</h5>
        <h3>
          <?php
            $count_orders = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_orders"));
            echo $count_orders;
          ?>
        </h3>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card dashboard-card shadow-sm">
      <div class="card-body">
        <i class="fa fa-credit-card fa-2x text-info mb-2"></i>
        <h5>Total Payments</h5>
        <h3>
          <?php
            $count_payments = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_payments"));
            echo $count_payments;
          ?>
        </h3>
      </div>
    </div>
  </div>

  <div class="col-md-3 mb-3">
    <div class="card dashboard-card shadow-sm">
      <div class="card-body">
        <i class="fa fa-users fa-2x text-warning mb-2"></i>
        <h5>Total Users</h5>
        <h3>
          <?php
            $count_users = mysqli_num_rows(mysqli_query($con, "SELECT * FROM user_table"));
            echo $count_users;
          ?>
        </h3>
      </div>
    </div>
  </div>
</div>
          <?php
            if(isset($_GET['insert-category'])) include('insert-categories.php');
            if(isset($_GET['insert-brands'])) include('insert-brands.php');
            if(isset($_GET['view_products'])) include('view_products.php');
            if(isset($_GET['edit_products'])) include('edit_products.php');
            if(isset($_GET['delete_products'])) include('delete_products.php');
            if(isset($_GET['view-categories'])) include('view-categories.php');
            if(isset($_GET['delete_category'])) include('delete_category.php');
            if(isset($_GET['edit_category'])) include('edit_category.php');
            if(isset($_GET['view-brands'])) include('view-brands.php');
            if(isset($_GET['edit_brands'])) include('edit_brands.php');
            if(isset($_GET['delete_brands'])) include('delete_brands.php');
            if(isset($_GET['list_orders'])) include('list_orders.php');
            if(isset($_GET['delete_orders'])) include('delete_orders.php');
            if(isset($_GET['list_payments'])) include('list_payment.php');
            if(isset($_GET['delete_payments'])) include('delete_payments.php');
            if(isset($_GET['list_users'])) include('list_users.php');
            if(isset($_GET['delete_users'])) include('delete_users.php');
          ?>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <p>All Rights Reserved © Designed by Shamna - 2025</p>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>