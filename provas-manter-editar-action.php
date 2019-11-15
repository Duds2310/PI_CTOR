<?php

use src\repositorios\RepositorioProvas;
use src\modelo\Provas;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioProvas.php';

$nome = $_POST['nome'];
$tipo = $_POST['tipo'];
$uf = $_POST['uf'];
$federacao = $_POST['federacao'];
$dataInicio = $_POST['dataInicio'];
$dataFim = $_POST['dataFim'];
$id = $_POST['id'];

$repoProvas = new RepositorioProvas();

$provas = new Provas();

$provas->setNome($nome);
$provas->setTipo($tipo);
$provas->setUf($uf);
$provas->setFederacao($federacao);
$provas->setDataInicio($dataInicio);
$provas->setDataFim($dataFim);
$provas->setId($id);

$resultado = $repoProvas->alterarProvas($provas);


if ($resultado == TRUE) {
    header('Location: provas-manter.php');
} else {
    echo "DEU RUIM!";
}


