<?php
//include('./includes/connect.php');




function getproducts(){
    global $con;
//condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
    // Fetching products from the database
    $select_products='select * from products order by rand() LIMIT 0,8';
        $result_products=mysqli_query($con,$select_products);
        while($row=mysqli_fetch_assoc($result_products)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1']; 
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-3 mb-2'>
          <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
          <div class='card-body'>
          <?php
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='text-dark'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
          </div>
          </div>";
        }
}
}
}


//getting all products
function get_all_products(){
    global $con;

    //condition to check isset or not
    if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
    // Fetching products from the database
    $select_products='select * from products order by rand()';
        $result_products=mysqli_query($con,$select_products);
        while($row=mysqli_fetch_assoc($result_products)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1']; 
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-3 mb-2'>
          <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='text-dark'>Add to cart</a>
            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
          </div>
          </div>
          </div>";
        }
}
}
}


//getting unique categories
function get_unique_categories(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['category'])){
       $category_id=$_GET['category']; 
    // Fetching products from the database
    $select_products="select * from products where category_id=$category_id";
    $result_products=mysqli_query($con,$select_products);
    $num_of_rows=mysqli_num_rows($result_products);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
    }
    while($row=mysqli_fetch_assoc($result_products)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1']; 
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-3 mb-2'>
        <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class=''text-dark'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
        </div>
        </div>";
        }
    }
}

//getting unique brands
function get_unique_brands(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['brands'])){
       $brand_id=$_GET['brands']; 
    // Fetching products from the database
    $select_products="select * from products where brand_id=$brand_id";
    $result_products=mysqli_query($con,$select_products);
    $num_of_rows=mysqli_num_rows($result_products);
    if($num_of_rows==0){
        echo "<h2 class='text-center text-danger'>No stock for this brand</h2>";
    }
    while($row=mysqli_fetch_assoc($result_products)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1']; 
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-3 mb-2'>
        <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='text-dark'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
        </div>
        </div>";
        }
    }
}

// function for calling categories

function getcategories(){
    global $con;
    // Fetching categories from the database
    $select_categories='select * from categories';
    $result_categories=mysqli_query($con,$select_categories);
    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['cateogory_title'];
        $category_id=$row_data['category_id'];
        //echo "<li class='nav-item'>
        //<a href='index.php?category=$category_id' class='nav-link text-dark'>$category_title</a></li>";
        echo"<li class='list-group-item bg-secondary border-bottom border-white'>
        <a class='nav-link text-light' href='index.php?category=$category_id'>$category_title</a>
        </li>";
    }
}


// function for calling brands
function getbrands(){
   global $con;
    // Fetching brands from the database
    $select_brands='select * from brands';
      $result_brands=mysqli_query($con,$select_brands);
      while($row_data=mysqli_fetch_assoc($result_brands)){
          $brand_title=$row_data['brand_title'];
          $brand_id=$row_data['brand_id'];
          //echo "<li class='nav-item'>
          //<a href='index.php?brands=$brand_id' class='nav-link text-dark'>$brand_title</a></li>";
          echo"<li class='list-group-item bg-secondary border-bottom border-white'>
        <a class='nav-link text-light' href='index.php?brands=$brand_id'>$brand_title</a>
        </li>";
      }
}


//searching products function

function search_products(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="select * from products where product_keywords like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){        
            echo "<h2 class='text-center text-dark'>No results found for '$search_data_value'</h2>";
        } else {
            echo "<h2 class='text-center text-dark'>Results for '$search_data_value'</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
        $product_id=$row['product_id'];
        $product_title=$row['product_title'];
        $product_description=$row['product_description'];
        $product_image1=$row['product_image1']; 
        $product_price=$row['product_price'];
        $category_id=$row['category_id'];
        $brand_id=$row['brand_id'];
        echo "<div class='col-md-3 mb-2'>
        <div class='card'>
        <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'>Price: $product_price/-</p>
        <a href='index.php?add_to_cart=$product_id' class='text-dark'>Add to cart</a>
        <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
        </div>
        </div>
        </div>";
    }
}

}


//view details of products
function view_details(){
    global $con;

    //condition to check isset or not
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        if(!isset($_GET['brands'])){
            $product_id=$_GET['product_id'];
    // Fetching products from the database
    $select_products="select * from products where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row=mysqli_fetch_assoc($result_products)){
          $product_id=$row['product_id'];
          $product_title=$row['product_title'];
          $product_description=$row['product_description'];
          $product_image1=$row['product_image1']; 
          $product_image2=$row['product_image2'];
          $product_image3=$row['product_image3'];
          $product_price=$row['product_price'];
          $category_id=$row['category_id'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-3 mb-2'>
          <div class='card'>
          <img src='./admin_area/product_images/$product_image1' class='card-img-top product-img' alt='$product_title'>
          <div class='card-body'>
            <h5 class='card-title'>$product_title</h5>
            <p class='card-text'>$product_description</p>
            <p class='card-text'>Price: $product_price/-</p>
            <a href='index.php?add_to_cart=$product_id' class='text-dark'>Add to cart</a>
            <a href='index.php' class='btn btn-secondary'>Go Home</a>
          </div>
          </div>
          </div>
          
         
        <div class='col-md-8'>
            <!--related card imaged-->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>Related Products</h4>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top product-img product-img' alt='$product_title'>

                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image3' class='card-img-top product-img' alt='$product_title'>

                </div>
            </div>

        </div>";
        }
}
}
}
}

//get ip address function
function getIPAddress() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        // IP from shared internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // IP passed from a proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        // Direct IP address
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Example usage
//$clientIP = getIPAddress();
//echo "Client IP Address: " . $clientIP;


//cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $clientIP = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from card_details where ip_address='$clientIP' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows>0){

            echo "<script>alert('This item is already present in cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert_query="insert into card_details (product_id,ip_address,quantity) values ($get_product_id,'$clientIP',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//function to get the total items in the cart
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $clientIP = getIPAddress();
        $select_query="select * from card_details where ip_address='$clientIP'";
        $result_query=mysqli_query($con,$select_query);
        $count_cart_items=mysqli_num_rows($result_query);
        } else {
            global $con;
            $clientIP = getIPAddress();
            $select_query="select * from card_details where ip_address='$clientIP'";
            $result_query=mysqli_query($con,$select_query);
            $count_cart_items=mysqli_num_rows($result_query);
        }
        echo $count_cart_items;
    }

    //total price function
    function total_cart_price(){
        global $con;
        $clientIP = getIPAddress();
        $total_price = 0;
        $select_query = "SELECT * FROM card_details WHERE ip_address='$clientIP'";
        $result_query = mysqli_query($con, $select_query);
        while($row = mysqli_fetch_array($result_query)){
            $product_id = $row['product_id'];
            $quantity = $row['quantity'];
            $select_products = "SELECT * FROM products WHERE product_id=$product_id";
            $result_products = mysqli_query($con, $select_products);
            $row_product_price = mysqli_fetch_assoc($result_products);
            $raw_price = $row_product_price['product_price'];
            $unit_price = floatval(str_replace(',', '', $raw_price));
            $total_price += $unit_price * $quantity;
        }
        echo number_format($total_price);
    } 
     
    
    //get user order details

    function get_user_order_details(){
        global $con;
        $username=$_SESSION['username'];
        $get_details="select * from user_table where username='$username'";
        $result_query=mysqli_query($con,$get_details);
        while($row_query=mysqli_fetch_array($result_query)){
            $user_id=$row_query['user_id'];
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                        $get_orders="select * from user_orders where user_id=$user_id and order_status='pending'";
                        $result_orders_query=mysqli_query($con,$get_orders);
                        $row_count=mysqli_num_rows($result_orders_query);
                        if($row_count>0){
                            echo "<h3 class='text-center text-succes my-5 mb-3'>You have <span class='text-danger'>$row_count</span>
                            pending orders</h3>
                            <p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
                        }
                        else{
                            echo "<h3 class='text-center text-succes my-5 mb-3'>You have Zero pending orders</h3>
                            <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
                        }
                    }
                }
            } 
        }
    }
    ?>