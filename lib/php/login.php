<?php 
session_start();
include("conexao.dao.php");

if(isset($_REQUEST['login'], $_REQUEST['senha']))
{
    $login = $_REQUEST['login'];
    $senha = md5($_REQUEST['senha']);

    $sqlLogin = "SELECT * FROM forca_usuario U, forca_score S WHERE U.LOGIN = ?0 AND U.SENHA = ?1 AND U.ID_USUARIO = S.ID_USUARIO";

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
        $_SESSION['user']['score'] = $dados[$linha]['score'];
        
        
        if($_SESSION['user']['perfil'] == "adm")
        {
            echo "adm";
        }

        else
        {
            echo "pla";
        }
    }
}
else
{
    echo 0;
}


?>