-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 04:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `burgercode_fini`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`,`lang`) VALUES
(1, 'Menus', 'en'),
(2, 'Burgers', 'en'),
(3, 'Snacks', 'en'),
(4, 'Salads', 'en'),
(5, 'Beverages', 'en'),
(6, 'Desserts', 'en'),
(7, 'Menu', 'es'),
(8, 'Hamburgesas', 'es'),
(9, 'Aperitivos', 'es'),
(10, 'Ensaladas', 'es'),
(11, 'Bebidas', 'es'),
(12, 'Postres', 'es');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `price`, `image`, `category`) VALUES
(1, 'Classic Menu', 'Sandwich: Burger, Salad, Tomato, Gherkin + Fries + Drink', 8.9, 'm1.png', 1),
(2, 'Bacon Menu', 'Sandwich: Burger, Cheese, Bacon, Salad, Tomato + Fries + Beverage', 9.5, 'm2.png', 1),
(3, 'Big Menu', 'Sandwich: Double Burger, Cheese, Gherkin, Salad + Fries + Beverage', 10.9, 'm3.png', 1),
(4, 'Menu Chicken', 'Sandwich: Fried Chicken, Tomato, Salad, Mayonnaise + Fries + Beverage', 9.9, 'm4.png', 1),
(5, 'Fish Menu', 'Sandwich: Fish, Salad, Mayonnaise, Gherkin + Fries + Beverage', 10.9, 'm5.png', 1),
(6, 'Double Steak Menu', 'Sandwich: Double Burger, Cheese, Bacon, Salad, Tomato + Fries + Beverage', 11.9, 'm6.png', 1),
(7, 'Classic', 'Sandwich: Burger, Salad, Tomato, Gherkin', 5.9, 'b1.png', 2),
(8, 'Bacon', 'Sandwich: Burger, Cheese, Bacon, Salad, Tomato', 6.5, 'b2.png', 2),
(9, 'Big', 'Sandwich: Double Burger, Cheese, Gherkin, Salad', 6.9, 'b3.png', 2),
(10, 'Chicken', 'Sandwich: Fried Chicken, Tomato, Salad, Mayonnaise', 5.9, 'b4.png', 2),
(11, 'Fish', 'Sandwich: Breaded Fish, Salad, Mayonnaise, Gherkin', 6.5, 'b5.png', 2),
(12, 'Double Steak', 'Sandwich: Double Burger, Cheese, Bacon, Salad, Tomato', 7.5, 'b6.png', 2),
(13, 'Fries', 'French fries', 3.9, 's1.png', 3),
(14, 'Onion Rings', 'Fried onion rings', 3.4, 's2.png', 3),
(15, 'Nuggets', 'Fried chicken nuggets', 5.9, 's3.png', 3),
(16, 'Nuggets Cheese', 'Fried Nuggets of Cheese', 3.5, 's4.png', 3),
(17, 'Chicken Wings', 'Barbecue Chicken Wings', 5.9, 's5.png', 3),
(18, 'Caesar Chicken Breaded', 'Breaded Chicken, Salad, Tomato and the famous Caesar sauce', 8.9, 'sa1.png', 4),
(19, 'Caesar Grilled Chicken', 'Grilled Chicken, Salad, Tomato and the famous Caesar sauce', 8.9, 'sa2.png', 4),
(20, 'Light Salad', 'Salad, Tomato, Cucumber, Maize and Balsamic Vinegar', 5.9, 'sa3.png', 4),
(21, 'Breaded Chicken', 'Breaded Chicken, Salad, Tomato and the sauce of your choice', 7.9, 'sa4.png', 4),
(22, 'Grilled chicken', 'Grilled chicken, Salad, Tomato and sauce of your choice', 7.9, 'sa5.png', 4),
(23, 'Coca-Cola', 'Choice: Small, Medium or Large', 1.9, 'bo1.png', 5),
(24, 'Coca-Cola Light', 'Choice: Small, Medium or Large', 1.9, 'bo2.png', 5),
(25, 'Coca-Cola Zero', 'Optional: Small, Medium or Large', 1.9, 'bo3.png', 5),
(26, 'Fanta', 'Choice: Small, Medium or Large', 1.9, 'bo4.png', 5),
(27, 'Sprite', 'Choice: Small, Medium or Large', 1.9, 'bo5.png', 5),
(28, 'Nestea', 'Choice: Small, Medium or Large', 1.9, 'bo6.png', 5),
(29, 'Chocolate fondant', 'To choose: White chocolate or milk', 4.9, 'd1.png', 6),
(30, 'Muffin', 'Choice: Fruit or chocolate', 2.9, 'd2.png', 6),
(31, 'Donut', 'Choice: Chocolate or vanilla', 2.9, 'd3.png', 6),
(32, 'Milkshake', 'Choice: Strawberry, Vanilla or Chocolate', 3.9, 'd4.png', 6),
(33, 'Sundae', 'Optional: Strawberry, Caramel or Chocolate', 4.9, 'd5.png', 6),
(34, 'Classic Menu', 'Sandwich: Burger, Salad, Tomato, Gherkin + Fries + Beverage', 8.9, 'm1.png', 7),
(35, 'Bacon Menu', 'Sandwich: Burger, Cheese, Bacon, Salad, Tomato + Fries + Beverage', 9.5, 'm2.png', 7),
(36, 'Big Menu', 'Sandwich: Double Burger, Cheese, Gherkin, Salad + Fries + Beverage', 10.9, 'm3.png', 7),
(37, 'Menu Chicken', 'Sandwich: Fried Chicken, Tomato, Salad, Mayonnaise + Fries + Beverage', 9.9, 'm4.png', 7),
(38, 'Fish Menu', 'Sandwich: Fish, Salad, Mayonnaise, Gherkin + Fries + Beverage', 10.9, 'm5.png', 7),
(39, 'Double Steak Menu', 'Sandwich: Double Burger, Cheese, Bacon, Salad, Tomato + Fries + Beverage', 11.9, 'm6.png', 7),
(40, 'Classic', 'Sandwich: Burger, Salad, Tomato, Gherkin', 5.9, 'b1.png', 8),
(41, 'Bacon', 'Sandwich: Burger, Cheese, Bacon, Salad, Tomato', 6.5, 'b2.png', 8),
(42, 'Big', 'Sandwich: Double Burger, Cheese, Gherkin, Salad', 6.9, 'b3.png', 8),
(43, 'Chicken', 'Sandwich: Fried Chicken, Tomato, Salad, Mayonnaise', 5.9, 'b4.png', 8),
(44, 'Fish', 'Sandwich: Breaded Fish, Salad, Mayonnaise, Gherkin', 6.5, 'b5.png', 8),
(45, 'Double Steak', 'Sandwich: Double Burger, Cheese, Bacon, Salad, Tomato', 7.5, 'b6.png', 8),
(46, 'Fries', 'French fries', 3.9, 's1.png', 9),
(47, 'Onion Rings', 'Fried onion rings', 3.4, 's2.png', 9),
(48, 'Nuggets', 'Fried chicken nuggets', 5.9, 's3.png', 9),
(49, 'Nuggets Cheese', 'Fried Nuggets of Cheese', 3.5, 's4.png', 9),
(50, 'Chicken Wings', 'Chicken Wings Barbecue', 5.9, 's5.png', 9),
(51, 'Caesar Chicken Breaded', 'Breaded Chicken, Salad, Tomato and the famous Caesar sauce', 8.9, 'sa1.png', 10),
(52, 'Caesar Grilled Chicken', 'Grilled Chicken, Salad, Tomato and the famous Caesar sauce', 8.9, 'sa2.png', 10),
(53, 'Light Salad', 'Salad, Tomato, Cucumber, Maize and Balsamic Vinegar', 5.9, 'sa3.png', 10),
(54, 'Breaded Chicken', 'Breaded Chicken, Salad, Tomato and the sauce of your choice', 7.9, 'sa4.png', 10),
(55, 'Grilled chicken', 'Grilled chicken, Salad, Tomato and the sauce of your choice', 7.9, 'sa5.png', 10),
(56, 'Coca-Cola', 'Choice: Small, Medium or Large', 1.9, 'bo1.png', 11),
(57, 'Coca-Cola Light', 'Choice: Small, Medium or Large', 1.9, 'bo2.png', 11),
(58, 'Coca-Cola Zero', 'Optional: Small, Medium or Large', 1.9, 'bo3.png', 11),
(59, 'Fanta', 'Choice: Small, Medium or Large', 1.9, 'bo4.png', 11),
(60, 'Sprite', 'Choice: Small, Medium or Large', 1.9, 'bo5.png', 11),
(61, 'Nestea', 'Choice: Small, Medium or Large', 1.9, 'bo6.png', 11),
(62, 'Chocolate fondant', 'Choose: White chocolate or milk', 4.9, 'd1.png', 12),
(63, 'Muffin', 'Choice: Fruit or chocolate', 2.9, 'd2.png', 12),
(64, 'Donut', 'Optional: Chocolate or vanilla', 2.9, 'd3.png', 12),
(65, 'Milkshake', 'Choice: Strawberry, Vanilla or Chocolate', 3.9, 'd4.png', 12),
(66, 'Sundae', 'Choice: Strawberry, Caramel or Chocolate', 4.9, 'd5.png', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
