-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.30-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema feed_manufacture2
--

CREATE DATABASE IF NOT EXISTS feed_manufacture2;
USE feed_manufacture2;

--
-- Definition of table `mfg_contact_book`
--

DROP TABLE IF EXISTS `mfg_contact_book`;
CREATE TABLE `mfg_contact_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_contact_book`
--

/*!40000 ALTER TABLE `mfg_contact_book` DISABLE KEYS */;
INSERT INTO `mfg_contact_book` (`id`,`user_id`,`name`,`phone`,`email`,`address`,`added_on`) VALUES 
 (1,1,'shafiq','01254875484','shafiq@emial.com','address','2018-10-09 19:43:01'),
 (2,1,'Inaya','01623799495','inaya@yahoo.com','Society 3, building no 12, Mohammadpur Dhaka,1207','2018-10-09 19:47:16'),
 (3,1,'Masud Rana Mukul','018188852417','masud@gmail.com','Mohammadpur,Dhaka','2018-10-13 21:58:29'),
 (4,2,'Rana','01826184118','rana@gmail.com','Chittangong','2018-10-16 09:44:06'),
 (5,2,'Masud Rana Mukul','018188852417','masud@gmail.com','This is address','2018-10-16 09:47:24'),
 (6,2,'Masud Rana Mukul','018188852417','masud@gmail.com','This is address','2018-10-16 09:48:49'),
 (7,2,'Masud Rana Mukul','018188852417','Abubokor@gmail.com','asdfadsfadfa','2018-10-16 09:49:13'),
 (8,2,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfdsfsda','2018-10-16 09:50:03'),
 (9,2,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfdsfsda','2018-10-16 09:50:40'),
 (10,2,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfdsfsda','2018-10-16 09:50:43'),
 (11,0,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfdsfsda','2018-10-16 09:51:34'),
 (12,2,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfdsfsda','2018-10-16 09:51:34'),
 (13,0,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfadsfadsfdsf','2018-10-16 09:51:40'),
 (14,2,'Masud Rana Mukul','018188852417','masud@gmail.com','asdfadsfadsfdsf','2018-10-16 09:51:40'),
 (15,2,'sdfgsf','sdfgsfg','','','2018-10-16 09:52:39'),
 (16,0,'foisal','01824690788','foisal@yahoo.com','Narayngong','2018-10-17 10:44:11'),
 (17,2,'foisal','01824690788','foisal@yahoo.com','Narayngong','2018-10-17 10:44:11');
/*!40000 ALTER TABLE `mfg_contact_book` ENABLE KEYS */;


--
-- Definition of table `mfg_customer`
--

DROP TABLE IF EXISTS `mfg_customer`;
CREATE TABLE `mfg_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) NOT NULL DEFAULT '',
  `user_id` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_customer`
--

/*!40000 ALTER TABLE `mfg_customer` DISABLE KEYS */;
INSERT INTO `mfg_customer` (`id`,`name`,`address`,`user_id`) VALUES 
 (1,'Abdullah Enterprise','Rangpur','1'),
 (2,'Shakil','Narangong','2'),
 (3,'Ohid','Chittangong','3'),
 (4,'Rana','Chittangong','1');
/*!40000 ALTER TABLE `mfg_customer` ENABLE KEYS */;


--
-- Definition of table `mfg_factory`
--

DROP TABLE IF EXISTS `mfg_factory`;
CREATE TABLE `mfg_factory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_factory`
--

/*!40000 ALTER TABLE `mfg_factory` DISABLE KEYS */;
INSERT INTO `mfg_factory` (`id`,`name`,`address`,`user_id`) VALUES 
 (1,'Dhaka Feed Mill','Gazipur',1),
 (2,'Rangpur Feed mill','Rangpur',2),
 (3,'Mayminsing Feed Mill','Maymensing',3),
 (4,'Chittangong Feed Mill','Chittangong',1);
/*!40000 ALTER TABLE `mfg_factory` ENABLE KEYS */;


--
-- Definition of table `mfg_invoice`
--

DROP TABLE IF EXISTS `mfg_invoice`;
CREATE TABLE `mfg_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer` varchar(45) NOT NULL,
  `shipping_address` text NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_invoice`
--

/*!40000 ALTER TABLE `mfg_invoice` DISABLE KEYS */;
INSERT INTO `mfg_invoice` (`id`,`customer`,`shipping_address`,`invoice_date`) VALUES 
 (1,'Md. Shafiqul Islam','Tangail','2018-07-18 00:00:00'),
 (2,'Md. Foisal Hossain','Narangong','2018-10-04 00:00:00');
/*!40000 ALTER TABLE `mfg_invoice` ENABLE KEYS */;


--
-- Definition of table `mfg_invoice_details`
--

DROP TABLE IF EXISTS `mfg_invoice_details`;
CREATE TABLE `mfg_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_type_id` int(10) unsigned NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `uom_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_invoice_details`
--

/*!40000 ALTER TABLE `mfg_invoice_details` DISABLE KEYS */;
INSERT INTO `mfg_invoice_details` (`id`,`invoice_id`,`product_type_id`,`qty`,`price`,`uom_id`) VALUES 
 (1,1,1,1,50,'1'),
 (2,2,1,1,60,'1');
/*!40000 ALTER TABLE `mfg_invoice_details` ENABLE KEYS */;


--
-- Definition of table `mfg_product`
--

DROP TABLE IF EXISTS `mfg_product`;
CREATE TABLE `mfg_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `product_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uom_id` int(10) unsigned NOT NULL DEFAULT '0',
  `manufacturer` varchar(45) DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `description` text,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_product`
--

/*!40000 ALTER TABLE `mfg_product` DISABLE KEYS */;
INSERT INTO `mfg_product` (`id`,`name`,`product_type_id`,`uom_id`,`manufacturer`,`photo`,`description`,`price`) VALUES 
 (1,'corn',1,1,'Layer','1.jfif','made of corn',50),
 (2,'wheat',1,1,'Boiler','2.jfif','made of wheat',60),
 (3,'cereals ',1,1,'Boiler','cere.jpg','It is full of Nutrion',60),
 (4,'soybean ',1,1,'Boiler','images (1).jfif','its also health ',90),
 (5,'fishmeal',1,1,'Boiler','JFM_Fish_Meal1.jpg','its also health too',100),
 (6,'limestone',1,1,'Boiler','limestone, .jfif','it also made of limestone, .jfif',20),
 (7,'salt',1,1,'Boiler','salt.jpg','it is natural available',15),
 (8,'bones ',1,1,'Boiler','bone meal.jpg','it also died bones ',0),
 (9,'Maize',1,1,'Boiler','download (3).jfif','This is good corp',0);
/*!40000 ALTER TABLE `mfg_product` ENABLE KEYS */;


--
-- Definition of table `mfg_product_type`
--

DROP TABLE IF EXISTS `mfg_product_type`;
CREATE TABLE `mfg_product_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_product_type`
--

/*!40000 ALTER TABLE `mfg_product_type` DISABLE KEYS */;
INSERT INTO `mfg_product_type` (`id`,`name`) VALUES 
 (1,'Raw Material'),
 (2,'Manufacture Product');
/*!40000 ALTER TABLE `mfg_product_type` ENABLE KEYS */;


--
-- Definition of table `mfg_purchase_invoice`
--

DROP TABLE IF EXISTS `mfg_purchase_invoice`;
CREATE TABLE `mfg_purchase_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned DEFAULT '0',
  `reference_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_purchase_invoice`
--

/*!40000 ALTER TABLE `mfg_purchase_invoice` DISABLE KEYS */;
INSERT INTO `mfg_purchase_invoice` (`id`,`supplier_id`,`date`,`user_id`,`reference_id`) VALUES 
 (1,1,'2018-07-20 00:00:00',1,1),
 (2,2,'2018-04-14 00:00:00',2,2),
 (13,3,'2018-10-16 00:00:00',2,1);
/*!40000 ALTER TABLE `mfg_purchase_invoice` ENABLE KEYS */;


--
-- Definition of table `mfg_purchase_invoice_details`
--

DROP TABLE IF EXISTS `mfg_purchase_invoice_details`;
CREATE TABLE `mfg_purchase_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `qty` varchar(45) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_purchase_invoice_details`
--

/*!40000 ALTER TABLE `mfg_purchase_invoice_details` DISABLE KEYS */;
INSERT INTO `mfg_purchase_invoice_details` (`id`,`invoice_id`,`product_id`,`uom_id`,`qty`,`price`) VALUES 
 (1,1,1,1,'1',50),
 (2,2,2,1,'1',60);
/*!40000 ALTER TABLE `mfg_purchase_invoice_details` ENABLE KEYS */;


--
-- Definition of table `mfg_role`
--

DROP TABLE IF EXISTS `mfg_role`;
CREATE TABLE `mfg_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_role`
--

/*!40000 ALTER TABLE `mfg_role` DISABLE KEYS */;
INSERT INTO `mfg_role` (`id`,`name`) VALUES 
 (1,'GM'),
 (2,'PM'),
 (3,'MD');
/*!40000 ALTER TABLE `mfg_role` ENABLE KEYS */;


--
-- Definition of table `mfg_sales_invoice`
--

DROP TABLE IF EXISTS `mfg_sales_invoice`;
CREATE TABLE `mfg_sales_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_address` varchar(45) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_sales_invoice`
--

/*!40000 ALTER TABLE `mfg_sales_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `mfg_sales_invoice` ENABLE KEYS */;


--
-- Definition of table `mfg_sales_invoice_details`
--

DROP TABLE IF EXISTS `mfg_sales_invoice_details`;
CREATE TABLE `mfg_sales_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` int(10) unsigned NOT NULL DEFAULT '0',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uom` double NOT NULL DEFAULT '0',
  `qty` varchar(45) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `price` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_sales_invoice_details`
--

/*!40000 ALTER TABLE `mfg_sales_invoice_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `mfg_sales_invoice_details` ENABLE KEYS */;


--
-- Definition of table `mfg_supplier`
--

DROP TABLE IF EXISTS `mfg_supplier`;
CREATE TABLE `mfg_supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `Address` text NOT NULL,
  `phone` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_supplier`
--

/*!40000 ALTER TABLE `mfg_supplier` DISABLE KEYS */;
INSERT INTO `mfg_supplier` (`id`,`name`,`Address`,`phone`) VALUES 
 (1,'Hasan','Barisal',1596547),
 (2,'lemon','Patuakhaki',1326554),
 (3,'Kamal','Safipur',9687452),
 (4,'Asraful','Sylet',123654);
/*!40000 ALTER TABLE `mfg_supplier` ENABLE KEYS */;


--
-- Definition of table `mfg_uom`
--

DROP TABLE IF EXISTS `mfg_uom`;
CREATE TABLE `mfg_uom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_uom`
--

/*!40000 ALTER TABLE `mfg_uom` DISABLE KEYS */;
INSERT INTO `mfg_uom` (`id`,`name`) VALUES 
 (1,'KG'),
 (2,'Liter'),
 (3,'Gram'),
 (4,'Piece');
/*!40000 ALTER TABLE `mfg_uom` ENABLE KEYS */;


--
-- Definition of table `mfg_user`
--

DROP TABLE IF EXISTS `mfg_user`;
CREATE TABLE `mfg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mfg_user`
--

/*!40000 ALTER TABLE `mfg_user` DISABLE KEYS */;
INSERT INTO `mfg_user` (`id`,`name`,`password`,`role_id`,`date`) VALUES 
 (1,'admin','1234',1,'0000-00-00 00:00:00'),
 (2,'atik','1234',2,'0000-00-00 00:00:00'),
 (3,'lubaba','1234',3,'0000-00-00 00:00:00'),
 (4,'Ali','1234',2,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `mfg_user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
