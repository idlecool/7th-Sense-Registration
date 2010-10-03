-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2010 at 11:56 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `seventhsense10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

DROP TABLE IF EXISTS `admin_details`;
CREATE TABLE IF NOT EXISTS `admin_details` (
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `accesslevel` int(1) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `desk_user_details`
--

DROP TABLE IF EXISTS `desk_user_details`;
CREATE TABLE IF NOT EXISTS `desk_user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(60) NOT NULL,
  `department` varchar(60) NOT NULL,
  `college_id` varchar(60) NOT NULL,
  `college` varchar(60) NOT NULL,
  `city` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `doneby` varchar(60) NOT NULL DEFAULT 'done',
  PRIMARY KEY (`id`,`email`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `desk_user_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `event1`
--

DROP TABLE IF EXISTS `event1`;
CREATE TABLE IF NOT EXISTS `event1` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event1`
--


-- --------------------------------------------------------

--
-- Table structure for table `event2`
--

DROP TABLE IF EXISTS `event2`;
CREATE TABLE IF NOT EXISTS `event2` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event2`
--


-- --------------------------------------------------------

--
-- Table structure for table `event3`
--

DROP TABLE IF EXISTS `event3`;
CREATE TABLE IF NOT EXISTS `event3` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `doneby` varchar(60) NOT NULL,
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event3`
--


-- --------------------------------------------------------

--
-- Table structure for table `event4`
--

DROP TABLE IF EXISTS `event4`;
CREATE TABLE IF NOT EXISTS `event4` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event4`
--


-- --------------------------------------------------------

--
-- Table structure for table `event5`
--

DROP TABLE IF EXISTS `event5`;
CREATE TABLE IF NOT EXISTS `event5` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event5`
--


-- --------------------------------------------------------

--
-- Table structure for table `event6`
--

DROP TABLE IF EXISTS `event6`;
CREATE TABLE IF NOT EXISTS `event6` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event6`
--


-- --------------------------------------------------------

--
-- Table structure for table `event7`
--

DROP TABLE IF EXISTS `event7`;
CREATE TABLE IF NOT EXISTS `event7` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event7`
--


-- --------------------------------------------------------

--
-- Table structure for table `event8`
--

DROP TABLE IF EXISTS `event8`;
CREATE TABLE IF NOT EXISTS `event8` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event8`
--


-- --------------------------------------------------------

--
-- Table structure for table `event9`
--

DROP TABLE IF EXISTS `event9`;
CREATE TABLE IF NOT EXISTS `event9` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event9`
--


-- --------------------------------------------------------

--
-- Table structure for table `event10`
--

DROP TABLE IF EXISTS `event10`;
CREATE TABLE IF NOT EXISTS `event10` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event10`
--


-- --------------------------------------------------------

--
-- Table structure for table `event11`
--

DROP TABLE IF EXISTS `event11`;
CREATE TABLE IF NOT EXISTS `event11` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `member4` varchar(10) NOT NULL,
  `member5` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event11`
--


-- --------------------------------------------------------

--
-- Table structure for table `event12`
--

DROP TABLE IF EXISTS `event12`;
CREATE TABLE IF NOT EXISTS `event12` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event12`
--


-- --------------------------------------------------------

--
-- Table structure for table `event13`
--

DROP TABLE IF EXISTS `event13`;
CREATE TABLE IF NOT EXISTS `event13` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event13`
--


-- --------------------------------------------------------

--
-- Table structure for table `event14`
--

DROP TABLE IF EXISTS `event14`;
CREATE TABLE IF NOT EXISTS `event14` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event14`
--


-- --------------------------------------------------------

--
-- Table structure for table `event15`
--

DROP TABLE IF EXISTS `event15`;
CREATE TABLE IF NOT EXISTS `event15` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `member4` varchar(10) NOT NULL,
  `member5` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event15`
--


-- --------------------------------------------------------

--
-- Table structure for table `event17`
--

DROP TABLE IF EXISTS `event17`;
CREATE TABLE IF NOT EXISTS `event17` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event17`
--


-- --------------------------------------------------------

--
-- Table structure for table `event18`
--

DROP TABLE IF EXISTS `event18`;
CREATE TABLE IF NOT EXISTS `event18` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event18`
--


-- --------------------------------------------------------

--
-- Table structure for table `event20`
--

DROP TABLE IF EXISTS `event20`;
CREATE TABLE IF NOT EXISTS `event20` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event20`
--


-- --------------------------------------------------------

--
-- Table structure for table `event22`
--

DROP TABLE IF EXISTS `event22`;
CREATE TABLE IF NOT EXISTS `event22` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `member4` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event22`
--


-- --------------------------------------------------------

--
-- Table structure for table `event23`
--

DROP TABLE IF EXISTS `event23`;
CREATE TABLE IF NOT EXISTS `event23` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `member3` varchar(10) NOT NULL,
  `member4` varchar(10) NOT NULL,
  `member5` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event23`
--


-- --------------------------------------------------------

--
-- Table structure for table `event24`
--

DROP TABLE IF EXISTS `event24`;
CREATE TABLE IF NOT EXISTS `event24` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event24`
--


-- --------------------------------------------------------

--
-- Table structure for table `event25`
--

DROP TABLE IF EXISTS `event25`;
CREATE TABLE IF NOT EXISTS `event25` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event25`
--


-- --------------------------------------------------------

--
-- Table structure for table `event26`
--

DROP TABLE IF EXISTS `event26`;
CREATE TABLE IF NOT EXISTS `event26` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `member2` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event26`
--


-- --------------------------------------------------------

--
-- Table structure for table `event27`
--

DROP TABLE IF EXISTS `event27`;
CREATE TABLE IF NOT EXISTS `event27` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event27`
--


-- --------------------------------------------------------

--
-- Table structure for table `event28`
--

DROP TABLE IF EXISTS `event28`;
CREATE TABLE IF NOT EXISTS `event28` (
  `teamid` int(4) NOT NULL AUTO_INCREMENT,
  `member1` varchar(10) NOT NULL,
  `doneby` varchar(60) DEFAULT 'none',
  PRIMARY KEY (`teamid`),
  UNIQUE KEY `teamid` (`teamid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event28`
--


-- --------------------------------------------------------

--
-- Table structure for table `event_details`
--

DROP TABLE IF EXISTS `event_details`;
CREATE TABLE IF NOT EXISTS `event_details` (
  `id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `eventid` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `event_meta`
--

DROP TABLE IF EXISTS `event_meta`;
CREATE TABLE IF NOT EXISTS `event_meta` (
  `event_id` int(2) NOT NULL,
  `event_name` varchar(60) NOT NULL,
  `prefix` varchar(3) NOT NULL,
  `team_size` int(4) NOT NULL,
  `limit` int(4) NOT NULL,
  `entry_fee` int(3) NOT NULL,
  UNIQUE KEY `event_id` (`event_id`,`prefix`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_meta`
--


-- --------------------------------------------------------

--
-- Table structure for table `mobile_user_details`
--

DROP TABLE IF EXISTS `mobile_user_details`;
CREATE TABLE IF NOT EXISTS `mobile_user_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(60) NOT NULL,
  `college_id` varchar(60) NOT NULL,
  `college` varchar(60) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `doneby` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `mobile_user_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `regdesk_details`
--

DROP TABLE IF EXISTS `regdesk_details`;
CREATE TABLE IF NOT EXISTS `regdesk_details` (
  `email` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `accesslevel` int(1) DEFAULT NULL,
  `doneby` varchar(60) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regdesk_details`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `sex` varchar(6) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `college_id` varchar(20) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `year` int(1) NOT NULL,
  `course` varchar(40) NOT NULL,
  `college` varchar(40) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pin_code` int(6) NOT NULL,
  `password` varchar(40) NOT NULL,
  UNIQUE KEY `email` (`email`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_details`
--

