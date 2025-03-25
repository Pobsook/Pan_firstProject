-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2025 at 08:36 PM
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
(4, 'O base', 'ขาไม้ Walnut จากอเมริกา สวย ดูหรูหรามีระดับ', 'O-base.png', 'recliner_chair', 35000.00),
(5, 'R base', 'ขาไม้ยาง มีความแข็งแรง เรียบง่าย', 'R-base.png', 'recliner_chair', 27000.00),
(6, 'P base', 'ขา Black Steel แข็งแรง ดุดัน', 'P-base.png', 'recliner_chair', 32000.00),
(7, 'X base', 'ขา Aluminum die cast มีความแข็งแรง ไม่ขึ้นสนิม', 'X-base.png', 'recliner_chair', 31000.00),
(9, 'Office chair', 'ขา Aluminum มีล้อ จาก นำเข้าจาก Tente ฝรั่งเศษ', 'Angelo_office_chair.jpg', 'office_chair', 31000.00),
(10, 'Motor chair', 'Ogin german motor แข็งแรงทนทาน', 'RXC_ZENVO.png', 'motor_chair', 65000.00),
(11, '2.7S +1C', 'โซฟา Recliner ขนาดที่นั่งละ 73cm 2 ที่นั่ง + 1 Chaise slide', '', 'recliner_sofa', 125000.00),
(12, '1 Seat', 'ขนาด 1 ที่นั่ง', '', 'sofa_fix', 50000.00),
(13, '2 Seat', 'ขนาด 2 ที่นั่ง', '', 'sofa_fix', 90000.00),
(14, '3 Seat', 'ขนาด 3 ที่นั่ง', '', 'sofa_fix', 120000.00),
(15, '2S + 1C', 'ขนาด 2 seat + 1 chaise', '', 'sofa_fix', 135000.00),
(16, 'Motor2 Seat', 'โซฟาไฟฟ้า ขนาด 2 seat', '', 'motor_sofa', 120000.00),
(17, 'Motor3 Seat', 'โซฟาไฟฟ้า ขนาด 3 seat', '', 'motor_sofa', 165000.00),
(18, 'Motor 2S +1C', 'โซฟาไฟฟ้า ขนาด 2 seat + 1 chaise', '', 'motor_sofa', 180000.00);

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
(35, 'RXC ZENVO', 'motor_chair', 'RXC_ZENVO.png'),
(36, 'RXC ANGELO', 'motor_chair', 'RXC_ANGELO.png'),
(37, 'RXC VERRA', 'motor_chair', 'RXC_VERRA.png'),
(38, 'RXC CICIO', 'motor_chair', 'RXC_CICIO.png'),
(39, 'Davos', 'recliner_sofa', 'Davos.png'),
(40, 'Luneno', 'recliner_sofa', 'Luneno.png'),
(41, 'Huayra', 'recliner_sofa', 'Huayra.png'),
(42, 'Essa', 'recliner_sofa', 'essa.png'),
(43, 'Porto', 'recliner_sofa', 'Porto.png'),
(44, 'Munoz', 'sofa_fix', 'Munoz.png'),
(45, 'Maison', 'sofa_fix', 'Maison.png'),
(46, 'Ricci', 'sofa_fix', 'Ricci.png'),
(47, 'Maxilano', 'sofa_fix', 'Maxilano.png'),
(48, 'Vitroro', 'sofa_fix', 'Vitroro.png'),
(49, 'Angelo', 'recliner_sofa', 'Angelo.png'),
(51, 'Messetto', 'motor_sofa', 'Messetto.png'),
(52, 'Violetta', 'motor_sofa', 'Violetta.png'),
(53, 'Favino', 'motor_sofa', 'Favino.png'),
(54, 'Sorocco', 'motor_sofa', 'Sorocco.png'),
(55, 'Castillo', 'motor_sofa', 'Castillo.png'),
(56, 'Casapepe', 'motor_sofa', 'Casapepe.png');

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
(56, 8, 'Alfredo', 'R-base', NULL, 'luwak_latte', NULL, 3, 81000.00, 1),
(57, 8, 'Alfredo', 'O-base', NULL, 'filico_aqua', NULL, 1, 35000.00, 1),
(62, 8, 'Reserve', 'office_chair', NULL, 'jamon_caramel', NULL, 2, 62000.00, 1),
(65, 5, 'RXC_ANGELO', 'motor_chair', NULL, 'ferrari_red', NULL, 2, 130000.00, 1),
(68, 5, 'Ricci', '2S + 1C', NULL, 'luwak_latte', NULL, 1, 135000.00, 1),
(71, 5, 'Forte', 'O base', NULL, 'Blu De Nord', NULL, 3, 126000.00, 1);

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
(1, 'Paris Noir', 'centurian_leather', '', '1739190406_paris_noir_centurian_leather.png'),
(2, 'Blu De Nord', 'centurian_leather', '', 'blu_de_nord_centurian_leather.png'),
(3, 'Diamond Blanc', 'natural_leather', '', 'diamond_blanc_natural_leather.jpg'),
(4, 'Hermes tan', 'natural_leather', '', 'hermes_tan_natural_leather.jpg'),
(5, 'Filico_Aqua', 'natural_leather', '', 'filico_aqua_natural_leather.jpg'),
(6, 'Jamon Caramel', 'natural_leather', '', 'jamon_caramel_natural_leather.jpg'),
(7, 'Moet Green', 'natural_leather', '', 'moet_green_natural_leather.jpg'),
(8, 'Ferrari Red', 'natural_leather', '', 'ferrari_red_natural_leather.jpg'),
(9, 'Luwak latte', 'natural_leather', '', 'luwak_latte_natural_leather.jpg'),
(10, 'Lilac Rose', 'natural_leather', '', 'lilac_rose_natural_leather.jpg'),
(11, 'Bohemian Blue', 'natural_leather', '', 'bohemian_blue_natural_leather.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

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
  MODIFY `id_description` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `model`
--
ALTER TABLE `model`
  MODIFY `id_model` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
