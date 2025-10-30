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
	comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_comic_writer FOREIGN KEY (comic_writer) REFERENCES users(username) ON UPDATE CASCADE ON DELETE CASCADE,
	comic_chapter INT NULL,
	comic_banner VARCHAR(512),
	comic_genre VARCHAR(512),
	comic_comment TEXT
);
CREATE TABLE IF NOT EXISTS feedback(
	feedback_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	feedback_email_sender VARCHAR(512) NOT NULL, CONSTRAINT fk_feedback_email_sender FOREIGN KEY (feedback_email_sender) REFERENCES users(email) ON UPDATE CASCADE ON DELETE CASCADE,
	feedback_user_sender VARCHAR(512) NOT NULL, CONSTRAINT fk_feedback_user_sender FOREIGN KEY (feedback_user_sender) REFERENCES users(username) ON UPDATE CASCADE ON DELETE CASCADE,
	feedback_comment TEXT NULL
);
CREATE TABLE IF NOT EXISTS super_admin(
    super_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR(512) NOT NULL UNIQUE,
    password VARCHAR(512) NOT NULL,
    email VARCHAR(512) NOT NULL UNIQUE,
    status ENUM('LOGIN','LOGOUT','SUSPEND')
);
CREATE TABLE IF NOT EXISTS chapter(
	chapter_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	chapter_name VARCHAR(512) NOT NULL UNIQUE,
	chapter_comic VARCHAR(512) NOT NULL, CONSTRAINT fk_chapter_comic FOREIGN KEY (chapter_comic) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE CASCADE,
	chapter_page INT NULL,
	chapter_price INT NULL,
	chapter_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_chapter_writer FOREIGN KEY (chapter_writer) REFERENCES comic(comic_writer) ON UPDATE CASCADE ON DELETE CASCADE,
	chapter_release_date DATE NULL,
	chapter_number INT NULL,
	chapter_status ENUM("upload","pending")
);
CREATE TABLE IF NOT EXISTS chapter_page(
	chapter_page_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	chapter_page_number INT NULL,
	chapter_page_image VARCHAR(512) NULL,
	chapter_page_chapter VARCHAR(512) NOT NULL, CONSTRAINT fk_page_chapter_chapter FOREIGN KEY (chapter_page_chapter) REFERENCES chapter(chapter_name) ON UPDATE CASCADE ON DELETE CASCADE,
	chapter_page_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_page_chapter_writer FOREIGN KEY (chapter_page_writer) REFERENCES chapter(chapter_writer) ON UPDATE CASCADE ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS comment(
	comment_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	comment_sender_name VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_sender_name FOREIGN KEY (comment_sender_name) REFERENCES users(username) ON UPDATE CASCADE ON DELETE CASCADE,
	comment_sender_email VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_sender_email FOREIGN KEY (comment_sender_email) REFERENCES users(email) ON UPDATE CASCADE ON DELETE CASCADE,
	comment_sender_text TEXT,
	comment_comic_name VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_name FOREIGN KEY (comment_comic_name) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE CASCADE,
	comment_comic_writer VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_writer FOREIGN KEY (comment_comic_writer) REFERENCES comic(comic_writer) ON UPDATE CASCADE ON DELETE CASCADE,
	comment_comic_dest VARCHAR(512) NOT NULL, CONSTRAINT fk_comment_comic_dest FOREIGN KEY (comment_comic_dest) REFERENCES comic(comic_title) ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO users (username,password,email,address,telephone_number,point,role,status,join_date) VALUES ("admin","admin1234#","admin@admin.com","Jalan Ngawi Kulon no.20","123-456-678",0,"writer","LOGOUT",CURDATE());