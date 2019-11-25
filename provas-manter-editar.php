<?php

use src\repositorios\RepositorioProvas;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioProvas.php';

$idProvas = $_GET['id'];

$repositorioProvas = new RepositorioProvas();

$provas = $repositorioProvas->consultarProvasPorID($idProvas);

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Provas</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Provas</div>
		<div class="card-body">
			<form action="provas-manter-editar-action.php?id=<?php echo $idProvas; ?>" method="post" name="dados" onsubmit="return enviar();">
				<input type="hidden" value="<?php echo $provas[0]->getId(); ?>" name="id">
				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label>Nome: </label>
							<div class="form-label-group">

								<input type="text" name="nome" id="nome" value="<?php echo $provas[0]->getNome(); ?>" class="form-control" required="required" autofocus="autofocus">
							</div>
						</div>
						<div class="col-md-6">
							<label>Tipo</label>
							<div class="form-label-group">
								<select name="tipo" id="tipo" value="<?php echo $provas[0]->getTipo(); ?>" class="form-control" placeholder="Informe o Tipo de Prova">
									<option value="vazio"> -- Selecione -- </option>
									<option value="outdoor">Outdoor</option>
									<option value="indoor">Indoor</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>UF: </label>
					<div class="form-label-group">

						<select name="uf" id="uf" class="form-control" placeholder="Uf" value="<?php echo $provas[0]->getUf(); ?>" required="required">

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
				</div>
				<div class="form-group">
					<label>Federação: </label>
					<div class="form-row">
						<div class="col-md-6">
							<div class="form-label-group">
								<input type="text" name="federacao" id="federacao" value="<?php echo $provas[0]->getFederacao(); ?>" class="form-control" placeholder="Informe a Federacao" required="required">
							</div>
						</div>
					</div>
				</div>
				<div class="form-label-group form-row">
					<div class="col-md-6">
						<label>Data Inicio: </label>

						<input type="date" id="dataInicio" name="dataInicio" value="<?php echo $provas[0]->getDataInicio(); ?>" class="form-control" placeholder="Data de Inicio" required="required">
					</div>
					<div class="col-md-6">
						<label>Data Fim: </label>
						<input type="date" id="dataFim" name="dataFim" value="<?php echo $provas[0]->getDataFim(); ?>" class="form-control" placeholder="Data do Fim" required="required">
					</div>
				</div>

				<button class="btn btn-primary btn-block" type="submit">Registrar</button>
			</form>
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