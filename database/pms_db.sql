-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 10:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_list`
--

CREATE TABLE `action_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `action_list`
--

INSERT INTO `action_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Solitary Confinement', 1, 0, '2022-05-31 11:56:31', '2022-05-31 11:56:31'),
(2, 'Infirmary Confinement', 1, 0, '2022-05-31 11:58:03', '2022-05-31 11:58:03'),
(3, 'Transported for Trial', 1, 0, '2022-05-31 11:59:14', '2022-05-31 11:59:14'),
(4, 'test - updated', 1, 1, '2022-05-31 11:59:34', '2022-05-31 11:59:49'),
(5, 'Medical Treatement', 1, 0, '2022-10-03 10:48:29', '2022-10-03 10:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `cell_list`
--

CREATE TABLE `cell_list` (
  `id` int(30) NOT NULL,
  `prison_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cell_list`
--

INSERT INTO `cell_list` (`id`, `prison_id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 1, 'Block 1 Cell 1001', 1, 0, '2022-05-31 09:16:32', '2022-05-31 09:16:32'),
(2, 1, 'Block 1 Cell 1002', 1, 0, '2022-05-31 09:17:07', '2022-05-31 09:17:07'),
(3, 1, 'Block 1 Cell 1003', 1, 0, '2022-05-31 09:17:18', '2022-05-31 09:17:18'),
(4, 1, 'Block 1 Cell 1004', 1, 0, '2022-05-31 09:17:25', '2022-05-31 09:17:25'),
(5, 1, 'Block 2 Cell 1001', 1, 0, '2022-05-31 09:17:34', '2022-05-31 09:17:34'),
(6, 1, 'Block 2 Cell 1002', 1, 0, '2022-05-31 09:17:43', '2022-05-31 09:17:43'),
(7, 1, 'Block 2 Cell 1003', 1, 0, '2022-05-31 09:17:52', '2022-05-31 09:17:52'),
(8, 1, 'Block 2 Cell 1004', 1, 0, '2022-05-31 09:17:58', '2022-05-31 09:17:58'),
(9, 1, 'Block 3 Cell 1001', 1, 0, '2022-05-31 09:18:07', '2022-05-31 09:18:07'),
(10, 1, 'Block 3 Cell 1002', 1, 0, '2022-05-31 09:18:16', '2022-05-31 09:18:16'),
(11, 1, 'Block 3 Cell 1003', 1, 0, '2022-05-31 09:18:26', '2022-05-31 09:18:26'),
(12, 2, 'Block 1 Cell 1001', 1, 0, '2022-05-31 09:18:36', '2022-05-31 09:18:36'),
(13, 2, 'Block 1 Cell 1002', 1, 0, '2022-05-31 09:18:41', '2022-05-31 09:18:41'),
(14, 2, 'Block 1 Cell 1003', 1, 0, '2022-05-31 09:18:49', '2022-05-31 09:18:49'),
(15, 2, 'Block 1 Cell 1004', 1, 0, '2022-05-31 09:18:55', '2022-05-31 09:18:55'),
(16, 2, 'test - updated', 0, 1, '2022-05-31 09:19:06', '2022-05-31 09:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `crime_list`
--

CREATE TABLE `crime_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime_list`
--

INSERT INTO `crime_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Robbery', 1, 0, '2022-05-31 09:25:05', '2022-05-31 09:25:05'),
(2, 'Homicide', 1, 0, '2022-05-31 09:25:13', '2022-05-31 09:25:13'),
(3, 'Murder', 1, 0, '2022-05-31 09:25:20', '2022-05-31 09:25:20'),
(4, 'Attempted Murder', 1, 0, '2022-05-31 09:25:34', '2022-05-31 09:25:34'),
(5, 'Child Abuse', 1, 0, '2022-05-31 09:26:14', '2022-05-31 09:26:14'),
(6, 'Fraud', 1, 0, '2022-05-31 09:26:33', '2022-05-31 09:26:33'),
(7, 'Rape', 1, 0, '2022-05-31 09:26:57', '2022-05-31 09:26:57'),
(8, 'Sexual Assult', 1, 0, '2022-05-31 09:27:06', '2022-05-31 09:27:06'),
(9, 'Terrorism', 1, 0, '2022-05-31 09:27:26', '2022-05-31 09:27:26'),
(10, 'Stalking and Harassment', 1, 0, '2022-05-31 09:27:43', '2022-05-31 09:28:15'),
(11, 'Forgery', 1, 0, '2022-08-06 11:34:05', '2022-08-06 11:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `inmate_crimes`
--

CREATE TABLE `inmate_crimes` (
  `inmate_id` int(30) NOT NULL,
  `crime_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inmate_crimes`
--

INSERT INTO `inmate_crimes` (`inmate_id`, `crime_id`) VALUES
(1, 6),
(1, 1),
(4, 11),
(1, 6),
(1, 1),
(4, 11),
(7, 11),
(8, 11),
(3, 5),
(9, 5),
(11, 9),
(12, 11);

-- --------------------------------------------------------

--
-- Table structure for table `inmate_list`
--

CREATE TABLE `inmate_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` text NOT NULL,
  `sex` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `illness` varchar(10) DEFAULT NULL,
  `country` text NOT NULL,
  `marital_status` varchar(250) NOT NULL,
  `cell_id` int(11) NOT NULL,
  `prison_id` int(11) DEFAULT NULL,
  `sentence` text DEFAULT NULL,
  `duration` varchar(10) DEFAULT NULL,
  `date_from` date NOT NULL,
  `date_to` date DEFAULT NULL,
  `count` varchar(20) DEFAULT NULL,
  `emergency_name` text DEFAULT NULL,
  `emergency_contact` text DEFAULT NULL,
  `emergency_relation` text DEFAULT NULL,
  `image_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `visiting_privilege` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inmate_list`
--

INSERT INTO `inmate_list` (`id`, `code`, `firstname`, `middlename`, `lastname`, `sex`, `dob`, `illness`, `country`, `marital_status`, `cell_id`, `prison_id`, `sentence`, `duration`, `date_from`, `date_to`, `count`, `emergency_name`, `emergency_contact`, `emergency_relation`, `image_path`, `status`, `visiting_privilege`, `date_created`, `date_updated`) VALUES
(1, '6231415', 'John', 'D', 'dave', 'Male', '1990-06-23', NULL, 'Sample Address only', 'Married', 1, 1, '2 Year', '', '2022-05-31', '2024-05-31', '', 'Will Smith', '09654123987', 'Brother', 'uploads/inmates/1.png?v=1653966405', 1, 1, '2022-05-31 11:06:45', '2022-12-01 12:15:17'),
(3, 'PV9QM', 'Sam', NULL, 'Son', 'Male', '1993-12-02', NULL, 'Kampala Kasangati', 'Single', 1, 2, '1', 'days', '2022-11-14', '2022-11-15', '', 'jane', '07756482827', 'sister', NULL, 1, 1, '2022-08-03 13:25:56', '2022-12-01 12:15:22'),
(4, 'IST3105', 'kANYE ', NULL, 'West', 'Male', '1993-03-04', NULL, 'Kampala\r\nSeguku', 'Single', 12, 3, '2 years', '', '2021-03-02', '2023-03-20', '', 'KENYI SOUTH', '07756482825', 'mum', 'uploads/inmates/4.png?v=1659785079', 1, 1, '2022-08-06 11:40:24', '2022-12-01 12:15:26'),
(7, 'lhfdpijdisvpijxcvv', 'kakembo', 'Thomas', 'otieno', 'Male', '2022-11-03', NULL, 'Uganda', 'Married', 12, 1, '10', 'days', '2022-11-12', '2022-11-22', '', 'Nambasa', '0712804062', 'Sister', 'uploads/inmates/7.png?v=1668261118', 1, 1, '2022-11-12 16:51:57', '2022-12-01 12:15:28'),
(8, 'fdfgvhbjnklkjhghfghjkl', 'Marion', 'Nambejja', 'kia', 'Female', '2022-11-19', NULL, 'Kenya', 'Single', 12, 2, '20', 'days', '2022-11-12', '2022-12-02', '', 'Nambasa', '0712804062', 'Sister', 'uploads/inmates/8.png?v=1668264742', 1, 1, '2022-11-12 17:52:21', '2022-12-01 12:15:31'),
(9, 'KPB1C100124772', 'quebec', NULL, 'henry', 'Male', '1999-12-14', 'flu', 'sudan', 'Single', 1, 3, '50', 'days', '2022-11-14', '2023-01-03', '', 'Nambasa', '0712804062', 'Sister', 'uploads/inmates/9.png?v=1668430453', 1, 1, '2022-11-14 15:54:12', '2022-12-01 12:15:34'),
(10, 'CPB1C100124779', 'quebec', NULL, 'henry', 'Male', '1999-12-14', 'flu', 'sudan', 'Single', 1, 1, '50', 'days', '2022-11-14', '2023-01-03', '', 'Nambasa', '0712804062', 'Sister', 'uploads/inmates/9.png?v=1668430453', 1, 1, '2022-11-14 15:54:12', '2022-12-01 12:15:38'),
(11, 'WPSC1001-0001', 'Charles', NULL, 'Manson', 'Male', '2022-12-16', 'Paranoid', 'USA', 'Single', 9, 5, '2', 'yrs', '2022-12-02', '2023-12-02', '12', 'Ted Bundy', '0712567297', 'Disciple', 'uploads/inmates/11.png?v=1669893536', 1, 1, '2022-12-01 14:18:55', '2022-12-01 14:18:56'),
(12, 'LPC1002-0001', 'Jaguaro', NULL, 'Benette', 'Male', '2022-12-22', NULL, 'Peru', 'Single', 2, 2, '5', 'yrs', '2022-12-16', '2025-06-15', '12', 'Peter Griffin', '06789998212', 'Friend', 'uploads/inmates/12.png?v=1670056380', 1, 1, '2022-12-03 11:33:00', '2022-12-03 14:00:20');

-- --------------------------------------------------------

--
-- Table structure for table `prison_list`
--

CREATE TABLE `prison_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prison_list`
--

INSERT INTO `prison_list` (`id`, `name`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Kasanganti Prison ', 1, 0, '2022-05-31 09:03:13', '2022-08-03 17:59:44'),
(2, 'Old Kampala Prison', 1, 0, '2022-05-31 09:03:23', '2022-08-03 18:00:20'),
(3, 'Luzira Prison', 0, 1, '2022-05-31 09:03:31', '2022-12-01 11:34:22'),
(4, 'Nalufeenya Prison', 1, 1, '2022-07-28 18:13:17', '2022-12-01 11:34:34'),
(5, 'Wandegeya Police Station', 0, 0, '2022-08-03 18:00:49', '2022-10-22 21:34:09'),
(6, 'Kitalya Prison', 1, 1, '2022-10-03 10:45:22', '2022-12-01 11:34:45');

-- --------------------------------------------------------

--
-- Table structure for table `record_list`
--

CREATE TABLE `record_list` (
  `id` int(30) NOT NULL,
  `inmate_id` int(30) NOT NULL,
  `action_id` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `record_list`
--

INSERT INTO `record_list` (`id`, `inmate_id`, `action_id`, `remarks`, `date`, `date_created`, `date_updated`) VALUES
(1, 1, 3, 'Lorem ipsum dolor sit amet, consecte pellentesque nisl. Mauris at elit at dui tempor hendrerit.', '2022-05-27', '2022-05-31 13:19:24', '2022-08-03 13:28:24'),
(2, 1, 2, 'Fusce porta pharetra massa, id congue dolor suscipit vel. Praesent id interdum risus. Mauris scelerisque urna massa, eget fringilla mi condimentum vel.', '2022-05-31', '2022-05-31 13:26:22', '2022-05-31 13:26:22'),
(4, 3, 2, 'thfdggfdxyidzt', '2022-08-03', '2022-08-03 13:29:05', '2022-08-03 13:29:05'),
(5, 4, 3, 'taken to court', '2022-08-06', '2022-08-06 11:41:31', '2022-08-06 11:41:31'),
(6, 1, 5, 'taken to court again', '2022-10-22', '2022-10-22 21:31:39', '2022-10-22 21:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Prisoner Information Management System'),
(6, 'short_name', 'PIMS'),
(11, 'logo', 'uploads/logo.png?v=1653957857'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1664795599'),
(17, 'phone', '456-987-1231'),
(18, 'mobile', '09123456987 / 094563212222 '),
(19, 'email', 'info@musicschool.com'),
(20, 'address', 'Here St, Down There City, Anywhere Here, 2306 -updated');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `inmate_id` int(11) NOT NULL,
  `cell_id` int(11) NOT NULL,
  `date_transfered` varchar(255) NOT NULL,
  `new_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `inmate_id`, `cell_id`, `date_transfered`, `new_code`, `created_at`) VALUES
(1, 7, 13, '2022-11-25', 'jijgkfdjskmngdfngnd', '2022-11-13 11:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='2';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', '', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-05-16 14:17:49'),
(6, 'MULINDWA', 'JOVAN ', 'KAKONGE', 'jovan', 'b59c6e9b344bae1a36fe427a42889265', 'uploads/avatars/6.png?v=1653980749', NULL, 2, '2022-05-31 15:05:49', '2022-08-03 13:19:38'),
(7, 'Ahabwe', '', 'Narath', 'narath', '202cb962ac59075b964b07152d234b70', NULL, NULL, 1, '2022-07-28 21:55:11', '2022-08-03 13:15:08'),
(9, 'KANYIKE', 'ADRIAN', 'KIZITO', 'adrian', '8c4205ec33d8f6caeaaaa0c10a14138c', NULL, NULL, 1, '2022-08-03 13:13:42', '2022-08-03 13:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `visit_list`
--

CREATE TABLE `visit_list` (
  `id` int(30) NOT NULL,
  `inmate_id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `relation` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit_list`
--

INSERT INTO `visit_list` (`id`, `inmate_id`, `fullname`, `contact`, `relation`, `date_created`, `date_updated`) VALUES
(1, 1, 'Claire Blake', '09456213879', 'Fiance', '2022-05-31 14:43:13', '2022-05-31 14:43:13'),
(2, 1, 'Will Smith', '09456123123', 'Father', '2022-05-31 14:51:11', '2022-05-31 14:51:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_list`
--
ALTER TABLE `action_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cell_list`
--
ALTER TABLE `cell_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prison_id` (`prison_id`);

--
-- Indexes for table `crime_list`
--
ALTER TABLE `crime_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inmate_crimes`
--
ALTER TABLE `inmate_crimes`
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `crime_id` (`crime_id`);

--
-- Indexes for table `inmate_list`
--
ALTER TABLE `inmate_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cell_id` (`cell_id`),
  ADD KEY `prison_id` (`prison_id`);

--
-- Indexes for table `prison_list`
--
ALTER TABLE `prison_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record_list`
--
ALTER TABLE `record_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit_list`
--
ALTER TABLE `visit_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inmate_id` (`inmate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_list`
--
ALTER TABLE `action_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cell_list`
--
ALTER TABLE `cell_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `crime_list`
--
ALTER TABLE `crime_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `inmate_list`
--
ALTER TABLE `inmate_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prison_list`
--
ALTER TABLE `prison_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `record_list`
--
ALTER TABLE `record_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `visit_list`
--
ALTER TABLE `visit_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cell_list`
--
ALTER TABLE `cell_list`
  ADD CONSTRAINT `prison_id_fk_cl` FOREIGN KEY (`prison_id`) REFERENCES `cell_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inmate_crimes`
--
ALTER TABLE `inmate_crimes`
  ADD CONSTRAINT `crime_id_fk_ic` FOREIGN KEY (`crime_id`) REFERENCES `crime_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inmate_id_fk_ic` FOREIGN KEY (`inmate_id`) REFERENCES `inmate_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `inmate_list`
--
ALTER TABLE `inmate_list`
  ADD CONSTRAINT `cell_id_fk_il` FOREIGN KEY (`cell_id`) REFERENCES `cell_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `record_list`
--
ALTER TABLE `record_list`
  ADD CONSTRAINT `action_id_fk_rl` FOREIGN KEY (`action_id`) REFERENCES `action_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `inmate_id_fk_rl` FOREIGN KEY (`inmate_id`) REFERENCES `inmate_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `visit_list`
--
ALTER TABLE `visit_list`
  ADD CONSTRAINT `inmate_id_fk_vl` FOREIGN KEY (`inmate_id`) REFERENCES `inmate_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
