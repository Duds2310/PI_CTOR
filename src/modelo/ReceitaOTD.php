<?php
namespace src\modelo;

class ReceitaOTD
{

    private $id;

    private $descricao;

    private $valor;

    private $dataCadastro;

    private $dataPagamento;

    private $usuarioResponsavelId;

    private $categoriaId;

    private $situacao;

    private $idUsuario;

    private $autor;

    private $responsavel;

    private $receitaNome;

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
    public function getDescricao()
    {
        return $this->descricao;
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
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * @return mixed
     */
    public function getDataPagamento()
    {
        return $this->dataPagamento;
    }

    /**
     * @return mixed
     */
    public function getUsuarioResponsavelId()
    {
        return $this->usuarioResponsavelId;
    }

    /**
     * @return mixed
     */
    public function getCategoriaId()
    {
        return $this->categoriaId;
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
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @return mixed
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * @return mixed
     */
    public function getResponsavel()
    {
        return $this->responsavel;
    }

    /**
     * @return mixed
     */
    public function getReceitaNome()
    {
        return $this->receitaNome;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * @param mixed $dataCadastro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;
    }

    /**
     * @param mixed $dataPagamento
     */
    public function setDataPagamento($dataPagamento)
    {
        $this->dataPagamento = $dataPagamento;
    }

    /**
     * @param mixed $usuarioResponsavelId
     */
    public function setUsuarioResponsavelId($usuarioResponsavelId)
    {
        $this->usuarioResponsavelId = $usuarioResponsavelId;
    }

    /**
     * @param mixed $categoriaId
     */
    public function setCategoriaId($categoriaId)
    {
        $this->categoriaId = $categoriaId;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    /**
     * @param mixed $autor
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }

    /**
     * @param mixed $responsavel
     */
    public function setResponsavel($responsavel)
    {
        $this->responsavel = $responsavel;
    }

    /**
     * @param mixed $receitaNome
     */
    public function setReceitaNome($receitaNome)
    {
        $this->receitaNome = $receitaNome;
    }

    public function __construct()
    {}
    
    
}

