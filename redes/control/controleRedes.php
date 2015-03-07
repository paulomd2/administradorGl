<?php
require_once '../../model/banco.php';
require_once '../../model/log.php';
require_once '../model/dao.php';


$facebook = $_POST['facebook'];
$twitter = $_POST['twitter'];
$google = $_POST['google'];
$instagram = $_POST['instagram'];
$flickr = $_POST['flickr'];
$youtube = $_POST['youtube'];
$opcao = $_POST['opcao'];

$objRede->setFacebook($facebook);
$objRede->setTwitter($twitter);
$objRede->setGoogle($google);
$objRede->setInstagram($instagram);
$objRede->setFlickr($flickr);
$objRede->setYoutube($youtube);

if($opcao == 'cadastrar'){
    $objRedeDao->cadRede($objRede);
    $objLogDao->cadLog($_SESSION['id'], 'CADASTROU', 'REDES', 0, date('Y-m-d H:i:s'));
}else{
    $objRedeDao->altRede($objRede);
    $objLogDao->cadLog($_SESSION['id'], 'ALTEROU', 'REDES', 0, date('Y-m-d H:i:s'));
}