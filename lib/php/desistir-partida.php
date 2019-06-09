<?php
include_once("conexao.dao.php");
include_once("querys.php");

$idSala = $_REQUEST['idSala'];
$idJogador= $_REQUEST['idJogador'];

$dadosSala = Busca::BuscaPartida($idSala);

$idUsuario = $dadosSala[1]['id_usuario'];
$idAdversario = $dadosSala[1]['id_adversario']; 

if($dadosSala[1]['id_vencedor']==0 && $dadosSala[1]['sala_finalizada']==''){
	if($idAdversario==0){
	    echo 0;    
	}
	else{
	    if($idJogador==$idUsuario){
	  		Busca::AtualizaGanhador($idSala,$idAdversario);
	    }
	    else{
	        Busca::AtualizaGanhador($idSala,$idUsuario);
	    }                        
	}
}
?>
