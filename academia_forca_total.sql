-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.42-0ubuntu0.22.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para academia_forca_total
CREATE DATABASE IF NOT EXISTS `academia_forca_total` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `academia_forca_total`;

-- Copiando estrutura para tabela academia_forca_total.acompanhamentos
CREATE TABLE IF NOT EXISTS `acompanhamentos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ficha_id` int NOT NULL,
  `data` date NOT NULL,
  `peso` decimal(5,2) NOT NULL,
  `medidas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `frequencia` int NOT NULL,
  `observacoes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ficha_id` (`ficha_id`),
  CONSTRAINT `acompanhamentos_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas_treino` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `endereco` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `plano_id` int DEFAULT NULL,
  `usuario_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `plano_id` (`plano_id`),
  KEY `fk_aluno_usuario` (`usuario_id`),
  CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`plano_id`) REFERENCES `planos` (`id`),
  CONSTRAINT `fk_aluno_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.cidade
-- CREATE TABLE IF NOT EXISTS `cidade` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `nome` varchar(50) NOT NULL,
--   `uf_id` int NOT NULL,
--   `codigo_municipio` varchar(7) NOT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `nome_uf_id` (`nome`,`uf_id`),
--   KEY `FK1_cidade_uf_id` (`uf_id`),
--   CONSTRAINT `FK1_cidade_uf_id` FOREIGN KEY (`uf_id`) REFERENCES `uf` (`id`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.exercicios
CREATE TABLE IF NOT EXISTS `exercicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `grupo_muscular` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.fichas_treino
CREATE TABLE IF NOT EXISTS `fichas_treino` (
  `id` int NOT NULL AUTO_INCREMENT,
  `aluno_id` int NOT NULL,
  `professor_id` int NOT NULL,
  `data_inicio` date NOT NULL,
  `validade` date NOT NULL,
  `anotacoes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`),
  KEY `aluno_id` (`aluno_id`),
  KEY `professor_id` (`professor_id`),
  CONSTRAINT `fichas_treino_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  CONSTRAINT `fichas_treino_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.ficha_exercicio
CREATE TABLE IF NOT EXISTS `ficha_exercicio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ficha_id` int NOT NULL,
  `exercicio_id` int NOT NULL,
  `series` int DEFAULT NULL,
  `repeticoes` int DEFAULT NULL,
  `carga` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ficha_id` (`ficha_id`),
  KEY `exercicio_id` (`exercicio_id`),
  CONSTRAINT `ficha_exercicio_ibfk_1` FOREIGN KEY (`ficha_id`) REFERENCES `fichas_treino` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ficha_exercicio_ibfk_2` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.planos
CREATE TABLE IF NOT EXISTS `planos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `treinos_semanais` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.professores
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cpf` char(11) NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `especialidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `endereco` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `fk_professor_usuario` (`usuario_id`),
  CONSTRAINT `fk_professor_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.uf
-- CREATE TABLE IF NOT EXISTS `uf` (
--   `id` int NOT NULL AUTO_INCREMENT,
--   `sigla` varchar(2) NOT NULL,
--   `nome` varchar(50) NOT NULL,
--   `regiao` varchar(100) DEFAULT NULL,
--   PRIMARY KEY (`id`),
--   UNIQUE KEY `sigla` (`sigla`)
-- ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nivel` int NOT NULL DEFAULT '2' COMMENT '1=Super Administrador; 11=Administador; 21=Usuário',
  `nome` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `senha` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo; 3=Bloqueado;',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela academia_forca_total.usuariorecuperasenha
CREATE TABLE IF NOT EXISTS `usuariorecuperasenha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `chave` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `chave` (`chave`) USING BTREE,
  KEY `FK1_usuariorecuperacaosenha` (`usuario_id`) USING BTREE,
  CONSTRAINT `FK1_usuariorecuperacaosenha` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS produtos_servicos (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  descricao TEXT,
  imagem VARCHAR(255) DEFAULT NULL,
  tipo ENUM('produto', 'servico') NOT NULL,
  preco DECIMAL(10,2) NOT NULL,
  unidade VARCHAR(50) DEFAULT NULL,
  estoque INT DEFAULT NULL,
  status TINYINT DEFAULT 1 COMMENT '1 = ativo, 0 = inativo',
  criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
  atualizado_em DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Exportação de dados foi desmarcado.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
