<?php
use src\RepositorioDespesa;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioDespesa.php';

$repoDespesa = new RepositorioDespesa();

$ListaDespesas = $repoDespesa->listarDespesa();
$quantidade = count($ListaDespesas);
$i = 0;
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Despesas</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-adress-card"></i> Tabela Despesas
	</div>
	<div class="card-body">
	
	<!-- inicio formulario -->
	<form action="despesa-manter-cadastrar-action.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group col-md-6">
           <input type="text" name="valor" id="valor" class="form-control" name="valor" placeholder="valor" min="1" >
        </div>
      </div>
      <div class="form-row">
          <div class="form-group col-md-12">
          <label> Data de Pagamento </label>
             <input type="date" class="form-control" id="datapagamento" name="datapagamento" placeholder="Data de Pagamento">
          </div>
      </div>
     <div class="form-row">
     <div class="form-group col-md-6">
         <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria">
      </div>
      <div class="form-group col-md-6">
           <input type="text" class="form-control" id="situacao" name="situacao" placeholder="Situacao">
        </div>
    </div>
     <div class="form-row">
          <div class="form-group col-md-12">
          <label> Data de Vencimento </label>
             <input type="date" class="form-control" id="datavencimento" name="datavencimento" placeholder="Data de Vencimento">
          </div>
          </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
  </div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Despesa
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Valor</th>
						<th>Data de Pagamento</th>
						<th>Categoria</th>
						<th>Situacao</th>
						<th>Data de Vencimento</th>
						<th>ações</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < $quantidade) { ?>
					<tr>
						<td><?php echo $ListaDespesas[$i]->getNome(); ?></td>
						<td><?php echo $ListaDespesas[$i]->getValor(); ?></td>
						<td><?php echo $ListaDespesas[$i]->getDatapagamento(); ?></td>
						<td><?php echo $ListaDespesas[$i]->getCategoria(); ?></td>
						<td><?php echo $ListaDespesas[$i]->getSituacao(); ?></td>
						<td><?php echo $ListaDespesas[$i]->getDatavencimento(); ?></td>
						<td><a href="despesa-manter-editar.php?id=<?php echo $ListaDespesas[$i]->getID(); ?>"><i
								class="fa fa-edit"></i></a> |<a href="despesa-manter-deletar-action.php?id=<?php echo $ListaDespesas[$i]->getID(); ?>"> <i class="fa fa-trash"></i></a></td>
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