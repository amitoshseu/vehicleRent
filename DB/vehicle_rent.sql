-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2017 at 02:50 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.16-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`) VALUES
(1, 'Amitosh Gain', 'amitoshseu', 'amitosh.seu@gmail.com', '4015e0cbb95591bc02f6961bcc6fb4db'),
(2, 'Faysal Ahmed', 'ftanim', 'fayshal@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Shoeb Khan', 'ousk', 'ousk_cseseu@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `cusId` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `vehicleName` varchar(255) NOT NULL,
  `tryTrip` varchar(255) NOT NULL,
  `pickAdd` varchar(255) NOT NULL,
  `endAdd` varchar(255) NOT NULL,
  `datePick` varchar(30) NOT NULL,
  `timePick` varchar(10) NOT NULL,
  `vehicleNumber` int(2) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `cusId`, `vehicleId`, `vehicleName`, `tryTrip`, `pickAdd`, `endAdd`, `datePick`, `timePick`, `vehicleNumber`, `rate`, `image`, `date`, `status`) VALUES
(40, 10, 17, 'Toyota Noah 2009', '4.00', 'Airpot ', 'Mirpur 10', '2017-01-02', '2:30pm', 1, 2200.00, 'uploads/9df4bdae83.jpg', '2017-01-02 22:35:50', 2),
(42, 10, 26, 'Hero Motorcycle 2013', '1.00', 'Model Town', 'Airport', '2017-01-05', '1:30pm', 1, 120.00, 'uploads/8b5e919ace.png', '2017-01-04 14:58:45', 2),
(43, 11, 14, '2016-Hyundai-Elantra-leaked', '5.00', 'Banani', 'Farmgate', '2017-01-05', '2:30pm', 1, 3000.00, 'uploads/ecbc9ff848.jpg', '2017-01-04 19:18:04', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'BMW'),
(2, 'Nissan'),
(3, 'Toyota'),
(4, 'Discover'),
(5, 'Honda'),
(8, 'Suzuki'),
(9, 'Maruti'),
(10, 'Mahindra'),
(11, 'Tata'),
(12, 'Hyundai'),
(13, 'Hero'),
(14, 'Yamaha'),
(15, 'Mazda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Car'),
(2, 'Mini Truck'),
(3, 'Motorbike');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `company` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `company`, `phone`, `email`, `message`, `date`, `status`) VALUES
(3, 'Amitosh Gain', 'Southeast University', '01763356347', 'amitosh.seu@gmail.com', 'This is a test message for you', '2016-12-30 14:15:07', 0),
(4, 'Obayed Ullah Khan', 'Southeast University', '01763356348', 'ousk_cseseu@yahool.com', 'This is also a test message. ', '2016-12-30 14:15:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `regCombo` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `phone`, `email`, `regCombo`, `address`, `city`, `pass`) VALUES
(10, 'Amitosh Gain', '01763356347', 'amitosh.seu@gmail.com', 'newspaper', 'Rampura', 'root', '202cb962ac59075b964b07152d234b70'),
(11, 'Obayed Ullah Khan', '01763356435', 'ousk_cseseu@gmail.com', 'fmRadio', 'Farmgate', 'Dhaka', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `driverId` int(11) NOT NULL,
  `driverName` varchar(255) NOT NULL,
  `drivingLic` varchar(255) NOT NULL,
  `driverAdd` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`driverId`, `driverName`, `drivingLic`, `driverAdd`, `image`, `phone`) VALUES
(1, 'Mr. Doblue', 'DK4747564Af5424', 'Dohar, Dhaka', 'uploads/9c4d2239d4.jpg', '01763356348');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quickBooking`
--

CREATE TABLE `tbl_quickBooking` (
  `id` int(11) NOT NULL,
  `pickCar` varchar(255) NOT NULL,
  `pickHire` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pickDate` varchar(25) NOT NULL,
  `pickTime` varchar(20) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `phone` int(13) NOT NULL,
  `currentTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_quickBooking`
--

INSERT INTO `tbl_quickBooking` (`id`, `pickCar`, `pickHire`, `address`, `pickDate`, `pickTime`, `fName`, `lName`, `phone`, `currentTime`, `status`) VALUES
(1, 'Sedan', 'Tk.1490:4Hr Dhaka City           ', 'Rampura', '2016-12-31', '130pm', 'Amitosh', 'Gain', 1763356347, '2016-12-31 17:51:28', 0),
(5, 'Sedan', 'Tk.3990:Outside Dhaka/10Hr       ', 'Rampura', '2016-12-31', '6:30am', 'Mr', 'Perfect', 1763356347, '2016-12-31 18:04:10', 0),
(6, 'Sedan', 'Tk.2590:Nearby Dhaka Pick&Drop   ', 'Rampura', '2016-12-31', '1:30pm', 'Amitosh ', 'Gain', 1763356347, '2016-12-31 18:12:00', 1),
(7, 'Sedan', 'Tk.1290:Airport Pick&Drop        ', 'Mohakhali', '2017-01-28', '6:30am', 'Mr ', 'Perfect', 1713578181, '2017-01-01 02:42:44', 0),
(8, 'Bike', 'Default Hiring Package           ', 'Adabor', '2017-01-04', '12:30pm', 'Abul ', 'Hossain', 1763356347, '2017-01-03 01:08:10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reserve`
--

CREATE TABLE `tbl_reserve` (
  `reserveId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `vehicleName` varchar(255) NOT NULL,
  `tryTrip` float(10,2) NOT NULL,
  `vehicleNumber` int(11) NOT NULL,
  `datePick` varchar(255) NOT NULL,
  `timePick` varchar(255) NOT NULL,
  `pickAdd` varchar(255) NOT NULL,
  `endAdd` varchar(255) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `author`, `body`, `date`) VALUES
(1, 'Get to know who we are', 'Amitosh Gain', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.  <br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2017-01-03 23:44:45'),
(2, 'Latest News about our company.', 'Admin ', '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."\n\n\n"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."\n\n"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."\n\n"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."', '2017-01-03 23:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `vehicleId` int(11) NOT NULL,
  `vehicleName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `rate` float(10,2) NOT NULL,
  `rateDay` float(10,2) NOT NULL,
  `rateAirport` float(10,2) NOT NULL,
  `seat` varchar(10) NOT NULL,
  `vehiCondition` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`vehicleId`, `vehicleName`, `catId`, `brandId`, `body`, `rate`, `rateDay`, `rateAirport`, `seat`, `vehiCondition`, `image`, `type`) VALUES
(13, 'Hyundai Eon. 2.96L Onwards', 1, 12, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 550.00, 5500.00, 2200.00, '5', 'Used', 'uploads/f29fff5cef.jpg', 2),
(14, '2016-Hyundai-Elantra-leaked', 1, 12, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 600.00, 6000.00, 2400.00, '5', 'Unused', 'uploads/ecbc9ff848.jpg', 2),
(15, 'Toyota X Fielder', 1, 3, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 500.00, 5000.00, 2000.00, '8', 'Used', 'uploads/c6279151c0.jpg', 0),
(16, 'Toyota Noah 2007', 1, 3, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 550.00, 5500.00, 2200.00, '12', 'Used', 'uploads/72f589b887.jpg', 1),
(17, 'Toyota Noah 2009', 1, 3, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 550.00, 5500.00, 2200.00, '12', 'Used', 'uploads/9df4bdae83.jpg', 1),
(18, 'Honda CRV', 1, 5, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 600.00, 6000.00, 2400.00, '5', 'Used', 'uploads/d05b730f24.jpg', 2),
(19, 'Honda CRV Elegent', 1, 5, '\n	    	<p><span>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</span></p>', 600.00, 6000.00, 2400.00, '5', 'Unused', 'uploads/7ca63e8b7f.jpg', 2),
(20, 'Suzuki-Bandit 1250S', 3, 8, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 100.00, 1000.00, 400.00, '2', 'Used', 'uploads/cd90e8e40e.jpg', 0),
(21, 'Suzuki-GSX-R1000d', 3, 8, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 150.00, 1500.00, 600.00, '2', 'Used', 'uploads/f3891e6500.jpg', 2),
(22, 'Suzuki-GSX-R1000b', 3, 8, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 100.00, 1000.00, 400.00, '2', 'Used', 'uploads/8efae53125.jpg', 0),
(25, 'Hero Motorcycle', 3, 13, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 100.00, 1000.00, 400.00, '2', 'Used', 'uploads/944fb26c85.jpg', 0),
(26, 'Hero Motorcycle 2013', 3, 13, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 120.00, 1200.00, 480.00, '2', 'Used', 'uploads/8b5e919ace.png', 1),
(27, 'Yamaha 2016', 3, 14, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 100.00, 1000.00, 400.00, '2', 'Used', 'uploads/dbf1fe1788.png', 0),
(28, 'Mazda 1998 Series', 2, 15, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 600.00, 6000.00, 0.00, '2', 'Used', 'uploads/d2a2ef1ba4.jpg', 1),
(29, 'Suzuki Carry Pickup', 2, 8, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 550.00, 5500.00, 0.00, '2', 'Used', 'uploads/fc2451bf12.jpg', 0),
(30, 'Suzuki  Pickup M4', 2, 8, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 600.00, 6000.00, 2400.00, '2', 'Used', 'uploads/ba616fe761.jpg', 1),
(31, 'Mahindra Mini truck ', 2, 10, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 550.00, 5500.00, 0.00, '2', 'Used', 'uploads/b93378b26e.jpg', 1),
(32, 'Tata ace mini', 2, 11, '\n	    	<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>', 600.00, 6000.00, 0.00, '2', 'Used', 'uploads/59e9c5442b.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`),
  ADD KEY `brandId` (`brandId`),
  ADD KEY `brandId_2` (`brandId`),
  ADD KEY `brandId_3` (`brandId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`driverId`);

--
-- Indexes for table `tbl_quickBooking`
--
ALTER TABLE `tbl_quickBooking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reserve`
--
ALTER TABLE `tbl_reserve`
  ADD PRIMARY KEY (`reserveId`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`vehicleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `driverId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_quickBooking`
--
ALTER TABLE `tbl_quickBooking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_reserve`
--
ALTER TABLE `tbl_reserve`
  MODIFY `reserveId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `vehicleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
