-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2023 at 02:25 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `parkingID` int(20) NOT NULL,
  `plateNo` varchar(200) NOT NULL,
  `carModel` varchar(200) NOT NULL,
  `carColor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`parkingID`, `plateNo`, `carModel`, `carColor`) VALUES
(1, '1', 'Honda', 'Red'),
(2, '2', 'Toyota', 'Blue'),
(3, '3', 'Ford', 'Green'),
(4, '4', 'Chevrolet', 'Yellow'),
(5, '5', 'Nissan', 'Black'),
(6, '6', 'Dodge', 'White'),
(7, '7', 'Jeep', 'Silver'),
(8, '8', 'GMC', 'Gray'),
(9, '9', 'BMW', 'Gold'),
(10, '10', 'Mercedes-Benz', 'Maroon'),
(11, '11', 'Audi', 'Navy'),
(12, '12', 'Volkswagen', 'Purple'),
(13, '13', 'Porsche', 'Pink'),
(14, '14', 'Fiat', 'Orange'),
(15, '15', 'Mazda', 'Turquoise'),
(16, '16', 'Hyundai', 'Lime'),
(17, '17', 'Kia', 'Teal'),
(18, '18', 'Lincoln', 'Fuchsia'),
(19, '19', 'Chrysler', 'Olive'),
(20, '20', 'Buick', 'Cyan'),
(21, '21', 'Cadillac', 'Silver'),
(22, '22', 'Ram', 'Skyblue'),
(23, '23', 'Volvo', 'Plum'),
(24, '24', 'Suzuki', 'Indigo'),
(25, '25', 'Jaguar', 'Violet'),
(26, '26', 'Mini', 'Aqua'),
(27, '27', 'Mitsubishi', 'Chartreuse'),
(28, '28', 'Land Rover', 'Khaki'),
(29, '29', 'Subaru', 'Crimson'),
(30, '30', 'Tesla', 'Saddlebrown');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationID` int(20) NOT NULL,
  `plateNo` varchar(200) NOT NULL,
  `carModel` varchar(200) NOT NULL,
  `carColor` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `lotNo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `plateNo`, `carModel`, `carColor`, `date`, `time`, `lotNo`) VALUES
(1, '1', 'Honda', 'Red', '2022-01-01', '09:00:00.000000', 'A1'),
(2, '2', 'Toyota', 'Blue', '2022-01-02', '09:30:00.000000', 'B2'),
(3, '3', 'Ford', 'Green', '2022-01-03', '10:00:00.000000', 'C3'),
(4, '4', 'Chevrolet', 'Yellow', '2022-01-04', '10:30:00.000000', 'D4'),
(5, '5', 'Nissan', 'Black', '2022-01-05', '11:00:00.000000', 'E5'),
(6, '6', 'Dodge', 'White', '2022-01-06', '11:30:00.000000', 'F6'),
(7, '7', 'Jeep', 'Silver', '2022-01-07', '12:00:00.000000', 'G7'),
(8, '8', 'GMC', 'Gray', '2022-01-08', '12:30:00.000000', 'H8'),
(9, '9', 'BMW', 'Gold', '2022-01-09', '13:00:00.000000', 'I9'),
(10, '10', 'Mercedes-Benz', 'Maroon', '2022-01-10', '13:30:00.000000', 'J10'),
(11, '11', 'Audi', 'Navy', '2022-01-11', '14:00:00.000000', 'K11'),
(12, '12', 'Volkswagen', 'Purple', '2022-01-12', '14:30:00.000000', 'L12'),
(13, '13', 'Porsche', 'Pink', '2022-01-13', '15:00:00.000000', 'M13'),
(14, '14', 'Fiat', 'Orange', '2022-01-14', '15:30:00.000000', 'N14'),
(15, '15', 'Mazda', 'Turquoise', '2022-01-15', '16:00:00.000000', 'O15'),
(16, '16', 'Hyundai', 'Lime', '2022-01-16', '16:30:00.000000', 'P16'),
(17, '17', 'Kia', 'Teal', '2022-01-17', '17:00:00.000000', 'Q17'),
(18, '18', 'Lincoln', 'Fuchsia', '2022-01-18', '17:30:00.000000', 'R18'),
(19, '19', 'Chrysler', 'Olive', '2022-01-19', '18:00:00.000000', 'S19'),
(20, '20', 'Buick', 'Cyan', '2022-01-20', '18:30:00.000000', 'T20'),
(21, '21', 'Cadillac', 'Silver', '2022-01-21', '19:00:00.000000', 'U21'),
(22, '22', 'Ram', 'Skyblue', '2022-01-22', '19:30:00.000000', 'V22'),
(23, '23', 'Volvo', 'Plum', '2022-01-23', '20:00:00.000000', 'W23'),
(24, '24', 'Suzuki', 'Indigo', '2022-01-24', '20:30:00.000000', 'X24'),
(25, '25', 'Jaguar', 'Violet', '2022-01-25', '21:00:00.000000', 'Y25'),
(26, '26', 'Mini', 'Aqua', '2022-01-26', '21:30:00.000000', 'Z26'),
(27, '27', 'Mitsubishi', 'Chartreuse', '2022-01-27', '22:00:00.000000', 'AA27'),
(28, '28', 'Land Rover', 'Khaki', '2022-01-28', '22:30:00.000000', 'AB28'),
(29, '29', 'Subaru', 'Crimson', '2022-01-29', '23:00:00.000000', 'AC29'),
(30, '30', 'Tesla', 'Saddlebrown', '2022-01-30', '23:30:00.000000', 'AD30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`parkingID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `parkingID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
