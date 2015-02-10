<?php
class Banners {

    private $idBanner;
    private $nome;
    private $imagem;
    private $dataPublicacao;
    private $horaPublicacao;
    private $link;
    private $target;
    private $dataCadastro;
    private $ordem;
    private $status;
    private $dataSaida;
    private $horaSaida;

    function getIdBanner() {
        return $this->idBanner;
    }
    function setIdBanner($idBanner) {
        $this->idBanner = seg($idBanner);
    }

    
    function getNome() {
        return $this->nome;
    }
    function setNome($nome) {
        $this->nome = seg($nome);
    }

    
    function getImagem() {
        return $this->imagem;
    }
    function setImagem($imagem) {
        $this->imagem = seg($imagem);
    }

    
    function getDataPublicacao() {
        return $this->dataPublicacao;
    }
    function setDataPublicacao($dataPublicacao) {
        $this->dataPublicacao = seg($dataPublicacao);
    }

    
    function getLink() {
        return $this->link;
    }
    function setLink($link) {
        $this->link = seg($link);
    }

    
    function getTarget() {
        return $this->target;
    }
    function setTarget($target) {
        $this->target = seg($target);
    }

    
    function getDataCadastro() {
        return $this->dataCadastro;
    }
    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = seg($dataCadastro);
    }

    
    function getOrdem() {
        return $this->ordem;
    }
    function setOrdem($ordem) {
        $this->ordem = seg($ordem);
    }

    
    function getStatus() {
        return $this->status;
    }
    function setStatus($status) {
        $this->status = seg($status);
    }

    
    function getDataSaida() {
        return $this->dataSaida;
    }
    function setDataSaida($dataSaida) {
        $this->dataSaida = seg($dataSaida);
    }

    
    public function getHoraPublicacao() {
        return $this->horaPublicacao;
    }
    public function setHoraPublicacao($horaPublicacao) {
        $this->horaPublicacao = seg($horaPublicacao);
    }

    public function getHoraSaida() {
        return $this->horaSaida;
    }
    public function setHoraSaida($horaSaida) {
        $this->horaSaida = seg($horaSaida);
    }

}

$objBanner = new Banners();
?>