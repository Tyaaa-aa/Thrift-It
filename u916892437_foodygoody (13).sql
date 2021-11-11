-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2021 at 05:19 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u916892437_foodygoody`
--

-- --------------------------------------------------------

--
-- Table structure for table `ew_users`
--

CREATE TABLE `ew_users` (
  `id` int(11) NOT NULL,
  `sUsername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sp_chats`
--

CREATE TABLE `sp_chats` (
  `chat_id` int(11) NOT NULL,
  `chat_buyerid` int(11) NOT NULL,
  `chat_sellerid` int(11) NOT NULL,
  `chat_listid` int(11) NOT NULL,
  `chat_buyermessage` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_sellermessage` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsLastUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `chat_buyeroffer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `chat_selleroffer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_chats`
--

INSERT INTO `sp_chats` (`chat_id`, `chat_buyerid`, `chat_sellerid`, `chat_listid`, `chat_buyermessage`, `chat_sellermessage`, `tsLastUpdated`, `chat_buyeroffer`, `chat_selleroffer`) VALUES
(15, 5, 15, 22, 'Hi', '', '2021-02-20 17:52:40', 'false', 'false'),
(16, 5, 15, 22, 'Dkr', '', '2021-02-20 17:53:46', 'false', 'false'),
(17, 15, 5, 19, 'Woooop', '', '2021-02-20 17:54:26', 'false', 'false'),
(18, 15, 5, 19, 'ya', '', '2021-02-21 03:35:44', 'false', 'false'),
(20, 31, 5, 19, 'Hamburger', '', '2021-02-21 03:50:59', 'false', 'false'),
(21, 17, 15, 22, 'hiii', '', '2021-02-21 06:28:40', 'true', 'false'),
(23, 28, 15, 22, 'wheeee', '', '2021-02-21 07:37:43', 'false', 'false'),
(24, 28, 15, 22, 'holy shit', '', '2021-02-21 07:37:46', 'false', 'false'),
(25, 28, 15, 22, 'what the fuk', '', '2021-02-21 07:37:52', 'false', 'false'),
(28, 17, 15, 22, '', 'HIIII', '2021-02-21 09:49:41', 'true', 'false'),
(30, 17, 15, 22, 'HELLO', '', '2021-02-21 09:55:58', 'true', 'false'),
(31, 17, 15, 22, '', 'THIS IS SO COOL', '2021-02-21 09:56:03', 'true', 'false'),
(32, 17, 15, 22, 'waw this cool', '', '2021-02-21 09:56:12', 'true', 'false'),
(33, 17, 15, 22, 'noice', '', '2021-02-21 09:56:16', 'true', 'false'),
(34, 17, 15, 22, '', 'YA SIA', '2021-02-21 09:56:24', 'true', 'false'),
(36, 17, 15, 22, '', 'go see ur chats page', '2021-02-21 09:56:42', 'true', 'false'),
(45, 15, 28, 20, 'yoyo', '', '2021-02-21 10:05:54', 'false', 'false'),
(46, 5, 15, 22, '', 'hi', '2021-02-21 10:08:29', 'false', 'false'),
(47, 5, 15, 22, '', 'hi', '2021-02-21 10:18:49', 'false', 'false'),
(48, 5, 15, 22, 'Cool', '', '2021-02-21 10:18:53', 'false', 'false'),
(49, 5, 15, 22, 'Yo mama', '', '2021-02-21 10:20:17', 'false', 'false'),
(54, 28, 15, 22, '', 'Joe', '2021-02-21 11:00:37', 'false', 'false'),
(55, 28, 15, 22, 'bruh', '', '2021-02-21 11:01:50', 'false', 'false'),
(56, 28, 15, 22, '', 'Yes', '2021-02-21 11:02:20', 'false', 'false'),
(57, 15, 28, 20, '', 'greetuns', '2021-02-21 11:02:27', 'false', 'false'),
(58, 28, 15, 22, '', 'I am Jesus himself', '2021-02-21 11:02:28', 'false', 'false'),
(59, 28, 15, 22, 'y e s', '', '2021-02-21 11:02:46', 'false', 'false'),
(60, 28, 15, 22, '', '✨ emojis work too hahaha ✨', '2021-02-21 11:03:07', 'false', 'false'),
(61, 15, 28, 20, 'Skrrt', '', '2021-02-21 11:03:54', 'false', 'false'),
(62, 28, 15, 22, 'wat the fuk', '', '2021-02-21 11:03:55', 'false', 'false'),
(63, 28, 15, 22, '', 'Yes', '2021-02-21 11:04:04', 'false', 'false'),
(64, 28, 15, 22, 'bruh u a god', '', '2021-02-21 11:04:10', 'false', 'false'),
(65, 28, 15, 22, '', 'I want sushi ', '2021-02-21 11:04:43', 'false', 'false'),
(66, 28, 15, 22, 'i shall get u once this is over', '', '2021-02-21 11:05:15', 'false', 'false'),
(67, 15, 28, 20, '', 'pop pop', '2021-02-21 11:08:22', 'false', 'false'),
(68, 15, 29, 15, 'hi ethan', '', '2021-02-21 12:41:27', 'false', 'false'),
(76, 32, 28, 11, 'pagona', '', '2021-02-21 13:03:35', 'false', 'false'),
(80, 15, 23, 23, 'Ni de mama ye si', '', '2021-02-21 14:19:04', 'false', 'false'),
(81, 15, 23, 23, '', 'Oi very rude', '2021-02-21 14:19:30', 'false', 'false'),
(82, 15, 23, 23, 'Thanks', '', '2021-02-21 14:20:02', 'false', 'false'),
(83, 32, 28, 11, '', 'yes', '2021-02-21 14:55:58', 'false', 'false'),
(90, 15, 5, 19, '', 'What a coinkidink me too bro', '2021-02-21 18:43:30', 'false', 'false'),
(91, 15, 5, 19, 'ok', '', '2021-02-21 18:46:09', 'false', 'false'),
(93, 15, 29, 15, 'U gay', '', '2021-02-22 01:59:39', 'false', 'false'),
(94, 15, 29, 15, '', 'cb', '2021-02-22 01:59:48', 'false', 'false'),
(102, 15, 29, 24, 'Very naise how meuch', '', '2021-02-22 06:50:48', 'false', 'false'),
(106, 15, 23, 23, 'Hi', '', '2021-02-22 08:36:47', 'false', 'false'),
(108, 15, 5, 19, 'Hello', '', '2021-02-22 08:37:40', 'false', 'false'),
(109, 15, 5, 19, '', 'no', '2021-02-22 08:37:47', 'false', 'false'),
(110, 15, 5, 19, 'Hello', '', '2021-02-22 08:38:14', 'false', 'false'),
(111, 15, 5, 19, '', 'what u want', '2021-02-22 08:38:20', 'false', 'false'),
(112, 15, 5, 19, '', 'yo', '2021-02-22 08:38:38', 'false', 'false'),
(114, 28, 29, 24, 'https://youtu.be/d7mrBC0zLZg', '', '2021-02-22 08:40:24', 'false', 'false'),
(115, 28, 29, 24, 'wat', '', '2021-02-22 09:24:52', 'false', 'false'),
(116, 28, 15, 22, 'whats with the false', '', '2021-02-22 09:25:08', 'false', 'false'),
(119, 15, 5, 5, 'very naise how much', '', '2021-02-22 14:40:59', 'true', 'false'),
(120, 15, 5, 5, 'skrrt', '', '2021-02-22 14:42:21', 'true', 'false'),
(129, 15, 5, 26, 'yuh', '', '2021-02-22 16:25:32', 'false', 'false'),
(130, 5, 17, 27, 'meow', '', '2021-02-23 05:57:30', 'false', 'false'),
(138, 35, 15, 22, 'hi', '', '2021-02-23 10:45:52', 'false', 'false'),
(139, 35, 15, 22, '', 'Hi', '2021-02-24 00:08:26', 'false', 'false'),
(140, 35, 15, 22, '', 'Wanna buy?', '2021-02-24 00:08:32', 'false', 'false'),
(143, 15, 18, 36, 'Hi I\'m interested', '', '2021-02-24 08:26:48', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `sp_craftchats`
--

CREATE TABLE `sp_craftchats` (
  `craftchat_id` int(11) NOT NULL,
  `craftchat_buyerid` int(11) NOT NULL,
  `craftchat_sellerid` int(11) NOT NULL,
  `craftchat_listid` int(11) NOT NULL,
  `craftchat_buyermessage` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `craftchat_sellermessage` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tsLastUpdated` timestamp NOT NULL DEFAULT current_timestamp(),
  `craftchat_buyeroffer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `craftchat_selleroffer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_craftchats`
--

INSERT INTO `sp_craftchats` (`craftchat_id`, `craftchat_buyerid`, `craftchat_sellerid`, `craftchat_listid`, `craftchat_buyermessage`, `craftchat_sellermessage`, `tsLastUpdated`, `craftchat_buyeroffer`, `craftchat_selleroffer`) VALUES
(5, 5, 15, 6, 'I want how much', '', '2021-02-21 18:09:22', 'false', 'false'),
(7, 5, 15, 6, '', 'yeas', '2021-02-21 18:26:19', 'false', 'false'),
(9, 5, 15, 6, '', 'vey nais', '2021-02-22 06:45:12', 'false', 'false'),
(23, 15, 5, 1, 'Smelly satya', '', '2021-02-24 03:45:47', 'false', 'false'),
(28, 5, 15, 17, 'wo yao', '', '2021-02-24 16:35:09', 'false', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `sp_craftlistings`
--

CREATE TABLE `sp_craftlistings` (
  `craftlist_id` int(11) NOT NULL,
  `craftlist_title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `craftlist_price` int(11) NOT NULL,
  `craftlist_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `craftlist_desc` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `craftlist_dealMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `craftlist_iUserid` int(11) NOT NULL,
  `tsLastUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_craftlistings`
--

INSERT INTO `sp_craftlistings` (`craftlist_id`, `craftlist_title`, `craftlist_price`, `craftlist_image`, `craftlist_desc`, `craftlist_dealMethod`, `craftlist_iUserid`, `tsLastUpdated`) VALUES
(9, 'Shirt cropping ', 300, 'listimages/IMG_6035e5fa14a583.13131727.png', 'Ill crop a shirt for u', 'Meet-Up', 18, '2021-02-24 05:36:58'),
(11, 'DIY dress', 500, 'listimages/IMG_6035e6f53f5538.47455993.jpeg', 'I’ll diy you a dress ', 'Delivery', 18, '2021-02-24 05:41:09'),
(12, 'Red Shirt', 100, 'listimages/IMG_6035e75f313951.56091036.jpg', 'Red Shirt\r\nSize- XS\r\nQuality- Good', 'Delivery', 28, '2021-02-24 05:42:55'),
(13, 'Tie dye', 150, 'listimages/IMG_6035e7753cb506.87088000.jpeg', 'I’ll tie dye ur shirtd', 'Meet-Up', 18, '2021-02-24 05:43:17'),
(14, 'Diy tie top', 600, 'listimages/IMG_6035e854a38ba3.06163689.jpeg', 'I’ll randomly edit ur shirt ', 'Delivery', 18, '2021-02-24 05:47:00'),
(15, 'Light blue fairy long skirt', 150, 'listimages/IMG_6035e8a7582049.04775162.jpg', 'I made this cool skirt from uprecycling.', 'Meet-Up', 17, '2021-02-24 05:48:23'),
(17, 'Can make you new pair of pants<span>(edited)</span>', 2600, 'listimages/IMG_6035eaab31d6b7.85204000.jpg', 'I can professionally make you a new pair of pants ', 'Meet-Up', 15, '2021-02-24 05:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `sp_favourites`
--

CREATE TABLE `sp_favourites` (
  `fav_id` int(11) NOT NULL,
  `fav_userid` int(11) NOT NULL,
  `fav_listid` int(11) NOT NULL,
  `fav_craftid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_favourites`
--

INSERT INTO `sp_favourites` (`fav_id`, `fav_userid`, `fav_listid`, `fav_craftid`) VALUES
(8, 15, 9, 0),
(43, 17, 20, 0),
(57, 15, 8, 0),
(59, 15, 0, 4),
(63, 15, 12, 0),
(69, 5, 20, 0),
(71, 5, 16, 0),
(72, 5, 14, 0),
(74, 5, 8, 0),
(82, 15, 13, 0),
(83, 5, 12, 0),
(84, 27, 20, 0),
(102, 31, 21, 0),
(103, 31, 20, 0),
(104, 31, 16, 0),
(106, 31, 19, 0),
(107, 31, 0, 4),
(108, 31, 0, 2),
(110, 15, 14, 0),
(111, 15, 21, 0),
(112, 15, 10, 0),
(115, 5, 0, 4),
(116, 5, 21, 0),
(117, 5, 0, 5),
(119, 5, 0, 2),
(120, 5, 0, 1),
(121, 17, 21, 0),
(122, 28, 11, 0),
(124, 15, 0, 5),
(125, 32, 21, 0),
(130, 23, 22, 0),
(131, 23, 21, 0),
(132, 23, 20, 0),
(133, 23, 12, 0),
(134, 15, 22, 0),
(135, 15, 23, 0),
(136, 15, 15, 0),
(138, 15, 0, 1),
(139, 5, 0, 7),
(140, 5, 26, 0),
(141, 5, 25, 0),
(142, 5, 27, 0),
(144, 35, 23, 0),
(145, 36, 24, 0),
(146, 36, 20, 0),
(147, 15, 30, 0),
(150, 17, 39, 0),
(151, 17, 0, 17),
(152, 17, 0, 13),
(153, 17, 33, 0),
(154, 17, 34, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sp_listings`
--

CREATE TABLE `sp_listings` (
  `list_id` int(11) NOT NULL,
  `list_title` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_category` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_desc` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_dealMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iUserid` int(11) NOT NULL,
  `list_points` int(11) NOT NULL,
  `list_carbon` int(11) NOT NULL,
  `tsLastUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_listings`
--

INSERT INTO `sp_listings` (`list_id`, `list_title`, `list_category`, `list_type`, `list_image`, `list_desc`, `list_dealMethod`, `iUserid`, `list_points`, `list_carbon`, `tsLastUpdated`) VALUES
(8, 'pagona<span>(edited)</span>', 'Tops', 'free', 'listimages/IMG_602fed54dd8997.57855647.jpg', 'bearded lizarde', 'Meet-Up', 28, 228, 21875, '2021-02-18 08:00:49'),
(14, 'Blue and Yellow hoodie', 'Tops', 'trade', 'listimages/IMG_602f21b10520c6.56295090.jpeg', 'Size- XL\r\n\r\nI have worn this for 3 years and I wanna trade it for something else. If you\'re interested dm me', 'Meet-Up', 28, 225, 20078, '2021-02-19 02:25:53'),
(30, 'Strawberry dress', 'Dresses', 'trade', 'listimages/IMG_6035c6364cf894.68150130.jpg', 'Trendy strawberry dress for free size small', 'Meet-Up', 18, 254, 22517, '2021-02-24 03:21:26'),
(31, 'Undertale Shirt', 'Tops', 'free', 'listimages/IMG_6035c659c7e756.45105962.jpg', 'This top will fill you with determination', 'Meet-Up', 28, 242, 21805, '2021-02-24 03:22:01'),
(32, 'Jacket', 'Outerwear', 'trade', 'listimages/IMG_6035c6eb10a516.27064574.jpeg', 'Size - XS\r\n', 'Meet-Up', 28, 263, 25530, '2021-02-24 03:24:27'),
(33, 'summer dress', 'Dresses', 'trade', 'listimages/IMG_6035c734b0e6b9.87253010.jpg', 'summer', 'Delivery', 18, 208, 15520, '2021-02-24 03:25:40'),
(34, 'Grey dress', 'Dresses', 'free', 'listimages/IMG_6035c83be11103.16059823.jpg', '', 'Delivery', 18, 205, 13390, '2021-02-24 03:30:03'),
(35, 'gingham top', 'Tops', 'trade', 'listimages/IMG_6035c8d33ee2b0.57299510.jpg', '', 'Delivery', 18, 193, 13693, '2021-02-24 03:32:35'),
(36, 'New York Top', 'Tops', 'free', 'listimages/IMG_6035e53db4d3f1.69272691.png', 'Baby blue shirt', 'Delivery', 18, 169, 15506, '2021-02-24 05:33:54'),
(37, 'V neck top', 'Tops', 'free', 'listimages/IMG_6035e5bd2bc6b5.51813726.png', 'White top', 'Meet-Up', 18, 224, 21200, '2021-02-24 05:35:57'),
(38, 'Pink lace chiffon top', 'Tops', 'free', 'listimages/IMG_6035e66bc1d5b0.74743804.jpg', 'Giving for freeeee', 'Meet-Up', 17, 246, 22670, '2021-02-24 05:38:51'),
(39, 'High Waist Plaid Skirt', 'Bottoms', 'trade', 'listimages/IMG_6035e6f4a0d234.90272802.jpg', 'I wan trade', 'Delivery', 17, 353, 31379, '2021-02-24 05:41:08'),
(40, 'free clothing!', 'Dresses', 'free', 'listimages/IMG_60372a4da03341.87804231.jpg', 'giving away my dress', 'Meet-Up', 17, 231, 22536, '2021-02-25 04:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `sp_users`
--

CREATE TABLE `sp_users` (
  `id` int(11) NOT NULL,
  `s_Email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_Username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_ProfileImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'img/profile.png',
  `user_points` int(11) NOT NULL DEFAULT 500,
  `user_carbon` int(11) NOT NULL,
  `user_theme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sp_users`
--

INSERT INTO `sp_users` (`id`, `s_Email`, `s_Username`, `s_Password`, `s_ProfileImg`, `user_points`, `user_carbon`, `user_theme`) VALUES
(5, 'sirtya@gmail.com', 'TyaTya', '$2y$10$Tsu10JOkSaubQ6YKC5CHoOFqUQf4Ab2e7R7gtLMrzhuA/4cC.qr8q', 'uploaded/IMG_602fdbc9c438d3.36048861.jpg', 417969, 23083, 'light'),
(8, 'admin@shirty.com', 'admin', '$2y$10$jb63Gl5MtQZLgehPb.dlVeGTqOunfKYX/7p2XN.h02mhWJyaZH2qS', 'img/cat1.jpg', 500, 0, 'light'),
(15, 'putangwkwkwk@gmail.com', 'FishBone', '', 'https://lh3.googleusercontent.com/a-/AOh14Gj_8M45QIbT0kLJEoZjmEdlJkS3UsDNKMOachhL=s96-c', 9259, 23083, 'dark'),
(16, 'test@test.test', 'test', '$2y$10$I21canVw7y6I2fOJB.0bHuRgIrwlUidw5KoMbTwHot.rX8L4hm2ce', 'uploaded/IMG_602c10b32765b5.34023222.jpg', 500, 0, 'light'),
(17, 'jxnyee@gmail.com', 'junyee tan', '', 'uploaded/IMG_60349d1b844355.54524135.jpg', 42140, 14862, 'light'),
(18, 'craftygirlnerezza@gmail.com', 'Rachael Ong', '', 'https://lh3.googleusercontent.com/a-/AOh14GhdsIpi2PduUgar2S7oZAoGU4FjcJAbt5dyxQ3haw=s96-c', 45900, 0, 'light'),
(19, 'what@gmail.com', 'wheewhoo', '$2y$10$Sbks0AoPrdkoPZ5Y54NkneNv4yix5E3AGB.ZlcmY.PRb7gjIlBv..', 'uploaded/IMG_602d2dc0d0ed12.81933096.jpeg', 500, 0, 'light'),
(23, 'weijieyeo2001@gmail.com', 'Wei Jie', '', 'uploaded/IMG_602dc1851f9077.75767261.jpg', 500, 0, 'light'),
(27, 'seeva22@gmail.com', 'seeva ratnam', '', 'https://lh5.googleusercontent.com/-LhUo-Cci0c4/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmuTsI4jCxsHGPYDEW_YDdOz_5jLA/s96-c/photo.jpg', 500, 0, 'light'),
(28, 'pogona@gmail.com', 'pogona', '$2y$10$b5...ovnFa4Uz5lBhRh3wug95FiNWExU7.qI.IFZfPsmVlYdUcnhS', 'uploaded/IMG_602e1e545d85d7.60273284.jpg', 50000, 0, 'light'),
(29, 'ethantanhw96@gmail.com', 'Ethan', '', 'https://lh3.googleusercontent.com/a-/AOh14GhdF9CgZa-c7s_Z0E4gbZGfofqqJ73WsjRty7dNnlM=s96-c', 500, 0, 'light'),
(30, 'horizontwin@gmail.com', 'Andy Yap', '', 'https://lh6.googleusercontent.com/-UZN2KW8avjU/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucm7IpXFgM-kHkvCbHa-e464EVA6wQ/s96-c/photo.jpg', 500, 0, 'light'),
(31, 'satyamp4@gmail.com', 'TwiTya', '', 'https://lh3.googleusercontent.com/a-/AOh14GimviObY4PkK3EgtdcN4dUkhzk1UbWlg8C8n5-rFQ=s96-c', 623, 0, 'light'),
(32, 'jeaniechen919@gmail.com', 'Jeanie Chen', '', 'uploaded/IMG_60325aee10d125.46152790.jpg', 500, 0, 'light'),
(33, 'email@abc.com', 'name', '$2y$10$NfBw.lTGan8E719m0PwO0./j1iD7MMeJxPf.L9R30Yw4MuD0T2q6a', 'img/profile.png', 500, 0, 'light'),
(34, 'ragekillplaystrove@gmail.com', 'Ragekill Plays', '', 'https://lh3.googleusercontent.com/a-/AOh14GivyiN9KloJiDNgGmQ5sm6sxTceVSlIGiV-9mey=s96-c', 500, 0, 'light'),
(35, 'rosilina124@gmail.com', 'rosini', '$2y$10$ELc/AvWHFUgaSjnlH5PB9eSNWIscYiyeX7SZ2bTnPWTMzZOH7vwjO', 'img/profile.png', 570, 0, 'light'),
(36, 'userOne@mail.com', 'userone', '$2y$10$l74xo3/Mv04HB5Wt3BlZ/unXwzNJGlhBrnvO1NBbNsR2RwIOQhfhe', 'img/profile.png', 500, 0, 'light');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `sComment` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL,
  `tsLastUpdated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comments`
--

INSERT INTO `tb_comments` (`id`, `user_id`, `post_id`, `sComment`, `likes`, `tsLastUpdated`) VALUES
(110, 499, 156, 'This is a comment test yalls', 6, '2021-01-20 12:52:54'),
(111, 539, 157, 'This comment should be deleted', 0, '2021-01-21 02:59:55'),
(113, 499, 162, 'Haha nice ass bro', 0, '2021-01-23 13:29:52'),
(114, 499, 162, 'cimmetn', 0, '2021-01-24 14:02:46'),
(116, 499, 151, 'comment', 0, '2021-01-24 17:22:41'),
(117, 543, 165, 'asdasdasd', 0, '2021-01-24 20:13:29'),
(118, 543, 165, 'asdasd', 0, '2021-01-24 20:13:32'),
(121, 499, 166, 'no u', 0, '2021-01-24 20:18:47'),
(123, 499, 167, 'no cus they look like u', 0, '2021-01-25 09:13:15'),
(124, 544, 167, 'ok', 0, '2021-01-25 09:23:04'),
(125, 499, 167, 'u suck', 0, '2021-01-25 09:24:43'),
(126, 544, 167, 'ok', 0, '2021-01-25 09:24:52'),
(127, 499, 167, 'i hate u', 0, '2021-01-25 09:24:58'),
(128, 544, 167, 'ok', 0, '2021-01-25 09:25:06'),
(129, 499, 167, 'say ok if u are a loser', 0, '2021-01-25 09:25:14'),
(130, 544, 167, 'loser', 0, '2021-01-25 09:25:20'),
(131, 499, 167, ':P sucky', 0, '2021-01-25 09:25:29'),
(132, 544, 167, 'sucker', 0, '2021-01-25 09:25:40'),
(133, 499, 167, 'u then', 0, '2021-01-25 09:25:46'),
(134, 544, 167, 'ok', 0, '2021-01-25 09:25:57'),
(136, 499, 176, 'Idk but I like meat haha', 0, '2021-01-29 12:28:44'),
(137, 547, 176, 'Show compassion', 0, '2021-01-29 12:30:04'),
(138, 499, 176, 'I show compassion by killing them painlessly', 1, '2021-01-29 12:30:18'),
(139, 547, 176, 'Punch your face', 0, '2021-01-29 12:31:24'),
(140, 499, 176, 'Call police animal abuse', 0, '2021-01-29 12:31:37'),
(142, 554, 171, 'use ur brain la', 0, '2021-02-06 16:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_forums`
--

CREATE TABLE `tb_forums` (
  `sForumname` varchar(1000) NOT NULL,
  `sForumimage` varchar(1000) NOT NULL,
  `sForumusers` int(11) NOT NULL,
  `sForumposts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_forums`
--

INSERT INTO `tb_forums` (`sForumname`, `sForumimage`, `sForumusers`, `sForumposts`) VALUES
('f/FoodSOS', 'img/FoodSOS.jpg', 26, 42),
('f/HowTo101', 'img/forum-bg.jpg', 25, 18),
('f/FoodyCritic', 'img/critic.jpg', 13, 10),
('f/RecipeHub', 'img/Recipe.png', 49, 68),
('f/FoodQnA', 'img/qnA.jpg', 25, 56),
('f/FoodMemes', 'img/pizzzzza.jpg', 48, 97),
('f/FurryFoodys', 'img/chefcat.jpg', 37, 76);

-- --------------------------------------------------------

--
-- Table structure for table `tb_posts`
--

CREATE TABLE `tb_posts` (
  `post_id` int(11) NOT NULL,
  `sForumname` varchar(1000) NOT NULL,
  `sTitle` varchar(1000) NOT NULL,
  `sImage` varchar(255) NOT NULL,
  `sPost` varchar(1000) NOT NULL,
  `iUserid` int(11) NOT NULL,
  `tsLastUpdated` timestamp NULL DEFAULT current_timestamp(),
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_posts`
--

INSERT INTO `tb_posts` (`post_id`, `sForumname`, `sTitle`, `sImage`, `sPost`, `iUserid`, `tsLastUpdated`, `likes`) VALUES
(98, 'f/FurryFoodys', 'Food for feline friends featuring family fun', 'postIMG/IMG_5ffb3b4a6d6393.39645422.jpg', 'Recently came across a cookbook for cats and just wanted to ask if you guys knew about homecooked food for cats!!', 501, '2021-01-10 17:37:14', 21),
(99, 'f/FoodMemes', 'Real life food vs Anime food', 'postIMG/IMG_5ffb3b60c48463.53230076.png', 'I have to say I\'m a big fan of anime food. If you prefer real life food I just want you to know your opinion is wrong', 502, '2021-01-10 17:37:36', 26),
(100, 'f/HowTo101', 'Avocados and avocadon\'ts', 'postIMG/IMG_5ffd6f739451f7.42270809.jpg', 'AvocaDO pei me my qian and avocaDONT talk to me again! You butter not contact me! Or I\'ll make you fall into a pit. \"peww\"', 503, '2021-01-12 09:44:19', 35),
(101, 'f/FoodQnA', 'Food photoshoot locations?', 'postIMG/IMG_5ffb3b8589c341.44965489.jpg', 'As a professional photographer does anybody know any good locations for food photography?', 504, '2021-01-10 17:38:13', 39),
(102, 'f/RecipeHub', 'Rainbow cake recipe for my internet friends', 'postIMG/IMG_5ffb3b92913b34.15909535.jpg', 'As a genie stuck in a lamp its very rare to get guests over so i really want to impress my friends this weekend', 505, '2021-01-10 17:38:26', 47),
(103, 'f/FoodyCritic', 'Outrageous drive-thru experience at McDonald\'s', 'postIMG/IMG_5ffb3ba15b4ec2.20236798.jpg', 'A MCDONALDS DRIVE-THRU EMPLOYEE SCRATCHED UP MY BRAND NEW BEAUTIFUL BLUE SUBARI STI 2008 AWD MANUAL FLAT FOUR LIMITED EDITION SIGNED BY FAST & FURIOUS CAST MEMBERS AND BAPTISED WHEN IT WAS JUST 2 YEARS OLD VEHICULAR CAR!!! DON\'T EVER GO TO MCDONALDS AGAIN PLEASE BOYCOTT!!!', 506, '2021-01-10 17:38:41', 61),
(104, 'f/HowTo101', 'Fabricating Filipino food firetruck festival funhouses', 'postIMG/IMG_5ffb3bb23c13b6.77330368.jpg', 'Im secretly an indian but i like to hide that part of me and tell people im philipino and speak chinese to mask my natural born prodigal indian accent. i also smell like an indian thats why i take 6 hour showers', 507, '2021-01-10 17:38:58', 69),
(105, 'f/FoodSOS', 'How do I get the crispiest possible skin on my salmon?', 'postIMG/IMG_5ffb41e19fec84.01632233.jpg', 'I recently tried to score the skin of my salmon and ended up chopping the whole bloody thing in half. next thing i knew i was eating salmon fish fingers instead of a beautiful fillet. Also my friends wouldnt stop laughing at me and now i feel bad and stuffs :(', 500, '2021-01-10 18:05:21', 78),
(108, 'f/FoodSOS', 'KOI QUEUE DAMN LONG!', 'postIMG/IMG_5ffcfcca3f1049.91267550.jpg', 'This koi queue was insanely long even with the pandemic going around... asd', 500, '2021-01-12 01:35:06', 15),
(136, 'f/RecipeHub', 'Gemok', 'postIMG/IMG_6002843422e603.12725389.jpg', 'What lovers do', 510, '2021-01-16 06:14:17', 3),
(160, 'f/FoodMemes', 'PezzaHue', 'postIMG/IMG_600e6e71427a61.55430479.jpg', 'pizza kenna squeeze haha', 499, '2021-01-22 00:19:18', 4),
(167, 'f/FoodQnA', 'Do you eat frogs?', 'postIMG/IMG_600e8a622fdfe2.57852821.jpg', 'even after seeing this image?', 544, '2021-01-25 09:07:46', 6),
(171, 'f/FoodSOS', 'Idk how to open a can of mushroom soop doe<span> (edited)</span>', 'postIMG/IMG_601317da74cdb8.95253463.jpeg', 'im dense. just like this soup haha', 543, '2021-01-24 20:15:16', 2),
(176, 'f/FoodSOS', 'Y no vegetarian food?<span> (edited)</span>', 'postIMG/IMG_6013ff23affb40.86636522.jpg', 'Why no vegetarian food?', 547, '2021-01-29 12:25:15', 0),
(178, 'f/HowTo101', 'Shell out', 'postIMG/IMG_6014cf8b4559f1.76134403.jpeg', 'Try shell out! Fun to do fun to eat!!', 549, '2021-01-30 03:16:27', 3),
(179, 'f/FoodyCritic', 'This is the kind of food u get in tekong', 'postIMG/IMG_601ec9200a9ad9.22993255.jpg', 'Taste like rubbish', 554, '2021-02-06 16:51:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `sFname` varchar(100) NOT NULL,
  `sLname` varchar(100) NOT NULL,
  `sEmail` varchar(100) NOT NULL,
  `sPassword` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `sFname`, `sLname`, `sEmail`, `sPassword`, `role`) VALUES
(499, 'TyaTya', 'Tya', 'sirtya@gmail.com', '$2y$10$ztC3td9H69.2T7LSuGPz6eXAxSSVfue9jBUpSH6qAiFbMvCEM72Ce', 10),
(500, 'Restyaraunt', 'Business', 'Restyaraunt@gmail.com', '$2y$10$30UrfSOUNv/q/6kc28cb6.aENAjE91dadCKlyzJ38y0foCuznSl/S', 0),
(501, 'AreYouCold', 'Nicole', 'AreYouCold@gmail.com', '$2y$10$TSvgoC4W0yFR5aSo.Dw04O0L/yN3G888drK7fr3Y.lYJ1EFqYUItK', 0),
(502, 'TooDeePimp', 'Caelan', 'TooDeePimp@gmail.com', '$2y$10$UJcW3fS82fcuF1GlG55aiuCBoIH2PO8k/zG0eFE1nFLR5m9Z.ibd2', 0),
(503, 'PeiMeQian', 'px', 'PeiMeQian@gmail.com', '$2y$10$B6Hb6ZmCG5XQ1VsvsZMH2eS.Zy6eONdaeWwbUHjI8IiMQ.3A6TIDq', 0),
(504, 'IwantItThatWei_Hong', 'Ethan', 'IwantItThatWei_Hong@gmail.com', '$2y$10$Rys86BZ3j.CqC6I/nXTiHeSo6KY.7A6KdovR1tVz2FGM4TMmy0qse', 0),
(505, 'JiJidotcom', 'Jeanie', 'JiJidotcom@gmail.com', '$2y$10$tVqmrOaWJFW9JFIoJKJaD.ucCRuiF3nD7O5CUSqJmaIitXsfkJ70i', 0),
(506, 'Weiwei_InDaHOUSE', 'wj', 'Weiwei_InDaHOUSE@gmail.com', '$2y$10$m9C0LEdvzz3CE/13Q9RleOVZdUUTsb2KbWhLlKXvufkAyfKkBWmr.', 0),
(507, 'SmellyHolly', 'Jon', 'SmellyHolly@gmail.com', '$2y$10$/fVdzqGHRsBvDMVhIpHldO0Gc6UwYUHdthVNjmyb2B7kr3eErV4Nq', 0),
(510, 'Yeo', 'Jie', 'weijieyeo2001@gmail.com', '$2y$10$V/I3rlgbKEEAwkluiRKVmOpMaM3PH0Y8LMvdXtQUxNPGsEKMIJOw.', 0),
(543, 'ratana', 'satnam', 'sat@gmail.com', '$2y$10$XZPyClggKbe6rezzS9AHE.895TWMM9nTLDzwLUR1xnwq5vVBviymW', 0),
(544, 'Chan', 'Chan Pei Xuan', 'chanpx01@gmail.com', '', 0),
(547, 'Briyani', '224', 'briyani224@gmail.com', '$2y$10$.NN7hcwUYk5uBe0/fAFfFe0SMr2A7e/1TL5vkAT/HtfobPV09MYka', 0),
(548, 'Anna', 'Siva', 'annakeely.siva@gmail.com', '$2y$10$tMLukkKA192xpBQ..Qm5eO5LMy45/rUsIq3U1Bjm4FwT4NQogwCda', 0),
(549, 'Jayanthi', 'Michael', 'jayanthis04@yahoo.com.sg', '$2y$10$rK6ZekX6CFRVXAdqKs0mauDRJLPKtYSaiFmqRu.NTZ/j9a0iTIP4C', 0),
(551, 'FishBone', 'FishBone', 'putangwkwkwk@gmail.com', '', 0),
(553, 'Tya2', 'Tya2', 'satyamp4@gmail.com', '$2y$10$QpBViqDmUf8.o7yvVGmP7.gpc.7tVERPk9z0GwyadD85vNjumXpKW', 0),
(554, 'Seet', 'Seet', 'weitungseetoh@gmail.com', '', 0),
(555, 'hi', 'there', 'what@gmail.com', '$2y$10$AbGRX2jXlMtB2PTjgOCO5OZYX1eXGdmbl5SuChj7liQ/ejfz5aYJq', 0),
(556, 'w', 'w', 'a@a.com', '$2y$10$6pS9c5yPij5g/XEOojCk1uk3xI7KoQv5FJHwTy6Cjrodx0bBG7jXa', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ew_users`
--
ALTER TABLE `ew_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sp_chats`
--
ALTER TABLE `sp_chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `sp_craftchats`
--
ALTER TABLE `sp_craftchats`
  ADD PRIMARY KEY (`craftchat_id`);

--
-- Indexes for table `sp_craftlistings`
--
ALTER TABLE `sp_craftlistings`
  ADD PRIMARY KEY (`craftlist_id`);

--
-- Indexes for table `sp_favourites`
--
ALTER TABLE `sp_favourites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `sp_listings`
--
ALTER TABLE `sp_listings`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `sp_users`
--
ALTER TABLE `sp_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_forums`
--
ALTER TABLE `tb_forums`
  ADD UNIQUE KEY `sForumname` (`sForumname`) USING HASH;

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ew_users`
--
ALTER TABLE `ew_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sp_chats`
--
ALTER TABLE `sp_chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `sp_craftchats`
--
ALTER TABLE `sp_craftchats`
  MODIFY `craftchat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sp_craftlistings`
--
ALTER TABLE `sp_craftlistings`
  MODIFY `craftlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sp_favourites`
--
ALTER TABLE `sp_favourites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `sp_listings`
--
ALTER TABLE `sp_listings`
  MODIFY `list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sp_users`
--
ALTER TABLE `sp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_comments`
--
ALTER TABLE `tb_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
