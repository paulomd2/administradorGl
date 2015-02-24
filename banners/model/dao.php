<?php

require_once 'banner.php';

class BannersDAO extends Banco {

    public function cadBanner($objBanner) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_BANNER . ' SET
                    nome = "' . $objBanner->getNome() . '", 
                    imagem = "' . $objBanner->getImagem() . '", 
                    dataPublicacao = "' . $objBanner->getDataPublicacao() . '", 
                    link = "' . $objBanner->getLink() . '", 
                    target = "' . $objBanner->getTarget() . '", 
                    ordem = ' . $objBanner->getOrdem() . ', 
                    status = "' . $objBanner->getStatus() . '", 
                    dataSaida = "' . $objBanner->getDataSaida() . '",
                    horaSaida = "' . $objBanner->getDataSaida() . '",
                    horaPublicacao = "' . $objBanner->getHoraPublicacao() . '"';

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altBanner($objBanner) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TBL_BANNER . ' SET
                    nome = "' . $objBanner->getNome() . '", 
                    imagem = "' . $objBanner->getImagem() . '", 
                    dataPublicacao = "' . $objBanner->getDataPublicacao() . '", 
                    link = "' . $objBanner->getLink() . '", 
                    target = "' . $objBanner->getTarget() . '", 
                    ordem = ' . $objBanner->getOrdem() . ', 
                    status = "' . $objBanner->getStatus() . '", 
                    dataSaida = "' . $objBanner->getDataSaida() . '",
                    horaSaida = "' . $objBanner->getHoraSaida() . '",
                    horaPublicacao = "' . $objBanner->getHoraPublicacao() . '"
                    WHERE idBanner = ' . $objBanner->getIdBanner();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delBanners(banners $objBanner) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE FROM ' . TBL_BANNER . ' SET status = 0 WHERE idBanner = "' . $objBanner->getIdBanner() . '"';
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaBanners1($objBanner) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT * FROM' . TBL_BANNER . 'WHERE idBanner = "' . $objBanner->getIdBanner() . '"';
        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function listaBanners($count) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT * FROM' . TBL_BANNER . 'WHERE status != 0 ORDER BY ordem LIMIT ' . $count;
        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_array()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }
    
    
    public function OdernaBanner($listingCounter, $recordIDValue){
        $conexao = $this->abreConexao();
        
        $query = "
                    UPDATE ".TBL_BANNER."
                    SET ordem = " . $listingCounter . "
                    WHERE idBanner = " . $recordIDValue;
        
        
        $conexao->query($query);        
        $this->fechaConexao();
    }
    
    
    public function delBanner($objBanner){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_BANNER." SET status = 0 WHERE idBanner = ".$objBanner->getIdBanner();
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function busca($objBanner){
        $conexao = $this->abreConexao();

        $sql = 'SELECT *
                    FROM' . TBL_BANNER . '
                        WHERE status != 0
                        AND nome LIKE "%'.$objBanner->getNome().'%"
                            ORDER BY ordem ';
        $banco = $conexao->query($sql);

        $linhas = array();

        while ($linha = $banco->fetch_array()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

}

$objBannersDao = new BannersDAO();
?>