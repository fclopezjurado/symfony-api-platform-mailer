CREATE DATABASE IF NOT EXISTS symfony_mailer_db_test;
CREATE USER IF NOT EXISTS 'root' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON symfony_mailer_db_test.* TO 'root' IDENTIFIED BY 'root';