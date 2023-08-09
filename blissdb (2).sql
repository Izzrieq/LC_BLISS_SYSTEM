-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 08:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blissdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `best`
--

CREATE TABLE `best` (
  `lcid` longtext NOT NULL,
  `principal` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaintbliss`
--

CREATE TABLE `complaintbliss` (
  `id` int(5) NOT NULL,
  `date` datetime DEFAULT NULL,
  `cname` varchar(25) DEFAULT NULL,
  `cnohp` varchar(15) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `details` mediumtext DEFAULT NULL,
  `lcid` varchar(50) DEFAULT NULL,
  `lcowner` varchar(25) DEFAULT NULL,
  `ownernohp` varchar(15) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `complaintbliss`
--

INSERT INTO `complaintbliss` (`id`, `date`, `cname`, `cnohp`, `category`, `type`, `details`, `lcid`, `lcowner`, `ownernohp`, `status`) VALUES
(1, '2023-08-08 12:51:05', 'izz', '011-234-4564', 'complaint', 'management', 'a            ', 'shah alam', 'anas', '012-546-7847', NULL),
(2, '2023-08-09 09:03:16', 'anas', '012-234-6789', 'complaint', 'management', '            ccxAXaxaxxa', 'kelantan', 'coqan', '012-333-4444', NULL),
(3, '2023-08-09 09:06:44', 'testingg', '011-222-3333', 'complaint', 'sales', '            sgsfsf', 'johor', 'testing123', '012-345-6789', NULL),
(4, '2023-08-09 09:26:47', 'Anas', '019-470-0983', 'suggestion', 'sales', 'kkjkhjk', 'LC SHAH ALAM', 'IZZ', '011-222-3020', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lcdetails`
--

CREATE TABLE `lcdetails` (
  `id` int(3) NOT NULL,
  `stateid` varchar(5) NOT NULL,
  `bizstype` varchar(2) NOT NULL,
  `lcid` varchar(255) NOT NULL,
  `operatorname` varchar(255) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `yearsigned` year(4) NOT NULL,
  `datesigned` date NOT NULL,
  `dateoperated` date NOT NULL,
  `tlcppackage` varchar(255) NOT NULL,
  `annuallicense` varchar(255) NOT NULL,
  `eduemail` varchar(255) NOT NULL,
  `kindername` varchar(255) NOT NULL,
  `kindernohp` varchar(14) NOT NULL,
  `noblock` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postcode` int(6) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `operatornohp` varchar(255) NOT NULL,
  `operatoraddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lcdetails`
--

INSERT INTO `lcdetails` (`id`, `stateid`, `bizstype`, `lcid`, `operatorname`, `ownername`, `status`, `yearsigned`, `datesigned`, `dateoperated`, `tlcppackage`, `annuallicense`, `eduemail`, `kindername`, `kindernohp`, `noblock`, `street`, `postcode`, `city`, `state`, `type`, `operatornohp`, `operatoraddress`) VALUES
(1, 'SEL', 'B', 'LC SEL Jalan Pualam', 'Sabariah Faridah Binti Jamaluddin', 'Sabariah Faridah Binti Jamaluddin', 'Operate', '2005', '0000-00-00', '0000-00-00', ' -   ', ' -   ', 'k.seksyen7@littlecaliphs.edu.my', 'Tadika Rama Rama Bistari', '013-362 5593', 'No 2, Jalan Pualam 2 7/32B, Seksyen 7, 40000 Shah Alam, Selangor', '', 0, '', '', 'Extension D', '013-2896500', 'No. 4, Bukit Raja Business Park, Jalan Keluli 7/109, 40000 Shah Alam, Selangor'),
(2, 'SEL', 'L', 'LC SEL Taman TTDI Jaya', 'T. Jamaliah Binti Tengku Ismail', 'T. Jamaliah Binti Tengku Ismail', 'Operate', '2009', '0000-00-00', '0000-00-00', '', ' 10 ', 'ttdijaya@littlecaliphs.edu.my', 'Tadika Khalifah Cilik Mayang Sari', '012-2198234', 'No.1, Jalan Esei 1 U2/41A, Taman TTDI Jaya, 40150 Shah Alam, Selangor', '', 0, '', '', 'Extension D', '012-3852696', 'No. 9, Jalan Adang U8/17, Bukit Jelutong, 40150 Shah Alam, Selangor'),
(3, 'SEL', 'L', 'LC SEL Jalan Platinum', 'T. Jamaliah Binti Tengku Ismail', 'T. Jamaliah Binti Tengku Ismail', 'Operate', '2009', '0000-00-00', '0000-00-00', '', ' 10 ', 'jlnplatinum@littlecaliphs.edu.my', 'Tadika Anak Bestari Platinum', '019-9471707', 'No. 28, Jalan Platinum 7/43D, Seksyen 7, 40000 Shah Alam, Selangor', '', 0, '', '', 'Extension D', '012-3852696', 'No. 9, Jalan Adang U8/17, Bukit Jelutong, 40150 Shah Alam, Selangor'),
(4, 'SEL', 'L', 'LC SEL Setia Alam', 'T. Jamaliah Binti Tengku Ismail', 'T. Jamaliah Binti Tengku Ismail', 'Operate', '2009', '0000-00-00', '0000-00-00', '', ' 10 ', 'setiaalam@littlecaliphs.edu.my', 'Tadika Khalifah Impian', '012-3852696', 'No. 1, Jalan Setia Impian U13/6A, Seksyen U13, 40170 Shah Alam, Selangor', '', 0, '', '', 'Extension D', '012-3852696', 'No. 9, Jalan Adang U8/17, Bukit Jelutong, 40150 Shah Alam, Selangor');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `nama` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `lcid` longtext NOT NULL,
  `owner` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `detailcomplain` longtext NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'naqib', 'naqib123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `best`
--
ALTER TABLE `best`
  ADD PRIMARY KEY (`principal`),
  ADD KEY `lcid` (`lcid`(768));

--
-- Indexes for table `complaintbliss`
--
ALTER TABLE `complaintbliss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lcid` (`lcid`);

--
-- Indexes for table `lcdetails`
--
ALTER TABLE `lcdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lcid` (`lcid`) USING BTREE;

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`nama`),
  ADD KEY `lcid` (`lcid`(768));

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaintbliss`
--
ALTER TABLE `complaintbliss`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lcdetails`
--
ALTER TABLE `lcdetails`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lcdetails`
--
ALTER TABLE `lcdetails`
  ADD CONSTRAINT `lcdetails_ibfk_1` FOREIGN KEY (`id`) REFERENCES `complaintbliss` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
