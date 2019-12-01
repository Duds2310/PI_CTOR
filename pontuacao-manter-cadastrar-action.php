<?php

use src\RepositorioPontuacao;
use src\Pontuacao;


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
$cat = $_POST['categoriaHidden'];




//variaveis apenas para somar (end total) - devem pegar os valores dos disparos e mudar somente quando for X ou M para fins de soma da variável endtotal
$tiro1 = $primeiroDisparo;
$tiro2 = $segundoDisparo;
$tiro3 = $terceiroDisparo;
$tiro4 = $quartoDisparo;
$tiro5 = $quintoDisparo;
$tiro6 = $sextoDisparo;

if ($primeiroDisparo == "M") {
    $tiro1 = 0;
} else if ($primeiroDisparo == "X") {
    $tiro1 = 10;
}

if ($segundoDisparo == "M") {
    $tiro2 = 0;
} else if ($segundoDisparo == "X") {
    $tiro2 = 10;
}

if ($terceiroDisparo == "M") {
    $tiro3  = 0;
} else if ($terceiroDisparo == "X") {
    $tiro3 = 10;
}

if ($quartoDisparo == "M") {
    $tiro4  = 0;
} else if ($quartoDisparo == "X") {
    $tiro4 = 10;
}

if ($quintoDisparo == "M") {
    $tiro5  = 0;
} else if ($quintoDisparo == "X") {
    $tiro5 = 10;
}

if ($sextoDisparo == "M") {
    $tiro6  = 0;
} else if ($sextoDisparo == "X") {
    $tiro6 = 10;
}

$endTotal = $tiro1 + $tiro2 + $tiro3 + $tiro4 + $tiro5 + $tiro6;


$repoPontuacao = new RepositorioPontuacao();

//setando round e end
$pontuacaoRoundEnd = $repoPontuacao->consultarRoundEndAtual($treId);
$endAtual = 0;
$roundAtual = 0;
$ultimaPontuacaoCadastrada = $repoPontuacao->consultarPontuacaoPorId($pontuacaoRoundEnd->getId());

if ($ultimaPontuacaoCadastrada) {
    $roundAtual = $ultimaPontuacaoCadastrada[0]->getRound();
    $endAtual = $ultimaPontuacaoCadastrada[0]->getEnd();
} else {
    $roundAtual = 1;
    $endAtual = 1;
}


//var_dump($endAtual);
//die("parou");
if ($cat == "Indoor") {
    if ($roundAtual == 2 && $endAtual > 9) {
        ?> <div class="alert alert-info" role="alert">
            <?php echo  "A tabela deste treino já foi totalmente preenchida." ?>
        </div>
    <?php die();
        }
    } else if ($cat == "Outdoor") {
        if ($roundAtual == 2 && $endAtual == 7) {
            ?> <div class="alert alert-info" role="alert">
            <?php echo  "A tabela deste treino já foi totalmente preenchida." ?>
        </div>
<?php die();
    }
}

if ($endAtual > 10) {
    $roundAtual = $roundAtual + 1;
    $endAtual = 1;
}


$Disparo[0] = $primeiroDisparo;
$Disparo[1] = $segundoDisparo;
$Disparo[2] = $terceiroDisparo;
$Disparo[3] = $quartoDisparo;
$Disparo[4] = $quintoDisparo;
$Disparo[5] = $sextoDisparo;

$cont = 0;
while($cont < count($Disparo)){
    if($Disparo[$cont] == "M"){
        $Disparo[$cont] = "0";
    }

    $cont++;
}

rsort($Disparo);


$cont = 0;
while($cont < count($Disparo)){
    if($Disparo[$cont] == "0"){
        $Disparo[$cont] = "M";
    }

    $cont++;
}

$primeiroDisparo = $Disparo[0];
$segundoDisparo = $Disparo[1];
$terceiroDisparo = $Disparo[2];
$quartoDisparo = $Disparo[3];
$quintoDisparo = $Disparo[4];
$sextoDisparo = $Disparo[5];



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
    header('Location: treinamento-pontuacao-manter.php?id=' . $treId);
} else {
    echo "Falha ao cadastrar pontuação.";
}
