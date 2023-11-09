-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 09 2023 г., 08:49
-- Версия сервера: 8.0.31
-- Версия PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_11_08_002144_create_workers_table', 1),
(16, '2023_11_08_035031_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `worker_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tasks_worker_id_foreign` (`worker_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `priority`, `status`, `deadline`, `created_at`, `updated_at`, `worker_id`) VALUES
(1, 'Angelita Hermiston', 'Qui aut qui dolores sint et.', 'Quo.', 'Kailee Welch', '2023-06-18', '2023-11-08 18:15:04', '2023-11-08 18:15:04', 26),
(2, 'Nedra Conroy', 'Omnis sequi omnis ipsum vel perferendis.', 'Et aut.', 'Janice Hagenes DDS', '2023-06-29', '2023-11-08 18:15:04', '2023-11-08 18:15:04', 17),
(3, 'Grant Wiegand Sr.', 'Odit ullam vitae omnis et quia.', 'Corrupti.', 'Prof. Xander Reichert PhD', '2023-07-06', '2023-11-08 18:15:04', '2023-11-08 18:15:04', 16),
(4, 'Ludwig Morissette', 'Eos mollitia rerum eos et suscipit.', 'Dolor.', 'Alice Kuphal', '2023-06-15', '2023-11-08 18:15:04', '2023-11-08 18:15:04', 10),
(5, 'Vernie Runte', 'Vel velit qui quasi aut.', 'Doloribus.', 'Donavon Kessler', '2023-02-12', '2023-11-08 18:15:04', '2023-11-08 18:15:04', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

DROP TABLE IF EXISTS `workers`;
CREATE TABLE IF NOT EXISTS `workers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `workers_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `name`, `surname`, `email`, `birthdate`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Parker Greenholt', 'Bayer', 'layla.schoen@gleason.com', '1985-11-24', 'Distribution Manager', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(2, 'Mr. Torey Quitzon', 'Johns', 'hulda.reichert@swaniawski.com', '2023-04-11', 'Numerical Control Machine Tool Operator', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(3, 'Carlo Bartoletti', 'Reinger', 'jbednar@hotmail.com', '1974-01-25', 'Airfield Operations Specialist', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(4, 'Angus Harvey', 'Wiza', 'bart.lakin@hotmail.com', '2000-05-19', 'Electronic Drafter', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(5, 'Tania Carroll', 'Leuschke', 'hermiston.monique@gmail.com', '2013-02-13', 'Metal-Refining Furnace Operator', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(6, 'Andres Christiansen', 'Olson', 'katelynn52@kemmer.net', '2020-07-23', 'Archivist', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(7, 'Carmela McDermott DVM', 'Rohan', 'derrick09@leffler.com', '2001-03-30', 'Securities Sales Agent', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(8, 'Ms. Chasity Jerde', 'McClure', 'zstreich@yahoo.com', '1970-02-16', 'Valve Repairer OR Regulator Repairer', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(9, 'Miss Rubye Powlowski Sr.', 'Senger', 'chet68@hotmail.com', '2018-01-22', 'Loading Machine Operator', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(10, 'Miss Patricia Brakus', 'Bogan', 'korbin.olson@yahoo.com', '1970-08-18', 'Government', '2023-11-08 18:10:18', '2023-11-08 18:10:18'),
(11, 'Vena VonRueden DVM', 'Stanton', 'ratke.corene@hotmail.com', '2006-06-20', 'Plant Scientist', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(12, 'Paolo Botsford Jr.', 'Adams', 'ygoodwin@dietrich.com', '2004-05-12', 'Farm Equipment Mechanic', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(13, 'Prof. Declan Roberts DDS', 'McCullough', 'mcdermott.cortney@yahoo.com', '2020-09-13', 'Social and Human Service Assistant', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(14, 'Rosalee Bernhard I', 'Borer', 'lessie.bayer@hotmail.com', '2022-03-05', 'Construction', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(15, 'Quincy Hirthe', 'Kuphal', 'millie.rodriguez@mosciski.com', '2018-01-08', 'Welder and Cutter', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(16, 'Dr. Jarod Schowalter', 'Hackett', 'caden.larson@yahoo.com', '1978-09-21', 'Construction Equipment Operator', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(17, 'Kiera Hoeger', 'Murray', 'steve.yost@gmail.com', '2018-05-13', 'Explosives Expert', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(18, 'Clyde Marquardt', 'Langosh', 'maryam.ryan@johns.net', '1974-12-22', 'Poultry Cutter', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(19, 'Elliott Metz', 'Ortiz', 'sjakubowski@gmail.com', '1994-10-28', 'CEO', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(20, 'Gilbert Blick', 'Mann', 'brogahn@reynolds.com', '1972-02-08', 'Insurance Underwriter', '2023-11-08 18:11:53', '2023-11-08 18:11:53'),
(21, 'Dr. Mariane Marvin III', 'Fahey', 'cruz12@hotmail.com', '1998-05-24', 'Furnace Operator', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(22, 'Jayce Hayes', 'Ratke', 'lula.strosin@gmail.com', '2014-01-23', 'Grips', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(23, 'Prof. Abdiel Reilly DVM', 'Lockman', 'tyrique44@gmail.com', '1993-01-11', 'Taxi Drivers and Chauffeur', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(24, 'Hellen Gutkowski', 'Roob', 'simonis.bertrand@schiller.com', '1993-03-03', 'Construction Laborer', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(25, 'Julio Klein', 'Lang', 'udeckow@streich.org', '1999-03-17', 'Preschool Education Administrators', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(26, 'Rico Gislason', 'Zboncak', 'gottlieb.adelia@yahoo.com', '2011-05-26', 'ccc', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(27, 'Catalina Flatley', 'Gutkowski', 'ortiz.keon@nikolaus.info', '1986-09-27', 'Reporters OR Correspondent', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(28, 'Terrell Sauer', 'Crooks', 'wolf.citlalli@hotmail.com', '1992-08-29', 'Sales Manager', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(29, 'Bobby Mueller II', 'Sanford', 'halie.abernathy@gmail.com', '1992-10-08', 'Audio and Video Equipment Technician', '2023-11-08 18:15:04', '2023-11-08 18:15:04'),
(30, 'Pamela Brekke', 'Aufderhar', 'renee.reilly@mcclure.com', '1982-05-07', 'Aircraft Assembler', '2023-11-08 18:15:04', '2023-11-08 18:15:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
