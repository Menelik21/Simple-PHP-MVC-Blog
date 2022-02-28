-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 07:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `art_id` int(11) NOT NULL,
  `art_title` varchar(50) NOT NULL,
  `art_body` longtext NOT NULL,
  `art_image` varchar(50) DEFAULT NULL,
  `art_authorid` int(11) UNSIGNED NOT NULL,
  `art_category` int(11) DEFAULT NULL,
  `art_view` int(11) DEFAULT NULL,
  `art_created_date` datetime DEFAULT current_timestamp(),
  `art_update_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_detail` int(11) DEFAULT NULL,
  `com_userid` int(10) UNSIGNED NOT NULL,
  `com_articleid` int(11) NOT NULL,
  `com_created_date` int(11) DEFAULT NULL,
  `com_updated_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postcategory`
--

CREATE TABLE `postcategory` (
  `pc_id` int(11) NOT NULL,
  `pc_categorytitle` varchar(50) DEFAULT NULL,
  `pc_categorydesc` mediumtext DEFAULT NULL,
  `pc_createddate` datetime DEFAULT current_timestamp(),
  `pc_updatedate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_userid` int(11) UNSIGNED NOT NULL,
  `us_username` varchar(50) NOT NULL DEFAULT '',
  `us_firstname` varchar(50) NOT NULL DEFAULT '',
  `us_lastname` varchar(50) NOT NULL DEFAULT '',
  `us_gender` enum('M','F') NOT NULL,
  `us_email` varchar(50) NOT NULL DEFAULT '',
  `us_password` mediumtext NOT NULL,
  `us_regdate` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Registered date',
  `us_updatedate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`art_id`),
  ADD KEY `FK_article_postcategory` (`art_category`),
  ADD KEY `FK_article_users` (`art_authorid`) USING BTREE;

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `FK__users` (`com_userid`),
  ADD KEY `FK__article` (`com_articleid`);

--
-- Indexes for table `postcategory`
--
ALTER TABLE `postcategory`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_userid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_article_postcategory` FOREIGN KEY (`art_category`) REFERENCES `postcategory` (`pc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_article_users` FOREIGN KEY (`art_authorid`) REFERENCES `users` (`us_userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK__article` FOREIGN KEY (`com_articleid`) REFERENCES `article` (`art_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK__users` FOREIGN KEY (`com_userid`) REFERENCES `users` (`us_userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
