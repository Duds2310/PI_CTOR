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
	<li class="breadcrumb-item active">Tabela Membros</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Membros
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<?php

			if ($validador) {
				$quantidade = count($ListaUsuarios);
				?>
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
						<?php

							while ($i < $quantidade) {
								?>
							<tr>
								<td><?php echo $ListaUsuarios[$i]->getNome(); ?></td>
								<td><?php echo $ListaUsuarios[$i]->getEmail(); ?></td>
								<td><?php echo $ListaUsuarios[$i]->getLogin(); ?></td>
								<td><a href="membro-manter-editar.php?id=<?php echo $ListaUsuarios[$i]->getId(); ?>"><i class="fa fa-edit"></i></a> | <a href="membro-manter-deletar-action.php?id=<?php echo $ListaUsuarios[$i]->getId(); ?>"><i class="fa fa-trash"></i></td>
							</tr>
						<?php $i++;
							} ?>
					</tbody>
				</table>
			<?php } else {
				echo "<center><h1> Não há membros cadastrados!</h1></center>";
			} ?>
		</div>
	</div>
</div>


<script language="JavaScript">
	function enviar() {

		if (document.dados.cpf.value == "" ||
			document.dados.cpf.value.length != 11) {
			alert("Preencha o campo CPF corretamente!");
			document.dados.cpf.focus();
			return false;
		}

		if (document.dados.senhaConfirma.value != document.dados.senha.value) {
			alert("As senhas não coincidem!");
			document.dados.senhaConfirma.focus();
			return false;
		}
	}
</script>




<?php include 'inc.rodape.php'; ?>