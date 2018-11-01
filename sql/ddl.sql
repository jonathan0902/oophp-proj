--
-- Create tables for cslim.
-- By Jonathan Hellberg.
-- 2018-10-22
--

USE cslim;

DROP TABLE IF EXISTS brand;

CREATE TABLE brand
(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64),
    PRIMARY KEY (id)
);

DROP TABLE IF EXISTS eshop;

CREATE TABLE eshop
(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(64),
    price float(8),
    brand VARCHAR(64),
    discount float(5),
    picture VARCHAR(64),
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS users;

CREATE TABLE users
(
	username varchar(64),
    password varchar(64)
);

DROP TABLE IF EXISTS blogg;

CREATE TABLE blogg
(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    title VARCHAR(64),
    subtitle VARCHAR(64),
    Alltext text,
    datum date,
    picture VARCHAR(64),
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS testdata;

CREATE TABLE testdata
(
	id MEDIUMINT NOT NULL AUTO_INCREMENT,
    title VARCHAR(64),
    PRIMARY KEY(id)
);