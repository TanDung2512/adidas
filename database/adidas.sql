-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2020 at 06:13 AM
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
-- Database: `adidas`
--

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `line_id` int(11) NOT NULL,
  `workers_num` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `line_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`line_id`, `workers_num`, `supervisor_id`, `line_name`) VALUES
(1, 5, 5, 'A01');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `line_id` int(11) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `line_id`, `message`, `time_created`) VALUES
(1, 1, 'huhuuhhuhuhuhuhuhu', '2020-01-11 13:53:35'),
(2, 1, ' is assigned to position 5 line 1', '2020-01-11 19:54:52'),
(3, 1, ' is assigned to position 5 line 1', '2020-01-11 19:54:52'),
(4, 1, ' is assigned to position 5 line 1', '2020-01-11 19:54:52'),
(5, 1, ' is assigned to position 5 line 1', '2020-01-11 19:55:06'),
(6, 1, ' is assigned to position 5 line 1', '2020-01-11 19:55:08'),
(7, 1, ' is assigned to position 5 line 1', '2020-01-11 19:55:08'),
(8, 1, 'Chu Nhat Ly is assigned to position 5 line 1', '2020-01-11 19:56:31'),
(9, 1, 'Chu Nhat Ly is assigned to position 5 line 1', '2020-01-11 19:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `op_id` int(11) NOT NULL,
  `op_name` varchar(255) NOT NULL,
  `line_id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `original_id` int(11) NOT NULL,
  `replace_id` int(11) NOT NULL,
  `skill_id_ref_op` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`op_id`, `op_name`, `line_id`, `position`, `original_id`, `replace_id`, `skill_id_ref_op`) VALUES
(3, 'P1', 1, 0, 1, 0, 1),
(4, 'P2', 1, 0, 2, 0, 1),
(5, 'A1', 1, 2, 6, 6, 3),
(6, 'M1', 1, 2, 7, 3, 5),
(8, 'C1', 1, 0, 8, 0, 2),
(9, 'C2', 1, 0, 9, 0, 2),
(10, 'C3', 1, 1, 12, 0, 2),
(11, 'C4', 1, 0, 11, 0, 2),
(12, 'P3', 1, 0, 16, 0, 1),
(13, 'P4', 1, 0, 17, 0, 1),
(14, 'A3', 1, 0, 18, 0, 3),
(15, 'A4', 1, 0, 19, 0, 3),
(16, 'L1', 1, 0, 20, 0, 6),
(17, 'L2', 1, 0, 21, 0, 6),
(18, 'M2', 1, 0, 22, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `worker_skill_id` int(11) NOT NULL,
  `skill_id_ref` int(11) NOT NULL,
  `worker_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`worker_skill_id`, `skill_id_ref`, `worker_id`) VALUES
(1, 1, 3),
(2, 2, 4),
(3, 3, 1),
(4, 4, 2),
(5, 5, 1),
(6, 1, 4),
(7, 3, 6),
(10, 5, 6),
(11, 2, 8),
(12, 4, 9),
(13, 2, 9),
(14, 1, 10),
(15, 3, 11),
(16, 3, 12),
(17, 1, 13),
(18, 2, 13),
(19, 5, 13),
(20, 2, 14),
(21, 1, 14),
(22, 4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `skill_dict`
--

CREATE TABLE `skill_dict` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_dict`
--

INSERT INTO `skill_dict` (`skill_id`, `skill_name`) VALUES
(1, 'primer'),
(2, 'cement'),
(3, 'attaching'),
(4, 'pressing'),
(5, 'marking'),
(6, 'labeling');

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
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/74701520_2385432858361633_195523670276308992_o.jpg?_nc_cat=104&_nc_ohc=n0Ow6WcTclAAQlgkbNLzjnpkytGUgtVNwMWuxe1NjBnUg5OhpLgFvTvmA&_nc_ht=scontent.fhph1-1.fna&oh=e038ff1b69e7a55659732f65607af7d9&oe=5E9CF954', 2, 'Pham Quoc Cong', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/82972508_2657191551046645_1482143576912560128_o.jpg?_nc_cat=104&_nc_ohc=xp0JhaMhOOUAQnyPGBb8aFS9mPh2VN3WnufDp0YLCt-ePZ-aP2Jtk6_iw&_nc_ht=scontent.fhph1-1.fna&oh=83796bab60ca56a426b50de8320a2cd6&oe=5E9AB599', 3, 'Ky Nguyen', '1', '2'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/44815404_1778243002301162_361984851638747136_o.jpg?_nc_cat=109&_nc_ohc=bAfkQ5xAAUkAQnY4O4p4rG5GP_UXeyJCWFPGDs_bfnvs7KesO7HaAAEUQ&_nc_ht=scontent.fhph1-1.fna&oh=db1507052aee4cce97972bad7eb75567&oe=5EAEB4AC', 4, 'Quynh Nhu', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/81768380_10212608956299158_550201537004044288_o.jpg?_nc_cat=101&_nc_ohc=6IW6w-M5Sg8AQkBS0QiXGbffWPxwMBQtxTYa2a4XVU9flLsL8y_dura7w&_nc_ht=scontent.fhph1-2.fna&oh=6abadef088676f211cce9ca23f0af211&oe=5E8FCCB4', 5, 'Can Hoang Linh', '2', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-1/c342.0.1364.1364a/56119775_1945729378869009_727153678498136064_o.jpg?_nc_cat=106&_nc_ohc=8XcyLqPhfssAQkaecvNoxIwH0GbP7I7p8YkSoj47Krz4JTqvb1MpUO1Ag&_nc_ht=scontent.fhph1-2.fna&_nc_tp=1&oh=ab79e8ddb4da722f4bf627c44b0296b8&oe=5E98DD14', 6, 'Chu Nhat Ly', '1', '2'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/74528235_1860285774116435_2923247676159950848_o.jpg?_nc_cat=102&_nc_ohc=bSyvbMLVsv0AQnAJsMhLDFHDMijCWtxYkiOu2zIMmQTES7jQSy_R2U5LA&_nc_ht=scontent.fhph1-1.fna&oh=e7d3be1701648557fcd55c946c271756&oe=5E8EDA2E', 7, 'Trinh Quang Thang', '1', '1'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/35463795_2212802895403816_2118817833675653120_o.jpg?_nc_cat=107&_nc_ohc=eXm44AdLk1cAQndalQDQMa2JHmZfX4EVS5RmfWMj2nz4vdzXXm7vkQvYA&_nc_ht=scontent.fhph1-2.fna&oh=a818c119a982ada624841324c129b3b8&oe=5E9A1E13', 8, 'Hoang Tung', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/73088674_1524555354350812_1571500259836690432_n.jpg?_nc_cat=102&_nc_ohc=u451v-RREwkAQlpdzJJF5zsdb69Xk3RFaxPDmF27DerWCGq2H0aO4OJ9A&_nc_ht=scontent.fhph1-1.fna&oh=fc70dbef2217e7ef0076037fd9c4cf78&oe=5E9C470C', 9, 'Minh Bi Bui', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/51373684_1138629002970437_4143333879341645824_o.jpg?_nc_cat=111&_nc_ohc=Jr1AIW_ZsOcAQkj7vcevvp9Ch1cd1cm3qEn7dCecI840dOKJEhB51duxA&_nc_ht=scontent.fhph1-1.fna&oh=51024cf9a6d8d87bedf8c1fb58564952&oe=5E9A574F', 10, 'Bui Le Thai', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/75336419_2492016700888433_5488718580788756480_o.jpg?_nc_cat=100&_nc_ohc=Bxk9UlCTzEcAQmDNKc4HjeqVAKSSgxtojQUAzgU7PG8QSe-Q-e3MPXDGA&_nc_ht=scontent.fhph1-1.fna&oh=6fa31bfd7b2b84ca710e603e7b4037c4&oe=5EAB6CFC', 11, 'Nguyen Hu Quang', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/79772615_2667088310078722_7318919864918212608_n.jpg?_nc_cat=111&_nc_ohc=6ZN6DhQY_f8AQn3QTC-4Er1fdnenQzzbyr1spAOp8cPeOWrvBvevfED1Q&_nc_ht=scontent.fhph1-1.fna&oh=8ec88f62adbb1aca1f86624e48614114&oe=5EA90DC8', 12, 'Vinh Thai', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/53046653_1206630639518020_5045054673929633792_n.jpg?_nc_cat=105&_nc_ohc=gPAQfTpjv_UAQn-ubzNgmhgvWwm2508lIQRKZMAzfTAYg3bul5TIQ_VHw&_nc_ht=scontent.fhph1-2.fna&oh=7e536546e05b3204607d9ca2c12441a3&oe=5EAF668B', 13, 'Vo Dang Nam', '1', '1'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/14441208_122714714856065_2804188454585435299_n.jpg?_nc_cat=110&_nc_ohc=MQnHlxRwAHMAQnO_AmGHRSzR_sMuSRFLk5ohu2cn-soCl63U3iQEhFbfw&_nc_ht=scontent.fhph1-1.fna&oh=186cd21a0bb18e0292acc380c5fe8b9c&oe=5EA2600E', 14, 'Nguyen Truong Pham', '1', '1'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t31.0-8/27503962_400678240354949_6379680550563918517_o.jpg?_nc_cat=106&_nc_ohc=Ok6NzTWX5ysAQns9chOevy2y92r0aTXYaIQjDcYN2g91O9fiNEVPN2cnw&_nc_ht=scontent.fhph1-2.fna&oh=cae62ed2bcf9cd25f816eb4612b9c5e3&oe=5EAE4A21', 15, 'Le Tung Thanh', '2', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/81506447_2576804022539462_5103960163279175680_o.jpg?_nc_cat=109&_nc_ohc=VMx41pGpDBcAQmMNyTOfzsxDmrlW6HXuVQurcdJMzVEPghaWRd2DEXBPw&_nc_ht=scontent.fhph1-1.fna&oh=d83c49a693e175cafa3265df6d934583&oe=5EA54BC3', 16, 'Do Gia Phong', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t31.0-8/13495467_578686978977562_6497673314128101926_o.jpg?_nc_cat=106&_nc_ohc=lDt6-JsAFWAAQk1XeaQdDCiWpcxU_YHtluj898AaArTdNVTzz0BGNb0QQ&_nc_ht=scontent.fhph1-2.fna&oh=9aa76660a2de47fbc2774b1deec66a0b&oe=5EDBBC62', 17, 'Su Bo', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/39006468_2159176244156349_8849663990377218048_o.jpg?_nc_cat=104&_nc_ohc=FXS1gm0VjUMAQnhqVAY-iybY-8bkkgcy1Us9hQPFkZLBSARyl5w6ywdcg&_nc_ht=scontent.fhph1-1.fna&oh=8d9aa00ac7ad186047ee05f10933cd1a&oe=5E9E3DAB', 18, 'Lai Dac Hop', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/78908055_623341524872571_1313568176423829504_n.jpg?_nc_cat=109&_nc_ohc=ARw6ykhWzwAAQkFjCQEVCIoERYSmaA_PKiZzwcRbhmY9fWeJo8E-DHKMQ&_nc_ht=scontent.fhph1-1.fna&oh=d9722e34281604562c5ee829bcd4ec2c&oe=5EA52BD9', 19, 'Phan Huu Thang', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/64880532_1569697949827659_5568402945822687232_n.jpg?_nc_cat=101&_nc_ohc=Vfs4t49JdLkAQloYRGBXzWFXcEpJaGwzb4XAWqsiufIjzZdjCnLgheoOA&_nc_ht=scontent.fhph1-2.fna&oh=e3e09279f3350b27e267e6e4e7f7fcdd&oe=5E9A9BF1', 20, 'Hung Quy', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/83159026_2851289665097730_8903357704416788480_n.jpg?_nc_cat=108&_nc_ohc=Hk9YfPRMbOEAQk_UFzmSlI1c-AKUziwP7Sw1BqCF5IJfCLjet0s7vdbBg&_nc_ht=scontent.fhph1-2.fna&oh=c7d4f044fe2df1eb8c0cb99539a85dbb&oe=5EAE9CDC', 21, 'Tran Khai Minh', '0', '0'),
('https://scontent.fhph1-2.fna.fbcdn.net/v/t1.0-9/69318343_674105089750642_6598109616893067264_o.jpg?_nc_cat=103&_nc_ohc=3F2PA70eDfMAQnhRT_I5a9RtF5lHf1QNbNx20tt7Pv4M1txSzQFrhTq8w&_nc_ht=scontent.fhph1-2.fna&oh=787841d09b220788d0599d9c2f1ae553&oe=5E9FEAD6', 22, 'Nguyen Huy', '0', '0'),
('https://scontent.fhph1-1.fna.fbcdn.net/v/t1.0-9/79885062_2233978316897566_979915115207852032_n.jpg?_nc_cat=102&_nc_ohc=kE09LIz-ohcAQnCzEWo7WXewrJF_Ixw-eezH-5v2XovGJ7iJO7926c9eQ&_nc_ht=scontent.fhph1-1.fna&oh=c2ea761f84e4fa92bb07ac0433688be7&oe=5EAF2033', 23, 'Quoc Trinh', '0', '0');

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
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_foreign_key_line_id_ref` (`line_id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`op_id`),
  ADD KEY `fk_foreign_key_original_id` (`original_id`),
  ADD KEY `fk_foreign_key_skill_id_ref_op` (`skill_id_ref_op`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`worker_skill_id`),
  ADD KEY `fk_foreign_key_worker_id_ref` (`worker_id`),
  ADD KEY `fk_foreign_key_skill_id_ref` (`skill_id_ref`);

--
-- Indexes for table `skill_dict`
--
ALTER TABLE `skill_dict`
  ADD PRIMARY KEY (`skill_id`);

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
  MODIFY `line_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `worker_skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `skill_dict`
--
ALTER TABLE `skill_dict`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `line`
--
ALTER TABLE `line`
  ADD CONSTRAINT `fk_foreign_key_supervisor_id` FOREIGN KEY (`supervisor_id`) REFERENCES `worker` (`worker_id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_foreign_key_line_id_ref` FOREIGN KEY (`line_id`) REFERENCES `line` (`line_id`);

--
-- Constraints for table `operator`
--
ALTER TABLE `operator`
  ADD CONSTRAINT `fk_foreign_key_original_id` FOREIGN KEY (`original_id`) REFERENCES `worker` (`worker_id`);

--
-- Constraints for table `skill`
--
ALTER TABLE `skill`
  ADD CONSTRAINT `fk_foreign_key_skill_id_ref` FOREIGN KEY (`skill_id_ref`) REFERENCES `skill_dict` (`skill_id`),
  ADD CONSTRAINT `fk_foreign_key_worker_id_ref` FOREIGN KEY (`worker_id`) REFERENCES `worker` (`worker_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
