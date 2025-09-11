<?php
if(isset($_GET['delete_payments'])){
    $delete_id=$_GET['delete_payments'];

    //delete query

    $delete_payments="delete from user_payments where order_id=$delete_id";
    $result_payments=mysqli_query($con,$delete_payments);
    if($result_payments){
        echo "<script>alert('payement deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_payments','_self')</script>";
    }
}

?>