CREATE DATABASE firebikes;
USE firebikes;
CREATE TABLE regis
(
userid BIGINT(20) not null,
password VARCHAR(50) not null,
nm VARCHAR(50) not null,
ph BIGINT(12) not null,
mail VARCHAR(80) PRIMARY KEY,
addl1 VARCHAR(100) not null,
addl2 VARCHAR(100) not null,
pin INT(6) not null,
scode INT(6) not null,
status VARCHAR(1) not null default 'U'
);
#Admin account(password:myadmin,username:admin)--
insert into regis values('1','15eed4d30e4e0fa9dd36f96237b1024c','Admin',8797654132,'admin','dummy','dummy',123456,123456,'A');
CREATE TABLE bikes
(
bkid BIGINT(10) PRIMARY KEY AUTO_INCREMENT,
bkname VARCHAR(50) not null,
bkdesc VARCHAR(2000) default 'No Description',
bkimg BLOB,
bkcity VARCHAR(500) not null default 'NA',
bkstatus VARCHAR(2) not null default 'A',
bkprc INT(6) not null
);
create table booking
(
bookno BIGINT(20) PRIMARY KEY AUTO_INCREMENT,
userid BIGINT(20) REFERENCES regis(userid),
bkid BIGINT(10) REFERENCES bikes(bkid),
dt DATE not null,
bookdt DATE not null,
days INT(4) not null,
bookcity VARCHAR(50) not null,
status VARCHAR(1) not null default 'U'	
);