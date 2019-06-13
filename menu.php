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
$creditos = $dadosJogador[1]['creditos'];
$qtdVitorias = Busca::QtdVitorias($_SESSION['user']['id_usuario']);

?>

<!-- CSS de estilo de elementos do menu -->
<link rel="stylesheet" type="text/css" href="./lib/css/menu.css">
<div class="container"  style="padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;">
    <div class="dashboard" align="center">
            <div class="row" style="text-align: center;vertical-align: middle;height: 50px;padding-top: 3px; border-bottom: solid;border-width: 1px;border-color: #8B795E;padding-left: 10px;border-radius: 15px;" >
                    <div class="col-sm-4 title">                           
                            Salas Disponiveis:            
                    </div>
                    <div class="col-sm-7 title2" style="text-align: right">                
                            <button class="btn btn-success" onclick="AbrirCriacaoSala()">Criar Nova Sala</button>
                            &nbsp;
                            <button class="btn btn-danger" onclick="window.location.href='ranking.php';">Ranking</button>
                            &nbsp;
                            <button class="btn btn-danger" onclick="window.location.href='regras.php';">Como Jogar?</button>
                    </div>       
            </div>
                     
        <div id="SalasDisponiveis" style="padding-top:10px;">
        </div>
        <div>
        </div>  
    </div>
<div>

<!-- Modal -->
<div class="modal fade" id="criarSalaModal" tabindex="-1" role="dialog" aria-labelledby="criarSalaModalTitulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="criarSalaModalTitulo">Criar nova sala:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div class="form-group" id="divCadastro">
			<form id="formCadastroSessao" style="width: 100%">
                <label for="tema">Tema da Sala</label>
                <select name="tema" id="temaSala" class="form-control">
                    <?php $contTema = 1; while($contTema <= count($dadosTema)):?>
                        <option value="<?=$dadosTema[$contTema]['id_tema']?>"><?=$dadosTema[$contTema]['tema']?></option>
                    <?php $contTema++; endwhile ?>
                </select>
                <br>
                <label for="privada">Sala Privativa?</label>
                <select name="privado" id="privadoSala" class="form-control">
                    <option value="n">Não</option>
                    <option value="s">Sim</option>
                </select>
                <br>
                <label>Caso seja privativa, digite uma senha</label>
                <input type="text" name="senha" class="form-control">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="CriarSala()">Criar Sala</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
        //função que atualiza salas
        carrega();
        var tempo = window.setInterval(carrega, 2000);
        function carrega()
        {
        $('#SalasDisponiveis').load("lib/php/atualizaSala.php");
        }

    var credito = "<?php echo $creditos?>";
    var qtdVitorias = "<?php echo $qtdVitorias?>";

    DesenhaCredito(credito);
    DesenhaVitorias(qtdVitorias);

    function PaginaAdministracao()
    {
        location.href = 'cadastros-listas.php';
    }

    function AbrirCriacaoSala()
    {
        $("#criarSalaModal").modal();
    }

    function SelecionarSala(idSala, idOutroJogador, idTema, senha = "")
    {
    
        if(window.confirm("Deseja entrar nesta sala?"))
        {
            if(senha != "")
            {
                var senhaSala = window.prompt("Esta é uma sala privativa, digite a senha da sala");
                if(senhaSala != senha)
                {
                    window.alert("A senha inserida não é a mesma da sala.")
                    return 0;
                }
                else
                {
                    EntrarSala(idSala,idOutroJogador,idTema);    
                }
            }
            else
            {
                EntrarSala(idSala,idOutroJogador,idTema); 
            }
        }
    }

    function CriarSala()
    {
       $.ajax({
            type: "post",
            url: "lib/php/cadastrar-sessao.php",
            data: $("#formCadastroSessao").serialize(),
            assync: true,
            success: function(response)
            {
                /*window.alert(response);
                /*location.reload(); */
                location.href = "sala.php"; 
            }      
       }); 
    }

    function EntrarSala(idSala,idOutroJogador,idTema)
    {        
        
     var cabec = {sala: idSala,idOutro: idOutroJogador,id_Tema: idTema};   
        $.ajax({
            type: "post",
            url: "lib/php/entrar-sessao.php",
            data: cabec,
            success: function(response)
            {
                /*window.alert(response);
                /*location.reload();*/
                if(response == 1){
                    window.alert("Sala já Ocupada");
                }
                else{
                    location.href = "sala.php";    
                }                 
            }      
       }); 
    }
    function AtualizarJogos()
    {
        location.reload();
    }

    function Teste()
    {
        window.alert("mensagem");
    }
</script>

</body>
