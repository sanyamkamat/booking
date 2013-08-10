-- phpMyAdmin SQL Dump
-- version 3.3.7deb7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2013 at 11:44 AM
-- Server version: 5.1.66
-- PHP Version: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Club`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE IF NOT EXISTS `Bookings` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `HallID` int(11) NOT NULL COMMENT 'Foreign Key',
  `BkDate` date NOT NULL,
  `HSID` int(11) NOT NULL,
  `Person` varchar(100) DEFAULT NULL,
  `Reason` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`BookID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Bookings`
--

INSERT INTO `Bookings` (`BookID`, `HallID`, `BkDate`, `HSID`, `Person`, `Reason`) VALUES
(1, 1, '2013-02-01', 5, 'Lynn', 'Birthday'),
(2, 1, '2013-02-14', 6, 'Shamu', 'Party'),
(3, 1, '2013-02-18', 3, 'Erryl', 'Picnic'),
(4, 1, '2013-02-11', 4, 'Students', 'Study'),
(5, 3, '2013-02-21', 3, 'Lynn', 'Party'),
(6, 1, '2013-03-12', 3, 'Erryl', 'Party'),
(7, 3, '2013-03-03', 5, 'Sammy', 'Personal'),
(9, 3, '2013-04-15', 3, 'Pat', 'Fun time'),
(10, 2, '2013-02-14', 6, 'Lynn', 'Repairs'),
(19, 1, '2013-03-05', 4, 'Lynn', 'Cleanup of Hall');

-- --------------------------------------------------------

--
-- Table structure for table `Halls`
--

CREATE TABLE IF NOT EXISTS `Halls` (
  `HallID` int(11) NOT NULL AUTO_INCREMENT,
  `HallName` varchar(50) NOT NULL DEFAULT 'Hall Name',
  `Description` text NOT NULL,
  `ImgName` varchar(50) NOT NULL,
  PRIMARY KEY (`HallID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Halls`
--

INSERT INTO `Halls` (`HallID`, `HallName`, `Description`, `ImgName`) VALUES
(1, 'Hall One', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Lighthouse.jpg'),
(2, 'Hall Two', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', 'Tulips.jpg'),
(3, 'Hall Three', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 'Hydrangeas.jpg'),
(4, 'Hall Four', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.', 'Chrysanthemum.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Hall_Status`
--

CREATE TABLE IF NOT EXISTS `Hall_Status` (
  `HSID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `HSName` varchar(25) NOT NULL,
  `HSIcon` varchar(50) NOT NULL,
  PRIMARY KEY (`HSID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Hall_Status`
--

INSERT INTO `Hall_Status` (`HSID`, `HSName`, `HSIcon`) VALUES
(3, 'Full Day', 'FullDay.jpg'),
(4, 'Morning Booked', 'Morning.jpg'),
(5, 'Evening Booked', 'Evening.jpg'),
(6, 'Closed', 'Closed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `UserID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `Pwd` varchar(50) NOT NULL DEFAULT '123',
  PRIMARY KEY (`UserID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `User`, `Pwd`) VALUES
(1, 'Lynn', '123');
