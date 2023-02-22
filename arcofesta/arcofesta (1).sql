-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Fev-2023 às 01:16
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `arcofesta`
--
CREATE DATABASE IF NOT EXISTS `arcofesta` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `arcofesta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `idcolaborador` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `funcao` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`idcolaborador`, `nome`, `funcao`, `foto`) VALUES
(1, 'Jhon Lennon Ribeiro', 'garçom', 'foto\\Jhon.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `Cpf` char(12) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `Nascimento` date NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`Cpf`, `nome`, `Nascimento`, `telefone`, `email`, `senha`) VALUES
('05841983711', 'Marina Cruz', '1990-08-18', '21971165408', 'arcofesta.festa@gmail.com', '$2y$10$lkij7uFtIr6KJxm3JbLRouK8YaxZ9H5KTa.clPMySte0l7SG.oPym');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contrato`
--

CREATE TABLE `contrato` (
  `Numerocontrato` int(11) NOT NULL,
  `Dataevento` date NOT NULL,
  `preco` double NOT NULL,
  `Tipoevento` varchar(15) NOT NULL,
  `cep` char(9) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(40) NOT NULL,
  `cpf` char(12) NOT NULL,
  `cor_uniforme` varchar(40) NOT NULL,
  `Tempo_evento` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idcolaborador` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `cep` char(9) NOT NULL,
  `email` varchar(100) NOT NULL,
  `função` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `pix` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idcolaborador`, `nome`, `telefone`, `cep`, `email`, `função`, `senha`, `pix`, `cpf`, `foto`) VALUES
(1, 'Jhon Lennon Ribeiro', '21981454753', '23058002', 'jlennon1989.jrl@gmail.com', 'garçom', '$2y$10$lkij7uFtIr6KJxm3JbLRouK8YaxZ9H5KTa.clPMySte0l7SG.oPym', '12345678910', '123456789', 'foto\\Jhon.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `idcolaborador` int(11) NOT NULL,
  `Numerocontrato` int(11) NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Cpf`);

--
-- Índices para tabela `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`Numerocontrato`),
  ADD KEY `cpf` (`cpf`);

--
-- Índices para tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idcolaborador`);

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`),
  ADD KEY `idcolaborador` (`idcolaborador`),
  ADD KEY `Numerocontrato` (`Numerocontrato`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contrato`
--
ALTER TABLE `contrato`
  MODIFY `Numerocontrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idcolaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`Cpf`);

--
-- Limitadores para a tabela `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`idcolaborador`) REFERENCES `funcionario` (`idcolaborador`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`Numerocontrato`) REFERENCES `contrato` (`Numerocontrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
