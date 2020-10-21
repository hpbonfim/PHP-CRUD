-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 21/10/2020 às 02:07
-- Versão do servidor: 8.0.21
-- Versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `recode`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int NOT NULL,
  `nome_produto` varchar(1000) NOT NULL,
  `descricao_produto` text NOT NULL,
  `preco_produto` bigint NOT NULL,
  `imagem_produto` varchar(1000) NOT NULL,
  `categoria_produto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `descricao_produto`, `preco_produto`, `imagem_produto`, `categoria_produto`) VALUES
(1, 'Computadoreza', 'dsadx ds adsad asd wqeqwewq ', 50, 'https', 'computador'),
(2, 'batedeira', 'batedeira que bate até pedra', 5555, 'imagem qualquer', 'batedeira'),
(3, 'czx', 'dksoadksao', 9898, 'imagemspssp', 'discord'),
(4, 'Novo produto', 'dsadcxz dsa d a d', 12352, 'https://produtobao.com', 'produto'),
(5, 'Testezera', 'dsadxzczx w e ', 3213, 'https://node.orgs', 'bash'),
(6, 'computador última geração dsd', 'cxzcxzc sda dsa ', 0, 'https://produtobao.com.br', 'bash'),
(7, '555', 'dwqe sad s ', 5, 'cxzc', 'bash'),
(8, 'computador última geração xyz', 'dsadwqesa', 13213, 'https://node.orgs', 'computador');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
