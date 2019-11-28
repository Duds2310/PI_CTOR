<?php

use src\repositorios\RepositorioProvas;


include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioProvas.php';


$repoProvas = new RepositorioProvas();


$ListaProvas = $repoProvas->listarProvas();
$quantidade = 0;

if ($ListaProvas != FALSE) {
	$quantidade = count($ListaProvas);
}
$i = 0;

?>


<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Provas</li>
</ol>

<!-- Inicio formul�rio de cadastro de Provas -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-address-card"></i> Nova Prova
	</div>
	<div class="card-body">
		<form action="provas-manter-cadastrar-action.php" method="post" name="dados" onsubmit="return enviar();">
			<div class="form-group form-row">
				<div class="col-md-6">
					<label> Nome: </label>
					<input type="text" name="nome" id="nome" class="form-control" placeholder="Digite o nome da prova..." required="required" autofocus="autofocus">

				</div>
				<div class="col-md-6">
					<label> Tipo: </label>
					<select name="tipo" id="tipo" class="form-control" placeholder="Informe o Tipo de Prova" required="required" autofocus="autofocus">
						<option value="vazio"> -- Selecione -- </option>
						<option value="outdoor">Outdoor</option>
						<option value="indoor">Indoor</option>
					</select>
				</div>
			</div>


			<div class="form-group form-row">
				<div class="col-md-6">
					<label> Unidade Federativa: </label>
					<select name="uf" id="uf" class="form-control" placeholder="Uf" required="required" autofocus="autofocus">
						<option value="vazio"> -- Selecione -- </option>
						<option value="AC">AC - Acre</option>
						<option value="AL">AL - Alagoas</option>
						<option value="AP">AP - Amapá</option>
						<option value="AM">AM - Amazonas</option>
						<option value="BA">BA - Bahia</option>
						<option value="CE">CE - Ceará</option>
						<option value="DF">DF - Distrito Federal</option>
						<option value="ES">ES - Espírito Santo</option>
						<option value="GO">GO - Goiás</option>
						<option value="MA">MA - Maranhão</option>
						<option value="MT">MT - Mato Grosso</option>
						<option value="MS">MS - Mato Grosso do Sul</option>
						<option value="MG">MG - Minas Gerais</option>
						<option value="PA">PA - Pará</option>
						<option value="PB">PB - Paraíba</option>
						<option value="PR">PR - Paraná</option>
						<option value="PE">PE - Pernambuco</option>
						<option value="PI">PI - Piauí</option>
						<option value="RJ">RJ - Rio de Janeiro</option>
						<option value="RN">RN - Rio Grande do Norte</option>
						<option value="RS">RS - Rio Grande do Sul</option>
						<option value="RO">RO - Rondônia</option>
						<option value="RR">RR - Roraima</option>
						<option value="SC">SC - Santa Catarina</option>
						<option value="SP">SP - São Paulo</option>
						<option value="SE">SE - Sergipe</option>
						<option value="TO">TO - Tocantins</option>
						<option value="EX">EX - Estrangeiro</option>
					</select>
				</div>
				<div class="col-md-6">
					<label> Nome Federação: </label>
					<input type="text" name="federacao" id="federacao" class="form-control" placeholder="Informe a Federacao">
				</div>
			</div>

			<div class="form-group form-row">
				<div class="col-md-2">
					<label> Data de Inicio: </label>
					<input type="date" name="dataInicio" id="dataInicio" class="form-control" placeholder="Preencha a Data de Inicio" required="required" autofocus="autofocus">
				</div>
				<div class="col-md-2">
					<label> Data do Fim: </label>
					<input type="date" name="dataFim" id="dataFim" class="form-control" placeholder="Preencha a Data do Fim" required="required" autofocus="autofocus">
				</div>
			</div>


			<button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
		</form>
	</div>
</div>

<!-- Fim formul�rio de cadastro de usu�rios -->


<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Provas Cadastradas
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" id="MyTableID" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Tipo</th>
						<th>UF</th>
						<th>Federacao</th>
						<th>Data Inicio</th>
						<th>Data Fim</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while ($i < $quantidade) { ?>
						<tr>
							<td><?php echo $ListaProvas[$i]->getNome(); ?></td>
							<td><?php echo $ListaProvas[$i]->getTipo(); ?></td>
							<td><?php echo $ListaProvas[$i]->getUf(); ?></td>
							<td><?php echo $ListaProvas[$i]->getFederacao(); ?></td>
							<td><?php echo $ListaProvas[$i]->getDataInicio(); ?></td>
							<td><?php echo $ListaProvas[$i]->getDataFim(); ?></td>
							<td><a href="provas-manter-editar.php?id=<?php echo $ListaProvas[$i]->getID(); ?>"><i class="fa fa-edit"></i></a> |<a href="provas-manter-deletar-action.php?id=<?php echo $ListaProvas[$i]->getID(); ?>">
									<i class="fa fa-trash"></i>


								</a></td>
						</tr>



					<?php $i++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script language="JavaScript">
	function enviar() {

		if (document.dados.tipo.value == "vazio") {
			alert("Preencha campo TIPO corretamente!");
			document.dados.tipo.focus();
			return false;
		}

		if (document.dados.uf.value == "vazio") {
			alert("Preencha campo UNIDADE FEDERATIVA corretamente!");
			document.dados.uf.focus();
			return false;
		}
	}
</script>	

<?php include 'inc.rodape.php'; ?>