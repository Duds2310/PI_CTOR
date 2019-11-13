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

// com o repositorio usuario chama a fun��o login, passando usuario
$UsuarioLogado = $repoUsuario->login($Usuario);

if ($UsuarioLogado != false) {
    // caso usuario exista ent�o redireciona para pagina inicial
    header("Location: dashboard.php?usuario=" . $UsuarioLogado->getNome());
} else {
    // caso n�o exista dever� voltar a pagina de login passando parametro login = 0
    header('Location: login.php?login=0');
}



