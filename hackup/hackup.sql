-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2015 at 03:27 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackup`
--
CREATE DATABASE IF NOT EXISTS `hackup` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hackup`;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` longtext NOT NULL,
  `password` longtext NOT NULL,
  `type` longtext NOT NULL,
  `img` longtext NOT NULL,
  `bio` longtext NOT NULL,
  `location` longtext NOT NULL,
  `coordinates` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `password`, `type`, `img`, `bio`, `location`, `coordinates`) VALUES
(1, 'Aje Alfonso', 'root', 'artist', 'ajealfonso', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec pulvinar ipsum. Morbi molestie ut augue a vestibulum. Fusce bibendum lacinia libero a malesuada. Etiam et nibh mi. Morbi pulvinar ipsum ac ipsum tempus, in tristique urna auctor. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec quis neque dui.\r\n\r\nNulla eget tincidunt justo. Integer ac nulla interdum, aliquet sem ac, iaculis tortor. Praesent faucibus massa ac sem ultrices blandit. Morbi facilisis sem eu ex scelerisque, at sagittis sem finibus. Sed eu magna ut felis viverra tincidunt. Duis eget eros egestas, porttitor diam at, pretium turpis. Suspendisse quis dolor lacus. Fusce vehicula odio a libero gravida, vulputate sollicitudin dolor molestie. Quisque vitae tellus velit. Nam non elementum felis, et posuere metus. Donec rhoncus dictum facilisis. Fusce dapibus efficitur elit ac condimentum. Maecenas at rutrum leo, at sodales diam. Maecenas vel nibh vitae metus rhoncus ultrices at id elit. In semper nec justo ac cursus.\r\n\r\nSuspendisse sollicitudin mi vel augue vehicula, ac dignissim neque consectetur. Vivamus condimentum accumsan erat quis ullamcorper. In hac habitasse platea dictumst. Vestibulum nec est nec dui venenatis euismod. Ut eget nulla ut odio rhoncus varius. Nullam ultricies in nulla et scelerisque. Vestibulum tincidunt volutpat turpis nec commodo. Sed dui elit, varius sed cursus eu, condimentum sed odio. Maecenas ac purus consectetur, luctus nisl vel, sodales nunc. Sed diam diam, rutrum nec tempor vel, venenatis vitae quam. Maecenas volutpat non sem sit amet luctus. Ut imperdiet semper eleifend. Integer quis metus convallis, eleifend felis varius, scelerisque nulla. Etiam a augue posuere, egestas eros euismod, porttitor enim.', 'Manila', '14.548672, 121.015601'),
(2, 'Michael Cuenca', 'root', 'artist', 'michaelcuenca', 'Suspendisse sollicitudin mi vel augue vehicula, ac dignissim neque consectetur. Vivamus condimentum accumsan erat quis ullamcorper. In hac habitasse platea dictumst. Vestibulum nec est nec dui venenatis euismod. Ut eget nulla ut odio rhoncus varius. Nullam ultricies in nulla et scelerisque. Vestibulum tincidunt volutpat turpis nec commodo. Sed dui elit, varius sed cursus eu, condimentum sed odio. Maecenas ac purus consectetur, luctus nisl vel, sodales nunc. Sed diam diam, rutrum nec tempor vel, venenatis vitae quam. Maecenas volutpat non sem sit amet luctus. Ut imperdiet semper eleifend. Integer quis metus convallis, eleifend felis varius, scelerisque nulla. Etiam a augue posuere, egestas eros euismod, porttitor enim.', 'Pasig', '14.584617, 121.112675'),
(3, 'Rom Ricafranca', 'root', 'artist', 'romricafranca', 'Lorem ipsum.', 'Mandaluyong', '14.587089, 121.021382'),
(4, 'Tim Gonzales', 'root', 'a&r', 'timgonzales', 'Lorem Ipsum.', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `title` longtext NOT NULL,
  `filename` longtext NOT NULL,
  `artist` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `title`, `filename`, `artist`) VALUES
(1, 'DNA', 'Aje Alfonso - DNA.mp3', 'Aje Alfonso'),
(2, 'Screw da Police', 'Aje Alfonso - Screw da Police.mp3', 'Aje Alfonso'),
(3, 'Translation', 'Rom Ricafranca - Translation.mp3', 'Rom Ricafranca'),
(4, 'Youth', 'Rom Ricafranca - Youth.mp3', 'Rom Ricafranca'),
(5, 'How Do U Dance', 'Michael Cuenca - How Do U Dance.mp3', 'Michael Cuenca'),
(6, 'Sputnik Sweetheart', 'Michael Cuenca - Sputnik Sweetheart.mp3', 'Michael Cuenca');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
