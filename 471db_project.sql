-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 11:09 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `471db_project`
--
CREATE DATABASE IF NOT EXISTS `471db_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `471db_project`;

-- --------------------------------------------------------

--
-- Table structure for table `cleaners`
--
-- Creation: Nov 16, 2019 at 01:59 AM
--

DROP TABLE IF EXISTS `cleaners`;
CREATE TABLE IF NOT EXISTS `cleaners` (
  `SIN` varchar(11) NOT NULL,
  `hourly_rate` decimal(6,4) NOT NULL,
  UNIQUE KEY `SIN` (`SIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `cleaners`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Truncate table before insert `cleaners`
--

TRUNCATE TABLE `cleaners`;
-- --------------------------------------------------------

--
-- Table structure for table `company`
--
-- Creation: Nov 14, 2019 at 05:20 AM
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `C_ID` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rep_num` smallint(6) NOT NULL,
  UNIQUE KEY `C_ID` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `company`:
--   `C_ID`
--       `customers` -> `ID`
--

--
-- Truncate table before insert `company`
--

TRUNCATE TABLE `company`;
-- --------------------------------------------------------

--
-- Table structure for table `contract`
--
-- Creation: Nov 14, 2019 at 05:01 AM
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `number` smallint(6) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `fee` decimal(4,4) NOT NULL,
  `service_type` varchar(10) NOT NULL,
  `num_hours` tinyint(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `Est_num` smallint(6) NOT NULL,
  `C_id` smallint(4) NOT NULL,
  PRIMARY KEY (`number`),
  KEY `contract_est_fk` (`Est_num`),
  KEY `contract_cust_fk` (`C_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `contract`:
--   `C_id`
--       `customers` -> `ID`
--   `Est_num`
--       `estimate` -> `number`
--

--
-- Truncate table before insert `contract`
--

TRUNCATE TABLE `contract`;
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Nov 14, 2019 at 05:15 AM
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `ID` smallint(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(30) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `street` varchar(25) NOT NULL,
  `postal_code` varchar(9) NOT NULL,
  `city` varchar(25) NOT NULL,
  `province` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `pwd` (`pwd`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `customers`:
--

--
-- Truncate table before insert `customers`
--

TRUNCATE TABLE `customers`;
-- --------------------------------------------------------

--
-- Table structure for table `department`
--
-- Creation: Nov 14, 2019 at 05:30 AM
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `number` tinyint(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `department`:
--

--
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
-- --------------------------------------------------------

--
-- Table structure for table `dept_locations`
--
-- Creation: Nov 14, 2019 at 05:32 AM
--

DROP TABLE IF EXISTS `dept_locations`;
CREATE TABLE IF NOT EXISTS `dept_locations` (
  `Dnum` tinyint(4) NOT NULL,
  `location` varchar(25) NOT NULL,
  KEY `dept_deptloc_fk` (`Dnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `dept_locations`:
--   `Dnum`
--       `department` -> `number`
--

--
-- Truncate table before insert `dept_locations`
--

TRUNCATE TABLE `dept_locations`;
-- --------------------------------------------------------

--
-- Table structure for table `employee`
--
-- Creation: Nov 16, 2019 at 01:59 AM
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `SIN` varchar(11) NOT NULL,
  `Id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `user_type` char(1) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'Other',
  `f_name` varchar(15) NOT NULL,
  `m_name` char(1) DEFAULT NULL,
  `l_name` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `city` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `job_type` varchar(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `Dnum` tinyint(6) NOT NULL,
  PRIMARY KEY (`SIN`),
  UNIQUE KEY `Id` (`Id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `emp_dep_fk` (`Dnum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `employee`:
--   `Dnum`
--       `department` -> `number`
--

--
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--
-- Creation: Nov 14, 2019 at 05:38 AM
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `Id` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL,
  `D_num` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `equ_dep_fk` (`D_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `equipment`:
--   `D_num`
--       `department` -> `number`
--

--
-- Truncate table before insert `equipment`
--

TRUNCATE TABLE `equipment`;
-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--
-- Creation: Nov 14, 2019 at 05:09 AM
--

DROP TABLE IF EXISTS `estimate`;
CREATE TABLE IF NOT EXISTS `estimate` (
  `number` smallint(6) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Undefined',
  `hours` tinyint(4) NOT NULL,
  `cost` decimal(6,4) NOT NULL,
  `service_type` varchar(15) NOT NULL,
  `D_num` tinyint(4) NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `estimate`:
--

--
-- Truncate table before insert `estimate`
--

TRUNCATE TABLE `estimate`;
-- --------------------------------------------------------

--
-- Table structure for table `has_reservation`
--
-- Creation: Nov 16, 2019 at 02:02 AM
--

DROP TABLE IF EXISTS `has_reservation`;
CREATE TABLE IF NOT EXISTS `has_reservation` (
  `CL_SIN` varchar(11) NOT NULL,
  `SR_num` smallint(6) NOT NULL,
  `hours` tinyint(4) NOT NULL,
  KEY `has_res_cl_fk` (`CL_SIN`),
  KEY `has_res_sr_fk` (`SR_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `has_reservation`:
--   `CL_SIN`
--       `cleaners` -> `SIN`
--   `SR_num`
--       `special_res` -> `number`
--

--
-- Truncate table before insert `has_reservation`
--

TRUNCATE TABLE `has_reservation`;
-- --------------------------------------------------------

--
-- Table structure for table `it`
--
-- Creation: Nov 14, 2019 at 04:27 AM
--

DROP TABLE IF EXISTS `it`;
CREATE TABLE IF NOT EXISTS `it` (
  `SIN` varchar(9) NOT NULL,
  `salary` decimal(8,4) NOT NULL,
  UNIQUE KEY `SIN` (`SIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `it`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Truncate table before insert `it`
--

TRUNCATE TABLE `it`;
-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--
-- Creation: Nov 16, 2019 at 02:00 AM
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE IF NOT EXISTS `maintenance` (
  `SIN` varchar(11) NOT NULL,
  `Salary` double(8,4) NOT NULL,
  UNIQUE KEY `SIN` (`SIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `maintenance`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Truncate table before insert `maintenance`
--

TRUNCATE TABLE `maintenance`;
-- --------------------------------------------------------

--
-- Table structure for table `offered_locations`
--
-- Creation: Nov 14, 2019 at 05:44 AM
--

DROP TABLE IF EXISTS `offered_locations`;
CREATE TABLE IF NOT EXISTS `offered_locations` (
  `S_ID` smallint(4) NOT NULL,
  `locations` varchar(30) NOT NULL,
  KEY `off_loc_serv_fk` (`S_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `offered_locations`:
--   `S_ID`
--       `services` -> `Id`
--

--
-- Truncate table before insert `offered_locations`
--

TRUNCATE TABLE `offered_locations`;
-- --------------------------------------------------------

--
-- Table structure for table `requested_building`
--
-- Creation: Nov 14, 2019 at 05:24 AM
--

DROP TABLE IF EXISTS `requested_building`;
CREATE TABLE IF NOT EXISTS `requested_building` (
  `C_ID` smallint(6) NOT NULL,
  `type` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  KEY `req_bd_cust_fk` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `requested_building`:
--   `C_ID`
--       `customers` -> `ID`
--

--
-- Truncate table before insert `requested_building`
--

TRUNCATE TABLE `requested_building`;
-- --------------------------------------------------------

--
-- Table structure for table `residential`
--
-- Creation: Nov 14, 2019 at 05:27 AM
--

DROP TABLE IF EXISTS `residential`;
CREATE TABLE IF NOT EXISTS `residential` (
  `C_ID` smallint(6) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'other',
  UNIQUE KEY `C_ID` (`C_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `residential`:
--   `C_ID`
--       `customers` -> `ID`
--

--
-- Truncate table before insert `residential`
--

TRUNCATE TABLE `residential`;
-- --------------------------------------------------------

--
-- Table structure for table `sales associate`
--
-- Creation: Nov 16, 2019 at 02:00 AM
--

DROP TABLE IF EXISTS `sales associate`;
CREATE TABLE IF NOT EXISTS `sales associate` (
  `SIN` varchar(11) NOT NULL,
  `salary` double(8,4) NOT NULL,
  `num_sales` int(3) NOT NULL,
  UNIQUE KEY `SIN` (`SIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sales associate`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Truncate table before insert `sales associate`
--

TRUNCATE TABLE `sales associate`;
-- --------------------------------------------------------

--
-- Table structure for table `services`
--
-- Creation: Nov 14, 2019 at 05:44 AM
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `Id` smallint(6) NOT NULL,
  `type` varchar(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `D_num` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `ser_dep_fk` (`D_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `services`:
--   `D_num`
--       `department` -> `number`
--

--
-- Truncate table before insert `services`
--

TRUNCATE TABLE `services`;
-- --------------------------------------------------------

--
-- Table structure for table `special_res`
--
-- Creation: Nov 14, 2019 at 04:51 AM
--

DROP TABLE IF EXISTS `special_res`;
CREATE TABLE IF NOT EXISTS `special_res` (
  `number` smallint(6) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Undefined',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comments` text DEFAULT NULL,
  `C_id` smallint(4) NOT NULL,
  PRIMARY KEY (`number`),
  KEY `sr_cust_fk` (`C_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `special_res`:
--   `C_id`
--       `customers` -> `ID`
--

--
-- Truncate table before insert `special_res`
--

TRUNCATE TABLE `special_res`;
-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
-- Creation: Nov 14, 2019 at 05:37 AM
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE IF NOT EXISTS `supplies` (
  `Id` smallint(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `ordered_date` date NOT NULL,
  `D_num` tinyint(4) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `supplies`:
--

--
-- Truncate table before insert `supplies`
--

TRUNCATE TABLE `supplies`;
-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--
-- Creation: Nov 16, 2019 at 02:01 AM
--

DROP TABLE IF EXISTS `works_on`;
CREATE TABLE IF NOT EXISTS `works_on` (
  `CL_SIN` varchar(11) NOT NULL,
  `Contr_num` smallint(4) NOT NULL,
  `hours` tinyint(4) NOT NULL,
  KEY `workson_cl_fk` (`CL_SIN`),
  KEY `workson_contr_fk` (`Contr_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `works_on`:
--   `CL_SIN`
--       `cleaners` -> `SIN`
--   `Contr_num`
--       `contract` -> `number`
--

--
-- Truncate table before insert `works_on`
--

TRUNCATE TABLE `works_on`;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD CONSTRAINT `inheritance` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `inheritance_cust` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_cust_fk` FOREIGN KEY (`C_id`) REFERENCES `customers` (`ID`),
  ADD CONSTRAINT `contract_est_fk` FOREIGN KEY (`Est_num`) REFERENCES `estimate` (`number`);

--
-- Constraints for table `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD CONSTRAINT `dept_deptloc_fk` FOREIGN KEY (`Dnum`) REFERENCES `department` (`number`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `emp_dep_fk` FOREIGN KEY (`Dnum`) REFERENCES `department` (`number`);

--
-- Constraints for table `equipment`
--
ALTER TABLE `equipment`
  ADD CONSTRAINT `equ_dep_fk` FOREIGN KEY (`D_num`) REFERENCES `department` (`number`);

--
-- Constraints for table `has_reservation`
--
ALTER TABLE `has_reservation`
  ADD CONSTRAINT `has_res_cl_fk` FOREIGN KEY (`CL_SIN`) REFERENCES `cleaners` (`SIN`),
  ADD CONSTRAINT `has_res_sr_fk` FOREIGN KEY (`SR_num`) REFERENCES `special_res` (`number`);

--
-- Constraints for table `it`
--
ALTER TABLE `it`
  ADD CONSTRAINT `inheritance3` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `inheritance2` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

--
-- Constraints for table `offered_locations`
--
ALTER TABLE `offered_locations`
  ADD CONSTRAINT `off_loc_serv_fk` FOREIGN KEY (`S_ID`) REFERENCES `services` (`Id`);

--
-- Constraints for table `requested_building`
--
ALTER TABLE `requested_building`
  ADD CONSTRAINT `req_bd_cust_fk` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `residential`
--
ALTER TABLE `residential`
  ADD CONSTRAINT `inheritance_cust2` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `sales associate`
--
ALTER TABLE `sales associate`
  ADD CONSTRAINT `inheritance4` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `ser_dep_fk` FOREIGN KEY (`D_num`) REFERENCES `department` (`number`);

--
-- Constraints for table `special_res`
--
ALTER TABLE `special_res`
  ADD CONSTRAINT `sr_cust_fk` FOREIGN KEY (`C_id`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `works_on`
--
ALTER TABLE `works_on`
  ADD CONSTRAINT `workson_cl_fk` FOREIGN KEY (`CL_SIN`) REFERENCES `cleaners` (`SIN`),
  ADD CONSTRAINT `workson_contr_fk` FOREIGN KEY (`Contr_num`) REFERENCES `contract` (`number`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table cleaners
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table company
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table contract
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table customers
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table department
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table dept_locations
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table employee
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table equipment
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table estimate
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table has_reservation
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table it
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table maintenance
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table offered_locations
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table requested_building
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table residential
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table sales associate
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table services
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table special_res
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table supplies
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for table works_on
--
-- Error reading data for table phpmyadmin.pma__column_info: #1100 - Table 'pma__column_info' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__table_uiprefs: #1100 - Table 'pma__table_uiprefs' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__tracking: #1100 - Table 'pma__tracking' was not locked with LOCK TABLES

--
-- Metadata for database 471db_project
--
-- Error reading data for table phpmyadmin.pma__bookmark: #1100 - Table 'pma__bookmark' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__relation: #1100 - Table 'pma__relation' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__savedsearches: #1100 - Table 'pma__savedsearches' was not locked with LOCK TABLES
-- Error reading data for table phpmyadmin.pma__central_columns: #1100 - Table 'pma__central_columns' was not locked with LOCK TABLES
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
