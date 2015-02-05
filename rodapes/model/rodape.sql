DROP TABLE IF EXISTS `admingl`.`rodapecategorias`;
CREATE TABLE  `admingl`.`rodapecategorias` (
  `idCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `ordem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `identificador` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0= qualquer, 1= patrocinador, 2=apoio',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `admingl`.`rodapeimagens`;
CREATE TABLE  `admingl`.`rodapeimagens` (
  `idImagem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idCategoria` int(10) unsigned NOT NULL DEFAULT '0',
  `nome` varchar(45) NOT NULL DEFAULT '',
  `imagem` varchar(45) NOT NULL DEFAULT '',
  `link` varchar(45) NOT NULL DEFAULT '',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordem` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idImagem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;