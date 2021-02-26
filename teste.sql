-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 26-Fev-2021 às 15:35
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
(1, 'Local 1 Lanche', 5),
(2, 'Local 2 Lanche', 5);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `sobrenome`) VALUES
(1, 'Alex', 'Sobrenome'),
(2, 'Alexandre', 'Sobrenome '),
(3, ' Ana', 'Sobrenome '),
(4, 'Jo', 'Sobrenome '),
(5, 'Pedro', 'Sobrenome  '),
(11, 'Eduardo', 'Sobrenome'),
(7, 'Bianca', 'Sobrenome '),
(8, 'Henrique', 'Sobrenome '),
(9, 'Paulo', 'Sobrenome ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa_espaco_cafe`
--

DROP TABLE IF EXISTS `pessoa_espaco_cafe`;
CREATE TABLE IF NOT EXISTS `pessoa_espaco_cafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoa_id` int(11) NOT NULL,
  `espaco_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa_espaco_cafe`
--

INSERT INTO `pessoa_espaco_cafe` (`id`, `pessoa_id`, `espaco_id`) VALUES
(19, 1, 1),
(20, 2, 1),
(21, 3, 1),
(22, 4, 1),
(23, 5, 1),
(24, 11, 2),
(25, 7, 2),
(26, 8, 2),
(27, 9, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=438989 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pessoa_sala`
--

INSERT INTO `pessoa_sala` (`id`, `pessoa_id`, `sala_id`) VALUES
(438980, 1, 1),
(438981, 2, 1),
(438982, 3, 1),
(438983, 4, 2),
(438984, 5, 2),
(438985, 11, 2),
(438986, 7, 3),
(438987, 8, 3),
(438988, 9, 3);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `nome_sala`, `lotacao`) VALUES
(1, 'Sala A', 3),
(2, 'Sala B', 3),
(3, 'Sala C', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
