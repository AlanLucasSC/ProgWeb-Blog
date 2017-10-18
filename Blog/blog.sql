-- phpMyAdmin SQL Dump
-- version 4.6.6deb1+deb.cihar.com~trusty.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 18/10/2017 às 11:27
-- Versão do servidor: 5.5.55-0ubuntu0.14.04.1
-- Versão do PHP: 7.0.20-2~ubuntu14.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Comentario`
--

CREATE TABLE `Comentario` (
  `id` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `data_e_horario` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_comentario`
--

CREATE TABLE `historico_comentario` (
  `id` int(11) NOT NULL,
  `comentario_id` int(11) NOT NULL,
  `fk_tipo_id` int(11) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historico_post`
--

CREATE TABLE `historico_post` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `post`
--

CREATE TABLE `post` (
  `usuario_id` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descricao` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `creation_time` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `post`
--

INSERT INTO `post` (`usuario_id`, `Titulo`, `Descricao`, `post`, `creation_time`, `id`, `Status`) VALUES
(2, 'Teste', 'Sub_Titulo', 'aijifjiajidjiasjdjisjidjsijdi', '2017-10-10 22:59:00', 1, 0),
(2, 'Dougras', 'Sub_Titulo', 'Eu sou o dougras', '2017-10-17 23:49:00', 2, 0),
(2, 'Ha', 'Sub_Titulo', 'HUehuhuheuhuehheuhehheheuehuhuehehuhuehuhuhuehhuehueh\r\nAtt.\r\nMuleque ha', '2017-10-12 07:52:00', 4, 0),
(4, 'Apresentação', 'Sub_Titulo', 'OI, eu sou o hue', '2017-10-13 03:01:40', 5, 0),
(2, 'OI', 'Sub_Titulo', 'OI', '2017-10-13 03:24:57', 6, 0),
(2, 'Mini-poker', 'Sub_Titulo', 'História fictícia.\r\n\r\nUm programador estava sem fazer nada, pois estava de férias. Então no meio da tarde ele pensou em fazer um jogo. Ele pensou por dias e dias em um jogo que ele conseguisse programar e de fácil implementação. Mas nada vinha na mente. Depois de acordar de um sonho, onde ele jogava poker e ganha um montante de algo, ele pensou em fazer um jogo de poker. Mas a preguiça o alertava. O jogo de poker tem diversas rodadas e diversos naipes, tornando o jogo complexo. Mas ele não desistiu, aquele sonho era uma mensagem. Até que uma idéia veio a sua cabeça. Tornar o poker mais fácil. Assim, o mini-poker foi criado. Logo abaixo estão as regras do jogo.\r\nNo início do jogo, cada jogador recebe cinco cartas. O conjunto de cinco cartas vale um certo número de pontos, de acordo com as regras descritas abaixo. Diferentemente do jogo de Poker normal, em Mini-Poker o naipe das cartas é desconsiderado. Assim, para simplificar a descrição do jogo, vamos utilizar os números de 1 a 13 para identificar as cartas do baralho, na ordem dada acima. Uma outra diferença é que pode ocorrer empate entre mais de um vencedor, nesse caso os vencedores dividem o prêmio.', '2017-10-13 03:25:51', 7, 0),
(5, 'Cominicado', 'Sub_Titulo', 'Eu sou o Dougras', '2017-10-13 03:31:30', 8, 0),
(5, 'Mini-Poker', '1. Problema - As regras para pontuação em Mini-Poker são as seguintes:', '1. Se as cinco cartas estão em seqüência a partir da carta x (ou seja, os valores das cartas são x, x+1, x+2, x+3 e x+4), a pontuação é x+200 pontos. Por exemplo, se as cartas recebidas são 10, 9, 8, 11 e 12, a pontuação é 208 pontos.\r\n2. Se há quatro cartas iguais x (uma quadra, ou seja, os valores das cartas são x, x, x, x e y), a pontuação é x+180 pontos. Por exemplo, se as cartas recebidas são 1, 1, 1, 10 e 1, a pontuação é 181 pontos.\r\n3. Se há três cartas iguais x e duas outras cartas iguais y (uma trinca e um par, ou seja, os valores das cartas são x, x, x, y e y), a pontuação é x + 160 pontos. Por exemplo, se as cartas recebidas são 10, 4, 4, 10 e 4, a pontuação é 164 pontos.\r\n4. Se há três cartas iguais x e duas outras cartas diferentes y e z (uma trinca, ou seja, os valores das cartas são x, x, x, y e z), a pontuação é x + 140 pontos. Por exemplo, se as cartas recebidas são 2, 3, 2, 2 e 13, a pontuação é 142 pontos.\r\n5. Se há duas cartas iguais x, duas outras cartas iguais y (x != y) e uma outra carta distinta z (dois pares, ou seja, os valores das cartas são x, x, y, y e z), a pontuação é 3 × x + 2 × y + 20 pontos, em que x > y. Por exemplo, se as cartas recebidas são 12, 7, 12, 8 e 7, a pontuação é 70 pontos.\r\n6. Se há apenas duas cartas iguais x e as outras são todas distintas (um par, ou seja, os valores das cartas são x, x, y, z e t), a pontuação é x pontos. Por exemplo, se as cartas recebidas são 12, 13, 5, 8 e 13, a pontuação é 13 pontos.\r\n7. Se todas as cartas são distintas, não há pontuação.', '2017-10-13 03:46:33', 9, 0),
(5, 'Mini-Poker', '1. Problema - As regras para pontuação em Mini-Poker', '1. Se as cinco cartas estão em seqüência a partir da carta x (ou seja, os valores das cartas são x, x+1, x+2, x+3 e x+4), a pontuação é x+200 pontos. Por exemplo, se as cartas recebidas são 10, 9, 8, 11 e 12, a pontuação é 208 pontos.\r\n2. Se há quatro cartas iguais x (uma quadra, ou seja, os valores das cartas são x, x, x, x e y), a pontuação é x+180 pontos. Por exemplo, se as cartas recebidas são 1, 1, 1, 10 e 1, a pontuação é 181 pontos.\r\n3. Se há três cartas iguais x e duas outras cartas iguais y (uma trinca e um par, ou seja, os valores das cartas são x, x, x, y e y), a pontuação é x + 160 pontos. Por exemplo, se as cartas recebidas são 10, 4, 4, 10 e 4, a pontuação é 164 pontos.\r\n4. Se há três cartas iguais x e duas outras cartas diferentes y e z (uma trinca, ou seja, os valores das cartas são x, x, x, y e z), a pontuação é x + 140 pontos. Por exemplo, se as cartas recebidas são 2, 3, 2, 2 e 13, a pontuação é 142 pontos.\r\n5. Se há duas cartas iguais x, duas outras cartas iguais y (x != y) e uma outra carta distinta z (dois pares, ou seja, os valores das cartas são x, x, y, y e z), a pontuação é 3 × x + 2 × y + 20 pontos, em que x > y. Por exemplo, se as cartas recebidas são 12, 7, 12, 8 e 7, a pontuação é 70 pontos.\r\n6. Se há apenas duas cartas iguais x e as outras são todas distintas (um par, ou seja, os valores das cartas são x, x, y, z e t), a pontuação é x pontos. Por exemplo, se as cartas recebidas são 12, 13, 5, 8 e 13, a pontuação é 13 pontos.\r\n7. Se todas as cartas são distintas, não há pontuação.', '2017-10-13 03:48:05', 10, 0),
(2, 'Teste comandos', '<h3>BATATA</h3>', 'É só um teste', '2017-10-13 13:40:55', 11, 0),
(2, 'OI Esse é mais um teste', 'HUehuehuehu\r\nhuehuehue\r\nhuehue', '<p></p>', '2017-10-13 13:42:45', 12, 0),
(2, 'Batata Show', 'batata show', '<p>batata show</p>', '2017-10-13 18:59:54', 13, 0),
(2, 'Teste', 'Testanto os enters', '<p>Batata\r\n\r\nBatata\r\n\r\nBatata</p>', '2017-10-14 04:12:58', 14, 0),
(2, 'Quebra de texto', 'teste para quebrar texto', '<p>uahsdhashufhashfahf\r\naf\r\n\r\n\r\nfaihfsuhufhuahfhuashf\r\n\r\n\r\nfauhfuhsaufhuahufhuahs\r\n<br>\r\nfaiiiasdsahfuhasuhf\r\n\r\nhfushaufhsuahuhsua</p>', '2017-10-17 20:00:23', 15, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) UNSIGNED NOT NULL,
  `Mudanca` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `tipo`, `senha`, `id`, `Status`) VALUES
('Alann', 2, '123', 2, 0),
('Dougras', 2, '123', 5, 0),
('Hue', 2, '123', 4, 0),
('Batata', 1, 'Show', 6, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Comentario`
--
ALTER TABLE `Comentario`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `historico_comentario`
--
ALTER TABLE `historico_comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_id` (`comentario_id`);

--
-- Índices de tabela `historico_post`
--
ALTER TABLE `historico_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Índices de tabela `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Comentario`
--
ALTER TABLE `Comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `historico_comentario`
--
ALTER TABLE `historico_comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `historico_post`
--
ALTER TABLE `historico_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
