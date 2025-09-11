<?php


session_start();
session_unset();
session_destroy();
echo" <script>window.open('../index.php','_self')</script>";
echo "<script>alert('You have been logged out successfully.')</script>";    
?>