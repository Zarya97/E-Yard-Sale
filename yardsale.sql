CREATE DATABASE  IF NOT EXISTS `yardsale`;
USE `yardsale`;

CREATE TABLE `cart` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `buyerid` bigint NOT NULL,
  `totalPrice` float DEFAULT NULL,
  `createdBy` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `buyerid` (`buyerid`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`buyerid`) REFERENCES `user` (`id`)
);

CREATE TABLE `cart_item` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `itemid` bigint NOT NULL,
  `cartid` bigint NOT NULL,
  `createdBy` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cartid` (`cartid`),
  KEY `itemid` (`itemid`),
  CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cartid`) REFERENCES `cart` (`id`),
  CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`itemid`) REFERENCES `inventory` (`id`)
);

CREATE TABLE `employee` (
  `Fname` varchar(15) NOT NULL,
  `Minit` char(1) DEFAULT NULL,
  `Lname` varchar(15) NOT NULL,
  `Ssn` char(9) NOT NULL,
  `BDATE` date DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL,
  `Sex` char(1) DEFAULT NULL,
  `Salary` decimal(10,2) DEFAULT NULL,
  `Super_ssn` char(9) DEFAULT NULL,
  `Dno` int NOT NULL,
  PRIMARY KEY (`Ssn`),
  KEY `Super_ssn` (`Super_ssn`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Super_ssn`) REFERENCES `employee` (`Ssn`)
);

CREATE TABLE `inventory` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `sellerid` bigint NOT NULL,
  `title` varchar(75) NOT NULL,
  `author` varchar(60) NOT NULL,
  `isbn` bigint NOT NULL,
  `price` float NOT NULL,
  `createdBy` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sellerid` (`sellerid`),
  CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`sellerid`) REFERENCES `user` (`id`)
);

CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `buyer` bigint NOT NULL,
  `seller` bigint NOT NULL,
  `itemid` bigint NOT NULL,
  `price` float NOT NULL,
  `createdBy` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `price_idx` (`price`)
);

CREATE TABLE `user` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `passwordhash` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `schoolname` varchar(45) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `createdBy` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `balance` float DEFAULT '100',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `id_UNIQUE` (`id`)
);