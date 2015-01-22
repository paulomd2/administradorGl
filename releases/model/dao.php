<?php

require_once 'release.php';

class ReleasesDAO extends Banco {

    public function cadRelease($objRelease) {
        $conexao = $this->abreConexao();

        $sql = "INSERT INTO " . TBL_RELEASE . " SET
               titulo = '" . $objRelease->getTitulo() . "',
               mes = '" . $objRelease->getMes() . "',
               status = '" . $objRelease->getStatus() . "',
               texto = '" . $objRelease->getTexto() . "',
               dataCadastro = '" . $objRelease->getDataCadastro() . "'
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function altRelease($objRelease) {
        $conexao = $this->abreConexao();

        echo $sql = "UPDATE " . TBL_RELEASE . " SET
               titulo = '" . $objRelease->getTitulo() . "',
               mes = '" . $objRelease->getMes() . "',
               status = '" . $objRelease->getStatus() . "',
               texto = '" . $objRelease->getTexto() . "'
                   WHERE idRelease = " . $objRelease->getIdRelease() . "
               ";

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function delRelease($objRelease) {
        $conexao = $this->abreConexao();

      echo  $sql = "UPDATE " . TBL_RELEASE . " 
                SET status = 0
                WHERE idRelease = " . $objRelease->getIdRelease();

        $conexao->query($sql);

        $this->fechaConexao();
    }

    public function verReleases($count) {
        $conexao = $this->abreConexao();

        $sql = "SELECT titulo, idRelease,
                    CASE WHEN mes = 1 THEN 'Janeiro'
                    WHEN mes = 2 THEN 'Fevereiro'
                    WHEN mes = 3 THEN 'Março'
                    WHEN mes = 4 THEN 'Abril'
                    WHEN mes = 5 THEN 'Maio'
                    WHEN mes = 6 THEN 'Junho'
                    WHEN mes = 7 THEN 'Julho'
                    WHEN mes = 8 THEN 'Agosto'
                    WHEN mes = 9 THEN 'Setembro'
                    WHEN mes = 10 THEN 'Outubro'
                    WHEN mes = 11 THEN 'Novembro'
                    WHEN mes = 12 THEN 'Dezembro'
                    END AS mes
                        FROM " . TBL_RELEASE . "
                            WHERE status != 0
                            ORDER BY mes DESC
                            LIMIT ".$count."
                ";

        $banco = $conexao->query($sql);

        $linhas[] = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;

        $this->fechaConexao();
    }

    public function verRelease1($objRelease) {
        $conexao = $this->abreConexao();

        $sql = "SELECT *
                FROM " . TBL_RELEASE . "
                    WHERE idRelease = " . $objRelease->getIdRelease() . "
                ";

        $banco = $conexao->query($sql);

        $linha = $banco->fetch_assoc();

        return $linha;

        $this->fechaConexao();
    }

}

$objReleasesDao = new ReleasesDAO();
