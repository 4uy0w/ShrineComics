DROP DATABASE IF EXISTS ShrineComics;

CREATE DATABASE IF NOT EXISTS ShrineComics;

USE ShrineComics;

CREATE TABLE IF NOT EXISTS users(
	user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username VARCHAR(512) NOT NULL UNIQUE,
	password VARCHAR(512) NOT NULL,
	email VARCHAR(512) NOT NULL UNIQUE,
	address VARCHAR(512) NULL,
	photo_profile VARCHAR(512) NULL,
	telephone_number VARCHAR(512) NULL UNIQUE,
	point INT NULL,
	role ENUM('writer','reader'),
    status ENUM('LOGIN','LOGOUT','SUSPEND'),
	join_date DATE NULL
);
CREATE TABLE IF NOT EXISTS comic(
	comic_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	comic_title VARCHAR(512) NOT NULL UNIQUE,
	comic_page INT NULL,
	comic_price INT NULL UNIQUE,
	comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_comic_writer FOREIGN KEY comic(comic_writer) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	comic_genre VARCHAR(512),
	comic_release_date DATE,
	comic_comment TEXT,
	comic_image TEXT,
	comic_banner VARCHAR(512) NULL
);
CREATE TABLE IF NOT EXISTS rent_comic(
	rent_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	rent_user_id INT NOT NULL, CONSTRAINT fk_rent_user_id FOREIGN KEY (rent_user_id) REFERENCES users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_id INT NOT NULL, CONSTRAINT fk_rent_comic_id FOREIGN KEY (rent_comic_id) REFERENCES comic(comic_id) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_username VARCHAR(512), CONSTRAINT fk_rent_username FOREIGN KEY (rent_username) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_name VARCHAR(512), CONSTRAINT fk_rent_comic_name FOREIGN KEY (rent_comic_name) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_price INT, CONSTRAINT fk_rent_comic_price FOREIGN KEY (rent_comic_price) REFERENCES comic(comic_price) ON UPDATE CASCADE ON DELETE RESTRICT
);
CREATE TABLE IF NOT EXISTS feedback(
	feedback_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	feedback_email_sender VARCHAR(512) NOT NULL, CONSTRAINT fk_feedback_email_sender FOREIGN KEY (feedback_email_sender) REFERENCES users(email) ON UPDATE CASCADE ON DELETE RESTRICT,
	feedback_user_sender VARCHAR(512) NOT NULL, CONSTRAINT fk_feedback_user_sender FOREIGN KEY (feedback_user_sender) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	feedback_comment TEXT NULL
);
CREATE TABLE IF NOT EXISTS super_admin(
    super_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(512) NOT NULL UNIQUE,
    password VARCHAR(512) NOT NULL,
    email VARCHAR(512) NOT NULL UNIQUE,
    status ENUM('LOGIN','LOGOUT','SUSPEND')
);

