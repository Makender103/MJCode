CREATE database SCINNOB
use SCINNOB

CREATE TABLE scinnob_Contact (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,  
  name VARCHAR(50) NOT NULL, 
  email VARCHAR(50) NOT NULL, 
  message TEXT, 
  service ENUM('W','M','B'),
  clock date
  
);

CREATE TABLE add_adm(
	id INTEGER AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL, 
	email VARCHAR(50) NOT NULL, 
  	username VARCHAR(30) NOT NULL,
  	password  VARCHAR(255) NOT NULL
)

INSERT INTO add_adm (name, email, username, password) VALUES ('mjtec', 'mjtec@mjtec.com', 'mjtec2019', 'mjtec')





