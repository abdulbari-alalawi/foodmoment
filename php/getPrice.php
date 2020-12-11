<?php
require_once('connect.php');
$q = intval($_GET['q']);
$sql = 'SELECT `itemPrice` FROM  `item` WHERE `itemID` = ' . $q;
$result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
$row = mysqli_fetch_array($result);
echo $row['itemPrice'];
