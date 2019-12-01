<?php
use src\repositorios\RepositorioReceita;
use src\modelo\Receita;



require_once 'src/repositorios/RepositorioReceita.php';

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$dataCadastro = date("y-m-d");
$dataPagamento = $_POST['dataPagamento'];
$idUsuarioResponsavel = $_POST['IdUsuarioResponsavel'];
$categoria = $_POST['categoria'];


$repoReceita = new RepositorioReceita();

$Receita = new Receita();

$Receita->setDescricao($descricao);
$Receita->setValor($valor);
$Receita->setDataCadastro($dataCadastro);
$Receita->setDataPagamento($dataPagamento);
$Receita->setUsuarioResponsavelId($idUsuarioResponsavel);
$Receita->setCategoriaId($categoria);
$Receita->setIdUsuario($idUsuarioLogado);

$resultado = $repoReceita->cadastrarReceita($Receita);

if ($resultado == true) {
    header('Location: receita-manter.php');
} else {
    echo "DEU RUIM! opa";
}



