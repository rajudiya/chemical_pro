-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: localhost    Database: cinventory
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chemicals`
--

DROP TABLE IF EXISTS `chemicals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chemicals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `company` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unitsign` varchar(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `dateIn` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `updatedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chemicals`
--

LOCK TABLES `chemicals` WRITE;
/*!40000 ALTER TABLE `chemicals` DISABLE KEYS */;
INSERT INTO `chemicals` VALUES (2,'Chemical 104','','<p>wrwergwrwrgwrg</p>','9','Gram','0','Supplier 101','10/05/2014 05:25 PM','09/05/2022 14:45','Jimmy Lomocso',''),(3,'Tyro x-2001','','<p>Atomic Bombs</p>','5','Gram','6','etyrt','10/05/2014 05:26 PM','09/03/2022 17:23','Jimmy Lomocso','admin admin'),(5,'Chemical X ver 8','','<p>Change human into monster</p>','7','Ml','8','Supplier 101','10/05/2014 06:59 PM','09/03/2022 17:31','Jimmy Lomocso','admin admin'),(6,'new camical','','<p>this is a new camical</p>','10','Ml','22','Supplier 101','09/02/2022 20:30','09/03/2022 17:23','admin admin','admin admin'),(7,'mage244.local','','','1','Gram','1','etyrt','09/03/2022 20:24','','admin admin',''),(8,'30% off of Any Mobil Phone','Seofeb','<p>ewfwefw</p>','1','ML','1','etyrt','09/03/2022 20:27','','admin admin','');
/*!40000 ALTER TABLE `chemicals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qty` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `unitsign` varchar(50) NOT NULL,
  `remark` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `dateIn` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `updatedBy` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'Mouse','<p>Mouse Ball</p>','5','1','Box','Functional','Mouse-272b.jpg','Supplier 1','10/05/2014 12:18 PM','09/02/2022 19:31','Jimmy Lomocso','admin admin'),(2,'Keyboard Mini','<p>Wireless Keyboard</p>','2','3','Pcs.','Functional','Keyboard Mini-pc-keyboards-RazerTron.jpg','Supplier 102','10/05/2014 12:48 PM','09/02/2022 23:09','Jimmy Lomocso',''),(4,'System unit','<p>With fan</p>','5','5','Box','Functional','System unit-Computer-Set.jpg','Supplier 1','10/05/2014 02:10 PM','10/06/2014 11:16 AM','Jimmy Lomocso','Jimzky Sky'),(12,'Laptop','<p>Laptop here</p>','3','7','Ml.','Functional','Laptop-sem6.jpg','etyrt','10/05/2014 11:18 PM','09/03/2022 17:26','Jimmy Lomocso',''),(13,'qegwq','<p>wewr</p>','1','1','Pcs.','Functional','qegwq-swamiji.jpg','etyrt','09/02/2022 23:37','','admin admin',''),(14,'new','<p>asfafadga</p>','1','1','Pcs.','Functional','new-swamiji.jpg','etyrt','09/03/2022 15:25','09/03/2022 15:34','admin admin','admin admin');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `operation` text NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=274 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (153,'admin admin','logged out','09/01/2022 10:35 PM'),(154,'admin admin','updated quantity from 2 to 3 of item (Keyboard Mini)','09/02/2022 16:01'),(155,'admin admin','updated quantity from 2 to 3 of item (Laptop)','09/02/2022 16:01'),(156,'admin admin','updated quantity from 3 to 4 of item (Keyboard Mini)','09/02/2022 16:01'),(157,'admin admin','updated unit from 0 to 1 of item (Keyboard Mini)','09/02/2022 16:02'),(158,'admin admin','updated quantity from 3 to 4 of item (Laptop)','09/02/2022 16:04'),(159,'admin admin','updated quantity from 4 to 5 of item (Keyboard Mini)','09/02/2022 16:10'),(160,'admin admin','updated quantity from 4 to 5 of item (Laptop)','09/02/2022 19:30'),(161,'admin admin','updated quantity from 5 to 6 of item (Keyboard Mini)','09/02/2022 19:30'),(162,'admin admin','updated quantity from 6 to 5 of item (Keyboard Mini)','09/02/2022 19:30'),(163,'admin admin','updated quantity from 5 to 4 of item (Keyboard Mini)','09/02/2022 19:30'),(164,'admin admin','updated quantity from 4 to 3 of item (Keyboard Mini)','09/02/2022 19:30'),(165,'admin admin','updated quantity from 5 to 4 of item (Laptop)','09/02/2022 19:30'),(166,'admin admin','updated quantity from 4 to 3 of item (Laptop)','09/02/2022 19:30'),(167,'admin admin','updated unit from 1 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(168,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(169,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(170,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(171,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(172,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(173,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(174,'admin admin','updated unit from 0 to 0 of item (Keyboard Mini)','09/02/2022 19:30'),(175,'admin admin','updated item to Not Functional of item (Keyboard Mini)','09/02/2022 19:31'),(176,'admin admin','updated item to Functional of item (Keyboard Mini)','09/02/2022 19:31'),(177,'admin admin','updated item to Not Functional of item (Laptop)','09/02/2022 19:31'),(178,'admin admin','updated item to Functional of item (Laptop)','09/02/2022 19:31'),(179,'admin admin','updated item to Functional of item (Mouse)','09/02/2022 19:31'),(180,'admin admin','updated item to Not Functional of item (Mouse)','09/02/2022 19:31'),(181,'admin admin','updated item to Functional of item (Mouse)','09/02/2022 19:31'),(182,'admin admin','updated quantity from 6 to 5 of chemical (Chemical 102)','09/02/2022 19:33'),(183,'admin admin','updated quantity from 5 to 4 of chemical (Chemical 102)','09/02/2022 19:33'),(184,'admin admin','updated quantity from 4 to 3 of chemical (Chemical 102)','09/02/2022 19:33'),(185,'admin admin','updated quantity from 3 to 2 of chemical (Chemical 102)','09/02/2022 19:33'),(186,'admin admin','updated quantity from 2 to 3 of chemical (Chemical 102)','09/02/2022 19:33'),(187,'admin admin','updated quantity from 3 to 4 of chemical (Chemical 102)','09/02/2022 19:33'),(188,'admin admin','updated quantity from 4 to 5 of chemical (Chemical 102)','09/02/2022 19:33'),(189,'admin admin','updated quantity from 6 to 5 of chemical (Chemical X ver 2)','09/02/2022 19:33'),(190,'admin admin','updated quantity from 5 to 4 of chemical (Chemical X ver 2)','09/02/2022 19:33'),(191,'admin admin','updated quantity from 4 to 5 of chemical (Chemical X ver 2)','09/02/2022 19:33'),(192,'admin admin','updated quantity from 5 to 6 of chemical (Chemical X ver 2)','09/02/2022 19:33'),(193,'admin admin','updated quantity from 6 to 7 of chemical (Chemical X ver 2)','09/02/2022 19:33'),(194,'admin admin','updated unit from 12 to 11 of chemical (Tyro x-2001)','09/02/2022 19:33'),(195,'admin admin','updated unit from 11 to 10 of chemical (Tyro x-2001)','09/02/2022 19:33'),(196,'admin admin','updated unit from 10 to 9 of chemical (Tyro x-2001)','09/02/2022 19:33'),(197,'admin admin','updated unit from 9 to 8 of chemical (Tyro x-2001)','09/02/2022 19:33'),(198,'admin admin','updated unit from 8 to 7 of chemical (Tyro x-2001)','09/02/2022 19:33'),(199,'admin admin','updated unit from 7 to 6 of chemical (Tyro x-2001)','09/02/2022 19:33'),(200,'admin admin','updated unit from 6 to 5 of chemical (Tyro x-2001)','09/02/2022 19:33'),(201,'admin admin','updated unit from 5 to 4 of chemical (Tyro x-2001)','09/02/2022 19:33'),(202,'admin admin','updated unit from 4 to 3 of chemical (Tyro x-2001)','09/02/2022 19:33'),(203,'admin admin','updated unit from 3 to 4 of chemical (Tyro x-2001)','09/02/2022 19:33'),(204,'admin admin','updated unit from 4 to 5 of chemical (Tyro x-2001)','09/02/2022 19:33'),(205,'admin admin','updated unit from 5 to 6 of chemical (Tyro x-2001)','09/02/2022 19:33'),(206,'admin admin','updated unit from 6 to 7 of chemical (Tyro x-2001)','09/02/2022 19:33'),(207,'admin admin','updated unit from 7 to 8 of chemical (Tyro x-2001)','09/02/2022 19:33'),(208,'admin admin','updated unit from 8 to 9 of chemical (Tyro x-2001)','09/02/2022 19:33'),(209,'admin admin','updated unit from 9 to 10 of chemical (Tyro x-2001)','09/02/2022 19:33'),(210,'admin admin','updated unit from 10 to 9 of chemical (Tyro x-2001)','09/02/2022 19:33'),(211,'admin admin','updated unit from 9 to 8 of chemical (Tyro x-2001)','09/02/2022 19:33'),(212,'admin admin','updated unit from 8 to 7 of chemical (Tyro x-2001)','09/02/2022 19:33'),(213,'admin admin','updated unit from 7 to 6 of chemical (Tyro x-2001)','09/02/2022 19:33'),(214,'admin admin','updated quantity from 5 to 6 of chemical (Chemical 102)','09/02/2022 19:34'),(215,'admin admin','updated quantity from 6 to 7 of chemical (Chemical 102)','09/02/2022 19:34'),(216,'admin admin','updated quantity from 7 to 8 of chemical (Chemical 102)','09/02/2022 19:34'),(217,'admin admin','updated quantity from 8 to 9 of chemical (Chemical 102)','09/02/2022 19:34'),(218,'admin admin','updated unit from 6 to 7 of chemical (Chemical X ver 2)','09/02/2022 19:39'),(219,'admin admin','updated unit from 7 to 8 of chemical (Chemical X ver 2)','09/02/2022 19:39'),(220,'admin admin','updated 9 chemicals (Chemical 104)','09/02/2022 19:50'),(221,'admin admin','updated 7 chemicals (Chemical X ver 6)','09/02/2022 19:51'),(222,'admin admin','updated 7 chemicals (Chemical X ver 7)','09/02/2022 19:52'),(223,'admin admin','updated 7 chemicals (Chemical X ver 8)','09/02/2022 19:58'),(224,'admin admin','updated 9 chemicals (Chemical 104)','09/02/2022 20:06'),(225,'admin admin','added 10 chemical (new camical)','09/02/2022 20:30'),(226,'admin admin','updated 10 chemicals (new camical)','09/02/2022 20:31'),(227,'admin admin','added  supplier (etyrt)','09/02/2022 20:43'),(228,'admin admin','added  supplier (rer)','09/02/2022 20:43'),(229,'admin admin','updated quantity from 3 to 2 of item (Keyboard Mini)','09/02/2022 20:44'),(230,'admin admin','updated unit from 0 to 1 of item (Keyboard Mini)','09/02/2022 23:09'),(231,'admin admin','updated unit from 1 to 2 of item (Keyboard Mini)','09/02/2022 23:09'),(232,'admin admin','updated unit from 2 to 3 of item (Keyboard Mini)','09/02/2022 23:09'),(233,'admin admin','updated unit from 3 to 4 of item (Keyboard Mini)','09/02/2022 23:09'),(234,'admin admin','updated unit from 4 to 5 of item (Keyboard Mini)','09/02/2022 23:09'),(235,'admin admin','updated unit from 5 to 6 of item (Keyboard Mini)','09/02/2022 23:09'),(236,'admin admin','updated unit from 6 to 5 of item (Keyboard Mini)','09/02/2022 23:09'),(237,'admin admin','updated unit from 5 to 4 of item (Keyboard Mini)','09/02/2022 23:09'),(238,'admin admin','updated unit from 4 to 3 of item (Keyboard Mini)','09/02/2022 23:09'),(239,'admin admin','added 1 item (qegwq)','09/02/2022 23:37'),(240,'admin admin','added 1 item (new)','09/03/2022 15:25'),(241,'admin admin','updated 1 item (new)','09/03/2022 15:34'),(242,'admin admin','updated 3 item (Laptop)','09/03/2022 15:46'),(243,'admin admin','updated 9 chemicals (Chemical 104)','09/03/2022 15:53'),(244,'admin admin','updated 10 chemicals (Chemical 104)','09/03/2022 15:54'),(245,'admin admin','updated 10 chemicals (Chemical 104)','09/03/2022 16:36'),(246,'admin admin','updated 7 chemicals (Chemical X ver 8)','09/03/2022 17:23'),(247,'admin admin','updated 10 chemicals (new camical)','09/03/2022 17:23'),(248,'admin admin','updated 5 chemicals (Tyro x-2001)','09/03/2022 17:23'),(249,'admin admin','updated unit from 2 to 3 of item (Laptop)','09/03/2022 17:25'),(250,'admin admin','updated unit from 3 to 2 of item (Laptop)','09/03/2022 17:26'),(251,'admin admin','updated unit from 2 to 1 of item (Laptop)','09/03/2022 17:26'),(252,'admin admin','updated unit from 1 to 0 of item (Laptop)','09/03/2022 17:26'),(253,'admin admin','updated unit from 0 to 1 of item (Laptop)','09/03/2022 17:26'),(254,'admin admin','updated unit from 1 to 2 of item (Laptop)','09/03/2022 17:26'),(255,'admin admin','updated unit from 2 to 3 of item (Laptop)','09/03/2022 17:26'),(256,'admin admin','updated unit from 3 to 4 of item (Laptop)','09/03/2022 17:26'),(257,'admin admin','updated unit from 4 to 5 of item (Laptop)','09/03/2022 17:26'),(258,'admin admin','updated unit from 5 to 6 of item (Laptop)','09/03/2022 17:26'),(259,'admin admin','updated unit from 6 to 7 of item (Laptop)','09/03/2022 17:26'),(260,'admin admin','updated 7 chemicals (Chemical X ver 8)','09/03/2022 17:30'),(261,'admin admin','updated 7 chemicals (Chemical X ver 8)','09/03/2022 17:31'),(262,'admin admin','logged out','09/03/2022 06:11 PM'),(263,'admin admin','added 1 chemical (mage244.local)','09/03/2022 20:24'),(264,'admin admin','added 1 chemical (30% off of Any Mobil Phone)','09/03/2022 20:27'),(265,'admin admin','added 1 chemical (rohan)','09/03/2022 22:00'),(266,'admin admin','added 1 chemical (wrgew)','09/03/2022 22:03'),(267,'admin admin','added 1 chemical ()','09/03/2022 22:45'),(268,'admin admin','added 1 chemical ()','09/03/2022 22:47'),(269,'admin admin','logged out','09/03/2022 11:28 PM'),(270,'admin admin','logged out','09/03/2022 11:29 PM'),(271,'admin admin','logged out','09/04/2022 01:00 PM'),(272,'admin admin','logged out','09/04/2022 08:55 PM'),(273,'','updated quantity from 10 to 9 of chemical (Chemical 104)','09/05/2022 14:45');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `studentsname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `chemical` varchar(250) NOT NULL,
  `faculty` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `qty` int NOT NULL,
  `unitsign` varchar(250) NOT NULL,
  `date` varchar(250) NOT NULL,
  `createdBy` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'rohan','chemical','wuiehgwoub','<p>wouebgfwoureb</p>',1,'ML','09/03/2022 22:00','admin admin'),(2,'wrgew','wrgw','wrgw','<p>wrhwr</p>',1,'ML','09/03/2022 22:03','admin admin'),(3,'srwr','','qegwqeg','<p>egwe</p>',1,'Gram','09/03/2022 22:45','admin admin'),(4,'awefqew','mage244.local','qegqe','<p>qegqe</p>',1,'Gram','09/03/2022 22:47','admin admin');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `supplier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dateCreated` varchar(100) NOT NULL,
  `dateUpdated` varchar(100) NOT NULL,
  `createdBy` varchar(100) NOT NULL,
  `updatedBy` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` VALUES (5,'Supplier 101','PIEC','1111','peie@cgaml.com','Cebu City','10/05/2014 11:24 PM','10/06/2014 12:15 PM','Jimmy Lomocso','Jimzky Sky'),(6,'Supplier 102','','2222','','Cebu City','10/05/2014 11:24 PM','','Jimmy Lomocso',''),(7,'etyrt','tur','tur','','etuet','09/02/2022 20:42','','admin admin',''),(8,'etyrt','tur','tur','','etuet','09/02/2022 20:43','','admin admin',''),(9,'rer','rrr','rrr','rr','rr','09/02/2022 20:43','','admin admin','');
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userdata`
--

DROP TABLE IF EXISTS `userdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userdata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `dateAdded` varchar(50) NOT NULL,
  `dateUpdated` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userdata`
--

LOCK TABLES `userdata` WRITE;
/*!40000 ALTER TABLE `userdata` DISABLE KEYS */;
INSERT INTO `userdata` VALUES (2,'root','root','root','root','12345','root@gmail.com','root','10/05/2014 09:42 PM',''),(4,'admin','admin','admin','admin','123456','admin@gmail.com','admin','10/05/2014 10:13 PM','');
/*!40000 ALTER TABLE `userdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-05 13:04:04
