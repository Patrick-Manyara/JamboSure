-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2023 at 08:51 AM
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
-- Database: `psychx_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_privileges` text DEFAULT NULL,
  `admin_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_privileges`, `admin_date_created`) VALUES
('ADM20220830AS7yer1', 'PsychX', 'dashboard@psychx.io', '$2y$11$ZQLAdU1rr/yF.k8/82J/I.UKQ/7p2r3sO8fXI8vUArhbVbTMEkEv2', 'super', '2023-01-12 13:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` varchar(255) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_description` text DEFAULT NULL,
  `banner_poster` text NOT NULL,
  `banner_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `bookmark_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `therapist_id` varchar(255) NOT NULL,
  `bookmark_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`bookmark_id`, `user_id`, `device_id`, `therapist_id`, `bookmark_date_created`) VALUES
('BKM202307034EiqRej', '', '12950d4e-1ff2-4f31-b327-ea70d211c872', 'Fb3l9TcLHvN', '2023-07-03 14:05:58'),
('BKM20230703L6ERqYl', '', '12950d4e-1ff2-4f31-b327-ea70d211c872', '2uNpbEZ0Rht', '2023-07-03 14:06:39'),
('BKM20230703u5qzDi6', '', '12950d4e-1ff2-4f31-b327-ea70d211c872', 'THP20230702lvnUipA', '2023-07-03 14:05:53'),
('BKM202307050jPoB2I', '', '109b2762-1ba6-4ee5-ad17-3252f0949d95', '2DE0jeYUufC', '2023-07-05 22:57:42'),
('BKM202307059jEq8p3', 'USR20230705g04Pu5a', '7da437ef-9a1d-47ec-aa48-b089b200724e', '7cDtAlKLsSI', '2023-07-05 13:42:39'),
('BKM20230705BsWXJKm', '', '109b2762-1ba6-4ee5-ad17-3252f0949d95', '4KnW7mNrHdY', '2023-07-05 22:57:43'),
('BKM20230705FqmgY9U', '0VK7FPymEhq', '', '7cDtAlKLsSI', '2023-07-05 22:56:52'),
('BKM20230705Yl782zh', '', '0842ec03-8d9b-4df1-928e-94a097192b2d', 'Fb3l9TcLHvN', '2023-07-05 13:05:01'),
('BKM20230707rEuhy5w', '', 'af75b43f-b2b7-4857-9ccf-920d03009d22', '2DE0jeYUufC', '2023-07-07 17:02:47'),
('BKM202307138DlSyiA', '', '219e4b6d-44be-4f1c-ba03-cf010a55d43b', 'DBk3Ro29htf', '2023-07-13 19:30:25'),
('BKM202307145xZvDgu', '', '4169618a-de1c-4a4d-9c71-ff02d26a50d0', 'Fb3l9TcLHvN', '2023-07-14 23:18:10'),
('BKM20230720BL4sxe2', '', '2130e1de-14f9-4533-9417-5faf61b91d57', 'THP20230615Q3fHXbd', '2023-07-20 10:10:09'),
('BKM20230720EK6UN4t', '', '2130e1de-14f9-4533-9417-5faf61b91d57', '2uNpbEZ0Rht', '2023-07-20 10:08:37'),
('BKM20230720OTG4nEp', '', '2130e1de-14f9-4533-9417-5faf61b91d57', 'BNsKmCFWrQz', '2023-07-20 10:09:51'),
('BKM20230720oVx7ZJh', '', '2130e1de-14f9-4533-9417-5faf61b91d57', 'DBk3Ro29htf', '2023-07-20 10:09:10'),
('BKM20230720XMSIuts', '', '2130e1de-14f9-4533-9417-5faf61b91d57', '7cDtAlKLsSI', '2023-07-20 10:08:26'),
('BKM20230721zprfw6K', '0VK7FPymEhq', '', 'sYiIfO0mWh2', '2023-07-21 22:53:20'),
('BKM20230723bMPpwT4', 'USR20230723NDeP0aw', '', '2uNpbEZ0Rht', '2023-07-23 16:55:36'),
('BKM20230724rUH1eEf', 'USR20230724x5Wro4P', '', 'THP20230711uvZ6r3a', '2023-07-24 12:54:53'),
('BKM20230725lwWPK4r', '', '101d07f2-9da1-4ec3-94c2-d5bae193ecdc', '2DE0jeYUufC', '2023-07-25 12:37:41'),
('BKM20230725OsnQLA4', '', '101d07f2-9da1-4ec3-94c2-d5bae193ecdc', 'BNsKmCFWrQz', '2023-07-25 12:37:55'),
('BKM20230725udPEb7w', '', '101d07f2-9da1-4ec3-94c2-d5bae193ecdc', 'THP20230711uvZ6r3a', '2023-07-25 12:37:54'),
('BKM20230725v4gCGua', '', '101d07f2-9da1-4ec3-94c2-d5bae193ecdc', '2uNpbEZ0Rht', '2023-07-25 12:37:57'),
('BKM202308050nmlxNC', '', 'e0e79a11-7f5e-4485-8a3e-e4769d8df8bb', 'THP20230615Q3fHXbd', '2023-08-05 18:51:51'),
('BKM20230805qGDdcSy', '', 'e0e79a11-7f5e-4485-8a3e-e4769d8df8bb', '7cDtAlKLsSI', '2023-08-05 18:54:04'),
('BKM20230807gf2HAQq', '', 'ec45ba1f-dbc7-4651-b7ec-922357cf59b3', 'THP20230711hpcoNnj', '2023-08-07 13:26:50'),
('BKM20230807xDcpvWy', '', '2c74cb31-6a99-452a-9c72-5a45d9c8824e', 'THP20230711hpcoNnj', '2023-08-07 13:04:13'),
('BKM20230807Xl3TSIP', '', '9b8fcfe4-b2a7-44a0-a044-dd33c3e9ae88', '7cDtAlKLsSI', '2023-08-07 19:16:42'),
('BKM20230809QVphfRk', '', '1713fe05-9996-4e92-9475-fb1705b47abe', 'OHrSynPaCM7', '2023-08-09 16:34:40'),
('BKM20230809Sw65uqI', '', '05fbb31a-5ede-4abf-8ab1-b086ab871541', 'THP20230801ac7mEDb', '2023-08-09 01:08:57'),
('BKM20230810FyrQdoL', '', '8b68ff62-e6dd-4993-a98b-886dcd756c80', 'DBk3Ro29htf', '2023-08-10 12:19:20'),
('BKM202308154HGXRxQ', '', '395b850e-41c5-440c-a3b1-73fa75f59c1e', '2uNpbEZ0Rht', '2023-08-15 15:08:14'),
('BKM20230815NLscnSO', 'USR20230815chidPaQ', '', '2DE0jeYUufC', '2023-08-15 12:50:40'),
('BKM20230816KluVtkh', '', '90bd2838-0303-4c59-a8f4-f8573edf9fa5', 'BNsKmCFWrQz', '2023-08-16 07:01:06'),
('BKM20230816QiMdkqT', '', '90bd2838-0303-4c59-a8f4-f8573edf9fa5', 'THP20230615Q3fHXbd', '2023-08-16 06:58:24'),
('BKM20230818BOTb6ep', '', '2652e1a2-c2d8-40c0-aeb3-16fad07840cc', 'OHrSynPaCM7', '2023-08-18 11:23:30'),
('BKM20230818qfEyjTY', '', '2652e1a2-c2d8-40c0-aeb3-16fad07840cc', '2uNpbEZ0Rht', '2023-08-18 11:29:53'),
('BKM202308231m9H0qj', 'USR202308230y5c9Ul', '', 'DBk3Ro29htf', '2023-08-23 16:19:19'),
('BKM20230823DSQmBxn', 'USR202308230y5c9Ul', '', 'THP20230615Q3fHXbd', '2023-08-23 16:09:01'),
('BKM20230823sZD8RN6', 'USR202308230y5c9Ul', '', '7cDtAlKLsSI', '2023-08-23 16:08:52'),
('BKM20230825kieV8rI', '', '59de4339-e257-4962-a1ec-72bad4012f90', '2uNpbEZ0Rht', '2023-08-25 05:11:01'),
('BKM20230826i2Mh0ow', '', '37c9ee88-325b-482b-b3be-a2bc3a9badcb', 'THP20230615Q3fHXbd', '2023-08-26 11:10:38'),
('BKM20230827h4aqEou', '', '16228e79-3931-4ffb-8179-7698f398d16c', '4KnW7mNrHdY', '2023-08-27 20:51:34'),
('BKM20230827NwcaLHP', '', 'b44a57b0-35c7-4d7d-b8f0-64edaf3544b0', 'DBk3Ro29htf', '2023-08-27 09:42:42'),
('BKM20230831I2pV0OM', 'USR20230831A0CWduV', '', '2uNpbEZ0Rht', '2023-08-31 00:10:47'),
('BKM20230901Ut5fB3s', '0VK7FPymEhq', '', '2uNpbEZ0Rht', '2023-09-01 10:29:35'),
('BKM202309058JzPaXU', '', 'd62919cc-bbb4-4718-a49f-6fe17aa3f2b2', 'THP20230702rudDT81', '2023-09-05 18:01:18'),
('BKM20230906km8AMTi', '', 'd1fdd60f-9ab3-4224-b9bc-e67421804db9', 'DBk3Ro29htf', '2023-09-06 09:49:52'),
('BKM20230906W3Vv5Cq', '', '11ae5037-2d65-423d-90ba-2c1c4c57d492', '2uNpbEZ0Rht', '2023-09-06 23:59:15'),
('BKM20230911It1pkfo', '', '967ce195-e061-47bf-abff-8c8e1e6ba3a1', '2uNpbEZ0Rht', '2023-09-11 10:31:39'),
('BKM202309120DVARfw', 'USR20230912fbNRjHv', '', 'THP20230615Q3fHXbd', '2023-09-12 18:46:48'),
('BKM20230912PlYFTxX', 'USR20230912fbNRjHv', '', 'OHrSynPaCM7', '2023-09-12 18:48:28'),
('BKM20230913wQyNBfm', '', '0c9dd6da-8295-4196-a279-ebc8f566e122', 'THP20230911xSRMeDm', '2023-09-13 21:23:11'),
('BKM20230925oNEIHwi', '', '', '', '2023-09-25 03:00:41'),
('BKM20230926b7NLdCr', '', 'ab923a30-7d3d-4335-a9c4-ae6d759cb52a', '2uNpbEZ0Rht', '2023-09-26 17:12:35'),
('BKM20230926bOpakSG', '', 'f9028ded-f317-48e9-8caf-9f83421572c9', '2uNpbEZ0Rht', '2023-09-26 17:13:05'),
('BKM20230926jZDxm2v', '', 'cb1d0f81-9a6d-4c9e-a361-2a67c1cce98f', 'Fb3l9TcLHvN', '2023-09-26 14:39:20'),
('BKM202309309vl8mMQ', '', '9eca488b-9d67-4ad6-8897-c6451191e1a9', 'THP20230911xSRMeDm', '2023-09-30 16:41:32');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_info`
--

CREATE TABLE `calendar_info` (
  `id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `slot_minutes` varchar(255) NOT NULL,
  `tid` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `calendar_info`
--

INSERT INTO `calendar_info` (`id`, `start_time`, `slot_minutes`, `tid`, `date_created`) VALUES
(1, '10:00', '60', '0YD187x3Tmc', '2022-12-20 23:31:33'),
(2, '8:00', '120', '0YDar1cv115', '2022-12-20 23:31:33'),
(3, '8:00', '120', '0YDar1x3pou', '2022-12-20 23:31:33'),
(4, '8:00', '120', '0YDar1x3qwe', '2022-12-20 23:31:33'),
(5, '8:00', '120', '0YDar1x3Tmc', '2022-12-20 23:31:33'),
(6, '8:00', '120', '0YDar1x3X15', '2022-12-20 23:31:33'),
(7, '8:00', '120', '1Y2a31x3Tmc', '2022-12-20 23:31:33'),
(8, '8:00', '120', '1Y9091x3Tmc', '2022-12-20 23:31:33'),
(9, '8:00', '120', 'Abv6Cyi07nV', '2022-12-20 23:31:33'),
(10, '8:00', '120', 'Abv6Czxc7nV', '2022-12-20 23:31:33'),
(21, '08:00', '240', '2DE0jeYUufC', '2023-02-01 11:28:49'),
(22, '07:00', '60', '7cDtAlKLsSI', '2023-02-01 13:08:05'),
(23, '09:00', '60', 'VqozWcjRlOZ', '2023-02-01 13:59:03'),
(24, '10:00', '60', 'APf02yCpuLF', '2023-02-01 21:01:58'),
(25, '09:00', '60', 'k15gGwebVyp', '2023-02-02 04:23:11'),
(26, '08:00', '60', 'BNsKmCFWrQz', '2023-02-13 01:12:13'),
(27, '08:00', '30', '23qUBEhALbm', '2023-02-14 03:19:32'),
(28, '09:00', '60', 'sYiIfO0mWh2', '2023-02-24 13:30:36'),
(29, '07:00', '60', '2uNpbEZ0Rht', '2023-02-27 21:46:43'),
(30, '10:00', '60', 'DBk3Ro29htf', '2023-02-28 09:20:42'),
(31, '14:00', '60', 'EbNqkmPy370', '2023-02-28 13:18:08'),
(32, '09:00', '60', '4KnW7mNrHdY', '2023-02-28 13:18:40'),
(33, '11:00', '60', 'OHrSynPaCM7', '2023-03-01 13:22:07'),
(34, '10:00', '60', 'Fb3l9TcLHvN', '2023-03-04 09:55:20'),
(36, '08:00', '60', 'THP2DE0jeYUufC', '2023-06-08 14:02:32'),
(37, '08:00', '60', 'THP20230702lvnUipA', '2023-07-03 08:05:00'),
(38, '10:00', '60', 'THP20230702rudDT81', '2023-07-03 09:58:10'),
(39, '01:00', '60', '2p7HXxnlVSK', '2023-07-04 09:40:30'),
(40, '08:00', '60', 'THP20230801ac7mEDb', '2023-08-02 11:17:00'),
(41, '08:00', '60', 'THP20230911xSRMeDm', '2023-09-11 23:47:43'),
(42, '15:30', '60', 'THP20230911jkWMURO', '2023-09-13 03:52:12'),
(43, '07:00', '60', 'THP20230911htMm36H', '2023-09-21 13:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(30) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `category_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_date_created`) VALUES
('1xm8GTDWZsq', 'Personal Development and Coaching', '', '2023-02-01 01:48:21'),
('3NJjfcrM1FW', 'Addiction and Drug', '', '2022-12-14 11:40:58'),
('5SmYyjWBAoG', 'Trauma', '', '2022-12-15 01:20:14'),
('9m5YMA3BHjL', 'Depression', '', '2022-12-14 11:40:26'),
('CAT202308013AIGOBd', 'Mood and Personality Disorders.', '', '2023-08-01 12:44:05'),
('FeQ1iTZlrhU', 'Loss and Grief', '', '2023-02-01 01:26:21'),
('g0Uy2VmD9ql', 'Love, Relationship and Marriage', '', '2022-12-14 11:40:51'),
('K5HNOvLMlZ8', 'Adolescent and Teens', '', '2023-02-01 01:45:54'),
('kK048vFbiEH', 'Special Needs', '', '2023-02-01 01:45:38'),
('lIvUxPYsZTw', 'Workplace/ Organisational', '', '2023-02-01 01:49:03'),
('MNGK5P6SZAr', 'General Therapist', '', '2022-12-14 11:41:11'),
('O6haqZFJrIP', 'Gender Based Counselling', '', '2023-02-01 01:32:06'),
('OrIVZ1TsN43', 'Children and Development', '', '2023-02-01 01:47:27'),
('zuEysB6krMi', 'Anxiety', '', '2022-12-14 11:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `company_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_status`, `company_date_created`) VALUES
('8pme1xC4FQr', 'JamboPay', 'active', '2023-05-02 14:51:27'),
('BU5kp4cdouv', 'Signature Pharmaceuticals', 'active', '2023-05-03 14:20:09'),
('CMP20230801sZn5loa', 'Mesh Testing', 'active', '2023-08-01 21:21:33'),
('CMP202308114XfVYqy', 'PsychX offers', 'active', '2023-08-11 13:31:08'),
('CMP202309018fIWtL0', 'Utawala gym and Aerobics', 'active', '2023-09-01 10:16:56'),
('VQKYCIaMtFL', 'Vesen Computing Employees', 'active', '2023-05-02 14:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `corporate`
--

CREATE TABLE `corporate` (
  `corporate_id` varchar(255) NOT NULL,
  `corporate_name` varchar(255) NOT NULL,
  `corporate_email` varchar(255) NOT NULL,
  `corporate_password` varchar(255) NOT NULL,
  `corporate_phone` varchar(255) NOT NULL,
  `corporate_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `corporate_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `corporate`
--

INSERT INTO `corporate` (`corporate_id`, `corporate_name`, `corporate_email`, `corporate_password`, `corporate_phone`, `corporate_status`, `corporate_date_created`) VALUES
('CPR20230930t7UxEh8', 'Muang Thai', 'patjunhopat@gmail.com', '$2y$11$7DD.IczLJhLXnsY4oznWu.PzvsL519gvH.7B5Apy8H6W8B1hKw4n.', '1234567', 'active', '2023-09-13 17:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `employee_number` varchar(255) NOT NULL,
  `employee_phone` varchar(255) NOT NULL,
  `employee_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_name`, `employee_number`, `employee_phone`, `employee_date_created`) VALUES
('EMP20231019g6MEq2o', 'John Doe', '2', '0782939042', '2023-10-19 00:38:19'),
('EMP20231019LZPg1Hn', 'Mary Jane', '1', '+254789563478', '2023-10-19 00:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `filter_id` varchar(255) NOT NULL,
  `filter_values` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `filter_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`filter_id`, `filter_values`, `device_id`, `filter_date_created`) VALUES
('FIL20230930iAJlz0I', 'individual,woman,24,straight,yes,married,religious,first_time,find', '9eca488b-9d67-4ad6-8897-c6451191e1a9', '2023-09-30 16:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` varchar(255) NOT NULL,
  `inquiry_name` varchar(255) NOT NULL,
  `inquiry_email` varchar(255) NOT NULL,
  `inquiry_phone` varchar(255) DEFAULT NULL,
  `inquiry_message` text NOT NULL,
  `inquiry_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`inquiry_id`, `inquiry_name`, `inquiry_email`, `inquiry_phone`, `inquiry_message`, `inquiry_date_created`) VALUES
('INQ20230125SMqs5Ji', 'Pat', 'pmanyara97@gmail.com', '07121212', 'hello world', '2023-01-24 15:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `note_id` varchar(255) NOT NULL,
  `note_code` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `note_text` text NOT NULL,
  `note_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`note_id`, `note_code`, `session_id`, `note_text`, `note_date_created`) VALUES
('208JfeYZTqh', 'NOT-EZHT6N', 'nMXgCIbV9H1', 'Patient record&#039;s', '2023-03-01 13:36:37'),
('4xoRdGQnzVs', 'NOT-VW93VJ', 'Bxs58Nz134A', 'hello from the other side', '2023-01-10 06:42:55'),
('cdeKp9tXj17', 'NOT-CSEXOR', 'feBm2c9OWk6', 'HELLO', '2023-02-24 13:48:03'),
('EPODhnX34xp', 'NOT-Z72HBD', 'Dw4N09LpaX3', 'insert notes heres', '2022-11-29 19:48:33'),
('fH418zOaygC', 'NOT-YMH8I0', 'pS3gePYzhy0', 'Hi once again', '2023-03-02 13:25:34'),
('IUKct31FlE4', 'NOT-JPHXLC', 'Bxs58Nz134A', 'exhibiting withdrawal symptoms', '2023-01-11 23:39:17'),
('NOT20230703KfrL6AC', 'NOTES-S6ITK', 'SES20230609kwGyjzx', 'Mamases', '2023-07-03 13:50:54'),
('OTfS43PAqRr', 'NOT-K33MF6', 'Bxs58Nz134A', 'testing transfer', '2023-01-11 02:14:04'),
('qJB8Iy1zYH2', 'NOT-U1GFBV', 'Dw4N09LpaX3', 'The client is responding to the medication positively. Client came for a meeting today.', '2022-12-07 11:19:28'),
('r5XZCz3VHFE', 'NOT-11C77C', 'pS3gePYzhy0', 'The client was somehow...', '2023-03-02 13:24:23'),
('RJ0a6xEpsO7', 'NOT-EAPMGR', 'goW4nvhQGxE', 'went well', '2023-03-07 13:33:13'),
('utT8sfRzAMN', 'NOT-KDGOF0', 'SMAlFODQCGd', 'Client 1', '2023-02-28 13:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(30) NOT NULL,
  `therapist_id` varchar(30) NOT NULL,
  `session_code` varchar(30) NOT NULL,
  `session_date` date NOT NULL,
  `session_start_time` time NOT NULL,
  `session_end_time` time NOT NULL,
  `client_id` varchar(30) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `session_mode` enum('live','virtual') NOT NULL DEFAULT 'live',
  `session_link` text DEFAULT NULL,
  `session_date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `session_payment_status` enum('paid','not_paid') DEFAULT 'not_paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `therapist_id`, `session_code`, `session_date`, `session_start_time`, `session_end_time`, `client_id`, `device_id`, `session_mode`, `session_link`, `session_date_created`, `session_payment_status`) VALUES
('0DqJeKXOMEw', 'BNsKmCFWrQz', 'SESS-19UYEA', '2023-05-12', '13:00:00', '14:00:00', 's6HugqmKJbN', NULL, 'live', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-02-13 01:11:29', NULL),
('0iH2BVUjXhp', '0YD187x3Tmc', 'SESS-JBPLOE', '2023-01-18', '10:00:00', '10:00:00', '6uY1N4c9VEl', NULL, 'live', NULL, '2023-01-10 02:15:12', 'not_paid'),
('0s1KvoWQJcj', 'EbNqkmPy370', 'SESS-34IF3M', '2023-04-11', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-10 09:24:29', 'not_paid'),
('19SLcoK4xBZ', '', 'SESS-U6E3AB', '2023-02-15', '00:00:00', '00:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-02-14 03:34:38', 'not_paid'),
('1C3xrHiJQkT', 'EbNqkmPy370', 'SESS-WHRDJI', '2023-04-12', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-10 15:32:02', 'not_paid'),
('4vGziprqAZc', '7cDtAlKLsSI', 'SESS-9F6Q4I', '2023-04-13', '06:30:00', '09:00:00', 'OsA5miKC0F9', NULL, 'live', NULL, '2023-04-08 12:49:07', 'paid'),
('4XFj5qdOHwN', '2uNpbEZ0Rht', 'SESS-RIWH88', '2023-05-11', '20:00:00', '21:00:00', '6ZO1cSDIKJj', NULL, 'virtual', NULL, '2023-05-05 22:53:33', 'not_paid'),
('5nQ132fdJMX', 'k15gGwebVyp', 'SESS-1W2O1T', '2023-02-08', '10:00:00', '11:00:00', '6uY1N4c9VEl', NULL, 'live', NULL, '2023-02-02 09:54:34', 'not_paid'),
('6dzTWD0KnMA', '0YD187x3Tmc', 'SESS-JKS6EJ', '2023-01-11', '11:00:00', '12:00:00', 'cqbtO30oygT', NULL, 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-01-11 23:30:05', 'paid'),
('6grFHPsW3R7', '2uNpbEZ0Rht', 'SESS-42JJWX', '2023-05-07', '17:00:00', '18:00:00', 'FpGi0KEPf8Y', NULL, 'virtual', NULL, '2023-05-06 12:01:19', 'not_paid'),
('7HgRBTw1ezO', '7cDtAlKLsSI', 'SESS-XOKQBG', '2023-03-31', '11:11:00', '11:15:00', '0jog3yIUCGA', NULL, 'live', NULL, '2023-03-22 10:00:04', NULL),
('8S45pucGTB7', '', 'SESS-VPENU2', '2023-02-14', '00:00:00', '00:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-02-14 03:33:54', 'not_paid'),
('97GyM6pxlC1', 'BNsKmCFWrQz', 'SESS-GQJFZY', '2023-02-15', '08:00:00', '09:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-02-14 00:50:27', 'not_paid'),
('A5ghDconeY6', 'EbNqkmPy370', 'SESS-P2L0W4', '2023-04-10', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-10 00:02:40', 'not_paid'),
('aBwuTsrESd6', '', 'SESS-6F748T', '2023-02-21', '00:00:00', '00:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-02-24 13:33:34', 'not_paid'),
('aYNtRL9JVEp', '7cDtAlKLsSI', 'SESS-AJ8RHG', '2023-02-17', '06:30:00', '09:00:00', 'xso3gzWnRw8', NULL, 'virtual', NULL, '2023-02-02 07:25:02', 'not_paid'),
('AZ3ovHG24fY', '0YD187x3Tmc', 'SESS-PLHRDS', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-01-26 03:03:42', 'paid'),
('bIPNKemR5qu', '23qUBEhALbm', 'SESS-JWUKSJ', '2023-02-02', '08:00:00', '08:30:00', 'McD0GJTydFR', NULL, 'live', NULL, '2023-02-14 03:41:39', 'not_paid'),
('Bxs58Nz134A', '0YD187x3Tmc', 'SESS-ROPDI0', '2023-01-11', '11:11:00', '12:11:00', '0jog3yIUCGA', NULL, 'virtual', 'https://meet.google.com/mcp-qnft-hwk', '2023-01-06 09:46:32', NULL),
('cDXfrmQqs0M', '2uNpbEZ0Rht', 'SESS-F4TLU7', '2023-05-24', '07:00:00', '09:00:00', '0VK7FPymEhq', NULL, 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-05-08 17:50:11', 'paid'),
('cnJCRK89eSD', '2uNpbEZ0Rht', 'SESS-T6PP8O', '2023-05-08', '17:00:00', '18:00:00', 'O4SzKMjwBGt', NULL, 'virtual', NULL, '2023-05-08 08:29:39', 'not_paid'),
('CPwyxdFNf2e', '2uNpbEZ0Rht', 'SESS-RCUAU0', '2023-05-11', '11:00:00', '12:00:00', 'iAFH139ek8q', NULL, 'virtual', NULL, '2023-05-08 20:09:08', 'not_paid'),
('CTO9wsDINvf', '2uNpbEZ0Rht', 'SESS-4ZM0Y6', '2023-05-17', '09:00:00', '10:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-05-08 17:52:09', 'not_paid'),
('cWhkdbjF6Pi', '2uNpbEZ0Rht', 'SESS-GVWDRX', '2023-05-09', '12:00:00', '13:00:00', '0VK7FPymEhq', NULL, 'virtual', NULL, '2023-05-09 19:56:06', 'not_paid'),
('Df3GkFy79BM', 'BNsKmCFWrQz', 'SESS-Q2WDIK', '2023-02-21', '08:00:00', '09:00:00', 'FdaVCtQgAK5', NULL, 'virtual', NULL, '2023-02-20 21:44:21', 'not_paid'),
('DoWxAZqcNyE', 'EbNqkmPy370', 'SESS-F8ABSW', '2023-04-15', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 16:44:24', 'not_paid'),
('E12rfPnDSWI', 'OHrSynPaCM7', 'SESS-993RJK', '2023-04-30', '16:00:00', '17:00:00', 'W1g72jy0FAe', NULL, 'virtual', NULL, '2023-04-29 17:14:32', 'not_paid'),
('e1nYwQdi7O0', 'sYiIfO0mWh2', 'SESS-TDYDWH', '2023-05-08', '10:00:00', '11:00:00', 'iWzTcjOEhXx', NULL, 'live', NULL, '2023-05-08 17:12:53', 'not_paid'),
('e8znfxmd0NY', '7cDtAlKLsSI', 'SESS-YMPRV5', '2023-05-09', '13:00:00', '14:00:00', '0jog3yIUCGA', NULL, 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-05-08 15:55:31', 'paid'),
('eDLmYuOqc7T', '2uNpbEZ0Rht', 'SESS-OIZZCQ', '2023-05-05', '07:00:00', '09:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-05-05 19:44:43', 'not_paid'),
('eKXk0pV9U2m', '2uNpbEZ0Rht', 'SESS-M81DPH', '2023-03-08', '08:00:00', '09:00:00', 'oJtHC1p48sF', NULL, 'virtual', NULL, '2023-03-07 13:16:03', 'not_paid'),
('EovO619zTwC', 'EbNqkmPy370', 'SESS-XW9XSH', '2023-04-18', '08:00:00', '09:00:00', 'cqbtO30oygT', NULL, 'virtual', NULL, '2023-04-08 16:46:53', 'not_paid'),
('FbSrlzLQ6f3', 'k15gGwebVyp', 'SESS-6F1IF5', '2023-03-06', '10:00:00', '11:00:00', '6uY1N4c9VEl', NULL, 'virtual', NULL, '2023-02-27 12:15:00', 'not_paid'),
('feBm2c9OWk6', 'sYiIfO0mWh2', 'SESS-R2GI5K', '2023-02-27', '10:00:00', '11:00:00', 'FdaVCtQgAK5', NULL, 'live', NULL, '2023-02-24 13:43:17', 'not_paid'),
('fiboKQOCT9s', '0YD187x3Tmc', 'SESS-0IXIL2', '2023-01-11', '10:00:00', '10:00:00', 'aLdFUHYmISu', NULL, 'live', NULL, '2023-01-17 10:10:46', 'not_paid'),
('FkmAaejC46E', '', 'SESS-ZQ0PX6', '2023-02-27', '00:00:00', '00:00:00', 'ILUDcQso5w9', NULL, 'virtual', NULL, '2023-02-27 14:08:53', 'not_paid'),
('FsCRnJNlpOo', '0YD187x3Tmc', 'SESS-Y9MEH4', '2023-01-02', '08:00:00', '10:00:00', 'q9cS2voZRNs', NULL, 'live', NULL, '2022-12-30 02:13:23', 'paid'),
('g6zGxSsAKTP', 'Fb3l9TcLHvN', 'SESS-1OX56A', '2023-03-25', '08:00:00', '09:00:00', 'eMn0YzbGv24', NULL, 'live', NULL, '2023-03-14 14:22:19', 'not_paid'),
('goW4nvhQGxE', 'APf02yCpuLF', 'SESS-MSZAKB', '2023-03-08', '10:00:00', '09:00:00', 'rYBxskOQ81d', NULL, 'live', NULL, '2023-03-07 13:29:20', 'not_paid'),
('hbTp2uWeUnf', '0YD187x3Tmc', 'SESS-4MH9DL', '2022-12-26', '08:00:00', '10:00:00', 'haoG90S1fpe', NULL, 'live', NULL, '2022-12-23 13:13:25', 'paid'),
('HD4Qszixa8S', 'OHrSynPaCM7', 'SESS-8SHRS2', '2022-12-02', '09:30:00', '10:30:00', 't3JCHT8PK5F', NULL, 'live', NULL, '2022-11-29 23:12:01', ''),
('Hf01yCESJpa', '0YD187x3Tmc', 'SESS-O9F04U', '2023-01-18', '10:00:00', '10:00:00', 'xso3gzWnRw8', NULL, 'live', NULL, '2023-01-17 01:01:27', 'paid'),
('hkofqAQa1BS', '2uNpbEZ0Rht', 'SESS-AF48UV', '2023-05-01', '17:00:00', '18:00:00', 'MBI9GsWZp6J', NULL, 'virtual', NULL, '2023-04-29 09:38:47', 'not_paid'),
('IOHP19nNkp3', 'Abv6Czxc7nV', 'SESS-GME5UW', '2023-01-18', '08:00:00', '10:00:00', 'GedFz6wxth9', NULL, 'virtual', NULL, '2023-01-25 08:00:33', 'not_paid'),
('iU2a7s5lZnr', 'EbNqkmPy370', 'SESS-L7LBZZ', '2023-04-10', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 16:31:03', 'not_paid'),
('IyNMiCZAk01', '7cDtAlKLsSI', 'SESS-I2FJXW', '2023-05-09', '20:00:00', '21:00:00', '0jog3yIUCGA', NULL, 'live', NULL, '2023-05-08 16:00:50', 'not_paid'),
('IZ4hyKl8uAi', '2uNpbEZ0Rht', 'SESS-9V657X', '2022-11-03', '14:00:00', '15:00:00', 'T3NqboDua4S', NULL, 'virtual', NULL, '2023-03-10 17:41:02', 'not_paid'),
('JjoWBSpAtCs', '0YD187x3Tmc', 'SESS-WZ1YPF', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'virtual', NULL, '2023-01-11 09:17:18', 'paid'),
('Jk5gMD4G0rd', 'DBk3Ro29htf', 'SESS-AF2NSZ', '2023-05-10', '11:00:00', '12:00:00', 'cKQukE2aDdS', NULL, 'virtual', NULL, '2023-05-09 19:55:37', 'not_paid'),
('kaiQEIU98zT', '0YD187x3Tmc', 'SESS-LO5D5D', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'virtual', NULL, '2023-01-11 09:16:59', 'not_paid'),
('kE3ijQLmaf1', '0YD187x3Tmc', 'SESS-3IGUH2', '2023-01-09', '08:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'virtual', NULL, '2023-01-06 09:12:47', 'paid'),
('kqzShuOFGVd', 'EbNqkmPy370', 'SESS-SA2UNF', '2023-04-14', '15:00:00', '16:00:00', 's6HugqmKJbN', NULL, 'live', NULL, '2023-04-11 10:45:21', 'not_paid'),
('Kx7oy820Wes', '0YD187x3Tmc', 'SESS-YV3GV7', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'virtual', NULL, '2023-01-11 08:55:13', 'paid'),
('LmKdpEPv8wT', '2uNpbEZ0Rht', 'SESS-0D7GS6', '2023-05-10', '20:00:00', '21:00:00', '6ZO1cSDIKJj', NULL, 'virtual', NULL, '2023-05-05 22:49:52', 'not_paid'),
('LNuPlOR4Khy', '0YD187x3Tmc', 'SESS-5ZUIO4', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-01-11 08:46:29', 'not_paid'),
('lSihZVDvta8', 'Abv6Czxc7nV', 'SESS-UD7RLR', '2022-12-28', '08:00:00', '10:00:00', 'aSzGs7EvBxN', NULL, 'live', NULL, '2022-12-23 12:36:31', 'not_paid'),
('m2AnPOYyCv9', 'Fb3l9TcLHvN', 'SESS-VO7DJJ', '2023-05-15', '03:00:00', '04:00:00', 'OsA5miKC0F9', NULL, 'live', NULL, '2023-05-10 15:55:09', 'not_paid'),
('moxMfLO2vZt', 'EbNqkmPy370', 'SESS-JMYGT2', '2023-04-14', '08:00:00', '09:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-10 15:35:57', 'not_paid'),
('nMXgCIbV9H1', 'OHrSynPaCM7', 'SESS-LD2JGW', '2023-03-06', '08:00:00', '09:00:00', 'DGgf4ajClES', NULL, 'live', NULL, '2023-03-01 13:30:21', 'not_paid'),
('nUsGa6NpOHf', 'sYiIfO0mWh2', 'SESS-FWUYX5', '2023-02-27', '08:00:00', '09:00:00', '6uY1N4c9VEl', NULL, 'virtual', NULL, '2023-02-27 14:10:05', 'not_paid'),
('NY4iQAHXK8s', '7cDtAlKLsSI', 'SESS-TBBBSV', '2023-05-16', '17:00:00', '18:00:00', '', NULL, 'live', NULL, '2023-05-08 16:22:25', 'not_paid'),
('OcGMWhEl0Zp', 'EbNqkmPy370', 'SESS-G0MIVY', '2023-04-15', '08:00:00', '09:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 16:55:13', 'not_paid'),
('OMdPYqzEAQh', '0YD187x3Tmc', 'SESS-A26F42', '2023-01-25', '11:00:00', '12:00:00', 'haoG90S1fpe', NULL, 'virtual', NULL, '2023-01-24 06:55:18', 'not_paid'),
('P79863XWlDx', 'EbNqkmPy370', 'SESS-7TLWWI', '2023-04-10', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 16:58:54', 'not_paid'),
('pMenBDzCh1j', 'Fb3l9TcLHvN', 'SESS-V5MITB', '2023-04-16', '03:00:00', '09:00:00', 's6HugqmKJbN', NULL, 'live', NULL, '2023-04-09 23:59:16', 'not_paid'),
('pS3gePYzhy0', 'k15gGwebVyp', 'SESS-5LHP3T', '2023-02-06', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-02-09 04:48:37', 'not_paid'),
('PSoY6QACrat', '23qUBEhALbm', 'SESS-YSUBLG', '2023-02-14', '08:30:00', '09:00:00', 'McD0GJTydFR', NULL, 'live', NULL, '2023-02-14 03:44:54', 'not_paid'),
('qH2GeYpK4x3', '0YD187x3Tmc', 'SESS-FBC1BY', '2023-01-25', '10:00:00', '10:00:00', 'haoG90S1fpe', NULL, 'virtual', NULL, '2023-01-26 03:33:39', 'not_paid'),
('qiGy4pMS5WT', '0YD187x3Tmc', 'SESS-D9UYWD', '2023-01-18', '10:00:00', '10:00:00', 'GedFz6wxth9', NULL, 'live', NULL, '2023-01-17 10:05:26', 'not_paid'),
('qJAZs4O7cXe', '0YDar1x3Tmc', 'SESS-KQS1T2', '2022-12-14', '19:57:00', '20:57:00', '6uY1N4c9VEl', NULL, 'live', NULL, '2022-12-07 04:57:38', ''),
('QJxAv8h1E36', 'k15gGwebVyp', 'SESS-A7X1EH', '2023-04-12', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-09 13:34:40', 'not_paid'),
('qQZwr9DBnM8', '7cDtAlKLsSI', 'SESS-74VIHH', '2023-03-01', '08:00:00', '09:00:00', 'LxvTVYXQi3y', NULL, 'live', NULL, '2023-02-28 13:33:57', 'not_paid'),
('Qr74jLwJ5U6', '0YD187x3Tmc', 'SESS-8HL7U4', '2022-12-26', '08:00:00', '10:00:00', 'haoG90S1fpe', NULL, 'live', NULL, '2022-12-23 23:29:38', 'not_paid'),
('r1NvDhZVa8j', '2uNpbEZ0Rht', 'SESS-KTT7W0', '2023-03-08', '08:00:00', '09:00:00', 'w0pxq1Tnogs', NULL, 'virtual', NULL, '2023-03-07 13:24:50', 'not_paid'),
('r1PYonXWVxA', '', 'SESS-GBM4W5', '2023-02-20', '00:00:00', '00:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-02-24 13:35:55', 'not_paid'),
('R45Tdu0sxCD', '0YD187x3Tmc', 'SESS-C190MP', '2023-01-11', '10:00:00', '10:00:00', 'Bhm81a7NIHs', NULL, 'virtual', NULL, '2023-01-11 23:27:53', 'not_paid'),
('rPzCuSKpRml', '0YD187x3Tmc', 'SESS-YTBUH7', '2022-12-12', '10:00:00', '12:00:00', 'J51oy6lguEe', NULL, 'virtual', NULL, '2022-12-23 12:02:52', 'paid'),
('RTFzVUkIv6C', '2uNpbEZ0Rht', 'SESS-1STZSW', '2023-04-26', '08:00:00', '09:00:00', 'dQqDMig8f7r', NULL, 'virtual', NULL, '2023-04-25 15:33:13', 'not_paid'),
('SES20230510NjZsBOY', '2uNpbEZ0Rht', 'SESS-GZQXJ', '2023-05-13', '09:00:00', '10:00:00', NULL, '210da0d5-1efa-49ec-935c-6305dd4726d0', 'live', NULL, '2023-05-10 20:03:54', 'not_paid'),
('SES20230510usEtPi5', 'OHrSynPaCM7', 'SESS-MZQO8', '2023-05-14', '13:00:00', '14:00:00', 't3JCHT8PK5F', '210da0d5-1efa-49ec-935c-6305dd4726d0', 'live', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-05-10 19:55:34', 'paid'),
('SES2023051243oSzwA', '7cDtAlKLsSI', 'SESS-DU1GP', '2023-05-18', '19:00:00', '20:00:00', 't3JCHT8PK5F', '5ed86b1f-fdc6-4560-882b-cceaae1da506', 'live', NULL, '2023-05-12 11:44:26', 'not_paid'),
('SES202305129RYs0Bq', '4KnW7mNrHdY', 'SESS-2TOJD', '2023-05-18', '10:00:00', '11:00:00', 'USR20230512ougrvlQ', 'd8aac443-bcff-4d12-b741-0709d8a1ddf8', '', NULL, '2023-05-12 18:57:07', 'paid'),
('SES20230512AiTW2HC', 'OHrSynPaCM7', 'SESS-TFFLD', '2023-05-18', '12:00:00', '13:00:00', 't3JCHT8PK5F', '5ed86b1f-fdc6-4560-882b-cceaae1da506', 'live', NULL, '2023-05-12 12:08:22', 'paid'),
('SES20230512jSPKmlO', '4KnW7mNrHdY', 'SESS-VJ7BP', '2023-05-18', '10:00:00', '11:00:00', 'USR20230512ougrvlQ', 'd8aac443-bcff-4d12-b741-0709d8a1ddf8', 'live', NULL, '2023-05-12 18:33:19', 'paid'),
('SES20230512pkCRrT2', 'OHrSynPaCM7', 'SESS-ELK8F', '2023-05-18', '13:00:00', '14:00:00', 'OsA5miKC0F9', 'dbda3d18-9c60-4939-8e62-a1636e6803c9', 'live', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-05-12 00:17:43', 'paid'),
('SES2023052247J91ei', 'sYiIfO0mWh2', 'SESS-KB2U7', '2023-05-26', '08:00:00', '09:00:00', NULL, 'f44c39d4-b1fe-4407-9c57-c08e48fce82b', 'live', NULL, '2023-05-22 23:57:51', 'not_paid'),
('SES202305241R3t0ln', '2uNpbEZ0Rht', 'SESS-3AGGN', '2023-05-25', '07:00:00', '09:00:00', 'USR20230524S7pw85F', '08ea2b3b-d2b7-49b2-a37c-8fc2cc4507d5', 'live', NULL, '2023-05-24 14:32:38', 'not_paid'),
('SES20230531faOriJ9', 'DBk3Ro29htf', 'SESS-6MTSV', '2023-05-31', '11:00:00', '12:00:00', NULL, '18c3d8c0-038d-4521-a1ee-542a3e99e10a', 'live', NULL, '2023-05-31 00:59:39', 'not_paid'),
('SES20230531gFLQndM', '2uNpbEZ0Rht', 'SESS-FOQSS', '2023-05-31', '11:00:00', '12:00:00', NULL, '2c90e0ac-6b86-49d6-b928-3144f15af5f6', 'live', NULL, '2023-05-31 10:35:38', 'not_paid'),
('SES20230605brWE9tP', 'DBk3Ro29htf', 'SESS-2DCNK', '2023-06-09', '16:00:00', '17:00:00', 'OsA5miKC0F9', 'a166401e-4f93-4245-bd52-2ba887ac632c', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-06-05 12:32:40', 'paid'),
('SES20230605IDHBK2J', 'DBk3Ro29htf', 'SESS-35G4E', '2023-06-05', '14:00:00', '15:00:00', 'USR202306055kfTVb0', 'fb40209c-6f78-4548-85af-ddf686812d97', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-06-05 12:58:15', 'paid'),
('SES20230606jBMD5fS', '2uNpbEZ0Rht', 'SESS-CLV3H', '2023-06-06', '14:00:00', '09:00:00', 'O4SzKMjwBGt', '6a5345c3-f695-4c84-a954-914ff8b2f06a', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-06-06 19:28:44', 'paid'),
('SES20230606YxgZN5z', '2uNpbEZ0Rht', 'SESS-YSI1E', '2023-06-06', '11:00:00', '12:00:00', NULL, '6a5345c3-f695-4c84-a954-914ff8b2f06a', 'live', NULL, '2023-06-06 19:27:28', 'not_paid'),
('SES20230608sSXzrt4', 'DBk3Ro29htf', 'SESS-2ZXC4', '2023-06-09', '14:00:00', '15:00:00', NULL, '90497103-4a94-4c2f-85ae-4a3f44ed0d7e', 'live', NULL, '2023-06-08 15:05:29', 'not_paid'),
('SES20230608TQAZt2y', 'DBk3Ro29htf', 'SESS-8OOWJ', '2023-06-09', '15:00:00', '16:00:00', 'USR20230608VhuE5tc', '90497103-4a94-4c2f-85ae-4a3f44ed0d7e', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-06-08 15:09:56', 'paid'),
('SES20230609kwGyjzx', 'THP2DE0jeYUufC', 'SESS-0Q52P', '2023-06-12', '10:00:00', '11:00:00', 'USR20230609neXZ1vW', '14335522-c976-4d99-bdeb-2fa48bd935ad', 'live', NULL, '2023-06-09 19:14:45', 'paid'),
('SES20230609pbaJl2c', '2uNpbEZ0Rht', 'SESS-J4P18', '2023-06-09', '08:00:00', '09:00:00', NULL, 'c0635ddd-c016-4384-8e82-7fb3241c0694', 'live', NULL, '2023-06-09 15:37:41', 'not_paid'),
('SES20230610WklMDjs', '2uNpbEZ0Rht', 'SESS-5R4SM', '2023-06-10', '07:00:00', '09:00:00', NULL, '49c229b2-e461-4517-a028-19139561df9e', 'live', NULL, '2023-06-10 09:44:16', 'not_paid'),
('SES20230612a49RK2Z', '2uNpbEZ0Rht', 'SESS-2AVW1', '2023-06-12', '21:00:00', '22:00:00', '0VK7FPymEhq', '49c229b2-e461-4517-a028-19139561df9e', 'live', NULL, '2023-06-12 11:46:12', 'not_paid'),
('SES20230612FECbeSY', '2uNpbEZ0Rht', 'SESS-9UWNX', '2023-06-12', '17:00:00', '18:00:00', '0VK7FPymEhq', '49c229b2-e461-4517-a028-19139561df9e', 'live', NULL, '2023-06-12 11:44:08', 'not_paid'),
('SES20230612wOXMW4N', '2uNpbEZ0Rht', 'SESS-P6EFO', '2023-06-14', '13:00:00', '14:00:00', '0VK7FPymEhq', '49c229b2-e461-4517-a028-19139561df9e', 'live', NULL, '2023-06-12 12:17:13', 'not_paid'),
('SES20230612Y0F2GLK', 'BNsKmCFWrQz', 'SESS-TVK8O', '2023-06-12', '10:00:00', '11:00:00', '0VK7FPymEhq', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-12 23:47:52', 'not_paid'),
('SES20230613TUhHl3N', 'BNsKmCFWrQz', 'SESS-S4LMD', '2023-06-13', '09:00:00', '10:00:00', '0VK7FPymEhq', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-13 12:52:55', 'not_paid'),
('SES20230614DWCXoLa', 'sYiIfO0mWh2', 'SESS-3NQLQ', '2023-06-16', '08:00:00', '09:00:00', NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-14 12:22:42', 'not_paid'),
('SES20230614fEzuT8A', 'OHrSynPaCM7', 'SESS-1ETFQ', '2023-06-18', '13:00:00', '14:00:00', NULL, 'b121a741-a946-4554-9ab9-fac4c697d14e', 'live', NULL, '2023-06-14 12:03:58', 'not_paid'),
('SES20230614km6vHwB', 'sYiIfO0mWh2', 'SESS-Z33RC', '2023-06-14', '08:00:00', '09:00:00', NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-14 12:21:47', 'not_paid'),
('SES20230619ZT0N1Px', '2uNpbEZ0Rht', 'SESS-RF091', '2023-06-20', '14:00:00', '15:00:00', NULL, 'c0635ddd-c016-4384-8e82-7fb3241c0694', 'live', NULL, '2023-06-19 17:24:49', 'not_paid'),
('SES20230620V9Q2jna', '', 'SESS-74ODB', '0000-00-00', '00:00:00', '00:00:00', '', '', '', NULL, '2023-06-20 09:01:42', 'paid'),
('SES20230626jFtukqW', '2uNpbEZ0Rht', 'SESS-HVIWI', '2023-06-29', '08:00:00', '09:00:00', '0VK7FPymEhq', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-26 19:28:23', 'not_paid'),
('SES20230626SBFWJnN', 'sYiIfO0mWh2', 'SESS-SDO08', '2023-06-28', '08:00:00', '09:00:00', NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-06-26 19:15:23', 'not_paid'),
('SES20230630wopgbDz', '2uNpbEZ0Rht', 'SESS-V05SY', '2023-07-01', '17:00:00', '18:00:00', NULL, 'dedda428-4914-469c-9a3d-95d1288c75c1', 'live', NULL, '2023-06-30 21:28:16', 'not_paid'),
('SES202307055I37vUB', '7cDtAlKLsSI', 'SESS-3VTEN', '2023-07-07', '13:00:00', '14:00:00', NULL, '7da437ef-9a1d-47ec-aa48-b089b200724e', 'live', NULL, '2023-07-05 13:43:11', 'not_paid'),
('SES20230714XfhuCFU', 'Fb3l9TcLHvN', 'SESS-QQ0IU', '2023-07-16', '03:00:00', '09:00:00', NULL, '4169618a-de1c-4a4d-9c71-ff02d26a50d0', 'live', NULL, '2023-07-14 23:23:50', 'not_paid'),
('SES20230720jAMkNES', '2uNpbEZ0Rht', 'SESS-F8WIT', '2023-07-20', '20:00:00', '21:00:00', NULL, '153922e4-a4c6-4f9c-a202-511bb936cbe2', 'live', NULL, '2023-07-20 12:19:38', 'not_paid'),
('SES20230721IazWNyZ', '2uNpbEZ0Rht', 'SESS-FKED2', '2023-07-21', '07:00:00', '09:00:00', '0VK7FPymEhq', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 'live', NULL, '2023-07-21 22:44:21', 'not_paid'),
('SES20230722KmIwxBP', '7cDtAlKLsSI', 'SESS-DR369', '2023-07-22', '08:00:00', '09:00:00', 'USR20230722zFk0ugQ', 'deaf6d1c-64d0-474c-8461-a7d9e70cb860', 'live', NULL, '2023-07-22 15:04:55', 'not_paid'),
('SES20230724aN41WGU', 'Fb3l9TcLHvN', 'SESS-TZNRP', '2023-07-29', '08:00:00', '09:00:00', 'USR20230724NiKXICo', '2dce3990-b5d6-4a62-aa75-f293409ae887', 'live', NULL, '2023-07-24 18:54:27', 'not_paid'),
('SES20230724lArDnJb', 'OHrSynPaCM7', 'SESS-AFK0N', '2023-07-25', '11:00:00', '12:00:00', NULL, '09b435cb-bef7-48d0-a019-f1d01d33412f', 'live', NULL, '2023-07-24 18:49:46', 'not_paid'),
('SES20230807XkKAaus', 'DBk3Ro29htf', 'SESS-QRZPA', '2023-08-07', '16:00:00', '17:00:00', NULL, 'ec45ba1f-dbc7-4651-b7ec-922357cf59b3', 'live', NULL, '2023-08-07 13:29:30', 'not_paid'),
('SES20230808QnM8bmO', '2DE0jeYUufC', 'SESS-C4ITT', '2023-08-14', '08:00:00', '09:00:00', NULL, '0e209e46-ee56-4182-a91d-66154dbde088', 'live', NULL, '2023-08-08 15:14:49', 'not_paid'),
('SES20230809bHQCzwj', 'sYiIfO0mWh2', 'SESS-U0X5L', '2023-08-11', '08:00:00', '09:00:00', NULL, '1713fe05-9996-4e92-9475-fb1705b47abe', 'live', NULL, '2023-08-09 16:35:39', 'not_paid'),
('SES20230809SbrZYRt', 'THP20230711uvZ6r3a', 'SESS-FYQ0E', '2023-08-09', '15:00:00', '16:00:00', NULL, '05fbb31a-5ede-4abf-8ab1-b086ab871541', 'live', NULL, '2023-08-09 01:10:07', 'not_paid'),
('SES20230810PgMx2E8', '2uNpbEZ0Rht', 'SESS-P35LB', '2023-08-14', '17:00:00', '18:00:00', NULL, '8b68ff62-e6dd-4993-a98b-886dcd756c80', 'live', NULL, '2023-08-10 12:19:44', 'not_paid'),
('SES20230814hiTD31w', '2uNpbEZ0Rht', 'SESS-MSP75', '2023-08-15', '14:00:00', '15:00:00', NULL, 'c22db3f0-1e7f-4456-9ebd-b3caef3e14b2', 'live', NULL, '2023-08-14 14:22:46', 'not_paid'),
('SES20230815JIWzAgO', 'THP20230615Q3fHXbd', 'SESS-GX8W6', '2023-08-15', '13:00:00', '14:00:00', NULL, 'bf07d5ec-1edd-457b-b61d-cf52705ccb12', 'live', NULL, '2023-08-15 14:14:54', 'not_paid'),
('SES202308160kEBXST', 'DBk3Ro29htf', 'SESS-QUY2A', '2023-08-22', '15:00:00', '16:00:00', NULL, 'b16e33e4-fe34-454d-a91a-6b0566aede2e', 'live', NULL, '2023-08-16 09:47:45', 'not_paid'),
('SES20230816zK0qp7W', '4KnW7mNrHdY', 'SESS-ZHH43', '2023-08-16', '12:00:00', '13:00:00', NULL, 'c22db3f0-1e7f-4456-9ebd-b3caef3e14b2', 'live', NULL, '2023-08-16 16:43:48', 'not_paid'),
('SES202308224iqv5Nj', 'THP20230711hpcoNnj', 'SESS-LMECA', '2023-08-22', '12:00:00', '13:00:00', NULL, '153922e4-a4c6-4f9c-a202-511bb936cbe2', 'live', NULL, '2023-08-22 15:35:40', 'not_paid'),
('SES202308231L5Dvth', 'THP20230702rudDT81', 'SESS-5MICJ', '2023-08-23', '08:00:00', '09:00:00', NULL, 'c9d49e1d-3ea9-4ca6-b4ba-7c988eb4d4cc', 'live', NULL, '2023-08-23 15:46:30', 'not_paid'),
('SES20230823lrH4CVh', 'THP20230702rudDT81', 'SESS-87AF0', '2023-08-23', '08:00:00', '09:00:00', NULL, 'c9d49e1d-3ea9-4ca6-b4ba-7c988eb4d4cc', 'live', NULL, '2023-08-23 15:46:20', 'not_paid'),
('SES20230829xFTM4G1', 'xy1RPW6UC2J', 'SESS-IFJ1I', '2023-08-29', '08:00:00', '09:00:00', NULL, '08c4bda5-4c58-44e3-b687-3db286a45cb4', 'live', NULL, '2023-08-29 19:46:59', 'not_paid'),
('SES20230831lItWPj5', '2uNpbEZ0Rht', 'SESS-JH42O', '2023-08-31', '14:00:00', '15:00:00', 'USR20230831A0CWduV', 'dddd8db9-d2fa-4bde-9a39-9020ce148099', 'live', NULL, '2023-08-31 00:11:18', 'not_paid'),
('SES20230901AICjl9S', '2uNpbEZ0Rht', 'SESS-M2P2F', '2023-09-01', '11:00:00', '12:00:00', '0VK7FPymEhq', 'de1654f6-e43b-4112-b29a-758d1fbc6871', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-09-01 10:30:04', 'paid'),
('SES20230901QizxV3Y', '2uNpbEZ0Rht', 'SESS-5K41M', '2023-09-01', '14:00:00', '15:00:00', '0VK7FPymEhq', '87a6c566-d0d7-4779-8cc8-943f8b7c8b09', 'live', NULL, '2023-09-01 09:57:51', 'paid'),
('SES20230908AioRX81', 'THP20230702lvnUipA', 'SESS-1IPS2', '2023-09-08', '19:00:00', '20:00:00', NULL, 'cc83a413-56a8-4c31-98b8-4908efca4fa7', 'live', NULL, '2023-09-08 15:53:37', 'not_paid'),
('SES20230911UIk1VEO', '4KnW7mNrHdY', 'SESS-FTXVI', '2023-09-11', '21:00:00', '22:00:00', 'USR20230911KIbBhok', '967ce195-e061-47bf-abff-8c8e1e6ba3a1', 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-09-11 10:36:23', 'paid'),
('SES20230916suGwa10', 'DBk3Ro29htf', 'SESS-5RJU5', '2023-09-18', '09:00:00', '09:00:00', NULL, '4758464b-2c0e-42bb-a476-99e3c3b2dc0d', 'live', NULL, '2023-09-16 19:29:08', 'not_paid'),
('SES20230926hwCXyBq', '2uNpbEZ0Rht', 'SESS-SUYI0', '2023-09-27', '16:00:00', '17:00:00', NULL, 'f9028ded-f317-48e9-8caf-9f83421572c9', 'live', NULL, '2023-09-26 17:14:20', 'not_paid'),
('SES20230926PSvdNtZ', '2uNpbEZ0Rht', 'SESS-FYC0M', '2023-09-26', '21:00:00', '22:00:00', NULL, 'ab923a30-7d3d-4335-a9c4-ae6d759cb52a', 'live', NULL, '2023-09-26 17:14:20', 'not_paid'),
('SES20230930WEfgA9k', '7cDtAlKLsSI', 'SESS-D32EL', '2023-10-06', '07:00:00', '08:00:00', NULL, '1a078d4f-14f0-4b86-aa7a-b1649b0b0278', 'live', NULL, '2023-09-30 17:44:09', 'not_paid'),
('sHmqtzxhnQp', 'BNsKmCFWrQz', 'SESS-20GDX1', '2023-01-11', '13:00:00', '14:00:00', '0VK7FPymEhq', NULL, 'virtual', 'https://us06web.zoom.us/j/5118982136?pwd=V09JZ2t0alluUVAzYWlmaHZsZWMydz09', '2023-02-06 02:41:54', 'paid'),
('SMAlFODQCGd', '7cDtAlKLsSI', 'SESS-601QR3', '2023-02-08', '06:30:00', '09:00:00', 'tTwWseR4VdA', NULL, 'live', NULL, '2023-02-08 10:33:31', 'not_paid'),
('SXjrMg13IJQ', '0YD187x3Tmc', 'SESS-VKYUZJ', '2023-01-11', '10:00:00', '10:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-01-26 03:13:00', 'not_paid'),
('sxQXLpieYBl', 'EbNqkmPy370', 'SESS-VYW7Q9', '2023-04-14', '15:00:00', '16:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 17:44:22', 'not_paid'),
('ty4bidnuaG3', 'k15gGwebVyp', 'SESS-IMPSQ6', '2023-02-27', '12:00:00', '13:00:00', '6uY1N4c9VEl', NULL, 'virtual', NULL, '2023-02-27 12:15:00', 'not_paid'),
('vBnpFQw0aEq', '2uNpbEZ0Rht', 'SESS-SXL4YV', '2023-05-06', '07:00:00', '09:00:00', '0VK7FPymEhq', NULL, 'virtual', NULL, '2023-05-05 22:50:39', 'not_paid'),
('vmYiad6NsIR', '0YD187x3Tmc', 'SESS-7NOVXS', '2022-12-05', '08:00:00', '10:00:00', 'J51oy6lguEe', NULL, 'virtual', NULL, '2022-12-23 11:31:29', 'not_paid'),
('whQfa3MLdAg', 'VqozWcjRlOZ', 'SESS-NF9MOJ', '2023-02-10', '08:00:00', '09:00:00', 'haoG90S1fpe', NULL, 'live', NULL, '2023-02-10 05:16:09', 'not_paid'),
('YDu0l7OrtMs', 'EbNqkmPy370', 'SESS-XE068W', '2023-04-15', '16:00:00', '17:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-08 17:24:58', 'not_paid'),
('YtWvzkX3Px5', '4KnW7mNrHdY', 'SESS-WJTXML', '2023-03-15', '09:00:00', '09:00:00', '0CGnJZv9zBA', NULL, 'virtual', NULL, '2023-03-15 12:25:11', 'not_paid'),
('YujP9UiIAZs', 'EbNqkmPy370', 'SESS-IPW8TU', '2023-04-12', '08:00:00', '09:00:00', 'cqbtO30oygT', NULL, 'live', NULL, '2023-04-10 14:34:13', 'not_paid'),
('zHGo0VuLMg7', '2uNpbEZ0Rht', 'SESS-RS6PB3', '2023-05-08', '16:00:00', '17:00:00', '0VK7FPymEhq', NULL, 'live', NULL, '2023-05-03 14:22:43', 'not_paid'),
('zkT4xyNmDIK', '0YDar1x3qwe', 'SESS-XB7O9C', '2022-12-30', '10:00:00', '12:00:00', 'q9cS2voZRNs', NULL, '', NULL, '2022-12-24 02:14:58', 'not_paid'),
('ZyvAngGcu1S', '0YD187x3Tmc', 'SESS-O4Q59W', '2023-01-25', '10:00:00', '10:00:00', 'haoG90S1fpe', NULL, 'live', NULL, '2023-01-25 05:05:53', 'not_paid'),
('ZyYQMj7GT63', 'k15gGwebVyp', 'SESS-L2S3Z4', '2023-02-27', '11:00:00', '12:00:00', '6uY1N4c9VEl', NULL, 'virtual', NULL, '2023-02-27 12:18:12', 'not_paid');

-- --------------------------------------------------------

--
-- Table structure for table `session_notes`
--

CREATE TABLE `session_notes` (
  `note_id` varchar(11) NOT NULL,
  `session_id` varchar(11) NOT NULL,
  `note_code` varchar(30) NOT NULL,
  `note_text` text NOT NULL,
  `note_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `session_notes`
--

INSERT INTO `session_notes` (`note_id`, `session_id`, `note_code`, `note_text`, `note_date_created`) VALUES
('208JfeYZTqh', 'nMXgCIbV9H1', 'NOT-EZHT6N', 'Patient record&#039;s', '2023-03-01 13:36:37'),
('4xoRdGQnzVs', 'Bxs58Nz134A', 'NOT-VW93VJ', 'hello from the other side', '2023-01-10 06:42:55'),
('cdeKp9tXj17', 'feBm2c9OWk6', 'NOT-CSEXOR', 'HELLO', '2023-02-24 13:48:03'),
('EPODhnX34xp', 'Dw4N09LpaX3', 'NOT-Z72HBD', 'insert notes heres', '2022-11-29 19:48:33'),
('fH418zOaygC', 'pS3gePYzhy0', 'NOT-YMH8I0', 'Hi once again', '2023-03-02 13:25:34'),
('IUKct31FlE4', 'Bxs58Nz134A', 'NOT-JPHXLC', 'exhibiting withdrawal symptoms', '2023-01-11 23:39:17'),
('OTfS43PAqRr', 'Bxs58Nz134A', 'NOT-K33MF6', 'testing transfer', '2023-01-11 02:14:04'),
('qJB8Iy1zYH2', 'Dw4N09LpaX3', 'NOT-U1GFBV', 'The client is responding to the medication positively. Client came for a meeting today.', '2022-12-07 11:19:28'),
('r5XZCz3VHFE', 'pS3gePYzhy0', 'NOT-11C77C', 'The client was somehow...', '2023-03-02 13:24:23'),
('RJ0a6xEpsO7', 'goW4nvhQGxE', 'NOT-EAPMGR', 'went well', '2023-03-07 13:33:13'),
('utT8sfRzAMN', 'SMAlFODQCGd', 'NOT-KDGOF0', 'Client 1', '2023-02-28 13:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE `statistic` (
  `statistic_id` varchar(30) NOT NULL,
  `statistic_name` varchar(100) NOT NULL,
  `statistic_number` int(30) NOT NULL,
  `statistic_picture` varchar(30) DEFAULT NULL,
  `statistic_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `statistic`
--

INSERT INTO `statistic` (`statistic_id`, `statistic_name`, `statistic_number`, `statistic_picture`, `statistic_date_created`) VALUES
('fv6BxabSsQ0', 'FUNDING RECEIVED', 40000, 'calendar', '2022-06-14 17:55:24'),
('HZNfm8bvRtM', 'DAILY SESSIONS', 22, 'location', '2022-06-14 17:55:56'),
('sgb4ri2FOvH', 'THERAPISTS', 20, 'instructor', '2022-06-14 17:52:59'),
('ZbTMsF5YUwt', 'CLIENTS', 500, 'happiness', '2022-06-14 17:55:47');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` varchar(40) NOT NULL,
  `subscription_package` varchar(255) NOT NULL,
  `subscription_name` varchar(255) DEFAULT NULL,
  `subscription_email` varchar(255) DEFAULT NULL,
  `subscription_phone` varchar(100) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `subscription_amount` float(10,2) NOT NULL,
  `subscription_payment_status` enum('paid','not_paid') NOT NULL DEFAULT 'paid',
  `subscription_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `subscription_package`, `subscription_name`, `subscription_email`, `subscription_phone`, `device_id`, `subscription_amount`, `subscription_payment_status`, `subscription_date_created`) VALUES
('3uAvO5L9pSr', 'Individual', 'John Ndungu', 'vesendummy@gmail.com', '0702670301', NULL, 1.00, 'paid', '2022-12-23 13:14:41'),
('5igJqF8X1o4', 'Student', 'Michael', 'selunani@vesencomputing.com', '0702710739', NULL, 1.00, 'paid', '2023-01-06 09:14:34'),
('AOLrn1ytCzl', 'Individual', 'Wambumuli', 'jumatheofilo@gmail.com', '0725608292', NULL, 1.00, 'paid', '2022-12-30 02:15:17'),
('dHIRlc7znJm', '', '', '', '0724653596', NULL, 3050.00, 'paid', '2023-05-08 20:23:45'),
('eC7yaqB5OTt', 'Individual', 'Michael', 'selunani@vesencomputing.com', '702710739', NULL, 1.00, 'paid', '2023-01-11 23:31:01'),
('eCWErvwdGfZ', '', 'fify k', 'fredafify@gmail.com', '0714392052', NULL, 3000.00, 'paid', '2023-02-06 02:47:41'),
('edcqrCxzkMB', 'Individual', 'Michael', 'selunani@vesencomputing.com', '0702710739', NULL, 1.00, 'paid', '2023-01-11 09:18:21'),
('IMNV1FKLwtP', 'Group of 10', 'Njoki', 'njokimary47@gmail.com', '0726551488', NULL, 1.00, 'paid', '2023-01-17 01:03:22'),
('ISmlJre3zkR', '', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', NULL, 3050.00, 'paid', '2023-05-08 17:50:42'),
('kLVmWYah5rG', 'Individual', 'Patrick Ayub', 'pmanyara97@gmail.com', '0745858891', NULL, 1.00, 'paid', '2022-12-14 06:25:09'),
('LvsPluAtRWM', 'Corporate Basic', 'Dr Juma Theophilius', 'hello@psychx.io', '0720401194', NULL, 1.00, 'paid', '2022-12-15 01:16:40'),
('nB6kL4pRAwV', 'Individual', 'Michael', 'selunani@vesencomputing.com', '702710738', NULL, 1.00, 'paid', '2023-01-11 08:59:33'),
('oHdziD6UP2G', '', 'Mike Dean', 'michael1998march@gmail.com', '0702710739', NULL, 3050.00, 'paid', '2023-05-08 15:59:39'),
('pa3FGHkZ40D', 'Individual', 'Pat Ayub', 'pmanyara97@gmail.com', '0745858891', NULL, 1.00, 'paid', '2022-12-15 01:14:26'),
('Px829v1wFyp', 'Individual', 'Michael', 'michael1998march@gmail.com', '0702710739', NULL, 1.00, 'paid', '2022-12-23 11:35:34'),
('SUB202305106lzyPOe', 'couple', NULL, NULL, NULL, '210da0d5-1efa-49ec-935c-6305dd4726d0', 4000.00, 'paid', '2023-05-10 20:03:54'),
('SUB20230510BGp74oj', 'student', 'June Ndayishimiye', 'patjunhopat@gmail.com', '0745858891', '210da0d5-1efa-49ec-935c-6305dd4726d0', 1500.00, 'paid', '2023-05-10 17:13:31'),
('SUB20230510jfGTmec', 'student', 'June Ndayishimiye', 'patjunhopat@gmail.com', '0745858891', '210da0d5-1efa-49ec-935c-6305dd4726d0', 1500.00, 'paid', '2023-05-10 19:55:33'),
('SUB202305126k3VKdn', 'group', 'Santo', 'pmanyara97@gmail.com', '12121212', '5ed86b1f-fdc6-4560-882b-cceaae1da506', 5000.00, 'paid', '2023-05-12 12:08:22'),
('SUB20230512G5VJTKx', 'individual', 'Pat', 'santojuliototsan@gmail.com', '0745858891', 'd8aac443-bcff-4d12-b741-0709d8a1ddf8', 3000.00, 'paid', '2023-05-12 18:57:07'),
('SUB20230512GW51MPO', 'couple', 'Santo', 'pmanyara97@gmail.com', '12121212', 'dbda3d18-9c60-4939-8e62-a1636e6803c9', 4000.00, 'paid', '2023-05-12 00:17:43'),
('SUB20230512jguAyFx', 'individual', 'Santo', 'pmanyara97@gmail.com', '12121212', '5ed86b1f-fdc6-4560-882b-cceaae1da506', 3000.00, 'paid', '2023-05-12 11:44:25'),
('SUB20230512Qd4Ny0s', 'student', 'Pat', 'santojuliototsan@gmail.com', '0745858891', 'd8aac443-bcff-4d12-b741-0709d8a1ddf8', 1500.00, 'paid', '2023-05-12 18:33:19'),
('SUB20230512Ujg6Qlx', 'individual', 'Pat Imanarakoze', 'patjunhopat@gmail.com', '0745858891', '27321baa-1a37-4265-94cd-8f5f71ea4b3d', 3000.00, 'paid', '2023-05-12 00:27:12'),
('SUB202305221X9PtTA', 'couple', NULL, NULL, NULL, 'f44c39d4-b1fe-4407-9c57-c08e48fce82b', 4000.00, 'paid', '2023-05-22 23:57:51'),
('SUB202305245y4NnxY', 'individual', 'John Deere', 'juma@psychx.io', '0725608292', '08ea2b3b-d2b7-49b2-a37c-8fc2cc4507d5', 3000.00, 'paid', '2023-05-24 14:32:38'),
('SUB20230531afekKpu', 'student', NULL, NULL, NULL, '18c3d8c0-038d-4521-a1ee-542a3e99e10a', 1500.00, 'paid', '2023-05-31 00:59:39'),
('SUB20230531CZhs48D', 'individual', NULL, NULL, NULL, '2c90e0ac-6b86-49d6-b928-3144f15af5f6', 3000.00, 'paid', '2023-05-31 10:35:38'),
('SUB202306056Udo0b3', 'individual', 'Pat Imanarakoze', 'patjunhopat@gmail.com', '0745858891', 'a166401e-4f93-4245-bd52-2ba887ac632c', 3000.00, 'paid', '2023-06-05 12:32:40'),
('SUB20230605TQzDh3J', 'individual', 'Faith Isaac', 'isaacfaith593@gmail.com', '0725432005', 'fb40209c-6f78-4548-85af-ddf686812d97', 3000.00, 'paid', '2023-06-05 12:58:15'),
('SUB20230606hVC17Ax', 'couple', NULL, NULL, NULL, '6a5345c3-f695-4c84-a954-914ff8b2f06a', 4000.00, 'paid', '2023-06-06 19:27:28'),
('SUB20230606rWhP5FH', 'individual', 'John Ndungu', 'ndungu.murimi@gmail.com', '', '6a5345c3-f695-4c84-a954-914ff8b2f06a', 3000.00, 'paid', '2023-06-06 19:28:44'),
('SUB202306083DMwN9o', 'student', 'Gladys Wahithe', 'gladyswahithe@gmail.com', '254791245235', '90497103-4a94-4c2f-85ae-4a3f44ed0d7e', 1500.00, 'paid', '2023-06-08 15:09:56'),
('SUB20230608GdcsUke', 'student', NULL, NULL, NULL, '90497103-4a94-4c2f-85ae-4a3f44ed0d7e', 1500.00, 'paid', '2023-06-08 15:05:29'),
('SUB20230609mFTusfK', 'individual', NULL, NULL, NULL, 'c0635ddd-c016-4384-8e82-7fb3241c0694', 3000.00, 'paid', '2023-06-09 15:37:41'),
('SUB20230609MVoTitk', 'individual', 'Mike March', 'michael1998march@gmail.com', '01234561', '14335522-c976-4d99-bdeb-2fa48bd935ad', 3000.00, 'paid', '2023-06-09 19:14:45'),
('SUB20230610GdAUtiO', 'individual', NULL, NULL, NULL, '49c229b2-e461-4517-a028-19139561df9e', 3000.00, 'paid', '2023-06-10 09:44:16'),
('SUB20230612Hg2VUt7', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-12 23:47:52'),
('SUB20230612KiZEA9I', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', '49c229b2-e461-4517-a028-19139561df9e', 3000.00, 'paid', '2023-06-12 12:17:13'),
('SUB20230612yXmptDE', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', '49c229b2-e461-4517-a028-19139561df9e', 3000.00, 'paid', '2023-06-12 11:44:08'),
('SUB20230612zyejsR1', 'student', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', '49c229b2-e461-4517-a028-19139561df9e', 1500.00, 'paid', '2023-06-12 11:46:12'),
('SUB20230613Wu3ybQP', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-13 12:52:55'),
('SUB202306146pkdX8r', 'couple', NULL, NULL, NULL, 'b121a741-a946-4554-9ab9-fac4c697d14e', 4000.00, 'paid', '2023-06-14 12:03:58'),
('SUB20230614fguhaZJ', 'individual', NULL, NULL, NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-14 12:21:47'),
('SUB20230614Ziod5Y8', 'individual', NULL, NULL, NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-14 12:22:42'),
('SUB20230619ziEd2QT', 'student', NULL, NULL, NULL, 'c0635ddd-c016-4384-8e82-7fb3241c0694', 1500.00, 'paid', '2023-06-19 17:24:49'),
('SUB20230620Y8RXBEg', '', '', '', '', '', 0.00, 'paid', '2023-06-20 09:01:42'),
('SUB2023062605aArLd', 'individual', NULL, NULL, NULL, 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-26 19:15:23'),
('SUB20230626fpXUliK', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-06-26 19:28:23'),
('SUB20230630D9MPcg1', 'individual', NULL, NULL, NULL, 'dedda428-4914-469c-9a3d-95d1288c75c1', 3000.00, 'paid', '2023-06-30 21:28:16'),
('SUB20230705cKfP1Fr', 'individual', NULL, NULL, NULL, '7da437ef-9a1d-47ec-aa48-b089b200724e', 3000.00, 'paid', '2023-07-05 13:43:11'),
('SUB20230714r7pEZ31', 'student', NULL, NULL, NULL, '4169618a-de1c-4a4d-9c71-ff02d26a50d0', 1500.00, 'paid', '2023-07-14 23:23:50'),
('SUB202307201KdNtQ8', 'group', NULL, NULL, NULL, '153922e4-a4c6-4f9c-a202-511bb936cbe2', 5000.00, 'paid', '2023-07-20 12:19:38'),
('SUB20230721hZWDLlI', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', 'd72c3568-b702-4e17-a9ca-41e4cd02030a', 3000.00, 'paid', '2023-07-21 22:44:21'),
('SUB20230722FrLsq3h', 'individual', 'Ahmed Sultan Mirza', 'ahmed@thequantumz.com', '', 'deaf6d1c-64d0-474c-8461-a7d9e70cb860', 3000.00, 'paid', '2023-07-22 15:04:55'),
('SUB20230724NvMAchH', 'student', 'Esther Mwongeli', 'esthermwongeli625@gmail.com', '', '2dce3990-b5d6-4a62-aa75-f293409ae887', 1500.00, 'paid', '2023-07-24 18:54:27'),
('SUB20230724ZIr8Vsz', 'individual', NULL, NULL, NULL, '09b435cb-bef7-48d0-a019-f1d01d33412f', 3000.00, 'paid', '2023-07-24 18:49:46'),
('SUB20230807YgnHfuD', 'couple', NULL, NULL, NULL, 'ec45ba1f-dbc7-4651-b7ec-922357cf59b3', 4000.00, 'paid', '2023-08-07 13:29:30'),
('SUB20230808PUrep86', 'student', NULL, NULL, NULL, '0e209e46-ee56-4182-a91d-66154dbde088', 1500.00, 'paid', '2023-08-08 15:14:49'),
('SUB202308090d1Cq3a', 'individual', NULL, NULL, NULL, '05fbb31a-5ede-4abf-8ab1-b086ab871541', 3000.00, 'paid', '2023-08-09 01:10:07'),
('SUB20230809R8YygX2', 'individual', NULL, NULL, NULL, '1713fe05-9996-4e92-9475-fb1705b47abe', 3000.00, 'paid', '2023-08-09 16:35:39'),
('SUB20230810MQDr8bY', 'couple', NULL, NULL, NULL, '8b68ff62-e6dd-4993-a98b-886dcd756c80', 4000.00, 'paid', '2023-08-10 12:19:44'),
('SUB20230814rmGWVu6', 'individual', NULL, NULL, NULL, 'c22db3f0-1e7f-4456-9ebd-b3caef3e14b2', 3000.00, 'paid', '2023-08-14 14:22:46'),
('SUB20230815nrLXhsc', 'individual', NULL, NULL, NULL, 'bf07d5ec-1edd-457b-b61d-cf52705ccb12', 3000.00, 'paid', '2023-08-15 14:14:54'),
('SUB20230816FCKHlMo', 'student', NULL, NULL, NULL, 'b16e33e4-fe34-454d-a91a-6b0566aede2e', 1500.00, 'paid', '2023-08-16 09:47:45'),
('SUB20230816zb1diSU', 'individual', NULL, NULL, NULL, 'c22db3f0-1e7f-4456-9ebd-b3caef3e14b2', 3000.00, 'paid', '2023-08-16 16:43:48'),
('SUB202308225n4diLz', 'student', NULL, NULL, NULL, '153922e4-a4c6-4f9c-a202-511bb936cbe2', 1500.00, 'paid', '2023-08-22 15:35:40'),
('SUB20230823Cz20VFk', 'student', NULL, NULL, NULL, 'c9d49e1d-3ea9-4ca6-b4ba-7c988eb4d4cc', 1500.00, 'paid', '2023-08-23 15:46:30'),
('SUB20230823nC23WA0', 'student', NULL, NULL, NULL, 'c9d49e1d-3ea9-4ca6-b4ba-7c988eb4d4cc', 1500.00, 'paid', '2023-08-23 15:46:20'),
('SUB20230829knbpmwB', 'student', NULL, NULL, NULL, '08c4bda5-4c58-44e3-b687-3db286a45cb4', 1500.00, 'paid', '2023-08-29 19:46:59'),
('SUB20230831pP9I06W', 'student', 'mungai alvin kamau', 'akm@students.uonbi.ac.ke', '', 'dddd8db9-d2fa-4bde-9a39-9020ce148099', 1500.00, 'paid', '2023-08-31 00:11:18'),
('SUB20230901SvBClIw', 'student', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', 'de1654f6-e43b-4112-b29a-758d1fbc6871', 1500.00, 'paid', '2023-09-01 10:30:04'),
('SUB20230901TI1BqK4', 'individual', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', '87a6c566-d0d7-4779-8cc8-943f8b7c8b09', 3000.00, 'paid', '2023-09-01 09:57:51'),
('SUB20230908WAxP9SR', 'group', NULL, NULL, NULL, 'cc83a413-56a8-4c31-98b8-4908efca4fa7', 5000.00, 'paid', '2023-09-08 15:53:37'),
('SUB20230911Wm2jJ8B', 'student', 'Stella Kidera', 'kiderastella@gmail.com', '', '967ce195-e061-47bf-abff-8c8e1e6ba3a1', 1500.00, 'paid', '2023-09-11 10:36:22'),
('SUB20230916gwDL5d4', 'student', NULL, NULL, NULL, '4758464b-2c0e-42bb-a476-99e3c3b2dc0d', 1500.00, 'paid', '2023-09-16 19:29:08'),
('SUB20230926AibflLq', 'individual', NULL, NULL, NULL, 'ab923a30-7d3d-4335-a9c4-ae6d759cb52a', 3000.00, 'paid', '2023-09-26 17:14:20'),
('SUB20230926KxmSQgZ', 'individual', NULL, NULL, NULL, 'f9028ded-f317-48e9-8caf-9f83421572c9', 3000.00, 'paid', '2023-09-26 17:14:20'),
('SUB20230930SOnVLGM', 'individual', NULL, NULL, NULL, '1a078d4f-14f0-4b86-aa7a-b1649b0b0278', 3000.00, 'paid', '2023-09-30 17:44:09'),
('uNHo0BQRGKf', 'Individual', 'Michael', 'michael1998march@gmail.com', '9', NULL, 1.00, 'paid', '2023-01-26 03:04:48'),
('ZcRlDfrUtFQ', 'Student', 'Michael', 'dummye72@gmail.com', '702710738', NULL, 1.00, 'paid', '2022-12-23 12:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `therapist_id` varchar(30) NOT NULL,
  `therapist_name` varchar(255) NOT NULL,
  `therapist_email` varchar(255) NOT NULL,
  `therapist_password` varchar(255) NOT NULL,
  `therapist_phone` varchar(100) NOT NULL,
  `therapist_image` varchar(255) DEFAULT NULL,
  `therapist_address` text DEFAULT NULL,
  `therapist_bio` text NOT NULL,
  `category_id` varchar(5000) DEFAULT NULL,
  `therapist_location` text DEFAULT NULL,
  `therapist_activation` enum('activated','deactivated') NOT NULL DEFAULT 'activated',
  `therapist_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `therapist_date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `therapist_gender` varchar(255) NOT NULL DEFAULT 'female',
  `therapist_qualifications` text DEFAULT NULL,
  `therapist_specialty` text DEFAULT NULL,
  `therapist_license` text DEFAULT NULL,
  `therapist_statement` text DEFAULT NULL,
  `therapist_experience` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`therapist_id`, `therapist_name`, `therapist_email`, `therapist_password`, `therapist_phone`, `therapist_image`, `therapist_address`, `therapist_bio`, `category_id`, `therapist_location`, `therapist_activation`, `therapist_status`, `therapist_date_created`, `therapist_gender`, `therapist_qualifications`, `therapist_specialty`, `therapist_license`, `therapist_statement`, `therapist_experience`) VALUES
('2DE0jeYUufC', 'Irene Kathomi Gitonga', 'irenekg98@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254742179750', 'imgtnym2309121260120232302pmkn83.jpg', NULL, 'I am a medical psychologist by profession committed to helping individuals, couples, and families gain better balance and improve their mental well-being. If you&#039;re struggling with drug and substance use, anxiety, and gender-based violence, I can help you navigate through this and offer a path forward.', '1xm8GTDWZsq|3NJjfcrM1FW|MNGK5P6SZAr', 'Nairobi', 'activated', 'active', '2023-02-01 11:26:23', 'female', 'BSc Medical Psychology', 'General Psychotherapy, Addiction Counselling, Gender Based Counselling, Developmental Psychology', '2292', 'Healing starts with you.', '2 years'),
('2p7HXxnlVSK', 'Duncan Ogendi', 'dogendi@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254780201733', 'TherapyImage20230810at043300pmomaqeign.jpg', '', 'I am a highly self-motivated and ambitious person, with 14 years of MHPSS experience of mind and body healing. With 8 yearsâ€™ experience supporting youths and adult refugees of war Trauma with trauma therapy and rehabilitation. I have key interest in helping people navigate through their work life balance and building formidable relationships through therapy and trainings. I am also a gender friendly therapist and open to work with queer community and a sexuality therapist.', '', 'Nairobi', 'activated', 'active', '2023-02-01 10:59:27', 'male', 'BA Counselling Psychology', 'General Psychotherapy, Trauma Therapy, Special Population Psychology, Organizational Psychology, Addiction Counselling (both behaviour and substance).', 'KCPA/1113/10', 'Mental wellness', '14'),
('2uNpbEZ0Rht', 'Alexander Ng&#039;ang&#039;a Kinyanjui', 'dr.kinyanjui1@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254 714 000522', 'imgj1ny2308120480120232202pm37kh.jpg', 'Nairobi', 'I am passionate about helping people navigate through life&#039;s challenges and find their inner strength. My expertise lies in abnormal psychology, organizational psychology, general psychotherapy, child psychology, depression, suicide prevention, and trauma. I believe that healing is a holistic process, which is why I incorporate various forms of therapy such as art, music, movement, and nature into my practice. By embracing our unique qualities and potential, we can unlock the power to heal and lead fulfilling lives.', '9m5YMA3BHjL', 'Nairobi', 'activated', 'active', '2023-02-01 10:48:22', 'male', 'MSc Clinical Psychology', 'Organizational Psychology, General Psychotherapy, Child Psychology, Depression, Suicide Prevention, Trauma', '5218', 'Healing is not just about fixing what&#039;s broken, but embracing our uniqueness and unlocking our true potential.', '9 Years'),
('4KnW7mNrHdY', 'Sharlyne Nyawira Macharia', 'Sharlynemacharia2222@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254717714170', 'imgyk6x2310122070120230602pm6uhb.jpg', NULL, 'I am a qualified psychologist with training and experience in providing Mental Health services to Individuals and groups in pursuit of holistic mental health. I have training in a variety of techniques and strategies in working with cases of anxiety, depression, substance addiction, psychotic disorders and trauma-related conditions.', '3NJjfcrM1FW|9m5YMA3BHjL|MNGK5P6SZAr|zuEysB6krMi', 'Nairobi', 'activated', 'active', '2023-02-01 12:07:06', 'female', 'BA Counselling Psychology', 'General Psychotherapy, Anxiety, Depression, Trauma, Addiction', 'KCPA/6532/21', '&quot;You don&#039;t have to struggle in silence, for anything that is mentionable is manageable. When we talk about our feelings, they become less overwhelming, upsetting, and scary.&quot;', '3 Years'),
('7cDtAlKLsSI', 'Victoria Mwema', 'pmanyara97@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254703296082', 'imgn5272311123070120235502pmivbc.jpg', '', 'I am a psychologist, specializing in Clinical Psychology and experienced in working with children, adolescents and young people.', '3NJjfcrM1FW|5SmYyjWBAoG|9m5YMA3BHjL|zuEysB6krMi', 'Nairobi', 'activated', 'active', '2023-02-01 12:14:38', 'female', 'MA Clinical Psychology Candidate', 'Adolescent/ Youth Counselling, Anxiety, Depression, Trauma, Addiction', 'KPsyA/AM/142/2020', 'Healing is a rewarding journey and your first step to getting help is the purest form of courage.', '7years'),
('BNsKmCFWrQz', 'Beryl Njoki Mungai', 'berylmungai@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254791543500', 'PsychImage20230721at110929pmxnt1sjbv.jpg', '23987-00100,Nairobi', '5 years of experience as a psychologist,trainer and mental health advocate. I have expertise in child and adolescent Psychology, Trauma Counseling including that of Gender-based Violence Survivors, and working with adults experiencing challenges such as addiction, mental illness, and psychosocial stressors. clinical research. I am passionate about the provision of psychological care and working with people suffering from mental illnesses and affected families to enable everyone to lead healthy lives.', '', 'Nairobi', 'activated', 'active', '2023-02-01 11:43:56', 'female', 'Bachelor of Arts, Counselling Psychology', 'Anxiety, Depression, Child/ Adolescent Disorders, Substance Use Disorders', 'KCPA/06678/2021', 'Your mental health is everything â€“ prioritize it. Make the time like your life depends on it, because it does.', ''),
('DBk3Ro29htf', 'Jennifer Kyalo', 'info.jenniferk@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '', 'imgf5zi2308120300120235402pmbyq6.jpg', '', 'Hi! I\\\\\\&#039;m Jennifer. If you are looking for a therapist to help you make your life more fulfilling, then you\\&#039;ve found the right person! Available for Virtual Sessions only.', '', 'Nairobi', 'activated', 'active', '2023-02-01 10:30:54', 'Female', 'M.A. Counselling Psychology', 'Personal Development, Loss &amp; Grief, Suicidality, Anxiety, Depression, Addiction', 'KCPA/6182/21', 'Take charge of your life, starting with your mental health. PsychX is here to help! Available for Virtual Sessions only.', ''),
('Fb3l9TcLHvN', 'Perpetual Nyaguthii Kinyua', 'nyaguperpe@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254703554131', 'imgkmgs2309121050120231002pmhied.jpg', '', 'I am a licensed medical psychologist. I have 3 years of experience, offering individual and group therapy, organizing and facilitating group therapy sessions, and offering mental health talks. I am passionate about creating mental health literacy at the community level with a focus on promotive and preventive health, not just curative and rehabilitative health.', '', 'Nairobi', 'activated', 'active', '2023-02-01 11:05:10', 'female', 'Bsc Medical Psychology', 'Psychological  Assessments,Psychotherapy(individual therapy),Psychoeducation about mental health  conditions', 'RMedPay/2169/69', 'Mental health Matters.', ''),
('OHrSynPaCM7', 'Beryl Akoth Odhiambo', 'berylakoth.clinicalpsych@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254700858372', 'img1ox223032215162220230603pmnz13.jpg', 'Kisumu', 'I am a psychologist willing to hold your hand and give you a listening ear. My goal is to make sure you have a confidential and non-judgmental space to be yourself.  I am here for you.', '3NJjfcrM1FW|5SmYyjWBAoG|9m5YMA3BHjL|OrIVZ1TsN43', 'Kisumu', 'activated', 'active', '2023-02-01 12:00:38', 'female', 'BA Counselling Psychology', 'Anxiety, Depression, Trauma, Addiction, Childhood Counselling', '002', 'There is no journey too simple or complicated that we can&#039;t make together.  You do not have to walk alone. Our destination is a better space to achieve mental well-being. I am here for you, let&#039;s journey together.', '3 Years'),
('sYiIfO0mWh2', 'Elizabeth Kamene Katongi', 'lizykatongu@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254724989901', 'img1bzx2308120220120232302pmxeo3.jpg', NULL, 'I am an avid mental health advocate with 8 years of experience and am Passionate about meeting the mental well-being needs of adolescents and young adults and supporting them to navigate through life challenges.', 'K5HNOvLMlZ8', 'Nairobi', 'activated', 'active', '2023-02-01 10:22:23', 'female', 'BA Counselling Psychology', 'General Psychotherapy, Adolescent Counseling.', 'KAPC/MN01289/11/21', 'I love working with people from different cultures and believe each youth has the potential to achieve their life goals without the burden of pain and/or the past.', '8 YEARS EXPERIENCE'),
('THP20230615Q3fHXbd', 'Maryanne Waruguru', 'therapybymaryanne@gmail.com', '31346246', '0723629885', 'MovieImage20230615at030104pmhzwotd80.jpeg', 'Sunton, Kasarani', 'Maryanne Waruguru is a licensed Counselling Psychologist and an Award-winning Mental Health Advocate. She has over 5 years of experience in psychosocial support services working with NGOs, hospitals, and rehabilitation centers. She helps young people thrive through trauma healing by providing individual, group, and training/capacity building. She can help with issues of trauma, mental health conditions, relationship issues, career, life transitions, teen and adolescent crisis, self-awareness/self-esteem/identity, addictions, loss, and grief.', '5SmYyjWBAoG', 'Nairobi', 'activated', 'active', '2023-06-15 15:01:04', 'Female', 'Bsc. Counselling Psychology\\\\r\\\\nTrauma Informed Care Certification\\\\r\\\\nCognitive Behavioral Therapy Certification\\\\r\\\\nMental Health WHO Quality Rights Training', 'Trauma healing for teens and young adults', 'KCPA/5536/19', 'I help teens and young people move from survival to thriving through trauma healing. We identify the limiting beliefs and gain coping skills to thrive in your personal, relationship and career life.', '5'),
('THP20230702lvnUipA', 'Jacinta Wagithi Muriuki', 'wagithijacinta@gmail.com', '$2y$11$MYavRWZF177BMcieiLB6bOeuOw116scqA.jw1YxKagRHxIRcDZWBy', '0704322307', 'CinemasImage20230702at110147pmlvxy8zkp.jpg', 'Nairobi', 'A seasoned Clinical Psychologist with a thriving interest in helping people across all ages reach their mental health and healing goals using holistic approach.', '', 'Nairobi', 'activated', 'active', '2023-07-02 23:01:47', 'Female', 'MSc Clinical Psychology', 'Clinical mental health cases', 'CPAK/008/2022', 'A seasoned Clinical Psychologist with a thriving interest in helping people across all ages reach their mental health and healing goals using holistic approach.', '2'),
('THP20230702rudDT81', 'Linda Nyakoboke Atuti', 'lindanatuti@gmail.com', '$2y$11$gCQw75w7kLEyXAF8SCCgE.tZx7AwBPsjS82.K4R7hVLy0crZ1UuSm', '0701215458', 'AngaImage20230702at104951pmxtk650jn.jpg', 'Nakuru', 'Linda Atuti is a Licensed Psychologist who is very passionate about mental health and well-being and loves working with adolescents and adults alike. She is empathetic, patient, and a good listener.', '1xm8GTDWZsq|K5HNOvLMlZ8|5SmYyjWBAoG|3NJjfcrM1FW|zuEysB6krMi', 'Nakuru', 'activated', 'active', '2023-07-02 22:49:51', 'Female', 'Undergraduate Degree', 'Depression, Anxiety, Personal development therapy, Loss and Grief counseling, Trauma counseling, Addiction counseling', 'KCPA/0713/22', 'Linda Atuti is a Licensed Psychologist who is very passionate about mental health and well-being and loves working with adolescents and adults alike. She is empathetic, patient, and a good listener.', '2'),
('THP20230711hpcoNnj', 'Luke Kipruto Tuitoek', 'lukekipruto8@gmail.com', '$2y$11$Wi8KrA7xPAjlbjPuYWX/Je92AVHYNubPRh5mDYNQkLR1tCyu0e9Ki', '+254725309873', 'FilmImage20230711at010836pm7fyaxuhl.jpg', 'Nairobi', 'Am a highly motivated and dedicated therapist with a passion to see positive outcomes. I have experience, creativity, and a strong work ethic as a pillar of my practice. Specialized in Family therapy, medical conditions, oncological issues, and mental issues.', 'g0Uy2VmD9ql', 'Nairobi', 'activated', 'active', '2023-07-11 13:08:36', 'Male', 'BA Counselling Psychology', 'Family ,medical conditions, oncological issues and mental issues', 'KCPA/4818/18', 'Am a highly motivated and dedicated therapist with a passion to see positive outcomes. I have experience, creativity, and a strong work ethic as a pillar of my practice. Specialized in Family therapy, medical conditions, oncological issues, and mental issues.', '20'),
('THP20230711uvZ6r3a', 'Paul Mahihu Njogu', 'jehumahesh@gmail.com', '1234', '+254719862866', 'FilmImage20230711at012635pmjyedibz3.png', 'Muranga', 'A licensed Medical Psychologist with an insatiable interest in using evidence-based techniques to help those undergoing psychological stressors and difficulties overcome them and lead a happier and more fulfilling life.', '', 'Muranga', 'activated', 'active', '2023-07-11 13:23:22', 'Male', 'BSc Clinical Psychology', 'Psychological assessment, addiction counselling, loss and grief counselling.', 'RMedPsy/11723/117', 'A licensed Medical Psychologist with an insatiable interest in using evidence-based techniques to help those undergoing psychological stressors and dificulties overcome them and lead a happier and more fulfilling life.', '1'),
('THP20230801ac7mEDb', 'Bray Odhiambo Owiti', 'brayowiti17@gmail.com', '$2y$11$70nKK1tHSf4t47zGK5sIGu16VBz4dv1r05XfJdod6mmnUnU7NcXIK', '0702670557', 'HealthImage20230801at124948pmcfgqy2tk.jpg', 'Nairobi', 'Working with you to foster and nurture your mental well-being, one therapy session at a time.', 'CAT202308013AIGOBd', 'Nairobi', 'activated', 'active', '2023-08-01 12:49:48', 'Male', 'BA Counselling Psychology', 'BA Counselling Psychology', 'KPsy/AM/225/2021', 'Working with you to foster and nurture your mental well-being, one therapy session at a time.', '4'),
('THP20230911htMm36H', 'Claire Omolo', 'essieclaire94@gmail.com', '$2y$11$R9zKu/0tS/zNKsPNtZvqAOgGLiSdtdq.hsbylj4iDOdljjkTfoP3C', '0708127022', 'HealthImage20230911at114426pmaeosq3ym.jpg', 'Ngong', 'A Psychologist and Mental Health enthusiast, willing to help you actualize your goals and become the best version on yourself.', 'K5HNOvLMlZ8', 'Nairobi', 'activated', 'active', '2023-09-11 23:44:26', 'Female', 'BSc Clinical Psychology', 'Children and adolescents\\&#039; mental health: Depression, Anxiety, Conduct Disorders, ADHD, Bipolar, Group and Art Therapy,', 'KAPC/MN01057/12/19', 'A Psychologist and Mental Health enthusiast, willing to help you actualize your goals and become the best version on yourself.', '5'),
('THP20230911jkWMURO', 'Lorreine Wangari W.', 'wangarilor@gmail.com', '$2y$11$KOH2NTgOpc2Gvx1RtMkDFOHA/VPC2koIxouFbT3MhJGGFhCst8zT6', '0717417687', 'TherapyImage20230911at072448pmenduls5z.jpeg', 'Kasarani', 'Therapy ought to be a place of rest, release, and authenticity and that is the space I hope to provide for my clients. I believe we should have fun even as we challenge dominant positions and explore different perspectives and I hope we can do that together.', '', 'Nairobi', 'activated', 'active', '2023-09-11 19:24:48', 'Female', 'MA Counselling Psychology', 'Individual therapy, couples therapy, family therapy, group therapy and mindfulness.', 'KpsyA/FM/594/2023', 'Therapy ought to be a place of rest, release, and authenticity and that is the space I hope to provide for my clients. I believe we should have fun even as we challenge dominant positions and explore different perspectives and I hope we can do that together.', '3'),
('THP20230911xSRMeDm', 'Dr. Stellah Osoro Kerongo', 'stellaosoro@gmail.com', '$2y$11$ebl8.RxlkSpD5sF0Ww.e2.4.pIiCovk8w4BRUY6YkpoJFIuqPVuny', '0721473361', 'MentalImage20230911at073040pm96y2ujtk.jpg', 'Nairobi', 'Happy and emphatic personality. Caring and open to feedback. Ready to go the extra mile and be a mentor.', 'g0Uy2VmD9ql', 'Nairobi', 'activated', 'active', '2023-09-11 19:30:40', 'Female', 'PhD Clinical Psychology', 'Child, adolescents, marital issues, workplace, various loss and grief, assessment,  diagnosis and treatment of mental disorders', 'KpsyA/FM/463/2022', 'Happy and emphatic personality. Caring and open to feedback. Ready to go the extra mile and be a mentor.', '15'),
('xy1RPW6UC2J', 'Augustine Mwambia', 'austinemwambia@gmail.com', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', '+254704751881', 'imgz2i02309121120120232402pmdsnj.jpg', NULL, 'Am an addiction/psychological counselor, currently working at Methodist treatment center within a multidisciplinary team of professionals for the well-being of the clients and community in general', 'MNGK5P6SZAr', 'Nairobi', 'activated', 'active', '2023-02-01 11:12:24', 'male', 'BSc Counselling Psychology', 'General Psychotherapy, Addiction Counselling, Adolescent Counselling', 'KCPA/06846/22', 'Sometimes mental illness is terrifying because you feel like you have lost control of your mind and nothing makes sense, it&#039;s like watching yourself on autopilot and having little to no control, people with mental illness deserve as much support and compassion as people with physical health conditions.', '5 Years');

-- --------------------------------------------------------

--
-- Table structure for table `therapist_move`
--

CREATE TABLE `therapist_move` (
  `therapist_move_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `therapist_from_id` varchar(255) DEFAULT NULL,
  `therapist_to_id` varchar(255) NOT NULL,
  `therapist_move_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `therapist_move`
--

INSERT INTO `therapist_move` (`therapist_move_id`, `user_id`, `therapist_from_id`, `therapist_to_id`, `therapist_move_date_created`) VALUES
('TPM20230522A6POFx4', 'iWzTcjOEhXx', '', 'DBk3Ro29htf', '2023-05-22 15:18:37'),
('TPM202307011cfvgQr', 'USR20230630MCVs2rk', '', '2p7HXxnlVSK', '2023-07-01 08:59:32'),
('TPM20230703XJD8heC', 'USR20230630MCVs2rk', '2p7HXxnlVSK', '2p7HXxnlVSK', '2023-07-03 17:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(30) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_passport` varchar(255) DEFAULT NULL,
  `user_age` date DEFAULT NULL,
  `user_address` text DEFAULT NULL,
  `therapist_id` varchar(255) DEFAULT NULL,
  `user_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_phone`, `user_password`, `user_image`, `user_passport`, `user_age`, `user_address`, `therapist_id`, `user_date_created`) VALUES
('0CGnJZv9zBA', 'Hakeem Rabuka Kiboi', 'kiboihakeem@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-15 12:24:06'),
('0jog3yIUCGA', 'Michael Se-lunani', 'michael1998march2@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-18 09:16:34'),
('0VK7FPymEhq', 'Freda Mutune', 'mawiafreda@gmail.com', '0714392052', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', 'imgh0b323101410401420230402amwdlu.png', '32059698', NULL, 'Nairobi', NULL, '2023-01-31 04:25:44'),
('2g3sTCvQtmb', 'Fredrick', 'fredchege199@gmail.com', '0704692424', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '33563513', NULL, '', NULL, '2023-01-13 21:23:30'),
('32ikJPetMm9', 'Juma Theophlus', 'jumatheophilus657@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2022-12-21 22:25:13'),
('3YcCd0PFJSO', 'psychx Global', 'psychxglobal@gmail.com', '+254714392052', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', 'imgqty522022014092020224912pmlnkr.png', '', NULL, 'Kasarani, Mwiki Road P.O.Box 3637', NULL, '2022-12-20 04:01:33'),
('6ZO1cSDIKJj', 'Sarah', 'sarahitenya24@gmail.com', '0708320066', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '31798143', NULL, 'Nairobi', NULL, '2023-05-05 22:44:35'),
('7LU6RO1pJ9h', 'James rano', 'mmmuathime@gmail.com', '0733935448', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '10001034', NULL, 'Nairobi', NULL, '2023-01-26 04:00:32'),
('83TrzFSmJaA', 'Safe Space Arena', 'safespacearena@gmail.com', '0780059269', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '28249859', NULL, 'Kenya', NULL, '2023-01-08 07:22:43'),
('8lNcmigCHfn', 'John Ndungu', 'jndungu@jambopay.com', '+254713564851', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', 'imgtgr822093009063020221911amkr01.jpg', '34132269', NULL, '817', 'ADMIN', '2022-12-07 09:20:06'),
('a9O42nbtP8E', 'Letty', 'mtangeletty@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-12 03:39:53'),
('aLdFUHYmISu', 'Mike', 'nicksonkipkorir75@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-17 10:08:49'),
('aSzGs7EvBxN', 'Christine', 'christine11111@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2022-12-23 12:34:00'),
('bUioI457xvN', 'Victoria Mwema', 'vicmwema@gmail.com', '0703296082', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '29561128', NULL, '54430-00200', NULL, '2023-01-10 02:00:11'),
('cCvXYD5rFEI', 'Shameem mohammed', 'mohammedshamsa59@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-04 23:17:15'),
('cDrLqA4pCdZ', 'Higgins Ongaya', 'okiyahyggyn@gmail.com', '703559915', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '32288102', NULL, 'Roysambu', NULL, '2022-12-30 02:38:39'),
('cKQukE2aDdS', 'Patriciah Kamau', 'kamautrish12@gmail.com', '705484474', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, 'NA', NULL, '1910', NULL, '2023-05-09 18:44:23'),
('cqbtO30oygT', 'Michael Se Lunani', 'selunani@vesencomputing.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-06 09:08:26'),
('dHovsmRuEGQ', 'John', 'vesendummy@gmail.com', '0702670301', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-16 11:14:29'),
('dQqDMig8f7r', 'Marangu', 'marangu@psychx.io', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-25 15:24:36'),
('eMn0YzbGv24', 'Dorcas Makena Nkonge', 'nkonge94@gmail.com', '0115840422', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '30981188', NULL, '', NULL, '2023-03-14 14:16:45'),
('etdQOLJzsRl', 'Brian Omondi', 'brianomondi163@gmail.com', '0717960080', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', 'imgsdnw23101110411120234201amo1dc.jpg', '35327888', NULL, '126-40332', NULL, '2023-01-11 00:38:27'),
('FBZdwEa9Gx1', 'John Doe', 'johndoe@email.com', '1234567', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '12345', NULL, 'Kenya', '0YDar1x3pou', '2022-12-21 02:59:53'),
('FdaVCtQgAK5', 'Fify', 'fredafify@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-20 21:43:35'),
('fJjhKoZwTic', 'Jennifer K', 'info.jenniferk@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-08 07:05:28'),
('FpGi0KEPf8Y', 'Faith Arounga', 'faitharuonga@gmail.com', '0701126372', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '33272092', NULL, 'Eldoret', NULL, '2023-05-05 14:14:42'),
('Fv6ED4Ao7TB', 'Charity', 'mumbi_charity@yahoo.co.uk', '721791969', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '22201623', NULL, '', NULL, '2023-01-09 00:21:52'),
('GedFz6wxth9', 'John', 'info@vesencomputing.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2022-12-24 01:13:20'),
('GEemZI0AUsk', 'Alexander Kinyanjui', 'akinyanjui17@gmail.com', '+254731505747', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '29326512', NULL, '4243', NULL, '2023-01-10 09:13:46'),
('GOrLWu90VKH', 'Philip Matunda', 'philipmatunda@gmail.com', '+254745450770', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '34201425', NULL, 'plot 7 Nuru Garden', NULL, '2023-03-09 11:07:23'),
('gRQ8tPqv7Vz', 'Amina Mzee Omar', 'amnelally@gmail.com', '0758 811 682', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '27393003', NULL, '', NULL, '2023-02-17 01:45:13'),
('hwkAW2UIzGT', 'Philip Kyalo', 'mathekakyalo1@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-15 06:20:35'),
('I9LrmsKnkiJ', 'mercy', 'mercytheuri.mt@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-13 10:27:35'),
('iAFH139ek8q', 'Peninah Nyakiro', 'n.nyakiro@gmail.com', '0724653596', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '28619678', NULL, '', NULL, '2023-05-08 19:45:12'),
('MBI9GsWZp6J', 'Gael', 'freda@psychx.io', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-29 09:36:21'),
('mhxdHLoKy6v', 'LEWIS MUTUGI NYAGA', 'mutugilewis166@gmail.com', '0715237367', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '33252577', NULL, 'BOX 359 -00232 RUIRU', NULL, '2023-03-05 11:00:33'),
('Mku81YgzwGs', 'Dun Ogendi', 'Ogendidun@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-08 22:41:54'),
('n9SboIxagk0', 'Kabura', 'kaburanginya@gmail.com', '+254751388828', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '39577246', NULL, '758', NULL, '2023-01-11 06:31:16'),
('O4SzKMjwBGt', 'John Ndungu', 'ndungu.murimi@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-01 15:35:18'),
('oJtHC1p48sF', 'Viola Onyango', 'viola.onyango@yahoo.com', '702742898', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '31312775', NULL, '53448', NULL, '2023-03-07 13:10:47'),
('OsA5miKC0F9', 'Pat Imanarakoze', 'patjunhopat@gmail.com', '0123456', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', 'AngaImage20230608at125335pmg7fl36sk.jpg', '', NULL, 'Makongeni', NULL, '2023-02-13 06:40:56'),
('OWQlEzTxFKh', 'Doreen', 'Vesen@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-16 03:39:52'),
('PBTjQFG2e7O', 'FI', 'fifymawia@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-17 10:01:11'),
('phaXncSgrdm', 'Mary Njoki', 'mary.njoki@jasirifellow.org', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2022-12-23 00:41:37'),
('pwMWRj7eD3B', 'Emmanuel', 'manuelmatiro@gmail.com', '0722496748', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '299999999', NULL, '', NULL, '2023-04-26 00:01:37'),
('q9cS2voZRNs', 'Juniors', 'rockhealthconsults@gmail.com', '0720401194', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '32153893', NULL, '', NULL, '2022-12-20 03:59:15'),
('Qpg0KRBDi5y', 'Aisha', 'ashacadey68@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-05 20:28:46'),
('rF06Rs7qMVc', 'Nelson', 'nelswani@gmail.com', '0719584440', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, 'N/A', NULL, 'N/A', 'ADMIN', '2023-03-14 09:29:55'),
('rYBxskOQ81d', 'brenton', 'brentonbrysen42@gmail.com', '94044359988', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '9584393', NULL, 'nairobi', 'ADMIN', '2023-03-01 16:07:13'),
('rYni0fbW1Us', 'Joy Mwariri', 'mwaririjoy@gmail.com', '0719482442', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, 'N/A', NULL, 'N/A', 'ADMIN', '2023-03-07 15:38:53'),
('s6HugqmKJbN', 'John', 'john.ndungu@vesencomputing.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-08 14:55:20'),
('t3JCHT8PK5F', 'Santos', 'pmanyara97@gmail.com', '12121212', '$2y$11$GuaTXkocaWe1D/R/AQLbj.HPQwckb5KyntgFL2ZHYo4tSWYJCxgLa', 'AngaImage20230523at121108amjxvyon4e.jpg', '121212', NULL, 'Uthiru', NULL, '2023-05-12 00:02:21'),
('T3NqboDua4S', 'Ian Ap', 'apindiian@gmail.com', '+254717456149', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '31742846', NULL, 'Nairobi', NULL, '2023-03-10 14:58:36'),
('T6vMOgDQECR', 'Allan Ndirangu', 'ndiranguallan4@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-05-07 15:08:40'),
('TLGpBvZjmxs', 'Chao Beverlyn', 'bevpaisley7@gmail.com', '0716269067', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '36677531', NULL, '', NULL, '2023-03-05 13:54:33'),
('tLMHra4nZxA', 'John Jambo', 'admin@jamboshop.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2022-12-19 01:42:16'),
('tTwWseR4VdA', 'Esokoni Kenya', 'esokonik@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-28 01:38:39'),
('twuKgIfxJQM', 'julliet  ngina  nyamari', 'jullietnginah@gmail.com', '0796613940', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '35113170', NULL, '', NULL, '2022-12-30 02:41:09'),
('tx9YXQikVn0', 'Amita', 'Eastafricansugarbaby@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-02 06:43:50'),
('udSX6zV1Dc8', 'Mwilaria', 'evansmwika@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-06 08:58:35'),
('USR20230213JILZU0Y', 'michal', 'dummye72@gmail.com', '702710749', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-02-13 11:09:40'),
('USR20230424t6dYZcA', 'Lynette Mwangi', 'lynette.mwangi@vesencomputing.com', '0719838277', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-24 16:05:33'),
('USR20230512ougrvlQ', 'Pat', 'santojuliototsan2@gmail.com', '0745858891', '$2y$11$RaNPIPKn0y.sW4OhjdhE/OSEYCFdSDpicx7qraKVslOTV78i/B3.G', NULL, NULL, NULL, NULL, NULL, '2023-05-12 12:39:07'),
('USR20230524S7pw85F', 'John Deere', 'juma@psychx.io', '0725608292', '$2y$11$xJsS7ghRAGRYVOPW7UucR.l0plWOXVE7l6SPtjJUQuYzdIHTZ4S06', NULL, '', NULL, '43844', NULL, '2023-05-24 14:26:21'),
('USR202306055kfTVb0', 'Faith N Isaac', 'isaacfaith593@gmail.com', '0725432005', '$2y$11$8meEDMAnJ0JjweEBvGMJwOiiABoEKfx4L7Ggue47v8yl3yKgThDCq', 'FilmImage20230605at013840pmkcwhezdx.jpg', '', NULL, 'Saika', NULL, '2023-06-05 13:00:45'),
('USR20230608R1vqLrk', 'Pastor John Ngahu', 'thecampuspixel@gmail.com', '0715619700', '$2y$11$KaLZFTrpwm3txV2aXT8EmuA6a9bJ4AP9dpEP9H5cT3p87W6nZ8xLa', NULL, NULL, NULL, NULL, NULL, '2023-06-08 13:01:37'),
('USR20230608RxgJB10', 'Irene', 'irenemwaniki93@gmail.com', '0715282893', '$2y$11$hMhp.ssZC9JyCoVBRNzzCucOX.HGh3T5BV9/ft85Z3P9.ZiQGozu6', NULL, NULL, NULL, NULL, NULL, '2023-06-08 12:10:17'),
('USR20230608VhuE5tc', 'Gladys Wahithe', 'gladyswahithe@gmail.com', '+254791245235', '$2y$11$VvVpvUrsFhMGWS5yrKJkvehTExWl2gIL4C/R8dTabBOt0OFHSxYa6', NULL, NULL, NULL, NULL, NULL, '2023-06-08 14:13:34'),
('USR20230609IsD5thP', 'Juma', 'juma.theophilus@jasirifellow.org', '0720401194', '$2y$11$leWS/CcUdfOhMIEQv5..aO07qVkbwzYelFB.R2Kr6KDRlKBVn66Oe', NULL, NULL, NULL, NULL, NULL, '2023-06-09 15:38:45'),
('USR20230609neXZ1vW', 'Mike March', 'michaelselunani@vesencomputing.com', '01234561', '$2y$11$CV1L807RBRpTUP1GDAEqIuD2IIA.a5zWI0AoKpio.SOdhHqIbXf52', NULL, NULL, NULL, NULL, NULL, '2023-06-09 18:54:00'),
('USR20230609yM7G4jw', 'Santo Julio Totsan', 'santojuliototsan@gmail.com', NULL, '$2y$11$52Wc07yG6hp3lSMzmuaCu.iRJV7AdjVB1VSEZixvheS4f9UMh9NEC', NULL, NULL, NULL, NULL, NULL, '2023-06-09 18:23:49'),
('USR20230612projgKu', 'Hannah', 'nhgachugi@gmail.com', '0728011165', '$2y$11$RkX5e6mU9HfAd5dcR049nuRW6bQ4/53COhw5hOIohrirAGAha0eC6', NULL, NULL, NULL, NULL, NULL, '2023-06-12 14:31:47'),
('USR20230619zuWMt39', 'hellenalice1@gmail.com', 'hellenalice1@gmail.com', '0715684901', '$2y$11$SI9v5zArSIPTbjQtxHBicesHcFlNsarnNZ.GGDb5fSbb4ZGk63b/6', NULL, NULL, NULL, NULL, NULL, '2023-06-19 10:41:56'),
('USR20230620JIGX2YL', 'jacinta muriuki', 'wagithijacinta@gmail.com', '+254704322307', '$2y$11$sV5mgWJ9a2r81R.N/1ij0OLc2HFL42/P0XZ6wpTznEoPGH0DN8WcW', NULL, NULL, NULL, NULL, NULL, '2023-06-20 17:41:55'),
('USR20230630MCVs2rk', 'Paul Ndirangu', 'pandirangu@gmail.com', NULL, '$2y$11$JXfLOv5aik2NPckrtgOUnOqOmbsvnNuk16gx.tBa/Boeo.oitsIjC', NULL, NULL, NULL, NULL, '2p7HXxnlVSK', '2023-06-30 21:02:15'),
('USR20230705g04Pu5a', 'Lunani Mikael', 'michael1998march@gmail.com', '0123456', '$2y$11$AzCpxHO/CoEBLvgEzdObIeHXn0InTighxdXCWgymkezRzV/dIKQ8e', 'CinemasImage20230705at124029pmixro9g18.jpg', '', '2023-07-13', 'Kabarnet', NULL, '2023-07-05 12:40:29'),
('USR20230706THOYmVc', 'Beryl', 'berylmungai@gmail.com', '079143500', '$2y$11$PwSPYf8Me1mLRBGq3lZN0Owoq0EsV.QcAAUfLpeZWX27ynpspPayK', NULL, NULL, NULL, NULL, NULL, '2023-07-06 11:11:20'),
('USR20230709u7d4WRs', 'Laura', 'lauramurumba@gmail.com', '0721312903', '$2y$11$dn15RYTkoxm3nzA63bxRwuZhI2.BdhIkbkFxgcE0ebGIH8e4t3l5W', NULL, NULL, NULL, NULL, NULL, '2023-07-09 09:46:03'),
('USR20230715s3VgKlH', 'chege maria', 'chegemaria10@gmail.com', NULL, '$2y$11$YX/DJ8ZXdyMpSkb.I0o24eazwN4VDSIKOPHyL/.ZAm1w15pi6gTxK', NULL, NULL, NULL, NULL, NULL, '2023-07-15 11:36:36'),
('USR20230722zFk0ugQ', 'Ahmed Sultan Mirza', 'ahmed@thequantumz.com', NULL, '$2y$11$6Jc45y52Uj8gQYQFKho7GO2EJbYfiE/fmONq9pqd4u9M6ZMs2keyq', NULL, NULL, NULL, NULL, NULL, '2023-07-22 15:03:35'),
('USR20230723NDeP0aw', 'Susan Njeri', 'njerisusan160@gmail.com', NULL, '$2y$11$2etp84Ulv95ZdgCB83o1mOkqpHdHEILTYEOE/xm171eN6y4rp5faO', NULL, NULL, NULL, NULL, NULL, '2023-07-23 16:55:04'),
('USR20230724NiKXICo', 'Esther Mwongeli', 'esthermwongeli625@gmail.com', NULL, '$2y$11$4sVux53POqXhAoWE7U0D5ug0bMTHrYo7Lt7bS1167WKgDcTLZSpxK', NULL, NULL, NULL, NULL, NULL, '2023-07-24 18:51:13'),
('USR20230724x5Wro4P', 'Mahihu Njogu', 'jehumahesh@gmail.com', NULL, '$2y$11$7M2xpShWgH40u9F1gdRBrePt2vZE4PXU2B6GYqJlLZhBf2S.pshKu', NULL, NULL, NULL, NULL, NULL, '2023-07-24 12:48:46'),
('USR20230806Am7bgQT', 'Sherise Mu', 'sherisebecky@gmail.com', NULL, '$2y$11$H25jh0GKgLQ5gX97AvS5oeRPJ5d5bP5JUxa7ZpyFS7wnosMKsdzYu', NULL, NULL, NULL, NULL, NULL, '2023-08-06 22:19:25'),
('USR202308107uwLvcy', 'Francisca', 'cescamusyoki@gmail.com', '0791853556', '$2y$11$Lxr32tlmxK8Fa3pq8xVdoeOOh8vOrcji9RN4Gw7q1xJWce8XpGeUi', NULL, NULL, NULL, NULL, NULL, '2023-08-10 15:36:14'),
('USR20230810OXprDv1', 'Francisca', 'munyivacesca@gmail.com', '0791853556', '$2y$11$e4F6BLxyj/SdxTgmE3QE8O4oTaUhfFF1Q8Tj8ljS42d16f4wiafkS', NULL, NULL, NULL, NULL, NULL, '2023-08-10 15:40:55'),
('USR202308138wlY2s4', 'RUTH NJUGUNA', 'njugunaruth821@gmail.com', NULL, '$2y$11$151z1Zxwit.UBY5MhXIGGOqGs4kT8HUCqcH5/C9qomHpSmU.grJie', NULL, NULL, NULL, NULL, NULL, '2023-08-13 12:08:03'),
('USR20230813DyBYA6S', 'Mary Nungari', 'marynungari366@gmail.com', '0715771424', '$2y$11$OLXK7ws5LYYM/HfUR0ywKumPAlXVH3Cmh.F7U6.HqPPOepaeUdNEC', NULL, NULL, NULL, NULL, NULL, '2023-08-13 15:43:05'),
('USR20230814wlFqrCW', 'VALLERY OUMA', 'Oumavallery17@yahoo.com', '0723664318', '$2y$11$oU4fls4.oCvaXrDw1S6p1.i00hnz.FEcNQrxOjAZk/ymjE24v1jL2', NULL, NULL, NULL, NULL, NULL, '2023-08-14 11:03:37'),
('USR20230815chidPaQ', 'MUNGAI ALVIN KAMAU', 'akm@students.uonbi.ac.ke', NULL, '$2y$11$SLtchOZuEHXWhvvBHEnZ0OEkff1tHH7beW8qjjLqqzFN1SuGVNTle', NULL, NULL, NULL, NULL, NULL, '2023-08-15 12:48:55'),
('USR202308179pNJ0r5', 'ANTONY MANGOLI', 'antocozin@gmail.com', NULL, '$2y$11$7uzpzISDhwhI6aV2PQ3sGO2e2jVgHe.7l2pUJ2l8.3Vkr84HgsasC', NULL, NULL, NULL, NULL, NULL, '2023-08-17 12:05:57'),
('USR20230821KTq49Y0', 'Naomi Adema', 'ademanaomi@gmail.com', NULL, '$2y$11$nyPnKZuySXgIVrFRmMmLseMNOBeSU/MstBVfCUE1NWKYfGzoRn..m', NULL, NULL, NULL, NULL, NULL, '2023-08-21 02:48:50'),
('USR202308230y5c9Ul', 'Joy Njoki', 'njokinjiru24@gmail.com', '0722857940', '$2y$11$FrZR0lj6g8EEYnrXsUwY1.IAgZKFE5KVFSv394a1pITvsIp./04tG', NULL, '', '0000-00-00', '', NULL, '2023-08-23 16:03:55'),
('USR20230823NMByH9z', 'Annah Kimani', 'akimani66@gmail.com', NULL, '$2y$11$/dU0O4MPnh3nP0gNt576DOZpV3ZAeoAoY1qyWuA80se3tN4ndQyJi', NULL, NULL, NULL, NULL, NULL, '2023-08-23 14:11:09'),
('USR20230830txqlPeR', 'Brian Muchanga', 'brianmuchanga@gmail.com', NULL, '$2y$11$hNN50hvUfphiaw37Bc9J2.EdJvWIDEU20mqGCCB3fO6no8oJBYCv.', NULL, NULL, NULL, NULL, NULL, '2023-08-30 11:22:58'),
('USR20230908RtrP0ah', 'Juma', 'jumatheofilo@gmail.com', '0725608292', '$2y$11$UKldW7SNI8awGqi/Q.cyDuYAS1g2BHVr0TZa8EUDyDnxnFJw5UZV6', NULL, NULL, NULL, NULL, NULL, '2023-09-08 15:22:31'),
('USR20230911KIbBhok', 'Stella Kidera', 'kiderastella@gmail.com', NULL, '$2y$11$xe2EJXfbXL4O700hU6YMX.oxCWp9wDVdUV5..13/h2MDqAKSSy4mi', NULL, NULL, NULL, NULL, NULL, '2023-09-11 10:32:37'),
('USR20230912fbNRjHv', 'Annet Nyabuto', 'annetgnyabuto@gmail.com', '0748491331', '$2y$11$8uBLQePfKMnIS8WJW6JPf.JkK/6UBdCOTIj4ZaMW14aJpLEgNOpBW', NULL, NULL, NULL, NULL, NULL, '2023-09-12 18:04:04'),
('USR20230913u7I68tN', 'Daisy Gitimu', 'daisygitimu@gmail.com', NULL, '$2y$11$rCWJtxIcD7fSIbUG/eZ18O7kt2If3V.SZkaayh3SBfu7Qp2qWTDdW', NULL, NULL, NULL, NULL, NULL, '2023-09-13 13:12:20'),
('USR20230925rA0Gu3v', '', '', NULL, '$2y$11$u25wbBFWkVs/Qh77N/xJo.S21Z3fClJ2qa6Qw7bCKa.oH.jT3yct6', NULL, NULL, NULL, NULL, NULL, '2023-09-25 03:00:41'),
('USR20230926LsRXnKO', 'Andrew', 'andymusili@gmail.com', '0719498657', '$2y$11$fi6JLyWtVW6/D1xCXNQn7.106yi/w8bDuiQCN3X43IGc11xr1el16', NULL, NULL, NULL, NULL, NULL, '2023-09-26 17:15:13'),
('UVO4WqP9LzE', 'Ayub Toussaint', 'prinzbonz@gmail.com', '0745858891', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '123123123', NULL, 'x', NULL, '2022-12-15 01:23:31'),
('vCOJRmr5U0K', 'Wambui Mwaura', 'mwauraw029@gmail.com', '+254 769 467 176', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '35266281', NULL, 'Zenith gardens, brookside , Westlands', NULL, '2023-02-27 01:21:24'),
('vdPby5mEYeA', 'Neddy Lusimbo', 'Lusimboneddy@gmail.com', '0702879696', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '30593954', NULL, 'Imara Daima', NULL, '2023-04-18 15:32:07'),
('w0pxq1Tnogs', 'PsychX', 'psychxcommunication@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-07 13:24:00'),
('W1g72jy0FAe', 'BIBO', 'bibo@hardware.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-29 16:45:15'),
('wRaFnGS6itU', 'Jackson Kimeu', 'jackeym89@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-18 11:47:27'),
('xso3gzWnRw8', 'Njoki', 'njokimary47@gmail.com', '0726551488', '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, '31451051', NULL, 'Nairobi', NULL, '2023-01-17 00:46:19'),
('YFiowAQku7z', 'Vesen Computing Solutions', 'support@vesencomputing.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-01-16 05:02:54'),
('YSA7c9pthi5', 'John', 'admin@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-04-21 12:01:29'),
('Z79PFDXvObR', 'Laurin M', 'laurinmungai@gmail.com', NULL, '$2y$11$NHJnqtVe6MVcEPv90Cahku0cuor/eJA6BdaUnT4.QUPo6SynpcCFy', NULL, NULL, NULL, NULL, NULL, '2023-03-24 11:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `voucher_id` varchar(30) NOT NULL,
  `voucher_code` varchar(255) NOT NULL,
  `company_id` varchar(255) DEFAULT NULL,
  `voucher_added_by` varchar(255) DEFAULT NULL,
  `corporate_id` varchar(255) NOT NULL,
  `voucher_batch` varchar(255) DEFAULT NULL,
  `voucher_num` int(10) DEFAULT NULL,
  `voucher_paid` enum('paid','not_paid') DEFAULT 'not_paid',
  `voucher_for` varchar(255) NOT NULL,
  `voucher_used` enum('yes','no') NOT NULL DEFAULT 'no',
  `voucher_date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`voucher_id`, `voucher_code`, `company_id`, `voucher_added_by`, `corporate_id`, `voucher_batch`, `voucher_num`, `voucher_paid`, `voucher_for`, `voucher_used`, `voucher_date_created`) VALUES
('2QFjdD5TMPH', 'KC10', '8pme1xC4FQr', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-05-02 14:55:31'),
('92CFp4mlHaB', 'SPL01', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-05-03 14:20:41'),
('MYsJl9ofpau', 'Kcio', '8pme1xC4FQr', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-05-02 20:13:11'),
('VOC20230508cZ73K5e', 'ABC12345', 'VQKYCIaMtFL', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-05-08 14:01:45'),
('VOC202307201JfUMei', 'SPL107', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:34:27'),
('VOC2023072023t78aN', 'SPL108', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:34:44'),
('VOC202307203C0OhMk', 'SPL105', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:33:50'),
('VOC20230720e8HrkOq', 'SPL102', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:31:09'),
('VOC20230720gLAxul5', 'SPL110', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:35:42'),
('VOC20230720HD9uIgA', 'SPL106', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:34:12'),
('VOC20230720ipxdJaD', 'SPL104', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:33:31'),
('VOC20230720R5r3a14', 'SPL103', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:31:33'),
('VOC20230720TNGWI9x', 'SPL109', 'BU5kp4cdouv', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-07-20 10:35:21'),
('VOC202308114nLhj2r', 'PSYCHXOFF006', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:34:07'),
('VOC20230811kc9UWT8', 'PSYCHXOFF003', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:33:00'),
('VOC20230811mrXD8z3', 'PSYCHXOFF009', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:38:35'),
('VOC20230811sJQYNE0', 'PSYCHXOFF010', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:39:06'),
('VOC20230811UFdZ8vy', 'PSYCHXOFF004', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:33:15'),
('VOC20230811VKpjBl8', 'PSYCHXOFF005', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:33:27'),
('VOC20230811VxcnSes', 'PSYCHXOFF007', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:34:23'),
('VOC20230811ZkPvdV4', 'PSYCHXOFF008', 'CMP202308114XfVYqy', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-08-11 13:38:20'),
('VOC202309044h5kTrK', 'UGA006', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:47:30'),
('VOC2023090473qxcVz', 'UGA003', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:46:47'),
('VOC20230904ejn9BKU', 'UGA005', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:47:29'),
('VOC20230904geDPARo', 'UGA010', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:49:23'),
('VOC20230904LivxsdZ', 'UGA007', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:47:56'),
('VOC20230904M0gbJve', 'UGA001', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:45:04'),
('VOC20230904nI8J6El', 'UGA002', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:46:26'),
('VOC20230904ocFrlDu', 'UGA004', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:47:03'),
('VOC20230904UOZDAQE', 'UGA009', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:48:57'),
('VOC20230904xUGbRfO', 'UGA008', 'CMP202309018fIWtL0', NULL, '', NULL, NULL, 'not_paid', '', 'no', '2023-09-04 16:47:57'),
('VOC20230930gteD3fb', 'PSYCHX-NQWID', NULL, 'corporate', 'CPR20230930t7UxEh8', 'BATCH-ZJI4JT', 5, 'paid', 'student', 'no', '2023-09-30 18:53:06'),
('VOC20230930H7YhnU6', 'PSYCHX-QUTJ0', NULL, 'corporate', 'CPR20230930t7UxEh8', 'BATCH-ZJI4JT', 5, 'paid', 'student', 'no', '2023-09-30 18:53:06'),
('VOC20230930htRck4a', 'PSYCHX-1HPP2', NULL, 'corporate', 'CPR20230930t7UxEh8', 'BATCH-ZJI4JT', 5, 'paid', 'student', 'no', '2023-09-30 18:53:06'),
('VOC20230930mcWlwH9', 'PSYCHX-6H344', NULL, 'corporate', 'CPR20230930t7UxEh8', 'BATCH-ZJI4JT', 5, 'paid', 'student', 'no', '2023-09-30 18:53:06'),
('VOC20230930oFbnNpS', 'PSYCHX-ALW8I', NULL, 'corporate', 'CPR20230930t7UxEh8', 'BATCH-ZJI4JT', 5, 'paid', 'student', 'no', '2023-09-30 18:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `weekly_schedule`
--

CREATE TABLE `weekly_schedule` (
  `id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `calendar_info_id` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `weekly_schedule`
--

INSERT INTO `weekly_schedule` (`id`, `start_time`, `end_time`, `calendar_info_id`, `day`, `date_created`, `token`) VALUES
(4, '8:00', '10:00', '2', 'sun', '2022-12-20 23:31:33', NULL),
(5, '10:00', '12:00', '2', 'sun', '2022-12-20 23:31:33', NULL),
(6, '12:00', '14:00 ', '2', 'sun', '2022-12-20 23:31:33', NULL),
(7, '8:00', '10:00', '3', 'tue', '2022-12-20 23:31:33', NULL),
(8, '10:00', '12:00', '3', 'tue', '2022-12-20 23:31:33', NULL),
(9, '12:00', '14:00', '3', 'tue', '2022-12-20 23:31:33', NULL),
(10, '8:00', '10:00', '4', 'fri', '2022-12-20 23:31:33', NULL),
(11, '10:00', '12:00', '4', 'fri', '2022-12-20 23:31:33', NULL),
(12, '12:00', '14:00', '4', 'fri', '2022-12-20 23:31:33', NULL),
(13, '8:00', '10:00', '5', 'tue', '2022-12-20 23:31:33', NULL),
(14, '10:00', '12:00', '5', 'tue', '2022-12-20 23:31:33', NULL),
(15, '12:00', '14:00', '5', 'tue', '2022-12-20 23:31:33', NULL),
(16, '8:00', '10:00', '6', 'mon', '2022-12-20 23:31:33', NULL),
(17, '10:00', '12:00', '6', 'mon', '2022-12-20 23:31:33', NULL),
(18, '12:00', '14:00', '6', 'mon', '2022-12-20 23:31:33', NULL),
(19, '8:00', '10:00', '7', 'wed', '2022-12-20 23:31:33', NULL),
(20, '10:00', '12:00', '7', 'wed', '2022-12-20 23:31:33', NULL),
(21, '12:00', '14:00', '7', 'wed', '2022-12-20 23:31:33', NULL),
(22, '8:00', '10:00', '8', 'tue', '2022-12-20 23:31:33', NULL),
(23, '10:00', '12:00', '8', 'tue', '2022-12-20 23:31:33', NULL),
(24, '12:00', '2:00 PM', '8', 'tue', '2022-12-20 23:31:33', NULL),
(25, '8:00', '10:00', '9', 'sun', '2022-12-20 23:31:33', NULL),
(26, '10:00', '12:00', '9', 'sun', '2022-12-20 23:31:33', NULL),
(27, '12:00', '14:00', '9', 'sun', '2022-12-20 23:31:33', NULL),
(28, '8:00', '10:00', '10', 'wed', '2022-12-20 23:31:33', NULL),
(29, '10:00', '12:00', '10', 'wed', '2022-12-20 23:31:33', NULL),
(30, '12:00', '14:00', '10', 'wed', '2022-12-20 23:31:33', NULL),
(31, '8:00', '10:00', '11', 'sun', '2022-12-20 23:50:16', NULL),
(32, '10:00', '12:00', '11', 'sun', '2022-12-20 23:50:16', NULL),
(33, '12:00', '14:00', '11', 'sun', '2022-12-20 23:50:16', NULL),
(34, '8:00', '10:00', '12', 'fri', '2022-12-20 23:50:16', NULL),
(35, '10:00', '12:00', '12', 'fri', '2022-12-20 23:50:16', NULL),
(36, '12:00', '14:00', '12', 'fri', '2022-12-20 23:50:16', NULL),
(37, '8:00', '10:00', '13', 'tue', '2022-12-20 23:50:16', NULL),
(38, '10:00', '12:00', '13', 'tue', '2022-12-20 23:50:16', NULL),
(39, '12:00', '14:00', '13', 'tue', '2022-12-20 23:50:16', NULL),
(40, '8:00', '10:00', '14', 'thu', '2022-12-20 23:50:16', NULL),
(41, '10:00', '12:00', '14', 'thu', '2022-12-20 23:50:16', NULL),
(42, '12:00', '14:00', '14', 'thu', '2022-12-20 23:50:16', NULL),
(43, '8:00', '10:00', '15', 'wed', '2022-12-20 23:50:16', NULL),
(44, '10:00', '12:00', '15', 'wed', '2022-12-20 23:50:16', NULL),
(45, '12:00', '14:00', '15', 'wed', '2022-12-20 23:50:16', NULL),
(46, '8:00', '10:00', '16', 'wed', '2022-12-20 23:50:16', NULL),
(47, '10:00', '12:00', '16', 'wed', '2022-12-20 23:50:16', NULL),
(48, '12:00', '14:00', '16', 'wed', '2022-12-20 23:50:16', NULL),
(49, '8:00', '10:00', '17', 'sat', '2022-12-20 23:50:16', NULL),
(50, '10:00', '12:00', '17', 'sat', '2022-12-20 23:50:16', NULL),
(51, '12:00', '14:00', '17', 'sat', '2022-12-20 23:50:16', NULL),
(52, '8:00', '10:00', '18', 'sun', '2022-12-20 23:50:16', NULL),
(53, '10:00', '12:00', '18', 'sun', '2022-12-20 23:50:16', NULL),
(54, '12:00', '14:00', '18', 'sun', '2022-12-20 23:50:16', NULL),
(55, '8:00', '10:00', '19', 'fri', '2022-12-20 23:50:16', NULL),
(56, '10:00', '12:00', '19', 'fri', '2022-12-20 23:50:16', NULL),
(57, '12:00', '14:00', '19', 'fri', '2022-12-20 23:50:16', NULL),
(58, '8:00', '10:00', '20', 'sun', '2022-12-20 23:50:16', NULL),
(59, '10:00', '12:00', '20', 'sun', '2022-12-20 23:50:16', NULL),
(60, '12:00', '14:00', '20', 'sun', '2022-12-20 23:50:16', NULL),
(66, '10:00', '10:00', '1', 'wed', '2023-01-06 09:42:20', NULL),
(67, '11:00', '12:00', '1', 'wed', '2023-01-06 09:42:32', NULL),
(73, '06:30', '09:00', '22', 'tue', '2023-02-01 13:10:11', NULL),
(74, '06:30', '09:00', '22', 'wed', '2023-02-01 13:10:13', NULL),
(75, '06:30', '09:00', '22', 'thu', '2023-02-01 13:10:17', NULL),
(77, '06:30', '09:00', '22', 'sat', '2023-02-01 13:10:23', NULL),
(125, '08:00', '09:00', '23', 'mon', '2023-02-01 13:59:08', NULL),
(126, '08:00', '09:00', '23', 'tue', '2023-02-01 13:59:11', NULL),
(127, '08:00', '09:00', '23', 'wed', '2023-02-01 13:59:14', NULL),
(128, '08:00', '09:00', '23', 'thu', '2023-02-01 13:59:17', NULL),
(129, '08:00', '09:00', '23', 'fri', '2023-02-01 13:59:25', NULL),
(130, '08:00', '09:00', '23', 'sat', '2023-02-01 13:59:28', NULL),
(143, '10:00', '09:00', '24', 'wed', '2023-02-01 21:02:51', NULL),
(144, '10:00', '09:00', '24', 'thu', '2023-02-01 21:02:54', NULL),
(145, '10:00', '09:00', '24', 'fri', '2023-02-01 21:02:59', NULL),
(146, '10:00', '09:00', '24', 'sun', '2023-02-01 21:03:03', NULL),
(258, '09:00', '09:00', '25', 'tue', '2023-02-02 04:23:44', NULL),
(259, '10:00', '11:00', '25', 'tue', '2023-02-02 04:23:46', NULL),
(260, '11:00', '12:00', '25', 'tue', '2023-02-02 04:23:49', NULL),
(261, '12:00', '13:00', '25', 'tue', '2023-02-02 04:23:52', NULL),
(262, '13:00', '14:00', '25', 'tue', '2023-02-02 04:23:55', NULL),
(263, '09:00', '09:00', '25', 'wed', '2023-02-02 04:24:00', NULL),
(264, '09:00', '09:00', '25', 'thu', '2023-02-02 04:24:03', NULL),
(265, '09:00', '09:00', '25', 'fri', '2023-02-02 04:24:05', NULL),
(266, '09:00', '09:00', '25', 'sat', '2023-02-02 04:24:08', NULL),
(267, '14:00', '15:00', '25', 'tue', '2023-02-02 04:24:12', NULL),
(268, '15:00', '16:00', '25', 'tue', '2023-02-02 04:24:14', NULL),
(269, '10:00', '11:00', '25', 'wed', '2023-02-02 04:24:29', NULL),
(270, '11:00', '12:00', '25', 'wed', '2023-02-02 04:24:31', NULL),
(271, '12:00', '13:00', '25', 'wed', '2023-02-02 04:24:34', NULL),
(272, '13:00', '14:00', '25', 'wed', '2023-02-02 04:24:37', NULL),
(273, '14:00', '15:00', '25', 'wed', '2023-02-02 04:24:39', NULL),
(274, '15:00', '16:00', '25', 'wed', '2023-02-02 04:24:41', NULL),
(275, '10:00', '11:00', '25', 'thu', '2023-02-02 04:24:46', NULL),
(276, '11:00', '12:00', '25', 'thu', '2023-02-02 04:24:48', NULL),
(277, '12:00', '13:00', '25', 'thu', '2023-02-02 04:24:50', NULL),
(278, '13:00', '14:00', '25', 'thu', '2023-02-02 04:24:53', NULL),
(279, '14:00', '15:00', '25', 'thu', '2023-02-02 04:24:59', NULL),
(280, '15:00', '16:00', '25', 'thu', '2023-02-02 04:25:02', NULL),
(281, '10:00', '11:00', '25', 'fri', '2023-02-02 04:25:06', NULL),
(282, '11:00', '12:00', '25', 'fri', '2023-02-02 04:25:08', NULL),
(283, '12:00', '13:00', '25', 'fri', '2023-02-02 04:25:11', NULL),
(284, '13:00', '14:00', '25', 'fri', '2023-02-02 04:25:13', NULL),
(285, '14:00', '15:00', '25', 'fri', '2023-02-02 04:25:15', NULL),
(286, '15:00', '16:00', '25', 'fri', '2023-02-02 04:25:17', NULL),
(287, '10:00', '11:00', '25', 'sat', '2023-02-02 04:25:25', NULL),
(288, '11:00', '12:00', '25', 'sat', '2023-02-02 04:25:28', NULL),
(289, '12:00', '13:00', '25', 'sat', '2023-02-02 04:25:30', NULL),
(290, '13:00', '14:00', '25', 'sat', '2023-02-02 04:25:32', NULL),
(291, '08:00', '09:00', '26', 'mon', '2023-02-13 01:12:33', NULL),
(292, '08:00', '09:00', '26', 'tue', '2023-02-13 01:12:36', NULL),
(293, '08:00', '09:00', '26', 'wed', '2023-02-13 01:12:41', NULL),
(294, '08:00', '09:00', '26', 'thu', '2023-02-13 01:12:44', NULL),
(295, '08:00', '09:00', '26', 'fri', '2023-02-13 01:12:46', NULL),
(296, '08:00', '09:00', '26', 'sat', '2023-02-13 01:12:51', NULL),
(297, '08:00', '09:00', '26', 'sun', '2023-02-13 01:12:53', NULL),
(344, '08:00', '09:00', '27', 'wed', '2023-02-14 03:24:08', NULL),
(345, '08:00', '09:00', '27', 'tue', '2023-02-14 03:24:14', NULL),
(346, '08:00', '09:00', '27', 'mon', '2023-02-14 03:24:17', NULL),
(347, '08:00', '08:30', '27', 'thu', '2023-02-14 03:30:20', NULL),
(348, '08:30', '09:00', '27', 'mon', '2023-02-14 03:34:03', NULL),
(349, '08:30', '09:00', '27', 'tue', '2023-02-14 03:34:06', NULL),
(350, '08:30', '09:00', '27', 'wed', '2023-02-14 03:34:09', NULL),
(351, '08:30', '09:00', '27', 'thu', '2023-02-14 03:34:12', NULL),
(352, '08:00', '09:00', '28', 'mon', '2023-02-24 13:31:26', NULL),
(353, '08:00', '09:00', '28', 'wed', '2023-02-24 13:31:32', NULL),
(354, '08:00', '09:00', '28', 'fri', '2023-02-24 13:31:39', NULL),
(361, '10:00', '11:00', '28', 'mon', '2023-02-24 13:34:34', NULL),
(362, '09:00', '10:00', '28', 'tue', '2023-02-24 13:35:31', NULL),
(363, '08:00', '09:00', '29', 'mon', '2023-02-27 21:46:52', NULL),
(373, '14:00', '09:00', '29', 'tue', '2023-02-27 21:55:10', NULL),
(375, '15:00', '16:00', '29', 'mon', '2023-02-27 21:56:43', NULL),
(376, '16:00', '17:00', '29', 'mon', '2023-02-27 21:56:46', NULL),
(377, '17:00', '18:00', '29', 'mon', '2023-02-27 21:56:48', NULL),
(378, '18:00', '19:00', '29', 'mon', '2023-02-27 21:56:50', NULL),
(379, '19:00', '20:00', '29', 'mon', '2023-02-27 21:56:52', NULL),
(380, '07:00', '09:00', '29', 'wed', '2023-02-27 21:57:00', NULL),
(381, '07:00', '09:00', '29', 'thu', '2023-02-27 21:57:04', NULL),
(383, '07:00', '09:00', '29', 'sat', '2023-02-27 21:57:11', NULL),
(384, '07:00', '09:00', '29', 'sun', '2023-02-27 21:57:14', NULL),
(385, '20:00', '21:00', '29', 'mon', '2023-02-27 21:57:53', NULL),
(386, '21:00', '22:00', '29', 'mon', '2023-02-27 21:58:03', NULL),
(387, '09:00', '10:00', '29', 'tue', '2023-02-27 21:58:43', NULL),
(388, '10:00', '11:00', '29', 'tue', '2023-02-27 21:58:46', NULL),
(389, '11:00', '12:00', '29', 'tue', '2023-02-27 21:58:49', NULL),
(390, '12:00', '13:00', '29', 'tue', '2023-02-27 21:58:51', NULL),
(391, '13:00', '14:00', '29', 'tue', '2023-02-27 21:58:53', NULL),
(392, '14:00', '15:00', '29', 'tue', '2023-02-27 21:58:55', NULL),
(393, '15:00', '16:00', '29', 'tue', '2023-02-27 21:58:57', NULL),
(394, '08:00', '09:00', '29', 'wed', '2023-02-27 21:59:42', NULL),
(395, '09:00', '10:00', '29', 'wed', '2023-02-27 21:59:44', NULL),
(396, '10:00', '11:00', '29', 'wed', '2023-02-27 21:59:46', NULL),
(397, '11:00', '12:00', '29', 'wed', '2023-02-27 21:59:48', NULL),
(398, '12:00', '13:00', '29', 'wed', '2023-02-27 21:59:50', NULL),
(399, '13:00', '14:00', '29', 'wed', '2023-02-27 21:59:52', NULL),
(400, '14:00', '15:00', '29', 'wed', '2023-02-27 21:59:54', NULL),
(401, '15:00', '16:00', '29', 'wed', '2023-02-27 21:59:56', NULL),
(406, '20:00', '21:00', '29', 'tue', '2023-02-27 22:01:15', NULL),
(407, '21:00', '22:00', '29', 'tue', '2023-02-27 22:01:22', NULL),
(408, '07:00', '09:00', '29', 'fri', '2023-02-27 22:03:14', NULL),
(409, '16:00', '17:00', '29', 'wed', '2023-02-27 22:03:42', NULL),
(410, '08:00', '09:00', '29', 'thu', '2023-02-27 22:04:45', NULL),
(411, '09:00', '10:00', '29', 'thu', '2023-02-27 22:04:48', NULL),
(412, '10:00', '11:00', '29', 'thu', '2023-02-27 22:04:51', NULL),
(413, '11:00', '12:00', '29', 'thu', '2023-02-27 22:04:54', NULL),
(414, '12:00', '13:00', '29', 'thu', '2023-02-27 22:04:56', NULL),
(415, '13:00', '14:00', '29', 'thu', '2023-02-27 22:05:00', NULL),
(416, '14:00', '15:00', '29', 'thu', '2023-02-27 22:05:02', NULL),
(423, '20:00', '21:00', '29', 'thu', '2023-02-27 22:06:10', NULL),
(424, '21:00', '22:00', '29', 'thu', '2023-02-27 22:06:12', NULL),
(425, '22:00', '23:00', '29', 'thu', '2023-02-27 22:06:15', NULL),
(426, '08:00', '09:00', '29', 'fri', '2023-02-27 22:07:29', NULL),
(427, '09:00', '10:00', '29', 'fri', '2023-02-27 22:07:31', NULL),
(428, '10:00', '11:00', '29', 'fri', '2023-02-27 22:07:34', NULL),
(429, '11:00', '12:00', '29', 'fri', '2023-02-27 22:07:36', NULL),
(430, '12:00', '13:00', '29', 'fri', '2023-02-27 22:07:39', NULL),
(431, '13:00', '14:00', '29', 'fri', '2023-02-27 22:07:41', NULL),
(432, '14:00', '15:00', '29', 'fri', '2023-02-27 22:07:44', NULL),
(433, '15:00', '16:00', '29', 'fri', '2023-02-27 22:07:46', NULL),
(436, '08:00', '09:00', '29', 'sat', '2023-02-27 22:08:46', NULL),
(437, '09:00', '10:00', '29', 'sat', '2023-02-27 22:09:02', NULL),
(438, '10:00', '11:00', '29', 'sat', '2023-02-27 22:09:05', NULL),
(439, '11:00', '12:00', '29', 'sat', '2023-02-27 22:09:07', NULL),
(440, '12:00', '13:00', '29', 'sat', '2023-02-27 22:09:10', NULL),
(441, '13:00', '14:00', '29', 'sat', '2023-02-27 22:09:13', NULL),
(450, '12:00', '13:00', '29', 'sun', '2023-02-27 22:37:14', NULL),
(451, '13:00', '14:00', '29', 'sun', '2023-02-27 22:37:16', NULL),
(452, '14:00', '15:00', '29', 'sun', '2023-02-27 22:37:18', NULL),
(453, '15:00', '16:00', '29', 'sun', '2023-02-27 22:37:20', NULL),
(454, '16:00', '17:00', '29', 'sun', '2023-02-27 22:37:22', NULL),
(455, '17:00', '18:00', '29', 'sun', '2023-02-27 22:37:33', NULL),
(456, '18:00', '19:00', '29', 'sun', '2023-02-27 22:37:37', NULL),
(457, '19:00', '20:00', '29', 'sun', '2023-02-27 22:37:40', NULL),
(459, '09:00', '09:00', '30', 'mon', '2023-02-28 09:21:01', NULL),
(460, '09:00', '09:00', '30', 'tue', '2023-02-28 09:21:07', NULL),
(461, '09:00', '09:00', '30', 'wed', '2023-02-28 09:21:10', NULL),
(462, '09:00', '09:00', '30', 'thu', '2023-02-28 09:21:13', NULL),
(463, '09:00', '09:00', '30', 'fri', '2023-02-28 09:21:16', NULL),
(465, '11:00', '12:00', '30', 'mon', '2023-02-28 09:21:55', NULL),
(466, '12:00', '13:00', '30', 'mon', '2023-02-28 09:22:05', NULL),
(468, '14:00', '15:00', '30', 'mon', '2023-02-28 09:22:12', NULL),
(469, '15:00', '16:00', '30', 'mon', '2023-02-28 09:22:14', NULL),
(470, '16:00', '17:00', '30', 'mon', '2023-02-28 09:22:17', NULL),
(471, '11:00', '12:00', '30', 'tue', '2023-02-28 09:23:18', NULL),
(472, '12:00', '13:00', '30', 'tue', '2023-02-28 09:23:22', NULL),
(474, '14:00', '15:00', '30', 'tue', '2023-02-28 09:23:32', NULL),
(475, '15:00', '16:00', '30', 'tue', '2023-02-28 09:23:35', NULL),
(477, '11:00', '12:00', '30', 'wed', '2023-02-28 09:24:02', NULL),
(478, '12:00', '13:00', '30', 'wed', '2023-02-28 09:24:09', NULL),
(479, '13:00', '14:00', '30', 'wed', '2023-02-28 09:24:12', NULL),
(480, '14:00', '15:00', '30', 'wed', '2023-02-28 09:24:15', NULL),
(482, '11:00', '12:00', '30', 'thu', '2023-02-28 09:24:50', NULL),
(483, '12:00', '13:00', '30', 'thu', '2023-02-28 09:24:53', NULL),
(485, '14:00', '15:00', '30', 'thu', '2023-02-28 09:25:01', NULL),
(486, '15:00', '16:00', '30', 'thu', '2023-02-28 09:25:03', NULL),
(487, '16:00', '17:00', '30', 'thu', '2023-02-28 09:25:07', NULL),
(488, '11:00', '12:00', '30', 'fri', '2023-02-28 09:25:21', NULL),
(490, '13:00', '14:00', '30', 'fri', '2023-02-28 09:25:27', NULL),
(491, '14:00', '15:00', '30', 'fri', '2023-02-28 09:25:30', NULL),
(492, '15:00', '16:00', '30', 'fri', '2023-02-28 09:27:24', NULL),
(493, '16:00', '17:00', '30', 'fri', '2023-02-28 09:27:28', NULL),
(498, '08:00', '09:00', '31', 'mon', '2023-02-28 13:20:50', NULL),
(500, '08:00', '09:00', '31', 'sat', '2023-02-28 13:20:52', NULL),
(501, '08:00', '09:00', '31', 'fri', '2023-02-28 13:20:55', NULL),
(502, '08:00', '09:00', '31', 'wed', '2023-02-28 13:20:58', NULL),
(503, '08:00', '09:00', '31', 'tue', '2023-02-28 13:20:59', NULL),
(528, '15:00', '16:00', '31', 'tue', '2023-02-28 13:22:32', NULL),
(529, '16:00', '17:00', '31', 'tue', '2023-02-28 13:22:35', NULL),
(571, '15:00', '16:00', '31', 'mon', '2023-02-28 13:43:10', NULL),
(572, '16:00', '17:00', '31', 'mon', '2023-02-28 13:43:14', NULL),
(573, '17:00', '18:00', '31', 'mon', '2023-02-28 13:43:18', NULL),
(575, '15:00', '16:00', '31', 'wed', '2023-02-28 13:44:03', NULL),
(576, '16:00', '17:00', '31', 'wed', '2023-02-28 13:44:07', NULL),
(577, '15:00', '16:00', '31', 'fri', '2023-02-28 13:44:16', NULL),
(578, '16:00', '17:00', '31', 'fri', '2023-02-28 13:44:19', NULL),
(579, '17:00', '18:00', '31', 'fri', '2023-02-28 13:44:23', NULL),
(580, '15:00', '16:00', '31', 'sat', '2023-02-28 13:44:30', NULL),
(581, '16:00', '17:00', '31', 'sat', '2023-02-28 13:44:33', NULL),
(582, '17:00', '18:00', '31', 'sat', '2023-02-28 13:44:37', NULL),
(583, '18:00', '19:00', '31', 'sat', '2023-02-28 13:44:40', NULL),
(584, '19:00', '20:00', '31', 'sat', '2023-02-28 13:44:43', NULL),
(587, '09:00', '09:00', '32', 'tue', '2023-02-28 20:29:26', NULL),
(588, '09:00', '09:00', '32', 'wed', '2023-02-28 20:29:30', NULL),
(589, '09:00', '09:00', '32', 'thu', '2023-02-28 20:29:40', NULL),
(590, '09:00', '09:00', '32', 'sat', '2023-02-28 20:29:43', NULL),
(591, '10:00', '11:00', '32', 'tue', '2023-02-28 20:29:59', NULL),
(595, '10:00', '11:00', '32', 'wed', '2023-02-28 20:30:29', NULL),
(598, '10:00', '11:00', '32', 'thu', '2023-02-28 20:30:43', NULL),
(601, '10:00', '11:00', '32', 'sat', '2023-02-28 20:30:59', NULL),
(608, '09:00', '10:00', '25', 'mon', '2023-03-02 13:43:21', NULL),
(610, '16:00', '17:00', '25', 'mon', '2023-03-02 13:43:48', NULL),
(611, '17:00', '18:00', '25', 'mon', '2023-03-02 13:43:52', NULL),
(612, '08:00', '09:00', '34', 'sat', '2023-03-04 09:55:24', NULL),
(613, '03:00', '09:00', '34', 'sun', '2023-03-04 09:56:28', NULL),
(616, '10:00', '13:00', '24', 'tue', '2023-03-08 20:26:11', NULL),
(617, '10:00', '13:00', '24', 'mon', '2023-03-08 20:26:14', NULL),
(618, '11:00', '12:00', '24', 'mon', '2023-03-08 20:26:30', NULL),
(619, '12:00', '13:00', '24', 'mon', '2023-03-08 20:26:33', NULL),
(620, '13:00', '14:00', '24', 'mon', '2023-03-08 20:26:36', NULL),
(621, '14:00', '15:00', '24', 'mon', '2023-03-08 20:26:39', NULL),
(622, '11:00', '12:00', '24', 'tue', '2023-03-08 20:26:54', NULL),
(623, '12:00', '13:00', '24', 'tue', '2023-03-08 20:27:32', NULL),
(624, '13:00', '14:00', '24', 'tue', '2023-03-08 20:27:42', NULL),
(625, '14:00', '15:00', '24', 'tue', '2023-03-08 20:27:45', NULL),
(626, '11:00', '12:00', '24', 'wed', '2023-03-08 20:27:49', NULL),
(627, '12:00', '13:00', '24', 'wed', '2023-03-08 20:27:57', NULL),
(628, '13:00', '14:00', '24', 'wed', '2023-03-08 20:28:00', NULL),
(629, '14:00', '15:00', '24', 'wed', '2023-03-08 20:28:03', NULL),
(630, '11:00', '12:00', '24', 'thu', '2023-03-08 20:28:06', NULL),
(631, '12:00', '13:00', '24', 'thu', '2023-03-08 20:28:14', NULL),
(632, '13:00', '14:00', '24', 'thu', '2023-03-08 20:28:22', NULL),
(633, '14:00', '15:00', '24', 'thu', '2023-03-08 20:28:25', NULL),
(634, '11:00', '12:00', '24', 'fri', '2023-03-08 20:28:29', NULL),
(635, '12:00', '13:00', '24', 'fri', '2023-03-08 20:28:37', NULL),
(636, '13:00', '14:00', '24', 'fri', '2023-03-08 20:28:55', NULL),
(637, '14:00', '15:00', '24', 'fri', '2023-03-08 20:28:58', NULL),
(638, '11:00', '12:00', '24', 'sun', '2023-03-08 20:29:01', NULL),
(639, '12:00', '13:00', '24', 'sun', '2023-03-08 20:29:06', NULL),
(640, '13:00', '14:00', '24', 'sun', '2023-03-08 20:29:15', NULL),
(641, '14:00', '15:00', '24', 'sun', '2023-03-08 20:29:18', NULL),
(642, '15:00', '16:00', '24', 'sun', '2023-03-08 20:29:21', NULL),
(643, '16:00', '17:00', '24', 'sun', '2023-03-08 20:29:25', NULL),
(644, '15:00', '16:00', '29', 'sat', '2023-03-09 12:29:40', NULL),
(645, '16:00', '17:00', '29', 'sat', '2023-03-09 12:29:42', NULL),
(646, '17:00', '18:00', '29', 'sat', '2023-03-09 12:29:45', NULL),
(647, '11:00', '12:00', '32', 'sat', '2023-03-20 10:21:08', NULL),
(648, '12:00', '13:00', '32', 'sat', '2023-03-20 10:21:10', NULL),
(649, '09:00', '10:00', '32', 'mon', '2023-03-20 10:21:26', NULL),
(650, '08:00', '09:00', '33', 'thu', '2023-03-22 15:16:40', NULL),
(651, '08:00', '09:00', '33', 'fri', '2023-03-22 15:16:45', NULL),
(652, '08:00', '09:00', '33', 'sun', '2023-03-22 15:16:47', NULL),
(653, '12:00', '13:00', '33', 'thu', '2023-03-22 15:17:18', NULL),
(654, '13:00', '14:00', '33', 'thu', '2023-03-22 15:17:20', NULL),
(655, '14:00', '15:00', '33', 'thu', '2023-03-22 15:17:22', NULL),
(656, '15:00', '16:00', '33', 'thu', '2023-03-22 15:17:24', NULL),
(657, '12:00', '13:00', '33', 'fri', '2023-03-22 15:17:26', NULL),
(658, '13:00', '14:00', '33', 'fri', '2023-03-22 15:17:28', NULL),
(659, '14:00', '15:00', '33', 'fri', '2023-03-22 15:17:30', NULL),
(660, '15:00', '16:00', '33', 'fri', '2023-03-22 15:17:35', NULL),
(661, '12:00', '13:00', '33', 'sun', '2023-03-22 15:17:38', NULL),
(662, '13:00', '14:00', '33', 'sun', '2023-03-22 15:17:39', NULL),
(663, '14:00', '15:00', '33', 'sun', '2023-03-22 15:17:40', NULL),
(664, '15:00', '16:00', '33', 'sun', '2023-03-22 15:17:41', NULL),
(665, '16:00', '17:00', '33', 'sun', '2023-03-22 15:17:43', NULL),
(673, '08:00', '09:00', '36', 'mon', '2023-06-08 14:02:41', NULL),
(674, '09:00', '10:00', '36', 'mon', '2023-06-08 14:02:43', NULL),
(675, '10:00', '11:00', '36', 'mon', '2023-06-08 14:02:44', NULL),
(676, '07:00', '08:00', '22', 'mon', '2023-06-19 10:55:54', NULL),
(677, '07:00', '08:00', '22', 'fri', '2023-06-19 10:55:56', NULL),
(708, '11:00', '12:00', '33', 'tue', '2023-06-20 13:19:17', NULL),
(709, '11:00', '12:00', '33', 'wed', '2023-06-20 13:19:18', NULL),
(710, '11:00', '12:00', '33', 'mon', '2023-06-20 13:19:19', NULL),
(712, '12:00', '13:00', '33', 'mon', '2023-06-20 13:19:33', NULL),
(713, '13:00', '14:00', '33', 'mon', '2023-06-20 13:19:35', NULL),
(714, '14:00', '15:00', '33', 'mon', '2023-06-20 13:19:38', NULL),
(715, '15:00', '16:00', '33', 'mon', '2023-06-20 13:19:39', NULL),
(716, '12:00', '13:00', '33', 'tue', '2023-06-20 13:19:44', NULL),
(717, '13:00', '14:00', '33', 'tue', '2023-06-20 13:19:46', NULL),
(718, '14:00', '15:00', '33', 'tue', '2023-06-20 13:19:47', NULL),
(719, '15:00', '16:00', '33', 'tue', '2023-06-20 13:19:49', NULL),
(720, '12:00', '13:00', '33', 'wed', '2023-06-20 13:19:51', NULL),
(721, '13:00', '14:00', '33', 'wed', '2023-06-20 13:19:52', NULL),
(722, '14:00', '15:00', '33', 'wed', '2023-06-20 13:19:53', NULL),
(723, '15:00', '16:00', '33', 'wed', '2023-06-20 13:19:55', NULL),
(724, '10:00', '11:00', '32', 'mon', '2023-06-29 08:20:32', NULL),
(725, '11:00', '12:00', '32', 'mon', '2023-06-29 08:20:35', NULL),
(726, '11:00', '12:00', '32', 'tue', '2023-06-29 08:20:45', NULL),
(727, '11:00', '12:00', '32', 'wed', '2023-06-29 08:20:52', NULL),
(728, '12:00', '13:00', '32', 'wed', '2023-06-29 08:20:53', NULL),
(729, '10:00', '11:00', '34', 'thu', '2023-07-02 16:35:35', NULL),
(730, '08:00', '09:00', '21', 'mon', '2023-07-02 18:14:40', NULL),
(732, '08:00', '09:00', '37', 'mon', '2023-07-03 08:05:15', NULL),
(733, '08:00', '09:00', '37', 'fri', '2023-07-03 08:05:25', NULL),
(734, '08:00', '09:00', '37', 'wed', '2023-07-03 08:05:27', NULL),
(759, '16:00', '17:00', '37', 'mon', '2023-07-03 08:07:07', NULL),
(760, '17:00', '18:00', '37', 'mon', '2023-07-03 08:07:10', NULL),
(770, '17:00', '18:00', '37', 'wed', '2023-07-03 08:07:39', NULL),
(771, '18:00', '19:00', '37', 'wed', '2023-07-03 08:07:45', NULL),
(780, '17:00', '18:00', '37', 'fri', '2023-07-03 08:08:12', NULL),
(781, '18:00', '19:00', '37', 'fri', '2023-07-03 08:08:12', NULL),
(782, '19:00', '20:00', '37', 'fri', '2023-07-03 08:08:14', NULL),
(783, '08:00', '09:00', '38', 'mon', '2023-07-03 09:58:20', NULL),
(784, '08:00', '09:00', '38', 'tue', '2023-07-03 09:58:23', NULL),
(785, '08:00', '09:00', '38', 'wed', '2023-07-03 09:58:24', NULL),
(786, '08:00', '09:00', '38', 'thu', '2023-07-03 09:58:26', NULL),
(787, '08:00', '09:00', '38', 'fri', '2023-07-03 09:58:28', NULL),
(788, '08:00', '09:00', '38', 'sun', '2023-07-03 09:58:32', NULL),
(789, '08:00', '09:00', '39', 'sun', '2023-07-04 09:41:05', NULL),
(791, '12:00', '13:00', '26', 'mon', '2023-07-06 13:14:02', NULL),
(792, '13:00', '14:00', '26', 'mon', '2023-07-06 13:14:11', NULL),
(793, '14:00', '15:00', '26', 'mon', '2023-07-06 13:14:25', NULL),
(794, '15:00', '16:00', '26', 'mon', '2023-07-06 13:19:07', NULL),
(795, '12:00', '13:00', '26', 'tue', '2023-07-06 13:19:20', NULL),
(796, '13:00', '14:00', '26', 'tue', '2023-07-06 13:19:23', NULL),
(797, '14:00', '15:00', '26', 'tue', '2023-07-06 13:19:26', NULL),
(798, '15:00', '16:00', '26', 'tue', '2023-07-06 13:19:29', NULL),
(799, '12:00', '13:00', '26', 'wed', '2023-07-06 13:19:41', NULL),
(800, '13:00', '14:00', '26', 'wed', '2023-07-06 13:19:42', NULL),
(801, '14:00', '15:00', '26', 'wed', '2023-07-06 13:19:44', NULL),
(802, '15:00', '16:00', '26', 'wed', '2023-07-06 13:19:45', NULL),
(803, '12:00', '13:00', '26', 'thu', '2023-07-06 13:19:49', NULL),
(804, '13:00', '14:00', '26', 'thu', '2023-07-06 13:19:50', NULL),
(805, '14:00', '15:00', '26', 'thu', '2023-07-06 13:19:52', NULL),
(806, '15:00', '16:00', '26', 'thu', '2023-07-06 13:19:54', NULL),
(807, '12:00', '13:00', '26', 'fri', '2023-07-06 13:19:58', NULL),
(808, '13:00', '14:00', '26', 'fri', '2023-07-06 13:20:05', NULL),
(809, '14:00', '15:00', '26', 'fri', '2023-07-06 13:20:06', NULL),
(810, '15:00', '16:00', '26', 'fri', '2023-07-06 13:20:09', NULL),
(811, '15:00', '16:00', '26', 'sat', '2023-07-06 13:20:13', NULL),
(812, '16:00', '17:00', '26', 'sat', '2023-07-06 13:20:16', NULL),
(813, '17:00', '18:00', '26', 'sat', '2023-07-06 13:20:19', NULL),
(815, '15:00', '16:00', '30', 'wed', '2023-07-11 12:32:28', NULL),
(817, '08:00', '09:00', '39', 'mon', '2023-07-30 14:21:48', NULL),
(818, '08:00', '09:00', '39', 'wed', '2023-07-30 14:21:52', NULL),
(819, '08:00', '09:00', '39', 'thu', '2023-07-30 14:21:58', NULL),
(820, '01:00', '09:00', '39', 'tue', '2023-07-30 14:22:18', NULL),
(821, '01:00', '09:00', '39', 'fri', '2023-07-30 14:22:20', NULL),
(822, '08:00', '09:00', '40', 'mon', '2023-08-04 11:56:16', NULL),
(823, '08:00', '09:00', '40', 'tue', '2023-08-04 11:56:18', NULL),
(824, '08:00', '09:00', '40', 'wed', '2023-08-04 11:56:22', NULL),
(825, '08:00', '09:00', '40', 'thu', '2023-08-04 11:56:25', NULL),
(826, '08:00', '09:00', '40', 'fri', '2023-08-04 11:56:28', NULL),
(827, '09:00', '10:00', '40', 'mon', '2023-08-04 11:57:07', NULL),
(828, '10:00', '11:00', '40', 'mon', '2023-08-04 11:57:15', NULL),
(829, '11:00', '12:00', '40', 'mon', '2023-08-04 11:57:18', NULL),
(830, '12:00', '13:00', '40', 'mon', '2023-08-04 11:57:21', NULL),
(831, '13:00', '14:00', '40', 'mon', '2023-08-04 11:57:28', NULL),
(832, '09:00', '10:00', '40', 'tue', '2023-08-04 12:00:04', NULL),
(833, '10:00', '11:00', '40', 'tue', '2023-08-04 12:00:06', NULL),
(834, '11:00', '12:00', '40', 'tue', '2023-08-04 12:00:07', NULL),
(835, '12:00', '13:00', '40', 'tue', '2023-08-04 12:00:09', NULL),
(836, '13:00', '14:00', '40', 'tue', '2023-08-04 12:00:11', NULL),
(837, '14:00', '15:00', '40', 'tue', '2023-08-04 12:00:24', NULL),
(838, '15:00', '16:00', '40', 'tue', '2023-08-04 12:00:37', NULL),
(839, '16:00', '17:00', '40', 'tue', '2023-08-04 12:00:42', NULL),
(840, '09:00', '10:00', '40', 'wed', '2023-08-04 12:00:48', NULL),
(841, '10:00', '11:00', '40', 'wed', '2023-08-04 12:00:50', NULL),
(842, '11:00', '12:00', '40', 'wed', '2023-08-04 12:00:51', NULL),
(843, '12:00', '13:00', '40', 'wed', '2023-08-04 12:00:52', NULL),
(844, '13:00', '14:00', '40', 'wed', '2023-08-04 12:00:54', NULL),
(845, '14:00', '15:00', '40', 'wed', '2023-08-04 12:00:55', NULL),
(846, '15:00', '16:00', '40', 'wed', '2023-08-04 12:00:56', NULL),
(847, '16:00', '17:00', '40', 'wed', '2023-08-04 12:00:57', NULL),
(849, '09:00', '10:00', '40', 'thu', '2023-08-04 12:01:10', NULL),
(850, '10:00', '11:00', '40', 'thu', '2023-08-04 12:01:11', NULL),
(851, '11:00', '12:00', '40', 'thu', '2023-08-04 12:01:12', NULL),
(852, '12:00', '13:00', '40', 'thu', '2023-08-04 12:01:13', NULL),
(853, '13:00', '14:00', '40', 'thu', '2023-08-04 12:01:14', NULL),
(854, '14:00', '15:00', '40', 'thu', '2023-08-04 12:01:15', NULL),
(855, '15:00', '16:00', '40', 'thu', '2023-08-04 12:01:16', NULL),
(856, '16:00', '17:00', '40', 'thu', '2023-08-04 12:01:17', NULL),
(857, '09:00', '10:00', '40', 'fri', '2023-08-04 12:01:24', NULL),
(858, '10:00', '11:00', '40', 'fri', '2023-08-04 12:01:25', NULL),
(859, '11:00', '12:00', '40', 'fri', '2023-08-04 12:01:26', NULL),
(860, '12:00', '13:00', '40', 'fri', '2023-08-04 12:01:27', NULL),
(861, '13:00', '14:00', '40', 'fri', '2023-08-04 12:01:28', NULL),
(862, '14:00', '15:00', '40', 'fri', '2023-08-04 12:01:29', NULL),
(864, '14:00', '15:00', '40', 'mon', '2023-08-04 12:01:52', NULL),
(865, '15:00', '16:00', '40', 'mon', '2023-08-04 12:01:53', NULL),
(866, '16:00', '17:00', '40', 'mon', '2023-08-04 12:01:55', NULL),
(867, '02:00', '03:00', '39', 'sun', '2023-08-11 08:29:04', NULL),
(868, '03:00', '04:00', '39', 'sun', '2023-08-11 08:29:08', NULL),
(869, '04:00', '05:00', '39', 'sun', '2023-08-11 08:29:15', NULL),
(870, '05:00', '06:00', '39', 'sun', '2023-08-11 08:29:18', NULL),
(871, '15:00', '09:00', '42', 'mon', '2023-09-13 03:52:40', NULL),
(872, '15:00', '09:00', '42', 'tue', '2023-09-13 03:52:44', NULL),
(873, '15:00', '09:00', '42', 'wed', '2023-09-13 03:52:49', NULL),
(874, '15:00', '09:00', '42', 'thu', '2023-09-13 03:52:52', NULL),
(876, '16:30', '17:30', '42', 'mon', '2023-09-13 03:54:37', NULL),
(877, '16:30', '17:30', '42', 'tue', '2023-09-13 03:55:06', NULL),
(878, '16:30', '17:30', '42', 'thu', '2023-09-13 03:55:09', NULL),
(879, '08:00', '09:00', '43', 'mon', '2023-09-21 13:09:21', NULL),
(882, '08:00', '09:00', '43', 'tue', '2023-09-21 13:09:36', NULL),
(883, '08:00', '09:00', '43', 'wed', '2023-09-21 13:10:01', NULL),
(884, '08:00', '09:00', '43', 'thu', '2023-09-21 13:10:04', NULL),
(885, '08:00', '09:00', '43', 'fri', '2023-09-21 13:10:07', NULL),
(888, '08:00', '09:00', '43', 'tue', '2023-09-21 13:12:09', NULL),
(889, '08:00', '09:00', '43', 'wed', '2023-09-21 13:12:11', NULL),
(890, '08:00', '09:00', '43', 'thu', '2023-09-21 13:12:26', NULL),
(891, '08:00', '09:00', '43', 'mon', '2023-09-21 13:12:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `calendar_info`
--
ALTER TABLE `calendar_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `corporate`
--
ALTER TABLE `corporate`
  ADD PRIMARY KEY (`corporate_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`filter_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `session_notes`
--
ALTER TABLE `session_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`statistic_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`therapist_id`);

--
-- Indexes for table `therapist_move`
--
ALTER TABLE `therapist_move`
  ADD PRIMARY KEY (`therapist_move_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`voucher_id`);

--
-- Indexes for table `weekly_schedule`
--
ALTER TABLE `weekly_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_info`
--
ALTER TABLE `calendar_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `weekly_schedule`
--
ALTER TABLE `weekly_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=892;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
