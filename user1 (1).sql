-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 19, 2023 at 02:30 PM
-- Server version: 10.10.2-MariaDB
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user1`
--

-- --------------------------------------------------------

--
-- Table structure for table `dep`
--

DROP TABLE IF EXISTS `dep`;
CREATE TABLE IF NOT EXISTS `dep` (
  `id_dep` varchar(2) NOT NULL,
  `name_dep` varchar(30) NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dep`
--

INSERT INTO `dep` (`id_dep`, `name_dep`) VALUES
('1', 'ช่างยนต์'),
('2', 'ช่างกลโรงงาน'),
('3', 'ช่างเชื่อม'),
('4', 'ช่างไฟฟ้า'),
('9', 'เทคโนโลยีสารสนเทศ');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

DROP TABLE IF EXISTS `doc`;
CREATE TABLE IF NOT EXISTS `doc` (
  `id_doc` int(10) NOT NULL AUTO_INCREMENT,
  `name_doc` varchar(25) NOT NULL,
  `detail_doc` varchar(200) NOT NULL,
  `id_type` varchar(2) NOT NULL,
  `file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_doc`),
  KEY `id_type` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` varchar(2) NOT NULL,
  `name_role` varchar(15) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
('1', 'Admin'),
('2', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sender_user`
--

DROP TABLE IF EXISTS `sender_user`;
CREATE TABLE IF NOT EXISTS `sender_user` (
  `id_user` int(10) NOT NULL,
  `id_user_re` int(10) NOT NULL,
  `id_doc` int(10) NOT NULL,
  `date_send` datetime NOT NULL,
  `status_read` varchar(1) NOT NULL,
  `status_send` varchar(1) NOT NULL,
  `status_dep` varchar(2) NOT NULL,
  `date_read` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`,`id_user_re`,`id_doc`),
  KEY `id_user_re` (`id_user_re`),
  KEY `id_doc` (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `type_doc`
--

DROP TABLE IF EXISTS `type_doc`;
CREATE TABLE IF NOT EXISTS `type_doc` (
  `id_type` varchar(2) NOT NULL,
  `name_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_doc`
--

INSERT INTO `type_doc` (`id_type`, `name_type`) VALUES
('1', 'คำสั่ง'),
('2', 'หนังสือออก'),
('3', 'บันทึกข้อความ'),
('4', 'หนังสือเข้า');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `u_user` varchar(25) NOT NULL,
  `p_user` varchar(25) NOT NULL,
  `pre_user` varchar(10) NOT NULL,
  `fname_user` varchar(30) NOT NULL,
  `lname_user` varchar(30) NOT NULL,
  `email_user` varchar(20) NOT NULL,
  `tel_user` varchar(12) NOT NULL,
  `status_user` varchar(2) NOT NULL,
  `id_role` varchar(2) NOT NULL,
  `id_dep` varchar(2) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_dep` (`id_dep`),
  KEY `id_role` (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `u_user`, `p_user`, `pre_user`, `fname_user`, `lname_user`, `email_user`, `tel_user`, `status_user`, `id_role`, `id_dep`) VALUES
(4, 'user2', '1234', 'นาย', 'วุฒิวงศ์', 'เอียดศรีชาย', 'xx@gmail.com', '0926124435', '1', '1', '9'),
(5, 'user1', '1234', 'นาย', 'พัชรพล', 'พิทักษ์', 'xx@gmail.com', '0926124435', '1', '2', '2'),
(6, 'user8', '1234', 'นาย', 'Supperman', 'OK', 'xx@gmail.com', '0926124435', '1', '2', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_doc` (`id_type`);

--
-- Constraints for table `sender_user`
--
ALTER TABLE `sender_user`
  ADD CONSTRAINT `sender_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `sender_user_ibfk_2` FOREIGN KEY (`id_user_re`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `sender_user_ibfk_3` FOREIGN KEY (`id_doc`) REFERENCES `doc` (`id_doc`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_dep`) REFERENCES `dep` (`id_dep`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
