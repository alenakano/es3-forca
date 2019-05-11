<?php 
include("conexao.dao.php");

if(isset($_REQUEST))
{
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

	$parametros = array($palavra, $_REQUEST['id_tema'], $dica);

	$sqlVerificacao = "SELECT * FROM forca_palavra WHERE PALAVRA.PALAVRA = ?0";
	$dadosVerficacao = Conexao::ExecutarQuery($sqlVerificacao, $parametros);
	
	if(!empty($dadosVerficacao))
	{
		die("Ja existe uma palavra com este nome cadastrada. Insira uma palavra nova e tente novamente.");
	}

	$sqlNovoPalavra = "INSERT INTO forca_palavra (PALAVRA, ID_TEMA, DICAS) VALUES (?0, ?1, ?2)";

	$response = Conexao::ExecutarQuery($sqlNovoPalavra, $parametros);

	if(!$response)
	{
		$erroMensagem = Conexao::GetErroConexao("mensagem");
		echo "Não foi possível incluir esta nova Palavra \nErro: " . $erroMensagem;
	}
	else
	{
		echo "Nova Palavra inserida com sucesso!";
	}
}
else
{
    echo 0;
}


?>