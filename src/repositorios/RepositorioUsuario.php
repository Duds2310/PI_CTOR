<?php
namespace src;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Usuario.php';

/**
 * Classe reponsavel por realizar o mapeamento da base de dados
 * com as classes da nossa aplica��o Usuario, Treinamento e etc...
 * Neste caso esta classe fara o mapeamento para o Usuario
 */
class RepositorioUsuario
{

    // ATRIBUTOS
    private $Usuario;

    private $ConexaoMySQL;

    // CONSTRUTOR
    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->Usuario = new Usuario();
    }

    // METODOS
    /**
     * Metodo responsavel por listar os usuarios
     */
    // Listar Usuario
    public function listarUsuario()
    {
        $Usuarios = null; // vari�vel reponsavel por armazezar a lista de usuarios

        $query = "SELECT * FROM TB_USUARIO"; // variavel reponsavel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao
        
        


        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();

                $Usuario->setId($linha['USU_ID']);
                $Usuario->setNome($linha['USU_NOME']);
                $Usuario->setLogin($linha['USU_LOGIN']);
                $Usuario->setSenha($linha['USU_SENHA']);
                $Usuario->setEmail($linha['USU_EMAIL']);

                $Usuarios[$i] = $Usuario;
                $i ++;
            }
        } else {
            $Usuarios = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Usuarios;
    }
    
    // Listar Membro
    public function listarMembro()
    {
        $Usuarios = null; // vari�vel reponsavel por armazezar a lista de usuarios
        
        $query = "SELECT * FROM TB_USUARIO"; // variavel reponsavel por armazenar a query do banco
        
        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao
        
        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados
        
        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {
            
            while ($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();
                
                $Usuario->setId($linha['USU_ID']);
                $Usuario->setNome($linha['USU_NOME']);
                $Usuario->setRg($linha['USU_RG']);
                $Usuario->setCep($linha['USU_CEP']);
                $Usuario->setCpf($linha['USU_CPF']);
                $Usuario->setUf($linha['USU_UF']);
                $Usuario->setCidade($linha['USU_CIDADE']);
                $Usuario->setLogradouro($linha['USU_LOGRADOURO']);
                $Usuario->setTelefone($linha['USU_TELEFONE']);
                $Usuario->setLogin($linha['USU_LOGIN']);
                $Usuario->setSenha($linha['USU_SENHA']);
                $Usuario->setEmail($linha['USU_EMAIL']);
                
                $Usuarios[$i] = $Usuario;
                $i ++;
            }
        } else {
            $Usuarios = false;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Usuarios;
        
    }

    // Consultar por ID
    public function consultarUsuarioPorID($Id)
    {
        $Usuarios = null; // vari�vel reponsavel por armazezar a lista de usuarios

        $query = "SELECT * FROM TB_USUARIO WHERE USU_ID = $Id"; // variavel reponsavel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao

        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();

                $Usuario->setId($linha['USU_ID']);
                $Usuario->setNome($linha['USU_NOME']);
                $Usuario->setLogin($linha['USU_LOGIN']);
                $Usuario->setSenha($linha['USU_SENHA']);
                $Usuario->setEmail($linha['USU_EMAIL']);
                $Usuario->setCategoriaid($linha['CAT_ID']);
                
                $Usuarios[$i] = $Usuario;
                $i ++;
            }
        } else {
            $Usuarios = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Usuarios;
    }
    
    // Consultar Membro por ID    
    public function consultarMembroPorID($Id)
    {
        $Usuarios = null; // vari�vel reponsavel por armazezar a lista de usuarios
        
        $query = "SELECT * FROM TB_USUARIO WHERE USU_ID = $Id"; // variavel reponsavel por armazenar a query do banco
        
        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao
        
        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados
        
        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {
            
            while ($linha = $resultado->fetch_assoc()) {
                $Usuario = new Usuario();
                
                $Usuario->setId($linha['USU_ID']);
                $Usuario->setNome($linha['USU_NOME']);
                $Usuario->setRg($linha['USU_RG']);
                $Usuario->setCep($linha['USU_CEP']);
                $Usuario->setCpf($linha['USU_CPF']);
                $Usuario->setUf($linha['USU_UF']);
                $Usuario->setCidade($linha['USU_CIDADE']);
                $Usuario->setLogradouro($linha['USU_LOGRADOURO']);
                $Usuario->setTelefone($linha['USU_TELEFONE']);
                $Usuario->setLogin($linha['USU_LOGIN']);
                $Usuario->setSenha($linha['USU_SENHA']);
                $Usuario->setEmail($linha['USU_EMAIL']);
                $Usuario->setCategoriaid($linha['CAT_ID']);
                
                $Usuarios[$i] = $Usuario;
                $i ++;
            }
        } else {
            $Usuarios = false;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Usuarios;
    }

    // Cadastro Usuario
    public function cadastarUsuario($Usuario)
    {
        $retorno = true;

        $query = "INSERT INTO TB_USUARIO(USU_NOME, USU_LOGIN, USU_EMAIL, USU_SENHA, CAT_ID)VALUES
	           ('" . $Usuario->getNome() . "', '" . $Usuario->getLogin() . "', '" . $Usuario->getEmail() . "',
                     '" . $Usuario->getSenha() . "', " . $Usuario->getCategoriaid() . ");";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }
    
    // Cadastro Membro
    public function cadastrarMembro($Usuario)
    {
        $retorno = true;
        
        $query = "INSERT INTO TB_USUARIO(USU_NOME, USU_RG, USU_CEP, USU_CPF, USU_UF,
                     USU_CIDADE, USU_LOGRADOURO,USU_TELEFONE, USU_LOGIN, USU_EMAIL, USU_SENHA, CAT_ID)VALUES
	           ('" . $Usuario->getNome() . "', '" . $Usuario->getRg() ."', '" . $Usuario->getCep() . "', '" . 
	           $Usuario->getCpf() . "', '" . $Usuario->getUf() . "', '" . $Usuario->getCidade() . "', '" . $Usuario->getLogradouro() .
	           "', '" . $Usuario->getTelefone() . "', '" . $Usuario->getLogin() . "', '" . $Usuario->getEmail() . "', '" . $Usuario->getSenha() . "', '" . $Usuario->getCategoriaId() . "')";
        
	           //echo $query;
	           //die();
        
       
	           
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
            $retorno = mysqli_error($conexao);
        }
        
        $conexao = $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
    }

    // Alterar Usuario
    public function alterarUsuario($Usuario)
    {
        $retorno = true;

        $query = "UPDATE TB_USUARIO SET USU_NOME = '" . $Usuario->getNome() . "', USU_LOGIN = '" . $Usuario->getLogin() . "',
                     USU_EMAIL = '" . $Usuario->getEmail() . "', USU_SENHA = '" . $Usuario->getSenha() . 
                     "', CAT_ID = '" . $Usuario->getCategoriaId() .  "' WHERE USU_ID = " . $Usuario->getId();
       

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }
    
    // Alterar Membro    
    public function alterarMembro($Usuario){
        $retorno = true;
        
        $query = "UPDATE TB_USUARIO SET USU_NOME = '" . $Usuario->getNome() ."',USU_RG = '". $Usuario->getRg()
        . "',USU_CEP = '". $Usuario->getCep() ."',USU_CPF = '". $Usuario->getCpf() . "',USU_CIDADE = '". $Usuario->getCidade()
        . "',USU_LOGRADOURO = '".$Usuario->getLogradouro() . "',USU_TELEFONE = '" . $Usuario->getTelefone() 
        ."', USU_LOGIN = '" . $Usuario->getLogin() . "',USU_EMAIL = '" . $Usuario->getEmail() . "', USU_SENHA = '" . $Usuario->getSenha() 
        ."', USU_UF = '" . $Usuario->getUf() . "'  WHERE USU_ID = " . $Usuario->getId();
        
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }
        
        $conexao = $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
    }
    
    // Deletar Usuario    
    public function deletarUsuario($Usuario) {
        $retorno = true;
        
        $query = "DELETE FROM TB_USUARIO WHERE USU_ID = " . $Usuario->getId();
        
        //die($query);
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }
        
        $conexao = $this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
    }
    
    // Deletar Membro    
    public function deletarMembro($Usuario) {
        $retorno = true;
        
        $query = "DELETE FROM TB_MEMBRO WHERE USU_ID = " .  $Usuario->getId();
        
        $conexao = $this->ConexaoMySQL->fecharBanco();
        
        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }
        
        $conexao =$this->ConexaoMySQL->fecharBanco();
        
        return $retorno;
        
    }
    
    
    // metodo responsavel por realizar o login do usuario
    public function login($UsuarioLogin) {      
        $UsuarioLogado = null; //so retorno o usuario caso exista, se nao, dever� ser falso. 

        
        $query = "SELECT USU_ID, USU_EMAIL, USU_NOME, CAT_ID FROM TB_USUARIO WHERE USU_EMAIL = '".$UsuarioLogin->getEmail()."' AND USU_SENHA = '".$UsuarioLogin->getSenha()."'"; 
        
        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao
        
        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados
        
        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();//cria um array associativo com dados do banco
            
            $Usuario = new Usuario();//cria uma instancia do usuario         
            $Usuario->setId($linha['USU_ID']);
            $Usuario->setEmail($linha['USU_EMAIL']);
            $Usuario->setNome($linha['USU_NOME']);
            $Usuario->setCategoriaid($linha['CAT_ID']);
            
            $UsuarioLogado = $Usuario;
                
        } else {
            $UsuarioLogado = false;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $UsuarioLogado;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

