<?php
// Database connection

$con = mysqli_connect(
    "sql207.infinityfree.com",   // Hostname
    "if0_39907468",               // MySQL Username
    "KdXJfJUmglDDJ",              // MySQL Password
    "if0_39907468_ecommerce_db"   // Database Name
);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>


