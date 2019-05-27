<?php
include_once("conexao.dao.php");
include_once("querys.php");


$idSala = $_REQUEST['idSala'];

$responseSala = Busca::BuscaPartida($idSala);
$responseLetras = Busca::BuscaLetras($idSala);
$responsePalavra = Busca::BuscaPalavra($responseSala[1]['id_palavra']);
$responseAdversario = Busca::BuscaJogador($responseSala[1]['id_adversario']);

if(!empty($responsePalavra)){
	$response = array(
	    "sala" => $responseSala,
	    "letras" => $responseLetras,
	    "palavra" => $responsePalavra,
	    "adversario" => $responseAdversario,
	);
}
else{
	$response = array(
	    "sala" => $responseSala,
	    "letras" => $responseLetras,
	    "palavra" => 0,
	    "adversario" => 0,
	);
}

echo json_encode($response);

?>
