-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 06, 2024 at 01:56 AM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u938234010_cagroplms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_email`, `action`, `timestamp`) VALUES
(1, 'testfw@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-08-28 09:08:41'),
(2, 'jesusnew@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-08-30 00:37:01'),
(3, 'James@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-01 06:33:22'),
(4, 'jamesnew@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-01 06:48:03'),
(5, 'zenoenfc@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-03 05:50:50'),
(6, 'ffnewtest@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-05 14:27:45'),
(7, 'zenoentest2@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-05 14:55:32'),
(8, 'fisherfolknew@gmail.com', 'Fishing Gear Permit Registration Sent', '2024-09-05 15:05:40'),
(9, 'jamescameron@gmail.com', 'Fishing Gear Application Form sent', '2024-10-01 03:24:39'),
(10, 'jamescameron@gmail.com', 'Fishworker Application Form sent', '2024-10-01 03:32:08'),
(11, 'jamescameron@gmail.com', 'Fishing Gear Application Form sent', '2024-10-01 03:33:12'),
(12, 'jamescameron@gmail.com', 'Fishing Gear Application Form sent', '2024-10-01 06:42:09'),
(13, 'jamescameron@gmail.com', 'Fishing Boat Application Form sent', '2024-10-01 06:51:12'),
(14, 'jamescameron@gmail.com', 'Fishing Boat Application Form sent', '2024-10-01 06:52:01'),
(15, 'jamescameron@gmail.com', 'Fishing Boat Application Form sent', '2024-10-01 06:52:21'),
(16, 'jamescameron@gmail.com', 'Fisherfolk Application Form sent', '2024-10-01 12:47:45'),
(17, 'jamescameron@gmail.com', 'Fishing Boat Application Form sent', '2024-10-01 12:58:38'),
(18, 'jamescameron@gmail.com', 'Fisherfolk Application Form sent', '2024-10-02 04:39:55'),
(19, 'johnsmith@gmail.com', 'Fisherfolk Application Form sent', '2024-10-02 06:12:45'),
(20, 'david@gmail.com', 'Fisherfolk Application Form sent', '2024-10-02 07:05:19'),
(21, 'anne@gmail.com', 'Fisherfolk Application Form sent', '2024-10-03 08:32:26'),
(22, 'test@gmail.com', 'Fisherfolk Application Form sent', '2024-10-04 08:13:09'),
(23, 'test@gmail.com', 'Fisherfolk Application Form sent', '2024-10-05 05:38:03'),
(24, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-10-13 08:10:04'),
(25, 'lebron@gmail.com', 'Fish Cage Application Form sent', '2024-10-14 05:59:58'),
(26, 'lebron@gmail.com', 'Fisherfolk Application Form sent', '2024-10-14 06:08:33'),
(27, 'lebron@gmail.com', 'Fisherfolk Application Form sent', '2024-11-01 14:58:51'),
(28, 'lebron@gmail.com', 'Fisherfolk Application Form sent', '2024-11-01 15:02:10'),
(29, 'lebron@gmail.com', 'Fish Cage Application Form sent', '2024-11-05 15:37:50'),
(30, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-05 15:44:22'),
(31, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-05 16:17:57'),
(32, 'lebron@gmail.com', 'Fishworker Application Form sent', '2024-11-07 19:44:02'),
(33, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-07 20:27:13'),
(34, 'lebron@gmail.com', 'Fish Cage Application Form sent', '2024-11-07 20:38:02'),
(35, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-08 03:29:55'),
(36, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-08 03:30:30'),
(37, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-08 05:08:09'),
(38, 'lebron@gmail.com', 'Fishing Gear Application Form sent', '2024-11-08 05:16:25'),
(39, 'lebron@gmail.com', 'Fishworker Application Form sent', '2024-11-08 05:22:41'),
(40, 'lebron@gmail.com', 'Fisherfolk Application Form sent', '2024-11-08 05:25:13'),
(41, 'lebron@gmail.com', 'Fisherfolk Application Form sent', '2024-11-10 05:21:22'),
(42, 'lebron@gmail.com', 'Fishing Boat Application Form sent', '2024-11-12 16:11:33'),
(43, 'pennyworth@gmail.com', 'Fisherfolk Application Form sent', '2024-11-15 00:39:37'),
(44, 'alfredjames@gmail.com', 'Fisherfolk Application Form sent', '2024-11-15 03:25:29'),
(45, 'rty@gmail.com', 'Fisherfolk Application Form sent', '2024-11-19 17:51:43'),
(46, 'rty@gmail.com', 'Fisherfolk Application Form sent', '2024-11-19 20:02:20'),
(47, 'rty@gmail.com', 'Fisherfolk Application Form sent', '2024-11-21 14:37:54'),
(48, 'rty@gmail.com', 'Fisherfolk Application Form sent', '2024-11-21 15:52:23'),
(49, 'rty@gmail.com', 'Fisherfolk Application Form sent', '2024-11-21 15:57:27'),
(50, 'dave@gmail.com', 'Fisherfolk Application Form sent', '2024-11-25 06:53:57'),
(51, 'zeke@gmail.com', 'Fisherfolk Application Form sent', '2024-11-25 23:40:56'),
(52, 'david@gmail.com', 'Fisherfolk Application Form sent', '2024-11-27 07:02:51'),
(53, 'jameszenoen07@gmail.com', 'Fisherfolk Application Form sent', '2024-11-28 05:12:50'),
(54, 'jameszenoen07@gmail.com', 'Fishing Gear Application Form sent', '2024-12-02 09:22:37'),
(55, 'jameszenoen07@gmail.com', 'Fishing Gear Application Form sent', '2024-12-02 12:35:02'),
(56, 'jameszenoen07@gmail.com', 'Fish Cage Application Form sent', '2024-12-02 12:45:40'),
(57, 'jameszenoen07@gmail.com', 'Fish Cage Application Form sent', '2024-12-02 12:46:37'),
(58, 'jameszenoen07@gmail.com', 'Fishing Boat Application Form sent', '2024-12-02 12:47:20'),
(59, 'sadjames@gmail.com', 'Fishing Gear Application Form sent', '2024-12-03 04:10:14'),
(60, 'mary@gmail.com', 'Fisherfolk Application Form sent', '2024-12-04 06:55:49'),
(61, 'sadjames@gmail.com', 'Fishworker Application Form sent', '2024-12-04 16:15:03'),
(62, 'sadjames@gmail.com', 'Fishworker Application Form sent', '2024-12-04 16:27:53'),
(63, 'sadjames@gmail.com', 'Fish Cage Application Form sent', '2024-12-04 18:15:21'),
(64, 'fionashrek@gmail.com', 'Fisherfolk Application Form sent', '2024-12-05 04:56:40'),
(65, 'fionashrek@gmail.com', 'Fisherfolk Application Form sent', '2024-12-05 04:56:40'),
(66, 'fionashrek@gmail.com', 'Fishworker Application Form sent', '2024-12-05 06:04:46'),
(67, 'fionashrek@gmail.com', 'Fisherfolk Application Form sent', '2024-12-05 07:41:15'),
(68, 'fionashrek@gmail.com', 'Fisherfolk Application Form sent', '2024-12-05 07:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `fishcage`
--

CREATE TABLE `fishcage` (
  `id` int(11) NOT NULL,
  `fc_fname` varchar(255) DEFAULT NULL,
  `fc_mname` varchar(255) DEFAULT NULL,
  `fc_lname` varchar(255) DEFAULT NULL,
  `fc_appell` varchar(255) DEFAULT NULL,
  `fc_postal` int(11) DEFAULT NULL,
  `fc_prov` varchar(255) NOT NULL,
  `fc_civ` varchar(255) DEFAULT NULL,
  `fc_municipal` varchar(255) NOT NULL,
  `fc_brgy` varchar(255) NOT NULL,
  `fc_street` varchar(255) DEFAULT NULL,
  `fc_contact` char(15) NOT NULL,
  `fc_units` varchar(255) DEFAULT NULL,
  `fc_invcategory` varchar(255) DEFAULT NULL,
  `fc_cagetype` varchar(255) DEFAULT NULL,
  `fc_culturedspicies` varchar(255) DEFAULT NULL,
  `fc_dimension_size` varchar(255) DEFAULT NULL,
  `fc_intendedfor` varchar(255) DEFAULT NULL,
  `fc_businessname` varchar(255) DEFAULT NULL,
  `fc_businessadd` varchar(255) NOT NULL,
  `fc_businessreg` varchar(255) NOT NULL,
  `fc_capitalinv` decimal(15,2) DEFAULT NULL,
  `fc_source` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_role` varchar(255) NOT NULL,
  `u_status` char(10) NOT NULL,
  `approval_type` varchar(50) NOT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishcage`
--

INSERT INTO `fishcage` (`id`, `fc_fname`, `fc_mname`, `fc_lname`, `fc_appell`, `fc_postal`, `fc_prov`, `fc_civ`, `fc_municipal`, `fc_brgy`, `fc_street`, `fc_contact`, `fc_units`, `fc_invcategory`, `fc_cagetype`, `fc_culturedspicies`, `fc_dimension_size`, `fc_intendedfor`, `fc_businessname`, `fc_businessadd`, `fc_businessreg`, `fc_capitalinv`, `fc_source`, `u_email`, `u_role`, `u_status`, `approval_type`, `issuance_date`, `expiration_date`, `decline_reason`) VALUES
(3, 'lebron', 'lebron', 'james', 'rrr', 5756, 'p', NULL, 'M', 'B', 'S', '09364130841', NULL, '(SMALL LOCATORS INVESTOR (2-8 UNITS - INDIVIDUAL/FAMILY))', 'BAMBOO', 'BAMBOO', '4x4x4m (Square)', 'GROWOUT', 'CAGRO', 'Panabo', 'DTI', 0.00, 'SAVINGS', 'lebron@gmail.com', 'fishcage', '3', 'Permit to Operate', '2024-12-05 06:00:25', '2025-12-31', 'lacking of requirements'),
(4, 'lebron2', 'lebron2', 'james23', 'tet', 8105, 'ddn', NULL, 'panabs', 'pan', 'zone st', '09364130841', NULL, '(SMALL LOCATORS INVESTOR (2-8 UNITS - INDIVIDUAL/FAMILY))', 'BAMBOO', 'BAMBOO', '4x4x4m (Square)', 'GROWOUT', 'CAGRO', 'Panabo', 'CAGRO', 0.00, 'SAVINGS', 'lebron@gmail.com', 'fishcage', '4', 'Permit to Operate', '2024-11-08 04:26:35', '2025-12-31', ''),
(5, 'Zenoen', 'Fishcage', 'Account', '', 0, 'davao del sur', NULL, 'davao city', 'bunawan', 'calderon', '', NULL, '(BIG LOCATORS INVESTOR (9-20 UNITS - INDIVIDUAL/FAMILY))', 'BAMBOO', 'BAMBOO', '4x4x4m (Square)', 'GROWOUT', '', '', 'DTI', 0.00, 'SAVINGS', 'jameszenoen07@gmail.com', 'fishcage', '4', 'Permit to Operate (FishingCage)', '2024-12-02 12:50:07', '2025-12-31', ''),
(6, 'Zenoen', 'Fishcage', 'Account', '', 0, 'davao del sur', NULL, 'davao city', 'bunawan', '', '', NULL, '(SMALL LOCATORS INVESTOR (2-12 UNITS - COOPERATIVES/ASSOCIATION))', 'BAMBOO', 'BAMBOO', '4x4x4m (Square)', 'GROWOUT', '', '', 'DTI', 0.00, 'SAVINGS', 'jameszenoen07@gmail.com', 'fishcage', '4', 'Permit to Operate (FishingCage)', '2024-12-02 12:50:25', '2025-12-31', ''),
(7, 'qweqwe', 'qweqwe', 'qweqwe', 'qwe', 131, 'qwe', NULL, 'qwe', 'qweqwe', 'qweqwe', '123', '12', 'Big Locators Investor (9-20 units - individual/family)', '', '', '6x6x6m', 'Conditioning Cage', 'qweqwe', 'qweqwe', '', 12312.00, '', 'sadjames@gmail.com', 'fishcage', '3', 'Permit to Operate (FishingCage)', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `fisherfolks`
--

CREATE TABLE `fisherfolks` (
  `ff_id` int(11) NOT NULL,
  `ff_fname` varchar(255) DEFAULT NULL,
  `ff_mname` varchar(255) DEFAULT NULL,
  `ff_lname` varchar(255) DEFAULT NULL,
  `ff_appell` varchar(100) DEFAULT NULL,
  `ff_postall` int(11) DEFAULT NULL,
  `ff_prov` varchar(255) DEFAULT NULL,
  `ff_municipal` varchar(100) DEFAULT NULL,
  `ff_barangay` varchar(100) DEFAULT NULL,
  `ff_street` varchar(100) DEFAULT NULL,
  `ff_age` int(11) DEFAULT NULL,
  `ff_dob` date DEFAULT NULL,
  `ff_pob` varchar(255) DEFAULT NULL,
  `ff_residence` varchar(100) DEFAULT NULL,
  `ff_gender` varchar(100) DEFAULT NULL,
  `ff_educ` varchar(255) DEFAULT NULL,
  `ff_nation` varchar(255) DEFAULT NULL,
  `ff_civ` varchar(255) DEFAULT NULL,
  `ff_contact` char(15) DEFAULT NULL,
  `ff_child` int(11) DEFAULT NULL,
  `ff_male` int(11) DEFAULT NULL,
  `ff_female` int(11) DEFAULT NULL,
  `ff_inschool` int(11) DEFAULT NULL,
  `ff_outschool` int(11) DEFAULT NULL,
  `ff_employed` int(11) DEFAULT NULL,
  `ff_unemployed` int(11) DEFAULT NULL,
  `ff_monthin` varchar(255) DEFAULT NULL,
  `ff_farm` varchar(255) DEFAULT NULL,
  `ff_farmin` decimal(10,2) DEFAULT NULL,
  `ff_nfarm` varchar(255) DEFAULT NULL,
  `ff_nfarmin` decimal(10,2) DEFAULT NULL,
  `ff_ename` varchar(255) DEFAULT NULL,
  `ff_erelation` varchar(255) DEFAULT NULL,
  `ff_econtact` varchar(255) DEFAULT NULL,
  `ff_eaddress` varchar(255) DEFAULT NULL,
  `votersid` varchar(255) DEFAULT NULL,
  `four_ps` varchar(255) DEFAULT NULL,
  `IP` varchar(255) DEFAULT NULL,
  `SAAD` varchar(255) DEFAULT NULL,
  `main_income` varchar(255) DEFAULT NULL,
  `other_income` varchar(255) DEFAULT NULL,
  `ff_OR` char(10) DEFAULT NULL,
  `ff_orgname` varchar(100) DEFAULT NULL,
  `ff_membersince` int(15) DEFAULT NULL,
  `ff_orgposition` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_role` varchar(100) DEFAULT NULL,
  `u_status` char(10) DEFAULT NULL,
  `approval_type` varchar(50) DEFAULT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fisherfolks`
--

INSERT INTO `fisherfolks` (`ff_id`, `ff_fname`, `ff_mname`, `ff_lname`, `ff_appell`, `ff_postall`, `ff_prov`, `ff_municipal`, `ff_barangay`, `ff_street`, `ff_age`, `ff_dob`, `ff_pob`, `ff_residence`, `ff_gender`, `ff_educ`, `ff_nation`, `ff_civ`, `ff_contact`, `ff_child`, `ff_male`, `ff_female`, `ff_inschool`, `ff_outschool`, `ff_employed`, `ff_unemployed`, `ff_monthin`, `ff_farm`, `ff_farmin`, `ff_nfarm`, `ff_nfarmin`, `ff_ename`, `ff_erelation`, `ff_econtact`, `ff_eaddress`, `votersid`, `four_ps`, `IP`, `SAAD`, `main_income`, `other_income`, `ff_OR`, `ff_orgname`, `ff_membersince`, `ff_orgposition`, `u_email`, `u_role`, `u_status`, `approval_type`, `issuance_date`, `expiration_date`, `decline_reason`) VALUES
(3, 'Lebron', 'James', 'Leess', 'test', 8105, 'DDN', 'Panabo City', 'Gredu', 'Panabo', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234', 'awd', 4, 'dd', 'lebron@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-07 20:18:40', '2025-12-31', 'awdawd'),
(4, 'Lebron2', 'Kobe', 'James', '', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'lebron@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-19 20:48:42', '2024-12-31', 'awdawdawd awdaw d'),
(5, 'lebron', 'lebron', 'james', '', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'lebron@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-08 05:28:07', '2025-12-31', ''),
(6, 'varravavaewvrr', 'vaewvavaeaewaw', 'wvawaewwa', '', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'lebron@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-10 05:22:13', '2024-12-31', ''),
(7, 'Jasmin', 'De Nero', 'Jae', '', 8000, 'asdas', 'dasd', 'calderon', 'purok 11.', 12, '0000-00-00', NULL, '2009', 'Male', NULL, NULL, NULL, '134124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '451431', '', 0, '', 'pennyworth@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-15 00:42:10', '2025-12-31', ''),
(8, 'james', 'de nero', 'alfred', '', 8000, 'davao del norte', 'panabo', 'new pandan', '', 20, '0000-00-00', NULL, '2009', 'Male', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'alfredjames@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-25 07:05:59', '2024-12-31', 'awd'),
(9, 'rty', 'rty', 'ty', '', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'rty@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-19 20:49:29', '2024-12-31', 'lacking of requirementslacking of requirements'),
(10, 'awd', 'awd', 'awd', '', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'rty@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-19 20:03:54', '2024-12-31', ''),
(11, 'rty', 'rty', 'rty', 'rty', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'rty@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-11-21 15:28:17', '2024-12-31', 'gggg'),
(12, 'rty', 'rty', 'rty', 'rty', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'rty@gmail.com', 'fisherfolk', '3', 'Fishery License Permit', NULL, NULL, ''),
(13, 'rty', 'rty', 'rty', 'rty', 0, '', '', '', '', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'rty@gmail.com', 'fisherfolk', '3', 'Fishery License Permit', NULL, NULL, 'eqe'),
(14, 'Dave', '', 'Divinagracia', '', 8105, 'Davao del Norte', 'Panabo City', '', 'Panabo', 0, '0000-00-00', NULL, '', 'Male', NULL, NULL, NULL, '09364130841', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'dave@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-25 07:01:13', '2025-12-31', ''),
(15, 'zeke', 'aliman', 'buriman', '', 8000, 'davao del norte', 'davao city', 'calderon', 'purok 11.', 32, '0000-00-00', NULL, '2009', 'Male', NULL, NULL, NULL, '134124', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '33124', '', 0, '', 'zeke@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-25 23:43:15', '2025-12-31', ''),
(16, 'David', 'Hue', 'Cruz', '', 8000, 'Davao Del Sur', 'Davao', 'Ilang', 'Diamond', 0, '1999-09-01', NULL, '25', 'Male', NULL, NULL, NULL, '09560322106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 0, '', 'david@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-27 07:04:45', '2025-12-31', ''),
(17, 'james', 'sullivan', 'zenoen', '', 8000, 'davao del sur', 'davao city', 'calderon', 'budbud', 32, '2024-11-28', NULL, '2009', 'Male', NULL, NULL, NULL, '14124222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '232241', 'qwe', 0, 'qwe', 'jameszenoen07@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-11-28 05:16:27', '2025-12-31', ''),
(18, 'asd', 'asda', 'sdasd', '', 0, '', 'sdasdasd', 'asdasd', 'asda', 0, '0000-00-00', '', '', '', '', '', '', '123', 0, 0, 0, 0, 0, 0, 0, '', '', 0.00, '', 0.00, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '31313', '', 0, '', 'jameszenoen07@gmail.com', 'fisherfolk', '3', 'Fishery License Permit', NULL, NULL, ''),
(19, 'jd', 'haohao', 'arries', 'na', 8105, 'davao del norte', 'Panabo', 'San Pedro', 'prk dugso', 0, '2001-10-27', 'Panabo city', '2010', 'Male', 'High School', '', 'Single', '09289970598', 5, 2, 3, 2, 1, 2, 0, '10000', 'crops', 86688.00, '', 0.00, 'James Lou Sad', 'Father', '09289940789', 'San Pedro, Panabo City', '01999222334', 'no', 'no', 'no', 'Capture Fishing', 'Aquaculture', NULL, 'wqeqwc', 2020, 'wow', 'fionashrek@gmail.com', 'fisherfolk', '3', 'Fishery License Permit', NULL, NULL, ''),
(20, 'jd', 'haohao', 'arries', 'na', 8105, 'davao del norte', 'Panabo', 'San Pedro', 'prk dugso', 0, '2001-10-27', 'Panabo city', '2010', 'Male', 'High School', '', 'Single', '09289970598', 5, 2, 3, 2, 1, 2, 0, '10000', 'crops', 86688.00, '', 0.00, 'James Lou Sad', 'Father', '09289940789', 'San Pedro, Panabo City', '01999222334', 'no', 'no', 'no', 'Capture Fishing', 'Aquaculture', NULL, 'wqeqwc', 2020, 'wow', 'fionashrek@gmail.com', 'fisherfolk', '4', 'Fishery License Permit', '2024-12-05 05:27:28', '2025-12-31', ''),
(21, 'Fiona', 'Sullivan', 'Shrek', 'N/A', 8000, 'davao del norte', 'davao city', 'buwana', 'purok 11', 0, '1994-10-10', 'panabo city', '2009', 'Male', 'Elementary', '', 'Single', '09916603843', 1, 1, 1, 1, 1, 1, 1, '20,000', 'farming', 10000.00, 'non-farming', 10000.00, 'James Sullivan', 'son', '09385523545', 'bunawan davao city', '', 'no', 'no', 'no', 'Capture Fishing', 'Fish Processing', NULL, 'Gamin Gladiators', 2009, 'Mid Carry', 'fionashrek@gmail.com', 'fisherfolk', '3', 'Fishery License Permit', NULL, NULL, ''),
(22, 'Fiona', 'Sullivan', 'Shrek', 'N/A', 8000, 'davao del norte', 'davao city', 'buwana', 'purok 11', 0, '1994-10-10', 'panabo city', '2009', 'Male', 'Elementary', '', 'Single', '09916603843', 1, 1, 1, 1, 1, 1, 1, '20,000', 'farming', 10000.00, 'non-farming', 10000.00, 'James Sullivan', 'son', '09385523545', 'bunawan davao city', '', 'no', 'no', 'no', 'Capture Fishing', 'Fish Processing', NULL, 'Gamin Gladiators', 2009, 'Mid Carry', 'fionashrek@gmail.com', 'fisherfolk', '5', 'Fishery License Permit', '2024-12-05 08:01:29', '2024-12-31', 'lacking of requirements');

-- --------------------------------------------------------

--
-- Table structure for table `fishingboats`
--

CREATE TABLE `fishingboats` (
  `id` int(11) NOT NULL,
  `fb_opfname` varchar(255) DEFAULT NULL,
  `fb_opmname` varchar(255) DEFAULT NULL,
  `fb_oplname` varchar(255) DEFAULT NULL,
  `fb_contact` varchar(255) NOT NULL,
  `fb_opappel` varchar(255) DEFAULT NULL,
  `fb_postal` int(11) DEFAULT NULL,
  `fb_opprov` varchar(255) DEFAULT NULL,
  `fb_opmunicipal` varchar(255) DEFAULT NULL,
  `fb_opbarangay` varchar(255) DEFAULT NULL,
  `fb_opstreet` varchar(255) DEFAULT NULL,
  `fb_homeport` varchar(255) DEFAULT NULL,
  `fb_vesselname` varchar(255) DEFAULT NULL,
  `fb_vesseltype` varchar(255) DEFAULT NULL,
  `fb_placebuilt` varchar(255) DEFAULT NULL,
  `fb_yearbuilt` int(11) DEFAULT NULL,
  `fb_materialbuilt` varchar(255) DEFAULT NULL,
  `fb_RL` float DEFAULT NULL,
  `fb_RB` float DEFAULT NULL,
  `fb_RD` float DEFAULT NULL,
  `fb_TL` float DEFAULT NULL,
  `fb_TB` float DEFAULT NULL,
  `fb_TD` float DEFAULT NULL,
  `fb_GT` float DEFAULT NULL,
  `fb_NT` float DEFAULT NULL,
  `fb_enginemake` varchar(255) DEFAULT NULL,
  `fb_serial` varchar(255) DEFAULT NULL,
  `fb_horsepower` float DEFAULT NULL,
  `fb_servicetype` varchar(255) DEFAULT NULL,
  `hooklines` varchar(255) DEFAULT NULL,
  `pottrap` varchar(255) DEFAULT NULL,
  `pushnets` varchar(255) DEFAULT NULL,
  `gillnets` varchar(255) DEFAULT NULL,
  `seinets` varchar(255) DEFAULT NULL,
  `fallgear` varchar(255) DEFAULT NULL,
  `miscgear` varchar(255) DEFAULT NULL,
  `othergear` varchar(255) DEFAULT NULL,
  `liftnets` varchar(255) DEFAULT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_status` char(10) NOT NULL,
  `approval_type` varchar(50) NOT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL,
  `row_id` int(11) NOT NULL,
  `row_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishingboats`
--

INSERT INTO `fishingboats` (`id`, `fb_opfname`, `fb_opmname`, `fb_oplname`, `fb_contact`, `fb_opappel`, `fb_postal`, `fb_opprov`, `fb_opmunicipal`, `fb_opbarangay`, `fb_opstreet`, `fb_homeport`, `fb_vesselname`, `fb_vesseltype`, `fb_placebuilt`, `fb_yearbuilt`, `fb_materialbuilt`, `fb_RL`, `fb_RB`, `fb_RD`, `fb_TL`, `fb_TB`, `fb_TD`, `fb_GT`, `fb_NT`, `fb_enginemake`, `fb_serial`, `fb_horsepower`, `fb_servicetype`, `hooklines`, `pottrap`, `pushnets`, `gillnets`, `seinets`, `fallgear`, `miscgear`, `othergear`, `liftnets`, `u_email`, `u_status`, `approval_type`, `issuance_date`, `expiration_date`, `decline_reason`, `row_id`, `row_type`) VALUES
(1, 'lebron', 'lebron', 'james', '09364130841', '', 0, 'qqq', 'awd', 'asdawd', 'ttt', '', '', 'Motorized', '', 0, 'Wood', 23, 24, 32, 24, 42, 34, 124, 43, 'awd', '3423adawd', 234, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'lebron@gmail.com', '4', 'Fishing Boat Permit', '2024-11-13 17:09:28', '2025-12-31', 'awdawda', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `fishinggears`
--

CREATE TABLE `fishinggears` (
  `fg_id` int(11) NOT NULL,
  `fg_locfname` varchar(100) DEFAULT NULL,
  `fg_locmname` varchar(100) DEFAULT NULL,
  `fg_loclname` varchar(100) DEFAULT NULL,
  `fg_dob` date DEFAULT NULL,
  `fg_locappel` varchar(100) DEFAULT NULL,
  `fg_postal` int(11) DEFAULT NULL,
  `fg_locprov` varchar(255) DEFAULT NULL,
  `fg_locmunicipal` varchar(255) DEFAULT NULL,
  `fg_locbarangay` varchar(255) DEFAULT NULL,
  `fg_locstreet` varchar(100) DEFAULT NULL,
  `fg_loccontact` varchar(15) DEFAULT NULL,
  `fg_OR` char(15) DEFAULT NULL,
  `fg_gender` char(50) NOT NULL,
  `fg_type` varchar(100) DEFAULT NULL,
  `fg_wing` varchar(100) DEFAULT NULL,
  `fg_centerline` varchar(100) DEFAULT NULL,
  `fg_otherspec` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_status` char(10) NOT NULL,
  `approval_type` varchar(50) NOT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishinggears`
--

INSERT INTO `fishinggears` (`fg_id`, `fg_locfname`, `fg_locmname`, `fg_loclname`, `fg_dob`, `fg_locappel`, `fg_postal`, `fg_locprov`, `fg_locmunicipal`, `fg_locbarangay`, `fg_locstreet`, `fg_loccontact`, `fg_OR`, `fg_gender`, `fg_type`, `fg_wing`, `fg_centerline`, `fg_otherspec`, `u_email`, `u_status`, `approval_type`, `issuance_date`, `expiration_date`, `decline_reason`) VALUES
(4, 'lebrons', 'lebron', 'james', '0000-00-00', '', 0, 'p', 'm', 'b', 's', '09364130841', '0', 'Male', NULL, 'test', '', '', 'lebron@gmail.com', '4', 'Fishing Gear Permit', '2024-11-21 07:13:13', '2025-12-31', 'awd'),
(5, 'lebron56', 'lebron56', 'james', '0000-00-00', '', 8105, 'DDN', '', '', 'Panabo', '09364130841', '0', 'Male', NULL, 'awd', '', '', 'lebron@gmail.com', '4', 'Fishing Gear Permit', '2024-11-08 03:30:41', '2025-12-31', ''),
(6, 'lebron1111', 'lebron1111', 'james', NULL, '', 0, '', '', '', '', '09364130841', '0', 'Male', NULL, 'test', '', '', 'lebron@gmail.com', '4', 'Fishing Gear Permit', '2024-11-08 03:30:41', '2025-12-31', ''),
(7, 'lebron1111', 'lebron1111', 'james', NULL, '', 0, '', '', '', '', '09364130841', '0', 'Male', NULL, 'awd', '', '', 'lebron@gmail.com', '4', 'Fishing Gear Permit', '2024-11-08 05:16:43', '2025-12-31', ''),
(8, 'lebron', 'lebron', 'james', NULL, '', 0, '', '', '', '', '09364130841', '0', 'Male', NULL, 'awd', '', '', 'lebron@gmail.com', '4', 'Fishing Gear Permit', '2024-11-08 05:16:49', '2025-12-31', ''),
(11, 'asad', 'sasad', 'asadada', NULL, 'asasas', 123, 'asda', 'sdasd', 'asdasd', 'asdasd', '33123', '123123', 'Male', 'DEEP SEA FISH CORAL (PAGUMAD)', '2x2', '3x3', 'none', 'sadjames@gmail.com', '1', 'Fishing Gear Permit', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `fishworkerlicense`
--

CREATE TABLE `fishworkerlicense` (
  `fw_id` int(11) NOT NULL,
  `fw_fname` varchar(100) DEFAULT NULL,
  `fw_mname` varchar(100) DEFAULT NULL,
  `fw_lname` varchar(100) DEFAULT NULL,
  `fw_appell` varchar(100) DEFAULT NULL,
  `fw_postal` int(11) DEFAULT NULL,
  `fw_province` varchar(255) DEFAULT NULL,
  `fw_municipal` varchar(255) DEFAULT NULL,
  `fw_barangay` varchar(255) DEFAULT NULL,
  `fw_street` varchar(255) DEFAULT NULL,
  `fw_residencesince` int(11) DEFAULT NULL,
  `fw_pob` varchar(255) DEFAULT NULL,
  `fw_complex` varchar(255) DEFAULT NULL,
  `fw_educ` varchar(255) DEFAULT NULL,
  `fw_civ` varchar(255) DEFAULT NULL,
  `fw_other1` varchar(255) DEFAULT NULL,
  `fw_other2` varchar(255) DEFAULT NULL,
  `fw_other3` varchar(255) DEFAULT NULL,
  `fw_gender` varchar(255) DEFAULT NULL,
  `fw_age` int(11) DEFAULT NULL,
  `fw_dob` date DEFAULT NULL,
  `fw_contact` int(15) DEFAULT NULL,
  `fw_OR` int(15) DEFAULT NULL,
  `fw_caretakerof` varchar(100) DEFAULT NULL,
  `fw_caretakersince` int(15) DEFAULT NULL,
  `fw_location` varchar(255) DEFAULT NULL,
  `fw_aquaculture` varchar(100) DEFAULT NULL,
  `fw_FLA_Private` varchar(100) DEFAULT NULL,
  `fw_unitsmanaged` int(15) DEFAULT NULL,
  `fw_unitdeminsions` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_role` varchar(100) DEFAULT NULL,
  `u_status` char(10) DEFAULT NULL,
  `approval_type` varchar(50) DEFAULT NULL,
  `issuance_date` timestamp NULL DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fishworkerlicense`
--

INSERT INTO `fishworkerlicense` (`fw_id`, `fw_fname`, `fw_mname`, `fw_lname`, `fw_appell`, `fw_postal`, `fw_province`, `fw_municipal`, `fw_barangay`, `fw_street`, `fw_residencesince`, `fw_pob`, `fw_complex`, `fw_educ`, `fw_civ`, `fw_other1`, `fw_other2`, `fw_other3`, `fw_gender`, `fw_age`, `fw_dob`, `fw_contact`, `fw_OR`, `fw_caretakerof`, `fw_caretakersince`, `fw_location`, `fw_aquaculture`, `fw_FLA_Private`, `fw_unitsmanaged`, `fw_unitdeminsions`, `u_email`, `u_role`, `u_status`, `approval_type`, `issuance_date`, `expiration_date`, `decline_reason`) VALUES
(198, 'lebron', 'lebrons', 'lebron', 'apel', 12, 'ddn', 'mun', 'bar', 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', 78, '2014-11-06', 91212121, 23, 'Grow-out', 2, 'ad', 'Fish Cage', 'FLA', 1, '2', 'lebron@gmail.com', 'fishworker', '4', 'Fishery License Permit', '2024-11-19 20:49:02', '2025-12-31', 'noOR'),
(199, 'lebron', 'lebron', 'lebron', '', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Male', 0, '0000-00-00', 2147483647, 0, 'Grow-out', 0, '', 'Fish Cage', 'FLA', 0, '', 'lebron@gmail.com', 'fishworker', '4', 'Fishery License Permit', '2024-11-08 05:27:59', '2025-12-31', ''),
(200, 'qweqw', 'eqweqw', 'qweqwe', 'qweqw', 0, '', 'qweqwe', 'qweqw', 'qweqwe', NULL, NULL, '', '', '', NULL, '', '', NULL, 0, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'sadjames@gmail.com', 'fishworker', '1', 'Fishery License Permit', NULL, NULL, ''),
(201, 'qweqw', 'qweqwe', 'qweqwe', 'qwe', 0, '', '', '', '', NULL, NULL, '', '', '', NULL, '', '', NULL, 0, '0000-00-00', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '', 'sadjames@gmail.com', 'fishworker', '1', 'Fishery License Permit', NULL, NULL, ''),
(202, 'fiona', 'yow', 'shrek', 'na', 8105, 'davao del norte', 'panabo', 'san pedro', 'prk dugso', NULL, NULL, 'Panabo City', 'vocational', 'married', NULL, '', '', 'Female', 0, '2002-10-27', 2147483647, NULL, 'Grow-out', NULL, NULL, 'Fishcage', 'on', 3, '60', 'fionashrek@gmail.com', 'fishworker', '1', 'Fishery License Permit', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `licensing`
--

CREATE TABLE `licensing` (
  `client_id` int(11) NOT NULL,
  `client_gender` varchar(255) DEFAULT NULL,
  `client_fname` varchar(255) DEFAULT NULL,
  `client_mname` varchar(255) DEFAULT NULL,
  `client_lname` varchar(255) DEFAULT NULL,
  `client_dob` date DEFAULT NULL,
  `client_prov` varchar(255) DEFAULT NULL,
  `client_municipal` varchar(255) DEFAULT NULL,
  `client_street` varchar(255) DEFAULT NULL,
  `client_brgy` varchar(255) DEFAULT NULL,
  `client_OR` varchar(255) DEFAULT NULL,
  `approval_type` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) NOT NULL,
  `issuance_date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `license_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `licensing`
--

INSERT INTO `licensing` (`client_id`, `client_gender`, `client_fname`, `client_mname`, `client_lname`, `client_dob`, `client_prov`, `client_municipal`, `client_street`, `client_brgy`, `client_OR`, `approval_type`, `u_email`, `issuance_date`, `expiration_date`, `license_status`) VALUES
(8, 'Male', 'aw', 'wa', 'wes', '0000-00-00', 'testP', 'testM', 'Panabo', 'TestB', '1233', 'Fishery License Permit', 'lebron@gmail.com', '2024-12-02', '2027-12-02', 1),
(9, 'Male', 'Jasmin', 'De Nero', 'Jae', '0000-00-00', 'asdas', 'dasd', 'purok 11.', 'calderon', '451431', 'Fishery License Permit', 'pennyworth@gmail.com', '2024-12-03', '2027-12-03', 1),
(12, 'Male', 'rty', 'rty', 'rty', '0000-00-00', '', '', '', '', '0', 'Fishery License Permit', 'rty@gmail.com', '2024-11-28', '2027-11-28', 1),
(15, 'Male', 'Dave', '', 'Divinagracia', '0000-00-00', 'Davao del Norte', 'Panabo City', 'Panabo', '', '0', 'Fishery License Permit', 'dave@gmail.com', '2024-11-25', '2027-11-25', 1),
(16, 'Male', 'james', 'de nero', 'alfred', '0000-00-00', 'davao del norte', 'panabo', '', 'new pandan', '0', 'Fishery License Permit', 'alfredjames@gmail.com', '2024-12-01', '2027-12-01', 1),
(17, 'Male', 'zeke', 'aliman', 'buriman', '0000-00-00', 'davao del norte', 'davao city', 'purok 11.', 'calderon', '33124', 'Fishery License Permit', 'zeke@gmail.com', NULL, '2027-12-01', 1),
(18, 'Male', 'David', 'Hue', 'Cruz', '1999-09-01', 'Davao Del Sur', 'Davao', 'Diamond', 'Ilang', '6768877', 'Fishery License Permit', 'david@gmail.com', '2024-12-04', '2027-12-04', 1),
(19, 'Male', 'james', 'sullivan', 'zenoen', '2024-11-28', 'davao del sur', 'davao city', 'budbud', 'calderon', '232241', 'Fishery License Permit', 'jameszenoen07@gmail.com', '2024-12-04', '2027-12-05', 1),
(20, 'Female', 'Mary', 'Nova', 'Piatos', '1990-09-01', 'Davao Del Sur', 'Davao', 'Diamond', 'Sasa', '1111', 'Fishery License Permit', 'mary@gmail.com', NULL, NULL, 2),
(21, '', 'qweqwe', 'qweqwe', 'qweqwe', '0000-00-00', 'qwe', 'qwe', 'qweqwe', 'qweqwe', '', 'Permit to Operate (FishingCage)', 'sadjames@gmail.com', NULL, NULL, 2),
(22, 'Male', 'jd', 'haohao', 'arries', '2001-10-27', 'davao del norte', 'Panabo', 'prk dugso', 'San Pedro', '0', 'Fishery License Permit', 'fionashrek@gmail.com', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `locatorinvestor`
--

CREATE TABLE `locatorinvestor` (
  `loc_id` int(11) NOT NULL,
  `fw_id` int(11) DEFAULT NULL,
  `loc_fname` varchar(100) DEFAULT NULL,
  `loc_mname` varchar(100) DEFAULT NULL,
  `loc_lname` varchar(100) DEFAULT NULL,
  `loc_appell` varchar(100) DEFAULT NULL,
  `loc_prov` varchar(100) DEFAULT NULL,
  `loc_municipal` varchar(100) DEFAULT NULL,
  `loc_brgy` varchar(100) DEFAULT NULL,
  `loc_street` varchar(100) DEFAULT NULL,
  `loc_units` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locatorinvestor`
--

INSERT INTO `locatorinvestor` (`loc_id`, `fw_id`, `loc_fname`, `loc_mname`, `loc_lname`, `loc_appell`, `loc_prov`, `loc_municipal`, `loc_brgy`, `loc_street`, `loc_units`) VALUES
(145, 198, 'test', 't', 'awd', 'awd', 'drg', '', '', '', ''),
(146, 199, '', '', '', '', '', '', '', '', ''),
(147, 200, '', NULL, NULL, NULL, '', NULL, NULL, NULL, ''),
(148, 201, '', NULL, NULL, NULL, '', NULL, NULL, NULL, ''),
(149, 202, 'James Lou Sad', NULL, NULL, NULL, 'prk dugso', NULL, NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `not_id` int(11) NOT NULL,
  `not_title` varchar(255) NOT NULL,
  `not_desc` varchar(255) DEFAULT NULL,
  `not_date` datetime NOT NULL,
  `not_for` varchar(255) NOT NULL,
  `not_client_email` varchar(255) NOT NULL,
  `not_status` int(11) NOT NULL,
  `row_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`not_id`, `not_title`, `not_desc`, `not_date`, `not_for`, `not_client_email`, `not_status`, `row_type`) VALUES
(16, 'Declined fisherfolks', 'Vespoli, Dana approved the permit of alfredjames@gmail.com', '2024-11-21 14:57:33', 'admin', '', 1, 'fishinggears'),
(17, 'Declined', 'Vespoli, Dana approved the permit of lebron@gmail.com', '2024-11-21 15:01:02', 'admin', '', 1, 'fishinggears'),
(18, 'Approval', 'admin, Admin approved the permit of alfredjames@gmail.com', '2024-11-21 15:11:08', 'sectionhead', '', 1, 'dashboard'),
(19, 'Approval', 'admin, Admin approved the permit of alfredjames@gmail.com', '2024-11-21 15:12:15', 'sectionhead', '', 1, 'dashboard'),
(20, 'Declined', 'Vespoli, Dana approved the permit of alfredjames@gmail.com', '2024-11-21 15:12:49', 'admin', '', 1, 'fisherfolks'),
(21, 'Approval', 'admin, Admin approved the permit of lebron@gmail.com', '2024-11-21 15:13:02', 'sectionhead', '', 1, 'dashboard'),
(22, 'Approval', 'admin, Admin approved the permit of ', '2024-11-21 15:13:37', 'sectionhead', '', 1, 'dashboard'),
(23, 'Declined', 'Vespoli, Dana approved the permit of lebron@gmail.com', '2024-11-21 15:13:43', 'admin', '', 1, 'fishcage'),
(24, 'Approval', 'admin, Admin sent an approval for ', '2024-11-21 15:56:36', 'admin', '', 1, 'dashboard'),
(25, 'Approval', 'admin, Admin sent an approval for ', '2024-11-21 15:57:46', 'section', '', 1, 'dashboard'),
(26, 'Approval', 'admin, Admin sent an approval for ', '2024-11-21 15:58:55', 'sectionhead', '', 1, 'dashboard'),
(27, 'Approval', 'admin, Admin sent an approval for lebron@gmail.com', '2024-11-21 16:03:07', 'sectionhead', '', 1, 'dashboard'),
(52, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-11-21 23:00:29', 'sectionhead', '', 1, 'dashboard'),
(53, 'Approval', 'Your request has been sent for approval.', '2024-11-21 23:00:29', 'client', '', 0, 'profile'),
(54, 'Declined', 'Vespoli, Dana approved the permit for rty@gmail.com', '2024-11-21 23:10:03', 'admin', '', 1, 'fisherfolks'),
(55, 'Declined', 'Your request has been declined.', '2024-11-21 23:10:03', 'client', '', 0, 'profile'),
(56, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-11-21 23:13:41', 'sectionhead', '', 0, 'dashboard'),
(57, 'Approval', 'Your request has been sent for approval.', '2024-11-21 23:13:41', 'client', '', 0, 'profile'),
(58, 'Declined', 'Vespoli, Dana declined the permit for rty@gmail.com', '2024-11-21 23:14:10', 'admin', '', 1, 'fisherfolks'),
(59, 'Declined', 'Your request has been declined.', '2024-11-21 23:14:10', 'client', '', 0, 'profile'),
(60, 'Declined', 'Vespoli, Dana declined the permit for rty@gmail.com', '2024-11-21 23:15:10', 'admin', '', 1, 'fisherfolks'),
(61, 'Declined', 'Your request has been declined.', '2024-11-21 23:15:10', 'client', 'rty@gmail.com', 1, 'profile'),
(62, 'Declined', 'Vespoli, Dana declined the permit for rty@gmail.com', '2024-11-21 23:24:47', 'admin', 'rty@gmail.com', 1, 'fisherfolks'),
(63, 'Declined', 'Vespoli, Dana declined the permit for rty@gmail.com', '2024-11-21 23:27:00', 'admin', 'rty@gmail.com', 1, 'fisherfolks'),
(64, 'Declined', 'Your request has been declined.', '2024-11-21 23:27:00', 'client', 'rty@gmail.com', 1, 'profile'),
(65, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-11-21 23:27:31', 'sectionhead', 'rty@gmail.com', 1, 'dashboard'),
(66, 'Approval', 'Your request has been sent for approval.', '2024-11-21 23:27:31', 'client', 'rty@gmail.com', 1, 'profile'),
(67, 'Approved', 'Your request has been successfully approved.', '2024-11-21 23:28:17', 'client', 'rty@gmail.com', 1, 'profile'),
(68, 'Request', 'rty@gmail.com submitted a request.', '2024-11-21 23:52:23', 'admin', 'rty@gmail.com', 1, 'fisherfolks'),
(69, 'Request', 'rty@gmail.com submitted a request.', '2024-11-21 23:57:27', 'admin', 'rty@gmail.com', 1, 'fisherfolks'),
(70, 'Approval', 'admin, Admin sent an approval for alfredjames@gmail.com', '2024-11-25 05:28:08', 'sectionhead', 'alfredjames@gmail.com', 1, 'dashboard'),
(71, 'Approval', 'Your request has been sent for approval.', '2024-11-25 05:28:08', 'client', 'alfredjames@gmail.com', 0, 'profile'),
(72, 'Approval', 'admin, Admin sent an approval for lebron@gmail.com', '2024-11-25 05:29:00', 'sectionhead', 'lebron@gmail.com', 1, 'dashboard'),
(73, 'Approval', 'Your request has been sent for approval.', '2024-11-25 05:29:00', 'client', 'lebron@gmail.com', 1, 'profile'),
(74, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-11-25 05:59:19', 'sectionhead', 'rty@gmail.com', 1, 'dashboard'),
(75, 'Approval', 'Your request has been sent for approval.', '2024-11-25 05:59:19', 'client', 'rty@gmail.com', 0, 'profile'),
(76, 'Request', 'dave@gmail.com submitted a request.', '2024-11-25 06:53:57', 'admin', 'dave@gmail.com', 1, 'fisherfolks'),
(77, 'Approval', 'admin, Admin sent an approval for dave@gmail.com', '2024-11-25 06:55:43', 'sectionhead', 'dave@gmail.com', 1, 'dashboard'),
(78, 'Approval', 'Your request has been sent for approval.', '2024-11-25 06:55:43', 'client', 'dave@gmail.com', 0, 'profile'),
(79, 'Approved', NULL, '2024-11-25 07:01:13', 'admin', 'dave@gmail.com', 1, 'fisherfolks'),
(80, 'Approved', 'Your request has been successfully approved.', '2024-11-25 07:01:13', 'client', 'dave@gmail.com', 0, 'profile'),
(81, 'Approval', 'admin, Admin sent an approval for alfredjames@gmail.com', '2024-11-25 07:02:49', 'sectionhead', 'alfredjames@gmail.com', 1, 'dashboard'),
(82, 'Approval', 'Your request has been sent for approval.', '2024-11-25 07:02:49', 'client', 'alfredjames@gmail.com', 0, 'profile'),
(83, 'Approved', NULL, '2024-11-25 07:05:59', 'admin', 'alfredjames@gmail.com', 1, 'fisherfolks'),
(84, 'Approved', 'Your request has been successfully approved.', '2024-11-25 07:05:59', 'client', 'alfredjames@gmail.com', 0, 'profile'),
(85, 'Approval', 'admin, Admin sent an approval for lebron@gmail.com', '2024-11-25 08:24:39', 'sectionhead', 'lebron@gmail.com', 1, 'dashboard'),
(86, 'Approval', 'Your request has been sent for approval.', '2024-11-25 08:24:39', 'client', 'lebron@gmail.com', 0, 'profile'),
(87, 'Request', 'zeke@gmail.com submitted a request.', '2024-11-25 23:40:56', 'admin', 'zeke@gmail.com', 1, 'fisherfolks'),
(88, 'Approval', 'admin, Admin sent an approval for zeke@gmail.com', '2024-11-25 23:41:46', 'sectionhead', 'zeke@gmail.com', 1, 'dashboard'),
(89, 'Approval', 'Your request has been sent for approval.', '2024-11-25 23:41:46', 'client', 'zeke@gmail.com', 0, 'profile'),
(90, 'Approved', NULL, '2024-11-25 23:43:15', 'admin', 'zeke@gmail.com', 1, 'fisherfolks'),
(91, 'Approved', 'Your request has been successfully approved.', '2024-11-25 23:43:15', 'client', 'zeke@gmail.com', 0, 'profile'),
(92, 'Request', 'david@gmail.com submitted a request.', '2024-11-27 07:02:51', 'admin', 'david@gmail.com', 1, 'fisherfolks'),
(93, 'Approval', 'admin, Admin sent an approval for david@gmail.com', '2024-11-27 07:03:48', 'sectionhead', 'david@gmail.com', 1, 'dashboard'),
(94, 'Approval', 'Your request has been sent for approval.', '2024-11-27 07:03:48', 'client', 'david@gmail.com', 1, 'profile'),
(95, 'Approved', NULL, '2024-11-27 07:04:45', 'admin', 'david@gmail.com', 1, 'fisherfolks'),
(96, 'Approved', 'Your request has been successfully approved.', '2024-11-27 07:04:45', 'client', 'david@gmail.com', 1, 'profile'),
(97, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-11-28 05:12:50', 'admin', 'jameszenoen07@gmail.com', 1, 'fisherfolks'),
(98, 'Approval', 'admin, Admin sent an approval for jameszenoen07@gmail.com', '2024-11-28 05:15:32', 'sectionhead', 'jameszenoen07@gmail.com', 1, 'dashboard'),
(99, 'Approval', 'Your request has been sent for approval.', '2024-11-28 05:15:32', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(100, 'Approved', NULL, '2024-11-28 05:16:27', 'admin', 'jameszenoen07@gmail.com', 1, 'fisherfolks'),
(101, 'Approved', 'Your request has been successfully approved.', '2024-11-28 05:16:27', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(102, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-12-01 13:21:13', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(103, 'Approval', 'Your request has been sent for approval.', '2024-12-01 13:21:13', 'client', 'rty@gmail.com', 0, 'profile'),
(104, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-12-02 09:22:37', 'admin', 'jameszenoen07@gmail.com', 1, 'fishinggears'),
(105, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-12-02 10:11:45', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(106, 'Approval', 'Your request has been sent for approval.', '2024-12-02 10:11:45', 'client', 'rty@gmail.com', 0, 'profile'),
(107, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-12-02 12:35:02', 'admin', 'jameszenoen07@gmail.com', 1, 'fishinggears'),
(108, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-12-02 12:39:44', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(109, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:39:44', 'client', 'rty@gmail.com', 0, 'profile'),
(110, 'Approval', 'admin, Admin sent an approval for rty@gmail.com', '2024-12-02 12:44:04', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(111, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:44:04', 'client', 'rty@gmail.com', 0, 'profile'),
(112, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-12-02 12:45:40', 'admin', 'jameszenoen07@gmail.com', 1, 'fishingcages'),
(113, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-12-02 12:46:37', 'admin', 'jameszenoen07@gmail.com', 1, 'fishingcages'),
(114, 'Request', 'jameszenoen07@gmail.com submitted a request.', '2024-12-02 12:47:20', 'admin', 'jameszenoen07@gmail.com', 0, 'fishingboats'),
(115, 'Approval', 'admin, Admin sent an approval for jameszenoen07@gmail.com', '2024-12-02 12:47:55', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(116, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:47:55', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(117, 'Approval', 'admin, Admin sent an approval for jameszenoen07@gmail.com', '2024-12-02 12:48:47', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(118, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:48:47', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(119, 'Approval', 'admin, Admin sent an approval for jameszenoen07@gmail.com', '2024-12-02 12:48:50', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(120, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:48:50', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(121, 'Approval', 'admin, Admin sent an approval for jameszenoen07@gmail.com', '2024-12-02 12:48:57', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(122, 'Approval', 'Your request has been sent for approval.', '2024-12-02 12:48:57', 'client', 'jameszenoen07@gmail.com', 1, 'profile'),
(123, 'Approval', 'admin, admin sent an approval for rty@gmail.com', '2024-12-02 20:46:40', 'sectionhead', 'rty@gmail.com', 1, 'dashboard'),
(124, 'Approval', 'Your request has been sent for approval.', '2024-12-02 20:46:40', 'client', 'rty@gmail.com', 0, 'profile'),
(125, 'Declined', 'head, section declined the permit for lebron@gmail.com', '2024-12-03 02:07:12', 'admin', 'lebron@gmail.com', 0, 'fishcage'),
(126, 'Declined', 'Your request has been declined.', '2024-12-03 02:07:12', 'client', 'lebron@gmail.com', 0, 'profile'),
(127, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 03:41:07', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(128, 'Approval', 'Your request has been sent for approval.', '2024-12-03 03:41:07', 'client', 'lebron@gmail.com', 0, 'profile'),
(129, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 03:43:35', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(130, 'Approval', 'Your request has been sent for approval.', '2024-12-03 03:43:35', 'client', 'lebron@gmail.com', 0, 'profile'),
(131, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 04:03:53', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(132, 'Approval', 'Your request has been sent for approval.', '2024-12-03 04:03:53', 'client', 'lebron@gmail.com', 0, 'profile'),
(133, 'Request', 'sadjames@gmail.com submitted a request.', '2024-12-03 04:10:14', 'admin', 'sadjames@gmail.com', 1, 'fishinggears'),
(134, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 04:17:07', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(135, 'Approval', 'Your request has been sent for approval.', '2024-12-03 04:17:07', 'client', 'lebron@gmail.com', 0, 'profile'),
(136, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 04:56:44', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(137, 'Approval', 'Your request has been sent for approval.', '2024-12-03 04:56:44', 'client', 'lebron@gmail.com', 0, 'profile'),
(138, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-03 07:10:44', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(139, 'Approval', 'Your request has been sent for approval.', '2024-12-03 07:10:44', 'client', 'lebron@gmail.com', 0, 'profile'),
(140, 'Request', 'mary@gmail.com submitted a request.', '2024-12-04 06:55:49', 'admin', 'mary@gmail.com', 1, 'fisherfolks'),
(141, 'Approval', 'admin, admin sent an approval for mary@gmail.com', '2024-12-04 06:57:34', 'sectionhead', 'mary@gmail.com', 1, 'dashboard'),
(142, 'Approval', 'Your request has been sent for approval.', '2024-12-04 06:57:34', 'client', 'mary@gmail.com', 1, 'profile'),
(143, 'Approved', NULL, '2024-12-04 07:01:20', 'admin', 'mary@gmail.com', 1, 'fisherfolks'),
(144, 'Approved', 'Your request has been successfully approved.', '2024-12-04 07:01:20', 'client', 'mary@gmail.com', 1, 'profile'),
(145, 'Request', 'sadjames@gmail.com submitted a request.', '2024-12-04 16:15:03', 'admin', 'sadjames@gmail.com', 1, 'fishworkers'),
(146, 'Request', 'sadjames@gmail.com submitted a request.', '2024-12-04 16:27:53', 'admin', 'sadjames@gmail.com', 1, 'fishworkers'),
(147, 'Request', 'sadjames@gmail.com submitted a request.', '2024-12-04 17:13:52', 'admin', 'sadjames@gmail.com', 1, 'fishinggears'),
(148, 'Request', 'sadjames@gmail.com submitted a request.', '2024-12-04 18:15:21', 'admin', 'sadjames@gmail.com', 1, 'fishingcages'),
(149, 'Approval', 'admin, admin sent an approval for jameszenoen07@gmail.com', '2024-12-04 20:35:08', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(150, 'Approval', 'Your request has been sent for approval.', '2024-12-04 20:35:08', 'client', 'jameszenoen07@gmail.com', 0, 'profile'),
(151, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 02:48:56', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(152, 'Approval', 'Your request has been sent for approval.', '2024-12-05 02:48:56', 'client', 'lebron@gmail.com', 0, 'profile'),
(153, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 03:50:09', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(154, 'Approval', 'Your request has been sent for approval.', '2024-12-05 03:50:09', 'client', 'sadjames@gmail.com', 0, 'profile'),
(155, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 03:50:15', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(156, 'Approval', 'Your request has been sent for approval.', '2024-12-05 03:50:15', 'client', 'sadjames@gmail.com', 0, 'profile'),
(157, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 03:50:25', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(158, 'Approval', 'Your request has been sent for approval.', '2024-12-05 03:50:25', 'client', 'sadjames@gmail.com', 0, 'profile'),
(159, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 03:50:29', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(160, 'Approval', 'Your request has been sent for approval.', '2024-12-05 03:50:29', 'client', 'lebron@gmail.com', 0, 'profile'),
(161, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 04:22:30', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(162, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:22:30', 'client', 'sadjames@gmail.com', 0, 'profile'),
(163, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 04:22:43', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(164, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:22:43', 'client', 'lebron@gmail.com', 0, 'profile'),
(165, 'Approval', 'admin, admin sent an approval for rty@gmail.com', '2024-12-05 04:49:19', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(166, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:49:19', 'client', 'rty@gmail.com', 0, 'profile'),
(167, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 04:49:43', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(168, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:49:43', 'client', 'lebron@gmail.com', 0, 'profile'),
(169, 'Approval', 'admin, admin sent an approval for jameszenoen07@gmail.com', '2024-12-05 04:55:41', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(170, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:55:41', 'client', 'jameszenoen07@gmail.com', 0, 'profile'),
(171, 'Request', 'fionashrek@gmail.com submitted a request.', '2024-12-05 04:56:40', 'admin', 'fionashrek@gmail.com', 0, 'fisherfolks'),
(172, 'Request', 'fionashrek@gmail.com submitted a request.', '2024-12-05 04:56:40', 'admin', 'fionashrek@gmail.com', 0, 'fisherfolks'),
(173, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 04:57:12', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(174, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:57:12', 'client', 'lebron@gmail.com', 0, 'profile'),
(175, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 04:57:16', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(176, 'Approval', 'Your request has been sent for approval.', '2024-12-05 04:57:16', 'client', 'sadjames@gmail.com', 0, 'profile'),
(177, 'Approved', NULL, '2024-12-05 04:58:11', 'admin', 'sadjames@gmail.com', 0, 'fishcage'),
(178, 'Approved', 'Your request has been successfully approved.', '2024-12-05 04:58:11', 'client', 'sadjames@gmail.com', 0, 'profile'),
(179, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 05:18:09', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(180, 'Approval', 'Your request has been sent for approval.', '2024-12-05 05:18:09', 'client', 'sadjames@gmail.com', 0, 'profile'),
(181, 'Approval', 'admin, admin sent an approval for lebron@gmail.com', '2024-12-05 05:18:14', 'sectionhead', 'lebron@gmail.com', 0, 'dashboard'),
(182, 'Approval', 'Your request has been sent for approval.', '2024-12-05 05:18:14', 'client', 'lebron@gmail.com', 0, 'profile'),
(183, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 05:23:56', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(184, 'Approval', 'Your request has been sent for approval.', '2024-12-05 05:23:56', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(185, 'Approved', NULL, '2024-12-05 05:27:28', 'admin', 'fionashrek@gmail.com', 1, 'fisherfolks'),
(186, 'Approved', 'Your request has been successfully approved.', '2024-12-05 05:27:28', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(187, 'Request', 'fionashrek@gmail.com submitted a request.', '2024-12-05 06:04:46', 'admin', 'fionashrek@gmail.com', 1, 'fishworkers'),
(188, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 06:22:38', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(189, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:22:38', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(190, 'Approval', 'admin, admin sent an approval for rty@gmail.com', '2024-12-05 06:28:20', 'sectionhead', 'rty@gmail.com', 0, 'dashboard'),
(191, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:28:20', 'client', 'rty@gmail.com', 0, 'profile'),
(192, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 06:36:32', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(193, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:36:32', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(194, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 06:37:49', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(195, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:37:49', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(196, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 06:45:42', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(197, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:45:42', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(198, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 06:46:45', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(199, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:46:45', 'client', 'sadjames@gmail.com', 0, 'profile'),
(200, 'Approval', 'admin, admin sent an approval for jameszenoen07@gmail.com', '2024-12-05 06:54:04', 'sectionhead', 'jameszenoen07@gmail.com', 0, 'dashboard'),
(201, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:54:04', 'client', 'jameszenoen07@gmail.com', 0, 'profile'),
(202, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 06:54:32', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(203, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:54:32', 'client', 'sadjames@gmail.com', 0, 'profile'),
(204, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 06:58:10', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(205, 'Approval', 'Your request has been sent for approval.', '2024-12-05 06:58:10', 'client', 'sadjames@gmail.com', 0, 'profile'),
(206, 'Request', 'fionashrek@gmail.com submitted a request.', '2024-12-05 07:41:15', 'admin', 'fionashrek@gmail.com', 0, 'fisherfolks'),
(207, 'Request', 'fionashrek@gmail.com submitted a request.', '2024-12-05 07:41:15', 'admin', 'fionashrek@gmail.com', 1, 'fisherfolks'),
(208, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 07:56:45', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(209, 'Approval', 'Your request has been sent for approval.', '2024-12-05 07:56:45', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(210, 'Declined', 'head, section declined the permit for fionashrek@gmail.com', '2024-12-05 08:00:07', 'admin', 'fionashrek@gmail.com', 1, 'fisherfolks'),
(211, 'Declined', 'Your request has been declined.', '2024-12-05 08:00:07', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(212, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 08:00:56', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(213, 'Approval', 'Your request has been sent for approval.', '2024-12-05 08:00:56', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(214, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 12:24:07', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(215, 'Approval', 'Your request has been sent for approval.', '2024-12-05 12:24:07', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(216, 'Approval', 'admin, admin sent an approval for fionashrek@gmail.com', '2024-12-05 13:36:39', 'sectionhead', 'fionashrek@gmail.com', 0, 'dashboard'),
(217, 'Approval', 'Your request has been sent for approval.', '2024-12-05 13:36:39', 'client', 'fionashrek@gmail.com', 0, 'profile'),
(218, 'Approval', 'admin, admin sent an approval for sadjames@gmail.com', '2024-12-05 23:25:42', 'sectionhead', 'sadjames@gmail.com', 0, 'dashboard'),
(219, 'Approval', 'Your request has been sent for approval.', '2024-12-05 23:25:42', 'client', 'sadjames@gmail.com', 0, 'profile');

-- --------------------------------------------------------

--
-- Table structure for table `otp_verifications`
--

CREATE TABLE `otp_verifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `contact_number` varchar(15) NOT NULL,
  `otp` int(11) NOT NULL,
  `expiration_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otp_verifications`
--

INSERT INTO `otp_verifications` (`id`, `user_id`, `contact_number`, `otp`, `expiration_time`, `created_at`) VALUES
(5, NULL, '09364130841', 6436, '2024-11-17 18:29:45', '2024-11-17 17:19:45'),
(6, NULL, '09364130841', 7811, '2024-11-17 18:25:06', '2024-11-17 17:20:06'),
(7, NULL, '09364130841', 9891, '2024-11-17 18:26:19', '2024-11-17 17:21:19'),
(8, NULL, '09364130841', 8559, '2024-11-17 18:26:38', '2024-11-17 17:21:38'),
(9, NULL, '09364130841', 4504, '2024-11-17 18:29:09', '2024-11-17 17:24:09'),
(10, NULL, '09364130841', 3115, '2024-11-18 01:30:33', '2024-11-17 17:25:33'),
(11, NULL, '09364130841', 1837, '2024-11-18 01:34:48', '2024-11-17 17:29:48'),
(12, NULL, '09364130841', 7066, '2024-11-18 01:35:34', '2024-11-17 17:30:34'),
(13, NULL, '09364130841', 5734, '2024-11-18 01:36:23', '2024-11-17 17:31:23'),
(14, NULL, '09364130841', 3028, '2024-11-18 01:37:28', '2024-11-17 17:32:28'),
(15, NULL, '09364130841', 2671, '2024-11-18 01:37:47', '2024-11-17 17:32:47'),
(16, NULL, '09364130841', 2444, '2024-11-18 01:38:01', '2024-11-17 17:33:01'),
(17, NULL, '09364130841', 1356, '2024-11-18 01:38:44', '2024-11-17 17:33:44'),
(18, NULL, '09364130841', 6069, '2024-11-18 01:39:29', '2024-11-17 17:34:29'),
(19, NULL, '09364130841', 2031, '2024-11-18 01:40:04', '2024-11-17 17:35:04'),
(20, NULL, '09364130841', 8769, '2024-11-18 01:41:40', '2024-11-17 17:36:40'),
(21, NULL, '09364130841', 1942, '2024-11-18 01:44:50', '2024-11-17 17:39:50'),
(22, NULL, '09364130841', 5859, '2024-11-18 01:46:58', '2024-11-17 17:41:58'),
(23, NULL, '09364130841', 8119, '2024-11-18 01:49:08', '2024-11-17 17:44:08'),
(24, NULL, '09364130841', 2797, '2024-11-18 01:50:55', '2024-11-17 17:45:55'),
(25, NULL, '09364130841', 1177, '2024-11-18 01:52:45', '2024-11-17 17:47:45'),
(26, NULL, '09364130841', 3721, '2024-11-18 01:55:42', '2024-11-17 17:50:42'),
(27, NULL, '09364130841', 6279, '2024-11-18 01:56:37', '2024-11-17 17:51:37'),
(28, NULL, '09364130841', 4397, '2024-11-18 01:59:28', '2024-11-17 17:54:28'),
(29, NULL, '09364130841', 6136, '2024-11-18 02:37:12', '2024-11-17 18:32:12'),
(30, NULL, '09364130841', 4244, '2024-11-18 02:41:13', '2024-11-17 18:36:13'),
(31, NULL, '09364130841', 8128, '2024-11-18 02:42:12', '2024-11-17 18:37:12'),
(32, NULL, '09364130841', 2332, '2024-11-18 02:42:44', '2024-11-17 18:37:44'),
(33, NULL, '09364130841', 6600, '2024-11-18 02:44:58', '2024-11-17 18:39:58'),
(34, NULL, '09364130841', 6285, '2024-11-18 02:45:30', '2024-11-17 18:40:30'),
(35, NULL, '09364130841', 7791, '2024-11-18 02:46:52', '2024-11-17 18:41:52'),
(36, 41, '09364130841', 7602, '2024-11-18 03:04:12', '2024-11-17 18:59:12'),
(37, 69, '09916603843', 1572, '2024-11-25 14:51:00', '2024-11-25 06:46:00'),
(38, 69, '09916603843', 2042, '2024-11-25 14:51:11', '2024-11-25 06:46:11'),
(39, 67, '09364130841', 5672, '2024-11-25 14:58:00', '2024-11-25 06:53:00'),
(40, 73, '09916603843', 8931, '2024-11-26 07:44:17', '2024-11-25 23:39:17'),
(41, 76, '09708821812', 3878, '2024-11-26 14:53:25', '2024-11-26 06:48:25'),
(42, 76, '09708821812', 7558, '2024-11-26 14:53:48', '2024-11-26 06:48:48'),
(43, 75, '09153472322', 2353, '2024-11-26 14:57:33', '2024-11-26 06:52:33'),
(44, 75, '09153472322', 4805, '2024-11-26 14:57:50', '2024-11-26 06:52:50'),
(45, 79, '099916603843', 7749, '2024-11-28 13:14:19', '2024-11-28 05:09:19'),
(46, 85, '33123', 1870, '2024-12-02 21:45:36', '2024-12-02 13:40:36'),
(47, 88, '09245563765', 3410, '2024-12-03 14:06:56', '2024-12-03 06:01:56'),
(48, 89, '0970882135', 8644, '2024-12-03 23:15:17', '2024-12-03 15:10:17'),
(49, 90, '09626932606', 2201, '2024-12-04 14:48:36', '2024-12-04 06:43:36'),
(50, 93, '09469433174', 3737, '2024-12-05 15:37:03', '2024-12-05 07:32:03'),
(51, 93, '09469433174', 2164, '2024-12-05 15:37:47', '2024-12-05 07:32:47'),
(52, 94, '09289970598', 2257, '2024-12-05 20:59:33', '2024-12-05 12:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `requirementfees`
--

CREATE TABLE `requirementfees` (
  `id` int(11) NOT NULL,
  `permit_name` varchar(50) NOT NULL,
  `requirements` varchar(255) NOT NULL,
  `payment_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requirementfees`
--

INSERT INTO `requirementfees` (`id`, `permit_name`, `requirements`, `payment_data`) VALUES
(3, 'ff_permit', '[\"BRGY. CLEARANCE\\/CERTIFICATION\",\"CEDULA\",\"2x2 I.D. PICTURE (2PCS)\",\"FISHERY LICENSE I.D\"]', '[{\"payment\":\"Cedula\",\"amount\":\"2\",\"qty\":\"3\",\"subtotal\":\"6.00\"},{\"payment\":\"\",\"amount\":\"3\",\"qty\":\"5\",\"subtotal\":\"15.00\"},{\"payment\":\"testtt\",\"amount\":\"2\",\"qty\":\"1\",\"subtotal\":\"2.00\"},{\"payment\":\"id\",\"amount\":\"200\",\"qty\":\"1\",\"subtotal\":\"200.00\"}]'),
(4, 'fw_permit', '[\"CEDULA\",\"FARMC CERTIFICATION\",\"2x2 I.D. PICTURE (2PCS)\",\"ADMEASUREMENTS\"]', '[{\"payment\":\"Cedula\",\"amount\":\"120\",\"qty\":\"1\",\"subtotal\":\"120.00\"},{\"payment\":\"Farm Certification\",\"amount\":\"150\",\"qty\":\"1\",\"subtotal\":\"150.00\"}]'),
(5, 'fg_permit', '[\"CEDULA\",\"FARMC CERTIFICATION\",\"2x2 I.D. PICTURE (2PCS)\"]', '[{\"payment\":\"application form\",\"amount\":\"200\",\"qty\":\"1\",\"subtotal\":\"200.00\"}]'),
(6, 'fv_permit', '', ''),
(7, 'fc_permit', '[\"FISHERY LICENSE I.D\",\"OLD PERMIT (RENEWAL)\"]', '[{\"payment\":\"\",\"amount\":\"\",\"qty\":\"\",\"subtotal\":\"\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `section_head`
--

CREATE TABLE `section_head` (
  `client_id` int(11) NOT NULL,
  `client_gender` varchar(50) NOT NULL,
  `client_fname` varchar(100) NOT NULL,
  `client_mname` varchar(50) NOT NULL,
  `client_lname` varchar(50) NOT NULL,
  `client_dob` date DEFAULT NULL,
  `client_prov` varchar(50) NOT NULL,
  `client_municipal` varchar(50) NOT NULL,
  `client_street` varchar(50) NOT NULL,
  `client_brgy` varchar(50) DEFAULT NULL,
  `client_OR` int(50) DEFAULT NULL,
  `approval_type` varchar(50) NOT NULL,
  `client_role` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_status` char(10) NOT NULL,
  `reason` varchar(200) DEFAULT NULL,
  `row_id` int(11) DEFAULT NULL,
  `row_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section_head`
--

INSERT INTO `section_head` (`client_id`, `client_gender`, `client_fname`, `client_mname`, `client_lname`, `client_dob`, `client_prov`, `client_municipal`, `client_street`, `client_brgy`, `client_OR`, `approval_type`, `client_role`, `u_email`, `u_status`, `reason`, `row_id`, `row_type`) VALUES
(149, 'Male', 'rty', 'rty', 'rty', '0000-00-00', '', '', '', '', 0, 'Fishery License Permit', '', 'rty@gmail.com', '', NULL, 13, 'fisherfolks'),
(151, 'Male', 'james', 'de nero', 'alfred', '0000-00-00', 'davao del norte', 'panabo', '', 'new pandan', 0, 'Fishery License Permit', '', 'alfredjames@gmail.com', '', NULL, 8, 'fisherfolks'),
(165, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(166, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(167, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(168, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(169, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(170, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(172, '', 'asd', 'asda', 'sdasd', '0000-00-00', '', 'sdasdasd', 'asda', 'asdasd', 31313, 'Fishery License Permit', '', 'jameszenoen07@gmail.com', '', NULL, 18, 'fisherfolks'),
(173, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 0, 'fishcage'),
(174, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 0, 'fishcage'),
(175, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 0, 'fishcage'),
(176, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 0, 'fishcage'),
(177, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 0, 'fishcage'),
(178, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 3, 'fishcage'),
(179, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(180, 'Male', 'rty', 'rty', 'rty', '0000-00-00', '', '', '', '', 0, 'Fishery License Permit', '', 'rty@gmail.com', '', NULL, 12, 'fisherfolks'),
(181, '', 'lebron', 'lebron', 'james', NULL, 'p', 'M', 'S', 'B', NULL, 'Permit to Operate', '', 'lebron@gmail.com', '', NULL, 3, 'fishcage'),
(182, '', 'asd', 'asda', 'sdasd', '0000-00-00', '', 'sdasdasd', 'asda', 'asdasd', 31313, 'Fishery License Permit', '', 'jameszenoen07@gmail.com', '', NULL, 18, 'fisherfolks'),
(185, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 3, 'fishcage'),
(188, 'Male', 'jd', 'haohao', 'arries', '2001-10-27', 'davao del norte', 'Panabo', 'prk dugso', 'San Pedro', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 19, 'fisherfolks'),
(189, 'Male', 'rty', 'rty', 'rty', '0000-00-00', '', '', '', '', 0, 'Fishery License Permit', '', 'rty@gmail.com', '', NULL, 13, 'fisherfolks'),
(190, 'Male', 'jd', 'haohao', 'arries', '2001-10-27', 'davao del norte', 'Panabo', 'prk dugso', 'San Pedro', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 19, 'fisherfolks'),
(191, 'Male', 'jd', 'haohao', 'arries', '2001-10-27', 'davao del norte', 'Panabo', 'prk dugso', 'San Pedro', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 19, 'fisherfolks'),
(192, 'Male', 'jd', 'haohao', 'arries', '2001-10-27', 'davao del norte', 'Panabo', 'prk dugso', 'San Pedro', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 19, 'fisherfolks'),
(193, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 7, 'fishcage'),
(194, '', 'asd', 'asda', 'sdasd', '0000-00-00', '', 'sdasdasd', 'asda', 'asdasd', 31313, 'Fishery License Permit', '', 'jameszenoen07@gmail.com', '', NULL, 18, 'fisherfolks'),
(195, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 7, 'fishcage'),
(196, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 7, 'fishcage'),
(199, 'Male', 'Fiona', 'Sullivan', 'Shrek', '1994-10-10', 'davao del norte', 'davao city', 'purok 11', 'buwana', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 21, 'fisherfolks'),
(200, 'Male', 'Fiona', 'Sullivan', 'Shrek', '1994-10-10', 'davao del norte', 'davao city', 'purok 11', 'buwana', 0, 'Fishery License Permit', '', 'fionashrek@gmail.com', '', NULL, 21, 'fisherfolks'),
(201, '', 'qweqwe', 'qweqwe', 'qweqwe', NULL, 'qwe', 'qwe', 'qweqwe', 'qweqwe', NULL, 'Permit to Operate (FishingCage)', '', 'sadjames@gmail.com', '', NULL, 3, 'fishcage');

-- --------------------------------------------------------

--
-- Table structure for table `sent_notifications`
--

CREATE TABLE `sent_notifications` (
  `id` int(11) NOT NULL,
  `row_id` varchar(50) NOT NULL,
  `row_type` varchar(255) NOT NULL,
  `sms_type` varchar(255) NOT NULL,
  `sent_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sent_notifications`
--

INSERT INTO `sent_notifications` (`id`, `row_id`, `row_type`, `sms_type`, `sent_date`) VALUES
(106, '5', 'fisherfolks', 'renewal', '2024-11-10 13:06:06'),
(107, '6', 'fisherfolks', 'expiry', '2024-11-10 13:22:19'),
(132, '10', 'fisherfolks', 'expiry', '2024-11-20 04:11:19'),
(134, '9', 'fisherfolks', 'expiry', '2024-11-20 04:50:32'),
(135, '11', 'licensing', 'expiry', '2024-11-21 09:26:03'),
(137, '11', 'fisherfolks', 'expiry', '2024-11-21 23:28:22'),
(138, '12', 'licensing', 'expiry', '2024-11-21 23:59:08'),
(142, '4', 'fisherfolks', 'expiry', '2024-11-24 15:16:23'),
(144, '5', 'fishinggears', 'renewal', '2024-11-25 07:03:47'),
(145, '15', 'licensing', 'expiry', '2024-11-25 07:04:48'),
(146, '8', 'fisherfolks', 'expiry', '2024-11-25 07:06:25'),
(149, '15', 'fisherfolks', 'renewal', '2024-11-25 23:44:54'),
(150, '14', 'fisherfolks', 'renewal', '2024-11-25 23:45:23'),
(153, '18', 'licensing', 'expiry', '2024-11-27 10:44:40'),
(159, '17', 'fisherfolks', 'renewal', '2024-12-02 09:44:41'),
(161, '6', 'fishinggears', 'renewal', '2024-12-02 10:11:12'),
(162, '198', 'fishworkerlicense', 'renewal', '2024-12-02 10:52:10'),
(164, '4', 'fishcage', 'renewal', '2024-12-02 12:28:05'),
(165, '4', 'fishinggears', 'renewal', '2024-12-02 12:28:34'),
(169, '6', 'fishcage', 'renewal', '2024-12-02 12:51:02'),
(170, '5', 'fishcage', 'renewal', '2024-12-02 12:51:06'),
(175, '2', 'fishingboats', 'renewal', '2024-12-02 13:53:44'),
(176, '16', 'fisherfolks', 'renewal', '2024-12-03 02:03:30'),
(177, '12', 'fisherfolks', 'expiry', '2024-12-03 02:06:20'),
(178, '13', 'fisherfolks', 'expiry', '2024-12-03 02:06:22'),
(180, '7', 'fishinggears', 'renewal', '2024-12-03 03:43:14'),
(181, '8', 'fishinggears', 'renewal', '2024-12-03 04:08:59'),
(183, '199', 'fishworkerlicense', 'renewal', '2024-12-03 07:51:08'),
(184, '18', 'fisherfolks', 'expiry', '2024-12-04 07:01:42'),
(185, '20', 'licensing', 'expiry', '2024-12-04 12:35:48'),
(186, '7', 'fisherfolks', 'renewal', '2024-12-04 20:53:53'),
(187, '1', 'fishingboats', 'renewal', '2024-12-05 02:55:13'),
(188, '0', 'fishcage', 'renewal', '2024-12-05 03:50:35'),
(189, '0', 'fishingboats', 'renewal', '2024-12-05 04:40:42'),
(192, '21', 'licensing', 'expiry', '2024-12-05 05:23:29'),
(194, '22', 'licensing', 'expiry', '2024-12-05 05:34:49'),
(195, '20', 'fisherfolks', 'renewal', '2024-12-05 06:26:49'),
(197, '3', 'fishcage', 'renewal', '2024-12-05 06:54:20'),
(198, '22', 'fisherfolks', 'expiry', '2024-12-05 08:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(255) DEFAULT NULL,
  `u_lname` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_contact` varchar(255) NOT NULL,
  `u_role` varchar(50) DEFAULT NULL,
  `u_prof` varchar(50) DEFAULT NULL,
  `verified` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_fname`, `u_lname`, `u_pass`, `u_email`, `u_contact`, `u_role`, `u_prof`, `verified`) VALUES
(17, 'Dana', 'Vespoli', '123', 'dana@gmail.com', '', 'Section Head', NULL, 0),
(18, 'Zenoen', 'Sullivan', '123', 'zenoen@cagro.plms', '', 'Section Head', NULL, 0),
(19, 'James', 'Dela Norte', '123', 'delanorte@gmail.com', '', 'CAGRO - Administrator', NULL, 0),
(20, 'Jamaica', 'Rosales', '123', 'jammyrosales@gmail.com', '', 'CAGRO - Administrator', NULL, 0),
(23, 'Jhon', 'Smith', '1234', 'johnsmith@gmail.com', '', 'Client', NULL, 1),
(24, 'David', 'Smith', '123', 'david@gmail.com', '', 'Client', NULL, 1),
(25, 'anne', 'lee', '123', 'anne@gmail.com', '', 'Client', NULL, 1),
(26, 'test', 'this', '123', 'test@gmail.com', '', 'Client', NULL, 1),
(27, 'lebron', 'james', '123', 'lebron@gmail.com', '', 'Client', NULL, 1),
(28, 'jasmin', 'jae', '123', 'jae@admin.com', '', 'CAGRO - Administrator', NULL, 0),
(29, 'alfred', 'pennyworth', '123', 'pennyworth@gmail.com', '', 'Client', NULL, 1),
(30, 'James', 'Alfred', '123', 'alfred@gmail.com', '', 'Client', NULL, 0),
(31, 'Aflred', 'James', '123', 'alfredjames@gmail.com', '', 'Client', NULL, 1),
(32, 'ian', 'ian', '123', 'ian@gmail.com', '09364130841', 'Client', NULL, 0),
(33, 'nai', 'nai', '123', 'nai@gmail.com', '09364130941', 'Client', NULL, 0),
(34, 'nai', 'nai', '123', 'nai@gmail.com', '09364130941', 'Client', NULL, 0),
(35, 'nai', 'nai', '123', 'nai@gmail.com', '09364130941', 'Client', NULL, 0),
(36, 'asd', 'asd', '123', 'asd@gmail.com', '09364130841', 'Client', NULL, 0),
(37, 'asd', 'asd', '123', 'asd@gmail.com', '09364130841', 'Client', NULL, 0),
(38, 'dfg', 'dfg', 'dfg', 'dfg@gmail.com', '09364130841', 'Client', NULL, 0),
(39, 'ert', 'ert', 'ert', 'ert@gmail.com', 'ert', 'Client', NULL, 0),
(40, 'asd', 'asd', 'asd', 'asd@gmail.com', '09364130841', 'Client', NULL, 0),
(41, 'rty', 'rty', 'rty', 'rty@gmail.com', '09364130841', 'Client', NULL, 1),
(43, 'Edward', 'Fajarda', '1234', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'Client', NULL, 0),
(44, 'Edward', 'Fajarda', '1234', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'CAGRO - Administrator', NULL, 0),
(45, 'Edward', 'Fajarda', '1234', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'CAGRO - Administrator', NULL, 0),
(46, 'Edward', 'Fajarda', '1234', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'Client', NULL, 0),
(47, 'Edward', 'Fajarda', '123', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'Client', NULL, 0),
(48, 'Edward', 'Fajarda', '123456', 'gingoyon.arnold@dnsc.edu.ph', '09560322106', 'Client', NULL, 0),
(49, 'Edward', 'Fajarda', '123456', 'arn.gingoyon@gmail.com', '09560322106', 'Client', NULL, 0),
(50, 'Edward', 'Fajarda', 'Gymmfamn001*', 'arn.gingoyon@gmail.com', '09560322106', 'Client', NULL, 0),
(51, 'james', 'gwapo', '123', 'gwapoko09@gmail com', '09916603843', 'Client', NULL, 0),
(52, 'james', 'gwapo', '123', 'jayardelgado09@gmail.com', '09916603843', 'Client', NULL, 0),
(53, 'james', 'gwapo', '123', 'jayardelgado09@gmail.com', '09916603843', 'Client', NULL, 0),
(54, 'liza', 'sullivan', '12344', 'liza@gmail.com', '09916603843', 'Section Head', NULL, 0),
(55, 'zenoen', 'sullivan', '123', 'sulivan0907@gmail.com', 'sullivan0907@gmail.com', 'Client', NULL, 0),
(56, 'zenoen', 'sullivan', '123', 'sulivan0907@gmail.com', 'sullivan0907@gmail.com', 'Client', NULL, 0),
(57, 'z3noen', 'sullivan', '123', 'z3noen@gmail.com', '09916603843', 'CAGRO - Administrator', NULL, 0),
(67, 'Dave', 'Daveded', '123', 'dave@gmail.com', '09364130841', 'Client', NULL, 1),
(68, 'Edward', 'Fajarda', '1234', 'arn.gingoyon@gmail.com', '09560322106', 'Client', NULL, 0),
(69, 'zenoen', 'sullivan', '123', 'sullivan0709@gmail.com', '09916603843', 'Client', NULL, 1),
(70, 'Isamael', 'Cruz', 'abcdef', 'gingoyon.arnold@dnsc.edu.ph', '09343737889', 'Client', NULL, 0),
(71, 'zenoen', 'sullivan jr.', '123', 'sullivanjr@gmail.cok', '09916603843', 'Client', NULL, 0),
(72, 'Shimmy', 'Lubrin', '12345', 'shimmy@gmail.com', '09673453636', 'Client', NULL, 0),
(73, 'Zeke', 'Buriman', '123', 'zeke@gmail.com', '09916603843', 'Client', NULL, 1),
(74, 'Ken', 'Samarca', '123', 'kennethsamarca18@gmail.com', '09708821825', 'CAGRO - Administrator', NULL, 0),
(75, 'ANDREA JEAN', 'MIRANDA', 'january2miranda', 'mirandaandreajean@gmail.com', '09153472322', 'Client', NULL, 1),
(76, 'ken', 'sam', '123', 'ken@gmail.com', '09708821812', 'Client', NULL, 1),
(77, 'ken', 'samarca', '123', 'ken@gmail.com', '09708821825', 'Client', NULL, 0),
(78, 'nek', 'sam', 'ken123', 'nek@gmail.com', '09708821825', 'Section Head', NULL, 0),
(79, 'james', 'zenoen', '123', 'jameszenoen07@gmail.com', '099916603843', 'Client', NULL, 1),
(80, 'ahujagd', 'sakljdkhwrkj', '11111111', 'aft.ah@g.com', '12132435', 'CAGRO - Administrator', NULL, 0),
(81, 'GGGG', 'rtreyy', '11111111', 'after@gmail.com', '111', 'CAGRO - Administrator', NULL, 0),
(82, 'mariannie', 'rebortera', '12345678A', 'mariannerebortera@gmail.com', '09234005061', 'Section Head', NULL, 0),
(85, 'asdas', 'asdasd', '$2y$10$HFftOCUZt5X.n0BgS3JU9OtEX6PC.q9sN4uIq2cyRHoU4KQ7javKC', 'sadjames@gmail.com', '33123', 'Client', NULL, 1),
(86, 'admin', 'admin', '$2y$10$HOQMrzfY7GtmGhG4/BRxn.F38eo.TPvO9/votjj3mJUy7.9p7e5rO', 'admin@cagro.com', '11213', 'CAGRO - Administrator', NULL, 0),
(87, 'section', 'head', '$2y$10$9WbqppCL2PGQR8m5I4pETuU7j06gY/XKsc4fnya3c5huLCYMBF812', 'sectionhead@gmail.com', '092131331', 'Section Head', NULL, 0),
(88, 'fiona', 'shrek', '$2y$10$vj1m1tgJFx9j2G0fMaZDiuqhRizSq8gDU3IKjX4ok4g.koo6uq9rG', 'fionashrek@gmail.com', '09245563765', 'Client', NULL, 1),
(89, 'ken', 'sam', '$2y$10$L6utq0Cv3BlpWAwoaOnQm.olRJiup/tRPC0Pl/c2GdEpGr/o8VsWW', 'del@gmail.com', '0970882135', 'Client', NULL, 1),
(90, 'Mary Grace', 'Piatoss', '$2y$10$mtRN813VOUtNMDTu0o8n.evdGv7b25TM79IvN12dl5gZs/Ofxg.eu', 'mary@gmail.com', '09626932606', 'Client', NULL, 1),
(91, 'Sara', 'Duterte', '$2y$10$l5eU9CwasCKj1fW.2WqS3eIMNbAZZiyRLPAAlG29.j36AXVLac3f6', 'sarad@gmail.com', '09560322106', 'Section Head', NULL, 0),
(92, 'pau', 'arries', '$2y$10$4CfPQflQ62HHCS8VBvJ5wei.5EP3fdRGcebIpOAciRdcYUt2FfrZa', 'pauarries@gmail.com', '09289970598', 'Section Head', NULL, 0),
(93, 'Nelma Mae', 'Loja', '$2y$10$inCaCTBBdAw3aCi9J8oN6.QLcQZlPmASsEaMIoiSmBvfs86Wg/6J2', 'nelmaloja@gmail.com', '09469433174', 'Client', NULL, 0),
(94, 'Jochelle', 'Arries', '$2y$10$UBwQkf7Z1.KaA2VX/LEEuOJXYIVNgShVYUSVUiP6rfma51xjMsIZS', 'Chellearries@gmail.com', '09289970598', 'Client', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishcage`
--
ALTER TABLE `fishcage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fisherfolks`
--
ALTER TABLE `fisherfolks`
  ADD PRIMARY KEY (`ff_id`);

--
-- Indexes for table `fishingboats`
--
ALTER TABLE `fishingboats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fishinggears`
--
ALTER TABLE `fishinggears`
  ADD PRIMARY KEY (`fg_id`);

--
-- Indexes for table `fishworkerlicense`
--
ALTER TABLE `fishworkerlicense`
  ADD PRIMARY KEY (`fw_id`);

--
-- Indexes for table `licensing`
--
ALTER TABLE `licensing`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  ADD PRIMARY KEY (`loc_id`),
  ADD KEY `fw_id` (`fw_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`not_id`);

--
-- Indexes for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `requirementfees`
--
ALTER TABLE `requirementfees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_head`
--
ALTER TABLE `section_head`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `sent_notifications`
--
ALTER TABLE `sent_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `fishcage`
--
ALTER TABLE `fishcage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fisherfolks`
--
ALTER TABLE `fisherfolks`
  MODIFY `ff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `fishingboats`
--
ALTER TABLE `fishingboats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fishinggears`
--
ALTER TABLE `fishinggears`
  MODIFY `fg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fishworkerlicense`
--
ALTER TABLE `fishworkerlicense`
  MODIFY `fw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `licensing`
--
ALTER TABLE `licensing`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  MODIFY `loc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `requirementfees`
--
ALTER TABLE `requirementfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `section_head`
--
ALTER TABLE `section_head`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `sent_notifications`
--
ALTER TABLE `sent_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `locatorinvestor`
--
ALTER TABLE `locatorinvestor`
  ADD CONSTRAINT `locatorinvestor_ibfk_1` FOREIGN KEY (`fw_id`) REFERENCES `fishworkerlicense` (`fw_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `otp_verifications`
--
ALTER TABLE `otp_verifications`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
