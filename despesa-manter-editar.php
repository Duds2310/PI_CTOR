<?php

use src\RepositorioDespesa;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioDespesa.php';

// recupera o id do usuario
$idDespesa = $_GET['id'];

$repositorioDespesa = new RepositorioDespesa();

$despesa = $repositorioDespesa->consultarDespesaPorID($idDespesa);
$situacao = $despesa[0]->getSituacao();


$categoria = $despesa[0]->getCategoria();




// var_dump($usuario);
// die();

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Editar Despesa</li>
</ol>

<div class="container">
	<div class="card mb-3">
		<div class="card-header">Editar Despesa</div>
		<div class="card-body">

			<!-- Inicio Formulário -->
			<form action="despesa-manter-editar-action.php?id=<?php echo $idDespesa; ?>" method="post" name="dados" onsubmit="return salvar();">


				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label>Nome:</label>
							<div class="form-label-group">
								<input type="text" name="nome" id="nome" value="<?php echo $despesa[0]->getNome(); ?>" class="form-control" required="required" autofocus="autofocus">
							</div>
						</div>
						<div class="col-md-6">
							<label>Categoria:</label>
							<select class="form-control form-control-sm" name="categoria" id="categoria">
								<option value="-1">--Selecione a Categoria--</option>
								<option <?php if ($categoria == "Produto de limpeza") {
											echo "selected";
										}  ?>>Produto de limpeza</option>
								<option <?php if ($categoria == "Produto de consumo") {
											echo "selected";
										}  ?>>Produto de consumo</option>
								<option <?php if ($categoria == "Contas") {
											echo "selected";
										}  ?>>Contas</option>
								<option <?php if ($categoria == "Comida") {
											echo "selected";
										}  ?>>Comida</option>
							</select>
						</div>


					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label>Descrição:</label>
							<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição"><?php echo $despesa[0]->getDescricao() ?></textarea>
						</div>

					</div>
				</div>


				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label>Data de Pagamento:</label>
							<div class="form-label-group">
								<input type="date" name="datapagamento" id="datapagamento" value="<?php echo $despesa[0]->getDatapagamento(); ?>" class="form-control" placeholder="Data de Pagamento" required="required">
							</div>
						</div>
						<div class="col-md-6">
							<label>Data de Vencimento:</label>
							<div class="form-label-group">
								<input type="date" name="datavencimento" id="datavencimento" value="<?php echo $despesa[0]->getDatavencimento(); ?>" class="form-control" placeholder="Data de Vencimento" required="required">
							</div>
						</div>
					</div>
				</div>


				<div class="form-group">
					<div class="form-row">
						<div class="col-md-6">
							<label>Valor:</label>
							<div class="form-label-group">
								<input type="text" name="valor" id="valor" value="<?php echo $despesa[0]->getValor(); ?>" class="form-control" placeholder="Valor" required="required">
							</div>
						</div>

						<div class="col-md-6">
							<label>Situacao:</label>
							<select class="form-control form-control-sm" name="categoria" id="categoria">
								<option value="-1">--Selecione a situação--</option>
								<option <?php if ($situacao == "Em aberto") {
											echo "selected";
										}  ?>>Em aberto</option>
								<option <?php if ($situacao == "Pago") {
											echo "selected";
										}  ?>>Pago</option>
							</select>
						</div>




					</div>
				</div>


				<div class="form-group">
					<div class="form-row">
						<div class="col-md-12">
							<label>Quantidade de parcelas:</label>
							<div class="form-label-group">
								<input type="text" name="qtdParcela" id="qtdParcela" value="<?php echo $despesa[0]->getQtdParcelas(); ?>" class="form-control" placeholder="Quantidade de parcelas" required="required">
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-row">
						<div class="col-md-1">
							<input type="checkbox" name="parcelado" id="parcelado" <?php if ($despesa[0]->getParcelado() == 1) {
																						echo "checked";
																					} ?> class="form-control" placeholder="Situacao"> Parcelado
						</div>
					</div>
				</div>

				<button class="btn btn-primary btn-block" type="submit">Alterar</button>

			</form>
		</div>
	</div>

</div>

<script language="JavaScript">
	function salvar() {

		if (document.dados.nome.value == "" ||
			document.dados.nome.value.length < 3) {
			alert("Preencha campo NOME corretamente!");
			document.dados.nome.focus();
			return false;
		}

		if (document.dados.descricao.value == "" ||
			document.dados.descricao.length < 140) {
			alert("Preencha o campo DESCRIÇÃO corretamente!");
			document.dados.descricao.focus();
			return false;
		}

		if (document.dados.valor.value == "") {
			alert("Preencha o campo VALOR corretamente!");
			document.dados.valor.focus();
			return false;
		}

		if (document.dados.categoria.value == "-1") {
			alert("Preencha o campo CATEGORIA corretamente!");
			document.dados.categoria.focus();
			return false;
		}

		if (document.dados.situacao.value == "-1") {
			alert("Preencha o campo SITUAÇÃO corretamente!");
			document.dados.situacao.focus();
			return false;
		}

		if (document.dados.datapagamento.value == "") {
			alert("Preencha o campo DATA DE PAGAMENTO corretamente!");
			document.dados.datapagamento.focus();
			return false;
		}

		if (document.dados.datavencimento.value == "") {
			alert("Preencha o campo DATA DE VENCIMENTO corretamente!");
			document.dados.datavencimento.focus();
			return false;
		}
	}
</script>

<?php

include 'inc.rodape.php';
?>