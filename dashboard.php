<?php
include 'inc.cabecalho.php';

use src\RepositorioDespesa;
use src\repositorios\RepositorioReceita;

require_once 'src/repositorios/RepositorioDespesa.php';
require_once 'src/repositorios/RepositorioReceita.php';

$repoDespesa = new RepositorioDespesa();

$retornoDespesa = $repoDespesa->somarDespesa();

$repoReceita = new RepositorioReceita();

$retornoReceita = $repoReceita->somarReceita();

$retornoTotal = $retornoReceita->getValor() - $retornoDespesa->getValor();


$retornoCor = null;

if ($retornoReceita->getValor() < $retornoDespesa->getValor()) {
    
    $retornoCor = "danger";
       
} else {
    $retornoCor = "success";
}




?>
<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	<li class="breadcrumb-item active">Resumo</li>
</ol>

<!-- Icon Cards-->
<div class="row">
	<div class="col-xl-4 col-sm-6 mb-3">
		<div class="card text-white bg-primary o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-money-bill-wave"></i>
				</div>
				<div class="mr-5"><?php echo $retornoReceita->getValor(); ?></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#"> <span
				class="float-left">Receita</span> <span class="float-right"> <i
					class="fas fa-angle-right"></i>
			</span>
			</a>
		</div>
	</div>

	<div class="col-xl-4 col-sm-6 mb-3">
		<div class="card text-white bg-warning o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-wallet"></i>
				</div>
				<div class="mr-5"><?php echo $retornoDespesa->getValor(); ?></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#"> <span
				class="float-left">Despesa</span> <span class="float-right"> <i
					class="fas fa-angle-right"></i>
			</span>
			</a>
		</div>
	</div>

	<div class="col-xl-4 col-sm-6 mb-3">
		<div class="card text-white bg-<?php echo $retornoCor;?> o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
					<i class="fas fa-fw fa-cash-register"></i>
				</div>
				<div class="mr-5"><?php echo $retornoTotal; ?></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="#"> <span
				class="float-left">Caixa</span> <span class="float-right"> <i
					class="fas fa-angle-right"></i>
			</span>
			</a>
		</div>
	</div>
</div>

<!-- Area Chart Example-->
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-chart-area"></i>
    Area Chart Example</div>
  <div class="card-body">
    <canvas id="myAreaChart" width="100%" height="30"></canvas>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>


<?php 

//$res = json_encode($array);

$variavel1 = "121";
$variavel2 = "12312";

$res = "$variavel1, $variavel2, 12324, 123, 18287, 2131, 31274, 33259, 25849, 24159, 32651, 123213";

echo $res;


?>

<input type="hidden" value="<?php echo $res;?>" id="dataSetChart"/>


<?php

include 'inc.rodape.php';
?>