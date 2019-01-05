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
				valor.push(data[i].valor);
				color.push(data[i].corCategoria);
			}

            var chartdata = {
				labels: categoria,
				datasets : [
					{
						label: 'categoria',
						// backgroundColor: 'rgba(200, 200, 200, 0.75)',
						backgroundColor: color,
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: color,
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: valor
					}
				]
			};

			var ctx = $("#mycanvas");

			 var barGraph = new Chart(ctx, {
			 	type: 'pie',
			 	data: chartdata
			 });
		},
		error: function(data) {
			console.log(data);
		
        }
    });
});