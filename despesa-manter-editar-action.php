<?php
use src\RepositorioDespesa;
use src\Despesa;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioDespesa.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$datapagamento = $_POST['datapagamento'];
$categoria = $_POST['categoria'];
$datavencimento = $_POST['datavencimento'];
$situacao = $_POST['situacao'];

$qtdParcelas = $_POST['qtdParcela'];
$descricao = $_POST['descricao'];
$id = $_GET['id'];

$repoDespesa = new RepositorioDespesa();

$despesa = new Despesa();




if (isset($_POST['parcelado'])) {
    $parcelado = isset($_POST['parcelado']);
} else {
    $parcelado = 0;
}


if ($qtdParcelas == "") {
    $qtdParcelas = "1";
}


$despesa->setNome($nome);
$despesa->setValor($valor);
$despesa->setDatapagamento($datapagamento);
$despesa->setCategoria($categoria);
$despesa->setDatavencimento($datavencimento);
$despesa->setSituacao($situacao);
$despesa->setQtdParcelas($qtdParcelas);
$despesa->setDescricao($descricao);
$despesa->setId($id);

if ($parcelado == true) {
    $despesa->setParcelado(1);
} else {
    $despesa->setParcelado(0);
}

$resultado = $repoDespesa->alterarDespesa($despesa);

if ($resultado == true) {
    header('Location: despesa-manter.php');
} else {
    echo "DEU RUIM!";
}



