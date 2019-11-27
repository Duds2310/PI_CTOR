<?php

use src\repositorios\RepositorioReceita;
use src\repositorios\RepositorioCategoriaReceita;
use src\RepositorioUsuario;
use src\modelo\Receita;
use src\modelo\ReceitaOTD;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/repositorios/RepositorioCategoriaReceita.php';

$repoReceita = new RepositorioReceita();
$repoUsuario = new RepositorioUsuario();
$repoCategoriaReceita = new RepositorioCategoriaReceita();

$listaTela = $repoReceita->listarReceitaTela();
$listaUsuario = $repoUsuario->listarUsuario();
$listaCategorias = $repoCategoriaReceita->listarCategoriaReceita();

$i = 0;
$a = 0;
$b = 0;
$c = 0;
$total = 0;

//var_dump($idUsuarioLogado);
//die();

$validador = $listaTela == false ? false : $listaTela;

if ($validador) {
	while ($c < count($listaTela)) {
		$total = $total + $listaTela[$c]->getValor();
		$c++;
	}
}

?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Receitas</li>
</ol>

<!-- Inicio formul�rio de cadastro de usu�rios -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"> Nova Receita</i>
	</div>
	<div class="card-body">

		<form action="receita-manter-cadastrar-action.php" method="post" name="dados" onsubmit="return enviar();">

			<div class="form-group form-row">

				<div class="col-md-6">
					<label>Data de Cadastro </label> <input type="date" name="dataCadastro" id="dataCadastro" class="form-control" placeholder="Data de Cadastro" required="required" autofocus="autofocus">
				</div>
				<div class="col-md-6">
					<label>Data de Pagamento </label> <input type="date" name="dataPagamento" id="dataPagamento" class="form-control" placeholder="Data de Pagamento" required="required" autofocus="autofocus">
				</div>
			</div>

			<div class="form-group form-row">
				<div class="col-md-12">

					<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição" required="required" autofocus="autofocus"></textarea>

				</div>
			</div>

			<div class="form-group form-row">
				<div class="col-md-12">
					<select class="form-control form-control-sm" name="categoria" id="categoria" required="required" autofocus="autofocus">
						<option value="-1">-- Selecione uma Categoria --</option>
						<?php while ($b < count($listaCategorias)) { ?>

							<option value="<?php echo $listaCategorias[$b]->getId(); ?>">
								<?php echo $listaCategorias[$b]->getNome();	?>
							</option>

						<?php $b++;
						} ?>
					</select>
				</div>
			</div>

			<div class="form-group form-row">
				<div class="col-md-6">
					<select class="form-control form-control-sm" name="IdUsuarioResponsavel" id="IdUsuarioResponsavel" required="required" autofocus="autofocus">
						<option value="-1">-- Selecione Usuário --</option>

						<?php while ($a < count($listaUsuario)) { ?>

							<option value="<?php echo $listaUsuario[$a]->getId(); ?>">

								<?php echo $listaUsuario[$a]->getNome(); ?> </option>

						<?php $a++;
						} ?>
					</select>
				</div>
				<div class="col-md-6">
					<input type="number" name="valor" id="valor" class="form-control" placeholder="Valor" required="required" autofocus="autofocus">
				</div>
			</div>

			<button class="btn btn-primary btn-block" name="Submit" type="submit" value="">Cadastrar</button>
		</form>
	</div>
</div>
<!-- Fim formul�rio de cadastro de usu�rios -->

<!-- Inicio DataTables -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"> Tabela Receitas</i>
	</div>
	<div class="card-body">
		<div class="table-responsive">

			<?php if ($validador) { ?>
				<table class="table table-bordered" id="MyTableID" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Descrição</th>
							<th>Categoria</th>
							<th>Data de Cadastro</th>
							<th>Data de Pagamento</th>
							<th>Usuário Responsável</th>
							<th>Autor</th>
							<th>Valor</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php while ($i < count($listaTela)) { ?>
							<tr>
								<td><?php echo $listaTela[$i]->getDescricao(); ?></td>
								<td><?php echo $listaTela[$i]->getReceitaNome(); ?></td>
								<td><?php

											$data = date_create($listaTela[$i]->getDataCadastro());
											echo date_format($data, 'd/m/y');
											?>
								</td>

								<td><?php

											$data = date_create($listaTela[$i]->getDataPagamento());
											echo date_format($data, 'd/m/y');
											?>
								</td>
								<td><?php echo $listaTela[$i]->getResponsavel(); ?></td>
								<td><?php echo $listaTela[$i]->getAutor(); ?></td>
								<td><?php echo $listaTela[$i]->getValor(); ?></td>
								<td><a href="receita-manter-editar.php?id=<?php echo $listaTela[$i]->getId(); ?>"><i class="fa fa-edit"></i></a> |<a href="receita-manter-deletar-action.php?id=<?php echo $listaTela[$i]->getId(); ?>">
										<i class="fa fa-trash"></i>
									</a></td>
							</tr>
						<?php $i++;
							} ?>







					<tfoot>
						<tr>
							<th colspan="6">Total:</th>
							<th colspan="2"> <?php echo " $$total"; ?></th>
						</tr>
					</tfoot>
					</tbody>
				</table>
			<?php } else {
				echo "<center><h1> Nâo há receitas cadastradas!</h1></center>";
			} ?>
		</div>
	</div>
</div>
<!-- Fim DataTables -->

<script language="JavaScript">
	function enviar() {

		
		if (document.dados.descricao.value == "" ||
			document.dados.descricao.value.length > 140) {
			alert("Preencha o campo DESCRIÇÃO corretamente!");
			document.dados.descricao.focus();
			return false;
		}

		if (document.dados.categoria.value == "-1") {
			alert("Preencha o campo CATEGORiA corretamente!");
			document.dados.categoria.focus();
			return false;
		}

		if (document.dados.IdUsuarioResponsavel.value == "-1") {
			alert("Preencha o campo USUÁRIO corretamente!");
			document.dados.IdUsuarioResponsavel.focus();
			return false;
		}


	}
</script>




<?php include 'inc.rodape.php'; ?>