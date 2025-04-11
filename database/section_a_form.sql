-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2024 at 06:24 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crus`
--

-- --------------------------------------------------------

--
-- Table structure for table `section_a_form`
--

DROP TABLE IF EXISTS `section_a_form`;
CREATE TABLE IF NOT EXISTS `section_a_form` (
  `cin` varchar(21) NOT NULL,
  `name` text,
  `incorp_date` text,
  `office_address` text,
  `corporate_address` text,
  `email` text,
  `telephone` text,
  `website` varchar(255) DEFAULT NULL,
  `reporting_fin_year` text,
  `incorporation_certificate` text,
  `stock_name` varchar(255) DEFAULT NULL,
  `puc` text,
  `poc_name` varchar(255) DEFAULT NULL,
  `poc_phone` text,
  `poc_email` varchar(255) DEFAULT NULL,
  `rep_b` varchar(255) DEFAULT NULL,
  `rep_b_comments` varchar(255) DEFAULT NULL,
  `doba` text,
  `doba_comments` text,
  `dops` text,
  `dops_comments` text NOT NULL,
  `nol` text,
  `nol_comments` text NOT NULL,
  `drm` text,
  `drm_comments` text NOT NULL,
  `drm_contribution_export` text,
  `drm_types_customers` text,
  `dew` text,
  `dew_comments` text NOT NULL,
  `dewda` text,
  `dewda_comments` text NOT NULL,
  `pirw` text,
  `pirw_comments` text NOT NULL,
  `torpew` text,
  `torpew_comments` text NOT NULL,
  `holding` text,
  `holding_comments` text NOT NULL,
  `csr_act` text,
  `csr_turnover` text,
  `csr_networth` text,
  `gre` text,
  `gre_comments` text NOT NULL,
  `overview` text,
  `overview_comments` text NOT NULL,
  PRIMARY KEY (`cin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
