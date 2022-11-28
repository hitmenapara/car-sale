-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 06:23 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'Admin@12');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'lamborghini'),
(2, 'jaguar'),
(3, 'audi'),
(4, 'kia'),
(5, 'maruti suzuki'),
(6, 'hyundai'),
(7, 'hit'),
(8, 'meet');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(2000) NOT NULL,
  `message` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fev`
--

CREATE TABLE `fev` (
  `id` int(20) NOT NULL,
  `car_id` int(20) NOT NULL,
  `cid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(5) NOT NULL,
  `cid` int(5) NOT NULL,
  `pid` int(5) NOT NULL,
  `price` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `method` varchar(10) NOT NULL,
  `register_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `reg_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `username`, `email`, `password`, `reg_date`) VALUES
(11, 'hit', 'hit patel', 'xyz@gmail.com', 'ecdcbf47ca51c1eb7f87951f99229f67', '2022-11-28 17:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblphoto`
--

CREATE TABLE `tblphoto` (
  `id` int(150) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `model` varchar(25) NOT NULL,
  `price` int(25) NOT NULL,
  `ptext` varchar(2500) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblphoto`
--

INSERT INTO `tblphoto` (`id`, `photo`, `model`, `price`, `ptext`, `category`) VALUES
(14, 'image/img1657549967.jpg', 'audi q2 key specification', 3500000, 'fuel type :petrol,engine:1984cc,power and torque:188bhp & 320Nm,drive train : awd,acceleration:6.5 seconds,top speed:228kmph.', 'audi>'),
(15, 'image/img1657550423.jpg', 'audi a6 key specification', 5984000, 'fuel type :petrol,\r\nengine:1984cc,\r\npower and torque :241bhp&370nm,\r\ndrive train : fwd\r\nacceleration:6.8 seconds,\r\ntop speed:250kmph\r\n', 'audi'),
(16, 'image/img1657550696.jpg', 'audi e-tron sportback key', 11900000, 'fuel type :electric,\r\ndriving range: 484km,\r\nsafety:5 star(euro NCAP),\r\ntransmission :automatic,\r\nseating capacity : 5 seater,\r\nbattery capacity : 95 kWh.\r\n', 'audi'),
(17, 'image/img1657552153.jpg', 'audi q5 key specification', 5988000, 'fuel type :petrol, \r\nengine :1984cc, \r\npower and torque:249bhp & 370Nm\r\ndrive train :4wd/awd,\r\nacceleration :6.3 second\r\ntop speed :237kmph\r\n', 'audi'),
(18, 'image/img1657552489.jpg', 'Lamborghini urus ', 31000000, 'fuel type :petrol,\r\nengine :3996cc,\r\npower and torque:650 bhp & 850 Nm,\r\ndrive train :awd,\r\ntop speed:305kmph', 'lamborghini'),
(19, 'image/img1657552771.jpg', 'Lamborghini Huracan Evo', 32200000, 'mileage :7.28kmpl,\r\nengine :5204cc,\r\ntransmission :automatic(dct),\r\nfuel type :petrol,\r\nseating capacity : 2 seater.', 'lamborghini'),
(20, 'image/img1657553856.jpg', 'jaguar f-type', 9773000, 'mileage:9.3 to 12.35 kmph,\r\nengine :1997 to 5000cc,\r\ntransmission :automatic(tc),\r\nfuel type :petrol,\r\nseating capacity :2 seater', 'jaguar'),
(21, 'image/img1657554098.jpg', 'Lamborghini Huracan sto', 49900000, 'fuel type :petrol,\r\nengine :5204cc,\r\npower and torque :630 bhp & 565Nm,\r\ndrive train :rwd,\r\ntop speed :310kmph,\r\nacceleration :3 seconds.', 'lamborghini'),
(22, 'image/img1657554346.jpg', 'jaguar xe', 4664000, 'fuel type :petrol,\r\nengine : 1997cc,\r\npower & torque :247bhp & 365Nm,\r\ndrive train :rwd,\r\ntop speed :250kmph', 'jaguar'),
(23, 'image/img1657554696.jpg', 'jaguar xf', 7160000, 'fuel type :petrol & diesel,\r\nengine :1997cc,\r\npower & torque : 204 to250 bhp & 365 to 430Nm,\r\ndrive :rwd,\r\nacceleration:6.9 to 7.6 second,\r\ntop speed:235 to 250kmph.\r\n', 'jaguar'),
(24, 'image/img1657554906.jpg', 'jaguar f-pace', 7484000, 'fuel type:petrol & diesel,\r\nengine :1997cc,\r\ndrive train :awd,\r\nacceleration :7.95 second.', 'jaguar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fev`
--
ALTER TABLE `fev`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblphoto`
--
ALTER TABLE `tblphoto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fev`
--
ALTER TABLE `fev`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblphoto`
--
ALTER TABLE `tblphoto`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
