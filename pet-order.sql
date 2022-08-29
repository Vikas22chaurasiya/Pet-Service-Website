-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2022 at 10:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE `accessories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `title`, `description`, `price`, `image_name`, `featured`, `active`) VALUES
(5, 'Petsworld Crystal Dog Collar And Leash Medium', '', '333', 'accessory-name-8442.png', 'yes', 'yes'),
(6, 'Petsworld Dog Harness with Leash Medium', '', '500', 'accessory-name-1413.jpg', 'yes', 'yes'),
(7, 'Petsworld Dog Leash Plus Collar Blue', '', '200', 'accessory-name-4322.jpg', 'yes', 'yes'),
(8, 'Petsworld 112.5 cm (45 Inch) Long Leash with Soft Handle For Kitten | Cats | Puppies Blue', '', '300', 'accessory-name-959.jpg', 'yes', 'yes'),
(9, 'Petsworld 112.5 cm (45 Inch) Long Leash with Soft Handle For Kitten | Cats | Puppies Pink', '', '300', 'accessory-name-5959.jpg', 'yes', 'yes'),
(10, 'Petsworld 112.5 cm (45 Inch) Long Leash with Soft Handle For Kitten | Cats | Puppies Red', '', '300', 'accessory-name-6817.jpg', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `sec_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`, `email`, `contact_no`, `sec_word`) VALUES
(32, 'vikas chaurasiya', 'vikas', 'bebe68374a49cb41b7c9219e97250044', 'vikas22chaurasia@gmail.com', 1234567890, 'vikas');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_address`, `customer_email`, `customer_username`, `image_name`) VALUES
(30, 'Adult Cat Food Chicken In Gravy', '200.00', 1, '200.00', '2022-04-26 08:56:51', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-952.png'),
(31, 'Adult Cat Food Chicken In Gravy', '200.00', 1, '200.00', '2022-04-26 08:57:14', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-952.png'),
(32, 'Adult Cat Food Chicken In Gravy', '200.00', 1, '200.00', '2022-04-26 08:57:17', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-952.png'),
(33, 'Adult Cat Food Chicken In Gravy', '200.00', 1, '200.00', '2022-04-26 08:57:58', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-952.png'),
(34, 'Pedigree Puppy Small Dog Lamb Flavour', '100.00', 1, '100.00', '2022-04-26 08:58:05', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-5470.png'),
(35, 'Pedigree Professional Large Breed Puppy Food', '100.00', 1, '100.00', '2022-04-26 08:58:08', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-1988.png'),
(36, 'Pedigree Adult Meat Jerky Barbeque Chicken Dog Treats', '200.00', 1, '200.00', '2022-04-26 08:58:12', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-6957.png'),
(37, 'Adult Cat Food Chicken In Gravy', '200.00', 1, '200.00', '2022-04-26 08:58:23', 'ordered', 'vikas ', '1234567890', '0', 'vikaschaurasiya@ternaengg.ac.in', 'zennyrox', 'food-name-952.png'),
(55, 'Petsworld Dog Leash Plus Collar Blue', '200.00', 1, '200.00', '2022-05-05 07:43:00', 'ordered', '', '', '', '', '', 'accessory-name-4322.jpg'),
(56, 'Petsworld Dog Leash Plus Collar Blue', '200.00', 1, '200.00', '2022-05-05 07:43:40', 'ordered', '', '', '', '', '', 'accessory-name-4322.jpg'),
(57, 'Petsworld 112.5 cm (45 Inch) Long Leash with Soft Handle For Kitten | Cats | Puppies Red', '300.00', 1, '300.00', '2022-05-05 07:43:46', 'ordered', '', '', '', '', '', 'accessory-name-6817.jpg'),
(58, 'Cat Food Wet Meal Ocean Fish', '200.00', 1, '200.00', '2022-05-05 07:53:19', 'ordered', '', '', '', '', 'user', 'food-name-7746.png'),
(59, 'Cat Food Wet Meal Ocean Fish', '200.00', 1, '200.00', '2022-05-05 07:54:15', 'ordered', '', '', '', '', '$_SESSION[\"c-user\"]', 'food-name-7746.png'),
(60, 'Cat Food Wet Meal Ocean Fish', '200.00', 1, '200.00', '2022-05-05 07:55:09', 'ordered', '', '', '', '', '$_SESSION[\"c-user\"]', 'food-name-7746.png'),
(61, 'Cat Food Wet Meal Ocean Fish', '200.00', 1, '200.00', '2022-05-05 07:57:25', 'ordered', '', '', '', '', '$_SESSION[\"c-user\"]', 'food-name-7746.png'),
(62, 'Pedigree Dog Treats Adult Meat Jerky Stix Grilled Liver', '200.00', 1, '200.00', '2022-05-05 07:57:29', 'ordered', '', '', '', '', '$_SESSION[\"c-user\"]', 'food-name-8362.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(28, 'Dog-puppy', 'Food_category_295.png', 'yes', 'no'),
(29, 'Dog-adult', 'Food_category_258.png', 'yes', 'yes'),
(30, 'Cat-Kitten', 'Food_category_691.png', 'yes', 'yes'),
(31, 'Cat-adult', 'Food_category_415.png', 'yes', 'yes'),
(39, 'Petfood', 'Food_category_748.png', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sec_word` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `full_name`, `username`, `password`, `address`, `contact_no`, `email`, `sec_word`) VALUES
(2, 'vikas ', 'tommy', '827ccb0eea8a706c4c34a16891f84e7b', '0', 1234567890, 'Vikas22chaurasia@gmail.com', ''),
(3, 'vikas ', 'zennyrox', 'bebe68374a49cb41b7c9219e97250044', '0', 1234567890, 'vikaschaurasiya@ternaengg.ac.in', ''),
(4, 'vikas chaurasiya', 'vikas', '827ccb0eea8a706c4c34a16891f84e7b', '0', 1234567890, 'Vikaschaurasiya@ternaengg.ac.in', ''),
(5, 'roshni chaurasiya', 'minyoongi', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'fss@lgmail.com', ''),
(6, 'avinash', 'avinash', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'fss@lgmail.com', ''),
(7, 'ron', 'ron', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'vikas22chaurasia@gmail.com', ''),
(8, 'roshni chaurasiya', 'yuno', '42a0e188f5033bc65bf8d78622277c4e', 'room no254', 1234567890, 'vikas22chaurasia@gmail.com', ''),
(9, 'vikas ', 'riot', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'vikas22chaurasia@gmail.com', ''),
(10, 'ramprem', 'chaurasiya', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'vikas22chaurasia@gmail.com', ''),
(11, 'vikas ', 'zen', '01cfcd4f6b8770febfb40cb906715822', 'room no254', 1234567890, 'vikaschaurasiya@ternaengg.ac.in', 'roshni'),
(12, 'vikas chaurasiya', 'tron', '827ccb0eea8a706c4c34a16891f84e7b', 'room no254', 1234567890, 'vikas22chaurasia@gmail.com', 'hell'),
(13, 'tanjiro', 'jiro', '83be32aa81db5fdce7ded8d0a1dd863c', 'room no254', 123456789, 'Vikaschaurasiya@ternaengg.ac.in', 'demon slayer'),
(14, 'roshni', 'roshni', '89c87f73ac5f1dbe66fa45cb7cc55d3e', 'room no254', 1234567890, 'Vikaschaurasiya@ternaengg.ac.in', 'roshni'),
(15, 'aryan patil', 'aryan', 'e2071528cf1aa685779d9898ccd9b308', 'room no254', 1234567890, 'fss@lgmail.com', 'aryan');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'Pedigree Professional Large Breed Puppy Food', 'hello bfhjadbjhd,sbgvsd', '100.00', 'food-name-1988.png', 28, 'yes', 'yes'),
(10, 'Pedigree Puppy Chicken and Milk', '', '100.00', 'food-name-3345.png', 28, 'yes', 'yes'),
(11, 'Pedigree Professional Starter Mother and Pup', '', '100.00', 'food-name-5073.png', 28, 'yes', 'yes'),
(12, 'Pedigree Gravy Puppy Chicken Chunks', '', '100.00', 'food-name-9497.png', 28, 'yes', 'yes'),
(13, 'Pedigree Gravy Puppy Chicken and Liver Chunks Flavor with Vegetables', '', '100.00', 'food-name-3268.png', 28, 'yes', 'yes'),
(14, 'Pedigree Dry Puppy Meat and Milk', '', '100.00', 'food-name-6032.png', 28, 'yes', 'yes'),
(15, 'Pedigree Tasty Minis Puppy Chicken Flavour', '', '100.00', 'food-name-2405.png', 28, 'yes', 'yes'),
(16, 'Pedigree Puppy Small Dog Lamb Flavour', '', '100.00', 'food-name-5470.png', 28, 'yes', 'yes'),
(17, 'Pedigree Professional Adult Dog Food Small Breed', '', '200.00', 'food-name-9455.png', 29, 'yes', 'yes'),
(18, 'Pedigree Adult Meat Jerky Barbeque Chicken Dog Treats', '', '200.00', 'food-name-6957.png', 29, 'yes', 'yes'),
(19, 'Pedigree Dog Treats Adult Meat Jerky Stix Smoked Salmon Chew Sticks', '', '200.00', 'food-name-713.png', 29, 'yes', 'yes'),
(20, 'Pedigree Dog Treats Adult Meat Jerky Stix Grilled Liver', '', '200.00', 'food-name-8362.png', 29, 'yes', 'yes'),
(21, 'Junior Ocean Fish with Milk', '', '100.00', 'food-name-4214.png', 30, 'yes', 'yes'),
(22, 'Kitten Mackerel Flavour', '', '100.00', 'food-name-1714.png', 30, 'yes', 'yes'),
(23, 'Wet Meal Tuna in Jelly', '', '100.00', 'food-name-1346.png', 30, 'yes', 'yes'),
(24, 'Adult Cat Food Chicken In Gravy', '', '200.00', 'food-name-952.png', 31, 'yes', 'yes'),
(25, 'Adult Cat Food Fish Selection', '', '200.00', 'food-name-2672.png', 31, 'yes', 'yes'),
(26, 'Adult Cat Food Tuna in Jelly', '', '200.00', 'food-name-8305.png', 31, 'yes', 'yes'),
(27, 'Cat Food Wet Meal Ocean Fish', '', '200.00', 'food-name-7746.png', 31, 'yes', 'yes'),
(28, 'Tasty Mix Chicken Tuna And Carrot In Gravy', '', '200.00', 'food-name-9414.png', 31, 'yes', 'yes'),
(29, 'Pedigree Professional Large Breed Puppy Food', '', '45.00', 'food-name-2727.png', 28, 'yes', 'yes'),
(30, 'test', 'ddsvds sdvds sd', '500.00', 'food-name-8279.png', 29, 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `item` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_username` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `item`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`, `customer_username`, `image_name`) VALUES
(83, 'Pedigree Professional Large Breed Puppy Food', '100.00', 3, '300.00', '2022-05-06 06:11:20', 'Ordered', 'roshni', '1234567890', 'room no254', 'Vikas@gmail.com\r\n', 'roshni', 'food-name-1988.png'),
(84, 'Pedigree Professional Large Breed Puppy Food', '100.00', 2, '200.00', '2022-05-06 06:27:10', 'Ordered', 'roshni', '1234567890', 'room no254', 'Vikas@gmail.com', 'roshni', 'food-name-1988.png'),
(86, 'pet care 1 day ', '1000.00', 1, '1000.00', '2022-05-06 06:54:56', 'Ordered', 'tanjiro', '123456789', 'room no254', 'Vikas@gmail.com', 'jiro', ''),
(87, 'Pedigree Professional Large Breed Puppy Food', '100.00', 2, '200.00', '2022-05-06 07:33:10', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-1988.png'),
(88, 'Pedigree Dog Treats Adult Meat Jerky Stix Grilled Liver', '200.00', 1, '200.00', '2022-05-06 07:35:41', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-8362.png'),
(89, 'Pedigree Professional Large Breed Puppy Food', '100.00', 2, '200.00', '2022-05-06 08:34:39', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-1988.png'),
(90, 'Petsworld Dog Leash Plus Collar Blue', '200.00', 1, '200.00', '2022-05-07 06:24:38', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'accessory-name-4322.jpg'),
(91, 'test', '500.00', 1, '500.00', '2022-05-07 06:24:45', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-8279.png'),
(92, 'Pedigree Professional Large Breed Puppy Food', '100.00', 5, '500.00', '2022-05-08 10:37:06', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-1988.png'),
(93, 'Pedigree Professional Large Breed Puppy Food', '100.00', 8, '800.00', '2022-07-11 12:38:25', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-1988.png'),
(94, 'Petsworld Crystal Dog Collar And Leash Medium', '333.00', 5, '1665.00', '2022-07-11 12:39:36', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'accessory-name-8442.png'),
(95, 'Pedigree Professional Adult Dog Food Small Breed', '200.00', 3, '600.00', '2022-08-06 04:05:40', 'ordered', 'roshni', '1234567890', 'room no254', 'Vikaschaurasiya@ternaengg.ac.in', 'roshni', 'food-name-9455.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessories`
--
ALTER TABLE `accessories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessories`
--
ALTER TABLE `accessories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
