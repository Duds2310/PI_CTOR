<?php
namespace src;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Despesa.php';

class RepositorioDespesa
{

    // ATRIBUTOS
    private $despesa;

    private $ConexaoMySQL;

    // CONSTRUTOR
    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->despesa = new Despesa();
    }

    // METODOS

    /**
     * METODO RESPONS�VEL POR LISTAR AS DESPESAS
     */
    public function listarDespesa()
    {
        $ListaDespesa = null; // vari�vel respons�vel por armazenar as despesas

        $query = "SELECT * FROM TB_DESPESAS"; // vari�vel respons�vel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco(); // vari�vel respons�vel por abrir o link de conexao

        $resultado = $conexao->query($query); // respons�vel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou o valor

        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $Despesa = new Despesa();

                $Despesa->setId($linha['DES_ID']);
                $Despesa->setNome($linha['DES_NOME']);
                $Despesa->setValor($linha['DES_VALOR']);
                $Despesa->setDatapagamento($linha['DES_DATA_PAGAMENTO']);
                $Despesa->setCategoria($linha['DES_CATEGORIA']);
                $Despesa->setDatavencimento($linha['DES_DATA_VENCIMENTO']);
                $Despesa->setSituacao($linha['DES_SITUACAO']);
                $Despesa->setDescricao($linha['DES_DESCRICAO']);
                $Despesa->setQtdParcelas($linha['DES_QTD_PARCELA']);
                $Despesa->setParcelado($linha['DES_PARCELADO']);


                $ListaDespesa[$i] = $Despesa;

                $i ++;
            }
        } else {
            $ListaDespesa = false;
        }
        $this->ConexaoMySQL->fecharBanco();

        return $ListaDespesa;
    }

    // CONSULTAR POR ID
    public function consultarDespesaPorID($Id)
    {
        $Despesa = null;

        $query = "SELECT * FROM TB_DESPESAS WHERE DES_ID = $Id";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $resultado = $conexao->query($query);

        $i = 0;
        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $Despesa = new Despesa();

                $Despesa->setId($linha['DES_ID']);
                $Despesa->setNome($linha['DES_NOME']);
                $Despesa->setValor($linha['DES_VALOR']);
                $Despesa->setDatapagamento($linha['DES_DATA_PAGAMENTO']);
                $Despesa->setCategoria($linha['DES_CATEGORIA']);
                $Despesa->setDatavencimento($linha['DES_DATA_VENCIMENTO']);
                $Despesa->setSituacao($linha['DES_SITUACAO']);
                $Despesa->setDescricao($linha['DES_DESCRICAO']);
                $Despesa->setQtdParcelas($linha['DES_QTD_PARCELA']);
                $Despesa->setParcelado($linha['DES_PARCELADO']);

                $Despesas[$i] = $Despesa;
                $i ++;
            }
        } else {
            $Despesas = false;
        }
        $this->ConexaoMySQL->fecharBanco();

        return $Despesas;
    }

    // CADASTRO DE DESPESAS
    public function cadastrarDespesa($Despesa)
    {
        $retorno = false;

        $query = "INSERT INTO TB_DESPESAS(DES_NOME, DES_VALOR, DES_DATA_PAGAMENTO, DES_CATEGORIA, DES_DATA_VENCIMENTO, DES_SITUACAO, DES_DESCRICAO, DES_QTD_PARCELA, DES_PARCELADO)VALUES
                    ('" . $Despesa->getNome() . "' , " . $Despesa->getValor() . " , '" . $Despesa->getDatapagamento() . "' , '" . $Despesa->getCategoria() . "' ,
                     '" . $Despesa->getDatavencimento() . "' , '" . $Despesa->getSituacao() . "', '" . $Despesa->getDescricao() . "' , '" . $Despesa->getQtdParcelas() . "' ,
                        '" . $Despesa->getParcelado() . "')";
        
       
        
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // ALTERAR
    public function alterarDespesa($Despesa)
    {
        $retorno = false;

        $query = "UPDATE TB_DESPESAS SET DES_NOME = '" . $Despesa->getNome() . "', DES_VALOR = '" . $Despesa->getValor() . "',
                     DES_DATA_PAGAMENTO = '" . $Despesa->getDatapagamento() . "', DES_CATEGORIA = '" . $Despesa->getCategoria() . "' ,
                     DES_DATA_VENCIMENTO = '" . $Despesa->getDatavencimento() . "' , DES_SITUACAO = '" . $Despesa->getSituacao() . "' ,
                     DES_DESCRICAO = '" . $Despesa->getDescricao() . "' , DES_QTD_PARCELA = " . $Despesa->getQtdParcelas() . " ,
                     DES_PARCELADO = '" . $Despesa->getParcelado() . "' WHERE DES_ID = " . $Despesa->getId();

        
        //var_dump($query);
        //die();
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    // DELETAR
    public function deletarDespesa($id)
    {
        $retorno = true;

        $query = "DELETE FROM TB_DESPESAS WHERE DES_ID = " . $id;

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
}