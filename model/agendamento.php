<?php
 
 class agendamento{

private $email;
private $informacao;
private $imagem;
private $usuario;


 
public function getInformacao()
{
return $this->informacao;
}


public function setInformacao($informacao)
{
$this->informacao = $informacao;

return $this;
}





public function getEmail()
{
return $this->email;
}


public function setEmail($email)
{
$this->email = $email;

return $this;
}

 
public function getImagem()
{
return $this->imagem;
}


public function setImagem($imagem)
{
$this->imagem = $imagem;

return $this;
}




public function getUsuario()
{
return $this->usuario;
}

public function setUsuario($usuario)
{
$this->usuario = $usuario;

return $this;
}
}