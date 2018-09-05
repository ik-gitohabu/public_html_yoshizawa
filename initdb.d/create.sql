CREATE TABLE mst_staff (
  code INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(15),
  password VARCHAR(32),
  PRIMARY KEY (code)
);

INSERT INTO mst_staff (code, name, password)
VALUE (1, 'admin', MD5('pass'));

CREATE TABLE mst_product (
  code INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(30),
  price INT,
  gazou VARCHAR(30),
  PRIMARY KEY (code)
);

CREATE TABLE dat_sales (
  code INT NOT NULL AUTO_INCREMENT,
  date TIMESTAMP,
  code_member INT,
  name VARCHAR(15),
  email VARCHAR(50),
  postal1 VARCHAR(3),
  postal2 VARCHAR(4),
  address VARCHAR(50),
  tel VARCHAR(13),
  PRIMARY KEY (code)
);

CREATE TABLE dat_sales_product (
  code INT NOT NULL AUTO_INCREMENT,
  code_sales INT,
  code_product INT,
  price INT,
  quantity INT,
  PRIMARY KEY (code)
);

CREATE TABLE dat_member (
  code INT NOT NULL AUTO_INCREMENT,
  date TIMESTAMP,
  password VARCHAR(32),
  name VARCHAR(15),
  email VARCHAR(50),
  postal1 VARCHAR(3),
  postal2 VARCHAR(4),
  address VARCHAR(50),
  tel VARCHAR(13),
  danjo INT,
  born INT,
  PRIMARY KEY (code)
);