<?php

use src\RepositorioUsuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

// recupera o id do usuario
$idUsuario = $_GET['id'];

$repositorioUsuario = new RepositorioUsuario();

$usuario = $repositorioUsuario->consultarUsuarioPorID($idUsuario);

$categoria = $usuario[0]->getCategoriaid();

//var_dump($usuario);
//die();

//var_dump($usuario);
//die();


?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Usuario</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Usuario</div>
		<div class="card-body">

			<form action="usuario-manter-editar-action.php?id=<?php echo $idUsuario; ?>" method="post">
				<input type="hidden" value="<?php echo $usuario[0]->getId(); ?>" name="id">
				<input type="hidden" value="<?php echo $usuario[0]->getSenha(); ?>" name="senhaAntigo">

				<div class="form-group form-row">
					<div class="col-md-6">
						<label>*Nome</label>
						<div class="form-label-group">
							<input type="text" name="nome" id="nome" value="<?php echo $usuario[0]->getNome(); ?>" class="form-control" required="required" autofocus="autofocus">
						</div>
					</div>
					<div class="col-md-6">
						<label>*Login</label>
						<div class="form-label-group">
							<input type="text" name="login" id="login" value="<?php echo $usuario[0]->getLogin(); ?>" class="form-control" placeholder="Last name" required="required">
						</div>
					</div>
				</div>

				<div class="form-group form-row">
					<div class="col-md-8">
						<label>*Email</label>
						<div class="form-label-group">
							<input type="email" name="email" id="email" value="<?php echo $usuario[0]->getEmail(); ?>" class="form-control" placeholder="Email address" required="required">
						</div>
					</div>
					<div class="col-md-4">
						<label>&nbsp;</label>
						<div class="form-label-group">
							<select class="form-control form-control-sm" name="categoria" id="categoria">
								<option value="-1">--Selecione a Categoria--</option>
								<option value="1" <?php if ($categoria == 1) {
														echo "selected";
													} ?>>Membro</option>
								<option value="2" <?php if ($categoria == 2) {
														echo "selected";
													} ?>>Master</option>
								<option value="3" <?php if ($categoria == 3) {
														echo "selected";
													} ?>>Doador</option>
							</select>
						</div>
					</div>
				</div>

				<div class="form-group form-row">


					<div class="form-group form-row">

						<div class="col-md-6">
							<label>*Senha</label>
							<div class="form-label-group">
								<input type="password" name="senha" id="senha"  class="form-control" placeholder="Password">
							</div>
						</div>
						<div class="col-md-6">
							<label>*Confirmar Senha</label>
							<div class="form-label-group">
								<input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password">
							</div>
						</div>
					</div>
				</div>

				<button class="btn btn-primary btn-block" type="submit">Register</button>
			</form>
		</div>
	</div>

</div>

<script language="JavaScript">
	function enviar() {

		if (document.dados.confirmarSenha.value != document.dados.senha.value) {
			alert("As senhas não coincidem!");
			document.dados.confirmarSenha.focus();
			return false;
		}

		if (document.dados.categoria.value == "-1") {
			alert("Preencha o campo CATEGORIA corretamente!");
			document.dados.categoria.focus();
			return false;
		}
	}
</script>

<?php include 'inc.rodape.php'; ?>