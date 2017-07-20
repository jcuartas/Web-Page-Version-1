-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 19, 2016 at 08:40 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mycms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'World News'),
(2, 'Asia News 3'),
(3, 'Sports d'),
(4, 'Showbiz'),
(5, 'Politics'),
(9, 'Germany');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `comment_name` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_text` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `comment_name`, `comment_email`, `comment_text`, `status`) VALUES
(3, 2, 'JUAN MANUEL CUARTAS', 'juan.cuartas@gmail.com', 'Test', 'unapproved'),
(5, 4, 'JUAN MANUEL CUARTAS', 'juan.cuartas@gmail.com', 'Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. ', 'unapproved'),
(6, 4, 'JUAN MANUEL CUARTAS', 'juan.cuartas@gmail.com', 'Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. ', 'approved'),
(9, 8, 'JUAN MANUEL CUARTAS', 'juan.cuartas@gmail.com', 'AprÃºebame por favor', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_date` text NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_keywords` text NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_date`, `post_author`, `post_keywords`, `post_image`, `post_content`) VALUES
(1, 1, 'Test 1 Editado', '04-18-16', 'Juan M. Cuartas', '1 2 2324 con el negro sports obama', 'Ahogado.jpg', '<p>Hola, el test ha de salir <strong>s&uacute;per bueno. Probemos ya.</strong></p>'),
(2, 3, 'Barack Obama visits Saudi Arabia', '04-18-16', 'Juan M. Cuartas', 'Barack Obama Saudi Arabia', 'BedMiedo.gif', '<p>Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(3, 2, 'The Pope visits Saudi Arabia', '04-18-16', 'Juan M. Cuartas', 'kdsd dksldfkj bamon sselk', 'Ahogado.jpg', '<p>Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(4, 3, 'Obama is elected president', '04-18-16', 'Juan M. Cuartas', 'obama visits arabia', '941059_1564576130522022_6227736795097590025_n.jpg', '<p>Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(7, 1, 'Obama ha llegado a la presidencia', '04-18-16', 'Tom Cruise', 'poder tom cruise obama', 'Constancia.jpeg', '<p>Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(8, 3, ' poder', '04-18-16', 'Juan M. Cuartas', 'arabia ', 'IMAGEN-16453794-2.jpg', '<p>Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(9, 2, 'PelÃ©, el vendedor de humo.', '04-18-16', 'Diego A. Maradona', 'poder tom cruise obama maradona', 'CfKjMTaWEAEiGm7.jpg', '<p>Venda chontaduros maduros. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia. Obama visits Saudi Arabia.&nbsp;</p>'),
(10, 5, 'SeÃ±al en vivo de TelevisiÃ³n MÃ¡s Humana', '04-18-16', 'Juan M. Cuartas', 'seÃ±al, television, humana, contravia, hollman, morris', 'Humildad.jpg', '<p><iframe src="https://www.youtube.com/embed/8pg5oJnJNzI" width="560" height="315" frameborder="0" allowfullscreen=""></iframe></p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `name`) VALUES
(1, 'jcuartas', 'jcuartas', 'Juan M. Cuartas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_comments` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `fk_posts` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`cat_id`);
