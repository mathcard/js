-- MySQL dump 10.16  Distrib 10.1.31-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: teste
-- ------------------------------------------------------
-- Server version	10.1.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acrescimo`
--

DROP TABLE IF EXISTS `acrescimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acrescimo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcont` varchar(12) NOT NULL,
  `valorparc` double(10,2) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acrescimo_contrato_fk` (`numcont`),
  CONSTRAINT `acrescimo_contrato_fk` FOREIGN KEY (`numcont`) REFERENCES `contrato` (`num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acrescimo`
--

LOCK TABLES `acrescimo` WRITE;
/*!40000 ALTER TABLE `acrescimo` DISABLE KEYS */;
INSERT INTO `acrescimo` VALUES (1,'0022018',344.90,'referente ao aumento de funcionarios.'),(2,'0022018',344.90,'referente ao aumento de funcionarios.'),(3,'0012018',590.00,'garÃ§ons'),(4,'0022018',400.00,'pediu mais funcionarios'),(5,'0022018',450.00,'pq quiz'),(6,'0092018',1500.10,'Contratou 2 Horas Extras');
/*!40000 ALTER TABLE `acrescimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bem`
--

DROP TABLE IF EXISTS `bem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `dtaquisicao` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bem`
--

LOCK TABLES `bem` WRITE;
/*!40000 ALTER TABLE `bem` DISABLE KEYS */;
INSERT INTO `bem` VALUES (1,'Camara Fria','Lugar onde Ã© guardado os frios','2018-05-10',15000.00),(2,'Caixas de Som','Equipamentos sonoros do estudio','2018-01-02',7040.06),(3,'SofÃ¡ de Molas','SofÃ¡ com molas no escritorio','2018-06-02',2300.11);
/*!40000 ALTER TABLE `bem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `profissao` varchar(35) NOT NULL,
  `rg` varchar(7) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `fone1` varchar(15) NOT NULL,
  `fone2` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cep` int(11) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Joao Leite','Empresario','8780600','80021322205','(62)99276-1418','(62)993780010','teste@hotmail.com',76170000,'Rua 10',23,'Qd10 Lt10','Marista','Goiania'),(2,'Math Carm','Programer','7777777','88888888888','(62) 99266-1418','(62) 99244-5566','jlahotma@hotmail.com',74713290,'Av. JK',999,'qd.3 lt.3','Setor Jamanta','Narnia'),(3,'Juca Tais','Professor','8780990','80093322205','(62)99386-1411','(62)992682014','teste@hotmail.com',76170000,'Rua 10',23,'Qd10 Lt10','Marista','Goiania'),(4,'Paula Catita','Medica','8780990','80093322205','(62)99386-1442','(62)993754014','teste@hotmail.com',76170000,'Rua 10',20,'Qd10 Lt10','Jd New World','Goiania'),(5,'Martin Silva','Jogador de Futebol','4309580','43904890840','(62) 03333-3333','(64) 03564-3039','martinsilvaogoleiro@gmail.com',74713290,'Rua Los Angeles',344,'Qd.10 Lt.10','Jardim Novo Mundo','GoiÃ¢nia');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contasapagar`
--

DROP TABLE IF EXISTS `contasapagar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contasapagar` (
  `registro` int(11) NOT NULL AUTO_INCREMENT,
  `numcont` varchar(12) NOT NULL,
  `idforn` int(11) NOT NULL,
  `parcela` int(11) NOT NULL,
  `dataemissao` date NOT NULL,
  `datavenc` date NOT NULL,
  `valorparc` double(10,2) NOT NULL,
  `formapg` varchar(20) NOT NULL,
  `datapg` date DEFAULT NULL,
  `valorreb` double(10,2) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`registro`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contasapagar`
--

LOCK TABLES `contasapagar` WRITE;
/*!40000 ALTER TABLE `contasapagar` DISABLE KEYS */;
INSERT INTO `contasapagar` VALUES (3,'111',3,1,'2018-05-28','2018-06-28',150.00,'boleto','2018-05-30',150.00,1),(4,'111',3,2,'2018-05-28','2018-06-28',150.00,'boleto',NULL,NULL,NULL),(5,'111',3,3,'2018-05-28','2018-07-28',50.00,'boleto',NULL,NULL,NULL),(6,'111',3,1,'2018-05-28','2018-06-28',150.00,'boleto','2018-05-30',150.00,1),(7,'111',3,2,'2018-05-28','2018-06-28',150.00,'boleto',NULL,NULL,NULL),(8,'111',3,3,'2018-05-28','2018-07-28',50.00,'boleto',NULL,NULL,NULL),(9,'111',3,1,'2018-05-28','2018-06-28',150.00,'boleto',NULL,NULL,NULL),(10,'111',3,2,'2018-05-28','2018-06-28',150.00,'boleto',NULL,NULL,NULL),(11,'111',3,3,'2018-05-28','2018-07-28',50.00,'boleto',NULL,NULL,NULL),(12,'78',2,1,'2018-05-28','2018-09-28',400.00,'cheque','2018-05-30',400.00,1),(13,'0062018',2,1,'2018-12-31','2018-12-30',200.00,'cheque',NULL,NULL,1),(14,'0062018',2,1,'2018-12-31','2078-02-20',55.12,'cheque',NULL,NULL,1),(15,'0062018',2,1,'2018-12-31','2018-12-31',1.00,'DINHEIRO','2018-05-30',1.00,1),(16,'2',1,1,'2018-05-11','2018-06-01',50.00,'boleto',NULL,NULL,NULL),(17,'2',1,2,'2018-05-11','2018-06-01',50.00,'boleto',NULL,NULL,NULL),(18,'3',2,1,'2018-05-01','2020-01-01',555.03,'dinheiro',NULL,NULL,NULL),(19,'3',2,2,'2018-05-01','2018-07-01',2000.00,'BOLETO',NULL,NULL,NULL),(20,'3',2,3,'2018-05-01','2018-07-31',2000.00,'BOLETO',NULL,NULL,NULL),(21,'3',2,4,'2018-05-01','2018-08-30',2000.00,'BOLETO',NULL,NULL,NULL),(22,'3',2,5,'2018-05-01','2018-09-29',2000.00,'BOLETO',NULL,NULL,NULL),(23,'3',2,6,'2018-05-01','2018-10-29',2000.00,'BOLETO',NULL,NULL,NULL),(24,'3',2,7,'2018-05-01','2018-11-28',2000.00,'BOLETO',NULL,NULL,NULL),(25,'3',2,8,'2018-05-01','2018-12-28',2000.00,'BOLETO',NULL,NULL,NULL),(26,'3',2,9,'2018-05-01','2019-01-27',2000.00,'BOLETO',NULL,NULL,NULL),(27,'3',2,10,'2018-05-01','2019-02-26',2000.00,'BOLETO',NULL,NULL,NULL),(28,'3',2,11,'2018-05-01','2019-03-28',2000.00,'BOLETO',NULL,NULL,NULL),(29,'3',2,12,'2018-05-01','2019-04-27',2000.00,'BOLETO',NULL,NULL,NULL),(30,'3',2,13,'2018-05-01','2019-05-27',2000.00,'BOLETO',NULL,NULL,NULL),(31,'3',2,14,'2018-05-01','2019-06-26',2000.00,'BOLETO',NULL,NULL,NULL),(32,'3',2,15,'2018-05-01','2019-07-26',2000.00,'BOLETO',NULL,NULL,NULL),(33,'3',2,16,'2018-05-01','2019-08-25',2000.00,'BOLETO',NULL,NULL,NULL),(34,'3',2,17,'2018-05-01','2019-09-24',2000.00,'BOLETO',NULL,NULL,NULL),(35,'3',2,18,'2018-05-01','2019-10-24',2000.00,'BOLETO',NULL,NULL,NULL),(36,'3',2,19,'2018-05-01','2019-11-23',2000.00,'BOLETO',NULL,NULL,NULL),(37,'3',2,20,'2018-05-01','2019-12-23',2000.00,'BOLETO',NULL,NULL,NULL),(38,'3',2,21,'2018-05-01','2020-01-22',2000.00,'BOLETO',NULL,NULL,NULL),(39,'3',2,22,'2018-05-01','2020-02-21',2000.00,'BOLETO',NULL,NULL,NULL),(40,'3',2,23,'2018-05-01','2020-03-22',2000.00,'BOLETO',NULL,NULL,NULL),(41,'3',2,24,'2018-05-01','2020-04-21',2000.00,'BOLETO',NULL,NULL,NULL),(42,'3',2,25,'2018-05-01','2020-05-21',2000.00,'BOLETO',NULL,NULL,NULL),(43,'3',2,26,'2018-05-01','2020-06-20',2000.00,'BOLETO',NULL,NULL,NULL),(44,'3',2,27,'2018-05-01','2020-07-20',2000.00,'BOLETO',NULL,NULL,NULL),(45,'3',2,28,'2018-05-01','2020-08-19',2000.00,'BOLETO',NULL,NULL,NULL),(46,'3',2,29,'2018-05-01','2020-09-18',2000.00,'BOLETO',NULL,NULL,NULL),(47,'3',2,30,'2018-05-01','2020-10-18',2000.00,'BOLETO',NULL,NULL,NULL),(48,'3',2,31,'2018-05-01','2020-11-17',2000.00,'BOLETO',NULL,NULL,NULL),(49,'3',2,32,'2018-05-01','2020-12-17',2000.00,'BOLETO',NULL,NULL,NULL),(50,'3',2,33,'2018-05-01','2021-01-16',2000.00,'BOLETO',NULL,NULL,NULL),(51,'3',2,34,'2018-05-01','2021-02-15',2000.00,'BOLETO',NULL,NULL,NULL),(52,'3',2,35,'2018-05-01','2021-03-17',2000.00,'BOLETO',NULL,NULL,NULL),(53,'3',2,36,'2018-05-01','2021-04-16',2000.00,'BOLETO',NULL,NULL,NULL),(54,'3',2,37,'2018-05-01','2021-05-16',2000.00,'BOLETO',NULL,NULL,NULL),(55,'3',2,38,'2018-05-01','2021-06-15',2000.00,'BOLETO',NULL,NULL,NULL),(56,'3',2,39,'2018-05-01','2021-07-15',2000.00,'BOLETO',NULL,NULL,NULL),(57,'3',2,40,'2018-05-01','2021-08-14',2000.00,'BOLETO',NULL,NULL,NULL),(58,'3',2,41,'2018-05-01','2021-09-13',2000.00,'BOLETO',NULL,NULL,NULL),(59,'3',2,42,'2018-05-01','2021-10-13',2000.00,'BOLETO',NULL,NULL,NULL),(60,'3',2,43,'2018-05-01','2021-11-12',2000.00,'BOLETO',NULL,NULL,NULL),(61,'3',2,44,'2018-05-01','2021-12-12',2000.00,'BOLETO',NULL,NULL,NULL),(62,'3',2,45,'2018-05-01','2022-01-11',2000.00,'BOLETO',NULL,NULL,NULL),(63,'3',2,46,'2018-05-01','2022-02-10',2000.00,'BOLETO',NULL,NULL,NULL),(64,'3',2,47,'2018-05-01','2022-03-12',2000.00,'BOLETO',NULL,NULL,NULL),(65,'3',2,48,'2018-05-01','2022-04-11',2000.00,'BOLETO',NULL,NULL,NULL),(66,'3',2,49,'2018-05-01','2022-05-11',2000.00,'BOLETO',NULL,NULL,NULL),(67,'3',2,50,'2018-05-01','2022-06-10',2000.00,'BOLETO',NULL,NULL,NULL),(68,'3',2,51,'2018-05-01','2022-07-10',2000.00,'BOLETO',NULL,NULL,NULL),(69,'3',2,52,'2018-05-01','2022-08-09',2000.00,'BOLETO',NULL,NULL,NULL),(70,'3',2,53,'2018-05-01','2022-09-08',2000.00,'BOLETO',NULL,NULL,NULL),(71,'3',2,54,'2018-05-01','2022-10-08',2000.00,'BOLETO',NULL,NULL,NULL),(72,'3',2,55,'2018-05-01','2022-11-07',2000.00,'BOLETO',NULL,NULL,NULL),(73,'3',2,56,'2018-05-01','2022-12-07',2000.00,'BOLETO',NULL,NULL,NULL),(74,'3',2,57,'2018-05-01','2023-01-06',2000.00,'BOLETO',NULL,NULL,NULL),(75,'3',2,58,'2018-05-01','2023-02-05',2000.00,'BOLETO',NULL,NULL,NULL),(76,'3',2,59,'2018-05-01','2023-03-07',2000.00,'BOLETO',NULL,NULL,NULL),(77,'3',2,60,'2018-05-01','2023-04-06',2000.00,'BOLETO',NULL,NULL,NULL),(78,'4',1,1,'2018-05-31','2018-06-05',400.00,'boleto',NULL,NULL,NULL),(79,'4',1,2,'2018-05-31','2018-07-31',400.00,'boleto',NULL,NULL,NULL),(80,'9',5,1,'2018-06-02','2019-07-02',299.97,'cheque',NULL,NULL,NULL),(81,'1111',5,1,'2018-06-02','2018-07-02',400.00,'cheque',NULL,NULL,NULL),(82,'1111',5,2,'2018-06-02','2018-08-02',400.00,'cheque',NULL,NULL,NULL),(83,'2222',2,1,'2018-06-02','2018-06-02',50.00,'dinheiro',NULL,NULL,NULL),(84,'2222',2,2,'2018-06-02','2018-06-07',50.00,'dinheiro',NULL,NULL,NULL),(85,'2222',2,3,'2018-06-02','2018-06-12',50.00,'dinheiro',NULL,NULL,NULL),(86,'2222',2,4,'2018-06-02','2018-06-17',50.00,'dinheiro',NULL,NULL,NULL),(87,'2222',2,5,'2018-06-02','2018-06-22',50.00,'dinheiro',NULL,NULL,NULL),(88,'2223',3,1,'2018-06-02','2018-06-02',200.00,'dinheiro',NULL,NULL,NULL),(89,'2223',3,2,'2018-06-02','2018-06-12',200.00,'dinheiro',NULL,NULL,NULL);
/*!40000 ALTER TABLE `contasapagar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrato`
--

DROP TABLE IF EXISTS `contrato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contrato` (
  `num` varchar(12) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `dataassinatura` date NOT NULL,
  `dataevento` date NOT NULL,
  `pessoascont` int(11) NOT NULL,
  `pessoaspres` int(11) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `parcelascadastradas` tinyint(1) NOT NULL,
  PRIMARY KEY (`num`),
  KEY `contrato_cliente_fk` (`idcliente`),
  CONSTRAINT `contrato_cliente_fk` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrato`
--

LOCK TABLES `contrato` WRITE;
/*!40000 ALTER TABLE `contrato` DISABLE KEYS */;
INSERT INTO `contrato` VALUES ('0012018',2,'2018-05-04','2019-10-03',300,280,25000.00,1),('0022018',1,'2018-05-04','2022-10-03',300,280,33000.00,1),('0032018',4,'2018-07-19','2019-11-23',300,280,10000.00,1),('0042018',3,'2018-06-02','2022-11-15',300,280,100000.00,1),('0052018',1,'2018-05-04','2019-10-03',1300,1280,95000.00,1),('0062018',4,'2018-05-24','2018-05-24',400,300,10000.00,1),('0072018',1,'2018-05-23','2019-05-23',300,290,40000.00,1),('0082018',4,'2017-10-31','2018-05-31',200,160,6000.00,0),('0092018',5,'2018-06-02','2018-11-10',200,178,30242.00,1),('1',3,'2018-05-31','2018-11-30',150,40,4000.00,1);
/*!40000 ALTER TABLE `contrato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedor`
--

DROP TABLE IF EXISTS `fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `atendente` varchar(40) NOT NULL,
  `descricao` varchar(60) NOT NULL,
  `fone1` varchar(15) NOT NULL,
  `fone2` varchar(15) NOT NULL,
  `email` varchar(80) NOT NULL,
  `cep` int(11) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedor`
--

LOCK TABLES `fornecedor` WRITE;
/*!40000 ALTER TABLE `fornecedor` DISABLE KEYS */;
INSERT INTO `fornecedor` VALUES (1,'Enel','-','Nova companhia de energia eletrica','(62) 03333-3333','(62) 03434-3434','enel@energia.com',74713290,'br 153',0,'km X','centro','gyncity'),(2,'Casa de Carne Olibera','Marta','Frios','(62)99276-1448','(62)992542014','teste@hotmail.com',76170000,'Rua 10',20,'Qd10 Lt10','Jd New World','Goiania'),(3,'XMachine','Josue','Todos os tipos de maquinas','(62) 77777-7777','(62) 66666-6666','jucajr@hotmail.com',76170000,'Rua 10',23,'Qd10 Lt10','Marista','Goiania'),(4,'Best Waiters','Maria','ServiÃ§o de GarÃ§ons ','(62) 99266-1418','(64) 03564-3039','bestwaiters@gmail.com',76170000,'rua 444',14,'Qd10','Centro','Anicuns'),(5,'The More Best Waiters','Mr. Maia','Trabalhos com GarÃ§ons','(62) 99266-6144','(62) 88888-8888','themorebestwaiters@hmgail.com',74713290,'Rua Los Angeles',47474774,'1','Jardim Novo Mundo','GoiÃ¢nia');
/*!40000 ALTER TABLE `fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parcelas`
--

DROP TABLE IF EXISTS `parcelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parcelas` (
  `registro` int(11) NOT NULL AUTO_INCREMENT,
  `numcont` varchar(12) NOT NULL,
  `parcela` int(11) NOT NULL,
  `dataemissao` date NOT NULL,
  `datavenc` date NOT NULL,
  `valorparc` double(10,2) NOT NULL,
  `formapg` varchar(20) NOT NULL,
  `datapg` date DEFAULT NULL,
  `valorreb` double(10,2) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`registro`),
  KEY `parcelas_contrato_fk` (`numcont`),
  KEY `parcelas_user_fk` (`userid`),
  CONSTRAINT `parcelas_contrato_fk` FOREIGN KEY (`numcont`) REFERENCES `contrato` (`num`),
  CONSTRAINT `parcelas_user_fk` FOREIGN KEY (`userid`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parcelas`
--

LOCK TABLES `parcelas` WRITE;
/*!40000 ALTER TABLE `parcelas` DISABLE KEYS */;
INSERT INTO `parcelas` VALUES (1,'0012018',1,'2018-05-10','2018-10-10',10000.00,'cheque',NULL,NULL,NULL),(2,'0012018',2,'2018-05-10','2018-10-10',10000.00,'cheque',NULL,NULL,NULL),(3,'0012018',3,'2018-05-10','2018-10-10',5000.00,'cheque',NULL,NULL,NULL),(4,'0022018',1,'2018-04-10','2018-10-10',10000.00,'cheque','2018-05-31',10000.00,1),(5,'0022018',2,'2018-04-10','2019-02-10',10000.00,'cheque',NULL,NULL,NULL),(6,'0022018',3,'2018-04-10','2019-05-10',13000.00,'cheque',NULL,NULL,NULL),(7,'0032018',1,'2018-03-10','2018-05-10',1000.00,'Dinheiro',NULL,NULL,NULL),(8,'0032018',2,'2018-03-10','2018-06-10',1000.00,'Dinheiro',NULL,NULL,NULL),(9,'0032018',3,'2018-03-10','2018-07-10',1000.00,'Dinheiro',NULL,NULL,NULL),(10,'0032018',4,'2018-03-10','2018-08-10',1000.00,'Dinheiro',NULL,NULL,NULL),(11,'0032018',5,'2018-03-10','2018-09-10',1000.00,'Dinheiro',NULL,NULL,NULL),(12,'0032018',6,'2018-03-10','2018-10-10',1000.00,'Dinheiro',NULL,NULL,NULL),(13,'0032018',7,'2018-03-10','2018-11-10',1000.00,'Dinheiro',NULL,NULL,NULL),(14,'0032018',8,'2018-03-10','2018-12-10',1000.00,'Dinheiro',NULL,NULL,NULL),(15,'0032018',9,'2018-03-10','2019-01-10',1000.00,'Dinheiro',NULL,NULL,NULL),(16,'0032018',10,'2018-03-10','2019-02-10',1000.00,'Dinheiro',NULL,NULL,NULL),(17,'0042018',1,'2018-03-10','2018-05-10',10000.00,'Dinheiro',NULL,NULL,NULL),(18,'0042018',2,'2018-03-10','2018-06-10',10000.00,'Dinheiro',NULL,NULL,NULL),(19,'0042018',3,'2018-03-10','2018-07-10',10000.00,'Dinheiro',NULL,NULL,NULL),(20,'0042018',4,'2018-03-10','2018-08-10',10000.00,'Dinheiro',NULL,NULL,NULL),(21,'0042018',5,'2018-03-10','2018-09-10',10000.00,'Dinheiro',NULL,NULL,NULL),(22,'0042018',6,'2018-03-10','2018-10-10',10000.00,'Dinheiro',NULL,NULL,NULL),(23,'0042018',7,'2018-03-10','2018-11-10',10000.00,'Dinheiro',NULL,NULL,NULL),(24,'0042018',8,'2018-03-10','2018-12-10',10000.00,'Dinheiro',NULL,NULL,NULL),(25,'0042018',9,'2018-03-10','2019-01-10',10000.00,'Dinheiro',NULL,NULL,NULL),(26,'0042018',10,'2018-03-10','2019-02-10',10000.00,'Dinheiro',NULL,NULL,NULL),(27,'0062018',1,'0020-10-10','2018-05-25',5000.00,'DINHEIRO',NULL,NULL,NULL),(28,'0062018',2,'2019-10-10','2018-08-25',5000.00,'DINHEIRO',NULL,NULL,NULL),(29,'0052018',1,'2018-05-23','2018-08-23',40000.00,'DINHEIRO',NULL,NULL,NULL),(30,'0052018',2,'2018-05-23','2018-10-23',40000.00,'DINHEIRO',NULL,NULL,NULL),(31,'0052018',3,'2018-05-23','2018-12-20',15000.00,'CHEQUE',NULL,NULL,NULL),(37,'0072018',1,'2018-05-24','2018-06-24',10000.00,'cheque',NULL,NULL,NULL),(38,'0072018',2,'2018-05-24','2018-07-24',5000.00,'DINDIN',NULL,NULL,NULL),(39,'0072018',3,'2018-05-24','2018-08-24',4000.00,'DINDIN',NULL,NULL,NULL),(40,'0072018',4,'2018-05-24','2018-09-24',8000.00,'DINDIN',NULL,NULL,NULL),(41,'0072018',5,'2018-05-24','2018-10-24',13000.00,'cheque',NULL,NULL,NULL),(42,'0032018',0,'2018-05-24','2018-10-24',222.40,'dinheiro',NULL,NULL,NULL),(43,'0022018',0,'2018-05-26','2018-06-30',344.90,'dinheiro',NULL,NULL,NULL),(44,'1',1,'2018-05-31','2018-06-30',1000.00,'cheque',NULL,NULL,NULL),(45,'1',2,'2018-05-31','2018-07-31',1000.00,'cheque',NULL,NULL,NULL),(46,'1',3,'2018-05-31','2018-08-31',2000.00,'cheque',NULL,NULL,NULL),(47,'0012018',0,'2018-05-31','2018-06-30',590.00,'dinheiro',NULL,NULL,NULL),(48,'0022018',0,'2018-05-31','2018-06-30',400.00,'dinheiro',NULL,NULL,NULL),(49,'0022018',0,'2018-05-11','2018-06-29',450.00,'cheque',NULL,NULL,NULL),(58,'0092018',1,'2018-06-02','2018-09-02',10000.00,'cheque',NULL,NULL,NULL),(59,'0092018',2,'2018-06-02','2018-10-02',20242.00,'cheque',NULL,NULL,NULL),(60,'0092018',0,'2018-06-04','2018-10-10',1500.10,'Dinheiro',NULL,NULL,NULL);
/*!40000 ALTER TABLE `parcelas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numcont` varchar(12) NOT NULL,
  `idforn` int(11) NOT NULL,
  `idbem` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `dataexec` date NOT NULL,
  `valor` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `serv_bem_fk` (`idbem`),
  KEY `serv_forn_fk` (`idforn`),
  CONSTRAINT `serv_bem_fk` FOREIGN KEY (`idbem`) REFERENCES `bem` (`id`),
  CONSTRAINT `serv_forn_fk` FOREIGN KEY (`idforn`) REFERENCES `fornecedor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (2,'111',3,2,'Caixas de Som com problemas','2018-05-28',350.00),(3,'111',3,2,'Caixas de Som com problemas','2018-05-28',350.00),(4,'111',3,2,'Caixas de Som com problemas','2018-05-28',350.00),(5,'111',3,2,'Caixas de Som com problemas','2018-05-28',350.00),(6,'78',2,1,'Teste','2018-05-28',400.00),(7,'111',1,1,'Nova companhia de energia eletrica','2018-11-30',50.00),(8,'111',3,1,'Nova companhia de energia eletrica','2018-11-30',50.00),(9,'0062018',2,2,'Nova companhia de energia eletrica','2018-12-31',1.00),(10,'0062018',2,1,'Nova companhia de energia eletrica','2018-12-31',1.00),(11,'0062018',2,2,'Nova companhia de energia eletrica','2018-12-31',1.00),(12,'2',1,1,'ApÃ³s queda de energia, a camara fria nÃ£o funcionou.','2018-05-01',100.00),(13,'9',5,3,'Novas Molas','2018-06-02',299.97);
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `senha` varchar(80) NOT NULL,
  `tipo` char(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','202cb962ac59075b964b07152d234b70','A'),(2,'teste','teste','698dc19d489c4e4db73e28a713eab07b','A'),(3,'grub','linuxwint','310dcbbf4cce62f762a2aaa148d556bd','A');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-06-02 15:44:40
