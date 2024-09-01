-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27/08/2024 às 22:04
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meubanco`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_uf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `id_uf`) VALUES
(3, 'Marcelo', 'marcelo@gmail.com', 3),
(4, 'Frank', 'Frank@gmail.com', 3),
(5, 'Jose', 'jose@google.com', 3),
(6, 'Rafael', 'Rafael@ifsc.com', 4),
(7, 'Marlon', 'marlon@bol.com', 1),
(9, 'Bruna', 'bruna@gmail.com', 3),
(10, 'Alan', 'alan@google.com', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `uf`
--

CREATE TABLE `uf` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sigla` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `uf`
--

INSERT INTO `uf` (`id_uf`, `nome`, `sigla`) VALUES
(1, 'Paraná', 'PR'),
(2, 'Rio Grande do Sul', 'RS'),
(3, 'Santa Catarina', 'SC'),
(4, 'São Paulo', 'SP'),
(5, 'Rio de Janeiro', 'RJ'),
(6, 'Minas Gerais', 'MG'),
(7, 'Bahia', 'BH'),
(8, 'Distrito Federal', 'DF'),
(9, 'Goiás ', 'GO'),
(10, 'Mato Grosso', 'MT'),
(11, 'Mato Grosso do Sul', 'MS'),
(12, 'Acre', 'AC'),
(13, 'Amazonas', 'AM');

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `password` char(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(1, 'anderson@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(2, 'anderson@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_uf` (`id_uf`);

--
-- Índices de tabela `uf`
--
ALTER TABLE `uf`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `uf`
--
ALTER TABLE `uf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_uf`) REFERENCES `uf` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
