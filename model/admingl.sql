DROP TABLE IF EXISTS `banners`;
CREATE TABLE  `banners` (
  `idBanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `dataPublicacao` date NOT NULL DEFAULT '0000-00-00',
  `link` varchar(255) NOT NULL,
  `target` varchar(6) NOT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordem` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `dataSaida` date NOT NULL DEFAULT '0000-00-00',
  `horaPublicacao` time NOT NULL DEFAULT '00:00:00',
  `horaSaida` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`idBanner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `blogpostagens`;
CREATE TABLE  `blogpostagens` (
  `idPostagem` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `dataPublicacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dataSaida` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idUsuario` int(10) unsigned NOT NULL DEFAULT '0',
  `imagem` char(37) NOT NULL DEFAULT '',
  `tagSeo` varchar(255) NOT NULL DEFAULT '',
  `descricaoSeo` text NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idPostagem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `caravanaprincipal`;
CREATE TABLE  `caravanaprincipal` (
  `idPrincipal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  PRIMARY KEY (`idPrincipal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `caravanas`;
CREATE TABLE  `caravanas` (
  `idCaravana` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `responsavel` varchar(100) NOT NULL DEFAULT '',
  `local` varchar(255) NOT NULL DEFAULT '',
  `cidade` varchar(30) NOT NULL DEFAULT '',
  `estado` char(2) NOT NULL DEFAULT '',
  `telefone` varchar(13) NOT NULL DEFAULT '',
  `email` varchar(155) NOT NULL DEFAULT '',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `celular` varchar(14) NOT NULL DEFAULT '',
  PRIMARY KEY (`idCaravana`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `destaques`;
CREATE TABLE  `destaques` (
  `idDestaque` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `subtitulo` varchar(50) NOT NULL DEFAULT '',
  `conteudo` text NOT NULL,
  `imagem` varchar(37) NOT NULL DEFAULT '',
  `dataPublicacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dataSaida` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link` varchar(45) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idDestaque`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `emailrespostas`;
CREATE TABLE  `emailrespostas` (
  `idResposta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idContato` int(10) unsigned NOT NULL DEFAULT '0',
  `idEmail` int(10) unsigned NOT NULL DEFAULT '0',
  `mensagem` text NOT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idResposta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `emailscontatos`;
CREATE TABLE  `emailscontatos` (
  `idEmail` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `indPrincipal` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dataCadastro` datetime DEFAULT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`idEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `emailsrecebidos`;
CREATE TABLE  `emailsrecebidos` (
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
  `assunto` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`idEmail`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE  `eventos` (
  `idEvento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `dataInicio` date NOT NULL DEFAULT '0000-00-00',
  `dataFim` date NOT NULL DEFAULT '0000-00-00',
  `imagem` varchar(37) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `tituloMetaTag` varchar(150) NOT NULL DEFAULT '',
  `keywordsMetaTag` varchar(255) NOT NULL DEFAULT '',
  `descricaoMetaTag` text NOT NULL,
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1 = ativo, 0 = desativado',
  PRIMARY KEY (`idEvento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `expositores`;
CREATE TABLE  `expositores` (
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

DROP TABLE IF EXISTS `menus`;
CREATE TABLE  `menus` (
  `idMenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `target` varchar(6) NOT NULL DEFAULT '0',
  `ordem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `newsletters`;
CREATE TABLE  `newsletters` (
  `idNewsletter` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dataCadastro` datetime DEFAULT NULL,
  PRIMARY KEY (`idNewsletter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE  `noticias` (
  `idNoticia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `subTitulo` varchar(100) NOT NULL DEFAULT '',
  `fonte` varchar(70) NOT NULL DEFAULT '',
  `dataPublicacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `texto` text,
  `mercado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0 = inativo, 1 = ativo',
  PRIMARY KEY (`idNoticia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `redes`;
CREATE TABLE  `redes` (
  `idRede` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `facebook` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `google` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `flickr` varchar(150) DEFAULT NULL,
  `youtube` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idRede`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `releases`;
CREATE TABLE  `releases` (
  `idRelease` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mes` tinyint(2) unsigned NOT NULL,
  `texto` text NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `dataEntrada` date NOT NULL DEFAULT '0000-00-00',
  `dataSaida` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`idRelease`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `rodapecategorias`;
CREATE TABLE  `rodapecategorias` (
  `idCategoria` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL DEFAULT '',
  `ordem` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `identificador` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0= qualquer, 1= patrocinador, 2=apoio',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `rodapeimagens`;
CREATE TABLE  `rodapeimagens` (
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

DROP TABLE IF EXISTS `submenus`;
CREATE TABLE  `submenus` (
  `idSubmenu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tituloMenu` varchar(20) NOT NULL DEFAULT '',
  `tituloPagina` varchar(40) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `link` varchar(45) NOT NULL,
  `target` varchar(45) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `tituloMetaTag` varchar(255) NOT NULL DEFAULT '',
  `keywordMetaTag` varchar(255) NOT NULL DEFAULT '',
  `descricaoMetaTag` varchar(45) NOT NULL,
  `idMenu` int(10) unsigned NOT NULL DEFAULT '0',
  `dataEntrada` date NOT NULL DEFAULT '0000-00-00',
  `dataSaida` date NOT NULL DEFAULT '0000-00-00',
  `ordem` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idSubmenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE  `usuarios` (
  `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `nivel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 = admin, 2 = editor',
  `dataCriacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0 = inativo, 1 = ativo',
  `email` varchar(100) NOT NULL DEFAULT '',
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `senha` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;