-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 10:29 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_preferences`
--

CREATE TABLE `admin_preferences` (
  `id` tinyint(1) NOT NULL,
  `user_panel` tinyint(1) NOT NULL DEFAULT 0,
  `sidebar_form` tinyint(1) NOT NULL DEFAULT 0,
  `messages_menu` tinyint(1) NOT NULL DEFAULT 0,
  `notifications_menu` tinyint(1) NOT NULL DEFAULT 0,
  `tasks_menu` tinyint(1) NOT NULL DEFAULT 0,
  `user_menu` tinyint(1) NOT NULL DEFAULT 1,
  `ctrl_sidebar` tinyint(1) NOT NULL DEFAULT 0,
  `transition_page` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_preferences`
--

INSERT INTO `admin_preferences` (`id`, `user_panel`, `sidebar_form`, `messages_menu`, `notifications_menu`, `tasks_menu`, `user_menu`, `ctrl_sidebar`, `transition_page`) VALUES
(1, 1, 0, 0, 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_gejala`
--

CREATE TABLE `daftar_gejala` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `nama_gejala` varchar(150) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_gejala`
--

INSERT INTO `daftar_gejala` (`id`, `code`, `nama_gejala`, `status`) VALUES
(9, 'g-1', 'Mata Bengkak', 1),
(10, 'g-2', 'Mata Merah', 1),
(11, 'g-3', 'Bulu Kusut', 1),
(12, 'g-4', 'sempoyongan', 1),
(13, 'g-5', 'mata ber-air', 1),
(14, 'g-6', 'kotoran cair', 1),
(15, 'g-7', 'Keluar Cairan / Lendir dari hidung', 1),
(16, 'g-8', 'Sering Membuka Paruhnya', 1),
(17, 'g-9', 'Linglung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyakit`
--

CREATE TABLE `daftar_penyakit` (
  `id` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `nama_penyakit` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyakit`
--

INSERT INTO `daftar_penyakit` (`id`, `code`, `nama_penyakit`, `status`) VALUES
(14, 'pt-1', 'Snot', 1),
(15, 'pt-2', 'Gajih Atau Berlemak', 1),
(16, 'pt-4', 'Gangguan Penafasan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyakit_gejala`
--

CREATE TABLE `daftar_penyakit_gejala` (
  `id` int(11) NOT NULL,
  `code_penyakit` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `code_gejala` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyakit_gejala`
--

INSERT INTO `daftar_penyakit_gejala` (`id`, `code_penyakit`, `code_gejala`, `status`) VALUES
(8, 'pt-1', 'g-1', 1),
(9, 'pt-1', 'g-2', 1),
(12, 'pt-1', 'pt-1', 1),
(13, 'pt-1', 'pt-1', 1),
(14, 'pt-1', 'pt-1', 1),
(17, 'pt-2', 'g-3', 1),
(18, 'pt-2', 'g-6', 1),
(19, 'pt-4', 'g-7', 1),
(20, 'pt-4', 'g-8', 1),
(21, 'pt-4', 'g-9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyakit_penyebab`
--

CREATE TABLE `daftar_penyakit_penyebab` (
  `id` int(11) NOT NULL,
  `code_penyakit` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `code_penyebab` varchar(10) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyakit_penyebab`
--

INSERT INTO `daftar_penyakit_penyebab` (`id`, `code_penyakit`, `code_penyebab`, `status`) VALUES
(9, 'pt-3', 'p-12', 1),
(10, 'pt-3', 'p-13', 1),
(11, 'pt-1', 'p-1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyebab`
--

CREATE TABLE `daftar_penyebab` (
  `id` int(11) NOT NULL,
  `code` tinytext NOT NULL,
  `nama_penyebab` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyebab`
--

INSERT INTO `daftar_penyebab` (`id`, `code`, `nama_penyebab`, `status`) VALUES
(26, 'p-1', 'Meriyang', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `bgcolor` char(7) NOT NULL DEFAULT '#607D8B'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`, `bgcolor`) VALUES
(1, 'admin', 'Administrator', '#F44336'),
(2, 'members', 'General User ', '#2196f3');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(7, '::1', 'superadministrator@app.com', 1575792851);

-- --------------------------------------------------------

--
-- Table structure for table `public_preferences`
--

CREATE TABLE `public_preferences` (
  `id` int(1) NOT NULL,
  `transition_page` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `public_preferences`
--

INSERT INTO `public_preferences` (`id`, `transition_page`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1575792884, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'test test', '$2y$08$2pAha57jpmY.3ZM2cAjKWO68Ihr6qsQ2yjkJ94wSU61SYI2sBJLti', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 1575556232, 1575615095, 1, 'test', 'test', 'test', '08122311111111'),
(3, '::1', 'test member', '$2y$08$bY9gpQqejRGFve9S2r.DIeCACToRkRmKm1fETT33jD8YMxwVT9cVi', NULL, 'member@gmail.com', NULL, NULL, NULL, NULL, 1575615579, 1575615593, 1, 'test', 'member', 'test member', '12123131312');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_preferences`
--
ALTER TABLE `admin_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `daftar_penyakit_gejala`
--
ALTER TABLE `daftar_penyakit_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_penyakit_penyebab`
--
ALTER TABLE `daftar_penyakit_penyebab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_penyebab`
--
ALTER TABLE `daftar_penyebab`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`) USING HASH;

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_preferences`
--
ALTER TABLE `public_preferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_preferences`
--
ALTER TABLE `admin_preferences`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `daftar_gejala`
--
ALTER TABLE `daftar_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daftar_penyakit`
--
ALTER TABLE `daftar_penyakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `daftar_penyakit_gejala`
--
ALTER TABLE `daftar_penyakit_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `daftar_penyakit_penyebab`
--
ALTER TABLE `daftar_penyakit_penyebab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `daftar_penyebab`
--
ALTER TABLE `daftar_penyebab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `public_preferences`
--
ALTER TABLE `public_preferences`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
