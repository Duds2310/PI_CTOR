<?php
namespace src;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Usuario.php';

/**
 * Classe reponsavel por realizar o mapeamento da base de dados
 * com as classes da nossa aplicação Usuario, Treinamento e etc...
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
    public function listarUsuario()
    {
        $Usuarios = null; // variável reponsavel por armazezar a lista de usuarios

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

    // Consultar por ID
    public function consultarUsuarioPorID($Id)
    {
        $Usuarios = null; // variável reponsavel por armazezar a lista de usuarios

        $query = "SELECT * FROM TB_USUARIO WHERE USU_ID = $Id"; // variavel reponsavel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao

        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {

            $linha = $resultado->fetch_assoc();
            $Usuario = new Usuario();

            $Usuario->setId($linha['USU_ID']);
            $Usuario->setNome($linha['USU_NOME']);
            $Usuario->setLogin($linha['USU_LOGIN']);
            $Usuario->setSenha($linha['USU_SENHA']);
            $Usuario->setEmail($linha['USU_EMAIL']);
        } else {
            $Usuario = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Usuario;
    }

    // Cadastro Usuario
    public function cadastarUsuario($Usuario)
    {
        $retorno = true;

        $query = "INSERT INTO TB_USUARIO(USU_NOME, USU_LOGIN, USU_EMAIL, USU_SENHA)VALUES
	           ('" . $Usuario->getNome() . "', '" . $Usuario->getLogin() . "', '" . $Usuario->getEmail() . "',
                     '" . $Usuario->getSenha() . "')";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Alterar
    public function alterarUsuario($Usuario)
    {
        $retorno = true;

        $query = "UPDATE TB_USUARIO SET USU_NOME = '" . $Usuario->getNome() . "', USU_LOGIN = '" . $Usuario->getLogin() . "',
                     USU_EMAIL = '" . $Usuario->getEmail() . "', USU_SENHA = '" . $Usuario->getSenha() . "' WHERE USU_ID = " . $Usuario->getId();

        // die($query);
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // Deletar
    public function deletarUsuario($Usuario)
    {
        $retorno = true;

        $query = "DELETE FROM TB_USUARIO WHERE USU_ID = " . $Usuario->getId();

        // die($query);
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // metodo responsavel por realizar o login do usuario
    public function login($UsuarioLogin)
    {
        $UsuarioLogado = null; // so retorno o usuario caso exista, se nao, deverá ser falso.

        $query = "SELECT USU_ID, USU_LOGIN, USU_NOME FROM TB_USUARIO WHERE USU_EMAIL = '" . $UsuarioLogin->getEmail() . "' AND USU_SENHA = '" . $UsuarioLogin->getSenha() . "'";

        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao

        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc(); // cria um array associativo com dados do banco

            $Usuario = new Usuario(); // cria uma instancia do usuario
            $Usuario->setId($linha['USU_ID']);
            $Usuario->setNome($linha['USU_NOME']);
            $Usuario->setLogin($linha['USU_LOGIN']);

            $UsuarioLogado = $Usuario;
        } else {
            $UsuarioLogado = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $UsuarioLogado;
    }
}

