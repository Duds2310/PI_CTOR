<?php
namespace src;

// include
require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Treinamento.php';

/**
 * Classe responsavel por realizar a conexão com o banco de dados
 * e manter as informações do treinamento: inserindo, alterando, consultando e excluindo
 * os dados da tabela.
 * Outra nomenclatura para essas classes são 'DAO'.
 *
 * @author Milton
 *        
 */
class RepositorioTreinamento
{

    /**
     * Toda classe repositorio precisa basicamente de 2 elementos
     */

    // ATRIBUTOS
    private $ConexaoMySQL;

    private $Treinamento;

    // COMPORTAMENTOS
    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->Treinamento = new Treinamento();
    }

    //CADASTRAR TREINAMENTO
    public function cadastrarTreinamento($Treinamento)
    {  
        $retorno = true;
    
    $query = "INSERT INTO TB_TREINO(TRE_CATEGORIA, TRE_SITUACAO, TRE_DESCRICAO, TRE_DATA, USU_ID)VALUES
	           ('" . $Treinamento->getCategoria() . "', '" . $Treinamento->getSituacao() . "', '" . $Treinamento->getDescricao() . "',
                     '" . $Treinamento->getData() . "', '" . $Treinamento->getIdUsuario() . "')";
    
    $conexao = $this->ConexaoMySQL->abrirBanco();
    
    if ($conexao->query($query) == true) {
        $retorno = true;
    } else {
        echo mysqli_error($conexao);
    }
    
    $conexao = $this->ConexaoMySQL->fecharBanco();
    
    return $retorno;
    }

    
    public function listarTreinamento()
    {
        $ListaTreinamentos = null;

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $query = "SELECT * FROM TB_TREINO";

        $resultado = $conexao->query($query);

        $i = 0;
        if ($resultado->num_rows > 0) {
            // acessando dados retornados do banco
            while ($linha = $resultado->fetch_assoc()) {
                $Treinamento = new Treinamento();

                $Treinamento->setId($linha["TRE_ID"]);
                $Treinamento->setCategoria($linha["TRE_CATEGORIA"]);
                $Treinamento->setSituacao($linha["TRE_SITUACAO"]);
                $Treinamento->setDescricao($linha["TRE_DESCRICAO"]);
                $Treinamento->setData($linha["TRE_DATA"]);
                $Treinamento->setIdUsuario($linha["USU_ID"]);

                $ListaTreinamentos[$i] = $Treinamento;
                $i ++;
            }
        } else {
            $ListaTreinamentos = false;
        }

        return $ListaTreinamentos;
    }

    public function consultarTreinamentoPorId($Id)
    {
        $Treinamento = null;

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $query = "SELECT * FROM TB_TREINO WHERE TRE_ID = $Id";

        $resultado = $conexao->query($query);

//        $i = 0;
        if ($resultado->num_rows > 0) {
            // acessando dados retornados do banco
            $linha = $resultado->fetch_assoc();
            $Treinamento = new Treinamento();

            $Treinamento->setId($linha["TRE_ID"]);
            $Treinamento->setData($linha["TRE_DATA"]);
            $Treinamento->setDescricao($linha["TRE_DESCRICAO"]);
            $Treinamento->setCategoria($linha["TRE_CATEGORIA"]);
            $Treinamento->setSituacao($linha["TRE_SITUACAO"]);
            $Treinamento->setIdUsuario($linha["USU_ID"]);
        } else {
            $Treinamento = false;
        }
        //var_dump($Treinamento);
     // die("FimRepo");
        return $Treinamento;
    }

    public function alterarTreinamento($Treinamento)
    {
        $retorno = true;

        $query = "UPDATE TB_TREINAMENTO SET TRE_DESCRICAO = '" . $Treinamento->getDescricao() . "', USU_LOGIN = '" . $Usuario->getLogin() . "', USU_EMAIL = '" . $Usuario->getEmail() . "', USU_SENHA = '" . $Usuario->getSenha() . "' WHERE USU_ID = " . $Usuario->getId();

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

    public function deletarTreinamento()
    {}

    public function cursosMaioresQueMilReais()
    {}
}

