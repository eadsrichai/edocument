-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 18, 2023 at 09:02 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`id_doc`, `name_doc`, `detail_doc`, `id_type`, `file`) VALUES
(10, 'sadasd', 'dsad', '1', '65573c3ee0222_2564-2566.pdf'),
(11, 'dsfsdf', 'dsfsdf', '1', '65573cb35500c_2564.pdf'),
(12, 'sdfsd', 'sdfdsf', '1', '65573cbb77b11_2566.pdf'),
(13, 'sdfsdf', 'aaaaaaaa', '2', '65573d3809465_2564-2566.pdf'),
(14, 'sdfdsf', 'dfdsf', '2', '6558fcfbe3a40_instructions_for_use.pdf'),
(15, 'dsfds', 'dfdsf', '1', '65590e289c578_instructions_for_use.pdf'),
(16, 'sfdfsfd', 'dsf', '1', '65590e50da9c1_instructions_for_use.pdf'),
(17, 'fdsf', 'dfdsf', '1', '65590e6cc0fb8_instructions_for_use.pdf'),
(18, 'sfdsf', 'dsfsdf', '2', '65590f05ea4f0_instructions_for_use.pdf'),
(19, 'dfsdf', 'dfdsf', '1', '65590f10f29db_instructions_for_use.pdf'),
(20, 'erewr', 'erewr', '4', '65591ac83f359_instructions_for_use.pdf'),
(21, 'erewr', 'erewr', '4', '65591ae313fe5_instructions_for_use.pdf'),
(22, 'erewr', 'erewr', '4', '65591af018ebb_instructions_for_use.pdf'),
(23, 'dfdsf', 'fdsf', '1', '65591e1e64a15_instructions_for_use.pdf'),
(24, 'sdfsf', 'sdfdsf', '1', '65591e53494bf_instructions_for_use.pdf'),
(25, 'dfdsf', 'dfdsf', '1', '65591ea2f0dbe_instructions_for_use.pdf'),
(26, 'fdsf', 'dsfsd', '1', '65591ec3f0924_instructions_for_use.pdf'),
(27, 'dfsf', 'dfds', '1', '65591f3db8c0d_instructions_for_use.pdf'),
(28, 'fsdf', 'fdsdf', '1', '65591f7b09feb_instructions_for_use.pdf'),
(29, 'fsdf', 'sdf', '1', '65591fe49b1d9_instructions_for_use.pdf'),
(30, 'sdff', 'sdfsdf', '1', '6559200fc5b65_instructions_for_use.pdf'),
(31, 'fdsfs', 'fsdf', '1', '65592034a9295_instructions_for_use.pdf'),
(32, 'sfdsf', 'dsfsd', '1', '655920a57a07b_instructions_for_use.pdf'),
(33, 'sfds', 'dfs', '1', '6559214f81986_instructions_for_use.pdf'),
(34, 'sdfsdf', 'dfs', '1', '6559218fadf4b_instructions_for_use.pdf'),
(35, 'twerer', 'rwer', '1', '65592236626af_instructions_for_use.pdf'),
(36, 'dfsd', 'dfsd', '1', '6559232667f86_instructions_for_use.pdf'),
(37, 'dfsdff', 'sdfsdfdsf', '3', '655925bdde64c_instructions_for_use.pdf');

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
-- Table structure for table `sender_dep`
--

DROP TABLE IF EXISTS `sender_dep`;
CREATE TABLE IF NOT EXISTS `sender_dep` (
  `id_user` int(10) NOT NULL,
  `id_dep_re` varchar(2) NOT NULL,
  `id_doc` int(10) NOT NULL,
  `date_send` timestamp NOT NULL,
  `status_read` varchar(1) NOT NULL,
  `status_send` varchar(1) NOT NULL,
  PRIMARY KEY (`id_user`,`id_dep_re`,`id_doc`),
  KEY `id_doc` (`id_doc`),
  KEY `id_dep_re` (`id_dep_re`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_dep`
--

INSERT INTO `sender_dep` (`id_user`, `id_dep_re`, `id_doc`, `date_send`, `status_read`, `status_send`) VALUES
(5, '3', 35, '2023-11-18 20:44:38', '0', '0'),
(5, '4', 37, '2023-11-18 20:59:41', '0', '0'),
(5, '9', 36, '2023-11-18 20:48:38', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sender_user`
--

DROP TABLE IF EXISTS `sender_user`;
CREATE TABLE IF NOT EXISTS `sender_user` (
  `id_user` int(10) NOT NULL,
  `id_user_re` int(10) NOT NULL,
  `id_doc` int(10) NOT NULL,
  `date_send` timestamp NOT NULL,
  `status_read` varchar(1) NOT NULL,
  `status_send` varchar(1) NOT NULL,
  PRIMARY KEY (`id_user`,`id_user_re`,`id_doc`),
  KEY `id_user_re` (`id_user_re`),
  KEY `id_doc` (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sender_user`
--

INSERT INTO `sender_user` (`id_user`, `id_user_re`, `id_doc`, `date_send`, `status_read`, `status_send`) VALUES
(5, 4, 17, '2023-11-18 19:20:12', '0', '0'),
(5, 4, 19, '2023-11-18 19:22:56', '0', '0'),
(5, 4, 23, '2023-11-18 20:27:10', '0', '0'),
(5, 6, 16, '2023-11-18 19:19:44', '0', '0'),
(5, 6, 18, '2023-11-18 08:52:25', '1', '0'),
(5, 6, 20, '2023-11-18 20:12:56', '0', '0'),
(5, 6, 21, '2023-11-18 20:13:23', '0', '0'),
(5, 6, 22, '2023-11-18 20:13:36', '0', '0');

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
(4, 'user2', '1234', 'นาย', 'วุฒิวงศ์', 'เอียดศรีชาย', 'xx@gmail.com', '0926124435', '1', '2', '2'),
(5, 'user1', '1234', 'นาย', 'พัชรพล', 'พิทักษ์', 'xx@gmail.com', '0926124435', '1', '1', '2'),
(6, 'user8', '1234', 'นาย', 'sfsdf', 'dfsdfdss', 'xx@gmail.com', '0926124435', '1', '1', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type_doc` (`id_type`);

--
-- Constraints for table `sender_dep`
--
ALTER TABLE `sender_dep`
  ADD CONSTRAINT `sender_dep_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `sender_dep_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `doc` (`id_doc`),
  ADD CONSTRAINT `sender_dep_ibfk_3` FOREIGN KEY (`id_dep_re`) REFERENCES `dep` (`id_dep`);

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
