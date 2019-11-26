<?php


use src\RepositorioTreinamento;
use src\Treinamento;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioTreinamento.php';

//$nome = $_POST['nome'];

$descricao = $_POST['descricao'];
$categoria = $_POST['categoria'];
$data = $_POST['data'];
$situacao = $_POST['situacao'];
$id = $_POST['id'];

$repoTreinamento = new RepositorioTreinamento();

$treinamento = new Treinamento();

$treinamento->setDescricao($descricao);
$treinamento->setCategoria($categoria);
$treinamento->setData($data);
$treinamento->setSituacao($situacao);
$treinamento->setId($id);

$resultado = $repoTreinamento->alterarTreinamento($treinamento);

if ($resultado == true) {
    header('Location: treinamento-manter.php');
} else{
        echo "Falha nas alterações de Treino.";
    
}
