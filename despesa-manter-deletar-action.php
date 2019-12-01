<?php




use src\RepositorioDespesa;

require_once 'src/repositorios/RepositorioDespesa.php';


$repositorioDespesa = new RepositorioDespesa();

$id = $_GET['id'];

$resultado = $repositorioDespesa->deletarDespesa($id);

if ($resultado == true) {
    header('Location: despesa-manter.php');
} else {
    echo "Erro na exclus�o";
}


?>