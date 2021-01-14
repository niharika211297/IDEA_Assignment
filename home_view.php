<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/png" href="corona.jpg">
    <title>Covid-19 Tracker</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/form-validation.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/custom.css">
    
  </head>
  <body class="bg-dark">
    <div class="container">
    <div class="py-5 text-center">
        <img class="d-block mb-4 banner-logo" src="icon.jpg" alt="">
    </div>

  <div class="row p-5">
    <div class="col-md-12 order-md-1">
      <form class="needs-validation" id="form-id" novalidate>
        <div class="row">
          <div class="col-md-6 mb-3">
            <input type="text" class="form-control" id="stateCode" placeholder="Enter State Code" value="" autofocus required>
            <div class="invalid-feedback">
              State Code is Required
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <input type="date" class="form-control" id="startDate" placeholder="" value="" required>
            <div class="invalid-feedback">
              Invalid Start Date
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <input type="date" class="form-control" id="endDate" placeholder="" value="" required>
            <div class="invalid-feedback">
              Invalid End Date
            </div>
          </div>
        </div>
        <hr class="mb-4">
        <button class="btn btn-primary col-2 offset-3" id="getData" type="submit">Fetch Data</button>
      </form>
    </div>
  </div>

<div class="row text-center" id="highlights" style="display: none;">
  <div class="card border-primary text-white bg-warning m-2 highlight-card">
    <div class="card-header" style="font-weight: bold">Active</div>
    <div class="card-body">
      <h5 class="card-title mt-4" id="active_cases">20000</h5>
    </div>
  </div>
  <div class="card text-white bg-success m-2 highlight-card">
  <div class="card-header" style="font-weight: bold">Recovered</div>
  <div class="card-body">
  <p class="card-text mb-0 diff-font-size" id="recovered_diff">+2000</p>
      <h5 class="card-title mt-0" id="recovered">20000</h5>
  </div>
</div>
<div class="card text-white bg-danger m-2 highlight-card">
  <div class="card-header" style="font-weight: bold">Confirmed</div>
  <div class="card-body">
  <p class="card-text mb-0 diff-font-size" id="confirmed_diff">+2000</p>
      <h5 class="card-title mt-0" id="confirmed">20000</h5>
  </div>
</div>
  <div class="card text-white bg-secondary m-2 highlight-card">
    <div class="card-header" style="font-weight: bold">Deceased</div>
    <div class="card-body">
    <p class="card-text mb-0 diff-font-size" id="deceased_diff">+2000</p>
      <h5 class="card-title mt-0" id="deceased">20000</h5>
    </div>
  </div>
</div>

  <div id="output" class="p-3">

  </div>  

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>  
<script src="js/form-validation.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/home.js"></script>
</body>
</html>
