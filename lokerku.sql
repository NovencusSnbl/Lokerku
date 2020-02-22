/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.38-MariaDB : Database - lokerku
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`lokerku` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `lokerku`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `ciri` varchar(45) DEFAULT NULL,
  `idloker` int(11) NOT NULL,
  `gambar` varchar(225) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `waktuS` datetime DEFAULT NULL,
  `waktuA` datetime DEFAULT NULL,
  PRIMARY KEY (`idbarang`),
  KEY `FK_barang` (`idloker`),
  CONSTRAINT `FK_barang` FOREIGN KEY (`idloker`) REFERENCES `loker` (`idloker`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `barang` */

insert  into `barang`(`idbarang`,`nama`,`ciri`,`idloker`,`gambar`,`status`,`waktuS`,`waktuA`) values (30,'sepatu','Sendal/Sepatu',11318060,'5cfa756b3a8a8.jfif',1,'2019-06-07 21:32:11','2019-06-08 12:20:37'),(31,'tas','Peralatan Belajar',11318046,'5cfa789348266.jfif',1,'2019-06-07 21:45:39','2019-06-10 08:38:34'),(33,'sepatu futsal','Sendal/Sepatu',11318059,'5cfb4b5b86979.jfif',0,'2019-06-08 12:44:59','0000-00-00 00:00:00'),(34,'Laptop Lenovo','Peralatan Elektronik',11318060,'5cfd1078f29cc.jfif',1,'2019-06-09 20:58:17','2019-06-10 08:43:15'),(35,'Laptop Lenovo','Peralatan Elektronik',11318046,'5cfdb4bd428eb.jfif',1,'2019-06-10 08:39:09','2019-06-10 09:26:17'),(36,'sepatu','Sendal/Sepatu',11318067,'5cfdc19c34835.jfif',0,'2019-06-10 09:34:04','0000-00-00 00:00:00'),(37,'tas','Peralatan Belajar',11318060,'5cfe4c666c542.jfif',1,'2019-06-10 19:26:14','2019-06-13 20:08:50');

/*Table structure for table `keasramaan` */

DROP TABLE IF EXISTS `keasramaan`;

CREATE TABLE `keasramaan` (
  `idkeasramaan` int(11) NOT NULL AUTO_INCREMENT,
  `usernameK` varchar(45) NOT NULL,
  `passwordK` varchar(225) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idkeasramaan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `keasramaan` */

insert  into `keasramaan`(`idkeasramaan`,`usernameK`,`passwordK`,`nama`,`email`) values (1,'123','$2y$10$cfSfsznV0nvnbs4ttxmsIuk6dMeC3fm32IDPfuUgC4CcWH3vG48ce','admin 1','novencussinambela00@gmail.com');

/*Table structure for table `loker` */

DROP TABLE IF EXISTS `loker`;

CREATE TABLE `loker` (
  `no_loker` int(11) NOT NULL,
  `idloker` int(11) NOT NULL AUTO_INCREMENT,
  `idmhs` int(11) NOT NULL,
  `pin` varchar(255) NOT NULL,
  PRIMARY KEY (`idloker`),
  KEY `FK_loker` (`idmhs`),
  CONSTRAINT `FK_loker` FOREIGN KEY (`idloker`) REFERENCES `mahasiswa` (`idmhs`)
) ENGINE=InnoDB AUTO_INCREMENT=11318068 DEFAULT CHARSET=latin1;

/*Data for the table `loker` */

insert  into `loker`(`no_loker`,`idloker`,`idmhs`,`pin`) values (1,11318046,11318046,'$2y$10$7uZVxyr3pv0lo8OLc4U90uxpDwVijpcGVFVR3mvOUNjK2srdbKeJu'),(2,11318059,11318059,'$2y$10$BAnUJW7RrOEWIkiaZlfcMeQv58VxqFwx0K9M0jRQC6KMNShDV1DsC'),(3,11318060,11318060,'$2y$10$musVifhwNfVCmI7Zqgf41.yG0BwZZF3VGmIEPRB8Zh5pK0vig7yjC'),(5,11318067,11318067,'$2y$10$bChpAaHGkN2r7RfIHQyUsOw6XBwt7EVwBA..SYHXAPujbRYRoMThO');

/*Table structure for table `mahasiswa` */

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `idmhs` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `prodi` varchar(25) NOT NULL,
  PRIMARY KEY (`idmhs`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mahasiswa` */

insert  into `mahasiswa`(`idmhs`,`nama`,`prodi`) values (11318046,'Novencus','D3 Teknik Informatika'),(11318059,'Yose','D3 Teknik Informatika'),(11318060,'rachel','D3 Teknik Informatika'),(11318067,'Josua','D3 Teknik Informatika');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name`,`user_pass`,`user_email`,`user_profile`,`forgotten_answer`,`log_in`) values (1,'jos','12345678','jos@gmail.com','image/josua1.jpg','','Online'),(2,'cus','123456789','cus@gmail.com','image/josua1.png','','Online'),(3,'jane','1234567890','jane@gmail.com','image/user.png','','Online');

/*Table structure for table `users_chat` */

DROP TABLE IF EXISTS `users_chat`;

CREATE TABLE `users_chat` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

/*Data for the table `users_chat` */

insert  into `users_chat`(`msg_id`,`sender_username`,`receiver_username`,`msg_content`,`msg_status`,`msg_date`) values (71,'jane','cus','cusssss','read','2019-06-10 09:39:47'),(72,'cus','jane','apa?','read','2019-06-10 09:40:54'),(73,'cus','jane','apa?','read','2019-06-10 09:41:25'),(74,'cus','jos','bg jos','read','2019-06-13 20:06:42'),(75,'jos','cus','apa cus?','unread','2019-06-13 20:07:17'),(76,'jos','jane','oii jane','read','2019-06-13 20:07:25'),(77,'jane','jos','apa bg jos?','unread','2019-06-13 20:08:05');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
