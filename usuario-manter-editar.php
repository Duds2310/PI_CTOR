<?php
use src\RepositorioUsuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

// recupera o id do usuario
$idUsuario = $_GET['id'];

$repositorioUsuario = new RepositorioUsuario();

$usuario = $repositorioUsuario->consultarUsuarioPorID($idUsuario);

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
				<input type="hidden" value="<?php echo $usuario[0]->getId();?>" name="id">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
						<label>Nome:</label>
							<div class="form-label-group">
								
								<input type="text" name="nome" id="nome" value="<?php echo $usuario[0]->getNome();?>" class="form-control"
									 required="required" 
									autofocus="autofocus">
							</div>
						</div>
						<div class="col-md-6">
							<label>Login</label>
							<div class="form-label-group">
								<input type="text" name="login" id="login" value="<?php echo $usuario[0]->getLogin();?>" class="form-control"
									placeholder="Last name" required="required"> 
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Email:</label>
					<div class="form-label-group">
						<input type="email" name="email" id="email" value="<?php echo $usuario[0]->getEmail();?>" class="form-control"
							placeholder="Email address" required="required"> 
					</div>
				</div>
				<div class="form-group">
				<label>Password</label>
					<div class="form-row">
						<div class="col-md-6">
							<div class="form-label-group">								 
								<input type="password" name="senha" id="senha" value="<?php echo $usuario[0]->getSenha();?>" class="form-control"
									placeholder="Password" required="required">
							</div>
						</div>
						<div class="col-md-6">
						<label>Confirmar password</label>
							<div class="form-label-group">
								<input type="password" id="confirmPassword" value="<?php echo $usuario[0]->getSenha();?>" class="form-control"
									placeholder="Confirm password" required="required"> 
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary btn-block" type="submit">Register</button>
			</form>
		</div>
	</div>

</div>

<?php

include 'inc.rodape.php';
?>