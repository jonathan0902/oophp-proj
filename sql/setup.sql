--
-- Create database cslim.
-- By Jonathan Hellberg.
-- 2018-10-22
--

CREATE DATABASE IF NOT EXISTS cslim;

USE cslim;

SHOW DATABASES LIKE '%cslim%';

GRANT ALL ON cslim.* TO user@localhost IDENTIFIED BY 'pass';

SHOW GRANTS FOR user@localhost;