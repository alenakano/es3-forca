<?php
session_start();
// destruir os dados associados à sessão
$_SESSION = array();

 // destruir o cookie relacionado a esta sessão (peguei da net parte do codigo ver para que serve)
 /*
 if(isset($_COOKIE[session_name("documento")])){
   setcookie(session_name("documento"), '', time() - 1000, '/');
 }*/

session_destroy();


echo "<script>location.href = '../../index.php';</script>"
?>