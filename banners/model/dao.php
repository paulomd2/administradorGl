<?php

require_once 'banner.php';

class bannersDAO extends Banco {

    public function cadBanners($obj_banners) {
        $conexao = $this->abreConexao();

        $sql = 'INSERT INTO ' . TBL_BANNERS . ' SET
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

    public function altBanners($obj_banners) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE ' . TB_BANNERS . ' SET
                    nome = "' . $obj_banners->getNome() . '", 
                    imagem = "' . $obj_banners->getImagem() . '", 
                    dataPublicacao = "' . $obj_banners->getDataPublicacao() . '", 
                    link = "' . $obj_banners->getLink() . '", 
                    target = "' . $obj_banners->getTarget() . '", 
                    ordem = "' . $obj_banners->getOrdem() . '", 
                    status = "' . $obj_banners->getStatus() . '", 
                    dataSaida = "' . $obj_banners->getDataSaida() . '"
                    WHERE idBanner = ' . $obj_banners->getIdBanner();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delBanners(banners $obj_banners) {
        $conexao = $this->abreConexao();

        $sql = 'UPDATE FROM ' . TB_BANNERS . ' SET status = 0 WHERE idBanner = "' . $obj_banners->getIdBanner() . '"';
        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaBanners1($objBanner) {
        $conexao = $this->conecta();

        $sql = 'SELECT * FROM' . TB_BANNERS . 'WHERE idBanner = "' . $obj_banners->getIdBanner() . '"';
        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();
        return $linha;

        $this->fechaConexao();
    }

    public function listaBanners() {
        $conexao = $this->conecta();

        $sql = 'SELECT * FROM' . TB_BANNERS . 'WHERE status != 0';
        $banco = $conexao->query($sql);

        $linhas[] = array();

        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

}
?>