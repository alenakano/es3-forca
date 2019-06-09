<?php 
session_start();
include("conexao.dao.php");
include_once("atualiza-logs.php");

if(isset($_REQUEST['login'], $_REQUEST['senha']))
{
    $login = $_REQUEST['login'];
    $senha = md5($_REQUEST['senha']);

    $sqlLogin = "SELECT * FROM forca_usuario U WHERE U.LOGIN = ?0 AND U.SENHA = ?1";

    $parametros = array($login, $senha);

    $dados = Conexao::ExecutarQuery($sqlLogin, $parametros);

    if(empty($dados))
    {
        echo "erro";
    }
    else
    {
        $linha = count($dados);
        $_SESSION['user']['id_sessao'] = session_id();
        $_SESSION['user']['id_usuario'] = $dados[$linha]['id_usuario'];
        $_SESSION['user']['nome'] = $dados[$linha]['nome'];
        $_SESSION['user']['login'] = $dados[$linha]['login'];
        $_SESSION['user']['perfil'] = $dados[$linha]['perfil'];
        
        if($_SESSION['user']['perfil'] == "adm")
        {
            echo "adm";
        }

        else
        {
            echo "pla";
        }
        
        Log::AtualizarJogador($_SESSION['user']['id_usuario']);
        
    }
}
else
{
    echo 0;
}


?>