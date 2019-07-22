<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>NIT - UFSCar</title>
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom styles for this template-->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
	<!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</head>

<body class="fixed-nav sticky-footer bg-dark">
	<div class="content-wrapper">
		<div class="container-fluid ">
			<!-- **************** LINKS LATERAIS **************** -->
			<?php require 'navigation.php'; ?>
			<!-- ************************************************ -->

			<div id="conteudo"> </div>
				
			<!-- ******************** RODAPÉ ******************** -->
			<?php require('footer.php'); ?>
			<!-- ************************************************ -->


		</div>
	</div>

	<!-- Custom scripts for all pages-->
	<script src="js/sb-admin.min.js"></script>
	<!-- Google Charts-->
	<script src="js/google-charts.js"></script>
	<!-- D3.JS-->
	<script src="js/d3.v3.min.js"></script>
	
	<script src="js/app.js?v=<?php echo time(); ?>"></script>
	
</body>
</html>