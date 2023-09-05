/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.24-MariaDB : Database - dbarsip-siswa
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbarsip-siswa` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbarsip-siswa`;

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `kelas_id` char(10) NOT NULL,
  `kelas_nama` varchar(30) DEFAULT NULL,
  `kelas_wali` varchar(30) DEFAULT NULL,
  `kelas_grupwa` varchar(100) DEFAULT NULL,
  `kelas_status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  PRIMARY KEY (`kelas_id`),
  UNIQUE KEY `namakelas` (`kelas_nama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `kelas` */

insert  into `kelas`(`kelas_id`,`kelas_nama`,`kelas_wali`,`kelas_grupwa`,`kelas_status`) values 
('KL-001','Kelas 7A','Maryanti','chat.whatsapp.com/HdCf','Aktif'),
('KL-002','Arsip Kelas 7B   2022 ','Y. Titi Purwaningsih, S.Pd','chat.whatsapp.com/HdCf','Tidak Aktif');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `siswa_id` varchar(8) NOT NULL,
  `siswa_nis` char(20) DEFAULT NULL,
  `siswa_pass` varchar(50) DEFAULT NULL,
  `siswa_nama` varchar(50) DEFAULT NULL,
  `siswa_alamat` varchar(100) DEFAULT NULL,
  `siswa_nomorhp` varchar(15) DEFAULT NULL,
  `siswa_tempatlahir` varchar(15) DEFAULT NULL,
  `siswa_tgllahir` date DEFAULT NULL,
  `siswa_jenkel` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `siswa_kelas` char(10) DEFAULT 'A',
  `siswa_foto` varchar(255) DEFAULT NULL,
  `siswa_kk` varchar(255) DEFAULT NULL,
  `siswa_akta` varchar(255) DEFAULT NULL,
  `siswa_ktpayah` varchar(255) DEFAULT NULL,
  `siswa_ktpibu` varchar(255) DEFAULT NULL,
  `siswa_kips` varchar(255) DEFAULT NULL,
  `siswa_sktm` varchar(255) DEFAULT NULL,
  `siswa_ijazah` varchar(255) DEFAULT NULL,
  `siswa_skhun` varchar(255) DEFAULT NULL,
  `siswa_status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') DEFAULT 'Belum Ada Berkas',
  `siswa_tahunkeluar` year(4) DEFAULT NULL,
  PRIMARY KEY (`siswa_id`),
  UNIQUE KEY `nis` (`siswa_nis`),
  KEY `fkkelas` (`siswa_kelas`),
  CONSTRAINT `fkkelas` FOREIGN KEY (`siswa_kelas`) REFERENCES `kelas` (`kelas_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `siswa` */

insert  into `siswa`(`siswa_id`,`siswa_nis`,`siswa_pass`,`siswa_nama`,`siswa_alamat`,`siswa_nomorhp`,`siswa_tempatlahir`,`siswa_tgllahir`,`siswa_jenkel`,`siswa_kelas`,`siswa_foto`,`siswa_kk`,`siswa_akta`,`siswa_ktpayah`,`siswa_ktpibu`,`siswa_kips`,`siswa_sktm`,`siswa_ijazah`,`siswa_skhun`,`siswa_status`,`siswa_statusarsip`,`siswa_tahunkeluar`) values 
('SW-001','543423','827ccb0eea8a706c4c34a16891f84e7b','Cahya Imam Purnama','Godean','0851616188','Sleman','2002-07-04','Laki-laki','KL-001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Aktif','Lengkap',2022),
('SW-002','55555','827ccb0eea8a706c4c34a16891f84e7b','Slamet Riady','Sleman','62856666222333','Sleman','2007-07-02','Laki-laki','KL-001',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Aktif','Kurang',2022);

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` char(20) NOT NULL,
  `staff_nip` char(20) DEFAULT NULL,
  `staff_nama` varchar(50) DEFAULT NULL,
  `staff_pass` varchar(50) DEFAULT NULL,
  `staff_role` enum('Staff Biasa','Administrator') DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`staff_nip`,`staff_nama`,`staff_pass`,`staff_role`) values 
('ST-102','112233','Cahya','827ccb0eea8a706c4c34a16891f84e7b','Administrator'),
('ST-103','12354','Purnama','827ccb0eea8a706c4c34a16891f84e7b','Staff Biasa'),
('ST-11101','20401303','admin','827ccb0eea8a706c4c34a16891f84e7b','Administrator');

/*Table structure for table `arsipkelas` */

DROP TABLE IF EXISTS `arsipkelas`;

/*!50001 DROP VIEW IF EXISTS `arsipkelas` */;
/*!50001 DROP TABLE IF EXISTS `arsipkelas` */;

/*!50001 CREATE TABLE  `arsipkelas`(
 `kelas_id` char(10) ,
 `kelas_nama` varchar(30) ,
 `kelas_wali` varchar(30) ,
 `kelas_grupwa` varchar(100) ,
 `kelas_status` enum('Aktif','Tidak Aktif') 
)*/;

/*Table structure for table `arsipsiswa` */

DROP TABLE IF EXISTS `arsipsiswa`;

/*!50001 DROP VIEW IF EXISTS `arsipsiswa` */;
/*!50001 DROP TABLE IF EXISTS `arsipsiswa` */;

/*!50001 CREATE TABLE  `arsipsiswa`(
 `siswa_id` varchar(8) ,
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `siswa_tahunkeluar` year(4) ,
 `kelas_nama` varchar(30) 
)*/;

/*Table structure for table `kelasaktif` */

DROP TABLE IF EXISTS `kelasaktif`;

/*!50001 DROP VIEW IF EXISTS `kelasaktif` */;
/*!50001 DROP TABLE IF EXISTS `kelasaktif` */;

/*!50001 CREATE TABLE  `kelasaktif`(
 `kelas_id` char(10) ,
 `kelas_nama` varchar(30) ,
 `kelas_wali` varchar(30) ,
 `kelas_grupwa` varchar(100) ,
 `kelas_status` enum('Aktif','Tidak Aktif') 
)*/;

/*Table structure for table `siswaaktif` */

DROP TABLE IF EXISTS `siswaaktif`;

/*!50001 DROP VIEW IF EXISTS `siswaaktif` */;
/*!50001 DROP TABLE IF EXISTS `siswaaktif` */;

/*!50001 CREATE TABLE  `siswaaktif`(
 `siswa_id` varchar(8) ,
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `kelas_nama` varchar(30) 
)*/;

/*Table structure for table `siswabelum` */

DROP TABLE IF EXISTS `siswabelum`;

/*!50001 DROP VIEW IF EXISTS `siswabelum` */;
/*!50001 DROP TABLE IF EXISTS `siswabelum` */;

/*!50001 CREATE TABLE  `siswabelum`(
 `siswa_id` varchar(8) ,
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `kelas_nama` varchar(30) 
)*/;

/*Table structure for table `siswakelas` */

DROP TABLE IF EXISTS `siswakelas`;

/*!50001 DROP VIEW IF EXISTS `siswakelas` */;
/*!50001 DROP TABLE IF EXISTS `siswakelas` */;

/*!50001 CREATE TABLE  `siswakelas`(
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_tempatlahir` varchar(15) ,
 `siswa_tgllahir` date ,
 `siswa_jenkel` enum('Laki-laki','Perempuan') ,
 `siswa_foto` varchar(255) ,
 `siswa_status` enum('Aktif','Tidak Aktif') ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `kelas_nama` varchar(30) ,
 `kelas_wali` varchar(30) ,
 `kelas_grupwa` varchar(100) 
)*/;

/*Table structure for table `siswakurang` */

DROP TABLE IF EXISTS `siswakurang`;

/*!50001 DROP VIEW IF EXISTS `siswakurang` */;
/*!50001 DROP TABLE IF EXISTS `siswakurang` */;

/*!50001 CREATE TABLE  `siswakurang`(
 `siswa_id` varchar(8) ,
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `kelas_nama` varchar(30) 
)*/;

/*Table structure for table `siswalengkap` */

DROP TABLE IF EXISTS `siswalengkap`;

/*!50001 DROP VIEW IF EXISTS `siswalengkap` */;
/*!50001 DROP TABLE IF EXISTS `siswalengkap` */;

/*!50001 CREATE TABLE  `siswalengkap`(
 `siswa_id` varchar(8) ,
 `siswa_nis` char(20) ,
 `siswa_nama` varchar(50) ,
 `siswa_alamat` varchar(100) ,
 `siswa_nomorhp` varchar(15) ,
 `siswa_statusarsip` enum('Lengkap','Kurang','Belum Ada Berkas') ,
 `kelas_nama` varchar(30) 
)*/;

/*View structure for view arsipkelas */

/*!50001 DROP TABLE IF EXISTS `arsipkelas` */;
/*!50001 DROP VIEW IF EXISTS `arsipkelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arsipkelas` AS (select `kelas`.`kelas_id` AS `kelas_id`,`kelas`.`kelas_nama` AS `kelas_nama`,`kelas`.`kelas_wali` AS `kelas_wali`,`kelas`.`kelas_grupwa` AS `kelas_grupwa`,`kelas`.`kelas_status` AS `kelas_status` from `kelas` where `kelas`.`kelas_status` = 'Tidak Aktif') */;

/*View structure for view arsipsiswa */

/*!50001 DROP TABLE IF EXISTS `arsipsiswa` */;
/*!50001 DROP VIEW IF EXISTS `arsipsiswa` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `arsipsiswa` AS (select `siswa`.`siswa_id` AS `siswa_id`,`siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`siswa`.`siswa_tahunkeluar` AS `siswa_tahunkeluar`,`kelas`.`kelas_nama` AS `kelas_nama` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`)) where `siswa`.`siswa_status` = 'Tidak Aktif') */;

/*View structure for view kelasaktif */

/*!50001 DROP TABLE IF EXISTS `kelasaktif` */;
/*!50001 DROP VIEW IF EXISTS `kelasaktif` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `kelasaktif` AS (select `kelas`.`kelas_id` AS `kelas_id`,`kelas`.`kelas_nama` AS `kelas_nama`,`kelas`.`kelas_wali` AS `kelas_wali`,`kelas`.`kelas_grupwa` AS `kelas_grupwa`,`kelas`.`kelas_status` AS `kelas_status` from `kelas` where `kelas`.`kelas_status` = 'Aktif') */;

/*View structure for view siswaaktif */

/*!50001 DROP TABLE IF EXISTS `siswaaktif` */;
/*!50001 DROP VIEW IF EXISTS `siswaaktif` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswaaktif` AS (select `siswa`.`siswa_id` AS `siswa_id`,`siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`kelas`.`kelas_nama` AS `kelas_nama` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`)) where `siswa`.`siswa_status` = 'Aktif') */;

/*View structure for view siswabelum */

/*!50001 DROP TABLE IF EXISTS `siswabelum` */;
/*!50001 DROP VIEW IF EXISTS `siswabelum` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswabelum` AS (select `siswa`.`siswa_id` AS `siswa_id`,`siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`kelas`.`kelas_nama` AS `kelas_nama` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`)) where `siswa`.`siswa_status` = 'Aktif' and `siswa`.`siswa_statusarsip` = 'Belum Ada Berkas') */;

/*View structure for view siswakelas */

/*!50001 DROP TABLE IF EXISTS `siswakelas` */;
/*!50001 DROP VIEW IF EXISTS `siswakelas` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswakelas` AS (select `siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_tempatlahir` AS `siswa_tempatlahir`,`siswa`.`siswa_tgllahir` AS `siswa_tgllahir`,`siswa`.`siswa_jenkel` AS `siswa_jenkel`,`siswa`.`siswa_foto` AS `siswa_foto`,`siswa`.`siswa_status` AS `siswa_status`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`kelas`.`kelas_nama` AS `kelas_nama`,`kelas`.`kelas_wali` AS `kelas_wali`,`kelas`.`kelas_grupwa` AS `kelas_grupwa` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`))) */;

/*View structure for view siswakurang */

/*!50001 DROP TABLE IF EXISTS `siswakurang` */;
/*!50001 DROP VIEW IF EXISTS `siswakurang` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswakurang` AS (select `siswa`.`siswa_id` AS `siswa_id`,`siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`kelas`.`kelas_nama` AS `kelas_nama` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`)) where `siswa`.`siswa_status` = 'Aktif' and `siswa`.`siswa_statusarsip` = 'Kurang') */;

/*View structure for view siswalengkap */

/*!50001 DROP TABLE IF EXISTS `siswalengkap` */;
/*!50001 DROP VIEW IF EXISTS `siswalengkap` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `siswalengkap` AS (select `siswa`.`siswa_id` AS `siswa_id`,`siswa`.`siswa_nis` AS `siswa_nis`,`siswa`.`siswa_nama` AS `siswa_nama`,`siswa`.`siswa_alamat` AS `siswa_alamat`,`siswa`.`siswa_nomorhp` AS `siswa_nomorhp`,`siswa`.`siswa_statusarsip` AS `siswa_statusarsip`,`kelas`.`kelas_nama` AS `kelas_nama` from (`siswa` join `kelas` on(`siswa`.`siswa_kelas` = `kelas`.`kelas_id`)) where `siswa`.`siswa_status` = 'Aktif' and `siswa`.`siswa_statusarsip` = 'Lengkap') */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
