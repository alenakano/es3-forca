<?php
include("lib/php/header.php");
include("lib/php/conexao.dao.php");

if(!isset($_SESSION['user']))
{
	echo "<script>location.href = 'index.php';</script>";
}

include_once("lib/php/monta-sessao.php");
?>

<style>
    .jogo{
        color: white;
        height: 100%;
        overflow: hidden;
        padding: 35px;
        font-weight: bold;
        font-size: 20px;
        width: 33%;
        background-size: cover;
        border-radius: 10px;
        text-shadow: 4px 4px 2px black;
        transition-duration: 0.4s;
        display: inline-block;
    }

    .jogo:hover{
        background-size: cover;
        cursor:pointer;
    }
</style>

<script>
    function PaginaAdministracao()
    {
        location.href = 'cadastros-listas.php';
    }

    function AbrirCriacaoSala()
    {
        $("#criarSalaModal").modal();
    }

    function SelecionarSala(idSala, senha = "")
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
                    location.href = "sala.php?sala="+idSala;    
                }
            }
            else
            {
                location.href = "sala.php?sala="+idSala;
            }
        }
    }

    function CriarSala()
    {
       $.ajax({
            type: "post",
            url: "lib/php/cadastrar-sessao.php",
            data: $("#formCadastroSessao").serialize(),
            success: function(response)
            {
                window.alert(response);
                location.reload();  
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

<div class="container">
    <div class="dashboard" style="margin-top: 3%;">
        Bem vindo <?=$_SESSION['user']['nome']?>. &nbsp;Sua pontuação é de <?=$_SESSION['user']['score']?> vitórias 
        &nbsp;&nbsp;
        <a href="lib/php/logout.php">Sair</a>
        &nbsp;&nbsp;
        <a href="#">Perfil</a>
        &nbsp;&nbsp;
        <?php if($_SESSION['user']['perfil'] == "adm"):?>
        <button class="btn btn-success" onclick="PaginaAdministracao();">Painel Administrativo</button>
        <?php endif?>  
    </div>

    <div class="dashboard" style="margin-top: 2%;" >
        <div style="width: 100%;">
            <span class="title">
                <h1>
                    Salas Disponiveis: 
                    &nbsp;&nbsp;<button class="btn btn-success" onclick="AbrirCriacaoSala()">Criar Nova Sala</button>
                    &nbsp;<button class="btn btn-danger" onclick="AtualizarJogos()">Atualizar Jogos</button>
                </h1>
            </span>  
        </div>
        <br>
        
        <?php $i = 1; while($i <= count($dadosSessao)): ?>
        
            <style>
                .jogo-img<?=$i?>
                {
                    background-image: url("https://i.ytimg.com/vi/bWghPe5YB7g/maxresdefault.jpg");
                }

                .jogo-img<?=$i?>:hover
                {
                    background-image: url("http://93fm.radio.br/wp-content/uploads/2018/12/musicas.jpg");   
                }
            </style>

        <?php if($dadosSessao[$i]['privada'] == 'n'):?>
            <div class="jogo jogo-img<?=$i?>" onclick="SelecionarSala(<?=$dadosSessao[$i]['id_sala']?>)" align="center">
                Tema: <?=strtoupper($dadosSessao[$i]['tema'])?> <br>
                Criador: <?=strtoupper($dadosSessao[$i]['login'])?> <br>
                (Publico)
            </div>
        <?php else:?>
            <div class="jogo jogo-img<?=$i?>" onclick="SelecionarSala(<?=$dadosSessao[$i]['id_sala']?>, '<?=$dadosSessao[$i]['senha_sala']?>')" align="center">
                Tema: <?=strtoupper($dadosSessao[$i]['tema'])?> <br>
                Criador: <?=strtoupper($dadosSessao[$i]['login'])?> <br>
                (Privado)
            </div>
        <?php endif?>

        <?php $i++; endwhile?>
    </div>
</div>

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
