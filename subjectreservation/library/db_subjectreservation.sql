-- phpMyAdmin SQL Dump
-- version 2.10.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 30, 2014 at 12:35 PM
-- Server version: 5.0.41
-- PHP Version: 5.2.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `db_subjectreservation`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_class`
-- 

CREATE TABLE `tbl_class` (
  `c_id` tinyint(3) unsigned NOT NULL auto_increment,
  `c_code` varchar(50) collate latin1_general_ci default NULL,
  `c_subjcode` varchar(50) collate latin1_general_ci default NULL,
  `c_schedstart` varchar(50) collate latin1_general_ci default NULL,
  `c_schedend` varchar(50) collate latin1_general_ci default NULL,
  `c_schedday` varchar(50) collate latin1_general_ci default NULL,
  `c_room` varchar(50) collate latin1_general_ci default NULL,
  `c_section` varchar(50) collate latin1_general_ci default NULL,
  `c_max` int(5) unsigned default NULL,
  `c_status` tinyint(1) unsigned default '0',
  PRIMARY KEY  (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `tbl_class`
-- 

INSERT INTO `tbl_class` VALUES (4, 'IMMX 318_A', 'IMMX 318', '7:30 AM', '8:00 AM', ' T    ', 'bkjb', 'jkbkj', 89, 0);
INSERT INTO `tbl_class` VALUES (3, 'IMMX 318_B', 'IMMX 318', '7:30 AM', '8:30 AM', 'M  W  F ', 'W 20', 'B', 30, 0);
INSERT INTO `tbl_class` VALUES (7, 'qwqwqw', 'BSCI 300', '7:30 AM', '7:30 AM', 'M  W  F ', 'kjkj', 'kjhkj', 98709, 0);
INSERT INTO `tbl_class` VALUES (8, 'lhhlh', 'BSCI 300', '7:30 AM', '8:00 AM', 'M     ', 'jkgkj', 'jgkj', 89698, 0);
INSERT INTO `tbl_class` VALUES (9, 'ddd', 'ddd', '7:30 AM', '8:30 AM', 'M  W  F ', 'Lab B', '1A', 40, 0);
INSERT INTO `tbl_class` VALUES (10, 'EEE', 'bbb', '7:30 AM', '8:30 AM', 'M  W  F ', 'C1-2', '1A', 30, 0);
INSERT INTO `tbl_class` VALUES (11, 'ccc', 'bbb', '7:30 AM', '8:30 AM', 'M  W  F ', 'C1-2', '1b', 40, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_evaluation`
-- 

CREATE TABLE `tbl_evaluation` (
  `e_id` int(10) unsigned NOT NULL auto_increment,
  `e_code` varchar(50) collate latin1_general_ci default NULL,
  `e_evaluator` varchar(50) collate latin1_general_ci default NULL,
  `e_student` varchar(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`e_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=106 ;

-- 
-- Dumping data for table `tbl_evaluation`
-- 

INSERT INTO `tbl_evaluation` VALUES (29, 'aaa', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (30, 'fff', 'che', 'dgf');
INSERT INTO `tbl_evaluation` VALUES (31, 'fff', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (76, 'IMMX 318', '1234567', '1234567');
INSERT INTO `tbl_evaluation` VALUES (74, 'IMMX 318', 'che', '100693057');
INSERT INTO `tbl_evaluation` VALUES (43, 'eee', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (41, 'ccc', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (42, 'ddd', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (40, 'BSCI 300', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (39, 'fili 102', 'che', 'student');
INSERT INTO `tbl_evaluation` VALUES (73, 'Fili 101', 'che', '100693057');
INSERT INTO `tbl_evaluation` VALUES (72, 'BSCI 300', 'che', '100693057');
INSERT INTO `tbl_evaluation` VALUES (59, 'IMMX 318', 'che', '15678');
INSERT INTO `tbl_evaluation` VALUES (75, 'Fili 101', '1234567', '1234567');
INSERT INTO `tbl_evaluation` VALUES (62, 'BSCI 300', 'admin', '1234567');
INSERT INTO `tbl_evaluation` VALUES (80, 'BSCI 300', 'che', 'che');
INSERT INTO `tbl_evaluation` VALUES (60, 'fili 102', 'che', '15678');
INSERT INTO `tbl_evaluation` VALUES (79, 'aaa', 'che', 'che');
INSERT INTO `tbl_evaluation` VALUES (81, 'IMMX 318', 'che', 'che');
INSERT INTO `tbl_evaluation` VALUES (82, 'Fili 101', 'che', 'che');
INSERT INTO `tbl_evaluation` VALUES (83, 'BSCI 300', 'area_head', '10-0153-826');
INSERT INTO `tbl_evaluation` VALUES (84, 'Fili 101', 'area_head', '10-0153-826');
INSERT INTO `tbl_evaluation` VALUES (85, 'IMMX 318', 'area_head', '10-0153-826');
INSERT INTO `tbl_evaluation` VALUES (103, 'fili 102', 'area_head', 'fc021393');
INSERT INTO `tbl_evaluation` VALUES (102, 'BSCI 300', 'area_head', 'fc021393');
INSERT INTO `tbl_evaluation` VALUES (101, 'IMMX 318', 'area_head', 'fc021393');
INSERT INTO `tbl_evaluation` VALUES (100, 'Fili 101', 'area_head', 'fc021393');
INSERT INTO `tbl_evaluation` VALUES (104, 'TestCode', 'area_head', '10-0153-826');
INSERT INTO `tbl_evaluation` VALUES (105, 'it3rdsem', 'area_head', '10-0153-826');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_history`
-- 

CREATE TABLE `tbl_history` (
  `h_id` int(3) unsigned NOT NULL auto_increment,
  `h_user` varchar(50) collate latin1_general_ci default NULL,
  `h_date` datetime default NULL,
  `h_history` text collate latin1_general_ci,
  PRIMARY KEY  (`h_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=12 ;

-- 
-- Dumping data for table `tbl_history`
-- 

INSERT INTO `tbl_history` VALUES (1, 'admin', '2013-09-21 17:10:06', 'admin added New Medicine: jkjn on ');
INSERT INTO `tbl_history` VALUES (2, 'admin', '2013-09-21 17:11:10', 'admin added New Medicine: jknklnlkn on ');
INSERT INTO `tbl_history` VALUES (3, 'admin', '2013-09-21 17:12:30', 'admin added New Medicine: nonoi');
INSERT INTO `tbl_history` VALUES (4, '', '2013-09-21 17:26:10', ' Deleted Medicine');
INSERT INTO `tbl_history` VALUES (5, '0', '2013-09-21 17:28:48', '0 Deleted Medicine');
INSERT INTO `tbl_history` VALUES (6, 'admin', '2013-09-21 17:31:11', 'admin added New Medicine: jkkjbjk');
INSERT INTO `tbl_history` VALUES (7, '0', '2013-09-21 17:31:18', '0 Deleted Medicine');
INSERT INTO `tbl_history` VALUES (8, '0', '2013-09-21 17:31:36', '0 Deleted Medicine');
INSERT INTO `tbl_history` VALUES (9, 'admin', '2013-09-21 17:33:04', 'admin added New Medicine: jooinon');
INSERT INTO `tbl_history` VALUES (10, 'admin', '2013-09-21 17:33:13', 'admin Deleted Medicine');
INSERT INTO `tbl_history` VALUES (11, 'admin', '2013-09-21 17:41:37', 'added New Medicine: noinoinio');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_major`
-- 

CREATE TABLE `tbl_major` (
  `m_id` tinyint(3) unsigned NOT NULL auto_increment,
  `m_code` varchar(10) collate latin1_general_ci default NULL,
  `m_desc` text collate latin1_general_ci,
  PRIMARY KEY  (`m_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `tbl_major`
-- 

INSERT INTO `tbl_major` VALUES (4, 'BSIT', 'Bachelor of Science Major in Information Technology');
INSERT INTO `tbl_major` VALUES (14, 'BSCS', 'Bachelor of Science in Computer Science');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_schedule`
-- 

CREATE TABLE `tbl_schedule` (
  `s_id` int(5) unsigned NOT NULL auto_increment,
  `s_teacher` varchar(50) collate latin1_general_ci default NULL,
  `s_room` varchar(50) collate latin1_general_ci default NULL,
  `s_class` varchar(50) collate latin1_general_ci default NULL,
  `s_subject` varchar(50) collate latin1_general_ci default NULL,
  `s_from` varchar(30) collate latin1_general_ci default NULL,
  `s_to` varchar(30) collate latin1_general_ci default NULL,
  `s_m` varchar(1) collate latin1_general_ci default NULL,
  `s_t` varchar(1) collate latin1_general_ci default NULL,
  `s_w` varchar(1) collate latin1_general_ci default NULL,
  `s_th` varchar(2) collate latin1_general_ci default NULL,
  `s_f` varchar(1) collate latin1_general_ci default NULL,
  `s_s` varchar(1) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=15 ;

-- 
-- Dumping data for table `tbl_schedule`
-- 

INSERT INTO `tbl_schedule` VALUES (14, 'faculty', 'jkbkjb', 'jbkjb', 'kbjkbkjb', '8:00 AM', '8:00 AM', 'M', '', 'W', '', 'F', '');
INSERT INTO `tbl_schedule` VALUES (7, 'fgfg', 'fgdfg', 'dfgfdg', 'fdgdfgfdg', '6:30 AM', '7:30 AM', NULL, 'T', NULL, 'Th', NULL, NULL);
INSERT INTO `tbl_schedule` VALUES (8, 'gfgf', 'fdgfdg', 'dfgfdg', 'fgdfg', '7:29 AM', '7:30 AM', NULL, NULL, NULL, NULL, NULL, 'S');
INSERT INTO `tbl_schedule` VALUES (9, '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbl_schedule` VALUES (13, 'faculty', 'C11', 'BSIT 4A', 'Thesis', '7:30 AM', '7:30 AM', 'M', 'T', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_subject`
-- 

CREATE TABLE `tbl_subject` (
  `s_id` int(10) unsigned NOT NULL auto_increment,
  `s_code` varchar(50) collate latin1_general_ci default NULL,
  `s_desc` text collate latin1_general_ci,
  `s_lec` tinyint(3) default '0',
  `s_lab` tinyint(3) unsigned default '0',
  `s_unit` tinyint(3) unsigned default '0',
  `s_prereq` varchar(50) collate latin1_general_ci default NULL,
  `s_majorid` int(10) default NULL,
  `s_semyear` varchar(10) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=41 ;

-- 
-- Dumping data for table `tbl_subject`
-- 

INSERT INTO `tbl_subject` VALUES (35, 'TestCode', 'TestDesc', 2, 3, 3, '', 0, '4Y1S1');
INSERT INTO `tbl_subject` VALUES (25, 'bbb', NULL, 0, 0, 0, NULL, 1, NULL);
INSERT INTO `tbl_subject` VALUES (26, 'ccc', NULL, 0, 0, 0, NULL, 1, NULL);
INSERT INTO `tbl_subject` VALUES (27, 'ddd', NULL, 0, 0, 0, NULL, 2, NULL);
INSERT INTO `tbl_subject` VALUES (28, 'eee', NULL, 0, 0, 0, NULL, 2, NULL);
INSERT INTO `tbl_subject` VALUES (29, 'fff', NULL, 0, 0, 0, NULL, 2, NULL);
INSERT INTO `tbl_subject` VALUES (30, 'BSCI 300', 'Biological Science', 3, 0, 3, '', 0, '6Y1S1');
INSERT INTO `tbl_subject` VALUES (31, 'Fili 101', 'komunication sa Akademikong Filipino', 3, 0, 3, '', 0, '6Y1S1');
INSERT INTO `tbl_subject` VALUES (32, 'IMMX 318', 'Multimedia Systems', 2, 3, 3, 'IDPX 606', 0, '6Y1S1');
INSERT INTO `tbl_subject` VALUES (33, 'fili 102', 'djlf lkns klsn', 2, 1, 3, 'fili 101', 0, '6Y1S2');
INSERT INTO `tbl_subject` VALUES (34, 'aaa', 'aaa', 1, 1, 2, '2', 0, '6Y1S2');
INSERT INTO `tbl_subject` VALUES (36, 'ENCECode', 'ENCEDesc', 2, 3, 3, 'TestPR', 0, '6Y1S1');
INSERT INTO `tbl_subject` VALUES (37, 'secondyr', 'secondsem', 3, 0, 3, 'churva', 0, '4Y2S1');
INSERT INTO `tbl_subject` VALUES (38, 'ence3rd1st', 'blaker', 2, 2, 2, 'churvalo', 0, '6Y3S1');
INSERT INTO `tbl_subject` VALUES (39, 'it3rdsem', 'it3rdsemchuva', 2, 2, 2, 'chuvaloo', 0, '4Y3S1');
INSERT INTO `tbl_subject` VALUES (40, 'nars3-1', 'narsing', 2, 2, 2, 'narsingalo', 0, '8Y3S1');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_subjectreservation`
-- 

CREATE TABLE `tbl_subjectreservation` (
  `sr_id` int(10) unsigned NOT NULL auto_increment,
  `sr_code` varchar(50) collate latin1_general_ci default NULL,
  `sr_subjcode` varchar(20) collate latin1_general_ci default NULL,
  `sr_student` varchar(50) collate latin1_general_ci default NULL,
  `sr_schedstart` varchar(20) collate latin1_general_ci default NULL,
  `sr_schedday` varchar(20) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`sr_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

-- 
-- Dumping data for table `tbl_subjectreservation`
-- 

INSERT INTO `tbl_subjectreservation` VALUES (26, 'IMMX 318_A', 'IMMX 318', '10-0153-826', '7:30 AM', ' T');
INSERT INTO `tbl_subjectreservation` VALUES (24, 'IMMX 318_A', 'IMMX 318', '1234567', '7:30 AM', ' T');
INSERT INTO `tbl_subjectreservation` VALUES (36, 'qwqwqw', 'BSCI 300', 'fc021393', '7:30 AM', 'M  W  F');
INSERT INTO `tbl_subjectreservation` VALUES (37, 'IMMX 318_A', 'IMMX 318', 'fc021393', '7:30 AM', ' T');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_subjtaken`
-- 

CREATE TABLE `tbl_subjtaken` (
  `sj_id` int(50) unsigned NOT NULL auto_increment,
  `sj_sjcode` varchar(50) collate latin1_general_ci default NULL,
  `sj_grade` varchar(50) collate latin1_general_ci default NULL,
  `sj_user` varchar(50) collate latin1_general_ci default NULL,
  `sj_sy` varchar(50) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`sj_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tbl_subjtaken`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_user`
-- 

CREATE TABLE `tbl_user` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `user_fname` varchar(50) collate latin1_general_ci default NULL,
  `user_lname` varchar(50) collate latin1_general_ci default NULL,
  `user_name` varchar(20) collate latin1_general_ci NOT NULL,
  `user_password` varchar(32) collate latin1_general_ci NOT NULL default '',
  `user_position` varchar(20) collate latin1_general_ci default NULL,
  `user_regdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_address` text collate latin1_general_ci NOT NULL,
  `user_gender` varchar(7) collate latin1_general_ci NOT NULL,
  `user_birth` varchar(50) collate latin1_general_ci NOT NULL,
  `user_bdegree` varchar(50) collate latin1_general_ci NOT NULL,
  `user_gdegree` varchar(50) collate latin1_general_ci NOT NULL,
  `user_school` varchar(50) collate latin1_general_ci NOT NULL,
  `user_seminar` text collate latin1_general_ci NOT NULL,
  `user_course` varchar(10) collate latin1_general_ci default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=78 ;

-- 
-- Dumping data for table `tbl_user`
-- 

INSERT INTO `tbl_user` VALUES (64, 'Marnel', 'Cordova', 'encoder', '446a12100c856ce9', 'ENCODER', '2013-09-21 15:59:27', '2014-01-30 00:57:26', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (74, 'Edward', 'Chan', 'admin', '446a12100c856ce9', 'ADMIN', '2014-01-28 05:48:47', '2014-01-30 12:02:15', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (65, 'Giovani', 'Ten', 'area_head', '446a12100c856ce9', 'AREA HEAD', '2013-09-23 13:00:06', '2014-01-30 09:47:08', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (73, 'Vannah', 'Absalon', 'av-081494', '446a12100c856ce9', 'STUDENT', '2013-11-30 22:28:57', '2014-01-28 16:57:06', '', '', '', '', '', '', '', 'BSIT');
INSERT INTO `tbl_user` VALUES (62, 'Arnel', 'Maghinay', 'faculty', '446a12100c856ce9', 'FACULTY', '2013-09-21 15:58:39', '2014-01-30 09:48:13', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (75, 'Freddie', 'Aguilar', 'admin2', '446a12100c856ce9', 'ADMIN', '2014-01-28 05:49:55', '0000-00-00 00:00:00', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (71, 'Carmela', 'Flores', 'fc021393', '446a12100c856ce9', 'STUDENT', '2013-09-30 13:45:37', '2014-01-30 06:40:51', '', '', '', '', '', '', '', 'BSIT');
INSERT INTO `tbl_user` VALUES (76, 'Cherr', 'Lloyd', 'encoder2', '446a12100c856ce9', 'ENCODER', '0000-00-00 00:00:00', '2014-01-28 06:16:57', '', '', '', '', '', '', '', NULL);
INSERT INTO `tbl_user` VALUES (77, 'Edward', 'Sean', '10-0153-826', '446a12100c856ce9', 'STUDENT', '2014-01-28 06:34:51', '2014-01-30 09:42:46', '', '', '', '', '', '', '', 'BSIT');
