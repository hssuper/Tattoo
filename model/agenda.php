<?php

class agenda{
   private  $idagendamento;
   private $desconto;
   private $dataAgendamento;
   private $horaAgandamento;
   private $statusAgendamento;
   private $fkcliente;
   private $fkorcamento;

   
   public function getIdagendamento()
   {
      return $this->idagendamento;
   }

   
   public function setIdagendamento($idagendamento)
   {
      $this->idagendamento = $idagendamento;

      return $this;
   }

  
   public function getDesconto()
   {
      return $this->desconto;
   }

   
   public function setDesconto($desconto)
   {
      $this->desconto = $desconto;

      return $this;
   }

    
   public function getDataAgendamento()
   {
      return $this->dataAgendamento;
   }

  
   public function setDataAgendamento($dataAgendamento)
   {
      $this->dataAgendamento = $dataAgendamento;

      return $this;
   }

    
   public function getHoraAgandamento()
   {
      return $this->horaAgandamento;
   }

    
   public function setHoraAgandamento($horaAgandamento)
   {
      $this->horaAgandamento = $horaAgandamento;

      return $this;
   }

    
   public function getStatusAgendamento()
   {
      return $this->statusAgendamento;
   }

    
   public function setStatusAgendamento($statusAgendamento)
   {
      $this->statusAgendamento = $statusAgendamento;

      return $this;
   }

   
   public function getFkcliente()
   {
      return $this->fkcliente;
   }

   
   public function setFkcliente($fkcliente)
   {
      $this->fkcliente = $fkcliente;

      return $this;
   }

  
   public function getFkorcamento()
   {
      return $this->fkorcamento;
   }

   
   public function setFkorcamento($fkorcamento)
   {
      $this->fkorcamento = $fkorcamento;

      return $this;
   }
}