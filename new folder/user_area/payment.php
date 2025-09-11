<?php
include('../includes/connect.php');
require_once('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>

    <!--bootstap  Css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <!--custom css link-->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!--php code to access user id-->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from user_table where user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];


?>
    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <h2 class="text-center">
            <div class="row d-flex align-items-center justify-content-center my-5">
                <div class="col-md-6">
                    <a href="https://www.paypal.com/in/home" target="_blank"><img src="../images/upi.jpeg" alt="paypal" 
                    style="height: 100px; width: 300px;" class="payment_img"></a>
                </div>
                <div class="col-md-6">
                    <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Offline</h2></a>
                </div>
            </div>
        </h2>
    </div>
</body>
</html>