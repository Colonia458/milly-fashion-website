-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 11:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `accessory_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`accessory_id`, `name`, `description`, `color`, `price`, `image`) VALUES
(1, 'NECKLACE', 'Cowrie shells', 'Gold', 1500.00, 'Pictures/Accessories/WhatsAppImage2024-02-05at4.18.14PM_1.webp'),
(2, 'EARRINGS', 'Wedding Earrings', 'Gold', 1999.00, 'Pictures/Accessories/MOK_4863.webp'),
(3, 'EARRINGS', 'For Women', 'Gold', 1999.00, 'Pictures/Accessories/MOK_4847.webp'),
(4, 'RINGS', 'For Men', 'Silver', 1999.00, 'Pictures/Accessories/WhatsAppImage2023-07-21at3.00.50PM_1.webp'),
(5, 'RINGS', 'Jewel Ring', 'Green', 1999.00, 'Pictures/Accessories/WhatsAppImage2023-07-21at5.07.19PM.jpg'),
(6, 'RINGS', 'Diamond', 'Silver', 2999.00, 'Pictures/Accessories/WhatsAppImage2023-07-21at3.00.51PM.jpg'),
(7, 'EARRINGS', 'Flower', 'Green', 2999.00, 'Pictures/Accessories/AB3804410_1.webp'),
(8, 'BRACELET', 'Zinc', 'Brown', 2999.00, 'Pictures/Accessories/0I1A9648.webp'),
(9, 'NECKLACE', 'Retro Set', 'Red', 2499.00, 'Pictures/Accessories/0I1A9695.webp'),
(10, 'BRACELET', 'Zinc', 'Silver', 3000.00, 'Pictures/Accessories/0I1A9613.webp');

-- --------------------------------------------------------

--
-- Table structure for table `cartaccess`
--

CREATE TABLE `cartaccess` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `accessid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartcloth`
--

CREATE TABLE `cartcloth` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `clothesid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartshoe`
--

CREATE TABLE `cartshoe` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `shoeid` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `shoeid` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `pnumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `shoeid`, `name`, `price`, `pnumber`) VALUES
(1, 1, 'Nike', 3499.00, '0757788619'),
(5, 1, 'Jordans', 2599.00, '0745697871'),
(6, 1, 'Nike', 2000.00, '0745697871'),
(7, 1, 'Nike', 2000.00, '0745697871'),
(8, 1, 'Nike', 2000.00, '0745697871'),
(9, 3, 'Jordans', 3000.00, '0115402180'),
(10, 1, 'Nike', 2000.00, '0765834531');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `clothes_id` int(11) NOT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`clothes_id`, `brand`, `name`, `description`, `color`, `size`, `price`, `image`) VALUES
(1, 'Palace', 'Jacket', 'Leather Jacket', 'Brown', 34, 4499.00, 'Pictures/Clothes/Palace_2023_Winter_cap_9108-1_19797021-f388-4e09-8e19-b963c1524455.webp'),
(2, 'Merch', 'Shirt', 'Marshmello Shirt', 'White', 34, 5999.00, 'Pictures/Clothes/MELLO_WI23_HELMET_TEE_1080X1350_1.webp'),
(3, 'Merch', 'Sweatshirt', 'Marshmello Shirt', 'White', 34, 5999.00, 'Pictures/Clothes/MELLO_JJK_FINGER_LS_SHIRT_1080X1350_1.webp'),
(4, 'Palace', 'Shorts', 'For Men', 'Yellow', 34, 3999.00, 'Pictures/Clothes/palace_2024_Summer_Gap_0105.webp'),
(5, 'Palm Angels', 'Shirt', 'For Men', 'Black', 35, 3999.00, 'Pictures/Clothes/palm-angels-burning-monogram-t-shirt_21773705_51846929_800.webp'),
(6, 'Palace', 'Jacket', 'College Jacket', 'Navy', 35, 3999.00, 'Pictures/Clothes/Palace-2023-Tee-11522-CTF_11e4317d-46ae-4079-b339-ccbf74f9074d.webp'),
(7, 'Palace', 'Shirt', 'Long Sleeve', 'Cream', 35, 3499.00, 'Pictures/Clothes/Palace_2024_Spring_bag_13495.webp'),
(8, 'Outfit', 'Clothes', 'Full Set', 'Variant', 35, 7999.00, 'Pictures/Clothes/alexandra-gorn-WF0LSThlRmw-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shoes`
--

CREATE TABLE `shoes` (
  `shoe_id` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(20) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoes`
--

INSERT INTO `shoes` (`shoe_id`, `brand`, `name`, `description`, `size`, `color`, `price`, `image`) VALUES
(1, 'Nike', 'Jordans', 'For Women', '30', 'Blue and Red', 3000.00, 'Pictures/Shoes/ezgif-5-b4f6627126.jpg'),
(2, 'Nike', 'Jordans', 'For Kids', '30', 'Orange and brown lines', 2599.00, 'Pictures/Shoes/ezgif-5-5ff254f912.jpg'),
(3, 'Nike', 'Jordans', 'For Men', '38', 'Blue', 2000.00, 'Pictures/Shoes/ezgif-5-caeb20d1ff.jpg'),
(4, 'Nike', 'Air Force', 'For Women', '21', 'Pink', 2999.00, 'Pictures/Shoes/Custom Air Force 1’s(1).jpeg'),
(5, 'Nike', 'Air Force', 'For Women', '34', 'Checked', 3499.00, 'Pictures/Shoes/vF04wNqr.jpeg'),
(6, 'Nike', 'Air Force', 'Customized', '38', 'Green', 2499.00, 'Pictures/Shoes/A-4d0N9O.jpeg'),
(7, 'Nike', 'Blazer', 'Latest Fashion', '38', 'White', 3499.00, 'Pictures/Shoes/blazer-mid-77-vintage-mens-shoes-nw30B2.webp'),
(37, 'Nike', 'Air Force', 'Customized', '36', 'Maroon and Gold', 2999.00, 'Pictures/Shoes/10 Jean Outfits That Will Make You Stand Out From the Crowd.jpeg'),
(369, 'Nike', 'Air Force', 'Low Cut', '37', 'Blue', 2299.00, 'Pictures/Shoes/Click To Buy Cheap Nike SB Dunk To Buy Shop For Nike SB Dunk Online.jpeg'),
(370, 'Nike', 'Air Force', 'Customized', '34', 'Y`ellow', 2499.00, 'Pictures/Shoes/Custom made Air Force 1’s.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `passwordc` varchar(255) NOT NULL,
  `profilepic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `uname`, `email`, `pnumber`, `password`, `passwordc`, `profilepic`) VALUES
(2, 'gorrila123', 'griplay9143@gmail.com', '0757788619', 'shaxindustries', 'shaxindustries', ''),
(4, 'tylershax', 'tyler@gmail.com', '0115402180', 'shaxindustry', 'shaxindustries', 'uploads/FLAME, Joon Ahn.jpeg'),
(5, 'nickson', 'wanjau@yahoo.com', '089755554', 'wanjau', 'wanjau', ''),
(8, 'Mirriam', 'mirriamthigari@gmail.com', '0745697871', 'Miah', 'Miah', ''),
(9, 'purity123', 'purity@gmail.com', '0731322485', '123456', '123456', ''),
(10, 'welsey', 'wesley@gmail.com', '0765834531', 'shaxindustries', 'shaxindustries', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`accessory_id`);

--
-- Indexes for table `cartaccess`
--
ALTER TABLE `cartaccess`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `cartcloth`
--
ALTER TABLE `cartcloth`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `cartshoe`
--
ALTER TABLE `cartshoe`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `shoeid` (`shoeid`),
  ADD KEY `cartshoe_ibfk_2` (`userid`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shoeid` (`shoeid`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`clothes_id`);

--
-- Indexes for table `shoes`
--
ALTER TABLE `shoes`
  ADD PRIMARY KEY (`shoe_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `accessory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cartaccess`
--
ALTER TABLE `cartaccess`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cartcloth`
--
ALTER TABLE `cartcloth`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cartshoe`
--
ALTER TABLE `cartshoe`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `clothes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `shoes`
--
ALTER TABLE `shoes`
  MODIFY `shoe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartshoe`
--
ALTER TABLE `cartshoe`
  ADD CONSTRAINT `cartshoe_ibfk_1` FOREIGN KEY (`shoeid`) REFERENCES `shoes` (`shoe_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cartshoe_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `signup` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `fk_shoeid` FOREIGN KEY (`shoeid`) REFERENCES `shoes` (`shoe_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
