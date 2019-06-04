<body>
<div class="container" style="padding-top:0px;padding-bottom:0px;margin-top:2px;margin-bottom:-20px;">
    <div class="dashboard" style="padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;border-style:solid;border-width: 1px;border-image: url(img/corda.jpg) 7 / 7px repeat;">
        <div class="row style col-sm-12">
            <div class="column col-sm-5">
                <img src="img/logo.png" alt="Jogo da Forca" width="90%" height="auto">    
            </div>              
            <div class="col-sm-3 offset-sm-4 align-self-center">
                <?php if(isset($_SESSION['user'])):?>
                <div class="row" align="center">                            
                    Bem vindo <?=$_SESSION['user']['nome'] ?>.
                </div>
                <div class="row" style="margin-left:0px;">
                    <div class="column"  id="creditos">
                        Você possui 0
                    </div>
                    <div class="column" style="margin-left: 17px;">                    
                        <img src="img/coin.png" alt="coin" style="width: 24px;height: 24px;">
                    </div>
                </div>          
                <div class="row" id="vitorias">
                    0 Vitórias 
                </div>  
                <div class="row" >
                    <a href="lib/php/logout.php">Sair</a>
                    &nbsp;
                    &nbsp;
                    &nbsp;                  
                    <a href="perfil.php">Perfil</a>
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
    
