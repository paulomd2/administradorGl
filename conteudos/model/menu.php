<?php

class Menu {

    private $idMenu;
    private $titulo;
    private $link;

    function getIdMenu() {
        return $this->idMenu;
    }

    function setIdMenu($idMenu) {
        $this->idMenu = $idMenu;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function getLink() {
        return $this->link;
    }

    function setLink($link) {
        $this->link = $link;
    }

}
$objMenu = new Menu();