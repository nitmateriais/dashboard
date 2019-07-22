<style>
    .node {
        stroke: #FFF;
        stroke-width: 5px;
    }

    .link {
        stroke: #999;
        stroke-opacity: 0.7;
    }
</style>

<div class="row">
	<div class="col-md-12">
		<div class="card-body">
			<h4 class="pb-2 mt-3 mb-1 border-bottom">
				<i class="fa fa-area-chart"></i> Grafo: Coautoria entre os 50 Pesquisadores com mais Publicações
			</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<p></p>
		<script>
			d3.select('p').selectAll('svg').remove(); //reseta
			
			var width = 1700,
			    height = 1500;

			var color = d3.scale.category20();

			var force = d3.layout.force()
			    .charge(-750)
			    .linkDistance(250)
			    .size([width, height]);

			var svg = d3.select("p").append("svg")
			    .attr("width", width)
			    .attr("height", height);

			d3.json("controller/coautoria_pesquisadores.json", function(error, graph) {
			  if (error) throw error;

			  force
			      .nodes(graph.nodes)
			      .links(graph.links)
			      .start();

			  var link = svg.selectAll(".link")
			      .data(graph.links)
			      .enter().append("line")
			      .attr("class", "link")
			      .style("stroke-width", function(d) { return Math.sqrt(d.value)*1.1; });
			  link.append("title")
			      .text(function(d) { return d.value; });

			  var node = svg.selectAll(".node")
			      .data(graph.nodes)
			      .enter().append("circle")
			      .attr("class", "node")
			      .attr("r", 5)
			      .style("fill", function (d) { return color(d.depto); 
			      })
			      .attr("r", function (d) { return 1.1*Math.sqrt(d.qtde_artigos) + 1.5; })
			      .call(force.drag);
			  node.append("title")
			      .text(function(d) { return d.nome + ' - ' + d.depto + ' (' + d.qtde_artigos + ')'; });

			  force.on("tick", function() {
			    link.attr("x1", function(d) { return d.source.x; })
			        .attr("y1", function(d) { return d.source.y; })
			        .attr("x2", function(d) { return d.target.x; })
			        .attr("y2", function (d) { return d.target.y; })
			        .attr("value", function (d) { return d.value;}) ;

			    node.attr("cx", function(d) { return d.x; })
			        .attr("cy", function(d) { return d.y; });
			  });
			});
	    </script>
	</div>
</div>