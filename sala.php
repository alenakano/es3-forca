<?php
include_once("lib/php/header.php");  
include_once("lib/php/cabecalho3.php");
include_once("lib/php/querys.php");

if(!isset($_SESSION['user']))
{
    echo "<script>location.href = 'index.php';</script>";
}

include_once("lib/php/monta-partida.php");

if(empty($dadosPartida))
{
    echo "<script>location.href = 'menu.php';</script>";
}

$qtdVitorias = Busca::QtdVitorias($_SESSION['user']['id_usuario']);
$idTema = $dadosPartida[1]['id_tema'];
   
?>

<!-- CSS de estilo de elementos da sala do jogo -->
<link rel="stylesheet" type="text/css" href="./lib/css/sala.css">

<audio id="som_partida">
    <source src="sound/partida.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_espera">
    <source src="sound/espera.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_derrota">
    <source src="sound/derrota.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_vitoria">
    <source src="sound/vitoria.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_relogio">
    <source src="sound/relogio.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_alerta_acerto">
    <source src="sound/alerta_acerto.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_alerta_erro">
    <source src="sound/alerta_erro.ogg" type="audio/ogg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_corvo">
    <source src="sound/corvo.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_moeda">
    <source src="sound/moeda.mp3" type="audio/mpeg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<audio id="som_sangue">
    <source src="sound/sangue.ogg" type="audio/ogg">
    Seu navegador não possui suporte ao elemento audio
</audio>

<div class="container" style="margin-top:0px;padding-top: 0px">
    <div class="dashboard col-sm-12" align="center" style="margin-top:0px; margin-bottom:0px;">
        <div class="row" style="padding-top:6px; margin-bottom:0px;">
            <div class="col-sm-12" id="palavra">                                
            </div>
        </div>
        <div class="row" style="height: 100%;width: 100%;" align="center">
            <div class="col-sm-3" align="center">                                           
                <h1 id="imagem_desafiado">
                </h1>
                
                <h1 class="nomes" id="nome_desafiado">
                </h1>
            	
            </div>
            <div class="col-sm-6 dashboard-tips" align="center" >
                <br>
               <span class="titulos-tips">
               TEMA:
                </span>
                <br>
               <span class="tips">
               <?php
               echo($dadosPartida[1]['tema'])
               ?>               
               </span>
               <br>
               <br>               
               <span class="titulos-tips">
               DICAS:
                </span>
                <br>
               <h1 id="dica1" class="tips"></h1>
               <h1 id="dica2" class="tips"></h1>
               <h1 id="dica3" class="tips"></h1>
            </div>
            <div class="col-sm-3" align="center">                                       
                <h1 id="imagem_desafiante">
                </h1>
                           
                <h1 class="nomes" id="nome_desafiante">
                </h1>
              	
            </div>
        </div>
        <div class="row painel" align="center" style="margin-top:3px; margin-bottom:1px;">
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


<script src="./lib/js/som.js"></script>
<script src="./lib/js/timer.js"></script>


<script type="text/javascript">
    som_espera_play();
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
    var id_personagem_usuario = 0;
    var id_adversario = 0;
    var id_personagem_adversario = 0;
    var id_palavra = 0;
    var id_vencedor = 0;
    var id_jogador_vez = 0;
    var credito = 0; 
    var finaliza_sala = "";
    var dicas = "";
    var qtddicas = 0;
    var qtdVitorias = "<?php echo $qtdVitorias?>";
    var idTema = "<?php echo $idTema?>";
    var ultimaAtualizacaoSala;
    var ultimaInteraçãoUsuario;
    var ultimaInteraçãoAdversario;
    var dataHoraServidor;
    
    DesenhaVitorias(qtdVitorias);
    
    clearTimeout(refresher);
   
    
    AtualizaTela();


    function ApagaTimer(){        
        var d = document.getElementById('timer');
        d.innerHTML = "";
        parar();
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
            som_espera_stop();
            som_partida_stop();
            som_corvo_stop();
            som_alerta_erro_stop();
            som_alerta_acerto_stop();
            if(idVencedor==idJogador){
                som_vitoria_play();
                var texto = document.createElement('p');
                texto.setAttribute('class','letras-vit_det');
                texto.innerHTML = "Você venceu!";
                d.appendChild(texto);
                FinalizaSala(3500);
            }
            else{
                som_derrota_play();
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
                refresher = setTimeout(function(){AtualizaTela()}, 100);   

            }
            else{
                if(tempo_som_partida()==0){
                    som_espera_stop();
                    som_partida_play();
                }
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
                    AvaliaDesconexão();
                    refresher = setTimeout(function(){AtualizaTela()}, 100);
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

    function AvaliaDesconexão(){
        /*var hora;
        if(id_sessao==id_usuario){
            hora = ultimaInteraçãoAdversario;            
        }
        else{
            hora = ultimaInteraçãoUsuario;
        }*/
        if(dataHoraServidor.getTime() - ultimaAtualizacaoSala.getTime()>10000){
        clearTimeout(refresher);
        var cabec = {idSala: idSala,idJogador: id_sessao};    
            $.ajax({
                type: "post",
                url: "lib/php/desconexao-partida.php",
                assync: true,
                data: cabec,
                success: function(response)
                {                    
                    window.alert(response);
                    AtualizaSala();                      

                    
                }      
           });
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
        d.setAttribute('class','tips');
        d.innerHTML = "";
        if(qtdDicas>0){
        var t = document.createTextNode(dica1);   
        d.appendChild(t);
        }

        d = document.getElementById('dica2');
        d.setAttribute('class','tips');
        d.innerHTML = "";
        if(qtdDicas>1){
        t = document.createTextNode(dica2);   
        d.appendChild(t);
        }

        
        d = document.getElementById('dica3');
        d.setAttribute('class','tips');
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

        if(id_adversario==0 || id_jogador_vez!=id_sessao){
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

    function DesenhaForca(id,erros,idPersonagem){
        var b = document.getElementById(id);
        if(b.innerHTML.indexOf(erros+'.png')==-1){
            var img = document.createElement('img');
            img.setAttribute('alt','Desafiante');
            img.setAttribute('src','img/players/'+idPersonagem+'-'+erros+'.png');
            img.setAttribute('class','img-forca');

            b.innerHTML = "";
            b.appendChild(img);
            if(erros>0){
                
                if(erros>3){
                    som_sangue_play();
                }
                else{
                    som_corvo_play();    
                }
            }
        }
        
    }

    function DesenhaNomeJogador(id,nome){
        var b = document.getElementById(id);
        
        b.setAttribute('class','letras-geral');
        b.style.align = "center";
        b.style.marginBottom = "0px";
        b.innerHTML = nome;
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
                url: "lib/php/le-partida.php",
                assync: true,
                data: cabec,
                success: function(response)
                {
                    
                    /*window.alert(response); */  
                    

                    var retorno = JSON.parse(response);
                     
                    finaliza_sala = retorno['sala'][1]['sala_finalizada'];
                    

                    dataHoraServidor = new Date(retorno['datahoraservidor']);
                    id_usuario = retorno['sala'][1]['id_usuario'];
                    id_adversario = retorno['sala'][1]['id_adversario'];
                    id_palavra = retorno['sala'][1]['id_palavra'];
                    id_vencedor = retorno['sala'][1]['id_vencedor'];
                    id_jogador_vez = retorno['sala'][1]['id_jogador_vez'];
                    
                    nome_usuario = retorno['usuario'][1]['login'];
                    id_personagem_usuario = retorno['usuario'][1]['id_personagem'];
                    DesenhaForca('imagem_desafiado',retorno['sala'][1]['erros_usuario'],id_personagem_usuario);
                    DesenhaNomeJogador('nome_desafiado',nome_usuario);

                    ultimaAtualizacaoSala = new Date(retorno['sala'][1]['ultima_atualizacao']);
                    ultimaInteraçãoUsuario = new Date(retorno['usuario'][1]['ultima_interacao']);

                    if(id_adversario!=0){
                        nome_adversario = retorno['adversario'][1]['login'];
                        id_personagem_adversario = retorno['adversario'][1]['id_personagem'];
                        ultimaInteraçãoAdversario = new Date(retorno['adversario'][1]['ultima_interacao']);
                        DesenhaNomeJogador('nome_desafiante',nome_adversario);
                        DesenhaForca('imagem_desafiante',retorno['sala'][1]['erros_adversario'],id_personagem_adversario);
                    }
                    else{
                        DesenhaForca('imagem_desafiante',retorno['sala'][1]['erros_adversario'],0);
                    }

                    credito = 0;
                    if(id_sessao==id_usuario){
                        qtdVitorias = retorno['qtdvitusu'];
                        credito = retorno['usuario'][1]['creditos'];
                        DesenhaCredito(credito);
                    }
                    else{
                        qtdVitorias = retorno['qtdvitadv'];
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
                    
                    DesenhaVitorias(qtdVitorias);
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
            if(palavra.indexOf(letra) >= 0){
                som_alerta_acerto_play();
            }
            else{
                som_alerta_erro_play();    
            }
        }
        else{
            som_alerta_erro_play();
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
               som_moeda_play();
        		AtualizaTela();        
            }      
        });
        
    }

    function FinalizaSala(tempo){
            clearTimeout(refresher);
            var cabec = {idSala: idSala};   
            $.ajax({
                type: "post",
                url: "lib/php/finaliza-sala.php",
                assync: true,
                data: cabec,
                success: function(response)
                {
                   setTimeout(function(){NovaPartida()},tempo);  
                   
                   /*window.alert(response);      */  
                }      
            });        
        
    }


    function Desistir(){
        clearTimeout(refresher);
        var cabec = {idSala: idSala,idJogador: id_sessao};    
            $.ajax({
                type: "post",
                url: "lib/php/desistir-partida.php",
                assync: true,
                data: cabec,
                success: function(response)
                {                    
                    if(response === '0'){
                        FinalizaSala(0);
                    }
                    else{
                        AtualizaTela();
                    }                  

                    
                }      
           });
    }

    function NovaPartida(){
        window.location.href = "menu.php";
        /*if(id_adversario==0){
            window.location.href = "menu.php";
        }
        else{
            if(window.confirm("Deseja jogar uma nova partida?")){
                var cabec = {idTema: idTema,idUsuario: id_sessao,senha: idSala,privado: 'S'}; 
                $.ajax({
                    type: "post",
                    url: "lib/php/cadastrar-sessao.php",
                    data: cabec,
                    assync: true,
                    success: function(response)
                    {
                    /*window.alert(response);
                    /*location.reload(); */
                     /*   location.href = "sala.php"; 
                    }      
                }); 
            }
            else{
                window.location.href = "menu.php";   
            }
        }*/
    }
  
</script>
</body>