<link href="./vendor/jquery/jqcloud/1.0.4/jqcloud.css" rel="stylesheet">
<script src="./vendor/jquery/jqcloud/1.0.4/jqcloud-1.0.4.js"></script>


<div class="row">
	<div class="col-md-12">
		<div class="card-body">
			<h4 class="pb-2 mt-3 mb-1 border-bottom">
				<i class="fa fa-area-chart"></i> Tag Cloud: Pesquisadores com mais Publicações
			</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<form>
		  <div class="form-row align-items-center">
		    <div class="col-auto my-1">
		      <label class="mr-sm-1" for="qtdeItens">Quantidade de Pesquisadores:</label>
		      <select class="custom-select mr-sm-1" id="qtdeItens" data-tipoGrafico = 'tagcloud'>
		        <option selected>Escolher...</option>
		        <option value="5">5</option>
		        <option value="10">10</option>
		        <option value="20">20</option>
		        <option value="50">50</option>
		      </select>
		    </div>
		  </div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div id="cloud" style="width: 100%; height: 400px;"></div>
	</div>
</div>
