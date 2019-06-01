<?php
include_once("conexao.dao.php");
include_once("atualiza-logs.php");

$idSala = $_REQUEST['idSala'];
  
Log::AtualizarSala($idSala);

$sqlFinalizaSala = 
"UPDATE forca_sala S
SET
S.SALA_FINALIZADA = 'S'
WHERE S.ID_SALA = {$idSala}
";

$response = Conexao::ExecutarQuery($sqlFinalizaSala);

if(!$response)
{
    $mensagemErro = Conexao::GetErroConexao();
    echo "Não foi possivel finalizar esta sala. \nErro: ". $mensagemErro;
}
else
{
    echo "Sala finalizada com sucesso!";
}

?>
