CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `login` varchar(255) UNIQUE,
  `password` varchar(255)
);

CREATE TABLE `scores` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_levels` int,
  `id_user` int
);

CREATE TABLE `levels` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `type` int,
  `points` int,
  `shot` int
);

ALTER TABLE `scores` ADD FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

ALTER TABLE `scores` ADD FOREIGN KEY (`id_levels`) REFERENCES `levels` (`id`);
