<?php

if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from user_table where username='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $username=$row_fetch['username'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $username=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image1=$_FILES['user_image']['name'];
        $user_image_tmp=$_FILES['user_image']['tmp_name']; 
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");


        //update query
        $update_data="update user_table set username='$username',user_email='$user_email',
        user_image='$user_image',user_address='$user_address',user_mobile='$user_mobile'
        where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
            echo"<script>window.open('logout.php','_self')</script>";
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    .edit_image{
    width:100px;
    height:100px;
    object-fit:contain;
  }
    </style>
</head>
<body>
    <div class="container mt-5">
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data" class="mx-auto p-4 bg-light rounded shadow" style="max-width: 500px;">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" class="form-control" value="<?php echo $username ?>" name="user_username">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email">
        </div>
        <div class="mb-3 d-flex align-items-center">
            <label class="form-label me-2">Profile Image</label>
            <input type="file" class="form-control" name="user_image">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_image ms-3">
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control" value="<?php echo $user_address ?>" name="user_address">
        </div>
        <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="text" class="form-control" value="<?php echo $user_mobile ?>" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="btn btn-primary w-100" name="user_update">
    </form>
    </div>
</body>
</html>