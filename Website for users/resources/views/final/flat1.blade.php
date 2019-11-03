<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Energy Solutions</title>

  <!-- Bootstrap core CSS -->

  <!-- //<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="css/landing-page.min.css" rel="stylesheet">
  <link href="css/landing-page.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Renewable Energy Solutions</a>
      <a class="btn btn-primary" href="http://localhost:8000/production_state">Production Stats</a>
      <a class="btn btn-primary" href="#">About Sectors</a>
      <a class="btn btn-primary" href="http://localhost:8000/consumption_data">User Consumptions</a>
    </div>
  </nav>

<!--
 <div class="wrapper">

      <h1>Usage Chart </h1>
      <canvas id="myChart" width="100" height="50"></canvas>
</div> -->

<div class="container">
  <h2>User Consumption History for Flat 1</h2>

  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Month</th>
      @foreach($monthname as $res)

          <td>{{ $res}} {{now()->year}} </td>
      @endforeach
      </tr>


      <tr>
        <th>Units Used(wh)</th>
      @foreach($allmonth as $res)
          <td>{{ $res}} </td>
      @endforeach
      </tr>

  </table>
</div>

  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>


          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Group 07 2019. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

</body>
