DROP TABLE IF EXISTS `admingl`.`emailscontato`;
CREATE TABLE  `admingl`.`emailscontato` (
  `idEmail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `indPrincipal` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dataCadastro` datetime DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

insert into `admingl`.`emails` SET email = 'contato@contato.com', nome='contato', indPrincipal = 1, dataCadastro = NOW(), status = 1;


DROP TABLE IF EXISTS `admingl`.`emailrecebido`;
CREATE TABLE  `admingl`.`emailrecebido` (
  `idEmail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `telefone` char(10) DEFAULT NULL,
  `celular` varchar(11) DEFAULT NULL,
  `mensagem` text NOT NULL,
  `interesses` text NOT NULL,
  `sabendo` text NOT NULL,
  `dataEnvio` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;