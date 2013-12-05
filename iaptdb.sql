-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2013 at 10:15 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iaptdb`
--
CREATE DATABASE IF NOT EXISTS `iaptdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `iaptdb`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `article_id` int(6) NOT NULL AUTO_INCREMENT,
  `article_title` varchar(100) NOT NULL,
  `article_content` text NOT NULL,
  `article_timestamp` int(11) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_status` varchar(30) NOT NULL,
  `article_type` varchar(30) NOT NULL,
  `article_staff_pick` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=95 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `article_title`, `article_content`, `article_timestamp`, `article_image`, `article_status`, `article_type`, `article_staff_pick`) VALUES
(1, 'Pokemon Battle', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386050837, 'http://assets2.ignimgs.com/2013/11/26/pokemonbattle112613coverjpg-e96bc6_948w.jpg', 'submitted', 'basic_article', 0),
(2, 'Battlefield 4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386277633, 'http://assets2.ignimgs.com/2013/11/26/battlefield4081613coverjpg-885860_948w.jpg', 'published', 'column_article', 0),
(3, 'Call of Duty Ghosts', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386277627, 'http://assets1.ignimgs.com/2013/11/26/codmomentsjpg-88580a_948w.jpg', 'published', 'column_article', 0),
(4, 'NBA2K', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386177322, 'http://assets2.ignimgs.com/2013/11/26/nba2k14092513coverjpg-88587a_948w.jpg', 'published', 'review_article', 0),
(5, 'XBOX ONE Review', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386177327, 'http://assets1.ignimgs.com/2013/11/27/xboxone112613coverjpg-88592d_948w.jpg', 'published', 'review_article', 0),
(6, 'PS4 review', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1386177307, 'http://assets1.ignimgs.com/2013/11/20/ps4111913cover01jpg-e96905_948w.jpg', 'published', 'review_article', 0),
(64, 'staff pick 6', 'staff pick 6', 1386205547, 'staff pick 6', 'published', 'basic_article', 0),
(65, 'staff pick 7', 'staff pick 7', 1386209730, 'staff pick 7', 'published', 'basic_article', 1),
(66, 'test staff pick 666', 'test staff pick 666', 1386206359, 'test staff pick 666', 'submitted', 'basic_article', 0),
(71, 'should not be staff picked', 'should not be staff picked', 1386209725, 'should not be staff picked', 'published', 'basic_article', 1),
(75, 'test authors 3', 'test authors 3', 1386252302, 'test authors 3', 'submitted', 'basic_article', 0),
(78, 'sdmbvjavds', 'fgh.kfjlkjslkdfg h gkhf c g jgewj gr ghfw kghfwk gf', 1386253039, 'http://tr1.cbsistatic.com/hub/i/r/2013/10/16/529291ac-3173-441c-84a0-de7ae7c57e8b/thumbnail/510x366/big.data.money.jpg?hash=ae9ea019673dc770fea6e18ab7ae6bec', 'submitted', 'basic_article', 0),
(85, 'test authors 11', 'test authors 11. ', 1386261005, 'test authors 11', 'submitted', 'basic_article', 0),
(86, 'test article tags', 'test article tags', 1386277611, 'test article tags', 'published', 'column_article', 0),
(87, 'test raticle tags 3', 'test raticle tags 3', 1386277602, 'test raticle tags 3', 'published', 'column_article', 0),
(88, 'my article', 'sdfsdf', 1386277595, 'dfgdfg', 'published', 'column_article', 0),
(89, 'my article', 'sdfsdf', 1386264736, 'dfgdfg', 'submitted', 'basic_article', 0),
(90, 'test column for PC', 'test column for PC', 1386279692, 'test column for PC', 'published', 'column_article', 0),
(91, 'spoider', 'spoider', 1386274602, 'http://assets1.ignimgs.com/2013/12/05/amazing-spider-man-2coverjpg-885b57_948w.jpg', 'submitted', 'review_article', 0),
(92, 'test adding', 'test adding', 1386280840, 'test adding', 'submitted', 'basic_article', 0),
(93, 'THIS MUST BE IN PLAYSTATION', 'test column articletest column article', 1386281341, 'test column article', 'published', 'column_article', 0),
(94, 'THIS MUST BE IN MOBILE', 'THIS MUST BE IN MOBILE', 1386281465, 'THIS MUST BE IN MOBILE', 'published', 'column_article', 0);

-- --------------------------------------------------------

--
-- Table structure for table `article_authors`
--

CREATE TABLE IF NOT EXISTS `article_authors` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_authors`
--

INSERT INTO `article_authors` (`article_id`, `user_id`) VALUES
(92, 17),
(92, 21),
(92, 20),
(93, 20),
(94, 21),
(94, 13),
(94, 20);

-- --------------------------------------------------------

--
-- Table structure for table `article_dislikes`
--

CREATE TABLE IF NOT EXISTS `article_dislikes` (
  `article_dislike_id` int(6) NOT NULL AUTO_INCREMENT,
  `article_dislike_amount` int(6) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`article_dislike_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `article_dislikes`
--

INSERT INTO `article_dislikes` (`article_dislike_id`, `article_dislike_amount`, `article_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 6, 3),
(4, 9, 4),
(5, 0, 5),
(6, 4, 6),
(52, 0, 64),
(53, 0, 65),
(54, 0, 66),
(59, 0, 71),
(63, 0, 75),
(66, 0, 78),
(73, 0, 85),
(74, 6, 86),
(75, 0, 87),
(76, 0, 88),
(77, 0, 89),
(78, 0, 90),
(79, 6, 91),
(80, 0, 92),
(81, 0, 93),
(82, 0, 94);

-- --------------------------------------------------------

--
-- Table structure for table `article_editors`
--

CREATE TABLE IF NOT EXISTS `article_editors` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_editors`
--

INSERT INTO `article_editors` (`article_id`, `user_id`) VALUES
(92, 15),
(93, 20);

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE IF NOT EXISTS `article_likes` (
  `article_like_id` int(6) NOT NULL AUTO_INCREMENT,
  `article_like_amount` int(6) NOT NULL DEFAULT '0',
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`article_like_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `article_likes`
--

INSERT INTO `article_likes` (`article_like_id`, `article_like_amount`, `article_id`) VALUES
(1, 62, 1),
(2, 45, 2),
(3, 20, 3),
(4, 86, 4),
(5, 32, 5),
(6, 34, 6),
(67, 0, 64),
(68, 0, 65),
(69, 0, 66),
(74, 0, 71),
(78, 0, 75),
(81, 0, 78),
(88, 0, 85),
(89, 1, 86),
(90, 0, 87),
(91, 0, 88),
(92, 0, 89),
(93, 0, 90),
(94, 12, 91),
(95, 0, 92),
(96, 0, 93),
(97, 0, 94);

-- --------------------------------------------------------

--
-- Table structure for table `article_users`
--

CREATE TABLE IF NOT EXISTS `article_users` (
  `article_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  KEY `article_id` (`article_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article_users`
--

INSERT INTO `article_users` (`article_id`, `user_id`) VALUES
(85, 15),
(85, 13),
(85, 22),
(86, 22),
(87, 22),
(88, 21),
(88, 20),
(89, 21),
(89, 20),
(90, 22),
(91, 21),
(91, 13),
(91, 22);

-- --------------------------------------------------------

--
-- Table structure for table `basic_articles`
--

CREATE TABLE IF NOT EXISTS `basic_articles` (
  `basic_id` int(6) NOT NULL AUTO_INCREMENT,
  `basic_name` varchar(30) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`basic_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `column_articles`
--

CREATE TABLE IF NOT EXISTS `column_articles` (
  `column_id` int(6) NOT NULL AUTO_INCREMENT,
  `column_name` varchar(30) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`column_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `column_articles`
--

INSERT INTO `column_articles` (`column_id`, `column_name`, `article_id`) VALUES
(14, 'MOBILE', 88),
(15, 'PS', 87),
(16, 'PC', 86),
(17, 'XBOX', 3),
(18, 'PC', 2),
(19, 'XBOX', 90),
(21, 'PS', 93),
(22, 'MOBILE', 94);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT,
  `comment_content` text NOT NULL,
  `comment_timestamp` int(11) NOT NULL,
  `user_id` int(6) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `review_articles`
--

CREATE TABLE IF NOT EXISTS `review_articles` (
  `review_id` int(6) NOT NULL AUTO_INCREMENT,
  `review_rating` tinyint(1) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `review_articles`
--

INSERT INTO `review_articles` (`review_id`, `review_rating`, `article_id`) VALUES
(4, 0, 4),
(5, 1, 5),
(6, 0, 6),
(27, 5, 91);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_role`) VALUES
(10, 'someoneelse', '123', 'writer'),
(11, 'writer2', '123', 'writer'),
(12, 'subscriber123', '123', 'subscriber'),
(13, 'editor Z', '123', 'editor'),
(15, 'testuser', '123', 'writer'),
(17, 'login', 'login', 'writer'),
(19, 'subscriber', '123', 'subscriber'),
(20, 'editor', '123', 'editor'),
(21, 'writer', '123', 'writer'),
(22, 'publisher', '123', 'publisher');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_authors`
--
ALTER TABLE `article_authors`
  ADD CONSTRAINT `article_authors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `article_authors_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_dislikes`
--
ALTER TABLE `article_dislikes`
  ADD CONSTRAINT `article_dislikes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_editors`
--
ALTER TABLE `article_editors`
  ADD CONSTRAINT `article_editors_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `article_editors_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD CONSTRAINT `article_likes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_users`
--
ALTER TABLE `article_users`
  ADD CONSTRAINT `article_users_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `article_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `basic_articles`
--
ALTER TABLE `basic_articles`
  ADD CONSTRAINT `basic_articles_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `column_articles`
--
ALTER TABLE `column_articles`
  ADD CONSTRAINT `column_articles_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `review_articles`
--
ALTER TABLE `review_articles`
  ADD CONSTRAINT `review_articles_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
