<?php

use src\RepositorioDespesa;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioDespesa.php';

$repoDespesa = new RepositorioDespesa();

$ListaDespesas = $repoDespesa->listarDespesa();

$temRegistro = $ListaDespesas == false ? false : $ListaDespesas;

$i = 0;
$a = 0;
$b = 0;
$c = 0;
$total = 0;

if ($temRegistro) {

	while ($c < count($ListaDespesas)) {
		$total = $total + $ListaDespesas[$c]->getValor();
		$c++;
	}
}

?>

<!-- Breadcrumbs-->
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
	<li class="breadcrumb-item active">Tabela Despesas</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-adress-card"></i> Tabela Despesas
	</div>
	<div class="card-body">

		<!-- inicio formulario -->
		<form action="despesa-manter-cadastrar-action.php" method="post" name="dados" onsubmit="return enviar();">

			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
				</div>
				<div class="form-group col-md-6">
					<select class="form-control form-control-sm" name="categoria" id="categoria">
						<option value="-1">--Selecione a Categoria--</option>
						<option value="Produto de limpeza">Produto de limpeza</option>
						<option value="Produto de consumo">Produto de consumo</option>
						<option value="Contas">Contas</option>
						<option value="Comida">Comida</option>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-12">
					<textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descrição"></textarea>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<label> Data de Pagamento </label> <input type="date" class="form-control" id="datapagamento" name="datapagamento" placeholder="Data de Pagamento">
				</div>
				<div class="form-group col-md-6">
					<label> Data de Vencimento </label> <input type="date" class="form-control" id="datavencimento" name="datavencimento" placeholder="Data de Vencimento">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="text" name="valor" id="valor" class="form-control" name="valor" placeholder="valor" min="1">
				</div>
				<div class="form-group col-md-6">
					<select class="form-control form-control-sm" name="situacao" id="situacao">
						<option value="-1">--Selecione a situação--</option>
						<option value="Em aberto">Em aberto</option>
						<option value="Pago">Pago</option>
					</select>
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="number" class="form-control" id="qtdParcela" name="qtdParcela" placeholder="Quantidade de parcelas">
				</div>
				<div class="form-group col-md-6">
					<input type="checkbox" name="parcelado" value="true"> <label>Parcelado</label>
				</div>
			</div>

			<button name="Submit" type="submit" class="btn btn-primary" value="">Enviar</button>
		</form>
		<!-- Fim formulário -->

	</div>
</div>

<!-- DataTables Example -->
<div class="card mb-3">
	<div class="card-header">
		<i class="fas fa-table"></i> Tabela Despesa
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<?php if ($temRegistro) { ?>
				<table class="table table-bordered" id="MyTableID" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Nome</th>
							<th>Descrição</th>
							<th>Data de Pagamento</th>
							<th>Categoria</th>
							<th>Situacao</th>
							<th>Data de Vencimento</th>
							<th>Quantidade de parcelas</th>
							<th>Valor</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$quantidade = count($ListaDespesas);
							while ($i < $quantidade) {
								?>
							<tr>
								<td><?php echo $ListaDespesas[$i]->getNome(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getDescricao(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getDatapagamento(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getCategoria(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getSituacao(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getDatavencimento(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getQtdParcelas(); ?></td>
								<td><?php echo $ListaDespesas[$i]->getValor(); ?></td>
								<td><a href="despesa-manter-editar.php?id=<?php echo $ListaDespesas[$i]->getID(); ?>"><i class="fa fa-edit"></i></a> |<a href="despesa-manter-deletar-action.php?id=<?php echo $ListaDespesas[$i]->getID(); ?>">
										<i class="fa fa-trash"></i>
									</a></td>

							</tr>
						<?php $i++;
							} ?>

					<tfoot>
						<tr>
							<th colspan="7">Total:</th>
							<th colspan="2"> <?php echo " $$total"; ?></th>
						</tr>
					</tfoot>
					</tbody>
				</table>
			<?php } else { ?>
				<h1 align="center">Não há despesas cadastradas!</h1>
			<?php } ?>
		</div>
	</div>
</div>

<script language="JavaScript">
	function enviar() {

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