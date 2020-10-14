-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 10:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dboka`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_username` varchar(30) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_level` varchar(30) DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_level`, `admin_nama`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `baju`
--

CREATE TABLE `baju` (
  `baju_id` varchar(50) NOT NULL,
  `motif_id` int(5) DEFAULT NULL,
  `warna_id` int(5) DEFAULT NULL,
  `baju_photo` varchar(255) DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  `baju_genre` enum('L','P') DEFAULT NULL,
  `baju_jenis` varchar(10) DEFAULT NULL,
  `baju_harga` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baju`
--

INSERT INTO `baju` (`baju_id`, `motif_id`, `warna_id`, `baju_photo`, `admin_nama`, `baju_genre`, `baju_jenis`, `baju_harga`) VALUES
('B0001', 3, 1, 'kosong.jpg', 'admin', 'P', 'ANAK', 23000.00),
('B0002', 4, 3, 'baju-09082020121521.jpg', 'admin', 'L', 'ANAK', NULL),
('B0003', 4, 1, 'baju-20082020061333.jpg', 'admin', 'L', 'ANAK', NULL),
('B0004', 3, 1, 'baju-20082020041936.jpg', 'admin', 'L', 'GAMIS', NULL),
('B0005', 3, 1, 'baju-20082020045230.jpg', 'admin', 'P', 'GAMIS', NULL),
('B0006', 5, 2, 'baju-20082020061849.jpeg', 'admin', 'L', 'ANAK', NULL),
('B0007', 3, 1, 'baju-21082020084251.jpg', 'admin', 'L', 'GAMIS', 40000.00);

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `keluar_id` int(5) NOT NULL,
  `baju_id` varchar(10) DEFAULT NULL,
  `size_id` int(5) DEFAULT NULL,
  `keluar_jumlah` double(10,2) DEFAULT NULL,
  `keluar_tanggal` date DEFAULT NULL,
  `keluar_tanggal_edit` date DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  `pending` enum('Y','T') DEFAULT NULL,
  `keluar_buyer` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`keluar_id`, `baju_id`, `size_id`, `keluar_jumlah`, `keluar_tanggal`, `keluar_tanggal_edit`, `admin_nama`, `pending`, `keluar_buyer`) VALUES
(2, 'B0003', 3, 2.00, '2020-08-27', '0000-00-00', 'admin', 'Y', 'Buk sirnah'),
(3, 'B0002', 4, 2.00, '2020-08-27', '2020-08-27', 'admin', 'Y', 'Buk azi'),
(4, '1', 2, 1.00, '2020-08-27', '2020-08-27', 'admin', 'T', 'buk'),
(5, 'B0002', 2, 2.00, '2020-08-27', '0000-00-00', 'admin', '', 'Buk sirnah'),
(6, '1', 3, 2.00, '2020-08-27', '2020-08-27', 'admin', 'T', 'Buk sirnah');

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `masuk_id` int(5) NOT NULL,
  `baju_id` varchar(10) DEFAULT NULL,
  `size_id` int(5) DEFAULT NULL,
  `masuk_jumlah` double(10,2) DEFAULT NULL,
  `masuk_tanggal` date DEFAULT NULL,
  `admin_nama` varchar(30) DEFAULT NULL,
  `masuk_tanggal_edit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`masuk_id`, `baju_id`, `size_id`, `masuk_jumlah`, `masuk_tanggal`, `admin_nama`, `masuk_tanggal_edit`) VALUES
(5, 'B0001', 3, 1.00, '2020-08-24', 'admin', '0000-00-00'),
(6, 'B0002', 5, 1.00, '2020-08-24', 'admin', '0000-00-00'),
(8, 'B0006', 5, 11.00, '2020-08-24', 'admin', '2020-08-25'),
(9, 'B0007', 5, 1.00, '2020-08-25', 'admin', '2020-08-25'),
(10, 'B0003', 5, 5.00, '2020-08-25', 'admin', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `motif`
--

CREATE TABLE `motif` (
  `motif_id` int(5) NOT NULL,
  `motif_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motif`
--

INSERT INTO `motif` (`motif_id`, `motif_nama`) VALUES
(3, 'MACAN'),
(4, 'CARS'),
(5, 'MOBIL');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `pending_id` int(5) NOT NULL,
  `baju_id` int(5) DEFAULT NULL,
  `jumlah` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(5) NOT NULL,
  `size_nama` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_nama`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, 'S'),
(12, 'M'),
(13, 'L'),
(14, 'XL');

-- --------------------------------------------------------

--
-- Stand-in structure for view `s_keluar`
-- (See below for the actual view)
--
CREATE TABLE `s_keluar` (
`baju_id` varchar(10)
,`baju_photo` varchar(255)
,`warna` varchar(30)
,`motif` varchar(30)
,`size_id` int(5)
,`keluar` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `s_masuk`
-- (See below for the actual view)
--
CREATE TABLE `s_masuk` (
`baju_id` varchar(10)
,`baju_photo` varchar(255)
,`warna` varchar(30)
,`motif` varchar(30)
,`size_id` int(5)
,`masuk` double(19,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `s_total`
-- (See below for the actual view)
--
CREATE TABLE `s_total` (
`baju_id` varchar(10)
,`motif` varchar(30)
,`baju_photo` varchar(255)
,`warna` varchar(30)
,`size_id` int(5)
,`total_saldo` double(19,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `warna_id` int(5) NOT NULL,
  `warna_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`warna_id`, `warna_nama`) VALUES
(1, 'MERAH'),
(2, 'BIRU'),
(3, 'JINGGA');

-- --------------------------------------------------------

--
-- Structure for view `s_keluar`
--
DROP TABLE IF EXISTS `s_keluar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `s_keluar`  AS  select `k`.`baju_id` AS `baju_id`,`b`.`baju_photo` AS `baju_photo`,`w`.`warna_nama` AS `warna`,`mf`.`motif_nama` AS `motif`,`k`.`size_id` AS `size_id`,if(`k`.`keluar_jumlah` is null,0,sum(`k`.`keluar_jumlah`)) AS `keluar` from (((`keluar` `k` left join `baju` `b` on(`b`.`baju_id` = `k`.`baju_id`)) left join `motif` `mf` on(`b`.`motif_id` = `mf`.`motif_id`)) left join `warna` `w` on(`b`.`warna_id` = `w`.`warna_id`)) where `k`.`pending` = 'T' group by `b`.`baju_id`,`k`.`size_id` ;

-- --------------------------------------------------------

--
-- Structure for view `s_masuk`
--
DROP TABLE IF EXISTS `s_masuk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `s_masuk`  AS  select `m`.`baju_id` AS `baju_id`,`b`.`baju_photo` AS `baju_photo`,`w`.`warna_nama` AS `warna`,`mf`.`motif_nama` AS `motif`,`m`.`size_id` AS `size_id`,if(`m`.`masuk_jumlah` is null,0,sum(`m`.`masuk_jumlah`)) AS `masuk` from (((`masuk` `m` left join `baju` `b` on(`b`.`baju_id` = `m`.`baju_id`)) left join `motif` `mf` on(`b`.`motif_id` = `mf`.`motif_id`)) left join `warna` `w` on(`b`.`warna_id` = `w`.`warna_id`)) group by `m`.`baju_id`,`m`.`size_id` ;

-- --------------------------------------------------------

--
-- Structure for view `s_total`
--
DROP TABLE IF EXISTS `s_total`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `s_total`  AS  select `m`.`baju_id` AS `baju_id`,`mf`.`motif_nama` AS `motif`,`b`.`baju_photo` AS `baju_photo`,`w`.`warna_nama` AS `warna`,`m`.`size_id` AS `size_id`,if(`k`.`keluar` is null,`m`.`masuk`,`m`.`masuk` - `k`.`keluar`) AS `total_saldo` from ((((`s_masuk` `m` left join `s_keluar` `k` on(`m`.`baju_id` = `k`.`baju_id` and `m`.`size_id` = `k`.`size_id`)) left join `baju` `b` on(`m`.`baju_id` = `b`.`baju_id`)) left join `motif` `mf` on(`b`.`motif_id` = `mf`.`motif_id`)) left join `warna` `w` on(`b`.`warna_id` = `w`.`warna_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `baju`
--
ALTER TABLE `baju`
  ADD PRIMARY KEY (`baju_id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`keluar_id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`masuk_id`);

--
-- Indexes for table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`motif_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `keluar_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `masuk_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `motif`
--
ALTER TABLE `motif`
  MODIFY `motif_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `pending_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `warna_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
