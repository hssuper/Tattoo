<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoFuncionario.php';
include_once 'C:/xampp/htdocs/tattoo/model/Funcionario.php';

class 
cadastroFuncionarioController{
 
    public function inserirCadastro($nomeFuncionario, $contato, $senha, $cpf, $dtNasc){
       
$cadastro = new Funcionario();
$cadastro->setNomeFuncionario($nomeFuncionario);
$cadastro->setContato($contato);
$cadastro->setSenha($senha);
$cadastro->setCpf($cpf);
$cadastro->setDtNasc($dtNasc);

$nomeFuncionario = $cadastro->getNomeFuncionario();
$contato = $cadastro->getContato();
$senha = $cadastro->getSenha();
$cpf = $cadastro->getCpf();
 $dtNasc = $cadastro->getDtNasc();
 
$cadastroDao = new DaoFuncionario();
return $cadastroDao->inserir($cadastro);
/* return ("$nomeFuncionario, $contato,  $senha, $cpf, $dtNasc"); */





    }
}