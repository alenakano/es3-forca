<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<!-- meta tags -->
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="icon" href="img/favicon.ico">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- canvasjs -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <!-- Reseta todo CSS -->
    <link rel="stylesheet" type="text/css" href="lib/css/reset.css">

    <!-- Normalizar CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" crossorigin="anonymous">    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- bootstrap js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<title>Jogo da forca</title>

    <!-- CSS de estilo de elementos gerais da tela do jogo -->
    <link rel="stylesheet" type="text/css" href="lib/css/header.css">

    <!-- JS de controle do administrativo e do login-->
    <script type="text/javascript" src="lib/js/header.js"></script>

    <script type="text/javascript" src="lib/js/desenha-credito.js"></script>

</head>

<div class="container" style="padding-top:0px;padding-bottom:0px;margin-top:5px;margin-bottom:-20px;">
    <div class="dashboard" style="padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;border-style: solid;border-width: 3px;border-image: url(img/corda.jpg) 7 / 7px repeat ">
        <div class="row style">
            <div class="column" align="center">
                <img src="img/logo.png" alt="Jogo da Forca" width=351 height=100 style="margin-left: 50px;">    
            </div>              
            <div class="column" align="center" style="margin-top: 5px;margin-left:400px;">
                <?php if(isset($_SESSION['user'])):?>
                <div class="row" align="center">                            
                    Bem vindo <?=$_SESSION['user']['nome'] ?>.
                </div>
                <div class="row" style="margin-left:0px;">
                    <div class="column"  id="creditos">
                    </div>
                    <div class="column" style="margin-left: 17px;">                    
                        <img src="img/coin.png" alt="coin" style="width: 24px;height: 24px;">
                    </div>
                </div>          
                <div class="row" >
                    Sua pontuação é de <?=$_SESSION['user']['score']?> vitórias 
                </div>  
                <div class="row" >
                    <a href="lib/php/logout.php">Sair</a>
                    &nbsp;
                    &nbsp;
                    &nbsp;                  
                    <a href="#">Perfil</a>
                    &nbsp;
                    &nbsp;
                    &nbsp;                  
                        <?php if($_SESSION['user']['perfil'] == "adm"):?>
                            <a href="cadastros-listas.php">Painel Administrativo</a>                                 
                        <?php endif?>                            
                </div>  
                <?php endif?>                      
            </div>
        </div>              
    </div>
</div>
    

