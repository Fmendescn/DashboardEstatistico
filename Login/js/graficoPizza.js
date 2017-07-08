$(document).ready(function(){
	$.ajax({
		url: "http://localhost/projetoprof.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var Professor = [];
			var Projeto = [];
			var cont = 0;
			var id = data[0].ID;
			for(var i in data) {




				if(id != data[i].ID){
					Professor.push(data[i-1].nomerh + " " +data[i-1].professor_id);
					Projeto.push(cont);
					cont = 1;
					id = data[i].ID;

				}else{

					cont = cont +1;

				}







			}


			var chartdata = {
				labels: Professor,
				datasets : [
					{
						label: 'Id do Projeto ',
						backgroundColor: 'rgba(100, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: Projeto
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'pie',
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
