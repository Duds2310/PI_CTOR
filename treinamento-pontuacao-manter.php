<?php

use src\RepositorioTreinamento;
use src\RepositorioPontuacao;
use src\Pontuacao;

include 'inc.cabecalho.php';
require_once 'src/modelo/Pontuacao.php';
require_once 'src/repositorios/RepositorioTreinamento.php';
require_once 'src/repositorios/RepositorioPontuacao.php';
$idTreinamento = 0;
if (isset($_GET['id'])) {
	$idTreinamento = $_GET['id'];
}
// recupera o id do usuario
/*$idPontuacao = $_GET['idPon']; */
$repositorioTreinamento = new RepositorioTreinamento();
$repositorioPontuacao = new RepositorioPontuacao();
$treinamento = $repositorioTreinamento->consultarTreinamentoPorId($idTreinamento);
/*$pontuacao = $repositorioPontuacao->consultarPontuacaoPorId($idPontuacao); */
$pontuacao = $repositorioPontuacao->consultarPontuacaoPorTreino($idTreinamento);


//$pontRound = $repositorioPontuacao->consultarRoundEndAtual($idTreinamento);
// $iPontuacao = 0;//contador de pontuacao
// if($pontuacao){
//     $iPontuacao =  count($pontuacao);
// }
// var_dump($treinamento);
// die("Fim");


?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Treino</li>
</ol>
<!--  CARD DADOS TREINO -->
<div class="row">
	<div class="col-md-12">
		<div class="card mb-3">
			<div class="card-header">
				<i class="far fa-clipboard"></i> Treino
			</div>
			<div class="card-body">
				<form action="usuario-manter-editar-action.php?id=<?php echo $idTreinamento; ?>" method="post" action="treinamento-manter-editar-action.php">
					<input type="hidden" value="<?php echo $treinamento->getId(); ?>" name="id">
					<!--  oi???? -->
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
									<input type="date" name="data" id="data" value="<?php echo $treinamento->getData(); ?>" class="form-control" placeholder="Last name" required="required" readonly>
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

									<input type="text" name="descricao" id="descricao" value="<?php echo $treinamento->getDescricao(); ?>" class="form-control" placeholder="Descricao" required="required" readonly>
								</div>
							</div>
						</div>
					</div>
					<!--FIM DESCRICAO -->
					<!--COMECO SITUACAO -->
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<label>Situacao</label>
								<div class="form-label-group">
									<input type="text" name="situacao" id="situacao" value="<?php echo $treinamento->getSituacao(); ?>" class="form-control" placeholder="Password" required="required" readonly>
								</div>
							</div>
							<!--COMEÇO SITUACAO -->
							<!--COMEÇO ID USUARIO -->

						</div>
					</div>
					<!--FIM ID USUARIO -->
				</form>
				<button class="btn btn-primary" type="submit">Alterar</button>
			</div>
			<!-- fim do card body -->
		</div>
		<!-- fim do card -->
	</div>
</div>
<?php if ($treinamento->getCategoria() == "Indoor") { ?>
	<!-- FORMULÁRIO DE PONTUAÇÃO DA CATEGORIA INDOOR -->
	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-bullseye"></i> Pontuação
				</div>
				<div class="card-body">
					<!-- Pegar o ID do treinamento -->
					<form action="pontuacao-manter-cadastrar-action.php" method="post">
						<!--ROUND -->
						<div class="form-group form-row">
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Selecionar
									Round</label>
								<select name="round" id="round" class="form-control">
									<option value="1">1º Round</option>
									<option value="2">2º Round</option>
								</select>
							</div>
							<!--ROUND -->

							<!-- END -->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Selecionar End</label>
								<select name="end" id="end" class="form-control">
									<option value="1">1º End</option>
									<option value="2">2º End</option>
									<option value="3">3º End</option>
									<option value="4">4º End</option>
									<option value="5">5º End</option>
									<option value="6">6º End</option>
									<option value="7">7º End</option>
									<option value="8">8º End</option>
									<option value="9">9º End</option>
									<option value="10">10º End</option>
								</select>
							</div>
						</div>
						<!-- fim END -->
						<!--início DISPAROS -->
						<!--1o Disparo -->
						<div class="form-group form-row">
							<div class="form-group col-md-3">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação
								</label>
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									(1º Disparo)
								</label>
								<select name="primeiroDisparo" id="primeiroDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--1o Disparo -->
							<!---->
							<!--2o Disparo -->
							<div class="form-group col-md-3">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação
								</label>
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									(2º Disparo)
								</label>
								<select name="segundoDisparo" id="segundoDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--2o Disparo -->
							<!---->
							<!--3o Disparo -->
							<div class="form-group col-md-3">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação
								</label>
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									(3º Disparo)
								</label>
								<select name="terceiroDisparo" id="terceiroDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--3o Disparo -->
						</div>
						<!--fim div disparos -->
						<div class="form-group form-row">
							<div class="col-md-2">
								<input type="hidden" name="totalEnd" id="totalEnd" class="form-control" placeholder="Total" value="<?php ?>" readonly>
							</div>
							<!-- PASSANDO A CATEGORIA PARA O CADASTRO DA PONTUAÇÃO -->
							<input type="hidden" name="categoriaHidden" id="categoriaHidden" class="form-control" value="<?php echo $treinamento->getCategoria(); ?>">
							
						<!--  OUTROS DISPAROS 4o AO 6o- COLOCAR HIDDEN E NULL -->
							<div class="col-md-2">
								<input type="hidden" name="quartoDisparo" id="quartoDisparo" class="form-control" value="0" readonly>
							</div>
							<div class="col-md-2">
								<input type="hidden" name="quintoDisparo" id="quintoDisparo" class="form-control" value="0" readonly>
							</div>
							<div class="col-md-2">
								<input type="hidden" name="sextoDisparo" id="sextoDisparo" class="form-control" value="0" readonly>
							</div>
							<div class="col-md-2">
								<input type="hidden" name="treId" id="treId" class="form-control" value="<?php echo $idTreinamento ?>">
							</div>
						</div>
						<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<!-- INíCIO TABELA INDOOR PRIMEIRO ROUND -->
	<div class="row">
		<div class="col-md-6 col-xl-6 col-lg-6">
			<div class="card mb-3">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th scope="col" colspan="4" class="table-active">1º Round </th>
							<th scope="col" class="table-active">Total </th>
							<th scope="col" class="table-active">Ações </th>
						</tr>
					</thead>
					<tbody>
						<?php
							$somaEnds = 0;
							$i = 0;
							$contadorEnd = 1;
							while ($i < 10) {
								if (empty($pontuacao[$i])) {
									?>
								<tr>
									<th scope="row"><?php echo $contadorEnd ?>º End</th>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
								</tr>
							<?php } /*FIM IF*/ else { ?>
								<tr>
									<th scope="row"><?php echo $contadorEnd ?>º End</th>
									<td><?php echo $pontuacao[$i]->getPrimeiroDisparo(); ?></td>
									<td><?php echo $pontuacao[$i]->getSegundoDisparo(); ?></td>
									<td><?php echo $pontuacao[$i]->getTerceiroDisparo(); ?></td>
									<td><?php echo $pontuacao[$i]->getEndTotal(); ?></td>
									<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
								</tr>
							<?php } /*FIM ELSE*/ ?>
						<?php
							/*
								if(empty($pontuacao)){
								$somaEnds = 0;
								}else{$somaEnds = $somaEnds + $pontuacao[$i]->getEndTotal();
								}
							*/	
								$contadorEnd++;
								$i++;
							}  /*FIM WHILE*/ ?>
						<tr>
							<th scope="row" colspan="5" class="table-secondary">Total: </th>
							<td class="table-secondary"><?php /*echo $somaEnds; */?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- FIM TABELA INDOOR PRIMEIRO ROUND -->
		<!-- INíCIO TABELA INDOOR SEGUNDO ROUND -->
		<?php

			?>
		<div class="col-md-6 col-sm-12">
			<div class="card mb-3">
				<table class="table table-bordered" width="100%" cellspacing="0">

					<thead>
						<tr>
							<th scope="col" colspan="4" class="table-active">2º Round</th>
							<th scope="col" class="table-active">Total</th>
							<th scope="col" class="table-active">Ações</th>
						</tr>
					</thead>
					<?php
						$i = 10;
						$contadorEnd = 1;
						while ($i < 20) {
							if (empty($pontuacao[$i])) {
								?>
							<tr>
								<th scope="row"><?php echo $contadorEnd ?>º End</th>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
							</tr>
						<?php } /*FIM IF*/ else { ?>
							<tr>
								<th scope="row"><?php echo $contadorEnd ?>º End</th>
								<td><?php echo $pontuacao[$i]->getPrimeiroDisparo(); ?></td>
								<td><?php echo $pontuacao[$i]->getSegundoDisparo(); ?></td>
								<td><?php echo $pontuacao[$i]->getTerceiroDisparo(); ?></td>
								<td><?php echo $pontuacao[$i]->getEndTotal(); ?></td>
								<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
							</tr>
						<?php } /*FIM ELSE*/ ?>
					<?php
							$contadorEnd++;
							$i++;
						}  /*FIM WHILE*/ ?>
					<tr>
						<th scope="row" colspan="5" class="table-secondary">Total: </th>
						<td class="table-secondary"></td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
		<?php  /*FIM IF*/ ?>
	</div>
	<!-- FIM TABELA INDOOR SEGUNDO ROUND -->
	<!--  Pontuação TOTAL -->
	<table class="table table-bordered">
		<thead>
			<tr>
				<th scope="col" colspan="4" class="table-success"><i class="fas fa-crosshairs"></i> PONTUAÇÃO TOTAL:</th>
				<th scope="col" class="table-success"></th>
			</tr>
		</thead>
	</table>
	<!--  FIM PONTUACAO TOTAL -->
<?php  } else { ?>
	<!-- FORMULÁRIO DE PONTUAÇÃO DA CATEGORIA OUTDOOR -->

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-bullseye"></i> Pontuação
				</div>
				<div class="card-body">
					<form action="pontuacao-manter-cadastrar-action.php" method="post">
						<div class="form-group">
							<div class="form-row">
								<!-- ROUND -->
								<div class="col-md-6">
									<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Selecionar
										Round</label> <select name="round" id="round" class="form-control">
										<option>1º Round</option>
										<option>2º Round</option>
									</select>
								</div>
								<!-- FIM ROUND -->
								<!-- END -->
								<div class="col-md-6">
									<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Selecionar End</label>
									<select name="end" id="end" class="form-control">
										<option>1º End</option>
										<option>2º End</option>
										<option>3º End</option>
										<option>4º End</option>
										<option>5º End</option>
										<option>6º End</option>
									</select>
								</div>
							</div>
						</div>
						<!-- FIM END -->
						<!--1º DISPARO -->
						<div class="form-group form-row">
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação (1º Disparo)
								</label>
								<select name="primeiroDisparo" id="primeiroDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--FIM PRIMEIRO DISPARO -->
							<!--SEGUNDO DISPARO -->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação (2º Disparo)
								</label>
								<select name="segundoDisparo" id="segundoDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!-- FIM SEGUNDO DISPARO-->
							<!-- TERCEIRO DISPARO-->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação (3º Disparo)
								</label>
								<select name="terceiroDisparo" id="terceiroDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--FIM TERCEIRO DISPARO -->
						</div>
						<!--FIM DA LINHA 1, 2 E 3 DISPARO -->
						<div class="form-group form-row">
							<!--QUARTO DISPARO -->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação (4º Disparo)
								</label>
								<select name="quartoDisparo" id="quartoDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--FIM QUARTO DISPARO -->
							<!-- QUINTO DISPARO -->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação (5º Disparo)
								</label>
								<select name="quintoDisparo" id="quintoDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--FIM QUINTO DISPARO -->
							<!--SEXTO DISPARO -->
							<div class="form-group col-md-4">
								<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">
									Selecionar Pontuação(6º Disparo)
								</label>
								<select name="sextoDisparo" id="sextoDisparo" class="form-control">
									<option>M</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>X</option>
								</select>
							</div>
							<!--FIM SEXTO DISPARO -->
						</div>
						<!-- FIM DA LINHA - 4, 5 E 6 DISPARO -->
						<div class="form-group form-row">
							<div class="col-md-2">
								<input type="text" name="Total" id="TotalOutdoor" class="form-control" placeholder="Total" readonly>
							</div>
						</div>
						<!-- PASSANDO A CATEGORIA PARA O CADASTRO DA PONTUAÇÃO -->
						<input type="hidden" name="categoriaHidden" id="categoriaHidden" class="form-control" value="<?php echo $treinamento->getCategoria(); ?>">

						<div class="col-md-2">
							<!-- PASSANDO ID USUARIO -->
							<input type="hidden" name="treId" id="treId" class="form-control" value="<?php echo $idTreinamento ?>">
						</div>
						<!-- BOTÃO CADASTRAR PONTUAÇÃO -->
						<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- INíCIO CARD DISPAROS-->

	<div class="row">
		<div class="col-md-12">
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-bullseye"></i> Disparos
				</div>

				<div class="card-body">
					<div class="form-group">
						<div class="form-row">
							<!-- INÍCIO TABELA PRIMEIRO ROUND OUTDOOR-->
							<div class="col-md-6 col-xl-6 col-lg-6">
								<table class="table-responsive-md-6 table-bordered" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th scope="col" colspan="7" class="table-active">1º Round </th>
											<th scope="col" class="table-active">Total </th>
											<th scope="col" class="table-active">Ações </th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 0;
											$contadorEnd = 1;
											while ($i < 6) {
												if (empty($pontuacao[$i])) {
													?>
												<tr>
													<th scope="row"><?php echo $contadorEnd ?>º End</th>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
												</tr>
											<?php } /*FIM IF*/ else { ?>
												<tr>
													<th scope="row"><?php echo $contadorEnd ?>º End</th>
													<td><?php echo $pontuacao[$i]->getPrimeiroDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getSegundoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getTerceiroDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getQuartoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getQuintoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getSextoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getEndTotal(); ?></td>
													<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
												</tr>
											<?php } /*FIM ELSE*/ ?>
										<?php
												$contadorEnd++;
												$i++;
											}  /*FIM WHILE*/ ?>
										<tr>
											<th scope="row" colspan="8" class="table-secondary">Total: </th>
											<td class="table-secondary">265</td>
										</tr>
									</tbody>
								</table>
							</div>
							<!-- FIM TABELA OUTDOOR PRIMEIRO ROUND -->
							<!--INÍCIO TABELA OUTDOOR SEGUNDO ROUND  -->

							<div class="col-md-6 col-xl-6 col-lg-6">
								<!-- class="align" -->
								<table class="table-responsive-md-6 table-bordered" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th scope="col" colspan="7" class="table-active">2º Round </th>
											<th scope="col" class="table-active">Total </th>
											<th scope="col" class="table-active">Ações </th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 6;
											$contadorEnd = 1;
											while ($i < 12) {
												if (empty($pontuacao[$i])) {
													?>
												<tr>
													<th scope="row"><?php echo $contadorEnd ?>º End</th>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
												</tr>
											<?php } /*FIM IF*/ else { ?>
												<tr>
													<th scope="row"><?php echo $contadorEnd ?>º End</th>
													<td><?php echo $pontuacao[$i]->getPrimeiroDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getSegundoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getTerceiroDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getQuartoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getQuintoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getSextoDisparo(); ?></td>
													<td><?php echo $pontuacao[$i]->getEndTotal(); ?></td>
													<td>Alterar <a href="#"><i class="fa fa-edit"></i></a> </td>
												</tr>
											<?php } /*FIM ELSE*/ ?>
										<?php
												$contadorEnd++;
												$i++;
											}  /*FIM WHILE*/ ?>
										<tr>
											<th scope="row" colspan="8" class="table-secondary">Total: </th>
											<td class="table-secondary">265</td>
										</tr>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

	<!--  FIM PONTUACAO TOTAL -->
	<!--  incluindo rodapé-->
<?php

} //fim do else para categoria OUTDOOR (linha 400)
include 'inc.rodape.php';
?>