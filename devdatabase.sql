-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Jun-2019 às 19:08
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
(1, 'MACACO', 1, 'BANANA,PRIMATA,GEORGE'),
(2, 'PERU', 1, 'NATAL,AÇÃO DE GRAÇAS,PAÍS'),
(3, 'GALINHA', 1, 'OVO,AVE,PINTADINHA '),
(4, 'COBRA', 1, 'REPTIL,CORAL,VENENO '),
(5, 'ARANHA', 1, 'VIÚVA,8 PATAS,TEIA'),
(6, 'ORNITORRINCO', 1, 'MAMÍFERO,AUSTRÁLIA,PATO '),
(7, 'KIWI', 1, 'FRUTA VERDE,PEQUENO,AVE'),
(8, 'GAFANHOTO', 1, 'KUNG FU,VERDE, INSETO'),
(9, 'LHAMA', 1, 'RUMINANTE,PERU,PRODUÇÃO DE LÃ'),
(10, 'PANDA', 1, 'FOFO,BAMBU,URSO'),
(11, 'POLVO', 1, 'CEFALÓPODE,CROMATÓFOROS,VENTOSA'),
(12, 'ESPONJA', 1, 'PORÍFEROS,RECIFE DE CORAL,BOB'),
(13, 'AVESTRUZ', 1, 'PESCOÇUDO,OVO GRANDE,NÃO VOA'),
(14, 'IGUANA', 1, 'VERDE,BOTA OVO,CALANGO'),
(15, 'GIRAFA', 1, 'PINTAS,ÁFRICA,LAMARK'),
(16, 'HIPOPOTAMO', 1, 'FEROZ,AQUÁTICO,MAMÍFERO'),
(17, 'RINOCERONTE', 1, 'MAMÍFERO,ÁGUA,CHIFRE'),
(18, 'ARNALDO', 2, 'BASH,LINUX,LAOC '),
(19, 'VICTOR', 2, 'PASCAL,ESTRUTURA DE DADOS,PMBOK '),
(20, 'KURATA', 2, 'GALINHAS,OVOS,ESTATÍSTICA'),
(21, 'GRACE', 2, 'MARATONA,POO,ALGORITMOS'),
(22, 'HIROMASSA', 2, 'GUARULHOS,JAPONÊS,COBOL'),
(23, 'GRECCO', 2, 'CARTÃO PERFURADO,LENDA,AOC '),
(24, 'ARIMA', 2, 'DEMONSTRATIVO,CONTABILIDADE,ATIVOS E PASSIVOS '),
(25, 'BANIN', 2, 'ALGORITMOS,PYTHON,SÃO CAETANO'),
(26, 'SHIGEO', 2, '6,ÁRVORE,IHC '),
(27, 'AKAMINE', 2, 'ESTRUTURA DE DADOS,C,DEU AULA PRO VITÃO'),
(28, 'MILTON', 2, 'HARDWARE,ACDC,ARDUÍNO '),
(29, 'BERNICE', 2, 'SOFTWARE,BANCO DE DADOS,PERUCA '),
(30, 'DIONISIO', 2, 'BICHO,SOII,CPU'),
(31, 'AOKI', 2, 'BARILLA,ERRA 2 ANULA UMA CERTA,AO'),
(32, 'NEIDE', 2, 'MPAT,SOFTWARE LIVRE,AULA QUINZENAL '),
(33, 'ANTONIOCELSO', 2, 'HP,EMPREENDEDORISMO,ECONFIN'),
(34, 'SANFONA', 3, 'FORRO,TECLAS,FOLE'),
(35, 'BANJO', 3, 'CORDA,CAIPIRA,FAMÍLIA DO ALAÚDE'),
(36, 'SAXOFONE', 3, 'JAZZ,DOURADO,SOPRO'),
(37, 'BANDOLIN', 3, 'CORDA,HOMEM COM H,CORDOAMENTO DUPLO'),
(38, 'XILOFONE', 3, 'TECLAS,BAQUETAS,COLORIDO'),
(39, 'CHOCALHO', 3, 'RITMO,PERCUSSÃO,BEBÊ'),
(40, 'PIANO', 3, 'MOZART,CAUDA,OITAVA'),
(41, 'VIOLINO', 3, 'CORDAS,ARCO,STRADIVARIUS'),
(42, 'CLARINETE', 3, 'CHAVE,PRETO,LULA MOLUSCO'),
(43, 'TIMPANOS', 3, 'ORELHA,PERCUSSÃO,TAMBOR'),
(44, 'FLAUTA', 3, 'SOPRO,BURACOS,DOCE'),
(45, 'HARPA', 3, 'CORDAS,ANJOS,GRANDE\n'),
(46, 'STEVEN', 4, 'CRISTAIS,MULHERES,ESTRELA'),
(47, 'PERNALONGA', 4, 'CINZA,ORELHAS,VELHINHO'),
(48, 'TARZAN', 4, 'FLORESTA,MACACO,TANGUINHA'),
(49, 'MULAN', 4, 'FALANDO SEM PERMISSÃO,CHINA,HONRA'),
(50, 'KENAI', 4, 'URSO,ANCESTRAIS,TOTEM'),
(51, 'NARUTO', 4, 'TO CERTO,LAMEN,RAPOSA'),
(52, 'RAPUNZEL', 4, 'CABELOS,TORRE,BRUXA'),
(53, 'ARIEL', 4, 'PEIXE,MAR,CANTAR'),
(54, 'MUSHU', 4, 'DRAGÃO,PROTETOR,DESONRA PRA TU'),
(55, 'ARYA', 4, 'BRAVOS,AGULHA,LOBO'),
(56, 'MASCARA', 4, 'VERDE,TERNO AMARELO,COCO BONGO'),
(57, 'SPIDERMAN', 4, 'MULTIVERSO,AMIGO DA VIZINHANÇA,ARANHA'),
(58, 'SUPERMAN', 4, 'ALIEN,DC,KAL-EL '),
(59, 'BATMAN', 4, 'DC,MARTHA,MORCEGO '),
(60, 'AQUAMAN', 4, 'DC,CAVALO MARINHO,MOMOA'),
(61, 'MALEVOLA', 4, 'DISNEY,BELA ADORMECIDA,BRUXA '),
(62, 'IRONMAN', 4, 'STARK,MORREU,MCU '),
(63, 'SONIC', 4, 'AZUL,VELOZ,OURIÇO'),
(64, 'MAUI', 4, 'DE NADA, SEMIDEUS, THE ROCK'),
(65, 'BRASIL', 5, 'HUE,TEM QUE SER ESTUDADO,MEME'),
(66, 'MEXICO', 5, 'VIOLÃO,TEQUILA,CHAVO DEL OCHO'),
(67, 'ALEMANHA', 5, 'CERVEJA,SALSICHA,MURO'),
(68, 'CHILE', 5, 'CORDILHEIRAS,DESERTO,LHAMA'),
(69, 'ARGENTINA', 5, 'HERMANOS,VINHO,FUTEBOL'),
(70, 'EGITO', 5, 'DEUSES,RIO,DESERTO'),
(71, 'GRECIA', 5, 'MITOLOGIA,ORIGEM,FILOSOFIA'),
(72, 'RUSSIA', 5, 'URSO,GUERRA,VODKA '),
(73, 'CHINA', 5, 'MACARRÃO,MURALHA,POLUIÇÃO '),
(74, 'INDIA', 5, 'RIO, HINDU,CAMINHO DAS'),
(75, 'ITALIA', 5, 'MACARRÃO,MÁFIA,GESTICULAR'),
(76, 'PORTUGAL', 5, 'MÁRIA E JOSÉ,PIADAS,QUINDIM'),
(77, 'AUSTRALIA', 5, 'SURFE,LABORÁTORIO DE DEUS,PROCURANDO NEMO'),
(78, 'KENYA', 5, 'ÁFRICA,NAIROBI,CORREDORES'),
(79, 'ANGOLA', 5, 'ÁFRICA,PORTUGUÊS,GALINHA');

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
  `data_criacao` datetime NOT NULL,
  `id_adversario` int(11) NOT NULL,
  `id_vencedor` int(11) NOT NULL,
  `id_palavra` int(11) NOT NULL,
  `erros_usuario` int(2) NOT NULL,
  `erros_adversario` int(2) NOT NULL,
  `id_jogador_vez` int(11) NOT NULL,
  `sala_finalizada` varchar(1) COLLATE latin1_general_ci NOT NULL,
  `dicas_adversario` int(1) NOT NULL,
  `dicas_usuario` int(1) NOT NULL,
  `ultima_atualizacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_sala`
--

INSERT INTO `forca_sala` (`id_sala`, `id_tema`, `privada`, `id_usuario`, `senha_sala`, `data_criacao`, `id_adversario`, `id_vencedor`, `id_palavra`, `erros_usuario`, `erros_adversario`, `id_jogador_vez`, `sala_finalizada`, `dicas_adversario`, `dicas_usuario`, `ultima_atualizacao`) VALUES
(1, 1, 's', 3, '1234', '2019-06-09 12:27:14', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 12:27:33'),
(2, 1, 'n', 3, '', '2019-06-09 12:28:20', 2, 3, 4, 2, 2, 3, 'S', 0, 3, '2019-06-09 12:29:23'),
(3, 1, 'n', 3, '', '2019-06-09 12:30:58', 2, 2, 10, 2, 1, 2, 'S', 1, 0, '2019-06-09 12:31:33'),
(4, 1, 'n', 2, '', '2019-06-09 12:32:32', 3, 2, 10, 1, 1, 2, 'S', 0, 1, '2019-06-09 12:32:54'),
(5, 1, 'n', 2, '', '2019-06-09 12:33:29', 3, 2, 5, 3, 3, 2, 'S', 0, 1, '2019-06-09 12:34:09'),
(6, 2, 'n', 4, '', '2019-06-09 12:44:17', 2, 2, 30, 0, 0, 4, 'S', 0, 0, '2019-06-09 12:46:57'),
(7, 2, 'n', 4, '', '2019-06-09 12:48:05', 2, 2, 19, 2, 1, 2, 'S', 0, 0, '2019-06-09 12:48:30'),
(8, 1, 'n', 1, '', '2019-06-09 12:50:11', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 12:50:14'),
(9, 1, 'n', 1, '', '2019-06-09 13:06:58', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:07:29'),
(10, 2, 'n', 1, '', '2019-06-09 13:07:43', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:08:01'),
(11, 1, 'n', 4, '', '2019-06-09 13:11:19', 5, 5, 10, 0, 1, 4, 'S', 0, 0, '2019-06-09 13:11:52'),
(12, 1, 'n', 4, '', '2019-06-09 13:12:41', 5, 5, 5, 0, 0, 5, 'S', 0, 0, '2019-06-09 13:12:59'),
(13, 1, 'n', 4, '', '2019-06-09 13:13:11', 5, 5, 7, 4, 3, 4, 'S', 0, 0, '2019-06-09 13:13:39'),
(14, 2, 'n', 5, '', '2019-06-09 13:13:13', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:13:15'),
(15, 2, 'n', 5, '', '2019-06-09 13:14:30', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:14:50'),
(16, 5, 'n', 5, '', '2019-06-09 13:15:43', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:16:19'),
(17, 5, 'n', 5, '', '2019-06-09 13:16:25', 4, 4, 70, 3, 3, 4, 'S', 0, 0, '2019-06-09 13:17:18'),
(18, 4, 'n', 5, '', '2019-06-09 13:21:30', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:22:02'),
(19, 2, 'n', 1, '', '2019-06-09 13:22:49', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:23:05'),
(20, 3, 'n', 1, '', '2019-06-09 13:23:54', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:24:08'),
(21, 4, 'n', 1, '', '2019-06-09 13:26:48', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:26:55'),
(22, 5, 'n', 1, '', '2019-06-09 13:27:02', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:27:13'),
(23, 2, 'n', 5, '', '2019-06-09 13:28:24', 4, 5, 21, 0, 0, 5, 'S', 0, 2, '2019-06-09 13:28:54'),
(24, 3, 'n', 4, '', '2019-06-09 13:29:17', 5, 4, 44, 0, 1, 4, 'S', 0, 1, '2019-06-09 13:29:37'),
(25, 3, 'n', 4, '', '2019-06-09 13:31:06', 5, 4, 42, 0, 1, 4, 'S', 0, 0, '2019-06-09 13:31:31'),
(26, 2, 'n', 3, '', '2019-06-09 13:31:46', 5, 5, 25, 3, 3, 5, 'S', 3, 3, '2019-06-09 13:32:43'),
(27, 5, 'n', 3, '', '2019-06-09 13:33:56', 5, 5, 68, 2, 1, 5, 'S', 2, 0, '2019-06-09 13:34:32'),
(28, 1, 'n', 3, '', '2019-06-09 13:38:14', 5, 5, 16, 1, 1, 5, 'S', 0, 0, '2019-06-09 13:39:16'),
(29, 1, 'n', 1, '', '2019-06-09 13:41:19', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:51:41'),
(30, 3, 'n', 5, '', '2019-06-09 13:41:36', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:41:40'),
(31, 3, 'n', 5, '', '2019-06-09 13:41:47', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:42:08'),
(32, 4, 'n', 5, '', '2019-06-09 13:42:19', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:43:15'),
(33, 1, 'n', 5, '', '2019-06-09 13:43:34', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:43:43'),
(34, 4, 'n', 5, '', '2019-06-09 13:44:27', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:46:13'),
(35, 5, 'n', 5, '', '2019-06-09 13:46:35', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:54:55'),
(36, 3, 'n', 1, '', '2019-06-09 13:51:46', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:55:14'),
(37, 2, 'n', 1, '', '2019-06-09 13:55:19', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:55:31'),
(38, 1, 'n', 5, '', '2019-06-09 13:55:30', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 13:55:49'),
(39, 4, 'n', 1, '', '2019-06-09 13:55:43', 0, 0, 0, 0, 0, 0, 'S', 0, 0, '2019-06-09 14:00:06'),
(40, 2, 'n', 1, '', '2019-06-09 14:01:23', 2, 1, 21, 1, 1, 1, 'S', 0, 0, '2019-06-09 14:06:44');

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
(2, 'A', 2),
(2, 'B', 3),
(2, 'C', 3),
(2, 'E', 3),
(2, 'G', 3),
(2, 'N', 2),
(2, 'O', 3),
(2, 'R', 2),
(2, 'S', 2),
(3, 'A', 3),
(3, 'C', 2),
(3, 'D', 2),
(3, 'E', 3),
(3, 'F', 3),
(3, 'N', 2),
(3, 'P', 2),
(4, 'A', 3),
(4, 'C', 2),
(4, 'D', 2),
(4, 'F', 3),
(4, 'N', 2),
(4, 'P', 2),
(5, 'A', 2),
(5, 'B', 3),
(5, 'H', 2),
(5, 'L', 2),
(5, 'N', 3),
(5, 'R', 2),
(5, 'S', 3),
(5, 'Z', 2),
(7, 'A', 4),
(7, 'C', 4),
(7, 'E', 2),
(7, 'I', 4),
(7, 'M', 4),
(7, 'O', 2),
(7, 'R', 2),
(7, 'T', 4),
(7, 'V', 2),
(11, 'A', 5),
(11, 'B', 5),
(12, 'A', 5),
(12, 'H', 5),
(12, 'N', 5),
(12, 'R', 5),
(13, 'A', 5),
(13, 'C', 4),
(13, 'E', 4),
(13, 'G', 5),
(13, 'I', 5),
(13, 'O', 4),
(13, 'S', 5),
(17, 'A', 4),
(17, 'C', 4),
(17, 'E', 5),
(17, 'G', 4),
(17, 'I', 5),
(17, 'O', 5),
(17, 'R', 5),
(17, 'S', 4),
(17, 'T', 4),
(17, 'U', 5),
(23, 'A', 5),
(23, 'C', 5),
(23, 'E', 5),
(23, 'G', 5),
(23, 'R', 5),
(24, 'A', 5),
(24, 'F', 4),
(24, 'H', 5),
(24, 'L', 4),
(24, 'T', 4),
(24, 'U', 4),
(25, 'A', 5),
(25, 'C', 4),
(25, 'E', 5),
(25, 'I', 5),
(25, 'L', 4),
(25, 'N', 4),
(25, 'O', 5),
(25, 'R', 4),
(25, 'T', 4),
(26, 'A', 5),
(26, 'B', 5),
(26, 'C', 3),
(26, 'E', 5),
(26, 'I', 5),
(26, 'N', 5),
(26, 'O', 5),
(26, 'T', 5),
(26, 'W', 3),
(27, 'B', 3),
(27, 'C', 5),
(27, 'E', 5),
(27, 'G', 5),
(27, 'H', 5),
(27, 'I', 5),
(27, 'L', 5),
(28, 'A', 5),
(28, 'C', 3),
(28, 'E', 5),
(28, 'H', 5),
(28, 'I', 5),
(28, 'M', 5),
(28, 'O', 5),
(28, 'P', 5),
(28, 'T', 5);

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
(1, 'ANIMAIS'),
(2, 'PROFESSORES DA FATEC'),
(3, 'INSTRUMENTOS MUSICAIS'),
(4, 'PERSONAGENS'),
(5, 'PAISES');

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
  `creditos` int(11) NOT NULL,
  `id_personagem` int(11) NOT NULL,
  `ultima_interacao` datetime NOT NULL,
  `logged` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `forca_usuario`
--

INSERT INTO `forca_usuario` (`id_usuario`, `nome`, `login`, `senha`, `perfil`, `creditos`, `id_personagem`, `ultima_interacao`, `logged`) VALUES
(1, 'adm', 'adm', 'b09c600fddc573f117449b3723f23d64', 'adm', 50, 0, '2019-06-09 14:06:44', 0),
(2, 'Thiago', 'Fox', 'e8d95a51f3af4a3b134bf6bb680a213a', 'pla', 47, 1, '2019-06-09 14:06:39', 0),
(3, 'Rafael Santana', 'rafaellsantanaa', '81dc9bdb52d04dc20036dbd8313ed055', 'pla', 32, 1, '2019-06-09 13:39:03', 0),
(4, 'Roberta ', 'betacristina', '1546434b6842b1b38290643625f1c928', 'pla', 49, 0, '2019-06-09 13:31:31', 0),
(5, 'Alexandre', 'alenakano', '81dc9bdb52d04dc20036dbd8313ed055', 'pla', 33, 2, '2019-06-09 14:03:17', 0),
(6, 'Alexandre Teste', 'aleteste', '81dc9bdb52d04dc20036dbd8313ed055', 'pla', 50, 0, '2019-06-09 13:47:03', 0);

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
-- Indexes for table `forca_tema`
--
ALTER TABLE `forca_tema`
  ADD PRIMARY KEY (`id_tema`);

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
  MODIFY `id_palavra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `forca_sala`
--
ALTER TABLE `forca_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `forca_tema`
--
ALTER TABLE `forca_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `forca_usuario`
--
ALTER TABLE `forca_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
