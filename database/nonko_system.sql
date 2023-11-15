-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 08:01 AM
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
-- Database: `nonko_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `avinsurance`
--

CREATE TABLE `avinsurance` (
  `insurance_id` int(255) NOT NULL,
  `insurance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avinsurance`
--

INSERT INTO `avinsurance` (`insurance_id`, `insurance`) VALUES
(4, 'RSSB'),
(5, 'SORASI'),
(6, 'RADIANT');

-- --------------------------------------------------------

--
-- Table structure for table `famownerinfo`
--

CREATE TABLE `famownerinfo` (
  `fo_id` int(255) NOT NULL,
  `fa_firstname` text NOT NULL,
  `fa_lastname` text NOT NULL,
  `insurance` varchar(255) NOT NULL,
  `insurance_nber` varchar(255) DEFAULT NULL,
  `placeOf_grade` varchar(255) NOT NULL,
  `grade_nber` varchar(20) NOT NULL,
  `fa_telephone` varchar(10) NOT NULL,
  `fa_nat_id` varchar(255) DEFAULT NULL,
  `fa_pass_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `famownerinfo`
--

INSERT INTO `famownerinfo` (`fo_id`, `fa_firstname`, `fa_lastname`, `insurance`, `insurance_nber`, `placeOf_grade`, `grade_nber`, `fa_telephone`, `fa_nat_id`, `fa_pass_id`, `username`, `date`) VALUES
(47, 'Muhire', 'Christian', 'RADIANT', '112004433', 'Nyamasheke', 'fourth grade(4)', '0788324343', '1200580040914023', '', 'sample', '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `fam_childs`
--

CREATE TABLE `fam_childs` (
  `ch_id` int(255) NOT NULL,
  `ch_firstname` text NOT NULL,
  `ch_lastname` text NOT NULL,
  `ch_insurance` varchar(255) NOT NULL,
  `ch_insurance_nber` varchar(255) DEFAULT NULL,
  `ch_nat_id` varchar(255) DEFAULT NULL,
  `ch_pass_id` varchar(255) DEFAULT NULL,
  `fo_id` int(255) NOT NULL,
  `father` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam_childs`
--

INSERT INTO `fam_childs` (`ch_id`, `ch_firstname`, `ch_lastname`, `ch_insurance`, `ch_insurance_nber`, `ch_nat_id`, `ch_pass_id`, `fo_id`, `father`, `username`) VALUES
(31, 'dusange', 'toussaint', 'RSSB', '1004453', '', '', 47, 'Muhire Christian', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `fam_location`
--

CREATE TABLE `fam_location` (
  `loc_id` int(255) NOT NULL,
  `country` text NOT NULL DEFAULT 'RWANDA',
  `province` text NOT NULL,
  `district` text NOT NULL,
  `sector` text NOT NULL,
  `cell` text NOT NULL,
  `village` text NOT NULL,
  `fam_owners` text NOT NULL,
  `fo_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam_location`
--

INSERT INTO `fam_location` (`loc_id`, `country`, `province`, `district`, `sector`, `cell`, `village`, `fam_owners`, `fo_id`, `username`) VALUES
(19, 'RWANDA', 'EAST', 'ruhango', 'mutunda', 'amahoro', 'kabogora', 'Muhire Christian', 47, 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `fam_members`
--

CREATE TABLE `fam_members` (
  `m_id` int(255) NOT NULL,
  `m_firstname` text NOT NULL,
  `m_lastname` text NOT NULL,
  `m_insurance` varchar(255) NOT NULL,
  `m_insurance_nber` varchar(255) DEFAULT NULL,
  `m_nat_id` varchar(255) DEFAULT NULL,
  `m_pass_id` varchar(255) DEFAULT NULL,
  `fo_id` int(255) NOT NULL,
  `fam_owner` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam_members`
--

INSERT INTO `fam_members` (`m_id`, `m_firstname`, `m_lastname`, `m_insurance`, `m_insurance_nber`, `m_nat_id`, `m_pass_id`, `fo_id`, `fam_owner`, `username`) VALUES
(5, 'motari', 'jospin', 'RADIANT', 'H64747', '1200180040914017', '2378237HGSF', 47, 'Muhire Christian', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `fam_wife`
--

CREATE TABLE `fam_wife` (
  `wife_id` int(255) NOT NULL,
  `wife_firstname` text NOT NULL,
  `wife_lastname` text NOT NULL,
  `wife_insurance` varchar(255) NOT NULL,
  `wife_insurance_nber` varchar(255) DEFAULT NULL,
  `wife_telephone` varchar(10) NOT NULL,
  `wife_nat_id` varchar(255) DEFAULT NULL,
  `wife_pass_id` varchar(255) DEFAULT NULL,
  `fo_id` int(255) NOT NULL,
  `husband` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fam_wife`
--

INSERT INTO `fam_wife` (`wife_id`, `wife_firstname`, `wife_lastname`, `wife_insurance`, `wife_insurance_nber`, `wife_telephone`, `wife_nat_id`, `wife_pass_id`, `fo_id`, `husband`, `username`) VALUES
(11, 'ndutira', 'divine', 'RADIANT', '10023445', '0733344566', '11536343456456', 'HHS23423AD', 47, 'Muhire Christian', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `second_admin`
--

CREATE TABLE `second_admin` (
  `sec_id` int(255) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `email`, `password`) VALUES
(13, 'sample', 'sample@gmail.com', '202cb962ac59075b964b07152d234b70'),
(14, 'michel', 'michel@gmail.com', '202cb962ac59075b964b07152d234b70'),
(15, 'offman', 'off@gmail.com', '129a47d506ccad443d897f695d43a4f5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `avinsurance`
--
ALTER TABLE `avinsurance`
  ADD PRIMARY KEY (`insurance_id`);

--
-- Indexes for table `famownerinfo`
--
ALTER TABLE `famownerinfo`
  ADD PRIMARY KEY (`fo_id`);

--
-- Indexes for table `fam_childs`
--
ALTER TABLE `fam_childs`
  ADD PRIMARY KEY (`ch_id`),
  ADD KEY `fo_id` (`fo_id`);

--
-- Indexes for table `fam_location`
--
ALTER TABLE `fam_location`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `fo_id` (`fo_id`);

--
-- Indexes for table `fam_members`
--
ALTER TABLE `fam_members`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `fo_id` (`fo_id`);

--
-- Indexes for table `fam_wife`
--
ALTER TABLE `fam_wife`
  ADD PRIMARY KEY (`wife_id`),
  ADD KEY `fo_id` (`fo_id`);

--
-- Indexes for table `second_admin`
--
ALTER TABLE `second_admin`
  ADD PRIMARY KEY (`sec_id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `avinsurance`
--
ALTER TABLE `avinsurance`
  MODIFY `insurance_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `famownerinfo`
--
ALTER TABLE `famownerinfo`
  MODIFY `fo_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `fam_childs`
--
ALTER TABLE `fam_childs`
  MODIFY `ch_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fam_location`
--
ALTER TABLE `fam_location`
  MODIFY `loc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fam_members`
--
ALTER TABLE `fam_members`
  MODIFY `m_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fam_wife`
--
ALTER TABLE `fam_wife`
  MODIFY `wife_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `second_admin`
--
ALTER TABLE `second_admin`
  MODIFY `sec_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fam_childs`
--
ALTER TABLE `fam_childs`
  ADD CONSTRAINT `fam_childs_ibfk_2` FOREIGN KEY (`fo_id`) REFERENCES `famownerinfo` (`fo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fam_location`
--
ALTER TABLE `fam_location`
  ADD CONSTRAINT `fam_location_ibfk_1` FOREIGN KEY (`fo_id`) REFERENCES `famownerinfo` (`fo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fam_members`
--
ALTER TABLE `fam_members`
  ADD CONSTRAINT `fam_members_ibfk_1` FOREIGN KEY (`fo_id`) REFERENCES `famownerinfo` (`fo_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fam_wife`
--
ALTER TABLE `fam_wife`
  ADD CONSTRAINT `fam_wife_ibfk_2` FOREIGN KEY (`fo_id`) REFERENCES `famownerinfo` (`fo_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
