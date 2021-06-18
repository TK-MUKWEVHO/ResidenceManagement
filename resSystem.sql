-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 04:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ressystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `cellPhone` int(11) NOT NULL,
  `sessionDetails` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `postedDate` date NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Mentor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `stdNum`, `time`, `cellPhone`, `sessionDetails`, `name`, `postedDate`, `Status`, `Mentor`) VALUES
(3, 216065026, '2021-06-12 10:43:00', 653572171, 'C++ Functions', 'Prudence', '2020-06-12', 'approved', 'Jali'),
(5, 216448154, '2020-08-02 08:06:00', 653572171, 'C++ Functions', 'Jali', '2020-07-01', 'Pending', ''),
(6, 216646797, '2020-07-01 21:31:00', 653572171, 'C++ Functions', 'Godfrey', '2020-07-01', 'approved', 'Jali'),
(7, 216448154, '2020-08-07 13:01:00', 653572171, 'C++ Functions', 'Jali', '2020-07-06', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `stdNum`, `name`, `room`, `details`, `status`, `date`) VALUES
(22, 216448154, 'Jali', 'W2-G01', 'sdsfdgfdgdfg', 'fixed', '2020-07-01'),
(23, 216448154, 'Jali', 'W2-G01', 'broken door', 'Pending', '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `femaleres`
--

CREATE TABLE `femaleres` (
  `stdNum` int(11) NOT NULL,
  `resAdmin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `resName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `femaleres`
--

INSERT INTO `femaleres` (`stdNum`, `resAdmin`, `name`, `surname`, `roomNum`, `resName`) VALUES
(216065026, 'Thabiso', 'Prudence', 'Lethole', 'W1-G01', 'Mnisi Village');

-- --------------------------------------------------------

--
-- Table structure for table `labschedule`
--

CREATE TABLE `labschedule` (
  `Day` varchar(255) NOT NULL,
  `08:00-10:00` varchar(255) NOT NULL,
  `10:00-12:00` varchar(255) NOT NULL,
  `12:00-14:00` varchar(255) NOT NULL,
  `14:00-16:00` varchar(255) NOT NULL,
  `16:00-18:00` varchar(255) NOT NULL,
  `18:00-20:00` varchar(255) NOT NULL,
  `20:00-22:00` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labschedule`
--

INSERT INTO `labschedule` (`Day`, `08:00-10:00`, `10:00-12:00`, `12:00-14:00`, `14:00-16:00`, `16:00-18:00`, `18:00-20:00`, `20:00-22:00`) VALUES
('Monday', 'OPEN', 'OPEN', 'CLOSE', 'CLOSE', 'OPEN', 'OPEN', 'OPEN'),
('Tuesday', 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE', 'OPEN', 'OPEN'),
('Wednesday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN'),
('Thuesday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN'),
('Friday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'CLOSE', 'CLOSE'),
('Saturday', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN', 'OPEN'),
('Sunday', 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE', 'OPEN', 'OPEN', 'OPEN');

-- --------------------------------------------------------

--
-- Table structure for table `maleres`
--

CREATE TABLE `maleres` (
  `resAdmin` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `resName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maleres`
--

INSERT INTO `maleres` (`resAdmin`, `name`, `surname`, `stdNum`, `roomNum`, `resName`) VALUES
('Thabiso', 'Jali', 'Mnisi', 216448154, 'W2-G01', 'Mnisi Village'),
('Thabiso', 'Godfrey', 'Mabena', 216646797, 'W2-G01', 'Mnisi Village');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `story` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `topic`, `story`, `img`, `date`) VALUES
(9, 'me and you', 'fdgfgfgfgf', 'assets/img/newsPictures/clear logo.jpg', '2020-06-12'),
(13, 'soccer', 'this is my first story to have ben uploaded on this website', 'assets/img/newsPictures/design 1.jpg', '2020-06-20'),
(15, 'Life', 'yhjgasd tyut g jhvbndsaghjbnvdsghjbnms,m sakhbj asdk,mbnasd,ghbMJH,BMNVNbzxvgCBNXZVBNVcmnvZXNb', 'assets/img/newsPictures/Bedfordview-PGP-sale-for-R30m-exterior-and-garden-Large-520x400.jpg', '2020-07-01'),
(16, 'Food', 'yhjgasd tyut g jhvbndsaghjbnvdsghjbnms,m sakhbj asdk,mbnasd,ghbMJH,BMNVNbzxvgCBNXZVBNVcmnvZXNb', 'assets/img/newsPictures/logo.jpg', '2020-07-06'),
(17, 'trying new things', 'jali\r\n\r\nplease help me get my book bacl from mr Lee\r\n\r\nThank you.', 'assets/img/newsPictures/FB_IMG_15302534784992859.jpg', '2020-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `stdNum` int(11) NOT NULL,
  `SubjectName` varchar(255) NOT NULL,
  `mark` int(11) NOT NULL,
  `year_Of_Study` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`stdNum`, `SubjectName`, `mark`, `year_Of_Study`, `year`) VALUES
(216448154, 'DSO23AT', 60, '2019', '0000-00-00'),
(216448154, 'TPG111T', 63, '2nd', '0000-00-00'),
(216448154, 'SSF24AT', 53, '2nd', '0000-00-00'),
(216448154, 'ISY23AT', 56, '2nd', '0000-00-00'),
(216448154, 'ISY23BT', 56, '2nd', '0000-00-00'),
(216448154, 'SSF24BT', 52, '2nd', '0000-00-00'),
(216448154, 'TPG201T', 52, '2nd', '0000-00-00'),
(216448154, 'DSO23BT', 63, '2nd', '0000-00-00'),
(216065026, 'sdfds', 80, 'sad', 'sasas'),
(216065026, 'werer', 56, '43545', 'sdfd'),
(216065026, 'sddsgsddsf', 80, 'dfsfdf', 'sdfsdsdfsdf'),
(216065026, 'sdfsdfsdf', 70, 'ewrewee', 'werwerwerwer'),
(216065026, 'rettreter', 67, 'asdsadasdasd', 'zxczxzxcxz'),
(216065026, 'dgsdfdsfdsfsdfsdfsdfds', 90, 'sdffsdf', 'dsfdsfdsfsd'),
(216646797, 'asdsdasd', 80, 'sadsdasd', 'sadsadasd'),
(216646797, '4rterrt', 50, 'ASasasd', 'saddas');

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `stdNum` int(9) NOT NULL,
  `SName` text NOT NULL,
  `name` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `yearStudy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_records`
--

INSERT INTO `student_records` (`stdNum`, `SName`, `name`, `gender`, `yearStudy`) VALUES
(216065026, 'Lethole', 'Prudence', 'female', '3rd'),
(216448154, 'Mnisi', 'Jali', 'male', '2nd'),
(216646797, 'Mabena', 'Godfrey', 'male', '3rd'),
(217007445, 'Shikweni', 'Nhlamulo', 'male', '3rd'),
(217019443, 'Sedibe', 'Kamogelo', 'female', '3rd'),
(217456134, 'Mokwele', 'Karabo', 'female', 'First_year'),
(218206751, 'Mukwevho', 'Takalani', 'male', '3rd');

-- --------------------------------------------------------

--
-- Table structure for table `supportstructure`
--

CREATE TABLE `supportstructure` (
  `id` int(10) NOT NULL,
  `stdNum` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `motivation` varchar(255) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `contact` int(10) NOT NULL,
  `img` varchar(255) NOT NULL,
  `appointmentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supportstructure`
--

INSERT INTO `supportstructure` (`id`, `stdNum`, `name`, `surname`, `position`, `motivation`, `roomNum`, `contact`, `img`, `appointmentDate`) VALUES
(0, 216448154, 'JALI', 'MNISI', 'mentor', 'help others', 'w1-528', 653572171, 'assets/img/newsPictures/MID211.jpg', '2020-07-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `stdNum` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contactno` int(11) NOT NULL,
  `posting_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`stdNum`, `email`, `password`, `contactno`, `posting_date`) VALUES
(216065026, 'hello@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 653572171, '2020-06-20'),
(216448154, 'mnisi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 653572171, '2020-06-11'),
(216646797, 'zola7@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 658245785, '2020-06-20'),
(217007445, 'me@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 256974684, '2020-06-20'),
(217019443, 's@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, '2020-06-20'),
(217456134, 'mk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, '2020-06-20'),
(218206751, 'go@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2147483647, '2020-06-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `femaleres`
--
ALTER TABLE `femaleres`
  ADD PRIMARY KEY (`stdNum`);

--
-- Indexes for table `maleres`
--
ALTER TABLE `maleres`
  ADD PRIMARY KEY (`stdNum`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`stdNum`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`stdNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`stdNum`) REFERENCES `student_records` (`stdNum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
