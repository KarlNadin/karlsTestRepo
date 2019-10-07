-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 04:47 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1762398`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(6) NOT NULL,
  `title` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `jobBrief` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `surname`, `firstName`, `address`, `email`, `phone`, `jobBrief`) VALUES
(3, 'Mr', 'Nadin', 'Steve', '107 Stock Grove, Milnrow, Rochdale, OL16 3XB', 'sn@gemail.com', 753159852, 'Build a double garage to rear of property.  Relay driveway back around to front of property.'),
(4, 'Mrs', 'Jones', 'Brenda', '34 Jones Way, Headingley, Leeds, LS8 1JW', 'bj@yahoo.com', 369159147, 'Build a wall around the front and side of gardens to property.  Add steps up to rear garden area.'),
(5, 'Ms', 'Hanley', 'Andrea', '45 Crompton Street, Jarrow, Newcastle, NW2 7CS', 'ah@sky.com', 357159258, 'Renew roof on main property and add pitched roof to garage. '),
(6, 'Dr ', 'Rahman', 'Abdul', '103 Hare Hill Road, Carlisle, CA7 3HH', 'drar@nhsdocs.nhs', 987741123, 'Build a new residential property'),
(7, 'Mrs', 'Nadin', 'Lynn', '9 Helston Drive, Royton, Oldham, OL2 6JS', 'ln@hd.co.uk', 1706843954, 'Build out house to rear of property.  Pointing on gable end to be renewed.');

-- --------------------------------------------------------

--
-- Table structure for table `tradesmen`
--

CREATE TABLE `tradesmen` (
  `id` int(6) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `trade` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradesmen`
--

INSERT INTO `tradesmen` (`id`, `surname`, `firstName`, `trade`, `email`, `phone`) VALUES
(2, 'Mantle', 'Matthew', 'Joiner', 'mm@csb.co.uk', 987654321),
(3, 'Nadin', 'Karl', 'Bricklayer', 'kn@csb.co.uk', 147258369),
(4, 'Horton', 'Alex', 'Electrician', 'ah@csb.co.uk', 369258147),
(5, 'Sagoo', 'Jaswinder', 'Plumber', 'js@csb.co.uk', 741852963),
(6, 'Jackson', 'Lyndsay', 'Receptionist', 'lj@csb.co.uk', 654987321);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradesmen`
--
ALTER TABLE `tradesmen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tradesmen`
--
ALTER TABLE `tradesmen`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
