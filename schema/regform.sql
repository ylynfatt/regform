/* SQL File for Regform Code Igniter tutorial */

CREATE DATABASE `regform`;
USE `regform`;

CREATE TABLE `participants` (
`id` INT( 3 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`fname` VARCHAR( 255 ) NOT NULL ,
`email` VARCHAR( 255 ) NOT NULL ,
`comments` TEXT NOT NULL ,
`seminar_1` VARCHAR( 255 ) NOT NULL ,
`seminar_2` VARCHAR( 255 ) NOT NULL ,
`seminar_3` VARCHAR( 255 ) NOT NULL ,
`seminar_4` VARCHAR( 255 ) NOT NULL
) ENGINE = innodb;