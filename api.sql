-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.11.193.130:3306
-- Tempo de Geração: 25/03/2016 às 14:08
-- Versão do servidor: 5.5.45
-- Versão do PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `api`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` int(11) NOT NULL,
  `number` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `boards_status_id_foreign_key` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `boards`
--

INSERT INTO `boards` (`id`, `status_id`, `number`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '2015-11-05 20:28:58', '2015-12-11 02:01:48'),
(2, 1, '2', '2015-11-05 20:28:58', '2015-11-06 01:28:58'),
(3, 1, '3', '2015-11-05 20:30:04', '2015-11-06 01:30:04'),
(4, 1, '4', '2015-11-05 20:30:04', '2015-11-06 01:30:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Filés', NULL, '2015-11-01 17:18:42'),
(2, 'Frangos', NULL, '2015-11-01 17:18:42'),
(3, 'Peixes', NULL, '2015-11-01 17:18:42'),
(4, 'Massas', NULL, '2015-11-01 17:18:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `file_upload`
--

CREATE TABLE IF NOT EXISTS `file_upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(95) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ingredients`
--

CREATE TABLE IF NOT EXISTS `ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '\n',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Fazendo dump de dados para tabela `ingredients`
--

INSERT INTO `ingredients` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Filé', NULL, '2015-11-01 17:18:42'),
(2, 'Presunto', NULL, '2015-11-01 17:18:42'),
(3, 'Queijo', NULL, '2015-11-01 17:18:42'),
(4, 'Picles', NULL, '2015-11-01 17:18:42'),
(5, 'Arroz', NULL, '2015-11-01 17:18:42'),
(6, 'Batatas Fritas', NULL, '2015-11-01 17:18:42'),
(7, 'Molho de Nata', NULL, '2015-11-01 17:18:42'),
(8, 'Molho de Tomate', NULL, '2015-11-01 17:18:42'),
(9, 'Molho de Queijo', NULL, '2015-11-01 17:18:42'),
(10, 'Molho Madeira', NULL, '2015-11-01 17:18:42'),
(11, 'Batatas Noisette', NULL, '2015-11-01 17:18:42'),
(12, 'Molho de Pimenta', NULL, '2015-11-01 17:18:42'),
(13, 'Brócolis', NULL, '2015-11-01 17:18:42'),
(14, 'Bacon', NULL, '2015-11-01 17:18:42'),
(15, 'Queijo Provolone', NULL, '2015-11-01 17:18:42'),
(16, 'Tomate Seco', NULL, '2015-11-01 17:18:42'),
(17, 'Rúcula', NULL, '2015-11-01 17:18:42'),
(18, 'Batatas Suiças', NULL, '2015-11-01 17:18:42'),
(19, 'Acebolado', NULL, '2015-11-01 17:18:42'),
(20, 'Alho e oléo', NULL, '2015-11-01 17:18:42'),
(21, 'Molho Barbecue', NULL, '2015-11-01 17:18:42'),
(22, 'Molho Requefort', NULL, '2015-11-01 17:18:42'),
(23, 'Purê de Cenoura', NULL, '2015-11-01 17:18:42'),
(24, 'Folhas Verdes', NULL, '2015-11-01 17:18:42'),
(25, 'Tomate', NULL, '2015-11-01 17:18:42'),
(26, 'Cenoura', NULL, '2015-11-01 17:18:42'),
(27, 'Beterraba', NULL, '2015-11-01 17:18:42'),
(28, 'Banana a Milanesa', NULL, '2015-11-01 17:18:42'),
(29, 'Farofa', NULL, '2015-11-01 17:18:42'),
(30, 'Legumes', NULL, '2015-11-01 17:18:42'),
(31, 'Alcaparras', NULL, '2015-11-01 17:18:42'),
(32, 'Camarão', NULL, '2015-11-01 17:18:42'),
(33, 'Champignon', NULL, '2015-11-01 17:18:42'),
(34, 'Batatas ao Vapor', NULL, '2015-11-01 17:18:42'),
(35, 'Molho de Camarão', NULL, '2015-11-01 17:18:42'),
(36, 'Batata Palha', NULL, '2015-11-01 17:18:42'),
(37, 'Manjericão', NULL, '2015-11-01 17:18:42'),
(38, 'Carne Moída', NULL, '2015-11-01 17:18:42'),
(39, 'Alho', NULL, '2015-11-01 17:18:42'),
(40, 'Musssarela', NULL, '2015-11-01 17:18:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `opinions`
--

CREATE TABLE IF NOT EXISTS `opinions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `grade` int(11) NOT NULL,
  `opinion` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `opinions`
--

INSERT INTO `opinions` (`id`, `grade`, `opinion`, `created_at`, `updated_at`) VALUES
(1, 2, 'Um lixo', '2015-11-22 02:57:11', '2015-11-22 02:57:11'),
(2, 4, 'Adorei', '2015-12-10 06:58:47', '2015-12-10 06:58:47'),
(3, 4, 'Adorei', '2015-12-10 06:59:07', '2015-12-10 06:59:07'),
(4, 4, 'Adorei', '2015-12-10 07:04:16', '2015-12-10 07:04:16'),
(5, 4, 'Adorei', '2015-12-10 07:24:40', '2015-12-10 07:24:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `file_upload_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`categories_id`),
  KEY `fk_products_file_upload1_idx` (`file_upload_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Fazendo dump de dados para tabela `products`
--

INSERT INTO `products` (`id`, `categories_id`, `file_upload_id`, `name`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Filé recheado', 'Filé recheado com presunto, queijo e picles. Acompanha arroz.', '34.70', 100, NULL, '2015-11-01 17:18:42'),
(2, 1, 0, 'Filé Rahmshinitzel', 'Filé a milanesa com nata. Acompanha arroz.', '35.60', 100, NULL, '2015-11-01 17:18:42'),
(3, 1, 0, 'Filé recheado com nata', 'Filé recheado com presunto, queijo e picles. Acompanha arroz', '39.80', 100, NULL, '2015-11-01 17:18:42'),
(4, 1, 0, 'Filé recheado com presunto e molho de tomate', 'Filé recheado com presunto e queijo. Acompanha arroz e fritas.', '38.90', 100, NULL, '2015-11-01 17:18:42'),
(5, 1, 0, 'Filé Recheado com molho de queijo', 'Filé recheado com presunto e queijo. Acompanha arroz e fritas.', '40.80', 100, NULL, '2015-11-01 17:18:42'),
(6, 1, 0, 'Filé a milanesa', 'Filé a milanesa. Acompanha arroz', '33.90', 100, NULL, '2015-11-01 17:18:42'),
(7, 1, 0, 'Filé grelhado ao molho madeira', 'Filé grelhado ao molho madeira. Acompanha arroz e batatas noisette.', '40.90', 100, NULL, '2015-11-01 17:18:42'),
(8, 1, 0, 'Filé grelhado com fritas', 'Filé grelhado. Acompanha arroz e fritas.', '34.50', 100, NULL, '2015-11-01 17:18:42'),
(9, 1, 0, 'Filé grelhado com molho de pimenta', 'Filé grelhado. Acompanha arroz e brócolis', '40.90', 100, NULL, '2015-11-01 17:18:42'),
(10, 1, 0, 'Filé recheado com bacon e provolone', 'Filé recheado com queijo provolone, bacon e molho de nata. Acompanha arroz e batatas noisette.', '44.50', 100, NULL, '2015-11-01 17:18:42'),
(11, 1, 0, 'Filé grelhado com rúcula e tomates secos', 'Filé grelhado. Acompanha arroz e batata suiça.', '41.90', 100, NULL, '2015-11-01 17:18:42'),
(12, 1, 0, 'Filé grelhado ao molho de queijo', 'Filé grelhado ao queijo. Acompanha arroz e batata noisette.', '42.80', 100, NULL, '2015-11-01 17:18:42'),
(13, 1, 0, 'Filé grelhado acebolado', 'Filé grelhado. Acompanha arroz', '35.50', 100, NULL, '2015-11-01 17:18:42'),
(14, 1, 0, 'Filé grelhado ao alho e oléo', 'Filé grelhado. Acompanha arroz.', '33.50', 100, NULL, '2015-11-01 17:18:42'),
(15, 1, 0, 'Filé grelhado ao molho barbecue', 'Filé grelhado. Acompanha arroz e anéis de cebola a milanesa.', '43.50', 100, NULL, '2015-11-01 17:18:42'),
(16, 1, 0, 'Filé grelhado ao molho requefort', 'Filé grelhado. Acompanha arroz com brócolis e purê de cenoura.', '47.50', 100, NULL, '2015-11-01 17:18:42'),
(17, 2, 0, 'Rahmschinitzel de frango', 'Filé de frango a milanesa com molho de nata, arroz e anéis de cebola.', '33.80', 100, NULL, '2015-11-01 17:18:42'),
(18, 2, 0, 'Frango a tirol', 'Peito desossado grelhado com nata, arroz e batatas noisette.', '33.80', 100, NULL, '2015-11-01 17:18:42'),
(19, 2, 0, 'Light', 'Peito grelhado com mix de folhas verdes, tomate, cenoura e beterraba', '27.90', 100, NULL, '2015-11-01 17:18:42'),
(20, 2, 0, 'a Bràsileira', 'Peito grelhado, arroz, banana a milanesa, farofa e fritas.', '31.20', 100, NULL, '2015-11-01 17:18:42'),
(21, 2, 0, 'a Garnì', 'Peito desossado grelhado com arroz e legumes.', '27.90', 100, NULL, '2015-11-01 17:18:42'),
(22, 2, 0, 'Frango recheado', 'Filé recheado com presunto e queijo. Acompanha arroz e fritas.', '38.90', 100, NULL, '2015-11-01 17:18:42'),
(23, 3, 0, 'Ao molho de queijo', 'Peixe grelhado com molho de queijo. Acompanha arroz e batatas noisette.', '85.50', 100, NULL, '2015-11-01 17:18:42'),
(24, 3, 0, 'Light', 'Peixe grelhado. Acompanha arroz branco e seleta de legumes.', '79.90', 100, NULL, '2015-11-01 17:18:42'),
(25, 3, 0, 'a Belle meunièr', 'Peixe grelhado com alcaparras, camarão e champignon. Acompanha arroz e batatas ao vapor.', '88.50', 100, NULL, '2015-11-01 17:18:42'),
(26, 3, 0, 'Ao molho de camarão', 'Peixe grelhado com molho de camarão. Acompanha arroz e batata palha.', '85.50', 100, NULL, '2015-11-01 17:18:42'),
(27, 4, 0, 'Sorretino', 'Mussarela, tomate e manjericão. Acompanha escalopes de filé.', '58.90', 100, NULL, '2015-11-01 17:18:42'),
(28, 4, 0, 'Massa de arroz com bolonhesa', 'Massa de arroz com molho de carne moída.', '47.50', 100, NULL, '2015-11-01 17:18:42'),
(29, 4, 0, 'Penne com molho pesto', 'Massa de arroz tipo penne com molho a base de manjericão e alho.', '43.90', 100, NULL, '2015-11-01 17:18:42');

-- --------------------------------------------------------

--
-- Estrutura para tabela `products_ingredients`
--

CREATE TABLE IF NOT EXISTS `products_ingredients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `ingredients_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `products_id_index_1` (`products_id`),
  KEY `ingredients_id_index_1` (`ingredients_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

--
-- Fazendo dump de dados para tabela `products_ingredients`
--

INSERT INTO `products_ingredients` (`id`, `products_id`, `ingredients_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(2, 1, 2, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(3, 1, 3, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(4, 1, 4, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(5, 1, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(6, 2, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(7, 2, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(8, 2, 7, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(9, 3, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(10, 3, 2, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(11, 3, 3, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(12, 3, 4, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(13, 3, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(14, 4, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(15, 4, 8, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(16, 4, 2, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(17, 4, 3, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(18, 4, 6, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(19, 5, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(20, 5, 9, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(21, 5, 2, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(22, 5, 3, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(23, 5, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(24, 5, 6, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(25, 6, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(26, 6, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(27, 7, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(28, 7, 10, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(29, 7, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(30, 7, 11, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(31, 8, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(32, 8, 6, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(33, 8, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(34, 9, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(35, 9, 12, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(36, 9, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(37, 9, 13, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(38, 10, 14, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(39, 10, 15, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(40, 10, 7, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(41, 10, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(42, 10, 11, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(43, 11, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(44, 11, 16, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(45, 11, 17, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(46, 11, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(47, 11, 18, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(48, 12, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(49, 12, 9, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(50, 12, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(51, 12, 11, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(52, 13, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(53, 13, 19, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(54, 13, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(55, 14, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(56, 14, 20, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(57, 14, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(58, 15, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(59, 15, 21, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(60, 15, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(61, 16, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(62, 16, 22, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(63, 16, 13, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(64, 16, 23, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(65, 17, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(66, 17, 7, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(67, 17, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(68, 18, 1, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(69, 18, 7, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(70, 18, 11, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(71, 19, 24, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(72, 19, 25, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(73, 19, 26, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(74, 19, 27, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(75, 20, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(76, 20, 28, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(77, 20, 29, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(78, 20, 6, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(79, 21, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(80, 21, 30, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(81, 22, 2, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(82, 22, 3, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(83, 22, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(84, 22, 6, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(85, 23, 9, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(86, 23, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(87, 23, 11, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(88, 24, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(89, 23, 30, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(90, 25, 31, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(91, 25, 32, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(92, 25, 33, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(93, 25, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(94, 25, 36, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(95, 26, 35, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(96, 26, 5, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(97, 26, 36, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(98, 27, 40, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(99, 27, 25, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(100, 27, 37, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(101, 28, 38, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(102, 29, 37, '2015-11-01 17:18:42', '0000-00-00 00:00:00'),
(103, 29, 39, '2015-11-01 17:18:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `requests`
--

CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boards_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_requests_boards1_idx` (`boards_id`),
  KEY `fk_requests_status1_idx` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `requests`
--

INSERT INTO `requests` (`id`, `boards_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2015-12-10 22:00:20', '2015-12-11 03:00:20'),
(2, 1, 1, '2015-12-24 16:01:08', '2015-12-24 21:01:08');

-- --------------------------------------------------------

--
-- Estrutura para tabela `requests_observation`
--

CREATE TABLE IF NOT EXISTS `requests_observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requests_products_id` int(11) NOT NULL,
  `observation` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_requests_observation_requests_products1_idx` (`requests_products_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `requests_products`
--

CREATE TABLE IF NOT EXISTS `requests_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requests_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `unity_price` decimal(10,2) DEFAULT NULL,
  `quantity` int(3) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_requests_products_requests1_idx` (`requests_id`),
  KEY `fk_requests_products_products1_idx` (`products_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Fazendo dump de dados para tabela `requests_products`
--

INSERT INTO `requests_products` (`id`, `requests_id`, `products_id`, `unity_price`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '34.70', 1, '34.70', '2015-12-10 22:00:20', '2015-12-11 03:00:20'),
(2, 1, 2, '35.60', 1, '35.60', '2015-12-10 22:00:20', '2015-12-11 03:00:20'),
(3, 1, 3, '39.80', 1, '39.80', '2015-12-10 22:00:20', '2015-12-11 03:00:20'),
(4, 1, 4, '38.90', 1, '38.90', '2015-12-10 22:00:20', '2015-12-11 03:00:20'),
(5, 1, 1, '34.70', 1, '34.70', '2015-12-10 22:31:55', '2015-12-11 03:31:55'),
(6, 1, 2, '35.60', 1, '35.60', '2015-12-10 22:31:55', '2015-12-11 03:31:55'),
(7, 1, 3, '39.80', 1, '39.80', '2015-12-10 22:31:55', '2015-12-11 03:31:55'),
(8, 1, 4, '38.90', 1, '38.90', '2015-12-10 22:31:55', '2015-12-11 03:31:55'),
(9, 2, 7, '40.90', 1, '40.90', '2015-12-24 16:01:08', '2015-12-24 21:01:08'),
(10, 2, 7, '40.90', 1, '40.90', '2015-12-24 16:01:41', '2015-12-24 21:01:41'),
(11, 2, 8, '34.50', 1, '34.50', '2015-12-24 16:01:41', '2015-12-24 21:01:41'),
(12, 2, 7, '40.90', 1, '40.90', '2015-12-24 16:01:54', '2015-12-24 21:01:54'),
(13, 2, 8, '34.50', 1, '34.50', '2015-12-24 16:01:54', '2015-12-24 21:01:54'),
(14, 2, 1, '34.70', 2, '69.40', '2015-12-24 16:15:42', '2015-12-24 21:15:42'),
(15, 2, 3, '39.80', 1, '39.80', '2015-12-24 16:15:42', '2015-12-24 21:15:42'),
(16, 2, 11, '41.90', 1, '41.90', '2015-12-24 16:15:42', '2015-12-24 21:15:42'),
(17, 2, 12, '42.80', 1, '42.80', '2015-12-24 16:15:42', '2015-12-24 21:15:42'),
(18, 2, 1, '34.70', 2, '69.40', '2015-12-24 16:20:42', '2015-12-24 21:20:42'),
(19, 2, 3, '39.80', 1, '39.80', '2015-12-24 16:20:42', '2015-12-24 21:20:42'),
(20, 2, 11, '41.90', 1, '41.90', '2015-12-24 16:20:42', '2015-12-24 21:20:42'),
(21, 2, 12, '42.80', 1, '42.80', '2015-12-24 16:20:42', '2015-12-24 21:20:42'),
(22, 2, 9, '40.90', 1, '40.90', '2015-12-24 16:21:22', '2015-12-24 21:21:22'),
(23, 2, 9, '40.90', 1, '40.90', '2015-12-24 16:22:45', '2015-12-24 21:22:45'),
(24, 2, 23, '85.50', 3, '256.50', '2015-12-24 16:23:30', '2015-12-24 21:23:30'),
(25, 2, 6, '33.90', 2, '67.80', '2015-12-24 16:23:30', '2015-12-24 21:23:30'),
(26, 2, 9, '40.90', 4, '163.60', '2015-12-24 16:47:38', '2015-12-24 21:47:38'),
(27, 2, 6, '33.90', 4, '135.60', '2015-12-24 18:23:57', '2015-12-24 23:23:57'),
(28, 2, 2, '35.60', 8, '284.80', '2015-12-24 18:23:57', '2015-12-24 23:23:57'),
(29, 2, 2, '35.60', 1, '35.60', '2015-12-24 23:54:11', '2015-12-25 04:54:11'),
(30, 2, 6, '33.90', 1, '33.90', '2015-12-25 13:01:09', '2015-12-25 18:01:09'),
(31, 2, 5, '40.80', 4, '163.20', '2015-12-27 14:58:04', '2015-12-27 19:58:04'),
(32, 2, 25, '88.50', 1, '88.50', '2015-12-28 11:39:40', '2015-12-28 16:39:40'),
(33, 2, 21, '27.90', 1, '27.90', '2015-12-28 11:39:40', '2015-12-28 16:39:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Livre', NULL, '2015-11-01 17:18:42'),
(2, 'Pendente', NULL, '2015-12-10 21:01:36');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `boards`
--
ALTER TABLE `boards`
  ADD CONSTRAINT `boards_status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Restrições para tabelas `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_file_upload1` FOREIGN KEY (`file_upload_id`) REFERENCES `file_upload` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `products_ingredients`
--
ALTER TABLE `products_ingredients`
  ADD CONSTRAINT `ingredients_id_fk_1` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_id_fk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Restrições para tabelas `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `fk_requests_boards1` FOREIGN KEY (`boards_id`) REFERENCES `boards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `requests_observation`
--
ALTER TABLE `requests_observation`
  ADD CONSTRAINT `fk_requests_observation_requests_products1` FOREIGN KEY (`requests_products_id`) REFERENCES `requests_products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `requests_products`
--
ALTER TABLE `requests_products`
  ADD CONSTRAINT `fk_requests_products_products1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_requests_products_requests1` FOREIGN KEY (`requests_id`) REFERENCES `requests` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
