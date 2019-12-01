<?php

use src\repositorios\RepositorioReceita;
use src\modelo\Receita;

require_once 'src/repositorios/RepositorioReceita.php';
require_once 'src/modelo/Receita.php';

$repoReceita = new RepositorioReceita();

$id = $_GET['id'];

$receitaDeletar = new Receita();

$receitaDeletar->setId($id);


$resultado = $repoReceita->deletarReceita($receitaDeletar);

if ($resultado == true) {
    header('Location: receita-manter.php');
} else {
    echo "Erro na exclus�o";
}


?>