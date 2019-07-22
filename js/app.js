$(function(){
	var arrayValores = [];

	/**************************************************************** FUNÇÕES ****************************************************************/

	function carregarPagina(url,pagina){
		var caminho = '/dashboard';
		window.history.pushState("NIT - UFSCAR", "DASHBOARD", caminho+'/?#' + (url == '' ? '' : "grafico-") + pagina);
		$( "#conteudo" ).load(caminho+url+'/'+pagina+".php" );
	}


	function drawChartBarras() {
		var data = google.visualization.arrayToDataTable(arrayValores);
		var options = {
			bars: 'horizontal'
		};
		
		var chart = new google.charts.Bar(document.getElementById("grafico"));
		chart.draw(data, options);
	}

	function drawChartBarrasEmpilhadas() {
		var data = google.visualization.arrayToDataTable(arrayValores);
		var options = {
			legend: { position: 'top' },
			vAxis: { textStyle: { fontSize: 12 } },
			isStacked: true
		};
		
		var chart = new google.visualization.BarChart(document.getElementById("grafico"));
		chart.draw(data, options);
	}


	/**************************************************************** FUNÇÕES ****************************************************************/
	
	
	//Ao carregar a página
	carregarPagina('','home');


	$(document).on("click", ".btn-grafico, .btn-home", function () {
		var pagina = $(this).attr('data-pagina');
		carregarPagina((pagina == 'home' ? '' : '/graficos'),pagina);
	});


	$(document).on("change", "#qtdeItens", function () {
		var qtdeItens 	= $(this).val();
		var tipoGrafico = $(this).attr('data-tipoGrafico');

		if (qtdeItens == "" || parseInt(qtdeItens) < 2) {
			return false;
		}

		$.get("controller/monta_json.php?tipoGrafico="+tipoGrafico+"&qtdeItens="+qtdeItens, function(dados) {
			if (dados){
				switch(tipoGrafico) {
					case 'barras':
						arrayValores = [];
						arrayValores.push(['PESQUISADOR', 'Qtde de artigos']);
						dados['valores'].forEach(function(objValores){
							arrayValores.push([objValores['nome'], objValores['artigos_eventos'] + objValores['artigos_periodicos']]);
						});
						google.charts.load('current', {'packages':['bar'], 'language': 'pt'});
						google.charts.setOnLoadCallback(drawChartBarras);
						break;
					case 'barras-empilhadas':
						arrayValores = [];
						arrayValores.push(['PESQUISADOR', 'Qtde de artigos em periódicos', 'Qtde de artigos em eventos']);
						dados['valores'].forEach(function(objValores){
							arrayValores.push([objValores['nome'], objValores['artigos_periodicos'], objValores['artigos_eventos']]);
						});
						google.charts.load('current', {'packages':['corechart'], 'language': 'pt'});
						google.charts.setOnLoadCallback(drawChartBarrasEmpilhadas);
						break;
					case 'tagcloud':
						var words = [];
						dados['valores'].forEach(function(objValores){
							words.push({text: objValores['nome'], weight: objValores['artigos_eventos'] + objValores['artigos_periodicos'], autoResize: true,
								handlers: {
										click: function() { 
											window.open("http://lattes.cnpq.br/"+objValores['idlattes']); 
										},
										mouseover: function() {
											$(this).css('cursor','pointer');
										}
								} 
							}); 
						});
						$('#cloud').empty();
						$('#cloud').jQCloud(words);						
				}
			}
		});

	});
	
});