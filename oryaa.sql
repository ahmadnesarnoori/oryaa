-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 06:19 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;dafd
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oryaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `account_type`, `description`, `created_at`, `updated_at`) VALUES
(1000, 'Cash', 'Assets', NULL, NULL, NULL),
(10000, 'Physical Cash', 'Assets', NULL, NULL, NULL),
(11000, 'Inventory', 'Assets', NULL, NULL, NULL),
(12000, 'Supplies', 'Assets', NULL, NULL, NULL),
(15000, 'Land', 'Assets', NULL, NULL, NULL),
(16000, 'Buildings', 'Assets', NULL, NULL, NULL),
(17000, 'Equipment', 'Assets', NULL, NULL, NULL),
(18000, 'Vehicles', 'Assets', NULL, NULL, NULL),
(19000, 'Furniture and Fixtures', 'Assets', NULL, NULL, NULL),
(19500, 'Accumulated Depreciation', 'Assets', NULL, NULL, NULL),
(19600, 'Intellectual Property', 'Assets', NULL, NULL, NULL),
(19800, 'Goodwill', 'Assets', NULL, NULL, NULL),
(20000, 'Short-Term Loan', 'Lona', NULL, NULL, NULL),
(21000, 'Loan', 'Loan', NULL, NULL, NULL),
(21500, 'Bonds', 'Loan', NULL, NULL, NULL),
(22000, 'Salary Loan', 'Loan', NULL, NULL, NULL),
(22500, 'Wages loan', 'Loan', NULL, NULL, NULL),
(23000, 'Interest Loan', 'Loan', NULL, NULL, NULL),
(23500, 'Accrued Accounts', 'Loan', NULL, NULL, NULL),
(24000, 'Tax Loan', 'Loan', NULL, NULL, NULL),
(24500, 'Customer Deposit', 'Loan', NULL, NULL, NULL),
(24600, 'Warranty Loan', 'Loan', NULL, NULL, NULL),
(24800, 'Lawsuit Loan', 'Loan', NULL, NULL, NULL),
(25000, 'Long-Term Loan', 'Loan', NULL, NULL, NULL),
(30000, 'Deposit', 'Equity', 'Equity: Deposit', NULL, NULL),
(39999, 'Profit & Loss', 'Equity', NULL, NULL, NULL),
(40000, 'Income', 'Income', NULL, NULL, NULL),
(50000, 'Cost of Goods Sold', 'Cost of Goods Sold', NULL, NULL, NULL),
(60000, 'Expenses', 'Expenses', NULL, NULL, NULL),
(60500, 'Advertising Expense', 'Expenses', NULL, NULL, NULL),
(61000, 'Bank Service Charge', 'Expenses', NULL, NULL, NULL),
(62000, 'Delivery Expense', 'Expenses', NULL, NULL, NULL),
(63000, 'Depreciation Expense', 'Expenses', NULL, NULL, NULL),
(64000, 'Insurance Expense', 'Expenses', NULL, NULL, NULL),
(65000, 'Interest Expense', 'Expenses', NULL, NULL, NULL),
(66000, 'Rent Expense', 'Expenses', NULL, NULL, NULL),
(67000, 'Repairs and Maintenance', 'Expenses', NULL, NULL, NULL),
(68000, 'Salaries Expense', 'Expenses', NULL, NULL, NULL),
(69000, 'Supplies Expense', 'Expenses', NULL, NULL, NULL),
(70000, 'License Fees and Taxes', 'Expenses', NULL, NULL, NULL),
(71000, 'Telephone Expense', 'Expenses', NULL, NULL, NULL),
(72000, 'Training and Development', 'Expenses', NULL, NULL, NULL),
(73000, 'Utilities Expense', 'Expenses', NULL, NULL, NULL),
(74000, 'Miscellaneous Expenses', 'Expenses', NULL, NULL, NULL),
(75000, 'Warranties Expense', 'Expenses', NULL, NULL, NULL),
(76000, 'Bad Debts Expense', 'Expenses', NULL, NULL, NULL),
(80000, 'Other Expenses', 'Other Expenses', NULL, NULL, NULL),
(90000, 'Other Income', 'Other Income', NULL, NULL, NULL),
(95000, 'Exchange Gain and Loss', 'Exchange Gain and Loss', NULL, NULL, NULL),
(99999, 'Unspecified Account', 'Unspecified Account', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcementdetails`
--

CREATE TABLE `announcementdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `announcement` int(10) UNSIGNED NOT NULL,
  `heading` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogposts`
--

CREATE TABLE `blogposts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `heading` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abstract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `category` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `heading`, `url`, `abstract`, `file`, `created_at`, `updated_at`, `category`) VALUES
(1, 'By The Name of Allah', 'By-name-allah', 'We are starting our first blog post by the name of allah', '1.png', '2018-11-13 19:30:00', NULL, 'news'),
(2, 'Peer-to-Peer Accounting', 'Peer-to-peer-accounting', 'Peer to peer accounting is a developed system of double entry accounting but instead of concentrating ', 'nesarahmad.png', '2018-11-18 19:30:00', NULL, 'news'),
(3, 'Double-Entry Account', 'Double-Entry-Accounting', 'The descrption for double entry accounting is going here so don\'t be wored we are working to solve these problems as soon as possible', 'nesarahmad2.png', '2018-11-18 19:30:00', NULL, 'news'),
(10, 'US dollar market hit it\'s hist level', 'US dollar market hit it\'s hist level', '', '', '2018-11-08 19:30:00', NULL, 'market'),
(11, 'Trade ware between US and Chine ', 'Trade ware between US and Chine ', '', '', '2018-10-31 19:30:00', NULL, 'market'),
(12, 'Afghanistan economy is getting better', 'Afghanistan economy is getting better', '', '', '2018-11-01 19:30:00', NULL, 'market'),
(13, 'Latest Technology new here', 'Latest Technology new here', '', '', '2018-11-08 16:25:37', '2018-11-19 16:25:37', 'technology'),
(14, 'New iphone x is interduced by Apple inc', 'New iphone x is interduced by Apple inc', '', '', '2018-11-13 16:25:37', '2018-11-19 16:25:37', NULL),
(15, 'Get lates technology news here', 'Get lates technology news here', '', '', '2018-11-08 16:39:33', '2018-11-19 16:39:33', 'technology');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `type`, `currency`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Currency', 'USD', 'United States Dollar', '1.png', NULL, NULL),
(2, 'Currency', 'GBP', 'British Pound', '2.png', '2018-11-12 19:30:00', '2018-11-12 19:30:00'),
(3, 'Currency', 'EUR', 'Euro', '3.png', '2018-11-12 19:30:00', '2018-11-12 19:30:00'),
(4, 'Currency', 'TRY', 'Turkish Lira', '4.png', '2018-11-15 19:30:00', '2018-11-26 19:30:00'),
(5, 'Currency', 'INR', 'Indian Rupee', '5.png', '2018-11-28 19:30:00', '2018-11-28 19:30:00'),
(6, 'Currency', 'AFN', 'Afghani', '6.png', NULL, NULL),
(7, 'Currency', 'RUB', 'Russian Ruble', NULL, '2019-01-22 00:59:13', '2019-01-14 21:41:08'),
(10000, 'Stock', 'AAPL', 'Apple Inc', '10000.png', '2018-11-20 19:30:00', '2018-11-19 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bank_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `account` int(10) UNSIGNED NOT NULL,
  `currency` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `bank_id`, `description`, `account`, `currency`, `amount`, `file`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 'Amount 100,000 USD Deposited to ORYAA Account ', 30000, 1, '1000000.00', NULL, '2019-01-05 15:40:06', '2018-12-31 19:30:00'),
(9, 1, 1, 'Amount 1,000,000 GBP (British Pound) Deposited to ORYAA\'s Account', 30000, 2, '1000000.00', NULL, '2019-01-06 15:22:41', '2018-12-31 19:30:00'),
(10, 1, 1, 'Amount 1,000,000 EUR (Euro) Deposited to ORYAA\'s Account', 30000, 3, '1000000.00', NULL, '2019-01-06 15:22:41', '2018-12-31 19:30:00'),
(11, 1, 1, 'Amount 1,000,000 TRY (Turkish Lira) Deposited to ORYAA\'s Account', 30000, 4, '1000000.00', NULL, '2019-01-06 15:22:41', '2018-12-31 19:30:00'),
(12, 1, 1, 'Amount 1,000,000 INR (Indian Rupee) Deposited to ORYAA\'s Account', 30000, 5, '1000000.00', NULL, '2019-01-06 15:22:41', '2018-12-31 19:30:00'),
(13, 1, 1, 'Amount 1,000,000 AFN (Afghani) Deposited to ORYAA\'s Account', 30000, 6, '1000000.00', NULL, '2019-01-06 15:22:41', '2018-12-31 19:30:00'),
(14, 1, 1, 'Amount 1,000,000 RUB (Russian Ruble) Deposited to ORYAA\'s Account', 30000, 7, '1000000.00', NULL, '2019-01-06 15:40:47', '2018-12-31 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `exchangerates`
--

CREATE TABLE `exchangerates` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_currency` int(10) UNSIGNED NOT NULL,
  `second_currency` int(10) UNSIGNED NOT NULL,
  `rate` decimal(10,6) NOT NULL,
  `value` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exchangerates`
--

INSERT INTO `exchangerates` (`id`, `first_currency`, `second_currency`, `rate`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1.000000', 'up', NULL, NULL),
(2, 2, 1, '1.275420', 'up', '2018-11-11 19:30:00', '2018-11-10 19:30:00'),
(3, 3, 1, '1.137840', 'do', '2018-11-19 19:30:00', '2018-11-19 19:30:00'),
(4, 4, 1, '0.193545', 'up', '2018-11-19 19:30:00', '2018-11-28 19:30:00'),
(5, 5, 1, '0.014339', 'do', '2018-11-28 19:30:00', '2018-11-28 19:30:00'),
(6, 10000, 1, '179.550000', 'up', NULL, NULL),
(7, 6, 1, '0.013280', 'up', NULL, NULL),
(8, 7, 1, '0.014748', 'up', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exchanges`
--

CREATE TABLE `exchanges` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `person_id` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_currency` int(10) UNSIGNED NOT NULL,
  `from_amount` decimal(8,2) NOT NULL,
  `to_currency` int(10) UNSIGNED NOT NULL,
  `to_amount` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `person_id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'Other', NULL, '2019-01-07 11:33:41', '2019-01-07 11:33:41'),
(3, 4, 1, 'Other', NULL, '2019-01-07 11:41:35', '2019-01-07 11:41:35'),
(4, 1, 2, 'Partner', NULL, '2019-01-08 09:35:45', '2019-01-08 09:35:45');

-- --------------------------------------------------------

--
-- Table structure for table `indexes`
--

CREATE TABLE `indexes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(13,2) NOT NULL,
  `percentage` decimal(5,2) NOT NULL,
  `status` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indexes`
--

INSERT INTO `indexes` (`id`, `name`, `value`, `percentage`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'DOW ', '26270.00', '16.00', 'up', NULL, NULL, NULL),
(2, 'NASD', '7273.08', '-0.25', 'up', NULL, '2018-11-19 19:30:00', '2018-11-20 19:30:00'),
(3, 'FTSE', '6990.42', '-0.70', 'do', NULL, '2018-11-13 19:30:00', '2018-11-14 19:30:00'),
(4, 'GOLD', '1228.00', '-0.20', 'up', NULL, '2018-11-20 19:30:00', '2018-11-21 19:30:00'),
(5, 'S&P 500', '2.00', '3.43', 'up', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indexfollowers`
--

CREATE TABLE `indexfollowers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `index` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indexfollowers`
--

INSERT INTO `indexfollowers` (`id`, `user_id`, `index`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-01-06 10:59:52', '2019-01-06 10:59:52'),
(2, 1, 2, '2019-01-06 10:59:56', '2019-01-06 10:59:56'),
(3, 1, 3, '2019-01-06 11:00:00', '2019-01-06 11:00:00'),
(4, 1, 4, '2019-01-06 11:00:04', '2019-01-06 11:00:04'),
(5, 2, 1, '2019-01-07 11:10:08', '2019-01-07 11:10:08'),
(6, 2, 2, '2019-01-07 11:10:11', '2019-01-07 11:10:11'),
(7, 2, 3, '2019-01-07 11:10:12', '2019-01-07 11:10:12'),
(8, 2, 4, '2019-01-07 11:10:13', '2019-01-07 11:10:13'),
(9, 3, 1, '2019-01-07 11:32:41', '2019-01-07 11:32:41'),
(10, 3, 2, '2019-01-07 11:32:43', '2019-01-07 11:32:43'),
(11, 3, 3, '2019-01-07 11:32:44', '2019-01-07 11:32:44'),
(12, 3, 5, '2019-01-07 11:32:46', '2019-01-07 11:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `user_id`, `type`, `description`, `created_at`, `updated_at`) VALUES
(13, 1, 'Phone', '+93788649496', '2019-01-05 10:57:55', '2019-01-05 10:57:55'),
(14, 1, 'Email', 'info@oryaa.com', '2019-01-05 10:58:46', '2019-01-05 10:58:46'),
(15, 1, 'Email', 'ahmadnesarnoori@gmail.com', '2019-01-05 10:59:03', '2019-01-05 10:59:03'),
(16, 1, 'Address', 'Third Street, Al-Madina Town', '2019-01-05 11:00:16', '2019-01-05 11:00:16'),
(17, 1, 'ZipCode', '1064', '2019-01-05 11:00:30', '2019-01-05 11:00:30'),
(18, 1, 'District', '5', '2019-01-05 11:04:58', '2019-01-05 11:04:58'),
(19, 1, 'City', 'Kabul', '2019-01-05 11:05:56', '2019-01-05 11:05:56'),
(20, 1, 'Country', 'Afghanistan', '2019-01-05 11:06:13', '2019-01-05 11:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `journalentries`
--

CREATE TABLE `journalentries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `debit` int(10) UNSIGNED NOT NULL,
  `credit` int(10) UNSIGNED NOT NULL,
  `currency` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE `like` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `message` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_31_142309_create_accounts_table', 1),
(4, '2018_10_31_142455_create_currencies_table', 1),
(5, '2018_10_31_142615_create_deposits_table', 1),
(6, '2018_10_31_142654_create_payments_table', 1),
(7, '2018_10_31_142738_create_transactions_table', 1),
(8, '2018_10_31_142840_create_journalentries_table', 1),
(9, '2018_10_31_142918_create_exchanges_table', 1),
(10, '2018_10_31_142952_create_information_table', 1),
(11, '2018_10_31_143249_create_followers_table', 1),
(12, '2018_10_31_151757_create_posts_table', 1),
(13, '2018_10_31_151855_create_like_table', 1),
(14, '2018_10_31_151935_create_comments_table', 1),
(15, '2018_10_31_152009_create_messages_table', 1),
(16, '2018_10_31_161800_create_announcements_table', 1),
(17, '2018_10_31_161846_create_announcementdetails_table', 1),
(18, '2018_11_01_042028_create_exchangerates_table', 1),
(19, '2018_11_01_042917_create_indexes_table', 1),
(20, '2018_11_01_043540_create_indexfollowers_table', 1),
(30, '2018_11_19_053703_create_blogs_table', 2),
(31, '2018_11_19_054218_create_blogposts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('info@oryaa.com', '$2y$10$dS87C0CvuSJc6z/NAtb5k.HIVoqWAs.X7p7E0ENnP5nxV68Ddr1IS', '2019-01-06 12:21:35'),
('ahmadnesarnoori@gmail.com', '$2y$10$j7naNbE7cjY9VVcOIqQaSOIS.zf/eWK9zhUHA3qNMivWT6YYpfjau', '2019-01-06 12:40:58');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `account` int(10) UNSIGNED NOT NULL,
  `currency` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_account` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `person_id`, `description`, `account`, `currency`, `amount`, `file`, `second_account`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'It is an online payment transaction, which shows that ORYAA sent 10,000 USD to your account on a short-term loan.  To make a digital payment transaction, click the send icon on the right corner of the navigation bar, then fill the online payment form and click the send button. Photo by nappy from Pexels', 20000, 1, '10000.00', '00000002.jpg', NULL, '2019-01-08 09:18:40', '2019-01-08 09:18:40');

--
-- Triggers `payments`
--
DELIMITER $$
CREATE TRIGGER `check_cash_balance` BEFORE INSERT ON `payments` FOR EACH ROW if (SELECT sum(balance) as balance
FROM
(
SELECT sum(amount) as balance from deposits
where user_id=New.user_id and currency=New.currency
union All
SELECT sum(amount)*(-1) as balance from payments
where user_id=New.user_id and currency=New.currency
union ALL
Select sum(amount) as balance from payments
where person_id=New.user_id and currency=New.currency
union All
Select sum(to_amount) as balance from exchanges
Where user_id=New.user_id and to_currency = New.currency and person_id is not null
Union all
Select sum(from_amount)*(-1) as balance from exchanges
Where user_id = New.user_id and from_currency = New.currency and person_id is not null
Union all
Select sum(from_amount) as balance from exchanges
Where person_id = New.user_id and from_currency = New.currency
Union all
Select sum(to_amount)*(-1) as balance from exchanges
Where person_id = New.user_id and to_currency = New.currency
) as AAAA) < new.amount

THEN
SIGNAL SQLSTATE '45000'
Set MESSAGE_TEXT ='Transfer Amount is Higher Then Available Cash Balance';
End if
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `type`, `heading`, `content`, `file`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hashtag', 'Welcome', 'Welcome this is a sample post you can make post by click the send icon in right corner of the navbar and then select post.', NULL, '2019-01-06 11:38:07', '2019-01-06 11:38:07'),
(2, 1, 'Hashtag', 'Welcome', 'Welcome to ORYAA', 'welcome.png', '2019-01-07 10:41:54', '2019-01-07 10:41:54'),
(3, 1, 'Hashtag', 'Post', 'Follow everything from business and politics to entertainment and sport. Then, join the conversation by posting. To make a post click on the send icon then in the post section you can write and post everything you want with pictures and videos. Photo by The Lazy Artist Gallery from Pexels', '00000001.jpg', '2019-01-08 09:18:49', '2019-01-08 09:18:49'),
(4, 1, 'Hashtag', 'Reports', 'Report. Photo by bruce mars from Pexels', '00000003.jpg', '2019-01-08 09:18:50', '2019-01-08 09:18:50'),
(5, 1, 'Hashtag', 'ElectronicPayments', 'Electronic payment is for transferring money from one person to another person. Alice sends 1,000 USD to Bob on a short-term loan, and then Alice pays his house rent of amount 500 USD to Bob, to add the above transactions Alice must insert following data in electronic payment table:\r\n1.	Person Id (second party user id, in this example Bob’s user id)\r\n2.	Account (asset, loan or an expense account)\r\n3.	Currency.\r\n4.	Amount.', NULL, '2019-01-08 09:05:48', '2019-01-08 09:05:48'),
(6, 1, 'Hashtag', 'OnlinePayment', 'Before inserting data in digital payment table, the system has to check if the first party has enough amount of money on his or her balance to do an online payment transaction. If the first party chooses an asset or an expense account, then the second party should choose an income or an asset account in the second account field of electronic payment table. In the last transaction, Alice selected an expense account; therefore, Bob has to specify a credit account for his side assumes he is choosing general income account.', NULL, '2019-01-08 09:07:14', '2019-01-08 09:07:14'),
(7, 1, 'Hashtag', 'CreditTransaction', 'Credit transactions are payable later, then when the exchange of goods or services took place.  Assume Alice purchases a computer from Bob by 600 USD on a long-term loan, to add this transaction she must insert the following data in credit transaction table:\r\n1.	Person id \r\n2.	Debit (account number 1,000-1,999 or 5,000-8,999)\r\n3.	Credit (account number 2,000-2,999)\r\n4.	Currency\r\n5.	Amount', NULL, '2019-01-08 09:09:14', '2019-01-08 09:09:14'),
(8, 1, 'Hashtag', 'CreditTransaction', 'After the first party inserts a credit transaction, then the second party has to specify a credit account (an asset or an income account). In this example, assume Bob chooses sales income account.', NULL, '2019-01-08 09:10:17', '2019-01-08 09:10:17'),
(9, 1, 'Hashtag', 'Exchange', 'Exchange entry enables a user to trade currencies and securities. Suppose that Alice exchanges an amount of 7,000 AFN with an amount of 100 USD, to add the above transaction Alice must add following data in exchange table (exchange sales offer):\r\n1.	Person id (default value null)\r\n2.	From asset \r\n3.	From amount\r\n4.	To asset\r\n5.	To amount\r\n6.	Validation date', NULL, '2019-01-08 09:11:45', '2019-01-08 09:11:45'),
(10, 1, 'Hashtag', 'Exchange', 'The first party would not be able to insert person id in exchange table, this field value is null by default, and it does not affect any account. This transaction would be available for all users to view if any user wants to perform this transaction with Alice, then he or she must update field person id in exchange table by their user id. In this example, assume Bob want to exchange 7,000 AFN with 100 USD.', NULL, '2019-01-08 09:13:05', '2019-01-08 09:13:05'),
(11, 1, 'Hashtag', 'JournalEntry', 'Journal entries are made to redistribute money from one account line to another. Each journal entry must include at least two accounts to record both a debit and a credit account.', NULL, '2019-01-08 09:14:26', '2019-01-08 09:14:26'),
(12, 1, 'Hashtag', 'FinancialReports', 'Financial reporting is the process of reporting the results and financial position of a business or reporting entity\'. Their principal function is to provide historical information to satisfy the information needs of stakeholders (CPA Australia 2017). It is necessary for a person to have adequate financial information on which to form opinions and base decisions. This information must accurately represent the financial position of a person at any point in time (Manitoba Government 2018).', NULL, '2019-01-08 09:14:56', '2019-01-08 09:14:56'),
(13, 1, 'Hashtag', 'Exchange', 'To compile financial reports for multicurrency firms, it converts foreign currencies into a single reporting currency, using exchange rates table.', NULL, '2019-01-08 09:15:44', '2019-01-08 09:15:44'),
(14, 1, 'Hashtag', 'BalanceSheet', 'The balance sheet summarizes a person’s financial condition as of a particular date. Similar to a photograph, the balance sheet does not record any movement but preserves a record of the company’s assets, liabilities, and equity at a particular point in time (W.Harms 2017), which shows the financial position of a concern (S 2016). Photo by rawpixel.com from Pexels ', '00000004.jpg', '2019-01-08 09:16:29', '2019-01-08 09:16:29'),
(15, 1, 'Hashtag', 'PeertoPeerElectronicAccounting', 'Double-entry bookkeeping system is complex, and it is not scalable to the current technology growth. To solve these problem accountants are looking for a digitized smart system. Despite the development of this system, we need more research for the implementation of the system, security, big data analysis, and etcetera.', NULL, '2019-01-08 08:17:06', '2019-01-08 08:17:06'),
(16, 1, 'Hashtag', 'PeertoPeerElectronicAccounting', 'First, praises and thanks to God, the Almighty for his showers of blessings throughout my research work to complete the research successfully. This journey would not have been possible without the support of my family, teachers, and friends. I am very grateful to my parents, wife, brothers, and sisters for their love, prayers, caring and sacrifices for educating and preparing me for my future. Finally, my thanks go to all the people who have supported me to complete the research work directly or indirectly.\r\nBest Regards\r\nNesar Ahmad Noori', NULL, '2019-01-08 08:18:50', '2019-01-08 08:18:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `debit` int(10) UNSIGNED NOT NULL,
  `credit` int(10) UNSIGNED NOT NULL,
  `currency` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_account` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'profile.png',
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'cover.png',
  `phone_number` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `home_currency` int(11) DEFAULT '1',
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `date_of_birth`, `gender`, `address`, `city`, `state`, `country`, `bio`, `image`, `file`, `phone_number`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `home_currency`, `status`) VALUES
(1, 'ORYAA', 'ORYAA', '', '2018-06-01', 'Male', NULL, NULL, NULL, 'Afghansitan', NULL, '1.png', 'cover.png', '+93788649496', 'info@oryaa.com', NULL, '$2y$10$YmA81oqWMyGmSOccIsyiZONlQBY7Aaiai1pk2XqvjZba1WNoKo9am', 'bU64df158Gw5RJIFHiZraMze8l2r4q4oIdYDinkWy2DFBCcl4yZz78EpFCXr', '2019-01-05 10:43:02', '2019-01-05 10:43:02', 1, NULL),
(2, 'nesarahmadnoori', 'Nesar Ahmad', 'Noori', '1992-03-12', 'Male', NULL, NULL, NULL, 'Afghansitan', NULL, 'nesarahmad.jpg', 'nesarahmad.png', '+93788649496', 'ahmadnesarnoori1@gmail.com', NULL, '	\r\n$2y$10$YmA81oqWMyGmSOccIsyiZONlQBY7Aaiai1pk2XqvjZb', '7ul36uoONJLRzfmYjQ4c9om2EiBJkapFDADQECdPMW8MMEhyWUKXaXraCnak', '2019-01-07 11:06:08', '2019-01-07 11:06:08', 1, NULL),
(3, 'ahmadwalinoori', 'Ahmad Wali', 'Noori', '1982-12-04', 'Male', NULL, NULL, NULL, 'United States', NULL, 'ahmadwali.png', 'ahmadwalinoori.jpg', '+14109467913', 'ah.walinoori@gmail.com', NULL, '$2y$10$C.rjfiFRKt0s8kI4siXndenLDW3xF778uB/wgG5E2mP1lfrEQ4KI.', 'dRRLrLjDPIj1jQwu7q0zRN0o2jZoZS42d2lcWC4qfoe6WJcWJqsdtpPrJY2g', '2019-01-07 11:30:12', '2019-01-07 11:30:12', 1, NULL),
(4, 'noorahmadnoori', 'Noor Ahmad', 'Noori', '1991-10-20', 'Male', NULL, NULL, NULL, 'Afghanistan', NULL, 'noorahmadnoori.jpg', 'cover.png', '+93776211644', 'noorahmad.745.nan@gmail.com', NULL, '$2y$10$GrMXDqIGx2syHDfbrtLjTelRP3rZiDOopuXyYW.edOLmtPrsb.WSy', NULL, '2019-01-07 11:39:36', '2019-01-07 11:39:36', 1, NULL),
(30, 'Hosna', 'Hosna', 'Noori', '2019-01-02', 'Female', NULL, NULL, NULL, 'Afghanistan', NULL, 'profile.png', 'cover.png', '+93788649496', 'ahmadnesarnoori@gmail.com', NULL, '$2y$10$kbO7qYGmc62BqFNnqQEaje40gBoAMHrjzOK6bs2/FhlyvWqDbFu2W', NULL, '2019-01-08 13:53:41', '2019-01-08 13:53:41', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcementdetails`
--
ALTER TABLE `announcementdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcementdetails_user_id_foreign` (`user_id`),
  ADD KEY `announcementdetails_announcement_foreign` (`announcement`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogposts_post_id_foreign` (`post_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_url_unique` (`url`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deposits_user_id_foreign` (`user_id`),
  ADD KEY `deposits_bank_id_foreign` (`bank_id`),
  ADD KEY `deposits_account_foreign` (`account`),
  ADD KEY `deposits_currency_foreign` (`currency`);

--
-- Indexes for table `exchangerates`
--
ALTER TABLE `exchangerates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exchangerates_first_currency_foreign` (`first_currency`),
  ADD KEY `exchangerates_second_currency_foreign` (`second_currency`);

--
-- Indexes for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exchanges_user_id_foreign` (`user_id`),
  ADD KEY `exchanges_from_currency_foreign` (`from_currency`),
  ADD KEY `exchanges_to_currency_foreign` (`to_currency`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_user_id_foreign` (`user_id`),
  ADD KEY `followers_person_id_foreign` (`person_id`);

--
-- Indexes for table `indexes`
--
ALTER TABLE `indexes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indexfollowers`
--
ALTER TABLE `indexfollowers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indexfollowers_user_id_foreign` (`user_id`),
  ADD KEY `indexfollowers_index_foreign` (`index`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `information_user_id_foreign` (`user_id`);

--
-- Indexes for table `journalentries`
--
ALTER TABLE `journalentries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journalentries_user_id_foreign` (`user_id`),
  ADD KEY `journalentries_debit_foreign` (`debit`),
  ADD KEY `journalentries_credit_foreign` (`credit`),
  ADD KEY `journalentries_currency_foreign` (`currency`);

--
-- Indexes for table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_user_id_foreign` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_person_id_foreign` (`person_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_person_id_foreign` (`person_id`),
  ADD KEY `payments_account_foreign` (`account`),
  ADD KEY `payments_currency_foreign` (`currency`),
  ADD KEY `payments_second_account_foreign` (`second_account`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_person_id_foreign` (`person_id`),
  ADD KEY `transactions_debit_foreign` (`debit`),
  ADD KEY `transactions_credit_foreign` (`credit`),
  ADD KEY `transactions_currency_foreign` (`currency`),
  ADD KEY `transactions_second_account_foreign` (`second_account`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000;

--
-- AUTO_INCREMENT for table `announcementdetails`
--
ALTER TABLE `announcementdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogposts`
--
ALTER TABLE `blogposts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exchangerates`
--
ALTER TABLE `exchangerates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `exchanges`
--
ALTER TABLE `exchanges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `indexes`
--
ALTER TABLE `indexes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `indexfollowers`
--
ALTER TABLE `indexfollowers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `journalentries`
--
ALTER TABLE `journalentries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `like`
--
ALTER TABLE `like`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcementdetails`
--
ALTER TABLE `announcementdetails`
  ADD CONSTRAINT `announcementdetails_announcement_foreign` FOREIGN KEY (`announcement`) REFERENCES `announcements` (`id`),
  ADD CONSTRAINT `announcementdetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blogposts`
--
ALTER TABLE `blogposts`
  ADD CONSTRAINT `blogposts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `blogs` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `deposits`
--
ALTER TABLE `deposits`
  ADD CONSTRAINT `deposits_account_foreign` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `deposits_bank_id_foreign` FOREIGN KEY (`bank_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `deposits_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `deposits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exchangerates`
--
ALTER TABLE `exchangerates`
  ADD CONSTRAINT `exchangerates_first_currency_foreign` FOREIGN KEY (`first_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `exchangerates_second_currency_foreign` FOREIGN KEY (`second_currency`) REFERENCES `currencies` (`id`);

--
-- Constraints for table `exchanges`
--
ALTER TABLE `exchanges`
  ADD CONSTRAINT `exchanges_from_currency_foreign` FOREIGN KEY (`from_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `exchanges_to_currency_foreign` FOREIGN KEY (`to_currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `exchanges_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `indexfollowers`
--
ALTER TABLE `indexfollowers`
  ADD CONSTRAINT `indexfollowers_index_foreign` FOREIGN KEY (`index`) REFERENCES `indexes` (`id`),
  ADD CONSTRAINT `indexfollowers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `information`
--
ALTER TABLE `information`
  ADD CONSTRAINT `information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `journalentries`
--
ALTER TABLE `journalentries`
  ADD CONSTRAINT `journalentries_credit_foreign` FOREIGN KEY (`credit`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `journalentries_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `journalentries_debit_foreign` FOREIGN KEY (`debit`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `journalentries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_account_foreign` FOREIGN KEY (`account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `payments_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `payments_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payments_second_account_foreign` FOREIGN KEY (`second_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_credit_foreign` FOREIGN KEY (`credit`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transactions_currency_foreign` FOREIGN KEY (`currency`) REFERENCES `currencies` (`id`),
  ADD CONSTRAINT `transactions_debit_foreign` FOREIGN KEY (`debit`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transactions_person_id_foreign` FOREIGN KEY (`person_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_second_account_foreign` FOREIGN KEY (`second_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
