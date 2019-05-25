<?php
session_start();
include_once("conexao.dao.php");


$sqlInsertSessao = "INSERT INTO forca_sala 
(
    ID_TEMA,
    ID_USUARIO,
    PRIVADA,
    SENHA_SALA
)
VALUES
(
    ?0,
    ?1,
    ?2,
    ?3
)";

$idTema = $_REQUEST['tema'];
$idUsuario = $_SESSION['user']['id_usuario'];
$senha = $_REQUEST['senha'];
$privado = $_REQUEST['privado'];

$param = array($idTema, $idUsuario, $privado, $senha);
$response = Conexao::ExecutarQuery($sqlInsertSessao, $param);

if(!$response)
{
    $mensagemErro = Conexao::GetErroConexao();
    echo "Não foi possivel cadastrar esta nova sala. \nErro: ". $mensagemErro;
}
else
{
    echo "Nova sala cadastrada com sucesso!";
}


?>