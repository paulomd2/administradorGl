CREATE TABLE IF NOT EXISTS `newsletters` (
`idNewsletter` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`idNewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;