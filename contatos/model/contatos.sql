DROP TABLE IF EXISTS `admingl`.`emails`;
CREATE TABLE  `admingl`.`emails` (
  `idContato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `indPrincipal` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dataCadastro` datetime DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idContato`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into `admingl`.`emails` SET email = 'contato@contato.com', nome='contato', indPrincipal = 1, dataCadastro = NOW(), status = 1;