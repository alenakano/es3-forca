<?php
include_once("conexao.dao.php");
class Log
{	


public static function AtualizarJogador($idJogador){
	date_default_timezone_set('America/Sao_Paulo');

	$dataHora = date('Y-m-d H:i:s');

	$sqlAtualizaLogJog = 
	"UPDATE forca_usuario
	SET
	ULTIMA_INTERACAO = '{$dataHora}'
	WHERE
	ID_USUARIO = {$idJogador}
	";

	$response = Conexao::ExecutarQuery($sqlAtualizaLogJog);

}

public static function AtualizarSala($idSala){
	date_default_timezone_set('America/Sao_Paulo');

	$dataHora = date('Y-m-d H:i:s');

	$sqlAtualizaLogSala = 
	"UPDATE forca_sala
	SET
	ULTIMA_ATUALIZACAO = '{$dataHora}'
	WHERE
	ID_SALA = {$idSala}
	";

	$response = Conexao::ExecutarQuery($sqlAtualizaLogSala);

	}
}

?>