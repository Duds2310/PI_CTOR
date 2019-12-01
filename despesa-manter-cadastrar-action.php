<?php

use src\RepositorioDespesa;
use src\Despesa;


require_once 'src/repositorios/RepositorioDespesa.php';

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$datapagamento = $_POST['datapagamento'];
$categoria = $_POST['categoria'];
$datavencimento = $_POST['datavencimento'];
$situacao = $_POST['situacao'];
$descricao = $_POST['descricao'];
$parcela = $_POST['qtdParcela'];

$i = 0;




$despesa = new Despesa();

if (isset($_POST['parcelado'])) {
    $despesa->setParcelado(1);
} else {
    $despesa->setParcelado(0);
}

if ($parcela > 1) {
    $despesa->setQtdParcelas($parcela);
} else {
    $despesa->setQtdParcelas(1);
}

if ($parcela == "") {
    $parcela = "1";
}





$repoDespesa = new RepositorioDespesa();



$despesa->setNome($nome);
$despesa->setValor($valor);
$despesa->setDatapagamento($datapagamento);
$despesa->setCategoria($categoria);
$despesa->setDatavencimento($datavencimento);
$despesa->setSituacao($situacao);
$despesa->setDescricao($descricao);


if ($despesa > 1) {
    while ($despesa >= $i) {
        
        date($datavencimento, strtotime("+30 days"));
        $despesa->setDatavencimento($datavencimento);
        
        $cadastrado = $repoDespesa->cadastrarDespesa($despesa);
        $i++;
    }
} else {
    $cadastrado = $repoDespesa->cadastrarDespesa($despesa);
}





if ($cadastrado == true) {
    header('Location: despesa-manter.php');
} else {
    echo "DEU RUIM!";
}
