<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	zoomEnabled: true,
	theme: "dark2",
	title:{
		text: "Electricity Production and Usage"
	},
	axisX:{
		title: "Year",
		valueFormatString: "####",
		interval: 2
	},
	axisY:{
		logarithmic: true, //change it to false
	//	title: "Internet Users (Log)",
		titleFontColor: "#6D78AD",
		lineColor: "#6D78AD",
		gridThickness: 0,
		lineThickness: 1,
		includeZero: false,
		labelFormatter: addSymbols
	},
	axisY2:{
	//	title: "Internet Users",
		titleFontColor: "#51CDA0",
		logarithmic: false, //change it to true
		lineColor: "#51CDA0",
		gridThickness: 0,
		lineThickness: 1,
		labelFormatter: addSymbols
	},
	legend:{
		verticalAlign: "top",
		fontSize: 16,
		dockInsidePlotArea: true
	},
	data: [{
		type: "line",
		xValueFormatString: "####",
		showInLegend: true,
		name: "Production",


		dataPoints: [
			{ x: 1994, y: 25437639 },
			{ x: 1995, y: 44866595 },
			{ x: 1996, y: 77583866 },
			{ x: 1997, y: 120992212 },
			{ x: 1998, y: 188507628 },
			{ x: 1999, y: 281537652 },
			{ x: 2000, y: 414794957 },
			{ x: 2001, y: 502292245 },
			{ x: 2002, y: 665065014 },
			{ x: 2003, y: 781435983 },
			{ x: 2004, y: 913327771 },
			{ x: 2005, y: 1030101289 },
			{ x: 2006, y: 1162916818 },
			{ x: 2007, y: 1373226988 },
			{ x: 2008, y: 1575067520 },
			{ x: 2009, y: 1766403814 },
			{ x: 2010, y: 2023202974 },
			{ x: 2011, y: 2231957359 },
			{ x: 2012, y: 2494736248 },
			{ x: 2013, y: 2728428107 },
			{ x: 2014, y: 2956385569 },
			{ x: 2015, y: 3185996155 },
			{ x: 2016, y: 3424971237 }
		]
	},
	{
		type: "line",
		xValueFormatString: "####",
		axisYType: "secondary",
		showInLegend: true,
		name: "Usage",
		dataPoints: [
			{ x: 1994, y: 25437639 },
			{ x: 1995, y: 44866595 },
			{ x: 1996, y: 77583866 },
			{ x: 1997, y: 120992212 },
			{ x: 1998, y: 188507628 },
			{ x: 1999, y: 281537652 },
			{ x: 2000, y: 414794957 },
			{ x: 2001, y: 502292245 },
			{ x: 2002, y: 665065014 },
			{ x: 2003, y: 781435983 },
			{ x: 2004, y: 913327771 },
			{ x: 2005, y: 1030101289 },
			{ x: 2006, y: 1162916818 },
			{ x: 2007, y: 1373226988 },
			{ x: 2008, y: 1575067520 },
			{ x: 2009, y: 1766403814 },
			{ x: 2010, y: 2023202974 },
			{ x: 2011, y: 2231957359 },
			{ x: 2012, y: 2494736248 },
			{ x: 2013, y: 2728428107 },
			{ x: 2014, y: 2956385569 },
			{ x: 2015, y: 3185996155 },
			{ x: 2016, y: 3424971237 }
		]
	}]
});
chart.render();

function addSymbols(e){
	var suffixes = ["", "K", "M", "B"];

	var order = Math.max(Math.floor(Math.log(e.value) / Math.log(1000)), 0);
	if(order > suffixes.length - 1)
		order = suffixes.length - 1;

	var suffix = suffixes[order];
	return CanvasJS.formatNumber(e.value / Math.pow(1000, order)) + suffix;
}

}
</script>

<link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text.css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
</head>
<body>
<div id="chartContainer"  style="padding-left: 250px; padding-top: 100px ; height: 200px; width: 50% ;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<div class="container" style=" padding-top: 100px; padding-left: 400px; ">
  <a class="btn btn-primary"  href="http://localhost:8000/testrun">Home</a>
</div>
</body>
</html>
