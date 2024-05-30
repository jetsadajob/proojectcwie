-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 05:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_acceptance_form`
--

CREATE TABLE `student_acceptance_form` (
  `acceptance_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `acceptance_agency_name` varchar(45) NOT NULL,
  `acceptance_address` varchar(45) NOT NULL,
  `acceptance_subdistrict` varchar(45) NOT NULL,
  `acceptance_district` varchar(45) NOT NULL,
  `acceptance_province` varchar(45) NOT NULL,
  `acceptance_zip` varchar(45) NOT NULL,
  `acceptance_phone` varchar(45) NOT NULL,
  `acceptance_fax` varchar(45) NOT NULL,
  `acceptance_website` varchar(45) NOT NULL,
  `acceptance_status_type` varchar(45) NOT NULL,
  `acceptance_prefix` varchar(45) NOT NULL,
  `acceptance_fname` varchar(45) NOT NULL,
  `acceptance_lname` varchar(45) NOT NULL,
  `acceptance_receiving_department` varchar(45) NOT NULL,
  `acceptance_job_description` varchar(45) NOT NULL,
  `acceptance_coordinator_fname` varchar(45) NOT NULL,
  `acceptance_coordinator_lname` varchar(45) NOT NULL,
  `acceptance_coordinator_position` varchar(45) NOT NULL,
  `acceptance_coordinator_phone` varchar(45) NOT NULL,
  `acceptance_coordinator_fax` varchar(45) NOT NULL,
  `acceptance_coordinator_email` varchar(45) NOT NULL,
  `acceptance_welfare_status` varchar(45) NOT NULL,
  `acceptance_signature_img` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_acceptance_form`
--

INSERT INTO `student_acceptance_form` (`acceptance_id`, `acceptance_agency_name`, `acceptance_address`, `acceptance_subdistrict`, `acceptance_district`, `acceptance_province`, `acceptance_zip`, `acceptance_phone`, `acceptance_fax`, `acceptance_website`, `acceptance_status_type`, `acceptance_prefix`, `acceptance_fname`, `acceptance_lname`, `acceptance_receiving_department`, `acceptance_job_description`, `acceptance_coordinator_fname`, `acceptance_coordinator_lname`, `acceptance_coordinator_position`, `acceptance_coordinator_phone`, `acceptance_coordinator_fax`, `acceptance_coordinator_email`, `acceptance_welfare_status`, `acceptance_signature_img`, `created_at`, `updated_at`, `delete_at`) VALUES
(0000000001, 'YG', '12', 'เมือง', 'เมือง', 'ขอนแก่น', '40000', '0990765446', '0431234567', 'www.yg.com', 'on', 'miss', 'นิภาภัทร', 'นระทัด', 'SA', 'Testcase', 'รัตนธิดา', 'นันทบัน', 'PM', '0983738890', '-', 'mary@gmail.com', 'on', NULL, '2023-12-26 10:24:28', NULL, NULL),
(0000000002, 'YG', '12', 'เมือง', 'เมือง', 'ขอนแก่น', '40000', '0990765446', '0431234567', 'www.yg.com', 'ยินดีรับ', 'นางสาว', 'นิภาภัทร', 'นระทัด', 'SA', 'Front-end', 'รัตนธิดา', 'นันทบัน', 'PM', '0983738890', '043567891', 'mary@gmail.com', 'ไม่มี', '../uploads/_ (1).jpeg', '2023-12-26 16:26:23', NULL, NULL),
(0000000003, 'YG', '12', 'เมือง', 'เมือง', 'ขอนแก่น', '40000', '0990765446', '0431234567', 'www.yg.com', 'ยินดีรับ', 'นางสาว', 'นิภาภัทร', 'นระทัด', 'TT', 'TT', 'รัตนธิดา', 'นันทบัน', 'PM', '0983738890', '-', 'mary@gmail.com', 'ไม่มี', '../uploads/_ (2).jpeg', '2024-01-08 14:15:07', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_acceptance_form`
--
ALTER TABLE `student_acceptance_form`
  ADD PRIMARY KEY (`acceptance_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_acceptance_form`
--
ALTER TABLE `student_acceptance_form`
  MODIFY `acceptance_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
