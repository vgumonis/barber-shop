-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `barber`;

CREATE TABLE `complain` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint` text NOT NULL,
  `solution` text,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `complain` (`id`, `complaint`, `solution`, `date`) VALUES
(18,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'2019-02-19 22:20:42'),
(19,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'2019-02-19 22:20:50'),
(20,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'2019-02-19 22:20:56'),
(21,	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',	'2019-02-19 22:21:41')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `complaint` = VALUES(`complaint`), `solution` = VALUES(`solution`), `date` = VALUES(`date`);

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `times_visited` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `times_visited`) VALUES
(31,	'Randee',	'Toliver',	0),
(32,	'Emerson ',	'Toliver',	0),
(33,	'Martina',	'Evete',	0),
(34,	'Haywwod',	'Hankinson',	8),
(35,	'Kaila',	'Spears',	0),
(36,	'Raye',	'Tarr',	0),
(37,	'Wallis',	'Kathryn',	0),
(38,	'Edda',	'Hileman',	1),
(39,	'Lidia',	'Bross',	0),
(40,	'Roselyn',	'Smith',	5),
(41,	'Elvira',	'Rojero',	0),
(42,	'Roselyn',	'Durocker',	1),
(43,	'Jackie',	'Klapp',	0),
(44,	'Maryjo',	'Basye',	6),
(45,	'Maryjo',	'Gwenn ',	0),
(46,	'Gudrum',	'Hamlet',	0),
(47,	'Hanh',	'Frase',	3),
(48,	'Kandace',	'Hoge',	0),
(49,	'Ermelinda',	'Armor',	10),
(50,	'Keil',	'Duggins',	0),
(51,	'Latoyia',	'Sedor',	0),
(52,	'Renata',	'Vand',	0),
(53,	'Kevin',	'Smith',	9),
(54,	'Latoyia',	'Corw',	0),
(55,	'Tory',	'Doll',	1),
(56,	'Kely',	'Smith',	0),
(57,	'Bessie',	'Corwin',	1),
(58,	'Kevin',	'Dekker',	0),
(59,	'Otis',	'Clark',	0),
(60,	'Velma',	'Bagg',	0),
(61,	'Jamie',	'Wales',	5),
(62,	'Jodi',	'Adkins',	0),
(63,	'Lucie',	'Barret',	0),
(64,	'Jerold',	'Routt',	0),
(65,	'Davina',	'Routt',	5),
(66,	'Roland',	'Higue',	0),
(67,	'Yaha',	'Howle',	15),
(68,	'Sue',	'Due',	0),
(69,	'Jerold',	'Rout',	0),
(70,	'Jodi',	'Bagg',	0),
(71,	'Yahaira',	'Stormer',	2),
(72,	'Delicia',	'Carley',	0),
(73,	'Leon',	'Dude',	7),
(74,	'Madon',	'Kop',	0),
(75,	'Anastasia',	'Kayle',	10),
(76,	'Ruth',	'Smith',	1),
(77,	'Micki',	'Stockman',	0),
(78,	'Winnona',	'Ryder',	0),
(79,	'Valentina',	'Boder',	1),
(80,	'Edison',	'Fazio',	1),
(81,	'Clemencia',	'Gallien',	0)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `first_name` = VALUES(`first_name`), `last_name` = VALUES(`last_name`), `times_visited` = VALUES(`times_visited`);

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reservation_code_uindex` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `reservation` (`id`, `user_id`, `datetime`, `status`, `code`) VALUES
(31,	31,	'2019-02-19 10:15:00',	'CANCELED',	3406),
(32,	32,	'2019-05-03 15:00:00',	'ACTIVE',	8896),
(33,	33,	'2019-06-04 10:30:00',	'ACTIVE',	1234),
(34,	34,	'2019-01-03 10:15:00',	'ACTIVE',	2347),
(35,	35,	'2019-01-03 15:15:00',	'ACTIVE',	1639),
(36,	36,	'2019-01-02 10:15:00',	'ACTIVE',	8043),
(37,	37,	'2019-02-03 12:30:00',	'ACTIVE',	6724),
(38,	38,	'2019-02-03 10:30:00',	'FINISHED',	1727),
(39,	39,	'2019-02-03 13:30:00',	'ACTIVE',	7270),
(40,	40,	'2019-03-03 14:15:00',	'ACTIVE',	6817),
(41,	41,	'2019-03-03 15:15:00',	'ACTIVE',	1016),
(42,	42,	'2019-03-03 14:00:00',	'FINISHED',	7737),
(43,	43,	'2019-03-03 16:30:00',	'ACTIVE',	2827),
(44,	44,	'2019-03-03 17:15:00',	'ACTIVE',	2261),
(45,	45,	'2019-02-25 12:45:00',	'ACTIVE',	3821),
(46,	46,	'2019-02-20 16:00:00',	'ACTIVE',	2428),
(47,	47,	'2019-02-21 15:00:00',	'ACTIVE',	4170),
(48,	48,	'2019-02-21 14:00:00',	'ACTIVE',	7310),
(49,	49,	'2019-04-01 13:00:00',	'ACTIVE',	8860),
(50,	50,	'2019-02-23 14:15:00',	'ACTIVE',	9091),
(51,	51,	'2019-02-24 14:00:00',	'ACTIVE',	8266),
(52,	52,	'2019-02-25 16:45:00',	'ACTIVE',	4021),
(53,	53,	'2019-02-25 13:00:00',	'ACTIVE',	9247),
(54,	54,	'2019-02-28 14:15:00',	'ACTIVE',	7333),
(55,	55,	'2019-02-20 14:15:00',	'FINISHED',	8468),
(56,	56,	'2019-02-20 15:15:00',	'ACTIVE',	4503),
(57,	57,	'2019-02-20 13:00:00',	'FINISHED',	7962),
(58,	58,	'2019-02-21 01:15:00',	'ACTIVE',	1447),
(59,	59,	'2019-02-22 14:15:00',	'ACTIVE',	2947),
(60,	60,	'2019-02-22 13:00:00',	'ACTIVE',	4953),
(61,	61,	'2019-02-22 16:00:00',	'ACTIVE',	3372),
(62,	62,	'2019-02-22 13:15:00',	'ACTIVE',	9745),
(63,	63,	'2019-02-26 15:00:00',	'ACTIVE',	5075),
(64,	64,	'2019-02-26 14:15:00',	'ACTIVE',	9345),
(65,	65,	'2019-02-26 16:45:00',	'ACTIVE',	9928),
(66,	66,	'2019-02-26 15:45:00',	'CANCELED',	9978),
(67,	67,	'2019-02-27 14:00:00',	'ACTIVE',	9294),
(68,	68,	'2019-02-26 15:15:00',	'ACTIVE',	3902),
(69,	69,	'2019-02-27 15:30:00',	'ACTIVE',	1976),
(70,	70,	'2019-02-27 13:45:00',	'ACTIVE',	3788),
(71,	71,	'2019-02-23 15:45:00',	'FINISHED',	7863),
(72,	72,	'2019-02-26 17:00:00',	'CANCELED',	2437),
(73,	73,	'2019-02-24 14:15:00',	'ACTIVE',	1998),
(74,	74,	'2019-02-25 15:15:00',	'ACTIVE',	6144),
(75,	75,	'2019-02-25 14:45:00',	'ACTIVE',	7240),
(76,	76,	'2019-02-26 15:15:00',	'FINISHED',	1790),
(77,	77,	'2019-02-27 15:15:00',	'ACTIVE',	3523),
(78,	78,	'2019-02-21 15:15:00',	'ACTIVE',	7320),
(79,	79,	'2019-02-28 14:15:00',	'FINISHED',	3848),
(80,	80,	'2019-02-25 14:45:00',	'FINISHED',	9286),
(81,	81,	'2019-02-27 14:15:00',	'ACTIVE',	8484)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `datetime` = VALUES(`datetime`), `status` = VALUES(`status`), `code` = VALUES(`code`);

-- 2019-02-19 20:23:49
