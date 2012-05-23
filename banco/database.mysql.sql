-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.91-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema livro
--

CREATE DATABASE IF NOT EXISTS livro;
USE livro;

--
-- Definition of table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorias`
--

/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`,`nome`,`descricao`) VALUES 
 (1,'Eletrônicos ','Produtos eletrônicos em geral'),
 (2,'Telefonia fixa','Telefones, aparelhos de fax, secretárias eletrônicas, identificadores de chamadas'),
 (3,'Telefonia móvel','Celulares, baterias, carregadores, cabos, cartões de memória'),
 (4,'Fotografia Digital','Câmeras, lentes, baterias, pilhas, carregadores, filtros, acessórios'),
 (5,'Informática','Computadores Desktop, Laptops, baterias, carregadores, impressoras, drivers externos, etc.'),
 (6,'Suprimentos','Toners, Cartuchos de tinta, papel, cds, dvds etc.'),
 (7,'Acessórios','Pen-drives, filtros de linha, extensões, bolsas e mochilas, mouse pads, suportes etc.');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;


--
-- Definition of table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`,`ip_address`,`user_agent`,`last_activity`,`user_data`) VALUES 
 ('542ffc269ee5ec3e95665935a97a90ca','127.0.0.1','Mozilla/5.0 (Windows; U; Windows NT 6.0; en-US; rv',1283340712,NULL);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


--
-- Definition of table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `categoria` int(10) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `foto` varchar(45) NOT NULL,
  `preco` decimal(9,2) NOT NULL,
  `descricao` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_produtos_Categoria` (`categoria`),
  CONSTRAINT `FK_produtos_Categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produtos`
--

/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` (`id`,`categoria`,`nome`,`foto`,`preco`,`descricao`) VALUES 
 (1,1,'TV LCD 40\"','7c50d9c0fe2688b07747223d0595dbaf.jpg','2301.95','A TV LCD de 40\" apresenta a beleza da imagem em Full HD 1080p, decodificador para TV Digital embutido (DTV), interface multimídia de alta definição (3 entradas HDMI) e avançado recurso de realce das cores (Wide Color Enhancer 2). <br/><br/>Seu design é surpreendente e supera em cada característica.<br/><br/> Sua extraordinária imagem transforma as imagens em belíssimas cenas, proporcionando momentos marcantes em seu entretenimento doméstico.'),
 (2,5,'Notebook Alienware','02.jpg','7080.80','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (3,3,'Smart Phone Blackberry II','03.jpg','1301.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (4,5,'Mouse Pad Ergonomico','04.jpg','21.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (5,7,'GPS Automotivo','05.jpg','600.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (6,3,'Iphone','06.jpg','3000.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (7,7,'Ipod 16GB','07.jpg','500.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (8,1,'Ipod Nano 8GB','08.jpg','800.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (9,5,'Joystick Wireless','09.jpg','300.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (10,7,'Adaptador Bluethoot USB','10.jpg','200.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (11,1,'Mouse Wireless','11.jpg','210.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (12,6,'DVD-R','12.jpg','4.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (13,5,'Mouse Optico com Cabo','13.jpg','50.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (14,7,'Mouse Pad','14.jpg','10.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (15,4,'Webcam Bolha','15.jpg','100.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (16,5,'Pendrive 16GB','16.jpg','120.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (17,7,'Mochila para Notebook','17.jpg','300.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (18,5,'Teclado Wireless','18.jpg','250.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (19,5,'Notebook Pink','19.jpg','5000.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (22,1,'TV LCD 50\"','22.jpg','7000.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição '),
 (23,2,'Telefone Sem Fio','foto-telefone-sem-fio-01.jpg','200.00','Descrição descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição  descrição ');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `Unique_Login` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`nome`,`usuario`,`senha`) VALUES 
 (1,'Administrador do website','admin','admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
