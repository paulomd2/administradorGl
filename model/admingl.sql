-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jan-2015 às 19:08
-- Versão do servidor: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admingl`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
`idEvento` int(10) unsigned NOT NULL,
  `nome` varchar(200) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `dataInicio` date NOT NULL DEFAULT '0000-00-00',
  `dataFim` date NOT NULL DEFAULT '0000-00-00',
  `imagem` varchar(37) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `tituloMetaTag` varchar(150) NOT NULL,
  `keywordsMetaTag` varchar(255) NOT NULL DEFAULT '',
  `descricaoMetaTag` varchar(150) NOT NULL DEFAULT '',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '1 = ativo, 0 = desativado'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`idEvento`, `nome`, `titulo`, `dataInicio`, `dataFim`, `imagem`, `texto`, `tituloMetaTag`, `keywordsMetaTag`, `descricaoMetaTag`, `dataCadastro`, `status`) VALUES
(1, 'teste', 'kjn', '2015-02-15', '2015-03-30', 'd991c0f3c7dfb0021404cbe817912500.jpg', '<p>kjn</p>\r\n', 'dasda', 'fsdfs', 'fsdae', '2015-01-15 20:41:01', 1),
(2, 'dasdasd', 'kjn', '1111-11-11', '1111-11-11', '792b75dede15ba9ee5a6efabb5fd2b5f.png', 'cldksm mvf mcv kl cv l  lkgjadfs ojdjgfo isjdag', 'dasda', 'fsdfs', 'fsdae', '2015-01-15 18:43:29', 1),
(3, 'dasdasd', 'kjn', '1111-11-11', '1111-11-11', 'a2f11ed311a3b043902ebc7980c90902.png', '<p>cldksm mvf mcv kl cv l &nbsp;lkgjadfs ojdjgfo isjdag</p>\r\n', 'dasda', 'fsdfs', 'fsdae', '2015-01-15 18:48:37', 1),
(4, 'dasdasd', 'kjn', '2015-01-15', '0000-00-00', 'a2f11ed311a3b043902ebc7980c90902.png', '<p>lalala&ccedil;</p>\r\n', 'dasda', 'fsdfs', 'fsdae', '2015-01-15 19:30:58', 1),
(5, 'teste', 'teste', '1212-12-11', '1212-12-11', 'eeec050797b4cde2834265ac94b6e210.png', '<p>teste</p>\r\n', 'tÃ­tulo', 'teste, sad, 12', 'descricao', '2015-01-16 12:42:01', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
`idMenu` int(10) unsigned NOT NULL,
  `titulo` varchar(25) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `menus`
--

INSERT INTO `menus` (`idMenu`, `titulo`, `link`, `status`) VALUES
(1, 'dasda', '', 1),
(2, 'teste', '123', 1),
(3, 'teste', '123', 1),
(4, 'ghfd', 'dasda23', 1),
(5, 'teste1', '', 1),
(6, 'teste 2', '', 1),
(7, 'teste 3', '', 1),
(8, 'teste 4', '', 1),
(9, 'teste 5', '', 1),
(10, 'teste 6', '', 1),
(11, 'teste 7', '', 1),
(12, 'teste 8', '', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
`idNoticia` int(10) unsigned NOT NULL,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `subTitulo` varchar(100) NOT NULL DEFAULT '',
  `fonte` varchar(70) NOT NULL DEFAULT '',
  `dataPublicacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `texto` text,
  `mercado` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0 = inativo, 1 = ativo'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `subTitulo`, `fonte`, `dataPublicacao`, `dataCadastro`, `texto`, `mercado`, `status`) VALUES
(2, 'teste', 'teste', 'tre', '2015-01-13', '2015-01-14 13:54:15', 'lala', 0, 1),
(3, 'teste', 'teste', 'tre', '2015-01-13', '2015-01-14 13:50:16', 'lala', 0, 0),
(4, 'teste', 'teste', 'tre', '2015-01-13', '2015-01-14 14:24:46', 'teste 2', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `releases`
--

CREATE TABLE IF NOT EXISTS `releases` (
`idRelease` int(10) unsigned NOT NULL,
  `mes` tinyint(2) unsigned NOT NULL,
  `texto` text NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `dataEntrada` date NOT NULL DEFAULT '0000-00-00',
  `dataSaida` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `releases`
--

INSERT INTO `releases` (`idRelease`, `mes`, `texto`, `dataCadastro`, `status`, `titulo`, `dataEntrada`, `dataSaida`) VALUES
(1, 1, '<p>dasdas da sdad a</p>\n', '2015-01-22 14:44:13', 1, 'dasd', '0000-00-00', '0000-00-00'),
(2, 1, '<p>dasdas da sdad a</p>\n', '2015-01-22 14:44:15', 1, 'dasd', '2015-01-22', '2015-02-22'),
(3, 3, '<p>dasdas da sdad a</p>\n', '2015-01-22 14:50:50', 1, 'dasd', '0000-00-00', '0000-00-00'),
(4, 10, '<p>texto</p>\n', '2015-01-22 15:18:30', 2, 'outro teste', '0000-00-00', '0000-00-00'),
(5, 10, '<p>texto</p>\n', '2015-01-22 15:18:34', 0, 'outro teste', '0000-00-00', '0000-00-00'),
(6, 9, '<p>texto lal&aacute;</p>\n', '2015-01-22 17:00:11', 1, 'lala', '0000-00-00', '0000-00-00'),
(7, 1, '<p>blabl&aacute;</p>\n', '2015-01-22 17:00:37', 2, 'elle', '0000-00-00', '0000-00-00'),
(8, 1, '<p>blabl&aacute;</p>\n', '2015-01-22 17:00:37', 2, 'elle', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `submenus`
--

CREATE TABLE IF NOT EXISTS `submenus` (
`idSubmenu` int(10) unsigned NOT NULL,
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
  `ordem` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `submenus`
--

INSERT INTO `submenus` (`idSubmenu`, `tituloMenu`, `tituloPagina`, `texto`, `link`, `target`, `status`, `tituloMetaTag`, `keywordMetaTag`, `descricaoMetaTag`, `idMenu`, `dataEntrada`, `dataSaida`, `ordem`) VALUES
(1, 'link', 'dsada', '', 'dasdas', '_blank', 1, 'dasad', 'dsadasd', 'sdadasd', 1, '0000-00-00', '0000-00-00', 0),
(2, 'dasd', 'dsada', '', 'dasdas', '_self', 1, 'dasad', 'dsadasd', 'sdadasd', 2, '1111-11-11', '1111-11-11', 0),
(3, 'dasda', 'adas', '', 'da sd as ï¿½a', '_self', 1, 'sdasd', 'dasda', 'adas', 1, '0000-00-00', '0000-00-00', 0),
(4, 'teste 1', 'adas dfasfssd', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 1, '0000-00-00', '0000-00-00', 0),
(5, 'testre', 'adas', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 1, '0000-00-00', '0000-00-00', 0),
(6, 'trew', 'adas', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 2, '0000-00-00', '0000-00-00', 0),
(7, 'trew', 'adas', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 2, '0000-00-00', '0000-00-00', 0),
(8, 'trew', 'adas', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 2, '0000-00-00', '0000-00-00', 0),
(9, 'trew', 'adas', '<p>dasd ad adasd as&nbsp;</p>\n', '', '_self', 1, 'sdasd', 'dasda', 'adas', 2, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`idUsuario` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL DEFAULT '',
  `nivel` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 = admin, 2 = editor',
  `dataCriacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '0 = inativo, 1 = ativo',
  `email` varchar(100) NOT NULL DEFAULT '',
  `usuario` varchar(20) NOT NULL DEFAULT '',
  `senha` char(32) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nome`, `nivel`, `dataCriacao`, `status`, `email`, `usuario`, `senha`) VALUES
(1, 'Paulo', 1, '2015-01-12 20:15:00', 1, 'teste@teste.com', 'teste', '202cb962ac59075b964b07152d234b70'),
(2, 'Paulo Sergio s', 1, '2015-01-19 14:29:16', 1, 'adsda@dasd.com', '14', '33fa66b7904998952daa9dcc05093b24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
 ADD PRIMARY KEY (`idEvento`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
 ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `noticias`
--
ALTER TABLE `noticias`
 ADD PRIMARY KEY (`idNoticia`);

--
-- Indexes for table `releases`
--
ALTER TABLE `releases`
 ADD PRIMARY KEY (`idRelease`);

--
-- Indexes for table `submenus`
--
ALTER TABLE `submenus`
 ADD PRIMARY KEY (`idSubmenu`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
MODIFY `idEvento` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
MODIFY `idMenu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `noticias`
--
ALTER TABLE `noticias`
MODIFY `idNoticia` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `releases`
--
ALTER TABLE `releases`
MODIFY `idRelease` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `submenus`
--
ALTER TABLE `submenus`
MODIFY `idSubmenu` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `idUsuario` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
