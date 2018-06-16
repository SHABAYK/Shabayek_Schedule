-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2018 at 11:19 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scheduale`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `faculty_course_id` int(11) NOT NULL,
  `semester_id` int(11) DEFAULT NULL,
  `no_of_lectures` int(11) NOT NULL DEFAULT '1',
  `no_of_doctors` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `faculty_course_id`, `semester_id`, `no_of_lectures`, `no_of_doctors`, `created_at`, `updated_at`) VALUES
(3, 6, 5, 1, 1, '2018-04-07 16:55:16', '2018-04-07 16:55:16'),
(4, 5, 4, 1, 1, '2018-04-07 16:56:01', '2018-04-07 16:57:06'),
(5, 7, 4, 2, 2, '2018-04-07 16:59:21', '2018-04-07 17:05:13'),
(6, 8, 4, 1, 1, '2018-04-07 17:11:38', '2018-04-07 17:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `courses_doctor`
--

CREATE TABLE `courses_doctor` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `day_week_id` int(11) NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses_doctor`
--

INSERT INTO `courses_doctor` (`id`, `doctor_id`, `course_id`, `hall_id`, `day_week_id`, `start_at`, `end_at`) VALUES
(1, 1, 3, 1, 2, '09:00:00', '11:00:00'),
(2, 3, 4, 2, 6, '11:00:00', '13:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses_student`
--

CREATE TABLE `courses_student` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dayof_week`
--

CREATE TABLE `dayof_week` (
  `id` int(11) NOT NULL,
  `day` enum('Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday') CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dayof_week`
--

INSERT INTO `dayof_week` (`id`, `day`, `created_at`, `updated_at`) VALUES
(1, 'Saturday', NULL, NULL),
(2, 'Sunday', NULL, NULL),
(3, 'Monday', NULL, NULL),
(4, 'Tuesday', NULL, NULL),
(5, 'Wednesday', NULL, NULL),
(6, 'Thursday', NULL, NULL),
(7, 'Friday', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `degrees`
--

CREATE TABLE `degrees` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `research_area_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `degrees`
--

INSERT INTO `degrees` (`id`, `doctor_id`, `research_area_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2018-04-05 13:19:51', '2018-04-05 13:35:17'),
(3, 1, 3, '2018-04-05 13:35:00', '2018-04-05 13:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `academic_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 3, 'IS', '2018-04-02 14:01:12', '2018-04-02 14:01:12'),
(7, 2, 'CS', '2018-04-02 14:11:33', '2018-04-02 14:11:33'),
(8, 18, 'IT', '2018-04-02 14:11:42', '2018-04-02 14:11:42'),
(9, 4, 'General', '2018-04-02 14:12:29', '2018-04-02 14:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `hiring_info_id` int(11) NOT NULL,
  `priorty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `dept_id`, `hiring_info_id`, `priorty`, `created_at`, `updated_at`) VALUES
(1, 17, 7, 1, 1, '2018-06-02 21:56:16', '2018-04-05 12:23:48'),
(3, 20, 2, 2, 4, '2018-06-02 21:56:28', '2018-04-05 12:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_request`
--

CREATE TABLE `doctor_request` (
  `id` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `doctor_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `course_title` varchar(250) CHARACTER SET utf8 NOT NULL,
  `dept_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `prerequisite_course` varchar(200) CHARACTER SET utf8 NOT NULL,
  `level` int(11) NOT NULL,
  `day` varchar(150) CHARACTER SET utf8 NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `lec_hour` int(11) NOT NULL,
  `state` enum('accept','reject','pending') CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_request`
--

INSERT INTO `doctor_request` (`id`, `semester_id`, `doctor_name`, `course_title`, `dept_title`, `prerequisite_course`, `level`, `day`, `start_at`, `end_at`, `lec_hour`, `state`, `created_at`, `updated_at`) VALUES
(1, 6, 'Manal AbdEl Kadr', 'Data Mining', 'IS', 'Data Mining', 3, 'Sunday', '09:00:00', '13:00:00', 2, 'pending', '2018-06-09 08:41:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_courses`
--

CREATE TABLE `faculty_courses` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `prerequisite_id` int(11) DEFAULT NULL,
  `research_area_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_courses`
--

INSERT INTO `faculty_courses` (`id`, `dept_id`, `prerequisite_id`, `research_area_id`, `title`, `level`, `credit_hours`, `created_at`, `updated_at`) VALUES
(5, 2, 5, 1, 'Data Mining', 3, 3, '2018-04-03 13:41:56', '2018-06-02 22:11:55'),
(6, 2, 6, 2, 'Quality', 3, 3, '2018-04-03 13:49:14', '2018-06-02 22:12:17'),
(7, 9, 7, 3, 'Data Structure', 2, 3, '2018-04-07 16:58:30', '2018-06-02 22:12:40'),
(8, 2, 8, 1, 'Internet Application', 3, 3, '2018-04-07 17:10:32', '2018-06-02 22:13:20');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `doctor_name` varchar(200) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `calss_grade` int(11) DEFAULT NULL,
  `practical` int(11) DEFAULT NULL,
  `final` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `graduation_project`
--

CREATE TABLE `graduation_project` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `graduation_project_details`
--

CREATE TABLE `graduation_project_details` (
  `id` int(11) NOT NULL,
  `GP_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `grade` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `halls`
--

INSERT INTO `halls` (`id`, `title`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'H1', 300, '2018-04-03 11:53:02', '2018-04-03 11:53:02'),
(2, 'H2', 300, '2018-04-03 11:53:15', '2018-04-03 11:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `hiring_info`
--

CREATE TABLE `hiring_info` (
  `id` int(11) NOT NULL,
  `hiring_degree` enum('master','doctor','prof.doctor','professor') DEFAULT NULL,
  `hiring_date` date DEFAULT NULL,
  `last_degree` enum('master','doctor','prof.doctor','professor') DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `lastest_degree` enum('master','doctor','prof.doctor','professor') DEFAULT NULL,
  `lastest_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hiring_info`
--

INSERT INTO `hiring_info` (`id`, `hiring_degree`, `hiring_date`, `last_degree`, `last_date`, `lastest_degree`, `lastest_date`, `created_at`, `updated_at`) VALUES
(1, 'master', '2018-04-06', 'prof.doctor', '2014-05-20', 'professor', '2010-05-15', '2018-04-05 11:44:23', '2018-04-05 12:00:09'),
(2, 'doctor', '2018-04-05', '', '2014-04-05', NULL, NULL, '2018-04-05 11:45:24', '2018-04-05 12:01:55'),
(3, 'prof.doctor', '2018-09-10', 'professor', NULL, 'doctor', NULL, '2018-04-05 12:02:29', '2018-04-05 12:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration_courses`
--

CREATE TABLE `registration_courses` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `student_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `doctor_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `course_title` varchar(200) CHARACTER SET utf8 NOT NULL,
  `class_grade` int(11) NOT NULL,
  `practical` int(11) NOT NULL,
  `final` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` varchar(200) NOT NULL,
  `updated_by` varchar(200) NOT NULL,
  `deleted_by` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_time`
--

CREATE TABLE `registration_time` (
  `id` int(11) NOT NULL,
  `start_regstudent_date` date NOT NULL,
  `end_regstudent_date` date NOT NULL,
  `start_regdoctor_date` date NOT NULL,
  `end_regdoctor_date` date NOT NULL,
  `start_semester_date` date NOT NULL,
  `end_semester_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration_time`
--

INSERT INTO `registration_time` (`id`, `start_regstudent_date`, `end_regstudent_date`, `start_regdoctor_date`, `end_regdoctor_date`, `start_semester_date`, `end_semester_date`, `created_at`, `updated_at`) VALUES
(1, '2018-09-01', '2018-09-10', '2018-08-01', '2018-08-10', '2018-09-19', '2019-01-30', '2018-04-03 10:16:08', '2018-04-03 11:10:46'),
(2, '2019-01-28', '2019-02-10', '2019-01-10', '2019-01-20', '2019-02-01', '2019-05-20', '2018-04-03 11:18:21', '2018-04-03 11:18:21'),
(3, '2020-09-15', '2020-09-25', '2020-08-15', '2020-08-25', '2020-09-30', '2021-01-20', '2018-04-03 14:25:47', '2018-04-03 14:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `research_area`
--

CREATE TABLE `research_area` (
  `id` int(11) NOT NULL,
  `specialization_major` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research_area`
--

INSERT INTO `research_area` (`id`, `specialization_major`, `created_at`, `updated_at`) VALUES
(1, 'Data mining', '2018-04-03 12:33:21', '2018-04-03 12:34:06'),
(2, 'Quality', '2018-04-03 12:33:30', '2018-04-03 12:33:30'),
(3, 'Machine Language', '2018-04-05 13:34:44', '2018-04-05 13:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(11) NOT NULL,
  `registertime_id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `year_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `registertime_id`, `title`, `year_id`, `created_at`, `updated_at`) VALUES
(4, 3, 'Semester one', 2, '2018-04-07 15:45:00', '2018-04-07 15:45:00'),
(5, 2, 'Semester Two', 1, '2018-04-07 15:46:45', '2018-04-07 15:46:45'),
(6, 1, 'Semester 1', 1, '2018-04-10 13:14:48', '2018-04-10 13:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `credit_hours` int(11) NOT NULL,
  `entry_date` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `dept_id`, `credit_hours`, `entry_date`, `created_at`, `updated_at`) VALUES
(1, 19, 2, 140, 2014, '2018-04-02 19:25:42', '2018-04-02 19:25:42'),
(2, 16, 9, 18, 2018, '2018-04-02 19:26:59', '2018-04-02 19:26:59');

-- --------------------------------------------------------

--
-- Table structure for table `urls`
--

CREATE TABLE `urls` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `page_url_encrypt` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `type` enum('admin','manager','academic','doctor','student') NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `username`, `email`, `password`, `mobile`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahmed Badwi', 'admin@admin.com', '$2y$10$ti/WeDcls66V6AWgTPN.EO0tSemJpBFqLmhbbS.vpKCUqC6VbgW1G', 10000, 'admin', 'eVnJWWEt7iCfH66C0fKXAdbILP8bACjzlxlybJe1mZAU8a3VG9IXuxfSOn4P', '2018-03-31 16:51:07', '2018-03-31 16:51:07'),
(2, 3, 'Abd EL Gfar', 'abdelgfar@fcih.com', '$2y$10$gMTh299Z8Ede0cHlAd2Nj.CNDT71IzTmxVazuGDx0sqVBfaD/oO7y', 1122334455, 'academic', 'NkABnwF8YbsihL3XUgHSAiWCcHBpkBUhI8NYkvSWHddqHep4p1nmMd7TxVCc', '2018-03-31 19:56:08', '2018-03-31 20:00:03'),
(3, 3, 'Manal AbdEl Kadr', 'manal@fcih.com', '$2y$10$/lJQX.Y6M6JjWocxItMl5.1B2zZGuBNRfHCNv3c0V8atn.dePmI5u', 55566677, 'academic', 'ygYGkqvCtDI20lmvBHYgYnfAt0wrNTjHceIcyZDzp7B4Wik25eHRLuQp7uDs', '2018-04-01 13:23:15', '2018-04-01 13:25:39'),
(4, 3, 'osama emam', 'osama@fcih.com', '$2y$10$EKzepmkmgdcelve.1Ik83eOxiarZO9Hy/L5C7skfHx3XfoTwlqMDW', 1234567, 'academic', 'pKXUlGtFNzKSYtXWF0O2YK0r3rvNfiUyOIXEVA8x7XC3tGuEU1Q2akGdKGNq', '2018-04-01 13:26:15', '2018-04-01 13:28:08'),
(7, 2, 'Ali Nagi', 'ali@manager.com', '$2y$10$DIGHh87JZdNE5LaWMRljheWhDiWoCeGh99NDkYaYEJq4O7F5uc34S', 123456, 'manager', 'KUX6sWd5lhtc7XFOVmqJVh94JE157tWpufDUG4aYMv9t5SZ4gcdZYQhrrW7M', '2018-04-01 14:07:11', '2018-04-03 14:32:23'),
(8, 2, 'test', 'test@test.com', '$2y$10$gucXJ6AYGl5et5svv63UNuTg4JnsrDk1BfF0DNaMwMZH/6kjM9gZW', 234567, 'manager', 'Nswev4YQtAycpUxuLRxAjbZc46V4eLhrtYIxTtInEt7A8c61pLbdw1XbNMhn', '2018-04-01 14:19:43', '2018-04-01 14:25:51'),
(14, 2, 'test3', 'test3@tst.com', '$2y$10$HiqQ5oAUvAAXsTNH3yKzGO0OgpCcUHpt9KtFhSz1waFJJkEKgyHJ.', 1234567890, 'manager', NULL, '2018-04-01 19:16:25', '2018-04-01 19:16:25'),
(15, 1, 'Ali Nagi', 'ali@fcih.com', '$2y$10$vPsnhB2JIKtBRymp0KYbDOvATgLzf3qYn3juf.PsBfoekEUAZSVl6', 1234567891, 'admin', 'mInFDI0q6KGmxaiUfn50TxQNf67eiIs6Jl3si54cxvh3LPmfDGb1skOzQdTb', '2018-04-02 11:37:19', '2018-04-02 11:37:19'),
(16, 5, 'Student', 'student@fcih.com', '$2y$10$RPY8LjVi5JBirT9EKxx4yuD0CZF8ESjdTsx48cU6MFSeEgNqslL4W', 1234567891, 'student', 'iM4WWXfXd74Qv6Z8MseCMEluJKMPeYB9rU4yBHdtHYiefmSJc5NU9Qd1efBK', '2018-04-02 11:42:46', '2018-04-02 11:42:46'),
(17, 4, 'Walid Yousef', 'walid@fcih.com', '$2y$10$DW.7e/YkM4ae2EU7yRndxejaD8CYahHrnq0Kf8FsHSa06hZvLlRkO', 1234567891, 'doctor', 'JAyuchC9DpvHroa9hiuTjY3rBEyPJW9I8FWyJ1PqEiie6nnuRegrbalENE28', '2018-04-02 11:44:21', '2018-04-02 11:44:21'),
(18, 3, 'Alya', 'alyaa@fcih.com', '$2y$10$0zGY2Hrhhp4uUvmmKhUC3uaW/DkdnUJfH48COhRZpY8gPe4ewJ3IW', 1234567891, 'academic', NULL, '2018-04-02 14:03:56', '2018-04-02 14:03:56'),
(19, 5, 'Ali Nagi Mohamed', 'alinagi@student.com', '$2y$10$chcDmS4eRdO/euQ9CdhBBeaqRCkp6KC5Yg7kHFuT96MZqoB9Ej2Sy', 1234567891, 'student', '4y7RY6vJaFn3vQF3udpNBnkEUr5aydnkzhdihmeJx77Q9VYeSAq4SOAwQXJe', '2018-04-02 16:47:58', '2018-04-12 11:38:56'),
(20, 4, 'Manal AbdEl Kadr', 'manal@doctor.com', '$2y$10$EOJoRTkUiiV6g5uzTbOenOUtCQOFxTQHwEzHt9vtiv4Dp.KW.romC', 123456789, 'doctor', NULL, '2018-04-05 12:24:29', '2018-04-05 12:24:29'),
(21, 4, 'alfadly', 'alfadly@fcih.com', '$2y$10$ahpyRNzmVtnkQpk3Ar/Vn.4miW1.wBA0dDI/yuYxDN.JVifJY3lWG', 12345678, 'doctor', NULL, '2018-04-11 05:01:52', '2018-04-11 05:01:52'),
(22, 4, 'SHABAYK', 'sh@gmail.com', '$2y$10$R8fD3hdWyxZzTUH11UJXzeSmPrKSnJOI2euXeZOyMUX6Q.XvNlRYy', 246810, 'admin', NULL, '2018-06-02 20:39:41', '2018-06-02 20:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` int(11) NOT NULL,
  `type` enum('admin','manager','academic','doctor','student') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-03-31 16:44:15', '2018-03-31 16:44:15'),
(2, 'manager', '2018-03-31 16:44:34', '2018-03-31 16:44:34'),
(3, 'academic', '2018-03-31 16:44:46', '2018-03-31 16:44:46'),
(4, 'doctor', '2018-03-31 16:44:56', '2018-03-31 16:44:56'),
(5, 'student', '2018-03-31 16:45:04', '2018-03-31 16:45:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_type_url`
--

CREATE TABLE `user_type_url` (
  `id` int(11) NOT NULL,
  `url_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `work_day`
--

CREATE TABLE `work_day` (
  `id` int(11) NOT NULL,
  `day_week_id` int(11) NOT NULL,
  `start_at` time NOT NULL,
  `end_at` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_day`
--

INSERT INTO `work_day` (`id`, `day_week_id`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 2, '08:00:00', '16:00:00', '2018-04-07 16:29:33', '2018-04-07 16:34:43'),
(2, 3, '08:00:00', '18:00:00', '2018-06-02 23:44:30', '2018-06-02 23:44:30');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, 2019, '2018-04-07 15:21:28', '2018-04-07 15:25:49'),
(2, 2020, '2018-04-07 15:25:39', '2018-04-07 15:25:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_course_id` (`faculty_course_id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `courses_doctor`
--
ALTER TABLE `courses_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `hall_id` (`hall_id`),
  ADD KEY `day_week_id` (`day_week_id`) USING BTREE;

--
-- Indexes for table `courses_student`
--
ALTER TABLE `courses_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `dayof_week`
--
ALTER TABLE `dayof_week`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `degrees`
--
ALTER TABLE `degrees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `research_area_id` (`research_area_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_id` (`academic_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `hiring_info_id` (`hiring_info_id`);

--
-- Indexes for table `doctor_request`
--
ALTER TABLE `doctor_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `semester_id` (`semester_id`);

--
-- Indexes for table `faculty_courses`
--
ALTER TABLE `faculty_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `research_area_id` (`research_area_id`),
  ADD KEY `prerequisite_id` (`prerequisite_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `graduation_project`
--
ALTER TABLE `graduation_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `semester_id` (`year_id`);

--
-- Indexes for table `graduation_project_details`
--
ALTER TABLE `graduation_project_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `GP_id` (`GP_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `hiring_info`
--
ALTER TABLE `hiring_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_courses`
--
ALTER TABLE `registration_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `registration_time`
--
ALTER TABLE `registration_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_area`
--
ALTER TABLE `research_area`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specialization_major` (`specialization_major`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registertime_id` (`registertime_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`) USING BTREE,
  ADD KEY `students_dept_id_foreign` (`dept_id`);

--
-- Indexes for table `urls`
--
ALTER TABLE `urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type_url`
--
ALTER TABLE `user_type_url`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_id` (`url_id`),
  ADD KEY `user_type_id` (`user_type_id`);

--
-- Indexes for table `work_day`
--
ALTER TABLE `work_day`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day_week_id_2` (`day_week_id`),
  ADD KEY `day_week_id` (`day_week_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `courses_doctor`
--
ALTER TABLE `courses_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `courses_student`
--
ALTER TABLE `courses_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dayof_week`
--
ALTER TABLE `dayof_week`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `degrees`
--
ALTER TABLE `degrees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `doctor_request`
--
ALTER TABLE `doctor_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faculty_courses`
--
ALTER TABLE `faculty_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `graduation_project`
--
ALTER TABLE `graduation_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `graduation_project_details`
--
ALTER TABLE `graduation_project_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hiring_info`
--
ALTER TABLE `hiring_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration_courses`
--
ALTER TABLE `registration_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `registration_time`
--
ALTER TABLE `registration_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `research_area`
--
ALTER TABLE `research_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `urls`
--
ALTER TABLE `urls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_type_url`
--
ALTER TABLE `user_type_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `work_day`
--
ALTER TABLE `work_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`faculty_course_id`) REFERENCES `faculty_courses` (`id`),
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `courses_doctor`
--
ALTER TABLE `courses_doctor`
  ADD CONSTRAINT `courses_doctor_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `courses_doctor_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `courses_doctor_ibfk_3` FOREIGN KEY (`hall_id`) REFERENCES `halls` (`id`),
  ADD CONSTRAINT `courses_doctor_ibfk_4` FOREIGN KEY (`day_week_id`) REFERENCES `dayof_week` (`id`);

--
-- Constraints for table `courses_student`
--
ALTER TABLE `courses_student`
  ADD CONSTRAINT `courses_student_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `courses_student_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `courses_student_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `degrees`
--
ALTER TABLE `degrees`
  ADD CONSTRAINT `degrees_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `degrees_ibfk_2` FOREIGN KEY (`research_area_id`) REFERENCES `research_area` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `academic_id` FOREIGN KEY (`academic_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `doctors_ibfk_2` FOREIGN KEY (`hiring_info_id`) REFERENCES `hiring_info` (`id`),
  ADD CONSTRAINT `doctors_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `doctor_request`
--
ALTER TABLE `doctor_request`
  ADD CONSTRAINT `doctor_request_ibfk_1` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `faculty_courses`
--
ALTER TABLE `faculty_courses`
  ADD CONSTRAINT `faculty_courses_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_courses_ibfk_2` FOREIGN KEY (`research_area_id`) REFERENCES `research_area` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `faculty_courses_ibfk_3` FOREIGN KEY (`prerequisite_id`) REFERENCES `faculty_courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `graduation_project`
--
ALTER TABLE `graduation_project`
  ADD CONSTRAINT `graduation_project_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `graduation_project_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `graduation_project_details`
--
ALTER TABLE `graduation_project_details`
  ADD CONSTRAINT `graduation_project_details_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `graduation_project_details_ibfk_2` FOREIGN KEY (`GP_id`) REFERENCES `graduation_project` (`id`),
  ADD CONSTRAINT `graduation_project_details_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `registration_courses`
--
ALTER TABLE `registration_courses`
  ADD CONSTRAINT `registration_courses_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `registration_courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `registration_courses_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `semesters`
--
ALTER TABLE `semesters`
  ADD CONSTRAINT `semesters_ibfk_1` FOREIGN KEY (`registertime_id`) REFERENCES `registration_time` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `semesters_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_dept_id_foreign` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `user_type_url`
--
ALTER TABLE `user_type_url`
  ADD CONSTRAINT `user_type_url_ibfk_1` FOREIGN KEY (`url_id`) REFERENCES `urls` (`id`),
  ADD CONSTRAINT `user_type_url_ibfk_2` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`);

--
-- Constraints for table `work_day`
--
ALTER TABLE `work_day`
  ADD CONSTRAINT `work_day_ibfk_1` FOREIGN KEY (`day_week_id`) REFERENCES `dayof_week` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
