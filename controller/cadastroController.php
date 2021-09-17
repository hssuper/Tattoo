<?php
include_once 'C:/xampp/htdocs/tattoo/dao/cadastroDao.php';
include_once 'C:/xampp/htdocs/tattoo/model/cadastro.php';

class cadastroController{
 
    public function inserirCadastro($nome, $contato, $email, $senha, $cpf, $dtNasc){
$cadastro = new Cadastro();
$cadastro->setNome($nome);
$cadastro->setContato($contato);
$cadastro->setEmail($email);
$cadastro->setSenha($senha);
$cadastro->setCpf($cpf);
$cadastro->setDtNasc($dtNasc);

$cadastroDao = new DaoCadastro();
return $cadastroDao->inserir($cadastro);





    }
}