# Sequel Pro dump
# Version 1630
# http://code.google.com/p/sequel-pro
#
# Host: localhost (MySQL 5.0.67)
# Database: attendance
# Generation Time: 2010-03-08 06:55:35 -0500
# ************************************************************

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table approver_employees
# ------------------------------------------------------------

DROP TABLE IF EXISTS `approver_employees`;

CREATE TABLE `approver_employees` (
  `id` int(11) NOT NULL auto_increment,
  `approver_id` int(11) default NULL,
  `user_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `approver_employees` WRITE;
/*!40000 ALTER TABLE `approver_employees` DISABLE KEYS */;
INSERT INTO `approver_employees` (`id`,`approver_id`,`user_id`)
VALUES
	(1,254,210);

/*!40000 ALTER TABLE `approver_employees` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `request_id` int(11) default NULL,
  `comment` text,
  `is_public` int(1) default NULL,
  `comment_date` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table pto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pto`;

CREATE TABLE `pto` (
  `id` int(11) NOT NULL auto_increment,
  `pto_slug` varchar(255) default NULL,
  `pto_days` int(11) default NULL,
  `pto_long_description` text,
  `pto_allotment` float default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

LOCK TABLES `pto` WRITE;
/*!40000 ALTER TABLE `pto` DISABLE KEYS */;
INSERT INTO `pto` (`id`,`pto_slug`,`pto_days`,`pto_long_description`,`pto_allotment`)
VALUES
	(1,'18 Days',18,'Less Then 2 Years of Employment',0.69),
	(2,'23 Days',23,'From 2-6 Years of Employement',0.88),
	(3,'28 Days',28,'From 7-19 Years of Employement',1.08),
	(4,'33 Days',33,'For 20+ Years of Employement',1.27);

/*!40000 ALTER TABLE `pto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table request_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `request_types`;

CREATE TABLE `request_types` (
  `id` int(11) default NULL,
  `request_id` int(11) default NULL,
  `type_id` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `request_types` WRITE;
/*!40000 ALTER TABLE `request_types` DISABLE KEYS */;
INSERT INTO `request_types` (`id`,`request_id`,`type_id`)
VALUES
	(NULL,98,1),
	(NULL,99,1),
	(NULL,100,1),
	(NULL,101,1),
	(NULL,102,1),
	(NULL,103,1),
	(NULL,104,2),
	(NULL,105,1),
	(NULL,106,1),
	(NULL,107,1),
	(NULL,108,2),
	(NULL,109,2),
	(NULL,110,2),
	(NULL,111,2),
	(NULL,112,2),
	(NULL,113,2),
	(NULL,114,2),
	(NULL,115,2),
	(NULL,116,2),
	(NULL,117,2),
	(NULL,118,2),
	(NULL,119,2),
	(NULL,120,2),
	(NULL,121,2),
	(NULL,122,2),
	(NULL,123,2);

/*!40000 ALTER TABLE `request_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table requests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `requests`;

CREATE TABLE `requests` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `date_requested` date default NULL,
  `date_reviewed` date default NULL,
  `date` date default NULL,
  `status` varchar(10) default NULL,
  `duration` varchar(11) default NULL,
  `occurence` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

LOCK TABLES `requests` WRITE;
/*!40000 ALTER TABLE `requests` DISABLE KEYS */;
INSERT INTO `requests` (`id`,`user_id`,`date_requested`,`date_reviewed`,`date`,`status`,`duration`,`occurence`)
VALUES
	(98,210,'2010-02-11',NULL,'2010-02-11','pending','full',0),
	(99,210,'2010-02-11',NULL,'2010-02-12','pending','full',0),
	(100,210,'2010-02-11',NULL,'2010-02-15','pending','full',0),
	(101,210,'2010-02-11',NULL,'2010-02-16','pending','full',0),
	(102,210,'2010-02-11',NULL,'2010-02-17','pending','full',0),
	(103,210,'2010-02-11',NULL,'2010-02-18','pending','full',0),
	(104,210,'2010-02-11',NULL,'2010-02-19','pending','full',0),
	(105,210,'2010-02-12',NULL,'2010-02-22','pending','full',0),
	(106,210,'2010-02-12',NULL,'2010-02-23','pending','full',0),
	(107,210,'2010-02-12',NULL,'2010-02-24','pending','full',0),
	(108,210,'2010-02-12',NULL,'2010-02-25','pending','full',0),
	(109,210,'2010-02-12',NULL,'2010-02-26','pending','full',0),
	(110,210,'2010-02-12',NULL,'2011-03-04','pending',NULL,NULL),
	(111,210,'2010-02-12',NULL,'2011-03-07','pending',NULL,NULL),
	(112,210,'2010-02-12',NULL,'2011-03-08','pending',NULL,NULL),
	(113,210,'2010-02-12',NULL,'2011-03-09','pending',NULL,NULL),
	(114,210,'2010-02-12',NULL,'2011-03-10','pending',NULL,NULL),
	(115,210,'2010-02-12',NULL,'2011-03-11','pending',NULL,NULL),
	(116,210,'2010-02-12',NULL,'2011-03-14','pending',NULL,NULL),
	(117,210,'2010-02-12',NULL,'2011-03-15','pending',NULL,NULL),
	(118,210,'2010-02-12',NULL,'2011-03-16','pending',NULL,NULL),
	(119,210,'2010-02-12',NULL,'2011-03-17','pending',NULL,NULL),
	(120,210,'2010-02-12',NULL,'2011-03-18','pending',NULL,NULL),
	(121,210,'2010-02-12',NULL,'2011-03-21','pending',NULL,NULL),
	(122,210,'2010-02-12',NULL,'2011-03-22','pending',NULL,NULL),
	(123,210,'2010-02-12',NULL,'2011-03-23','pending',NULL,NULL);

/*!40000 ALTER TABLE `requests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL auto_increment,
  `role_title` varchar(255) default NULL,
  `role_name` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`,`role_title`,`role_name`)
VALUES
	(4,'Approver','approver'),
	(5,'Employee','employee');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `types`;

CREATE TABLE `types` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(25) default NULL,
  `description` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

LOCK TABLES `types` WRITE;
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`,`title`,`description`)
VALUES
	(1,'Paid Time Off',NULL),
	(2,'Telecommute',NULL),
	(3,'Company Business',NULL),
	(4,'Compensation Day',NULL),
	(5,'Jury Duty',NULL),
	(8,'Tardy',NULL);

/*!40000 ALTER TABLE `types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_pto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_pto`;

CREATE TABLE `user_pto` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `pto_id` int(11) default NULL,
  `pto_purchased` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

LOCK TABLES `user_pto` WRITE;
/*!40000 ALTER TABLE `user_pto` DISABLE KEYS */;
INSERT INTO `user_pto` (`id`,`user_id`,`pto_id`,`pto_purchased`)
VALUES
	(1,210,2,5);

/*!40000 ALTER TABLE `user_pto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_roles`;

CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `role_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` (`id`,`user_id`,`role_id`)
VALUES
	(10,210,5),
	(16,254,4);

/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;





/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
