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
    private $lingua;

    public function getIdRelease() {
        return $this->idRelease;
    }
    public function setIdRelease($idRelease) {
        $this->idRelease = seg($idRelease);
    }
    

    public function getTitulo() {
        return $this->titulo;
    }
    public function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }
    

    public function getMes() {
        return $this->mes;
    }
    public function setMes($mes) {
        $this->mes = seg($mes);
    }
    

    public function getStatus() {
        return $this->status;
    }
    public function setStatus($status) {
        $this->status = seg($status);
    }
    

    public function getTexto() {
        return $this->texto;
    }
    public function setTexto($texto) {
        $this->texto = seg($texto);
    }
    

    public function getDataCadastro() {
        return $this->dataCadastro;
    }
    public function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }
    
    
    public function getDataEntrada(){
        return $this->dataEntrada;
    }    
    public function setDataEntrada($dataEntrada){
        $this->dataEntrada = seg($dataEntrada);
    }
    
    
    public function getDataSaida(){
        return $this->dataSaida;
    }
    public function setDataSaida($dataSaida){
        $this->dataSaida = seg($dataSaida);
    }
    
    
    public function getLingua(){
        return $this->lingua;
    }
    public function setLingua($lingua){
        $this->lingua = $lingua;
    }
}

$objRelease = new Release();
