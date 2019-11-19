<?php
use src\RepositorioUsuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

$repoUsuario = new RepositorioUsuario();

$ListaUsuarios = $repoUsuario->listarUsuario();
$quantidade = count($ListaUsuarios);
$i = 0;
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
		<form action="usuario-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="col-md-6">
					<input type="text" name="nome" id="nome" class="form-control"
						placeholder="Nome">
				</div>
				<div class="col-md-6">
					<input type="text" name="login" id="login" class="form-control"
						placeholder="Login">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<input type="email" name="email" id="email" class="form-control"
						placeholder="Email">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-6">
					<input type="password" name="senha" id="senha" class="form-control"
						placeholder="Senha">
				</div>
				<div class="col-md-6">
					<input type="password" name="confirmarSenha" id="confirmarSenha"
						class="form-control" placeholder="Confirmar Senha">
				</div>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
		</form>
	</div>
</div>

<!-- Fim formulário de cadastro de usuários -->


<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Usuarios
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Login</th>
						<th>ações</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $ListaUsuarios[$i]->getNome(); ?></td>
						<td><?php echo $ListaUsuarios[$i]->getEmail(); ?></td>
						<td><?php echo $ListaUsuarios[$i]->getLogin(); ?></td>
						<td><a
							href="usuario-manter-editar.php?id=<?php echo $ListaUsuarios[$i]->getID(); ?>"><i
								class="fa fa-edit"></i></a> |<a
								
							href="usuario-manter-deletar-action.php?id=<?php echo $ListaUsuarios[$i]->getID(); ?>">
								<i class="fa fa-trash"></i>

						</a></td>
					</tr>
				<?php $i++; } ?>	
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php

include 'inc.rodape.php';
?>