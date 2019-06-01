<?php
include_once("lib/php/header.php");  
include_once("lib/php/conexao.dao.php");
include_once("lib/php/cabecalho2.php");


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
$creditos = $dadosJogador[1]['creditos'];
$sqlMelhoresJogadores = 
	"SELECT * from forca_score s, forca_usuario u 
	 where u.id_usuario = s.id_usuario order by s.score desc
";

?>

			<div class="col-sm-2">
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
					<?php $contScore = 1; while($contScore <= count($score)):?>
						<tr>
							<td><?=$score[$contScore]['login']?></td>
							<td align="center"><?=$score[$contScore]['score']?> vitórias</td>
						</tr>
					<?php $contScore++; endwhile ?>
					</tbody>
				</table>
				</p>
			</div>

<script type="text/javascript">

    DesenhaCredito("<?php echo $creditos?>");

</script>

</body>