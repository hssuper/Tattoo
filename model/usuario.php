<?php
class usuario
{

    private $idcadastro;
    private $nome;
    private $contato;
    private $email;
    private $senha;
    private $cpf;
    private $dtNasc;
    private $dtEft;


    function getIdcadastro()
    {
        return $this->idcadastro;
    }
    function setIdcadastro($idcadastro)
    {
        $this->idcadastro = $idcadastro;
    }
    function getNome()
    {
        return $this->nome;
    }
    function setNome($nome)
    {
        $this->nome = $nome;
    }

    function getContato()
    {
        return $this->contato;
    }
    function setContato($contato)
    {
        $this->contato = $contato;
    }

    function getEmail()
    {
        return $this->email;
    }
    function setEmail($email)
    {
        $this->email = $email;
    }


    function getSenha()
    {
        return $this->senha;
    }
    function setSenha($senha)
    {
        $this->senha = $senha;
    }
    function getCpf()
    {
        return $this->cpf;
    }
    function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    function getDtNasc()
    {
        return $this->dtNasc;
    }
    function setDtNasc($dtNasc)
    {
        $this->dtNasc = $dtNasc;
    }

    public function getDtEft()
    {
        return $this->dtEft;
    }

    
    public function setDtEft($dtEft)
    {
        $this->dtEft = $dtEft;

        return $this;
    }
}
