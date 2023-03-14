-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2023 at 03:46 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u583231804_share_ride_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `another_emails`
--

CREATE TABLE `another_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` enum('verified','unverified') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unverified',
  `status` enum('primary','secondary') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'secondary',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `another_emails`
--

INSERT INTO `another_emails` (`id`, `user_id`, `email`, `is_verified`, `status`, `created_at`, `updated_at`) VALUES
(9, 7, 'sunanada@mailinator.com', 'verified', 'secondary', '2023-03-06 11:23:28', '2023-03-06 11:23:28'),
(10, 8, 'deepak@mailinator.com', 'verified', 'secondary', '2023-03-07 08:45:06', '2023-03-07 08:45:06'),
(11, 7, 'heena@mailinator.com', 'verified', 'secondary', '2023-03-07 09:55:06', '2023-03-07 10:32:19'),
(15, 12, 'ptesting@mailinator.com', 'verified', 'secondary', '2023-03-10 10:41:28', '2023-03-10 10:41:53'),
(16, 8, 'arjun@mailinator.com', 'verified', 'secondary', '2023-03-11 03:48:14', '2023-03-11 03:48:24');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transit_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `term_condition` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `first_name`, `last_name`, `date_of_birth`, `address`, `city`, `province`, `postcode`, `country`, `account_no`, `transit_no`, `institution_no`, `currency`, `term_condition`, `created_at`, `updated_at`) VALUES
(2, 8, 'Arjun Singh', 'Kathayat', '2001-07-16', 'Chandigarh', 'Chandigarh', NULL, '133301', 'India', '42354354343435643', '34543543', '43543543', 'dolor', '1', '2023-03-07 08:32:05', '2023-03-07 08:32:05'),
(4, 2, 'vinay', 'raheja', '1995-07-30', 'tohana', 'tohaan', '125120', '125120', 'india', '1234123412', '424242', '2424242', '24242', '1', '2023-03-07 10:35:40', '2023-03-07 10:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) NOT NULL,
  `posted_by` int(11) DEFAULT NULL,
  `applied_by` int(11) UNSIGNED DEFAULT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `seats` varchar(191) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  `amount` varchar(191) DEFAULT NULL,
  `payment_status` enum('succeeded','fail','pending','cancel') DEFAULT 'pending',
  `status` enum('approvered','cancelled','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `posted_by`, `applied_by`, `trip_id`, `origin`, `destination`, `seats`, `message`, `amount`, `payment_status`, `status`, `created_at`, `updated_at`) VALUES
(105, 7, 8, 62, 'mohali', 'Chandigarh', '1', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '35.46', 'pending', 'cancelled', '2023-03-11 06:20:27', '2023-03-11 06:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `brand_types`
--

CREATE TABLE `brand_types` (
  `id` int(11) NOT NULL,
  `brand_types` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_types`
--

INSERT INTO `brand_types` (`id`, `brand_types`) VALUES
(1, 'Corolla'),
(2, 'Mustang'),
(3, 'Accord'),
(4, 'Silverado'),
(5, 'Altima'),
(6, '3 Series'),
(7, 'C-Class'),
(8, 'A3'),
(9, 'Elantra'),
(10, 'Optima'),
(11, 'F-150'),
(12, 'Camry'),
(13, 'Civic'),
(14, 'Sierra'),
(15, 'Sentra'),
(16, '5 Series'),
(17, 'E-Class'),
(18, 'A4'),
(19, 'Sonata'),
(20, 'Soul'),
(21, 'Ram 1500'),
(22, 'Tacoma'),
(23, 'Rogue'),
(24, 'X3'),
(25, 'GLC-Class');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`brand_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Toyota', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(2, 'Ford', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(3, 'Honda', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(4, 'Chevrolet', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(5, 'Nissan', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(6, 'BMW', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(7, 'Mercedes-Benz', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(8, 'Audi', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(9, 'Hyundai', '2023-02-28 09:18:20', '2023-02-28 09:18:20'),
(10, 'Kia', '2023-02-28 09:18:20', '2023-02-28 09:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE `car_type` (
  `id` int(11) NOT NULL,
  `car_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`id`, `car_type`, `created_at`, `updated_at`) VALUES
(1, 'SUV', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(2, 'Sports', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(3, 'Hatchback', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(4, 'Sedan', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(5, 'Coupe', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(6, 'Convertible', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(7, 'Van', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(8, 'Truck', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(9, 'Crossover', '2023-02-28 09:48:14', '2023-02-28 09:48:14'),
(10, 'Electric', '2023-02-28 09:48:14', '2023-02-28 09:48:14');

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `id` bigint(20) NOT NULL,
  `sender_id` int(100) DEFAULT NULL,
  `receiver_id` int(100) DEFAULT NULL,
  `trip_id` int(100) DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('unread','read','deleted') COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`id`, `sender_id`, `receiver_id`, `trip_id`, `message`, `status`, `created_at`, `updated_at`) VALUES
(11, 2, 7, 62, 'Hi Kamal', 'read', '2023-03-11 09:56:17', '2023-03-11 09:56:17'),
(12, 2, 7, 62, 'Hi Kamal', 'read', '2023-03-11 09:59:02', '2023-03-11 09:59:02'),
(13, 7, 2, 62, 'Yes Vinay', 'read', '2023-03-11 09:59:16', '2023-03-11 09:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state`, `country`, `pin_code`, `created_at`, `updated_at`) VALUES
(1, 'Mumbai', 'Maharashtra', 'India', '400001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(2, 'Delhi', 'Delhi', 'India', '110001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(3, 'Bangalore', 'Karnataka', 'India', '560001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(4, 'Hyderabad', 'Telangana', 'India', '500001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(5, 'Ahmedabad', 'Gujarat', 'India', '380001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(6, 'Chennai', 'Tamil Nadu', 'India', '600001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(7, 'Kolkata', 'West Bengal', 'India', '700001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(8, 'Surat', 'Gujarat', 'India', '395001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(9, 'Pune', 'Maharashtra', 'India', '411001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(10, 'Jaipur', 'Rajasthan', 'India', '302001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(11, 'Lucknow', 'Uttar Pradesh', 'India', '226001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(12, 'Kanpur', 'Uttar Pradesh', 'India', '208001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(13, 'Nagpur', 'Maharashtra', 'India', '440001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(14, 'Visakhapatnam', 'Andhra Pradesh', 'India', '530001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(15, 'Bhopal', 'Madhya Pradesh', 'India', '462001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(16, 'Patna', 'Bihar', 'India', '800001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(17, 'Ludhiana', 'Punjab', 'India', '141001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(18, 'Agra', 'Uttar Pradesh', 'India', '282001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(19, 'Nashik', 'Maharashtra', 'India', '422001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(20, 'Vadodara', 'Gujarat', 'India', '390001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(21, 'Varanasi', 'Uttar Pradesh', 'India', '221001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(22, 'Madurai', 'Tamil Nadu', 'India', '625001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(23, 'Allahabad', 'Uttar Pradesh', 'India', '211001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(24, 'Coimbatore', 'Tamil Nadu', 'India', '641001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(25, 'Amritsar', 'Punjab', 'India', '143001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(26, 'Kota', 'Rajasthan', 'India', '324001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(27, 'Srinagar', 'Jammu and Kashmir', 'India', '190001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(28, 'Thiruvananthapuram', 'Kerala', 'India', '695001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(29, 'Ghaziabad', 'Uttar Pradesh', 'India', '201001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(30, 'Rajkot', 'Gujarat', 'India', '360001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(31, 'Moradabad', 'Uttar Pradesh', 'India', '244001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(32, 'Durgapur', 'West Bengal', 'India', '713201', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(33, 'Dehradun', 'Uttarakhand', 'India', '248001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(34, 'Jammu', 'Jammu and Kashmir', 'India', '180001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(35, 'Raipur', 'Chhattisgarh', 'India', '492001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(36, 'Kollam', 'Kerala', 'India', '691001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(37, 'Bhavnagar', 'Gujarat', 'India', '364001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(38, 'Warangal', 'Telangana', 'India', '506002', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(39, 'Guntur', 'Andhra Pradesh', 'India', '522001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(40, 'Bhiwandi', 'Maharashtra', 'India', '421302', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(41, 'Saharanpur', 'Uttar Pradesh', 'India', '247001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(42, 'Gorakhpur', 'Uttar Pradesh', 'India', '273001', '2023-02-17 05:49:19', '2023-02-17 05:49:19'),
(43, 'Toronto', 'Ontario', 'Canada', 'M5B 2H1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(44, 'Montreal', 'Quebec', 'Canada', 'H2Y 2E2', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(45, 'Vancouver', 'British Columbia', 'Canada', 'V6B 6L5', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(46, 'Calgary', 'Alberta', 'Canada', 'T2P 3H1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(47, 'Edmonton', 'Alberta', 'Canada', 'T5J 0N4', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(48, 'Ottawa', 'Ontario', 'Canada', 'K1P 1J1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(49, 'Quebec City', 'Quebec', 'Canada', 'G1K 7P4', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(50, 'Winnipeg', 'Manitoba', 'Canada', 'R3C 0A5', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(51, 'Hamilton', 'Ontario', 'Canada', 'L8P 4Y5', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(52, 'London', 'Ontario', 'Canada', 'N6A 4L1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(53, 'Halifax', 'Nova Scotia', 'Canada', 'B3J 3K1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(54, 'Victoria', 'British Columbia', 'Canada', 'V8W 1N8', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(55, 'Saskatoon', 'Saskatchewan', 'Canada', 'S7N 0X1', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(56, 'Regina', 'Saskatchewan', 'Canada', 'S4P 3C8', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(57, 'St. John\'s', 'Newfoundland and Labrador', 'Canada', 'A1C 5M2', '2023-02-20 12:14:25', '2023-02-20 12:14:25'),
(58, 'Chandigarh', 'punjab', 'india', '133301', '2023-02-21 13:03:12', '2023-02-21 13:03:12'),
(59, 'Mohali', 'Punjab', 'India', '140055', '2023-02-21 13:03:12', '2023-02-21 13:03:12'),
(60, 'Sangrur', 'punjab', 'india', '148001', '2023-02-22 04:00:52', '2023-02-22 04:00:52'),
(61, 'Malerkotla', 'punjab', 'india', '148023', '2023-02-22 04:00:52', '2023-02-22 04:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Red', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(2, 'Blue', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(3, 'Green', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(4, 'Yellow', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(5, 'Black', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(6, 'White', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(7, 'Gray', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(8, 'Silver', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(9, 'Orange', '2023-02-28 09:24:11', '2023-02-28 09:24:11'),
(10, 'Purple', '2023-02-28 09:24:11', '2023-02-28 09:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `notify_by` int(11) DEFAULT NULL,
  `notify_to` int(11) DEFAULT NULL,
  `notification_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notification_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('unseen','seen') COLLATE utf8mb4_unicode_ci DEFAULT 'unseen',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `trip_id`, `booking_id`, `notify_by`, `notify_to`, `notification_type`, `notification_desc`, `role`, `status`, `created_at`, `updated_at`) VALUES
(132, 62, 105, 8, 7, 'Booking', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', NULL, 'seen', '2023-03-11 06:20:27', '2023-03-11 10:04:57'),
(133, 62, 105, 7, 8, 'cancelled', 'your booking cancelled', NULL, 'unseen', '2023-03-11 06:21:54', '2023-03-11 06:21:54'),
(134, 62, NULL, 2, 7, 'Chat Message', 'New message form vinay', NULL, 'seen', '2023-03-11 09:56:17', '2023-03-11 10:04:57'),
(135, 62, NULL, 2, 7, 'Chat Message', 'New message form vinay', NULL, 'seen', '2023-03-11 09:59:02', '2023-03-11 10:04:57'),
(136, 62, NULL, 7, 2, 'Chat Message', 'New message form kamaldeep', NULL, 'seen', '2023-03-11 09:59:16', '2023-03-11 09:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_trips`
--

CREATE TABLE `post_trips` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `stop` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `return_time` time DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `luggage` varchar(255) DEFAULT NULL,
  `back_row_seat` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL,
  `seats` int(100) DEFAULT NULL,
  `pricing` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('active','cancel') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_trips`
--

INSERT INTO `post_trips` (`id`, `user_id`, `vehicle_id`, `origin`, `destination`, `stop`, `start_date`, `return_date`, `start_time`, `return_time`, `end_date`, `end_time`, `luggage`, `back_row_seat`, `other`, `seats`, `pricing`, `description`, `status`, `created_at`, `updated_at`) VALUES
(63, 7, NULL, 'Mohali', 'Delhi', NULL, '2023-03-18', NULL, '11:18:00', NULL, NULL, NULL, 'No luggage', 'Max 2 people', '[\"Winter tires\",\"Bikes\",\"Skis & snowboards\",\"Pets\"]', 4, '30', 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'active', '2023-03-11 05:47:14', '2023-03-11 10:35:46'),
(64, 7, NULL, 'Mohali', 'Banglore', NULL, '2023-03-10', NULL, '11:18:00', NULL, NULL, NULL, 'No luggage', 'Max 2 people', '[\"Winter tires\",\"Bikes\",\"Skis & snowboards\",\"Pets\"]', 4, '30', 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'active', '2023-03-11 05:47:14', '2023-03-11 10:35:46'),
(65, 2, 19, 'Chandigarh', 'Delhi', '[\"Mohali\"]', '2023-03-15', NULL, '15:36:00', NULL, NULL, NULL, 'No luggage', 'Max 2 people', '[\"Winter tires\",\"Bikes\",\"Skis & snowboards\",\"Pets\"]', 4, '34', 'Hi we are travelling from Chandigarh to Delhi', 'active', '2023-03-13 04:03:34', '2023-03-13 04:03:34');

-- --------------------------------------------------------

--
-- Table structure for table `review_table`
--

CREATE TABLE `review_table` (
  `id` int(11) NOT NULL,
  `review_by` int(11) DEFAULT NULL,
  `review_to` int(11) DEFAULT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_rating` int(1) NOT NULL,
  `avg_rating` int(11) DEFAULT NULL,
  `user_review` text NOT NULL,
  `status` enum('approvered','cancelled','pending') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_table`
--

INSERT INTO `review_table` (`id`, `review_by`, `review_to`, `user_name`, `user_rating`, `avg_rating`, `user_review`, `status`, `created_at`, `updated_at`) VALUES
(83, 8, 7, 'frfr', 5, 5, 'tht', 'pending', '2023-03-06 09:19:14', '2023-03-06 09:19:14'),
(84, 2, 7, 'fsfg', 5, 5, 'ssfsfsf', 'pending', '2023-03-06 09:29:59', '2023-03-06 09:29:59'),
(85, 11, 7, 'sunil', 4, 5, 'Nice', 'pending', '2023-03-07 03:36:47', '2023-03-07 03:36:47'),
(86, 7, 7, 'sfsf', 3, 5, 'sfsfsfsfsfsf', 'pending', '2023-03-11 10:35:09', '2023-03-11 10:35:09'),
(87, 7, 2, 'Kamal', 5, 0, 'Nice', 'pending', '2023-03-13 04:07:18', '2023-03-13 04:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `trip_payments`
--

CREATE TABLE `trip_payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `transaction_id` varchar(191) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` enum('active','deleted') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_payments`
--

INSERT INTO `trip_payments` (`id`, `booking_id`, `user_id`, `amount`, `transaction_id`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(15, 105, 8, '35.46', 'ch_3MkLn4B91miOIWh51AraxnSm', 'succeeded', 'active', '2023-03-11 06:20:27', '2023-03-11 06:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `trip_requests`
--

CREATE TABLE `trip_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pickup_location` varchar(255) NOT NULL,
  `drop_location` varchar(255) NOT NULL,
  `leaving` date NOT NULL,
  `seat` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `status` enum('pending','approved','cancelled','deleted') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip_requests`
--

INSERT INTO `trip_requests` (`id`, `user_id`, `pickup_location`, `drop_location`, `leaving`, `seat`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 7, 'Mohali', 'Chandigarh', '2023-03-17', 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 'pending', '2023-03-11 06:11:10', '2023-03-11 06:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `verify_email` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `is_driver` tinyint(1) DEFAULT NULL,
  `facebook_id` varchar(255) DEFAULT NULL,
  `social_type` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `cardholder_name` varchar(191) DEFAULT NULL,
  `card_number` varchar(191) DEFAULT NULL,
  `card_exp` varchar(255) DEFAULT NULL,
  `exp_month` varchar(191) DEFAULT NULL,
  `exp_year` varchar(191) DEFAULT NULL,
  `email_notification` enum('true','false') NOT NULL DEFAULT 'true' COMMENT '1 = true , 0 = false',
  `sms_notification` enum('true','false') NOT NULL DEFAULT 'true' COMMENT '1 = true , 0 = false',
  `scents` varchar(255) DEFAULT NULL,
  `chattiness` varchar(151) DEFAULT NULL,
  `status` enum('active','deleted','pending') DEFAULT 'pending',
  `remember_token` varchar(255) DEFAULT NULL,
  `term_condition` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `verify_email`, `mobile_no`, `password`, `dob`, `language`, `gender`, `img`, `description`, `is_driver`, `facebook_id`, `social_type`, `google_id`, `cardholder_name`, `card_number`, `card_exp`, `exp_month`, `exp_year`, `email_notification`, `sms_notification`, `scents`, `chattiness`, `status`, `remember_token`, `term_condition`, `created_at`, `updated_at`) VALUES
(2, 'vinay', 'raheja', 'vinay@gmail.com', NULL, '918398981', '$2y$10$Sz12b3.6gyRC.uFKmgB7WeEhjijQHS5aHiebBZsZcrG.fRflKoB9q', '1967-03-18', NULL, 'male', 'images/profile/1677583591_3534Vector (2).png', 'Hi i am Travelling from.....', NULL, NULL, NULL, NULL, 'vinay', '1234123412341234', '12/02', NULL, NULL, 'true', 'true', 'scents_ok', NULL, 'active', NULL, 1, '2023-02-22 08:54:55', '2023-03-13 03:43:32'),
(7, 'kamaldeep', 'Deep', 'kamal@mailinator.com', NULL, '954806272', '$2y$10$JPHGHpH/Ee92BZu56dF//usvzN/LqGGpT/CJu.DMMb8C3snQBUq1O', '2001-07-16', NULL, 'female', 'images/profile/1677503280_31618310ab709f70727b92fa1a6917897c82.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 1, NULL, NULL, NULL, '', NULL, NULL, '', '', 'false', 'true', 'no_scents', 'Im pretty chatty', 'active', NULL, 1, '2023-02-22 09:48:08', '2023-03-11 11:16:18'),
(8, 'jagtar', 'singh', 'jagtar@mailinator.com', NULL, '987654432321', '$2y$10$6Bf54x8RhTD3mBD9T9HNLex91AQj2cZR2y8lmu8169XYwdMSGiWF2', '1963-02-16', NULL, 'male', 'images/profile/1677060431_970204910-untitled-design-78.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,', 0, NULL, NULL, NULL, 'Arjun Singh Kathayat', '4242424242424242', '02/26', NULL, NULL, 'true', 'true', 'no_scents', '2', 'active', NULL, 1, '2023-02-22 10:03:03', '2023-03-07 10:18:38'),
(11, 'sunil', 'kumar', 'sunil@mailinator.com', NULL, '12345678', '$2y$10$/hdqR4Vzo0n9HaJ./o5LUOTFuaHb.ftYkWjoqmPSjNSH6Mw./R8Me', '1952-03-03', NULL, 'male', 'images/profile/1677326008_1755Screenshot from 2022-12-23 11-26-30.png', 'jijiji', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', 'true', NULL, NULL, 'active', NULL, 1, '2023-02-25 11:52:39', '2023-02-25 11:53:37'),
(12, 'sunanda', 'plaha', 'wypp@mailinator.com', NULL, '7340940158', '$2y$10$vvrQiovexwahSuxdjog99eK5hYmUUPn8Uen6x1B2ecL0r8Tx5k992', '1956-05-11', NULL, 'female', 'images/profile/1678442926_412582.jpg', 'hello there , i am a professional driver on shareride.You can book your rides here whenever you want', 1, NULL, NULL, NULL, 'Lillith Rocha', '168', '3', NULL, NULL, 'true', 'true', 'no_scents', '2', 'deleted', NULL, NULL, '2023-03-10 09:45:08', '2023-03-10 11:07:41'),
(13, 'Isha Devi', NULL, 'isharana214@gmail.com', '1', NULL, 'eyJpdiI6IjRxMGR4MW9aOHVIRzcvSzJHZ2JzSnc9PSIsInZhbHVlIjoiMCtlM1BNalVoTmFyQldTQUg3QnAwdz09IiwibWFjIjoiNTY3ODZhNTUzMWZkZjQwNTczZjViNjgyNGQ3M2YzNDQ2YzNiMjkyZTFlYWE4NjhmOWQ2MzAyMmRiOWYzNmQ3YSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '102930988265488454179', NULL, NULL, NULL, NULL, NULL, 'true', 'true', NULL, NULL, 'pending', NULL, NULL, '2023-03-10 10:20:40', '2023-03-10 10:20:40'),
(14, 'Maris Jacobs', 'Maris Jacobs', 'noma@mailinator.com', NULL, NULL, '$2y$10$NjvjHSARfLYn7.vWyKn0kuEvaaRHJ5zE1OlbSqoFT8Ol6VpnV.1Gu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'true', 'true', NULL, NULL, 'pending', NULL, NULL, '2023-03-10 11:13:48', '2023-03-10 11:13:48'),
(15, 'Dev3 BDPL', NULL, 'dev3.bdpl@gmail.com', '1', NULL, 'eyJpdiI6Im4zd3BDajM0czB1WGZiNldPU1VneWc9PSIsInZhbHVlIjoiTzl4a1NlTGR2dzRLcXpiSWpML3FHZz09IiwibWFjIjoiYTY1ZTI2NTUwZTJkYTk4N2NlOWVjNzVlZTFlYjY5NDExMDE1MjFiY2I1NTVhYzRjNGEzNTA5ZDI5YWUxMDk2YSIsInRhZyI6IiJ9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', '107842009698444900542', NULL, NULL, NULL, NULL, NULL, 'true', 'true', NULL, NULL, 'pending', NULL, NULL, '2023-03-11 06:38:01', '2023-03-11 06:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_models`
--

CREATE TABLE `vehicle_models` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `luggage` enum('S','M','Large','NO') NOT NULL DEFAULT 'NO',
  `back_row_seat` int(2) DEFAULT NULL,
  `others` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`others`)),
  `licence_no` varchar(255) DEFAULT NULL,
  `status` enum('active','deleted') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_models`
--

INSERT INTO `vehicle_models` (`id`, `user_id`, `brand`, `model`, `type`, `color`, `year`, `img`, `luggage`, `back_row_seat`, `others`, `licence_no`, `status`, `created_at`, `updated_at`) VALUES
(17, 2, 'Toyota', NULL, NULL, 'Blue', '1992', 'images/vehicle/1677585877_450019qeasa_1459071.webp', 'NO', NULL, NULL, '1234', 'deleted', '2023-02-28 12:04:38', '2023-03-01 08:24:59'),
(18, 7, 'Ford', NULL, NULL, 'Blue', '1911', 'images/vehicle/1677659114_2622images.jpeg', 'NO', NULL, NULL, '123', 'deleted', '2023-03-01 08:25:14', '2023-03-11 10:35:46'),
(19, 2, 'Toyota', 'Silverado', 'SUV', 'Green', '1991', 'images/vehicle/1677659248_290219qeasa_1459071.webp', 'NO', NULL, NULL, 'POP123', 'active', '2023-03-01 08:27:28', '2023-03-13 04:04:31'),
(20, 12, 'Ford', 'Mustang', 'SUV', 'Red', NULL, 'images/vehicle/1678443467_8833mustang.jpg', 'NO', NULL, NULL, NULL, 'deleted', '2023-03-10 10:17:47', '2023-03-10 10:34:18'),
(21, 12, 'Honda', 'Silverado', 'Sedan', NULL, '2021', 'images/vehicle/1678446159_1746mustang.jpg', 'NO', NULL, NULL, NULL, 'active', '2023-03-10 11:02:39', '2023-03-10 11:03:03'),
(22, 7, 'Toyota', 'Corolla', 'SUV', 'Red', '1911', 'images/vehicle/1678531014_7023images.jpeg', 'NO', NULL, NULL, NULL, 'deleted', '2023-03-11 10:36:54', '2023-03-11 10:39:26'),
(23, 7, 'Honda', 'Corolla', 'SUV', 'Green', '1911', 'images/vehicle/1678531265_1944images.jpeg', 'NO', NULL, NULL, NULL, 'active', '2023-03-11 10:41:05', '2023-03-11 10:41:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `another_emails`
--
ALTER TABLE `another_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_types`
--
ALTER TABLE `brand_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post_trips`
--
ALTER TABLE `post_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `review_table`
--
ALTER TABLE `review_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_payments`
--
ALTER TABLE `trip_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_requests`
--
ALTER TABLE `trip_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `another_emails`
--
ALTER TABLE `another_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `brand_types`
--
ALTER TABLE `brand_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `post_trips`
--
ALTER TABLE `post_trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `review_table`
--
ALTER TABLE `review_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `trip_payments`
--
ALTER TABLE `trip_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trip_requests`
--
ALTER TABLE `trip_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicle_models`
--
ALTER TABLE `vehicle_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
