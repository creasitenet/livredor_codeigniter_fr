-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 25 Septembre 2015 à 16:14
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `livredor_codeigniter`
--

-- --------------------------------------------------------

--
-- Structure de la table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `livredors`
--

CREATE TABLE IF NOT EXISTS `livredors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `pseudo` varchar(52) NOT NULL,
  `text` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Contenu de la table `livredors`
--

INSERT INTO `livredors` (`id`, `user_id`, `pseudo`, `text`, `status`, `date`, `created`, `modified`) VALUES
(147, 1, 'Edouard', 'Test', 1, '2015-04-20 18:21:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 1, 'Edouard', 'Re test', 1, '2015-09-25 16:00:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 1, 'Edouard', 're re test', 1, '2015-09-25 16:01:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 1, 'Edouard', 're re test', 1, '2015-09-25 16:02:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created`, `modified`) VALUES
(1, 'creasitenet', '$2y$10$41fWfo/zA9aaG201yuobL.WTtntMUiLgpfNFdhs8ijh0AE/883ELK', 'creasitenet.com@gmail.com', 100, '0000-00-00 00:00:00', '2014-10-06 15:38:02'),
(2, 'demo', '$2y$10$NFd3oAbwP.3rteRYMCQyoOT48wEDRbxvriV/szNnMYbYle4xLsDSq', 'demo@demo.com', 1, '2014-10-04 18:17:32', '2014-10-06 17:33:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
