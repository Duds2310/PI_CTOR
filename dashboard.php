<?php
include 'inc.cabecalho.php';

$usuarioLogado = $_GET['usuario'];

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Blank Page</li>
</ol>

<!-- Page Content -->
<h1><?php echo $usuarioLogado;?></h1> 
<hr>
<p>This is a great starting point for new custom pages.</p>

<?php

include 'inc.rodape.php';
?>