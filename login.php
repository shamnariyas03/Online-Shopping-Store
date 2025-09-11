<?php
include('./includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css">

  <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #5f2c82, #49a09d);
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    .login-box {
      background: #1e1e2f;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.25);
      width: 350px;
      color: white;
      text-align: center;
    }
    .login-box h2 {
      margin-bottom: 30px;
    }
    .login-box input {
      background: #2e2e42;
      border: none;
      padding: 15px;
      width: 100%;
      margin-bottom: 20px;
      border-radius: 10px;
      color: white;
    }
    .login-box input::placeholder {
      color: #aaa;
    }
    .login-box button {
      background: #a855f7;
      border: none;
      padding: 12px;
      width: 100%;
      border-radius: 12px;
      color: white;
      font-weight: bold;
      cursor: pointer;
    }
    .login-box button:hover {
      background: #9333ea;
    }
    .login-box .link {
      margin-top: 20px;
      color: #bbb;
      font-size: 14px;
    }
    .login-box .link a {
      color: #a855f7;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>

    <?php
    if (isset($_SESSION['login_error'])) {
      echo "<p style='color:#ff6b6b;font-size:14px;'>".$_SESSION['login_error']."</p>";
      unset($_SESSION['login_error']);
    }
    ?>

    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>

    <div class="link">
      <p>👉 Don’t have an account?</p>
      <a href="./user_area/user_registration.php">Register as User</a> | 
      <a href="./admin_area/admin_registration.php">Register as Admin</a>
    </div>
  </div>
</body>
</html>

<?php
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];

    // ✅ Check Admin
    $admin_query = "SELECT * FROM admin_table WHERE admin_name='$username'";
    $result_admin = mysqli_query($con, $admin_query);
    if ($result_admin && mysqli_num_rows($result_admin) > 0) {
        $row_admin = mysqli_fetch_assoc($result_admin);
        if (password_verify($password, $row_admin['admin_password'])) {
            $_SESSION['admin_name'] = $row_admin['admin_name'];
            echo "<script>alert('Admin login successful');</script>";
            echo "<script>window.open('./admin_area/index.php','_self');</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password for Admin');</script>";
            exit();
        }
    }

    // ✅ Check User
    $user_query = "SELECT * FROM user_table WHERE username='$username'";
    $result_user = mysqli_query($con, $user_query);
    if ($result_user && mysqli_num_rows($result_user) > 0) {
        $row_user = mysqli_fetch_assoc($result_user);
        if (password_verify($password, $row_user['user_password'])) {
            $_SESSION['username'] = $row_user['username'];
            echo "<script>alert('User login successful');</script>";
            echo "<script>window.open('./user_area/profile.php','_self');</script>";
            exit();
        } else {
            echo "<script>alert('Invalid password for User');</script>";
            exit();
        }
    }

    // ✅ If no account found
    echo "<script>
        if(confirm('No account found with this username. Do you want to register as a User?')) {
            window.open('./user_area/user_registration.php','_self');
        } else {
            window.open('./admin_area/admin_registration.php','_self');
        }
    </script>";
    exit();
}
?>