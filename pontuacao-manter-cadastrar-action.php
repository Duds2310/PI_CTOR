<?php

use src\RepositorioPontuacao;
use src\Pontuacao;

include 'inc.cabecalho.php';

require_once 'src/repositorios/RepositorioPontuacao.php';


//$round = $_POST['round'];
//$end = $_POST['end'];
$primeiroDisparo = $_POST['primeiroDisparo'];
$segundoDisparo = $_POST['segundoDisparo'];
$terceiroDisparo = $_POST['terceiroDisparo'];
$quartoDisparo = $_POST['quartoDisparo'];
$quintoDisparo = $_POST['quintoDisparo'];
$sextoDisparo = $_POST['sextoDisparo'];
$treId = $_POST['treId'];


if ($primeiroDisparo == "M") {
    $primeiroDisparo = 0;
}else if ($primeiroDisparo == "X") {
    $primeiroDisparo = 10;
}

if ($segundoDisparo == "M") {
    $segundoDisparo = 0;
}else if ($segundoDisparo == "X") {
    $segundoDisparo = 10;
}

if ($terceiroDisparo == "M") {
    $terceiroDisparo  = 0;
}else if ($terceiroDisparo == "X"){
    $terceiroDisparo = 10;
}

if ($quartoDisparo == "M") {
    $quartoDisparo  = 0;
}else if ($quartoDisparo == "X"){
    $quartoDisparo = 10;
}

if ($quintoDisparo == "M") {
    $quintoDisparo  = 0;
}else if ($quintoDisparo == "X"){
    $quintoDisparo = 10;
}

if ($sextoDisparo == "M") {
    $sextoDisparo  = 0;
}else if ($sextoDisparo == "X"){
    $sextoDisparo = 10;
}

$endTotal = $primeiroDisparo + $segundoDisparo + $terceiroDisparo +$quartoDisparo + $quintoDisparo + $sextoDisparo;

/*
echo "-----------";
echo $round;
echo "-----------";
echo $end;
echo "-----------";
echo $primeiroDisparo;
echo "-----------";
echo $segundoDisparo;
echo "-----------";
echo $terceiroDisparo;
echo "-----------";
echo $quartoDisparo;
echo "-----------";
echo $quintoDisparo;
echo "-----------";
echo $sextoDisparo;
echo "-----------";
echo $endTotal;
die("------------");
*/
$repoPontuacao = new RepositorioPontuacao();

//setando round e end
$pontuacaoRoundEnd = $repoPontuacao->consultarRoundEndAtual($treId);


$ultimaPontuacaoCadastrada = $repoPontuacao->consultarPontuacaoPorId($pontuacaoRoundEnd->getId());    

if($ultimaPontuacaoCadastrada){
    $roundAtual = $ultimaPontuacaoCadastrada[0]->getRound();
    $endAtual = $ultimaPontuacaoCadastrada[0]->getEnd() + 1;    
}else{
    $roundAtual = 1;
    $endAtual = 1;    
}



if($roundAtual == 2 && $endAtual == 11){
    die("A tabela deste treino já foi totalmente preenchida.");
}

if($endAtual > 10){
    $roundAtual = $roundAtual + 1;
    $endAtual = 1;
}


$pontuacao = new Pontuacao();

$pontuacao->setRound($roundAtual);
$pontuacao->setEnd($endAtual);
$pontuacao->setPrimeiroDisparo($primeiroDisparo);
$pontuacao->setSegundoDisparo($segundoDisparo);
$pontuacao->setTerceiroDisparo($terceiroDisparo);
$pontuacao->setQuartoDisparo($quartoDisparo);
$pontuacao->setQuintoDisparo($quintoDisparo);
$pontuacao->setSextoDisparo($sextoDisparo);
$pontuacao->setIdTreino($treId);
$pontuacao->setEndTotal($endTotal);




$resultado = $repoPontuacao->cadastrarPontuacao($pontuacao);



if ($resultado == true) {
    header('Location: treinamento-pontuacao-manter.php?id='.$treId) ;
}else {
    echo "Falha ao cadastrar pontuação.";
}