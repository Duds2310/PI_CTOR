<?php

use src\RepositorioUsuario;
use src\Usuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$id = $_POST['id'];
$categoria = $_POST['categoria'];


$repoUsuario = new RepositorioUsuario();

$usuario = new Usuario();

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setLogin($login);
$usuario->setSenha($senha);
$usuario->setId($id);
$usuario->setCategoriaid($categoria);

//var_dump($usuario);
//die();

$resultado = $repoUsuario->alterarUsuario($usuario);

if ($resultado == true) {
    header('Location: usuario-manter.php');
} else{
    echo "DEU RUIM!";
}



