<?php

use src\repositorios\RepositorioProvas;
use src\modelo\Provas;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioProvas.php';

$repositorioProvas = new RepositorioProvas();

$id = $_GET['id'];

$ProvasDeletar = new Provas();

$ProvasDeletar->setId($id);

$resultado = $repositorioProvas->deletarProvas($ProvasDeletar);


if ($resultado == TRUE) {
    header('Location: provas-manter.php');
} else {
    echo "Erro na Exclus�o";
}

?>