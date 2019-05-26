<?php
include_once("conexao.dao.php");
/**
 * 
 */
class Busca
{
    public static function BuscaPartida($id_sala)
    {   

    $sqlpartida = 
    "SELECT * 
    FROM 
        forca_sala S,
        forca_tema T              
    WHERE                 
        S.ID_TEMA = T.ID_TEMA AND
        S.ID_USUARIO = {$id_sala})";              

    $dadosPartida = Conexao::ExecutarQuery($sqlpartida);
    return $dadosPartida;
    }

     public static function BuscaLetras($id_sala)
    {
        $sqlletras = 
        "SELECT *
        FROM        
            forca_sala_letras L       
        WHERE         
            L.ID_SALA = {$id_sala}";

        $dadosLetras = Conexao::ExecutarQuery($sqlletras);
        return $dadosLetras;
    }
    
    public static function BuscaPalavra($id_palavra)
    {
        $sqlpalavra = 
        "SELECT * 
        FROM        
            forca_palavra P       
        WHERE         
            P.ID_PALAVRA = {$id_palavra}";

        $dadosPalavra = Conexao::ExecutarQuery($sqlpalavra);
        return $dadosPalavra;
        
    }

    public static function BuscaJogador($id_usuario)
    {
        $sqlusuario = 
        "SELECT * 
        FROM        
            forca_usuario U        
        WHERE         
            U.ID_USUARIO = {$id_usuario}";


        $dadosUsuario = Conexao::ExecutarQuery($sqlusuario);
        return $dadosUsuario;

    }
}

?>