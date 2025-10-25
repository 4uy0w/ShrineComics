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
	comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_comic_writer FOREIGN KEY (comic_writer) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	comic_chapter INT NULL,
	comic_price INT NULL UNIQUE,
	comic_banner VARCHAR(512),
	comic_genra VARCHAR(512),
	comic_comment TEXT
);
CREATE TABLE IF NOT EXISTS rent_comic(
	rent_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	rent_user_id INT NOT NULL, CONSTRAINT fk_rent_user_id FOREIGN KEY (rent_user_id) REFERENCES users(user_id) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_id INT NOT NULL, CONSTRAINT fk_rent_comic_id FOREIGN KEY (rent_comic_id) REFERENCES comic(comic_id) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_username VARCHAR(512), CONSTRAINT fk_rent_username FOREIGN KEY (rent_username) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_name VARCHAR(512), CONSTRAINT fk_rent_comic_name FOREIGN KEY (rent_comic_name) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE RESTRICT,
	rent_comic_price INT NULL, CONSTRAINT fk_rent_comic_price FOREIGN KEY (rent_comic_price) REFERENCES comic(comic_price) ON UPDATE CASCADE ON DELETE RESTRICT
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
CREATE TABLE IF NOT EXISTS list_comic(
	list_comic_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	list_comic_chapter INT NOT NULL,
	list_comic_name VARCHAR(512) NOT NULL,
	list_comic_identifier VARCHAR(512) NOT NULL, CONSTRAINT fk_list_comic_identifier FOREIGN KEY (list_comic_identifier) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE RESTRICT,
	list_comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_list_comic_writer FOREIGN KEY (list_comic_writer) REFERENCES comic(comic_writer) ON UPDATE CASCADE ON DELETE RESTRICT,
	list_comic_image VARCHAR(512) NULL,
	list_comic_release_date DATE
);
CREATE TABLE IF NOT EXISTS comment(
	comment_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	comment_sender_name VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_sender_name FOREIGN KEY (comment_sender_name) REFERENCES users(username) ON UPDATE CASCADE ON DELETE RESTRICT,
	comment_sender_email VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_sender_email FOREIGN KEY (comment_sender_email) REFERENCES users(email) ON UPDATE CASCADE ON DELETE RESTRICT,
	comment_sender_text TEXT,
	comment_comic_name VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_name FOREIGN KEY (comment_comic_name) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE RESTRICT,
	comment_comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_writer FOREIGN KEY (comment_comic_writer) REFERENCES comic(comic_writer) ON UPDATE CASCADE ON DELETE RESTRICT,
	comment_comic_dest VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_dest FOREIGN KEY (comment_comic_dest) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE RESTRICT
);