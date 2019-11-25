<?php
namespace src;

require_once 'src/ConexaoMySQL.php';
require_once 'src/modelo/Pontuacao.php';

class RepositorioPontuacao
{

    private $ConexaoMySQL;

    private $Pontuacao;

    public function __construct()
    {
        $this->ConexaoMySQL = new ConexaoMySQL();
        $this->Pontuacao = new Pontuacao();
    }

    public function cadastrarPontuacao($Pontuacao)
    {
        $retorno = FALSE;

        $query = "INSERT INTO TB_PONTUACAO(PON_PONTUACAO, PON_END, PON_PRIMEIRO_DISPARO,PON_SEGUNDO_DISPARO, PON_TERCEIRO_DISPARO,PON_QUARTO_DISPARO, PON_QUINTO_DISPARO, PON_SEXTO_DISPARO, PON_ROUND, TRE_ID)
                    VALUES ('" . $Pontuacao->getEndTotal() . "', '" . $Pontuacao->getEnd() . "', '" . $Pontuacao->getPrimeiroDisparo() . "',  '" . $Pontuacao->getSegundoDisparo() . "',
         '" . $Pontuacao->getTerceiroDisparo() . "',  '" . $Pontuacao->getQuartoDisparo() . "',  '" . $Pontuacao->getQuintoDisparo() . "' , '" . $Pontuacao->getSextoDisparo() . "',
         '" . $Pontuacao->getRound() . "', '" . $Pontuacao->getIdTreino() . "')";

        $conexao = $this->ConexaoMySQL->abrirBanco();

        if ($conexao->query($query) == true) {
            $retorno = true;
        } else {
            die(mysqli_error($conexao));
            $retorno = false;
        }
        return $retorno;
    }

    public function consultarPontuacaoPorId($Id)
    {
        $Pontuacao = null;

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $query = "SELECT * FROM TB_PONTUACAO WHERE PON_ID = $Id";

        $resultado = $conexao->query($query);

        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $Pontuacao = new Pontuacao();

            $Pontuacao->setId($linha["PON_ID"]);
            $Pontuacao->setRound($linha["PON_ROUND"]);
            $Pontuacao->setEnd($linha["PON_END"]);
            $Pontuacao->setPrimeiroDisparo($linha["PON_PRIMEIRO_DISPARO"]);
            $Pontuacao->setSegudoDisparo($linha["PON_SEGUNDO_DISPARO"]);
            $Pontuacao->setTerceiroDisparo($linha["PON_TERCEIRO_DISPARO"]);
            $Pontuacao->setQuartoDisparo($linha["PON_QUARTO_DISPARO"]);
            $Pontuacao->setQuintoDisparo($linha["PON_QUINTO_DISPARO"]);
            $Pontuacao->setSextoDisparo($linha["PON_SEXTO_DISPARO"]);
        }
    }

    public function consultarPontuacaoPorTreino($IdTreino)
    {
        $ListaPontuacaoTreino = null;

        $conexao = $this->ConexaoMySQL->abrirBanco();

        $query = "SELECT * FROM TB_PONTUACAO WHERE TRE_ID = $IdTreino";


        $resultado = $conexao->query($query);

        $i= 0;
        if ($resultado->num_rows > 0) {
            while ($linha = $resultado->fetch_assoc()) {
                $Pontuacao = new Pontuacao();

                $Pontuacao->setId($linha["PON_ID"]);
                $Pontuacao->setRound($linha["PON_ROUND"]);
                $Pontuacao->setEnd($linha["PON_END"]);
                $Pontuacao->setPrimeiroDisparo($linha["PON_PRIMEIRO_DISPARO"]);
                $Pontuacao->setSegundoDisparo($linha["PON_SEGUNDO_DISPARO"]);
                $Pontuacao->setTerceiroDisparo($linha["PON_TERCEIRO_DISPARO"]);
                $Pontuacao->setQuartoDisparo($linha["PON_QUARTO_DISPARO"]);
                $Pontuacao->setQuintoDisparo($linha["PON_QUINTO_DISPARO"]);
                $Pontuacao->setSextoDisparo($linha["PON_SEXTO_DISPARO"]);
                $Pontuacao->setIdTreino($linha["TRE_ID"]);
                $Pontuacao->setEndTotal($linha["PON_PONTUACAO"]);
                
                $ListaPontuacaoTreino[$i] = $Pontuacao;
                $i++;
            }
        }else{
            $ListaPontuacaoTreino = false;
        }

        return $ListaPontuacaoTreino;
    }
    
    
    
    public function consultarRoundEndAtual($Id)
    {
        $Pontuacao = null;
        
        $conexao = $this->ConexaoMySQL->abrirBanco();
        
        $query = "select PON_ID, max(PON_ROUND) as PON_ROUND, max(PON_END) as PON_END from tb_pontuacao WHERE TRE_ID = $Id";
        
        $resultado = $conexao->query($query);
        
        if ($resultado->num_rows > 0) {
            $linha = $resultado->fetch_assoc();
            $Pontuacao = new Pontuacao();
            
            $Pontuacao->setId($linha["PON_ID"]);
            $Pontuacao->setRound($linha["PON_ROUND"]);
            $Pontuacao->setEnd($linha["PON_END"]);
            
            $resultado = $Pontuacao;
        }else{
            $Pontuacao = new Pontuacao();
            
            $Pontuacao->setId($Id);
            $Pontuacao->setRound(1);
            $Pontuacao->setEnd(0);
            
            $resultado = $Pontuacao;
        }
        
        return $resultado;
    }
    
    
    
    
}