-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 22, 2019 at 02:48 AM
-- Server version: 5.7.24-log
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Nut', 1),
(2, 'Bolt', 1),
(3, 'Washer', 1),
(4, 'Screw', 1),
(5, 'Bit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_id`, `name`, `email`, `subject`, `message`, `date_time`, `status`) VALUES
(1, 1, 'balram', 'balram@gmail.com', 'hi', 'qwerty', '2019-08-18 10:21:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE `parts` (
  `id` int(11) NOT NULL,
  `category_id` smallint(6) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `part_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `category_id`, `part_name`, `part_no`, `description`, `quantity`, `image`, `date_time`, `status`) VALUES
(1, 1, 'JIS Nut Stainless', 'NJ10X', 'Left Hand Nut made of stainless steel', 220, 'NJ10x1.25SS Stainless B1181 Metric Wrench14JIS Nut.jpg', '2019-08-18 01:17:19', 1),
(2, 1, 'Keps K Lock', 'KP-224', 'Keps K Lock Nuts 18/8 Stainless Steel', 150, 'index.jpg', '2019-08-18 01:18:58', 1),
(3, 2, 'JIS Hex Bolt', 'BJ10X', 'BJ10X1.25X20 BelMetric', 0, 'BJ10x1.25x20.jpg', '2019-08-18 01:21:02', 1),
(4, 2, 'Hurricane', 'A2-70', 'Stainless Stell Hex Bolts ', 555, 'nuts-and-bolts-making-machines-produce-stainless.jpg', '2019-08-18 01:22:51', 1),
(5, 3, 'Cut Washer', 'ZP-0922', '3/8 inch zinc plated cut washer', 1500, 'everbilt-flat-washers-807210-64_1000.jpg', '2019-08-18 01:24:02', 1),
(6, 3, 'Dottie', 'LW10', 'Dottie LW10 Zinc Plated Steel Split Lock Washer', 445, 'P481172.jpg', '2019-08-18 01:25:10', 1),
(7, 4, 'Pan Head', 'PH-801', '8 x 3/4 in. Stainless Steel Phillips Pan-Head Drive Sheet Metal Screw', 55, 'everbilt-sheet-metal-screws-800182-64_400_compressed.jpg', '2019-08-18 01:26:42', 1),
(8, 4, 'Spiral Screw', 'OI-145', 'Titanium Carbonated Spiral Screw 1.5 inch Long', 25, '61uZVVzGvfL._SL1500_.jpg', '2019-08-18 01:28:02', 1),
(9, 5, 'HSS Bit', 'DR-35-55', 'Metric HSS Brad Point Drill Bits', 15, '55175-01-1000_1.jpg', '2019-08-18 01:29:08', 1),
(10, 5, 'Wooden Bit', 'WDR-33', 'Wooden Drill Bit 3 inch Long', 35, 'kisspng-drill-bit-sizes-augers-tool-masonry-drill-bit-5b218e7261d9f3.1263307415289258104008.jpg', '2019-08-18 01:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `part_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `part_id`, `quantity`, `date_time`, `status`) VALUES
(1, 1, 1, 225, '2019-08-18 01:33:14', 0),
(2, 1, 3, 10, '2019-08-18 10:15:46', 1),
(3, 2, 3, 10, '2019-08-18 10:15:46', 1),
(4, 1, 3, 10, '2019-08-21 22:34:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `date_time`, `status`) VALUES
(1, 'John', 'Doe', 'john@doe.com', '123123', '2019-08-18 01:11:27', 1),
(2, 'Jane', 'Smith', 'jane@smith.com', '123123', '2019-08-18 01:11:37', 1),
(3, 'John', 'Smith', 'john@smith.com', '123123123', '2019-08-18 01:12:06', 1),
(4, 'Jane', 'Doe', 'jane@doe.com', '123456', '2019-08-18 01:12:17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parts`
--
ALTER TABLE `parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
