-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 17 Novembre 2015 à 04:39
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `app`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `login` varchar(40) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`, `login`, `date`) VALUES
(5, 'Huawei propose des batteries qui se chargent à 50 % en 5 minutes', '<p>test apache&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'admin', '2015-11-16'),
(6, 'Le Gouvernement Américain confirme la fuite de données de plus de 100 millions de clients bancaires', 'samÃ¹kdklsqdsq', 'admin', '2015-11-16'),
(7, 'Bonnes raisons pour manger une pomme tous les jours', 'Salut merci&nbsp;', 'admin', '2015-11-16'),
(8, 'Master SIR2 ', 'zaezeazeza', 'admin', '2015-11-16'),
(9, 'Notre Groupe :', '<p>test file 2</p><p><br></p><p><br></p><p><br></p>', 'admin', '2015-11-16'),
(10, 'Akram - Yassir - Mariam - Loubna', '<p>Hi ppeace and love&nbsp;&nbsp;&nbsp;&nbsp;</p>', 'admin', '2015-11-16'),
(11, 'test to uplod a php file', '', 'admin', '2015-11-16'),
(13, 'Test Jquery', '', 'admin', '2015-11-17'),
(14, 'Dernier test ', 'dqsdqdq', 'admin', '2015-11-17'),
(15, 'After Testing Brute Forcing', '<p>echo Hi this site is the better site to crack a md5 hash :</p><p>https://hashkiller.co.uk/md5-decrypter.aspx<br></p>', 'admin', '2015-11-17');

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `path`, `article_id`) VALUES
(1, '/Newspaper_management/admin/uploads/zzzz.png', 10),
(2, '/Newspaper_management/admin/uploads/index.php', 11);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'yassir', 'f2c5963a961d74f02551b02acee4f2d7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
