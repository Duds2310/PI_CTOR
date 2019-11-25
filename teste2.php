<?php
use src\repositorios\RepositorioReceita;
use src\modelo\Receita;


include 'src/repositorios/RepositorioReceita.php';
include 'src/repositorios/RepositorioProva.php';

$repo = new RepositorioReceita();
$rec = new Receita();
//$repositorioprova = new RepositorioProva();
$lista = $repositorioprova->listarProvas();




/**
 * LISTAR
 * 
 * var_dump($repo->listarReceita());
 */

var_dump($repo->listarReceita());

/**
 * CONSULTAR POR ID
 * 
 * $usuarioSelecionado = $repo->consultarReceitaId(1);
 * var_dump($usuarioSelecionado);
 *
 */





/**
 * CADASTRAR
 * 
 * 
 * 
 * $rec->setCategoriaId("1");
    $rec->setDataCadastro("2019-10-31");
    $rec->setDataPagamento("2019-10-31");
    $rec->setDescricao("testetaaaaaaaaaaaaaaaaaaaaeste");
    $rec->setUsuarioId("1");
    $rec->setValor("280");
    $rec->setSituacao("false");
    
    $repo->cadastrarReceita($rec);
 */


/**
 * DELETAR
 * 
 * $rec->setId(1);
$rec->setCategoriaId("1");
$rec->setDataCadastro("2019-10-31");
$rec->setDataPagamento("2019-10-31");
$rec->setDescricao("testetaaaaaaaaaaaaaaaaaaaaeste");
$rec->setUsuarioId("1");
$rec->setValor("280");
$rec->setSituacao("false");

$resultado = $repo->deletarReceita($rec);
 * 
 * 
 * 
 * 
 */

/**
 
$rec->setId("2");
$rec->setCategoriaId("1");
$rec->setDataCadastro("2019-10-31");
$rec->setDataPagamento("2019-10-31");
$rec->setDescricao("teste");
$rec->setUsuarioId("1");
$rec->setValor("280");
$rec->setSituacao("true");

$resultado = $repo->alterarReceita($rec);
*/

$receitasTela = $repo->listarReceitaTela();
var_dump($receitasTela);
die();



























    