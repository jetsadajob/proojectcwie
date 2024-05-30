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
-- Table structure for table `coop_supervision_recording_staff_form`
--

CREATE TABLE `coop_supervision_recording_staff_form` (
  `coop_supervision_recording_staff_form_id` int(11) NOT NULL,
  `company_std_name` varchar(45) NOT NULL,
  `company_std_id` varchar(45) NOT NULL,
  `company_field_of_study` varchar(45) NOT NULL,
  `company_job_responsibility` float NOT NULL,
  `company_enthusiasm` float NOT NULL,
  `company_quality_of_work` float NOT NULL,
  `company_take_time_to_work` float NOT NULL,
  `company_operation` float NOT NULL,
  `company_use_knowledge` float NOT NULL,
  `company_apply_knowledge` float NOT NULL,
  `company_expertise_in_operations` float NOT NULL,
  `company_the_ability_to_plan` float NOT NULL,
  `company_interested_in_studying` float NOT NULL,
  `company_work_according_to_the_rules` float NOT NULL,
  `company_come_to_work_on_time` float NOT NULL,
  `company_give_respect` float NOT NULL,
  `company_be_diligent` float NOT NULL,
  `company_have_morals` float NOT NULL,
  `company_have_initiative` float NOT NULL,
  `company_have_confidence` float NOT NULL,
  `company_behave_appropriately` float NOT NULL,
  `company_work_as_a_team` float NOT NULL,
  `company_use_organizational_resource` float NOT NULL,
  `company_quality_of_student` float NOT NULL,
  `company_additional_suggestions` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coop_supervision_recording_staff_form`
--

INSERT INTO `coop_supervision_recording_staff_form` (`coop_supervision_recording_staff_form_id`, `company_std_name`, `company_std_id`, `company_field_of_study`, `company_job_responsibility`, `company_enthusiasm`, `company_quality_of_work`, `company_take_time_to_work`, `company_operation`, `company_use_knowledge`, `company_apply_knowledge`, `company_expertise_in_operations`, `company_the_ability_to_plan`, `company_interested_in_studying`, `company_work_according_to_the_rules`, `company_come_to_work_on_time`, `company_give_respect`, `company_be_diligent`, `company_have_morals`, `company_have_initiative`, `company_have_confidence`, `company_behave_appropriately`, `company_work_as_a_team`, `company_use_organizational_resource`, `company_quality_of_student`, `company_additional_suggestions`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'rr', '633021089-0', 'วิทยาการคอมพิวเตอร์', 5, 2, 3, 4, 1, 5, 5, 1, 2, 4, 5, 3, 3, 4, 2, 1, 5, 5, 5, 4, 3, 'ไม่มี', '2024-01-08 15:05:23', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coop_supervision_recording_staff_form`
--
ALTER TABLE `coop_supervision_recording_staff_form`
  ADD PRIMARY KEY (`coop_supervision_recording_staff_form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coop_supervision_recording_staff_form`
--
ALTER TABLE `coop_supervision_recording_staff_form`
  MODIFY `coop_supervision_recording_staff_form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
