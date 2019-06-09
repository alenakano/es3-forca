<?php 
include("conexao.dao.php");

if(isset($_REQUEST))
{
    $sqlUpdateTema = "UPDATE forca_usuario SET ID_PERSONAGEM = ?0 WHERE ID_USUARIO = ?1";

    $parametros = array(strtoupper($_REQUEST['idPersonagem']), $_REQUEST['idJogador']);

    $response = Conexao::ExecutarQuery($sqlUpdateTema, $parametros);

    if(!$response)
    {
        $erroMensagem = Conexao::GetErroConexao();
        die("Não foi possivel salvar alteração do personagem. \nErro: " . $erroMensagem);
    }
    else
    {
        echo "Personagem alterado com sucesso!";   
    }
}
else
{
    echo 0;
}


?>

