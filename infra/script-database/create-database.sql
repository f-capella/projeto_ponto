DROP DATABASE IF EXISTS `ponto_eletronico`;

CREATE DATABASE ponto_eletronico;
USE ponto_eletronico;

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(250) DEFAULT NULL,
  `senha` varchar(250) DEFAULT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `sobrenome` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_usuario` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `usuario` (login, senha, nome, sobrenome, email) VALUES 
('admin','7d4e3eec80026719639ed4dba68916eb94c7a49a053e05c8f9578fe4e5a3d7ea','Admin','Admin','admin@gmail.com');


/*
  Usuário e senha inicial do banco
  user: admin
  pass: 12345
*/