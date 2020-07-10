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
  `paymentId` int(11) DEFAULT '0' COMMENT 'Relacionado ao planos_pagamento',
  `published` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.comprovante: ~0 rows (aproximadamente)
DELETE FROM `comprovante`;
/*!40000 ALTER TABLE `comprovante` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprovante` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.planos_pagamento
CREATE TABLE IF NOT EXISTS `planos_pagamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `planName` varchar(255) NOT NULL DEFAULT '0',
  `planValue` int(11) NOT NULL DEFAULT '0',
  `vouchers` int(11) NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL DEFAULT 'Matheus',
  `status` enum('0','1','2') DEFAULT '0',
  `paymentDay` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.planos_pagamento: ~0 rows (aproximadamente)
DELETE FROM `planos_pagamento`;
/*!40000 ALTER TABLE `planos_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `planos_pagamento` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `peso` varchar(50) NOT NULL DEFAULT '100g',
  `preco` double(11,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.produtos: ~0 rows (aproximadamente)
DELETE FROM `produtos`;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.users: ~3 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `plan`, `plan_used`, `username`, `password`, `real_name`, `email`, `cpf`, `person_type`, `security_code`, `indicator_id`, `payment_ok`, `admin`) VALUES
	(1, 180, 4895, 'Santosl2c', '$2y$10$PavUddDqxih46ep8ISEiG.uiK8t6.0xxGv3PQ5jIHCNUv7G5HWqpC', 'Eric', 'mfilype2019@gmail.com', '000.000.000-00', 'Fisica', '$2y$10$AMLlHiAR8eT9uGRPUv8MgeZmL0pWqrg2czVsxY5iwfH', 0, '1', 'true'),
	(2, 0, 0, 'Santosl2cf', '$2y$10$8tZ.6od4MuHMY4B0a.GcdurtnDxufqOcfygKFNrKiczMHPVN0QXiu', 'Matheus Filype B. Campos', 'hello@live.com', '000.000.000-00', 'Juridica', '$2y$10$iy4epL8yEPYRBUgeYyUcqOOyqFbFhwdSDXnaOB6LO0J', 0, '0', 'false'),
	(3, 180, 14900, 'Santosl2c88', '$2y$10$HeiZxjmJQUjIiYuImv6Y1OXCWA4yTpls1gdBjpCKRPSqG4.4dGg4K', 'Matheus Filype B. Campos', 'kingsantosl2c@gmail.com', '000.000.000-00', 'Juridica', '$2y$10$Ine/zzZ8y5Rkuown3w1SOOYyCeJDhr29AcXNS42L6f.', 0, '0', 'false');
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

-- Copiando estrutura para tabela projeto.vouchers
CREATE TABLE IF NOT EXISTS `vouchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voucherCode` varchar(50) DEFAULT 'ABC123',
  `addedTime` int(11) DEFAULT NULL,
  `voucherValue` int(11) DEFAULT NULL,
  `status` enum('1','2') DEFAULT '1' COMMENT '0 => Ativo 1 => Resgatado',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.vouchers: ~0 rows (aproximadamente)
DELETE FROM `vouchers`;
/*!40000 ALTER TABLE `vouchers` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers` ENABLE KEYS */;

-- Copiando estrutura para tabela projeto.vouchers_logs
CREATE TABLE IF NOT EXISTS `vouchers_logs` (
  `username` varchar(50) DEFAULT 'Matheus',
  `voucherId` int(11) DEFAULT NULL,
  `usedTime` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela projeto.vouchers_logs: ~0 rows (aproximadamente)
DELETE FROM `vouchers_logs`;
/*!40000 ALTER TABLE `vouchers_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `vouchers_logs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
