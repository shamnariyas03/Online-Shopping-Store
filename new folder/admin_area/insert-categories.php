<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_tiltle=$_POST['cat_title'];
    //select query
    $select_query="select * from categories where cateogory_title='$category_tiltle'";
    $result_select=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($result_select);
    if($num_rows>0){
        echo "<script>alert('This category is already present in the database')</script>";
    } else {
        //insert query
        $insert_query="insert into categories (cateogory_title) values('$category_tiltle')";
        $result=mysqli_query($con,$insert_query);
        if($result){
            echo "<script>alert('Category inserted successfully')</script>";
        } else {
            echo "<script>alert('Error inserting category')</script>";
        }
    }
}
?>


<div class="container my-3">
    <h3 class="text-center mb-4">INSERT CATEGORY</h3>
    <form action="" method="post" class="mx-auto" style="max-width: 500px;">
        <div class="input-group w-90 mb-2">
            <span class="input-group-text bg-secondary" id="basic-addon1">
                <i class="fa-solid fa-recipient"></i></span>
                <input type="text" class="form-control" name="cat_title" placeholder="insert categories" 
                aria-label="Categories" aria-describedby="basic-addon1">
        </div>
        <div class="input-group w-10 mb-2 m-auto">
            <input type="submit" class="bg-secondary text-light p-2 my-3 border-0" name="insert_cat" value="insert categories">
        </div>
    </form>
</div>