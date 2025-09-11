<?php
if(isset($_GET['delete_users'])){
    $delete_id=$_GET['delete_users'];

    //delete query

    $delete_users="delete from user_table where order_id=$delete_id";
    $result_users=mysqli_query($con,$delete_users);
    if($result_users){
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('./index.php?list_users','_self')</script>";
    }
}

?>