<?php

use src\RepositorioUsuario;
use src\Usuario;


require_once 'src/repositorios/RepositorioUsuario.php';

$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$categoria = $_POST['categoria'];

$senha = md5($senha);



$repoUsuario = new RepositorioUsuario();

$usuario = new Usuario();

$usuario->setCategoriaid($categoria);
$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setLogin($login);
$usuario->setSenha($senha);

//var_dump($usuario);
//die();





$resultado = $repoUsuario->cadastarUsuario($usuario);



if ($resultado == true) {
    header('Location: usuario-manter.php');
} else{
    echo "DEU RUIM!";
}



