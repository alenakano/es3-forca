<?php
include_once("conexao.dao.php");
date_default_timezone_set('America/Sao_Paulo');

$idJogador = $_SESSION['user']['id_usuario'];
$dataHora = date('Y-m-d H:i:s');

$sqlAtualizaLog = 
"INSERT INTO forca_user_log
(ID_USUARIO,DATA_HORA)
VALUES
({$idJogador},'{$dataHora}')
ON DUPLICATE KEY UPDATE DATA_HORA = '{$dataHora}' 
";

$response = Conexao::ExecutarQuery($sqlAtualizaLog);

/*if(!$response)
{
    $mensagemErro = Conexao::GetErroConexao();
    echo "Não foi atualizar log. \nErro: ". $mensagemErro;
}
else
{
    echo "Log atualizado com sucesso!";
}*/

?>