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
        S.ID_USUARIO = U.ID_USUARIO AND
        S.ID_ADVERSARIO = 0 AND 
        S.SALA_FINALIZADA = '';";
        //Thiago adiciou o codigo da SALA_FINALIZADA acima

$dadosSessao = Conexao::ExecutarQuery($sql);

//var_dump($dadosSessao);

$sqlTema = "SELECT * FROM forca_tema a LEFT JOIN forca_palavra b ON a.id_tema = b.id_tema GROUP BY a.id_tema";
$dadosTema = Conexao::ExecutarQuery($sqlTema);

$dadosJogador = Busca::BuscaJogador($_SESSION['user']['id_usuario']);
?>