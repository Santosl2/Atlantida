-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.25-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela projeto.comprovante
CREATE TABLE IF NOT EXISTS `comprovante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileURL` varchar(255) NOT NULL DEFAULT '0',
  `user` varchar(50) NOT NULL DEFAULT 'Eric',
  `paymentType` enum('TED') NOT NULL DEFAULT 'TED',
  `paymentId` int(11) DEFAULT '0',
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.comprovante: ~0 rows (aproximadamente)
DELETE FROM `comprovante`;
/*!40000 ALTER TABLE `comprovante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprovante` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.pedidos_pagamento
CREATE TABLE IF NOT EXISTS `pedidos_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planName` varchar(255) NOT NULL DEFAULT '0',
  `planValue` int(11) NOT NULL DEFAULT '0',
  `vouchers` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'Matheus',
  `status` enum('0','1','2') DEFAULT '0',
  `paymentDay` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.pedidos_pagamento: ~0 rows (aproximadamente)
DELETE FROM `pedidos_pagamento`;
/*!40000 ALTER TABLE `pedidos_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `peso` varchar(50) NOT NULL DEFAULT '100g',
  `preco` double(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.produtos: ~3 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`, `nome`, `peso`, `preco`) VALUES
	(1, 'Reuma Plus ', '500ml', 189.00),
	(2, 'Black Coffee ', '300g', 128.00),
	(3, 'Cereal Milk - Vegano ', '300g', 140.00);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan` int(11) DEFAULT '0',
  `plan_used` int(11) DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'Eric',
  `password` varchar(255) DEFAULT NULL,
  `real_name` tinytext,
  `email` varchar(60) NOT NULL DEFAULT 'Eric@hotmail.com',
  `cpf` varchar(14) NOT NULL DEFAULT '000.000.000-00',
  `person_type` enum('Fisica','Juridica') DEFAULT 'Fisica',
  `security_code` char(50) DEFAULT '0800',
  `indicator_id` int(11) DEFAULT NULL,
  `payment_ok` enum('0','1') DEFAULT '0',
  `admin` enum('true','false') DEFAULT 'false',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `plan`, `plan_used`, `username`, `password`, `real_name`, `email`, `cpf`, `person_type`, `security_code`, `indicator_id`, `payment_ok`, `admin`) VALUES
	(1, 720, 5280, 'Santosl2c', '$2y$10$PavUddDqxih46ep8ISEiG.uiK8t6.0xxGv3PQ5jIHCNUv7G5HWqpC', 'Eric', 'mfilype2019@gmail.com', '000.000.000-00', 'Fisica', '$2y$10$AMLlHiAR8eT9uGRPUv8MgeZmL0pWqrg2czVsxY5iwfH', 0, '1', 'true');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.user_products
CREATE TABLE IF NOT EXISTS `user_products` (
  `username` varchar(60) DEFAULT 'Matheus',
  `status` enum('0','1','2') DEFAULT '0' COMMENT '0 - Aguardando, 1- Aprovado, 2 - Recebido',
  `produtName` text,
  `produtValue` int(11) DEFAULT '0',
  `productAmount` int(11) DEFAULT '0',
  `productWeight` char(60) DEFAULT '60g',
  `paymentId` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.user_products: ~0 rows (aproximadamente)
DELETE FROM `user_products`;
/*!40000 ALTER TABLE `user_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
