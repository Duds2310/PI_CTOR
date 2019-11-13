<?php
use src\repositorios\RepositorioReceita;
use src\repositorios\RepositorioCategoriaReceita;
use src\RepositorioUsuario;
use src\modelo\Receita;
use src\modelo\ReceitaOTD;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/repositorios/RepositorioCategoriaReceita.php';

$repoReceita = new RepositorioReceita();
$repoUsuario = new RepositorioUsuario();
$repoCategoriaReceita = new RepositorioCategoriaReceita();

$listaTela = $repoReceita->listarReceitaTela();
$listaUsuario = $repoUsuario->listarUsuario();
$listaCategorias = $repoCategoriaReceita->listarCategoriaReceita();

$i = 0;
$a = 0;
$b = 0;
$c = 0;
$total = 0;

// var_dump($listaTela);
// die();

$validador = $listaTela == false ? false : $listaTela;

if ($validador) {
    while ($c < count($listaTela)) {
        $total = $total + $listaTela[$c]->getValor();
        $c ++;
    }
}

?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Receitas</li>
</ol>

<!-- Inicio formulário de cadastro de usuários -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"> Nova Receita</i>
	</div>
	<div class="card-body">
		<form action="receita-manter-cadastrar-action.php" method="post">
			<div class="form-group form-row">
				<div class="col-md-2">
					<label>Data de cadastro </label> <input type="date"
						name="dataCadastro" id="dataCadastro" class="form-control"
						placeholder="Data de Cadastro">
				</div>
				<div class="col-md-2">
					<label>Data de pagamento </label> <input type="date"
						name="dataPagamento" id="dataPagamento" class="form-control"
						placeholder="Data de Pagamento">
				</div>
				<div class="col-md-8">
					<label>&nbsp; </label> <input type="text" name="autor" id="autor"
						class="form-control" placeholder="Autor">
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<textarea class="form-control" name="descricao" id="descricao"
						rows="3" placeholder="Descrição"></textarea>
				</div>
			</div>
			<div class="form-group form-row">
				<div class="col-md-12">
					<select class="form-control form-control-sm" name="categoria">
						<option value="">-- Selecione uma Categoria --</option> 
                    	<?php while ($b < count($listaCategorias)) { ?>
                    	
                    	<option
							value="<?php echo $listaCategorias[$b]->getId();?>">
                    		<?php echo $listaCategorias[$b]->getNome();	?>
                    	</option>
                    	
                    	<?php $b++; } ?>
                    </select>
				</div>

			</div>
			<div class="form-group form-row">
				<div class="col-md-6">
					<select class="form-control form-control-sm"
						name="IdUsuarioResponsavel">
						<option value="">-- Selecione Usuario --</option> 
						
                    	<?php while ($a < count($listaUsuario)) { ?>
                    	
                    	<option
							value="<?php echo $listaUsuario[$a]->getId();?>">
                    	
                    	<?php  echo $listaUsuario[$a]->getNome(); ?> </option>
                    	
                    	<?php $a++; }?>
                    </select>
				</div>
				<div class="col-md-6">
					<input type="number" name="valor" id="valor" class="form-control"
						placeholder="Valor">
				</div>
			</div>
			<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
		</form>
	</div>
</div>

<!-- Fim formulário de cadastro de usuários -->





<!-- Inicio DataTables -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"> Tabela Receitas</i>
	</div>
	<div class="card-body">
		<div class="table-responsive">
						<?php if ($validador) { ?>
			<table class="table table-bordered" id="MyTableID" width="100%"
				cellspacing="0">
				<thead>
					<tr>
						<th>Descricao</th>
						<th>Categoria</th>
						<th>Data de cadastro</th>
						<th>Data de Pagamento</th>
						<th>Usuario Responsavel</th>
						<th>Autor</th>
						<th>Valor</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				<?php while($i < count($listaTela)) { ?>
					<tr>
						<td><?php echo $listaTela[$i]->getDescricao(); ?></td>
						<td><?php echo $listaTela[$i]->getReceitaNome();?></td>
						<td><?php

                            $data = date_create($listaTela[$i]->getDataCadastro());
                            echo date_format($data, 'd/m/y');
                            ?>
                        </td>

						<td><?php

                            $data = date_create($listaTela[$i]->getDataPagamento());
                            echo date_format($data, 'd/m/y');
                            ?>
                        </td>
						<td><?php echo $listaTela[$i]->getResponsavel();?></td>
						<td><?php echo $listaTela[$i]->getAutor();?></td>
						<td><?php echo $listaTela[$i]->getValor(); ?></td>
						<td><a
							href="receita-manter-editar.php?id=<?php echo $listaTela[$i]->getId(); ?>"><i
								class="fa fa-edit"></i></a> |<a
							href="receita-manter-deletar-action.php?id=<?php echo $listaTela[$i]->getId(); ?>">
								<i class="fa fa-trash"></i>
						</a></td>
					</tr>
							<?php $i++; } ?>

				
				
				
				
				
				
				<tfoot>
					<tr>
						<th colspan="6">Total:</th>
						<th colspan="2"> <?php echo " $$total";?></th>
					</tr>
				</tfoot>
				</tbody>
			</table>
			<?php } else { echo "<center><h1> Não há receitas cadastradas!</h1></center>"; } ?>
		</div>
	</div>
</div>

<!-- Fim DataTables -->








<!-- Inicio Tabela Total 
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"> Total </i>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table table-bordered" id="tableTotal"
										width="100%" cellspacing="0">
										<tbody>
											<tr>
												<td>Valor total das Receitas:</td>
												<td><?php echo "$$total";?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>


					<!--  Fim Tabela Total -->

<?php

include 'inc.rodape.php';
?>