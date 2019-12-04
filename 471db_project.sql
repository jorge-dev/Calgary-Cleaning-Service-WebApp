-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2019 at 04:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

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
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `cleaners`;
CREATE TABLE `cleaners` (
  `SIN` varchar(11) NOT NULL,
  `hourly_rate` decimal(7,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `cleaners`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Dumping data for table `cleaners`
--

INSERT INTO `cleaners` (`SIN`, `hourly_rate`) VALUES
('333-333-333', '100.2500'),
('354-852-487', '458.3000');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `C_ID` mediumint(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rep_num` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `company`:
--   `C_ID`
--       `customers` -> `ID`
--

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`C_ID`, `name`, `rep_num`) VALUES
(943827, 'Cement Co.', 15547);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--
-- Creation: Dec 04, 2019 at 03:56 AM
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract` (
  `number` smallint(6) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `fee` decimal(4,4) NOT NULL,
  `service_type` varchar(10) NOT NULL,
  `num_hours` tinyint(4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `Est_num` smallint(6) NOT NULL,
  `C_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `contract`:
--   `C_id`
--       `customers` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Dec 03, 2019 at 10:05 PM
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `ID` mediumint(9) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` longtext NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `phone_num` varchar(15) DEFAULT NULL,
  `type` varchar(15) NOT NULL,
  `street` varchar(25) NOT NULL,
  `postal_code` varchar(9) NOT NULL,
  `city` varchar(25) NOT NULL,
  `province` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `customers`:
--

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `username`, `pwd`, `user_type`, `phone_num`, `type`, `street`, `postal_code`, `city`, `province`, `email`) VALUES
(943827, 'cement78', '$2y$10$AI.afhhddTE2nXQGihyDyO8jJo0HF7AR5GQcHM618TW8PepaHL5Q.', 'customer', '145-789-9999', 'Company', 'Los Pinos Blvd', 'T2A6N9', 'Calgary', 'AB', 'cement@m.com'),
(6541839, 'mick94', '$2y$10$oWWoJZqHmREW/N2eYNygrefXfCpzAZkCtJ1hFizFUm6aN8LjhKAgu', 'customer', '159-789-6985', 'Residential', '76 Barlow Tr', 't3k4y7', 'Calgary', 'AB', 'mick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `number` tinyint(4) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `department`:
--

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`number`, `name`) VALUES
(1, 'Cleaner Operations'),
(2, 'Sales'),
(3, 'IT'),
(4, 'Maintenance'),
(5, 'Finance'),
(6, 'Marketing'),
(7, 'Management');

-- --------------------------------------------------------

--
-- Table structure for table `dept_locations`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `dept_locations`;
CREATE TABLE `dept_locations` (
  `Dnum` tinyint(4) NOT NULL,
  `location` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `dept_locations`:
--   `Dnum`
--       `department` -> `number`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `SIN` varchar(11) NOT NULL,
  `Id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pwd` longtext NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'Other',
  `f_name` varchar(15) NOT NULL,
  `m_name` varchar(15) DEFAULT NULL,
  `l_name` varchar(30) NOT NULL,
  `street` varchar(30) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `city` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `job_type` varchar(11) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `Dnum` tinyint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `employee`:
--   `Dnum`
--       `department` -> `number`
--

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`SIN`, `Id`, `username`, `pwd`, `user_type`, `gender`, `f_name`, `m_name`, `l_name`, `street`, `postal_code`, `city`, `birth_date`, `job_type`, `email`, `phone_num`, `start_date`, `Dnum`) VALUES
('111-111-111', '7538902', 'dougCos', '$2y$10$vkXqWrOOrZ6WOKaiDqBnDuOy8tyt/A3UcUCFdcJpOhG6SdC4NSlCq', 'employee', 'Male', 'Douglas', NULL, 'Costa', '54 PineWood Tr', 't4e7d8', 'Calgary', '1987-08-07', 'employee', 'dougcos@gmail.com', '159-888-7411', '2018-09-23', NULL),
('222-222-222', '3516928', 'micMac', '$2y$10$SEhOFJuSg6Hy/cbCl5UcteQwSkONWa1QvEzfdgg5/G/xL/HmkP.lK', 'admin', 'Male', 'Michael', NULL, 'McAdams', '56 Laguna Way', 't4h7f5', 'Calgary', '1987-08-07', 'admin', 'micmc@me.com', '159-852-7896', '2018-09-23', 3),
('333-333-333', '9520748', 'dav85', '$2y$10$1jYLqC7Sh48hQyKT9JGKWOw8FYf0m88BZ8NAH7ikj/oWtLtxwAenK', 'employee', 'Male', 'David', NULL, 'Pope', '231 University Dr', 't7r4e8', 'Calgary', '1987-08-07', 'cleaner', 'davidpope@me.com', '412-985-9999', '2018-09-23', 1),
('354-852-487', '5410298', 'as', '$2y$10$xwlwx04pVFTIW2Bso0pbxO7dtje2hntVokQju.F5m9tzAznRhSk6W', 'employee', 'Male', 'alfred', NULL, 'Diaz', 'sd sdsd', 'T2A6N9', 'Calgary', '2005-12-15', 'cleaner', 'as@mer.com', '159-877-5211', '2018-09-23', 1),
('444-444-444', '1476958', 'merlin67', '$2y$10$qrWuRKhUvINm78cFfuCdOuIqapVx1v45UKoT9DEVSZNpZLVQxOx92', 'employee', 'Other', 'Merlin', NULL, 'Binge', '1234 1st Street', 't4f8d5', 'Calgary', '1987-08-07', 'sales', 'merlin@me.com', '145-874-8588', '2015-01-30', 2),
('555-555-555', '9261045', 'karl32', '$2y$10$TooK0TrPwsO9fCGPzvDeS.Qz0UwE3tPpucLkMiYv4HR4CbrVLPZlq', 'employee', 'Male', 'karl', NULL, 'marx', '1234 Main St', 't4f7e5', 'Calgary', '1987-08-07', 'maintenance', 'karlmarx@me.com', '154-852-9854', '2015-09-09', 4);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `Id` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL,
  `D_num` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `equipment`:
--   `D_num`
--       `department` -> `number`
--

-- --------------------------------------------------------

--
-- Table structure for table `has_reservation`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `has_reservation`;
CREATE TABLE `has_reservation` (
  `CL_SIN` varchar(11) NOT NULL,
  `SR_num` smallint(6) NOT NULL,
  `hours` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `has_reservation`:
--   `CL_SIN`
--       `cleaners` -> `SIN`
--   `SR_num`
--       `special_res` -> `number`
--

-- --------------------------------------------------------

--
-- Table structure for table `it`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `it`;
CREATE TABLE `it` (
  `SIN` varchar(11) NOT NULL,
  `salary` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `it`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Dumping data for table `it`
--

INSERT INTO `it` (`SIN`, `salary`) VALUES
('222-222-222', '1547.2350');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `maintenance`;
CREATE TABLE `maintenance` (
  `SIN` varchar(11) NOT NULL,
  `Salary` double(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `maintenance`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`SIN`, `Salary`) VALUES
('555-555-555', 5478.3650);

-- --------------------------------------------------------

--
-- Table structure for table `offered_locations`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `offered_locations`;
CREATE TABLE `offered_locations` (
  `S_ID` smallint(4) NOT NULL,
  `locations` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `offered_locations`:
--   `S_ID`
--       `services` -> `Id`
--

-- --------------------------------------------------------

--
-- Table structure for table `other_employee`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `other_employee`;
CREATE TABLE `other_employee` (
  `SIN` varchar(11) NOT NULL,
  `salary` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `other_employee`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Dumping data for table `other_employee`
--

INSERT INTO `other_employee` (`SIN`, `salary`) VALUES
('111-111-111', '15954.1250');

-- --------------------------------------------------------

--
-- Table structure for table `requested_building`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `requested_building`;
CREATE TABLE `requested_building` (
  `C_ID` mediumint(9) NOT NULL,
  `type` varchar(15) NOT NULL,
  `city` varchar(20) NOT NULL,
  `street` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal_code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `requested_building`:
--   `C_ID`
--       `customers` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `residential`;
CREATE TABLE `residential` (
  `C_ID` mediumint(9) NOT NULL,
  `f_name` varchar(15) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL DEFAULT 'other'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `residential`:
--   `C_ID`
--       `customers` -> `ID`
--

--
-- Dumping data for table `residential`
--

INSERT INTO `residential` (`C_ID`, `f_name`, `l_name`, `gender`) VALUES
(6541839, 'Michael', 'Medina', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `sales associate`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `sales associate`;
CREATE TABLE `sales associate` (
  `SIN` varchar(11) NOT NULL,
  `salary` double(10,4) NOT NULL,
  `num_sales` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `sales associate`:
--   `SIN`
--       `employee` -> `SIN`
--

--
-- Dumping data for table `sales associate`
--

INSERT INTO `sales associate` (`SIN`, `salary`, `num_sales`) VALUES
('444-444-444', 6587.2540, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `Id` smallint(6) NOT NULL,
  `type` varchar(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL,
  `D_num` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `services`:
--   `D_num`
--       `department` -> `number`
--

-- --------------------------------------------------------

--
-- Table structure for table `special_res`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `special_res`;
CREATE TABLE `special_res` (
  `number` smallint(6) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Undefined',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comments` text DEFAULT NULL,
  `C_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `special_res`:
--   `C_id`
--       `customers` -> `ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `Id` smallint(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `qty` smallint(6) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `ordered_date` date NOT NULL,
  `D_num` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `supplies`:
--

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--
-- Creation: Dec 02, 2019 at 09:35 PM
--

DROP TABLE IF EXISTS `works_on`;
CREATE TABLE `works_on` (
  `CL_SIN` varchar(11) NOT NULL,
  `Contr_num` smallint(4) NOT NULL,
  `hours` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `works_on`:
--   `CL_SIN`
--       `cleaners` -> `SIN`
--   `Contr_num`
--       `contract` -> `number`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cleaners`
--
ALTER TABLE `cleaners`
  ADD UNIQUE KEY `SIN` (`SIN`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD UNIQUE KEY `C_ID` (`C_ID`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`number`),
  ADD KEY `contract_est_fk` (`Est_num`),
  ADD KEY `contract_cust_fk` (`C_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `dept_locations`
--
ALTER TABLE `dept_locations`
  ADD KEY `dept_deptloc_fk` (`Dnum`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`SIN`),
  ADD UNIQUE KEY `Id` (`Id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `emp_dep_fk` (`Dnum`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `equ_dep_fk` (`D_num`);

--
-- Indexes for table `has_reservation`
--
ALTER TABLE `has_reservation`
  ADD KEY `has_res_cl_fk` (`CL_SIN`),
  ADD KEY `has_res_sr_fk` (`SR_num`);

--
-- Indexes for table `it`
--
ALTER TABLE `it`
  ADD UNIQUE KEY `SIN` (`SIN`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD UNIQUE KEY `SIN` (`SIN`);

--
-- Indexes for table `offered_locations`
--
ALTER TABLE `offered_locations`
  ADD KEY `off_loc_serv_fk` (`S_ID`);

--
-- Indexes for table `other_employee`
--
ALTER TABLE `other_employee`
  ADD PRIMARY KEY (`SIN`);

--
-- Indexes for table `requested_building`
--
ALTER TABLE `requested_building`
  ADD KEY `req_bd_cust_fk` (`C_ID`);

--
-- Indexes for table `residential`
--
ALTER TABLE `residential`
  ADD UNIQUE KEY `C_ID` (`C_ID`);

--
-- Indexes for table `sales associate`
--
ALTER TABLE `sales associate`
  ADD UNIQUE KEY `SIN` (`SIN`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ser_dep_fk` (`D_num`);

--
-- Indexes for table `special_res`
--
ALTER TABLE `special_res`
  ADD PRIMARY KEY (`number`),
  ADD KEY `sr_cust_fk` (`C_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD KEY `workson_cl_fk` (`CL_SIN`),
  ADD KEY `workson_contr_fk` (`Contr_num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `number` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `inheritance_cust` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_cust_fk` FOREIGN KEY (`C_id`) REFERENCES `customers` (`ID`);

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
  ADD CONSTRAINT `inheritance3` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `other_employee`
--
ALTER TABLE `other_employee`
  ADD CONSTRAINT `inheritance_otherEmp` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

--
-- Constraints for table `requested_building`
--
ALTER TABLE `requested_building`
  ADD CONSTRAINT `req_bd_cust_fk` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`);

--
-- Constraints for table `residential`
--
ALTER TABLE `residential`
  ADD CONSTRAINT `inheritance_cust2` FOREIGN KEY (`C_ID`) REFERENCES `customers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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

--
-- Metadata for table company
--

--
-- Metadata for table contract
--

--
-- Metadata for table customers
--

--
-- Metadata for table department
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', '471db_project', 'department', '{\"sorted_col\":\"`department`.`number` ASC\"}', '2019-11-21 10:34:58');

--
-- Metadata for table dept_locations
--

--
-- Metadata for table employee
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', '471db_project', 'employee', '{\"CREATE_TIME\":\"2019-11-21 23:15:47\"}', '2019-11-25 21:41:32');

--
-- Metadata for table equipment
--

--
-- Metadata for table has_reservation
--

--
-- Metadata for table it
--

--
-- Metadata for table maintenance
--

--
-- Metadata for table offered_locations
--

--
-- Metadata for table other_employee
--

--
-- Metadata for table requested_building
--

--
-- Metadata for table residential
--

--
-- Metadata for table sales associate
--

--
-- Metadata for table services
--

--
-- Metadata for table special_res
--

--
-- Metadata for table supplies
--

--
-- Metadata for table works_on
--

--
-- Metadata for database 471db_project
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
