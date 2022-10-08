CREATE TABLE `user` (
  id bigint NOT NULL AUTO_INCREMENT,
  fName varchar(30) DEFAULT NULL, 
  lName varchar(30) DEFAULT NULL,
  userName varchar(20) NOT NULL,
  passwordHash varchar(32) NOT NULL,
  email varchar(50) DEFAULT NULL,
  schoolName varchar(50) DEFAULT NULL,
  address varchar(50) DEFAULT NULL,
  createdBy DATETIME NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE inventory (
  id bigint NOT NULL AUTO_INCREMENT,
  sellerId bigint NOT NULL,
  title varchar(75) NOT NULL,
  author varchar(60) NOT NULL,
  isbn bigint NOT NULL,
  price float NOT NULL DEFAULT '0',
  sold bool DEFAULT FALSE,
  createdBy DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (sellerId) REFERENCES `user`(id)
);

CREATE TABLE cart (
id bigint NOT NULL AUTO_INCREMENT,
buyerId bigint NOT NULL,
totalPrice float,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (buyerId) REFERENCES `user`(id)
);

CREATE TABLE cart_item (
id bigint NOT NULL AUTO_INCREMENT,
itemId bigint NOT NULL,
cartId bigint NOT NULL,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (cartId) REFERENCES cart(id),
FOREIGN KEY (itemId) REFERENCES inventory(id)
);

CREATE TABLE transactions (
id bigint NOT NULL AUTO_INCREMENT,
buyerId bigint NOT NULL,
cartId bigint NOT NULL,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (buyerId) REFERENCES `user`(id),
FOREIGN KEY (cartId) REFERENCES cart (id)

);
