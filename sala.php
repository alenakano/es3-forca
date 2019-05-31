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
/*
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
*/
   
?>

<!-- CSS de estilo de elementos da sala do jogo -->
<link rel="stylesheet" type="text/css" href="./lib/css/sala.css">



<body>

<div class="container" style="margin-top:0px;padding-top: 0px">
    <div class="dashboard col-sm-12" align="center" style="margin-top:0px; margin-bottom:0px;">
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
        <div class="row painel" align="center">
            <div class="col-sm-2 coluna-timer" >
                <div id="timer" align="center" style="margin-top: 8px;">
                </div>  
            </div>
            <div class="col-sm-8 coluna-centro">
                <div id="centro" align="center" style="margin-top: 3px;">
                </div>       
            </div>
            <div class="col-sm-2 coluna-botoes" id="botoes" align="center">            	
            	<button id="dica" class="btn btn-warning" style="width: 90%;" onclick="ComprarDica()">Dica</button>
            	<font face="Verdana" style="font-size: 14px;" id="textocustodica">Custo Dica: </font>
            	<font face="Verdana" style="font-size: 14px;" id="custodica">1</font>
            	<br>
            	<br>    
                <button id="desistir" class="btn btn-danger" style="width: 90%;" onclick="Desistir()">Desistir</button>     
            </div>
        </div>
    </div>
</div>

<script src="./lib/js/timer.js"></script>

<script type="text/javascript">
    var tempo_timer = 5;
    var refresher;
    var finalizador;
    var palavra = "";
    var id_sessao = "<?php echo $_SESSION['user']['id_usuario']; ?>";
    var idSala = 0;
    var letras_escolhidas = "";
    var nome_adversario = "";
    var nome_usuario = "";
    var id_usuario = 0;
    var id_adversario = 0;
    var id_palavra = 0;
    var id_vencedor = 0;
    var id_jogador_vez = 0;
    var credito = 0; 
    var finaliza_sala = "";
    var dicas = "";
    var qtddicas = 0;
    
    clearTimeout(refresher);
   
    
    AtualizaTela();


    function ApagaTimer(){
        var d = document.getElementById('timer');
        d.innerHTML = "";
    }

    function DesenhaTimer(segundos){
        var d = document.getElementById('timer');
        var br = document.createElement("br");
        d.appendChild(br);
        d.innerHTML = "Sua Vez";
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
                FinalizaSala(3500);
            }
            else{
                var texto = document.createElement('p');
                texto.setAttribute('class','letras-vit_det');
                texto.innerHTML = "Você perdeu!"; 
                d.appendChild(texto);
                FinalizaSala(3500);
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
                refresher = setTimeout(function(){AtualizaTela()}, 500);   

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
                    refresher = setTimeout(function(){AtualizaTela()}, 500);
                }
                else{

                    var letras = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']

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
                        
                        var espaco = document.createTextNode(' ');
                        d.appendChild(espaco);
                        
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
        
        var d = document.getElementById('dica1');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        if(qtdDicas>0){
        var t = document.createTextNode(dica1);   
        d.appendChild(t);
        }

        d = document.getElementById('dica2');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        if(qtdDicas>1){
        t = document.createTextNode(dica2);   
        d.appendChild(t);
        }

        
        d = document.getElementById('dica3');
        d.setAttribute('class','letras-dicas');
        d.innerHTML = "";
        if(qtdDicas>2){
        t = document.createTextNode(dica3);   
        d.appendChild(t);
        }
    }

                    
    function DesenhaBotoes(){        
        var bdicas = document.getElementById('dica'); 
        var tCustoDica = document.getElementById('textocustodica');
        var cDica = document.getElementById('custodica');
        var bdesistir = document.getElementById('desistir');

        if(id_adversario==0){
        	bdicas.setAttribute('onclick','');
        	bdicas.innerHTML = "Aguarde...";
        }
        else{
        	bdicas.setAttribute('onclick','ComprarDica()');
        	bdicas.innerHTML = "Dica";
        }

        if(qtddicas<3){
        	cDica.style.display = "inline";
        	if(qtddicas==2){
        		cDica.innerHTML = '5';
        	}
        	else{
        		if(qtddicas==1){
        			cDica.innerHTML = '3';
        		}
        		else{        		
        			cDica.innerHTML = '1';
        		}        		
        	}
        	
        }
        else{
        	bdicas.innerHTML = "Sem Dicas";
        	bdicas.setAttribute('onclick','');
        	tCustoDica.innerHTML = "Não há mais dicas!"
        	cDica.style.display = "none";
        	
        }      


        if(id_vencedor!=0)
        {	
        	bdicas.setAttribute('onclick','');
        	bdesistir.setAttribute('onclick','');
        	if(id_vencedor==id_sessao){
    			bdesistir.innerHTML = "(◉ω◉)";
    			bdicas.innerHTML	= "(◉ω◉)";
        	}
        	else{
        		bdesistir.innerHTML = "¯\\_(ツ)_/¯";	
        		bdicas.innerHTML	= "¯\\_(ツ)_/¯";
        	}
        }
        else{
        	bdesistir.setAttribute('onclick','Desistir()');;
        	bdesistir.innerHTML = "Desistir"	
        }               

    }

    function DesenhaForca(id,erros){
        var b = document.getElementById(id);
        if(b.innerHTML.indexOf(erros+'.jpeg')==-1){
            var img = document.createElement('img');
            img.setAttribute('alt','Desafiante');
            img.setAttribute('src','img/f'+erros+'.jpeg');
            img.setAttribute('height','auto');
            img.setAttribute('width','100%');

            b.innerHTML = "";
            b.appendChild(img);
        }
        
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

    function AtualizaTela(){
        clearTimeout(refresher);
        idSala = "<?php echo $dadosPartida[1]['id_sala']; ?>";
        letras_escolhidas = "";
        nome_adversario = "";
        nome_usuario = "";  
        var cabec = {idSala: idSala};    
            $.ajax({
                type: "post",
                url: "lib/php/atualiza-partida.php",
                assync: true,
                data: cabec,
                success: function(response)
                {
                    
                    /*window.alert(response); */  
                    

                    var retorno = JSON.parse(response);
                     
                    finaliza_sala = retorno['sala'][1]['sala_finalizada'];

                    if (finaliza_sala == 'S'){
                        window.location.href = "menu.php";
                    }
                    
                    DesenhaForca('imagem_desafiante',retorno['sala'][1]['erros_adversario']);
                    DesenhaForca('imagem_desafiado',retorno['sala'][1]['erros_usuario']);

                    id_usuario = retorno['sala'][1]['id_usuario'];
                    id_adversario = retorno['sala'][1]['id_adversario'];
                    id_palavra = retorno['sala'][1]['id_palavra'];
                    id_vencedor = retorno['sala'][1]['id_vencedor'];
                    id_jogador_vez = retorno['sala'][1]['id_jogador_vez'];
                    
                    nome_usuario = retorno['usuario'][1]['login'];
                    DesenhaNomeJogador('nome_desafiado',nome_usuario);

                    if(id_adversario!=0){
                        nome_adversario = retorno['adversario'][1]['login'];
                        DesenhaNomeJogador('nome_desafiante',nome_adversario);
                    }

                    credito = 0;
                    if(id_sessao==id_usuario){
                        credito = retorno['usuario'][1]['creditos'];
                        DesenhaCredito(credito);
                    }
                    else{
                        credito = retorno['adversario'][1]['creditos'];
                        DesenhaCredito(credito);
                    }

                    if(id_palavra!=0){
                        dicas = retorno['palavra'][1]['dicas'].split(",");
                        palavra = retorno['palavra'][1]['palavra'];
                        for(var k in retorno['letras']) {
                            letras_escolhidas = letras_escolhidas + " " + retorno['letras'][k]['letra'];
                        }
                    
                        if(id_sessao==id_usuario){

                            qtddicas = retorno['sala'][1]['dicas_usuario'];                             
                            DesenhaDicas(qtddicas,dicas[0],dicas[1],dicas[2]);
                        }
                        else{
                            qtddicas = retorno['sala'][1]['dicas_adversario'];
                            DesenhaDicas(qtddicas,dicas[0],dicas[1],dicas[2]);
                        }
                    }

                
                    if(id_vencedor != 0 || id_sessao != id_jogador_vez){
                        ApagaTimer();
                    }
                    else{
                        DesenhaTimer(tempo_timer);
                    }
                    
                    DesenhaCentro(id_sessao,id_adversario,id_vencedor,id_jogador_vez,letras_escolhidas,palavra);
                    DesenhaPalavra(palavra,letras_escolhidas);
                    DesenhaBotoes();          
                    
                    
                }      
           });
    }

        
    
    function VerificarLetra(letra)
    {
        if(letra!=''){
            parar();
        }
        var cabec = {idSala: idSala,idJogador: id_sessao,letra: letra};   
        $.ajax({
            type: "post",
            url: "lib/php/insere-letra.php",
            data: cabec,
            assync: true,
            success: function(response)
            {
                /*window.alert(response);*/
                AtualizaTela();
            }      
        });        
        
        return true;
    }

    function ComprarDica(){
        clearTimeout(refresher);
        var cabec = {idSala: idSala,idJogador: id_sessao};   
        $.ajax({
            type: "post",
            url: "lib/php/compra-dica.php",
            assync: true,
            data: cabec,
            success: function(response)
            {
               /*window.alert(response);*/
        		AtualizaTela();        
            }      
        });
        
    }

    function FinalizaSala(tempo){
        
            var cabec = {idSala: idSala};   
            $.ajax({
                type: "post",
                url: "lib/php/finaliza-sala.php",
                assync: true,
                data: cabec,
                success: function(response)
                {
                   setTimeout(function(){window.location.href = "menu.php";},tempo);  
                   /*
                   window.alert(response);      */   
                }      
            });
        
        
    }


    function Desistir(){
        if(window.confirm("Deseja desistir da partida?"))
        {
            FinalizaSala(0);
        }
    }
  
</script>
</body>