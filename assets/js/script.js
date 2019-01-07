$(function() {
    $.ajax({
        url: "http://localhost/finances/profile/data",
        method: "GET",
        success: function(data) {
            console.log(data);
            var categoria = [];
			var valor = [];
			var color = [];

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

			 var barGraph = new Chart(ctx, {
			 	type: 'bar',
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
});

// function changeCategory() {
// 	var selectedCategory = $("#sel1 option:selected").val();

// 	$.ajax({ 
// 		url: "http://localhost/finances/profile/category",
// 		data: {"selectedCategory": selectedCategory},
// 		type: "post",
// 		success: function(output) {
// 			$("#category").html(output);
// 		}
// 	});

// }