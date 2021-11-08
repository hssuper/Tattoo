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
    public function atualizarClienteController( $idcadastro, $nome, $contato, $email,  $cpf, $dtNasc){
        $cadastro =  new Cadastro();
        $cadastro->setIdcadastro($idcadastro);
        $cadastro->setNome($nome);
        $cadastro->setContato($contato);
        $cadastro->setEmail($email);
        $cadastro->setCpf($cpf);
        $cadastro->setDtNasc($dtNasc);

        $daoCadastro = new DaoCadastro();
        return $daoCadastro->atualizarClienteDao($cadastro);
   }
   public function excluirCliente($id){
    $daoCadastro = new DaoCadastro();
    return $daoCadastro->excluirClienteDAO($id);
   }
   public function listarCliente(){
    $daoCadastro= new DaoCadastro();
    return $daoCadastro->listarClienteDAO();
   }
   public function pesquisarIdCliente($id){
    $daoUsuario = new DaoCadastro();
    return $daoUsuario->pesquisarIdDao($id);
   } 

}




