<?php 
include("conexao.dao.php");

if(isset($_REQUEST))
{
    $sqlUpdateTema = "UPDATE forca_tema SET TEMA = ?0 WHERE TEMA.ID_TEMA = ?1";

    $parametros = array(strtoupper($_REQUEST['tema']), $_REQUEST['id_tema']);

    $response = Conexao::ExecutarQuery($sqlUpdateTema, $parametros);

    if(!$response)
    {
        $erroMensagem = Conexao::GetErroConexao();
        die("Não foi possivel alterar as informações para esse Tema. \nErro: " . $erroMensagem);
    }
    else
    {
        echo "Tema alterado com sucesso!";   
    }
}
else
{
    echo 0;
}


?>

