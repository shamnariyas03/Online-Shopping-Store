<?php
if(isset($_GET['delete_brands'])){
    $delete_id=$_GET['delete_brands'];

    //delete query

    $delete_brands="delete from brands where brand_id=$delete_id";
    $result_brands=mysqli_query($con,$delete_brands);
    if($result_brands){
        echo "<script>alert('brands deleted successfully')</script>";
        echo "<script>window.open('./index.php?view-brands','_self')</script>";
    }
}

?>