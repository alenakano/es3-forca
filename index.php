<?php 
include_once("lib/php/header.php");
include_once("lib/php/conexao.dao.php");

$sqlMelhoresJogadores = 
	"SELECT * from forca_score s, forca_usuario u 
	 where u.id_usuario = s.id_usuario order by s.score desc
";

$score = Conexao::ExecutarQuery($sqlMelhoresJogadores);
?>

<script type="text/javascript">
	function RealizarLogin()
	{
		var login = $("#login").val();
		var senha = $("#senha").val();

		if(login == "" || senha == "")
		{
			window.alert("Todos os campos são obrigatorios. Insira todas as informações e tente novamente");
			return 0;
		}
		else
		{
			$.ajax({
				type: 'post',
				data: $("#formCredenciais").serialize(),
				url: "lib/php/login.php",
				success: function(response)
				{
					if(response === "adm")
					{
						window.alert("Login realizado com sucesso! Bem vindo administrador, você será redirecionado");
						location.href = "cadastros-listas.php";
					}

					if(response === "pla")
					{
						window.alert("Login realizado com sucesso!, você será redirecionado");
						location.href = "menu.php";
					}
					
					if(response === 0)
					{
						window.alert("Todos os campos são obrigatorios. Insira todas as informações e tente novamente");
						return 0;
					}

					if(response === "erro")
					{
						window.alert("não foi encontrado nenhum perfil para essas credenciais");
						return 0;
					}
				}
			});
		}
	}	

	function RealizarCadastro()
	{
		var login = $("#cadastroLogin").val();
		var nome = $("#cadastroName").val();
		var senha = $("#cadastroSenha").val();

		if(senha == "" || login == "" || nome == "")
		{
			window.alert("Todos os campos são necessários para o cadastro. Insira todos os campos e tente novamente.");
		}
		else
		{
			$.ajax({
				url: "lib/php/cadastrar-jogador.php",
				type: "post",
				data: $("#formCadastro").serialize(),
				success: function(response)
				{
					window.alert(response);
					location.reload();
				}
			});
		}
	}

</script>

<body>
	
<div class="container dashboard" style="background-color: white; padding: 25px; margin-top: 4%;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12" align="center">
				<h1 class="title">JOGO DA FORCA</h1>	
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-5">
				<div class="form-group dashboard-form">
					<form id="formCredenciais">
						<label>Login:</label>
						<input type="text" name="login" id="login" class="form-control"><br>
						<label>Senha:</label>
						<input type="password" name="senha" id="senha" class="form-control"><br>
						<!--<label>Modo de Jogo</label><br>
						<select name="game-type" class="form-control">
							<option value="1">Single Player</option>
							<option value="2">Multi player</option>
						</select><br>-->
					</form>
					<button class="btn btn-success" style="width: 100%;" onclick="return RealizarLogin()">
						JOGAR!
					</button>
					<br><br>
					<button class="btn btn-warning" style="width: 100%;" data-toggle="modal" data-target="#formCadastroModal">
						Cadastro
					</button>
				</div>

			</div>

			<div class="col-sm-7">
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
		</div>
	</div>	
</div>
<br><br>

<!-- Modal -->
<div class="modal fade" id="formCadastroModal" tabindex="-1" role="dialog" aria-labelledby="formCadastroModalTitulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastro de novo Jogador:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div class="form-group" id="divCadastro">
			<form id="formCadastro" style="width: 100%">
				<label for="Nome">Nome:</label>
				<input type="text" class="form-control" name="cadastroNome" id="cadastroNome"><br>
				<label for="login">Login:</label>
				<input type="text" class="form-control" name="cadastroLogin" id="cadastroLogin"><br>
				<label for="senha">Senha:</label>
				<input type="password" class="form-control" name="cadastroSenha" id="cadastroLogin">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="RealizarCadastro()">Cadastrar Jogador</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
