-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2019 às 00:36
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devdatabase`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_palavra`
--

CREATE TABLE `forca_palavra` (
  `id_palavra` int(11) NOT NULL,
  `palavra` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `id_tema` int(11) NOT NULL,
  `dicas` varchar(500) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_palavra`
--

INSERT INTO `forca_palavra` (`id_palavra`, `palavra`, `id_tema`, `dicas`) VALUES
(2, 'MICROFONE', 2, 'CANTAR,FERRO,SOM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_sala`
--

CREATE TABLE `forca_sala` (
  `id_sala` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `privada` char(1) COLLATE latin1_general_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `senha_sala` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `id_adversario` int(11) NOT NULL,
  `id_vencedor` int(11) NOT NULL,
  `id_palavra` int(11) NOT NULL,
  `letras_escolhidas` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `erros_usuario` int(2) NOT NULL,
  `erros_adversario` int(2) NOT NULL,
  `id_jogador_vez` int(11) NOT NULL,
  `sala_finalizada` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `dicas_adversario` int(1) NOT NULL,
  `dicas_usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_sala`
--

INSERT INTO `forca_sala` (`id_sala`, `id_tema`, `privada`, `id_usuario`, `senha_sala`, `data_criacao`, `id_adversario`, `id_vencedor`, `id_palavra`, `letras_escolhidas`, `erros_usuario`, `erros_adversario`, `id_jogador_vez`, `sala_finalizada`, `dicas_adversario`, `dicas_usuario`) VALUES
(11, 2, 'n', 5, '', '0000-00-00', 3, 0, 2, '', 3, 2, 5, '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_sala_letras`
--

CREATE TABLE `forca_sala_letras` (
  `id_sala` int(11) NOT NULL,
  `letra` varchar(1) NOT NULL,
  `id_jogador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forca_sala_letras`
--

INSERT INTO `forca_sala_letras` (`id_sala`, `letra`, `id_jogador`) VALUES
(11, 'E', 5),
(11, 'F', 5),
(11, 'M', 7),
(11, 'O', 5),
(11, 'X', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_score`
--

CREATE TABLE `forca_score` (
  `id_score` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `score` varchar(45) COLLATE latin1_general_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_score`
--

INSERT INTO `forca_score` (`id_score`, `id_usuario`, `score`) VALUES
(1, 2, '0'),
(2, 3, '0'),
(3, 4, '0'),
(4, 5, '0'),
(5, 6, '0'),
(6, 7, '0'),
(7, 8, '0'),
(8, 9, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_tema`
--

CREATE TABLE `forca_tema` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(45) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_tema`
--

INSERT INTO `forca_tema` (`id_tema`, `tema`) VALUES
(1, 'CINEMA'),
(2, 'MUSICA'),
(4, 'LUGAR'),
(5, 'GASTRONOMIA'),
(6, 'ESCOLA'),
(7, 'PESSOA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_tema_img`
--

CREATE TABLE `forca_tema_img` (
  `id_img` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `img_tema` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  `img_tema_tela` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  `img_tema_tela2` varchar(500) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forca_usuario`
--

CREATE TABLE `forca_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `login` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `senha` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `perfil` varchar(3) COLLATE latin1_general_ci NOT NULL,
  `creditos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_usuario`
--

INSERT INTO `forca_usuario` (`id_usuario`, `nome`, `login`, `senha`, `perfil`, `creditos`) VALUES
(3, 'Renan Souza', 'dallai', '81dc9bdb52d04dc20036dbd8313ed055', 'adm', 0),
(4, 'Rafael Santana', 'rafaellsantanaa', '81dc9bdb52d04dc20036dbd8313ed055', 'pla', 0),
(5, 'Thiago', 'kensaither', 'e8d95a51f3af4a3b134bf6bb680a213a', 'adm', 0),
(7, 'teste', 'teste', '81dc9bdb52d04dc20036dbd8313ed055', 'pla', 0),
(9, 'kensaither2', 'kensaither2', 'e8d95a51f3af4a3b134bf6bb680a213a', 'pla', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forca_palavra`
--
ALTER TABLE `forca_palavra`
  ADD PRIMARY KEY (`id_palavra`);

--
-- Indexes for table `forca_sala`
--
ALTER TABLE `forca_sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexes for table `forca_sala_letras`
--
ALTER TABLE `forca_sala_letras`
  ADD UNIQUE KEY `PK` (`id_sala`,`letra`);

--
-- Indexes for table `forca_score`
--
ALTER TABLE `forca_score`
  ADD PRIMARY KEY (`id_score`);

--
-- Indexes for table `forca_tema`
--
ALTER TABLE `forca_tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indexes for table `forca_tema_img`
--
ALTER TABLE `forca_tema_img`
  ADD PRIMARY KEY (`id_img`);

--
-- Indexes for table `forca_usuario`
--
ALTER TABLE `forca_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `U_Login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forca_palavra`
--
ALTER TABLE `forca_palavra`
  MODIFY `id_palavra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forca_sala`
--
ALTER TABLE `forca_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `forca_score`
--
ALTER TABLE `forca_score`
  MODIFY `id_score` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forca_tema`
--
ALTER TABLE `forca_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forca_usuario`
--
ALTER TABLE `forca_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
