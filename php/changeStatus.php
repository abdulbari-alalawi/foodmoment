<?php
require_once('connect.php');
require_once("php/login.php");

$st = intval($_GET['st']);
$orderID = intval($_GET['orderID']);

$sql = 'UPDATE `order` SET `STATUS` = "' . $st . '" WHERE `orderID` = ' . $orderID;

$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));

switch ($st) {
  case 0:
    echo "PENDING";
    break;
  case 1:
    echo "ACCEPTED";
    break;
  case 2:
    echo "Delivered";
    break;
  case 3:
    echo "Cancelled";
    break;

  default:
    # code...
    break;
}