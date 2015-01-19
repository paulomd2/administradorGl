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
        $this->idSubmenu = $idSubmenu;
    }

    function getTituloMenu() {
        return $this->tituloMenu;
    }

    function setTituloMenu($tituloMenu) {
        $this->tituloMenu = $tituloMenu;
    }

    function getTituloPagina() {
        return $this->TituloPagina;
    }

    function setTituloPagina($TituloPagina) {
        $this->TituloPagina = $TituloPagina;
    }

    function getTexto() {
        return $this->texto;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }

    function getTarget() {
        return $this->target;
    }

    function setTarget($target) {
        $this->target = $target;
    }

    function getStatus() {
        return $this->status;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function getTituloMetaTag() {
        return $this->tituloMetaTag;
    }

    function setTituloMetaTag($tituloMetaTag) {
        $this->tituloMetaTag = $tituloMetaTag;
    }

    function getKeywordMetaTag() {
        return $this->keywordMetaTag;
    }

    function setKeywordMetaTag($keywordMetaTag) {
        $this->keywordMetaTag = $keywordMetaTag;
    }

    function getDescricaoMetaTag() {
        return $this->descricaoMetaTag;
    }

    function setDescricaoMetaTag($descricaoMetaTag) {
        $this->descricaoMetaTag = $descricaoMetaTag;
    }

}

$objSubMenu = new Submenu();
