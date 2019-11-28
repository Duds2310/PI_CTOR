<?php
namespace src;

class Usuario
{

    private $nome;
    
    private $rg;
    
    private $cep;
    
    private $cpf;
    
    private $uf;
    
    private $cidade;
    
    private $logradouro;
    
    private $telefone;
    
    private $login;
    
    private $email;
    
    private $senha;
    
    private $id;
    
    private $categoriaid;
    
    /**
     * @return mixed
     */
    public function getCategoriaid()
    {
        return $this->categoriaid;
    }

    /**
     * @param mixed $categoriaid
     */
    public function setCategoriaid($categoriaid)
    {
        $this->categoriaid = $categoriaid;
    }

    public function __construct(){
        
    }
    
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
    public function getRg()
    {
        return $this->rg;
    }
    
    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }
    
    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }
    
    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }
    
    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }
    
    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }
    
    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }
    
    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }
    
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
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
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }
    
    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    
    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    
    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }
    
    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }
    
    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }
    
    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }
    
    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }
    
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }
    
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    
}