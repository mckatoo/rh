-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/04/2018 às 03h45min
-- Versão do Servidor: 5.5.22
-- Versão do PHP: 5.3.10-1ubuntu3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `iesi`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_producao`
--

CREATE TABLE IF NOT EXISTS `arquivos_producao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producao_id` int(11) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_arquivos_producao_producao1_idx` (`producao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_publicacao`
--

CREATE TABLE IF NOT EXISTS `arquivos_publicacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publicacao_id` int(11) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_arquivos_publicacao_publicacao1_idx` (`publicacao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_tempo_exp`
--

CREATE TABLE IF NOT EXISTS `arquivos_tempo_exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(255) NOT NULL,
  `tempo_exp_pro_fora_mag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_arquivos_tempo_exp_tempo_exp_pro_fora_mag1_idx` (`tempo_exp_pro_fora_mag_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `arquivos_tempo_exp`
--

INSERT INTO `arquivos_tempo_exp` (`id`, `arquivo`, `tempo_exp_pro_fora_mag_id`, `created_at`, `updated_at`) VALUES
(1, 'comprovante-internet-17-04_23-54-14.pdf', 30, '2018-04-17 23:54:14', '2018-04-17 23:54:14'),
(2, 'Comp_BtcToYou-17-04_23-54-20.pdf', 30, '2018-04-17 23:54:20', '2018-04-17 23:54:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_tempo_mag`
--

CREATE TABLE IF NOT EXISTS `arquivos_tempo_mag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(255) NOT NULL,
  `tempo_mag_sup_exp_pro_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_arquivos_tempo_mag_tempo_mag_sup_exp_pro1_idx` (`tempo_mag_sup_exp_pro_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `arquivos_tempo_mag`
--

INSERT INTO `arquivos_tempo_mag` (`id`, `arquivo`, `tempo_mag_sup_exp_pro_id`, `created_at`, `updated_at`) VALUES
(2, '6B210B370F3862A49819DEE9-16-04_00-23-17.pdf', 28, '2018-04-16 00:23:18', '2018-04-16 00:23:18'),
(3, 'comprovante-internet-17-04_23-53-49.pdf', 30, '2018-04-17 23:53:49', '2018-04-17 23:53:49'),
(4, '6B210B370F3862A49819DEE9-17-04_23-54-02.pdf', 30, '2018-04-17 23:54:02', '2018-04-17 23:54:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos_titulos`
--

CREATE TABLE IF NOT EXISTS `arquivos_titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arquivo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `titulos_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_arquivos_titulos_titulos1_idx` (`titulos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `arquivos_titulos`
--

INSERT INTO `arquivos_titulos` (`id`, `arquivo`, `created_at`, `titulos_id`, `updated_at`, `deleted_at`) VALUES
(1, 'Nubank_2017-12-10-18-04_00-01-07.pdf', '2018-04-18 00:01:07', 1, '2018-04-18 00:01:07', NULL),
(3, 'julia.9-PAG109-115-18-04_00-11-43.pdf', '2018-04-18 00:11:43', 2, '2018-04-18 00:11:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professores_id` int(10) unsigned DEFAULT NULL COMMENT 'COORDENADOR',
  `curso` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cursos_professores1_idx` (`professores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `professores_id`, `curso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Administração', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(2, NULL, 'Arquitetura e Urbanismo', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(3, NULL, 'Ciência da Computação', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(4, NULL, 'Ciências Contábeis', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(5, NULL, 'Comunicação Social (Publicidade e Propaganda)', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(6, NULL, 'Direito', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(7, NULL, 'Educação Física (Licenciatura)', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(8, NULL, 'Enfermagem', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(9, NULL, 'Engenharia Civil', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(10, NULL, 'Engenharia de Produção', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(11, NULL, 'Farmácia', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(12, NULL, 'Fisioterapia', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(13, NULL, 'Nutrição', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(14, NULL, 'Pedagogia', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(15, NULL, 'Serviço Social', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL),
(16, NULL, 'Turismo', '2016-12-19 22:12:24', '2016-12-19 22:12:24', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ja_ministrou`
--

CREATE TABLE IF NOT EXISTS `ja_ministrou` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professores_id` int(10) unsigned NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `tempo_meses` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_ministra_aula_cursos1_idx` (`cursos_id`),
  KEY `fk_ministra_aula_professores1_idx` (`professores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ministra_aula`
--

CREATE TABLE IF NOT EXISTS `ministra_aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professores_id` int(10) unsigned NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `tempo_meses` int(11) NOT NULL COMMENT 'Tempo de vínculo initerrupto com o curso (MESES)',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_ministra_aula_cursos1_idx` (`cursos_id`),
  KEY `fk_ministra_aula_professores1_idx` (`professores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notificacao` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=398 ;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `notificacao`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 11:25:54', '2018-04-11 11:25:54', NULL),
(2, 'O Professor ADERBAL MIGUEL FERREIRA entrou no sistema.', '2018-04-11 11:28:53', '2018-04-11 11:28:53', NULL),
(3, 'ADERBAL MIGUEL FERREIRA saiu.', '2018-04-11 11:29:21', '2018-04-11 11:29:21', NULL),
(4, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 11:29:30', '2018-04-11 11:29:30', NULL),
(5, 'WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 11:30:56', '2018-04-11 11:30:56', NULL),
(6, 'O Professor WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 11:32:27', '2018-04-11 11:32:27', NULL),
(7, 'WILLIAM ANTONIO ZACARIOTTO saiu.', '2018-04-11 11:32:34', '2018-04-11 11:32:34', NULL),
(8, 'WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 11:32:47', '2018-04-11 11:32:47', NULL),
(9, 'WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 11:33:16', '2018-04-11 11:33:16', NULL),
(10, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 11:38:34', '2018-04-11 11:38:34', NULL),
(11, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 11:43:14', '2018-04-11 11:43:14', NULL),
(12, 'O Professor ADERBAL MIGUEL FERREIRA entrou no sistema.', '2018-04-11 11:43:54', '2018-04-11 11:43:54', NULL),
(13, 'O Professor ADERBAL MIGUEL FERREIRA atualizou seus dados pessoais.', '2018-04-11 11:44:31', '2018-04-11 11:44:31', NULL),
(14, 'O Professor ADERBAL MIGUEL FERREIRA adicionou um comprovante de experiência no magistério.', '2018-04-11 11:50:34', '2018-04-11 11:50:34', NULL),
(15, 'O Professor WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 13:51:53', '2018-04-11 13:51:53', NULL),
(16, 'WILLIAM ANTONIO ZACARIOTTO entrou no sistema.', '2018-04-11 14:56:26', '2018-04-11 14:56:26', NULL),
(17, 'WILLIAM ANTONIO ZACARIOTTO saiu.', '2018-04-11 15:15:17', '2018-04-11 15:15:17', NULL),
(18, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 15:49:17', '2018-04-11 15:49:17', NULL),
(19, 'Milton Carlos Katoo saiu.', '2018-04-11 15:53:30', '2018-04-11 15:53:30', NULL),
(20, 'Milton Carlos Katoo entrou no sistema.', '2018-04-11 16:39:42', '2018-04-11 16:39:42', NULL),
(21, 'Milton Carlos Katoo saiu.', '2018-04-11 16:41:25', '2018-04-11 16:41:25', NULL),
(22, 'Milton Carlos Katoo saiu.', '2018-04-13 14:52:02', '2018-04-13 14:52:02', NULL),
(23, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:52:11', '2018-04-13 14:52:11', NULL),
(24, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:52:24', '2018-04-13 14:52:24', NULL),
(25, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:55:21', '2018-04-13 14:55:21', NULL),
(26, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:55:36', '2018-04-13 14:55:36', NULL),
(27, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:55:51', '2018-04-13 14:55:51', NULL),
(28, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 14:56:24', '2018-04-13 14:56:24', NULL),
(29, 'Milton Carlos Katoo saiu.', '2018-04-13 15:02:19', '2018-04-13 15:02:19', NULL),
(30, 'Milton Carlos Katoo saiu.', '2018-04-13 15:05:36', '2018-04-13 15:05:36', NULL),
(31, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 15:06:06', '2018-04-13 15:06:06', NULL),
(32, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(33, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(34, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(35, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(36, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(37, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(38, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(39, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:09', '2018-04-13 16:14:09', NULL),
(40, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:10', '2018-04-13 16:14:10', NULL),
(41, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:10', '2018-04-13 16:14:10', NULL),
(42, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:19', '2018-04-13 16:14:19', NULL),
(43, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:19', '2018-04-13 16:14:19', NULL),
(44, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(45, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(46, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(47, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(48, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(49, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(50, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(51, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(52, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:20', '2018-04-13 16:14:20', NULL),
(53, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(54, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(55, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(56, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(57, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(58, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(59, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(60, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(61, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(62, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:21', '2018-04-13 16:14:21', NULL),
(63, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:22', '2018-04-13 16:14:22', NULL),
(64, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(65, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(66, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(67, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(68, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(69, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(70, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:25', '2018-04-13 16:14:25', NULL),
(71, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:26', '2018-04-13 16:14:26', NULL),
(72, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:26', '2018-04-13 16:14:26', NULL),
(73, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:26', '2018-04-13 16:14:26', NULL),
(74, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:26', '2018-04-13 16:14:26', NULL),
(75, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(76, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(77, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(78, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(79, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(80, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(81, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(82, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(83, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:31', '2018-04-13 16:14:31', NULL),
(84, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:32', '2018-04-13 16:14:32', NULL),
(85, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:32', '2018-04-13 16:14:32', NULL),
(86, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:42', '2018-04-13 16:14:42', NULL),
(87, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(88, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(89, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(90, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(91, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(92, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(93, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(94, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(95, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(96, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:43', '2018-04-13 16:14:43', NULL),
(97, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(98, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(99, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(100, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(101, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(102, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(103, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(104, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(105, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(106, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(107, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:44', '2018-04-13 16:14:44', NULL),
(108, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:49', '2018-04-13 16:14:49', NULL),
(109, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:49', '2018-04-13 16:14:49', NULL),
(110, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(111, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(112, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(113, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(114, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(115, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(116, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(117, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(118, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:14:50', '2018-04-13 16:14:50', NULL),
(119, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(120, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(121, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(122, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(123, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(124, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(125, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(126, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(127, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(128, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:07', '2018-04-13 16:21:07', NULL),
(129, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(130, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(131, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(132, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(133, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(134, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(135, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(136, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(137, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(138, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:08', '2018-04-13 16:21:08', NULL),
(139, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:09', '2018-04-13 16:21:09', NULL),
(140, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:09', '2018-04-13 16:21:09', NULL),
(141, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(142, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(143, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(144, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(145, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(146, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(147, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(148, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(149, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(150, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(151, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:14', '2018-04-13 16:21:14', NULL),
(152, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:29', '2018-04-13 16:21:29', NULL),
(153, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:29', '2018-04-13 16:21:29', NULL),
(154, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:29', '2018-04-13 16:21:29', NULL),
(155, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:29', '2018-04-13 16:21:29', NULL),
(156, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(157, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(158, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(159, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(160, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(161, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(162, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:30', '2018-04-13 16:21:30', NULL),
(163, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(164, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(165, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(166, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(167, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(168, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(169, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(170, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(171, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:46', '2018-04-13 16:21:46', NULL),
(172, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:47', '2018-04-13 16:21:47', NULL),
(173, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:47', '2018-04-13 16:21:47', NULL),
(174, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(175, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(176, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(177, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(178, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(179, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(180, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(181, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(182, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(183, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(184, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:21:49', '2018-04-13 16:21:49', NULL),
(185, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(186, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(187, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(188, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(189, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(190, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(191, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(192, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(193, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(194, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(195, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:12', '2018-04-13 16:22:12', NULL),
(196, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(197, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(198, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(199, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(200, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(201, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(202, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(203, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(204, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(205, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(206, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:31', '2018-04-13 16:22:31', NULL),
(207, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(208, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(209, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(210, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(211, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(212, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(213, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(214, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(215, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:56', '2018-04-13 16:22:56', NULL),
(216, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:57', '2018-04-13 16:22:57', NULL),
(217, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:22:57', '2018-04-13 16:22:57', NULL),
(218, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(219, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(220, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(221, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(222, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(223, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(224, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(225, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(226, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(227, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(228, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:30:10', '2018-04-13 16:30:10', NULL),
(229, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:50', '2018-04-13 16:31:50', NULL),
(230, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:50', '2018-04-13 16:31:50', NULL),
(231, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:50', '2018-04-13 16:31:50', NULL),
(232, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:50', '2018-04-13 16:31:50', NULL),
(233, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(234, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(235, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(236, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(237, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(238, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(239, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:31:51', '2018-04-13 16:31:51', NULL),
(240, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(241, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(242, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(243, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(244, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(245, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(246, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(247, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:21', '2018-04-13 16:32:21', NULL),
(248, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:22', '2018-04-13 16:32:22', NULL),
(249, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:22', '2018-04-13 16:32:22', NULL),
(250, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:32:22', '2018-04-13 16:32:22', NULL),
(251, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(252, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(253, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(254, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(255, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(256, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(257, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(258, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:15', '2018-04-13 16:33:15', NULL),
(259, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:16', '2018-04-13 16:33:16', NULL),
(260, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:16', '2018-04-13 16:33:16', NULL),
(261, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:16', '2018-04-13 16:33:16', NULL),
(262, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(263, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(264, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(265, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(266, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(267, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(268, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(269, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(270, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(271, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(272, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:33:49', '2018-04-13 16:33:49', NULL),
(273, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(274, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(275, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(276, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(277, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(278, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:02', '2018-04-13 16:35:02', NULL),
(279, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(280, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(281, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(282, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(283, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(284, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(285, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(286, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(287, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(288, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(289, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(290, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(291, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:03', '2018-04-13 16:35:03', NULL),
(292, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:04', '2018-04-13 16:35:04', NULL),
(293, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:04', '2018-04-13 16:35:04', NULL),
(294, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:04', '2018-04-13 16:35:04', NULL),
(295, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(296, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(297, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(298, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(299, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(300, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(301, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(302, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(303, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(304, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(305, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:09', '2018-04-13 16:35:09', NULL),
(306, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(307, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(308, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(309, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(310, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(311, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:10', '2018-04-13 16:35:10', NULL),
(312, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:11', '2018-04-13 16:35:11', NULL),
(313, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:11', '2018-04-13 16:35:11', NULL),
(314, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:11', '2018-04-13 16:35:11', NULL),
(315, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:11', '2018-04-13 16:35:11', NULL),
(316, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:11', '2018-04-13 16:35:11', NULL),
(317, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:24', '2018-04-13 16:35:24', NULL),
(318, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:24', '2018-04-13 16:35:24', NULL),
(319, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(320, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(321, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(322, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(323, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(324, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(325, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(326, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(327, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:25', '2018-04-13 16:35:25', NULL),
(328, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:55', '2018-04-13 16:35:55', NULL),
(329, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(330, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(331, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(332, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(333, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(334, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(335, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(336, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(337, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(338, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:35:56', '2018-04-13 16:35:56', NULL),
(339, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:56', '2018-04-13 16:36:56', NULL),
(340, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:56', '2018-04-13 16:36:56', NULL),
(341, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:56', '2018-04-13 16:36:56', NULL),
(342, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:56', '2018-04-13 16:36:56', NULL),
(343, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:56', '2018-04-13 16:36:56', NULL),
(344, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(345, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(346, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(347, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(348, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(349, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:36:57', '2018-04-13 16:36:57', NULL),
(350, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:37:17', '2018-04-13 16:37:17', NULL),
(351, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:40:19', '2018-04-13 16:40:19', NULL),
(352, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 16:40:25', '2018-04-13 16:40:25', NULL),
(353, 'Milton Carlos Katoo saiu.', '2018-04-13 16:43:17', '2018-04-13 16:43:17', NULL),
(354, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 16:44:01', '2018-04-13 16:44:01', NULL),
(355, 'Milton Carlos Katoo saiu.', '2018-04-13 16:44:05', '2018-04-13 16:44:05', NULL),
(356, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 16:44:12', '2018-04-13 16:44:12', NULL),
(357, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 16:44:27', '2018-04-13 16:44:27', NULL),
(358, 'Milton Carlos Katoo saiu.', '2018-04-13 16:46:03', '2018-04-13 16:46:03', NULL),
(359, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 17:24:39', '2018-04-13 17:24:39', NULL),
(360, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-13 17:25:15', '2018-04-13 17:25:15', NULL),
(361, 'Milton Carlos Katoo entrou no sistema.', '2018-04-13 20:44:07', '2018-04-13 20:44:07', NULL),
(362, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 22:20:09', '2018-04-15 22:20:09', NULL),
(363, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 22:26:02', '2018-04-15 22:26:02', NULL),
(364, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 22:28:24', '2018-04-15 22:28:24', NULL),
(365, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:19:26', '2018-04-15 23:19:26', NULL),
(366, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:20:02', '2018-04-15 23:20:02', NULL),
(367, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:22:55', '2018-04-15 23:22:55', NULL),
(368, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:51:06', '2018-04-15 23:51:06', NULL),
(369, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:51:42', '2018-04-15 23:51:42', NULL),
(370, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:51:57', '2018-04-15 23:51:57', NULL),
(371, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-15 23:52:09', '2018-04-15 23:52:09', NULL),
(372, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-16 00:23:13', '2018-04-16 00:23:13', NULL),
(373, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-16 00:23:19', '2018-04-16 00:23:19', NULL),
(374, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-16 00:28:32', '2018-04-16 00:28:32', NULL),
(375, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:41:03', '2018-04-17 23:41:03', NULL),
(376, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:42:53', '2018-04-17 23:42:53', NULL),
(377, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:42:59', '2018-04-17 23:42:59', NULL),
(378, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:44:32', '2018-04-17 23:44:32', NULL),
(379, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:44:49', '2018-04-17 23:44:49', NULL),
(380, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-17 23:50:52', '2018-04-17 23:50:52', NULL),
(381, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-17 23:53:44', '2018-04-17 23:53:44', NULL),
(382, 'O Professor MILTON CARLOS KATOO adicionou um comprovante de experiência no magistério.', '2018-04-17 23:53:49', '2018-04-17 23:53:49', NULL),
(383, 'O Professor MILTON CARLOS KATOO adicionou um comprovante de experiência no magistério.', '2018-04-17 23:54:02', '2018-04-17 23:54:02', NULL),
(384, 'O Professor MILTON CARLOS KATOO adicionou um comprovante de experiência profissional.', '2018-04-17 23:54:14', '2018-04-17 23:54:14', NULL),
(385, 'O Professor MILTON CARLOS KATOO adicionou um comprovante de experiência profissional.', '2018-04-17 23:54:20', '2018-04-17 23:54:20', NULL),
(386, 'O Professor MILTON CARLOS KATOO adicionou um número de telefone.', '2018-04-17 23:55:29', '2018-04-17 23:55:29', NULL),
(387, 'MILTON CARLOS KATOO saiu.', '2018-04-17 23:56:36', '2018-04-17 23:56:36', NULL),
(388, 'Milton Carlos Katoo entrou no sistema.', '2018-04-17 23:56:44', '2018-04-17 23:56:44', NULL),
(389, 'Milton Carlos Katoo saiu.', '2018-04-17 23:58:34', '2018-04-17 23:58:34', NULL),
(390, 'O Professor MILTON CARLOS KATOO entrou no sistema.', '2018-04-17 23:58:43', '2018-04-17 23:58:43', NULL),
(391, 'O Professor MILTON CARLOS KATOO atualizou seus dados pessoais.', '2018-04-17 23:58:47', '2018-04-17 23:58:47', NULL),
(392, 'O Professor MILTON CARLOS KATOO modificou sua titulação.', '2018-04-18 00:00:56', '2018-04-18 00:00:56', NULL),
(393, 'O Professor MILTON CARLOS KATOO adicionou um comprovante a sua titulação.', '2018-04-18 00:01:07', '2018-04-18 00:01:07', NULL),
(394, 'O Professor MILTON CARLOS KATOO modificou sua titulação.', '2018-04-18 00:11:07', '2018-04-18 00:11:07', NULL),
(395, 'O Professor MILTON CARLOS KATOO adicionou um comprovante a sua titulação.', '2018-04-18 00:11:20', '2018-04-18 00:11:20', NULL),
(396, 'O Professor MILTON CARLOS KATOO excluiu um comprovante de sua titulação.', '2018-04-18 00:11:35', '2018-04-18 00:11:35', NULL),
(397, 'O Professor MILTON CARLOS KATOO adicionou um comprovante a sua titulação.', '2018-04-18 00:11:43', '2018-04-18 00:11:43', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao`
--

CREATE TABLE IF NOT EXISTS `producao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_Prod_id` int(11) NOT NULL,
  `professores_id` int(10) unsigned NOT NULL,
  `desc` text NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Producao_professores1_idx` (`professores_id`),
  KEY `fk_producao_tipo_Prod1_idx` (`tipo_Prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `producao_curso`
--

CREATE TABLE IF NOT EXISTS `producao_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cursos_id` int(11) NOT NULL,
  `producao_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_publicacao_curso_cursos1_idx` (`cursos_id`),
  KEY `fk_publicacao_curso_copy1_producao1_idx` (`producao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(10) unsigned NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `mae` varchar(100) CHARACTER SET utf8 NOT NULL,
  `pai` varchar(100) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(120) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `data_admissao` date NOT NULL,
  `ch_cursos_total` float NOT NULL COMMENT 'CH SEMANAL (TOTAL) EM TODOS OS CURSOS',
  `ch_atividade_compl` float NOT NULL,
  `num_disciplinas` int(11) NOT NULL,
  `tempo_mag_sup_exp_pro_id` int(11) NOT NULL,
  `tempo_exp_pro_fora_mag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_professores_tempo_exp_pro_fora_mag1_idx` (`tempo_exp_pro_fora_mag_id`),
  KEY `fk_professores_tempo_mag_sup_exp_pro1_idx` (`tempo_mag_sup_exp_pro_id`),
  KEY `fk_professores_users1_idx` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `users_id`, `foto`, `nome`, `cpf`, `mae`, `pai`, `endereco`, `email`, `data_admissao`, `ch_cursos_total`, `ch_atividade_compl`, `num_disciplinas`, `tempo_mag_sup_exp_pro_id`, `tempo_exp_pro_fora_mag_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 253, 'milton.jpg', 'MILTON CARLOS KATOO', '29032543890', 'MARIA DA GLORIA MARCHIORETTO KATOO', 'KOGI KATOO', 'RUA DR MIGUEL COUTO, 81', 'mckatoo@yahoo.com.br', '0202-01-08', 4, 5, 6, 30, 30, '2018-04-15 22:28:24', '2018-04-17 23:58:47', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao`
--

CREATE TABLE IF NOT EXISTS `publicacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_Pub_id` int(11) NOT NULL,
  `professores_id` int(10) unsigned NOT NULL,
  `desc` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Publicacao_tipo_Pub1_idx` (`tipo_Pub_id`),
  KEY `fk_Publicacao_professores1_idx` (`professores_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacao_curso`
--

CREATE TABLE IF NOT EXISTS `publicacao_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publicacao_id` int(11) NOT NULL,
  `cursos_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicacao_curso_publicacao1_idx` (`publicacao_id`),
  KEY `fk_publicacao_curso_cursos1_idx` (`cursos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones_prof`
--

CREATE TABLE IF NOT EXISTS `telefones_prof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefone` varchar(20) NOT NULL,
  `professores_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_telefones_professores_idx` (`professores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `telefones_prof`
--

INSERT INTO `telefones_prof` (`id`, `telefone`, `professores_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '(19) 3863-6483', 13, '2018-04-17 23:55:28', '2018-04-17 23:55:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo_exp_pro_fora_mag`
--

CREATE TABLE IF NOT EXISTS `tempo_exp_pro_fora_mag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `tempo_exp_pro_fora_mag`
--

INSERT INTO `tempo_exp_pro_fora_mag` (`id`, `tempo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 8, '2018-04-15 22:28:24', '2018-04-15 22:28:24', NULL),
(15, 8, '2018-04-15 22:28:51', '2018-04-15 22:28:51', NULL),
(16, 14, '2018-04-15 23:10:59', '2018-04-15 23:10:59', NULL),
(17, 16, '2018-04-15 23:12:28', '2018-04-15 23:12:28', NULL),
(18, 17, '2018-04-15 23:14:09', '2018-04-15 23:14:09', NULL),
(19, 18, '2018-04-15 23:17:13', '2018-04-15 23:17:13', NULL),
(20, 18, '2018-04-15 23:19:25', '2018-04-15 23:19:25', NULL),
(21, 20, '2018-04-15 23:20:01', '2018-04-15 23:20:01', NULL),
(22, 21, '2018-04-15 23:22:55', '2018-04-15 23:22:55', NULL),
(23, 22, '2018-04-15 23:23:55', '2018-04-15 23:23:55', NULL),
(24, 22, '2018-04-15 23:51:05', '2018-04-15 23:51:05', NULL),
(25, 22, '2018-04-15 23:51:42', '2018-04-15 23:51:42', NULL),
(26, 25, '2018-04-15 23:51:56', '2018-04-15 23:51:56', NULL),
(27, 25, '2018-04-15 23:52:09', '2018-04-15 23:52:09', NULL),
(28, 27, '2018-04-16 00:23:13', '2018-04-16 00:23:13', NULL),
(29, 27, '2018-04-16 00:23:19', '2018-04-16 00:23:19', NULL),
(30, 27, '2018-04-16 00:28:32', '2018-04-16 00:28:32', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tempo_mag_sup_exp_pro`
--

CREATE TABLE IF NOT EXISTS `tempo_mag_sup_exp_pro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `tempo_mag_sup_exp_pro`
--

INSERT INTO `tempo_mag_sup_exp_pro` (`id`, `tempo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(14, 7, '2018-04-15 22:28:24', '2018-04-15 22:28:24', NULL),
(15, 7, '2018-04-15 22:28:51', '2018-04-15 22:28:51', NULL),
(16, 14, '2018-04-15 23:10:59', '2018-04-15 23:10:59', NULL),
(17, 16, '2018-04-15 23:12:28', '2018-04-15 23:12:28', NULL),
(18, 17, '2018-04-15 23:14:09', '2018-04-15 23:14:09', NULL),
(19, 18, '2018-04-15 23:17:13', '2018-04-15 23:17:13', NULL),
(20, 18, '2018-04-15 23:19:25', '2018-04-15 23:19:25', NULL),
(21, 20, '2018-04-15 23:20:01', '2018-04-15 23:20:01', NULL),
(22, 21, '2018-04-15 23:22:55', '2018-04-15 23:22:55', NULL),
(23, 22, '2018-04-15 23:23:54', '2018-04-15 23:23:54', NULL),
(24, 22, '2018-04-15 23:51:05', '2018-04-15 23:51:05', NULL),
(25, 22, '2018-04-15 23:51:42', '2018-04-15 23:51:42', NULL),
(26, 25, '2018-04-15 23:51:56', '2018-04-15 23:51:56', NULL),
(27, 25, '2018-04-15 23:52:09', '2018-04-15 23:52:09', NULL),
(28, 27, '2018-04-16 00:23:13', '2018-04-16 00:23:13', NULL),
(29, 27, '2018-04-16 00:23:18', '2018-04-16 00:23:18', NULL),
(30, 27, '2018-04-16 00:28:31', '2018-04-16 00:28:31', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_Prod`
--

CREATE TABLE IF NOT EXISTS `tipo_Prod` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_Pub`
--

CREATE TABLE IF NOT EXISTS `tipo_Pub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_User`
--

CREATE TABLE IF NOT EXISTS `tipo_User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `tipo_User`
--

INSERT INTO `tipo_User` (`id`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 'Administrador', '2018-04-11 11:20:55', '2018-04-11 14:24:01', NULL),
(7, 'Gerente', '2018-04-11 11:23:40', '2018-04-11 14:24:08', NULL),
(8, 'Professor', '2018-04-11 11:23:42', '2018-04-11 14:24:15', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `titulos`
--

CREATE TABLE IF NOT EXISTS `titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `professores_id` int(10) unsigned NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `curso` varchar(100) NOT NULL,
  `peso` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_titulos_professores1_idx` (`professores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `titulos`
--

INSERT INTO `titulos` (`id`, `professores_id`, `titulo`, `curso`, `peso`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 13, 'GRADUAÇÃO', 'GHDFGSDFGSDFG', 1, '2018-04-18 00:00:56', '2018-04-18 00:00:56', NULL),
(2, 13, 'PÓS-DOUTORADO', 'HHSDG SDFG SDFG DFG', 5, '2018-04-18 00:11:07', '2018-04-18 00:11:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tipo_User_id` int(11) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `fk_users_tipo_User1_idx` (`tipo_User_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=254 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tipo_User_id`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 'Milton Carlos Katoo', 'mckatoo@gmail.com', 6, '$2y$10$MO3GXB8SwcRVeSmOBP7MAe5MmfC92XYvHfebKAsa7CJlMEQqJEQTO', 'Tffz0hlv01EeVmc488VUiA9hAiT7W1yT8T2UrBL9LA5EurtTOF59MqDOPOFm', '2018-04-11 00:00:53', '2018-04-17 23:58:34', NULL),
(11, 'WILLIAM ANTONIO ZACARIOTTO', 'direcao.iesi@unip.br', 6, '$2y$10$ZDDQt/9ky6YxKEf4c3f1sO9cBLXfL3F4097CSnUQ0Vp4eNWkYCyOq', 'WDk0lXXB5WJxWG6jYc190qfTcLoY9hlj8uULiOkdhz3CBmxjf8fHeq6doJgu', '2018-04-11 11:30:56', '2018-04-11 15:15:17', NULL),
(12, 'WILLIAM ANTONIO ZACARIOTTO', 'william@william.com', 8, '$2y$10$Vdjj9hPJwiJGYchAXEhM2ubDGSmbB4P6jii0tTRoe.xGBgdhZ6clu', 'AiBVwsH2w6dLeDHMwg4U2RIFabw1eUrjQOz8hIi9O0imTdog34CyqCC84AB2', '2018-04-11 11:32:27', '2018-04-11 11:32:34', NULL),
(175, 'ADERBAL MIGUEL FERREIRA', 'ADERBAL@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(176, 'ALESSANDRA FERRACINI BALBINO', 'ALESSANDRA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(177, 'ALESSANDRA GOMES VARISCO', 'VARISCO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(178, 'ANA CAROLINE C NOGUEIRA', 'ANA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(179, 'ANTONIO CARLOS RIBEIRO', 'ANTONIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(180, 'BERNARDO JOSE GUILHERME DE ARAGÃO', 'BERNARDO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(181, 'BIBIANO FRANCISCO ELOI JUNIOR', 'BIBIANO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(182, 'BRUNO MARCONI RIBOLDI', 'BRUNO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(183, 'CAMILA DA COSTA P MARTINS', 'CAMILA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(184, 'CARLOS ROBERTO GOMES JUNIOR', 'CARLOS@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(185, 'CECILIA NOGUEIRA STEFANINI', 'CECILIA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(186, 'CIDINEIA DA COSTA LUVISON', 'CIDINEIA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(187, 'CLAUDIA MARIA PERES', 'CLAUDIA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(188, 'CLAUDIO HENRIQUE BUENO MARTINI', 'CLAUDIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(189, 'CRISTIANE DE SOUSA', 'CRISTIANE@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(190, 'CRISTINA BRESSAGLIA LUCON', 'CRISTINA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(191, 'DANIEL MARCUS GIGLIOLI OLIVEIRA', 'DANIEL@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(192, 'DANIEL NICOLINI SILVA', 'NICOLINI@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(193, 'DANIELA CRISTINA SANDY TUROLE', 'DANIELA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(194, 'DEISE A CEGA FERNANDES', 'DEISE@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(195, 'DENISE DE SOUZA RIBEIRO', 'dfdsfsdfsdfsdfsdf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(196, 'DIEGO APARECIDO RAMOS', 'DIEGO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(197, 'ELAINE RIBEIRO', 'ELAINE@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(198, 'ELIANA REGINA RUFINO', 'ELIANA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(199, 'ELIANE ANTONIA DE CASTRO', 'ELIANE@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(200, 'ELIANE CRISTINA G AQUINO', 'AQUINO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(201, 'EVANDRO JOSE THEODORO', 'EVANDRO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(202, 'EVANDRO ROSSI CANIVEZI', 'df@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(203, 'FABIO BORGES DE OLIVEIRA', 'FABIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(204, 'FERNANDA PARENTONI AVANCINI', 'FERNANDA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(205, 'GABRIEL BORGES DELFINO', 'GABRIEL@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(206, 'HELEN R CAMARGO CATARINO', 'HELEN@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(207, 'JOAO PAULO M DE SOUZA', 'JOAOPAULO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(208, 'JOAQUIM MARIA FERREIRA ANTUNES NETO', 'JOAQUIM@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(209, 'JONATHAS TOGNOLO', 'JONATHAS@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(210, 'JOSE ALEXANDRE MANOEL', 'JOSE@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(211, 'JOSE ANTONIO TIBURCIO', 'TIBURCIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(212, 'JOSE ANTONIO ZAGO', 'ZAGO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(213, 'JOSE AUGUSTO A LABEGALINI', 'LABEGALINI@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(214, 'JOSE CARLOS SIMÃO CARDOSO JUNIOR', 'SIMAO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(215, 'JOSE GERALDO ROMANELLO BUENO', 'ROMANELLO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(216, 'JOSE MARCOS ROMÃO JUNIOR', 'ROMAO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(217, 'JOSE RICARDO GOMES FERREIRA', 'RICARDO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(218, 'JULIANA C FREITAS CESCON', 'JULIANA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(219, 'JULIO CESAR MUNIZ', 'JULIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(220, 'JUSSARA AGUIAR', 'JUSSARA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(221, 'MARA FERNANDA ALVES ORTIZ DE ALMEIDA', 'MARA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(222, 'MARCIO MARTINS', 'MARCIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(223, 'MARCOS ANTONIO PELIZER', 'MARCOS@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(224, 'MARCOS BRANDINO', 'BRANDINO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(225, 'MARILIA BUENO SANTIAGO', 'MARILIA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(226, 'MARINA DE O FERREIRA', 'MARINA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(227, 'MAURICIO GUILHERME QUILEZ SOUZA', 'MAURICIO@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(228, 'MELCHIOR ANTONIO MOMESSO', 'MELCHIOR@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(229, 'MONICA CLAVICO ALVES', 'MONICAdf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(230, 'MONICA CRISTINA P ANDRADE', 'MONICA@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(231, 'MONICA FURQUIM DE CAMPOS', 'dfFURQUIM@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(232, 'PATRICIA ELAINE BELLINI', 'PATRICIAdf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(233, 'PATRICIA FONSECA COSTA', 'dPATRICIAf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(234, 'PAULO JOSE DE CAMPOS NOGUEIRA', 'dPAULOf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(235, 'PAULO ROBERTO DE OLIVEIRA PRETO', 'dFSDFfdffhdg@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(236, 'POLIANA A DE ARRUDA', 'dPOLIANAf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(237, 'RENAN HENRIQUE LAZARI', 'dFSDFf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(238, 'ROBERTO BATISTA DE SOUZA', 'dSDAFFDGf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(239, 'RODOLFO CARDOSO BUONTEMPO', 'dCVBVCf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(240, 'RODRIGO PIETRO LEITE', 'dWEREWf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(241, 'ROGERIO JOSE S CHAVES', 'dSDEWRf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(242, 'ROMULO JOSE FERRARI', 'dfDFSCXV@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(243, 'SAMIRA MAXIMIANO SCHIAVON', 'dXCVDSFf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(244, 'SIDNEI A DE OLIVEIRA', 'dXCVERXVCf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(245, 'SIMONE CARDOSO LEON', 'dGHFGHFSFDf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(246, 'SUENIMEIRE VIEIRA', 'dSDFCBf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(247, 'THABATA C DE G DOMINGUES', 'dXCHDFGSDf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(248, 'THIAGO DE SOUZA FOLADOR', 'dfSDFFHEHFCH@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(249, 'THUE C FERRAZ DE ORNELLAS', 'dffsadfhfgherfdsfb@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(250, 'TRISTANA CEZARETTO', 'dsdfhrtgf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(251, 'VALTER A F DA SILVEIRA', 'ddfgdfsfgdff@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(252, 'WILKIAS DA SILVA', 'ddfgdghgdfgf@iesi.com', 8, '$2y$10$tpH3FcTwzJ2UuuCcK8GiD.r7dJT7rb5u/WFgYbunLGe..4EUDvCfG', NULL, '2018-04-11 15:49:57', '2018-04-11 15:54:22', NULL),
(253, 'MILTON CARLOS KATOO', 'mckatoo@yahoo.com.br', 8, '$2y$10$sYxOtqNtnGLTT4rbeO4az.htSlXPSgfSJMei61AZ77ZYl5mkWOZD2', '04ieUEd9DiQ2eZaA4UOBYjaLbjxPq0cFpo1V8lDiA5FJhat90HdoL6gKwpNn', '2018-04-13 16:14:09', '2018-04-17 23:56:36', NULL);

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `arquivos_producao`
--
ALTER TABLE `arquivos_producao`
  ADD CONSTRAINT `fk_arquivos_producao_producao1` FOREIGN KEY (`producao_id`) REFERENCES `producao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivos_publicacao`
--
ALTER TABLE `arquivos_publicacao`
  ADD CONSTRAINT `fk_arquivos_publicacao_publicacao1` FOREIGN KEY (`publicacao_id`) REFERENCES `publicacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivos_tempo_exp`
--
ALTER TABLE `arquivos_tempo_exp`
  ADD CONSTRAINT `fk_arquivos_tempo_exp_tempo_exp_pro_fora_mag1` FOREIGN KEY (`tempo_exp_pro_fora_mag_id`) REFERENCES `tempo_exp_pro_fora_mag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivos_tempo_mag`
--
ALTER TABLE `arquivos_tempo_mag`
  ADD CONSTRAINT `fk_arquivos_tempo_mag_tempo_mag_sup_exp_pro1` FOREIGN KEY (`tempo_mag_sup_exp_pro_id`) REFERENCES `tempo_mag_sup_exp_pro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `arquivos_titulos`
--
ALTER TABLE `arquivos_titulos`
  ADD CONSTRAINT `fk_arquivos_titulos_titulos1` FOREIGN KEY (`titulos_id`) REFERENCES `titulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_cursos_professores1` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `ja_ministrou`
--
ALTER TABLE `ja_ministrou`
  ADD CONSTRAINT `fk_ministra_aula_cursos10` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ministra_aula_professores10` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `ministra_aula`
--
ALTER TABLE `ministra_aula`
  ADD CONSTRAINT `fk_ministra_aula_cursos1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ministra_aula_professores1` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `producao`
--
ALTER TABLE `producao`
  ADD CONSTRAINT `fk_Producao_professores1` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_producao_tipo_Prod1` FOREIGN KEY (`tipo_Prod_id`) REFERENCES `tipo_Prod` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `producao_curso`
--
ALTER TABLE `producao_curso`
  ADD CONSTRAINT `fk_publicacao_curso_copy1_producao1` FOREIGN KEY (`producao_id`) REFERENCES `producao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacao_curso_cursos10` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `fk_professores_tempo_exp_pro_fora_mag1` FOREIGN KEY (`tempo_exp_pro_fora_mag_id`) REFERENCES `tempo_exp_pro_fora_mag` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professores_tempo_mag_sup_exp_pro1` FOREIGN KEY (`tempo_mag_sup_exp_pro_id`) REFERENCES `tempo_mag_sup_exp_pro` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_professores_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `publicacao`
--
ALTER TABLE `publicacao`
  ADD CONSTRAINT `fk_Publicacao_professores1` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Publicacao_tipo_Pub1` FOREIGN KEY (`tipo_Pub_id`) REFERENCES `tipo_Pub` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `publicacao_curso`
--
ALTER TABLE `publicacao_curso`
  ADD CONSTRAINT `fk_publicacao_curso_cursos1` FOREIGN KEY (`cursos_id`) REFERENCES `cursos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_publicacao_curso_publicacao1` FOREIGN KEY (`publicacao_id`) REFERENCES `publicacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `telefones_prof`
--
ALTER TABLE `telefones_prof`
  ADD CONSTRAINT `fk_telefones_professores` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `titulos`
--
ALTER TABLE `titulos`
  ADD CONSTRAINT `fk_titulos_professores1` FOREIGN KEY (`professores_id`) REFERENCES `professores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_tipo_User1` FOREIGN KEY (`tipo_User_id`) REFERENCES `tipo_User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
