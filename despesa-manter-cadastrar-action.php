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


$repoDespesa = new RepositorioDespesa();

$despesa = new Despesa();

$despesa->setNome($nome);
$despesa->setValor($valor);
$despesa->setDatapagamento($datapagamento);
$despesa->setCategoria($categoria);
$despesa->setDatavencimento($datavencimento);
$despesa->setSituacao($situacao);



$cadastrado = $repoDespesa->cadastrarDespesa($despesa);

if ($cadastrado == true) {
    header('Location: despesa-manter.php');
} else{
    echo "DEU RUIM!";
}
