<?php
use src\RepositorioTreinamento;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioTreinamento.php';

$repoTreinamentos = new RepositorioTreinamento();

$ListaTreinamentos = $repoTreinamentos->listarTreinamento();
$quantidade = count($ListaTreinamentos);
$i = 0;


//var_dump($ListaTreinamentos);
//die("Fim")
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Treino</a></li>
	<li class="breadcrumb-item active">Informacoes do Treino</li>
</ol>

<!-- Inicio formul�rio de cadastro de Treinamentos -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"></i> Novo Treino
	</div>
	<div class="card-body">
		<form action="treinamento-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="form-group col-md-4">
					<select name="categoria" id="categoria"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Categoria</label>
						<option selected>Categoria</option>
						<option>Indoor</option>
						<option>Outdoor</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<select name="situacao" id="situacao"
						class="form-control">
						<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Situacao</label>
						<option selected>Situacao</option>
						<option>Ativo</option>
						<option>Inativo</option>
					</select>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<input type="text" name="descricao" class="form-control"
						placeholder="Descricao">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-4">
					<input type="text" name="data" class="form-control"
						placeholder="Data (ano/mes/dia)">
				</div>

			</div>
			<div class="form-group form-row">
				<div class="col-md-4">
					<input type="text" name="idusuario" id="idusuario" class="form-control"
						placeholder="id Usuario">
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
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Categoria</th>
						<th>Situacao</th>
						<th>Data</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $ListaTreinamentos[$i]->getCategoria(); ?></td>
						<td><?php echo $ListaTreinamentos[$i]->getSituacao(); ?></td>
						<td><?php echo $ListaTreinamentos[$i]->getData(); ?></td>
						<td><a
							href="treinamento-pontuacao-manter.php?id=<?php echo $ListaTreinamentos[$i]->getID(); ?>"><i
								class="fa fa-edit"></i></a> |<a
							href="usuario-manter-deletar-action.php?id=<?php echo $ListaTreinamentos[$i]->getID(); ?>">
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
