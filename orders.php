<?php
require_once("php/login.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" />
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- User-Defined CSS -->
  <style>
    body {
      font-family: "Montserrat";
      font-weight: 900;
      text-align: center;
    }

    h3 {
      font-family: "Montserrat";
      font-weight: 900;
      color: #ffffff;
      line-height: 1.5;
      font-size: 2.8em;
    }

    .title {
      background-image: url("../images/burger-img.jpg");
      height: 31.25em;
      background-repeat: no-repeat;
      background-position: center;
      background-size: cover;
      text-align: center;
      padding: 7% 9%;
    }

    nav {
      text-align: left;
    }
  </style>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
  rel="stylesheet" />

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <title>Food Moments</title>
  <link rel="icon" href="images/favicon.ico" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
    $(document).ready(function() {



    });
  </script>
</head>

<body class="bg-warning">
  <div id="title" class="border-bottom bg-light">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand brand-name" href="./">FOOD MOMENTS</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="restaurants.php">Resturants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">Orders</a>
            </li>

            <li class="nav-item">
            <?php if (isset($_SESSION['email'])) :?>
              <a class="nav-link" href="php/logout.php">Logout</a>
            <?php else :?>
              <a class="nav-link" href="Sign-In.html">Login</a>
            <?php endif;?>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <br />

  <section class="container border-right border-left">


    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2) : ?>
      <h2 class="display-4 text-white">Requested Orders</h2>
      <hr class="border-light" />
      <div id="orders" class="container my-5">

        <?php

        $sql = "SELECT * FROM `order` ORDER BY CustomerName DESC";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        while ($row = mysqli_fetch_array($result)) : ?>
          <div class="container">
            <div class="card text-center my-3">
              <div class="card-header h4">
                <?php
                $sql = "SELECT `restName` FROM `restaurant` WHERE restID = (SELECT restID FROM `order` WHERE orderID = "
                 . $row['orderID'] . ")";
                $nameRest = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $restName = mysqli_fetch_array($nameRest)['restName'];
                echo $restName;
                ?> Order</div>
              <div class="card-body">
                <h5 class="card-title">From 
                <?php $sql = "SELECT `email` FROM `user` WHERE userID = (SELECT `userID` FROM `order` WHERE orderID = "
                 . $row['orderID'] . ")";
                $emailQuery =  mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $email = mysqli_fetch_array($emailQuery)['email'];
                echo $email;
                ?>
                </h5>
                <div class="card-text container w-50 border">
                  <h5 class="bg-light border-bottom">Description</h5>
                  <ul class="list-group list-group-flush">
                    <?php
                    $sql = "SELECT item.ItemName, orderitems.quantity FROM `item`
                     INNER JOIN `orderitems` on item.itemID = orderitems.itemID
                      WHERE orderitems.orderID=" . $row['orderID'];
                    $itemsQuery = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                    while ($item = mysqli_fetch_array($itemsQuery)) {
                        echo '<li class="list-group-item">' . $item['ItemName'] . ' X' . $item['quantity'];
                    }
                    ?>
                  </ul>
                </div>
                <h5 class="card-text"> Total Cost:
                  <?php echo $row['cost'] . "<span>&#36;</span>";?>
                </h5>
                <hr />
                <div class="container w-50">
                  <div class="row">
                    <div class="col-md-6">
                      <button class="btn btn-primary">Accept</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-primary">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                Status: 
                <?php
                switch ($row['STATUS']) {
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
                ?>

              </div>
            </div>
          </div>

            <?php
        endwhile;
    elseif (isset($_SESSION['role']) && $_SESSION['role'] == 1) :?>
        <h2 class="display-4 text-white">Orders</h2>
        <hr class="border-light" />
        <div id="orders" class="container">

        <?php
        $sql = "SELECT * FROM `order` WHERE userID=" . $_SESSION['ID'] . " ORDER BY orderID DESC";
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        while ($row = mysqli_fetch_array($result)) : ?>
          <div class="container">
            <div class="card text-center mb-5">
              <div class="card-header h4">
              <?php
                $sql = "SELECT `restName` FROM `restaurant` WHERE restID = (SELECT restID FROM `order` WHERE orderID = "
                 . $row['orderID'] . ")";
                $nameRest = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $restName = mysqli_fetch_array($nameRest)['restName'];
                echo $restName;
                ?> Order</div>
              <div class="card-body">
                <h5 class="card-title">From 
                <?php $sql = "SELECT `email` FROM `user` WHERE userID = (SELECT `userID` FROM `order` WHERE orderID = "
                 . $row['orderID'] . ")";
                $emailQuery =  mysqli_query($connection, $sql) or die(mysqli_error($connection));
                $email = mysqli_fetch_array($emailQuery)['email'];
                echo $email;
                ?>
                </h5>
                <div class="card-text container w-50 border">
                  <h5 class="bg-light border-bottom">Description</h5>
                  <ul class="list-group list-group-flush">
                    <?php
                    $sql = "SELECT item.ItemName, orderitems.quantity FROM `item`
                     INNER JOIN `orderitems` on item.itemID = orderitems.itemID
                      WHERE orderitems.orderID=" . $row['orderID'];
                    $itemsQuery = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                    while ($item = mysqli_fetch_array($itemsQuery)) {
                        echo '<li class="list-group-item">' . $item['ItemName'] . ' X' . $item['quantity'];
                    }
                    ?>
                  </ul>
                </div>
                <h5 class="card-text"> Total Cost:
                  <?php echo $row['cost'] . "<span>&#36;</span>";?>
                </h5>
                <hr />
                <div class="container w-50">
                  <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-primary cancel" id="">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer text-muted">
                Status: 
                <?php
                switch ($row['STATUS']) {
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
                ?>
              </div>
            </div>
          </div>
        <?php endwhile;

        ?>

    <?php else :
        echo '<h3>Sign in to review it</h3>';
    endif;
    ?>
      </div>
  </section>

  <!-- Footer -->
  <footer class="footer border-top bg-light mt-5 ">
    <br />
    <i class="footer-text">Contact us</i>
    <i class="footer-text">Policy</i>
    <p>© Copyright 2020 Food Moments</p>
    <br />
  </footer>
</body>

</html>