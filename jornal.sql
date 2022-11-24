-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2022 às 13:26
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.3.27

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
  `Titulo` varchar(1000) NOT NULL,
  `Subtitulo` varchar(1000) NOT NULL,
  `Postagem` text NOT NULL,
  `Autor` varchar(1000) NOT NULL,
  `Categoria` varchar(1000) NOT NULL,
  `Data_e_hora` varchar(1000) NOT NULL,
  `Views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`Id`, `Titulo`, `Subtitulo`, `Postagem`, `Autor`, `Categoria`, `Data_e_hora`, `Views`) VALUES
(1, 'Tesete para testar', 'temos um subtitulo aqui', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.\r\nLorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.', 'Arthur Fagunndes Fetzner', 'Notícia', '24/11/2022 08:38:45', 5),
(2, 'Teste dois sem subtitulo', '', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate consequuntur corrupti officiis voluptas animi, praesentium labore veritatis alias sapiente! Praesentium unde, tenetur adipisci dolorum quia id corporis animi consequatur consequuntur.', 'Arthur Fagunndes Fetzner', 'Crônica', '24/11/2022 08:39:05', 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `Nome` varchar(1000) NOT NULL,
  `Nascimento` varchar(1000) NOT NULL,
  `Email` varchar(1000) NOT NULL,
  `Senha` varchar(1000) NOT NULL,
  `Permissão` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`Nome`, `Nascimento`, `Email`, `Senha`, `Permissão`) VALUES
('Arthur Fagunndes Fetzner', '2006-08-28', 'arthurfetzner@gmail.com', '$2y$10$oETs3MQCDllDY19GFVBkKuMcqXdbW6s1cv25/3NN0uNPCjgq3Z0cO', 'admin'),
('lucas vizeu', '2009-09-04', 'lucasvizeu123dasnovinhas@gmail.com', '$2y$10$WthCuAOL2S.WX29F9b7vJOZDTYLgWGsJT4j7NeXzNXDu1iYyZ6u3O', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
