<?php
session_start();
include_once("conexao.dao.php");
include_once("atualiza-logs.php");
include_once("querys.php");

$sala = $_REQUEST['sala'];
$idUsuario = $_SESSION['user']['id_usuario'];
$idOutroJogador = $_REQUEST['idOutro'];
$idTema = $_REQUEST['id_Tema'];

$dadosSala = Busca::BuscaPartida($sala);

if($dadosSala[1]['id_adversario']==0 && $dadosSala[1]['sala_finalizada']!='S'){

	$numRandom = rand(1,100);

	if($numRandom < 51){
	    $idJogadorVez = $idOutroJogador;
	}
	else{
	    $idJogadorVez = $idUsuario;
	}

	$sqlPalavras = "SELECT * FROM forca_palavra P WHERE P.ID_TEMA = {$idTema}";
	$palavras = Conexao::ExecutarQuery($sqlPalavras);
	$rand = rand(1, count($palavras));
	$palavraSelecionada = $palavras[$rand]['id_palavra'];


	$sqlEntrarSessao = 
	"UPDATE forca_sala S
	SET
	S.ID_ADVERSARIO = {$idUsuario},
	S.ID_JOGADOR_VEZ = {$idJogadorVez},
	S.ID_PALAVRA = {$palavraSelecionada}
	WHERE S.ID_SALA = {$sala}
	";

	$response = Conexao::ExecutarQuery($sqlEntrarSessao);

	if(!$response)
	{
	    $mensagemErro = Conexao::GetErroConexao();
	    echo "Não foi possivel entrar nesta sala. \nErro: ". $mensagemErro;
	}
	else
	{
	    Log::AtualizarJogador($idUsuario);
	    Log::AtualizarSala($sala);
	    echo "Nova sala cadastrada com sucesso!". $numRandom;
	}
}
else{
	echo 1;
}


?>