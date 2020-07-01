-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生日期: 2016 年 03 月 31 日 13:13
-- 伺服器版本: 5.6.13
-- PHP 版本: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫: `google_seo`
--
CREATE DATABASE IF NOT EXISTS `google_seo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `google_seo`;

-- --------------------------------------------------------

--
-- 表的結構 `all`
--

CREATE TABLE IF NOT EXISTS `all` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `url` text,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;

