-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 06:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventhut`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime_begin` datetime DEFAULT NULL,
  `datetime_end` datetime DEFAULT NULL,
  `sponsor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sponsor_phone` varchar(191) CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `open_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organizer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `category`, `datetime_begin`, `datetime_end`, `sponsor_name`, `sponsor_email`, `sponsor_phone`, `is_featured`, `image_url`, `description`, `location`, `open_to`, `organizer_id`) VALUES
(123, 'Virtual Author Talk: Traci Bliss on \"Big Basin Redwood Forest\"', 'Lecture & Reading', '2022-12-20 14:30:00', '2021-12-24 15:30:00', 'Bill Lane Center for the American West', 'bill@example.com', '+1-234-5679', 1, '/uploads/1.jpg', '<p>The epic saga of Big Basin began in the late 1800s when the surrounding communities saw their once “inexhaustible” redwood forests vanishing. Expanding railways demanded timber as they crisscrossed the nation, but the more redwoods that fell to the woodman’s axe, the greater the effects on the local climate. California’s groundbreaking environmental movement attracted individuals from every walk of life. From the adopted son of a robber baron to a bohemian woman winemaker to a Jesuit priest, resilient campaigners produced an unparalleled model of citizen action.</p>\r\n<p>Join author Traci Bliss as she reveals the untold story of a herculean effort to preserve the ancient redwoods for future generations.</p>', 'Zoom', 'Everyone', 1),
(1234, 'The Joys and Stresses of the Holiday Season – A Workshop on Self-Compassion', 'Stress & Resiliency', '2021-12-14 12:00:00', '2021-12-14 13:30:00', 'Al\'ai Alvarez, Patty de Vries', 'healthyliving@stanford.edu', '650.723.9649', 1, 'https://events.stanford.edu/events/922/92246/92202-1.jpg', '<p>The holiday season is supposed to be a joyful time, but along with celebrations and gatherings, the holidays can also bring nostalgia, stress, and a sense of isolation. Often, this is because we feel torn or guilty about some aspects of the holiday season – not being with our loved ones due to work or pandemic restrictions, missing our departed loved ones, or the stress of buying gifts, planning events, and unrealistic expectations.</p>\r\n<p>Please join us for this free interactive online workshop where we will normalize the feelings of overwhelm and even dread associated with the holiday season and develop a toolkit of strategies for taking care of yourself as you take care of others. We will offer research-based tools and tips for finding peace and opportunity in any situation and explore several positive psychology strategies, including practicing self-compassion and boundary setting.</p>\r\n<p>By applying these concepts, we can learn about practical tips for managing the tensions that the holiday season brings. Our goal is for us to better show up with authenticity and presence. By learning to accept the duality and complexity of emotions that the holiday season brings, we may maximize our sense of connection, purpose, and fulfillment during this holiday season.</p>\r\n<p>Instructors: Al\'ai Alvarez, MD, FACEP, FAAEM, is an assistant clinical professor in emergency medicine, assistant program director in the Stanford Emergency Medicine Residency Program, and co-chair of the Stanford WellMD\'s Physician Wellness Forum. He has given several grand rounds and national conference lectures and workshops on relevant topics in gratitude and compassion, physician well-being, burnout, and the imposter syndrome.</p>\r\n<p>Patty Purpur de Vries, MS, is the director of strategy, outreach and innovation for Stanford’s BeWell Programs and an ambassador for the Stanford Medicine WellMD Center.</p>', 'Your Computer', 'Faculty/Staff<br/>\r\nSRWC Employees', 2),
(1236, 'Papua New Guinea Sculpture Walk', 'Public Tour', '2021-12-26 11:30:00', '2021-12-26 12:15:00', 'Cantor Arts Center, located on campus at 328 Lomita Drive, off Palm Drive at Museum Way', 'cantortours@stanford.edu', NULL, 1, 'https://arts.stanford.edu/wp-content/uploads/2019/04/9065-1.jpg', '<p>Created on-site at Stanford by artists from Papua New Guinea, the garden contains wood and stone carvings of people, animals, and magical beings that illustrate clan stories and creation myths. Meet on the corner of Santa Teresa and Lomita Drive.</p>\r\n<p><b>Public Tours: Fourth Sunday of each month at 11:30am, rain or shine.</b></p>\r\n<p><b>Admission Info</b></p>\r\n<p>Tours do not require a reservation and are free of charge.</p>\r\n<p>Limited to 10 participants. First come, first served!</p>', 'Meet at the Papua New Guinea Sculpture Garden, at the corner of Santa Teresa & Lomita Drive.', 'General Public', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `submitter_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `json` varchar(16384) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_submissions`
--

INSERT INTO `form_submissions` (`id`, `submitter_id`, `event_id`, `json`) VALUES
(2, 1, 123, '{\"firstName\":\"Sanzar Adnan\",\"lastName\":\"Alam\",\"email\":\"sanzar@example.com\",\"addToMailingList\":true,\"comments\":\"The redwood forest is one of the world&#039;s most precious ecologies.\"}'),
(3, 4, 123, '{\"firstName\":\"Wile\",\"lastName\":\"Coyote\",\"email\":\"coyote@acme.com\",\"addToMailingList\":false,\"comments\":\"The road runner went in there! Into the forest! I saw it!\"}'),
(4, 1, 1234, '{\"firstName\":\"Sanzar\",\"lastName\":\"Alam\",\"email\":\"sanzar@example.com\",\"addToMailingList\":true,\"comments\":\"The holidays are a great time to let off some steam!\"}'),
(5, 2, 123, '{\"firstName\":\"Zulker\",\"lastName\":\"Nahiyan\",\"email\":\"zulker@example.com\",\"addToMailingList\":true,\"comments\":\"The red wood forest is amazing!\"}'),
(8, 3, 1236, '{\"firstName\":\"Nazia\",\"lastName\":\"Haque\",\"email\":\"nazia@example.com\",\"addToMailingList\":true,\"comments\":\"Sculptures are made best with lots of thought &amp; care.\"}');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `name`) VALUES
(1, 'MALE'),
(2, 'FEMALE'),
(3, 'OTHER'),
(4, 'UNDISCLOSED');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('male','female','other','undisclosed') NOT NULL,
  `phone` text DEFAULT NULL,
  `location` text DEFAULT NULL,
  `biography` varchar(150) DEFAULT NULL,
  `email` varchar(249) DEFAULT NULL,
  `gender_id` int(11) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `birthdate`, `gender`, `phone`, `location`, `biography`, `email`, `gender_id`, `user_id`) VALUES
(1, 'Sanzar Adnan Alam', '1970-01-01', 'male', '+1-234-5678', 'Dhaka, Bangladesh', 'This user prefers to keep an air of mystery about them.', 'sanzar@example.com', 1, 1),
(2, 'Zulker Nayeen Nahiyan', '1970-01-01', 'male', '+1-234-5678', 'Dhaka, Bangladesh', 'This user prefers to keep an air of mystery about them.', 'zulker@example.com', 1, 2),
(3, 'Nazia Haque Noshin', '1970-01-01', 'female', '+1-234-5678', 'Dhaka, Bangladesh', 'This user prefers to keep an air of mystery about them.', 'nazia@example.com', 2, 3),
(4, 'Wile E. Coyote', '1950-01-01', 'male', '123456789', NULL, NULL, 'coyote@example.com', 1, 7),
(5, 'Road Runner', '1950-01-01', 'male', '123456789', NULL, NULL, 'roadrunner@acme.com', 1, 8),
(6, 'Donald Duck', '1950-01-01', 'male', '123456789', NULL, NULL, 'donald@duck.com', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `verified` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `resettable` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `roles_mask` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `registered` int(10) UNSIGNED NOT NULL,
  `last_login` int(10) UNSIGNED DEFAULT NULL,
  `force_logout` mediumint(7) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`, `status`, `verified`, `resettable`, `roles_mask`, `registered`, `last_login`, `force_logout`) VALUES
(1, 'sanzar@example.com', '$2y$10$Nm9z7Vu/WP4tsdCxrD1MTeZBBVV6queaiyBTjWIU6CTsMu.mOP5AK', NULL, 0, 1, 1, 1, 1640370670, 1640451836, 0),
(2, 'zulker@example.com', '$2y$10$JKX96wJFOfu24XKhJKZH6eExp80YCC1B9U/0JDFUl/WYUdBezTDU.', NULL, 0, 1, 1, 0, 1640371903, 1640451378, 0),
(3, 'nazia@example.com', '$2y$10$SaByXw1PoK4qaHdW656pNu39hUX/uOxSjY7ySVUp.PTE7qbLoZwbu', NULL, 0, 1, 1, 0, 1640375859, 1640452139, 0),
(7, 'coyote@example.com', '$2y$10$4pZnMlwrdIALtIs2KyV1D.DLutc81l.vf.QiA5DTCkJkgO58g48zC', NULL, 0, 1, 1, 0, 1640431887, NULL, 0),
(8, 'roadrunner@acme.com', '$2y$10$r/w3l0tFVpD.A5x/txNbnOBAkgG0k.LXQpEZ1/77uC1fC9BHPz3oG', NULL, 0, 1, 1, 0, 1640436468, NULL, 0),
(9, 'donald@duck.com', '$2y$10$RiLhEu391MSK9eAZfxlJCeTZ1rFwf755kCBK/11lRUu32id9lSt5q', NULL, 0, 1, 1, 0, 1640450619, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_confirmations`
--

CREATE TABLE `users_confirmations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(249) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selector` varchar(16) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_remembered`
--

CREATE TABLE `users_remembered` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(24) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_remembered`
--

INSERT INTO `users_remembered` (`id`, `user`, `selector`, `token`, `expires`) VALUES
(3, 9, 'UV_wYNrrZ8C8AIRPVru_spCK', '$2y$10$uN2w8GBtmHj7fj/3qtzjR.DxVopz7veZUlXrHXDkvl0NX2wNvXiLi', 1671988087);

-- --------------------------------------------------------

--
-- Table structure for table `users_resets`
--

CREATE TABLE `users_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(10) UNSIGNED NOT NULL,
  `selector` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `expires` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users_throttling`
--

CREATE TABLE `users_throttling` (
  `bucket` varchar(44) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `tokens` float UNSIGNED NOT NULL,
  `replenished_at` int(10) UNSIGNED NOT NULL,
  `expires_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_throttling`
--

INSERT INTO `users_throttling` (`bucket`, `tokens`, `replenished_at`, `expires_at`) VALUES
('CUeQSH1MUnRpuE3Wqv_fI3nADvMpK_cg6VpYK37vgIw', 3.32757, 1640450619, 1640882619),
('ejWtPDKvxt-q7LZ3mFjzUoIWKJYzu47igC8Jd9mffFk', 61.353, 1640452139, 1640992139);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `index_foreignkey_profiles_user` (`user_id`) USING BTREE,
  ADD KEY `index_foreignkey_profiles_gender` (`gender_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `email_expires` (`email`,`expires`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users_remembered`
--
ALTER TABLE `users_remembered`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `users_resets`
--
ALTER TABLE `users_resets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `selector` (`selector`),
  ADD KEY `user_expires` (`user`,`expires`);

--
-- Indexes for table `users_throttling`
--
ALTER TABLE `users_throttling`
  ADD PRIMARY KEY (`bucket`),
  ADD KEY `expires_at` (`expires_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_confirmations`
--
ALTER TABLE `users_confirmations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_remembered`
--
ALTER TABLE `users_remembered`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_resets`
--
ALTER TABLE `users_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `c_fk_profiles_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
