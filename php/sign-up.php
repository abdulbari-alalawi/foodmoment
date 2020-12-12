<?php
require_once('connect.php');
$error='';

if (isset($_POST['email']) and isset($_POST['pass1'])) {
    $email=$_POST['email'];
    $password=$_POST['pass1'];
    $role=$_POST['role'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $sql="INSERT INTO `user` (`userID`, `email`, `password`, `role`, `phone`, `address`) 
    VALUES (NULL, '$email', '$password', '$role', '$phone', '$address')";
    if (mysqli_query($connection, $sql)) {
        echo '<script>window.location.href = "../Sign-In.html"; alert("Signed up successfully");</script>';
    } else {
        echo '<script>window.location.href = "../Sign-Up.html"; alert("'. mysqli_error($connection) . '");</script>';
    }
}
