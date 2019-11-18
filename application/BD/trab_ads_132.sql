-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 18-Nov-2019 às 23:17
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trab_ads_132`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(8) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(5, 'Problema'),
(6, 'Configuração'),
(7, 'Dúvida');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado`
--

CREATE TABLE `chamado` (
  `id` int(8) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `idrequerente` int(8) DEFAULT NULL,
  `idtecnico` int(8) DEFAULT NULL,
  `idcomputador` int(8) DEFAULT NULL,
  `idcategoria` int(8) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `solucao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `chamado`
--

INSERT INTO `chamado` (`id`, `titulo`, `descricao`, `idrequerente`, `idtecnico`, `idcomputador`, `idcategoria`, `STATUS`, `solucao`) VALUES
(2, 'chamado', 'chamado chamado chamado chamado chamado', 4, 1, 3, 5, 'Fechado', 'dddd'),
(9, 'Teste', 'Primeiro teste com Fechamento', 1, NULL, 1, 0, 'Fechado', 'Solucionado'),
(10, 'Chamado', 'Chamado do Paulo', 4, NULL, 2, 6, 'Fechado', 'Solucap'),
(11, 'Erro', 'Erroooo', 4, NULL, 2, 5, 'Fechado', 'AAcerto'),
(12, 'Titulo', 'Descricao', 4, NULL, 2, 6, 'Fechado', 'SoluÃ§Ã£o'),
(13, 'Outro Erro', 'Erooooooor', 4, NULL, 2, 6, 'Fechado', 'SoluÃ§Ã£o'),
(14, 'Novo', 'Chamado de aÃ§ao', 4, NULL, 3, 6, 'Fechado', 'solu'),
(15, 'Chamado', 'adsdsds', 1, NULL, 2, 6, 'Fechado', 'asda'),
(16, 'Pedro', 'Pedro abriu um chamado', 3, NULL, 2, 6, 'Fechado', 'solved'),
(17, 'Chamado', 'Do Billy', 1, NULL, 2, 6, 'Fechado', 'bb'),
(18, 'Problema', 'Desc', 1, NULL, 2, 6, 'Fechado', 'ww'),
(20, 'blallalalal', 'Lorem ipsum ultrices viverra vel dui aliquam ipsum metus aenean, accumsan ullamcorper tincidunt interdum aenean sit ornare purus, nam in suscipit magna curae velit libero nec. dictum leo iaculis libero rhoncus ut orci libero dictumst odio, accumsan vehicula tempor eleifend adipiscing eros senectus amet pulvinar, vehicula imperdiet lacinia placerat nulla mattis ligula pretium. mi bibendum hendrerit turpis diam cubilia metus arcu vivamus, fermentum dolor auctor hac quisque habitasse commodo, laoreet lectus curabitur blandit nec sit mi. sem torquent vestibulum euismod ut habitasse imperdiet eu dictumst, aliquam lorem pretium felis nunc euismod elit tellus, egestas malesuada fames in sapien primis scelerisque. ', 4, NULL, 2, 6, 'Fechado', 'bla'),
(21, 'Erro', 'Lorem ipsum ultrices viverra vel dui aliquam ipsum metus aenean, accumsan ullamcorper tincidunt interdum aenean sit ornare purus, nam in suscipit magna curae velit libero nec. dictum leo iaculis libero rhoncus ut orci libero dictumst odio, accumsan vehicula tempor eleifend adipiscing eros senectus amet pulvinar, vehicula imperdiet lacinia placerat nulla mattis ligula pretium. mi bibendum hendrerit turpis diam cubilia metus arcu vivamus, fermentum dolor auctor hac quisque habitasse commodo, laoreet lectus curabitur blandit nec sit mi. sem torquent vestibulum euismod ut habitasse imperdiet eu dictumst.\r\n\r\naliquam lorem pretium felis nunc euismod elit tellus, egestas malesuada fames in sapien primis scelerisque. ', 1, NULL, 2, 6, 'Fechado', '\\'),
(35, 'gjhghj', 'ghjgj', 1, NULL, NULL, NULL, 'Fechado', 'ghjghj'),
(36, 'jkhjkh', 'hjkh', 2, NULL, NULL, NULL, 'Fechado', 'hjkh'),
(37, 'Titulo444', '5555', 2, NULL, NULL, NULL, 'Fechado', 'aaa'),
(38, 'OIEEEEEE', 'TESSSSSTE', 2, NULL, NULL, NULL, 'Fechado', 'sdnfbksjd'),
(39, 'Chamado de teste', 'Isto é um teste', 2, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(40, 'Chamado de teste', 'Chamado de teste', 2, NULL, NULL, NULL, 'Fechado', 'teste de solução'),
(41, 'Chamado de teste', 'isso é um teste', 2, NULL, 5, 5, 'Fechado', 's'),
(42, 'novo', 'novo', 2, NULL, 5, 5, 'Fechado', 's'),
(43, 'Bla', 'Novo bla', 1, NULL, 2, 5, 'Fechado', 'ss'),
(44, 'Erro', 'Probrela', 1, NULL, 5, 5, 'Fechado', 'aaaa'),
(45, 'NOvo', 'Criado para teste do relatório', 1, NULL, 5, 5, 'Novo', NULL),
(46, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução.'),
(47, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução.'),
(48, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de Solução'),
(49, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(50, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução.'),
(51, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(52, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Novo', ''),
(53, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(54, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(55, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução'),
(56, 'Chamado de teste', 'Isto é um teste', 1, NULL, NULL, NULL, 'Fechado', 'Teste de solução');

-- --------------------------------------------------------

--
-- Estrutura da tabela `computador`
--

CREATE TABLE `computador` (
  `id` int(8) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `computador`
--

INSERT INTO `computador` (`id`, `nome`) VALUES
(5, 'NB001'),
(2, 'PC001'),
(3, 'PC012'),
(4, 'PC022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `nome`) VALUES
(1, 'Financeiro'),
(2, 'TI');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(8) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `idsetor` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`, `tipo`, `idsetor`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2),
(4, 'Paulo', 'c6cc8094c2dc07b700ffcc36d64e2138', 'tecnico', 1),
(7, 'Joao', 'dccd96c256bc7dd39bae41a405f25e43', 'requerente', 1),
(10, 'adm', 'b09c600fddc573f117449b3723f23d64', 'admin', 1),
(12, 'pedro', 'c6cc8094c2dc07b700ffcc36d64e2138', 'requerente', 1),
(14, 'billy', '2fb224ee5fa7e80253a5eda927f3adca', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chamado`
--
ALTER TABLE `chamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_requerente` (`idrequerente`),
  ADD KEY `fk_tecnico` (`idtecnico`),
  ADD KEY `fk_categoria` (`idcategoria`),
  ADD KEY `fk_computador` (`idcomputador`);

--
-- Indexes for table `computador`
--
ALTER TABLE `computador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `idsetor` (`idsetor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chamado`
--
ALTER TABLE `chamado`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `computador`
--
ALTER TABLE `computador`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idsetor`) REFERENCES `setor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
