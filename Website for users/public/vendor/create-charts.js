( function ( $ ) {

	var charts = {
		init: function () {
			// -- Set new default font family and font color to mimic Bootstrap's default styling
			Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
			Chart.defaults.global.defaultFontColor = '#292b2c';

			//this.ajaxGetPostMonthlyData();

			this.createCompletedJobsChart();

		},

		ajaxGetPostMonthlyData: function () {
			var urlPath =  'http://' + window.location.hostname + '/get-post-chart-data';
			var request = $.ajax( {
				method: 'GET',
				url: urlPath
		} );

			request.done( function ( response ) {
				console.log( response );
				charts.createCompletedJobsChart( response );
			});
		},

		/**
		 * Created the Completed Jobs Chart
		 */
		createCompletedJobsChart: function ( ) {

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

		}
	};

	charts.init();

} )( jQuery );
