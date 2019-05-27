<?php
include_once("conexao.dao.php");
include_once("querys.php");

$idSala = $_REQUEST['idSala'];
$letra = $_REQUEST['letra'];
$idJogador = $_REQUEST['idJogador'];
$idUsuario = $_REQUEST['idUsuario'];
$idAdversario = $_REQUEST['idAdversario'];
$palavra = $_REQUEST['palavra'];

$dadosSala = Busca::BuscaPartida($idSala);
if($dadosSala[1]['id_vencedor'] == 0 && $dadosSala[1]['id_jogador_vez']==$idJogador){
	$response = "";
		if($letra!=""){
			$sqlInclude = "INSERT INTO forca_sala_letras (ID_SALA, LETRA, ID_JOGADOR) VALUES (?0, ?1, ?2)";

			$parametros = array(
		    	$idSala, 
		    	$letra, 
		    	$idJogador,
			);	

		$response = Conexao::ExecutarQuery($sqlInclude, $parametros);
		}
		
		if($response || $letra==""){	
			$arrPalavra = str_split($palavra);
			$dadosLetras = Busca::BuscaLetras($idSala);
			$letras = implode("",array_column($dadosLetras, 'letra'));
			if (in_array($letra, $arrPalavra)) {
				$cont = 0;
		 	 	foreach ($arrPalavra as &$value) {
 				   if(in_array($value,array_column($dadosLetras, 'letra')))
 				   {
			   			$cont++;
 				   }
				}
				if($cont == count($arrPalavra)){				
					atualizaGanhador($idSala,$idJogador);
				}
			} 	
			else {				
				$errUsu = $dadosSala[1]['erros_usuario'];
				$errAdv = $dadosSala[1]['erros_adversario'];
				$idVez = $idJogador;
				$idVencedor = $dadosSala[1]['id_vencedor'];
				if($idJogador == $idUsuario){
					$errUsu++;
					if($errUsu>3){
						$idVencedor = $idAdversario;
					}
					else{
						$idVez = $idAdversario;
					}					
				}
				else{
					$errAdv++;
					if($errAdv>3){
						$idVencedor = $idUsuario;
					}
					else{
						$idVez = $idUsuario;
					}
				}				
		  		trocaJogador($idSala,$errUsu,$errAdv,$idVez,$idVencedor);	
			}
		}	
}
function atualizaGanhador($idSala,$idJogador){
	$sqlAtualizaGanhador = 
					"UPDATE forca_sala S
					SET
					S.ID_VENCEDOR = {$idJogador}
					WHERE S.ID_SALA = {$idSala}
					";
	return Conexao::ExecutarQuery($sqlAtualizaGanhador);					
}
function trocaJogador($idSala,$erros_usuario,$erros_adversario,$id_jogador_vez,$id_vencedor){
	$sqlTrocaJogador = 
					"UPDATE forca_sala S
					SET
					S.ERROS_USUARIO = {$erros_usuario},
					S.ERROS_ADVERSARIO = {$erros_adversario},
					S.ID_JOGADOR_VEZ = {$id_jogador_vez},
					S.ID_VENCEDOR = {$id_vencedor}
					WHERE S.ID_SALA = {$idSala}
					";
					echo $sqlTrocaJogador;
	return Conexao::ExecutarQuery($sqlTrocaJogador);						
}
?>