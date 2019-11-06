<?php
use src\repositorios\RepositorioReceita;
use src\RepositorioUsuario;
use src\repositorios\RepositorioCategoriaReceita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/repositorios/RepositorioCategoriaReceita.php';

$repoUsuario = new RepositorioUsuario();
$repoCategoriaReceita = new RepositorioCategoriaReceita();
$repoReceita = new RepositorioReceita();

$listaUsuario = $repoUsuario->listarUsuario();
$listaCategorias = $repoCategoriaReceita->listarCategoriaReceita();

// recupera o id do usuario
$idReceita = $_GET['id'];

$categoria = $repoCategoriaReceita->$receita = $repoReceita->consultarReceitaId($idReceita);

// var_dump($usuario);
// die();
$i = 0;
?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Receita</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Receita</div>
		<div class="card-body">
			<form
				action="receita-manter-editar-action.php?id=<?php echo $idReceita; ?>"
				method="post">

				<input type="hidden" value="<?php echo $receita[0]->getId();?>"
					name="id">
				<div class="form-group form-row">
					<div class="col-md-2">
						<label>Data de cadastro </label> <input type="date" name="dataCadastro" value="<?php echo $receita[0]->getDataCadastro() ?>" id="dataCadastro" class="form-control"	placeholder="Data de Cadastro">
					</div>
					<div class="col-md-2">
						<label>Data de pagamento </label> <input type="date"
							name="dataPagamento" value="<?php echo $receita[0]->getDataPagamento() ?>" id="dataPagamento" class="form-control" placeholder="Data de Pagamento">
					</div>
					<div class="col-md-8">
						<label>&nbsp; </label> <input type="text" name="autor" value="<?php echo $receita[0]->getIdUsuario() ?>" id="autor" class="form-control" placeholder="Autor">
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-12">
						<textarea class="form-control" name="descricao" value="<?php echo $receita[0]->getDescricao() ?>" id="descricao" rows="3" placeholder="Descrição"></textarea>
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-6">
						<select class="form-control form-control-sm" name="categoria">
							<option value="<?php echo $receita[0]->getId(); ?>">
								<!-- PAREI AQUI, Falta consultar a categoria da receita propria, Falta o repositorio De categorias (JUNIOR) --></option> 
                        		
								<?php while ($i < count($listaCategorias)) { ?>
                        	<option value="<?php echo $listaCategorias[$i]->getId();?>">
                        		<?php echo $listaCategorias[$i]->getNome();	?>
                        	</option>
                            	<?php
                                    $i ++; 
                                    } 
                                $i = 0;
                                ?>
                    	</select>
					</div>
					<div class="col-md-6">
						<input type="text" name="situacao" id="situacao" class="form-control" placeholder="Situação">
					</div>
				</div>
				<div class="form-group form-row">
					<div class="col-md-6">
						<select class="form-control form-control-sm" name="IdUsuarioResponsavel">
							<option value="">-- Selecione Usuario --</option> 
                    	<?php while ($i < count($listaUsuario)) { ?>
                    	
                    	<option value="<?php echo $listaUsuario[$i]->getId();?>">
                    	<?php

                        echo $listaUsuario[$i]->getNome();
                        ?>
                    	</option>
                    	
                    	<?php $i++; } $i = 0; ?>
                    </select>
					</div>
					<div class="col-md-6">
						<input type="number" name="valor" id="valor" class="form-control" placeholder="Valor">
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