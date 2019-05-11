<?php  
include("conexao.dao.php");

if(isset($_REQUEST['tema']))
{
	$tema = strtoupper($_REQUEST['tema']);
	$tema = str_replace("á", "A", $tema); $tema = str_replace("â", "A", $tema); $tema = str_replace("ã", "A", $tema); $tema = str_replace("à", "A", $tema);
	$tema = str_replace("é", "E", $tema); $tema = str_replace("ê", "E", $tema);
	$tema = str_replace("í", "I", $tema); $tema = str_replace("î", "I", $tema);
	$tema = str_replace("ó", "O", $tema); $tema = str_replace("ô", "O", $tema); $tema = str_replace("õ", "O", $tema);
	$tema = str_replace("ú", "U", $tema); $tema = str_replace("û", "U", $tema);

	$parametros = array($tema);

	$sqlVerificacao = "SELECT * FROM forca_tema WHERE TEMA.TEMA = ?0";
	$dadosVerficacao = Conexao::ExecutarQuery($sqlVerificacao, $parametros);
	
	//var_dump($dadosVerficacao);

	if(!empty($dadosVerficacao))
	{
		die("Ja existe um tema com este nome cadastrado. Insira um tema novo e tente novamente.");
	}

	$sqlNovoTema = "INSERT INTO forca_tema (TEMA) VALUES (?0)";

	$response = Conexao::ExecutarQuery($sqlNovoTema, $parametros);

	if(!$response)
	{
		$erroMensagem = Conexao::GetErroConexao("mensagem");
		echo "Não foi possível incluir este novo tema \nErro: " . $erroMensagem;
	}
	else
	{
		echo "Novo tema inserido com sucesso!";
	}
}
else
{
	echo 0;
}
?>