-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2023 at 01:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `advance_payment`
--

CREATE TABLE `advance_payment` (
  `advancePay_id` int(10) UNSIGNED NOT NULL,
  `advance_amount` int(11) NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_id` int(10) UNSIGNED NOT NULL,
  `name_company` varchar(255) DEFAULT NULL,
  `name_applicant` varchar(255) DEFAULT NULL,
  `nic_applicant` varchar(255) DEFAULT NULL,
  `address_applicant` varchar(255) DEFAULT NULL,
  `mobile_applicant` int(10) DEFAULT NULL,
  `landline_applicant` int(10) DEFAULT NULL,
  `email_applicant` varchar(255) DEFAULT NULL,
  `matter` varchar(255) DEFAULT NULL,
  `musical_show` varchar(255) DEFAULT NULL,
  `band` varchar(255) DEFAULT NULL,
  `singers` varchar(255) DEFAULT NULL,
  `guests` varchar(255) DEFAULT NULL,
  `audience` varchar(255) DEFAULT NULL,
  `date_application` datetime DEFAULT NULL,
  `time_application` time DEFAULT NULL,
  `lightning` varchar(255) DEFAULT NULL,
  `sound` varchar(255) DEFAULT NULL,
  `generators` varchar(255) DEFAULT NULL,
  `decorations` varchar(255) DEFAULT NULL,
  `tickets` varchar(255) DEFAULT NULL,
  `controlling_sec` varchar(255) DEFAULT NULL,
  `date_submit` date DEFAULT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `letterNo` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_id`, `name_company`, `name_applicant`, `nic_applicant`, `address_applicant`, `mobile_applicant`, `landline_applicant`, `email_applicant`, `matter`, `musical_show`, `band`, `singers`, `guests`, `audience`, `date_application`, `time_application`, `lightning`, `sound`, `generators`, `decorations`, `tickets`, `controlling_sec`, `date_submit`, `customer_id`, `letterNo`) VALUES
(2, 'rahula college', 'r.d.g.k. Athapaththu', '546739283v', 'pallimulla ,matara', 708066643, 375712345, 'athapaththu@gmail.com', '', '', '', '', '', '', '0000-00-00 00:00:00', '00:00:00', 'needed', 'needed', 'needed', 'needed', 'needed', 'needed', '2023-01-11', 1, 1),
(3, 'ibbagamuwa central collage', 'thilini premathilaka', '978654322v', 'ibbagamuwa, kurunegala', 789988443, 375814844, 'thilini@gmail.com', '', '', '', '', '', '', '0000-00-00 00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-02', 2, 2),
(4, 'st anns college', 'dmss dasanayaka', '987654345v', 'kagalla', 789988443, 375814844, 'sandu@gmail.com', '', '', '', '', '', '', '0000-00-00 00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-17', 3, 3),
(5, 'maliyadewa model', 'dilan', '987654321v', 'matara', 708066643, 375712345, 'dilankavi97@gmail.com', '', '', '', '', '', '', '0000-00-00 00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'maliyadewa model', 'pubudi dangamuwa', '546739283v', 'kandy', 875454235, 375712345, 'tharushikamendis7@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `telephone_num` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `telephone_num`, `user_id`) VALUES
(4, 'pubudi', 'dangamuwa', 875454235, 13),
(5, 'sandunika', 'dasanayaka', 764554454, 18),
(11, 'thilini', 'premathilaka', 764554454, 37),
(12, 'thilakshi', 'bowala', 763344234, 39),
(13, 'Thilini', 'premathilaka', 763344234, 40),
(14, 'tharushi', 'withanage', 763344234, 50),
(15, 'thilini', 'premathilaka', 763344234, 51);

-- --------------------------------------------------------

--
-- Table structure for table `full_payment`
--

CREATE TABLE `full_payment` (
  `fullpayment_id` int(10) UNSIGNED NOT NULL,
  `rehearsal_amount` int(11) NOT NULL,
  `decoration_amount` int(11) NOT NULL,
  `security_ammount` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `advancePay_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_table`
--

CREATE TABLE `image_table` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image_table`
--

INSERT INTO `image_table` (`img_id`, `img_name`, `img_path`) VALUES
(3, 'THAMBARAWILA', 'photo/imgK1.jpg'),
(4, 'Kanchana Anuradi @ SWARANGA', 'photo/imgS1.jpg'),
(5, 'SWARANGA @ 2020', 'photo/imgK3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `refundablecharge_process`
--

CREATE TABLE `refundablecharge_process` (
  `refundRecharge_id` int(10) UNSIGNED NOT NULL,
  `deputyRegister` text NOT NULL,
  `SD_A` text NOT NULL,
  `SD_B` text NOT NULL,
  `cheif_securty_officer` text NOT NULL,
  `VT_A` text NOT NULL,
  `VT_B` text NOT NULL,
  `audioVisual_technicalOfficer` varchar(255) NOT NULL,
  `WE_A` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `WE_B` text NOT NULL,
  `date_a` date NOT NULL,
  `working_engineer` text NOT NULL,
  `VC_A` text NOT NULL,
  `vice_chancellar` varchar(255) NOT NULL,
  `refundCallBack_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refundable_payment`
--

CREATE TABLE `refundable_payment` (
  `refundablePay_id` int(10) UNSIGNED NOT NULL,
  `refundable_amount` int(11) NOT NULL,
  `refundable_payment_status` varchar(100) NOT NULL DEFAULT 'no',
  `refundable_paymentDay` datetime NOT NULL DEFAULT current_timestamp(),
  `fullpayment_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requestletter_info`
--

CREATE TABLE `requestletter_info` (
  `letterNo` int(10) UNSIGNED NOT NULL,
  `senderAddress` varchar(255) NOT NULL,
  `letterContent` text NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT current_timestamp(),
  `signOff` varchar(255) NOT NULL,
  `is_approved` int(11) NOT NULL DEFAULT 0,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requestletter_info`
--

INSERT INTO `requestletter_info` (`letterNo`, `senderAddress`, `letterContent`, `eventName`, `eventDate`, `eventTime`, `sendDate`, `signOff`, `is_approved`, `customer_id`) VALUES
(136, 'lihiniwehera\r\nkurunegala', 'for stage drama', 'thalamalapipila', '2023-02-25', '03:00:00', '2023-02-21 00:57:19', 'Sincerly,\r\nthilini', 1, 4),
(137, 'cscs', 'szdvzv', 'v sz', '2023-02-09', '18:10:00', '2023-02-21 16:08:33', 'Sincerly,zsv s', 1, 4),
(138, 'cscs', 'szdvzv', 'v sz', '2023-02-09', '18:10:00', '2023-02-21 16:36:50', 'Sincerly,zsv s', 1, 4),
(139, 'lihiniwehera', 'for stage drrama', 'naribana', '2023-02-10', '02:54:00', '2023-02-22 10:55:02', 'Sincerly,\r\nth', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `requestrefund_info`
--

CREATE TABLE `requestrefund_info` (
  `refundCallBack_id` int(10) UNSIGNED NOT NULL,
  `sendDate_refundReq` datetime NOT NULL DEFAULT current_timestamp(),
  `refundablePay_id` int(10) UNSIGNED NOT NULL,
  `CustName` varchar(250) NOT NULL,
  `EventName` varchar(250) NOT NULL,
  `EventDate` date NOT NULL DEFAULT current_timestamp(),
  `EventTime` time NOT NULL,
  `Comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `requestrefund_info`
--

INSERT INTO `requestrefund_info` (`refundCallBack_id`, `sendDate_refundReq`, `refundablePay_id`, `CustName`, `EventName`, `EventDate`, `EventTime`, `Comment`) VALUES
(20, '2023-02-21 11:11:55', 0, 'thilini', 'maname', '2023-02-09', '03:10:00', ' '),
(21, '2023-02-21 11:13:49', 0, 'thilina', 'singhabahu', '2023-02-16', '01:15:00', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `review_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `user_review` text NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`review_id`, `user_name`, `user_rating`, `user_review`, `datetime`) VALUES
(1, 'thilini', 4, 'good', 0),
(2, 'thilini', 5, 'good', 1672796750),
(3, 'thilini', 4, 'excelent', 1673257499),
(4, 'kanishka', 0, 'very good', 1677043168);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last _name` varchar(100) NOT NULL,
  `telephone_num` int(10) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last _name`, `telephone_num`, `role_id`, `user_id`) VALUES
(1, 'gayan', 'perera', 765566765, 1, 2),
(6, 'sujeewa', '', 763344234, 2, 36),
(7, 'uddhani', '', 763344234, 5, 45),
(8, 'amila', '', 763344343, 3, 46),
(9, 'pramila', '', 763344234, 4, 47),
(10, 'pramila', '', 774809275, 6, 48);

-- --------------------------------------------------------

--
-- Table structure for table `timeallocation`
--

CREATE TABLE `timeallocation` (
  `timeallocation_id` int(10) UNSIGNED NOT NULL,
  `is_rehearsal` varchar(100) NOT NULL DEFAULT 'no',
  `rehearsal_date` date NOT NULL,
  `rehearsal_time` time NOT NULL,
  `rehearsal_hours` int(11) NOT NULL,
  `is_decoration` varchar(100) NOT NULL DEFAULT 'no',
  `decoration_date` date NOT NULL,
  `decoration_time` time NOT NULL,
  `decoration_hours` int(11) NOT NULL,
  `booking_id` int(10) UNSIGNED NOT NULL,
  `date_application` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `timeallocation`
--

INSERT INTO `timeallocation` (`timeallocation_id`, `is_rehearsal`, `rehearsal_date`, `rehearsal_time`, `rehearsal_hours`, `is_decoration`, `decoration_date`, `decoration_time`, `decoration_hours`, `booking_id`, `date_application`) VALUES
(1, 'no', '0000-00-00', '00:00:00', 0, 'no', '0000-00-00', '00:00:00', 0, 1, '2023-01-04 07:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `verification_status` int(11) NOT NULL,
  `resettoken` varchar(50) NOT NULL,
  `resettokenexp` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `role_id`, `username`, `email`, `password`, `verification_id`, `verification_status`, `resettoken`, `resettokenexp`) VALUES
(2, 1, 'gayan', 'gayan@egmail.com', '1234', '', 1, '', '2023-01-10'),
(13, 0, 'pubudi', 'pubudidng@gmail.com', '1234', 'f424191b0385948046d63aef37adeff4', 1, '', '2023-01-10'),
(18, 0, 'sandu', 'sandudasanayaka98@gmail.com', '1234', 'e2dde034f5d7944f83d0d046bdd327e3', 1, '', '2023-01-10'),
(36, 2, 'sujeewa', 'tharushikamendis7@gmail.com', '1234', 'b8c6f76e831f2c3667ebec50e27e7143', 1, '', '2023-01-13'),
(39, 0, 'THILAKSHI', 'tsandaminibowala@gmail.com', 'Thilakshi1*', '9fadcd88a30c34743222cbd1a7beb69d', 1, '', '2023-02-20'),
(45, 5, 'uddhani', 'bowalathilakshi@gmail.com', 'THI123@', '2b322cec347284940718d090c5944f72', 1, '', '2023-02-21'),
(46, 3, 'amila', 'amilagunasena@gmail.com', 'Amila123@', 'b105b5c308760e5050501c3c6401fa88', 1, '', '2023-02-21'),
(47, 4, 'priyasanka', 'bogahawatta1996@gmail.com', 'priya123@', '17cf5100d39ceb7e31435e83177f6c33', 1, '', '2023-02-21'),
(48, 6, 'sanka', 'bogahawatta96@gmail.com', 'sanka123@', 'ebea5f9569e66bfb1a1b6f7657dff3e4', 1, '', '2023-02-21'),
(51, 0, 'thilini', 'thilinipremathilaka97@gmail.com', 'Thilini20100*', '79598e7604a38113e8ba4e0fad465eab', 1, '', '2023-02-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advance_payment`
--
ALTER TABLE `advance_payment`
  ADD PRIMARY KEY (`advancePay_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `full_payment`
--
ALTER TABLE `full_payment`
  ADD PRIMARY KEY (`fullpayment_id`);

--
-- Indexes for table `image_table`
--
ALTER TABLE `image_table`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `refundablecharge_process`
--
ALTER TABLE `refundablecharge_process`
  ADD PRIMARY KEY (`refundRecharge_id`);

--
-- Indexes for table `refundable_payment`
--
ALTER TABLE `refundable_payment`
  ADD PRIMARY KEY (`refundablePay_id`);

--
-- Indexes for table `requestletter_info`
--
ALTER TABLE `requestletter_info`
  ADD PRIMARY KEY (`letterNo`);

--
-- Indexes for table `requestrefund_info`
--
ALTER TABLE `requestrefund_info`
  ADD PRIMARY KEY (`refundCallBack_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `timeallocation`
--
ALTER TABLE `timeallocation`
  ADD PRIMARY KEY (`timeallocation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advance_payment`
--
ALTER TABLE `advance_payment`
  MODIFY `advancePay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `full_payment`
--
ALTER TABLE `full_payment`
  MODIFY `fullpayment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_table`
--
ALTER TABLE `image_table`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `refundablecharge_process`
--
ALTER TABLE `refundablecharge_process`
  MODIFY `refundRecharge_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `refundable_payment`
--
ALTER TABLE `refundable_payment`
  MODIFY `refundablePay_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requestletter_info`
--
ALTER TABLE `requestletter_info`
  MODIFY `letterNo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `requestrefund_info`
--
ALTER TABLE `requestrefund_info`
  MODIFY `refundCallBack_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `timeallocation`
--
ALTER TABLE `timeallocation`
  MODIFY `timeallocation_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
