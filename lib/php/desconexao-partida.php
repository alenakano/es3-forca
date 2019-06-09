<?php
include_once("conexao.dao.php");
include_once("querys.php");

$idSala = $_REQUEST['idSala'];
$idJogador= $_REQUEST['idJogador'];

$dadosSala = Busca::BuscaPartida($idSala);

if($dadosSala[1]['id_vencedor']==0 && $dadosSala[1]['sala_finalizada']=='' && $dadosSala[1]['id_adversario']!=0){
	echo "Queda de conexão do adversário, Você Venceu!";
	Busca::AtualizaGanhador($idSala,$idJogador);	
}
?>
