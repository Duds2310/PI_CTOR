<?php

use src\RepositorioDespesa;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioDespesa.php';

// recupera o id do usuario
$idDespesa = $_GET['id'];

$repositorioDespesa = new RepositorioDespesa();

$despesa = $repositorioDespesa->consultarDespesaPorID($idDespesa);

//var_dump($usuario);
//die();


?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Despesa</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Despesa</div>
		<div class="card-body">
			<form action="despesa-manter-editar-action.php?id=<?php echo $idDespesa; ?>" method="post">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
						<label>Nome:</label>
							<div class="form-label-group">
								
								<input type="text" name="nome" id="nome" value="<?php echo $despesa[0]->getNome();?>" class="form-control"
									 required="required" 
									autofocus="autofocus">
							</div>
						</div>
						<div class="col-md-6">
							<label>Valor</label>
							<div class="form-label-group">
								<input type="text" name="valor" id="valor" value="<?php echo $despesa[0]->getValor();?>" class="form-control"
									placeholder="Valor" required="required"> 
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Data de Pagamento:</label>
					<div class="form-label-group">
						<input type="date" name="datapagamento" id="datapagamento" value="<?php echo $despesa[0]->getDatapagamento();?>" class="form-control"
							placeholder="Data de Pagamento" required="required"> 
					</div>
				</div>
				<div class="form-group">
				<label>Categoria</label>
					<div class="form-row">
						<div class="col-md-6">
							<div class="form-label-group">								 
								<input type="text" name="categoria" id="categoria" value="<?php echo $despesa[0]->getCategoria();?>" class="form-control"
									placeholder="Categoria" required="required">
							</div>
						</div>
						<div class="col-md-6">
						<label>Situacao</label>
							<div class="form-label-group">
								<input type="text" name="situacao" id="situacao" value="<?php echo $despesa[0]->getSituacao();?>" class="form-control"
									placeholder="Situacao" required="required"> 
							</div>
						</div>
						<div class="col-md-6">
						<label>Data de Vencimento</label>
							<div class="form-label-group">
								<input type="date" name="datavencimento" id="datavencimento" value="<?php echo $despesa[0]->getDatavencimento();?>" class="form-control"
									placeholder="Data de Vencimento" required="required"> 
							</div>
						</div>
					</div>
				</div>
				<button class="btn btn-primary btn-block" type="submit">Alterar</button>
			</form>
		</div>
	</div>

</div>

<?php

include 'inc.rodape.php';
?>