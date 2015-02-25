<?php
class Uplodad {
	private $idUpload;
	private $nome;
	private $pasta;
	private $nomeArquivo;
	private $status;
	private $dataCadastro;


	function getIdUpload() { 
		return $this->idUpload; 
	}

	function setIdUpload($idUpload) {
		$this->idUpload = $idUpload; 
	}


	function getNome() { 
		return $this->nome; 
	}

	function setNome($nome) {
		$this->nome = $nome; 
	}


	function getPasta() { 
		return $this->pasta; 
	}

	function setPasta($pasta) {
		$this->pasta = $pasta; 
	}


	function getNomeArquivo() { 
		return $this->nomeArquivo; 
	}

	function setNomeArquivo($nomeArquivo) {
		$this->nomeArquivo = $nomeArquivo; 
	}


	function getStatus() { 
		return $this->status; 
	}

	function setStatus($status) {
		$this->status = $status; 
	}


	function getDataCadastro() { 
		return $this->dataCadastro; 
	}

	function setDataCadastro($dataCadastro) {
		$this->dataCadastro = $dataCadastro; 
	}


} 

$objUpload = new Uplodad();
?>