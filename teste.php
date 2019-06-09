<?php
include_once("lib/php/header.php");
include_once("lib/php/cabecalho2.php");
include_once("lib/php/querys.php");

$creditos = $dadosJogador[1]['creditos'];
$qtdVitorias = Busca::QtdVitorias($_SESSION['user']['id_usuario']);

?>
