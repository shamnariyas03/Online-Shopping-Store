<?php
include('../includes/connect.php');
require_once('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!--bootsrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    
    <!--css file-->
    <link rel="stylesheet" href="../style.css">

    <!--fontawsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
     integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
     <style>
  * {
    scrollbar-width: none; /* for Firefox */
}
.image-fluid{
    max-width: 100%;
    height: auto;
    display:block;
    margin:auto;
}
</style>
</head>
<body>
    <div class="container-fluid mt-3">
        <h3 class="text-center text-info"><u><b>Admin Registration</u></b></h3>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-4">
                <img src="../images/admin.jpeg" alt="admin registration" 
                class="image-fluid">
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4 fw-bold">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" placeholder="Enter your username" required="required" name="username"
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4 fw-bold">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" placeholder="Enter your Email" required="required" name="email"
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4 fw-bold">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" placeholder="Enter your Password" required="required" name="password" 
                        class="form-control"/>
                    </div>
                    <div class="form-outline mb-4 fw-bold">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" id="confirm_password" placeholder="Confirm your Password" required="required" name="confirm_password" 
                        class="form-control"/>
                    </div>
                    <div>
                        <input type="submit" value="Register" class="btn btn-info py-2 px-3 border-0" name="admin_registration">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="admin_login.php">Login</a></p>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


<!--php code to insert user data-->
<?php
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username']; //name attribute 
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $admin_confirm_password=$_POST['confirm_password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    

    //select query
    $select_query="select * from admin_table where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or email already exists')</script>";
    }
    else if($admin_password!=$admin_confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }
    else{
        //inserting user data
        
        $insert_query="insert into admin_table (admin_name,admin_email,admin_password)
        values('$admin_username','$admin_email','$hash_password')";
        $sql_execute=mysqli_query($con,$insert_query);
        if($sql_execute){
            echo "<script>alert('Data inserted successfully')</script>";
        }
        else{
            die(mysqli_error($con));
        }
    }

}
?>