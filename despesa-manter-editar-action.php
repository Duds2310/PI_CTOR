<?php


use src\RepositorioDespesa;
use src\Despesa;

include 'inc.cabecalho.php';

require_once 'src/RepositorioDespesa.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$datapagamento = $_POST['datapagamento'];
$categoria = $_POST['categoria'];   
$datavencimento = $_POST['datavencimento'];
$situacao = $_POST['situacao'];
$id = $_GET['id'];

$repoDespesa = new RepositorioDespesa();

$despesa = new Despesa();

$despesa->setNome($nome);
$despesa->setValor($valor);
$despesa->setDatapagamento($datapagamento);
$despesa->setCategoria($categoria);
$despesa->setDatavencimento($datavencimento);
$despesa->setSituacao($situacao);
$despesa->setId($id);

$resultado = $repoDespesa->alterarDespesa($despesa);

if ($resultado == true) {
    header('Location: despesa-manter.php');
} else{
    echo "DEU RUIM!";
}



