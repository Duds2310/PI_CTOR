<?php
namespace src;

class Despesa{
    
    //atributos
    private $nome;
   
    private $valor;
    
    private $datapagamento;
    
    private $categoria;
    
    private $datavencimento;
    
    private $situacao;
    
    private $id;
    
  
    //construtor
    
    public function __construct()
    {}
    
        
    //metodos
    
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }
    
    /**
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }
    
    /**
     * @return mixed
     */
    public function getDatapagamento()
    {
        return $this->datapagamento;
    }
    
    /**
     * @return mixed
     */
    public function getCategoria()
    {
        return $this->categoria;
    }
    
    /**
     * @return mixed
     */
    public function getDatavencimento()
    {
        return $this->datavencimento;
    }
    
    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }
    
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    
    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }
    
    /**
     * @param mixed $datapagamento
     */
    public function setDatapagamento($datapagamento)
    {
        $this->datapagamento = $datapagamento;
    }
    
    /**
     * @param mixed $categoria
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    
    /**
     * @param mixed $datavencimento
     */
    public function setDatavencimento($datavencimento)
    {
        $this->datavencimento = $datavencimento;
    }
    
    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    
    
}