-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 29 mars 2025 à 23:14
-- Version du serveur : 9.0.1
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cakify`
--
CREATE DATABASE IF NOT EXISTS `cakify` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `cakify`;

-- --------------------------------------------------------

--
-- Structure de la table `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `title` char(100) NOT NULL,
  `releaseDate` date NOT NULL,
  `cover` varchar(255) NOT NULL,
  `artist_id` int NOT NULL,
  `spotifyLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `albums`
--

INSERT INTO `albums` (`id`, `created`, `modified`, `title`, `releaseDate`, `cover`, `artist_id`, `spotifyLink`) VALUES
(1, '2025-03-25 08:51:37', '2025-03-25 08:51:37', 'The Resistance', '2009-09-14', 'https://static.fnac-static.com/multimedia/Images/FR/NR/b9/00/2a/2752697/1540-1/tsp20141218151226/The-Resistance.jpg', 3, 'https://open.spotify.com/intl-fr/album/0eFHYz8NmK75zSplL5qlfM?si=TxxTWDlMRhCDAJVlzHZY3w'),
(2, '2025-03-25 10:43:15', '2025-03-25 10:43:15', 'The Joshua Tree', '1987-03-09', 'https://is4-ssl.mzstatic.com/image/thumb/Music125/v4/1a/ba/3e/1aba3e49-70e9-7443-4c00-32364a9205b7/17UMGIM81723.rgb.jpg/1200x1200bf-60.jpg', 4, 'https://open.spotify.com/intl-fr/album/5y6wlw1LnqFnQFruMeiwGU?si=XhirIRZXQd6EXJP8Bvd5VQ'),
(4, '2025-03-29 15:21:32', '2025-03-29 15:21:57', 'The 2nd Law', '2012-09-28', 'https://th.bing.com/th/id/OIP.VxyW6k5BJZCXy8J5Wmil4gHaHa?rs=1&pid=ImgDetMain', 3, 'https://open.spotify.com/intl-fr/track/4nr4gSTFGmTTSbumSY3kfH?si=25b1f9e602da4b16'),
(5, '2025-03-29 22:49:13', '2025-03-29 22:49:13', '13', '2017-09-08', 'https://th.bing.com/th/id/OIP.fINhlh_PQE4MfA69bmV1yAHaHS?rs=1&pid=ImgDetMain', 6, 'https://open.spotify.com/intl-fr/album/5NFN9HK3cvDaYnEtmHUVbo?si=UqiLVGhLTced4A-GjhC78Q'),
(6, '2025-03-29 22:52:34', '2025-03-29 22:52:34', 'Comeblack', '1992-03-17', 'https://www.rafabasa.com/wp-content/uploads/imagenes/web/the_scorpions/portadas/still_loving_you_single2011.jpg', 7, 'https://open.spotify.com/intl-fr/album/4vQ96yyyYbaeTQujH3iTtd?si=KBIg8vCCTT-7Xi642bp89A'),
(7, '2025-03-29 22:55:05', '2025-03-29 22:55:25', 'Ghost Stories', '2014-05-05', 'https://th.bing.com/th/id/OSK.8998332be73861ceac30555b0c18c308?w=102&h=102&c=7&r=0&o=6&pid=SANGAM', 8, 'https://open.spotify.com/intl-fr/album/2G4AUqfwxcV1UdQjm2ouYr?si=w6tbKYaZQpe85xLYjCP3qw'),
(8, '2025-03-29 23:00:11', '2025-03-29 23:00:11', 'A Night at the Opera', '1975-11-21', 'https://images.genius.com/d8ebe7cc5aa67c9801c4aeab600abea5.953x953x1.jpg', 9, 'https://open.spotify.com/intl-fr/album/1GbtB4zTqAsyfZEsm1RZfx?si=1X1y1z_1R-yEsiDQ8mdTJQ');

-- --------------------------------------------------------

--
-- Structure de la table `artists`
--

DROP TABLE IF EXISTS `artists`;
CREATE TABLE IF NOT EXISTS `artists` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `biography` text NOT NULL,
  `spotifyLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `artists`
--

INSERT INTO `artists` (`id`, `created`, `modified`, `name`, `biography`, `spotifyLink`) VALUES
(3, '2025-03-25 08:45:49', '2025-03-25 08:45:49', 'Muse', 'Muse est un groupe de rock britannique originaire de Teignmouth, dans le Devon, en Angleterre. Formé en 1994, le trio est composé de Matthew Bellamy (chant, guitare, piano), Christopher Wolstenholme (basse, harmonica, chant, chœurs) et Dominic Howard (batterie, percussions).', 'https://open.spotify.com/intl-fr/artist/12Chz98pHFMPJEknJQMWvI?si=IdzzAWVaR8eIqb-VRMxTsg'),
(4, '2025-03-25 10:41:40', '2025-03-25 10:41:40', 'U2', 'U2 est un groupe de rock irlandais originaire de Dublin, formé en 1976.\r\nIl est composé de Bono au chant et occasionnellement à la guitare ; The Edge à la guitare, au piano et au chant ; Adam Clayton à la basse ; et Larry Mullen Jr. à la batterie.', 'https://open.spotify.com/intl-fr/artist/51Blml2LZPmy7TTiAg47vQ?si=p_mnuY9fS1-SKBtzzp49Gg'),
(6, '2025-03-29 22:42:12', '2025-03-29 22:42:12', 'Indochine', 'Indochine est un groupe de pop rock français originaire de Paris formé par Nicola Sirkis et Dominique Nicolas en 1981 et issu du courant synthpop, new wave.', 'https://open.spotify.com/intl-fr/artist/7knmbOGe07k85GmK50vACB?si=iqsQ6ZPBRFW-Va5XSWrj1w'),
(7, '2025-03-29 22:43:52', '2025-03-29 22:43:52', 'Scorpion', 'Scorpions est un groupe allemand de hard rock, originaire de Hanovre. Son premier album voit le jour en 1972.', 'https://open.spotify.com/intl-fr/artist/27T030eWyCQRmDyuvr1kxY?si=TWZrRElcSTm8zDeQwyclYw'),
(8, '2025-03-29 22:44:34', '2025-03-29 22:44:34', 'Coldplay', 'Coldplay est un groupe pop rock britannique originaire de Londres en Angleterre, formé en 1996.', 'https://open.spotify.com/intl-fr/artist/4gzpq5DPGxSnKTe4SA8HAU?si=T3_zCCVnRXufmbiBdFd6gQ'),
(9, '2025-03-29 22:47:01', '2025-03-29 22:47:01', 'Queen', 'Queen [kwiːn][3] Écouter est un groupe de rock britannique, originaire de Londres, en Angleterre. Il est formé en 1970 par Freddie Mercury, Brian May et Roger Taylor, ces deux derniers étant issus du groupe Smile. L’année suivante, le bassiste John Deacon vient compléter la formation. Les quatre membres de Queen sont tous des auteurs-compositeurs, chacun apportant une touche unique à l\'identité musicale du groupe.', 'https://open.spotify.com/intl-fr/artist/1dfeR4HaWDbWqFHLkxsg1d?si=7nOrXWHvSFym766cQgiu0Q');

-- --------------------------------------------------------

--
-- Structure de la table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int NOT NULL,
  `album_id` int NOT NULL,
  `artist_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favorites`
--

INSERT INTO `favorites` (`id`, `created`, `modified`, `user_id`, `album_id`, `artist_id`) VALUES
(2, '2025-03-29 13:50:43', '2025-03-29 23:11:46', 8, 1, 3),
(3, '2025-03-29 13:50:50', '2025-03-29 13:50:50', 7, 2, 4),
(5, '2025-03-29 14:19:50', '2025-03-29 14:19:50', 8, 1, 3),
(10, '2025-03-29 22:40:17', '2025-03-29 22:40:22', 8, 4, 3),
(11, '2025-03-29 23:06:46', '2025-03-29 23:06:46', 8, 5, 6),
(12, '2025-03-29 23:07:05', '2025-03-29 23:07:05', 8, 7, 8),
(13, '2025-03-29 23:07:21', '2025-03-29 23:07:36', 7, 8, 9),
(14, '2025-03-29 23:08:26', '2025-03-29 23:08:34', 7, 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `follows`
--

DROP TABLE IF EXISTS `follows`;
CREATE TABLE IF NOT EXISTS `follows` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int NOT NULL,
  `album_id` int NOT NULL,
  `artist_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `follows`
--

INSERT INTO `follows` (`id`, `created`, `modified`, `user_id`, `album_id`, `artist_id`) VALUES
(1, '2025-03-29 14:58:33', '2025-03-29 14:58:33', 8, 1, 3),
(2, '2025-03-29 14:58:46', '2025-03-29 14:58:46', 7, 2, 4),
(3, '2025-03-29 23:08:04', '2025-03-29 23:08:04', 7, 4, 3),
(4, '2025-03-29 23:08:11', '2025-03-29 23:08:11', 7, 6, 7),
(5, '2025-03-29 23:08:18', '2025-03-29 23:08:18', 7, 7, 8);

-- --------------------------------------------------------

--
-- Structure de la table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20250324133927, 'CreateUsers', '2025-03-24 13:48:28', '2025-03-24 13:48:28', 0),
(20250324134022, 'CreateAlbums', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134045, 'CreateRoles', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134129, 'CreateArtists', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134153, 'CreateTracks', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134208, 'CreateFavorites', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134234, 'CreateRequests', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250324134247, 'CreateStatistics', '2025-03-24 13:50:14', '2025-03-24 13:50:14', 0),
(20250325084311, 'CreateAlbums', '2025-03-25 08:43:55', '2025-03-25 08:43:55', 0),
(20250329125341, 'CreateFavorites', '2025-03-29 12:55:05', '2025-03-29 12:55:06', 0),
(20250329144724, 'CreateFollows', '2025-03-29 14:49:14', '2025-03-29 14:49:14', 0);

-- --------------------------------------------------------

--
-- Structure de la table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int NOT NULL,
  `request_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `requests`
--

INSERT INTO `requests` (`id`, `created`, `modified`, `user_id`, `request_type`, `name`, `details`, `status`) VALUES
(1, '2025-03-25 08:30:15', '2025-03-25 08:30:15', 1, 'Ajout du nom de l\'artiste sur les albums', 'Pseudo', 'Pourriez-vous ajouter le nom de l\'artiste dans les détails des albums ?', 'En cours'),
(2, '2025-03-29 12:13:32', '2025-03-29 12:14:27', 1, 'new_artist', 'Add Indochine', 'Can you add Indochine to the artists list please ?', 'in_progress'),
(3, '2025-03-29 14:42:53', '2025-03-29 14:43:19', 8, 'edit_artist', 'Update Muse Description', 'Can you update the description of the artist \"Muse\" because I disagree with the creation date of the group ?', 'canceled_refused');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `name` char(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `created`, `modified`, `name`) VALUES
(1, '2025-03-25 08:21:32', '2025-03-25 08:21:32', 'Administrateur'),
(2, '2025-03-25 08:21:32', '2025-03-25 08:21:32', 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `tracks`
--

DROP TABLE IF EXISTS `tracks`;
CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `title` char(100) NOT NULL,
  `album_id` int NOT NULL,
  `durationTime` time NOT NULL,
  `spotifyLink` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tracks`
--

INSERT INTO `tracks` (`id`, `created`, `modified`, `title`, `album_id`, `durationTime`, `spotifyLink`) VALUES
(5, '2025-03-25 08:59:27', '2025-03-25 08:59:27', 'Uprising', 1, '00:05:04', 'https://open.spotify.com/intl-fr/track/4VqPOruhp5EdPBeR92t6lQ?si=a9e0f9f7c6fc4bb0'),
(6, '2025-03-25 08:59:55', '2025-03-25 08:59:55', 'Resistance', 1, '00:05:46', 'https://open.spotify.com/intl-fr/track/1C2QJNTmsTxCDBuIgai8QV?si=6a9b53ca5cfe4c2c'),
(7, '2025-03-25 09:07:59', '2025-03-25 09:07:59', 'Undisclosed Desires', 1, '00:03:55', 'https://open.spotify.com/intl-fr/track/0It6VJoMAare1zdV2wxqZq?si=78e207c221c64d2e'),
(8, '2025-03-25 09:13:28', '2025-03-25 09:13:28', 'United States of Eurasia', 1, '00:05:47', 'https://open.spotify.com/intl-fr/track/0tHbQRjL5phd8OoYl2Bdnd?si=82afbd017fdd4a4a'),
(9, '2025-03-25 09:19:02', '2025-03-25 09:19:02', 'Guiding Light', 1, '00:04:13', 'https://open.spotify.com/intl-fr/track/7jZ5A8bf63qYaUXfuGoxVk?si=7fdcfb4f7dd24fae'),
(10, '2025-03-25 10:44:06', '2025-03-25 10:44:06', 'With or Without You', 2, '00:04:55', 'https://open.spotify.com/intl-fr/track/6ADSaE87h8Y3lccZlBJdXH?si=74e5606c7ce84557'),
(12, '2025-03-29 15:22:34', '2025-03-29 15:22:34', 'Follow me', 1, '00:03:50', 'https://open.spotify.com/intl-fr/track/6r9tjMWLv8fNdZKKTnqCEr?si=19dae78a917b4665'),
(13, '2025-03-29 15:23:33', '2025-03-29 15:23:33', 'Madness', 4, '00:04:41', 'https://open.spotify.com/intl-fr/track/0c4IEciLCDdXEhhKxj4ThA?si=a23ae885e92b44ac'),
(14, '2025-03-29 23:01:40', '2025-03-29 23:01:40', 'Un été français', 5, '00:05:26', 'https://open.spotify.com/intl-fr/track/4Ngeca4zs304bDnDh3pjzI?si=015b0ef199524e07'),
(15, '2025-03-29 23:02:35', '2025-03-29 23:02:35', 'Still Loving You', 6, '00:06:43', 'https://open.spotify.com/intl-fr/track/0RdUX4WE0fO30VnlUbDVL6?si=cee32de3573541ad'),
(16, '2025-03-29 23:03:18', '2025-03-29 23:03:18', 'A sky full of stars', 7, '00:04:27', 'https://open.spotify.com/intl-fr/track/0FDzzruyVECATHXKHFs9eJ?si=2fd6066b0a174c93'),
(17, '2025-03-29 23:04:16', '2025-03-29 23:04:16', 'Bohemian Rhapsody', 8, '00:05:54', 'https://open.spotify.com/intl-fr/track/4u7EnebtmKWzUH433cf5Qv?si=4ed82d98db864bd6');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `username` char(35) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `username`, `email`, `password`, `role_id`) VALUES
(1, '2025-03-24 14:21:39', '2025-03-24 14:21:39', 'Pseudo', 'pseudo@gmail.com', '$2y$10$WKnndHdU43VRfSGkehABau.nXF8frzj0/aq0nnIA3cdGDQxZ7Aam.', 1),
(6, '2025-03-27 13:38:55', '2025-03-27 13:38:55', 'admin', 'admin@admin.com', '$2y$10$dDNwhr8b.1BvwF2XZO.LqedkB5hWrB/ukn2S.jKRC3teBwoMfogyy', 1),
(7, '2025-03-29 10:37:57', '2025-03-29 10:37:57', 'temp', 'temp@termp.com', '$2y$10$2XDrK9kM/orUdwNRoSpXheJIiQVh43F9AP207K1lNT/wmnop0MJDm', 2),
(8, '2025-03-29 13:53:50', '2025-03-29 13:53:50', 'a', 'a@gmail.com', '$2y$10$7.AGUTxUhPE19DkBo6ak1OEzPYLadrsr7sRlNTO6jjQPU5ZQDGuKK', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
