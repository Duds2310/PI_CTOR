<?php


namespace src;

/**
 * @author Nilo
 *
 */
class Pontuacao 
{
   // ATRIBUTOS
   
    private $end;
    private $id;
    private $round;
    private $primeiroDisparo;
    private $segundoDisparo;
    private $terceiroDisparo;
    private $quartoDisparo;
    private $quintoDisparo;
    private $sextoDisparo;
    private $endTotal; /*Pontuacao Total do End */ 
    private $roundTotal; /*Pontuacao Total do Round */ 
    private $pontuacaoTotal; /*Pontuacao Total somando os dois  Rounds*/
    private $idTreino;
    
    


    // GETTERS
  
    /**
     * @return mixed
     */
    public function getEnd()
    {
        return $this->end;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getRound()
    {
        return $this->round;
    }
    /**
     * @return mixed
     */
    public function getPrimeiroDisparo()
    {
        return $this->primeiroDisparo;
    }

    /**
     * @return mixed
     */
    public function getSegundoDisparo()
    {
        return $this->segundoDisparo;
    }

    /**
     * @return mixed
     */
    public function getTerceiroDisparo()
    {
        return $this->terceiroDisparo;
    }

    /**
     * @return mixed
     */
    public function getQuartoDisparo()
    {
        return $this->quartoDisparo;
    }

    /**
     * @return mixed
     */
    public function getQuintoDisparo()
    {
        return $this->quintoDisparo;
    }

    /**
     * @return mixed
     */
    public function getSextoDisparo()
    {
        return $this->sextoDisparo;
    }

    /**
     * @return mixed
     */
    public function getEndTotal()
    {
        return $this->endTotal;
    }

    /**
     * @return mixed
     */
    public function getRoundTotal()
    {
        return $this->roundTotal;
    }

    /**
     * @return mixed
     */
    public function getPontuacaoTotal()
    {
        return $this->pontuacaoTotal;
    }
    
    /**
     * @return mixed
     */
    public function getIdTreino() 
    {    
        return $this->idTreino;
    }
    
    /**
     * @param mixed $end
     */
    
    //SETTERS 
    
    public function setEnd($end)
    {
        $this->end = $end;

    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @param mixed $round
     */
    public function setRound($round)
    {
        $this->round = $round;
    }
    
    /**
     * @param mixed $primeiroDisparo
     */
    public function setPrimeiroDisparo($primeiroDisparo)
    {
        $this->primeiroDisparo = $primeiroDisparo;
    }

    /**
     * @param mixed $segundoDisparo
     */
    public function setSegundoDisparo($segundoDisparo)
    {
        $this->segundoDisparo = $segundoDisparo;
    }

    /**
     * @param mixed $terceiroDisparo
     */
    public function setTerceiroDisparo($terceiroDisparo)
    {
        $this->terceiroDisparo = $terceiroDisparo;
    }

    /**
     * @param mixed $quartoDisparo
     */
    public function setQuartoDisparo($quartoDisparo)
    {
        $this->quartoDisparo = $quartoDisparo;
    }

    /**
     * @param mixed $quintoDisparo
     */
    public function setQuintoDisparo($quintoDisparo)
    {
        $this->quintoDisparo = $quintoDisparo;
    }

    /**
     * @param mixed $sextoDisparo
     */
    public function setSextoDisparo($sextoDisparo)
    {
        $this->sextoDisparo = $sextoDisparo;
    }

    /**
     * @param mixed $endTotal
     */
    public function setEndTotal($endTotal)
    {
        $this->endTotal = $endTotal;
    }

    /**
     * @param mixed $roundTotal
     */
    public function setRoundTotal($roundTotal)
    {
        $this->roundTotal = $roundTotal;
    }

    /**
     * @param mixed $pontuacaoTotal
     */
    public function setPontuacaoTotal($pontuacaoTotal)
    {
        $this->pontuacaoTotal = $pontuacaoTotal;
    }
    
    /**
     * @param mixed $idTreino
     */
    public function setIdTreino($idTreino) {
        
        $this->idTreino = $idTreino;
    }             
    
    //C O N S T R U T O R 
    public function __construct() {
        
    }
    
  
    
}