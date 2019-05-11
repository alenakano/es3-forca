<?php
include_once("conexao.dao.php");

$param = array($_REQUEST['id_usuario']);
$sqlUsuario = "DELETE FROM forca_usuario WHERE forca_usuario.ID_USUARIO = ?0";
$sqlScore = "DELETE FROM forca_score WHERE ID_USUARIO = ?0";
$sqlSala = "DELETE FROM forca_sala WHERE ID_USUARIO = ?0";

$responseUsuario = Conexao::ExecutarQuery($sqlUsuario, $param);

if(!$responseUsuario)
{
    $erroMensagem = Conexao::GetErroConexao('mensagem');
    echo "Não foi possivel deletar este usuario. \nErro: " . $erroMensagem;
}
else
{
    $responseScore = Conexao::ExecutarQuery($sqlScore, $param);
    if(!$responseScore)
    {
        echo "Não possivel deletar o Score desse jogador\n";
    }
    $responseSala = Conexao::ExecutarQuery($sqlSala, $param);
    if(!$responseSala)
    {
        echo "não foi possivel deletar as salas criadas por esse jogador\n";
    }
    echo "Usuário deletado com sucesso!";
}


?>