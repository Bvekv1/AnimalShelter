-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 12:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spencer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_animals`
--

CREATE TABLE `tbl_animals` (
  `id` int(11) NOT NULL,
  `animaltype` varchar(20) NOT NULL,
  `name` varchar(15) NOT NULL,
  `age` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_animals`
--

INSERT INTO `tbl_animals` (`id`, `animaltype`, `name`, `age`, `gender`, `height`, `description`, `image`) VALUES
(58, 'Dog', 'Jimmy', '2 months', 'Male', '50cm', 'cute', 'dog3.jpg'),
(59, 'Dog', 'Raju', '8 month', 'Male', '50 cm', 'cute,obedient', 'dog2.jpg'),
(60, 'Dog', 'Kalu', '4 month', 'Male', '4 month', 'lovely,cute', 'pitbullblack.jpg'),
(61, 'Dog', 'Tommy', '2 years', 'Male', '100 cm', 'very obedient', 'dog5.jpg'),
(62, 'Cat', 'Angel', '4 month', 'Female', '15 cm', 'green eyes', 'cat1.jpg'),
(63, 'Cat', 'Pugu', '4 month', 'Female', '14 cm', 'cute', 'black&whitecat.jpg'),
(64, 'Cat', 'pali', '1 month', 'Female', '10 cm', 'cute,', 'cat2.jpg'),
(66, 'Cat', 'nuka', '4 month', 'Female', '15 cn', 'aggressive', 'cat3.jpeg'),
(67, 'Bird', 'Mithu', '5 month', 'Female', '6 inch', 'talkative,singer', 'parrot.jpg'),
(68, 'Bird', 'granger', '1 month', 'Female', '4 inch', 'to cute', 'owl1.jpg'),
(69, 'Bird', 'shipu', '4 month', 'Female', '9 inch', 'cute', 'Owl2.jpg'),
(70, 'Goat', 'manju', '4', 'Female', '1 foot', 'hungry one', 'goat1.jpg'),
(71, 'Goat', 'jimmy', '1 month', 'Male', '25 cm', 'playfull', 'goat2.jpeg'),
(72, 'Dog', 'shammy', '1 month', 'Male', '10 cm', 'lovely,cute', 'dog8.jpg'),
(73, 'Dog', 'jungey', '9 month', 'Male', '40 cm', 'very strong', 'pitbullrace.jpg'),
(74, 'Dog', 'nami', '1 month', 'Female', '15 cm', 'cute', 'dog6.jpg'),
(75, 'Dog', 'Ravi', '1 year', 'Male', '.5 foot', 'playfull', 'dog9.png'),
(76, 'Dog', 'keva', '1 year', 'Male', '1.5 foot', 'Loyal', 'dog10.jpg'),
(77, 'Chicken', 'shaa', '4 month', 'Male', '20 cm', 'cute', 'hen1.jpg'),
(78, 'Chicken', 'salu', '4 month', 'Female', '20 cm', 'obedient', 'hen2.jpg'),
(79, 'Chicken', 'Bhaley', '4 month', 'Male', '25 cm', 'aggressive', 'hen3.jpg'),
(80, 'Pig', 'piggy', '1 month', 'Male', '10 cm', 'cute', 'pig1.jpg'),
(81, 'Pig', 'ramu', '2 month', 'Male', '80 cm', 'palyfull', 'pig-grass.jpg'),
(82, 'Pig', 'shyamau', '4 month', 'Male', '80 cm', 'love walking', 'piggraze.jpg'),
(83, 'Cat', 'jolly', '25 days', 'Female', '8 cm', 'cute,playfull', 'cat6.jpeg'),
(84, 'Cat', 'lavu', '20 days', 'Female', '8 cm', 'great color', 'catsmallblack.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_answer`
--

CREATE TABLE `tbl_answer` (
  `aid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `answer` mediumtext NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_answer`
--

INSERT INTO `tbl_answer` (`aid`, `userid`, `answer`, `qid`) VALUES
(418, 11, 'Take your dog on walk.', 191),
(419, 11, 'Give your cat fish daily.', 192),
(420, 30, 'Take your dog on walk.', 191),
(421, 30, 'Give your cat fish daily.', 192),
(422, 30, 'Gift him a brid cage', 193),
(425, 11, 'Adopt Dog they are loya.', 194),
(426, 11, 'Adopt Dog they are loyal.', 194),
(427, 15, 'it is not that hard', 195),
(428, 15, 'It is not that hard ', 195),
(429, 11, '14-15years some may live long too', 196),
(430, 11, '14-15years some may live long too', 196),
(431, 11, 'Gift him a bird cage.', 193);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `aid` varchar(250) NOT NULL,
  `userid` varchar(80) NOT NULL,
  `animaltype` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `age` varchar(40) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `height` varchar(20) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(2555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `aid`, `userid`, `animaltype`, `name`, `age`, `gender`, `height`, `description`, `image`) VALUES
(25, '87', '11', 'Sheep', 'sammy', '1 year', 'Male', '1 foot', 'cute', 'sheep2.jpg'),
(26, '85', '11', 'Sheep', 'shapi', ' 1 year', 'Female', '1 foot', 'hungry', 'sheep1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_counter`
--

CREATE TABLE `tbl_counter` (
  `id` int(11) NOT NULL,
  `visit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_counter`
--

INSERT INTO `tbl_counter` (`id`, `visit`) VALUES
(1, 1655);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donations`
--

CREATE TABLE `tbl_donations` (
  `id` int(11) NOT NULL,
  `userid` varchar(25) NOT NULL,
  `amount` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donations`
--

INSERT INTO `tbl_donations` (`id`, `userid`, `amount`) VALUES
(1, 'Bibek', '85695'),
(2, 'basant', '80000'),
(36, 'ramesh', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questions`
--

CREATE TABLE `tbl_questions` (
  `qid` int(11) NOT NULL,
  `userid` longtext NOT NULL,
  `question` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_questions`
--

INSERT INTO `tbl_questions` (`qid`, `userid`, `question`) VALUES
(191, '30', 'How to take care of Dog'),
(192, '11', 'How to take care of Cat?'),
(193, '30', 'How should I take care of Parrot'),
(194, '15', 'What should adopt dog or Cat'),
(195, '11', 'How hard it is to kept pet'),
(196, '15', 'what is the average age for dog life');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postal` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `userid` varchar(8) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `usertype` varchar(9) NOT NULL,
  `logindate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `address`, `postal`, `dob`, `email`, `userid`, `password`, `gender`, `usertype`, `logindate`) VALUES
(1, 'bibek', 'Bardiya', '45', '2018-03-15', 'admin@gmail.com', 'admin1', 'admin', 'male', 'admin', '2018-04-18'),
(11, 'thor', 'Tikapur', '65', '2018-03-21', 'bvekjas1@gmail.com', 'bibek', 'bibek', 'male', 'Client', '2018-04-18'),
(15, 'dhami', 'Bhaktapur', '78', '2018-03-23', 'sdadf@gmail.com', 'dhami', 'dhami', 'male', 'Client', '2018-04-18'),
(30, 'Ramesh', 'Bardiya', '458', '1995-01-01', 'ramesh@gmail.com', 'ramesh', 'ramesh', 'male', 'Client', '2018-04-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_counter`
--
ALTER TABLE `tbl_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donations`
--
ALTER TABLE `tbl_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_animals`
--
ALTER TABLE `tbl_animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `tbl_answer`
--
ALTER TABLE `tbl_answer`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_counter`
--
ALTER TABLE `tbl_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_donations`
--
ALTER TABLE `tbl_donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_questions`
--
ALTER TABLE `tbl_questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
