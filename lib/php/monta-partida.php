<?php
include_once("conexao.dao.php");
include_once("querys.php");

$sqlpartida = 
    "SELECT * 
    FROM 
        forca_sala S,
        forca_tema T              
    WHERE                 
        S.ID_TEMA = T.ID_TEMA AND
        S.SALA_FINALIZADA = '' AND
        (S.ID_ADVERSARIO = {$_SESSION['user']['id_usuario']} OR
        S.ID_USUARIO = {$_SESSION['user']['id_usuario']}) ORDER BY S.ID_SALA DESC LIMIT 1";              

$dadosPartida = Conexao::ExecutarQuery($sqlpartida);

if(!empty($dadosPartida)){

    $dadosUsuario = Busca::BuscaJogador($dadosPartida[1]['id_usuario']);
    
    $dadosAdversario = Busca::BuscaJogador($dadosPartida[1]['id_adversario']);

    $dadosPalavra = Busca::BuscaPalavra($dadosPartida[1]['id_palavra']);

    $dadosLetras = Busca::BuscaLetras($dadosPartida[1]['id_sala']);

}
    
?>