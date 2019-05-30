<?php
include_once("conexao.dao.php");
include_once("querys.php");

$sql = 
    "SELECT * 
    FROM 
        forca_sala S, 
        forca_tema T, 
        forca_usuario U
    WHERE 
        S.ID_TEMA = T.ID_TEMA AND        
        S.ID_USUARIO = U.ID_USUARIO AND S.SALA_FINALIZADA = '';";
        //Thiago adiciou o codigo da SALA_FINALIZADA acima

$dadosSessao = Conexao::ExecutarQuery($sql);

//var_dump($dadosSessao);

$sqlScore = 
    "SELECT S.SCORE 
    FROM 
        forca_score S, forca_usuario U 
    WHERE 
        S.ID_USUARIO = U,ID_USUARIO AND 
        U.ID_USUARIO = ?0";

$param = array($_SESSION['user']['id_usuario']);
$dadosScore = Conexao::ExecutarQuery($sqlScore, $param);

$_SESSION['user']['score'] = $dadosScore[1]['score'];

$sqlTema = "SELECT * FROM forca_tema a INNER JOIN forca_palavra b ON a.id_tema = b.id_tema";
$dadosTema = Conexao::ExecutarQuery($sqlTema);

$dadosJogador = Busca::BuscaJogador($_SESSION['user']['id_usuario']);
?>