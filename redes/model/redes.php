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
        $this->idRedes = $idRedes;
    }

    function getFacebook() {
        return $this->facebook;
    }

    function setFacebook($facebook) {
        $this->facebook = $facebook;
    }

    function getTwitter() {
        return $this->twitter;
    }

    function setTwitter($twitter) {
        $this->twitter = $twitter;
    }

    function getGoogle() {
        return $this->google;
    }

    function setGoogle($gPlus) {
        $this->google = $gPlus;
    }

    function getInstagram() {
        return $this->instagram;
    }

    function setInstagram($intagram) {
        $this->instagram = $intagram;
    }

    function getFlickr() {
        return $this->flickr;
    }

    function setFlickr($flickr) {
        $this->flickr = $flickr;
    }

    function getYoutube() {
        return $this->youtube;
    }

    function setYoutube($youtube) {
        $this->youtube = $youtube;
    }

}

$objRede = new Redes();
?>