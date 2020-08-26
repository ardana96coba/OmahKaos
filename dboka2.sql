/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.4.11-MariaDB : Database - dboka
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dboka` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dboka`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(30) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_level` varchar(30) DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin` */

insert  into `admin`(`admin_id`,`admin_username`,`admin_password`,`admin_level`,`admin_nama`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin');

/*Table structure for table `baju` */

DROP TABLE IF EXISTS `baju`;

CREATE TABLE `baju` (
  `baju_id` varchar(50) NOT NULL,
  `motif_id` int(5) DEFAULT NULL,
  `warna_id` int(5) DEFAULT NULL,
  `baju_photo` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  `baju_genre` enum('L','P') DEFAULT NULL,
  `baju_jenis` varchar(10) DEFAULT NULL,
  `baju_harga` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`baju_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `baju` */

insert  into `baju`(`baju_id`,`motif_id`,`warna_id`,`baju_photo`,`admin_nama`,`baju_genre`,`baju_jenis`,`baju_harga`) values 
('1',3,1,'kosong.jpg','admin','P','ANAK',23000.00),
('B0002',4,3,'baju-09082020121521.jpg','admin','L','ANAK',NULL),
('B0003',4,1,'baju-20082020061333.jpg','admin','L','ANAK',NULL),
('B0004',3,1,'baju-20082020041936.jpg','admin','L','GAMIS',NULL),
('B0005',3,1,'baju-20082020045230.jpg','admin','P','GAMIS',NULL),
('B0006',5,2,'baju-20082020061849.jpeg','admin','L','ANAK',NULL),
('B0007',3,1,'baju-21082020084251.jpg','admin','L','GAMIS',40000.00);

/*Table structure for table `keluar` */

DROP TABLE IF EXISTS `keluar`;

CREATE TABLE `keluar` (
  `keluar_id` int(5) NOT NULL AUTO_INCREMENT,
  `baju_id` varchar(10) DEFAULT NULL,
  `size_id` int(5) DEFAULT NULL,
  `keluar_jumlah` double(10,2) DEFAULT NULL,
  `keluar_tanggal` date DEFAULT NULL,
  `keluar_tanggal_edit` date DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`keluar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `keluar` */

insert  into `keluar`(`keluar_id`,`baju_id`,`size_id`,`keluar_jumlah`,`keluar_tanggal`,`keluar_tanggal_edit`,`admin_nama`) values 
(1,'1',5,1.00,'2020-08-25','0000-00-00','admin');

/*Table structure for table `masuk` */

DROP TABLE IF EXISTS `masuk`;

CREATE TABLE `masuk` (
  `masuk_id` int(5) NOT NULL AUTO_INCREMENT,
  `baju_id` varchar(10) DEFAULT NULL,
  `size_id` int(5) DEFAULT NULL,
  `masuk_jumlah` double(10,2) DEFAULT NULL,
  `masuk_tanggal` date DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  `masuk_tanggal_edit` date DEFAULT NULL,
  PRIMARY KEY (`masuk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `masuk` */

insert  into `masuk`(`masuk_id`,`baju_id`,`size_id`,`masuk_jumlah`,`masuk_tanggal`,`admin_nama`,`masuk_tanggal_edit`) values 
(5,'B0001',3,1.00,'2020-08-24','admin','0000-00-00'),
(6,'B0002',5,1.00,'2020-08-24','admin','0000-00-00'),
(8,'B0006',5,11.00,'2020-08-24','admin','2020-08-25'),
(9,'B0007',5,1.00,'2020-08-25','admin','2020-08-25'),
(10,'B0003',5,5.00,'2020-08-25','admin','0000-00-00');

/*Table structure for table `motif` */

DROP TABLE IF EXISTS `motif`;

CREATE TABLE `motif` (
  `motif_id` int(5) NOT NULL AUTO_INCREMENT,
  `motif_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`motif_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `motif` */

insert  into `motif`(`motif_id`,`motif_nama`) values 
(3,'MACAN'),
(4,'CARS'),
(5,'MOBIL');

/*Table structure for table `pending` */

DROP TABLE IF EXISTS `pending`;

CREATE TABLE `pending` (
  `pending_id` int(5) NOT NULL AUTO_INCREMENT,
  `baju_id` int(5) DEFAULT NULL,
  `jumlah` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`pending_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pending` */

/*Table structure for table `size` */

DROP TABLE IF EXISTS `size`;

CREATE TABLE `size` (
  `size_id` int(5) NOT NULL AUTO_INCREMENT,
  `size_nama` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `size` */

insert  into `size`(`size_id`,`size_nama`) values 
(1,'1'),
(2,'2'),
(3,'3'),
(4,'4'),
(5,'5'),
(6,'6'),
(7,'7'),
(8,'8'),
(9,'9'),
(10,'10'),
(11,'S'),
(12,'M'),
(13,'L'),
(14,'XL');

/*Table structure for table `warna` */

DROP TABLE IF EXISTS `warna`;

CREATE TABLE `warna` (
  `warna_id` int(5) NOT NULL AUTO_INCREMENT,
  `warna_nama` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`warna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `warna` */

insert  into `warna`(`warna_id`,`warna_nama`) values 
(1,'MERAH'),
(2,'BIRU'),
(3,'JINGGA');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
