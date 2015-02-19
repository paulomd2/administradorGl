<?php

require_once 'menu.php';
require_once 'submenu.php';
require_once 'pagina.php';

class ConteudoDAO extends Banco {

    public function cadMenu($objMenu) {
        $conexao = $this->abreConexao();

        $sql = "
                INSERT INTO " . TBL_MENU . " SET
                titulo = '" . $objMenu->getTitulo() . "',
                link = '" . $objMenu->getLink() . "',
                target = '".$objMenu->getTarget()."'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function listaMenus() {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT * FROM " . TBL_MENU . " WHERE status = 1 ORDER BY ordem
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
                link = '" . $objMenu->getLink() . "',
                target = '".$objMenu->getTarget()."'
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

        $sql = "UPDATE " . TBL_SUBMENU . " SET
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
                s.*, s.tituloMenu AS tituloSubmenu,
                CASE s.status WHEN 1 THEN 'Publicado' WHEN 2 THEN 'Em Aprovação' ELSE 'Desabilitado' END AS status,
                CASE s.target WHEN '_blank' THEN 'Nova Página' ELSE 'Mesma Página' END AS target,
                m.titulo AS tituloMenu
                    FROM " . TBL_SUBMENU . " s
                        JOIN " . TBL_MENU . " m ON m.idMenu = s.idMenu
                        WHERE s.status != 0
                        AND s.idMenu = ABS(" . $idMenu . ")
                ORDER BY s.ordem
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
    
    public function ordenaSubmenu($listingCounter, $recordIDValue){
        $conexao = $this->abreConexao();
        
        $query = "
                    UPDATE ".TBL_SUBMENU."
                    SET ordem = " . $listingCounter . "
                    WHERE idSubmenu = " . $recordIDValue.";";
        
        
        $conexao->query($query) or die($conexao->error());        
        $this->fechaConexao();
    }
    
    public function ordenaMenu($listingCounter, $recordIDValue){
        $conexao = $this->abreConexao();
        
        $query = "
                    UPDATE ".TBL_MENU."
                    SET ordem = " . $listingCounter . "
                    WHERE idSubmenu = " . $recordIDValue;
        
        
        $conexao->query($query);        
        $this->fechaConexao();
    }
    
    
    public function listaPaginas(){
        $conexao = $this->abreConexao();
        
        
//        $sql = "SELECT * FROM ".TBL_PAGINA." WHERE status = 1";
        $sql = "SELECT * FROM ".TBL_PAGINA." WHERE status in(1,2)";
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
    }
    
    
    public function listaPagina1($objPagina){
        $conexao = $this->abreConexao();
        
        
//        $sql = "SELECT * FROM ".TBL_PAGINA." WHERE status = 1";
        $sql = "SELECT * FROM ".TBL_PAGINA." WHERE idPagina = ".$objPagina->getIdPagina();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
    }
    
    
    public function cadPagina($objPagina){
        $conexao = $this->abreConexao();
        
        $sql = "
               INSERT INTO ".TBL_PAGINA." SET
                titulo = '".$objPagina->getTitulo()."',
                link = '".$objPagina->getLink()."',
                texto = '".$objPagina->getTexto()."',
                status = ".$objPagina->getStatus().",
                tituloSeo = '".$objPagina->getTituloSeo()."',
                keywordSeo = '".$objPagina->getKeywordSeo()."',
                descricaoSeo = '".$objPagina->getDescricaoSeo()."'
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    public function altPagina($objPagina){
        $conexao = $this->abreConexao();
        
        $sql = "
                UPDATE ".TBL_PAGINA." SET
                titulo = '".$objPagina->getTitulo()."',
                link = '".$objPagina->getLink()."',
                texto = '".$objPagina->getTexto()."',
                status = ".$objPagina->getStatus().",
                tituloSeo = '".$objPagina->getTituloSeo()."',
                keywordSeo = '".$objPagina->getKeywordSeo()."',
                descricaoSeo = '".$objPagina->getDescricaoSeo()."'
                    WHERE idPagina = ".$objPagina->getIdPagina()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function delPagina($objPagina){
        $conexao = $this->abreConexao();
        
        $sql = "UPDATE ".TBL_PAGINA."
                SET
                status = 0
                    WHERE idPagina = ".$objPagina->getIdPagina()."
               ";
                
        $conexao->query($sql);
                
        $this->fechaConexao();
    }

}

$objConteudoDao = new ConteudoDAO();
