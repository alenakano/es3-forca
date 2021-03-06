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
        S.ID_SALA = {$id_sala}";              

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
    public static function QtdVitorias($id_usuario)
    {
        $sqlqtdvit = 
        "SELECT COUNT(*) 
        FROM        
            forca_SALA S        
        WHERE         
            S.ID_VENCEDOR = {$id_usuario}";

        $qtdVitorias = Conexao::ExecutarQuery($sqlqtdvit);
        return $qtdVitorias[1]['COUNT(*)'];

    }
    public static function atualizaGanhador($idSala,$idJogador){
        $sqlAtualizaGanhador = 
                        "UPDATE forca_sala S
                        SET
                        S.ID_VENCEDOR = {$idJogador}
                        WHERE S.ID_SALA = {$idSala}
                        ";
        return Conexao::ExecutarQuery($sqlAtualizaGanhador);                    
    }
    
    public static function trocaJogador($idSala,$erros_usuario,$erros_adversario,$id_jogador_vez,$id_vencedor){
        $sqlTrocaJogador = 
                        "UPDATE forca_sala S
                        SET
                        S.ERROS_USUARIO = {$erros_usuario},
                        S.ERROS_ADVERSARIO = {$erros_adversario},
                        S.ID_JOGADOR_VEZ = {$id_jogador_vez},
                        S.ID_VENCEDOR = {$id_vencedor}
                        WHERE S.ID_SALA = {$idSala}
                        ";
                        
        return Conexao::ExecutarQuery($sqlTrocaJogador);                        
    }

    public static function leRanking(){
        $sqlRanking = 
            "SELECT L.login,
                COUNT(S.id_vencedor) AS vitorias 
                FROM forca_USUARIO L 
                INNER JOIN forca_sala S 
                ON L.id_usuario = S.id_vencedor 
                GROUP BY L.id_usuario
                ORDER BY vitorias DESC
                ";
        return Conexao::ExecutarQuery($sqlRanking);    
    }

    public static function listaTemas(){
        $sqlListaTema = 
            "SELECT * FROM forca_tema ORDER BY TEMA ASC";
        return Conexao::ExecutarQuery($sqlListaTema);    
    }

    public static function listaPalavras(){
        $sqlListaPalavra = 
            "SELECT * FROM forca_palavra p, forca_tema t WHERE t.ID_TEMA = p.ID_TEMA ORDER BY PALAVRA ASC";   
        return Conexao::ExecutarQuery($sqlListaPalavra);    
    }

    public static function listaUsuarios(){
        $sqlUsuario = 
            "SELECT * FROM forca_usuario";
        return Conexao::ExecutarQuery($sqlUsuario);    
    }

}

?>