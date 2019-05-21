<?php
include_once("conexao.dao.php");

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

$sqlusuario = 
    "SELECT * 
    FROM        
        forca_usuario U        
    WHERE         
        U.ID_USUARIO = {$dadosPartida[1]['id_usuario']}";


$dadosUsuario = Conexao::ExecutarQuery($sqlusuario);

$sqladversario = 
    "SELECT * 
    FROM        
        forca_usuario A       
    WHERE         
        A.ID_USUARIO = {$dadosPartida[1]['id_adversario']}";



$dadosAdversario = Conexao::ExecutarQuery($sqladversario);

$sqlpalavra = 
    "SELECT * 
    FROM        
        forca_palavra P       
    WHERE         
        P.ID_PALAVRA = {$dadosPartida[1]['id_palavra']}";

$dadosPalavra = Conexao::ExecutarQuery($sqlpalavra);


$sqlletras = 
    "SELECT *
    FROM        
        forca_sala_letras L       
    WHERE         
        L.ID_SALA = {$dadosPartida[1]['id_sala']}";

$dadosLetras = Conexao::ExecutarQuery($sqlletras);
echo (count($dadosLetras));
?>