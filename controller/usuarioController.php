<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoUsuario.php';
include_once 'C:/xampp/htdocs/tattoo/model/usuario.php';

class
cadastroFuncionarioController
{

    public function inserirCadastro($nome, $contato, $email, $senha, $cpf, $dtNasc)
    {

        $cadastro = new usuario();
        $cadastro->setNome($nome);
        $cadastro->setContato($contato);
        $cadastro->setEmail($email);
        $cadastro->setSenha($senha);
        $cadastro->setCpf($cpf);
        $cadastro->setDtNasc($dtNasc);


        $nome = $cadastro->getNome();
        $contato = $cadastro->getContato();
        $email = $cadastro->getemail();
        $senha = $cadastro->getSenha();
        $cpf = $cadastro->getCpf();
        $dtNasc = $cadastro->getDtNasc();


        $cadastroDao = new DaoUsuario();
        return $cadastroDao->inserir($cadastro);
        /* return ("$nomeFuncionario, $contato,  $senha, $cpf, $dtNasc"); */
    }
}
