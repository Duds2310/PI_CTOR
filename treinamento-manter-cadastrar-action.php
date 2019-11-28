<?php


use src\RepositorioTreinamento;
use src\Treinamento;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioTreinamento.php';

$categoria = $_POST['categoria'];
$situacao = $_POST['situacao'];
$descricao = $_POST['descricao'];
$data = $_POST['data'];
$idUsuario = $idUsuarioLogado;

$repoTreinamento = new RepositorioTreinamento();

$treinamento = new Treinamento();

$treinamento->setCategoria($categoria);
$treinamento->setSituacao($situacao);
$treinamento->setDescricao($descricao);
$treinamento->setData($data);
$treinamento->setIdUsuario($idUsuario);


$resultado = $repoTreinamento->cadastrarTreinamento($treinamento);

if ($resultado == true) {
    header('Location: treinamento-manter.php');
} else{
   ?>
   <div class="alert alert-danger" role="alert">
    <?php  echo "Falha ao cadastrar o Treinamento!"; ?>
   </div>
 <?php } ?>



