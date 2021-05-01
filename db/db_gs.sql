-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 05:32 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gs`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_shorturl`
--

CREATE TABLE `tb_shorturl` (
  `id` int(7) NOT NULL,
  `shorturl` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fullurl` text COLLATE utf8_unicode_ci NOT NULL,
  `view` int(10) NOT NULL DEFAULT '0',
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_shorturl`
--

INSERT INTO `tb_shorturl` (`id`, `shorturl`, `fullurl`, `view`, `ip`, `created_date`) VALUES
(6, '1reix', 'https://haiphee.com', 17, '[::1]', '2021-04-30 09:14:17'),
(20, 'YhLxP', 'https://thagoob.go.th', 0, '[::1]', '2021-04-30 17:16:18'),
(30, '1Qd3b', 'http://google.com', 0, '[::1]', '2021-04-30 17:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_shorturl`
--
ALTER TABLE `tb_shorturl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shorturl` (`shorturl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_shorturl`
--
ALTER TABLE `tb_shorturl`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
