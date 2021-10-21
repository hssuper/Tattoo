<?php
class caixa
{
    private $idPagamento;
    private $NrPar;
    private $dtPag;
    private $frPag;


    public function getNrPar()
    {
        return $this->NrPar;
    }


    public function setNrPar($NrPar)
    {
        $this->NrPar = $NrPar;

        return $this;
    }


    public function getDtPag()
    {
        return $this->dtPag;
    }


    public function setDtPag($dtPag)
    {
        $this->dtPag = $dtPag;

        return $this;
    }


    public function getFrPag()
    {
        return $this->frPag;
    }


    public function setFrPag($frPag)
    {
        $this->frPag = $frPag;

        return $this;
    }

    
    public function getIdPagamento()
    {
        return $this->idPagamento;
    }

    
    public function setIdPagamento($idPagamento)
    {
        $this->idPagamento = $idPagamento;

        return $this;
    }
}
