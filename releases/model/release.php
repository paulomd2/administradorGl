<?php

class Release {

    private $idRelease;
    private $titulo;
    private $mes;
    private $texto;
    private $dataCadastro;
    private $status;
    private $dataEntrada;
    private $dataSaida;

    public function getIdRelease() {
        return $this->idRelease;
    }

    public function setIdRelease($idRelease) {
        $this->idRelease = $idRelease;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getMes() {
        return $this->mes;
    }

    public function setMes($mes) {
        $this->mes = $mes;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getTexto() {
        return $this->texto;
    }

    public function setTexto($texto) {
        $this->texto = $texto;
    }

    public function getDataCadastro() {
        return $this->dataCadastro;
    }

    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }
    
    
    public function getDataEntrada(){
        return $this->dataEntrada;
    }
    
    public function setDataEntrada($dataEntrada){
        $this->dataEntrada = $dataEntrada;
    }
    
    
    public function getDataSaida(){
        return $this->dataSaida;
    }
    
    public function setDataSaida($dataSaida){
        $this->dataSaida = $dataSaida;
    }
}

$objRelease = new Release();
