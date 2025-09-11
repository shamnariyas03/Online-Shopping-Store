<?php
include('../includes/connect.php');
require_once('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!--bootsrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap 4 CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">


    <!--fontawsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
     integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />

     <style>
    body {
      margin: 0;
      padding: 0;
      background: linear-gradient(135deg, #5f2c82, #49a09d);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
      position: relative;
    }

    .login-box h2 {
      margin-bottom: 30px;
    }

    .input-group {
      position: relative;
    }

    .login-box input[type="text"],
    .login-box input[type="password"] {
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

    .toggle-password {
      position: absolute;
      top: 12px;
      right: 15px;
      cursor: pointer;
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
      transition: background 0.3s ease;
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

    .login-box .forgot {
      margin-top: 10px;
      font-size: 13px;
      color: #999;
    }

    .login-box .forgot a {
      color: #a855f7;
    }
  </style>
</head>
<body>
<div class="login-box">
    <h2>Log in</h2>

    <?php
    if (isset($_SESSION['login_error'])) {
      echo "<p style='color: #ff6b6b; font-size: 14px;'>".$_SESSION['login_error']."</p>";
      unset($_SESSION['login_error']);
    }
    ?>

    <form action="admin_login.php" method="POST">
      <input type="text" name="username" placeholder="Username" required >

      <div class="input-group">
        <input type="password" name="password" id="password" placeholder="Password" required >
        <span class="toggle-password" onclick="togglePassword()">👁</span>
      </div>

      <div class="forgot"><a href="#">Forgot your password?</a></div>
      <br>
      <button type="submit" name="admin_login">Login</button>
    </form>

    <div class="link">
      Don't have an account? <a href="admin_registration.php">Register</a>
    </div>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const toggleIcon = document.querySelector(".toggle-password");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        toggleIcon.textContent = "🙈";
      } else {
        passwordInput.type = "password";
        toggleIcon.textContent = "👁";
      }
    }
  </script>
  </div>
</body>
</html>

<?php
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];

    $select_query="select * from admin_table where admin_name='$admin_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    

    if($row_count>0){
        $_SESSION['admin_name']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
            //echo "<script>alert('Login Successful')</script>";
        
            if($row_count==1){
                $_SESSION['admin_name']=$admin_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>