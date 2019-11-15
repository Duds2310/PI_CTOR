<?php
use src\repositorios\RepositorioReceita;
use src\RepositorioUsuario;
use src\repositorios\RepositorioCategoriaReceita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/repositorios/RepositorioCategoriaReceita.php';

$repoUsuario = new RepositorioUsuario();
$repoCategoriaReceita = new RepositorioCategoriaReceita();
$listaUsuario = $repoUsuario->listarUsuario();
$listaCategorias = $repoCategoriaReceita->listarCategoriaReceita();

$repoReceita = new RepositorioReceita();

// recupera o id do usuario
$id = $_GET['id'];

$i = 0;
$a = 0;
$b = 0;

$receita = $repoReceita->consultarReceitaId($id)?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Receita</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Receita</div>
		<div class="card-body">
			<form action="receita-manter-editar-action.php?id=<?php echo $id; ?>"
				method="post">

				<input type="hidden" value="<?php echo $id?>" name="id">
				<div class="form-group form-row">
					<div class="col-md-6">
						<label>Data de cadastro </label> <input type="date"
							name="dataCadastro"
							value="<?php echo $receita->getDataCadastro() ?>"
							id="dataCadastro" class="form-control"
							placeholder="Data de Cadastro">
					</div>
					<div class="col-md-6">
						<label>Data de pagamento </label> <input type="date"
							name="dataPagamento"
							value="<?php echo $receita->getDataPagamento() ?>"
							id="dataPagamento" class="form-control"
							placeholder="Data de Pagamento">
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-12">
						<textarea class="form-control" name="descricao" id="descricao"
							rows="3" placeholder="Descrição"><?php echo $receita->getDescricao() ?></textarea>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-12">
						<select class="form-control form-control-sm" name="categoria">                        		
								<?php while ($a < count($listaCategorias)) { ?>
                        	<option
								value="<?php echo $listaCategorias[$a]->getId();?> <?php if($receita->getId() == $listaCategorias[$a]->getId()) { echo "selected";}?>">
                        		<?php echo $listaCategorias[$a]->getNome();	?>
                        	</option>
                            	<?php $a ++; } ?>
                    	</select>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-6">
						<select class="form-control form-control-sm"
							name="IdUsuarioResponsavel">
							<option value="">-- Selecione Usuario --</option> 
                    	<?php while ($b < count($listaUsuario)) { ?>
                    	
                    	<option
								value="<?php echo $listaUsuario[$b]->getId();?>"
								<?php if ($receita->getUsuarioResponsavelId() == $listaUsuario[$b]->getId()){echo "selected";}?>>
                    	<?php echo $listaUsuario[$b]->getNome(); ?>
                    	</option>
                    	
                    	<?php $b++; } ?>
                    </select>
					</div>
					<div class="col-md-6">
						<input type="number" name="valor"
							value="<?php echo $receita->getValor();?>" id="valor"
							class="form-control" placeholder="Valor">
					</div>
				</div>
				<button class="btn btn-primary btn-block" type="submit">Register</button>
			</form>
		</div>
	</div>

</div>

<?php

include 'inc.rodape.php';
?>