<?php
include_once("conexao.dao.php");
include_once("querys.php");
include_once("atualiza-logs.php"); 

$idSala = $_REQUEST['idSala'];
$letra = $_REQUEST['letra'];
$idJogador = $_REQUEST['idJogador'];

 
Log::AtualizarJogador($idJogador);

$dadosSala = Busca::BuscaPartida($idSala);
$idAdversario = $dadosSala[1]['id_adversario'];
$idUsuario = $dadosSala[1]['id_usuario'];

if($dadosSala[1]['id_vencedor']==0 && $dadosSala[1]['sala_finalizada']==''){
	$dadosPalavra = Busca::BuscaPalavra($dadosSala[1]['id_palavra']);
	$palavra = $dadosPalavra[1]['palavra'];

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
			
			if($response || $letra==''){	
				$arrPalavra = str_split($palavra);
				$dadosLetras = Busca::BuscaLetras($idSala);
				$letras = implode("",array_column($dadosLetras, 'letra'));
				echo $letra;
				if (in_array($letra, $arrPalavra) && $letra !='') {
					$cont = 0;
			 	 	foreach ($arrPalavra as &$value) {
	 				   if(in_array($value,array_column($dadosLetras, 'letra')))
	 				   {
				   			$cont++;
	 				   }
					}
					if($cont == count($arrPalavra)){				
						Busca::atualizaGanhador($idSala,$idJogador);
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
				echo $idVez;				
			  	Busca::trocaJogador($idSala,$errUsu,$errAdv,$idVez,$idVencedor);	
				}
			}	
	}
}

?>