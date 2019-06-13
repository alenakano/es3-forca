<?php
include_once("lib/php/header.php");  
include_once("lib/php/cabecalho2.php");
include_once("lib/php/querys.php");


if(!isset($_SESSION['user']))
{
    echo "<script>location.href = 'index.php';</script>";
}

include_once("lib/php/monta-sessao.php");

$i = 1; 
while($i <= count($dadosSessao)){
    if($dadosSessao[$i]['id_usuario'] == $_SESSION['user']['id_usuario'] || $dadosSessao[$i]['id_adversario'] == $_SESSION['user']['id_usuario']){
        echo "<script>location.href = 'sala.php';</script>";
    }
 $i++;   
}
$qtdVitorias = Busca::QtdVitorias($_SESSION['user']['id_usuario']);
$creditos = $dadosJogador[1]['creditos'];
$ranking = Busca::leRanking();

?>

<!-- CSS de estilo de elementos do menu -->
<link rel="stylesheet" type="text/css" href="./lib/css/regras.css">

<div class="container">       

    <div class="dashboard">
        <div class="row" style="text-align: center;vertical-align: middle;height: 50px;padding-top: 3px; border-bottom: solid;border-width: 1px;border-color: #8B795E;border-radius: 15px;" >
            <div class="col-sm-4 title">                           
                    REGRAS:            
            </div>
            <div class="col-sm-7 title2" style="text-align: right">                
                	<button class="btn btn-danger" onclick="window.location.href='menu.php';">SALAS</button>
                	&nbsp;
                	<button class="btn btn-danger" onclick="window.location.href='ranking.php';">RANKING</button>
            </div>       
        </div>
        	<br> 
        	<br>                     
        	<div class="letras-grandes" >
						Partida por Turnos
			</div>
			</br>	
			<div class="row" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;">
				<div class="col-sm-6 letras">
					<span style="padding-left: 30px;">
						* Escolha seu Personagem em [Perfil]
					</span>
					<br>
					<span style="padding-left: 30px;">
						* Você pode criar uma Sala ou Entrar em uma de outro Jogador
					</span>
					<br>
					<span style="padding-left: 30px;">
						* O criador da Sala escolhe um Tema para a Palavra
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 80px;">
						Pode escolher uma Senha se Quiser
					</span>
					<br>
					<span style="padding-left: 30px;">
						* A Partida se Inicia quando houver 2 Jogadores na Sala
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 80px;">
						A Música mudará quando um Adversário entrar na Sala
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 80px;">
						Jogador Inicial e Palavra são Escolhidos Aleatóriamente
					</span>
	
				</div>
				<div class="col-sm-6 letras">					
					<span>
						* É sua vez quando o Alfabeto e o Timer estiverem Visíveis
					</span>
					<br>
					<span>
						* Cada Jogador tem 4 Vidas
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 60px;">
						Se Errar um Letra ou seu Timer Zerar, Perde uma Vida e Passa a Vez
					</span>
					<br>
					<span">
						* Você tem 5 Segundos para Chutar UMA Letra
					</span>
					<br>
					
					<span class="letras-menores" style="padding-left: 60px;">
					Cada Letra Certa Reseta seu Timer, Pode Continuar Chutando!												
					</span>
					
					<br>
					<span">
						* Pode Comprar Dicas usando Créditos (Limite de 3 Dicas por Partida)
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 60px;">
					A Dica aparece no Meio da sua Tela e Reseta seu Timer
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 60px;">
					1ª Dica - 1 Crédito | 2ª Dica - 3 Créditos | 3ª Dica - 5 Créditos
					</span>
					<br>
					<span class="letras-menores" style="padding-left: 60px;">
					Você pode comprar novos créditos
					</span>
					
				</div>
				
			</div>
			<br>
		</div>
</div>

<script type="text/javascript">

    DesenhaCredito("<?php echo $creditos?>");
    DesenhaVitorias("<?php echo $qtdVitorias?>");

</script>

</body>