<?php 
	$qtdeItens =  ( isset($_GET['qtdeItens']) ? $_GET['qtdeItens'] : null );

	if (empty($qtdeItens) || !is_numeric($qtdeItens) || $qtdeItens < 2) {
		ob_end_clean();
		return;
	}

    $arrRetorno  = array();
	$valores = array();
	switch($_GET['tipoGrafico']) {
		default:
			foreach (json_decode(file_get_contents("publicacoes_article_conference.json"), true) as $key => $value) {
				$valores[$key] = array('nome' => $value['nome'], 'artigos_eventos' => $value['artigos_eventos'], 'artigos_periodicos' => $value['artigos_periodicos'], 'idlattes' => $value['idlattes']);
			    if ($key == $qtdeItens-1) {
			        break;
			    }
			}
	}
	$arrRetorno['valores'] = $valores;

	ob_end_clean();
	header('Content-type: application/json');
	echo json_encode($arrRetorno);
	return;