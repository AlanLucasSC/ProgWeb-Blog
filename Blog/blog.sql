-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 25-Out-2017 às 22:50
-- Versão do servidor: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

DROP TABLE IF EXISTS `comentario`;
CREATE TABLE IF NOT EXISTS `comentario` (
  `comentario` text NOT NULL,
  `status` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ult_alt` datetime DEFAULT NULL,
  `ult_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `post_id` (`post_id`),
  KEY `ult_usuario_id` (`ult_usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`comentario`, `status`, `usuario_id`, `post_id`, `id`, `ult_alt`, `ult_usuario_id`) VALUES
('Batata Shoooooooooooooooooooooooooooooow!!!!!!!!!!', 1, 2, 18, 1, '2017-10-17 00:00:00', 0),
('Ahoooooo', 1, 2, 18, 2, '2017-10-01 00:00:00', 0),
('Eu sou o verdadeiro Dougras', 1, 5, 18, 3, '2017-10-09 00:00:00', 0),
('Não gosto de batata', 1, 5, 19, 4, '2017-10-02 00:00:00', 0),
('Oi eu sou o hue', 1, 4, 18, 5, '2017-10-04 00:00:00', 0),
('Eu sou o Drougras', 1, 4, 19, 6, '2017-10-05 00:00:00', 0),
('Eu fiz essa musica', 1, 5, 20, 7, '2017-10-01 00:00:00', 0),
('Eu sou o palha', 0, 8, 21, 8, '2017-10-02 00:00:00', 0),
('OI eu sou o goku', 0, 11, 4, 9, '2017-10-25 22:39:41', 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `usuario_id` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Descricao` varchar(200) NOT NULL,
  `post` text NOT NULL,
  `creation_time` datetime NOT NULL,
  `ult_usuario_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `ult_usuario_id` (`ult_usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`usuario_id`, `Titulo`, `Descricao`, `post`, `creation_time`, `ult_usuario_id`, `status`, `id`) VALUES
(2, 'Teste', 'só mais um teste', 'Som, Sooooooooooom, Testando o Soooooooooooooooom\r\nBaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaatata, leite', '2017-10-25 22:17:27', 2, 1, 1),
(2, 'Dougras', 'Sub_Titulo', 'Eu sou o dougras', '2017-10-17 23:49:00', 0, 1, 2),
(2, 'Ha', 'Batata', 'Batata é bom!', '2017-10-25 22:41:11', 2, 1, 4),
(4, 'Apresentação', 'Sub_Titulo', 'OI, eu sou o hue', '2017-10-13 03:01:40', 0, 1, 5),
(2, 'OI', 'Sub_Titulo', 'OI', '2017-10-25 22:18:01', 2, 1, 6),
(2, 'Mini-poker', 'Sub_Titulo', 'História fictícia.\r\n\r\nUm programador estava sem fazer nada, pois estava de férias. Então no meio da tarde ele pensou em fazer um jogo. Ele pensou por dias e dias em um jogo que ele conseguisse programar e de fácil implementação. Mas nada vinha na mente. Depois de acordar de um sonho, onde ele jogava poker e ganha um montante de algo, ele pensou em fazer um jogo de poker. Mas a preguiça o alertava. O jogo de poker tem diversas rodadas e diversos naipes, tornando o jogo complexo. Mas ele não desistiu, aquele sonho era uma mensagem. Até que uma idéia veio a sua cabeça. Tornar o poker mais fácil. Assim, o mini-poker foi criado. Logo abaixo estão as regras do jogo.\r\nNo início do jogo, cada jogador recebe cinco cartas. O conjunto de cinco cartas vale um certo número de pontos, de acordo com as regras descritas abaixo. Diferentemente do jogo de Poker normal, em Mini-Poker o naipe das cartas é desconsiderado. Assim, para simplificar a descrição do jogo, vamos utilizar os números de 1 a 13 para identificar as cartas do baralho, na ordem dada acima. Uma outra diferença é que pode ocorrer empate entre mais de um vencedor, nesse caso os vencedores dividem o prêmio.', '2017-10-13 03:25:51', 0, 1, 7),
(5, 'Cominicado', 'Sub_Titulo', 'Eu sou o Dougras', '2017-10-25 22:17:59', 2, 1, 8),
(5, 'Mini-Poker', '1. Problema - As regras para pontuação em Mini-Poker são as seguintes:', '1. Se as cinco cartas estão em seqüência a partir da carta x (ou seja, os valores das cartas são x, x+1, x+2, x+3 e x+4), a pontuação é x+200 pontos. Por exemplo, se as cartas recebidas são 10, 9, 8, 11 e 12, a pontuação é 208 pontos.\r\n2. Se há quatro cartas iguais x (uma quadra, ou seja, os valores das cartas são x, x, x, x e y), a pontuação é x+180 pontos. Por exemplo, se as cartas recebidas são 1, 1, 1, 10 e 1, a pontuação é 181 pontos.\r\n3. Se há três cartas iguais x e duas outras cartas iguais y (uma trinca e um par, ou seja, os valores das cartas são x, x, x, y e y), a pontuação é x + 160 pontos. Por exemplo, se as cartas recebidas são 10, 4, 4, 10 e 4, a pontuação é 164 pontos.\r\n4. Se há três cartas iguais x e duas outras cartas diferentes y e z (uma trinca, ou seja, os valores das cartas são x, x, x, y e z), a pontuação é x + 140 pontos. Por exemplo, se as cartas recebidas são 2, 3, 2, 2 e 13, a pontuação é 142 pontos.\r\n5. Se há duas cartas iguais x, duas outras cartas iguais y (x != y) e uma outra carta distinta z (dois pares, ou seja, os valores das cartas são x, x, y, y e z), a pontuação é 3 × x + 2 × y + 20 pontos, em que x > y. Por exemplo, se as cartas recebidas são 12, 7, 12, 8 e 7, a pontuação é 70 pontos.\r\n6. Se há apenas duas cartas iguais x e as outras são todas distintas (um par, ou seja, os valores das cartas são x, x, y, z e t), a pontuação é x pontos. Por exemplo, se as cartas recebidas são 12, 13, 5, 8 e 13, a pontuação é 13 pontos.\r\n7. Se todas as cartas são distintas, não há pontuação.', '2017-10-13 03:46:33', 0, 1, 9),
(5, 'Mini-Poker', '1. Problema - As regras para pontuação em Mini-Poker', '1. Se as cinco cartas estão em seqüência a partir da carta x (ou seja, os valores das cartas são x, x+1, x+2, x+3 e x+4), a pontuação é x+200 pontos. Por exemplo, se as cartas recebidas são 10, 9, 8, 11 e 12, a pontuação é 208 pontos.\r\n2. Se há quatro cartas iguais x (uma quadra, ou seja, os valores das cartas são x, x, x, x e y), a pontuação é x+180 pontos. Por exemplo, se as cartas recebidas são 1, 1, 1, 10 e 1, a pontuação é 181 pontos.\r\n3. Se há três cartas iguais x e duas outras cartas iguais y (uma trinca e um par, ou seja, os valores das cartas são x, x, x, y e y), a pontuação é x + 160 pontos. Por exemplo, se as cartas recebidas são 10, 4, 4, 10 e 4, a pontuação é 164 pontos.\r\n4. Se há três cartas iguais x e duas outras cartas diferentes y e z (uma trinca, ou seja, os valores das cartas são x, x, x, y e z), a pontuação é x + 140 pontos. Por exemplo, se as cartas recebidas são 2, 3, 2, 2 e 13, a pontuação é 142 pontos.\r\n5. Se há duas cartas iguais x, duas outras cartas iguais y (x != y) e uma outra carta distinta z (dois pares, ou seja, os valores das cartas são x, x, y, y e z), a pontuação é 3 × x + 2 × y + 20 pontos, em que x > y. Por exemplo, se as cartas recebidas são 12, 7, 12, 8 e 7, a pontuação é 70 pontos.\r\n6. Se há apenas duas cartas iguais x e as outras são todas distintas (um par, ou seja, os valores das cartas são x, x, y, z e t), a pontuação é x pontos. Por exemplo, se as cartas recebidas são 12, 13, 5, 8 e 13, a pontuação é 13 pontos.\r\n7. Se todas as cartas são distintas, não há pontuação.', '2017-10-13 03:48:05', 0, 1, 10),
(2, 'Teste comandos', '<h3>BATATA</h3>', 'É só um teste', '2017-10-25 22:17:56', 2, 1, 11),
(2, 'OI Esse é mais um teste', 'HUehuehuehu\r\nhuehuehue\r\nhuehue', '<p></p>', '2017-10-25 22:17:53', 2, 1, 12),
(2, 'Batata Show', 'batata show', '<p>batata show</p>', '2017-10-13 18:59:54', 0, 1, 13),
(2, 'Teste', 'Testanto os enters', '<p>Batata\r\n\r\nBatata\r\n\r\nBatata</p>', '2017-10-25 22:17:51', 2, 1, 14),
(2, 'Quebra de texto', 'teste para quebrar texto', '<p>uahsdhashufhashfahf\r\naf\r\n\r\n\r\nfaihfsuhufhuahfhuashf\r\n\r\n\r\nfauhfuhsaufhuahufhuahs\r\n<br>\r\nfaiiiasdsahfuhasuhf\r\n\r\nhfushaufhsuahuhsua</p>', '2017-10-17 20:00:23', 0, 1, 15),
(2, 'Olá pessoal', 'Esse é só um teste', '<p>BATATA ASSADA</p>', '2017-10-19 18:07:15', 0, 1, 16),
(2, 'ShowPost.php', 'Código do ShowPost', '<p><?php\r\necho \"<br><br>\";\r\n					try {\r\n						$user = \'root\';\r\n						$pass = \'\';\r\n					    $dbh = new PDO(\'mysql:host=localhost;dbname=blog\', $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => \"SET NAMES \'utf8\'\"));\r\n					    $path = \'SELECT post.post, post.creation_time, usuario.nome, post.Titulo, post.Descricao\r\n											 FROM usuario\r\n											 INNER JOIN post\r\n											 ON usuario.id = post.usuario_id\r\n											 WHERE post.id = \'.$_GET[\'id\'].\';\';\r\n					    foreach($dbh->query($path) as $row) {\r\n					        //print_r($row);\r\n					        $path = \"\'ShowPost.php\'\";\r\n					        echo \'<div style=\"margin: auto; width: 50%;\">\';\r\n					    			echo \'<div > <p ><h4 style=\"display: inline;\" >Criação: </h4> \'.$row[\'creation_time\'].\"</div> \";\r\n					    			echo \'<div > <h3 style=\"margin-bottom: 0px;\">Titulo: \'.$row[\'Titulo\'].\"</h3></div> \";;\r\n					    			echo \'<div > <h4 style=\"margin-top: 0px; color: black\">\'.$row[\'Descricao\'].\"</h4></div> \";\r\n					    			echo \'<div> <p style=\"white-space: pre-line;\">\'.$row[\'post\'].\"</p></div> \";\r\n					    			echo \'<div class=\"desc\" style=\" margin-left: 45%; text-align: left;\" > Por: \'.$row[\'nome\'].\"</div> \";\r\n					    			\r\n					    	echo \"</div>\";\r\n					    	echo \"<hr style=\' margin-left: 10%; margin-right: 10%;\'>\";\r\n					    	echo \"<br >\";\r\n					    }\r\n\r\n					} catch (PDOException $e) {\r\n					    print \"Error!: \" . $e->getMessage() . \"<br/>\";\r\n					    die();\r\n					}\r\n				?></p>', '2017-10-19 18:40:29', 0, 1, 17),
(2, 'Teste', 'teste', '<p><br><br>\r\n<h1>BATATA</h1></p>', '2017-10-25 22:17:48', 2, 1, 18),
(2, 'Novo teste', 'Teste de ver se um comando está entrando na variavel', '\r\n\r\n\r\n\r\nBatata Show', '2017-10-25 22:17:47', 2, 1, 19),
(2, 'Eu sou o Dougras', 'Musica do Youtube', 'Eu sou o Dougras\r\nVocê não é o Dougras (x2)\r\n\r\nEu estou aqui, to aqui\r\nEstou aqui, com irmaozão, Gabriel, Miguel, Samuel\r\nTinha uns casal aqui, tinha aqui\r\nAgora tem um monte de mato aqui\r\nTem um monte de mato aqui\r\n\r\nEu to aí (x3)\r\n\r\nMeu amigo\r\nDeus é bão\r\n\r\nEstamos junto\r\nNa seleção brasileira jogando Neymar e o Kaká\r\nCristiano Ronaldo, Messi\r\nO Cristiano Ronaldo é o melhor jogador do mundo rapai\r\nÉ, mas nóis é fei hein fi\r\nNão, você é fei hein fi\r\nNão, cê é fei hein fi\r\n\r\nO ma me ma ha he\r\nAlududidudid\r\nAlududidudid\r\nAlududidudid\r\nAbububububububu\r\nAbububububububub\r\nAbebebea hae\r\nAb eb aehba beh ah ah\r\n\r\nAaaaaahhh\r\n\r\nEu sou o Dougras\r\nVocê não é o Dougras (x2)', '2017-10-24 16:01:14', 0, 1, 20),
(4, 'Poema', 'Um poema escrito por min', 'Batatinha quando nasce espalha a rama pelo chão.\r\nMenininha quando dorme põe a mão no coração.\r\nSou pequeninha do tamanho do botão,\r\ncarrego papai no bolso e mamãe no coração.\r\nO bolso furou e o papai caiu no chão.\r\nMamãe que é mais querida ficou no coração.', '2017-10-25 14:00:25', 0, 1, 21),
(2, 'teste', 'só mais um teste', 'blabla', '2017-01-12 12:01:00', 2, 1, 22),
(2, 'Teste de historico', 'só testando', 'blablablabla', '2017-10-25 22:49:13', 2, 1, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `Mudanca` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `nome` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `ult_alt` datetime DEFAULT NULL,
  `alt_usuario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alt_usuario_id` (`alt_usuario_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `tipo`, `senha`, `id`, `status`, `ult_alt`, `alt_usuario_id`) VALUES
('Alan', 4, '123', 2, 1, '2017-10-25 22:19:24', 2),
('batatinha', 3, 'quandonasce', 4, 1, '2017-10-02 00:00:00', 0),
('ovo', 2, 'cuzido', 6, 1, '2017-10-25 22:43:34', 2),
('Dougras', 2, 'eusou', 5, 1, '2017-10-01 00:00:00', 0),
('palha', 3, 'assada', 8, 1, '2017-10-25 22:43:57', 2),
('Alan Lucas Silva de Castro', 1, '123456', 9, 1, '2017-10-07 00:00:00', 0),
('batataSalgada', 1, '123', 10, 1, NULL, 1),
('Goku', 1, 'oieusouogoku', 11, 1, '2017-10-25 22:34:22', 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
