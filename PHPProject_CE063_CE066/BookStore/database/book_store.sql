-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 28, 2021 at 01:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'vimal', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` bigint(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'English',
  `author` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 20,
  `genre` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `published_year` year(4) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `language`, `author`, `price`, `quantity`, `genre`, `publisher`, `published_year`, `image`) VALUES
(19, 2147483647, 'Harry Potter and the Philosopher\'s Stone', 'English', 'J.K. Rowling ', 200, 14, 'Sci-Fi & Fantacy', 'Mary GrandPré', 1998, '/BookStore/images/harry_philosopher.jpg'),
(22, 2345674434, 'The Lord Of The Rings', 'English', 'J.R.R. Tolkien', 400, 0, 'Sci-Fi & Fantacy', 'Allen & Unwin', 1954, '/BookStore/images/lord_of_rings.jpg'),
(24, 2345325675, '2001: A Space Odyssey', 'English', 'Arthur C. Clarke', 350, 18, 'Sci-Fi & Fantacy', 'Hutchinson', 1968, '/BookStore/images/2001_space_oddesy.jpg'),
(26, 4562343561, 'The War Of The Worlds', 'English', 'H.G. Wells', 400, 19, 'Sci-Fi & Fantacy', 'Heinemenn', 1993, '/BookStore/images/war_of_the_worlds.jpg'),
(28, 5436789231, 'Into the Wild', 'English', 'Jon Krakauer', 370, 20, 'Biography', 'Villard', 1996, '/BookStore/images/into_the_wild.jpg'),
(29, 9788173711, 'Wings of Fire', 'English', 'Tiwari Arun', 198, 19, 'Biography', 'Sangam Books Ltd', 1999, '/BookStore/images/wings_of_fire.webp'),
(30, 2345346731, 'The First World War', 'English', 'Michael Howard', 199, 20, 'History', 'Oxford University Press', 2002, '/BookStore/images/the_first_world_war.jpg'),
(31, 2453467451, 'The Haunting of Hill House ', 'English', 'Shirley Jackson', 230, 20, 'Horror', 'Viking Press', 1959, '/BookStore/images/the_haunting_of_hill_house.jpg'),
(32, 2431235634, 'Avengers', 'English', 'Jason Aaron', 500, 32, 'Comics', 'Leinil Francis Yu', 2021, '/BookStore/images/avengers.jpg'),
(33, 2343244354, 'The Mysterious Island ', 'English', 'Jules Verne', 240, 18, 'Adventure', 'Pierre-jules Hetzel', 1999, '/BookStore/images/the_mysterious_island.jpg'),
(34, 2345671234, 'Tom and Jerry: The Invisible Mouse', 'English', 'Amit Ahlawat', 50, 29, 'Comics', 'Wiliam Hanna', 2020, '/BookStore/images/tom_and_jerry_invisible_mouse.jpg'),
(35, 1234567891, 'The Dark Tower Series', 'English', 'Stephen King', 49, 20, 'Sci-Fi & Fantacy', 'Marvel Comics', 1970, '/BookStore/images/the_dark_tower.jpg'),
(36, 4534567653, 'World War Z', 'English', 'Max Brooks', 60, 20, 'Sci-Fi & Fantacy', 'Crown', 1970, '/BookStore/images/world_war_z.jpg'),
(37, 3645783645, 'Star Wars: The Force Awakens', 'English', 'Foster Alan Dean', 599, 40, 'Sci-Fi & Fantacy', 'Cornerstone', 2016, '/BookStore/images/star-wars-the-force-awakens.webp'),
(38, 143440063, 'The Dhoni Touch', 'English', 'Sundaresan Bharat', 163, 35, 'Biography', 'Penguin Random House India Pvt. Ltd', 2018, '/BookStore/images/the-dhoni-touch-original.webp'),
(39, 9788172343, 'The Story of My Experiments with Truth', 'English', 'Gandhi M. K.', 96, 40, 'Biography', 'Prakash Books', 1927, '/BookStore/images/the-story-of-my-experiments-with-truth.webp'),
(40, 9789352667, 'Bhagat Singh Jail Diary', 'Hindi', 'Sandhu Yadvinder Singh', 399, 30, 'Biography', 'Prabhat Prakashan', 2015, '/BookStore/images/bhagat-singh-jail-diary.webp'),
(41, 7823647236, 'Chhatrapati Shivaji Maharaj', 'Marathi', 'Krushnarao Arjun Keluskar', 490, 50, 'History', 'Saraswati Publishing Co. Pvt. Ltd.', 2015, '/BookStore/images/chhatrapati-shivaji-maharaj.webp'),
(42, 8724756345, 'History Of Modern India', 'English', 'Bipin Chandra', 330, 40, 'History', 'Generic', 2001, '/BookStore/images/history-of-modern-india.webp'),
(43, 9781473666, 'It', 'English', 'Stephen King', 337, 20, 'Horror', 'Hodder & Stoughton', 1986, '/BookStore/images/it.webp'),
(44, 7878934564, 'The Green Room', 'English', 'Nag Mani', 199, 40, 'Horror', 'Notion Press', 2015, '/BookStore/images/the-green-room.webp'),
(45, 8294372, 'The Woman in the Window ', 'English', 'A. J. Finn', 248, 60, 'Horror', 'Harper', 2018, '/BookStore/images/the-woman-in-the-window.webp'),
(46, 45678345, 'Dracula', 'English', 'Stoker Bram', 156, 70, 'Horror', 'Pustak Mahal', 0000, '/BookStore/images/dracula.webp'),
(47, 1444900714, 'The Vampire Diaries: The Awakening', 'English', 'Smith L.J.', 918, 20, 'Horror', 'Hachette Children\'s Group', 2010, '/BookStore/images/the-vampire-diaries.webp'),
(48, 9383202766, 'The Jungle Book-Om Illustrated Classics', 'English', 'Kipling Rudyard', 178, 20, 'Adventure', 'Om Books International', 0000, '/BookStore/images/the-jungle-book-om-illustrated-classics.webp'),
(49, 9351039684, 'The Scorch Trials', 'English', 'James Dashner', 287, 40, 'Adventure', 'Scholastic', 2017, '/BookStore/images/the-scorch-trials.webp'),
(50, 4657347345, 'Pirates of the Caribbean 2: Dead Man\'s Chest', 'english', 'Stephen King', 699, 40, 'Adventure', ' Pearson Education Limited', 2017, '/BookStore/images/level-3-pirates-of-the-caribbean-2-dead-man-s-chest.webp'),
(51, 9781401249, 'Beware The Batman Vol. 1', 'English', 'Cohen Ivan', 512, 40, 'Comics', 'DC Comics', 2015, '/BookStore/images/beware-the-batman-vol-1.webp'),
(52, 9781401235, 'The Flash Vol. 1 Move Forward ', 'English', 'Manapul Francis', 849, 30, 'Comics', 'DC Comics', 2013, '/BookStore/images/the-flash-vol-1-move-forward.webp'),
(53, 9781401283, 'Aquaman', 'English', 'Johns Geoff', 757, 20, 'Comics', 'DC Comics', 2018, '/BookStore/images/aquaman.webp'),
(54, 3894857325, 'Wonder Woman Vol. 8 A Twist of Faith', 'english', 'Finch Meredith', 1399, 30, 'Comics', 'DC Comics', 2016, '/BookStore/images/wonder-woman-vol-8-a-twist-of-faith.webp'),
(55, 9781368020, 'Black Panther The Battle For Wakanda', 'English', 'Stan Lee', 602, 30, 'Comics', 'Marvel Comics', 2018, '/BookStore/images/black-panther.webp'),
(56, 3423423432, 'Doctor Strange Vol. 1: The Way Of The Weird', 'English', 'Aaron Jason', 1499, 40, 'Comics', 'Marvel Comics', 2016, '/BookStore/images/doctor-strange-vol-1.webp'),
(57, 7345834657, 'Guardians Of The Galaxy: New Guard Vol. 1 - Emperor Quill', 'English', 'Bendis Brian Michael', 999, 20, 'Comics', 'Marvel Comics', 2016, '/BookStore/images/guardians-of-the-galaxy-new-guard-vol-1-emperor.webp');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `book_id`, `customer_id`, `quantity`, `date_added`) VALUES
(78, 32, 3, 1, '2021-03-28 13:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `phone_no`, `pincode`, `address`) VALUES
(3, 'gopal', 'gopalmalaviya53@gmail.com', '$2y$10$u2VbNIVc8SaVsowqtznet.KFPDk.8zH5vnD31Pqd3j8nOsYDyc7fq', 'gopal', 'malaviya', 2147483647, '364710', 'Lathidad ,Botad'),
(4, 'kenil', 'kenilgop@gmail.com', '$2y$10$jsOgLS3Qe.mPS6LuX0EGYuZDS.0kp1KRUoNqqLusF.W/401MW0x02', 'kenil', 'gopani', 9898989898, NULL, NULL),
(5, 'vimal123', 'vimalmatholiya17@gmail.com', '$2y$10$ZZTnwsc06/8u0kRQ14xBRu0mvazEwdpfEvqf96Gnv9lb21dTN1dNC', 'vimal', 'matholiya', 9898309869, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `order_status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `book_id`, `customer_id`, `price`, `quantity`, `ordered_date`, `delivery_date`, `order_status`) VALUES
(21, 24, 3, 350, 2, '2021-03-16', '2021-03-14', 1),
(22, 33, 3, 240, 2, '2021-03-16', '2021-03-17', 1),
(26, 26, 3, 400, 1, '2021-03-17', '2021-03-17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_ibfk_1` (`book_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `orders_ibfk_2` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
