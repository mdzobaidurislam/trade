-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 28, 2024 at 05:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trade`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image_path`, `link`, `created_at`, `updated_at`, `type`) VALUES
(10, '', 'uploads/banners/banner (1).jpg', '', '2024-07-15 05:18:59', '2024-07-15 05:18:59', 'banner'),
(11, '', 'uploads/banners/banner.jpg', '', '2024-07-15 05:30:37', '2024-07-15 05:30:37', 'banner'),
(19, '', 'uploads/banners/right/1.jpg', '', '2024-07-15 06:15:05', '2024-07-15 06:30:51', 'right_banner'),
(21, '', 'uploads/banners/4.png', '', '2024-07-15 06:23:01', '2024-07-15 06:23:01', 'left_banner'),
(22, '', 'uploads/banners/2.jpg', '', '2024-07-15 06:23:09', '2024-07-15 06:23:09', 'left_banner'),
(23, '', 'uploads/banners/1.jpg', '', '2024-07-15 06:23:15', '2024-07-15 06:23:15', 'left_banner'),
(24, '', 'uploads/banners/right/3.png', '', '2024-07-15 06:31:06', '2024-07-15 06:31:06', 'right_banner'),
(25, '', 'uploads/banners/left/4.png', '', '2024-07-15 06:31:56', '2024-07-15 06:31:56', 'left_banner');

-- --------------------------------------------------------

--
-- Table structure for table `owners`
--

CREATE TABLE `owners` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nid_number` bigint DEFAULT NULL,
  `tin_number` text COLLATE utf8mb4_general_ci,
  `business_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trade_license_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trade_license_fee` text COLLATE utf8mb4_general_ci,
  `in_words` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `issue_time` time DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license_no` text COLLATE utf8mb4_general_ci,
  `en_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_father_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_mother_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_nid_number` bigint DEFAULT NULL,
  `en_tin_number` text COLLATE utf8mb4_general_ci,
  `en_business_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_business_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_business_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_trade_license_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_trade_license_fee` decimal(10,2) DEFAULT NULL,
  `en_in_words` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_issue_date` date DEFAULT NULL,
  `en_issue_time` time DEFAULT NULL,
  `en_license_no` text COLLATE utf8mb4_general_ci,
  `en_sign_board_tax` text COLLATE utf8mb4_general_ci,
  `en_trade_tax` text COLLATE utf8mb4_general_ci,
  `en_outstanding` text COLLATE utf8mb4_general_ci,
  `en_surcharge` text COLLATE utf8mb4_general_ci,
  `en_certificate_fee` text COLLATE utf8mb4_general_ci,
  `sign_board_tax` text COLLATE utf8mb4_general_ci,
  `trade_tax` text COLLATE utf8mb4_general_ci,
  `outstanding` text COLLATE utf8mb4_general_ci,
  `surcharge` text COLLATE utf8mb4_general_ci,
  `certificate_fee` text COLLATE utf8mb4_general_ci,
  `ward_no` text COLLATE utf8mb4_general_ci,
  `en_ward_no` text COLLATE utf8mb4_general_ci,
  `holding_no` text COLLATE utf8mb4_general_ci,
  `en_holding_no` text COLLATE utf8mb4_general_ci,
  `mobile_email` text COLLATE utf8mb4_general_ci,
  `en_mobile_email` text COLLATE utf8mb4_general_ci,
  `permanent_holding_no` text COLLATE utf8mb4_general_ci,
  `en_permanent_holding_no` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners`
--

INSERT INTO `owners` (`id`, `name`, `father_name`, `mother_name`, `village`, `post_office`, `thana`, `district`, `permanent_village`, `permanent_post_office`, `permanent_thana`, `permanent_district`, `nid_number`, `tin_number`, `business_name`, `business_address`, `business_type`, `trade_license_type`, `trade_license_fee`, `in_words`, `issue_date`, `issue_time`, `image_path`, `license_no`, `en_name`, `en_father_name`, `en_mother_name`, `en_village`, `en_post_office`, `en_thana`, `en_district`, `en_permanent_village`, `en_permanent_post_office`, `en_permanent_thana`, `en_permanent_district`, `en_nid_number`, `en_tin_number`, `en_business_name`, `en_business_address`, `en_business_type`, `en_trade_license_type`, `en_trade_license_fee`, `en_in_words`, `en_issue_date`, `en_issue_time`, `en_license_no`, `en_sign_board_tax`, `en_trade_tax`, `en_outstanding`, `en_surcharge`, `en_certificate_fee`, `sign_board_tax`, `trade_tax`, `outstanding`, `surcharge`, `certificate_fee`, `ward_no`, `en_ward_no`, `holding_no`, `en_holding_no`, `mobile_email`, `en_mobile_email`, `permanent_holding_no`, `en_permanent_holding_no`) VALUES
(1, 'Chloe Carney', 'Suki Montgomery', 'Galena Harmon', 'Excepteur quo offici', 'Asperiores ea eius e', 'Saepe est anim expli', 'Velit proident ame', 'Ipsum facere rerum a', 'Delectus consequatu', 'Explicabo Nihil qua', 'Amet aut sunt volu', 530, '936', 'Wesley Bryant', 'Nostrud itaque magni', 'Non temporibus illum', 'Rerum ratione adipis', '0.00', 'Voluptas aliqua Omn', '2010-02-16', '16:27:00', NULL, NULL, 'Chloe Carney', 'Suki Montgomery', 'Galena Harmon', 'Excepteur quo offici', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Hollee Vargas', 'Brody Hardy', 'Yael Mcintyre', 'Sint in architecto q', 'Officia reiciendis a', 'Laborum Pariatur I', 'Et similique non mol', 'Qui animi voluptate', 'Et dolore recusandae', 'Occaecat aliquam est', 'Eiusmod voluptas qui', 581, '833', 'Azalia Nicholson', 'Rerum atque velit cu', 'Magna dolores eos un', 'Sit ut odio necessi', '0.00', 'Non quae sit vero fu', '1999-05-08', '13:06:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 171313538865, '171313538865', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '2000.00', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', NULL, 'CUP0003', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '55', '55', '44', '44', '44', '666', '66', '666', '666', '666', '৯', '9', '৫৫', '666', '৬৬৫৭৫৬৭৫৬', '4564575675675675676', '৫৫', '666'),
(5, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 171313538865, '171313538865', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', NULL, 'CUP0005', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Rae Wilder', 'Zeph Wilder', 'Garrison Crosby', 'Fugiat necessitatibu', 'Corrupti commodi do', 'Reprehenderit in id', 'Ab adipisicing paria', 'Esse laboriosam par', 'Fugiat sit harum qu', 'Tempor in in corrupt', 'Cupidatat elit et f', 561, '821', 'Ina Hood', 'At deleniti ipsam pr', 'Doloribus voluptatum', 'Magni exercitation p', '890', '890', '1995-06-07', '09:19:00', 'uploads/trade/1721280099_logo.png', 'CUP0006', 'Orson Robbins', 'Dacey Craig', 'Rahim Emerson', 'Dolores adipisicing ', 'Molestiae similique ', 'Exercitationem nostr', 'Sint vero minus alia', 'Officiis hic commodi', 'Ea ex in expedita ci', 'Repellendus Nulla c', 'Dolore perspiciatis', 316, '185', 'Helen Middleton', 'Quisquam odio pariat', 'Consequatur velit e', '444', 55.00, 'hhh', '2009-03-15', '12:54:00', NULL, '', '', '', '', '', '', '', '', '', '', 'Nihil cumque eum ex ', 'Porro nisi omnis in ', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'demo', 'Dylan Melton', 'Kelly Cote', 'Quam perspiciatis v', 'Cumque incidunt vel', 'Consequatur Do quos', 'Sint incidunt lauda', 'Quam perspiciatis v', 'Cumque incidunt vel', 'Consequatur Do quos', 'Sint incidunt lauda', 4444444444, '111111111', 'It', 'dhaka', 'itt', 'নতুন', '55', '66hh', '2024-07-18', '11:46:00', 'uploads/trade/1721281668_logo.png', 'CUP0007', 'Sydney Lowery', 'Ingrid Kirkland', 'Quentin Pennington', 'Ex repudiandae exerc', 'Ipsum sed aut exped', 'Dolorem animi do si', 'Dolores dolor repudi', 'Ex repudiandae exerc', 'Ipsum sed aut exped', 'Dolorem animi do si', 'Dolores dolor repudi', 7777777777777777, '7111111111', 'ddd', 'dd', 'it', 'New', 78.00, 'hju', '2024-07-18', '11:47:00', NULL, '', '', '', '', '', '', '', '', '', '', '4', '65', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `owners_old`
--

CREATE TABLE `owners_old` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `permanent_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nid_number` bigint DEFAULT NULL,
  `tin_number` text COLLATE utf8mb4_general_ci,
  `business_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `business_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trade_license_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `trade_license_fee` text COLLATE utf8mb4_general_ci,
  `in_words` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `issue_time` time DEFAULT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `license_no` text COLLATE utf8mb4_general_ci,
  `en_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_father_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_mother_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_village` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_post_office` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_thana` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_permanent_district` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_nid_number` bigint DEFAULT NULL,
  `en_tin_number` text COLLATE utf8mb4_general_ci,
  `en_business_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_business_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_business_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_trade_license_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_trade_license_fee` decimal(10,2) DEFAULT NULL,
  `en_in_words` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `en_issue_date` date DEFAULT NULL,
  `en_issue_time` time DEFAULT NULL,
  `en_license_no` text COLLATE utf8mb4_general_ci,
  `sign_board_tax` text COLLATE utf8mb4_general_ci,
  `trade_tax` text COLLATE utf8mb4_general_ci,
  `outstanding` text COLLATE utf8mb4_general_ci,
  `surcharge` text COLLATE utf8mb4_general_ci,
  `certificate_fee` text COLLATE utf8mb4_general_ci,
  `ward_no` text COLLATE utf8mb4_general_ci,
  `en_ward_no` text COLLATE utf8mb4_general_ci,
  `holding_no` text COLLATE utf8mb4_general_ci,
  `en_holding_no` text COLLATE utf8mb4_general_ci,
  `mobile_email` text COLLATE utf8mb4_general_ci,
  `en_mobile_email` text COLLATE utf8mb4_general_ci,
  `permanent_holding_no` text COLLATE utf8mb4_general_ci,
  `en_permanent_holding_no` text COLLATE utf8mb4_general_ci,
  `en_sign_board_tax` text COLLATE utf8mb4_general_ci,
  `en_trade_tax` text COLLATE utf8mb4_general_ci,
  `en_outstanding` text COLLATE utf8mb4_general_ci,
  `en_surcharge` text COLLATE utf8mb4_general_ci,
  `en_certificate_fee` text COLLATE utf8mb4_general_ci,
  `parent_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owners_old`
--

INSERT INTO `owners_old` (`id`, `name`, `father_name`, `mother_name`, `village`, `post_office`, `thana`, `district`, `permanent_village`, `permanent_post_office`, `permanent_thana`, `permanent_district`, `nid_number`, `tin_number`, `business_name`, `business_address`, `business_type`, `trade_license_type`, `trade_license_fee`, `in_words`, `issue_date`, `issue_time`, `image_path`, `license_no`, `en_name`, `en_father_name`, `en_mother_name`, `en_village`, `en_post_office`, `en_thana`, `en_district`, `en_permanent_village`, `en_permanent_post_office`, `en_permanent_thana`, `en_permanent_district`, `en_nid_number`, `en_tin_number`, `en_business_name`, `en_business_address`, `en_business_type`, `en_trade_license_type`, `en_trade_license_fee`, `en_in_words`, `en_issue_date`, `en_issue_time`, `en_license_no`, `sign_board_tax`, `trade_tax`, `outstanding`, `surcharge`, `certificate_fee`, `ward_no`, `en_ward_no`, `holding_no`, `en_holding_no`, `mobile_email`, `en_mobile_email`, `permanent_holding_no`, `en_permanent_holding_no`, `en_sign_board_tax`, `en_trade_tax`, `en_outstanding`, `en_surcharge`, `en_certificate_fee`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'মোঃআবু 1', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721044877_profile.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '8888', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2024-07-15 16:48:38', '2024-07-16 06:16:49'),
(3, 'মোঃআবু সাইদ 3', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721044877_profile.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '8888', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, '2024-07-15 16:48:38', '2024-07-16 06:16:32'),
(4, 'arabee bangla', 'ashraful', 'jahan', 'dagaria', 'shilmandi', 'narsingdi', 'narsingdi', 'dagaria', 'shilmandi', 'narsingdi', 'narsingdi', 1001852183, '12345678987', 'taj fassion', 'fassion', 'butics', 'new', '1000', 'one thousand', '2024-07-15', '22:06:00', 'uploads/trade/1721060698_images.jfif', 'CUP0006', 'tasneemul english', 'ashraful ', 'jahan', 'dagaria', 'shilmandi', 'narsingdi', 'narsingdi', 'dagaria', 'shilmandi', 'narsingdi', 'narsingdi', 1001852183, '12345678987', 'taj fassion', 'dagaria', 'fassion', 'new', 1000.00, 'one thousand', '2024-07-15', '22:18:00', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, '2024-07-15 17:41:15', '2024-07-15 17:41:15'),
(5, 'মোঃআবু সাইদ 2', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', '', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '55', '55', '55', '55', '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55', '55', '44', '44', '44', 11, '2024-07-16 05:10:06', '2024-07-16 06:16:40'),
(6, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', '', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55', '55', '44', '44', '44', 11, '2024-07-16 05:13:40', '2024-07-16 05:40:01'),
(7, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '777', '', NULL, NULL, NULL, NULL, NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-16 09:50:15', '2024-07-16 09:50:15'),
(8, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নতুন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '777', '', NULL, NULL, NULL, NULL, NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-16 09:52:54', '2024-07-16 09:52:54'),
(9, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '৯', '9', '৫৫', '666', '৬৬৫৭৫৬৭৫৬', '4564575675675675676', NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-25 07:04:58', '2024-07-25 07:04:58'),
(10, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '৯', '9', '', '666', '', '4564575675675675676', NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-25 07:08:17', '2024-07-25 07:08:17'),
(11, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '৯', '9', '', '666', '', '4564575675675675676', NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-25 07:14:01', '2024-07-25 07:14:01'),
(12, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '৯', '9', '৫৫', '666', '৬৬৫৭৫৬৭৫৬', '4564575675675675676', NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-25 07:15:33', '2024-07-25 07:15:33'),
(13, 'মোঃআবু সাইদ', 'মৃতঃ ইব্রাহীম', 'জামেলা', 'ঘোড়াদিয়া ?', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 'ঘোড়াদিয়া', 'নরসিংদী-১৬০২', 'নরসিংদী সদর', 'নরসিংদী', 1713135388653333, '5555', 'মেসার্স মাহিদ এন্টারপ্রাইজ ', 'ঘোড়াদিয়া,নরসিংদী', 'পেপার কোন প্রস্ততকারী ও সরবরাহকারী ', 'নবায়ন', '২০০০', 'দুই হাজার টাকা মাত্র', '2024-07-09', '16:56:00', 'uploads/trade/1721106820_banner.jpg', 'CUP0004', 'Md. Abu Said', 'Ibrahim', 'Jamela', 'Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 'Parmanet Ghoradia', 'Narsingdi-1602', 'Narsingdi Sadar', 'Narsingdi', 17131353885555, '444444', 'M/s Mahid Enterprises', 'Ghoradia, Narsingdi', 'Paper No Manufacturer & Supplier', 'New', 2000.00, 'Two thousand rupees only', '2012-06-01', '03:12:14', '4564654', '666', '66', '666', '666', '666', '৯', '9', '৫৫', '666', '৬৬৫৭৫৬৭৫৬', '4564575675675675676', NULL, NULL, '55', '55', '44', '44', '44', 4, '2024-07-25 07:16:17', '2024-07-25 07:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int NOT NULL,
  `logo` text COLLATE utf8mb4_general_ci,
  `site_name` text COLLATE utf8mb4_general_ci,
  `site_sub_name` text COLLATE utf8mb4_general_ci,
  `head_line` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `copy_right` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `header_logo` text COLLATE utf8mb4_general_ci,
  `phone` text COLLATE utf8mb4_general_ci,
  `email` text COLLATE utf8mb4_general_ci,
  `website` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `logo`, `site_name`, `site_sub_name`, `head_line`, `copy_right`, `header_logo`, `phone`, `email`, `website`, `created_at`, `updated_at`) VALUES
(1, 'uploads/logo/logo.png', 'চিনিশপুর ইউনিয়ন পরিষদ', 'নরসিংদী সদর , নরসিংদী', 'চিনিশপুর ইউনিয়ন পরিষদ  নরসিংদী সদর , নরসিংদী', 'Copyright © 2019 National ID Wing. All Rights Reserved.', 'uploads/logo/logo.jpg', '০১৭৬২-৬৮৭১৪৯', 'chinishpurup@gmail.com', 'www:chinishpurunionparishad.com', '2024-07-15 08:11:28', '2024-07-15 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci,
  `role` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(5, 'Super Admin', 'admin@gmail.com', '$2y$10$Gmks8O3wfSQLhtnR9e2jK.PQrrzkFwqbEAr2bBni47yu9CIvBEQv.', 'admin', '2024-07-13 05:40:22'),
(6, 'Demo product', 'u@gmail.com', '$2y$10$g/5Z2WfMx.RX5ns2UViqHu3F1vM7k.Sfn6cRh9PF5M6RpT7FY/UmK', 'user', '2024-07-14 09:51:21'),
(7, 'Ferris Mercado', 'kanig@mailinator.com', '$2y$10$61yCE1Cq0LFppHC7xt7WJ.juFFCxHmv7hQMq32QVynDWKooQYWPKC', 'user', '2024-07-14 09:53:58'),
(8, 'Dexter Turner', 'kodoxu@mailinator.com', '$2y$10$Iqcc4h1lp/ViFfxws77NQOGiRhtczT1iDgOrFhcoqMpdwV/yzayKm', 'user', '2024-07-14 09:55:15'),
(9, 'Kylan Figueroa', 'vebyhano@mailinator.com', '$2y$10$uheXY3I/hilSZIUshR3lSeBeWc3BdMeibYnaspQfBzOQXAwQIIyhq', 'user', '2024-07-14 10:18:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners`
--
ALTER TABLE `owners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owners_old`
--
ALTER TABLE `owners_old`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parent` (`parent_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `owners`
--
ALTER TABLE `owners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `owners_old`
--
ALTER TABLE `owners_old`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
