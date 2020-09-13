-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 02:40 AM
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
  `price` bigint(20) NOT NULL,
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
  `description` longtext NOT NULL,
  `item_created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `item_created_by` int(10) NOT NULL,
  `item_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `item_updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `item_code`, `title_item`, `title_url`, `price`, `type`, `category`, `category_url`, `address`, `latitude`, `longitude`, `usia_bangunan`, `lantai`, `luas_bangunan`, `luas_tanah`, `furnish`, `sertifikat`, `listrik`, `sumber_air`, `developer`, `bedroom`, `bathroom`, `garage`, `ac`, `kolam_renang`, `halaman`, `water_heater`, `mesin_cuci`, `gym`, `internet`, `teras`, `bathup`, `description`, `item_created_date`, `item_created_by`, `item_updated_date`, `item_updated_by`) VALUES
(26, '190820-bgf', 'Sanctuary Sentul Luxury Premium Home View Gunung', 'sanctuary-sentul-luxury-premium-home-view-gunung', 3600000000, 'Dijual', 'Rumah', 'rumah', 'The Sanctuary Collection', '-6.588848, 106.872488', '6°35\'19.9\"S 106°52\'21.0\"E', '2019', 2, 225, 150, 'Full Furnish', 'SHGB', 3500, 'PAM', 'Sutoyo', 4, 4, 0, 1, 0, 1, 0, 0, 1, 1, 1, 0, '', '2020-08-19 15:33:57', 16, '2020-08-19 08:50:17', 0),
(28, '190820-ohm', 'Rumah Siap Huni Cluster Taman Venesia Sentul City', 'rumah-siap-huni-cluster-taman-venesia-sentul-city', 850000000, 'Dijual', 'Apartment', 'apartment', 'Jl.Sungai Barito No.65,Babakan Madang Sentul City', '-6.580590, 106.884461', '6°34\'50.1\"S 106°53\'04.1\"E', '', 1, 75, 105, 'Kosong', 'SHM', 1300, 'PAM', 'MPRO', 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '2020-08-19 16:03:00', 16, '2020-08-19 21:02:19', 0),
(29, '190820-z9e', 'Apartemen Opus Park Sentul City', 'apartemen-opus-park-sentul-city', 1111111111, 'Dijual', 'Apartment', 'apartment', 'Jl.MH.Thamrin, Sentul City, Bogor', '', '', '3 Tahun', 0, 61, 0, '', '', 1297, 'PAM', '', 0, 0, 0, 1, 0, 1, 0, 0, 1, 1, 0, 0, '', '2020-08-19 16:07:22', 16, '2020-08-19 21:24:33', 0),
(30, '190820-cme', 'Rumah Klasik Modern, Sierra Madre Sentul City', 'rumah-klasik-modern-sierra-madre-sentul-city', 8500000000, 'Dijual', 'Apartment', 'apartment', 'Jl.Bunga Lavender No.16, Sierra Madre, Sentul City', '', '', '1 Tahun', 2, 475, 447, 'Kosong', 'SHGB', 4400, 'PAM', 'MPRO', 0, 0, 1, 0, 1, 1, 0, 0, 0, 1, 1, 0, '', '2020-08-19 16:12:38', 16, '2020-08-19 21:24:36', 0),
(31, '200820-omh', 'Rumah Murah Furnish Cluster Green Valley ', 'rumah-murah-furnish-cluster-green-valley', 1700000000, 'Dijual', 'rumah', 'rumah', 'Green Vallel, Sentul City, Bogor', '', '', '5', 2, 250, 162, 'Full Furnish', 'SHM', 3500, 'PAM', 'MPRO', 4, 3, 0, 1, 0, 0, 1, 0, 0, 1, 1, 0, '', '2020-08-20 14:57:55', 16, '2020-08-20 07:57:55', 0),
(32, '200820-wlz', 'Rumah New Klasik Modern, Imperial Golf Sentul City', 'rumah-new-klasik-modern-imperial-golf-sentul-city', 5500000000, 'Dijual', 'rumah', 'rumah', 'OImperial Golf, Sentul City', '', '', '1', 2, 365, 330, 'Kosong', 'SHGB', 3500, 'PAM', 'MPRO', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 1, 0, '', '2020-08-20 15:00:01', 16, '2020-08-20 08:00:01', 0),
(33, '200820-3gl', 'Rumah Minimalis Cluster Imperial Golf Sentul City', 'rumah-minimalis-cluster-imperial-golf-sentul-city', 7000000000, 'Dijual', 'rumah', 'rumah', 'Imperial Golf, Sentul City, Bogor', '', '', '1', 2, 450, 375, 'Kosong', 'SHGB', 4500, 'PAM', 'MPRO', 0, 0, 2, 0, 1, 0, 1, 0, 0, 1, 1, 0, '', '2020-08-20 15:02:43', 16, '2020-08-20 08:02:43', 0),
(37, '200820-knq', 'Rumah Best View Cluster Atmosphere Sentul Nirwana', 'rumah-best-view-cluster-atmosphere-sentul-nirwana', 2500000000, 'Dijual', 'rumah', 'rumah', 'The Atmosphere, Sentul City, Bogor', '', '', '5', 2, 149, 324, 'Kosong', 'SHM', 3500, 'PAM', 'MPRO', 0, 0, 1, 0, 0, 0, 1, 0, 0, 1, 0, 0, '', '2020-08-20 15:58:10', 16, '2020-08-20 08:58:10', 0),
(38, '200820-1pm', 'Rumah Murah Minimalis Siap Huni Sentul City', 'rumah-murah-minimalis-siap-huni-sentul-city', 1650000000, 'Dijual', 'rumah', 'rumah', 'The Atmosphere, Sentul City, Bogor', '', '', '5', 2, 129, 200, 'Kosong', 'SHM', 3300, 'PAM', 'MPRO', 0, 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', '2020-08-20 16:00:06', 16, '2020-08-20 09:00:06', 0),
(39, '200820-3m8', 'Rumah Siap Huni Cluster The Breeze Sentul Nirwana', 'rumah-siap-huni-cluster-the-breeze-sentul-nirwana', 850000000, 'Dijual', 'rumah', 'rumah', 'The Breeze', '', '', '5', 1, 70, 105, 'Kosong', 'SHM', 2200, 'PAM', 'MPRO', 2, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, '', '2020-08-20 16:02:51', 16, '2020-08-20 09:02:51', 0),
(40, '200820-bk7', 'Rumah Minimalis Cluster La Vanoise Village ', 'rumah-minimalis-cluster-la-vanoise-village', 2550000000, 'Dijual', 'rumah', 'rumah', 'La Vanoise Village, Sentul City', '', '', '5', 2, 250, 200, 'Kosong', 'SHM', 3500, 'PAM', 'MPRO', 4, 4, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, '', '2020-08-20 16:10:18', 16, '2020-08-20 09:10:18', 0),
(44, '200820-gei', 'Rumah Furnish Cluster Mediterania G 1Sentul City', 'rumah-furnish-cluster-mediterania-g-1sentul-city', 5500000000, 'Dijual', 'rumah', 'rumah', 'Mediterania Golf 1', '', '', '10', 2, 320, 440, 'Full Furnish', 'SHM', 440, 'PAM', 'MPRO', 0, 0, 0, 1, 1, 0, 1, 1, 0, 1, 1, 0, '', '2020-08-20 16:19:29', 16, '2020-08-20 09:19:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item_image`
--

CREATE TABLE `item_image` (
  `id_item_image` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `id_item` int(10) NOT NULL,
  `main_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_image`
--

INSERT INTO `item_image` (`id_item_image`, `image`, `id_item`, `main_image`) VALUES
(45, 'kmpge9.jpg', 13, 0),
(46, 'kmpge91.jpg', 13, 0),
(47, '267244596.jpg', 14, 0),
(48, '867417277.jpg', 15, 0),
(49, 'opj0xh.jpg', 16, 0),
(50, 'opj0xh1.jpg', 16, 0),
(51, 'opj0xh.jpg', 16, 0),
(52, 'opj0xh1.jpg', 16, 0),
(53, 'w7jg1f.jpg', 18, 0),
(54, 'w7jg1f1.jpg', 18, 0),
(55, 'u3ay0h.jpg', 19, 0),
(56, 'u3ay0h1.jpg', 19, 0),
(57, 'ptzh9.jpg', 20, 0),
(58, 'ptzh91.jpg', 20, 0),
(59, 'b977r.jpg', 21, 0),
(60, 'b977r1.jpg', 21, 0),
(61, 'omtgc.jpg', 22, 0),
(62, 'omtgc1.jpg', 22, 0),
(63, '8v5sza.jpg', 23, 0),
(64, '8v5sza1.jpg', 23, 0),
(65, 'tbpwmh.jpg', 24, 0),
(66, 'tbpwmh1.jpg', 24, 0),
(67, 'tgsra7.jpg', 25, 0),
(68, 'tgsra71.jpg', 25, 0),
(69, 'n9tk38.jpg', 26, 0),
(70, 'n9tk381.jpg', 26, 0),
(71, 'f60jo.jpg', 27, 0),
(72, 'f60jo1.jpg', 27, 0),
(73, 'v6c93n.jpg', 28, 0),
(74, 'v6c93n1.jpg', 28, 0),
(75, 'u75go.jpg', 29, 0),
(76, 'u75go1.jpg', 29, 0),
(77, '9m9zue.jpg', 30, 0),
(78, '9m9zue1.jpg', 30, 0),
(79, 'v6c93n2.jpg', 28, 0),
(80, 'v6c93n3.jpg', 28, 0),
(81, 'v6c93n4.jpg', 28, 0),
(82, 'v6c93n5.jpg', 28, 0),
(83, 'f60jo2.jpg', 27, 0),
(84, 'f60jo3.jpg', 27, 0),
(85, 'f60jo4.jpg', 27, 0),
(86, 'f60jo5.jpg', 27, 0),
(87, '9m9zue2.jpg', 30, 0),
(88, '9m9zue3.jpg', 30, 0),
(89, '9m9zue4.jpg', 30, 0),
(90, '9m9zue5.jpg', 30, 0),
(91, 'u75go2.jpg', 29, 0),
(92, 'u75go3.jpg', 29, 0),
(93, 'u75go4.jpg', 29, 0),
(94, 'u75go5.jpg', 29, 0),
(95, 'u75go6.jpg', 29, 0),
(96, 'u75go7.jpg', 29, 0),
(97, 'n9tk382.jpg', 26, 0),
(98, 'n9tk383.jpg', 26, 0),
(99, 'n9tk384.jpg', 26, 0),
(100, 'n9tk385.jpg', 26, 0),
(101, 'ox9o92.jpg', 31, 0),
(102, 'ox9o921.jpg', 31, 0),
(103, 'ox9o922.jpg', 31, 0),
(104, 'ox9o923.jpg', 31, 0),
(105, 'ox9o924.jpg', 31, 0),
(106, 'ox9o925.jpg', 31, 0),
(107, 'ox9o926.jpg', 31, 0),
(108, 'vhyygf.jpg', 32, 0),
(109, 'vhyygf1.jpg', 32, 0),
(110, 'vhyygf2.jpg', 32, 0),
(111, 'vhyygf3.jpg', 32, 0),
(112, 'vhyygf4.jpg', 32, 0),
(113, 'vhyygf5.jpg', 32, 0),
(114, 'vhyygf6.jpg', 32, 0),
(115, 'o780qn.jpg', 33, 0),
(116, 'o780qn1.jpg', 33, 0),
(117, 'o780qn2.jpg', 33, 0),
(118, 'o780qn3.jpg', 33, 0),
(119, 'o780qn4.jpg', 33, 0),
(120, 'o780qn5.jpg', 33, 0),
(121, 'o780qn6.jpg', 33, 0),
(122, 'uht74l.jpg', 34, 0),
(123, 'uht74l1.jpg', 34, 0),
(124, 'uht74l2.jpg', 34, 0),
(125, 'uht74l3.jpg', 34, 0),
(126, 'uht74l4.jpg', 34, 0),
(127, 'snpoj.jpg', 35, 0),
(128, 'snpoj1.jpg', 35, 0),
(129, 'snpoj2.jpg', 35, 0),
(130, 'snpoj3.jpg', 35, 0),
(131, 'snpoj4.jpg', 35, 0),
(132, 'snpoj5.jpg', 35, 0),
(133, 'snpoj6.jpg', 35, 0),
(134, 's7vnf.jpg', 36, 0),
(135, 's7vnf1.jpg', 36, 0),
(136, 's7vnf2.jpg', 36, 0),
(137, 's7vnf3.jpg', 36, 0),
(138, 's7vnf4.jpg', 36, 0),
(139, 's7vnf5.jpg', 36, 0),
(140, 's7vnf6.jpg', 36, 0),
(141, 'zd8h9t.jpg', 37, 0),
(142, 'zd8h9t1.jpg', 37, 0),
(143, 'zd8h9t2.jpg', 37, 0),
(144, 'zd8h9t3.jpg', 37, 0),
(145, 'zd8h9t4.jpg', 37, 0),
(146, 'zd8h9t5.jpg', 37, 0),
(147, 'zd8h9t6.jpg', 37, 0),
(148, 'ivrg9r.jpg', 38, 0),
(149, 'ivrg9r1.jpg', 38, 0),
(150, 'ivrg9r2.jpg', 38, 0),
(151, 'ivrg9r3.jpg', 38, 0),
(152, 'ivrg9r4.jpg', 38, 0),
(153, 'ivrg9r5.jpg', 38, 0),
(154, 'ivrg9r6.jpg', 38, 0),
(155, 'u4uju.jpg', 39, 0),
(156, 'u4uju1.jpg', 39, 0),
(157, 'u4uju2.jpg', 39, 0),
(158, 'u4uju3.jpg', 39, 0),
(159, 'u4uju4.jpg', 39, 0),
(160, 'u4uju5.jpg', 39, 0),
(161, 'u4uju6.jpg', 39, 0),
(162, '7y857w.jpg', 40, 0),
(163, '7y857w1.jpg', 40, 0),
(164, '7y857w2.jpg', 40, 0),
(165, '7y857w3.jpg', 40, 0),
(166, '7y857w4.jpg', 40, 0),
(167, '7y857w5.jpg', 40, 0),
(168, '7y857w6.jpg', 40, 0),
(169, 'v558hj.jpg', 41, 0),
(170, 'v558hj1.jpg', 41, 0),
(171, 'v558hj2.jpg', 41, 0),
(172, 'v558hj3.jpg', 41, 0),
(173, 'v558hj4.jpg', 41, 0),
(174, 'v558hj5.jpg', 41, 0),
(175, 'v558hj6.jpg', 41, 0),
(176, 'oo6qvj.jpg', 42, 0),
(177, 'oo6qvj1.jpg', 42, 0),
(178, 'oo6qvj2.jpg', 42, 0),
(179, 'oo6qvj3.jpg', 42, 0),
(180, 'oo6qvj4.jpg', 42, 0),
(181, 'oo6qvj5.jpg', 42, 0),
(182, 'oo6qvj6.jpg', 42, 0),
(183, 'j8wqf.jpg', 43, 0),
(184, 'j8wqf1.jpg', 43, 0),
(185, 'j8wqf2.jpg', 43, 0),
(186, 'j8wqf3.jpg', 43, 0),
(187, 'j8wqf4.jpg', 43, 0),
(188, 'j8wqf5.jpg', 43, 0),
(189, 'j8wqf6.jpg', 43, 0),
(190, 'e4uogh.jpg', 44, 0),
(191, 'e4uogh1.jpg', 44, 0),
(192, 'e4uogh2.jpg', 44, 0),
(193, 'e4uogh3.jpg', 44, 0),
(194, 'e4uogh4.jpg', 44, 0),
(195, 'e4uogh5.jpg', 44, 0),
(196, 'e4uogh6.jpg', 44, 0),
(197, '9btlh5b.jpg', 45, 0),
(198, '9btlh5b1.jpg', 45, 0),
(199, '9btlh5b2.jpg', 45, 0),
(200, '9btlh5b3.jpg', 45, 0),
(201, '9btlh5b4.jpg', 45, 0),
(202, '9btlh5b5.jpg', 45, 0),
(203, 'soeq4a.jpg', 46, 0),
(204, 'soeq4a1.jpg', 46, 0),
(205, 'soeq4a2.jpg', 46, 0),
(206, 'soeq4a3.jpg', 46, 0),
(207, 'soeq4a4.jpg', 46, 0),
(208, 'soeq4a5.jpg', 46, 0),
(209, 'soeq4a6.jpg', 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(10) NOT NULL,
  `news_code` varchar(20) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_url` varchar(100) NOT NULL,
  `news_content` longtext NOT NULL,
  `news_created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `news_created_by` int(10) NOT NULL,
  `news_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `news_updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `news_code`, `news_title`, `news_url`, `news_content`, `news_created_date`, `news_created_by`, `news_updated_date`, `news_updated_by`) VALUES
(1, '130920-54r', 'Test', 'test', '<p>Test Hehehehe</p>', '2020-09-13 07:08:34', 15, '2020-09-13 00:18:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_image`
--

CREATE TABLE `news_image` (
  `id_news_image` int(10) NOT NULL,
  `image` varchar(30) NOT NULL,
  `id_news` int(10) NOT NULL,
  `main_image` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_image`
--

INSERT INTO `news_image` (`id_news_image`, `image`, `id_news`, `main_image`) VALUES
(1, 'yf23x.jpg', 1, 1),
(2, '6oxfl7.jpg', 1, 0);

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
(15, 'Aninto Yodha', 'yodha.project@gmail.com', '085643816130', '', '', '$2y$10$SoTFl.sQUpU6YSW.e6lasu4mRilEMTDwyP2OK7m8uAb4wBYikE0Om', '27r20iam219', 1, '2020-07-19 05:18:43', '2020-07-18 22:18:58'),
(16, 'Toyo', 'toyo@rumahpremium.com', '081312101010', '', '', '$2y$10$SoTFl.sQUpU6YSW.e6lasu4mRilEMTDwyP2OK7m8uAb4wBYikE0Om', '27r20iam219', 1, '2020-07-19 05:18:43', '2020-08-19 06:52:43');

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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `news_image`
--
ALTER TABLE `news_image`
  ADD PRIMARY KEY (`id_news_image`);

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
  MODIFY `id_item` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `item_image`
--
ALTER TABLE `item_image`
  MODIFY `id_item_image` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news_image`
--
ALTER TABLE `news_image`
  MODIFY `id_news_image` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
