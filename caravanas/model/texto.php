<?php

class Texto{
    private $idTexto;
    private $texto;
    
    
    public function getIdTexto(){
        return $this->idTexto;
    }
    public function setIdTexto($idTexto){
        $this->idTexto = $idTexto;
    }
    
    
    public function getTexto(){
        return $this->texto;
    }
    public function setTexto($texto){
        $this->texto = $texto;
    }
}

$objTexto = new Texto();