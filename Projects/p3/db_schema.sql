CREATE TABLE images (
	imgID int(10) NOT NULL auto_increment,
	URL varchar(100) NOT NULL,
	title varchar(80),
	author varchar(80),
	caption varchar(1000),
	likes int(10),
	fstop varchar(10),
	shutter varchar(10),
	ISO int(10),
	focal int(5),
	camera varchar(80),
	lens varchar(80),
	dupload timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (imgID)
);
CREATE TABLE albums (
	albumID int(10) NOT NULL auto_increment,
	title varchar(80),
	PRIMARY KEY (albumID)
);
CREATE TABLE users (
	userID int(10) NOT NULL auto_increment,
	username varchar(80),
	password varchar(80),
	PRIMARY KEY (userID)
);
CREATE TABLE tags (
	tagID int(10) NOT NULL auto_increment,
	tag varchar(80),
	PRIMARY KEY (tagID)
);
CREATE TABLE uploads (
	imgID int(10) NOT NULL,
	userID int(10) NOT NULL,
	PRIMARY KEY (imgID, userID)
);
CREATE TABLE groups (
	imgID int(10) NOT NULL,
	albumID int(10) NOT NULL,
	PRIMARY KEY (imgID, albumID)
);
CREATE TABLE tagged (
	imgID int(10) NOT NULL,
	tagID int(10) NOT NULL,
	PRIMARY KEY (imgID, tagID)
);