-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2021 at 01:25 AM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ISBN` varchar(225) DEFAULT NULL,
  `Title` varchar(225) DEFAULT NULL,
  `Author` varchar(225) DEFAULT NULL,
  `Edition` int(225) DEFAULT NULL,
  `Publication` varchar(225) DEFAULT NULL,
  `Quantity` int(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ISBN`, `Title`, `Author`, `Edition`, `Publication`, `Quantity`) VALUES
('ABC123', 'Harry Potter and the half blood prince ', 'J.K. Rowling', 2001, 'Bloomsberry', 15),
('ABC124', 'Diary of a Wimpy Kid', 'Jeff Kinney', 2004, 'Notion Press Publishing', 17),
('ABC125', 'Half Girlfriend', 'Chetan Bhagat', 2007, 'Bloomsberry', 25),
('ABC126', 'Goosebumps', 'R.L.Stine', 2005, 'Notion Press Publishing', 34),
('ABC127', 'Story of my life', 'Helen Keler', 2008, 'Maple Press Pvt Ltd', 56),
('ABC120', 'Percy Jackson', 'Rick Riordan', 2001, 'Notion Press Publishing', 45);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `parentId` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `created_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `parentId`, `status`, `created_on`) VALUES
(1, 'Cat1', 0, 0, '2021-10-09 11:55:25'),
(2, 'Cat2', 0, 0, '2021-10-09 11:59:16'),
(3, 'Cat3', 0, 1, '2021-10-09 12:06:58'),
(4, 'Cat4', 0, 1, '2021-10-09 13:02:52'),
(5, 'Cat5', 0, 1, '2021-10-09 13:31:47'),
(6, 'Cat6', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Tester', 'admin@testing.com', '9588133250', 'Testing 1st time', '2021-11-27 22:13:55'),
(2, 'Tester1', 'admin1@testing.com', '9306554896', 'Testing 2nd time', '2021-11-27 22:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_desc` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `meta_title` varchar(2000) NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `categories_id`, `name`, `mrp`, `price`, `qty`, `image`, `short_desc`, `description`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(1, 1, 'Test1', 90, 70, 55, 'image', 'short desc', 'description', '', '', '', 1),
(2, 2, 'Test2', 56, 34, 22, '6013660_1633430069564.jpg', 'Short desc', '', 'Meta Title', 'Meta Desc', 'Meta Keyword', 1),
(3, 3, 'Test3', 55, 45, 22, '3795027_IMG_20210511_214037-min.jpg', 'test', '', 'test', 'test', 'test', 1),
(4, 3, 'Test4', 99, 59, 44, '3715123_IMG_20210511_214037-min.jpg', 'testing', '', 'testing', 'testing', 'testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `store_user`
--

CREATE TABLE `store_user` (
  `id` int(255) NOT NULL,
  `name` char(255) DEFAULT NULL,
  `phone` bigint(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Usertype` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_user`
--

INSERT INTO `store_user` (`id`, `name`, `phone`, `email`, `Password`, `Usertype`) VALUES
(1, 'Vishwas Kheterpal', 9588133250, 'vishwaskheterpal@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `usertype` varchar(22) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD UNIQUE KEY `ISBN` (`ISBN`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_user`
--
ALTER TABLE `store_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_user`
--
ALTER TABLE `store_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
