<?php
require_once('php/login.php');
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
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
  integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- User-Defined CSS -->
  <style>
    body {
      font-family: "Montserrat";
      text-align: center;
    }

    nav {
      text-align: left;
      font-weight: 900;
    }

    .zoom:hover {
      -ms-transform: scale(1.02);
      /* IE 9 */
      -webkit-transform: scale(1.02);
      /* Safari 3-8 */
      transform: scale(1.02);
    }

    .footer {
      font-family: "Montserrat";
      font-weight: 900;
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
      $ary = [];
      $cost = 0;
      $(".addBtn").click(function() {
        $ary.push(parseInt(this.id));
        $.ajax({
          url: "php/getPrice.php?q=" + this.id,
          success: function(data) {
            $cost = parseInt($("#total").text()) + parseInt(data);
            $("#total").html($cost);
          },
        });
      });

      $("#order").click(function() {
        $myJSON = JSON.stringify($ary);
        $.ajax({
          url: "php/insertOrder.php?JSON=" + $myJSON + "&cost=" + $cost,
          success: function(data) {
            window.location.href = data;
          },
        });
      });
    });
  </script>
</head>

<body class="bg-warning">
  <div id="title" class="border-bottom bg-light">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand brand-name" href="">FOOD MOMENTS</a>

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
    <h2 class="display-4 text-white">Macdonald Menu</h2>
    <hr class="border-light" />
    <!--the menu starts here-->
    <div class="container">
      <!--every row has two colomuns of meal cards-->
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/double-meat.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">Double Mac Meal</h4>
                  <p class="card-text">
                    Two floors of delicious cow meet and with some spicy
                    barbeque souce!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>12</span>
                    </div>
                    <button id="1" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/chicken-mac-meal-uae.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">Big Checken Mac Meal</h4>
                  <p class="card-text">
                    Feed your desire with the three floors of tasty fried
                    checken!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>15</span>
                    </div>
                    <button id="2" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/big-mac-meal-uae.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">Big Mac Meal</h4>
                  <p class="card-text">
                    Classic Big Mac with the taste of the delicious original
                    meet!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>10</span>
                    </div>
                    <button id="3" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/mcchicken-meal-uae.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">Mac Chicken Meal</h4>
                  <p class="card-text">
                    Simple but delicious, the taste of the fried chicken will
                    be worth it!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>8</span>
                    </div>
                    <button id="4" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/9pcs-mcnuggets-meal-uae.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">9Pcs Mcnuggets Meal</h4>
                  <p class="card-text">
                    You will be loving it! these little tasty chicken nuggets
                    are adorable!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>11</span>
                    </div>
                    <button id="5" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-6">
          <div class="card mb-3" style="max-width: 540px">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="images/mcarabia-meal-uae.jpg" alt="..." class="img-responsive" />
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h4 class="card-title">McArabia Meal</h4>
                  <p class="card-text">
                    This is our special meal with the amazing taste of the
                    arabic culture!
                  </p>
                  <hr />
                  <div class="row m-0">
                    <div class="col pt-2">
                      <span class="price">Price: <span>&#36;</span>9</span>
                    </div>
                    <button id="6" class="col btn btn-outline-success addBtn">
                      Add
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <hr />
    <br />
    <!--here the order section-->
    <div class="container text-white">
      <div class="row justify-content-end">
        <div class="col-md-4 pt-2">
          <h3 class="fw-bolder">Total Cost: <span id="total">0</span></h3>
        </div>
        <button id="order" class="col-md-2 btn btn-outline-primary">
          <span class="h4">Order</span>
        </button>
      </div>
    </div>
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
</body>

</html>