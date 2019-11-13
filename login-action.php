<?php
use src\RepositorioUsuario;
use src\Usuario;

// recebendo parametros login e password da pagina login.html

require_once 'src/repositorios/RepositorioUsuario.php';

// Parametros passados via post
$email = $_POST['email'];
$senha = $_POST['password'];

// cria um novo usuario apenas com login e senha
$Usuario = new Usuario();
$Usuario->setEmail($email);
$Usuario->setSenha($senha);

// cria um novo repositorio usuario
$repoUsuario = new RepositorioUsuario();

// com o repositorio usuario chama a função login, passando usuario
$UsuarioLogado = $repoUsuario->login($Usuario);

if ($UsuarioLogado != false) {
    // caso usuario exista então redireciona para pagina inicial
    header("Location: dashboard.php?usuario=" . $UsuarioLogado->getNome());
} else {
    // caso não exista deverá voltar a pagina de login passando parametro login = 0
    header('Location: login.php?login=0');
}



