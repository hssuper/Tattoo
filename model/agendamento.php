<?php
 
 class agendamento{

private $email;
private $informacao;
private $img;



 
public function getInformacao()
{
return $this->informacao;
}


public function setInformacao($informacao)
{
$this->informacao = $informacao;

return $this;
}


public function getImg()
{
return $this->img;
}


public function setImg($img)
{
$this->img = $img;

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
}