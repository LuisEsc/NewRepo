CREATE TABLE flower(
id INT(11) NOT NULL AUTO_INCREMENT,
name VARCHAR(60),
price DOUBLE(6,2),
description TEXT,
imagename VARCHAR(100),
imagetype VARCHAR(20),
category SMALLINT(3),
PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'categorias'(
'id' INT(11) NOT NULL AUTO_INCREMENT,
'clave' INT(11) NOT NULL,
'valor' VARCHAR(20) NOT NULL,
PRIMARY KEY(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE administrator(
id INT(11) NOT NULL AUTO_INCREMENT,
username VARCHAR(50) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(32) NOT NULL,	
PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE usuarios(
id int(11) NOT NULL AUTO_INCREMENT,
dni varchar(11),
nombre varchar(20),
apellidos varchar(100),
email VARCHAR(100) NOT NULL,
password VARCHAR(32) NOT NULL,
telefono int(9),
direccion varchar(120),
localidad varchar(30),
codpostal VARCHAR(6),
provincia varchar(20),
pais varchar(20),
primary key(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;