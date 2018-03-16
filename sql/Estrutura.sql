-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para indicador
CREATE DATABASE IF NOT EXISTS `indicador` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `indicador`;

-- Copiando estrutura para tabela indicador.tb_dadosmes
CREATE TABLE IF NOT EXISTS `tb_dadosmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double DEFAULT NULL,
  `idIndicador` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `meta` double DEFAULT NULL,
  `sentido` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `criadoPor` int(11) DEFAULT NULL,
  `dataCriacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modificadoPor` int(11) DEFAULT NULL,
  `dataModificacao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_dadosMes_criadoPor_userID` (`criadoPor`),
  KEY `fk_dadosMes_criadoPor_modificadoPor` (`modificadoPor`),
  KEY `idIndicador` (`idIndicador`),
  CONSTRAINT `fk_dadosMes_criadoPor_modificadoPor` FOREIGN KEY (`modificadoPor`) REFERENCES `tb_users` (`userID`),
  CONSTRAINT `fk_dadosMes_criadoPor_userID` FOREIGN KEY (`criadoPor`) REFERENCES `tb_users` (`userID`),
  CONSTRAINT `fk_dadosMes_idIndicador_ID` FOREIGN KEY (`idIndicador`) REFERENCES `tb_indicador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4943 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela indicador.tb_departaments
CREATE TABLE IF NOT EXISTS `tb_departaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(100) DEFAULT NULL,
  `managerUserId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_departamento_usuario` (`managerUserId`),
  CONSTRAINT `fk_departamento_usuario` FOREIGN KEY (`managerUserId`) REFERENCES `tb_users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela indicador.tb_indicador
CREATE TABLE IF NOT EXISTS `tb_indicador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `meta` double DEFAULT NULL,
  `sentido_da_meta` int(11) DEFAULT NULL,
  `ytd` double DEFAULT NULL,
  `departamentoID` int(11) DEFAULT NULL,
  `criadoPor` int(11) DEFAULT NULL,
  `dataCriacao` date DEFAULT NULL,
  `modificadoPor` int(11) DEFAULT NULL,
  `dataModificacao` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_indicador_departamentoID` (`departamentoID`),
  KEY `fk_indicador_departamentoID_criadoPor` (`criadoPor`),
  KEY `fk_indicador_departamentoID_modificadoPor` (`modificadoPor`),
  CONSTRAINT `fk_indicador_departamentoID` FOREIGN KEY (`departamentoID`) REFERENCES `tb_departaments` (`id`),
  CONSTRAINT `fk_indicador_departamentoID_criadoPor` FOREIGN KEY (`criadoPor`) REFERENCES `tb_users` (`userID`),
  CONSTRAINT `fk_indicador_departamentoID_modificadoPor` FOREIGN KEY (`modificadoPor`) REFERENCES `tb_users` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=246 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela indicador.tb_plano_acao
CREATE TABLE IF NOT EXISTS `tb_plano_acao` (
  `idPlano` int(11) NOT NULL AUTO_INCREMENT,
  `indicador` int(11) NOT NULL,
  `ano` varchar(4) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `item` varchar(50) DEFAULT NULL,
  `descricao_problema` varchar(250) DEFAULT NULL,
  `plano_acao` varchar(250) DEFAULT NULL,
  `responsavel` varchar(50) DEFAULT NULL,
  `abertura` timestamp NULL DEFAULT NULL,
  `prazo` date DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`idPlano`),
  KEY `fk_tb_plano_acao_indicador_indicadorID` (`indicador`),
  CONSTRAINT `fk_tb_plano_acao_indicador_indicadorID` FOREIGN KEY (`indicador`) REFERENCES `tb_indicador` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela indicador.tb_users
CREATE TABLE IF NOT EXISTS `tb_users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) DEFAULT NULL COMMENT 'Login',
  `permissao` int(11) NOT NULL DEFAULT '0' COMMENT 'Permissão',
  `priName` varchar(50) DEFAULT NULL COMMENT 'Nome',
  `ulName` varchar(50) DEFAULT NULL COMMENT 'Sobrenome',
  `email` varchar(50) DEFAULT NULL COMMENT 'e-mail',
  `dataCadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Data Cadastro',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Cadastro de usuarios';

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
