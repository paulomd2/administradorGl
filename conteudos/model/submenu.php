<?php

class Submenu {

    private $idMenu;
    private $idSubmenu;
    private $tituloMenu;
    private $TituloPagina;
    private $texto;
    private $link;
    private $target;
    private $status;
    private $tituloMetaTag;
    private $keywordMetaTag;
    private $descricaoMetaTag;
    private $dataEntrada;
    private $dataSaida;
    private $dataCadastro;

    function getIdMenu() {
        return $this->idMenu;
    }
    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }
    

    function getIdSubmenu() {
        return $this->idSubmenu;
    }
    function setIdSubmenu($idSubmenu) {
        $this->idSubmenu = seg($idSubmenu);
    }
    

    function getTituloMenu() {
        return $this->tituloMenu;
    }
    function setTituloMenu($tituloMenu) {
        $this->tituloMenu = seg($tituloMenu);
    }
    

    function getTituloPagina() {
        return $this->TituloPagina;
    }
    function setTituloPagina($TituloPagina) {
        $this->TituloPagina = seg($TituloPagina);
    }

    
    function getTexto() {
        return $this->texto;
    }
    function setTexto($texto) {
        $this->texto = seg($texto);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }
    

    function getTarget() {
        return $this->target;
    }
    function setTarget($target) {
        $this->target = seg($target);
    }

    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }

    
    function getTituloMetaTag() {
        return $this->tituloMetaTag;
    }
    function setTituloMetaTag($tituloMetaTag) {
        $this->tituloMetaTag = seg($tituloMetaTag);
    }
    

    function getKeywordMetaTag() {
        return $this->keywordMetaTag;
    }
    function setKeywordMetaTag($keywordMetaTag) {
        $this->keywordMetaTag = seg($keywordMetaTag);
    }

    
    function getDescricaoMetaTag() {
        return $this->descricaoMetaTag;
    }
    function setDescricaoMetaTag($descricaoMetaTag) {
        $this->descricaoMetaTag = seg($descricaoMetaTag);
    }
    
    
    function getDataEntrada() {
        return $this->dataEntrada;
    }
    function setDataEntrada($dataEntrada) {
        $this->dataEntrada = seg($dataEntrada);
    }
    
    
    function getDataSaida() {
        return $this->dataSaida;
    }
    function setDataSaida($dataSaida) {
        $this->dataSaida = seg($dataSaida);
    }
    
    
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = seg($dataCadastro);
    }

}

$objSubMenu = new Submenu();
