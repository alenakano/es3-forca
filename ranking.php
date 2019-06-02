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
<link rel="stylesheet" type="text/css" href="./lib/css/menu.css">

<div class="container">       

    <div class="dashboard">
        <div class="row" style="text-align: center;vertical-align: middle;height: 50px;padding-top: 3px; border-bottom: solid;border-width: 1px;border-color: #8B795E;border-radius: 15px;" >
            <div class="col-sm-4 title">                           
                    RANKING:            
            </div>
            <div class="col-sm-7 title2" style="text-align: right">                
                	<button class="btn btn-danger" onclick="window.location.href='menu.php';">SALAS</button>
            </div>       
        </div>                      
			<div class="row" style="padding-top: 10px;padding-left: 10px;padding-right: 10px;">
				<div class="col-sm-12">
					<p>
						<table id="tabelaResultado" class="table table-hover table-sm" >
							<thead align="center" style="background-color: #ff5000; color: white; border-radius: 10px;">
								<tr>
									<td style="color: black; background-color: white;" align="left">Melhores Jogadores</td>
									<td style="color: black; background-color: white;"></td>
									</tr>
									<tr>
										<td align="left">Nickname do Jogador:</td>
										<td align="center">Pontuação:</td>
									</tr>
								</thead>
								<tbody>
								<?php $contScore = 1; while($contScore <= count($ranking)):?>
								<tr>
									<td><?=$ranking[$contScore]['login']?></td>
										<td align="center"><?=$ranking[$contScore]['vitorias']?> vitórias</td>
									</tr>
								<?php $contScore++; endwhile ?>
								</tbody>
						</table>
					</p>
				</div>
			</div>
		</div>
</div>

<script type="text/javascript">

    DesenhaCredito("<?php echo $creditos?>");
    DesenhaVitorias("<?php echo $qtdVitorias?>");

</script>

</body>