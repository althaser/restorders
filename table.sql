USE restordersdb;

CREATE TABLE IF NOT EXISTS users (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username) );

INSERT INTO users (username, password)
  VALUES ('luis', 'teste');


CREATE TABLE IF NOT EXISTS products (
  id int NOT NULL AUTO_INCREMENT,
  productname varchar(30) NOT NULL,
  price float,
  PRIMARY KEY (id));

INSERT INTO products (productname, price)
  VALUES ('coke', '1.50');

