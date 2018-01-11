-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2018 at 08:46 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizza_hut`
--

-- --------------------------------------------------------

--
-- Table structure for table `beverages`
--

CREATE TABLE `beverages` (
  `b_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beverages`
--

INSERT INTO `beverages` (`b_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'cofee.jpeg', 'Cream coffee', 130, 'Made of chocolate and delicious cream'),
(2, 'dew.jpg', 'Dew mountain', 199, 'Dew mountain for all parties'),
(3, 'pepsi.jpg', 'Mobile pepsi ', 180, 'Sugar free Pepsi but still same taste '),
(4, 'choco_milk.jpg', 'Chocolate Milk ', 120, 'Full of chocolate and sweet sugar');

-- --------------------------------------------------------

--
-- Table structure for table `desserts`
--

CREATE TABLE `desserts` (
  `d_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desserts`
--

INSERT INTO `desserts` (`d_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'apple_pies.jpg', 'Apple Pies', 199, 'This is made of Apple pieces and hot sauce '),
(2, 'chinnamon_sticks.jpg', 'Chinnamon Sticks', 220, 'It\'s made of bread with egg and milk with curd'),
(4, 'cookie.jpg', 'cookies', 49, 'These are the cookies with chocolate ');

-- --------------------------------------------------------

--
-- Table structure for table `myorder`
--

CREATE TABLE `myorder` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasta`
--

CREATE TABLE `pasta` (
  `p_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasta`
--

INSERT INTO `pasta` (`p_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'pasta1.jpg', 'Role back pasta', 320, 'It\'s made of Sauce, onion as well as some spicy things. '),
(2, 'pasta2.jpg', 'Milk boy', 200, 'It\'s made of Sauce, garlic oil and spinach \r\nSuitable for all'),
(3, 'pasta3.jpg', 'Chicken pasta', 380, 'It has added chicken and spicy sauce with lemon piece '),
(4, 'pasta4.jpg', 'Crab cut pasta', 420.35, 'Sauce, Crab, Onions, Spinach, Salad, Meat, and fries are with it');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `p_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`p_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'pizza1.jpg', 'Cheesy Pizza', 680, 'This pizza is made of Italian. This is pepporni and sweet. It is suitable for all types of people.'),
(2, 'pizza2.jpg', 'Garlic Cheese ', 1200, 'This pizza is made of Garlic. This is hot and lemon sour. It is suitable for all types of people.'),
(5, 'pz3.jpeg', 'Italian Pizza', 650, 'This is an Italian types of pizza. It has different types of cheeses. It is suitable for all parties'),
(6, 'Images/pizza_hut_parallax.jpg', 'Party Pizza', 1200, 'This is the party pizza with cheese slide. It has also got pepperoni over the slice.'),
(7, 'meat1.jpg', 'Supreme Pizza', 800, 'Pepperoni, seasoned pork, beef, mushrooms, green bell peppers and red onions.'),
(8, 'meat2.jpg', 'Meat Lover\'s® Pizza', 950, 'Pepperoni, Italian sausage, ham, bacon, seasoned pork and beef.'),
(9, 'meat3.jpg', 'Primo Meats Pizza', 1300, 'Premium crushed tomato sauce topped with salami, pepperoni, Italian sausage and seasoned pork.'),
(10, 'meat4.jpg', 'Bacon Spinach Alfredo Pizza', 999, 'Garlic Parmesan sauce topped with bacon, mushrooms and roasted spinach with a salted pretzel crust.'),
(11, 'chicken1.jpg', 'Backyard BBQ Chicken Pizza', 850, 'Barbeque sauce topped with grilled chicken, bacon and red onions with a toasted cheddar crust.'),
(12, 'chicken2.jpg', 'Chicken-Bacon Parmesan Pizza', 950, 'Garlic Parmesan sauce topped with grilled chicken, bacon and Roma tomatoes with a Parmesan crust.'),
(13, 'chicken3.jpg', 'Buffalo Chicken Pizza', 1200, 'Buffalo sauce topped with grilled chicken, banana peppers and red onions with a toasted cheddar crust.'),
(14, 'chicken4.jpg', 'Hawaiian Chicken Pizza', 1255, 'Grilled chicken, ham, pineapple and green bell peppers.');

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `s_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`s_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'cheesesticks.jpg', 'Cheese Sticks', 120, 'Little cheese with a bread and egg '),
(2, 'fried_sausage.jpg', 'Fried sausage', 155, 'Fried with garlic oil and sweet sauce'),
(3, 'fries.jpg', 'Fried boy', 80, 'Fried by olive oil with cheese and lemon');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address_1` varchar(200) NOT NULL,
  `address_2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wingstreet`
--

CREATE TABLE `wingstreet` (
  `w_id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `des` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wingstreet`
--

INSERT INTO `wingstreet` (`w_id`, `image`, `name`, `price`, `des`) VALUES
(1, 'wings1.jpeg', 'Breaded Bone-Out Wings', 350, '100% all-white meat chicken covered in savory breading, tossed in your choice of sauce.'),
(2, 'wings2.jpeg', 'Individual Wing Meal', 650, '6 - 8 WingStreet® Wings with your choice of sauce and an order of fries.'),
(3, 'wings3.jpeg', 'Family Wing Meal', 750, '12 - 16 WingStreet® Wings with your choice of two sauces and two orders of fries.'),
(4, 'wings4.jpeg', 'Party Wing Meal', 800, '18 - 24 WingStreet® Wings with your choice of three sauces and two orders of fries.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beverages`
--
ALTER TABLE `beverages`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `desserts`
--
ALTER TABLE `desserts`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `myorder`
--
ALTER TABLE `myorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pasta`
--
ALTER TABLE `pasta`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wingstreet`
--
ALTER TABLE `wingstreet`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beverages`
--
ALTER TABLE `beverages`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `desserts`
--
ALTER TABLE `desserts`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `myorder`
--
ALTER TABLE `myorder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pasta`
--
ALTER TABLE `pasta`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pizza`
--
ALTER TABLE `pizza`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wingstreet`
--
ALTER TABLE `wingstreet`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
