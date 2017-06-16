-- create database testdb
CREATE DATABASE IF NOT EXISTS `testdb` DEFAULT CHARACTER SET utf8mb4;
USE `testdb`;

-- create users table
CREATE TABLE `users`(
   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
   `username` VARCHAR(100),
   `firstname` VARCHAR(100),
   `lastname` VARCHAR(100),
   `password` VARCHAR(64), -- sha256 hash length is 64 chars
   `email` VARCHAR(255),
   `creation_time` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
   PRIMARY KEY(`id`)
) ENGINE InnoDB DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci;
