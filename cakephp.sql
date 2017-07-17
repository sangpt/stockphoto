-- phpMyAdmin SQL Dump
-- version 4.0.10.19
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2017 at 02:08 AM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `image_id`, `video_id`, `message`, `created`) VALUES
(1, 12, NULL, 14, 'kuh.u', '2017-07-14 03:15:03'),
(2, 12, NULL, 17, 'dfsg\n', '2017-07-14 06:07:31'),
(3, 12, NULL, 16, 'haha', '2017-07-14 06:12:33'),
(4, 12, NULL, 15, 'hi', '2017-07-14 06:12:54'),
(5, 12, NULL, 13, 'hello', '2017-07-14 06:13:09');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `images` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `images`, `user_id`) VALUES
(38, '15-11nhung-buc-anh-dep-thien-nhien-hoang-da-chat-luong-nhat11.jpg', 9),
(40, 'anh-thien-nhien-3d-trong-sang-21.jpg', 9),
(39, 'download1.jpeg', 9),
(42, 'pexels-photo-4129720.jpeg', 12),
(43, 'pexels-photo-4048430.jpeg', 12),
(44, 'pexels-photo-4600750.jpeg', 12),
(45, 'pexels-photo-3024780.jpeg', 12),
(46, 'pexels-photo-2046860.jpeg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `image_id`, `video_id`) VALUES
(67, 12, NULL, 21),
(9, 12, 38, NULL),
(12, 12, 4, NULL),
(55, 12, NULL, 17),
(26, 12, NULL, 6),
(18, 12, NULL, 3),
(23, 12, 3, NULL),
(27, 12, NULL, 5),
(28, 12, NULL, 4),
(45, 12, 13, NULL),
(31, 12, 12, NULL),
(32, 12, NULL, 12),
(50, 12, NULL, 11),
(56, 12, NULL, 16),
(57, 12, NULL, 15),
(58, 12, NULL, 13),
(62, 12, 46, NULL),
(63, 12, 45, NULL),
(64, 12, 44, NULL),
(65, 12, 43, NULL),
(66, 12, 42, NULL),
(68, 12, NULL, 20),
(69, 12, NULL, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(8, 'sdgfs', '$2a$10$GPc1j3PGOM9LRHuxEOnnFutrKYimJ3zrKesTaSZpDUVkEfDsXUftu', '123@123.123'),
(9, 'Long', '$2a$10$Q1THIz1wZfnFUqIlhJ9X1eg7A.dFmkjCPXTdF2wTlzvuHT1jo2I66', 'long@gmail.com'),
(10, 'alex', '$2a$10$Qf8C3kd8Oc21ilzE6fVzUOUvFQbYMuvorI99vOxI/mLaypltGR.Qm', 'alex@gmail.com'),
(11, 'Nguyen Tien Duc', '$2a$10$SxE5yiotXLZCcejtIh2c3OlowD0pVDcUTTj9LSmUMS0jTg8BcNv3a', 'duc@gmail.com'),
(12, 'root', '$2a$10$iVWY5T7f8LWpo134DfZQOuAAgf3OH1Hl9ckXE7ab5G6nFIaPOrRse', '1@123');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `videos` text NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `videos`, `user_id`) VALUES
(17, 'Phim hoaÌ£t hiÌ€nh ngaÌ†Ìn haÌ€i huÌ›oÌ›Ìc.mp4', 12),
(13, '[Share ] Intro Proshow Producer  Ä‘oÌ›n giaÌ‰n.mp4', 12),
(16, 'Clip ngaÌ†Ìn phim hoaÌ£t hiÌ€nh haÌ€i huÌ›oÌ›Ìc ThaÌ‚Ì€n cheÌ‚Ìt Ä‘oÌ€i quaÌ€ Noel.mp4', 12),
(15, '[10s Ä‘eÌ‚Ì‰ cuÌ›oÌ›Ì€i]Khi caÌc pro cuÌƒng ngaÌƒ daÌ£Ì‚p maÌ£Ì†t [video clip haÌ€i huÌ›oÌ›Ìc].mp4', 12),
(19, 'NOÌ›I NAÌ€Y COÌ ANH - OFFICIAL MUSIC VIDEO - SOÌ›N TUÌ€NG M-TP.mp4', 12),
(20, 'YeÌ‚u LaÌ€ ''Tha Thu'' - Only C - Em ChuÌ›a 18 OST - Official Music Video.mp4', 12),
(21, 'BIÌCH PHUÌ›OÌ›NG - GuÌ›Ì‰i Anh Xa NhoÌ›Ì [OFFICIAL M-V].mp4', 12);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
