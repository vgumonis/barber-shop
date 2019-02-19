-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `barber` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `barber`;

CREATE TABLE `complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint` text NOT NULL,
  `solution` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `times_visited` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservation_code_uindex` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2019-02-19 20:23:05
