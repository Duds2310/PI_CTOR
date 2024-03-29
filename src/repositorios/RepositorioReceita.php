<?php
namespace src\repositorios;

use src\ConexaoMySQL;
use src\modelo\Receita;
use src\Usuario;
use src\modelo\ReceitaOTD;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Receita.php';
require_once 'src/modelo/ReceitaOTD.php';


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
                        '" . $Receita->getDataCadastro() . "'," . $Receita->getCategoriaId() . ", 1 , '" . $Receita->getIdUsuario() . "'   )";

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

    public function listarReceitasAtivas()
    {
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

    public function consultarReceitaId($idReceita)
    {
        $Receita = null;

        $query = "SELECT * FROM TB_RECEITAS WHERE REC_ID = $idReceita";

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

        $query = "UPDATE tb_receitas SET REC_DESCRICAO = '" . $Receita->getDescricao() . "', REC_VALOR = " . $Receita->getValor() . ", REC_DATA_CADASTRO= '" . $Receita->getDataCadastro() . "',
						REC_DATA_PAGAMENTO = '" . $Receita->getDataPagamento() . "' , REC_ID_USU_PAGAMENTO = " . $Receita->getUsuarioResponsavelId() . ", CAT_REC_ID = " . $Receita->getCategoriaId() . ",
                         REC_SITUACAO = 1 WHERE REC_ID = " . $Receita->getId();

        //var_dump($query);
       // die();

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {

            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    public function listarReceitaTela()
    {
        $ReceitaOTD = null;

        $query = " SELECT tb_receitas.*, autor.USU_NOME as col_autor, responsavel.USU_NOME as col_responsavel, tb_categoria_receitas.CAT_REC_NOME 
                FROM tb_receitas INNER JOIN tb_usuario as autor ON tb_receitas.USU_ID = autor.USU_ID INNER JOIN tb_usuario as responsavel 
                ON tb_receitas.REC_ID_USU_PAGAMENTO = responsavel.USU_ID INNER JOIN tb_categoria_receitas ON tb_receitas.CAT_REC_ID = tb_categoria_receitas.CAT_REC_ID 
                WHERE tb_receitas.REC_SITUACAO = 1 ";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $resultado = $conexao->query($query);

        $i = 0;
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $ReceitaOTD = new ReceitaOTD();

                $ReceitaOTD->setId($linha["REC_ID"]);
                $ReceitaOTD->setCategoriaId($linha["CAT_REC_ID"]);
                $ReceitaOTD->setDataCadastro($linha["REC_DATA_CADASTRO"]);
                $ReceitaOTD->setDataPagamento($linha["REC_DATA_PAGAMENTO"]);
                $ReceitaOTD->setDescricao($linha["REC_DESCRICAO"]);
                $ReceitaOTD->setUsuarioResponsavelId($linha["REC_ID_USU_PAGAMENTO"]);
                $ReceitaOTD->setValor($linha["REC_VALOR"]);
                $ReceitaOTD->setSituacao($linha["REC_SITUACAO"]);
                $ReceitaOTD->setIdUsuario($linha["USU_ID"]);
                $ReceitaOTD->setAutor($linha["col_autor"]);
                $ReceitaOTD->setResponsavel($linha["col_responsavel"]);
                $ReceitaOTD->setReceitaNome($linha["CAT_REC_NOME"]);

                $ReceitasOTD[$i] = $ReceitaOTD;
                $i ++;
            }
        } else {
            $ReceitasOTD = false;
        }
        $this->ConexaoMySQL->fecharBanco();
        return $ReceitasOTD;
    }
    
    
    public function listarMensalidade()
    {
        $Receitas = null;
        
        $query = "select * from tb_receitas";
        
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
    

    public function somarReceita()
    {
        $retornoReceita = null; // vari�vel respons�vel por armazenar as despesas
        
        $query = "SELECT SUM(REC_VALOR) as REC_VALOR FROM TB_RECEITAS"; // vari�vel respons�vel por armazenar a query do banco
        
        $conexao = $this->ConexaoMySQL->abrirBanco(); // vari�vel respons�vel por abrir o link de conexao
        
        $resultado = $conexao->query($query); // respons�vel por executar a query no banco de dados
        
       
        // verificar se retornou o valor
        
        if ($resultado->num_rows > 0) {
            
            $linha = $resultado->fetch_assoc();
            $Receita = new Receita();
            
            $Receita->setValor($linha['REC_VALOR']);
            
            $retornoReceita = $Receita;
            
            
        } else {
            $retornoReceita = false;
        }
        $this->ConexaoMySQL->fecharBanco();
        
        return $retornoReceita;
    }
    
    
    
    
    
    
    public function listarMensalidadePorIdUsuario($idUsuarioLogado)
    {
        $Receitas = null;
        
        $query = "select * from tb_receitas where REC_ID_USU_PAGAMENTO = $idUsuarioLogado";
        
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


}




