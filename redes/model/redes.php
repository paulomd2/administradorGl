<?php

class Redes {

    private $idRedes;
    private $facebook;
    private $twitter;
    private $google;
    private $instagram;
    private $flickr;
    private $youtube;

    function getIdRedes() {
        return $this->idRedes;
    }
    function setIdRedes($idRedes) {
        $this->idRedes = seg($idRedes);
    }

    
    function getFacebook() {
        return $this->facebook;
    }
    function setFacebook($facebook) {
        $this->facebook = seg($facebook);
    }

    
    function getTwitter() {
        return $this->twitter;
    }
    function setTwitter($twitter) {
        $this->twitter = seg($twitter);
    }

    
    function getGoogle() {
        return $this->google;
    }
    function setGoogle($gPlus) {
        $this->google = seg($gPlus);
    }

    
    function getInstagram() {
        return $this->instagram;
    }
    function setInstagram($intagram) {
        $this->instagram = seg($intagram);
    }

    
    function getFlickr() {
        return $this->flickr;
    }
    function setFlickr($flickr) {
        $this->flickr = seg($flickr);
    }

    
    function getYoutube() {
        return $this->youtube;
    }
    function setYoutube($youtube) {
        $this->youtube = seg($youtube);
    }

}

$objRede = new Redes();
?>