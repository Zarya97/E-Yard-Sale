CREATE TABLE `user` (
  id bigint NOT NULL AUTO_INCREMENT,
  fname varchar(30) DEFAULT NULL, 
  lname varchar(30) DEFAULT NULL,
  username varchar(20) NOT NULL,
  email varchar(50) DEFAULT NULL,
  passwordhash varchar(32) NOT NULL,
  schoolname varchar(50) DEFAULT NULL,
  address varchar(50) DEFAULT NULL,
  createdBy DATETIME NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE inventory (
  id bigint NOT NULL AUTO_INCREMENT,
  sellerid bigint NOT NULL,
  title varchar(75) NOT NULL,
  author varchar(60) NOT NULL,
  isbn bigint NOT NULL,
  price float NOT NULL DEFAULT '0',
  sold bool DEFAULT FALSE,
  createdBy DATETIME NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (sellerid) REFERENCES `user`(id)
);

CREATE TABLE cart (
id bigint NOT NULL AUTO_INCREMENT,
buyerid bigint NOT NULL,
totalPrice float,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (buyerid) REFERENCES `user`(id)
);

CREATE TABLE cart_item (
id bigint NOT NULL AUTO_INCREMENT,
itemid bigint NOT NULL,
cartid bigint NOT NULL,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (cartid) REFERENCES cart(id),
FOREIGN KEY (itemid) REFERENCES inventory(id)
);

CREATE TABLE transactions (
id bigint NOT NULL AUTO_INCREMENT,
buyerid bigint NOT NULL,
cartid bigint NOT NULL,
createdBy DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (buyerid) REFERENCES `user`(id),
FOREIGN KEY (cartid) REFERENCES cart (id)
);
