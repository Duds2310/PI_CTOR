<?php
use src\RepositorioUsuario;
use src\Usuario;


define("seila", 1234);
// recebendo parametros login e password da pagina login.html

require_once 'src/repositorios/RepositorioUsuario.php';

// Parametros passados via post
$email = $_POST['email'];
$senha = $_POST['password'];

$senha = md5($senha);

// cria um novo usuario apenas com login e senha
$Usuario = new Usuario();
$Usuario->setEmail($email);
$Usuario->setSenha($senha);

// cria um novo repositorio usuario
$repoUsuario = new RepositorioUsuario();

// com o repositorio usuario chama a fun��o login, passando usuario
$UsuarioLogado = $repoUsuario->login($Usuario);


if ($UsuarioLogado != false) {
    //caiu aqui o usuario existe
    session_start();
    
    //armazenando informacoes do usuario logado na sessap
    $_SESSION['idUsuario'] = $UsuarioLogado->getId();
    $_SESSION['emailUsuario'] = $UsuarioLogado->getEmail();
    $_SESSION['nomeUsuario'] = $UsuarioLogado->getNome();
    $_SESSION['catUsuario'] = $UsuarioLogado->getCategoriaid();
    
    // caso usuario exista ent�o redireciona para pagina inicial
    header("Location: dashboard.php?usuario=" . $UsuarioLogado->getNome());
} else {
    // caso n�o exista dever� voltar a pagina de login passando parametro login = 0
    header('Location: login.php?login=0');
}



