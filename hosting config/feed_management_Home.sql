-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.34-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- 

--
-- Definition of table `contact_book`
--

DROP TABLE IF EXISTS `contact_book`;
CREATE TABLE `contact_book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_book`
--

/*!40000 ALTER TABLE `contact_book` DISABLE KEYS */;
INSERT INTO `contact_book` (`id`,`user_id`,`name`,`phone`,`email`,`address`,`added_on`) VALUES 
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
 (15,2,'sdfgsf','sdfgsfg','','','2018-10-16 09:52:39');
/*!40000 ALTER TABLE `contact_book` ENABLE KEYS */;


--
-- Definition of table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) NOT NULL DEFAULT '',
  `user_id` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` (`id`,`name`,`address`,`user_id`) VALUES 
 (1,'Abdullah Enterprise','Rangpur','1'),
 (2,'Shakil','Narangong','2'),
 (3,'Ohid','Chittangong','3'),
 (4,'Rana','Chittangong','1');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;


--
-- Definition of table `factory`
--

DROP TABLE IF EXISTS `factory`;
CREATE TABLE `factory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `address` varchar(45) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory`
--

/*!40000 ALTER TABLE `factory` DISABLE KEYS */;
INSERT INTO `factory` (`id`,`name`,`address`,`user_id`) VALUES 
 (1,'Dhaka Feed Mill','Gazipur',1),
 (2,'Rangpur Feed mill','Rangpur',2),
 (3,'Mayminsing Feed Mill','Maymensing',3),
 (4,'Chittangong Feed Mill','Chittangong',1);
/*!40000 ALTER TABLE `factory` ENABLE KEYS */;


--
-- Definition of table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE `invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer` varchar(45) NOT NULL,
  `shipping_address` text NOT NULL,
  `invoice_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`,`customer`,`shipping_address`,`invoice_date`) VALUES 
 (1,'Md. Shafiqul Islam','Tangail','2018-07-18 00:00:00'),
 (2,'Md. Foisal Hossain','Narangong','2018-10-04 00:00:00');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;


--
-- Definition of table `invoice_details`
--

DROP TABLE IF EXISTS `invoice_details`;
CREATE TABLE `invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_type_id` int(10) unsigned NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `uom_id` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

/*!40000 ALTER TABLE `invoice_details` DISABLE KEYS */;
INSERT INTO `invoice_details` (`id`,`invoice_id`,`product_type_id`,`qty`,`price`,`uom_id`) VALUES 
 (1,1,1,1,50,'1'),
 (2,2,1,1,60,'');
/*!40000 ALTER TABLE `invoice_details` ENABLE KEYS */;


--
-- Definition of table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `product_type_id` int(10) unsigned NOT NULL DEFAULT '0',
  `uom_id` int(10) unsigned NOT NULL DEFAULT '0',
  `manufacturer` varchar(45) DEFAULT NULL,
  `photo` varchar(345) DEFAULT NULL,
  `description` text,
  `price` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`,`name`,`product_type_id`,`uom_id`,`manufacturer`,`photo`,`description`,`price`) VALUES 
 (1,'corn',1,1,'Layer','1.jfif','made of corn',50),
 (2,'wheat',1,1,'Boiler','2.jfif','made of wheat',60),
 (3,'cereals ',1,1,'Boiler','cere.jpg','It is full of Nutrion',60),
 (4,'soybean ',1,1,'Boiler','images (1).jfif','its also health ',90),
 (5,'fishmeal',1,1,'Boiler','JFM_Fish_Meal1.jpg','its also health too',100),
 (6,'limestone',1,1,'Boiler','limestone, .jfif','it also made of limestone, .jfif',20),
 (7,'salt',1,1,'Boiler','salt.jpg','it is natural available',15),
 (8,'bones ',1,1,'Boiler','bone meal.jpg','it also died bones ',0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


--
-- Definition of table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` (`id`,`name`) VALUES 
 (1,'Raw Material'),
 (2,'Manufacture Product');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice`
--

DROP TABLE IF EXISTS `purchase_invoice`;
CREATE TABLE `purchase_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_id` int(10) unsigned DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_id` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_invoice`
--

/*!40000 ALTER TABLE `purchase_invoice` DISABLE KEYS */;
INSERT INTO `purchase_invoice` (`id`,`supplier_id`,`date`,`user_id`) VALUES 
 (1,1,'0000-00-00 00:00:00',1),
 (2,2,'0000-00-00 00:00:00',2),
 (3,3,'0000-00-00 00:00:00',3),
 (4,4,'0000-00-00 00:00:00',4),
 (5,1,'0000-00-00 00:00:00',5),
 (6,2,'0000-00-00 00:00:00',2),
 (7,3,'0000-00-00 00:00:00',3),
 (8,3,'0000-00-00 00:00:00',0),
 (9,3,'0000-00-00 00:00:00',0),
 (10,2,'0000-00-00 00:00:00',0),
 (11,2,'0000-00-00 00:00:00',0),
 (12,4,'2014-01-16 00:00:00',2);
/*!40000 ALTER TABLE `purchase_invoice` ENABLE KEYS */;


--
-- Definition of table `purchase_invoice_details`
--

DROP TABLE IF EXISTS `purchase_invoice_details`;
CREATE TABLE `purchase_invoice_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `uom_id` int(10) unsigned NOT NULL,
  `qty` varchar(45) NOT NULL,
  `price` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_invoice_details`
--

/*!40000 ALTER TABLE `purchase_invoice_details` DISABLE KEYS */;
INSERT INTO `purchase_invoice_details` (`id`,`invoice_id`,`product_id`,`uom_id`,`qty`,`price`) VALUES 
 (1,1,1,1,'1',50),
 (2,2,2,1,'1',60);
/*!40000 ALTER TABLE `purchase_invoice_details` ENABLE KEYS */;


--
-- Definition of table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`,`name`) VALUES 
 (1,'GM'),
 (2,'PM'),
 (3,'MD');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


--
-- Definition of table `sales_invoice`
--

DROP TABLE IF EXISTS `sales_invoice`;
CREATE TABLE `sales_invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_address` varchar(45) NOT NULL DEFAULT '',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_invoice`
--

/*!40000 ALTER TABLE `sales_invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_invoice` ENABLE KEYS */;


--
-- Definition of table `sales_invoice_details`
--

DROP TABLE IF EXISTS `sales_invoice_details`;
CREATE TABLE `sales_invoice_details` (
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
-- Dumping data for table `sales_invoice_details`
--

/*!40000 ALTER TABLE `sales_invoice_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `sales_invoice_details` ENABLE KEYS */;


--
-- Definition of table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `Address` text NOT NULL,
  `phone` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`,`name`,`Address`,`phone`) VALUES 
 (1,'Hasan','Barisal',1596547),
 (2,'lemon','Patuakhaki',1326554),
 (3,'Kamal','Safipur',9687452),
 (4,'Asraful','Sylet',123654);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;


--
-- Definition of table `uom`
--

DROP TABLE IF EXISTS `uom`;
CREATE TABLE `uom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uom`
--

/*!40000 ALTER TABLE `uom` DISABLE KEYS */;
INSERT INTO `uom` (`id`,`name`) VALUES 
 (1,'KG'),
 (2,'Liter'),
 (3,'Gram'),
 (4,'Piece');
/*!40000 ALTER TABLE `uom` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `password` varchar(45) NOT NULL DEFAULT '',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`,`name`,`password`,`role_id`,`date`) VALUES 
 (1,'admin','1234',1,'0000-00-00 00:00:00'),
 (2,'atik','1234',2,'0000-00-00 00:00:00'),
 (3,'lubaba','1234',3,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
