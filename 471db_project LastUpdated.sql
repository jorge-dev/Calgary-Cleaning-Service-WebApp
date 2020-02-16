
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 07:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

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
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `cleaners`
--

TRUNCATE TABLE `cleaners`;
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
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `company`
--

TRUNCATE TABLE `company`;
--
-- Dumping data for table `company`
--

INSERT INTO `company` (`C_ID`, `name`, `rep_num`) VALUES
(943827, 'Cement Co.', 15547);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--
-- Creation: Dec 06, 2019 at 04:36 PM
-- Last update: Dec 06, 2019 at 06:49 PM
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE `contract` (
  `number` smallint(6) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `fee` decimal(10,4) NOT NULL,
  `service_type` varchar(30) NOT NULL,
  `num_hours` tinyint(4) NOT NULL,
  `status` varchar(30) NOT NULL,
  `C_id` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `contract`:
--   `C_id`
--       `customers` -> `ID`
--

--
-- Truncate table before insert `contract`
--

TRUNCATE TABLE `contract`;
--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`number`, `start_date`, `end_date`, `fee`, `service_type`, `num_hours`, `status`, `C_id`) VALUES
(32, '2019-11-03', '2019-11-05', '1.0000', 'Dry Clean', 5, 'Active', 943827),
(55, '2019-03-30', '2019-04-05', '1.0000', 'Back Scrub', 45, 'Active', 3156879),
(70, '2019-09-09', '2019-09-10', '25.5000', 'jorge', 12, 'in stock', 943827),
(73, '2019-09-09', '2019-09-10', '56.0000', 'cleaning', 12, 'toots', 943827),
(154, '2012-08-08', '2012-08-08', '26.0000', 'clean', 12, 'active', 943827);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `customers`
--

TRUNCATE TABLE `customers`;
--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `username`, `pwd`, `user_type`, `phone_num`, `type`, `street`, `postal_code`, `city`, `province`, `email`) VALUES
(943827, 'cement78', '$2y$10$AI.afhhddTE2nXQGihyDyO8jJo0HF7AR5GQcHM618TW8PepaHL5Q.', 'customer', '145-789-9999', 'Company', 'Los Pinos Blvd', 'T2A6N9', 'Calgary', 'AB', 'cement@m.com'),
(3156879, 'cake16', '$2y$10$Ip3a2MxTM5Wp2b/8eG8QuuLbaWNiw.qcJGNLLl655nDVFzq513l0e', 'customer', '403-678-4949', 'Residential', '1234 NorthWay Street NW', 'T3K6H3', 'Calgary', 'AB', 'cake16@gmail.com'),
(6541839, 'mick94', '$2y$10$oWWoJZqHmREW/N2eYNygrefXfCpzAZkCtJ1hFizFUm6aN8LjhKAgu', 'customer', '159-789-6985', 'Residential', '76 Barlow Tr', 't3k4y7', 'Calgary', 'AB', 'mick@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `department`
--

TRUNCATE TABLE `department`;
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
-- Creation: Dec 06, 2019 at 01:31 AM
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

--
-- Truncate table before insert `dept_locations`
--

TRUNCATE TABLE `dept_locations`;
-- --------------------------------------------------------

--
-- Table structure for table `employee`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `employee`
--

TRUNCATE TABLE `employee`;
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
-- Creation: Dec 06, 2019 at 01:31 AM
-- Last update: Dec 06, 2019 at 08:58 AM
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `Id` smallint(6) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(35) NOT NULL,
  `status` varchar(15) NOT NULL,
  `D_num` tinyint(4) DEFAULT NULL
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
--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`Id`, `description`, `name`, `status`, `D_num`) VALUES
(6, 'jorge', 'Avila', 'Sanchez', 4),
(12, 'mick', 'jajaiu', 'toots', 1),
(13, 'erer', 'erer', 'toots', 2),
(14, 'erer', 'erer', 'toots', 2),
(18, 'dfgbdfgb', 'bbbb', 'gggg', 4),
(19, '4edfgdfgb', 'dfgbdfgb', 'dfgbbbbb', 5),
(20, 't534t', '34t', 'tt', 4);

-- --------------------------------------------------------

--
-- Table structure for table `has_reservation`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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

--
-- Truncate table before insert `has_reservation`
--

TRUNCATE TABLE `has_reservation`;
-- --------------------------------------------------------

--
-- Table structure for table `it`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `it`
--

TRUNCATE TABLE `it`;
--
-- Dumping data for table `it`
--

INSERT INTO `it` (`SIN`, `salary`) VALUES
('222-222-222', '1547.2350');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `maintenance`
--

TRUNCATE TABLE `maintenance`;
--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`SIN`, `Salary`) VALUES
('555-555-555', 5478.3650);

-- --------------------------------------------------------

--
-- Table structure for table `other_employee`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `other_employee`
--

TRUNCATE TABLE `other_employee`;
--
-- Dumping data for table `other_employee`
--

INSERT INTO `other_employee` (`SIN`, `salary`) VALUES
('111-111-111', '15954.1250');

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `residential`
--

TRUNCATE TABLE `residential`;
--
-- Dumping data for table `residential`
--

INSERT INTO `residential` (`C_ID`, `f_name`, `l_name`, `gender`) VALUES
(3156879, 'Chris', 'Chen', 'Male'),
(6541839, 'Michael', 'Medina', 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `sales associate`
--
-- Creation: Dec 06, 2019 at 01:31 AM
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
-- Truncate table before insert `sales associate`
--

TRUNCATE TABLE `sales associate`;
--
-- Dumping data for table `sales associate`
--

INSERT INTO `sales associate` (`SIN`, `salary`, `num_sales`) VALUES
('444-444-444', 6587.2540, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--
-- Creation: Dec 06, 2019 at 01:31 AM
-- Last update: Dec 06, 2019 at 05:43 PM
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

--
-- Truncate table before insert `services`
--

TRUNCATE TABLE `services`;
--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Id`, `type`, `name`, `status`, `D_num`) VALUES
(2, 'pp', 'pp', 'pp', 2);

-- --------------------------------------------------------

--
-- Table structure for table `special_res`
--
-- Creation: Dec 06, 2019 at 01:35 AM
-- Last update: Dec 06, 2019 at 02:14 AM
--

DROP TABLE IF EXISTS `special_res`;
CREATE TABLE `special_res` (
  `number` smallint(6) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Undefined',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `num_hours` int(11) NOT NULL,
  `comments` text DEFAULT NULL,
  `C_id` mediumint(9) NOT NULL
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
--
-- Dumping data for table `special_res`
--

INSERT INTO `special_res` (`number`, `status`, `start_date`, `end_date`, `num_hours`, `comments`, `C_id`) VALUES
(1212, 'On Review', '2019-09-09', '2019-09-10', 15, 'ivjvjh', 3156879),
(32321, 'On Review', '2019-09-09', '2019-09-10', 152, 'uyguyguu uy uyv uy uyvvyuv h h \\r\\nn h nibn jkk; \\r\\nkj ikj uib', 3156879);

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--
-- Creation: Dec 06, 2019 at 09:05 AM
-- Last update: Dec 06, 2019 at 10:40 AM
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `Id` smallint(6) NOT NULL,
  `name` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  `in_stock` tinyint(1) NOT NULL,
  `ordered_date` date NOT NULL,
  `D_num` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `supplies`:
--

--
-- Truncate table before insert `supplies`
--

TRUNCATE TABLE `supplies`;
--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`Id`, `name`, `qty`, `in_stock`, `ordered_date`, `D_num`) VALUES
(2, 'JOrge Avila2', 352, 1, '2019-11-10', 5);

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--
-- Creation: Dec 06, 2019 at 06:49 PM
-- Last update: Dec 06, 2019 at 06:49 PM
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
-- Truncate table before insert `works_on`
--

TRUNCATE TABLE `works_on`;
--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`CL_SIN`, `Contr_num`, `hours`) VALUES
('354-852-487', 32, 5),
('333-333-333', 55, 45);

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
  ADD KEY `eq_dep` (`D_num`);

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
-- Indexes for table `other_employee`
--
ALTER TABLE `other_employee`
  ADD PRIMARY KEY (`SIN`);

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
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `Id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `contract_cust_fk` FOREIGN KEY (`C_id`) REFERENCES `customers` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `eq_dep` FOREIGN KEY (`D_num`) REFERENCES `department` (`number`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `other_employee`
--
ALTER TABLE `other_employee`
  ADD CONSTRAINT `inheritance_otherEmp` FOREIGN KEY (`SIN`) REFERENCES `employee` (`SIN`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `workson_cl_fk` FOREIGN KEY (`CL_SIN`) REFERENCES `cleaners` (`SIN`) ON DELETE CASCADE,
  ADD CONSTRAINT `workson_contr_fk` FOREIGN KEY (`Contr_num`) REFERENCES `contract` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table cleaners
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table company
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table contract
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table customers
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table department
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table dept_locations
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table employee
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table equipment
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table has_reservation
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table it
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table maintenance
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table other_employee
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table residential
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table sales associate
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table services
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table special_res
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table supplies
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table works_on
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for database 471db_project
--

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
