<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoFuncionario.php';
include_once 'C:/xampp/htdocs/tattoo/model/Funcionario.php';

class 
cadastroFuncionarioController{
 
    public function inserirCadastro($nome, $contato,$email, $senha, $cpf, $dtNasc,$perfil){
       
$cadastro = new Funcionario();
$cadastro->setNome($nome);
$cadastro->setContato($contato);
$cadastro->setEmail($email);
$cadastro->setSenha($senha);
$cadastro->setCpf($cpf);
$cadastro->setDtNasc($dtNasc);
$cadastro->setPerfil($perfil);

$nome = $cadastro->getNome();
$contato = $cadastro->getContato();
$email = $cadastro->getemail();
$senha = $cadastro->getSenha();
$cpf = $cadastro->getCpf();
 $dtNasc = $cadastro->getDtNasc();
 $perfil = $cadastro->getPerfil();
 
$cadastroDao = new DaoFuncionario();
return $cadastroDao->inserir($cadastro);
/* return ("$nomeFuncionario, $contato,  $senha, $cpf, $dtNasc"); */





    }
}