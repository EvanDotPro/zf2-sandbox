CREATE TABLE `auth_user` (
  `user_id` INT(11) UNSIGNED NOT NULL,
  `gender` ENUM('Male','Female','Other') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
