<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
	<!-- meta tags -->

    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- canvasjs -->
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

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

    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnJogar").click(function(){
                var nick = $("input[name='nick']").val();
                var senha = $("input[name='senha']").val();
                if(nick == "" || senha == "")
                {
                    window.alert("É necessario inserir um Apelido para poder jogar! \nDigite seu apelido e tente novamente.");
                }
            });

            $("#btnCadastro").click(function (){
                $("#formCadastro").toggle("slow");
            })
            
            $("formCadastro").hide();
            $("#formCadastroTemaDiv").hide();
            $("#formCadastroPalavraDiv").hide();
            $("#tabelaTemaDiv").hide();
            $("#tabelaPalavraDiv").hide();
            $("#tabelaUsuarioDiv").hide();


            $("#btnTema").click(function(){
                $("#formCadastroTemaDiv").toggle('slow');
                $("#formCadastroPalavraDiv").hide('slow');
                $("#tabelaTemaDiv").hide('slow');
                $("#tabelaPalavraDiv").hide('slow');
                $("#tabelaUsuarioDiv").hide('slow');
            });

            $("#btnTemaLista").click(function(){
                $("#formCadastroTemaDiv").hide('slow');
                $("#formCadastroPalavraDiv").hide('slow');
                $("#tabelaTemaDiv").toggle('slow');
                $("#tabelaPalavraDiv").hide('slow');
                $("#tabelaUsuario").hide('slow');
            });

            $("#btnPalavra").click(function(){
                $("#formCadastroTemaDiv").hide('slow');
                $("#formCadastroPalavraDiv").toggle('slow');
                $("#tabelaTemaDiv").hide('slow');
                $("#tabelaPalavraDiv").hide('slow');
                $("#tabelaUsuario").hide('slow');
            });

            $("#btnPalavraLista").click(function(){
                $("#formCadastroTemaDiv").hide('slow');
                $("#formCadastroPalavraDiv").hide('slow');
                $("#tabelaTemaDiv").hide('slow');
                $("#tabelaPalavraDiv").toggle('slow');
                $("#tabelaUsuario").hide('slow');
            });

            $("#btnUsuarioLista").click(function(){
                $("#formCadastroTemaDiv").hide('slow');
                $("#formCadastroPalavraDiv").hide('slow');
                $("#tabelaTemaDiv").hide('slow');
                $("#tabelaPalavraDiv").hide('slow');
                $("#tabelaUsuarioDiv").toggle('slow');
            });

            $("#tabelaResultado").DataTable(
                {
                    "language":
                    {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    },
                    
                    "order": [[ 1, "desc" ]]
                }
            );

            $("#tabelaTema").DataTable(
                {
                    "language":
                    {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                }
            );

            $("#tabelaPalavra").DataTable(
                {
                    "language":
                    {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                }
            );

            $("#tabelaUsuario").DataTable(
                {
                    "language":
                    {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    },
                    
                    "order": [[ 1, "desc" ]]
                }
            );

        });
    </script>

    <style type="text/css">

    @import url('https://fonts.googleapis.com/css?family=Fascinate+Inline|Montserrat|Roboto');

    body{
	   background-image: url(img/fundo.jpg);
        background-size: 100% 100%;
        font-family: 'Montserrat', sans-serif;
    }
    .dashboard {
        background-color: white;
        padding: 5px; 
        border-radius: 15px;        
    }

    .dashboard-form {
        background-color: white;
        padding: 5px; 
        border-radius: 5px;
        box-shadow: 0px 5px 5px 1px #888888;
    }

    .dashboard-tips {
        background-image: url(img/painel.jpg);
        background-size: cover;
        border-radius: 5px;
        font-weight: bold;
        font-size: 18px;
        text-shadow: 1px 1px 1px black;  
        color: #F0FFF0;
        border-image: url(img/corda.jpg) 5 / 5px repeat; 
    }

    .title {
        font-family: 'Fascinate Inline', cursive;
        font-size: 35px;
    }
    
    .jogo{
            background-image: url("https://i.ytimg.com/vi/bWghPe5YB7g/maxresdefault.jpg");
            color: white;
            height: 100%;
            overflow: hidden;
            padding: 30px;
            font-weight: bold;
            font-size: 30px;
            width: 33%;
            background-size: cover;
            border-radius: 10px;
            text-shadow: 4px 4px 2px black;
            transition-duration: 0.4s;
            display: inline-block;
        }

        .jogo:hover{
            background-image: url("http://93fm.radio.br/wp-content/uploads/2018/12/musicas.jpg");   
            background-size: cover;
            cursor:pointer;
        }


</style>

</head>
<div class="container" style="padding-top:0px;padding-bottom:0px;margin-top:3px;margin-bottom:-20px;">
    <div class="dashboard" style="padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;border-image: url(img/corda.jpg) 7 / 7px repeat;">
                <div class="row">
                    <div class="column" align="center">
                        <img src="img/logo.png" alt="Jogo da Forca" width=351 height=100 style="margin-left: 50px;">    
                    </div>              
                    <div class="column" align="center" style="margin-top: 15px;margin-left:400px;">
                        <div class="row" >
                            <?php if(isset($_SESSION['user'])):?>
                            Bem vindo <?=$_SESSION['user']['nome'] ?>.
                            &nbsp;
                            &nbsp;
                            <?=$_SESSION['user']['creditos'] ?>
                            <?php endif?> 
                            

                        </div>          
                        <div class="row" >
                            <?php if(isset($_SESSION['user'])):?>
                            Sua pontuação é de <?=$_SESSION['user']['score']?> vitórias 
                            <?php endif?>
                        </div>  
                        <div class="row" >
                            <?php if(isset($_SESSION['user'])):?>
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
                            <?php endif?>
                        </div>                        
                    </div>
                </div>              
    </div>
</div>
    

