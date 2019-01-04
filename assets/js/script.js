$(document).ready(function() {
    $.ajax({
        url: "http://localhost/finances/profile/",
        method: "GET",
        success: function(data) {
            console.log(data);
            var categoria = [];
            var valor = [];

            for(var i in data) {
                categoria.push("Categora" + data[i].categoria);
                valor.push(data[i].valor);
            }

            var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Player Score',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		
        }
    });
});