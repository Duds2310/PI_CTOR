<?php

use src\repositorios\RepositorioReceita;
use src\RepositorioUsuario;
use src\repositorios\RepositorioCategoriaReceita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/repositorios/RepositorioCategoriaReceita.php';

// recupera o id do usuario
$idReceita = $_GET['id'];


$repoReceita = new RepositorioReceita();
$repoUsuario = new RepositorioUsuario();
$repoCategoriaReceita = new RepositorioCategoriaReceita();

$listaUsuario = $repoUsuario->listarUsuario();
$listaCategorias = $repoCategoriaReceita->listarCategoriaReceita();


$receita = $repoReceita->consultarReceitaId($idReceita);

//var_dump($receita);
//die();

//var_dump($listaCategorias);
//die();

$b = 0;
$a = 0;


?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Consultar Mensalidade</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Consultar Mensalidade</div>
		<div class="card-body">
			<form action="membro-listar-mensalidade-consultar.php?id=<?php echo $idReceita; ?>" method="post">

				<input type="hidden" value="<?php echo $idReceita ?>" name="id">
				<div class="form-group form-row">
					<div class="col-md-6">
						<label>Data de Cadastro </label> <input type="date" name="dataCadastro" value="<?php echo $receita->getDataCadastro() ?>" id="dataCadastro" class="form-control" placeholder="Data de Cadastro" disabled>
					</div>
					<div class="col-md-6">
						<label>Data de Pagamento </label> <input type="date" name="dataPagamento" value="<?php echo $receita->getDataPagamento() ?>" id="dataPagamento" class="form-control" placeholder="Data de Pagamento" disabled>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-12">
						<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição" disabled><?php echo $receita->getDescricao() ?></textarea>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-12">
						<select class="form-control form-control-sm" name="categoria" disabled>
							<?php while ($a < count($listaCategorias)) { ?>
								<option value="<?php echo $listaCategorias[$a]->getId(); ?>" <?php if ($receita->getCategoriaId() == $listaCategorias[$a]->getId()) { echo "selected"; } ?>>
									<?php echo $listaCategorias[$a]->getNome();	?>
								</option>
							<?php $a++;
							} ?>
						</select>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-6">
						<select class="form-control form-control-sm" name="IdUsuarioResponsavel" disabled>
							<?php while ($b < count($listaUsuario)) { ?>
								<option value="<?php echo $listaUsuario[$b]->getId(); ?>" <?php if ($receita->getUsuarioResponsavelId() == $listaUsuario[$b]->getId()) { echo "selected";} ?>>
									<?php echo $listaUsuario[$b]->getNome(); ?>
								</option>

							<?php $b++;
							} ?>
						</select>
					</div>
					<div class="col-md-6">
						<input type="number" name="valor" value="<?php echo $receita->getValor(); ?>" id="valor" class="form-control" placeholder="Valor" disabled>
					</div>
					<div class="col-md-6">
						<a class="btn btn-primary" href="membro-listar-mensalidade.php" role="button">Voltar</a>
					</div>

				</div>
			</form>
		</div>
	</div>

</div>

<?php

include 'inc.rodape.php';
?>?>