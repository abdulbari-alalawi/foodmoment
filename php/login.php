<?php
session_start();
require('connect.php');
$error='';

if (isset($_POST['email']) and isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `user` WHERE email = '" . $email . "' and password='" . $password . "'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count==1) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['ID'] = $row['userID'];
        $_SESSION['role'] = $row['role'];
    } else {
        $fmsg = "Invalid Login Credentials.";
    }
}

if (isset($_POST['email'])) {
    if (isset($_SESSION['email'])) {
        echo '<script>window.location.href = "../";</script>';
    } else {
        echo '<script>window.location.href = "../Sign-In.html"; alert("wrong!")</script>';
    }
}
