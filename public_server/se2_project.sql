-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 03:51 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se2_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(20, 'Super23', '$2y$10$K6pk3Wg1rkHyaSL8Zijk8.F1eLcskaxSNbUtE3s4AggGDXb.TVmaC');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` char(13) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `category` char(30) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` float(4,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varbinary(50000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `name`, `category`, `description`, `price`, `quantity`, `image`) VALUES
('1', 'Melatonin', 'Sleep Aid', 'Melatonin is a hormone primarily released by the pineal gland at night, and has long been associated with control of the sleep–wake cycle.', 5.00, 50, 0x70726f647563745f706963732f6d656c61746f6e696e2e6a666966),
('2', 'Advil', 'Pain Relief', 'Used to treat mild aches and pain. Each tablet of Advil contains 200 mg of ibuprofen.', 6.00, 50, 0x70726f647563745f706963732f616476696c2e6a666966),
('3', 'Tums', 'Antacid', 'TUMS antacid tablets relieve heartburn, sour stomach, acid indigestion, and upset stomach associated with these symptoms.', 3.00, 50, 0x70726f647563745f706963732f74756d732e6a666966),
('4', 'Zyrtec', 'Allergy Relief', 'With 10 milligrams of cetirizine hydrochloride per tablet, this prescription-strength allergy medicine provides 24 hours of relief.', 9.00, 50, 0x70726f647563745f706963732f7a79727465632e6a666966),
('5', 'Benadryl', 'Allergy Relief', 'Benadryl Allergy Ultratabs Antihistamine Allergy Relief Tablets offer effective allergy relief.', 12.00, 50, 0x70726f647563745f706963732f62656e616472796c2e6a666966),
('6', 'Tylenol', 'Pain Relief', 'Tylenol Extra Strength caplets with 500mg of acetaminophen help reduce fever and provide temporary relief of minor aches and pains.', 6.00, 50, 0x70726f647563745f706963732f74796c656e6f6c2e6a666966),
('7', 'Acetaminophen', 'Pain Relief', 'Eliminate your aches and pains with CVS Health extra strength acetaminophen 500mg gelcaps.', 6.00, 50, 0x70726f647563745f706963732f61636574616d696e6f7068656e2e6a7067),
('8', 'Pepcid', 'Antacid', 'Quickly relieve heartburn associated with acid indigestion and sour stomach with Pepcid Complete Acid Reducer + Antacid Chewable Tablets.', 20.00, 50, 0x70726f647563745f706963732f7065706369642e6a666966),
('9', 'Pepto Bismol', 'Antacid', 'Peptos formula coats your stomach and provides fast relief from nausea, heartburn, indigestion, upset stomach, and diarrhea.', 7.00, 50, 0x70726f647563745f706963732f706570746f5f6269736d6f6c2e6a666966),
('10', 'ZzzQuil', 'Sleep Aid', 'This non-habit-forming sleep-aid helps you get some shut-eye, so you can wake up feeling refreshed.', 7.00, 50, 0x70726f647563745f706963732f7a7a7a7175696c2e6a666966);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
