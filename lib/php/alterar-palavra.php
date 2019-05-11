<?php 
include("conexao.dao.php");

if(isset($_REQUEST))
{
    $sqlUpdateTema = "UPDATE forca_palavra SET PALAVRA = ?0, ID_TEMA = ?1, DICAS = ?2 WHERE PALAVRA.ID_PALAVRA = ?3";

    $palavra = strtoupper($_REQUEST['palavra']);
	$palavra = str_replace("á", "A", $palavra); $palavra = str_replace("â", "A", $palavra); $palavra = str_replace("ã", "A", $palavra); $palavra = str_replace("à", "A", $palavra);
	$palavra = str_replace("é", "E", $palavra); $palavra = str_replace("ê", "E", $palavra);
	$palavra = str_replace("í", "I", $palavra); $palavra = str_replace("î", "I", $palavra);
	$palavra = str_replace("ó", "O", $palavra); $palavra = str_replace("ô", "O", $palavra); $palavra = str_replace("õ", "O", $palavra);
    $palavra = str_replace("ú", "U", $palavra); $palavra = str_replace("û", "U", $palavra);
    
    $dica = strtoupper($_REQUEST['dicas']);
	$dica = str_replace("á", "A", $dica); $dica = str_replace("â", "A", $dica); $dica = str_replace("ã", "A", $dica); $dica = str_replace("à", "A", $dica);
	$dica = str_replace("é", "E", $dica); $dica = str_replace("ê", "E", $dica);
	$dica = str_replace("í", "I", $dica); $dica = str_replace("î", "I", $dica);
	$dica = str_replace("ó", "O", $dica); $dica = str_replace("ô", "O", $dica); $dica = str_replace("õ", "O", $dica);
	$dica = str_replace("ú", "U", $dica); $dica = str_replace("û", "U", $dica);

    $parametros = array($palavra, $_REQUEST['id_tema'], $dica, $_REQUEST['id_palavra']);

    $response = Conexao::ExecutarQuery($sqlUpdateTema, $parametros);

    if(!$response)
    {
        $erroMensagem = Conexao::GetErroConexao();
        die("Não foi possivel alterar as informações para essa Palavra. \nErro: " . $erroMensagem);
    }
    else
    {
        echo "Palavra alterado com sucesso!";   
    }
}
else
{
    echo 0;
}


?>
