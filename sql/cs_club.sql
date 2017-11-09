-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2017 at 05:21 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `street` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `city`, `state`, `zip`) VALUES
(1, '1234 Something Ln', 'Atlanta', 'GA', '30339');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE IF NOT EXISTS `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

DROP TABLE IF EXISTS `blog_comments`;
CREATE TABLE IF NOT EXISTS `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_posts_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `is_reply_to_id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `mark_read` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `author_id` int(10) UNSIGNED NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `comments_enabled` tinyint(1) NOT NULL,
  `views` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts_to_category`
--

DROP TABLE IF EXISTS `blog_posts_to_category`;
CREATE TABLE IF NOT EXISTS `blog_posts_to_category` (
  `blog_category_id` int(10) UNSIGNED NOT NULL,
  `blog_post_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
CREATE TABLE IF NOT EXISTS `contact_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(500) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_contact_messages`
--

DROP TABLE IF EXISTS `deleted_contact_messages`;
CREATE TABLE IF NOT EXISTS `deleted_contact_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject` varchar(500) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email_id` int(10) UNSIGNED NOT NULL,
  `deleted_by` int(10) UNSIGNED NOT NULL,
  `deleted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_address` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `email_address`) VALUES
(1, 'dinocajic@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `junc_user_addresses`
--

DROP TABLE IF EXISTS `junc_user_addresses`;
CREATE TABLE IF NOT EXISTS `junc_user_addresses` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `addresses_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_user_addresses`
--

INSERT INTO `junc_user_addresses` (`users_id`, `addresses_id`, `from_date`, `to_date`) VALUES
(1, 1, '2017-11-09 17:15:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `junc_user_emails`
--

DROP TABLE IF EXISTS `junc_user_emails`;
CREATE TABLE IF NOT EXISTS `junc_user_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED NOT NULL,
  `emails_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL DEFAULT '1970-01-01 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_user_emails`
--

INSERT INTO `junc_user_emails` (`id`, `users_id`, `emails_id`, `from_date`, `to_date`) VALUES
(1, 1, 1, '2017-11-09 17:14:08', '1970-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `junc_user_phone_numbers`
--

DROP TABLE IF EXISTS `junc_user_phone_numbers`;
CREATE TABLE IF NOT EXISTS `junc_user_phone_numbers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED NOT NULL,
  `phone_numbers_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junc_user_phone_numbers`
--

INSERT INTO `junc_user_phone_numbers` (`id`, `users_id`, `phone_numbers_id`, `from_date`, `to_date`) VALUES
(1, 1, 1, '2017-11-09 17:15:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `junc_user_roles`
--

DROP TABLE IF EXISTS `junc_user_roles`;
CREATE TABLE IF NOT EXISTS `junc_user_roles` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

DROP TABLE IF EXISTS `phone_numbers`;
CREATE TABLE IF NOT EXISTS `phone_numbers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(40) NOT NULL,
  `phone_number_type_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `phone_number`, `phone_number_type_id`) VALUES
(1, '3332223313', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phone_number_types`
--

DROP TABLE IF EXISTS `phone_number_types`;
CREATE TABLE IF NOT EXISTS `phone_number_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

DROP TABLE IF EXISTS `project_categories`;
CREATE TABLE IF NOT EXISTS `project_categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `read_messages`
--

DROP TABLE IF EXISTS `read_messages`;
CREATE TABLE IF NOT EXISTS `read_messages` (
  `contact_messages_id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `date_read` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_code` char(2) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_code`, `state_name`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AZ', 'Arizona'),
(4, 'AR', 'Arkansas'),
(5, 'CA', 'California'),
(6, 'CO', 'Colorado'),
(7, 'CT', 'Connecticut'),
(8, 'DE', 'Delaware'),
(9, 'DC', 'District of Columbia'),
(10, 'FL', 'Florida'),
(11, 'GA', 'Georgia'),
(12, 'HI', 'Hawaii'),
(13, 'ID', 'Idaho'),
(14, 'IL', 'Illinois'),
(15, 'IN', 'Indiana'),
(16, 'IA', 'Iowa'),
(17, 'KS', 'Kansas'),
(18, 'KY', 'Kentucky'),
(19, 'LA', 'Louisiana'),
(20, 'ME', 'Maine'),
(21, 'MD', 'Maryland'),
(22, 'MA', 'Massachusetts'),
(23, 'MI', 'Michigan'),
(24, 'MN', 'Minnesota'),
(25, 'MS', 'Mississippi'),
(26, 'MO', 'Missouri'),
(27, 'MT', 'Montana'),
(28, 'NE', 'Nebraska'),
(29, 'NV', 'Nevada'),
(30, 'NH', 'New Hampshire'),
(31, 'NJ', 'New Jersey'),
(32, 'NM', 'New Mexico'),
(33, 'NY', 'New York'),
(34, 'NC', 'North Carolina'),
(35, 'ND', 'North Dakota'),
(36, 'OH', 'Ohio'),
(37, 'OK', 'Oklahoma'),
(38, 'OR', 'Oregon'),
(39, 'PA', 'Pennsylvania'),
(40, 'RI', 'Rhode Island'),
(41, 'SC', 'South Carolina'),
(42, 'SD', 'South Dakota'),
(43, 'TN', 'Tennessee'),
(44, 'TX', 'Texas'),
(45, 'UT', 'Utah'),
(46, 'VT', 'Vermont'),
(47, 'VA', 'Virginia'),
(48, 'WA', 'Washington'),
(49, 'WV', 'West Virginia'),
(50, 'WI', 'Wisconsin'),
(51, 'WY', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED NOT NULL,
  `content` varchar(1000) NOT NULL,
  `enabled` tinyint(1) UNSIGNED NOT NULL,
  `featured` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'dinocajic@gmail.com', '$2y$04$C5n72pP.1Ohgn8XDl3pTcOJp7I8TeK9rAlY.I7qCQvE219yOIXjQ2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

DROP TABLE IF EXISTS `user_addresses`;
CREATE TABLE IF NOT EXISTS `user_addresses` (
  `user_details_id` int(10) UNSIGNED NOT NULL,
  `addresses_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `first_name`, `last_name`, `user_image`, `users_id`, `date_joined`) VALUES
(1, 'Dino', 'Cajic', 'img/gallery/dinocajic.jpg', 1, '2017-11-09 17:11:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_emails`
--

DROP TABLE IF EXISTS `user_emails`;
CREATE TABLE IF NOT EXISTS `user_emails` (
  `user_details_id` int(10) UNSIGNED NOT NULL,
  `emails_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_phone_numbers`
--

DROP TABLE IF EXISTS `user_phone_numbers`;
CREATE TABLE IF NOT EXISTS `user_phone_numbers` (
  `user_details_id` int(10) UNSIGNED NOT NULL,
  `phone_numbers_id` int(10) UNSIGNED NOT NULL,
  `from_date` datetime NOT NULL,
  `to_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_projects`
--

DROP TABLE IF EXISTS `user_projects`;
CREATE TABLE IF NOT EXISTS `user_projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `link` varchar(255) NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `project_category_id` int(10) UNSIGNED NOT NULL,
  `enabled` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `roles_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_social`
--

DROP TABLE IF EXISTS `user_social`;
CREATE TABLE IF NOT EXISTS `user_social` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `users_id` int(10) UNSIGNED NOT NULL,
  `bio` text NOT NULL,
  `homepage` varchar(255) NOT NULL,
  `blog` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_social`
--

INSERT INTO `user_social` (`id`, `users_id`, `bio`, `homepage`, `blog`, `linkedin`, `facebook`, `twitter`, `instagram`, `github`, `google_plus`, `youtube`) VALUES
(1, 1, 'Something really long needs to go here', 'http://dinocajic.xyz', 'http://dinocajic.com', 'https://www.linkedin.com/in/dinocajic/', 'https://www.facebook.com/dinocajic', 'https://twitter.com/dinocajic', 'https://www.instagram.com/dinocajic/', 'https://github.com/dinocajic', 'https://plus.google.com/u/0/+DinoCajic', 'https://www.youtube.com/user/dinocajic');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
