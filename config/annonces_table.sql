-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annonces_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `annonces_table`
--

CREATE TABLE `annonces_table` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `area` int(11) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annonces_table`
--

INSERT INTO `annonces_table` (`id`, `title`, `image`, `description`, `area`, `adress`, `price`, `date`, `type`) VALUES
(1, 'Apartment in Mesnana', 'pexels-emre-can-acer-2079234.jpg', 'The project covers 18 hectares, 5 minutes from the Socco Alto shopping center near the Royal Golf Club,\r\nLes Jardins de Mesnana Golf is a mid-range project that provides its residents with a better living environment thanks to its green spaces and its proximity to essential amenities.\r\nA residence composed of buildings in R 7 with elevator and parking in the basement with apartments and duplexes from 2 to 4 rooms with a total area of 54m ² to 170m ² at a price 100% declared that starts at 510 000 Dhs', 54, 'Mesnana in Tanger ', 510000, '2023-02-02 00:03:19', 'Vente'),
(2, 'Apartment in Castilla', 'pexels-frans-van-heerden-1438832.jpg', 'Don\'t miss out on this apartment for sale. Price 2,170,000 DH. 3 rooms, 2 bathrooms, area 213 m². 4 rooms. New. Large balcony.\r\nThis apartment is for sale in Castilla, Tanger. Well equipped kitchen.\r\nClose to all amenities: public transport in 1.9 kilometer, department store in 1.1 kilometer, shops in 350 meters, school and secondary school in 900 meters, bars and restaurants in 1.0 kilometer, beach in 550 meters. ', 125, 'Castilla in Tanger ', 3500, '2023-02-02 00:05:16', 'Location'),
(3, 'Apartment in Castilla', 'pexels-pixabay-53610.jpg', 'Don\'t miss out on this apartment for sale. Price 1,513,250 DH. 3 rooms, 2 bathrooms, area 162 m². 4 rooms. New. Fantastic terrace.\r\nIdeal if you want to buy an apartment in Castilla, Tanger. Fully equipped kitchen.\r\nNearby: public transport in 1.9 kilometer, shopping centre in 1.1 kilometer, retailers in 350 meters, educational establishments in 900 meters, restaurants in 1.0 kilometer, beach in 550 meters. ', 162, 'Castilla in Tanger ', 1513250, '2023-02-03 00:08:26', 'Vente'),
(4, 'Apartment in Malabata', 'pexels-pixabay-209296.jpg', 'Buy your apartment. 4 living areas, 3 rooms, 2 bathrooms, area 110 m².\r\nThis apartment is for sale in Malabata, Tanger.\r\nNearby: educational establishments in 250 meters, shops in 400 meters, beach in 900 meters.', 110, 'Sania in Tanger ', 1000000, '2023-02-02 00:12:48', 'Vente');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annonces_table`
--
ALTER TABLE `annonces_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annonces_table`
--
ALTER TABLE `annonces_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
