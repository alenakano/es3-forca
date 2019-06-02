<?php
include_once("conexao.dao.php");
include_once("querys.php");


$idSala = $_REQUEST['idSala'];

$responseSala = Busca::BuscaPartida($idSala);
$responseLetras = Busca::BuscaLetras($idSala);
$responsePalavra = Busca::BuscaPalavra($responseSala[1]['id_palavra']);
$responseAdversario = Busca::BuscaJogador($responseSala[1]['id_adversario']);
$responseUsuario = Busca::BuscaJogador($responseSala[1]['id_usuario']);
$responseQtdVitUsu = Busca::QtdVitorias($responseSala[1]['id_usuario']);
$responseQtdVitAdv = Busca::QtdVitorias($responseSala[1]['id_adversario']);

date_default_timezone_set('America/Sao_Paulo');

$dataHora = date('Y-m-d H:i:s');

if(!empty($responsePalavra)){
	$response = array(
	    "sala" => $responseSala,
	    "letras" => $responseLetras,
	    "palavra" => $responsePalavra,
	    "adversario" => $responseAdversario,
	    "usuario" => $responseUsuario,
	    "qtdvitusu" => $responseQtdVitUsu,
	    "qtdvitadv" => $responseQtdVitAdv,
	    "datahoraservidor" => $dataHora,
	);
}
else{
	$response = array(
	    "sala" => $responseSala,
	    "letras" => $responseLetras,
	    "palavra" => 0,
	    "adversario" => 0,
	  	"usuario" => $responseUsuario,
	  	"qtdvitusu" => $responseQtdVitUsu,
	    "qtdvitadv" => 0,
	    "datahoraservidor" => $dataHora,  
	);
}

echo json_encode($response);

?>
