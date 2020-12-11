<?php
require_once('config.php');
$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);
if (!$connection) {
    die("Database Connection Failed" . mysqli_error($connection));
}
