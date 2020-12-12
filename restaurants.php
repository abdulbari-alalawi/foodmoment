<?php
require_once('php/login.php');
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
  integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
      font-size: 3em;
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

    .zoom:hover {
      -ms-transform: scale(1.02);
      /* IE 9 */
      -webkit-transform: scale(1.02);
      /* Safari 3-8 */
      transform: scale(1.02);
    }
  </style>


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
  rel="stylesheet" />

  <!-- Font Awesome -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <title>Food Moments</title>
  <link rel="icon" href="images/favicon.ico" />




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
              <a class="nav-link" href="./">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="restaurants.php">Resturants</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="orders.php">Orders</a>
            </li>


            <li class="nav-item">
              <?php if (isset($_SESSION['email'])) : ?>
                <a class="nav-link" href="php/logout.php">Logout</a>
              <?php else : ?>
                <a class="nav-link" href="Sign-In.html">Login</a>
              <?php endif; ?>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <br />

  <section class="container border-right border-left">
    <h2 class="display-4 text-white">Order From Popular Restuarants!</h2>
    <hr class="border-light" />
    <div class="row">
      <div class="col ">
        <a class="card nav-link shadow bg-secondary text-white h-100 zoom" href="mac-menu.php">
          <img src="images/mac-logo.jpg" class="card-img h-75" alt="...">
          <div class="card-img-overlay-bottom">
            <h3 class="card-title">Macdonald </h5>
              <br />
              <br />
          </div>
        </a>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col ">
        <a class="card nav-link shadow bg-secondary text-white h-100 zoom" href="#">
          <img src="images/burger-king-logo.jpg" class="card-img h-75" alt="...">
          <div class="card-img-overlay-bottom">
            <h3 class="card-title">Burger King </h5>
              <br />
              <br />
          </div>
        </a>
      </div>
    </div>
    <hr />
    <div class="row">
      <div class="col ">
        <a class="card nav-link shadow bg-secondary text-white h-100 zoom" href="#">
          <img src="images/subway-logo.png" class="card-img h-75" alt="...">
          <div class="card-img-overlay-bottom">
            <h3 class="card-title">Subway </h5>
              <br />
              <br />
          </div>
        </a>
      </div>
    </div>
    <br />
  </section>




  <!-- Footer -->
  <footer class="footer border-top bg-light mt-5">
    <br />
    <i class="footer-text">Contact us</i>
    <i class="footer-text">Policy</i>
    <p>© Copyright 2020 Food Moments</p>
    <br />

  </footer>




  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>