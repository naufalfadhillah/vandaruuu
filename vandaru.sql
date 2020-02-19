/*
SQLyog Community v12.0 (64 bit)
MySQL - 10.1.16-MariaDB : Database - vandaruuu
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/* CREATE DATABASE /*!32312 IF NOT EXISTS*//* vandaruuu */ /*!40100 DEFAULT CHARACTER SET latin1 */; */

-- USE `vandaruuu`;

/*Table structure for table `booking` */

DROP TABLE IF EXISTS `booking`;

CREATE TABLE `booking` (
  `booking_id` int(20) NOT NULL AUTO_INCREMENT,
  `booking_id_pelanggan` int(20) NOT NULL,
  `booking_id_kamar` int(20) NOT NULL,
  `booking_durasi` int(11) NOT NULL,
  `booking_tgl_pesan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_tgl_check_in` datetime NOT NULL,
  `booking_status` enum('Menunggu Pembayaran','Sudah dibayar','Dibatalkan') NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `id_pelanggan` (`booking_id_pelanggan`),
  KEY `id_kamar` (`booking_id_kamar`),
  CONSTRAINT `booking_kamar` FOREIGN KEY (`booking_id_kamar`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_pelanggan` FOREIGN KEY (`booking_id_pelanggan`) REFERENCES `pelanggan` (`pelanggan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `booking` */

/*Table structure for table `content` */

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `content_id` int(20) NOT NULL AUTO_INCREMENT,
  `content_judul` varchar(100) NOT NULL,
  `content_isi` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`content_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `content` */

insert  into `content`(`content_id`,`content_judul`,`content_isi`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`,`file`) values (1,'test berita','<p>berita ini merupakan test</p>\r\n','admin','2020-02-11','admin','2020-02-17','Aktif','berita/_1581356727.png');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_id_booking` int(20) NOT NULL,
  `feedback_isi` text NOT NULL,
  `feedback_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`),
  KEY `id_booking` (`feedback_id_booking`),
  CONSTRAINT `feedback_booking` FOREIGN KEY (`feedback_id_booking`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `foto_galeri` */

DROP TABLE IF EXISTS `foto_galeri`;

CREATE TABLE `foto_galeri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_galeri` int(11) NOT NULL,
  `nama_foto` varchar(100) NOT NULL,
  `Keterangan_foto` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_galeri` (`id_galeri`),
  CONSTRAINT `foto_galeri_ibfk_1` FOREIGN KEY (`id_galeri`) REFERENCES `galeri` (`galeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `foto_galeri` */

insert  into `foto_galeri`(`id`,`id_galeri`,`nama_foto`,`Keterangan_foto`,`file`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`) values (3,4,'flig_1581349307.jpg','','/foto_galeri/flig_1581349307.jpg','admin','2020-02-10','','0000-00-00','Aktif'),(4,4,'fligt_1581349307.png','','/foto_galeri/fligt_1581349307.png','admin','2020-02-10','','0000-00-00','Aktif'),(5,3,'f_1581425046.jpg','','/foto_galeri/f_1581425046.jpg','admin','2020-02-11','','0000-00-00','Aktif'),(6,4,'tiket_1581443870.png','','/foto_galeri/tiket_1581443870.png','admin','2020-02-12','','0000-00-00','Aktif'),(7,4,'txi_1581443870.png','','/foto_galeri/txi_1581443870.png','admin','2020-02-12','','0000-00-00','Aktif'),(8,3,'txi_1581443870.png','','/foto_galeri/txi_1581443870.png','admin','2020-02-12','','0000-00-00','Aktif');

/*Table structure for table `foto_kamar` */

DROP TABLE IF EXISTS `foto_kamar`;

CREATE TABLE `foto_kamar` (
  `foto_id_foto` int(20) NOT NULL AUTO_INCREMENT,
  `foto_id_kamar` int(20) NOT NULL,
  `foto_kamar` text,
  `file` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`foto_id_foto`),
  KEY `foto_kamar_id` (`foto_id_kamar`),
  CONSTRAINT `foto_kamar_id` FOREIGN KEY (`foto_id_kamar`) REFERENCES `kamar` (`kamar_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `foto_kamar` */

insert  into `foto_kamar`(`foto_id_foto`,`foto_id_kamar`,`foto_kamar`,`file`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`) values (2,3,'flig_1581440895.jpg','/foto_kamar/flig_1581440895.jpg','admin','2020-02-12',NULL,NULL,'Aktif'),(3,3,'fligt_1581440895.png','/foto_kamar/fligt_1581440895.png','admin','2020-02-12',NULL,NULL,'Aktif'),(4,3,'hotels_1581440895.png','/foto_kamar/hotels_1581440895.png','admin','2020-02-12',NULL,NULL,'Aktif'),(5,3,'images_1581440895.png','/foto_kamar/images_1581440895.png','admin','2020-02-12',NULL,NULL,'Aktif');

/*Table structure for table `galeri` */

DROP TABLE IF EXISTS `galeri`;

CREATE TABLE `galeri` (
  `galeri_id` int(11) NOT NULL AUTO_INCREMENT,
  `galeri_nama` varchar(100) DEFAULT NULL,
  `galeri_keterangan` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`galeri_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `galeri` */

insert  into `galeri`(`galeri_id`,`galeri_nama`,`galeri_keterangan`,`created_by`,`created_date`,`updated_by`,`updated_date`,`status`) values (3,'123','<p>123123</p>\r\n','admin','2020-02-09','admin','2020-02-09','Aktif'),(4,'pesawat','<p>ini icon pesawat..</p>\r\n','admin','2020-02-10','admin','2020-02-10','Aktif');

/*Table structure for table `kamar` */

DROP TABLE IF EXISTS `kamar`;

CREATE TABLE `kamar` (
  `kamar_id` int(20) NOT NULL AUTO_INCREMENT,
  `kamar_nama` varchar(30) NOT NULL,
  `kamar_type` varchar(30) NOT NULL,
  `kamar_harga` int(11) DEFAULT NULL,
  `kamar_deskripsi` text,
  `kamar_foto` text,
  `created_by` varchar(100) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `kamar_status` enum('Tersedia','Dibooking','Tidak Tersedia') NOT NULL,
  PRIMARY KEY (`kamar_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `kamar` */

insert  into `kamar`(`kamar_id`,`kamar_nama`,`kamar_type`,`kamar_harga`,`kamar_deskripsi`,`kamar_foto`,`created_by`,`created_date`,`updated_by`,`updated_date`,`kamar_status`) values (3,'Melati room','President Suite',1000000,'<p>Kamar Besar......</p>\r\n','/foto_galeri/flig_1581349307.jpg','admin','2020-02-12','',NULL,'Tersedia'),(4,'Mawar room','President Suite',1000000,'<p>Kamar Besar......</p>\r\n','/foto_galeri/flig_1581349307.jpg','admin','2020-02-12','',NULL,'Tersedia'),(5,'Tulip room','President Suite',1000000,'<p>Kamar Besar......</p>\r\n','/foto_galeri/flig_1581349307.jpg','admin','2020-02-12','',NULL,'Tersedia');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1576342558),('m130524_201442_init',1576342569);

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(20) NOT NULL AUTO_INCREMENT,
  `pelanggan_nama` varchar(50) NOT NULL,
  `pelanggan_jk` enum('Pria','Wanita') NOT NULL,
  `pelanggan_alamat` text NOT NULL,
  `pelanggan_tgl_lahir` date NOT NULL,
  `pelanggan_no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`pelanggan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pelanggan` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `pembayaran_id` int(20) NOT NULL AUTO_INCREMENT,
  `pembayaran_id_booking` int(20) NOT NULL,
  `pembayaran_jumlah` int(11) NOT NULL,
  `pembayaran_tgl_bayar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pembayaran_resi` text NOT NULL,
  `status` enum('Belum','Sudah') NOT NULL,
  PRIMARY KEY (`pembayaran_id`),
  KEY `id_booking1` (`pembayaran_id_booking`),
  CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`pembayaran_id_booking`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `pembayaran` */

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL AUTO_INCREMENT,
  `setting_nama` varchar(100) DEFAULT NULL,
  `setting_alamat` varchar(200) DEFAULT NULL,
  `setting_email` varchar(100) DEFAULT NULL,
  `setting_phone` varchar(100) DEFAULT NULL,
  `setting_fax` varchar(100) DEFAULT NULL,
  `setting_facebook` varchar(100) DEFAULT NULL,
  `setting_instagram` varchar(100) DEFAULT NULL,
  `setting_whatsapp` varchar(100) DEFAULT NULL,
  `latitudeP` text,
  `longitudeP` text,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`id_setting`,`setting_nama`,`setting_alamat`,`setting_email`,`setting_phone`,`setting_fax`,`setting_facebook`,`setting_instagram`,`setting_whatsapp`,`latitudeP`,`longitudeP`) values (1,'Vandaru','Jl. Pekanbaru','vandaru@gmail.com','085421242','0762421251','http://facebook.com','http://instagram.com','http://whatsapp','0.5237665979874837','101.46408318848262');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `hp` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`first_name`,`last_name`,`gender`,`hp`,`role`,`created_at`,`updated_at`) values (1,'admin','1vgtNGG-aciL7ZjWi7whQ1wS8HTFgEh1','$2y$13$0IWsvq8XDXNNj0PxsrBEG.ZXrdEElq8OKJikpo3A4tWaOZD/9AHRq',NULL,'admin@vandaru.com',10,'','','','','1',1576342894,1576342894),(8,'naufal','swM7dkAWqt6Ki-K5_fu-_0JFGr2d5kEE','1234567890','gOr0JIyYaqAY13Ogb0kGRYGKZ1PY2d7e_1577779599','asd@as.com',10,'naufal','fadhillah','M','081234214','2',1577779599,1577889853),(9,'siddiq','lHkK_R-IJc73nzeoVe98QfSUEUwaweja','$2y$13$f52ojwWlOpYjzX/nt4DC9eEUA09xHCM8LS0R2vKHUSshkKJlWxXb2','AW5ZUZoJLvQF5A4O1tHyi_GJOqHOcbYy_1577804883','azharsiddiq@example.com',10,'azhar','siddiq','M','081294202010','2',1577804883,1577804883),(10,'fahri','hQS7j086nP2amB9uLPPUTn2xFSu85_5x','$2y$13$TStAXtcDGkyGAV7Wa5lQpO3DXB6CxoU2Xs0QpMmLPfKYU6usJ/1fW','uAcPKZI-5avpWp2bA8H1wkh2SjiYuTCQ_1578451150','fahri@gmail.com',10,'fahri','fahri','M','085453434','2',1578451150,1578451150);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
