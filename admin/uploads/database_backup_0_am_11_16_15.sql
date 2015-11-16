-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: busni
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `Articles`
--

DROP TABLE IF EXISTS `Articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `login` varchar(40) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Articles`
--

LOCK TABLES `Articles` WRITE;
/*!40000 ALTER TABLE `Articles` DISABLE KEYS */;
INSERT INTO `Articles` VALUES (1,'Efforts to Rein In Arbitration Come Under Well-Financed Attack','<p class=\"story-body-text story-content\" data-para-count=\"192\" data-total-count=\"2169\" itemprop=\"articleBody\" style=\"margin-bottom: 1em; margin-left: 135px; font-size: 16px; line-height: 1.4375rem; font-family: georgia, \'times new roman\', times, serif; width: 532px; max-width: 540px; color: rgb(51, 51, 51);\">“If the Chamber of Commerce thinks they are going to slip a provision into a spending bill that cuts off consumer rights without a fight, they are very much mistaken,” Senator Warren said.</p><p class=\"story-body-text story-content\" data-para-count=\"144\" data-total-count=\"2313\" itemprop=\"articleBody\" id=\"story-continues-6\" style=\"margin-bottom: 1em; margin-left: 135px; font-size: 16px; line-height: 1.4375rem; font-family: georgia, \'times new roman\', times, serif; width: 532px; max-width: 540px; color: rgb(51, 51, 51);\">Matt Webb, a senior vice president of the chamber’s Institute for Legal Reform, called the bureau’s work “deeply flawed and incomplete.”</p><p class=\"story-body-text story-content\" data-para-count=\"636\" data-total-count=\"2949\" itemprop=\"articleBody\" style=\"margin-bottom: 1em; margin-left: 135px; font-size: 16px; line-height: 1.4375rem; font-family: georgia, \'times new roman\', times, serif; width: 532px; max-width: 540px; color: rgb(51, 51, 51);\">The flurry of activity follows the publication by The New York Times of a<a title=\"Chronology of coverage.\" href=\"http://topics.nytimes.com/top/reference/timestopics/subjects/a/arbitration_conciliation_and_mediation/index.html?8qa\" style=\"text-decoration: underline; color: rgb(50, 104, 145);\">three-part series</a>&nbsp;showing how corporations across the spectrum of the American economy — phone companies, credit card providers, nursing homes — use mandatory arbitration to circumvent the court system and derail legal claims alleging predatory lending, wage theft, discrimination and other violations. The reporting detailed how arbitration proceedings tend to favor businesses over individuals. In some instances, arbitration<a href=\"http://www.nytimes.com/2015/11/03/business/dealbook/in-religious-arbitration-scripture-is-the-rule-of-law.html\" style=\"text-decoration: underline; color: rgb(50, 104, 145);\">clauses require disputes to be settled in Christian arbitration</a>, a process governed by the Bible rather than state or federal law.</p><p class=\"story-body-text story-content\" data-para-count=\"361\" data-total-count=\"3310\" itemprop=\"articleBody\" id=\"story-continues-7\" style=\"margin-bottom: 1em; margin-left: 135px; font-size: 16px; line-height: 1.4375rem; font-family: georgia, \'times new roman\', times, serif; width: 532px; max-width: 540px; color: rgb(51, 51, 51);\">Proponents of arbitration, who say it provides an efficient alternative to courts, view the Consumer Financial Protection Bureau as among its biggest threats. They say a new rule proposed by the consumer agency, which would prevent financial services companies from including class-action bans in consumer contracts, could in effect kill arbitration altogether.</p><p class=\"story-body-text story-content\" data-para-count=\"368\" data-total-count=\"3678\" itemprop=\"articleBody\" id=\"story-continues-8\" style=\"margin-bottom: 1em; margin-left: 135px; font-size: 16px; line-height: 1.4375rem; font-family: georgia, \'times new roman\', times, serif; width: 532px; max-width: 540px; color: rgb(51, 51, 51);\">On Wednesday, the Justice Department issued a proposal to protect military service members from arbitration requirements. Earlier this month, Senator Al Franken, Democrat of Minnesota and a longtime opponent of arbitration, renewed his push for Congress to pass a bill he introduced this year that would prevent companies from requiring employees to go to arbitration.</p>','admin','2015-11-15');
/*!40000 ALTER TABLE `Articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Files`
--

DROP TABLE IF EXISTS `Files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Files`
--

LOCK TABLES `Files` WRITE;
/*!40000 ALTER TABLE `Files` DISABLE KEYS */;
INSERT INTO `Files` VALUES (1,'/Newspaper_management/admin/uploads/Screenshot from 2015-11-11 14:06:55.png',1);
/*!40000 ALTER TABLE `Files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'admin','5f4dcc3b5aa765d61d8327deb882cf99');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-15 23:50:06
