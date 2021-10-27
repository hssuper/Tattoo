<?php
include_once 'C:/xampp/htdocs/tattoo/dao/DaoUsuario.php';
include_once 'C:/xampp/htdocs/tattoo/model/usuario.php';

class cadastroFuncionarioController
{

    public function inserirCadastro($nome, $contato, $email, $senha, $cpf, $dtNasc, $dtEft)
    {

        $cadastro = new usuario();
        $cadastro->setNome($nome);
        $cadastro->setContato($contato);
        $cadastro->setEmail($email);
        $cadastro->setSenha($senha);
        $cadastro->setCpf($cpf);
        $cadastro->setDtNasc($dtNasc);
        $cadastro->setDtEft($dtEft);


        $nome = $cadastro->getNome();
        $contato = $cadastro->getContato();
        $email = $cadastro->getemail();
        $senha = $cadastro->getSenha();
        $cpf = $cadastro->getCpf();
        $dtNasc = $cadastro->getDtNasc();
        $dtEft = $cadastro->getDtEft();


        $cadastroDao = new DaoUsuario();
        return $cadastroDao->inserir($cadastro);
        /* return ("$nomeFuncionario, $contato,  $senha, $cpf, $dtNasc"); */
    }
    public function atualizarUsuarioController( $idcadastro,$nome, $contato,$email,  $senha, $cpf, $dtNasc,$dtEft){
        $usuario =  new Usuario();
        $usuario->setIdcadastro($idcadastro);
        $usuario->setNome($nome);
        $usuario->setContato($contato);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->setCpf($cpf);
        $usuario->setDtNasc($dtNasc);
        $usuario->setDtEft($dtEft);

        $daoUsuario = new DaoUsuario();
        return $daoUsuario->atualizarUsuarioDao($usuario);




   }
   public function excluirUsuario($id){
    $daoUsuario = new DaoUsuario();
    return $daoUsuario->excluirUsuarioDAO($id);
}
public function listarUsuario(){
    $daoUsuario= new DaoUsuario();
    return $daoUsuario->listarUsuarioDAO();
}
public function pesquisarId($id){
    $daoUsuario = new DaoUsuario();
    return $daoUsuario->pesquisarIdDao($id);
} 
}
