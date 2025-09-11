<?php
include('../includes/connect.php');
if(isset($_POST['insert_products'])){

    //getting the text data from the fields
    $product_title=$_POST['product_tilte'];
    $product_description=$_POST['description'];
    $product_keywords=$_POST['keywords'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //image
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //image temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //validating empty fields
    if($product_title=='' or $product_description=='' or $product_keywords=='' or 
       $product_category=='' or $product_brand=='' or $product_image1=='' or 
       $product_image2=='' or $product_image3=='' or $product_price==''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }else{

        //move image to folder
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
    move_uploaded_file($temp_image3,"./product_images/$product_image3");

    //insert query
    $insert_query="insert into products (product_title, product_description, product_keywords, 
    category_id, brand_id, product_image1, product_image2, product_image3, product_price,date,status) 
    values ('$product_title', '$product_description', '$product_keywords', '$product_category', 
    '$product_brand', '$product_image1', '$product_image2', '$product_image3','$product_price',NOW(),'$product_status')";
    }

    //execute query
    $result_query=mysqli_query($con,$insert_query);
    //check if query was successful
    if($result_query){
        echo "<script>alert('Product inserted successfully')</script>";
        echo "<script>window.open('index.php?insert-product','_self')</script>";
    } else {
        echo "<script>alert('Error inserting product')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products -Admin Dashboard</title>
    <!--bootstap  Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    
    <!--fontawsome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
     integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--custom css link-->
    <link rel="stylesheet" href="style.css">

</head>
<body class="bg-dark"style="color: #a394faff;">
    <div class="container mt-3">
        <h1 class="text-center">INSERT PRODUCT</h1>
        <!-- Form to insert products -->
         <form action="" method="post" enctype="multipart/form-data">
            <!-- Product Title -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-label">Product Title</label>
                <input type="text" name="product_tilte" id="product_title" 
                class="form-control b-secondary"  placeholder="insert the product title" autocomplete="off" required="required">
            </div>

            <!-- Product Description -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="description" class="form-label">Product Description</label>
                <input type="text" name="description" id="description" 
                class="form-control" placeholder="Enter Product Description " autocomplete="off" required="required">
            </div>

            <!-- Product Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="keywords" class="form-label">Product Keywords</label>
                <input type="text" name="keywords" id="keywords" 
                class="form-control" placeholder="Enter Product Keywords " autocomplete="off" required="required">
            </div>

            <!-- Product Category -->
            <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" class="form-control" id="">
                <option value="">select a category</option>
                <?php
                $select_query='select * from categories';
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['cateogory_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
            </select>
            </div>
            <!-- Product Brand -->
            <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brand" class="form-control" id="">
                <option value="">select a brand</option>
                <?php
                $select_query='select * from brands';
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
            </select>
            </div>
            <!-- Product Image 1-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image1" class="form-label">Product image1</label>
                <input type="file" id="product_image1" name="product_image1" class="form-control" required="required">
            </div>

            <!-- Product Image 2-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image2" class="form-label">Product image2</label>
                <input type="file" id="product_image2" name="product_image2" class="form-control" required="required">
            </div>

            <!-- Product Image 3-->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_image3" class="form-label">Product image3</label>
                <input type="file" id="product_image3" name="product_image3" class="form-control" required="required">
            </div>
            <!-- Product Price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_Price" class="form-label">Product Price</label>
                <input type="text" name="product_price" id="Product_price" 
                class="form-control" placeholder="Enter Product Price " autocomplete="off" required="required">
            </div>

            <!-- insert product-->
             <div class="form-outline mb-4 w-50 m-auto d-flex">
                <input type="submit" name="insert_products" value="Insert products" 
                class="btn btn-info mb-3 px-3">
                <p class="small fw-bold mt-2 pt-1"><a href="index.php"class="text-light"> Go Back</a></p>
             </div>
         </form>
    </div>
    


</body>
</html>