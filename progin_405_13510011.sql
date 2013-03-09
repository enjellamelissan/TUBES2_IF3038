-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2013 at 02:29 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS progin_405_13510011;
USE progin_405_13510011;

--
-- Database: `progin_405_13510011`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `gender` char(1) NOT NULL,
  `about` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `fullname`, `birthdate`, `email`, `avatar`, `gender`, `about`) VALUES
(1, 'enjellan', 'de4ab6e26db462b930510ba83e9f80b7db2bef88', 'Enjella Melissa Nababan', '1991-03-03', 'enjellamelissan@yahoo.com', 'images/enjella.JPG', 'F', ''),
(2, 'danny', 'dd4d08d87ba83bfdefa1cfdd60e23094f379edd3', 'Danny Andrianto', '0000-00-00', 'email', 'images/danny.jpg', '', 'about'),
(6, 'upload', '41ae8cf7f1ec7edf8c7cc1f77e800593e14aa265', 'Upload Test', '2002-08-20', 'upload@file.test', 'images/niouw.JPG', '', '');
