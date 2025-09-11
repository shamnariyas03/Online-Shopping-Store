<h3 class="text-center text-secondary">All Users</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-purple">

    <?php

    $get_users="select * from user_table";
    $result=mysqli_query($con,$get_users);
    $row_count=mysqli_num_rows($result);
    

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No users  Yet</h2>";
    }else{
        echo"<tr>
    <th>SL NO</th>
    <th>Username</th>
    <th>Email</th>
    <th>user image</th>
    <th>user address</th>
    <th>user mobile</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody class='bg-secondary text-light'>";
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $user_id=$row_data['user_id'];
            $username=$row_data['username'];
            $user_email=$row_data['user_email'];
            $user_image=$row_data['user_image'];
            $user_address=$row_data['user_address'];
            $user_mobile=$row_data['user_mobile']; 
            $number++;
            echo "<tr>
            <td>$number</td>
            <td>$username</td>
            <td>$user_email</td>
            <td><img src='../user_area/user_images/$user_image' alt='$username' class='img-fluid' style='max-width: 100px;'></td>
            <td>$user_address</td>
            <td>$user_mobile</td>
            <td><a href='index.php?delete_users=<?php echo $user_id; ?>' type='button' class='text-dark'
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?list_users" 
        class="text-light text-decoration-none">No</a></button>
        <button type="button" class="btn btn-primary"><a href='./index.php?delete_users=<?php echo $user_id; ?>' 
        class="text-dark text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>