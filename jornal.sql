-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Nov-2022 às 03:03
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `jornal`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `Id da postagem` int(11) NOT NULL,
  `Comentario` text NOT NULL,
  `Autor` varchar(1000) NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Subtitulo` varchar(1000) NOT NULL,
  `Postagem` text NOT NULL,
  `Autor` varchar(100) NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `Data_e_hora` varchar(100) NOT NULL,
  `Views` int(11) NOT NULL,
  `Imagem_capa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Nome` varchar(1000) NOT NULL,
  `Nascimento` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Senha` varchar(1000) NOT NULL,
  `Permissão` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Nome`, `Nascimento`, `Email`, `Senha`, `Permissão`) VALUES
('Arthur Fagundes Fetzner', '2006-08-28', 'arthurfetzner@gmail.com', '$2y$10$gZtEC6ohq5stSHDAA629qOY4jPHIYIzxIRxmQfYgS9jJl2.u2rDP2', 'admin');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
