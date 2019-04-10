-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2019 at 04:35 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enigma`
--

-- --------------------------------------------------------

--
-- Table structure for table `attorneys`
--

CREATE TABLE `attorneys` (
  `id` int(10) UNSIGNED NOT NULL,
  `attorney_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attorneys`
--

INSERT INTO `attorneys` (`id`, `attorney_number`, `first_name`, `middle_name`, `last_name`, `dob`, `created_at`, `updated_at`) VALUES
(1, '1', 'Juan', 'Esteban', 'Garcia Estrada', '2019-04-18', '2019-04-10 19:47:52', '2019-04-10 19:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `attorney_clients`
--

CREATE TABLE `attorney_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `attorney_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attorney_clients`
--

INSERT INTO `attorney_clients` (`id`, `attorney_id`, `first_name`, `middle_name`, `last_name`, `dob`, `created_at`, `updated_at`) VALUES
(12, 1, 'Juan', 'Felipe', 'Pulgarin Estrada', '2019-04-10', '2019-04-10 21:19:25', '2019-04-10 21:19:25'),
(13, 1, 'Juan', 'Camilo', 'Pulgarin Estrada', '2019-04-03', '2019-04-10 21:19:25', '2019-04-10 21:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(175, '2014_10_12_000000_create_users_table', 1),
(176, '2014_10_12_100000_create_password_resets_table', 1),
(177, '2015_01_20_084450_create_roles_table', 1),
(178, '2015_01_20_084525_create_role_user_table', 1),
(179, '2015_01_24_080208_create_permissions_table', 1),
(180, '2015_01_24_080433_create_permission_role_table', 1),
(181, '2015_12_04_003040_add_special_role_column', 1),
(182, '2017_10_17_170735_create_permission_user_table', 1),
(183, '2019_04_05_033142_create_attorneys_table', 1),
(184, '2019_04_05_033753_create_attorney_clients_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Browse users', 'users.index', 'List and browse all system users', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(2, 'See user details', 'users.show', 'See in detail each user of the system', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(3, 'Create user', 'users.create', 'Create system users', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(4, 'User edition', 'users.edit', 'Edit any data of a user of the system', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(5, 'Delete user', 'users.destroy', 'Remove any user from the system', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(6, 'Browse roles', 'roles.index', 'List and browse all system roles', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(7, 'See detail of the role', 'roles.show', 'See in detail each role of the system', '2019-04-10 19:27:15', '2019-04-10 19:27:15'),
(8, 'Create roles', 'roles.create', 'create role of the system', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(9, 'Edit role', 'roles.edit', 'Edit any data in a system role', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(10, 'Delete role', 'roles.destroy', 'Remove any role from the system', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(11, 'Browse attorneys', 'attorneys.index', 'List and browse all the attorneys in the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(12, 'See detail of the attorney', 'attorneys.show', 'See in detail each system attorney', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(13, 'Create attorney', 'attorneys.create', 'Create system attorneys', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(14, 'Edit attorney', 'attorneys.edit', 'Edit any information of a attorney of the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(15, 'Delete attorney', 'attorneys.destroy', 'Remove any attorney from the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(16, 'Browse clients', 'attorneyClients.index', 'List and browse all the clients in the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(17, 'See detail of the client', 'attorneyClients.show', 'See in detail each system client', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(18, 'Create client', 'attorneyClients.create', 'Create system clients', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(19, 'Edit client', 'attorneyClients.edit', 'Edit any information of a client of the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16'),
(20, 'Delete client', 'attorneyClients.destroy', 'Remove any client from the system.', '2019-04-10 19:27:16', '2019-04-10 19:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 11, 3, '2019-04-10 19:29:50', '2019-04-10 19:29:50'),
(2, 12, 3, '2019-04-10 19:29:50', '2019-04-10 19:29:50'),
(3, 13, 3, '2019-04-10 19:29:50', '2019-04-10 19:29:50'),
(4, 14, 3, '2019-04-10 19:29:50', '2019-04-10 19:29:50'),
(6, 16, 4, '2019-04-10 19:30:04', '2019-04-10 19:30:04'),
(7, 17, 4, '2019-04-10 19:30:04', '2019-04-10 19:30:04'),
(8, 18, 4, '2019-04-10 19:30:04', '2019-04-10 19:30:04'),
(9, 19, 4, '2019-04-10 19:30:04', '2019-04-10 19:30:04'),
(11, 20, 3, '2019-04-10 19:57:16', '2019-04-10 19:57:16'),
(12, 16, 3, '2019-04-10 19:57:35', '2019-04-10 19:57:35'),
(13, 17, 3, '2019-04-10 19:57:35', '2019-04-10 19:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Administrator', 'administrator', 'Administrator of the attorneys firm', NULL, NULL, 'all-access'),
(2, 'Firma', 'firma', 'Maximum boss of the firm', NULL, '2019-04-10 19:27:52', 'no-access'),
(3, 'Attorney', 'attorney', 'Attorney of the firm', NULL, NULL, NULL),
(4, 'Client', 'client', 'Firms clients', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 3, 2, '2019-04-10 19:34:35', '2019-04-10 19:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `username`, `dob`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Pablo', 'Pulgarin Estrada', 'jpulga', '2019-04-11', 'jpulgaestrada@gmail.com', '$2y$10$GFWbVW3C4oVQuHmuWQaPLO7G0IiDFUZkMVQM.siLNe8zg0WudPCEm', NULL, '2019-04-10 19:21:38', '2019-04-10 19:21:38'),
(2, 'Juan', 'Esteban', 'Garcia Estrada', 'c0rtex', '2019-04-17', 'juanes@gmail.com', '$2y$10$EFk12R3PSeKIUm9n4HPPpOTifv4B/J1DG5e1IBEzqFtWvICvBNEui', NULL, '2019-04-10 19:33:59', '2019-04-10 19:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attorneys`
--
ALTER TABLE `attorneys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attorney_clients`
--
ALTER TABLE `attorney_clients`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

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
-- AUTO_INCREMENT for table `attorneys`
--
ALTER TABLE `attorneys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attorney_clients`
--
ALTER TABLE `attorney_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
