-- MariaDB dump 10.19  Distrib 10.6.10-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: RemoteR
-- ------------------------------------------------------
-- Server version	10.6.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `DisHetParameters`
--

DROP TABLE IF EXISTS `DisHetParameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DisHetParameters` (
  `ParameterID` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` varchar(40) NOT NULL,
  `Exp_T` mediumblob NOT NULL,
  `Exp_N` mediumblob NOT NULL,
  `Exp_G` mediumblob NOT NULL,
  `Cycle` int(11) NOT NULL,
  `Mean` int(11) NOT NULL,
  `StromaProportion` decimal(10,2) NOT NULL,
  `TumorProportion` decimal(10,2) NOT NULL,
  `NormalProportion` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ParameterID`),
  KEY `JobID` (`JobID`),
  CONSTRAINT `parameter_jobid` FOREIGN KEY (`JobID`) REFERENCES `Jobs` (`JobID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DisHetParameters`
--

LOCK TABLES `DisHetParameters` WRITE;
/*!40000 ALTER TABLE `DisHetParameters` DISABLE KEYS */;
/*!40000 ALTER TABLE `DisHetParameters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-10-28 12:22:39
