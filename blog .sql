-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 29 نوفمبر 2023 الساعة 23:39
-- إصدار الخادم: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- بنية الجدول `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `ordering`, `created_at`, `updated_at`) VALUES
(6, 'sport', 10000, NULL, NULL),
(7, 'art', 10000, NULL, NULL),
(8, 'policy', 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_22_195505_create_types_table', 1),
(6, '2023_09_09_223036_create_settings_table', 2),
(7, '2023_09_10_001416_create_socials_table', 3),
(8, '2023_09_23_130456_create_categories_table', 4),
(9, '2023_09_23_130859_create_sub_categories_table', 5),
(10, '2023_09_23_223651_create_posts_table', 6);

-- --------------------------------------------------------

--
-- بنية الجدول `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `post_title`, `post_slug`, `post_content`, `post_tags`, `featured_image`, `created_at`, `updated_at`) VALUES
(95, 1, 3, 'ookkkkkkkkkkkkkkkkkkkee22222', 'ookkkkkkkkkkkkkkkkkkkee22222', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', NULL, '9b9a252e01b725c4b3394b441447ee37.jpg', NULL, '2023-10-08 05:16:48'),
(102, 1, 5, 'rtyuoljgnmbvczxsdetyuiw', 'rtyuoljgnmbvczxsdetyuiw', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', NULL, 'f16a773cace365c4bf6cf8619ec1b195.jpg', NULL, '2023-08-10 09:00:00'),
(110, 1, 3, 'asertyuq', 'asertyuq', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', NULL, '9ee9bcac32c504b149766436f99ba848.jpg', NULL, '2023-08-10 09:00:00'),
(118, 1, 6, 'hello world', 'hello world', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', 'javascript php css html', '13806b201bfd219e86b2061be53eebe8.jpg', NULL, '2023-10-04 07:01:27'),
(119, 1, 6, ';fhkfhmb.cpeo', ';fhkfhmb.cpeo', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', 'javascript php css html', 'e6cab9fe5505ee9ae17dd009c45b34fa.jpg', NULL, '2023-08-10 09:00:00'),
(121, 1, 7, 'yyyyyyyyyyyyyyyyyyyyyy', 'yyyyyyyyyyyyyyyyyyyyyy', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.', 'flutter xml c++ python', '41a8c6ce329c8dcc17557c293f516eca.jpg', '2023-10-04 12:41:35', NULL),
(122, 1, 7, 'almasjed almasjed almasjed almasjed', 'almasjed almasjed almasjed almasjed', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, facere. Consequatur culpa incidunt dolor eligendi repellat est quibusdam delectus ea ut aliquam veniam inventore in ducimus, autem quos commodi nobis?', 'jquery ajax laravel livewire', '89f47401bc63fb49cd2e702c943c37a6.JPG', '2023-10-04 12:55:43', NULL),
(124, 1, 3, 'uuuuuuuuuuuuuuuuhhhhhhhhhhhhhhhhhhhhhhhh', 'uuuuuuuuuuuuuuuuhhhhhhhhhhhhhhhhhhhhhhhh', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', 'england france spain', 'cfde981036036cd70921c9d157da1580.jpg', '2023-10-04 13:02:44', '2023-10-08 03:57:50'),
(129, 1, 7, 'impossible is not christian', 'impossible is not christian', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.', 'england france spain', 'c32034ed82c55807c303c0b50687b9a9.jpg', '2023-10-08 05:00:36', NULL),
(130, 1, 7, 'You Can Do It', 'You Can Do It', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate adipisci saepe sit nostrum voluptatibus totam corporis ratione animi. Esse libero ut cumque rem ratione voluptatibus impedit ea sed dignissimos itaque.', 'flutter xml c++ python', 'c1aec97bd82650c72346a20ec10f3dfd.jpg', '2023-10-08 05:01:26', NULL),
(131, 1, 7, 'q;lkgjhuy[esp[werc.,vbbnclsas;\'a[wrpotyyiyfjdl;a[qoruy', 'q;lkgjhuy[esp[werc.,vbbnclsas;\'a[wrpotyyiyfjdl;a[qoruy', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', 'oop php livwire', '7cf6e7d94e6c766cda3f61fba3c75cd5.JPG', '2023-10-08 05:55:12', '2023-10-13 09:23:03'),
(132, 1, 7, 'hhdflhknm,blorpwpiyyuuyyyyyyyy', 'hhdflhknm,blorpwpiyyuuyyyyyyyy', '[Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?][Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam voluptate nam excepturi, repudiandae tempora similique fuga a delectus magni praesentium, impedit quas sunt et explicabo aliquam non? Rem, rerum temporibus?]', 'england france spain', 'b6c941d78c08c06b68dc3614ce4495bc.JPG', '2023-10-13 09:23:42', NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `logo`, `des`, `created_at`, `updated_at`) VALUES
(1, 'mahmoud', 'hodamedocrv@gmail.com', 'a85a497488a721b76b604d82c0eac5f4.png', 'Lmaza Nahno hona', NULL, '2023-11-29 17:40:03');

-- --------------------------------------------------------

--
-- بنية الجدول `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `linkedin`, `youtube`, `instegram`, `created_at`, `updated_at`) VALUES
(1, 'http://www.facebook.com/url', 'http://www.linkedin.com/url', 'http://www.youtube.com/url', 'http://www.instegram.com/url', NULL, '2023-09-09 21:35:53');

-- --------------------------------------------------------

--
-- بنية الجدول `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_Category` int(11) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT 10000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory_name`, `slug`, `parent_Category`, `ordering`, `created_at`, `updated_at`) VALUES
(3, 'europe', 'europe', 6, 10000, NULL, NULL),
(5, 'singing', 'singing', 7, 10000, NULL, NULL),
(6, 'football', 'football', 8, 10000, NULL, NULL),
(7, 'socials', 'socials', 7, 10000, NULL, NULL),
(8, 'table', 'table', 6, 10000, NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Author\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 2,
  `blocked` int(11) NOT NULL DEFAULT 0,
  `direct_publish` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `picture`, `biography`, `type`, `blocked`, `direct_publish`) VALUES
(1, 'mahmoudalamy', 'mahmoud@elementor.com', NULL, 'bf2acb4d1b735f29513e95b3dc440cb1', NULL, NULL, '2023-09-09 02:28:41', 'abdullatief', 'e5a369cb5fa6a71256cc39e8e560e134.jpg', 'Hello World!', 1, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
