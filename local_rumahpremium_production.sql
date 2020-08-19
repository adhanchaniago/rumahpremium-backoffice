-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2020 at 06:46 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local_rumahpremium_production`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(10) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `title_item` varchar(150) NOT NULL,
  `title_url` varchar(150) NOT NULL,
  `price` int(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `category_url` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `latitude` varchar(30) NOT NULL,
  `longitude` varchar(30) NOT NULL,
  `usia_bangunan` varchar(30) NOT NULL,
  `lantai` int(10) NOT NULL,
  `luas_bangunan` float NOT NULL,
  `luas_tanah` float NOT NULL,
  `furnish` varchar(30) NOT NULL,
  `sertifikat` varchar(30) NOT NULL,
  `listrik` float NOT NULL,
  `sumber_air` varchar(30) NOT NULL,
  `developer` varchar(30) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `bathroom` int(10) NOT NULL,
  `garage` int(10) NOT NULL,
  `ac` tinyint(1) NOT NULL,
  `kolam_renang` tinyint(1) NOT NULL,
  `halaman` tinyint(1) NOT NULL,
  `water_heater` tinyint(1) NOT NULL,
  `mesin_cuci` tinyint(1) NOT NULL,
  `gym` tinyint(1) NOT NULL,
  `internet` tinyint(1) NOT NULL,
  `teras` tinyint(1) NOT NULL,
  `bathup` tinyint(1) NOT NULL,
  `photoitem` varchar(50) NOT NULL,
  `photoslider` varchar(150) NOT NULL,
  `item_created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `item_created_by` int(10) NOT NULL,
  `item_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE `item_image` (
  `id_item_image` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `id_item` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(20) NOT NULL,
  `user_ktp_front` varchar(30) NOT NULL,
  `user_ktp_back` varchar(30) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_code` varchar(20) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `user_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `user_fullname`, `user_email`, `user_phone`, `user_ktp_front`, `user_ktp_back`, `user_password`, `user_code`, `is_verified`, `user_created_date`, `user_updated_date`) VALUES
(15, 'Aninto Yodha', 'yodha.project@gmail.com', '085643816130', '', '', '$2y$10$SoTFl.sQUpU6YSW.e6lasu4mRilEMTDwyP2OK7m8uAb4wBYikE0Om', '27r20iam219', 1, '2020-07-19 05:18:43', '2020-07-18 22:18:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `item_image`
--
ALTER TABLE `item_image`
  ADD PRIMARY KEY (`id_item_image`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id_item_image` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
