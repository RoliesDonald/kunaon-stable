-- MySQL dump 10.16  Distrib 10.1.16-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: installdb
-- ------------------------------------------------------
-- Server version	10.1.16-MariaDB

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
-- Table structure for table `app_countries`
--

DROP TABLE IF EXISTS `app_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_countries`
--

LOCK TABLES `app_countries` WRITE;
/*!40000 ALTER TABLE `app_countries` DISABLE KEYS */;
INSERT INTO `app_countries` VALUES (1,'Afghanistan'),(2,'Albania'),(3,'Algeria'),(4,'Andorra'),(5,'Angola'),(6,'Antigua & Deps'),(7,'Argentina'),(8,'Armenia'),(9,'Australia'),(10,'Austria'),(11,'Azerbaijan'),(12,'Bahamas'),(13,'Bahrain'),(14,'Bangladesh'),(15,'Barbados'),(16,'Belarus'),(17,'Belgium'),(18,'Belize'),(19,'Benin'),(20,'Bhutan'),(21,'Bolivia'),(22,'Bosnia Herzegovina'),(23,'Botswana'),(24,'Brazil'),(25,'Brunei'),(26,'Bulgaria'),(27,'Burkina'),(28,'Burundi'),(29,'Cambodia'),(30,'Cameroon'),(31,'Canada'),(32,'Cape Verde'),(33,'Central African Rep'),(34,'Chad'),(35,'Chile'),(36,'China'),(37,'Colombia'),(38,'Comoros'),(39,'Congo'),(40,'Congo {Democratic Rep}'),(41,'Costa Rica'),(42,'Croatia'),(43,'Cuba'),(44,'Cyprus'),(45,'Czech Republic'),(46,'Denmark'),(47,'Djibouti'),(48,'Dominica'),(49,'Dominican Republic'),(50,'East Timor'),(51,'Ecuador'),(52,'Egypt'),(53,'El Salvador'),(54,'Equatorial Guinea'),(55,'Eritrea'),(56,'Estonia'),(57,'Ethiopia'),(58,'Fiji'),(59,'Finland'),(60,'France'),(61,'Gabon'),(62,'Gambia'),(63,'Georgia'),(64,'Germany'),(65,'Ghana'),(66,'Greece'),(67,'Grenada'),(68,'Guatemala'),(69,'Guinea'),(70,'Guinea-Bissau'),(71,'Guyana'),(72,'Haiti'),(73,'Honduras'),(74,'Hungary'),(75,'Iceland'),(76,'India'),(77,'Indonesia'),(78,'Iran'),(79,'Iraq'),(80,'Ireland {Republic}'),(81,'Israel'),(82,'Italy'),(83,'Ivory Coast'),(84,'Jamaica'),(85,'Japan'),(86,'Jordan'),(87,'Kazakhstan'),(88,'Kenya'),(89,'Kiribati'),(90,'Korea North'),(91,'Korea South'),(92,'Kosovo'),(93,'Kuwait'),(94,'Kyrgyzstan'),(95,'Laos'),(96,'Latvia'),(97,'Lebanon'),(98,'Lesotho'),(99,'Liberia'),(100,'Libya'),(101,'Liechtenstein'),(102,'Lithuania'),(103,'Luxembourg'),(104,'Macedonia'),(105,'Madagascar'),(106,'Malawi'),(107,'Malaysia'),(108,'Maldives'),(109,'Mali'),(110,'Malta'),(111,'Marshall Islands'),(112,'Mauritania'),(113,'Mauritius'),(114,'Mexico'),(115,'Micronesia'),(116,'Moldova'),(117,'Monaco'),(118,'Mongolia'),(119,'Montenegro'),(120,'Morocco'),(121,'Mozambique'),(122,'Myanmar, {Burma}'),(123,'Namibia'),(124,'Nauru'),(125,'Nepal'),(126,'Netherlands'),(127,'New Zealand'),(128,'Nicaragua'),(129,'Niger'),(130,'Nigeria'),(131,'Norway'),(132,'Oman'),(133,'Pakistan'),(134,'Palau'),(135,'Panama'),(136,'Papua New Guinea'),(137,'Paraguay'),(138,'Peru'),(139,'Philippines'),(140,'Poland'),(141,'Portugal'),(142,'Qatar'),(143,'Romania'),(144,'Russian Federation'),(145,'Rwanda'),(146,'St Kitts & Nevis'),(147,'St Lucia'),(148,'Saint Vincent & the Grenadines'),(149,'Samoa'),(150,'San Marino'),(151,'Sao Tome & Principe'),(152,'Saudi Arabia'),(153,'Senegal'),(154,'Serbia'),(155,'Seychelles'),(156,'Sierra Leone'),(157,'Singapore'),(158,'Slovakia'),(159,'Slovenia'),(160,'Solomon Islands'),(161,'Somalia'),(162,'South Africa'),(163,'South Sudan'),(164,'Spain'),(165,'Sri Lanka'),(166,'Sudan'),(167,'Suriname'),(168,'Swaziland'),(169,'Sweden'),(170,'Switzerland'),(171,'Syria'),(172,'Taiwan'),(173,'Tajikistan'),(174,'Tanzania'),(175,'Thailand'),(176,'Togo'),(177,'Tonga'),(178,'Trinidad & Tobago'),(179,'Tunisia'),(180,'Turkey'),(181,'Turkmenistan'),(182,'Tuvalu'),(183,'Uganda'),(184,'Ukraine'),(185,'United Arab Emirates'),(186,'United Kingdom'),(187,'United States'),(188,'Uruguay'),(189,'Uzbekistan'),(190,'Vanuatu'),(191,'Vatican City'),(192,'Venezuela'),(193,'Vietnam'),(194,'Yemen'),(195,'Zambia'),(196,'Zimbabwe');
/*!40000 ALTER TABLE `app_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_currency`
--

DROP TABLE IF EXISTS `app_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_currency`
--

LOCK TABLES `app_currency` WRITE;
/*!40000 ALTER TABLE `app_currency` DISABLE KEYS */;
INSERT INTO `app_currency` VALUES (1,'AFA'),(2,'ALL'),(3,'ADP'),(4,'AON'),(5,'ARS'),(6,'AWG'),(7,'AUD'),(8,'BSD'),(9,'BHD'),(10,'BDT'),(11,'BBD'),(12,'BZD'),(13,'XOF'),(14,'BMD'),(15,'BTN'),(16,'BOB'),(17,'BWP'),(18,'BRL'),(19,'GBP'),(20,'BND'),(21,'BGN'),(22,'BUK'),(23,'BIF'),(24,'KHR'),(25,'XAF'),(26,'CAD'),(27,'CVE'),(28,'KYD'),(29,'CLP'),(30,'CLF'),(31,'CNY'),(32,'COP'),(33,'KMF'),(34,'CRC'),(35,'CUP'),(36,'CYP'),(37,'DKK'),(38,'DJF'),(39,'DOP'),(40,'XCD'),(41,'ECS'),(42,'EGP'),(43,'SVC'),(44,'ETB'),(45,'EUR'),(46,'FKP'),(47,'FJD'),(48,'XPF'),(49,'GMD'),(50,'GHC'),(51,'GIP'),(52,'GTQ'),(53,'GNF'),(54,'GWP'),(55,'GYD'),(56,'HTG'),(57,'HNL'),(58,'HKD'),(59,'HUF'),(60,'INR'),(61,'IDR'),(62,'IRR'),(63,'IQD'),(64,'ILS'),(65,'JMD'),(66,'JPY'),(67,'JOD'),(68,'KES'),(69,'KWD'),(70,'LAK'),(71,'LBP'),(72,'LSL'),(73,'LRD'),(74,'LYD'),(75,'MOP'),(76,'MGF'),(77,'MWK'),(78,'MYR'),(79,'MVR'),(80,'MTL'),(81,'MRO'),(82,'MUR'),(83,'MXN'),(84,'MNT'),(85,'MAD'),(86,'MZM'),(87,'MMK'),(88,'NPR'),(89,'TWD'),(90,'NZD'),(91,'NIO'),(92,'NGN'),(93,'KPW'),(94,'NOK'),(95,'OMR'),(96,'PKR'),(97,'PAB'),(98,'PGK'),(99,'PYG'),(100,'PEN'),(101,'PHP'),(102,'PLN'),(103,'QAR'),(104,'KRW'),(105,'ROL'),(106,'RUB'),(107,'RWF'),(108,'STD'),(109,'SAR'),(110,'SCR'),(111,'SLL'),(112,'SGD'),(113,'SBD'),(114,'SOS'),(115,'ZAR'),(116,'LKR'),(117,'SHP'),(118,'SDD'),(119,'SRG'),(120,'SZL'),(121,'SEK'),(122,'CHF'),(123,'SYP'),(124,'TZS'),(125,'THB'),(126,'TPE'),(127,'TOP'),(128,'TTD'),(129,'TND'),(130,'TRL'),(131,'AED'),(132,'UGX'),(133,'UYU'),(134,'USD'),(135,'VUV'),(136,'VEB'),(137,'VND'),(138,'WST'),(139,'YDD'),(140,'YER'),(141,'ZRZ'),(142,'ZMK'),(143,'ZWD'),(144,'');
/*!40000 ALTER TABLE `app_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_dateformat`
--

DROP TABLE IF EXISTS `app_dateformat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_dateformat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_dateformat`
--

LOCK TABLES `app_dateformat` WRITE;
/*!40000 ALTER TABLE `app_dateformat` DISABLE KEYS */;
INSERT INTO `app_dateformat` VALUES (1,'d-M-yyyy'),(2,'d.M.yyyy'),(3,'d.M.yyyy.'),(4,'d.MM.yyyy'),(5,'d/M/2555'),(6,'d/m/Y'),(7,'d/M/yyyy'),(8,'d/MM/yyyy'),(9,'dd-MM-yyyy'),(10,'dd.MM.yyyy'),(11,'dd.MM.yyyy.'),(12,'dd/MM/yyyy'),(13,'H24.MM.dd'),(14,'M/d/yyyy'),(15,'MM-dd-yyyy'),(16,'MM/dd/yyyy'),(17,'yyyy-M-d'),(18,'yyyy-MM-dd'),(19,'yyyy. M. d'),(20,'yyyy.d.M'),(21,'yyyy.M.d'),(22,'yyyy.MM.dd.'),(23,'yyyy/M/d'),(24,'yyyy/MM/dd');
/*!40000 ALTER TABLE `app_dateformat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_menus`
--

DROP TABLE IF EXISTS `app_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(255) DEFAULT NULL,
  `menu_name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `description` text,
  `pages` enum('0','1') DEFAULT NULL COMMENT '0 = backoffice , 1 = front',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`),
  CONSTRAINT `app_menus_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `app_menus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_menus`
--

LOCK TABLES `app_menus` WRITE;
/*!40000 ALTER TABLE `app_menus` DISABLE KEYS */;
INSERT INTO `app_menus` VALUES (1,'dashboard','Dashboard','backoffice/dashboard','fa-dashboard',NULL,1,NULL,'0'),(2,'#','Reference','#','fa-tags',NULL,2,NULL,'0'),(3,'banks','Bank','backoffice/reference/banks','fa-bank',2,2,NULL,'0'),(4,'category','Category','backoffice/reference/category','fa-rocket',2,2,NULL,'0'),(5,'creditcard','Credit Card','backoffice/reference/creditcard','fa-credit-card',2,2,NULL,'0'),(6,'rooms','Room','backoffice/reference/rooms','fa-home',2,2,NULL,'0'),(7,'menus','Menu','backoffice/reference/menus','fa-cutlery',2,2,NULL,'0'),(8,'#','Setting','#','fa-gears',NULL,4,NULL,'0'),(9,'application','Application','backoffice/setting/application','fa-desktop',8,4,NULL,'0'),(10,'company','Company Profile','backoffice/setting/company','fa-building',8,4,NULL,'0'),(11,'user','User','backoffice/setting/user','fa-users',8,4,NULL,'0'),(13,'roles','Role','backoffice/setting/roles','fa-tags',8,4,NULL,'0'),(14,'branch','Branch','backoffice/setting/branch','fa-map-marker',8,4,NULL,'0'),(15,'#','Front Office','#',NULL,NULL,NULL,NULL,'1'),(16,'welcome','Dashboard','welcome','fa-dashboard',15,NULL,NULL,'1'),(17,'order','Order','order','fa-shopping-cart',15,NULL,NULL,'1'),(18,'waitinglist','Waitinglist','waitinglist','fa-clock-o',15,NULL,NULL,'1'),(19,'member','Member','member','fa-users',15,NULL,NULL,'1'),(20,'profile','My Profile','profile','fa-user',15,NULL,NULL,'1'),(21,'#','Report','#','fa-area-chart',NULL,3,NULL,'0'),(22,'sales','Sales By Period','backoffice/report/sales/period','fa-clock-o',21,3,NULL,'0'),(23,'sales','Sales By Menu','backoffice/report/sales/menu','fa-cutlery',21,3,NULL,'0'),(24,'sales','Sales By Casheir','backoffice/report/sales/casheir','fa-users',21,3,NULL,'0'),(25,'sales','Sales By Payment','backoffice/report/sales/payment','fa-shopping-cart',21,3,NULL,'0'),(26,'sales','Sales By Branch','backoffice/report/sales/branch','fa-map-marker',21,3,NULL,'0'),(27,'messages','Messages','backoffice/messages','fa-envelope',NULL,1,NULL,'0');
/*!40000 ALTER TABLE `app_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_messages`
--

DROP TABLE IF EXISTS `app_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `is_read` enum('0','1') DEFAULT NULL,
  `is_draft` enum('0','1') DEFAULT NULL,
  `is_deleted` enum('0','1') DEFAULT NULL,
  `from_by` int(11) DEFAULT NULL,
  `target_by` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from_by` (`from_by`),
  KEY `target_by` (`target_by`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `app_messages_ibfk_1` FOREIGN KEY (`from_by`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `app_messages_ibfk_2` FOREIGN KEY (`target_by`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `app_messages_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `app_messages_ibfk_4` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_messages`
--

LOCK TABLES `app_messages` WRITE;
/*!40000 ALTER TABLE `app_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_roles`
--

DROP TABLE IF EXISTS `app_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `app_roles_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `app_roles_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_roles`
--

LOCK TABLES `app_roles` WRITE;
/*!40000 ALTER TABLE `app_roles` DISABLE KEYS */;
INSERT INTO `app_roles` VALUES (1,'Administrator',NULL,NULL,NULL,NULL),(2,'Manager',NULL,NULL,NULL,NULL),(3,'Waiters',NULL,NULL,NULL,NULL),(4,'Casheir',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `app_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_setting`
--

DROP TABLE IF EXISTS `app_setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_setting`
--

LOCK TABLES `app_setting` WRITE;
/*!40000 ALTER TABLE `app_setting` DISABLE KEYS */;
INSERT INTO `app_setting` VALUES (1,'app_name','Application'),(2,'app_version','1.0'),(3,'app_licenced',NULL),(4,'app_published','2017-08-19 15:50:59'),(5,'app_language','187'),(6,'app_timezone','Asia/Jakarta'),(7,'app_currency','IDR'),(8,'app_menu_categories',''),(9,'app_themes','Default'),(10,'app_dateformat','d/m/Y'),(11,'app_printer',NULL),(12,'com_name','KuNaon Cafe'),(13,'com_address','Indonesia'),(14,'com_phone','(095) 969-5959'),(15,'com_email','kunaon.studio@gmail.com'),(16,'com_website','www.kunaon.co.id'),(17,'com_hours_first','10:00'),(18,'com_logo',NULL),(19,'op_gender','[{\"id\":\"1\",\"name\":\"Male\"}, {\"id\":\"0\",\"name\":\"Female\"}]  '),(20,'op_status','[{\"id\":\"0\",\"name\":\"Single\"}, {\"id\":\"1\",\"name\":\"Married\"},{\"id\":\"2\",\"name\":\"Widower\"}]  '),(21,'op_religious','[{\"id\":\"0\",\"name\":\"Moslem\"}, {\"id\":\"1\",\"name\":\"Christ\"},{\"id\":\"2\",\"name\":\"Catholic\"},{\"id\":\"3\",\"name\":\"Hinduism\"},{\"id\":\"4\",\"name\":\"Buddhist\"}]'),(22,'op_blood_type','[{\"id\":\"0\",\"name\":\"A\"}, {\"id\":\"1\",\"name\":\"B\"},{\"id\":\"2\",\"name\":\"AB\"},{\"id\":\"3\",\"name\":\"O\"}]'),(23,'op_transaction','[{\"id\":\"0\",\"name\":\"Cash\"}, {\"id\":\"1\",\"name\":\"Credit\"},{\"id\":\"2\",\"name\":\"Cheque\"}]'),(24,'app_expired',NULL),(25,'app_paging','10'),(26,'com_fax',NULL),(27,'app_userpass','myuser'),(28,'com_hours_last','21:00'),(29,'com_tax','5'),(30,'com_discount','25'),(31,'app_date_installed','2017-08-19 15:50:59'),(32,'app_token','MGFkOWQ1NjMtMjJiYS00YTViLWI4M2YtZjJmZTNjYTkwMWFkMjAxNy0wOC0xOSAxNTo1MDo1OQ=='),(33,'app_vpn','http://localhost/kunaon-stable/'),(34,'app_barcode','TYPE_UPC_A'),(35,'app_installed','true'),(36,'app_bill_width','75'),(37,'app_bill_size','2');
/*!40000 ALTER TABLE `app_setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_timezone`
--

DROP TABLE IF EXISTS `app_timezone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_timezone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=503 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_timezone`
--

LOCK TABLES `app_timezone` WRITE;
/*!40000 ALTER TABLE `app_timezone` DISABLE KEYS */;
INSERT INTO `app_timezone` VALUES (1,'Africa/Abidjan'),(2,'Africa/Accra'),(3,'Africa/Addis_Ababa'),(4,'Africa/Algiers'),(5,'Africa/Asmara'),(6,'Africa/Asmera'),(7,'Africa/Bamako'),(8,'Africa/Bangui'),(9,'Africa/Banjul'),(10,'Africa/Bissau'),(11,'Africa/Blantyre'),(12,'Africa/Brazzaville'),(13,'Africa/Bujumbura'),(14,'Africa/Cairo'),(15,'Africa/Casablanca'),(16,'Africa/Ceuta'),(17,'Africa/Conakry'),(18,'Africa/Dakar'),(19,'Africa/Dar_es_Salaam'),(20,'Africa/Djibouti'),(21,'Africa/Douala'),(22,'Africa/El_Aaiun'),(23,'Africa/Freetown'),(24,'Africa/Gaborone'),(25,'Africa/Harare'),(26,'Africa/Johannesburg'),(27,'Africa/Juba'),(28,'Africa/Kampala'),(29,'Africa/Khartoum'),(30,'Africa/Kigali'),(31,'Africa/Kinshasa'),(32,'Africa/Lagos'),(33,'Africa/Libreville'),(34,'Africa/Lome'),(35,'Africa/Luanda'),(36,'Africa/Lubumbashi'),(37,'Africa/Lusaka'),(38,'Africa/Malabo'),(39,'Africa/Maputo'),(40,'Africa/Maseru'),(41,'Africa/Mbabane'),(42,'Africa/Mogadishu'),(43,'Africa/Monrovia'),(44,'Africa/Nairobi'),(45,'Africa/Ndjamena'),(46,'Africa/Niamey'),(47,'Africa/Nouakchott'),(48,'Africa/Ouagadougou'),(49,'Africa/Porto-Novo'),(50,'Africa/Sao_Tome'),(51,'Africa/Timbuktu'),(52,'Africa/Tripoli'),(53,'Africa/Tunis'),(54,'Africa/Windhoek'),(55,'America/Adak'),(56,'America/Anchorage'),(57,'America/Anguilla'),(58,'America/Antigua'),(59,'America/Araguaina'),(60,'America/Argentina/Buenos_Aires'),(61,'America/Argentina/Catamarca'),(62,'America/Argentina/ComodRivadavia'),(63,'America/Argentina/Cordoba'),(64,'America/Argentina/Jujuy'),(65,'America/Argentina/La_Rioja'),(66,'America/Argentina/Mendoza'),(67,'America/Argentina/Rio_Gallegos'),(68,'America/Argentina/Salta'),(69,'America/Argentina/San_Juan'),(70,'America/Argentina/San_Luis'),(71,'America/Argentina/Tucuman'),(72,'America/Argentina/Ushuaia'),(73,'America/Aruba'),(74,'America/Asuncion'),(75,'America/Atikokan'),(76,'America/Atka'),(77,'America/Bahia'),(78,'America/Bahia_Banderas'),(79,'America/Barbados'),(80,'America/Belem'),(81,'America/Belize'),(82,'America/Blanc-Sablon'),(83,'America/Boa_Vista'),(84,'America/Bogota'),(85,'America/Boise'),(86,'America/Buenos_Aires'),(87,'America/Cambridge_Bay'),(88,'America/Campo_Grande'),(89,'America/Cancun'),(90,'America/Caracas'),(91,'America/Catamarca'),(92,'America/Cayenne'),(93,'America/Cayman'),(94,'America/Chicago'),(95,'America/Chihuahua'),(96,'America/Coral_Harbour'),(97,'America/Cordoba'),(98,'America/Costa_Rica'),(99,'America/Creston'),(100,'America/Cuiaba'),(101,'America/Curacao'),(102,'America/Danmarkshavn'),(103,'America/Dawson'),(104,'America/Dawson_Creek'),(105,'America/Denver'),(106,'America/Detroit'),(107,'America/Dominica'),(108,'America/Edmonton'),(109,'America/Eirunepe'),(110,'America/El_Salvador'),(111,'America/Ensenada'),(112,'America/Fortaleza'),(113,'America/Fort_Wayne'),(114,'America/Glace_Bay'),(115,'America/Godthab'),(116,'America/Goose_Bay'),(117,'America/Grand_Turk'),(118,'America/Grenada'),(119,'America/Guadeloupe'),(120,'America/Guatemala'),(121,'America/Guayaquil'),(122,'America/Guyana'),(123,'America/Halifax'),(124,'America/Havana'),(125,'America/Hermosillo'),(126,'America/Indiana/Indianapolis'),(127,'America/Indiana/Knox'),(128,'America/Indiana/Marengo'),(129,'America/Indiana/Petersburg'),(130,'America/Indiana/Tell_City'),(131,'America/Indiana/Vevay'),(132,'America/Indiana/Vincennes'),(133,'America/Indiana/Winamac'),(134,'America/Indianapolis'),(135,'America/Inuvik'),(136,'America/Iqaluit'),(137,'America/Jamaica'),(138,'America/Jujuy'),(139,'America/Juneau'),(140,'America/Kentucky/Louisville'),(141,'America/Kentucky/Monticello'),(142,'America/Knox_IN'),(143,'America/Kralendijk'),(144,'America/La_Paz'),(145,'America/Lima'),(146,'America/Los_Angeles'),(147,'America/Louisville'),(148,'America/Lower_Princes'),(149,'America/Maceio'),(150,'America/Managua'),(151,'America/Manaus'),(152,'America/Marigot'),(153,'America/Martinique'),(154,'America/Matamoros'),(155,'America/Mazatlan'),(156,'America/Mendoza'),(157,'America/Menominee'),(158,'America/Merida'),(159,'America/Metlakatla'),(160,'America/Mexico_City'),(161,'America/Miquelon'),(162,'America/Moncton'),(163,'America/Monterrey'),(164,'America/Montevideo'),(165,'America/Montreal'),(166,'America/Montserrat'),(167,'America/Nassau'),(168,'America/New_York'),(169,'America/Nipigon'),(170,'America/Nome'),(171,'America/Noronha'),(172,'America/North_Dakota/Beulah'),(173,'America/North_Dakota/Center'),(174,'America/North_Dakota/New_Salem'),(175,'America/Ojinaga'),(176,'America/Panama'),(177,'America/Pangnirtung'),(178,'America/Paramaribo'),(179,'America/Phoenix'),(180,'America/Port-au-Prince'),(181,'America/Porto_Acre'),(182,'America/Porto_Velho'),(183,'America/Port_of_Spain'),(184,'America/Puerto_Rico'),(185,'America/Rainy_River'),(186,'America/Rankin_Inlet'),(187,'America/Recife'),(188,'America/Regina'),(189,'America/Resolute'),(190,'America/Rio_Branco'),(191,'America/Rosario'),(192,'America/Santarem'),(193,'America/Santa_Isabel'),(194,'America/Santiago'),(195,'America/Santo_Domingo'),(196,'America/Sao_Paulo'),(197,'America/Scoresbysund'),(198,'America/Shiprock'),(199,'America/Sitka'),(200,'America/St_Barthelemy'),(201,'America/St_Johns'),(202,'America/St_Kitts'),(203,'America/St_Lucia'),(204,'America/St_Thomas'),(205,'America/St_Vincent'),(206,'America/Swift_Current'),(207,'America/Tegucigalpa'),(208,'America/Thule'),(209,'America/Thunder_Bay'),(210,'America/Tijuana'),(211,'America/Toronto'),(212,'America/Tortola'),(213,'America/Vancouver'),(214,'America/Virgin'),(215,'America/Whitehorse'),(216,'America/Winnipeg'),(217,'America/Yakutat'),(218,'America/Yellowknife'),(219,'Antarctica/Casey'),(220,'Antarctica/Davis'),(221,'Antarctica/DumontDUrville'),(222,'Antarctica/Macquarie'),(223,'Antarctica/Mawson'),(224,'Antarctica/McMurdo'),(225,'Antarctica/Palmer'),(226,'Antarctica/Rothera'),(227,'Antarctica/South_Pole'),(228,'Antarctica/Syowa'),(229,'Antarctica/Troll'),(230,'Antarctica/Vostok'),(231,'Arctic/Longyearbyen'),(232,'Asia/Aden'),(233,'Asia/Almaty'),(234,'Asia/Amman'),(235,'Asia/Anadyr'),(236,'Asia/Aqtau'),(237,'Asia/Aqtobe'),(238,'Asia/Ashgabat'),(239,'Asia/Ashkhabad'),(240,'Asia/Baghdad'),(241,'Asia/Bahrain'),(242,'Asia/Baku'),(243,'Asia/Bangkok'),(244,'Asia/Beirut'),(245,'Asia/Bishkek'),(246,'Asia/Brunei'),(247,'Asia/Calcutta'),(248,'Asia/Chita'),(249,'Asia/Choibalsan'),(250,'Asia/Chongqing'),(251,'Asia/Chungking'),(252,'Asia/Colombo'),(253,'Asia/Dacca'),(254,'Asia/Damascus'),(255,'Asia/Dhaka'),(256,'Asia/Dili'),(257,'Asia/Dubai'),(258,'Asia/Dushanbe'),(259,'Asia/Gaza'),(260,'Asia/Harbin'),(261,'Asia/Hebron'),(262,'Asia/Hong_Kong'),(263,'Asia/Hovd'),(264,'Asia/Ho_Chi_Minh'),(265,'Asia/Irkutsk'),(266,'Asia/Istanbul'),(267,'Asia/Jakarta'),(268,'Asia/Jayapura'),(269,'Asia/Jerusalem'),(270,'Asia/Kabul'),(271,'Asia/Kamchatka'),(272,'Asia/Karachi'),(273,'Asia/Kashgar'),(274,'Asia/Kathmandu'),(275,'Asia/Katmandu'),(276,'Asia/Khandyga'),(277,'Asia/Kolkata'),(278,'Asia/Krasnoyarsk'),(279,'Asia/Kuala_Lumpur'),(280,'Asia/Kuching'),(281,'Asia/Kuwait'),(282,'Asia/Macao'),(283,'Asia/Macau'),(284,'Asia/Magadan'),(285,'Asia/Makassar'),(286,'Asia/Manila'),(287,'Asia/Muscat'),(288,'Asia/Nicosia'),(289,'Asia/Novokuznetsk'),(290,'Asia/Novosibirsk'),(291,'Asia/Omsk'),(292,'Asia/Oral'),(293,'Asia/Phnom_Penh'),(294,'Asia/Pontianak'),(295,'Asia/Pyongyang'),(296,'Asia/Qatar'),(297,'Asia/Qyzylorda'),(298,'Asia/Rangoon'),(299,'Asia/Riyadh'),(300,'Asia/Saigon'),(301,'Asia/Sakhalin'),(302,'Asia/Samarkand'),(303,'Asia/Seoul'),(304,'Asia/Shanghai'),(305,'Asia/Singapore'),(306,'Asia/Srednekolymsk'),(307,'Asia/Taipei'),(308,'Asia/Tashkent'),(309,'Asia/Tbilisi'),(310,'Asia/Tehran'),(311,'Asia/Tel_Aviv'),(312,'Asia/Thimbu'),(313,'Asia/Thimphu'),(314,'Asia/Tokyo'),(315,'Asia/Ujung_Pandang'),(316,'Asia/Ulaanbaatar'),(317,'Asia/Ulan_Bator'),(318,'Asia/Urumqi'),(319,'Asia/Ust-Nera'),(320,'Asia/Vientiane'),(321,'Asia/Vladivostok'),(322,'Asia/Yakutsk'),(323,'Asia/Yekaterinburg'),(324,'Asia/Yerevan'),(325,'Atlantic/Azores'),(326,'Atlantic/Bermuda'),(327,'Atlantic/Canary'),(328,'Atlantic/Cape_Verde'),(329,'Atlantic/Faeroe'),(330,'Atlantic/Faroe'),(331,'Atlantic/Jan_Mayen'),(332,'Atlantic/Madeira'),(333,'Atlantic/Reykjavik'),(334,'Atlantic/South_Georgia'),(335,'Atlantic/Stanley'),(336,'Atlantic/St_Helena'),(337,'Australia/ACT'),(338,'Australia/Adelaide'),(339,'Australia/Brisbane'),(340,'Australia/Broken_Hill'),(341,'Australia/Canberra'),(342,'Australia/Currie'),(343,'Australia/Darwin'),(344,'Australia/Eucla'),(345,'Australia/Hobart'),(346,'Australia/LHI'),(347,'Australia/Lindeman'),(348,'Australia/Lord_Howe'),(349,'Australia/Melbourne'),(350,'Australia/North'),(351,'Australia/NSW'),(352,'Australia/Perth'),(353,'Australia/Queensland'),(354,'Australia/South'),(355,'Australia/Sydney'),(356,'Australia/Tasmania'),(357,'Australia/Victoria'),(358,'Australia/West'),(359,'Australia/Yancowinna'),(360,'Brazil/Acre'),(361,'Brazil/DeNoronha'),(362,'Brazil/East'),(363,'Brazil/West'),(364,'Canada/Atlantic'),(365,'Canada/Central'),(366,'Canada/East-Saskatchewan'),(367,'Canada/Eastern'),(368,'Canada/Mountain'),(369,'Canada/Newfoundland'),(370,'Canada/Pacific'),(371,'Canada/Saskatchewan'),(372,'Canada/Yukon'),(373,'Chile/Continental'),(374,'Chile/EasterIsland'),(375,'Etc/GMT'),(376,'Etc/Greenwich'),(377,'Etc/UCT'),(378,'Etc/Universal'),(379,'Etc/UTC'),(380,'Etc/Zulu'),(381,'Europe/Amsterdam'),(382,'Europe/Andorra'),(383,'Europe/Athens'),(384,'Europe/Belfast'),(385,'Europe/Belgrade'),(386,'Europe/Berlin'),(387,'Europe/Bratislava'),(388,'Europe/Brussels'),(389,'Europe/Bucharest'),(390,'Europe/Budapest'),(391,'Europe/Busingen'),(392,'Europe/Chisinau'),(393,'Europe/Copenhagen'),(394,'Europe/Dublin'),(395,'Europe/Gibraltar'),(396,'Europe/Guernsey'),(397,'Europe/Helsinki'),(398,'Europe/Isle_of_Man'),(399,'Europe/Istanbul'),(400,'Europe/Jersey'),(401,'Europe/Kaliningrad'),(402,'Europe/Kiev'),(403,'Europe/Lisbon'),(404,'Europe/Ljubljana'),(405,'Europe/London'),(406,'Europe/Luxembourg'),(407,'Europe/Madrid'),(408,'Europe/Malta'),(409,'Europe/Mariehamn'),(410,'Europe/Minsk'),(411,'Europe/Monaco'),(412,'Europe/Moscow'),(413,'Europe/Nicosia'),(414,'Europe/Oslo'),(415,'Europe/Paris'),(416,'Europe/Podgorica'),(417,'Europe/Prague'),(418,'Europe/Riga'),(419,'Europe/Rome'),(420,'Europe/Samara'),(421,'Europe/San_Marino'),(422,'Europe/Sarajevo'),(423,'Europe/Simferopol'),(424,'Europe/Skopje'),(425,'Europe/Sofia'),(426,'Europe/Stockholm'),(427,'Europe/Tallinn'),(428,'Europe/Tirane'),(429,'Europe/Tiraspol'),(430,'Europe/Uzhgorod'),(431,'Europe/Vaduz'),(432,'Europe/Vatican'),(433,'Europe/Vienna'),(434,'Europe/Vilnius'),(435,'Europe/Volgograd'),(436,'Europe/Warsaw'),(437,'Europe/Zagreb'),(438,'Europe/Zaporozhye'),(439,'Europe/Zurich'),(440,'GB'),(441,'Indian/Antananarivo'),(442,'Indian/Chagos'),(443,'Indian/Christmas'),(444,'Indian/Cocos'),(445,'Indian/Comoro'),(446,'Indian/Kerguelen'),(447,'Indian/Mahe'),(448,'Indian/Maldives'),(449,'Indian/Mauritius'),(450,'Indian/Mayotte'),(451,'Indian/Reunion'),(452,'Mexico/BajaNorte'),(453,'Mexico/BajaSur'),(454,'Mexico/General'),(455,'NZ'),(456,'Pacific/Apia'),(457,'Pacific/Auckland'),(458,'Pacific/Bougainville'),(459,'Pacific/Chatham'),(460,'Pacific/Chuuk'),(461,'Pacific/Easter'),(462,'Pacific/Efate'),(463,'Pacific/Enderbury'),(464,'Pacific/Fakaofo'),(465,'Pacific/Fiji'),(466,'Pacific/Funafuti'),(467,'Pacific/Galapagos'),(468,'Pacific/Gambier'),(469,'Pacific/Guadalcanal'),(470,'Pacific/Guam'),(471,'Pacific/Honolulu'),(472,'Pacific/Johnston'),(473,'Pacific/Kiritimati'),(474,'Pacific/Kosrae'),(475,'Pacific/Kwajalein'),(476,'Pacific/Majuro'),(477,'Pacific/Marquesas'),(478,'Pacific/Midway'),(479,'Pacific/Nauru'),(480,'Pacific/Niue'),(481,'Pacific/Norfolk'),(482,'Pacific/Noumea'),(483,'Pacific/Pago_Pago'),(484,'Pacific/Palau'),(485,'Pacific/Pitcairn'),(486,'Pacific/Pohnpei'),(487,'Pacific/Ponape'),(488,'Pacific/Port_Moresby'),(489,'Pacific/Rarotonga'),(490,'Pacific/Saipan'),(491,'Pacific/Samoa'),(492,'Pacific/Tahiti'),(493,'Pacific/Tarawa'),(494,'Pacific/Tongatapu'),(495,'Pacific/Truk'),(496,'Pacific/Wake'),(497,'Pacific/Wallis'),(498,'Pacific/Yap'),(499,'PRC'),(500,'ROC'),(501,'ROK'),(502,'UTC');
/*!40000 ALTER TABLE `app_timezone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_user_menus`
--

DROP TABLE IF EXISTS `app_user_menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_user_menus` (
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  KEY `menu_id` (`menu_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `app_user_menus_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `app_user_menus_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `app_menus` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_user_menus`
--

LOCK TABLES `app_user_menus` WRITE;
/*!40000 ALTER TABLE `app_user_menus` DISABLE KEYS */;
INSERT INTO `app_user_menus` VALUES (1,1),(1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,23),(1,24),(1,25),(1,26),(1,27);
/*!40000 ALTER TABLE `app_user_menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_user_role`
--

DROP TABLE IF EXISTS `app_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `app_user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `app_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `app_user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `app_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_user_role`
--

LOCK TABLES `app_user_role` WRITE;
/*!40000 ALTER TABLE `app_user_role` DISABLE KEYS */;
INSERT INTO `app_user_role` VALUES (1,1);
/*!40000 ALTER TABLE `app_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `app_users`
--

DROP TABLE IF EXISTS `app_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `app_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('1','0') DEFAULT NULL,
  `status_merriage` enum('1','0') DEFAULT NULL,
  `religious` enum('0','1','2','3','4') DEFAULT NULL,
  `identity_number` varchar(255) DEFAULT NULL,
  `blood_type` enum('0','1','2','3') DEFAULT NULL,
  `address` text,
  `photo` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `is_member` enum('0','1') DEFAULT '0',
  `is_root` enum('0','1') DEFAULT '0',
  `actived` enum('0','1') DEFAULT NULL,
  `expired` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `app_users_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `app_users_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `app_users`
--

LOCK TABLES `app_users` WRITE;
/*!40000 ALTER TABLE `app_users` DISABLE KEYS */;
INSERT INTO `app_users` VALUES (1,'myadmin@kunaon.com','5d5a582e5adf896ed6e1474c700b481a','Administrator','-','0','0','0','87878678767','0','Indonesia',NULL,'2017-07-31 02:40:08',NULL,NULL,NULL,'0','1','1','2017-07-31 04:13:39',NULL,NULL);
/*!40000 ALTER TABLE `app_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_banks`
--

DROP TABLE IF EXISTS `en_banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_banks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `en_banks_ibfk_1` (`country_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_banks_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_banks_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_banks_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `app_countries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_banks`
--

LOCK TABLES `en_banks` WRITE;
/*!40000 ALTER TABLE `en_banks` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_branch`
--

DROP TABLE IF EXISTS `en_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `vpn` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `en_branch_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_branch_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_branch_ibfk_3` FOREIGN KEY (`country_id`) REFERENCES `app_countries` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_branch`
--

LOCK TABLES `en_branch` WRITE;
/*!40000 ALTER TABLE `en_branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_categories`
--

DROP TABLE IF EXISTS `en_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_categories_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_categories_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_categories`
--

LOCK TABLES `en_categories` WRITE;
/*!40000 ALTER TABLE `en_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_creditcard`
--

DROP TABLE IF EXISTS `en_creditcard`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_creditcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_creditcard_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_creditcard_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_creditcard`
--

LOCK TABLES `en_creditcard` WRITE;
/*!40000 ALTER TABLE `en_creditcard` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_creditcard` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_menu`
--

DROP TABLE IF EXISTS `en_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `en_menu_ibfk_2` (`created_by`),
  KEY `en_menu_ibfk_3` (`updated_by`),
  CONSTRAINT `en_menu_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_menu_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_menu_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `en_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_menu`
--

LOCK TABLES `en_menu` WRITE;
/*!40000 ALTER TABLE `en_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_rooms`
--

DROP TABLE IF EXISTS `en_rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_rooms_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_rooms_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_rooms`
--

LOCK TABLES `en_rooms` WRITE;
/*!40000 ALTER TABLE `en_rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_tables`
--

DROP TABLE IF EXISTS `en_tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `code` varchar(11) DEFAULT NULL,
  `is_empty` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `en_tables_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `en_rooms` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_tables`
--

LOCK TABLES `en_tables` WRITE;
/*!40000 ALTER TABLE `en_tables` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_transaction`
--

DROP TABLE IF EXISTS `en_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_name` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_transaction_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_transaction_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_transaction`
--

LOCK TABLES `en_transaction` WRITE;
/*!40000 ALTER TABLE `en_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `en_waitinglist`
--

DROP TABLE IF EXISTS `en_waitinglist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `en_waitinglist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `en_waitinglist_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `en_waitinglist_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `en_waitinglist`
--

LOCK TABLES `en_waitinglist` WRITE;
/*!40000 ALTER TABLE `en_waitinglist` DISABLE KEYS */;
/*!40000 ALTER TABLE `en_waitinglist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_paid_cash`
--

DROP TABLE IF EXISTS `tr_paid_cash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_paid_cash` (
  `sales_id` varchar(255) DEFAULT NULL,
  `cash` double DEFAULT NULL,
  `change` double DEFAULT NULL,
  KEY `sales_id` (`sales_id`),
  CONSTRAINT `tr_paid_cash_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `tr_sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_paid_cash`
--

LOCK TABLES `tr_paid_cash` WRITE;
/*!40000 ALTER TABLE `tr_paid_cash` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_paid_cash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_paid_cheque`
--

DROP TABLE IF EXISTS `tr_paid_cheque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_paid_cheque` (
  `sales_id` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `cheque_number` varchar(255) DEFAULT NULL,
  KEY `tr_paid_cheque_ibfk_2` (`bank_id`),
  KEY `sales_id` (`sales_id`),
  CONSTRAINT `tr_paid_cheque_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `tr_sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tr_paid_cheque_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `en_banks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_paid_cheque`
--

LOCK TABLES `tr_paid_cheque` WRITE;
/*!40000 ALTER TABLE `tr_paid_cheque` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_paid_cheque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_paid_credit`
--

DROP TABLE IF EXISTS `tr_paid_credit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_paid_credit` (
  `sales_id` varchar(255) DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `creditcard_id` int(11) DEFAULT NULL,
  `credit_number` varchar(255) DEFAULT NULL,
  `holder_number` varchar(255) DEFAULT NULL,
  KEY `tr_paid_credit_ibfk_2` (`creditcard_id`),
  KEY `tr_paid_credit_ibfk_3` (`bank_id`),
  KEY `sales_id` (`sales_id`),
  CONSTRAINT `tr_paid_credit_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `tr_sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tr_paid_credit_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `en_banks` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tr_paid_credit_ibfk_3` FOREIGN KEY (`creditcard_id`) REFERENCES `en_creditcard` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_paid_credit`
--

LOCK TABLES `tr_paid_credit` WRITE;
/*!40000 ALTER TABLE `tr_paid_credit` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_paid_credit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_reservation`
--

DROP TABLE IF EXISTS `tr_reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_reservation` (
  `sales_id` varchar(255) DEFAULT NULL,
  `table_id` int(11) DEFAULT NULL,
  KEY `transaction_number` (`sales_id`),
  KEY `table_id` (`table_id`),
  CONSTRAINT `tr_reservation_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `tr_sales` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `tr_reservation_ibfk_2` FOREIGN KEY (`table_id`) REFERENCES `en_tables` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_reservation`
--

LOCK TABLES `tr_reservation` WRITE;
/*!40000 ALTER TABLE `tr_reservation` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tr_sales`
--

DROP TABLE IF EXISTS `tr_sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tr_sales` (
  `id` varchar(255) NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `transaction_number` char(12) DEFAULT NULL,
  `items` text,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `tax` decimal(10,0) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL,
  `grandtotal` decimal(10,0) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `transaction_type` enum('-1','0','1','2') DEFAULT '-1',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `created_by` (`created_by`),
  KEY `updated_by` (`updated_by`),
  CONSTRAINT `tr_sales_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_sales_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_sales_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `app_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tr_sales`
--

LOCK TABLES `tr_sales` WRITE;
/*!40000 ALTER TABLE `tr_sales` DISABLE KEYS */;
/*!40000 ALTER TABLE `tr_sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-02 18:40:33
