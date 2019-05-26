<?php
include_once("lib/php/header.php");  
include_once("lib/php/conexao.dao.php");

if(!isset($_SESSION['user']))
{
    echo "<script>location.href = 'index.php';</script>";
}

include_once("lib/php/monta-partida.php");

if(empty($dadosPartida))
{
    echo "<script>location.href = 'menu.php';</script>";
}

$palavra = "";
$dica1 = "";
$dica2 = "";
$dica3 = "";

if($dadosPartida[1]['id_palavra']!=0){
    $palavra = $dadosPalavra[1]['palavra'];
    $dicas = explode(",", $dadosPalavra[1]['dicas']);
    $dica1 = $dicas[0];
    $dica2 = $dicas[1];
    $dica3 = $dicas[2];
}

$nomeAdversario = "&nbsp;";

if((isset($dadosAdversario[1]))) {                
    $nomeAdversario = $dadosAdversario[1]['login'];
}
$letras_escolhidas = implode(" ",array_column($dadosLetras, 'letra'));   

   
?>

<style>
    .letras-jogo
    {
        overflow: hidden;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
        font-size: 18px;        
        background-size: cover;
        border-radius: 5px;
        border-color: #8B795E;
        border-style: solid;        
        transition-duration: 0.4s;
        display: inline-block;
        background-color: white;
        color: black;        
        text-shadow: 1px 1px 1px black; 
    }
    .letras-dicas
    {
        font-weight: bold;
        font-size: 18px;
        text-shadow: 1px 1px 1px black;
        color: #F0FFF0;
    }

    .letras-vazia
    {
        overflow: hidden;
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
        font-size: 18px;        
        background-size: cover;
        border-radius: 5px;
        border-color: white;
        border-style: solid;        
        transition-duration: 0.4s;
        display: inline-block;
        background-color: white;
        color: black;        
        text-shadow: 1px 1px 1px black; 
    }

    .letras-timer
    {
        overflow: hidden;
        padding: 15px;
        font-weight: bold;
        font-size: 28px;        
        background-size: cover;
        border-radius: 10px;
        border-color: black;
        border-style: solid;        
        transition-duration: 0.4s;
        display: inline-block;
        background-color: white;
        color: black;
    }
    .letras-geral
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 20px;                         
        display: inline-block;        
        color: black;               
    }
    .letras-vit_det
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 72px;                         
        display: inline-block;        
        color: black;               
    }

    .letras-waiting
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 32px;                         
        display: inline-block;        
        color: black;               
    }

    .letras-waiting-play
    {
        overflow: hidden;
        font-weight: bold;
        font-size: 24px;                         
        display: inline-block;        
        color: black;               
    }

    .painel
    {
        width:100%;
        padding-top: 10px;        
        background-size: cover;
        border-radius: 5px;
        border-color: #8B795E;
        border-style: solid;   
        background-color: white;
        color: black;
        align-content: center;        
    }

    .letras-selecao
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: #686868;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-erradas
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: red;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-certas
    {
        overflow: hidden;
        padding: 13px;
        font-weight: bold;
        font-size: 18px;
        background-size: cover;
        border-radius: 10px;
        transition-duration: 0.4s;
        display: inline-block;
        background-color: blue;
        color: white;
        text-shadow: 1px 1px 1px black; 
    }
    .letras-selecao:hover 
    {
        background-color: #CDC1C5;

    }
 
        
</style>



<body>

<div class="container" style="margin-top:0px;padding-top: 0px">
    <div class="dashboard" align="center" style="margin-top:0px; margin-bottom:0px;">
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-sm-12" id="palavra">                                
            </div>
        </div>
        <div class="row" style="margin-top: 0px;width: 100%;" align="center">
            <div class="col-sm-3" align="center">                                           
                <h1 id="imagem_desafiado">
                </h1>
                <h1 id="nome_desafiado">
                </h1>
            </div>
            <div class="col-sm-6 dashboard-tips" align="center" style="margin-top:0px; margin-bottom:30px;">
               <br>
               TEMA:
               <br>
               <?php
               echo($dadosPartida[1]['tema'])
               ?>
               <br>               
               <br>
               DICAS:
               <h1 id="dica1"></h1>
               <h1 id="dica2"></h1>
               <h1 id="dica3"></h1>
            </div>
            <div class="col-sm-3" align="center">                                       
                <h1 id="imagem_desafiante">
                </h1>           
                <h1 id="nome_desafiante">
                  </h1>
            </div>
        </div>
        <div class="row painel" style="margin-top: -20px;" align="center">
            <div class="col-sm-2" id="timer" style="padding-left:40px;">
            </div>            
            <div class="col-sm-7" id="centro" align="center">
                         
            </div>

            <div class="col-sm-3" id="botoes" style="padding-right:15px;padding-top: 6px;">                
                
            </div>
        </div>
    </div>
</div>

<script src="lib/js/timer.js"></script>

<script type="text/javascript">

    AtualizaTudo();

    function AtualizaTudo(){
        var erros_adversario = "<?php echo $dadosPartida[1]['erros_adversario']; ?>";
        var erros_usuario = "<?php echo $dadosPartida[1]['erros_usuario']; ?>";
        var dicas_adversario = "<?php echo $dadosPartida[1]['dicas_adversario']; ?>";
        var dicas_usuario = "<?php echo $dadosPartida[1]['dicas_usuario']; ?>";
        DesenhaForca('imagem_desafiante',erros_adversario);
        DesenhaForca('imagem_desafiado',erros_usuario);
        var nome_adversario = "<?php echo $nomeAdversario; ?>";
        var nome_usuario = "<?php echo $dadosUsuario[1]['login']; ?>";
        DesenhaNomeJogador('nome_desafiante',nome_adversario);
        DesenhaNomeJogador('nome_desafiado',nome_usuario);
        DesenhaBotoes();
        var id_sessao = "<?php echo $_SESSION['user']['id_usuario']; ?>";
        var id_usuario = "<?php echo $dadosPartida[1]['id_usuario']; ?>";
        var id_vencedor = "<?php echo $dadosPartida[1]['id_vencedor']; ?>";
        var id_adversario = "<?php echo $dadosPartida[1]['id_adversario']; ?>";
        var id_jogador_vez = "<?php echo $dadosPartida[1]['id_jogador_vez']; ?>";
        var dica1 = "<?php echo $dica1; ?>";
        var dica2 = "<?php echo $dica2; ?>";
        var dica3 = "<?php echo $dica3; ?>";
        

        var id_palavra = "<?php echo $dadosPartida[1]['id_palavra']; ?>";
        
        var palavra = "<?php echo $palavra; ?>";
        console.log(id_palavra);
        
        if(id_sessao==id_usuario){
            DesenhaDicas(dicas_usuario,dica1,dica2,dica3);
        }
        else{
            DesenhaDicas(dicas_adversario,dica1,dica2,dica3);
        }

        var letras_escolhidas = "<?php echo $letras_escolhidas; ?>";
        console.log(letras_escolhidas);
        
        DesenhaPalavra(palavra,letras_escolhidas);

        if(id_vencedor==0 && id_adversario!=0 && id_jogador_vez==id_sessao){
            DesenhaTimer(5);    
        }
        
        DesenhaCentro(id_sessao,id_adversario,id_vencedor,id_jogador_vez,letras_escolhidas,palavra);

    }

    function ApagaTimer(){
        var d = document.getElementById('timer');
        d.innerHTML = "";
    }

    function DesenhaTimer(segundos){
        var d = document.getElementById('timer');
        d.innerHTML = "Sua Vez";
        var br = document.createElement('br');
        d.appendChild(br);
        var p = document.createElement('p');
        p.setAttribute('class','letras-timer');
        p.setAttribute('id','time');
        p.innerHTML = segundos;
        d.appendChild(p);
        iniciar();
    }

    function DesenhaCentro(idJogador,idAdversario,idVencedor,idJogadorVez,letras_escolhidas,palavra){
        var d = document.getElementById('centro');
        d.innerHTML = "";
        if(idVencedor!=0){
            if(idVencedor==idJogador){
                var texto = document.createElement('p');
                texto.setAttribute('class','letras-vit_det');
                texto.innerHTML = "Você venceu!";
                d.appendChild(texto);    
            }
            else{
                var texto = document.createElement('p');
                texto.setAttribute('class','letras-vit_det');
                texto.innerHTML = "Você perdeu!"; 
                d.appendChild(texto);      
            }
        }
        else{
            if(idAdversario==0){
                var texto = document.createElement('p');
                var br = document.createElement('br');
                d.appendChild(br);
                texto.setAttribute('class','letras-waiting');
                texto.innerHTML = "Aguardando Adversário...!"; 
                d.appendChild(texto);
            }
            else{
                if(idJogadorVez!=idJogador){
                    var texto = document.createElement('p');
                    texto.setAttribute('class','letras-waiting-play');
                    texto.innerHTML = "Aguardando Jogada do"; 
                    d.appendChild(texto);
                    var br = document.createElement('br');
                    d.appendChild(br);
                    var texto = document.createElement('p');
                    texto.setAttribute('class','letras-waiting-play'); 
                    texto.innerHTML = "Adversário..."; 
                    d.appendChild(texto);

                }
                else{

                    var letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','O','P','Q','R','S','T','U','V','W','X','Y','Z']

                    for (var i = 0; i < letras.length; i++) {
                        var letra = document.createElement('div');
                        if(letras_escolhidas.indexOf(letras[i])==-1){
                            letra.setAttribute('class','letras-selecao');
                            letra.setAttribute('onclick','VerificarLetra(\''+letras[i]+'\')');    
                        }
                        else{
                            letra.setAttribute('onclick','');
                            if(palavra.indexOf(letras[i])>-1){
                                letra.setAttribute('class','letras-certas');
                            }
                            else{
                                letra.setAttribute('class','letras-erradas');   
                            }       
                        }
                        
                        letra.innerHTML = letras[i];
                        d.appendChild(letra);
                        if(letras[i]=='M'){
                            var br = document.createElement('br');
                            d.appendChild(br);
                        }
                        else{
                            var espaco = document.createTextNode(' ');
                            d.appendChild(espaco);
                        }
                    }
                }
            }
        }
    }

    function DesenhaPalavra(palavra,letras_escolhidas){        
        var d = document.getElementById('palavra');
        d.innerHTML = "";
        if(palavra==""){
            var letra = document.createElement('div');
            letra.setAttribute('class','letras-vazia');
            letra.innerHTML = '&nbsp';
            d.appendChild(letra);
        }
        else{
            var letras_split = palavra.split("");            
            for (var i = 0; i < letras_split.length; i++) {
                var letra = document.createElement('div');
                letra.setAttribute('class','letras-jogo');
                if(letras_escolhidas.indexOf(letras_split[i])>-1){
                    letra.innerHTML = letras_split[i];
                }
                else{
                    letra.innerHTML = '&nbsp';
                }
                
                d.appendChild(letra);
                var espaço = document.createTextNode(" ");
                d.appendChild(espaço);   
            }
   
        }
    } 

    function DesenhaDicas(qtdDicas,dica1,dica2,dica3){
        if(qtdDicas>0){
        var d = document.getElementById('dica1');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        var t = document.createTextNode(dica1);   
        d.appendChild(t);
        }

        if(qtdDicas>1){
        d = document.getElementById('dica2');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        t = document.createTextNode(dica2);   
        d.appendChild(t);
        }

        if(qtdDicas>2){
        d = document.getElementById('dica3');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        t = document.createTextNode(dica3);   
        d.appendChild(t);
        }
    }

                    
    function DesenhaBotoes(){
        var b = document.getElementById('botoes');

        var dicas = document.createElement('button');
        dicas.setAttribute('class','btn btn-warning');
        dicas.setAttribute('onclick','DesenhaBotoes(1)');
        dicas.innerHTML = "Dica";

        var p = document.createElement("p");

        var desistir = document.createElement('button');
        desistir.setAttribute('class','btn btn-danger');
        desistir.innerHTML = "Desistir";

        dicas.style.width = "80%";
        desistir.style.width = "80%";

        b.innerHTML = "";
        b.appendChild(dicas);
        b.appendChild(p);
        b.appendChild(desistir); 
    }
    function DesenhaForca(id,erros){
        var b = document.getElementById(id);

        var img = document.createElement('img');
        img.setAttribute('alt','Desafiante');
        img.setAttribute('src','img/f'+erros+'.jpeg');
        img.setAttribute('height','240px');
        img.setAttribute('width','240px');

        b.innerHTML = "";
        b.appendChild(img);
        
    }
    function DesenhaNomeJogador(id,nome){
        var b = document.getElementById(id);
        
        var nomeJ = document.createElement('p');
        nomeJ.setAttribute('class','letras-geral');
        nomeJ.style.align = "center";
        nomeJ.innerHTML = nome;

        b.innerHTML = "";
        b.appendChild(nomeJ);
    }
        
    

    function VerificarLetra(letra)
    {
        return true;
    }
  
</script>
</body>