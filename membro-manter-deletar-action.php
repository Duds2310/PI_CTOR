<?php

use src\RepositorioUsuario;
use src\Usuario;

include 'inc.cabecalho.php';
require_once 'src/repositorios/RepositorioUsuario.php';

$repositorioUsuario = new RepositorioUsuario();

$id = $_GET['id'];

$UsuarioDeletar = new Usuario();

$UsuarioDeletar->setId($id);


$resultado = $repositorioUsuario->deletarMembro($UsuarioDeletar);


if ($resultado == true) {
    header('Location: membro-manter.php');
} else {
    echo "Erro na exclusão";
}


?>