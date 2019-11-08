<?php



use src\repositorios\RepositorioReceita;
use src\modelo\Receita;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioReceita.php';

$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$dataCadastro = $_POST['dataCadastro'];
$dataPagamento = $_POST['dataPagamento'];
$idUsuarioResponsavel = $_POST['IdUsuarioResponsavel'];
$categoria = $_POST['categoria'];
$autor = $_POST['autor'];
$id = $_GET['id'];

$repoReceita = new RepositorioReceita();

$Receita = new Receita();

$Receita->setDescricao($descricao);
$Receita->setValor($valor);
$Receita->setDataCadastro($dataCadastro);
$Receita->setDataPagamento($dataPagamento);
$Receita->setUsuarioResponsavelId($idUsuarioResponsavel);
$Receita->setCategoriaId($categoria);
$Receita->setIdUsuario($autor);
$Receita->setId($id);

$resultado = $repoReceita->alterarReceita($Receita);

if ($resultado == true) {
    header('Location: receita-manter.php');
} else{
    echo "DEU RUIM!";
}



