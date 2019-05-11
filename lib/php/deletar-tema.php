<?php 
include("conexao.dao.php");

$sqlDelete = "DELETE FROM forca_tema WHERE ID_TEMA = ?0";

$param = array($_REQUEST['id_tema']);

$response = Conexao::ExecutarQuery($sqlDelete, $param);

if(!$response)
{
    $erroMensagem = Conexao::GetErroConexao('mensagem');
    echo "Não foi possível deletar este tema: \nErro: " . $erroMensagem; 
}
else
{
    $sqlDeletePalavrasTema = "DELETE FROM forca_palavra WHERE ID_TEMA = ?0";
    $responsePalavra = Conexao::ExecutarQuery($sqlDeletePalavrasTema, $param);
    echo "Tema deletado com sucesso!";
}
?>