-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2017 at 06:13 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tech_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cost` int(11) DEFAULT NULL,
  `numItems` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `cost`, `numItems`) VALUES
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 0, 0),
(13, 0, 0),
(14, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_prod`
--

CREATE TABLE `cart_prod` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_prod`
--

INSERT INTO `cart_prod` (`pid`, `cid`) VALUES
(4, 9),
(4, 11),
(4, 12),
(4, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `descrip` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CID`, `name`, `image`, `descrip`) VALUES
(1, 'Mobile Phones', NULL, 'Provide All mobile phones'),
(2, 'Laptops', NULL, 'Provide All Laptops brands '),
(3, 'Cameras', NULL, 'Provide All Cameras'),
(4, 'Tvs', NULL, 'Provide All Tvs');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `history` text,
  `location` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(11) NOT NULL,
  `numOrders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `numOrders`) VALUES
(17, 0),
(37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cust_cart`
--

CREATE TABLE `cust_cart` (
  `custID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_cart`
--

INSERT INTO `cust_cart` (`custID`, `cartID`) VALUES
(17, 8),
(37, 14);

-- --------------------------------------------------------

--
-- Table structure for table `deliveryman`
--

CREATE TABLE `deliveryman` (
  `ID` int(11) NOT NULL,
  `numDeliver` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryman`
--

INSERT INTO `deliveryman` (`ID`, `numDeliver`, `salary`) VALUES
(19, 0, 2000),
(39, 0, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `ordr`
--

CREATE TABLE `ordr` (
  `id` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `d_date` varchar(50) DEFAULT NULL,
  `d_address` varchar(50) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `cust_phone` varchar(50) DEFAULT NULL,
  `custID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordr`
--

INSERT INTO `ordr` (`id`, `total_price`, `d_date`, `d_address`, `did`, `cid`, `cust_phone`, `custID`) VALUES
(11, NULL, '2017-12-14', 'sss', 19, 12, 'sss', 37);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `PID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `descrip` text,
  `image` varchar(10) DEFAULT NULL,
  `CTID` int(11) DEFAULT NULL,
  `items` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`PID`, `name`, `price`, `descrip`, `image`, `CTID`, `items`, `sid`) VALUES
(4, 'Samsung S9', 8000, 'edited', 'jpg', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `SID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`SID`, `name`, `profit`) VALUES
(1, 'Computer Shop', 0);

-- --------------------------------------------------------

--
-- Table structure for table `storeemp`
--

CREATE TABLE `storeemp` (
  `ID` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storeemp`
--

INSERT INTO `storeemp` (`ID`, `sid`) VALUES
(30, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_email`
--

CREATE TABLE `store_email` (
  `sid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_email`
--

INSERT INTO `store_email` (`sid`, `email`) VALUES
(1, 'computershop@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `store_location`
--

CREATE TABLE `store_location` (
  `sid` int(11) NOT NULL,
  `location` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_location`
--

INSERT INTO `store_location` (`sid`, `location`) VALUES
(1, 'maadi'),
(1, 'october');

-- --------------------------------------------------------

--
-- Table structure for table `store_phone`
--

CREATE TABLE `store_phone` (
  `sid` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store_phone`
--

INSERT INTO `store_phone` (`sid`, `phone`) VALUES
(1, '01002993024'),
(1, '01155334663');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first` varchar(256) NOT NULL,
  `last` varchar(256) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Username` varchar(256) NOT NULL,
  `Password` varchar(256) NOT NULL,
  `Address` varchar(256) DEFAULT NULL,
  `Type` varchar(256) DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `Email`, `Username`, `Password`, `Address`, `Type`) VALUES
(4, 'aicha', 'hussein', 'Shosho.ashash97@yahoo.com', 'shosho', '$2y$10$mDY8XK1kFf5VF8ut0t6uw..paLKZqT/9UFo/yaZvvoC2G/qvMDAU6', NULL, 'admin'),
(5, 'adhm ', 'atef', '3ezzatpk@gmail.com', 'adham', '$2y$10$CqQY4Y/jz.sL0rPr12p4ouMHJGMa4fYkrK5TZT0GY4hkAFYW7yQ72', 'el manial', 'customer'),
(6, 'khaled ', 'gamal', 'kiki@gmail.com', 'kiki', '$2y$10$sPjoz6IMJLXBtyCyOXSr.eEhQDfmBBlbvpaKWOsc6PkMH48SuvlWi', '', 'customer'),
(17, 'mohamed', 'ezat', '3ezzatpk@gmail.com', 'ezzat', '$2y$10$6xAbIjXOtj40je86aXn/pOR8N1w/AD/QnMbnZqgVAZl8dFsaJHBhK', 'october', 'customer'),
(18, 'riham', 'atef', 'riham@gmail.com', 'rihamatef', '$2y$10$9gN0MFwOZpusSVpKEf2jB.qomzDo2xhUBCGunnrKrBct7ijlDXli6', 'maadi', 'admin'),
(19, 'mina', 'emad', 'minaemad@yahoo.com', 'minaemad', '$2y$10$Vr7tJDm4ZZIQ4oLRfWxclOwCpRFfsF3VKF/I1DEqrjWAj6GmXDMWS', 'madent nasr', 'DM'),
(30, 'abanob', 'shoukry', 'abanobshoukry@gmail.com', 'abanob', '$2y$10$uTkCmQAHNosdqqy/eh37vuwJTtFPkUi0SSvGd6LS8XVFCjWVaDSMS', 'waraaq', 'store empolyee'),
(36, 'hoda', 'nabil', 'hodanabil@gmail.com', 'hodanabil', '$2y$10$5ZilHecBuE93d3hpVRwvdutLfl8dcEeO53z7nQv0dOi8nL9Fqrlxe', 'october', 'store empolyee'),
(37, 'andrew', 'adel', 'andrew@gmail.com', 'andrewadel', '$2y$10$L/MZIIdWHMsHpjC99xbd6eGCrA3pUNgKp0wK5prb/4fuHGhueWqO6', 'waraaq', 'customer'),
(38, 'aa', 'ss', 'sadsada@gmail.com', 'mohamed', '$2y$10$IuEQUt340UKPryyVPHR.U.jD79EJwsxAEs/ziTSsOmjsXYgaXGlIO', 'sss', 'DM'),
(39, 'sadasd', 'd', 'dsfadsfas@gmai.com', 'fuck', '$2y$10$qQjYqOlDF3JCXUp8HZH2eeuIX4cQVQLwDOPwtD/.SuHGs8R4FnFRG', 'd', 'DM');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`cid`, `pid`) VALUES
(37, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_prod`
--
ALTER TABLE `cart_prod`
  ADD PRIMARY KEY (`pid`,`cid`),
  ADD KEY `cart_prod_ibfk_2` (`cid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cust_cart`
--
ALTER TABLE `cust_cart`
  ADD PRIMARY KEY (`custID`,`cartID`),
  ADD KEY `cartID` (`cartID`);

--
-- Indexes for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordr`
--
ALTER TABLE `ordr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `did` (`did`),
  ADD KEY `ordr_ibfk_2` (`cid`),
  ADD KEY `ordr_ibfk_3` (`custID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`PID`),
  ADD KEY `sid` (`sid`),
  ADD KEY `CTID` (`CTID`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `storeemp`
--
ALTER TABLE `storeemp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `store_email`
--
ALTER TABLE `store_email`
  ADD PRIMARY KEY (`sid`,`email`);

--
-- Indexes for table `store_location`
--
ALTER TABLE `store_location`
  ADD PRIMARY KEY (`sid`,`location`);

--
-- Indexes for table `store_phone`
--
ALTER TABLE `store_phone`
  ADD PRIMARY KEY (`sid`,`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`cid`,`pid`),
  ADD KEY `pid` (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ordr`
--
ALTER TABLE `ordr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `PID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_prod`
--
ALTER TABLE `cart_prod`
  ADD CONSTRAINT `cart_prod_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `product` (`PID`),
  ADD CONSTRAINT `cart_prod_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `cart` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `cust_cart`
--
ALTER TABLE `cust_cart`
  ADD CONSTRAINT `cust_cart_ibfk_1` FOREIGN KEY (`custID`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `cust_cart_ibfk_2` FOREIGN KEY (`cartID`) REFERENCES `cart` (`id`);

--
-- Constraints for table `deliveryman`
--
ALTER TABLE `deliveryman`
  ADD CONSTRAINT `deliveryman_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `ordr`
--
ALTER TABLE `ordr`
  ADD CONSTRAINT `ordr_ibfk_1` FOREIGN KEY (`did`) REFERENCES `deliveryman` (`ID`),
  ADD CONSTRAINT `ordr_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `ordr_ibfk_3` FOREIGN KEY (`custID`) REFERENCES `customer` (`ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `store` (`SID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CTID`) REFERENCES `category` (`CID`);

--
-- Constraints for table `storeemp`
--
ALTER TABLE `storeemp`
  ADD CONSTRAINT `storeemp_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `store` (`SID`),
  ADD CONSTRAINT `storeemp_ibfk_2` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `store_email`
--
ALTER TABLE `store_email`
  ADD CONSTRAINT `store_email_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `store` (`SID`);

--
-- Constraints for table `store_location`
--
ALTER TABLE `store_location`
  ADD CONSTRAINT `store_location_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `store` (`SID`);

--
-- Constraints for table `store_phone`
--
ALTER TABLE `store_phone`
  ADD CONSTRAINT `store_phone_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `store` (`SID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`ID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `product` (`PID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
