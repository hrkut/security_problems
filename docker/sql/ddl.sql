SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `likes`;
CREATE TABLE `likes`
(
    `id`      int(11)      NOT NULL AUTO_INCREMENT,
    `who`     varchar(100) NOT NULL,
    `post_id` int(11)      NOT NULL,
    PRIMARY KEY (`id`),
    KEY `post_id` (`post_id`),
    CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

INSERT INTO `likes` (`id`, `who`, `post_id`)
VALUES (14, 'admin', 3);

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`
(
    `id`    int(11)      NOT NULL AUTO_INCREMENT,
    `title` varchar(100) NOT NULL,
    `text`  text         NOT NULL,
    `img`   varchar(100) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb3;

INSERT INTO `posts` (`id`, `title`, `text`, `img`)
VALUES (3, 'Príspevok 1', 'Obsah príspevku', NULL),
       (5, 'Príspevok 2', 'Text príspevku 2', NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT,
    `login`    varchar(50)  NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `login` (`login`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

INSERT INTO `users` (`id`, `login`, `password`)
VALUES (1, 'Peter', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS'),
       (2, 'Jano', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS'),
       (3, 'Mišo', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS'),
       (4, 'Jožo', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS'),
       (5, 'Milan', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS'),
       (6, 'Fero', '$2y$10$rDBF.ZJGoC1a7DuwkUQjquneguu6zniGcXPQaYnv5UByGoJle4QQS');