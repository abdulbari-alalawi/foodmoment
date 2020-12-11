<?php
require_once('login.php');
$JSON = $_GET['JSON'];
$cost = intval($_GET['cost']);
$sql = "INSERT INTO `order` (`orderID`, `userID`, `restID`, `STATUS`, `cost`) VALUES (NULL, '" . $_SESSION['ID'] . "', '1', '0', '" . $cost . "');";
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

$arr = json_decode($JSON);

$sql = 'SELECT MAX(orderID) AS orderID FROM `order` WHERE userID = "' . $_SESSION['ID'] . '"';
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$row = $result->fetch_assoc();
$orderID = $row['orderID'];
$arr2 = [];
for ($i=0; $i < sizeof($arr); $i++) { 
    $sql = 'SELECT itemID FROM `orderitems` WHERE orderID = ' . $orderID . ' AND itemID =' . $arr[$i];
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $sql = 'UPDATE `orderitems` SET quantity = quantity + 1 WHERE orderID = '. $orderID . ' AND itemID =' . $arr[$i];
    } else {
        $sql = "INSERT INTO `orderitems` (`orderID`, `itemID`, `quantity`) VALUES ('" . $orderID . "', '" . $arr[$i] . "', '1')";
    }
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
}
