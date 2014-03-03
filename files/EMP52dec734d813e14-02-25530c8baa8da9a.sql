-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2013 at 10:09 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wc_real_estate`
--
CREATE DATABASE IF NOT EXISTS `wc_real_estate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wc_real_estate`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE IF NOT EXISTS `admin_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`id`, `email`, `password`, `phone_no`, `time`) VALUES
(1, 'wcgroup', '1234', 12345, '2013-08-14 15:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE IF NOT EXISTS `advisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `advisor_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`id`, `name`, `advisor_id`, `password`, `status`) VALUES
(1, 'Rahul', 'adv1111', '1111', 1),
(2, 'Dipa', 'adv1112', '1212', 1),
(3, 'firstbox', 'adv1113', '2345', 0),
(4, 'Raptcha', 'adv1114', 'admin', 0),
(5, 'kkkk', 'adv1115', '', 0),
(6, '[[[[[', 'adv1116', '', 0),
(7, 'Rahul Kumar', 'adv1117', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `basic_information`
--

CREATE TABLE IF NOT EXISTS `basic_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) NOT NULL,
  `title` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `father_name` varchar(1000) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mar_status` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `emp_name` varchar(500) DEFAULT NULL,
  `business_name` varchar(500) DEFAULT NULL,
  `designation` varchar(500) DEFAULT NULL,
  `duties` varchar(1000) DEFAULT NULL,
  `pan_no` varchar(255) NOT NULL,
  `house_no` varchar(255) NOT NULL,
  `building_name` varchar(500) NOT NULL,
  `road_name` varchar(1000) NOT NULL,
  `area` varchar(500) NOT NULL,
  `landmark` varchar(500) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `tel_no` varchar(255) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `userfile` varchar(1000) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `basic_information`
--

INSERT INTO `basic_information` (`id`, `user_id`, `title`, `f_name`, `m_name`, `s_name`, `dob`, `father_name`, `gender`, `mar_status`, `occupation`, `emp_name`, `business_name`, `designation`, `duties`, `pan_no`, `house_no`, `building_name`, `road_name`, `area`, `landmark`, `city`, `state`, `pincode`, `tel_no`, `mobile`, `email_id`, `userfile`, `password`) VALUES
(1, 'CUS10001', 'Mrs.', 'subho', 'kr', 'das', '2013-08-14', 'Mr. Gopal Sinha', 'male', 'single', 'service', 'painting', 'likhna', 'jharu', 'web ', 'abcd9874', '50', 'nirikan', 'd.k.m road', 'baranagar', 'kalitala', 'kolkata', 'west bengal', 700035, '012345', 987654321, 'subho@gmail.com', 'uploads/abc.pdf', 'customer11111'),
(2, 'CUS10002', 'Mis', 'Priya', 'sen', 'sengupta', '2010-10-10', 'Mr. Lalchand Gopal', 'Femaile', 'Unmarried', 'Sportsman', 'sport', 'nothing', 'badminton', 'playing', '123456', '123456', '123456', '123456', 'belgharia', 'Inox', 'Kolkata', 'West Bengal', 700569, '123456789', 123456789, 'priya@gmail.com', 'uploads/priya.jpg', 'customer1212'),
(3, 'CUS10003', 'Mr', 'Chetan', 'kumar', 'das', '2010-10-10', 'Mr. Abhiman', 'Male', 'Married', 'student', 'student', 'student', 'playing', 'abc', '123456789', '123456789', '123456789', '123456789', '123466789', 'belghaira', 'Kolkata', 'West Bengal', 7000563, '123456789', 123456789, 'chetan@gmail.com', 'uploads/chetan.doc', 'customer1111'),
(4, 'CUS10004', 'Mr.', 'dipanjan', 'kanti', 'bagchi', '0000-00-00', 'diptesh', 'male', 'divorce', 'others', 'vyrazu labs', 'none', 'web developer', 'none', 'abcd', '55/7', 'none', 'd.d.road', 'behala', 'none', 'kolkata', 'wb', 700060, '123456', 2147483647, 'bagchi.dipanjan', '', '111111'),
(5, 'CUS10005', 'Mr.', 'james', '', 'bond', '2010-02-19', 'The Bond', 'male', 'married', 'police', '', '', 'detactive', 'none', 'abcdtrewq444111', '123', 'bond house', 'abcd street', '', '', 'washinton', 'blablabl;a', 7896544, '12121212', 2147483647, 'bond007', '', NULL),
(6, 'CUS10006', 'Mr.', 'anand', 'kr.', 'singh', '0000-00-00', '', 'male', 'single', 'business', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', NULL),
(7, 'CUS10007', 'Mr.', 'anand', 'krrrrrrrrr', 'singh', '2013-08-14', '', 'male', 'married', 'business', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', 0, '', '', NULL),
(8, 'CUS10008', 'Mr.', 'dipanjan', 'kanti', 'bagchi', '1991-04-09', 'diptesh', 'male', 'single', 'service', '', '', 'web developer', '', 'abcd9876', '55/7', 'none', 'd.d.road', 'behala', '', 'kolkata', 'wb', 700060, '45454545454', 2147483647, 'bagchi.dipanjan', '', NULL),
(9, 'CUS10009', 'Mr.', 'subho', 'kr', 'das', '2010-07-11', 'saurav', 'male', 'single', 'service', 'painting', 'likhna', 'jharu', 'web ', 'abcd9874', '50', 'nirikan', 'd.k.m road', 'baranagar', 'kalitala', 'kolkata', 'west bengal', 700035, '012345', 987654321, 'subho@gmail.com', '', NULL),
(10, 'CUS10010', 'Dr.', 'subho', 'kr', 'das', '2010-07-11', 'saurav', 'female', 'single', 'police', 'painting', 'likhna', 'jharu', 'web ', 'abcd9874', '50', 'nirikan', 'd.k.m road', 'baranagar', 'kalitala', 'kolkata', 'west bengal', 700035, '012345', 987654321, 'subho@gmail.com', '', NULL),
(11, 'CUS10011', 'Mr.', 'rahul', 'krrr', 'singh', '1991-04-09', 'champa', 'female', 'married', 'service', 'painting', 'likhna', 'web developer', 'none', 'abcd', '55/7', 'nirikan', 'd.d.road', 'baranagar', 'none', 'sadf', 'west bengal', 700035, '012345', 987654321, 'bagchi.dipanjan', '', 'customer11111');

-- --------------------------------------------------------

--
-- Table structure for table `homepage`
--

CREATE TABLE IF NOT EXISTS `homepage` (
  `id` int(11) NOT NULL,
  `firstvalue` varchar(300) NOT NULL,
  `secondvalue` varchar(300) NOT NULL,
  `thirdvalue` varchar(300) NOT NULL,
  `fourthvalue` varchar(300) NOT NULL,
  `page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homepage`
--

INSERT INTO `homepage` (`id`, `firstvalue`, `secondvalue`, `thirdvalue`, `fourthvalue`, `page`) VALUES
(1, 'We believe that ethics and integrity form the core strength of an organization', 'We believe in developing and maintaining long-term relationship', 'We believe in teamwork and professional approach in work', 'To instill confidence and trust in the investors through dedicated services', 'believe'),
(2, 'Every human being is exposed to various health hazards. Medical emergency can', 'Every human being is exposed to various health hazards. Medical', 'Mutual Funds are investment companies whose job is to handle their investors', 'Mutual Funds are investment companies whose job is to handle their investors', 'services'),
(3, '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur..."', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur..."', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur..."', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Lorem ipsum dolor sit amet, consectetur..."', 'testimonials');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_details`
--

CREATE TABLE IF NOT EXISTS `insurance_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `plane_name` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `initial_prem` varchar(255) NOT NULL,
  `policy_duration` varchar(255) NOT NULL,
  `amount_details` varchar(255) NOT NULL,
  `check_no` varchar(255) DEFAULT NULL,
  `exsist_policy` varchar(255) DEFAULT NULL,
  `exist_policy_no` varchar(255) DEFAULT NULL,
  `issue_bank` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `micr_no` varchar(500) NOT NULL,
  `advisor_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `insurance_details`
--

INSERT INTO `insurance_details` (`id`, `user_id`, `plane_name`, `payment_method`, `initial_prem`, `policy_duration`, `amount_details`, `check_no`, `exsist_policy`, `exist_policy_no`, `issue_bank`, `date`, `branch_name`, `micr_no`, `advisor_id`) VALUES
(1, 'CUS10008', 'renewal_business', 'direct_debit', '50000', '5_10_year', 'check', 'hgfhfh', 'yes', '46545465456', 'bob', '2010-02-03', 'behala', '7946123', 'adv1111'),
(2, 'CUS10001', 'health_insurance', 'direct_debit', '50000', '15_year', 'check', 'ghgfhfhfhf', 'yes', '879879797', 'sbi', '2010-02-03', 'behala', '7946123', 'adv1112'),
(3, 'CUS10001', 'mutual_fund', 'single_premium', '20000', '15_year', 'check', 'abcd654', 'no', NULL, 'bank of baroda', '2013-07-17', 'baranagar', '987654', ''),
(4, 'CUS10011', 'fixed_deposit', 'single_premium', '50000', '5_10_year', 'cash', '', 'no', '', 'bank of baroda', '1991-05-30', 'behala', '987654123', 'adv1112'),
(5, 'CUS10006', 'renewal_business', 'single_premium', '50000', '5_10_year', 'cash', '', 'no', '', 'bank of baroda', '1991-05-30', 'behala', '987654123', 'adv1112');

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE IF NOT EXISTS `meta_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `page` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `keyword`, `description`, `page`) VALUES
(1, 'index', 'index', 'index'),
(2, 'this is going to be the keyword for portfolio page', 'portfolio', 'portfolio'),
(3, 'login', 'this is a page which is login page', 'login'),
(4, 'services', 'services', 'services'),
(5, 'about', 'about', 'about'),
(6, 'contact', 'contact', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE IF NOT EXISTS `nominee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `nominee_name` varchar(1000) DEFAULT NULL,
  `nominee_dob` date DEFAULT NULL,
  `nominee_relatn` varchar(255) DEFAULT NULL,
  `appointee_name` varchar(1000) DEFAULT NULL,
  `appointee_relatn` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`id`, `user_id`, `nominee_name`, `nominee_dob`, `nominee_relatn`, `appointee_name`, `appointee_relatn`) VALUES
(1, 'CUS10001', 'khdskjfhjkajlfkj', '0000-00-00', 'aklsjdlajd', 'ljassldj', 'lksjdlajd'),
(2, 'CUS10001', 'dipa', '0000-00-00', 'son', 'asdasdasda', 'fghfghf'),
(3, 'CUS10008', 'kani', '2010-03-01', 'son', 'deba', 'daughter'),
(4, 'CUS10005', 'debanajan', '2010-03-01', 'son', 'deba', 'daughter'),
(5, 'CUS10011', 'yuio', '2010-05-22', 'son', 'jkad', 'daughter'),
(6, 'CUS10006', 'yashu', '1991-07-23', 'abcd', 'deba', 'daughter'),
(7, 'CUS10011', 'ami tmar', '2013-07-08', 'daughter', 'tumi amar', 'son');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(5000) NOT NULL,
  `position` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `content`, `position`) VALUES
(1, '<p><strong>DOLOR SIT AMET</strong></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper&nbsp;suscipit lobortis&nbsp;nisl ut aliquip ex ea commodo consequat. Lorem ipsum<strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do&nbsp;<strong>eiusmod tempor</strong>&nbsp;incididunt.</p>\r\n', 'top'),
(2, '<p>LOREM IPSUM</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper&nbsp;suscipit lobortis&nbsp;nisl ut aliquip ex ea commodo consequat. Lorem ipsum<strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo <a href="http://google.com">consequat</a>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do&nbsp;<strong>eiusmod tempor</strong>&nbsp;incididunt.</p>\r\n', 'left'),
(3, '<p>DOLOR SIT AMET</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper&nbsp;suscipit lobortis&nbsp;nisl ut aliquip ex ea commodo consequat. Lorem ipsum<strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do&nbsp;<strong>eiusmod tempor</strong>&nbsp;incididunt.</p>\r\n', 'right'),
(4, '<p>COMPANY</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>\r\n', 'login'),
(5, '<p>ABOUT WC REAL ESTATE</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper&nbsp;suscipit lobortisnisl ut aliquip ex ea commodo consequat. Lorem ipsum&nbsp;<strong>dolor sit amet</strong>, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do&nbsp;<strong>eiusmod tempor</strong>&nbsp;incididunt.</p>\r\n\r\n<p>OUR MISSION</p>\r\n\r\n<p>Lorem ipsum dolor sit amet,&nbsp;consectetur adipisicing&nbsp;elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet,&nbsp;<strong>consectetur adipisicing</strong>&nbsp;elit, sed do eiusmod&nbsp;tempor incididunt&nbsp;ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>\r\n\r\n<p>WHY CHOOSE US</p>\r\n\r\n<p>Lorem ipsum dolor sit amet,&nbsp;<strong>consectetur adipisicing elit</strong>, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et. Ut wisi enim ad minim veniam, quisnostrud exerci&nbsp;tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>\r\n', 'about');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
