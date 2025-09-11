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
<!--fourth child-->
<div class="container">
  <div class="row">
    <table class="table table-bordered text-center">
      <?php 
      global $con;
      $total_price = 0;
      $clientIP = getIPAddress();
      $select_query = "SELECT * FROM card_details WHERE ip_address='$clientIP'";
      $result_query = mysqli_query($con, $select_query);
      $result_count = mysqli_num_rows($result_query);
      if ($result_count > 0) {
        echo " <thead>
        <tr>
          <th>Product title</th>
          <th>Product Image</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Operations</th>
        </tr>
      </thead>
      <tbody>
";
        while ($row = mysqli_fetch_array($result_query)) {
          $product_id = $row['product_id'];
          $quantity = $row['quantity'];
          $select_products = "SELECT * FROM products WHERE product_id=$product_id";
          $result_products = mysqli_query($con, $select_products);
          $row_product_price = mysqli_fetch_assoc($result_products);
          $product_title = $row_product_price['product_title'];
          $product_image1 = $row_product_price['product_image1'];
          $raw_price = $row_product_price['product_price'];
          $unit_price = floatval(str_replace(',', '', $raw_price));
          $item_total = $unit_price * $quantity;
          $total_price += $item_total;
      ?>
        <tr>
          <form method="post" action="">
          <td><?php echo $product_title ?></td>
          <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart_img" style="max-width: 100px; height:auto"></td>
          <td><?php echo number_format($unit_price) ?>/-</td>
          <td><input type="number" class="form-input w-50" name="qty" value="<?php echo $quantity ?>" min="1"></td>
          <td><?php echo number_format($item_total) ?>/-</td>
          <td>
            <input type="hidden" name="product_id" value="<?php echo $product_id ?>">
            <button type="submit" name="update_cart" class="btn btn-secondary mx-1 px-2">Update</button>
            <button type="submit" name="remove_cart" class="btn btn-danger mx-1 px-2">Remove</button>
          </td>
          </form>
        </tr>
      <?php }
      } else {
        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
      }
      ?>
      </tbody>
    </table>
    <div class="d-flex mb-5">
    <?php
     if ($result_count > 0) {
      echo" <h4 class='px-3'>Grandtotal: $total_price</h4>
      <a href='index.php' class='btn btn-secondary mx-3 px-3'>Continue Shopping</a>
      <a href='./user_area/checkout.php' class='btn btn-secondary mx-3 px-3'>Checkout</a>";
     } else {
      echo" <a href='index.php' class='btn btn-secondary mx-3 px-3'>Continue Shopping</a>";
     }
    ?>
    </div>
  </div>
</div>
<?php
// Handle update and remove actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['update_cart']) && isset($_POST['product_id']) && isset($_POST['qty'])) {
    $pid = intval($_POST['product_id']);
    $qty = intval($_POST['qty']);
    if ($qty > 0) {
      $update_cart = "UPDATE card_details SET quantity=$qty WHERE product_id=$pid AND ip_address='$clientIP'";
      mysqli_query($con, $update_cart);
    }
    echo "<script>window.open('cart.php','_self')</script>";
  }
  if (isset($_POST['remove_cart']) && isset($_POST['product_id'])) {
    $pid = intval($_POST['product_id']);
    $delete_query = "DELETE FROM card_details WHERE product_id=$pid AND ip_address='$clientIP'";
    mysqli_query($con, $delete_query);
    echo "<script>window.open('cart.php','_self')</script>";
  }
}
?>

  <!--last child-->
  <!--includes footer-->
  <?php
  include('./includes/footer.php');
  ?>



<!--bootsrap js link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>