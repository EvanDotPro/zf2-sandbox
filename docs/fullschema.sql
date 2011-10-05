-- These schemas are actually provided in the respective modules.
-- This schema file is just for convenience.

CREATE TABLE user (
  user_id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  display_name VARCHAR(255) NOT NULL,
  password CHAR(128) NOT NULL,
  salt BINARY(16) NOT NULL,
  last_login DATETIME DEFAULT NULL,
  last_ip INTEGER DEFAULT NULL,
  register_time DATETIME NOT NULL,
  register_ip INTEGER NOT NULL,
  UNIQUE (email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE guestbook (
  id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL,
  comment TEXT NOT NULL,
  created DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
