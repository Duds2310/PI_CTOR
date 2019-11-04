<?php


use src\repositorios\RepositorioReceita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';

$repoReceita = new RepositorioReceita();


$listaReceita = $repoReceita->listarReceita();
$quantidade = count($listaReceita);


$i = 0;


?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Usuarios</li>
</ol>

<!-- Inicio formul�rio de cadastro de usu�rios -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"></i> Nova Receita
	</div>
	<div class="card-body">
		<form action="receita-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="col-md-2">
					<label>Data A </label>
					<input type="date" name="dataCadastro" id="dataCadastro" class="form-control" placeholder="Data de Cadastro">
				</div>
				<div class="col-md-2">
					<label>Data B </label>
					<input type="date" name="dataPagamento" id="dataPagamento" class="form-control" placeholder="Data de Pagamento">
				</div>
				<div class="col-md-8">
					<label>&nbsp; </label>
					<input type="text" name="autor" id="autor" class="form-control" placeholder="Autor">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descri��o"></textarea>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-6">
					<select class="form-control form-control-sm" name="categoria">
                    	<option>Select pequeno</option>
                    </select>
				</div>
				<div class="col-md-6">
					<input type="text" name="situacao" id="situacao" class="form-control" placeholder="Situa��o">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-6">
					<input type="text" name="IdUsuarioResponsavel" id="IdUsuarioResponsavel" class="form-control" placeholder="IdUsuarioResponsavel">
				</div>				
				<div class="col-md-6">
					<input type="number" name="valor" id="valor" class="form-control" placeholder="Valor">
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
		<i class="fas fa-table"></i> Tabela Receitas
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Valor</th>
						<th>Descricao</th>
						<th>Categoria</th>
						<th>Data de cadastro</th>
						<th>Data de Pagamento</th>
						<th>Usuario Responsavel</th>
						<th>Autor</th>
						<th>Situacao</th>
						<th>A��o</th>
						
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $listaReceita[$i]->getValor(); ?></td>
						<td><?php echo $listaReceita[$i]->getDescricao(); ?></td>
						<td><?php echo $listaReceita[$i]->getCategoriaId(); ?></td>
						<td><?php echo $listaReceita[$i]->getDataCadastro(); ?></td>
						<td><?php echo $listaReceita[$i]->getDataPagamento(); ?></td>
						<td><?php echo $listaReceita[$i]->getUsuarioResponsavelId(); ?></td>
						<td><?php echo $listaReceita[$i]->getIdUsuario(); ?></td>
						<td><?php echo $listaReceita[$i]->getSituacao(); ?></td>
						<td><a
							href="receita-manter-editar.php?id=<?php echo $listaReceita[$i]->getId(); ?>"><i
								class="fa fa-edit"></i></a> |<a
							href="receita-manter-deletar-action.php?id=<?php echo $listaReceita[$i]->getId(); ?>">
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