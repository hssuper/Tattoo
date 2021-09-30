<?php
include_once 'C:/xampp/htdocs/tattoo/dao/cadastroDao.php';
include_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';

class cadastroController
{

    public function inserirCadastro($nome, $contato, $email,  $cpf, $dtNasc)
    {
        $cadastro = new Cadastro();
        $cadastro->setNome($nome);
        $cadastro->setContato($contato);
        $cadastro->setEmail($email);
        $cadastro->setCpf($cpf);
        $cadastro->setDtNasc($dtNasc);

        $nome = $cadastro->getNome();
        $contato = $cadastro->getContato();
        $email = $cadastro->getemail();
        $cpf = $cadastro->getCpf();
        $dtNasc = $cadastro->getDtNasc();

        $cadastroDao = new DaoCadastro();
        return $cadastroDao->inserir($cadastro);
    }
}
