<?php
if(isset($_GET['delete_orders'])){
    $delete_order=$_GET['delete_orders'];

    //delete query

    $delete_orders="delete from user_orders where order_id=$delete_order";
    $result_orders=mysqli_query($con,$delete_orders);
    if($result_orders){
        echo "<script>alert('orders deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_orders','_self')</script>";
    }
}

?>