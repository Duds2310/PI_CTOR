<?php

use src\RepositorioTreinamento;

use src\Treinamento;


include 'inc.cabecalho.php';
require_once 'src/repositorios/RepositorioTreinamento.php';

$repositorioTreinamento = new RepositorioTreinamento();

$id = $_GET['id'];

$TreinamentoDeletar = new Treinamento();

$TreinamentoDeletar->setId($id);

$resultado = $repositorioTreinamento->deletarTreinamento($TreinamentoDeletar);

if ($resultado == true) {
    header('Location: treinamento-manter.php');
} else {
    echo "Erro na exclusão do treino";
}

?>