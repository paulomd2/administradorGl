DROP TABLE IF EXISTS `admingl`.`expositores`;
CREATE TABLE  `admingl`.`expositores` (
  `idExpositor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dataPublicacao` date DEFAULT NULL,
  `estande` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL DEFAULT '',
  `dataCadastro` datetime NOT NULL,
  `ordem` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idExpositor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
