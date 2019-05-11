<?php 
include("conexao.dao.php");

$sqlDelete = "DELETE FROM forca_palavra WHERE ID_PALAVRA = ?0";

$param = array($_REQUEST['id_palavra']);

$response = Conexao::ExecutarQuery($sqlDelete, $param);

if(!$response)
{
    $erroMensagem = Conexao::GetErroConexao('mensagem');
    echo "Não foi possível deletar esta palavra: \nErro: " . $erroMensagem; 
}
else
{
    echo "Palavra deletada com sucesso!";
}
?>