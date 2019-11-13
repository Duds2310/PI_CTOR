<?php
namespace src;

class Treinamento
{

    // ATRIBUTOS
    private $descricao;

    private $id;

    private $nome;

    private $periodo;

    private $valor;

    private $IdUsuario;

    // CONSTRUTOR
    public function __construct()
    {}

    // METODOS

    /**
     *
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     *
     * @return mixed
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    /**
     *
     * @return mixed
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     *
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->IdUsuario;
    }

    /**
     *
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     *
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     *
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     *
     * @param mixed $periodo
     */
    public function setPeriodo($periodo)
    {
        $this->periodo = $periodo;
    }

    /**
     *
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     *
     * @param mixed $IdUsuario
     */
    public function setIdUsuario($IdUsuario)
    {
        $this->IdUsuario = $IdUsuario;
    }
}

