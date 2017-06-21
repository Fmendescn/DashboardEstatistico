$(document).ready(function(){
	$.ajax({
		url : "http://localhost/formacaoprofs.php",
		type : "GET",
		success : function(data){
			console.log(data);

			var id = [];
			var descricaohabilitacao = [];

			for(var i in data) {
				id.push("Prof Id " + data[i].id);
				descricaohabilitacao.push(data[i].descricaohabilitacao);
			}
			var tam_descricao = descricaohabilitacao.lenght;
			var num_prof = id.lenght;


			var chartdata = {
				labels: id,descricaohabilitacao,
				datasets: [

					{
						label: "id",
						backgroundColor: "rgba(211, 72, 54, 0.75)",
						borderColor: "rgba(211, 72, 54, 1)",
						pointHoverBackgroundColor: "rgba(211, 72, 54, 1)",
						pointHoverBorderColor: "rgba(211, 72, 54, 1)",
						data: descricaohabilitacao
					}
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
