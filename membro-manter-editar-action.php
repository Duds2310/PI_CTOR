<?php
use src\RepositorioUsuario;
use src\Usuario;


require_once 'src/repositorios/RepositorioUsuario.php';

//recuperando informacoes do formulario

$nome = $_POST['nome'];
$rg = $_POST['rg'];
$cep = $_POST['cep'];
$cpf = $_POST['cpf'];
$uf = $_POST['uf'];
$cidade = $_POST['cidade'];
$logradouro = $_POST['logradouro'];
$telefone = $_POST['telefone'];
$login = $_POST['login'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$senhaConfirma = $_POST['senhaConfirma'];
$id = $_POST['id'];


$repositorioUsuario = new RepositorioUsuario();

$Usuario = new Usuario();
$Usuario->setNome($nome);
$Usuario->setRg($rg);
$Usuario->setCep($cep);
$Usuario->setCpf($cpf);
$Usuario->setUf($uf);
$Usuario->setCidade($cidade);
$Usuario->setLogradouro($logradouro);
$Usuario->setTelefone($telefone);
$Usuario->setLogin($login);
$Usuario->setEmail($email);
$Usuario->setSenha($senha);
$Usuario->setId($id);



$editado = $repositorioUsuario->alterarMembro($Usuario);

if($editado == true){
    header("location: dashboard.php");
}else {
    echo "Deu ruim :D"  ;
}