$(document).ready(function(){
	$.ajax({
		url: "http://localhost/projetoprof.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Professor = [];
			var Projeto = [];

			for(var i in data) {

				Professor.push("Prof " + data[i].professor_id);
				Projeto.push(data[i].id);
			}

			for (var j in data){

			}

			var chartdata = {
				labels: Professor,
				datasets : [
					{
						label: 'Id do Projeto ',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: Projeto
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata,
				options: {
					responsive: true

				}
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});
