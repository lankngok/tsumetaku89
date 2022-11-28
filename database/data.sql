CREATE DATABASE qlct ;
USE qlct ;
CREATE TABLE doi_bong (
id int PRIMARY KEY AUTO_INCREMENT ,
    name varchar(255),
    status tinyint DEFAULT 1
);
CREATE TABLE cau_thu(
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    price float,
    image text ,
    id_doi_bong int ,
    FOREIGN KEY (id_doi_bong) REFERENCES doi_bong (id)
);

INSERT INTO doi_bong (name , status) VALUES 
('C2110i1',1),
('C2110i2',0),
('C2110h1',0),
('C2110h2',1),
('C2110g',1);
