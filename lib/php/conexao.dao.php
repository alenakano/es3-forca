<?php
class Conexao
{	
	//atributos de banco de dados
	private static $servidorNome;
	private static $servidorUsuario;
	private static $servidorSenha;
	private static $servidorBancoDeDados;	
	private static $porta = '3306';
	public static $conexao;
	private static $dbCharSet;
	private static $erroDeConexao = null;
	private static $idErroConexao = null;
	private static $erroMensagem = null;
	private static $mensagemGeral = "Nenhuma conexão";

	//metodos Set	
	private static function SetAtributoBD($servidor, $usuario, $senha, $banco)
	{
		self::$servidorNome = $servidor;
		self::$servidorUsuario = $usuario;
		self::$servidorSenha = $senha;
		self::$servidorBancoDeDados = $banco;
	}

	private static function SetConexao()
	{
		self::$conexao = new mysqli(
			self::$servidorNome, 
			self::$servidorUsuario, 
			self::$servidorSenha, 
			self::$servidorBancoDeDados
		);
		
		if(self::$conexao->connect_error)
		{
			self::SetErro(mysqli_connect_error(), mysqli_connect_errno());
			self::$conexao = false;
		}
		else
		{
			self::$conexao->set_charset("utf8");
		}
	}

	private static function SetQueryParametros($querySql, $arrayParametros)
	{
		$novaQuery = $querySql;

		for ($i = 0; $i < count($arrayParametros); $i++) 
		{ 	
			if(is_numeric($arrayParametros[$i]))
			{
				$novaQuery = str_replace("?" . $i, $arrayParametros[$i], $novaQuery);
			}
			else
			{
				$novaQuery = str_replace("?" . $i, "'" . $arrayParametros[$i] . "'", $novaQuery);
			}
			
		}
		
		return $novaQuery;
	}

	public static function SetErro($erroMensagem, $erroNumero)
	{
		self::$erroDeConexao = $erroMensagem;
		self::$idErroConexao = $erroNumero;
	}

	//metodos Get
	public static function GetInstancia()
	{
		if(isset(self::$conexao))
		{
			return self::$conexao;
		}

		//self::SetAtributoBD("devdatabase.mysql.dbaas.com.br", "devdatabase", "Bolado@123", "devdatabase");
		self::SetAtributoBD("127.0.0.1:".self::$porta, "root", "senha", "devdatabase");

		self::SetConexao();

		if(isset(self::$conexao) && self::$conexao !== false)
		{
			self::$conexao->set_charset("utf8");
			self::$dbCharSet = self::$conexao->character_set_name();
			self::$mensagemGeral = "Conexão estabelecida com sucesso";
			return self::$conexao;
		}
	}
	
	public static function GetConexao()
	{
		return self::$conexao;	
	}

	public static function GetErroConexao($tipo = null)
	{
		if($tipo != null)
		{
			if($tipo == "mensagem" || $tipo == "msg")
			{
				return self::$erroDeConexao;
			}

			if($tipo == "id")
			{
				return self::$idErroConexao;
			}
		}
		$retornoErroConexao = array(
			"mensagem" => self::$erroDeConexao,
			"id" => self::$idErroConexao
		);

		return $retornoErroConexao;
	}

	public static function GetErro()
	{
		return self::$erroMensagem;
	}

	public static function GetMensagem()
	{
		return Conexao::$mensagemGeral;
	}

	public static function GetBancoCharSet()
	{
		return self::$dbCharSet;
	}

	//metodos de acao
	public static function ExecutarQuery($querySql, $arrayParametros = null, $mostraQuery = false)
	{
		$con = self::GetInstancia();

		if($arrayParametros != null)
		{
			$querySql = self::SetQueryParametros($querySql, $arrayParametros);
		}

		if($mostraQuery)
		{
			echo("<pre><b>" . $querySql . "</b></pre>");		
		}

		$validaQuery = strpos($querySql, "?");
		if($validaQuery === false)
		{
			$arrQuery = explode(" ", $querySql);

			if($arrQuery[0] == "select" || $arrQuery[0] == "SELECT")
			{
				$resultadoQuery = $con->query($querySql);

				if(!$resultadoQuery)
				{
					self::SetErro($con->error, $con->errno);
					return false;
				}

				$dadosRetorno = array();
				$linha = 1;

				while($retorno = $resultadoQuery->fetch_assoc())
				{
					$dadosRetorno[$linha] = $retorno;
					$linha++;
				}
				
				return $dadosRetorno;
			}
			else
			{
				$response = $con->query($querySql);
				if(!$response)
				{
					self::SetErro(self::$conexao->error, self::$conexao->errno);
					return false;
				}

				return $response;
			}
		}
		else
		{
			self::$erroMensagem = 
				"Não foi possivel realizar a query: Nenhum parametro ou parametros insulficientes";
			return false;
		}
	}
}

?>