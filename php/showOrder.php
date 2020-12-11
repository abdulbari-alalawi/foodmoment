<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>Retreived Order</title>
</head>

<body>
<?php

 $str = '<div class="container">
    <div class="card text-center">
      <div class="card-header h4">
        Macdonald Order
      </div>
      <div class="card-body">
        <h5 class="card-title">From costumer@gmail.com</h5>
        <div class="card-text container w-50 border">
          <h5 class="bg-light border-bottom">Description</h5>
          
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Cras justo odio</li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
          </ul>
        </div>
        <h5 class="card-text"> Total Cost: </h5>
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
       Status: Pending
      </div>
    </div>
  </div> ';

  echo $str;

?>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
    crossorigin="anonymous"></script>

</body>

</html>