<?php 
include_once("conexao.dao.php");

$sql = "UPDATE forca_usuario SET PERFIL ='adm' WHERE ID_USUARIO = ?0";
$param = array($_REQUEST['id_usuario']);

$response = Conexao::ExecutarQuery($sql, $param);

if(!$response)
{
    $erroMensagem = Conexao::GetErroConexao('mensagem');
    echo "Não foi possível atribuir perfil de administrador para esse usuário. \nErro: ". $erroMensagem;
}
else
{
    echo "O usuário agora é um administrador também.";
}



?>