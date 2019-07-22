<style>
    .background {
      fill: #eee;
    }
    line {
      stroke: #fff;
    }
    text.active {
      fill: red;
    }
</style>

<div class="row">
  <div class="col-md-12">
    <div class="card-body">
      <h4 class="pb-2 mt-3 mb-1 border-bottom">
        <i class="fa fa-area-chart"></i> Matriz: Coautoria entre os 50 Pesquisadores com mais Publicações
      </h4>
      <br>
	  <p>Ordem:
        <select id="order">
          <option value="name">Nome do pesquisador</option>
          <option value="departament">Nome do departamento</option>
          <option value="frequency_publications">Frequência de publicações</option>
          <option value="frequency_coauthorship">Frequência de coautoria</option>
        </select>
  	  </p>    
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <p></p>
    <script>
      d3.select('p').selectAll('svg').remove(); //reseta

      var margin = {top: 450, right: 0, bottom: 10, left: 350},
          width = 800,
          height = 800;

      var x = d3.scale.ordinal().rangeBands([0, width]),
          z = d3.scale.linear().domain([0, 4]).clamp(true),
          c = d3.scale.category20();

      var svg = d3.select("p").append("svg")
          .attr("width", width + margin.left + margin.right)
          .attr("height", height + margin.top + margin.bottom)
          .style("margin-left", 50 + "px")
          .append("g")
          .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

      d3.json("controller/coautoria_pesquisadores.json", function(coautoria) {
        var matrix = [],
            nodes = coautoria.nodes,
            n = nodes.length;

        nodes.forEach(function(node, i) {
          node.index = i;
          node.frequency_coauthorship = 0;
          matrix[i] = d3.range(n).map(function(j) { return {x: j, y: i, z: 0}; });
        });

        coautoria.links.forEach(function(link) {
          matrix[link.source][link.target].z += link.value;
          matrix[link.target][link.source].z += link.value;
          matrix[link.source][link.source].z += link.value;
          matrix[link.target][link.target].z += link.value;
          nodes[link.source].frequency_coauthorship += link.value;
          nodes[link.target].frequency_coauthorship += link.value;
        });

        var orders = {
          name: d3.range(n).sort(function(a, b) { return d3.ascending(nodes[a].nome.toLowerCase(), nodes[b].nome.toLowerCase()); }),
          departament: d3.range(n).sort(function(a, b) { return d3.ascending(nodes[a].depto.toLowerCase(), nodes[b].depto.toLowerCase()); }),
          frequency_publications: d3.range(n).sort(function(a, b) { return nodes[b].qtde_artigos - nodes[a].qtde_artigos; }),
          frequency_coauthorship: d3.range(n).sort(function(a, b) { return nodes[b].frequency_coauthorship - nodes[a].frequency_coauthorship; })
        };

        x.domain(orders.name); //ordenação padrão

        svg.append("rect")
            .attr("class", "background")
            .attr("width", width)
            .attr("height", height);

        var row = svg.selectAll(".row")
            .data(matrix)
            .enter().append("g")
            .attr("class", "row")
            .attr("transform", function(d, i) { return "translate(0," + x(i) + ")"; })
            .each(row);

        row.append("line")
            .attr("x2", width);

        row.append("text")
            .attr("x", -6)
            .attr("y", x.rangeBand() / 2)
            .attr("dy", ".32em")
            .attr("text-anchor", "end")
            .text(function(d, i) { return nodes[i].nome; });

        var column = svg.selectAll(".column")
            .data(matrix)
            .enter().append("g")
            .attr("class", "column")
            .attr("transform", function(d, i) { return "translate(" + x(i) + ")rotate(-90)"; });

        column.append("line")
            .attr("x1", -width);

        column.append("text")
            .attr("x", 6)
            .attr("y", x.rangeBand() / 2)
            .attr("dy", ".32em")
            .attr("text-anchor", "start")
            .text(function(d, i) { return nodes[i].nome; });

        function row(row) {
          var cell = d3.select(this).selectAll(".cell")
              .data(row.filter(function(d) { return d.z; }))
              .enter().append("rect")
              .attr("class", "cell")
              .attr("x", function(d) { return x(d.x); })
              .attr("width", x.rangeBand())
              .attr("height", x.rangeBand())
              .style("fill-opacity", function(d) { return z(d.z); })
              .style("fill", function(d) { 
                var color;
                if (nodes[d.x].depto == nodes[d.y].depto) {
                   if (d.x == d.y) { //diagonal principal
                     color = "#EEE"; //cinza claro
                   } else {
                     color = c(nodes[d.x].depto);
                   }
                } else {
                  color = null;
                }
                return color;
              })
              .on("mouseover", mouseover)
              .on("mouseout", mouseout);
        }

        function mouseover(p) {
          d3.selectAll(".row text").classed("active", function(d, i) { return i == p.y; });
          d3.selectAll(".column text").classed("active", function(d, i) { return i == p.x; });
        }

        function mouseout() {
          d3.selectAll("text").classed("active", false);
        }

        d3.select("#order").on("change", function() {
          order(this.value);
        });

        function order(value) {
          x.domain(orders[value]);

          var t = svg.transition().duration(2500);

          t.selectAll(".row")
              .delay(function(d, i) { return x(i) * 4; })
              .attr("transform", function(d, i) { return "translate(0," + x(i) + ")"; })
              .selectAll(".cell")
              .delay(function(d) { return x(d.x) * 4; })
              .attr("x", function(d) { return x(d.x); });

          t.selectAll(".column")
              .delay(function(d, i) { return x(i) * 4; })
              .attr("transform", function(d, i) { return "translate(" + x(i) + ")rotate(-90)"; });
        }
        
      });
    </script>
  </div>
</div>