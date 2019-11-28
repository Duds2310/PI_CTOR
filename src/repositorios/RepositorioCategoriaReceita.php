<?php
namespace src\repositorios;

use src\ConexaoMySQL;
use src\modelo\CategoriaReceita;
require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/CategoriaReceita.php';

class RepositorioCategoriaReceita
{

    private $CategoriaReceita;

    private $ConexaoMySQL;

    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->CategoriaReceita = new CategoriaReceita();
    }

    public function cadastrarCategoriaReceita($CategoriaReceita)
    {
        $retorno = false;

        $query = " INSERT INTO tb_categoria_receitas (CAT_REC_NOME,CAT_REC_DESCRICAO) values ('" . $CategoriaReceita->getNome() . "', '" . $CategoriaReceita->getDescricao() . "'); ";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();
        return $retorno;
    }

    public function listarCategoriaReceita()
    {
        $CategoriaReceita = null;

        $query = "SELECT * FROM TB_CATEGORIA_RECEITAS";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $resultado = $conexao->query($query);

        $i = 0;

        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $CategoriaReceita = new CategoriaReceita();

                $CategoriaReceita->setId($linha["CAT_REC_ID"]);
                $CategoriaReceita->setNome($linha["CAT_REC_NOME"]);
                $CategoriaReceita->setDescricao($linha["CAT_REC_DESCRICAO"]);

                $CategoriasReceita[$i] = $CategoriaReceita;
                $i ++;
            }
        } else {
            $CategoriasReceita = false;
        }

        $this->ConexaoMySQL->fecharBanco();
        return $CategoriasReceita;
    }

    public function consultarCategoriaReceitaId($id)
    {
        $categoria = null;

        $query = " SELECT * FROM TB_CATEGORIA_RECEITAS WHERE CAT_REC_ID = " . $id;
        
        //echo $query;
        //die();
        

        $conexao = $this->ConexaoMySQL->abrirBanco();
        $resultado = $conexao->query($query);

        if ($resultado->num_rows > 0) {

            $linha = $resultado->fetch_assoc();
            $categoria = new CategoriaReceita();

            $categoria->setId($linha["CAT_REC_ID"]);
            $categoria->setNome($linha["CAT_REC_NOME"]);
            $categoria->setDescricao($linha["CAT_REC_DESCRICAO"]);
        }

        $this->ConexaoMySQL->fecharBanco();
        return $categoria;
    }
}








