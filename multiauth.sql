-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 07:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiauth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '01961363543', 'sohidulislam@gmail.com', NULL, '$2y$10$AXmPJQ.tg/8z5VJr6Z9Ar.XJzte2Ytw058vRAes3CxI7CXwAr/CT6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'public/media/brand/020420_02_54_38.jpg', NULL, NULL),
(2, 'i-phone', 'public/media/brand/020420_02_50_41.jpg', NULL, NULL),
(3, 'Huawei', 'public/media/brand/020420_02_09_42.jpg', NULL, NULL),
(4, 'Apex', 'public/media/brand/020420_02_04_43.jpg', NULL, NULL),
(5, 'Bata', 'public/media/brand/020420_02_18_43.png', NULL, NULL),
(6, 'HM electronic tools', 'public/media/brand/020420_02_37_43.jpg', NULL, NULL),
(7, 'Navifource', 'public/media/brand/020420_02_56_43.png', NULL, NULL),
(8, 'OMAGA', 'public/media/brand/020420_02_14_44.png', NULL, NULL),
(9, 'SKMEI', 'public/media/brand/020420_02_36_44.jpg', NULL, NULL),
(10, 'Tanjim', 'public/media/brand/020420_02_52_44.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Man\'s Fashion', '2020-04-01 20:20:50', '2020-04-01 20:20:50'),
(2, 'women\'s Fashion', '2020-04-01 20:21:02', '2020-04-01 20:21:02'),
(3, 'Child\'s', '2020-04-01 20:21:14', '2020-04-01 20:21:14'),
(4, 'Watch & Clock', '2020-04-01 20:21:34', '2020-04-01 20:21:34'),
(5, 'Elictronics&Appliance', '2020-04-01 20:21:47', '2020-04-01 20:21:47'),
(6, 'Sports & Outdoor', '2020-04-01 20:22:28', '2020-04-01 20:22:28'),
(7, 'Construction Materials', '2020-04-01 20:31:09', '2020-04-01 20:31:09'),
(8, 'Decoration Materials', '2020-04-01 20:32:08', '2020-04-01 20:32:08'),
(9, 'Health Care', '2020-04-07 11:46:52', '2020-04-07 11:46:52'),
(10, 'Beauty&Bodycare', '2020-04-07 11:48:50', '2020-04-07 11:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'DH5', '10', NULL, NULL),
(2, 'DH15', '25', NULL, NULL),
(3, 'DH70', '35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_05_052517_create_admins_table', 1),
(5, '2020_03_10_074008_create_categories_table', 1),
(6, '2020_03_10_074128_create_subcategories_table', 1),
(7, '2020_03_10_074351_create_brands_table', 1),
(8, '2020_03_19_040530_create_coupons_table', 1),
(9, '2020_03_19_153903_create_newslaters_table', 1),
(10, '2020_03_20_143751_create_products_table', 1),
(11, '2020_03_27_052349_create_post_category_table', 1),
(12, '2020_03_27_052507_create_post_table', 1),
(13, '2019_11_28_124814_create_orders_table', 2),
(14, '2020_04_12_135127_create_wishlists_table', 3),
(15, '2020_04_20_102714_create_settings_table', 4),
(16, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(17, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(18, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(19, '2016_06_01_000004_create_oauth_clients_table', 5),
(20, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(21, '2020_04_25_101739_create_order_details_table', 6),
(22, '2020_04_25_101849_create_shipping_table', 6),
(23, '2020_04_26_084549_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `newslaters`
--

CREATE TABLE `newslaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'lJnKJLpBxUF3stfcVJugvcC4E3Vx2Fqu0Ypc9jQ1', 'http://localhost', 1, 0, 0, '2020-04-22 10:12:50', '2020-04-22 10:12:50'),
(2, NULL, 'Laravel Password Grant Client', 'FAXsyKHqUvspBFWJuQKjx73qSuzTeEfCJHg8H1aU', 'http://localhost', 0, 1, 0, '2020-04-22 10:12:50', '2020-04-22 10:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-04-22 10:12:50', '2020-04-22 10:12:50');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paying_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blnc_transection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_order_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `status_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `payment_type`, `paying_amount`, `blnc_transection`, `stripe_order_id`, `subtotal`, `shipping`, `vat`, `total`, `status`, `status_code`, `month`, `date`, `year`, `created_at`, `updated_at`) VALUES
(1, '8', 'card_1Gc6WsElDWEjvc0dF3NxR06C', 'stripe', '6700.55', 'txn_1Gc6WvElDWEjvc0dO1s5Elb7', '5ea550617443d', '6,650.00', '50.55', '0', '6700.55', '4', '6457738', 'April', '26-04-20', '2020', NULL, NULL),
(2, '8', 'card_1GcntIElDWEjvc0dykGiiNxC', 'stripe', '56050.55', 'txn_1GcntJElDWEjvc0dLBZZJcaS', '5ea7db796c6e1', '56,000.00', '50.55', '0', '56050.55', '3', '5463667', 'April', '28-04-20', '2020', NULL, NULL),
(3, '8', 'card_1GcnuuElDWEjvc0dkyAy7loN', 'stripe', '99050.55', 'txn_1GcnuvElDWEjvc0d5cykztvK', '5ea7dbdd9e656', '99,000.00', '50.55', '0', '99050.55', '0', '785664', 'April', '28-04-20', '2020', NULL, NULL),
(4, '8', 'card_1GdDjiElDWEjvc0dPTT7Np9e', 'stripe', '1800.55', 'txn_1GdDjkElDWEjvc0dcjED9MGH', '5ea95f8f02ea9', '1,750.00', '50.55', '0', '1800.55', '0', '222697', 'April', '29-04-20', '2020', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singleprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `singleprice`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 1, '7', 'Weman\'s -sandel', 'Black', 'S', '1', '2250', '2250', NULL, NULL),
(2, 1, '3', 'Man\'s -shoes', 'black', 'S', '1', '4400', '4400', NULL, NULL),
(3, 2, '8', 'Samsung not 10', 'Black', 'L', '1', '56000', '56000', NULL, NULL),
(4, 3, '2', 'iphone 11 pro', 'Black', 'M', '1', '99000', '99000', NULL, NULL),
(5, 4, '4', 'Weman\'s -shirt', 'Black', 'M', '1', '1750', '1750', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_bn` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `category_id`, `post_title_en`, `post_title_bn`, `post_image`, `details_en`, `details_bn`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hallo friends, How are you? boys', 'হ্যালো বন্ধুরা, কেমন আছেন?', 'public/media/post/1663301666099950.jpg', '<p>\r\n                                <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>', '<p>\r\n                                <span class=\"tlid-translation translation\" lang=\"bn\"><span title=\"\" class=\"\">Lorem Ipsum কেবল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য।</span> <span title=\"\" class=\"\">লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের স্ট্যান্ডার্ড ডামি পাঠ্যরূপে রয়েছেন, যখন কোনও অজানা প্রিন্টার একটি প্রকারের গ্যালি নেন এবং কোনও ধরণের নমুনার বই তৈরি করতে স্ক্র্যাম্বল করে bled</span> <span title=\"\" class=\"\">এটি কেবল পাঁচটি শতাব্দীই বেঁচে নেই, বৈদ্যুতিন টাইপসেটেটিংয়ে ঝাঁপিয়ে পড়েছে, মূলত অপরিবর্তিত রয়েছে।</span> <span title=\"\" class=\"\">১৯60০ এর দশকে এটি লোরেম ইপসাম প্যাসেজ সমেত লেট্রেসেট শিট প্রকাশের মাধ্যমে এবং সম্প্রতি সম্প্রতি এলডাস পেজমেকারের মতো ডেস্কটপ প্রকাশনা সফটওয়্যার সহ লোরেম ইপসামের সংস্করণ সহ জনপ্রিয় হয়েছিল।</span></span></p>', NULL, NULL),
(2, 3, 'Hallo friends, How are you? boys', 'ওহে বন্ধুরা, কেমন আছ?', 'public/media/post/1664649158319525.jpg', '<p>\r\n                                It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).</p>', '<p>\r\n                                <span class=\"tlid-translation translation\" lang=\"bn\"><span title=\"\" class=\"\">এটি একটি দীর্ঘ প্রতিষ্ঠিত সত্য যে কোনও পৃষ্ঠার বিন্যাসটি দেখার সময় পাঠকের পাঠযোগ্য সামগ্রী দ্বারা বিভ্রান্ত হবে।</span> <span title=\"\">লরেম ইপসাম ব্যবহারের বিষয়টি হ\'ল এটিতে অক্ষরগুলির কম-বেশি স্বাভাবিক বিতরণ থাকে, যেমন \'এখানে সামগ্রী, এখানে সামগ্রী\' ব্যবহার করার বিপরীতে, এটি পড়ার মতো ইংরাজির মতো দেখায়।</span> <span title=\"\">অনেক ডেস্কটপ প্রকাশনা প্যাকেজ এবং ওয়েব পৃষ্ঠার সম্পাদক এখন লোরেম ইপসামকে তাদের ডিফল্ট মডেল পাঠ্য হিসাবে ব্যবহার করেন এবং \'লরেম ইপসাম\' অনুসন্ধানের ফলে তাদের শৈশবকালীন অনেকগুলি ওয়েবসাইট উন্মোচিত হবে।</span> <span title=\"\">বিভিন্ন সংস্করণ কয়েক বছর ধরে বিকশিত হয়েছে, কখনও দুর্ঘটনার দ্বারা, কখনও কখনও উদ্দেশ্য ইনজেকশনের হাস্যরস এবং এর মতো।</span></span></p>', NULL, NULL),
(3, 1, 'This is my first Ecommarce Site in Laravel Framwork', 'লারাভেল ফ্রেমওয়ার্কে এটি আমার প্রথম ইকমার্স সাইট', 'public/media/post/1664655946400482.jpg', '<span style=\"font-weight: 400;\">Become an ecommerce expert by reading our Clever ecommerce marketing blog.\r\n Discover the most relevant topics that will help boost your store’s \r\nperformance. Stay up-to-date on ecommerce trends, study cases, online \r\nretail news,<strong> </strong>marketing strategies, ecommerce tips<strong>,</strong> useful tricks and much more. If you don’t want to miss out on any news and want to stay in the loop, subscribe to one of the best ecommerce blogs<strong>.</strong></span>', '<span class=\"tlid-translation translation\" lang=\"bn\"><span title=\"\" class=\"\">আমাদের চতুর ইকমার্স বিপণন ব্লগটি পড়ে একটি ইকমার্স বিশেষজ্ঞ হন।</span> <span title=\"\" class=\"\">সর্বাধিক প্রাসঙ্গিক বিষয়গুলি আবিষ্কার করুন যা আপনার স্টোরের কার্য সম্পাদনকে সহায়তা করবে।</span> <span title=\"\" class=\"\">ইকমার্স ট্রেন্ডস, অধ্যয়নের কেস, অনলাইন খুচরা সংবাদ, বিপণন কৌশল, ইকমার্স টিপস, দরকারী কৌশল এবং আরও অনেক কিছুর বিষয়ে আপডেট থাকুন।</span> <span title=\"\">আপনি যদি কোনও সংবাদ মিস করতে না চান এবং লুপে থাকতে চান, তবে সেরা ইকমার্স ব্লগের একটি সাবস্ক্রাইব করুন।</span></span>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_name_bn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`id`, `category_name_en`, `category_name_bn`, `created_at`, `updated_at`) VALUES
(1, 'welcome', 'ওয়েলকাম', NULL, NULL),
(2, 'Service', 'সার্ভিস', NULL, NULL),
(3, 'Event', 'ইভেন্ট', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `buyone_getone` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `Product_name`, `Product_code`, `Product_quantity`, `Product_details`, `Product_color`, `Product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `buyone_getone`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '10', 'Man\'s -shart', 'mfr888', '400', '<p>\r\n                                <span class=\"st\">Sometimes, when you\'re going to breaking some wind ... a little poop sneaks out along with it. This is called a <em>shart</em>, a blend of shit and fart. What\'s hot.</span></p>', 'White,Black', 'M,S,L', '1500', NULL, 'https://www.youtube.com', NULL, 1, 1, 1, 1, NULL, 1, 'public/media/product/1662827789392540.jpg', 'public/media/product/1662827789418685.jpg', 'public/media/product/1662827789439985.jpg', 1, NULL, NULL),
(2, '5', '14', '2', 'iphone 11 pro', 'DE-6574', '100', '<p>iPhone 11 Pro smartphone was launched on 10th September 2019. The \r\nphone comes with a 5.80-inch touchscreen display with a resolution of  \r\n1125x2436 pixels at a pixel density of 458 pixels per inch (ppi). iPhone 11 Pro is powered by  a hexa-core Apple A13 Bionic processor. It comes with 4GB of RAM. The\r\n iPhone 11 Pro runs iOS 13 and  is powered by a 3046mAh non-removable \r\nbattery.  The iPhone 11 Pro supports wireless charging, as well as \r\nproprietary fast charging.</p><p><br></p>', 'Black,Gray,red', 'M', '99000', NULL, 'https://www.facebook.com', 1, 1, 1, 1, 1, NULL, NULL, 'public/media/product/1663288030145049.png', 'public/media/product/1663288030551214.png', 'public/media/product/1663288030811710.png', 1, NULL, NULL),
(3, '1', '3', '4', 'Man\'s -shoes', 'gh-890', '1000', '<p>\r\n                                <span class=\"st\"><em>Apex</em> Footwear offers a wide range of careers. \r\nWhether you\'re looking to find a career in our Corporate Office, \r\nFactory, Sales, Central Distribution Centre teams,<wbr></span></p>', 'black', 'M,L,S', '4400', NULL, 'https://www.youtube.com', NULL, 1, 1, 1, NULL, NULL, 1, 'public/media/product/1663288798126524.jpg', 'public/media/product/1663288798163766.jpg', 'public/media/product/1663288798191446.jpg', 1, NULL, NULL),
(4, '2', '1', '10', 'Weman\'s -shirt', 'gh-890', '250', '<p>\r\n                                <span class=\"st\">Wide Array of <em>Women\'s T-shirts</em>. You will come across a wide collection of ladies t shirt in bangladesh all you need to do select the style and color of you</span></p>', 'White,Black', 'M', '1750', NULL, 'https://www.youtube.com', NULL, 1, 1, 1, 1, NULL, 1, 'public/media/product/1663290441778176.jpg', 'public/media/product/1663290441807117.jpg', 'public/media/product/1663290441826588.jpg', 1, NULL, NULL),
(5, '2', '16', '10', 'Weman\'s t-shirt', 'fgt-998', '150', '<p>\r\n                                <span class=\"st\">Buy Tshirts for Ladies Online in India. Shop for casual, sports, gym &amp; more type of <em>Women Tshirts</em> from Myntra Online store ✯ Top Brands</span></p>', 'White,Red,Purple,Black', 'M,L,S', '1000', '850', 'https://www.youtube.com', NULL, 1, 1, 1, 1, NULL, NULL, 'public/media/product/1663304752945452.jpg', 'public/media/product/1663304752972304.jpg', 'public/media/product/1663304752994033.jpg', 1, NULL, NULL),
(6, '1', '4', '4', 'Man\'s t-sandal', 'sd-766', '400', '<p>\r\n                                Step up your style to a whole new level with top international brands. Shop the collection now at <b>Apex</b>. Get Gift Vouchers. Multiple Payment Options. Store Locator. Search Products.</p>', 'Black,choohklet', 'M,L,S', '1850', NULL, 'https://www.youtube.com', NULL, 1, 1, 1, 1, NULL, 1, 'public/media/product/1663323596214642.jpg', 'public/media/product/1663323596469780.jpg', 'public/media/product/1663323596493633.jpg', 1, NULL, NULL),
(7, '2', '7', '4', 'Weman\'s -sandel', 'ds777', '400', '<p>\r\n                                Step up your style to a whole new level with top international brands. Shop the collection now at <b>Apex</b>. Get Gift Vouchers. Multiple Payment Options. Store Locator. Search Products.</p>', 'Black', 'M,S', '2250', NULL, 'https://www.facebook.com', NULL, 1, NULL, 1, 1, NULL, 1, 'public/media/product/1663324175267470.jpg', 'public/media/product/1663324175295448.jpg', 'public/media/product/1663324175318032.jpg', 1, NULL, NULL),
(8, '5', '14', '1', 'Samsung not 10', 'df-777', '39', '<p>\r\n                                <span class=\"ILfuVd\"><span class=\"e24Kjd\">The <b>Note 10</b> isn\'t just smaller than the <b>Note</b> 9, it\'s also lighter and thinner. It measures 72 x 151 x 7.9mm, and at 168g it\'s one of the lighter flagship <b>Samsung</b> phones. ... The <b>Note 10</b> has a 6.3-inch AMOLED display with a Full HD resolution, coming in at 2280 x 1080 pixels, with 401 pixels per inch.</span></span></p>', 'Black', 'L', '56000', NULL, 'https://www.youtube.com › channel', NULL, 1, 1, 1, 1, NULL, 1, 'public/media/product/1663324765127449.png', 'public/media/product/1663324765236236.jpg', 'public/media/product/1663324765306635.png', 1, NULL, NULL),
(9, '5', '11', '6', 'Wire Looping Plas', 'DS-654', '400', '<p>\r\n                                <strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>', 'black', 'S,M,L', '240', NULL, 'https://www.facebook.com', NULL, NULL, NULL, NULL, 1, 1, NULL, 'public/media/product/1664104472794361.jpg', 'public/media/product/1664104473075482.jpg', 'public/media/product/1664104473098530.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shopname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `vat`, `shipping_charge`, `shopname`, `email`, `phone`, `address`, `logo`, `created_at`, `updated_at`) VALUES
(1, '3', '50.55', 'shopno', 'shopno18@gmail.com', '019xxxxxxxx', 'tongi gazipur', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ship_city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `ship_name`, `ship_phone`, `ship_email`, `ship_address`, `ship_city`, `created_at`, `updated_at`) VALUES
(1, '1', 'Shaeim', '01521106571', 'shaeim.akter@gmail.com', 'tongi', 'dhaka', NULL, NULL),
(2, '2', 'danas', '5488875469', 'gh@gmail.com', 'mohakali', 'dhaka', NULL, NULL),
(3, '3', 'Shaeim', '01521106571', 'shaeim.akter@gmail.com', 'tongi', 'gazipur', NULL, NULL),
(4, '4', 'admin', '01667893290', 'shaeim.akter.bubt@gmail.com', 'mohakali', 'dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'shart', NULL, NULL),
(2, 1, 'pants', NULL, NULL),
(3, 1, 'shoes', NULL, NULL),
(4, 1, 'sandel', NULL, NULL),
(5, 1, 't-shirt', NULL, NULL),
(6, 2, 'Hizab', NULL, NULL),
(7, 2, 'sandel', NULL, NULL),
(8, 2, 'Three pise', NULL, NULL),
(9, 2, 'pants', NULL, NULL),
(10, 4, 'matel watch', NULL, NULL),
(11, 5, 'Wire looping Plas', NULL, NULL),
(12, 5, 'plas', NULL, NULL),
(13, 5, 'General Household Tools', NULL, NULL),
(14, 5, 'Phone', NULL, NULL),
(15, 2, 'shart', NULL, NULL),
(16, 2, 't-shirt', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(240) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'sohidul', '0194325667', 'sohidulislam@gmail.com', NULL, '2020-04-09 13:24:21', '$2y$10$SSklpKppVUTJhgnvxpWDyu.F/Xd2vc.TQCpGrxFiCAWOI4uWxYtzK', NULL, '2020-04-09 12:44:31', '2020-04-10 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 8, 8, NULL, NULL),
(2, 8, 6, NULL, NULL),
(4, 8, 5, NULL, NULL),
(5, 8, 4, NULL, NULL),
(6, 8, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newslaters`
--
ALTER TABLE `newslaters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `newslaters`
--
ALTER TABLE `newslaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
