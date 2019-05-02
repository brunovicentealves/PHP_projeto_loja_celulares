-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Set-2018 às 18:35
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema_pedidos_final1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `centro_custo`
--

CREATE TABLE `centro_custo` (
  `id_custo` int(11) NOT NULL,
  `nome_custo` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `chefe_custo` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `centro_custo`
--

INSERT INTO `centro_custo` (`id_custo`, `nome_custo`, `chefe_custo`) VALUES
(1, 'Operações de TI', 'Anderson Souza Fajardo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `localidade`
--

CREATE TABLE `localidade` (
  `id_localidade` int(11) NOT NULL,
  `nome_localidade` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `localidade`
--

INSERT INTO `localidade` (`id_localidade`, `nome_localidade`) VALUES
(1, 'Matriz'),
(2, 'Portão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acesso`
--

CREATE TABLE `niveis_acesso` (
  `id_niveis_acesso` int(11) NOT NULL,
  `nome_acesso` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `niveis_acesso`
--

INSERT INTO `niveis_acesso` (`id_niveis_acesso`, `nome_acesso`) VALUES
(1, 'Administrador'),
(2, 'Gestor'),
(3, 'Colaborador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `usuarios_id` int(11) NOT NULL,
  `status_id_status` int(11) NOT NULL,
  `produtos_id_produtos` int(11) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `usuarios_id`, `status_id_status`, `produtos_id_produtos`, `data`) VALUES
(7, 1, 2, 1, '0000-00-00'),
(9, 1, 1, 1, '2018-09-26'),
(10, 1, 1, 1, '2018-09-26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL,
  `nome_produto` varchar(100) COLLATE utf8_swedish_ci DEFAULT NULL,
  `valor_produto` decimal(8,2) DEFAULT NULL,
  `parcela_produto` int(11) DEFAULT NULL,
  `valor_parcela_produto` decimal(8,2) DEFAULT NULL,
  `brev_desc_produto` varchar(1000) COLLATE utf8_swedish_ci DEFAULT NULL,
  `desc_completa_produto` varchar(1500) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto_1` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto_2` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `foto_3` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id_produto`, `nome_produto`, `valor_produto`, `parcela_produto`, `valor_parcela_produto`, `brev_desc_produto`, `desc_completa_produto`, `foto_1`, `foto_2`, `foto_3`) VALUES
(1, 'Iphone 8', '1500.37', 24, '150.00', 'iPhone 8 Cinza Espacial 64GB Tela 4.7\" IOS 11 4G Wi-Fi Câmera 12MP - Apple', 'iPhone 8 Apple 64GB Cinza Espacial 4G Tela 4,7” - Retina Câm 12MP + Selfie 7MP iOS 11 Proc. Chip A11\r\nDesign inovador, totalmente em vidro. A câmera que o mundo inteiro adora, ainda melhor. O chip mais poderoso e inteligente em qualquer smartphone. Recarga sem fio simples de verdade. E experiências de realidade aumentada envolventes como nunca. O iPhone 8 é brilhante. É uma nova geração do iPhone.\r\n\r\nDesign todo em vidro. O vidro mais resistente já usado em um smartphone — na frente e atrás. Moldura na mesma cor, feita de alumínio aeroespacial. E novos acabamentos. \r\n\r\nA tela Retina HD está mais bonita do que nunca. E vem com True Tone, ampla tonalidade de cores e 3D Touch. A tecnologia True Tone ajusta o tom de branco conforme a luz e melhora a leitura da tela em todos os tipos de ambiente. Com ampla tonalidade de cores e a maior precisão da categoria, tudo na tela fica mais vívido e brilhante. Os pixels dual-domain permitem ver a tela com clareza de quase qualquer ângulo.', 'iphone.jpg', 'iphone.jpg', 'iphone.jpg'),
(2, 'Sansung Galaxy S9', '2000.87', 24, '150.00', 'Samsung Galaxy S9 Dual Chip Android 8.0 Tela 5.8\" Octa-Core 2.8GHz 128GB 4G Câmera 12MP - Preto', 'iPhone 8 Apple 64GB Cinza Espacial 4G Tela 4,7” - Retina Câm 12MP + Selfie 7MP iOS 11 Proc. Chip A11\r\nDesign inovador, totalmente em vidro. A câmera que o mundo inteiro adora, ainda melhor. O chip mais poderoso e inteligente em qualquer smartphone. Recarga sem fio simples de verdade. E experiências de realidade aumentada envolventes como nunca. O iPhone 8 é brilhante. É uma nova geração do iPhone.\r\n\r\nDesign todo em vidro. O vidro mais resistente já usado em um smartphone — na frente e atrás. Moldura na mesma cor, feita de alumínio aeroespacial. E novos acabamentos. \r\n\r\nA tela Retina HD está mais bonita do que nunca. E vem com True Tone, ampla tonalidade de cores e 3D Touch. A tecnologia True Tone ajusta o tom de branco conforme a luz e melhora a leitura da tela em todos os tipos de ambiente. Com ampla tonalidade de cores e a maior precisão da categoria, tudo na tela fica mais vívido e brilhante. Os pixels dual-domain permitem ver a tela com clareza de quase qualquer ângulo.\r\n\r\n', 'sansung_s9.jpg', 'sansung_s9.jpg', 'sansung_s9.jpg'),
(3, 'Motorola Moto Z2', '1870.87', 24, '150.00', 'Samsung Galaxy S9 Dual Chip Android 8.0 Tela 5.8\" Octa-Core 2.8GHz 128GB 4G Câmera 12MP - Preto', 'iPhone 8 Apple 64GB Cinza Espacial 4G Tela 4,7” - Retina Câm 12MP + Selfie 7MP iOS 11 Proc. Chip A11\r\nDesign inovador, totalmente em vidro. A câmera que o mundo inteiro adora, ainda melhor. O chip mais poderoso e inteligente em qualquer smartphone. Recarga sem fio simples de verdade. E experiências de realidade aumentada envolventes como nunca. O iPhone 8 é brilhante. É uma nova geração do iPhone.\r\n\r\nDesign todo em vidro. O vidro mais resistente já usado em um smartphone — na frente e atrás. Moldura na mesma cor, feita de alumínio aeroespacial. E novos acabamentos. \r\n\r\nA tela Retina HD está mais bonita do que nunca. E vem com True Tone, ampla tonalidade de cores e 3D Touch. A tecnologia True Tone ajusta o tom de branco conforme a luz e melhora a leitura da tela em todos os tipos de ambiente. Com ampla tonalidade de cores e a maior precisão da categoria, tudo na tela fica mais vívido e brilhante. Os pixels dual-domain permitem ver a tela com clareza de quase qualquer ângulo.\r\n\r\n', 'moto_z2.jpg', 'moto_z2.jpg', 'moto_z2.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `nome_status` varchar(45) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id_status`, `nome_status`) VALUES
(1, 'Aguardando Aprovação'),
(2, 'Aprovado'),
(3, 'Reprovado'),
(4, 'Em logistica'),
(5, 'Entregue o produto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `senha` varchar(60) COLLATE utf8_swedish_ci DEFAULT NULL,
  `nivel_acesso` int(11) NOT NULL,
  `localidade_id_localidade` int(11) NOT NULL,
  `centro_custo_id_custo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_acesso`, `localidade_id_localidade`, `centro_custo_id_custo`) VALUES
(1, 'Bruno Vicente Alves', 'bruno.alves@tbsa.com.br', 'fcea920f7412b5da7be0cf42b8c93759', 1, 1, 1),
(2, 'Anderson Souza Fajardo', 'anderson.fajardo@tbsa.com.br', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1),
(3, 'Edmundo Almeida Neto', 'edmundo.neto@tbsa.com.br', 'fcea920f7412b5da7be0cf42b8c93759', 3, 1, 1),
(4, 'Daiane BIttencourt Ramos', 'daiane.ramos@tbsa.com.br', 'fcea920f7412b5da7be0cf42b8c93759', 3, 1, 1),
(6, 'Jose William Santos da Silva', 'jose.silva@tbsa.com.br', 'fcea920f7412b5da7be0cf42b8c93759', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centro_custo`
--
ALTER TABLE `centro_custo`
  ADD PRIMARY KEY (`id_custo`);

--
-- Indexes for table `localidade`
--
ALTER TABLE `localidade`
  ADD PRIMARY KEY (`id_localidade`);

--
-- Indexes for table `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  ADD PRIMARY KEY (`id_niveis_acesso`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedidos_usuarios1_idx` (`usuarios_id`),
  ADD KEY `fk_pedidos_status1_idx` (`status_id_status`),
  ADD KEY `fk_pedidos_produtos1_idx` (`produtos_id_produtos`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produto`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_niveis_acesso_idx` (`nivel_acesso`),
  ADD KEY `fk_usuarios_localidade1_idx` (`localidade_id_localidade`),
  ADD KEY `fk_usuarios_centro_custo1_idx` (`centro_custo_id_custo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centro_custo`
--
ALTER TABLE `centro_custo`
  MODIFY `id_custo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `localidade`
--
ALTER TABLE `localidade`
  MODIFY `id_localidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `niveis_acesso`
--
ALTER TABLE `niveis_acesso`
  MODIFY `id_niveis_acesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_produtos1` FOREIGN KEY (`produtos_id_produtos`) REFERENCES `produtos` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_status1` FOREIGN KEY (`status_id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pedidos_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_centro_custo1` FOREIGN KEY (`centro_custo_id_custo`) REFERENCES `centro_custo` (`id_custo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_localidade1` FOREIGN KEY (`localidade_id_localidade`) REFERENCES `localidade` (`id_localidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_niveis_acesso` FOREIGN KEY (`nivel_acesso`) REFERENCES `niveis_acesso` (`id_niveis_acesso`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
