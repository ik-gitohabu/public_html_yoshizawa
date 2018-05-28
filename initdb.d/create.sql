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