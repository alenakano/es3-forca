<body>
<div class="container" style="padding-top:0px;padding-bottom:0px;margin-top:-20px;margin-bottom:3px;">
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
                    </div>
                    <div class="column" style="margin-left: 17px;">                    
                        <img src="img/coin.png" alt="coin" style="width: 22px;height: 22px;">
                    </div>
                </div>          
                <div class="row" >
                    Sua pontuação é de <?=$_SESSION['user']['score']?> vitórias 
                </div>  
                <div class="row" >
                    
                    &nbsp;
                   
                </div>  
                <?php endif?>                      
            </div>
        </div>              
    </div>
</div>
    
