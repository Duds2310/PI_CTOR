<?php
namespace src\repositorios;

use src\ConexaoMySQL;
use src\modelo\Provas;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Provas.php';

class RepositorioProvas
{

    private $Provas;

    private $ConexaoMySQL;

    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->Provas = new Provas();

    }

    public function listarProvas()
    {
        $Provas = null; // vari�vel reponsavel por armazezar a lista de provas

        $query = "SELECT * FROM TB_PROVAS"; // variavel reponsavel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco();


        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                

                $Prova = new Provas();

                $Prova->setId($linha['PRO_ID']);
                $Prova->setNome($linha['PRO_NOME']);
                $Prova->setTipo($linha['PRO_TIPO']);
                $Prova->setUf($linha['PRO_UF']);
                $Prova->setFederacao($linha['PRO_FEDERACAO']);
                $Prova->setDataInicio($linha['PRO_DATA_INICIO']);
                $Prova->setDataFim($linha['PRO_DATA_FIM']);

                $Provas[$i] = $Prova;
                $i ++;
            }
        } else {
            $Provas = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Provas;
    }

    public function consultarProvasPorID($Id)
    {
        $Provas = null; // vari�vel reponsavel por armazezar a lista de provas

        $query = "SELECT * FROM TB_PROVAS WHERE PRO_ID = $Id"; // variavel reponsavel por armazenar a query do banco

        $conexao = $this->ConexaoMySQL->abrirBanco(); // abre o link de conexao

        $resultado = $conexao->query($query); // responsavel por executar a query no banco de dados

        $i = 0;
        // verificar se retornou valor
        if ($resultado->num_rows > 0) {

            while ($linha = $resultado->fetch_assoc()) {
                $Prova = new Provas();

                $Prova->setId($linha['PRO_ID']);
                $Prova->setNome($linha['PRO_NOME']);
                $Prova->setTipo($linha['PRO_TIPO']);
                $Prova->setUf($linha['PRO_UF']);
                $Prova->setFederacao($linha['PRO_FEDERACAO']);
                $Prova->setDataInicio($linha['PRO_DATA_INICIO']);
                $Prova->setDataFim($linha['PRO_DATA_FIM']);

                $Provas[$i] = $Prova;
                $i ++;
            }
        } else {
            $Provas = false;
        }

        $this->ConexaoMySQL->fecharBanco();

        return $Provas;
    }

    public function cadastarProvas($Provas)
    {
        $retorno = true;

        $query = "INSERT INTO TB_PROVAS(PRO_NOME, PRO_TIPO, PRO_UF, PRO_FEDERACAO, PRO_DATA_INICIO, PRO_DATA_FIM)VALUES
	           ('" . $Provas->getNome() . "', '" . $Provas->getTipo() . "', '" . $Provas->getUf() . "',
                     '" . $Provas->getFederacao() . "','" . $Provas->getDataInicio() . "', '" . $Provas->getDataFim() . "')";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    public function alterarProvas($Provas)
    {
        $retorno = true;

        $query = "UPDATE TB_PROVAS SET PRO_NOME = '" . $Provas->getNome() . "', PRO_TIPO = '" . $Provas->getTipo() . "',
                     PRO_UF = '" . $Provas->getUf() . "', PRO_FEDERACAO = '" . $Provas->getFederacao() . "', PRO_DATA_INICIO = '" . $Provas->getDataInicio() . "', PRO_DATA_FIM = '" . $Provas->getDataFim() . "'
                        WHERE PRO_ID = " . $Provas->getId();

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }

    public function deletarProvas($Provas)
    {
        $retorno = true;

        $query = "DELETE FROM TB_PROVAS WHERE PRO_ID = " . $Provas->getId();

        // die($query);
        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) === true) {
            $retorno = true;
        } else {
            echo mysqli_error($conexao);
        }

        $conexao = $this->ConexaoMySQL->fecharBanco();

        return $retorno;
    }
}