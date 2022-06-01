-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 01, 2022 at 08:21 PM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` varchar(50) DEFAULT NULL,
  `productPrice` float DEFAULT NULL,
  `productImage` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `productPrice`, `productImage`) VALUES
(1, 'Anti Fragile', 10.99, 'image/Antifragile%20by%20Nicholas%20Taleb.jpeg'),
(2, 'Ender\'s Game', 11.99, 'image/Enders%20Game%20by%20Scott%20Orson.jpeg'),
(3, 'How to Win Friends and Influence People', 12.99, 'image/How%20to%20win%20friends%20and%20influence%20people%20by%20Dale%20Carnagie.jpeg'),
(4, 'Ready Player One', 13.99, 'image/Ready%20Player%20One%20by%20Ernest%20Cline.jpeg'),
(5, 'The Millionaire Next Door', 14.99, 'image/The%20millionaire%20next%20door%20by%20Thomas%20Stanley.jpeg'),
(6, 'The Brothers Karamazov', 15.99, 'image/The%20brothers%20Karamazov%20by%20Fyodor%20Dostoyevsky.jpeg'),
(7, 'The Evolution of Desire', 16.99, 'image/The%20evolution%20of%20desire%20by%20David%20M.%20Buss.jpeg'),
(8, 'The Handbook of Vitamins', 20.99, 'image/The%20Handbook%20of%20Vitamins.jpeg'),
(9, 'The Holy Bible', 5.99, 'image/The%20Holy%20Bible.jpeg'),
(10, 'The 48 laws of power', 6.69, 'image/The%2048%20laws%20of%20power%20by%20Robert%20Greene.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pwdReset`
--

CREATE TABLE `pwdReset` (
  `pwdResetID` int(11) NOT NULL,
  `pwdResetEmail` text NOT NULL,
  `pwdResetSelector` text NOT NULL,
  `pwdResetToken` longtext NOT NULL,
  `pwdResetExpires` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pwdReset`
--

INSERT INTO `pwdReset` (`pwdResetID`, `pwdResetEmail`, `pwdResetSelector`, `pwdResetToken`, `pwdResetExpires`) VALUES
(10, 'motococtavian18@gmail.com', 'b5f42d19dd7e7731', '$2y$10$.quh5FspHfqWL5MmQpYPuurF3AmE1T2UTUPnnlonzJxBZdm7fWcte', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersID` int(11) NOT NULL,
  `usersFirstName` varchar(128) NOT NULL,
  `usersLastName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPassword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersID`, `usersFirstName`, `usersLastName`, `usersEmail`, `usersPassword`) VALUES
(5, 'Octavian', 'Motoc', 'motococtavian71@gmail.com', '$2y$10$Xp.TBKLacHTQCcGA/ZMjqO7.jznLFY3aXI6cgjM5dUjT9PUR8v7Ta'),
(6, 'Octavian', 'Motoc', 'motococtavian18@gmail.com', '$2y$10$PkGMBqfDK.gYIREhNnK2POqVj2SmzEUcxHzMWCuBY0QP82uTzjY3y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pwdReset`
--
ALTER TABLE `pwdReset`
  ADD PRIMARY KEY (`pwdResetID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pwdReset`
--
ALTER TABLE `pwdReset`
  MODIFY `pwdResetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
