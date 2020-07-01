-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 06, 2019 at 04:23 AM
-- Server version: 10.2.26-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tipslife_tipslife_agnih`
--

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `profile_id` varchar(240) NOT NULL,
  `username` varchar(240) NOT NULL,
  `full_name` text NOT NULL,
  `last_name` text NOT NULL,
  `password` varchar(240) NOT NULL,
  `email` varchar(240) NOT NULL,
  `position` varchar(50) NOT NULL,
  `product` text NOT NULL,
  `date_of_birth` text NOT NULL,
  `mobile_no` text NOT NULL,
  `back_name` text NOT NULL,
  `account_no` text NOT NULL,
  `branch_name` text NOT NULL,
  `ifsc` text NOT NULL,
  `address` text NOT NULL,
  `is_blocked` varchar(20) NOT NULL DEFAULT 'no',
  `sponsor_referral_id` int(11) NOT NULL,
  `sponsor_referral_profile_id` varchar(240) NOT NULL,
  `profile_image` text NOT NULL,
  `payment_type` int(11) NOT NULL,
  `active_on` text NOT NULL,
  `created_on` varchar(240) NOT NULL,
  `update_on` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `profile_id`, `username`, `full_name`, `last_name`, `password`, `email`, `position`, `product`, `date_of_birth`, `mobile_no`, `back_name`, `account_no`, `branch_name`, `ifsc`, `address`, `is_blocked`, `sponsor_referral_id`, `sponsor_referral_profile_id`, `profile_image`, `payment_type`, `active_on`, `created_on`, `update_on`) VALUES
(6, '03D6BD7D6', 'krgsekaran', 'K.GNANASEKARAN', 'K.GNANASEKARAN', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'krgsekaran@gmail.com', '1', '1', '24/11/1971', '9442616021', 'UNION BANK OF INDIA', '548802010006893', 'Main namkkal', 'UBINOO544880', '2/630.kosavampatti\r\nNamakkal', 'no', 0, '', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567059921', '2019-08-29 11:43:50', ''),
(7, 'B618E1647', 'KONDAPPAN', 'M.S.KONDAPPAN', 'M.S.KONDAPPAN', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kondappan.ms@gmail.com', '2', '1', '08-29-2019', '9150099125', 'STATE BANK OF INDIA', '33285543141', 'KAMARJAPURAM', 'SBIN0006845', 'Mallur\r\nSalem', 'no', 6, '03D6BD7D6', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567244500', '2019-08-29 13:46:21', ''),
(8, '6F50A9FC8', 'S.GOKILAM', 'T.C.SELVARAJU', 'T.C.SELVARAJU', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'krgsekaran@gmail.com', '1', '1', '08-29-2019', '9442160646', 'IOB', '09560101330', 'CHITHALANTHUR', '956', 'Chithalandhur\r\nThiruchengod', 'yes', 6, '03D6BD7D6', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567067334', '2019-08-29 13:58:54', ''),
(9, 'D78409129', 'D.LAKSHMI', 'VARALAKSHMI. D', 'VARALAKSHMI.D', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'krgsekaran@gmail.com', '1', '1', '08-29-2019', '9443930559', 'SBI', '32717113481', 'THIRUCHENGOD', 'SBIN000968', 'Thiruchengod', 'yes', 6, '03D6BD7D6', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567069428', '2019-08-29 14:33:48', ''),
(10, '1539615E10', 'PRABHA.R', 'PRABHAVATHI', 'PRABHAVATHI.R', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'krgsekaran@gmail.com', '2', '1', '08-29-2019', '9843737754', 'IOB', '2318010000008682', 'SPP COLONY', '2318', 'SPP.COLONY', 'yes', 6, '03D6BD7D6', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567070381', '2019-08-29 14:49:41', ''),
(11, 'E2DA996D11', 'PRIYA.S', 'PRIYA.S', 'PRIYA.S', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'krgsekaran@gmail.com', '2', '1', 'Select Date', '8686416oo2', 'Canarabank', '04288253029', 'Canara bank thevanakurichi', 'CIBN450', 'Thevanankurichi', 'yes', 6, '03D6BD7D6', '[{\"profile_image\":\"default.jpg\",\"thumb\":\"default_thumb.jpg\"}]', 1, '1567071078', '2019-08-29 15:01:18', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
