Create schema hilltoplove;
use hilltoplove;

CREATE TABLE users (
  Uid int(8) auto_increment,
  fname char(50),
  lname char(50),
  username char(50),
  email varchar(100),
  pass varchar(80),
  gender ENUM('m','f') not null,
  dob  date,
  class year,
  major char(80),
  phone varchar(15),
  twitter varchar(150),
  insta varchar(150),
  Primary Key (Uid)

);

CREATE TABLE Pictures (
  pic_id int(8) auto_increment,
  Uid int(80),
  pic_path blob,
  PRIMARY KEY (pic_id),
  FOREIGN KEY (Uid) REFERENCES Users(Uid)
);

CREATE TABLE User_interest (
  interest_id int(8) auto_increment,
  Uid int(8),
  Iid int(8),
  PRIMARY KEY (interest_id),
  FOREIGN KEY (Uid) REFERENCES Users(Uid)
);

CREATE TABLE Interest (
  int_id int(8) auto_increment,
  interest_name varchar(50),
  Uid int(8),
  PRIMARY KEY (int_id),
  FOREIGN KEY (Uid) REFERENCES Users(Uid)
);

CREATE TABLE user_likes (
  like_id int(8) auto_increment,
  Uid int(8),
  Iid int(8),
  like_dis ENUM('l','d') not null,
  PRIMARY KEY (like_id),
  FOREIGN KEY (Uid) REFERENCES Users(Uid)
);

CREATE TABLE user_match (
  match_id int(8) auto_increment,
  Uid int(8),
  Iid int(8),
  PRIMARY KEY (match_id),
  FOREIGN KEY (Uid) REFERENCES Users(Uid)
);

CREATE TABLE converstion (
  uMid int(8) auto_increment,
  message varchar(200),
  mess_time timestamp,
  PRIMARY KEY (uMid)
);