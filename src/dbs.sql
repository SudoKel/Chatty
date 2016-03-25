DROP SCHEMA IF EXISTS world;
CREATE SCHEMA world;
USE world;
SET AUTOCOMMIT=0;

--
-- Table structure for table `City`
--

DROP TABLE IF EXISTS `Info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Info` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fName` char(99) Not NULL DEFAULT'',
  `lName` char(99) NOT NULL DEFAULT '',
  `email` char(99) NOT NULL DEFAULT '',
  `phonenum` int(99) NOT NULL DEFAULT '',
  `sex` char(10) NOT NULL DEFAULT '',
  `dob` Date NOT NULL DEFAULT '',
  `Country` int(99) NOT NULL DEFAULT '',
  `username` char(99) NOT NULL DEFAULT'',
  `password` char(99) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `phonenum` (`phonenum`),
  CONSTRAINT `city_ibfk_1` FOREIGN KEY (`username`) REFERENCES `signin` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;


CREATE TABLE `signin` (
  `username` char(99) NOT NULL DEFAULT'',
  `password` char(99) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`),
  KEY `password` (`password`),
) ENGINE=InnoDB AUTO_INCREMENT=4080 DEFAULT CHARSET=latin1;