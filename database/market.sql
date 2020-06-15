-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 11:01 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `item_id` int(11) NOT NULL,
  `item_brand` varchar(200) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` double(10,2) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `item_register` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`item_id`, `item_brand`, `item_name`, `item_price`, `item_image`, `item_register`) VALUES
(1, 'Cannon', 'SLR Camera', 1200.00, './assets/products/1.jpg', '2020-03-28 11:08:57'), -- NOW()
(2, 'Dji', 'Inspire', 1000.00, './assets/products/2.jpg', '2020-03-28 11:08:57'),
(3, 'Dji', 'Phantom', 500.00, './assets/products/3.jpg', '2020-03-28 11:08:57'),
(4, 'Zarks', 'Spicy Wings', 5.00, './assets/products/4.jpg', '2020-03-28 11:08:57'),
(5, 'Zarks', 'Burger', 4.80, './assets/products/5.jpg', '2020-03-28 11:08:57'),
(6, 'Burger King', 'Whooper', 3.00, './assets/products/6.jpg', '2020-03-28 11:08:57'),
(7, 'Wendys', 'Wendys Pasta', 3.70, './assets/products/7.jpg', '2020-03-28 11:08:57'),
(8, 'Apple', 'Iphone X', 122.00, './assets/products/8.jpg.', '2020-03-28 11:08:57'),
(9, 'Samsung', 'Samsung FLAT TV', 152.00, './assets/products/9.jpg', '2020-03-28 11:08:57'),
(10, 'Samsung', 'Samsung Galaxy S7', 152.00, './assets/products/10.jpg', '2020-03-28 11:08:57'),
(11, 'Apple', 'Apple Macbook Pro', 1250.00, './assets/products/11.jpg', '2020-03-28 11:08:57'),
(12, 'Apple', 'Apple iPhone X', 300.00, './assets/products/12.jpg', '2020-03-28 11:08:57'),
(13, 'Samsung', 'O-LED 56" TV', 900.00, './assets/products/13.jpg', '2020-03-28 11:08:57'),
(14, 'Apple', 'Apple Macbook', 900.00, './assets/products/14.jpg', '2020-03-28 11:08:57'),
(15, 'Cannon', 'DSLR Camera', 900.00, './assets/products/15.jpg', '2020-03-28 11:08:57'),
(16, 'Acer', 'Gaming Laptop', 900.00, './assets/products/16.jpg', '2020-03-28 11:08:57');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` LONGTEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `email`, `password`) VALUES
(1, 'Cris', 'cris@ymail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `cart_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
