<?php

use src\RepositorioTreinamento;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioTreinamento.php';

//$idUsuarioLogado = $_SESSION['idUsuario'];


$repoTreinamentos = new RepositorioTreinamento();


$ListaTreinamentos = $repoTreinamentos->listarTreinamento();
$quantidade = 0;

/*
if ($ListaTreinamentos == false) { ?>
     <div class="alert alert-warning" role="alert">
      <?php echo "Ainda não há treinos cadastrados!";?> 
     </div>
} else $quantidade = count($ListaTreinamentos);
$i = 0;
*/


if ($ListaTreinamentos != FALSE) {
	$quantidade = count($ListaTreinamentos);
}
$i = 0;
?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Treino</a></li>
	<li class="breadcrumb-item active">Informações do Treino</li>
</ol>

<!-- Inicio formulário de cadastro de Treinamentos -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"></i> Novo Treino
	</div>
	<div class="card-body">

		<form action="treinamento-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="form-group col-md-6">
					<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Categoria</label>
					<select name="categoria" id="categoria" class="form-control">
						<option>-- Selecione uma categoria --</option>
						<option>Indoor</option>
						<option>Outdoor</option>
					</select>
				</div>
				<div class="col-md-6">
					<label>Data</label>
					<input type="date" name="data" id="data" class="form-control" placeholder="Data" required="required">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<textarea class="form-control" name="descricao" id="descricao" type="text" rows="3" placeholder="Descrição"></textarea>
				</div>
			</div>
			<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
		</form>
	</div>
</div>
<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Lista de Treinos
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Categoria</th>
						<th>Descrição</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($i < $quantidade) { ?>
						<tr>
							<td><?php echo $ListaTreinamentos[$i]->getCategoria(); ?></td>
							<td><?php echo $ListaTreinamentos[$i]->getDescricao(); ?></td>

							<?php $data = date_create($ListaTreinamentos[$i]->getData()); ?>
							<td><?php echo date_format($data, 'd/m/y'); ?></td>
							<td><a href="treinamento-pontuacao-manter.php?id=<?php echo $ListaTreinamentos[$i]->getID(); ?>"><i class="fa fa-edit"></i></a> |<a href="treinamento-manter-deletar-action.php?id=<?php echo $ListaTreinamentos[$i]->getID(); ?>">
									<i class="fa fa-trash"></i>
								</a></td>
						</tr>
					<?php $i++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>



<?php include 'inc.rodape.php'; ?>