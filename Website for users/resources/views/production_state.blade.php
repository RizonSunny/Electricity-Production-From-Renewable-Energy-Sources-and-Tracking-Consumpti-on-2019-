<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Energy Solutions</title>

  <!-- Bootstrap core CSS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
      <a class="navbar-brand" href="http://localhost:8000/home">Home</a>
      <a class="btn btn-primary" href="#">About Sectors</a>
      <a class="btn btn-primary" href="#">User Consumptions</a>
    </div>
  </nav>


 <div class="wrapper">

      <h1>State of Production</h1>
      <canvas id="myChart" width="100" height="50"></canvas>
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

    <!-- <script src="js/chart.js"></script> -->

    <script>

        var month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
        // For drawing the lines
        var production = [35,36,36.2,31,38,35,35,36,37,38.5];
        var flat1 = [10,11,10.2,15,12,14,9,10,11,12.5];
        var flat2 = [12,13,12.2,17,14,16,11,12,13,14.5];
        var flat3 = [8,9,8.2,9,11,12,7,8,9,10.5];
        var sum= [flat1[0]+flat2[0]+flat3[0] , flat1[1]+flat2[1]+flat3[1] ];





        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: month,
            datasets: [
              {
                data: sum,
                label: "Usage",
                borderColor:"#3e95cd",
                fill:false
              },
              {
                data: production,
                label: "Production",
                borderColor:"#3e95cd",
                fill:false
              }

            ]
          }
        });

    </script>

</body>
