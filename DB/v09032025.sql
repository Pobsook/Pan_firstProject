-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2025 at 04:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_zedere`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(10) NOT NULL,
  `username_account` varchar(20) NOT NULL,
  `email_account` varchar(50) NOT NULL,
  `role_account` varchar(255) DEFAULT NULL,
  `password_account` varchar(200) NOT NULL,
  `login_count_account` int(10) DEFAULT NULL,
  `lock_account` int(10) DEFAULT NULL,
  `ban_account` datetime DEFAULT NULL,
  `image_account` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username_account`, `email_account`, `role_account`, `password_account`, `login_count_account`, `lock_account`, `ban_account`, `image_account`) VALUES
(5, 'oPaNoO', 'pobsook999@gmail.com', 'Admin', '$argon2id$v=19$m=65536,t=4,p=1$L1lTOVFQOWRsaThCSVJhTA$aPNp8dgoBsqImr0dvrX656uiN1p7xzn6U5Vwv9vinAs', 0, 0, NULL, ''),
(6, 'pupech', 'pupech@gmail.com', 'user', '$argon2id$v=19$m=65536,t=4,p=1$YXZoMkpCMmlQVGRtWTV1YQ$4/4YDDjHczOWDy41NpGaYBl7PViiJwn+HVggItoiUak', 0, 0, NULL, ''),
(7, 'ploychompoo', 'ploychompoo@gmail.com', 'user', '$argon2id$v=19$m=65536,t=4,p=1$YzlDOE9hbVpvYlIxM256Qw$r52LtZng61HJtawWFW2ytvY4Ie1V28mAIgtD+zEtQB8', 0, 0, NULL, ''),
(8, 'tinridoki', 'tinridoki@gmail.com', 'user', '$argon2id$v=19$m=65536,t=4,p=1$N0Vhbk5CMVFMYUIuMlBOSA$iyzuEnSshjyOXYKzYXJApLA2VERJu1Ohhig9tKpzO7s', 0, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id_address` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `address_ac` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `add_on`
--

CREATE TABLE `add_on` (
  `id_add_on` int(11) NOT NULL,
  `add_on_name` varchar(255) NOT NULL,
  `add_on_detail` varchar(255) NOT NULL,
  `add_on_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_on`
--

INSERT INTO `add_on` (`id_add_on`, `add_on_name`, `add_on_detail`, `add_on_img`) VALUES
(1, 'NO ARM', 'ไม่มีแขนทั้ง 2 ฝั่ง', '');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_detail` varchar(255) NOT NULL,
  `color_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

CREATE TABLE `description` (
  `id_description` int(11) NOT NULL,
  `description_name` varchar(255) NOT NULL,
  `description_detail` varchar(255) NOT NULL,
  `description_img` text NOT NULL,
  `description_type` varchar(50) NOT NULL,
  `price` decimal(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id_description`, `description_name`, `description_detail`, `description_img`, `description_type`, `price`) VALUES
(1, '1.7 SEATER', 'โซฟา Recliner ขนาดที่นั่งละ 73cm 1 ที่นั่ง', '', 'recliner_sofa', 40000.00),
(2, '2.7 SEATER', 'โซฟา Recliner ขนาดที่นั่งละ 73cm 2 ที่นั่ง', '', 'recliner_sofa', 75000.00),
(3, '3.7 SEATER', 'โซฟา Recliner ขนาดที่นั่งละ 73cm 3 ที่นั่ง', '', 'recliner_sofa', 105000.00),
(4, 'O-base', '', 'O-base.png', 'recliner_chair', 35000.00),
(5, 'R-base', '', 'R-base.png', 'recliner_chair', 27000.00),
(6, 'P-base', '', 'P-base.png', 'recliner_chair', 32000.00),
(7, 'X-base', '', 'X-base.png', 'recliner_chair', 31000.00),
(9, 'office_chair', '', 'Angelo_office_chair.jpg', 'office_chair', 31000.00),
(10, 'motor_chair', 'motor_chair', 'RXC_ZENVO.png', 'motor_chair', 65000.00);

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `model_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `model_name`, `product_type`, `model_img`) VALUES
(1, 'Angelo', 'recliner_chair', '1739259813_Angelo_recliner_chair.png'),
(2, 'Alfredo', 'recliner_chair', 'Alfredo_recliner_chair.png'),
(3, 'Atera', 'recliner_chair', 'Atera_recliner_chair.png'),
(4, 'Aventa', 'recliner_chair', 'Aventa_recliner_chair.png'),
(5, 'Bella', 'recliner_chair', 'Bella_recliner_chair.png'),
(6, 'Berlino', 'recliner_chair', 'Berlino_recliner_chair.png'),
(7, 'Devon', 'recliner_chair', 'Devon_recliner_chair.png'),
(8, 'Forte', 'recliner_chair', 'Forte_recliner_chair.png'),
(10, 'Mello', 'recliner_chair', 'Mello_recliner_chair.png'),
(11, 'Duca', 'sofa_fix', 'duca_sofa_fix.png'),
(13, 'Aventa', 'recliner_sofa', 'Aventa_recliner_sofa.png'),
(25, 'Reserve', 'office_chair', 'Reserve_office_chair.png'),
(26, 'Angelo', 'office_chair', 'Angelo_office_chair.jpg'),
(27, 'Alfredo', 'office_chair', 'Alfredo_office_chair.jpg'),
(28, 'Lexus', 'office_chair', 'Lexus_office_chair.jpg'),
(29, 'CEO', 'office_chair', 'CEO_office_chair.png'),
(30, 'Founder', 'office_chair', 'Founder_office_chair.png'),
(31, 'President', 'office_chair', 'President_office_chair.png'),
(32, 'Porto', 'recliner_chair', 'Porto_recliner_chair.png'),
(33, 'Audi', 'recliner_chair', 'Audi_recliner_chair.png'),
(34, 'Luneno', 'recliner_chair', 'Luneno_recliner_chair.png'),
(35, 'RXC_ZENVO', 'motor_chair', 'RXC_ZENVO.png'),
(36, 'RXC_ANGELO', 'motor_chair', 'RXC_ANGELO.png'),
(37, 'RXC_VERRA', 'motor_chair', 'RXC_VERRA.png'),
(38, 'RXC_CICIO', 'motor_chair', 'RXC_CICIO.png');

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `id_account` int(10) NOT NULL,
  `name_or_company` varchar(255) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `id_card_or_passport` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `upholstery` varchar(255) NOT NULL,
  `add_on` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `id_account`, `model`, `description`, `color`, `upholstery`, `add_on`, `quantity`, `price`, `status_product`) VALUES
(4, 6, 'Aventa', 'R-base', NULL, 'luwak_latte', NULL, 1, 27000.00, 1),
(5, 6, 'Atera', 'P-base', NULL, 'blu_de_nord', NULL, 1, 38400.00, 1),
(6, 7, 'Devon', 'X-base', NULL, 'bohemian_blue', NULL, 1, 31000.00, 1),
(19, 7, 'Alfredo', 'R-base', NULL, 'blu_de_nord', NULL, 1, 32400.00, 1),
(20, 6, 'Luneno', 'R-base', NULL, 'blu_de_nord', NULL, 1, 32400.00, 1),
(39, 6, 'Porto', 'P-base', NULL, 'hermes_tan', NULL, 2, 64000.00, 1),
(44, 5, 'Atera', 'X-base', NULL, 'jamon_caramel', NULL, 3, 93000.00, 1),
(47, 5, 'Berlino', 'X-base', NULL, 'luwak_latte', NULL, 2, 62000.00, 1),
(48, 5, 'Forte', 'P-base', NULL, 'paris_noir', NULL, 2, 76800.00, 1),
(49, 5, 'Bella', 'O-base', NULL, 'lilac_rose', NULL, 2, 70000.00, 1),
(52, 5, 'Forte', 'X-base', NULL, 'ferrari_red', NULL, 3, 93000.00, 1),
(56, 8, 'Alfredo', 'R-base', NULL, 'luwak_latte', NULL, 3, 81000.00, 1),
(57, 8, 'Alfredo', 'O-base', NULL, 'filico_aqua', NULL, 1, 35000.00, 1),
(62, 8, 'Reserve', 'office_chair', NULL, 'jamon_caramel', NULL, 2, 62000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `id_account` int(11) NOT NULL,
  `id_sale_order` int(10) NOT NULL,
  `id_product1` int(11) NOT NULL,
  `id_product2` int(11) DEFAULT NULL,
  `id_product3` int(11) DEFAULT NULL,
  `id_product4` int(11) DEFAULT NULL,
  `id_product5` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `total_price` decimal(8,0) NOT NULL,
  `delivery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upholstery_color`
--

CREATE TABLE `upholstery_color` (
  `id_upholstery` int(11) NOT NULL,
  `upholstery_color_name` varchar(255) NOT NULL,
  `upholstery_color_type` varchar(255) NOT NULL,
  `upholstery_color_detail` varchar(255) NOT NULL,
  `upholstery_color_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upholstery_color`
--

INSERT INTO `upholstery_color` (`id_upholstery`, `upholstery_color_name`, `upholstery_color_type`, `upholstery_color_detail`, `upholstery_color_img`) VALUES
(1, 'paris_noir', 'centurian_leather', '', '1739190406_paris_noir_centurian_leather.png'),
(2, 'blu_de_nord', 'centurian_leather', '', 'blu_de_nord_centurian_leather.png'),
(3, 'diamond_blanc', 'natural_leather', '', 'diamond_blanc_natural_leather.jpg'),
(4, 'hermes_tan', 'natural_leather', '', 'hermes_tan_natural_leather.jpg'),
(5, 'filico_aqua', 'natural_leather', '', 'filico_aqua_natural_leather.jpg'),
(6, 'jamon_caramel', 'natural_leather', '', 'jamon_caramel_natural_leather.jpg'),
(7, 'moet_green', 'natural_leather', '', 'moet_green_natural_leather.jpg'),
(8, 'ferrari_red', 'natural_leather', '', 'ferrari_red_natural_leather.jpg'),
(9, 'luwak_latte', 'natural_leather', '', 'luwak_latte_natural_leather.jpg'),
(10, 'lilac_rose', 'natural_leather', '', 'lilac_rose_natural_leather.jpg'),
(11, 'bohemian_blue', 'natural_leather', '', 'bohemian_blue_natural_leather.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_address`);

--
-- Indexes for table `add_on`
--
ALTER TABLE `add_on`
  ADD PRIMARY KEY (`id_add_on`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `description`
--
ALTER TABLE `description`
  ADD PRIMARY KEY (`id_description`);

--
-- Indexes for table `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id_model`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`id_sale_order`);

--
-- Indexes for table `upholstery_color`
--
ALTER TABLE `upholstery_color`
  ADD PRIMARY KEY (`id_upholstery`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_on`
--
ALTER TABLE `add_on`
  MODIFY `id_add_on` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `description`
--
ALTER TABLE `description`
  MODIFY `id_description` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `id_sale_order` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upholstery_color`
--
ALTER TABLE `upholstery_color`
  MODIFY `id_upholstery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
