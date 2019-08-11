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


CREATE TABLE adm_login(
	 id INTEGER AUTO_INCREMENT PRIMARY KEY, 
	username VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL

)


