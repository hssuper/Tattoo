<?php
 
 class agendamento{
private $idimagem;
private $email;
private $tell;
private $informacao;
private $imagem;
private $fkUsuario;


 
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






public function getFkUsuario()
{
return $this->fkUsuario;
}


public function setFkUsuario($fkUsuario)
{
$this->fkUsuario = $fkUsuario;

return $this;
}


public function getIdimagem()
{
return $this->idimagem;
}


public function setIdimagem($idimagem)
{
$this->idimagem = $idimagem;

return $this;
}


public function getTell()
{
return $this->tell;
}


public function setTell($tell)
{
$this->tell = $tell;

return $this;
}
}