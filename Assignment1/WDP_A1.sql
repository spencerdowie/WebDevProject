-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2026 at 02:35 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WDP_A1`
--
-- Table structure for table `guilds`
--

CREATE TABLE `guilds` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guilds`
--

INSERT INTO `guilds` (`id`, `name`) VALUES
(1, 'Denny\'s Parking Lot Fight Club'),
(2, 'Scions of the Seventh Dawn');

-- --------------------------------------------------------

--
-- Table structure for table `item_data`
--

CREATE TABLE `item_data` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `icon_path` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_data`
--

INSERT INTO `item_data` (`id`, `name`, `icon_path`) VALUES
(5059, 'Cobalt Ingot', 'ui/icon/020000/020802.tex'),
(5066, 'Electrum Ingot', 'ui/icon/020000/020812.tex'),
(5067, 'Rose Gold Ingot', 'ui/icon/020000/020814.tex'),
(5079, 'Mythril Plate', 'ui/icon/020000/020956.tex'),
(5092, 'Iron Rivets', 'ui/icon/021000/021003.tex'),
(5099, 'Mythril Rivets', 'ui/icon/021000/021003.tex'),
(5366, 'Cedar Lumber', 'ui/icon/022000/022467.tex'),
(5371, 'Walnut Lumber', 'ui/icon/022000/022456.tex'),
(5378, 'Spruce Lumber', 'ui/icon/022000/022465.tex'),
(5505, 'Horn Glue', 'ui/icon/022000/022607.tex'),
(7017, 'Varnish', 'ui/icon/022000/022802.tex'),
(7018, 'Iron Nails', 'ui/icon/021000/021004.tex'),
(10099, ' Unaspected Crystal', 'ui/icon/10000/10099.tex'),
(12531, 'Mythrite Sand', 'ui/icon/12000/12531.tex'),
(12913, 'Garlond Steel', 'ui/icon/020000/020966.tex'),
(12916, 'Deep-green Enchanted Ink', 'ui/icon/12000/12916.tex');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `guild_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `username`, `guild_id`) VALUES
(1, 'Sabrin Rhel', 1),
(2, 'Laoghaire Whelan', 1),
(3, 'Eldaro Carro', 1),
(4, 'Hellebore Baudelaire', 1),
(5, 'Sorqaqtani Dalamiq', 1),
(6, 'Alisaie Leveilleur', 2),
(7, 'Alphinaud Leveilleur', 2),
(8, 'Estinien Varlineau', 2),
(9, 'G\'raha Tia', 2),
(10, 'Krile Baldesion', 2),
(11, 'Tataru Taru', 2),
(12, 'Thancred Waters', 2),
(13, 'Urianger Augurelt', 2),
(14, 'Y\'shtola Rhul', 2);

-- --------------------------------------------------------

--
-- Table structure for table `player_items`
--

CREATE TABLE `player_items` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `item_data_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_items`
--

INSERT INTO `player_items` (`id`, `player_id`, `item_data_id`, `count`) VALUES
(1, 4, 5505, 18),
(2, 4, 7017, 18),
(3, 1, 7017, 36),
(4, 1, 5059, 36),
(5, 1, 5099, 9),
(6, 9, 10099, 54),
(7, 9, 5505, 9),
(8, 11, 5067, 18),
(9, 11, 5066, 36),
(10, 12, 5378, 18),
(11, 14, 12916, 9);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `guild_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `guild_id`, `name`, `start_date`, `end_date`, `deadline`) VALUES
(1, 1, 'Invincible-type Hull', '2026-04-22', NULL, NULL),
(2, 2, 'Grade 2 Wheel of Nutriment', NULL, NULL, NULL),
(3, 1, 'Grade 2 Wheel of Nutriment', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_items`
--

CREATE TABLE `project_items` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `item_data_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `fulfilled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_items`
--

INSERT INTO `project_items` (`id`, `project_id`, `item_data_id`, `count`, `fulfilled`) VALUES
(1, 1, 5371, 18, 0),
(2, 1, 5378, 18, 0),
(3, 1, 5366, 9, 0),
(4, 1, 12913, 9, 0),
(5, 1, 5079, 18, 0),
(6, 1, 5066, 18, 0),
(7, 1, 5059, 18, 0),
(8, 1, 5067, 21, 0),
(9, 1, 7018, 18, 0),
(10, 1, 5092, 18, 0),
(11, 1, 5099, 18, 0),
(12, 1, 5505, 18, 1),
(13, 1, 7017, 18, 1),
(14, 2, 5066, 3, 0),
(15, 2, 12916, 3, 0),
(16, 2, 12531, 3, 0),
(17, 2, 10099, 3, 0),
(18, 3, 5066, 3, 0),
(19, 3, 12916, 3, 0),
(20, 3, 12531, 3, 0),
(21, 3, 10099, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks`
--

CREATE TABLE `project_tasks` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_tasks`
--

INSERT INTO `project_tasks` (`id`, `project_id`, `player_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `task_items`
--

CREATE TABLE `task_items` (
  `id` int(11) NOT NULL,
  `project_items_id` int(11) NOT NULL,
  `project_tasks_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `task_items`
--

INSERT INTO `task_items` (`id`, `project_items_id`, `project_tasks_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 3),
(10, 10, 3),
(11, 11, 3),
(12, 12, 4),
(13, 13, 4),
(14, 14, 5),
(15, 15, 5),
(16, 16, 5),
(17, 17, 5);

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `guilds`
--
ALTER TABLE `guilds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_data`
--
ALTER TABLE `item_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_items`
--
ALTER TABLE `player_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_items`
--
ALTER TABLE `project_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tasks`
--
ALTER TABLE `project_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_items`
--
ALTER TABLE `task_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guilds`
--
ALTER TABLE `guilds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `player_items`
--
ALTER TABLE `player_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_items`
--
ALTER TABLE `project_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `project_tasks`
--
ALTER TABLE `project_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task_items`
--
ALTER TABLE `task_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
