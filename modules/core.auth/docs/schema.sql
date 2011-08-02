CREATE TABLE `auth_user` (
  `user_id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` CHAR(128) NOT NULL,
  `salt` BINARY(16) NOT NULL,
  `last_login` DATETIME DEFAULT NULL,
  `last_ip` INT(11) DEFAULT NULL,
  `register_time` DATETIME NOT NULL,
  `register_ip` INT(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
