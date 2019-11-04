<?php
namespace src;

use mysqli;

class ConexaoMySQL
{

    // ATRIBUTOS
    private $banco = "cursosfinanceiros";

    private $user = "root";

    private $senha = "";

    private $server = "localhost";

    private $conexao = null;

    // CONSTRUTOR
    public function __construct()
    {}

    // METODOS
    public function abrirBanco()
    {
        $this->conexao = new mysqli($this->server, $this->user, $this->senha, $this->banco);

        $this->conexao->set_charset("UTF-8");

        if (mysqli_connect_errno()) {
            die(mysqli_errno($this->conexao));
        }

        return $this->conexao;
    }

    public function fecharBanco()
    {
        $this->conexao->close();
    }
}