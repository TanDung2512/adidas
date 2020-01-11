-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 07:59 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adidas`
--

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `line_id` int(11) NOT NULL,
  `workers_num` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`line_id`, `workers_num`, `supervisor_id`) VALUES
(1, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `op_id` int(255) NOT NULL,
  `position` char(1) NOT NULL,
  `line_id` int(11) NOT NULL,
  `original_id` int(11) NOT NULL,
  `replace_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`op_id`, `position`, `line_id`, `original_id`, `replace_id`) VALUES
(2, '1', 1, 1, 0),
(4, '0', 1, 2, 0),
(5, '0', 1, 3, 0),
(6, '0', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `worker_skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`worker_skill_id`, `skill_name`, `worker_id`) VALUES
(1, 'primer', 3),
(2, 'primer', 4),
(3, 'cement', 1),
(4, 'attaching', 2),
(5, 'pressing', 1),
(6, 'marking', 4);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `ava` varchar(1024) NOT NULL,
  `worker_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` char(1) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`ava`, `worker_id`, `name`, `type`, `status`) VALUES
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/80242132_2698541643600718_119226595624878080_n.jpg?_nc_cat=107&_nc_ohc=byj6aXWt4RcAQlvqc8gyXHsL6rioZMkcMRbOknUC-gB19qq8ch80wc42g&_nc_ht=scontent.fhph1-2.fna&oh=69bcd79301fd00e7a69730d70aa5cc9b&oe=5E9C96FF', 1, 'Tran Bao Sam', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/p960x960/55460055_1284974571640405_5546777815552098304_o.jpg?_nc_cat=107&_nc_ohc=fB-nPKw6-qUAQkAStaa5-P1R790kIzkk_zBtJeTnCF7yvU8QcAHW4dyfw&_nc_ht=scontent.fhph1-2.fna&_nc_tp=1&oh=368f30a63bb74b0f7a66d68f79325d18&oe=5EA211AD', 2, 'Pham Quoc Cong', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-1/c2.0.2043.2043a/73212858_1450366681805262_4094775305510584320_o.jpg?_nc_cat=104&_nc_ohc=avvfVQvpKNwAQnOX5YMLyg26x1sjugc0IBl_yZrSdzSv1K_rRNUd3EaBw&_nc_ht=scontent.fhph1-1.fna&_nc_tp=1&oh=305ae62ca381526d4104b15c399a770f&oe=5EB11502', 3, 'Ky Nguyen', '1', '1'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/p960x960/82297100_2681721678582210_8098358224714989568_o.jpg?_nc_cat=102&_nc_ohc=dd5_It5x2mkAQn3lI1BAWx-zGb5JhxF9aY-DQXgQ5DSlQl4Ps0eTmnFVw&_nc_ht=scontent.fhph1-1.fna&_nc_tp=1&oh=a61d352fe02bf126398ddf25b4e27884&oe=5E9B8973', 4, 'Quynh Nhu', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t31.0-8/p960x960/22712400_1366676073429830_5338897900347762360_o.jpg?_nc_cat=109&_nc_ohc=g6MsMJboCF0AQm6V5m9FVwiF0KY2K66_GtV4NtZ7ZZb2qc1-cnL-HD-Cg&_nc_ht=scontent.fhph1-1.fna&_nc_tp=1&oh=8d5adc9532c28f537931e662dcce74d3&oe=5E91644C', 5, 'Can Hoang Linh', '2', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`line_id`),
  ADD KEY `fk_foreign_key_supervisor_id` (`supervisor_id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `fk_foreign_key_line_id` (`line_id`),
  ADD KEY `fk_foreign_key_original_id` (`original_id`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`worker_skill_id`),
  ADD KEY `fk_foreign_key_worker_id_ref` (`worker_id`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line`
--
ALTER TABLE `line`
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `op_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `worker_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `line`
--
ALTER TABLE `line`
  ADD CONSTRAINT `fk_foreign_key_supervisor_id` FOREIGN KEY (`supervisor_id`) REFERENCES `worker` (`worker_id`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `fk_foreign_key_line_id` FOREIGN KEY (`line_id`) REFERENCES `line` (`line_id`),
  ADD CONSTRAINT `fk_foreign_key_original_id` FOREIGN KEY (`original_id`) REFERENCES `worker` (`worker_id`),
  ADD CONSTRAINT `fk_foreign_key_replace_id` FOREIGN KEY (`replace_id`) REFERENCES `worker` (`worker_id`);

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_foreign_key_worker_id_ref` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`worker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
