<?php
class Orcamento{
private $idorcamento;
private $orcamento;
private $data;
private $hora;
private $fkusuario;
private $fkImagem;








public function getIdorcamento()
{
return $this->idorcamento;
}


public function setIdorcamento($idorcamento)
{
$this->idorcamento = $idorcamento;

return $this;
}


public function getOrcamento()
{
return $this->orcamento;
}


public function setOrcamento($orcamento)
{
$this->orcamento = $orcamento;

return $this;
}


public function getData()
{
return $this->data;
}


public function setData($data)
{
$this->data = $data;

return $this;
}

public function getHora()
{
return $this->hora;
}


public function setHora($hora)
{
$this->hora = $hora;

return $this;
}


public function getFkusuario()
{
return $this->fkusuario;
}


public function setFkusuario($fkusuario)
{
$this->fkusuario = $fkusuario;

return $this;
}


public function getFkImagem()
{
return $this->fkImagem;
}


public function setFkImagem($fkImagem)
{
$this->fkImagem = $fkImagem;

return $this;
}
}