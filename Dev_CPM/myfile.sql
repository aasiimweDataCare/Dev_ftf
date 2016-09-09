-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2015 at 01:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_cpma`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_items`
--

CREATE TABLE IF NOT EXISTS `tbl_graphs` (
  `tbl_graphId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `Rank` varchar(200) DEFAULT NULL,
  `display` set('Yes','No') DEFAULT 'Yes',
  `updatedby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`tbl_graphId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;

--
-- Dumping data for table `tbl_graphs`
--

INSERT INTO `tbl_graphs` (`name`, `Rank`,`display`, `updatedby`) VALUES
('area-basic', '1',  'Yes', 'aasiimwe'), 
('area-inverted', '1',  'Yes', 'aasiimwe'), 
('area-missing', '1',  'Yes', 'aasiimwe'), 
('area-negative', '1',  'Yes', 'aasiimwe'), 
('area-stacked-percent', '1',  'Yes', 'aasiimwe'), 	 
('area-stacked', '1',  'Yes', 'aasiimwe'),  
('arearange-line', '1',  'Yes', 'aasiimwe'),  
('arearange', '1',  'Yes', 'aasiimwe'),  
('areaspline', '1',  'Yes', 'aasiimwe'), 	 
('bar-basic', '1',  'Yes', 'aasiimwe'), 
('bar-negative-stack', '1',  'Yes', 'aasiimwe'),  
('bar-stacked', '1',  'Yes', 'aasiimwe'), 	 
('box-plot', '1',  'Yes', 'aasiimwe'), 
('bubble-3d', '1',  'Yes', 'aasiimwe'),  
('bubble', '1',  'Yes', 'aasiimwe'), 
('column-basic', '1',  'Yes', 'aasiimwe'),  
('column-drilldown', '1',  'Yes', 'aasiimwe'), 	 
('column-negative', '1',  'Yes', 'aasiimwe'), 
('column-parsed', '1',  'Yes', 'aasiimwe'), 
('column-rotated-labels', '1',  'Yes', 'aasiimwe'),  
('column-stacked-and-grouped', '1',  'Yes', 'aasiimwe'), 
('column-stacked-percent', '1',  'Yes', 'aasiimwe'),  
('column-stacked', '1',  'Yes', 'aasiimwe'),  
('columnrange', '1',  'Yes', 'aasiimwe'), 
('combo-dual-axes', '1',  'Yes', 'aasiimwe'), 	 
('combo-multi-axes', '1',  'Yes', 'aasiimwe'), 
('combo-regression', '1',  'Yes', 'aasiimwe'), 
('combo', '1',  'Yes', 'aasiimwe'), 
('dynamic-click-to-add', '1',  'Yes', 'aasiimwe'), 
('dynamic-master-detail', '1',  'Yes', 'aasiimwe'), 
('dynamic-update', '1',  'Yes', 'aasiimwe'), 
('error-bar', '1',  'Yes', 'aasiimwe'), 
('funnel', '1',  'Yes', 'aasiimwe'), 
('gauge-clock', '1',  'Yes', 'aasiimwe'), 
('gauge-dual', '1',  'Yes', 'aasiimwe'), 
('gauge-speedometer', '1',  'Yes', 'aasiimwe'), 
('gauge-vu-meter', '1',  'Yes', 'aasiimwe'), 
('line-ajax', '1',  'Yes', 'aasiimwe'), 
('line-basic', '1',  'Yes', 'aasiimwe'), 
('line-labels', '1',  'Yes', 'aasiimwe'), 
('line-log-axis', '1',  'Yes', 'aasiimwe'), 
('line-time-series', '1',  'Yes', 'aasiimwe'), 
('pie-basic', '1',  'Yes', 'aasiimwe'), 
('pie-donut', '1',  'Yes', 'aasiimwe'), 
('pie-gradient', '1',  'Yes', 'aasiimwe'), 
('pie-legend', '1',  'Yes', 'aasiimwe'), 
('pie-semi-circle', '1',  'Yes', 'aasiimwe'), 
('polar-spider', '1',  'Yes', 'aasiimwe'), 
('polar-wind-rose', '1',  'Yes', 'aasiimwe'), 
('polar', '1',  'Yes', 'aasiimwe'), 
('renderer', '1',  'Yes', 'aasiimwe'), 
('scatter', '1',  'Yes', 'aasiimwe'), 
('spline-inverted', '1',  'Yes', 'aasiimwe'), 
('spline-irregular-time', '1',  'Yes', 'aasiimwe'), 
('spline-plot-bands', '1',  'Yes', 'aasiimwe'), 
('spline-symbols', '1',  'Yes', 'aasiimwe'), 
('waterfall', '1',  'Yes', 'aasiimwe'); 


