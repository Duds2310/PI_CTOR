<?php




use src\RepositorioDespesa;

require_once 'src/repositorios/RepositorioDespesa.php';

include 'inc.cabecalho.php';

$repositorioDespesa = new RepositorioDespesa();

$id = $_GET['id'];

$DespesaDeletar = $repositorioDespesa->consultarDespesaPorID($id);


$resultado = $repositorioDespesa->deletarDespesa($DespesaDeletar[0]);

if ($resultado == true) {
    header('Location: despesa-manter.php');
} else {
    echo "Erro na exclusão";
}


?>