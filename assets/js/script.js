var newGraph;

function changeChart() {

	var selectedChart = $("#chart option:selected").val();

	console.log("selectedChart", selectedChart);
	return selectedChart;

}

function teste() {


	if(newGraph) newGraph.destroy();

    $.ajax({
        url: "http://localhost/finances/profile/data",
        method: "GET",
        success: function(data) {
            console.log(data);
            var categoria = [];
			var valor = [];
			var color = [];
			var selectedChart = "bar";
			
			// var dynamicColors = function() {
			// 	var r = Math.floor(Math.random() * 255);
			// 	var g = Math.floor(Math.random() * 255);
			// 	var b = Math.floor(Math.random() * 255);
			// 	return "rgb(" + r + "," + g + "," + b + ")";
			//  };

            for(var i in data) {
				
				categoria.push(data[i].categoria);
				valor.push(data[i].total);
				color.push(data[i].cor);
			}

			selectedChart = changeChart();
			var chartdata = {
				labels: categoria,
				datasets : [
					{
						label: 'Gastos em R$',
						// backgroundColor: 'rgba(200, 200, 200, 0.75)',
						backgroundColor: color,
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: color,
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: valor,
						
					}
				]
			};

			var ctx = $("#mycanvas");

			newGraph = new Chart(ctx, {
			 	type: selectedChart,
				data: chartdata,
				options: {
					scales: {
						xAxes: [{
							maxBarThickness: 100,
							display: true,
							
						}],

						yAxes: [{
							display: true,
							ticks: {
								// suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
								// OR //
								beginAtZero: true   // minimum value will be 0.
							}
						}]
					}
				}
			 });
			 

			
		},
		error: function(data) {
			console.log(data);
		
        }
    });
};