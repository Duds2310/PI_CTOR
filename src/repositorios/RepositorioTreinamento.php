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

    public function cadastrarTreinamento()
    {}

    public function listarTreinamento()
    {
        $ListaTreinamentos = null;

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $query = "SELECT * FROM TB_TREINAMENTO";

        $resultado = $conexao->query($query);

        $i = 0;
        if ($resultado->num_rows > 0) {
            // acessando dados retornados do banco
            while ($linha = $resultado->fetch_assoc()) {
                $Treinamento = new Treinamento();

                $Treinamento->setId($linha["TRE_ID"]);
                $Treinamento->setNome($linha["TRE_NOME"]);
                $Treinamento->setDescricao($linha["TRE_DESCRICAO"]);
                $Treinamento->setPeriodo($linha["TRE_PERIODO"]);
                $Treinamento->setValor($linha["TRE_VALOR"]);
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

        $query = "SELECT * FROM TB_TREINAMENTO WHERE TRE_ID = $Id";

        $resultado = $conexao->query($query);

        $i = 0;
        if ($resultado->num_rows > 0) {
            // acessando dados retornados do banco
            $linha = $resultado->fetch_assoc();
            $Treinamento = new Treinamento();

            $Treinamento->setId($linha["TRE_ID"]);
            $Treinamento->setNome($linha["TRE_NOME"]);
            $Treinamento->setDescricao($linha["TRE_DESCRICAO"]);
            $Treinamento->setPeriodo($linha["TRE_PERIODO"]);
            $Treinamento->setValor($linha["TRE_VALOR"]);
            $Treinamento->setIdUsuario($linha["USU_ID"]);
        } else {
            $Treinamento = false;
        }

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

