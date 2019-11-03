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
var a;
var b;
var f1 = database.ref().child("ConsumeData").child("Device1").child("month").child("0119");
f1.on('value',function(datasnapshot){
    a=datasnapshot.val();
});
f1 = database.ref().child("ConsumeData").child("Device1").child("month").child("0219");
f1.on('value',function(datasnapshot){
    b=datasnapshot.val();
});



var month = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
// For drawing the lines
var flat1 = [10,11,10.2,15,12,14,9,10,11,12.5];
var flat2 = [12,13,12.2,17,14,16,11,12,13,14.5];
var flat3 = [8,9,8.2,9,11,12,7,8,9,10.5];


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
