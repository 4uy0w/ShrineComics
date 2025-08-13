CREATE DATABASE IF NOT EXISTS ShrineComics;

CREATE TABLE IF NOT EXISTS ShrineComics.user(
	user_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username VARCHAR(512) NOT NULL UNIQUE,
	password VARCHAR(512) NOT NULL,
	email VARCHAR(512) NOT NULL UNIQUE,
	address TEXT NULL,
	telephone VARCHAR(512) NULL,
	point INT NULL,
	role ENUM('writer','reader')
);
CREATE TABLE IF NOT EXISTS ShrineComics.comic(
	comic_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(512) NOT NULL UNIQUE,
	page INT NULL,
	point_price INT NULL UNIQUE,
	developer VARCHAR(512), FOREIGN KEY (developer) REFERENCES user(username),
	release_date DATE,
	comment TEXT
);
CREATE TABLE IF NOT EXISTS ShrineComics.rent_comic(
	rent_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL, FOREIGN KEY (user_id) REFERENCES user(user_id),
	comic_id INT NOT NULL, FOREIGN KEY (comic_id) REFERENCES comic(comic_id),
	rent_name VARCHAR(512) NOT NULL, FOREIGN KEY (rent_name) REFERENCES user(username),
	rent_comic VARCHAR(512) NOT NULL, FOREIGN KEY (rent_comic) REFERENCES comic(name),
	comic_price INT NOT NULL, FOREIGN KEY (comic_price) REFERENCES comic(point_price)
);
CREATE TABLE IF NOT EXISTS ShrineComics.feedback(
	feedback_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	email_sender VARCHAR(512) NOT NULL, FOREIGN KEY (email_sender) REFERENCES user(email),
	user_sender VARCHAR(512) NOT NULL, FOREIGN KEY (user_sender) REFERENCES user(username),
	feed_comment TEXT
);
