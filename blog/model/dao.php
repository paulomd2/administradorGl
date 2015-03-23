<?php
require_once 'blog.php';

class BlogDAO extends Banco{
    public function listaPostagens($id){
        $conexao = $this->abreConexao();
        
        if($id != 0){
            $where = 'AND idUsuario = '.$id;
        }else{
            $where = '';
        }
        
        $sql = " SELECT * FROM ".TBL_BLOG_POSTAGEM." WHERE status != 0 ".$where;
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
    
    public function listaPostagem1($objBlog){
        $conexao = $this->abreConexao();
        
        $sql = " SELECT * FROM ".TBL_BLOG_POSTAGEM." WHERE idPostagem = ".$objBlog->getIdPostagem();
        
        $banco = $conexao->query($sql);
        
        $linha = $banco->fetch_assoc();
        
        return $linha;
        
        $this->fechaConexao();
    }
    
    public function cadPostagem($objBlog){
        $conexao = $this->abreConexao();
        
        $sql = "
                INSERT INTO ".TBL_BLOG_POSTAGEM." SET
                idUsuario = ".$objBlog->getIdUsuario().",
                titulo = '".$objBlog->getTitulo()."',
                texto = '".$objBlog->getTexto()."',
                dataCadastro = '".$objBlog->getDataCadastro()."',
                dataSaida = '".$objBlog->getDataSaida()."',
                dataPublicacao = '".$objBlog->getDataPublicacao()."',
                imagem = '".$objBlog->getImagem()."',
                tagSeo = '".$objBlog->getTagSeo()."',
                status = ".$objBlog->getStatus().",
                descricaoSeo = '".$objBlog->getDescricaoSeo()."'
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
    
    
    public function altPostagem($objBlog){
        $conexao = $this->abreConexao();
        
        $sql = "
                UPDATE ".TBL_BLOG_POSTAGEM." SET
                titulo = '".$objBlog->getTitulo()."',
                texto = '".$objBlog->getTexto()."',
                dataCadastro = '".$objBlog->getDataCadastro()."',
                dataSaida = '".$objBlog->getDataSaida()."',
                dataPublicacao = '".$objBlog->getDataPublicacao()."',
                imagem = '".$objBlog->getImagem()."',
                tagSeo = '".$objBlog->getTagSeo()."',
                descricaoSeo = '".$objBlog->getDescricaoSeo()."'
                    WHERE idPostagem = ".$objBlog->getIdPostagem()."
               ";
        
        $conexao->query($sql) or die($conexao->error);
        
        $this->fechaConexao();
    }
    
    public function delPostagem($objBlog){
        $conexao = $this->abreConexao();
        
        $sql = "
                UPDATE ".TBL_BLOG_POSTAGEM." SET
                status = 0
                    WHERE idPostagem = ".$objBlog->getIdPostagem()."
               ";
        
        $conexao->query($sql);
        
        $this->fechaConexao();
    }
}

$objBlogDao = new BlogDAO();