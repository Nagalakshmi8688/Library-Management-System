-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2022 at 09:32 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libraryy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'Hamid', '123456', 'mr.hamid@gmail.com'),
(2, 'Nobonita', '111111', 'nobonita@gmail.com'),
(3, 'X', '222222', 'samiarahman@gmail.com'),
(4, 'doreamon', '55555', 'dore@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `authors` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `name`, `authors`, `edition`, `status`, `quantity`) VALUES
(1, 'Principal of electronics', 'V.K. Mehta, Rohit Mehta', '3rd', 'Available', 19),
(2, 'The Complete Reference C++', 'Herbert Schildt', '4th', 'Available', 16),
(3, 'Data Structure', 'Seymour Lipschutz', '4th', 'Available', 34),
(4, '', '', '', '', 0),
(5, 'tttttttt', 'ggg', 'dddd', 'available', 11),
(6, 'abc', 'xyz', 'daddaa', 'available', 5);

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE `fine` (
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `returned` varchar(100) NOT NULL,
  `day` int(50) NOT NULL,
  `fine` double NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fine`
--

INSERT INTO `fine` (`username`, `bid`, `returned`, `day`, `fine`, `status`) VALUES
('Promi', 1, '2019-05-21', 31, 3.1, 'not paid'),
('Afifa', 1, '2019-05-21', 1, 0.1, 'not paid'),
('naga', 2, '2022-05-09', 8, 0.8, 'not paid'),
('naga', 5, '2022-05-09', 1, 0.1, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('naga', 3, '2022-05-09', 19120, 1912, 'not paid'),
('Divya Sri Yamali', 2, '2022-05-09', 0, 0, 'not paid'),
('naga', 2, '2022-05-09', 8, 0.8, 'not paid'),
('naga', 6, '2022-05-09', 0, 0, 'not paid'),
('naga', 1, '2022-05-09', 0, 0, 'not paid'),
('naga', 1, '2022-05-09', 0, 0, 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `issueid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `bid` int(100) NOT NULL,
  `approve` varchar(100) NOT NULL,
  `issue` varchar(100) NOT NULL,
  `return` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`issueid`, `username`, `bid`, `approve`, `issue`, `return`) VALUES
(1, 'Promi', 3, '<p style=\"color:yellow; background-color:red;\">EXPIRED</p>', '2019-04-22', '2019-05-16'),
(2, 'Promi', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-03-20', '2019-04-20'),
(3, 'Promi', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-01-30', '2019-02-28'),
(4, 'Afifa', 1, 'Yes', '2022-05-09', '2022-05-16'),
(5, 'Afifa', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2019-02-20', '2019-02-10'),
(6, 'Afifa', 1, 'Yes', '2022-05-09', '2022-05-16'),
(7, 'naga', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-05-20'),
(8, 'meghana', 2, '<p style=\"color:yellow; background-color:red; \">EXPIRED</p>', '2022-05-09', '2022-04-25'),
(9, 'naga', 5, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-04-30'),
(10, 'naga', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-04-20'),
(11, 'Nobonita', 3, '', '', ''),
(12, 'naga', 3, 'yes', '2022-05-09', '2022-05-16'),
(13, 'naga', 5, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-05-08'),
(14, 'naga', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-05-01'),
(15, 'naga', 5, '', '', ''),
(16, 'naga', 3, 'yes', '2022-05-09', '2022-05-16'),
(17, 'naga', 1, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-05-15'),
(18, 'Rahman', 1, '<p style=\"color:yellow; background-color:red; \">EXPIRED</p>', '2022-05-09', '2022-03-21'),
(19, 'Divya Sri Yamali', 2, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-09-21'),
(20, 'naga', 3, 'yes', '2022-05-09', '2022-05-16'),
(21, 'naga', 6, '<p style=\"color:yellow; background-color:green;\">RETURNED</p>', '2022-05-09', '2022-06-16'),
(22, 'naga', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `roll` int(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`username`, `password`, `roll`, `email`) VALUES
('Promi', '111111', 1, 'afia1@gmail.com'),
('Mim', '555555', 324, 'mim@gmail.com'),
('Rahman', '212324', 1510016, 'samiarahman@gmail.com'),
('Shimu1', '987654', 1510052, 'shimu1@gmail.com'),
('Suchana', '121212', 1510047, 'suchana@gmail.com'),
('Afifa', '121212', 1510047, 'afifa@gmail.com'),
('Divya', '1515', 0, 'divya@gmail.com'),
('naga', '223', 36, 'naga@gmail.com'),
('meghana', '12345', 12, 'meghana@gmail.com'),
('Divya Sri Yamali', '0000', 15, 'divya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `issue_book`
--
ALTER TABLE `issue_book`
  ADD PRIMARY KEY (`issueid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `issue_book`
--
ALTER TABLE `issue_book`
  MODIFY `issueid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
