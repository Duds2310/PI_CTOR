<?php

use src\RepositorioUsuario;
use src\Usuario;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioUsuario.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$categoria = $_POST['categoria'];

//var_dump($categoria);
//die();


$repoUsuario = new RepositorioUsuario();

$usuario = new Usuario();

$usuario->setCategoriaid($categoria);
$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setLogin($login);
$usuario->setSenha($senha);





$resultado = $repoUsuario->cadastarUsuario($usuario);



if ($resultado == true) {
    header('Location: usuario-manter.php');
} else{
    echo "DEU RUIM!";
}



