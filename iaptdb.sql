-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2013 at 01:11 PM
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
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

CREATE TABLE IF NOT EXISTS `articles_tags` (
  `article_id` int(6) NOT NULL,
  `tag_id` int(11) NOT NULL,
  KEY `article_id` (`article_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_likes`
--

CREATE TABLE IF NOT EXISTS `article_likes` (
  `article_like_id` int(6) NOT NULL AUTO_INCREMENT,
  `article_like_amount` int(6) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`article_like_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `column_articles_topics`
--

CREATE TABLE IF NOT EXISTS `column_articles_topics` (
  `column_id` int(6) NOT NULL,
  `topic_id` int(6) NOT NULL,
  KEY `column_id` (`column_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `review_name` varchar(30) NOT NULL,
  `review_rating` tinyint(1) NOT NULL,
  `article_id` int(6) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `article_id` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(6) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `topic_id` int(6) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(30) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `articles_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`),
  ADD CONSTRAINT `articles_tags_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_dislikes`
--
ALTER TABLE `article_dislikes`
  ADD CONSTRAINT `article_dislikes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_likes`
--
ALTER TABLE `article_likes`
  ADD CONSTRAINT `article_likes_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

--
-- Constraints for table `article_users`
--
ALTER TABLE `article_users`
  ADD CONSTRAINT `article_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `article_users_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

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
-- Constraints for table `column_articles_topics`
--
ALTER TABLE `column_articles_topics`
  ADD CONSTRAINT `column_articles_topics_ibfk_2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`),
  ADD CONSTRAINT `column_articles_topics_ibfk_1` FOREIGN KEY (`column_id`) REFERENCES `column_articles` (`column_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`),
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `review_articles`
--
ALTER TABLE `review_articles`
  ADD CONSTRAINT `review_articles_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`article_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
