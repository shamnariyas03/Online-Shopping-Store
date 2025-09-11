<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  
    <style>
        /* Generic table reset */
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: center;
}


        </style>
</head>
<body>
    

<?php

$username=$_SESSION['username'];
$get_users="select * from user_table where username='$username'";
$result=mysqli_query($con,$get_users);
$row_fetch=mysqli_fetch_assoc($result);
$user_id=$row_fetch['user_id'];
//echo $user_id;
?>
<h3 style="color: #4332afff;"><b>My Orders</b></h3>
    <div class="container-fluid mt-4">
        <table class="table table-bordered table-hover  text-center">
            <thead class="table-dark">
                <tr>
                    <th>SL NO</th>
                    <th>Amount Due</th>
                    <th>Total Products</th>
                    <th>Invoice Number</th>
                    <th>Date</th>
                    <th>Complete/Incomplete</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $get_order_details="select * from user_orders where user_id='$user_id'";
                $result_orders=mysqli_query($con,$get_order_details);
                $number=1;
                while($row_orders=mysqli_fetch_assoc($result_orders)){
                    $order_id=$row_orders['order_id'];
                    $amount_due_raw = $row_orders['amount_due'];
                    $amount_due = number_format((int)str_replace(',', '', $amount_due_raw));
                    $total_products=$row_orders['total_products'];
                    $invoice_number=$row_orders['invoice_number'];
                    $order_status=$row_orders['order_status']=='pending' ? 'Incomplete' : 'Complete';
                    $order_date=$row_orders['order_date'];

                    echo "<tr>
                        <td>$number</td>
                        <td>$amount_due</td>
                        <td>$total_products</td>
                        <td>$invoice_number</td>
                        <td>$order_date</td>
                        <td>$order_status</td>";

                    if($order_status=='Complete'){
                        echo "<td class='text-success fw-bold'>Paid</td>";
                    } else {
                        echo "<td><a href='confirm_payment.php?order_id=$order_id' class='btn btn-sm btn-warning'>Confirm</a></td>";
                    }

                    echo "</tr>";
                    $number++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>