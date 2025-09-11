-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2025 at 02:00 PM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$NPklQmEUQe1MQM/vZ/Ee/u4svSGZLymuZWTv4Mq1Pnc1sTd.dKenC');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Boat'),
(4, 'HP'),
(5, 'Sony'),
(6, 'Adidas'),
(7, 'Nike');

-- --------------------------------------------------------

--
-- Table structure for table `card_details`
--

CREATE TABLE `card_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `cateogory_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `cateogory_title`) VALUES
(1, 'Electronics '),
(2, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'raya riyas', 'raya@gmail.com', 'product return', 'my product found damaged when it was delivered . i need to replace  my product as soon as possible.', '2025-09-08 17:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_pending`
--

CREATE TABLE `order_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_pending`
--

INSERT INTO `order_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, '569066709', 1, 1, 'pending'),
(2, 1, '2067275073', 20, 2, 'pending'),
(3, 1, '274260089', 4, 1, 'pending'),
(4, 1, '208674863', 22, 1, 'pending'),
(5, 1, '1881146710', 21, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Apple Iphone 14 pro', 'only 6 left, 2 day delivery , 1 year warranty by APPLE', 'iphone14,iphone14 pro, Apple iphone 14, iphone 14 purple', 1, 1, 'iphone14 pro 1.jpeg', 'iphone14.jpeg', 'iphone14new.jpeg', '1,49,900', '2025-09-08 10:14:03', 'true'),
(2, 'Apple Iphone 16 Pro Max', 'Upto 6,300 off on exchange, 2 day delivery, 1 year warranty by APPLE', 'Apple Iphone 16 Pro Max, iphone 16, iphone 16 pro', 1, 1, 'iphone 16.jpeg', 'iphone16new.jpeg', 'iphone16 .jpeg', '1,33,900', '2025-09-08 10:14:19', 'true'),
(3, 'Apple Macbook AIR M2', 'Upto 25,000 off on exchange 72,190 with bank offer', 'Apple Macbook AIR M2, macbook air, macbook m2', 1, 1, 'Manifesting MacBook Air M2 Midnight✨🪬🧿.jpeg', 'M2.jpeg', 'airm2.jpeg', '75,990', '2025-09-08 10:14:43', 'true'),
(4, 'Apple Macbook Air M4', '16 GB/256 GB SSD/macOS sequoia fast delivery', 'Apple Macbook Air M4,macbook , macbook air m4', 1, 1, 'macbookair4.jpeg', 'macbook airm4.jpeg', 'macbookm4.jpeg', '92,900', '2025-09-08 10:15:02', 'true'),
(5, 'Apple Airpods Pro', '2nd generation with MagSafe Case (USB-C) Bluetooth Headset(white true wireless)', 'Apple Airpods Pro,2nd generation, airpod', 1, 1, 'Apple AirPods Pro 2nd.jpeg', 'Apple AirPods Pro (2nd generation).jpeg', '2nd generation.jpeg', '22,990', '2025-09-08 10:15:17', 'true'),
(6, 'Apple Watch', 'Rose Gold Aluminum Pm strap Free size', 'Apple Watch', 1, 1, 'apple watch1.jpeg', 'apple watch2.jpeg', 'apple watch3.jpeg', '32,000', '2025-09-08 10:15:31', 'true'),
(7, 'Samsung Galaxy S25 Ultra', 'Galaxy S25 512 GB 12 GB RAM', 'Samsung Galaxy S25 , ultra s25', 1, 2, 'Samsung S25 Ultra.jpeg', 's25.jpeg', 'Samsung Galaxy S25 Edge.jpeg', '86,999', '2025-09-08 10:15:45', 'true'),
(8, 'Samsung Galaxy Buds3 Pro', 'Bluetooth Headset', 'Samsung Galaxy Buds3 Pro,Galaxy Buds 3', 1, 2, 'buds3.jpeg', 'Galaxy Buds 3 Pro.jpeg', 'Galaxy Buds3.jpeg', '15,685', '2025-09-08 12:37:09', 'true'),
(9, 'Samsung Galaxy Watch 7', '44mm LTE Large', 'Samsung Galaxy Watch 7', 1, 2, 'Samsung Galaxy Watch7 .jpeg', 'samsung.jpeg', 'samsung.jpeg', '23,999', '2025-09-08 12:42:08', 'true'),
(10, 'boAt  Airpods', '70Hrs Battery ASAP charge Bluetooth Headset ENx Tech', 'Boat airpods, airpods, black airpods, earbuds', 1, 3, 'Boat.jpeg', 'boat1.jpeg', 'boAt Earbuds 91 – 45H Playtime, Low Latency, Dual Mics & ASAP Charge.jpeg', '899', '2025-09-08 15:04:50', 'true'),
(11, 'boAt Stone 350', '12 hrs battery TWS 10 W Bluetooth speaker', 'boat speaker, speaker, boat, black', 1, 3, 'Boat new speakers.jpeg', 'boAt Stone 352 .jpeg', 'Boat Bluetooth speaker.jpeg', '1,599', '2025-09-08 15:07:09', 'true'),
(12, 'boAt rockerz 480', '60 hrs playback ENx Tech /bluetooth Headset', 'rockerz,boat, white,black,blue rockerz', 1, 3, 'Boat Rockerz .jpeg', 'rockrerz2.jpeg', 'rockerz1.jpeg', '1,599', '2025-09-08 15:14:08', 'true'),
(13, 'HP Pavilion AMD Ryzen', '5 hexa core-16 GB/1 TB SSD/windows 11 Home', 'laptop,hp, pavilion', 1, 4, 'hplap2.jpeg', 'hplap3.jpeg', 'hplap1.jpeg', '54,796', '2025-09-08 15:20:48', 'true'),
(14, 'HP Deskjet Printer', 'All-in-one Multi function color inkjet printer', 'printer,hp,color printer,deskjet', 1, 4, 'hpprinter3.jpeg', 'hpprinter2.jpeg', 'hpprinter1.jpeg', '5,999', '2025-09-08 15:25:11', 'true'),
(15, 'Sony Bravia 2 II', '108 cm(43inch) Ultra HD', 'TV,sony,bravia', 1, 5, 'sonytv2.jpeg', 'sonytv3.jpeg', 'sonytv1.jpeg', '41,990', '2025-09-08 15:32:27', 'true'),
(16, 'Sony WH-CH520 Headphones', '50 hrs playtime,Multipoint connection/dual pairing bluetooth set', 'headset,headphone,sony', 1, 5, 'sonyheadset2.jpeg', 'sonyheadset3.jpeg', 'sonyheadset1.jpeg', '3,990', '2025-09-08 15:37:20', 'true'),
(17, 'Adidas Men Cotton T-shirt', 'Men solid Polo Neck cotton Blend T-Shirt', 'men,cotton,t-shirt,polo neck', 2, 6, 'adidas3.jpeg', 'adidastshiert1.jpeg', 'adidas2.jpeg', '847', '2025-09-08 15:53:48', 'true'),
(18, 'Adidas Sneakers', 'Court Jam control 3 M shoes for Men', 'men,shoes,sneakers,black shoes', 2, 6, 'adidassneakers1.jpeg', 'addasshoes3.jpeg', 'Adidas Shoes.jpeg', '7,999', '2025-09-08 15:57:50', 'true'),
(19, 'Adidas Men Slides', 'all sizze available adilette men slides', 'men,slides,chappal,', 2, 6, 'adidasslides2.jpeg', 'adidasslides3.jpeg', 'slidesadidas.jpeg', '1,399', '2025-09-08 16:02:25', 'true'),
(20, 'Adidas Men full sleeve hoodie', 'Men Full Sleeve solid Hooded Sweatshirt', 'men,hoodie,hooded,sweatshirt,adidas', 2, 6, 'hoodieadidas2.jpeg', 'hoodieadidas1.jpeg', 'hoodieadidas3.jpeg', '2,319', '2025-09-08 16:06:26', 'true'),
(21, 'Nike Lace sneakers Boys', 'Lace shoes for men', 'boys,men,lace shoe,nike', 2, 7, 'nikeshoe3.jpeg', 'nikeshoe2.jpeg', 'nikeshoe1.jpeg', '6,206', '2025-09-08 16:10:06', 'true'),
(22, 'nike Backpack Air', 'Medium 21 L Backpack Air Black', 'medium,backpack,black,nike', 2, 7, 'nikebackpack3.jpeg', 'nikebackpack2.jpeg', 'nikebackpaper1.jpeg', '1,425', '2025-09-08 16:15:21', 'true'),
(23, 'Adidas Backpack', 'small 17 L backpack ', 'backpack,adidas,small', 2, 6, 'adidasbackpack1.jpeg', 'adidasbackpack.jpeg', 'adidasbackpack2.jpeg', '1,139', '2025-09-08 16:17:50', 'true'),
(24, 'Adidas Ice Deo Deodarant', 'Ice Deodarant Spray for men (150 ml)', 'spray,men,deodarant', 2, 6, 'adidas spray1.jpeg', 'adidas spary2.jpeg', 'adidasspray3.jpeg', '275', '2025-09-09 19:28:48', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 1, 569066709, 1, '2025-09-08 18:44:24', 'Complete'),
(2, 1, 14, 2067275073, 2, '2025-09-09 19:19:57', 'Complete'),
(3, 1, 92900, 274260089, 1, '2025-09-09 12:02:19', 'Complete'),
(4, 1, 1425, 208674863, 1, '2025-09-09 19:20:05', 'Complete'),
(5, 1, 6206, 1881146710, 1, '2025-09-09 19:20:12', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 569066709, 1, 'UPI', '2025-09-08 18:44:24'),
(2, 3, 274260089, 92900, 'UPI', '2025-09-09 12:02:19'),
(3, 2, 2067275073, 14, 'Net banking', '2025-09-09 19:19:57'),
(4, 4, 208674863, 1425, 'Cash on delivery', '2025-09-09 19:20:05'),
(5, 5, 1881146710, 6206, 'Pay offline', '2025-09-09 19:20:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'shamna', 'shamna@gmail.com', '$2y$10$BXUMe3M3CGtwktMp/eSv5O8uQwmFDFzNQYO5PcbUcohpHtHLl8MP6', 'profile.jpeg', '::1', 'UAE', '987654321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `card_details`
--
ALTER TABLE `card_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_pending`
--
ALTER TABLE `order_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_pending`
--
ALTER TABLE `order_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
