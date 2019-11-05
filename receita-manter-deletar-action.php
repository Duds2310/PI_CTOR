<?php

use src\repositorios\RepositorioReceita;
use src\modelo\Receita;

include 'inc.cabecalho.php';
require_once 'src/repositorios/RepositorioReceita.php';

$repoReceita = new RepositorioReceita();

$id = $_GET['id'];

$receitaDeletar = new Receita();

$receitaDeletar->setId($id);


$resultado = $repoReceita->deletarReceita($receitaDeletar);

if ($resultado == true) {
    header('Location: receita-manter.php');
} else {
    echo "Erro na exclusão";
}


?>