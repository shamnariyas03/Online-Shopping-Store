<?php
if(isset($_GET['edit_category'])){     //get variable is used
    $edit_category=$_GET['edit_category'];
    $get_categories= "SELECT * FROM categories WHERE category_id=$edit_category";
    $result = mysqli_query($con, $get_categories);
    $row = mysqli_fetch_assoc($result);
    $category_title = $row['cateogory_title'];  // database coulmn name

}

if(isset($_POST['edit_cat'])){   // here name attribute from button is used
    $cat_title=$_POST['category_title'];  //name attribute value from input field to a different variable

    $update="update categories set cateogory_title='$cat_title' where category_id=$edit_category";  
    $result_cat = mysqli_query($con,$update);
    if($result_cat){
        echo "<script>alert('Category is been updated successfully')</script>";
        echo "<script>window.open('index.php?view-categories','_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center text-secondary">Edit Category</h1>
    <form action="" method="post" class="text-center">
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="category_title" class="form-label">Category Title</label>
            <input type="text" id="category_title" value='<?php echo $category_title?>' 
            name="category_title"class="form-control" required="required">
        </div>
        <input type="submit" name="edit_cat" value="update Category" class="bg-purple p-3 mb-3">
    </form>
</div>