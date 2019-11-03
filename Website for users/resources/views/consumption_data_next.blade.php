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

    </div>
  </nav>


 <div class="wrapper">

      <h1>Usage Chart </h1>
      <canvas id="myChart" width="100" height="50"></canvas>
</div>

<div class="container">
  <h2>User Consumption History</h2>
  <p>May</p>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Flat Number</th>
        <th>Units used(Wh)</th>
        <th>Warning</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Flat 1</td>
        <td>{{$one['0119']}}</td>


      </tr>

      <tr>
        <td>Flat 2</td>
        <td>{{$two['0119']}}</td>


      </tr>

      <tr>
        <td>Flat 3</td>
        <td>{{$three['0119']}}</td>


      </tr>
    </tbody>
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



    <!-- <script src="js/LOL.js"></script> -->
    <!-- <script type="text/javascript" src="js/chart_final.js"></script>
<script type="text/javascript">
// var temp=[];
// var obj = JSON.parse($one);
// temp.push("go");
// temp.push("goe");
// temp.toString();
   MYLIBRARY.init([ $one['0119'] , $one['0219'] ]);
   MYLIBRARY.helloWorld();
</script> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/4.0.0/firebase.js"></script>

<script>

var config = {
  apiKey: "AIzaSyDEtW3f5-oA5Fryl2G1LYnOrfeX8318aWM",
  authDomain: "laravelfirebase-208ac.firebaseapp.com",
  databaseURL: "https://laravelfirebase-208ac.firebaseio.com",
  projectId: "laravelfirebase-208ac",
  storageBucket: "laravelfirebase-208ac.appspot.com",
  messagingSenderId: "723347667432",
  appId: "1:723347667432:web:61ecf4ec29ed959b"
};
firebase.initializeApp(config);

// Get a reference to the database service
var database = firebase.database();

var flat1=[];
var f1 = database.ref().child("ConsumeData").child("Device1").child("month");
f1.on('value',function(datasnapshot){
      b=datasnapshot.val();
      var ind=0;
      datasnapshot.forEach(function(childSnapshot){
      //  alert('Hello Worldone! - ' + childSnapshot.val());
        console.log(childSnapshot.val())
        //flat1.push(childSnapshot.val());
        flat1[ind++]=childSnapshot.val()
      });
});

var flat2=[];
var f2 = database.ref().child("ConsumeData").child("Device2").child("month");
f2.on('value',function(datasnapshot){
      b=datasnapshot.val();
      var ind2=0;
      datasnapshot.forEach(function(childSnapshot){
      //  alert('Hello Worldone! - ' + childSnapshot.val());
        console.log(childSnapshot.val())
        //flat1.push(childSnapshot.val());
        flat2[ind2++]=childSnapshot.val()
      });
});

var flat3=[];
var f3 = database.ref().child("ConsumeData").child("Device3").child("month");
f3.on('value',function(datasnapshot){
      b=datasnapshot.val();
      var ind3=0;
      datasnapshot.forEach(function(childSnapshot){
      //  alert('Hello Worldone! - ' + childSnapshot.val());
        console.log(childSnapshot.val())
        //flat1.push(childSnapshot.val());
        flat3[ind3++]=childSnapshot.val()
      });
});
console.log(flat1.length);


var month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
// For drawing the lines
//var flat1 =[12,13,12.2,17,14,16,11,12,13,14.5];;
//var flat2 = [12,13,12.2,17,14,16,11,12,13,14.5];
//var flat3 = [8,9,8.2,9,11,12,7,8,9,10.5];
console.log(flat1);
console.log(flat2);
console.log(flat3);

var ctx = document.getElementById("myChart");
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: month,
    datasets: [
      {
        data: flat1,
        label: "Flat 1",
        borderColor:"#3e95cd",
        fill:false
      },
      {
        data: flat2,
        label: "Flat 2",
        borderColor:"#000000",
        fill:false
      },
      {
        data: flat3,
        label: "Flat 3",
        borderColor:"#49e5dc",
        fill:false
      }

    ]
  }
});
  // Initialize Firebase
  // TODO: Replace with your project's customized code snippet

  //
  // f1.on('value',function(datasnapshot){
  //
  // datasnapshot.forEach(function(childSnapshot){
  //   //alert('Hello Worldone! - ' + childSnapshot.val());
  //   console.log(childSnapshot.val())
  //
  // });
  //
  // });
  // f1.on('value',function(datasnapshot){
  //
  //   var t=0;
  // datasnapshot.forEach(function(childSnapshot){
  //   //alert('Hello Worldone! - ' + childSnapshot.val());
  //   //temp.push(childSnapshot.val());
  //   //console.log(t);
  //   //t=t+1;
  //   MYLIBRARY.adddata(childSnapshot.val());
  //
  // });

  //});
//  console.log(temp);

  //MYLIBRARY.init([ a ,b  ]);
  //MYLIBRARY.helloWorld();

</script>



</body>
