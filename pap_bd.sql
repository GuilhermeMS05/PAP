-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jul-2023 às 18:48
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebidas`
--

DROP TABLE IF EXISTS `bebidas`;
CREATE TABLE IF NOT EXISTS `bebidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bebidas`
--

INSERT INTO `bebidas` (`id`, `nome`, `preco`, `img`) VALUES
(1, 'Coca Cola 1 Litro', 3.75, 'Cola1Litro.png'),
(2, 'Coca Cola Zero 1 Litro', 3.75, 'ColaZero1Litro.jpg'),
(3, 'Sumol Ananás', 1.9, 'SumolAnanas.jpg'),
(4, 'Sumol Laranja', 1.9, 'SumolAnanas.jpg'),
(5, 'Ice Tea Pêssego', 1.9, 'IceTeaPessego.jpg'),
(6, 'Ice Tea Manga', 1.9, 'IceTeaManga.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

DROP TABLE IF EXISTS `cardapio`;
CREATE TABLE IF NOT EXISTS `cardapio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pratos` int(11) DEFAULT NULL,
  `id_bebidas` int(11) DEFAULT NULL,
  `id_sobremesas` int(11) DEFAULT NULL,
  `id_entradas` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pratos` (`id_pratos`),
  KEY `sobremesas` (`id_sobremesas`),
  KEY `bebidas` (`id_bebidas`),
  KEY `entradas` (`id_entradas`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cardapio`
--

INSERT INTO `cardapio` (`id`, `id_pratos`, `id_bebidas`, `id_sobremesas`, `id_entradas`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2),
(3, 3, 3, 3, 3),
(4, 4, 4, 4, 4),
(5, 5, 5, 5, 5),
(6, 6, 6, 6, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

DROP TABLE IF EXISTS `carrinho`;
CREATE TABLE IF NOT EXISTS `carrinho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_utilizador` varchar(50) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `utilizadores` (`nome_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `carrinho`
--

INSERT INTO `carrinho` (`id`, `nome_utilizador`, `produto`, `price`, `img`) VALUES
(27, '', 'Francesinha', 10.5, '../Imagens/francesinha.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

DROP TABLE IF EXISTS `entradas`;
CREATE TABLE IF NOT EXISTS `entradas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` varchar(40) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entradas`
--

INSERT INTO `entradas` (`id`, `nome`, `descricao`, `preco`, `img`) VALUES
(1, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg'),
(2, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg'),
(3, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg'),
(4, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg'),
(5, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg'),
(6, 'Azeitonas', 'Porção de Azeitonas', 2, 'azeitonas.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faturacao`
--

DROP TABLE IF EXISTS `faturacao`;
CREATE TABLE IF NOT EXISTS `faturacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dia_atual` date NOT NULL,
  `preco` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `faturacao`
--

INSERT INTO `faturacao` (`id`, `dia_atual`, `preco`) VALUES
(1, '2023-06-26', 10.5),
(2, '2023-06-27', 10.5),
(4, '2023-06-27', 12),
(5, '2023-06-27', 63),
(6, '2023-06-28', 69),
(7, '2023-06-28', 72),
(8, '2023-06-29', 17),
(9, '2023-06-30', 10.5),
(10, '2023-06-30', 10.5),
(11, '2023-06-30', 10.5),
(12, '2023-06-30', 10.5),
(13, '2023-06-30', 10.5),
(14, '2023-06-30', 10.5),
(15, '2023-06-30', 10.5),
(16, '2023-06-30', 12),
(17, '2023-06-30', 10.5),
(18, '2023-06-30', 12),
(19, '2023-06-30', 2),
(20, '2023-06-30', 22.5),
(21, '2023-06-30', 22.5),
(22, '2023-06-30', 4.5),
(23, '2023-06-30', 22.5),
(24, '2023-06-30', 22.5),
(25, '2023-06-30', 59.7),
(26, '2023-06-30', 29.5),
(27, '2023-06-30', 25.5),
(28, '2023-07-01', 39.75),
(29, '2023-07-02', 38.75),
(30, '2023-07-02', 39.75),
(31, '2023-07-02', 47.15),
(32, '2023-07-02', 47.15),
(33, '2023-07-02', 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionamento`
--

DROP TABLE IF EXISTS `funcionamento`;
CREATE TABLE IF NOT EXISTS `funcionamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `abertura` time NOT NULL,
  `fechamento` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionamento`
--

INSERT INTO `funcionamento` (`id`, `abertura`, `fechamento`) VALUES
(1, '10:00:00', '19:00:00'),
(2, '01:00:00', '14:00:00'),
(3, '10:00:00', '18:00:00'),
(4, '08:03:00', '20:03:00'),
(5, '07:00:00', '23:00:00'),
(6, '09:00:00', '18:00:00'),
(7, '09:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maispedidos`
--

DROP TABLE IF EXISTS `maispedidos`;
CREATE TABLE IF NOT EXISTS `maispedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pratos` varchar(60) NOT NULL,
  `quantidade` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maispedidos`
--

INSERT INTO `maispedidos` (`id`, `pratos`, `quantidade`) VALUES
(1, 'Francesinha', 28),
(2, 'Francesinha Especial', 6),
(3, 'Cachorro Especial', 7),
(4, 'Bifinhos de Perú Grelhados com Natas e Cogumelos', 2),
(5, 'Bife Especial', 5),
(6, 'Bife Especial', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_utilizador` varchar(50) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `contacto` varchar(20) NOT NULL,
  `nif` int(9) NOT NULL,
  `observacoes` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users` (`nome_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome_utilizador`, `morada`, `contacto`, `nif`, `observacoes`) VALUES
(3, 'Guilherme Silva', 'Rua Dom José Alves Correia da Silva, 32', '910 735 472', 324543252, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pratos`
--

DROP TABLE IF EXISTS `pratos`;
CREATE TABLE IF NOT EXISTS `pratos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `preco` varchar(30) DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `descricao`, `preco`, `img`) VALUES
(1, 'Francesinha', 'Febra, linguiça, bacon, cogumelos, fiambre, queijo, ovo estrelado e batata frita.', '10.50', 'francesinha.png'),
(2, 'Francesinha Especial', 'Carne especial da casa, linguiça, bacon, cogumelos, fiambre, queijo, ovo estrelado, e batata frita.', '12.00', 'francesinhaespecial.jpeg'),
(3, 'Cachorro Especial', 'Salsicha, queijo, cebola frita, alface, tomate, cenoura e batata palha.', '4.50', 'cachorroespecial.jpeg'),
(4, 'Bifinhos de Perú Grelhados com Natas e Cogumelos', 'Servido com arroz, batata frita e salada.', '8.90', 'bifinhosdeperu.jpeg'),
(5, 'Bife Especial', 'Bife de vaca, arroz, batata frita, ovo e molho à chefe.', '11.90', 'bifeespecial.jpeg'),
(6, 'Bife Especial', 'Bife de vaca, arroz, batata frita, ovo e molho à chefe.', '11.90', 'bifeespecial.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sobremesas`
--

DROP TABLE IF EXISTS `sobremesas`;
CREATE TABLE IF NOT EXISTS `sobremesas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `descricao` varchar(40) NOT NULL,
  `preco` double DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sobremesas`
--

INSERT INTO `sobremesas` (`id`, `nome`, `descricao`, `preco`, `img`) VALUES
(1, 'Gelado Fini 125ml', 'Morango', 2.75, 'GeladoMorangojpg.jpg'),
(2, 'Gelado Fini 125ml', 'Chocolate Branco com Maracujá', 2.75, 'GeladoMaracujajpg.jpg'),
(3, 'Gelado Fini 125ml', 'Cheesecake Frutos Silvestres', 2.75, 'GeladoCheesecake.jpg'),
(4, 'Gelado Fini 125ml', 'Brownie de Chocolate com Avelã', 2.75, 'GeladoBrownie.jpg'),
(5, 'Mousse de Chocolate', 'Mousse sabor chocolate - 100ml', 2.75, 'moussechocolate.jpg'),
(6, 'Serradura', 'Serradura - 100ml', 2.75, 'Serradura.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_espera`
--

DROP TABLE IF EXISTS `t_espera`;
CREATE TABLE IF NOT EXISTS `t_espera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_min` int(11) NOT NULL,
  `t_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `t_espera`
--

INSERT INTO `t_espera` (`id`, `t_min`, `t_max`) VALUES
(1, 60, 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

DROP TABLE IF EXISTS `utilizadores`;
CREATE TABLE IF NOT EXISTS `utilizadores` (
  `id_utilizador` int(11) NOT NULL AUTO_INCREMENT,
  `nome_utilizador` varchar(90) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `nome_completo` varchar(40) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `tipo_utilizador` varchar(30) NOT NULL,
  PRIMARY KEY (`id_utilizador`),
  KEY `id_utilizador` (`id_utilizador`),
  KEY `id_utilizador_2` (`id_utilizador`),
  KEY `id_utilizador_3` (`id_utilizador`),
  KEY `id_utilizador_4` (`id_utilizador`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `nome_utilizador`, `senha`, `nome_completo`, `email`, `tipo_utilizador`) VALUES
(1, 'admin', '$2y$10$0pVDZKjgUVV2JeJja7hYseGXq5V0vTGRzTPRYNiRnJshruYqg6V2m', 'Guilherme Silva', 'éisso@gmail.com', 'admin'),
(2, 'teste', '$2y$10$ZF4uj8HJ3CFaYpsLRbyL8ePwNjPEJ7IVTus0PpUG/3Do7uhpWU8dC', 'Guilherme Teste', 'sla@gmail.com', 'admin'),
(5, 'teste123', '$2y$10$gbm.hM.aC9KHEUQGf91GL.oeeIftBJrl4kh/tEB7BTWXPPgYTkXXi', 'Guilherme Silva', 'test@example.com', 'user'),
(16, 'Guilherme', '$2y$10$RVrlw3/kmWJaV0pi3ITAMOwSh0XwieT1Cn2oWyYtdxObKkyyM5bmu', 'Guilherme Mendes Silva', 'guilhermemendessilva123@gmail.com', 'user');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `bebidas` FOREIGN KEY (`id_bebidas`) REFERENCES `bebidas` (`id`),
  ADD CONSTRAINT `entradas` FOREIGN KEY (`id_entradas`) REFERENCES `entradas` (`id`),
  ADD CONSTRAINT `pratos` FOREIGN KEY (`id_pratos`) REFERENCES `pratos` (`id`),
  ADD CONSTRAINT `sobremesas` FOREIGN KEY (`id_sobremesas`) REFERENCES `sobremesas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
