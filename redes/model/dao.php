<?php
require_once 'redes.php';

class RedesDAO extends Banco{
    public function listaRede1(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_REDES;
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    public function cadRede($objRede){
        $conexao = $this->abreConexao();
        
      echo  $sql = "INSERT INTO ".TBL_REDES." SET
                facebook = '".$objRede->getFacebook()."',
                twitter = '".$objRede->getTwitter()."',
                google = '".$objRede->getGoogle()."',
                instagram = '".$objRede->getInstagram()."',
                flickr = '".$objRede->getFlickr()."',
                youtube = '".$objRede->getYoutube()."'
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    public function altRede($objRede){
        $conexao = $this->abreConexao();
        
       echo $sql = "UPDATE ".TBL_REDES." SET
                facebook = '".$objRede->getFacebook()."',
                twitter = '".$objRede->getTwitter()."',
                google = '".$objRede->getGoogle()."',
                instagram = '".$objRede->getInstagram()."',
                flickr = '".$objRede->getFlickr()."',
                youtube = '".$objRede->getYoutube()."'
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
}

$objRedeDao = new RedesDAO();