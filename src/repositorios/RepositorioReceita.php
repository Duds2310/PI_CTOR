<?php
namespace src\repositorios;

use src\ConexaoMySQL;
use src\modelo\Receita;
use src\Usuario;
require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Receita.php';

class RepositorioReceita
{

    private $Receita;

    private $ConexaoMySQL;

    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->Receita = new Receita();
    }

    public function cadastrarReceita($Receita)
    {
        $retorno = false;

        $query = "  INSERT INTO tb_receitas (REC_DATA_PAGAMENTO,REC_DESCRICAO,REC_VALOR,REC_ID_USU_PAGAMENTO,REC_DATA_CADASTRO,CAT_REC_ID,REC_SITUACAO,USU_ID)
                     values ('" . $Receita->getDataPagamento() . "','" . $Receita->getDescricao() . "'," . $Receita->getValor() . ",'" . $Receita->getUsuarioResponsavelId() . "',
                        '" . $Receita->getDataCadastro() . "'," . $Receita->getCategoriaId() . ",'" . $Receita->getSituacao() . "', '". $Receita->getIdUsuario() ."'   )";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();
        return $retorno;
    }

    public function listarReceita()
    {
        $Receita = null;

        $query = "SELECT * FROM TB_RECEITAS";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $resultado = $conexao->query($query);

        $i = 0;

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {

                $Receita = new Receita();

                $Receita->setId($linha["REC_ID"]);
                $Receita->setCategoriaId($linha["CAT_REC_ID"]);
                $Receita->setDataCadastro($linha["REC_DATA_CADASTRO"]);
                $Receita->setDataPagamento($linha["REC_DATA_PAGAMENTO"]);
                $Receita->setDescricao($linha["REC_DESCRICAO"]);
                $Receita->setUsuarioResponsavelId($linha["REC_ID_USU_PAGAMENTO"]);
                $Receita->setValor($linha["REC_VALOR"]);
                $Receita->setSituacao($linha["REC_SITUACAO"]);
                $Receita->setIdUsuario($linha["USU_ID"]);

                $Receitas[$i] = $Receita;
                $i ++;
            }
        } else {
            $Receitas = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Receitas;
    }
    
    public function listarReceitasAtivas() {
        $Receita = null;
        
        $query = "SELECT * FROM TB_RECEITAS WHERE REC_SITUACAO = 1";
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $resultado = $conexao->query($query);
        
        $i = 0;
        
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                
                $Receita = new Receita();
                
                $Receita->setId($linha["REC_ID"]);
                $Receita->setCategoriaId($linha["CAT_REC_ID"]);
                $Receita->setDataCadastro($linha["REC_DATA_CADASTRO"]);
                $Receita->setDataPagamento($linha["REC_DATA_PAGAMENTO"]);
                $Receita->setDescricao($linha["REC_DESCRICAO"]);
                $Receita->setUsuarioResponsavelId($linha["REC_ID_USU_PAGAMENTO"]);
                $Receita->setValor($linha["REC_VALOR"]);
                $Receita->setSituacao($linha["REC_SITUACAO"]);
                $Receita->setIdUsuario($linha["USU_ID"]);
                
                $Receitas[$i] = $Receita;
                $i ++;
            }
        } else {
            $Receitas = false;
        }
        
        $this->ConexaoMySQL->fecharBanco();
        
        return $Receitas;
    }

    public function consultarReceitaId($id)
    {
        $Receita = null;

        $query = "SELECT * FROM TB_RECEITAS WHERE REC_ID = $id";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $resultado = $conexao->query($query);

        $i = 0;

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {

                $Receita = new Receita();

                $Receita->setId($linha["REC_ID"]);
                $Receita->setCategoriaId($linha["CAT_REC_ID"]);
                $Receita->setDataCadastro($linha["REC_DATA_CADASTRO"]);
                $Receita->setDataPagamento($linha["REC_DATA_PAGAMENTO"]);
                $Receita->setDescricao($linha["REC_DESCRICAO"]);
                $Receita->setUsuarioResponsavelId($linha["REC_ID_USU_PAGAMENTO"]);
                $Receita->setValor($linha["REC_VALOR"]);
                $Receita->setSituacao($linha["REC_SITUACAO"]);
                $Receita->setIdUsuario($linha["USU_ID"]);

                $i ++;
            }
        } else {
            $Receita = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Receita;
    }

    public function deletarReceita($Receita)
    {
        $retorno = false;

        $query = "UPDATE TB_RECEITAS SET REC_SITUACAO = '0' WHERE REC_ID = " . $Receita->getId();

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    public function alterarReceita($Receita)
    {
        $retorno = false;

        $query = "UPDATE tb_receitas SET REC_DATA_PAGAMENTO = '" . $Receita->getDataPagamento() . "' ,REC_DESCRICAO = '" . $Receita->getDescricao() . "',
            REC_VALOR = '" . $Receita->getValor() . "',REC_ID_USU_PAGAMENTO='" . $Receita->getUsuarioResponsavelId() . "',REC_DATA_CADASTRO= '" . $Receita->getDataCadastro() . "',
            REC_SITUACAO = '" . $Receita->getSituacao() . "',CAT_REC_ID = '" . $Receita->getCategoriaId() . "'
             WHERE REC_ID = " . $Receita->getId() . "' USU_ID = '" . $Receita->getUsuarioResponsavelId();

        var_dump($query);
        die();

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




