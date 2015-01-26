<?php

require_once 'banner.php';

class BannersDAO extends Banco {

    public function cadBanner($obj_banners) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_BANNER . ' SET
                nome = "' . $obj_banners->getNome() . '", 
                imagem = "' . $obj_banners->getImagem() . '", 
                dataPublicacao = "' . $obj_banners->getDataPublicacao() . '", 
                link = "' . $obj_banners->getLink() . '", 
                target = "' . $obj_banners->getTarget() . '", 
                dataCadastro = "' . $obj_banners->getDataCadastro() . '", 
                ordem = "' . $obj_banners->getOrdem() . '", 
                status = "' . $obj_banners->getStatus() . '", 
                dataSaida = "' . $obj_banners->getDataSaida() . '"';

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altBanner($obj_banners) {
        $conexao = $this->abreConexao();

       echo $sql = 'UPDATE ' . TBL_BANNER . ' SET
                    nome = "' . $obj_banners->getNome() . '", 
                    imagem = "' . $obj_banners->getImagem() . '", 
                    dataPublicacao = "' . $obj_banners->getDataPublicacao() . '", 
                    link = "' . $obj_banners->getLink() . '", 
                    target = "' . $obj_banners->getTarget() . '", 
                    ordem = "' . $obj_banners->getOrdem() . '", 
                    status = "' . $obj_banners->getStatus() . '", 
                    dataSaida = "' . $obj_banners->getDataSaida() . '"
                    WHERE idBanner = ' . $obj_banners->getIdBanner();

        //$conexao->query($sql);

        $this->fechaConexao();
    }

    public function delBanners(banners $obj_banners) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE FROM ' . TBL_BANNER . ' SET status = 0 WHERE idBanner = "' . $obj_banners->getIdBanner() . '"';
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaBanners1($objBanner) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT *  FROM' . TBL_BANNER . 'WHERE idBanner = "' . $objBanner->getIdBanner() . '"';
        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function listaBanners($count) {
        $conexao = $this->abreConexao();

        $sql = 'SELECT * FROM' . TBL_BANNER . 'WHERE status != 0 LIMIT '.$count;
        $banco = $conexao->query($sql);

        $linhas[] = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

}

$objBannersDao = new BannersDAO();
?>