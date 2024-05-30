-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2024 at 05:42 PM
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
-- Table structure for table `coop_supervision_recording_teacher_form`
--

CREATE TABLE `coop_supervision_recording_teacher_form` (
  `coop_supervision_recording_teacher_ form_id` int(11) NOT NULL,
  `teacher_company_name` varchar(45) NOT NULL,
  `teacher_location` varchar(45) NOT NULL,
  `teacher_province` varchar(45) NOT NULL,
  `teacher_supervision_date` date NOT NULL,
  `teacher_student_amount` float NOT NULL,
  `teacher_list_of_student` varchar(255) NOT NULL,
  `teacher_signature` varchar(255) NOT NULL,
  `teacher_list` varchar(255) NOT NULL,
  `teacher_std_name` varchar(45) NOT NULL,
  `teacher_std_id` varchar(45) NOT NULL,
  `teacher_field_of_study` varchar(45) NOT NULL,
  `teacher_adapt_to_the_organization` float NOT NULL,
  `teacher_learn_from_assigned_tasks` float NOT NULL,
  `teacher_nature_of_assigned_work` float NOT NULL,
  `teacher_knowledge` float NOT NULL,
  `teacher_participation_with_the_organization` float NOT NULL,
  `teacher_student_satisfaction` float NOT NULL,
  `teacher_satisfaction_with_welfare_received` float NOT NULL,
  `teacher_additional_suggestions` varchar(255) NOT NULL,
  `teacher_company_name_two` varchar(45) NOT NULL,
  `teacher_executive` float NOT NULL,
  `teacher_human_resources_officer` float NOT NULL,
  `teacher_job_supervisor` float NOT NULL,
  `teacher_workload` float NOT NULL,
  `teacher_quality_of_work` float NOT NULL,
  `teacher_the_work_is_safe` float NOT NULL,
  `teacher_coordination` float NOT NULL,
  `teacher_there_is_an_orientation` float NOT NULL,
  `teacher_staff_taking_care_of_students` float NOT NULL,
  `teacher_staff_is_knowledgeable` float NOT NULL,
  `teacher_staff_have_time_for_students` float NOT NULL,
  `teacher_staff_assigns_work` float NOT NULL,
  `teacher_work_plan_is_prepared` float NOT NULL,
  `teacher_there_is_compensation` float NOT NULL,
  `teacher_provide_welfare` float NOT NULL,
  `teacher_there_is_equipment_readiness` float NOT NULL,
  `teacher_give_importance_to_evaluation` float NOT NULL,
  `teacher_overall_quality` float NOT NULL,
  `teacher_additional_suggestions_two` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `delete_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coop_supervision_recording_teacher_form`
--

INSERT INTO `coop_supervision_recording_teacher_form` (`coop_supervision_recording_teacher_ form_id`, `teacher_company_name`, `teacher_location`, `teacher_province`, `teacher_supervision_date`, `teacher_student_amount`, `teacher_list_of_student`, `teacher_signature`, `teacher_list`, `teacher_std_name`, `teacher_std_id`, `teacher_field_of_study`, `teacher_adapt_to_the_organization`, `teacher_learn_from_assigned_tasks`, `teacher_nature_of_assigned_work`, `teacher_knowledge`, `teacher_participation_with_the_organization`, `teacher_student_satisfaction`, `teacher_satisfaction_with_welfare_received`, `teacher_additional_suggestions`, `teacher_company_name_two`, `teacher_executive`, `teacher_human_resources_officer`, `teacher_job_supervisor`, `teacher_workload`, `teacher_quality_of_work`, `teacher_the_work_is_safe`, `teacher_coordination`, `teacher_there_is_an_orientation`, `teacher_staff_taking_care_of_students`, `teacher_staff_is_knowledgeable`, `teacher_staff_have_time_for_students`, `teacher_staff_assigns_work`, `teacher_work_plan_is_prepared`, `teacher_there_is_compensation`, `teacher_provide_welfare`, `teacher_there_is_equipment_readiness`, `teacher_give_importance_to_evaluation`, `teacher_overall_quality`, `teacher_additional_suggestions_two`, `created_at`, `updated_at`, `delete_at`) VALUES
(1, 'ss', 'ss', 'ss', '2024-01-13', 1, 'พพ', '', 'qq', 'qq', '63303303033', 'it', 5, 3, 4, 1, 2, 5, 3, 'ไม่มี', 'CP', 1, 4, 5, 4, 2, 3, 4, 5, 1, 2, 3, 5, 3, 1, 5, 5, 2, 3, 'ศึกษาเพิ่มเติม', '2024-01-05 07:56:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'gg', 'gg', 'gg', '2024-01-05', 1, 'gg', '', 'rr', 'rr', '63303303033', 'cs', 5, 4, 2, 3, 1, 4, 5, 'ไม่มี', 'ss', 5, 3, 1, 4, 2, 5, 3, 2, 5, 4, 3, 1, 2, 4, 5, 3, 2, 3, 'ไม่มี', '2024-01-08 14:11:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coop_supervision_recording_teacher_form`
--
ALTER TABLE `coop_supervision_recording_teacher_form`
  ADD PRIMARY KEY (`coop_supervision_recording_teacher_ form_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coop_supervision_recording_teacher_form`
--
ALTER TABLE `coop_supervision_recording_teacher_form`
  MODIFY `coop_supervision_recording_teacher_ form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
