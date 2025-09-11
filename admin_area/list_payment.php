<h3 class="text-center text-secondary">All Payments</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-purple">

    <?php

    $get_payments="select * from user_payments";
    $result=mysqli_query($con,$get_payments);
    $row_count=mysqli_num_rows($result);
    

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No Payments received Yet</h2>";
    }else{
        echo"<tr>
    <th>SL NO</th>
    <th>Invoice NO</th>
    <th>Amount</th>
    <th>Payment_mode</th>
    <th>Date</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $order_id=$row_data['order_id'];
            $payment_id=$row_data['payment_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $payment_mode=$row_data['payment_mode'];
            $date=$row_data['date']; 
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$amount</td>
            <td>$payment_mode</td>
            <td>$date</td>
            <td><a href='index.php?delete_payments=<?php echo $order_id; ?>' type='button' class='text-dark'
             data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a></td>
        </tr>";
        }

    }
    ?>
    </tbody>
</table>
<!-- Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete ?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_payments" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='./index.php?delete_payments=<?php echo $order_id; ?>' 
        class="text-dark text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>