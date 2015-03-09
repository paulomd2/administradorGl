<?php

class Menu {

    private $idMenu;
    private $titulo;
    private $link;
    private $target;
    private $dataCadastro;
    private $lingua;

    function getIdMenu() {
        return $this->idMenu;
    }
    function setIdMenu($idMenu) {
        $this->idMenu = seg($idMenu);
    }
    

    function getTitulo() {
        return $this->titulo;
    }
    function setTitulo($titulo) {
        $this->titulo = seg($titulo);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }
    
    
    function getTarget(){
        return $this->target;
    }
    function setTarget($target){
        $this->target = seg($target);
    }
    
    
    function getDataCadastro(){
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro){
        $this->dataCadastro = seg($dataCadastro);
    }

    
    function getLingua(){
        return $this->lingua; 
    }
    function setLingua($lingua){
        $this->lingua = $lingua;
    }
}
$objMenu = new Menu();