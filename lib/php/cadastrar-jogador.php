<?php
include("conexao.dao.php");

$sqlInclude = "INSERT INTO forca_usuario (NOME, LOGIN, SENHA, PERFIL, CREDITOS) VALUES (?0, ?1, ?2, 'pla', 50)";

$parametros = array(
    $_REQUEST['cadastroNome'], 
    $_REQUEST['cadastroLogin'], 
    md5($_REQUEST['cadastroSenha'])
);

$response = Conexao::ExecutarQuery($sqlInclude, $parametros);

if(!$response)
{
    $erroMensagem = Conexao::GetErroConexao('mensagem');
    echo "Não foi possivel cadastrar esse jogador". $erroMensagem;
}
else
{
    $sqlUsuario = "SELECT MAX(ID_USUARIO) AS id_usuario FROM forca_usuario";
    $idUsuario = Conexao::ExecutarQuery($sqlUsuario);

    $sqlScore = "INSERT INTO forca_score (ID_USUARIO, SCORE) VALUE (?0, 0)";
    $responseScore = Conexao::ExecutarQuery($sqlScore, array($idUsuario[1]['id_usuario']));
    echo "Cadastro de jogador realizado com sucesso!";
}
?>