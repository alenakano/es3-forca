<?php
session_start();
include_once("conexao.dao.php");
include_once("atualiza-logs.php");

date_default_timezone_set('America/Sao_Paulo');
$sqlInsertSessao = "INSERT INTO forca_sala 
(
    ID_TEMA,
    ID_USUARIO,
    PRIVADA,
    SENHA_SALA,
    DATA_CRIACAO
)
VALUES
(
    ?0,
    ?1,
    ?2,
    ?3,
    ?4
)";

$idTema = $_REQUEST['tema'];
$idUsuario = $_SESSION['user']['id_usuario'];
$senha = $_REQUEST['senha'];
$privado = $_REQUEST['privado'];
$data_criacao = date('Y-m-d H:i:s');

$param = array($idTema, $idUsuario, $privado, $senha,$data_criacao);
$response = Conexao::ExecutarQuery($sqlInsertSessao, $param);

if(!$response)
{
    $mensagemErro = Conexao::GetErroConexao();
    echo "Não foi possivel cadastrar esta nova sala. \nErro: ". $mensagemErro;
}
else
{    

    Log::AtualizarJogador($idUsuario);

    echo "Nova sala cadastrada com sucesso!";
}


?>