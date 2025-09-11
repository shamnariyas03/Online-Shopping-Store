<?php
//Database connection

$con= mysqli_connect('localhost','root','','mystore');
if (!$con) {
    die( mysqli_connect_error($con));
}
?>
