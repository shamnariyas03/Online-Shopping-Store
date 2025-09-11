<?php
if(isset($_GET['edit_brands'])){   // get variable declared in view-brands.php (edit icon table data)
    $edit_brands=$_GET['edit_brands']; 
    $get_brands="select * from brands where brand_id='$edit_brands'";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];   //database column name
}

if(isset($_POST['edit_brands'])){     // name attribute value from button
    $brands_title=$_POST['brand_title'];   // name attribute value from input field

    $update_brand="update brands set brand_title='$brands_title' where brand_id='$edit_brands'";
    $result_brand=mysqli_query($con,$update_brand);
    if($result_brand){
        echo "<script>alert('Brands is been updated successfully')</script>";
        echo "<script>window.open('index.php?view-brands','_self')</script>";
    }
}
?>
<div class="container mt-3">
    <h1 class="text-center text-secondary">Edit Brands</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="brand_title" class="form-label">Brand Title</label>
            <input type="text" id="brand_title" value='<?php echo $brand_title?>' 
            name="brand_title"class="form-control" required="required">
        </div>
        <input type="submit" name="edit_brands" value="update Brands" class="bg-purple p-3 mb-3">
    </form>
</div>