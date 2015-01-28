-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Jan-2015 às 19:36
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
-- Estrutura da tabela `destaques`
--

CREATE TABLE IF NOT EXISTS `destaques` (
`idDestaque` int(10) unsigned NOT NULL,
  `titulo` varchar(200) NOT NULL DEFAULT '',
  `subtitulo` varchar(50) NOT NULL DEFAULT '',
  `conteudo` text NOT NULL,
  `imagem` varchar(37) NOT NULL DEFAULT '',
  `dataPublicacao` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dataSaida` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link` varchar(45) NOT NULL DEFAULT '',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dataCadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destaques`
--
ALTER TABLE `destaques`
 ADD PRIMARY KEY (`idDestaque`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `destaques`
--
ALTER TABLE `destaques`
MODIFY `idDestaque` int(10) unsigned NOT NULL AUTO_INCREMENT,
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
