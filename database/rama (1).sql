-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 07:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rama`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(2) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `username`, `password`) VALUES
(2, 'ms', 'meetsakariya111@gmail.com', 'ams', '123'),
(3, 'Ms Sakariya2', 'shubham@gmail.com', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(5) NOT NULL,
  `appointment_no` int(7) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sid` int(5) NOT NULL,
  `bid` int(2) NOT NULL,
  `pid` int(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `contact` bigint(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `appointment_no`, `name`, `email`, `sid`, `bid`, `pid`, `status`, `date`, `contact`, `comment`, `remark`) VALUES
(5, 241543898, 'mS sakariya', '', 1000, 6, 20070, '', '2023-08-24', 9725419289, '', ''),
(6, 104445135, 'parth', '', 1000, 6, 20037, 'reject', '2023-08-15', 9725419289, '', 'nnnnn'),
(7, 345182932, 'Ms Sakariya', '', 1000, 6, 20036, 'reject', '2023-08-17', 9725419289, 'nnn', ''),
(8, 382496122, 'parth', '', 1000, 6, 20037, 'reject', '2023-08-23', 9725419289, 'Hello selle', 'byyy'),
(9, 402816156, 'parth', '', 3, 6, 20037, 'reject', '2023-08-23', 9725419289, 'Hello selle', 'no worry'),
(10, 644419739, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(11, 724859680, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(12, 581013778, 'parth', '', 3, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(13, 615902604, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(14, 210649004, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(15, 392768691, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(16, 254529880, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(17, 773653097, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(18, 850277356, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(19, 607150827, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(20, 217234825, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(21, 587610911, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(22, 328075523, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(23, 636283002, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(24, 202871620, 'parth', '', 1000, 6, 20037, 'pending', '2023-08-23', 9725419289, 'Hello selle', ''),
(39, 577061144, 'Ms Sakariya', '', 1000, 6, 20070, 'accept', '2023-08-17', 9898332288, 'jbkb', ''),
(97, 516741180, 'meet sakariya', 'meetsakariya101@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(98, 856594128, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(99, 828156602, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(100, 993257682, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(101, 716301882, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(102, 894352493, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(103, 174778589, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(104, 594922595, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(105, 837072283, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', ''),
(106, 859053502, 'meet sakariya', 'meetssakariya@gmail.com', 1000, 6, 20070, 'pending', '2023-09-12', 9725419289, 'asap inform me.', '');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `bid` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` bigint(13) NOT NULL,
  `password` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `username`, `email`, `contact`, `password`) VALUES
(3, 'm2', 'l@g.co', 1234554321, 123),
(5, 'ps', 'ps@gmail.com', 123456789, 123),
(6, 'meet', 'meetsakariya1100@gmail.com', 9898989899, 123),
(7, 'Ms Sakariya', 'meetsakariya21@gmail.com', 1234521, 120),
(8, 'Ms Sakariya', 'shubham@gmail.com', 12233, 120);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(3) NOT NULL,
  `maincat` varchar(30) NOT NULL,
  `subcat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `maincat`, `subcat`) VALUES
(8, 'Resident', 'Apparatment'),
(9, 'Resident', 'Villa'),
(10, 'Resident', 'Bunglow'),
(11, 'Resident', 'Mansion');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(5) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `state`, `city`) VALUES
(8, 'Gujarat', 'Rajkot'),
(9, 'Maharashtra', 'mumbai'),
(14, 'Gujarat', 'jetpur'),
(15, 'Gujarat', 'dhoraji'),
(27, 'Kerala', ''),
(28, 'Gujarat', 'jamnagar');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Ms Sakariya', 'meetsakariya111@gmail.com', 'mmmmmmmmmm', 'hhgvv'),
(2, 'Ms Sakariya', 'meetsakariya111@gmail.com', 'mmmmmmmmmm', 'hhgvv'),
(3, 'Ms Sakariya', 'meetsakariya111@gmail.com', 'xsacsa', 'jjnnn'),
(4, 'Ms Sakariya', 'meetsakariya111@gmail.com', 'xsacsa', 'jjnnn'),
(5, 'Ms Sakariya', 'meetsakariya1100@gmail.com', 'no subject', 'no'),
(6, 'Ms Sakariya', 'meetsakariya1100@gmail.com', 'no subject', 'no'),
(7, 'Ms Sakariya', 'meetsakariya1100@gmail.com', 'no subject', 'no'),
(8, 'Ms Sakariya', 'meetsakariya1100@gmail.com', 'no subject', 'no'),
(9, 'parth', 'parth@gmail.com', 'parth', 'parth'),
(10, 'parth', 'parth@gmail.com', 'parth', 'parth');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(4) NOT NULL,
  `sid` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `ptype` varchar(15) NOT NULL,
  `bhk` varchar(5) NOT NULL,
  `sell_type` varchar(6) NOT NULL,
  `esta_year` year(4) NOT NULL,
  `bed` int(2) NOT NULL,
  `bath` int(2) NOT NULL,
  `flatfloor` int(2) NOT NULL,
  `furnished` varchar(3) NOT NULL,
  `city` varchar(15) NOT NULL,
  `location` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `area` int(11) NOT NULL,
  `price` int(10) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `sid`, `title`, `ptype`, `bhk`, `sell_type`, `esta_year`, `bed`, `bath`, `flatfloor`, `furnished`, `city`, `location`, `address`, `area`, `price`, `image1`, `image2`, `image3`, `image4`) VALUES
(100000, 0, 'mmm', 'nnn', '21', 'new', '2021', 12, 0, 0, 'yes', 'rajkot', 'mmm', 'mmmm', 120, 100000, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_basicinfo`
--

CREATE TABLE `property_basicinfo` (
  `pid` int(5) NOT NULL,
  `sid` int(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `furnished` varchar(10) NOT NULL,
  `beds` int(2) NOT NULL,
  `baths` int(2) NOT NULL,
  `floor` int(2) NOT NULL,
  `sell_type` varchar(6) NOT NULL,
  `esta_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_basicinfo`
--

INSERT INTO `property_basicinfo` (`pid`, `sid`, `title`, `ptype`, `furnished`, `beds`, `baths`, `floor`, `sell_type`, `esta_year`) VALUES
(20037, 1000, 'kkkk', 'Villa', 'no', 21, 22, 2, 'resell', '2021'),
(20070, 1000, 'Madhav Mahal 2      ', 'Villa', 'no', 10, 20, 10, 'resell', '2019'),
(20071, 1000, 'Dhamo don', 'Bunglow', 'yes', 21, 20, 5, 'new', '2014'),
(20083, 1000, 'mmm', 'Villa', 'no', 21, 2, 2, 'resell', '2021'),
(20089, 3, 'admin', 'Bungalow', 'no', 2, 0, 0, 'resell', '2019'),
(20090, 3, 'admin2', 'Mansion', 'yes', 10, 5, 4, 'resell', '2019');

-- --------------------------------------------------------

--
-- Table structure for table `property_img`
--

CREATE TABLE `property_img` (
  `pid` int(5) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_img`
--

INSERT INTO `property_img` (`pid`, `image1`, `image2`, `image3`, `image4`) VALUES
(20037, 'admin/property_image/seller/20037/pexels-vecislavas-popa-1643383.jpg', 'admin/property_image/seller/20037/pexels-mark-mccammon-2724749.jpg', 'admin/property_image/seller/20037/pexels-mark-mccammon-2724749.jpg', 'admin/property_image/seller/20037/pexels-benjamin-suter-3617496.jpg'),
(20070, 'admin/property_image/seller/20070/pexels-pixabay-259962.jpg', 'admin/property_image/seller/20070/pexels-pixabay-259962.jpg', 'admin/property_image/seller/20070/pexels-terry-magallanes-2631746.jpg', 'admin/property_image/seller/20070/pexels-binyamin-mellish-186077.jpg'),
(20071, 'admin/property_image/seller/20071/image.webp', 'admin/property_image/seller/20071/home-design.jpg', 'admin/property_image/seller/20071/dining-hall-interior-designing-services-500x500.webp', 'admin/property_image/seller/20071/dining-hall-interior-designing-services-500x500.webp'),
(20083, 'admin/property_image/seller/20083/e71bbc_4716b180bddc43c0888ba95b52c15408~mv2.webp', 'admin/property_image/seller/20083/e71bbc_4716b180bddc43c0888ba95b52c15408~mv2.webp', 'admin/property_image/seller/20083/03+Office+2+copy.jpg', 'admin/property_image/seller/20083/image.webp'),
(20089, 'admin/property_image/Admin/20089/images(4).jpeg', 'admin/property_image/Admin/20089/images10.jpeg', 'admin/property_image/Admin/20089/images9.jpeg', 'admin/property_image/Admin/20089/images12.jpeg'),
(20090, 'admin/property_image/Admin/20090/images(2).jpg', 'admin/property_image/Admin/20090/de324414fe348b6dc08feced4a7a2894.jpg', 'admin/property_image/Admin/20090/homemakeover-asianpaints.webp', 'admin/property_image/Admin/20090/living-2.webp'),
(20091, 'admin/property_image/seller/20091/', 'admin/property_image/seller/20091/', 'admin/property_image/seller/20091/', 'admin/property_image/seller/20091/');

-- --------------------------------------------------------

--
-- Table structure for table `property_prc_loc`
--

CREATE TABLE `property_prc_loc` (
  `pid` int(5) NOT NULL,
  `area` int(10) NOT NULL,
  `price` int(14) NOT NULL,
  `state` varchar(10) NOT NULL,
  `city` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_prc_loc`
--

INSERT INTO `property_prc_loc` (`pid`, `area`, `price`, `state`, `city`, `location`, `address`) VALUES
(20037, 1200000, 100000000, 'maharashtr', 'Mumbai', 'rajkot', 'jjjjj'),
(20070, 210, 5000210, 'gujarat   ', 'Rajkot       ', 'Yogi Nagar 2     ', 'house no. 10, street no. 3,alpan society,yogi nagar,rajkot'),
(20071, 5000, 4000000, 'gujarat', 'Rajkot', 'Jamkandorana', '2,50,150 FOOT RING ROAD'),
(20083, 1200000, 2100000, 'maharashtr', 'surat', 'udhana vilalge ', 'surat,surat'),
(20089, 600, 90000000, 'Gujarat', 'Mumbai', 'Versova', 'WRJC+3QJ, Nariman Point, Mumbai, Maharashtra 400021'),
(20090, 250, 2500000, 'gujarat', 'jamnagar', 'jamngar', 'jamnagar'),
(20091, 1200000, 210, 'Gujarat', 'Rajkot', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `sid` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contact` bigint(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`sid`, `username`, `contact`, `email`, `password`) VALUES
(1000, 'seller', 1234567890, 'jokag43057@wlmycn.com', 123),
(100008, 'seller2', 1234567800, 'seller2@gmail.com', 123),
(100009, 'seller3', 1456200789, 'seller3@gmail.com', 123),
(100010, 'ms', 2147483647, 'meetsakariya111@gmail.com', 1230),
(100011, 'Ms Sakariya22', 1234567852, 'meetsakariya120@gmail.com', 120),
(100012, 'Ms Sakariya222', 2145685200, 'meetsakariya101222@gmail.', 222),
(100013, 'Ms Sakariya2', 1234567562, 'meetsakariya1111@gmail.co', 120);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `usertype` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(13) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `usertype`, `email`, `contact`, `password`) VALUES
(1000, 'seller', 'seller', 'seller@gmail.com', 9876543210, '120'),
(1001, 'Ms Sakariy', 'seller', 'meetsakariya111@gmail.com', 1234567890, '120'),
(1002, 'Ms Sakariya', 'buyer', 'meetsakariya111@gmail.com', 1234567890, '120');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wid` int(5) NOT NULL,
  `pid` int(4) NOT NULL,
  `bid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wid`, `pid`, `bid`) VALUES
(58, 20070, 6),
(59, 20037, 1000),
(60, 20037, 6),
(61, 20089, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `uid` (`bid`),
  ADD KEY `appoinment_no` (`appointment_no`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `property_basicinfo`
--
ALTER TABLE `property_basicinfo`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `property_img`
--
ALTER TABLE `property_img`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `property_prc_loc`
--
ALTER TABLE `property_prc_loc`
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `bid` (`bid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `bid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_basicinfo`
--
ALTER TABLE `property_basicinfo`
  MODIFY `pid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20093;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `sid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100014;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
