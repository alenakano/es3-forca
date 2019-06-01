<?php
include_once("conexao.dao.php");
include_once("querys.php");
include_once("atualiza-logs.php");

$idSala = $_REQUEST['idSala'];
$idJogador = $_REQUEST['idJogador'];
$numDicas = 0;
$usuOuAdver = "";
 
Log::AtualizarJogador($idJogador);

$dadosSala = Busca::BuscaPartida($idSala);
$dadosJogador = Busca::BuscaJogador($idJogador);

$creditos = $dadosJogador[1]['creditos'];
if($dadosSala[1]['id_vencedor']==0 && $dadosSala[1]['sala_finalizada']==''){
	if($dadosSala[1]['id_usuario'] == $idJogador){
		$numDicas = $dadosSala[1]['dicas_usuario'];
		$usuOuAdver = "U";
	}
	else{
		$numDicas = $dadosSala[1]['dicas_adversario'];
		$usuOuAdver = "A";
	}

	$custoDica = 9999999;

	if($numDicas==0){
		$custoDica = 1;
	}
	else{
	 	if($numDicas==1){
				$custoDica = 3;
		}
		else{
				$custoDica = 5;
		}
	}

	echo $numDicas;
	echo $custoDica;
	echo $creditos;

	if($numDicas <3 && $custoDica<= $creditos){
		atualizaQtdDica($idSala,$usuOuAdver);
		atualizaCredito(-$custoDica,$idJogador);
	}

	function atualizaCredito($valor,$idJogador){
		$sqlAtualizaCredito = 
						"UPDATE forca_usuario U
						SET
						U.CREDITOS = U.CREDITOS + {$valor}
						WHERE U.ID_USUARIO = {$idJogador}
						";
		echo $sqlAtualizaCredito;
		return Conexao::ExecutarQuery($sqlAtualizaCredito);					
	}
	function atualizaQtdDica($idSala,$usuOuAdver){
		if($usuOuAdver=='U'){
			$sqlAtualizaQtdDica = 
						"UPDATE forca_sala S
						SET
						S.DICAS_USUARIO = S.DICAS_USUARIO + 1
						WHERE S.ID_SALA = {$idSala}
						";
		}
		else{
			$sqlAtualizaQtdDica = 
						"UPDATE forca_sala S
						SET
						S.DICAS_ADVERSARIO = S.DICAS_ADVERSARIO + 1
						WHERE S.ID_SALA = {$idSala}
						";
		}
		return Conexao::ExecutarQuery($sqlAtualizaQtdDica);					
	}
}