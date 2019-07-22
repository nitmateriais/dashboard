<!-- ************************************************** NAVEGAÇÃO: LINKS LATERAIS ********************************************** -->
<?php
  define("BASE_IMG","/dashboard/img");
  define("BASE_GRAFICO","/dashboard/graficos");
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">  
	<a href="#home" class="navbar-brand btn-home" data-pagina='home'><i class="fa fa-home"></i>HOME</a>
	<a class="navbar-brand" href="http://www.ufscar.br" target="_blank"> 
		<img src="<?php echo BASE_IMG;?>/logo_ufscar.png" alt="UFSCar" width="24%" class='img-fluid'>
	</a>
  	<a class="navbar-brand" href="http://www.nit.ufscar.br" target="_blank">
    	<img src="<?php echo BASE_IMG;?>/logo_nit.png" alt="NIT - UFSCar" width="24%" class='img-fluid'>
  	</a>
  
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
   		<span class="navbar-toggler-icon"></span>
  	</button>

  	<div class="collapse navbar-collapse" id="navbarResponsive">
    	<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
	        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
	            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" >
	              <i class="fa fa-fw fa-area-chart"></i>
	              <span class="nav-link-text">Gráficos</span>
	          	</a>
	            <ul class="sidenav-second-level collapse" id="collapseComponents">
                	<li> <a href="#grafico-barras" class="btn-grafico" data-pagina="barras">Barras</a> </li>
                  <li> <a href="#grafico-barras-empilhadas" class="btn-grafico" data-pagina="barras-empilhadas">Barras Empilhadas</a> </li>
	              	<li> <a href="#grafico-tagcloud" class="btn-grafico" data-pagina="tagcloud">Tag Cloud</a> </li>
                  <li> <a href="#grafico-grafo" class="btn-grafico" data-pagina="grafo">Grafo</a> </li>
                  <li> <a href="#grafico-matriz" class="btn-grafico" data-pagina="matriz">Matriz</a> </li>
	            </ul>
	        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler"> <i class="fa fa-fw fa-angle-left"></i> </a>
        </li>
      </ul>
  </div>
</nav>