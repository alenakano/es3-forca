<?php
include_once("conexao.dao.php");
include_once("querys.php");


$idSala = $_REQUEST['idSala'];
$sqlInclude = "INSERT INTO forca_sala_letras (ID_SALA, LETRA, ID_JOGADOR) VALUES (?0, ?1, ?2)";

$parametros = array(
    $idSala, 
    $_REQUEST['letra'], 
    $_REQUEST['idJogador']
);


$response = Conexao::ExecutarQuery($sqlInclude, $parametros);

if($response)
{	
	$dadosLetras = Busca::BuscaLetras($idSala);
	$letras = implode(" ",array_column($dadosLetras, 'letra'));
	echo $letras;
}
else
{
   echo nao;
}
?>