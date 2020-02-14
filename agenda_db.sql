DROP DATABASE IF EXISTS agenda;

CREATE DATABASE IF NOT EXISTS agenda DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE agenda;

CREATE TABLE usuario(
	codigo INT PRIMARY KEY AUTO_INCREMENT,
	nome varchar(100) NOT NULL,
	email varchar(100) NOT NULL UNIQUE,
	senha char(32)
);

CREATE TABLE contato(
	codigo INT PRIMARY KEY AUTO_INCREMENT,
	codigo_usu INT NOT NULL,
	nome VARCHAR(100) NOT NULL,
	celular varchar(14),
	email varchar(50),
	FOREIGN KEY (codigo_usu) REFERENCES usuario(codigo)
);