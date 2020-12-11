<?php
require_once('php/login.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Food Moments</title>
    <link rel="icon" href="images/favicon.ico" />

    <!-- Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,900;1,400;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- CSS Stylesheets -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles.css" />

    <!-- Font Awesome -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"
    ></script>

    <!-- Bootstrap Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
    <div id="title" class="border-bottom bg-light">
      <div class="container-fluid">
        <!-- Nav Bar -->
        <nav class="navbar navbar-expand-md navbar-light">
          <a class="navbar-brand brand-name" href="">FOOD MOMENTS</a>

          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarTogglerDemo02"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="restaurants.html">Resturants</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.html">Orders</a>
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

    <div class="title">
      <div class="container-fluid">
        <form class="form-block">
          <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
          />
        </form>
        <h3>EVERY RESTURANT IN YOUR DISTRICT IS AT YOUR HAND</h3>

        <a
          href="restaurants.html"
          class="btn btn-dark btn-md download-button"
          role="button"
        >
          ORDER NOW
        </a>
      </div>
    </div>

    <footer id="footer border border-dark">
      <i class="footer-text">Contact us</i>
      <i class="footer-text">Policy</i>
      <p>© Copyright 2020 Food Moments</p>
    </footer>
  </body>
</html>
