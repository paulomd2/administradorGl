<?php

require_once 'menu.php';
require_once 'submenu.php';

class ConteudoDAO extends Banco {

    public function cadMenu($objMenu) {
        $conexao = $this->abreConexao();

        $sql = "
                INSERT INTO " . TBL_MENU . " SET
                titulo = '" . $objMenu->getTitulo() . "',
                link = '" . $objMenu->getLink() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaMenus() {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT * FROM " . TBL_MENU . " WHERE status = 1
               ";

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function listaMenu1($objMenu) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT * FROM " . TBL_MENU . " WHERE idMenu =" . $objMenu->getIdMenu();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

    public function altMenu($objMenu) {
        $conexao = $this->abreConexao();

        $sql = " 
                UPDATE " . TBL_MENU . " SET
                titulo = '" . $objMenu->getTitulo() . "',
                link = '" . $objMenu->getLink() . "'
                   WHERE idMenu = " . $objMenu->getIdMenu() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delMenu($objMenu) {
        $conexao = $this->abreConexao();

        $sql = " 
                UPDATE " . TBL_MENU . " SET
                status = 0
                   WHERE idMenu = " . $objMenu->getIdMenu() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function cadSubmenu($objSubMenu) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_SUBMENU . " SET
                idMenu = " . $objSubMenu->getIdMenu() . ",
                tituloMenu = '" . $objSubMenu->getTituloMenu() . "',
                tituloPagina = '" . $objSubMenu->getTituloPagina() . "',
                texto = '" . $objSubMenu->getTexto() . "',
                link = '" . $objSubMenu->getLink() . "',
                target = '" . $objSubMenu->getTarget() . "',
                status = " . $objSubMenu->getStatus() . ",
                tituloMetaTag = '" . $objSubMenu->getTituloMetaTag() . "',
                keywordMetaTag = '" . $objSubMenu->getKeywordMetaTag() . "',
                descricaoMetaTag = '" . $objSubMenu->getDescricaoMetaTag() . "',
                dataEntrada = '" . $objSubMenu->getDataEntrada() . "',
                dataSaida = '" . $objSubMenu->getDataSaida() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altSubmenu($objSubMenu) {
        $conexao = $this->abreConexao();

        echo $sql = "UPDATE " . TBL_SUBMENU . " SET
                idMenu = " . $objSubMenu->getIdMenu() . ",
                tituloMenu = '" . $objSubMenu->getTituloMenu() . "',
                tituloPagina = '" . $objSubMenu->getTituloPagina() . "',
                texto = '" . $objSubMenu->getTexto() . "',
                link = '" . $objSubMenu->getLink() . "',
                target = '" . $objSubMenu->getTarget() . "',
                status = " . $objSubMenu->getStatus() . ",
                tituloMetaTag = '" . $objSubMenu->getTituloMetaTag() . "',
                keywordMetaTag = '" . $objSubMenu->getKeywordMetaTag() . "',
                descricaoMetaTag = '" . $objSubMenu->getDescricaoMetaTag() . "',
                dataEntrada = '" . $objSubMenu->getDataEntrada() . "',
                dataSaida = '" . $objSubMenu->getDataSaida() . "'
                    WHERE idSubmenu = " . $objSubMenu->getIdSubmenu() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaSubMenus($idMenu) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT
                s.*,
                CASE s.status WHEN 1 THEN 'Publicado' WHEN 2 THEN 'Em Aprovação' ELSE 'Desabilitado' END AS status,
                CASE s.target WHEN '_blank' THEN 'Nova Página' ELSE 'Mesma Página' END AS target
                    FROM " . TBL_SUBMENU . " s
                        WHERE s.status != 0
                        AND idMenu = ABS(".$idMenu.")
              ";

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function delSubmenu($objSubmenu) {
        $conexao = $this->abreConexao();

        $sql = "UPDATE " . TBL_SUBMENU . " SET status = 0 WHERE idSubmenu = " . $objSubmenu->getIdSubmenu();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaSubmenu1($objSubmenu) {
        $conexao = $this->abreConexao();

        $sql = "SELECT * FROM " . TBL_SUBMENU . " WHERE idSubmenu = " . $objSubmenu->getIdSubmenu();

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

}

$objConteudoDao = new ConteudoDAO();
