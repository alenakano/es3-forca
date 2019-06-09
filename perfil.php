<?php
include_once("lib/php/header.php");
include_once("lib/php/cabecalho2.php");
include_once("lib/php/querys.php");

if(!isset($_SESSION['user']))
{
    echo "<script>location.href = 'index.php';</script>";
}

include_once("lib/php/monta-sessao.php");

$id_sessao = $_SESSION['user']['id_usuario'];

$i = 1; 
while($i <= count($dadosSessao)){
    if($dadosSessao[$i]['id_usuario'] == $id_sessao || $dadosSessao[$i]['id_adversario'] == $id_sessao){
        echo "<script>location.href = 'sala.php';</script>";
    }
 $i++;   
}
$creditos = $dadosJogador[1]['creditos'];
$qtdVitorias = Busca::QtdVitorias($_SESSION['user']['id_usuario']);
$id_personagem = $dadosJogador[1]['id_personagem'];

?>

<link rel="stylesheet" type="text/css" href="./lib/css/menu.css">
<link rel="stylesheet" type="text/css" href="./lib/css/perfil.css">

<div class="container">       

    <div class="dashboard">
        <div class="row" style="text-align: center;vertical-align: middle;height: 50px;padding-top: 3px; border-bottom: solid;border-width: 1px;border-color: #8B795E;border-radius: 15px;" >
            <div class="col-sm-4 title">                           
                    PERFIL:            
            </div>
            <div class="col-sm-7 title2" style="text-align: right">                
                	<button class="btn btn-danger" onclick="window.location.href='menu.php';">SALAS</button>
            </div>       
		</div>
		<br>
		<div class="letras" align="center">
			Seu Personagem:
		</div>
		<br>
		<div align="center" class="nomepersonagem" id="nome_personagem">
		</div>
		<div class="row">
			<div class="col-sm-2 title">
			</div>
			<div class="col-sm-2 title">
				<br>
				<br>
				<button class="nav" id="botao_esquerda"  onclick="return MudarPersonagem(-1)"><	
				</button>
			</div>
			<div class="col-sm-4 title">
				<img id="personagem" width="auto" height="240px" align="center">
			</div>
			<div class="col-sm-2 title">
				<br>
				<br>
				<button class="nav" id="botao_direita"  onclick="return MudarPersonagem(1)">>
				</button>
			</div>
			<div class="col-sm-2 title">
			</div>			
		</div>

		</br>
		<div align="center">
			<button class="btn btn-success" align="left" style="width: 25%;"  onclick="return GravarPersonagem()">
						ESCOLHER PERSONAGEM
			</button>
		</div>
		</br>
	</div>
</div>

<script type="text/javascript">
	var personagens = new Array('Victor','Victoria','Jovem Victor','Arnaldão','Grace');
	var qtd = personagens.length-1;
    var credito = "<?php echo $creditos?>";
    var qtdVitorias = "<?php echo $qtdVitorias?>";
    var posicao = parseInt("<?php echo $id_personagem?>");

    DesenhaCredito(credito);
    DesenhaVitorias(qtdVitorias);
    MostraPersonagem();

    function GravarPersonagem(){

    }
    function MostraPersonagem(){
		var b_esquerda = document.getElementById('botao_esquerda');
		b_esquerda.style.color
        if(posicao==0){
        	b_esquerda.style.visibility = "hidden";
        }
        else{
        	b_esquerda.style.visibility = "visible";	
        }
		var b_direita = document.getElementById('botao_direita');
        if(posicao==qtd){
        	b_direita.style.visibility = "hidden";
        }
        else{
        	b_direita.style.visibility = "visible";	
        }

    	var img = document.getElementById('personagem');
           
        img.setAttribute('src','img/players/'+posicao+'.png');
        img.setAttribute('class','img-forca');
        var nome = document.getElementById('nome_personagem');
        nome.innerHTML = personagens[posicao]; 

        
        
        
    }
    function MudarPersonagem(num){
    	var i = parseInt(posicao+num); 
    	if(i>=0 && i<=qtd){
    		posicao+=num;
    		MostraPersonagem();
    	}
    }

    function GravarPersonagem(){
    	if(parseInt("<?php echo $id_personagem?>")!=posicao){
	    	var cabec = {idJogador: "<?php echo $id_sessao?>",idPersonagem: posicao};    
	            $.ajax({
	                type: "post",
	                url: "lib/php/atualizar-personagem.php",
	                assync: true,
	                data: cabec,
	                success: function(response)
	                {                    
	                    window.alert(response);
	                    window.location.href = "menu.php";             	                    
	                }      
	           });
	        
	    }
	    else{
	    	window.alert("Nenhuma modificação foi feita.");
	        window.location.href = "menu.php";   
	    }
	}
</script>
</body>