-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Abr-2023 às 01:28
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes_contato`
--

CREATE TABLE `clientes_contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `apelido` varchar(255) NOT NULL,
  `telemovel` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `motivo` text NOT NULL,
  `data_local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `clientes_contato`
--

INSERT INTO `clientes_contato` (`id`, `nome`, `apelido`, `telemovel`, `email`, `data`, `motivo`, `data_local`) VALUES
(15, 'teste', 'tete', '963258741', 'pratica@teste.com', '2023-04-26', '3', '2023-04-19'),
(16, 'Miguel', 'teste', '968574523', 'pratica@teste.com', '2023-04-20', '2', '2023-04-19'),
(17, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19'),
(18, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19'),
(19, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19'),
(20, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19'),
(21, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19'),
(22, 'tese', 'teset', '968574563', 'pratica@teste.com', '2023-03-31', '2', '2023-04-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notícias`
--

CREATE TABLE `notícias` (
  `Id` int(2) NOT NULL,
  `Body` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` char(255) NOT NULL,
  `senha` char(60) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `is_admin`) VALUES
(1, 'Teste', 'teste@teste.com', 'teste', 1),
(2, 'miguel', 'miguelsa96@hotmail.com', 'teste1', 0),
(3, 'migue3lsa96@hotmail.com', 'migue3lsa96@hotmail.com', 'nseiokpor1', 0),
(4, 'beatriz', 'beatrizmiranda1@live.com.pt', 'amotemuito', 0),
(5, 'alberta', 'beatriz@miranda.com', 'alberta', 0),
(6, 'pratica', 'pratica@teste.com', 'teste', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes_contato`
--
ALTER TABLE `clientes_contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes_contato`
--
ALTER TABLE `clientes_contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
