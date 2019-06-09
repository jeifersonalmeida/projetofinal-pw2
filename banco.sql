-- MySQL dump 10.13  Distrib 8.0.15, for Win64 (x86_64)
--
-- Host: localhost    Database: wp2
-- ------------------------------------------------------
-- Server version	8.0.15

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`idDepartamento`),
  UNIQUE KEY `idDepartment_UNIQUE` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'test'),(2,'another test'),(3,'Teste1'),(4,'sadsad');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `idPermissao` int(11) NOT NULL,
  `idDepartamento` int(11) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idFuncionario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  UNIQUE KEY `idfuncionario_UNIQUE` (`idFuncionario`),
  KEY `idDepartamento_idx` (`idDepartamento`),
  CONSTRAINT `idDepartamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'adm',0.00,'adm','adm123',1,NULL,0),(4,'a',1.00,'a','$2y$10$00if0MjaCa87Yzd.U9pcsOqcCg6vucVNoYQdaIgTqfNKWVLVJs.DG',1,1,1),(5,'b',0.00,'b','$2y$10$ul/uE9Ww7wg/hSrOMUZ8G.cADOwoKfQ6zK32y32k7qu11/G1C9ch6',1,1,0),(6,'Jeiferson',1000000.00,'jeiferson','123',1,1,0),(7,'Gabriel Vander',1123123.00,'vander','$2y$10$WsgaFWqTLK9b6FROdQ5f4.GoCJjybJ7ybFsp2Gc6KJrBI21HWf4km',1,1,0),(8,'Teste',10.00,'teste','$2y$10$201bzkVJKgdFi.J7Tp43E.6sOSShaGHbNkcr2cpSE7cSifmZYLpxC',1,1,1),(10,'Teste2',100.00,'teste2','$2y$10$xjy7IEp5VVTEeI2DNDrl8OjIRs4FpiG1M.pgGbmWansywXfvxGOVm',1,1,1),(11,'Teste3',105.00,'teste3','$2y$10$DwmrabWdx5nAkSaMqV.JguvjJQnBy0Yl1ufw3q1IaNd7dOF6kS0R6',1,1,1),(13,'Teste4',105.00,'teste4','$2y$10$kH26mfIhNt4fKU3Z6ROfbeGUSn6ks5zeBvEiB2uVz10xh99UJO2c6',0,1,1),(14,'Teste5',104.00,'teste5','$2y$10$.vTvyh8QEiFQYKBsaLS5c.TzBsBSd937YoLrPzm.Xa.eOCCpmk3hm',1,1,1),(15,'Teste7',10.00,'teste7','$2y$10$W4Lfq52XQT7h8Af1/EGQouHThz1tQYGTec90Wp8Yn4ug.MDXjG7V6',0,NULL,1),(17,'Teste8',12.00,'teste8','$2y$10$IXF6Xfx3hV4d5fhtQNKJ6uRxQRoznTdI21NGicQjvYasM2j9B1b8y',0,3,1),(19,'Teste9',123.00,'teste9','$2y$10$VZ6aQXUvN2Ob.dE762kKg.wIEmZYOY2r1oHW9W59URo2wzhm6TOFy',0,2,1),(21,'Teste10',123.00,'teste10','$2y$10$edzPmbs7gDWPQ/4xy6rM9u/ePzI39/ck9l5W.NvFOmzPNv4LmAAje',0,1,1),(22,'Teste11',145.00,'teste11','$2y$10$dlnR7lI2i1BiK2zEeK8vNOqAY8QfHPCzzmITL/jfj788Qosxbmw2K',0,1,1),(23,'Ana',0.00,'ana','$2y$10$HpPNU0222LtLXX8GnCe/7uBJZYVaM9/Gy25kIqoI2xPPTtDxCLT8K',1,2,0),(28,'Gabriel',123.00,'Gabriel','$2y$10$F9PryEUgJr1ziwopSKrQyeaicZZHFcSVaT4dcESHfMCmzAhae6jAu',0,1,0),(29,'Geovane',5600.00,'geovane','$2y$10$iZ7ZUDQzT4OaVuW7ydNCr.VTGSjQPFEINo5.N1RY6PZQSMobbIn/m',0,2,0),(31,'c',1.00,'c','$2y$10$azKu0KOxzeA1y2qoFHvuwOLVlK2GgJHxkz2FSOL3nZgUhP3Dx0Wem',0,1,0),(34,'Darth Vander',4875.58,'gab','$2y$10$7inCWgXm0ojI7EStcDoAi.fSIU6HSa2YM6TjU5rOuqBZrV0o9NSwy',0,1,1);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario_projeto`
--

DROP TABLE IF EXISTS `funcionario_projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `funcionario_projeto` (
  `Funcionario` int(11) NOT NULL,
  `Projeto` int(11) NOT NULL,
  PRIMARY KEY (`Funcionario`,`Projeto`),
  KEY `ProjFK_idx` (`Projeto`),
  CONSTRAINT `FuncFK` FOREIGN KEY (`Funcionario`) REFERENCES `funcionario` (`idFuncionario`),
  CONSTRAINT `ProjFK` FOREIGN KEY (`Projeto`) REFERENCES `projeto` (`idProjeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario_projeto`
--

LOCK TABLES `funcionario_projeto` WRITE;
/*!40000 ALTER TABLE `funcionario_projeto` DISABLE KEYS */;
INSERT INTO `funcionario_projeto` VALUES (4,1),(8,1),(4,2),(4,3),(4,5);
/*!40000 ALTER TABLE `funcionario_projeto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projeto`
--

DROP TABLE IF EXISTS `projeto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `projeto` (
  `idProjeto` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idProjeto`),
  KEY `idDepartamentoFK` (`departamento`),
  CONSTRAINT `departamentoFK` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projeto`
--

LOCK TABLES `projeto` WRITE;
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` VALUES (1,1,'A'),(2,1,'B'),(3,2,'C'),(4,3,'D'),(5,4,'awdad');
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-08 20:59:41
