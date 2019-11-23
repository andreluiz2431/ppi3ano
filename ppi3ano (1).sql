-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Nov-2019 às 21:35
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ppi3ano`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `idAcesso` int(11) NOT NULL,
  `dataHoraAcesso` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `calc`
--

CREATE TABLE `calc` (
  `idCalc` int(11) NOT NULL,
  `tituloCalc` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `calc`
--

INSERT INTO `calc` (`idCalc`, `tituloCalc`) VALUES
(1, 'U=R.I'),
(2, 'Resistencia Equivalente Serie'),
(3, 'Resistencia Equivalente Paralelo'),
(4, 'Resistencia Equivalente Misto 1'),
(5, 'Resistencia Equivalente Misto 2'),
(6, 'Resistencia Equivalente Misto 3'),
(7, 'P=R.I^2'),
(8, 'P=U.I'),
(9, 'P=U^2/R');

-- --------------------------------------------------------

--
-- Estrutura da tabela `coment`
--

CREATE TABLE `coment` (
  `idComent` int(11) NOT NULL,
  `idPost` int(11) NOT NULL,
  `comentComent` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dataHoraComent` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `like`
--

CREATE TABLE `like` (
  `idLike` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPostComent` int(11) NOT NULL,
  `tipoLike` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `likeLike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `postPost` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `dataHoraPost` datetime NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCalc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`idPost`, `postPost`, `dataHoraPost`, `idUsuario`, `idCalc`) VALUES
(1, 'aaaaaaaaaaaaaaa', '2019-11-12 00:00:00', 1, 1),
(2, 'bbbbbbbb', '2019-11-14 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `emailUsuario` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `senhaUsuario` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`idAcesso`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `calc`
--
ALTER TABLE `calc`
  ADD PRIMARY KEY (`idCalc`);

--
-- Índices para tabela `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`idComent`),
  ADD KEY `idUsuario` (`idPost`,`idUsuario`),
  ADD KEY `idPost` (`idPost`);

--
-- Índices para tabela `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`idLike`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Índices para tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCalc` (`idCalc`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `idAcesso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `calc`
--
ALTER TABLE `calc`
  MODIFY `idCalc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `coment`
--
ALTER TABLE `coment`
  MODIFY `idComent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `like`
--
ALTER TABLE `like`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
