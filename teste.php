<?php
use src\ConexaoMySQL;
use src\RepositorioUsuario;
use src\Usuario;
use src\RepositorioTreinamento;

require_once 'src/ConexaoMySQL.php'; // fucionamento parecido com o include
require_once 'src/repositorios/RepositorioUsuario.php';
require_once 'src/modelo/Usuario.php';
require_once 'src/repositorios/RepositorioTreinamento.php';

$repo = new RepositorioUsuario();
$Usuarios = new Usuario();
$repositorioTreinamento = new RepositorioTreinamento();
$listaTreinamentos = $repositorioTreinamento->listarTreinamento();

/*
 * $treinamentoZero = $listaTreinamentos[0];
 * echo $treinamentoZero->getNome() . "<br/>";
 * echo $treinamentoZero->getValor();
 */
?>

<table border="1">
	<tr>
		<td>Nome</td>
		<td>Descricao</td>
		<td>Valor</td>
	</tr>    	

 
<?php
if ($listaTreinamentos != false) {
    $i = 0;
    $quantidade = count($listaTreinamentos);
    while ($i < $quantidade) {
        ?>
	<tr>
		<td><?php echo $listaTreinamentos[$i]->getNome() . "<br/>";?></td>
		<td><?php echo $listaTreinamentos[$i]->getDescricao() . "<br/>";?></td>
		<td> <?php echo $listaTreinamentos[$i]->getValor() . "<br/>";?></td>
	</tr> 
           
<?php

        $i ++;
    }
}
?>
    
    
    
    
  </table>

















<?php
// $resultado = $repositorioTreinamento->consultarTreinamentoPorId(2);
// var_dump($listaTreinamentos);

// $repo->

/*
 * //listando todos os usuarios
 * $Usuarios = $repo->listarUsuario();//arra de usuarios
 * if($Usuarios != false){
 *
 * $i =0;
 * $quantidade = count($Usuarios);
 *
 * while($i < $quantidade){
 * $Usuario = $Usuarios[$i];
 *
 * echo "Nome: " . $Usuario->getNome() . "<br/>";
 * echo "Login: " . $Usuario->getLogin() . "<br/>";
 * echo "Email: " . $Usuario->getEmail() . "<br/>";
 * echo "ID: " . $Usuario->getId() . "<br/>";
 * echo "Senha: " . $Usuario->getSenha() . "<br/>";
 *
 * $i++;
 * }
 *
 * }
 *
 *
 * //conusltando apenas 1 usuario
 * $UsuarioID = $repo->consultarUsuarioPorID(2);
 *
 * if($UsuarioID != false){
 *
 * $i = 0;
 * $quantidade = count($UsuarioID);
 *
 * while($i < $quantidade){
 * $Usuario = $UsuarioID[$i];
 *
 * echo "Nome: " . $Usuario->getNome() . "<br/>";
 * echo "Login: " . $Usuario->getLogin() . "<br/>";
 * echo "Email: " . $Usuario->getEmail() . "<br/>";
 * echo "ID: " . $Usuario->getId() . "<br/>";
 * echo "Senha: " . $Usuario->getSenha() . "<br/>";
 *
 * $i++;
 * }
 *
 * }
 *
 * var_dump($UsuarioID);
 *
 * //echo "PEgando o Mr.M: " . $UsuarioID->getLogin();
 *
 * //INSERINDO USUARio
 *
 * echo "<br/>";
 * echo "Cadastro usuario a partir daqui: ";
 * echo "<br/>";
 * //Criando usuario
 * $novoUsuario = new Usuario();
 * $novoUsuario->setNome("H. Romeu");
 * $novoUsuario->setLogin("H");
 * $novoUsuario->setEmail("hromeu@gmail.com");
 * $novoUsuario->setSenha("1234");
 *
 * //$cadastroUsuario = $repo->cadastarUsuario($novoUsuario);
 *
 * /*
 * if($cadastroUsuario){
 * echo "Usuario ". $novoUsuario->getNome() . " Cadastrado com sucesso!";
 * }
 */

// Consultar usuario desejado
$Usuario = $repo->consultarUsuarioPorID(2);
$Usuario[0]->setLogin("Miltao");
// $usuarioAlterado->;
// $usuarioAlterado->setNome("Jose");

// ALTERANDO USUARIO
$usuarioAlterado = $repo->alterarUsuario($Usuario[0]);
    
    //instanciando a conexao atraves da classe ConexaoMySQL
    //$conexao = new ConexaoMySQL();
    
    //var_dump($conexao->abrirBanco());
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    