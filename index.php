<?php 
include_once("lib/php/header.php");
include_once("lib/php/cabecalho1.php");

if(isset($_SESSION['user']))
{
	echo "<script>location.href = 'menu.php';</script>";
}

?>
<script type="text/javascript" src="./lib/js/login.js"></script>
	

<div class="container"  style="padding-top:0px;padding-bottom:0px;margin-top:0px;margin-bottom:0px;">
	<div class="dashboard" align="center">			
		<div class="row">
			<div class="col-sm-4" style="padding-right: 0px;padding-top: 5px;height: 100%;">
				<div class="form-group dashboard-form" >
					<form id="formCredenciais">
						<label>Login:</label>
						<input type="text" name="login" id="login" style="width: 98%;" class="form-control"><br>
						<label>Senha:</label>
						<input type="password" name="senha" id="senha" style="width: 98%;" class="form-control"><br>
						<!--<label>Modo de Jogo</label><br>
						<select name="game-type" class="form-control">
							<option value="1">Single Player</option>
							<option value="2">Multi player</option>
						</select><br>-->
					</form>
					<button class="btn btn-success" style="width: 98%;" onclick="return RealizarLogin()">
						JOGAR!
					</button>
					<br><br>
					<button class="btn btn-warning" style="width: 98%;" data-toggle="modal" data-target="#formCadastroModal">
						Cadastro
					</button>
					<br>
					<br>
					
				</div>

			</div>

			<div class="col-sm-8" style="padding-left: 5px;">
				<img src="img/splash.png" alt="Jogo da Forca" width="100%" height="auto" style="border-radius: 15px;padding-top: 2px" >
			</div>
		</div>
	</div>	
</div>

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
				<input type="password" class="form-control" name="cadastroSenha" id="cadastroSenha">
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
<script type="text/javascript">
	document.addEventListener('keypress', function(e){
       if(e.which == 13){
          RealizarLogin();
       }
    }, false);
</script>
</body>

</html>
