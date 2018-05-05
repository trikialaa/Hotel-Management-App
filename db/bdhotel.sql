-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 12:16 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdhotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ADMINID` int(11) NOT NULL,
  `LOGIN` varchar(10) DEFAULT NULL,
  `PASSWORD` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMINID`, `LOGIN`, `PASSWORD`) VALUES
(2, 'admin', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `AGENTID` int(11) NOT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `NumTel` varchar(8) DEFAULT NULL,
  `Login_Agent` varchar(255) DEFAULT NULL,
  `Password_Agent` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`AGENTID`, `LastName`, `FirstName`, `Address`, `NumTel`, `Login_Agent`, `Password_Agent`) VALUES
(9, 'Ali', 'Hamouda', '7 Rue Mauritanie', '99040600', 'ali', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `chambre`
--

CREATE TABLE `chambre` (
  `CHAMBREID` int(11) NOT NULL,
  `TYPE` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chambre`
--

INSERT INTO `chambre` (`CHAMBREID`, `TYPE`) VALUES
(1, 'SINGLE'),
(2, 'DOUBLE'),
(3, 'SINGLE'),
(4, 'SINGLE'),
(5, 'SINGLE'),
(6, 'DOUBLE'),
(7, 'DOUBLE'),
(8, 'DOUBLE'),
(9, 'SINGLE'),
(10, 'SINGLE'),
(11, 'DOUBLE'),
(12, 'SINGLE'),
(13, 'DOUBLE'),
(14, 'DOUBLE'),
(15, 'SINGLE'),
(16, 'DOUBLE');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `CLIENTID` int(11) NOT NULL,
  `Nom` varchar(255) DEFAULT NULL,
  `Prenom` varchar(255) DEFAULT NULL,
  `NTel` varchar(8) DEFAULT NULL,
  `EMail` varchar(255) DEFAULT NULL,
  `IDType` varchar(255) DEFAULT NULL,
  `IDNumber` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`CLIENTID`, `Nom`, `Prenom`, `NTel`, `EMail`, `IDType`, `IDNumber`) VALUES
(1, 'Hamouda', 'Chokri', '88888447', 'chok@hee.com', 'CIN', '07458744');

-- --------------------------------------------------------

--
-- Table structure for table `elementfacture`
--

CREATE TABLE `elementfacture` (
  `ELEMENTID` int(11) NOT NULL,
  `NAME` varchar(255) DEFAULT NULL,
  `PRICE` decimal(6,3) DEFAULT NULL,
  `TYPE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elementfacture`
--

INSERT INTO `elementfacture` (`ELEMENTID`, `NAME`, `PRICE`, `TYPE`) VALUES
(1, 'Des Pates', '10.000', 'Plat'),
(2, 'Couscous', '20.000', 'Plat'),
(3, 'Soupe', '40.000', 'Plat'),
(4, 'Jus D\'Orange', '5.000', 'Boisson');

-- --------------------------------------------------------

--
-- Table structure for table `facturecomplete`
--

CREATE TABLE `facturecomplete` (
  `SEJOURID` int(11) NOT NULL,
  `ELEMENTID` int(11) NOT NULL,
  `Quantite` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facturecomplete`
--

INSERT INTO `facturecomplete` (`SEJOURID`, `ELEMENTID`, `Quantite`) VALUES
(23, 1, 5),
(23, 2, 2),
(23, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sejour`
--

CREATE TABLE `sejour` (
  `SEJOURID` int(11) NOT NULL,
  `CheckIn` date DEFAULT NULL,
  `CheckOut` date DEFAULT NULL,
  `CHAMBREID` int(11) DEFAULT NULL,
  `RESERVE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sejour`
--

INSERT INTO `sejour` (`SEJOURID`, `CheckIn`, `CheckOut`, `CHAMBREID`, `RESERVE`) VALUES
(23, '2018-05-04', '2018-05-31', 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sejourclient`
--

CREATE TABLE `sejourclient` (
  `CLIENTID` int(11) NOT NULL,
  `SEJOURID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sejourclient`
--

INSERT INTO `sejourclient` (`CLIENTID`, `SEJOURID`) VALUES
(1, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ADMINID`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`AGENTID`);

--
-- Indexes for table `chambre`
--
ALTER TABLE `chambre`
  ADD PRIMARY KEY (`CHAMBREID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENTID`);

--
-- Indexes for table `elementfacture`
--
ALTER TABLE `elementfacture`
  ADD PRIMARY KEY (`ELEMENTID`);

--
-- Indexes for table `facturecomplete`
--
ALTER TABLE `facturecomplete`
  ADD PRIMARY KEY (`SEJOURID`,`ELEMENTID`),
  ADD KEY `ELEMENTID` (`ELEMENTID`);

--
-- Indexes for table `sejour`
--
ALTER TABLE `sejour`
  ADD PRIMARY KEY (`SEJOURID`),
  ADD KEY `CHAMBREID` (`CHAMBREID`);

--
-- Indexes for table `sejourclient`
--
ALTER TABLE `sejourclient`
  ADD PRIMARY KEY (`SEJOURID`,`CLIENTID`),
  ADD KEY `CLIENTID` (`CLIENTID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ADMINID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `AGENTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `elementfacture`
--
ALTER TABLE `elementfacture`
  MODIFY `ELEMENTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sejour`
--
ALTER TABLE `sejour`
  MODIFY `SEJOURID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facturecomplete`
--
ALTER TABLE `facturecomplete`
  ADD CONSTRAINT `facturecomplete_ibfk_1` FOREIGN KEY (`ELEMENTID`) REFERENCES `elementfacture` (`ELEMENTID`),
  ADD CONSTRAINT `facturecomplete_ibfk_2` FOREIGN KEY (`SEJOURID`) REFERENCES `sejour` (`SEJOURID`);

--
-- Constraints for table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `sejour_ibfk_1` FOREIGN KEY (`CHAMBREID`) REFERENCES `chambre` (`CHAMBREID`);

--
-- Constraints for table `sejourclient`
--
ALTER TABLE `sejourclient`
  ADD CONSTRAINT `sejourclient_ibfk_1` FOREIGN KEY (`SEJOURID`) REFERENCES `sejour` (`SEJOURID`),
  ADD CONSTRAINT `sejourclient_ibfk_2` FOREIGN KEY (`CLIENTID`) REFERENCES `client` (`CLIENTID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
