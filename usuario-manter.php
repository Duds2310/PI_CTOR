<?php

use src\RepositorioUsuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

$repoUsuario = new RepositorioUsuario();

$ListaUsuarios = $repoUsuario->listarUsuario();

$i = 0;

$validador = $ListaUsuarios == false ? false : $ListaUsuarios;
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Usuarios</li>
</ol>

<!-- Inicio formulário de cadastro de usuários -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"></i> Novo Usuário
	</div>
	<div class="card-body">

		<form action="usuario-manter-cadastrar-action.php" method="post" name="dados" onsubmit="return enviar();">
			<div class="form-group form-row">
				<div class="col-md-6">
					<input type="text" name="nome" id="nome" class="form-control" placeholder="Nome" required="required" autofocus="autofocus">
				</div>
				<div class="col-md-6">
					<input type="text" name="login" id="login" class="form-control" placeholder="Login" required="required" autofocus="autofocus">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<input type="email" name="email" id="email" class="form-control" placeholder="Email" required="required" autofocus="autofocus">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-6">
					<input type="password" name="senha" id="senha" class="form-control" placeholder="Senha" required="required" autofocus="autofocus">
				</div>
				<div class="col-md-6">
					<input type="password" name="confirmarSenha" id="confirmarSenha" class="form-control" placeholder="Confirmar Senha" required="required" autofocus="autofocus">
				</div>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
		</form>

	</div>
</div>
<!-- Fim formul�rio de cadastro de usu�rios -->


<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Usuarios
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<?php if ($validador) {
				$quantidade = count($ListaUsuarios); ?>
				<table class="table table-bordered" id="MyTableID" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Email</th>
							<th>Login</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($i < $quantidade) { ?>
							<tr>
								<td><?php echo $ListaUsuarios[$i]->getNome(); ?></td>
								<td><?php echo $ListaUsuarios[$i]->getEmail(); ?></td>
								<td><?php echo $ListaUsuarios[$i]->getLogin(); ?></td>
								<td><a href="usuario-manter-editar.php?id=<?php echo $ListaUsuarios[$i]->getID(); ?>"><i class="fa fa-edit"></i></a> |<a href="usuario-manter-deletar-action.php?id=<?php echo $ListaUsuarios[$i]->getID(); ?>">
										<i class="fa fa-trash"></i>
									</a></td>
							</tr>
						<?php $i++;
							} ?>
					</tbody>
				</table>
			<?php } else {
				echo "<center><h1> Não há usuarios cadastrados!</h1></center>";
			} ?>
		</div>
	</div>
</div>



<?php include 'inc.rodape.php'; ?>

<script language="JavaScript">
	function enviar() {

		if (document.dados.confirmarSenha.value != document.dados.senha.value) {
			alert("As senhas não coincidem!");
			document.dados.confirmarSenha.focus();
			return false;
		}
	}
</script>