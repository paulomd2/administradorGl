DROP TABLE IF EXISTS `admingl`.`redes`;
CREATE TABLE  `admingl`.`redes` (
  `idRede` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `google` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `flickr` varchar(150) DEFAULT NULL,
  `youtube` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idRede`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
