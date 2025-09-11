<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_tiltle=$_POST['brand_title'];
    //select query
    $select_query="select * from brands where brand_title='$brand_tiltle'";
    $result_select=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($result_select);
    if($num_rows>0){
        echo "<script>alert('This brand is already present in the database')</script>";
    } else {
        //insert query
        $insert_query="insert into brands (brand_title) values('$brand_tiltle')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('brand inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting brand')</script>";
        }
    }
}
?>

<div class="container my-3">
    <h3 class="text-center mb-4">Insert Brands</h3>
    <form action="" method="post" class="mx-auto" style="max-width: 500px;">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-secondary" id="basic-addon1">
                <i class="fa-solid fa-recipient"></i></span>
                <input type="text" class="form-control" name="brand_title" placeholder="insert brands">
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="text-light bg-secondary p-2 my-3 border-0" name="insert_brand" value="insert brands">
        </div>
    </form>
</div>

