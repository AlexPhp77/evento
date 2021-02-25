-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 24-Fev-2021 às 17:59
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `espaco_cafe`
--

DROP TABLE IF EXISTS `espaco_cafe`;
CREATE TABLE IF NOT EXISTS `espaco_cafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `lotacao_cafe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `espaco_cafe`
--

INSERT INTO `espaco_cafe` (`id`, `nome`, `lotacao_cafe`) VALUES
(1, 'Café 1', 100),
(2, 'Café 2', 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `sobrenome`) VALUES
(1, 'Nome 1', 'Sobrenome '),
(2, ' Nome 2', 'Sobrenome '),
(3, ' Nome 3', 'Sobrenome '),
(4, ' Nome 4', 'Sobrenome '),
(5, ' Nome 5', 'Sobrenome  '),
(7, 'Nome 7', 'Sobrenome '),
(8, 'Nome 8', 'Sobrenome '),
(9, 'Nome 9', 'Sobrenome '),
(10, 'Nome 10', 'Sobrenome');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_sala`
--

DROP TABLE IF EXISTS `pessoa_sala`;
CREATE TABLE IF NOT EXISTS `pessoa_sala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `sala_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1813 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa_sala`
--

INSERT INTO `pessoa_sala` (`id`, `pessoa_id`, `sala_id`) VALUES
(1804, 1, 1),
(1805, 2, 1),
(1806, 3, 1),
(1807, 4, 1),
(1808, 5, 1),
(1809, 7, 2),
(1810, 8, 2),
(1811, 9, 2),
(1812, 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

DROP TABLE IF EXISTS `salas`;
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sala` varchar(50) NOT NULL,
  `lotacao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `nome_sala`, `lotacao`) VALUES
(1, 'Sala A', 5),
(2, 'Sala B', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
