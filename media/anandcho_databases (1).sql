-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2023 at 03:21 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anandcho_databases`
--

-- --------------------------------------------------------

--
-- Table structure for table `acroboard_comments`
--

CREATE TABLE `acroboard_comments` (
  `comment_id` int NOT NULL,
  `notice_id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acroboard_comments`
--

INSERT INTO `acroboard_comments` (`comment_id`, `notice_id`, `user_id`, `comment`) VALUES
(1, 3, 'anand(owner)', 'test 1'),
(2, 7, 'student1', 'oidf'),
(3, 7, 'anand(owner)', 'test'),
(4, 2, 'student1', 'test comment 1'),
(5, 2, 'student1', 'test comment 1'),
(6, 2, 'student1', 'test comment 1'),
(7, 2, 'student1', 'test comment 1'),
(11, 6, 'anand(owner)', 'hello'),
(12, 3, 'student1', 'student test 1'),
(13, 7, 'student1', 'thank you\r\n'),
(14, 2, 'student1', 'test check 3'),
(15, 2, 'do4anand@gmail.com', 'admin comment');

-- --------------------------------------------------------

--
-- Table structure for table `acroboard_likes`
--

CREATE TABLE `acroboard_likes` (
  `notice_id` int NOT NULL,
  `user_id` int NOT NULL,
  `like` tinyint(1) NOT NULL,
  `number` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acroboard_likes`
--

INSERT INTO `acroboard_likes` (`notice_id`, `user_id`, `like`, `number`) VALUES
(6, 0, 1, 10),
(2, 0, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `acroboard_notice`
--

CREATE TABLE `acroboard_notice` (
  `notice_id` int NOT NULL,
  `notice_date` date NOT NULL,
  `notice_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notice_body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notice_writer_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `notice_writer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acroboard_notice`
--

INSERT INTO `acroboard_notice` (`notice_id`, `notice_date`, `notice_title`, `notice_body`, `notice_writer_role`, `notice_writer_name`) VALUES
(2, '2023-02-14', 'Sale of Old Spoils Goods', 'Students are hereby informed that our school is organising a sale of its old sports goods like cricket bats, badminton & lawn teams rackets, footballs, cricket & football gear etc. in the P.E. Room on 2K1 August, 2Oxx. Those interested in purchasing these can visit the P.E. Room on the assigned date during their free periods or recess time.', 'Sports Secretary', 'Ananad Choudhary'),
(3, '2023-02-01', 'Test Case', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse quaerat deleniti ab! Voluptas laborum soluta corrupti temporibus necessitatibus. Facere recusandae corrupti, reprehenderit tenetur consequatur error itaque doloremque similique voluptatem dolores!\r\nNesciunt maxime dolor beatae laboriosam aliquam similique molestiae voluptate nihil ratione quam. Mollitia dicta porro, tempora quaerat voluptatibus quia rem voluptates magnam delectus minima neque optio. Delectus reiciendis quod id?\r\nDeleniti corporis in, architecto aut ut minus. Laborum, praesentium nisi dolore minus ad veritatis hic obcaecati quidem id autem nulla culpa perferendis eaque reprehenderit. Eligendi dolorem earum accusantium error similique.\r\nQuibusdam autem repudiandae doloremque accusamus eos temporibus laborum a molestiae illum, consectetur obcaecati voluptate nesciunt, nostrum, harum dolor unde ducimus voluptatem atque suscipit eveniet inventore saepe? Iusto, rerum. Laudantium, sapiente.\r\nDeleniti unde doloremque doloribus placeat provident aliquam blanditiis, similique quae voluptate excepturi. Omnis, ducimus commodi! Alias et in tempore autem, deserunt vitae quae voluptatibus repudiandae facilis, eos magni cum totam.\r\nVoluptas tempora iusto doloremque et optio officia, deleniti amet labore vero illum fugit minima inventore, eveniet iste harum repellendus impedit corporis beatae asperiores? Amet recusandae dolore neque ab eius distinctio.\r\nQuibusdam non, eligendi voluptates numquam eum similique illum. A quae quas rem facere facilis sapiente minima officiis, quos impedit officia adipisci voluptatum, maxime sed tenetur velit in voluptatem vero enim.\r\nIpsum laborum magnam minima perferendis praesentium quas velit officiis corrupti error quam dolorum voluptatum fuga tempora labore blanditiis magni aliquam, veniam iusto obcaecati esse eos placeat temporibus tenetur? Magnam, obcaecati!\r\nAccusantium, quasi neque delectus culpa laborum totam ut, dolor iure, est veniam ullam repudiandae rerum aliquid? Ipsum fugit ducimus doloribus, a, nam quae dicta eligendi doloremque, alias vel incidunt error?\r\nVeritatis aperiam perferendis quisquam provident eius tempore nam neque, cumque perspiciatis est dolorum consequuntur, quae debitis nisi fugiat hic aliquam quod! Magni accusamus quam similique. Pariatur ex quas architecto quisquam.', 'Tester', 'Sakshi & Vanshika'),
(4, '2023-02-11', 'Change in School Timings', 'All students are hereby informed about a change in school timings from 1st October, 20xx. The school will now start at 9 a.m. & end at 3 p.m. In the past few years, it has been seen that winters are rather severe and it becomes quite difficult to start early due to the extreme cold weather and the dense fog. So these new timings will be followed till further notice.', 'Principal', 'Anand Choudhary'),
(5, '2023-02-14', 'Sale of Old Spoils Goods', 'Students are hereby informed that our school is organising a sale of its old sports goods like cricket bats, badminton & lawn teams rackets, footballs, cricket & football gear etc. in the P.E. Room on 2K1 August, 2Oxx. Those interested in purchasing these can visit the P.E. Room on the assigned date during their free periods or recess time.', 'Sports Secretary', 'Ananad Choudhary'),
(6, '2023-02-01', 'Test Case 2', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Esse quaerat deleniti ab! Voluptas laborum soluta corrupti temporibus necessitatibus. Facere recusandae corrupti, reprehenderit tenetur consequatur error itaque doloremque similique voluptatem dolores!\r\nNesciunt maxime dolor beatae laboriosam aliquam similique molestiae voluptate nihil ratione quam. Mollitia dicta porro, tempora quaerat voluptatibus quia rem voluptates magnam delectus minima neque optio. Delectus reiciendis quod id?\r\nDeleniti corporis in, architecto aut ut minus. Laborum, praesentium nisi dolore minus ad veritatis hic obcaecati quidem id autem nulla culpa perferendis eaque reprehenderit. Eligendi dolorem earum accusantium error similique.\r\nQuibusdam autem repudiandae doloremque accusamus eos temporibus laborum a molestiae illum, consectetur obcaecati voluptate nesciunt, nostrum, harum dolor unde ducimus voluptatem atque suscipit eveniet inventore saepe? Iusto, rerum. Laudantium, sapiente.\r\nDeleniti unde doloremque doloribus placeat provident aliquam blanditiis, similique quae voluptate excepturi. Omnis, ducimus commodi! Alias et in tempore autem, deserunt vitae quae voluptatibus repudiandae facilis, eos magni cum totam.\r\nVoluptas tempora iusto doloremque et optio officia, deleniti amet labore vero illum fugit minima inventore, eveniet iste harum repellendus impedit corporis beatae asperiores? Amet recusandae dolore neque ab eius distinctio.\r\nQuibusdam non, eligendi voluptates numquam eum similique illum. A quae quas rem facere facilis sapiente minima officiis, quos impedit officia adipisci voluptatum, maxime sed tenetur velit in voluptatem vero enim.\r\nIpsum laborum magnam minima perferendis praesentium quas velit officiis corrupti error quam dolorum voluptatum fuga tempora labore blanditiis magni aliquam, veniam iusto obcaecati esse eos placeat temporibus tenetur? Magnam, obcaecati!\r\nAccusantium, quasi neque delectus culpa laborum totam ut, dolor iure, est veniam ullam repudiandae rerum aliquid? Ipsum fugit ducimus doloribus, a, nam quae dicta eligendi doloremque, alias vel incidunt error?\r\nVeritatis aperiam perferendis quisquam provident eius tempore nam neque, cumque perspiciatis est dolorum consequuntur, quae debitis nisi fugiat hic aliquam quod! Magni accusamus quam similique. Pariatur ex quas architecto quisquam.', 'Tester', 'Anand Choudhary'),
(7, '2023-01-31', 'Scouts & Guides Participation Needed', 'Our school has decided to send a troop of scouts and guides to the jamboree to be held at Lucknow from the 20th to the 27th of October. Those scouts and guides interested to participate in the jamboree may give their names to the undersigned by the 7th of October.', 'Secretary, R.W.A.', 'Anil');

-- --------------------------------------------------------

--
-- Table structure for table `acroboard_saved`
--

CREATE TABLE `acroboard_saved` (
  `saved_id` int NOT NULL,
  `notice_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `acroboard_saved`
--

INSERT INTO `acroboard_saved` (`saved_id`, `notice_id`, `user_id`) VALUES
(7, 6, 0),
(8, 3, 0),
(9, 7, 0),
(11, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int NOT NULL,
  `admin_email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_name` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `admin_email`, `admin_name`, `admin_password`) VALUES
(1, 'do4anand@gmail.com', 'anand', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cew_words`
--

CREATE TABLE `cew_words` (
  `id` int NOT NULL,
  `word` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `word_meaning` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `example` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purehealth_cart`
--

CREATE TABLE `purehealth_cart` (
  `id` int NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `product_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purehealth_id`
--

CREATE TABLE `purehealth_id` (
  `id` int NOT NULL,
  `dsf43t34gaega4` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `purehealth_id`
--

INSERT INTO `purehealth_id` (`id`, `dsf43t34gaega4`) VALUES
(3, 'noreply@anandchoudhary.in'),
(4, 'noreplygdmZ-XzC=Unu'),
(5, 'PUREHEALTHrzp_test_rxfcWRod9TA6G5'),
(8, 'PUREHEALTHrzp_test_r3xfcWRod9TA6G5');

-- --------------------------------------------------------

--
-- Table structure for table `purehealth_orders`
--

CREATE TABLE `purehealth_orders` (
  `date` date NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `number` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pincode` int NOT NULL,
  `product_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `product_counter` int NOT NULL,
  `product_price` int NOT NULL,
  `payment_status` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `refund` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purehealth_orders`
--

INSERT INTO `purehealth_orders` (`date`, `name`, `username`, `number`, `email`, `address`, `pincode`, `product_id`, `order_id`, `product_name`, `product_counter`, `product_price`, `payment_status`, `delivery_status`, `refund`) VALUES
('2023-10-01', 'Anand Choudhary ', 'its-anand', '123', 'do4anand@gmail.com', 'rajoda', 455001, '5', '130414', 'Pure health Cucumber & Coconut Soap, 75 g', 1, 50, '1', 'Delivered', 'Refund Successful'),
('2023-07-29', 'Anand Choudhary ', 'its-anand', '123', 'do4anand@gmail.com', 'rajoda', 455001, '1', '204782', 'Body lotion with natural ingredients, 250ml', 1, 150, '1', 'Delivered', 'Refund Successful'),
('2023-07-07', 'Anand Choudhary ', 'its-anand', '123', 'do4anand@gmail.com', 'rajoda', 455001, '1', '471798', 'Body lotion with natural ingredients, 250ml', 1, 150, '1', 'Delivered', 'Refund Successful'),
('2023-09-20', 'RAM', 'ram', '108', 'ram@gmail.com', 'Jhandachok Rajoda', 455001, '1', '482485', 'Body lotion with natural ingredients, 250ml', 1, 150, '1', 'Delivered', NULL),
('2023-08-02', 'Anand Choudhary ', 'its-anand', '123', 'do4anand@gmail.com', 'rajoda', 455001, '1', '962613', 'Body lotion with natural ingredients, 250ml', 1, 150, '1', 'Delivered', 'Refund Successful');

-- --------------------------------------------------------

--
-- Table structure for table `purehealth_products`
--

CREATE TABLE `purehealth_products` (
  `id` int NOT NULL,
  `image` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pageurl` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purehealth_products`
--

INSERT INTO `purehealth_products` (`id`, `image`, `product_name`, `price`, `description`, `pageurl`) VALUES
(1, '/projects/Pure-Health/Index_files/Image/body_lotion.webp', 'Body lotion with natural ingredients, 250ml', 150, 'The lightweight formula doesn’t make your skin feel greasy or sticky after application. It absorbs into the skin to give all-day hydration. The body lotion is made with natural ingredients and contains no toxins or harmful chemicals.', './Index_files/products/body_lotion.php'),
(2, '/projects/Pure-Health/Index_files/Image/facewash.webp', 'Face wash - Cleans Skin Deeply, 150ml', 100, 'Pamper your skin with the age-old tradition of Ubtan and let your dull, tanned skin rejuvenate, feel fresh & bright. Undo the effects of tan, pollution, dirt, harmful UV rays, and harsh weather conditions with Mamaearth Ubtan Face Wash.', './Index_files/products/facewash.php'),
(3, '/projects/Pure-Health/Index_files/Image/herbal_conditioner.webp', 'Herbal Conditioner for Dry Hair, 150ml', 200, 'This oil has potent antibacterial properties and help fight infections of the scalp. Coconut oil has nourishing properties it penetrates deep into the follicles and promotes hair growth and scalp health and preventing hair loss.', './Index_files/products/herbal_conditioner.php'),
(4, '/projects/Pure-Health/Index_files/Image/moisturizer.webp', 'moisturizer with Coconut oil, 150 ml', 180, 'Organic face moisturizer that is rich in anti-wrinkle and anti-aging vitamins to properly nourish your skin. Dry skin cream that is good for all skin types. Vitamin A, Vitamin B5 and help to keep oily skin in balance and hydrate dry itchy skin.', './Index_files/products/moisturizer.php'),
(5, '/projects/Pure-Health/Index_files/Image/soap.webp', 'Pure health Cucumber & Coconut Soap, 75 g', 50, 'Cleanse, moisturize and soothe your skin with a soap bar made with organic oils and plant butters, pure essential oils, organic herbs, and spices that offers a long-lasting lather and leaves your skin feeling clean, soft, and radiantly healthy.', './Index_files/products/soap.php'),
(6, '/projects/Pure-Health/Index_files/Image/shampoo.webp', 'Onion Shampoo For Hair Fall Control, 200ml', 120, 'This shampoo cleans the gunk and grime accumulated on the scalp. Consequently, irritation and itching that stems from the aforesaid is also kept at bay. it improve hair shaft thickness which reduces hair fall', './Index_files/products/shampoo.php');

-- --------------------------------------------------------

--
-- Table structure for table `purehealth_registered_users`
--

CREATE TABLE `purehealth_registered_users` (
  `full_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'PASSWORD IS 123',
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pincode` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `verification_code` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `is_verified` int NOT NULL,
  `resettoken` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `purehealth_registered_users`
--

INSERT INTO `purehealth_registered_users` (`full_name`, `username`, `number`, `email`, `password`, `address`, `pincode`, `verification_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
('Anand Choudhary ', 'its-anand', '123', 'do4anand@gmail.com', '$2y$10$ld3hhP6uCWlLH4M2TW37aOD.aMkzlS5dCE46CqxtOwWxkude/XSSi', 'rajoda', '455001', NULL, 1, NULL, NULL),
('RAM', 'ram', '108', 'ram@gmail.com', '$2y$10$BNgLYK2/.zXyGv8igQ1vLeM.L1Nn3xHFkbgoQBS8ey8IHy7Ed5Kpq', 'Jhandachok Rajoda', '455001', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `heading` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `heading`, `code`) VALUES
('this_is_lorem', 'this is lorem', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem maxime est alias repudiandae quo quisquam minus voluptatum quasi voluptatibus voluptas sed, adipisci nesciunt perspiciatis. Corporis quia commodi rem ad expedita?</p>\r\n            <code>\r\n                main(){ <br> &nbsp; printf(\"Hello\"); <br> }\r\n            </code>\r\n            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit odit corrupti ad assumenda et incidunt harum exercitationem, nesciunt architecto, aut nemo sed. Voluptatem explicabo architecto dolores corporis assumenda, consectetur blanditiis.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `travel_with_strangers_registration_user`
--

CREATE TABLE `travel_with_strangers_registration_user` (
  `id` int NOT NULL,
  `user_profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_role` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_location` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `verification_code` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `is_verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_with_strangers_registration_user`
--

INSERT INTO `travel_with_strangers_registration_user` (`id`, `user_profile_image`, `user_role`, `username`, `user_email`, `user_password`, `user_location`, `verification_code`, `is_verified`) VALUES
(16, '../../media/profileImage/Screenshot 2023-11-26 150237.png', 'customer', 'Anand Choudhary', 'do4anand@gmail.com', '$2y$10$Lj7VguYnE4gcF0qW2FkAb.OAAguW37LDplW7mU1E634aGB7CFwe1a', 'dewas', 'a77b9917b119a8e742a3abc508b1263e', 1),
(28, '../../media/profileImage/hotel1.jpg', 'hotel', 'Hotel One', 'anand.edumail@gmail.com', '$2y$10$R/oMzTx11BoFn9XmFLCgtO.tG2OaIaeoqB5W3aQXE8Na1qmqkqZHy', 'dewas', '71450d0a855a3cfeb849aa5502feb5b1', 1),
(29, '../../media/profileImage/Screenshot 2023-11-26 150415.png', 'customer', 'Ajay Thakur', 'anand.privatemail@gmail.com', '$2y$10$QaEeMsF2zNfeThkAo89LxOWjf8kp4V0OA4.Ki2NhGev/IteKcaXAO', 'dewas', '212b39fab080cfcb721467ae85e53490', 1);

-- --------------------------------------------------------

--
-- Table structure for table `travel_with_strangers_userposts`
--

CREATE TABLE `travel_with_strangers_userposts` (
  `post_id` int NOT NULL,
  `userid` int NOT NULL,
  `post_url` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(400) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel_with_strangers_userposts`
--

INSERT INTO `travel_with_strangers_userposts` (`post_id`, `userid`, `post_url`, `post_description`) VALUES
(17, 16, '../../media/postsImage/Untitled.png', 'This is post'),
(19, 28, '../../media/postsImage/hotel1.jpg', 'This is our hotel'),
(20, 28, '../../media/postsImage/abhishek.jpg', 'Hotel owner'),
(21, 28, '../../media/postsImage/Untitled.png', ''),
(22, 29, '../../media/postsImage/Screenshot 2023-11-26 150415.png', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `tws_grp`
--

CREATE TABLE `tws_grp` (
  `grp_id` int NOT NULL,
  `group_profile_pictures` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `group_members` int DEFAULT NULL,
  `group_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `location_from` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `location_to` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `group_size` int NOT NULL,
  `budget` int NOT NULL,
  `duration` int NOT NULL,
  `message_Id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tws_grp`
--

INSERT INTO `tws_grp` (`grp_id`, `group_profile_pictures`, `group_members`, `group_name`, `location_from`, `location_to`, `group_size`, `budget`, `duration`, `message_Id`) VALUES
(16, '../../media/groupImage/Untitled.png', NULL, 'Indore', 'Dewas', 'Indore', 3, 5, 5, NULL),
(21, '../../media/groupImage/Screenshot 2023-11-26 151259.png', NULL, 'Rajoda', 'Dewas', 'Rajoda', 5, 5, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tws_grp_members`
--

CREATE TABLE `tws_grp_members` (
  `group_member_id` int NOT NULL,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tws_grp_members`
--

INSERT INTO `tws_grp_members` (`group_member_id`, `user_id`, `group_id`, `role`, `status`) VALUES
(1, 16, 16, 'admin', 1),
(4, 29, 21, 'admin', 1),
(5, 29, 16, 'member', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tws_grp_message`
--

CREATE TABLE `tws_grp_message` (
  `chat_id` int NOT NULL,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL,
  `message` varchar(400) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `username`, `user_email`, `user_password`) VALUES
(1, 'student1', 'std1@gmail.com', '123'),
(2, 'student2', 'std2@gmail.com', '123'),
(3, 'student3', 'std3@gmail.com', '123'),
(4, 'student4', 'std4@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table ` voting_sys_political_parties`
--

CREATE TABLE ` voting_sys_political_parties` (
  `party_logo` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `party_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `candidate_name` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vote` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table ` voting_sys_political_parties`
--

INSERT INTO ` voting_sys_political_parties` (`party_logo`, `party_name`, `candidate_name`, `vote`) VALUES
('../images/aap.png', 'Aam aadmi party', 'Arvind Kejriwal', 0),
('../images/19199106-ai.png', 'Anand Janta Party', 'Anand Choudhary', 1),
('../images/_40120e3f-13a6-4e7f-bd8a-2633370afd55.jpeg', 'Bharat fitness party', 'Anand Choudhary', 1),
('../images/bjp.png', 'Bharatiya janata party', 'Narendra Modi', 2),
('../images/inc.png', 'Indian national congress', 'Rahul Gandhi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `voting_sys_voter_id`
--

CREATE TABLE `voting_sys_voter_id` (
  `stu_email` varchar(14) DEFAULT NULL,
  `stu_password` int DEFAULT NULL,
  `vote_history` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `voting_sys_voter_id`
--

INSERT INTO `voting_sys_voter_id` (`stu_email`, `stu_password`, `vote_history`) VALUES
('std1@gmail.com', 123, 1),
('std2@gmail.com', 123, 0),
('std3@gmail.com', 123, 0),
('std4@gmail.com', 123, 1),
('std5@gmail.com', 123, 0),
('std6@gmail.com', 123, 0),
('std7@gmail.com', 123, 1),
('std8@gmail.com', 123, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acroboard_comments`
--
ALTER TABLE `acroboard_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `acroboard_likes`
--
ALTER TABLE `acroboard_likes`
  ADD PRIMARY KEY (`number`);

--
-- Indexes for table `acroboard_notice`
--
ALTER TABLE `acroboard_notice`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `acroboard_saved`
--
ALTER TABLE `acroboard_saved`
  ADD PRIMARY KEY (`saved_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cew_words`
--
ALTER TABLE `cew_words`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purehealth_cart`
--
ALTER TABLE `purehealth_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purehealth_id`
--
ALTER TABLE `purehealth_id`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purehealth_orders`
--
ALTER TABLE `purehealth_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `purehealth_products`
--
ALTER TABLE `purehealth_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purehealth_registered_users`
--
ALTER TABLE `purehealth_registered_users`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_with_strangers_registration_user`
--
ALTER TABLE `travel_with_strangers_registration_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_with_strangers_userposts`
--
ALTER TABLE `travel_with_strangers_userposts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tws_grp`
--
ALTER TABLE `tws_grp`
  ADD PRIMARY KEY (`grp_id`),
  ADD KEY `fk_group_members` (`group_members`),
  ADD KEY `fk_message_Id` (`message_Id`);

--
-- Indexes for table `tws_grp_members`
--
ALTER TABLE `tws_grp_members`
  ADD PRIMARY KEY (`group_member_id`),
  ADD KEY `groupId` (`group_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `tws_grp_message`
--
ALTER TABLE `tws_grp_message`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `stu_email_Id` (`user_email`);

--
-- Indexes for table ` voting_sys_political_parties`
--
ALTER TABLE ` voting_sys_political_parties`
  ADD PRIMARY KEY (`party_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acroboard_comments`
--
ALTER TABLE `acroboard_comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `acroboard_likes`
--
ALTER TABLE `acroboard_likes`
  MODIFY `number` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `acroboard_notice`
--
ALTER TABLE `acroboard_notice`
  MODIFY `notice_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `acroboard_saved`
--
ALTER TABLE `acroboard_saved`
  MODIFY `saved_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cew_words`
--
ALTER TABLE `cew_words`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purehealth_cart`
--
ALTER TABLE `purehealth_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `purehealth_id`
--
ALTER TABLE `purehealth_id`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purehealth_products`
--
ALTER TABLE `purehealth_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travel_with_strangers_registration_user`
--
ALTER TABLE `travel_with_strangers_registration_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `travel_with_strangers_userposts`
--
ALTER TABLE `travel_with_strangers_userposts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tws_grp`
--
ALTER TABLE `tws_grp`
  MODIFY `grp_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tws_grp_members`
--
ALTER TABLE `tws_grp_members`
  MODIFY `group_member_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tws_grp_message`
--
ALTER TABLE `tws_grp_message`
  MODIFY `chat_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tws_grp`
--
ALTER TABLE `tws_grp`
  ADD CONSTRAINT `fk_group_members` FOREIGN KEY (`group_members`) REFERENCES `tws_grp_members` (`group_member_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_message_Id` FOREIGN KEY (`message_Id`) REFERENCES `tws_grp_message` (`chat_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tws_grp_members`
--
ALTER TABLE `tws_grp_members`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `travel_with_strangers_registration_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
