<?php
include_once("lib/php/header.php");  
include_once("lib/php/conexao.dao.php");

if(!isset($_SESSION['user']))
{
	echo "<script>location.href = 'index.php';</script>";
}

if($_SESSION['user']['perfil'] != "adm")
{	
	echo "<script>location.href = 'menu.php';</script>";
}

$sqlListaTema = "SELECT * FROM forca_tema ORDER BY TEMA ASC";
$sqlListaPalavra = "SELECT * FROM forca_palavra p, forca_tema t WHERE t.ID_TEMA = p.ID_TEMA ORDER BY PALAVRA ASC";
$sqlUsuario = "SELECT * FROM forca_usuario";

$dadosTema = Conexao::ExecutarQuery($sqlListaTema);
$dadosPalavra = Conexao::ExecutarQuery($sqlListaPalavra);
$dadosUsuario = Conexao::ExecutarQuery($sqlUsuario);
?>

<script src="/lib/js/cadastro-listas.js"></script>

<body>

<div class="container dashboard" style="margin-top: 2%; ">
	<div class="row">
		<div class="col-sm-12">
			<span>Bem vindo administrador <?=$_SESSION['user']['nome']?> </span>&nbsp;&nbsp;			
			<button class="btn btn-success" style="padding: 4px;" onclick="AbrirMenu();">Menu Principal</button>
		</div>
	</div>
</div>
<br>

<div class="container dashboard">
	<div class="row">
		<div class="col-sm-3">
			<button class="btn btn-primary" style="width: 100%;" id="btnTema">Cadastro de Tema</button><br><br>
			<button class="btn btn-primary" style="width: 100%;" id="btnTemaLista">Listar Temas</button><br><br>
			<button class="btn btn-primary" style="width: 100%;" id="btnPalavra">Cadastro de palavra</button><br><br>
			<button class="btn btn-primary" style="width: 100%;" id="btnPalavraLista">Listar Palavras</button><br><br>
			<button class="btn btn-primary" style="width: 100%;" id="btnUsuarioLista">Listar Usuários</button><br><br>
		</div>

		<div class="col-sm-9">
			<div class="form-group dashboard-form" id="formCadastroTemaDiv">
				<form id="formCadastroTema">
					<h4>Cadastro de Tema</h4>
					<label for="tema">Digite o Tema:</label>
					<input type="text" name="tema" class="form-control">
					<br>
				</form>
				<button class="btn btn-primary" onclick="return RealizarCadastro('tema')">Cadastrar Tema</button>
			</div>	

			<div class="form-group dashboard-form" id="formCadastroPalavraDiv">
				<form id="formCadastroPalavra">
					<h4>Cadastro de Palavra</h4>
					<br>
					<label for="tema">Selecione o tema:</label>
					<select name="tema" class="form-control">
						<option value="0">Selecione...</option>
						<?php $contTemaNovo = 1; while($contTemaNovo <= count($dadosTema)): ?>
							<option value="<?=$dadosTema[$contTemaNovo]["id_tema"]?>"><?=$dadosTema[$contTemaNovo]["tema"]?></option>
						<?php $contTemaNovo++; endwhile ?>
					</select>
					<br>
					<label for="palavra">Digite a Palavra:</label>
					<input type="text" name="palavra" class="form-control"><br>
					<label for="dicas">Digite as Dicas separadas por vírgula</label>
					<textarea name="dicas" rows="3" class="form-control"></textarea>
				</form>
				<br>
				<button class="btn btn-primary" onclick="return RealizarCadastro('palavra')">Cadastrar Palavra</button>
			</div>	

			<div class="dashboard-form" id="tabelaTemaDiv">
				<h4>Lista de Temas</h4><br>
				<table class="table table-sm table-hover" id="tabelaTema" style="width: 100%; font-size:18px;">
					<thead>
						<tr>
							<!--<td><input type="checkbox" class="form-control" onclick="SelecionarTodos()" id="checkMasterTema"></td>-->
							<td>Tema:</td>
							<td>Opções:</td>
						</tr>	
					</thead>
					<tbody>
						<?php $contTema = 1; while($contTema <= count($dadosTema)): ?>
							<?php 
								$idTema = $dadosTema[$contTema]['id_tema']; 
								$tema = $dadosTema[$contTema]['tema'];
							?>
							<tr>
								<td style="width: 75%"><?=$tema?></td>
								<td align="center">
									<a href="#" onclick="AbrirTelaAtualilacao([<?=$idTema?>, '<?=$tema?>'], 'tema')">Editar</a>&nbsp; &nbsp;
									<a href="#" onclick="DeletarRegistor(<?=$idTema?>, 'tema')">Excluir</a>
								</td>
							</tr>

						<?php $contTema++; endwhile ?>
					</tbody>
				</table>
				<br>
				<div align="right">
					<button class="btn btn-danger">Excluir Seleção</button>
				</div>
			</div>
			<br>

			<div class="dashboard-form" id="tabelaPalavraDiv">
				<h4>Lista de Palavras</h4><br>
				<table class="table table-sm table-hover" id="tabelaPalavra" style="width: 100%;">
					<thead>
						<tr>
							<td>Palavra:</td>
							<td>Dicas:</td>
							<td>Tema:</td>
							<td>Opções:</td>
						</tr>	
					</thead>
					<tbody>
						<?php $contPalavra = 1; while($contPalavra <= count($dadosPalavra)): ?>
						<?php 
							$palavra = $dadosPalavra[$contPalavra]['palavra'];
							$idPalavra = $dadosPalavra[$contPalavra]['id_palavra'];  
							$dicas = $dadosPalavra[$contPalavra]['dicas'];
							$tema = $dadosPalavra[$contPalavra]['tema']	;
							$idTema = $dadosPalavra[$contPalavra]['id_tema'];
						?>
						<tr>
							<td style="width: 20%"><?=$palavra?></td>
							<td style="width: 30%"><?=$dicas?></td>
							<td style="width: 15%"><?=$tema?></td>
							<td align="center" style="width: 35%">
								<a href="#" onclick="AbrirTelaAtualilacao([<?=$idPalavra?>, '<?=$palavra?>', <?=$idTema?>, '<?=$tema?>', '<?=$dicas?>'])">Editar</a>&nbsp; &nbsp;
								<a href="#" onclick="DeletarRegistor(<?=$idPalavra?>, 'palavra')">Excluir</a>
							</td>
						</tr>
						<?php $contPalavra++; endwhile ?>	
					</tbody>
				</table>
				<br>
				<div align="right">
					<button class="btn btn-danger">Excluir Seleção</button>
				</div>
			</div>
			<br>

			<div class="dashboard-form" id="tabelaUsuarioDiv">
				<h4>Lista de Temas</h4><br>
				<table class="table table-sm table-hover" id="tabelaUsuario" style="width: 100%; font-size:18px;">
					<thead>
						<tr>
							<td>Nome:</td>	
							<td>Login</td>
							<td>Opções:</td>
						</tr>	
					</thead>
					<tbody>
						<?php $contUsuario = 1; while($contUsuario <= count($dadosUsuario)): ?>
							<tr>
								<td style="width: 30%"><?=$dadosUsuario[$contUsuario]['nome']?></td>
								<td style="width: 30%"><?=$dadosUsuario[$contUsuario]['login']?></td>
								<td align="center">
									<a href="#" onclick="HabilitarAdministrador(<?=$dadosUsuario[$contUsuario]['id_usuario']?>)">Tornar Adm</a>&nbsp; &nbsp;
									<a href="#" onclick="DeletarUsuario(<?=$dadosUsuario[$contUsuario]['id_usuario']?>)">Excluir</a>
								</td>
							</tr>

						<?php $contUsuario++; endwhile ?>
					</tbody>
				</table>
				<br>
				<div align="right">
					<button class="btn btn-danger">Excluir Seleção</button>
				</div>
			</div>
			<br>
			
			<div class="dashboard-form" align="center" style="padding: 30px;">
				<h1>Area restrita ao administrador</h1>
				<h4 style="color: gray;">clique nos botões ao lado para realizar as operações</h4>
			</div>
				
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="UpdateTema" tabindex="-1" role="dialog" aria-labelledby="UpdateTemaTitulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Alteração de Tema</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<form id="formAlterarTema">
				<input type="hidden" id="idTemaUpdate">
				<label>Tema</label>
				<input type="text" name="temaUpdate" id="temaUpdate" class="form-control">
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="AlterarRegistro('tema')">Alterar Tema</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="UpdatePalavra" tabindex="-1" role="dialog" aria-labelledby="UpdatePalavraTitulo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UpdatePalavraTitulo">Alterar Palavra</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
			<form id="formUpdatePalavra">
				<input type="hidden" name="idPalavraUpdate" id="idPalavraUpdate">
				<label>Palavra</label>
				<input type="text" name="palavraUpdate" id="palavraUpdate" class="form-control">
				<br>
				<label>Selecione o Tema</label>
				<select name="temaPalavraUpdate" id="temaPalavraUpdate" class="form-control">
					<option value="0">Selecione...</option>
					<?php $contTemaUpdate = 1; while($contTemaUpdate <= count($dadosTema)): ?>
						<option value="<?=$dadosTema[$contTemaUpdate]['id_tema']?>"><?=$dadosTema[$contTemaUpdate]['tema']?></option>
					<?php $contTemaUpdate++; endwhile ?>
				</select>
				<br>
				<label>Dicas, separadas por vírgula</label>
				<textarea class="form-control" name="dicasUpdate" id="dicasUpdate" rows="3"></textarea>
			</form>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="AlterarRegistro()">Alterar Palavra</button>
      </div>
    </div>
  </div>
</div>
<br><br>