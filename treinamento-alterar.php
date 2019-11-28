<?php

use src\RepositorioTreinamento;

include 'inc.cabecalho.php';
require_once 'src/modelo/Pontuacao.php';
require_once 'src/repositorios/RepositorioTreinamento.php';
require_once 'src/repositorios/RepositorioPontuacao.php';
$idTreinamento = 0;

if (isset($_GET['id'])) {
	$idTreinamento = $_GET['id'];
} else {
	echo "Sem id";
}
// recupera o id do usuario
/*$idPontuacao = $_GET['idPon']; */
$repositorioTreinamento = new RepositorioTreinamento();
$treinamento = $repositorioTreinamento->consultarTreinamentoPorId($idTreinamento);
?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Informações do Treino</li>
</ol>
<!--  CARD DADOS TREINO -->
<div class="row">
	<div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<i class="far fa-clipboard"></i> Treino
			</div>
			<div class="card-body">
				<form action="treinamento-manter-editar-action.php" method="post">
					<input type="hidden" value="<?php echo $treinamento->getId(); ?>" name="id">
					<!-- CATEGORIA E DATA -->
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label>Categoria:</label>
								<div class="form-label-group">
									<input type="text" name="categoria" id="categoria" value="<?php echo $treinamento->getCategoria(); ?>" class="form-control" required="required" autofocus="autofocus" readonly>
								</div>
							</div>
							<div class="col-md-6">
								<label>Data</label>
								<div class="form-label-group">
									<input type="date" name="data" id="data" value="<?php echo $treinamento->getData(); ?>" class="form-control" placeholder="Last name" required="required">
								</div>
							</div>
						</div>
					</div>
					<!--FIM CATEGORIA E DATA -->

					<!--INíCIO DESCRICAO -->
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-12">
								<label>Descricao:</label>
								<div class="form-label-group">

									<input type="text" name="descricao" id="descricao" value="<?php echo $treinamento->getDescricao(); ?>" class="form-control" placeholder="Descricao" required="required">
								</div>
							</div>
						</div>
					</div>
					<!--FIM DESCRICAO -->

					<button class="btn btn-primary" type="submit">Alterar</button>
				</form>

			</div>
			<!-- fim do card body -->
		</div>
		<!-- fim do card -->
	</div>
</div>
<?php
include 'inc.rodape.php';
?>