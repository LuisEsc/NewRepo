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

CREATE TABLE pedidos(
id_pedido INT(11) NOT NULL AUTO_INCREMENT,
id_cliente INT(11) NOT NULL,
timestamp TIMESTAMP NOT NULL,
precio_total DOUBLE(10,4) NOT NULL,
PRIMARY KEY(id_pedido),
FOREIGN KEY (id_cliente) REFERENCES usuarios(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE productos_pedido(
id_pedido INT(11) NOT NULL,
id_producto int(11),
nombre_producto varchar(60) not null,
precio_producto double(10,4) not null,
PRIMARY KEY(id_pedido,id_producto),
FOREIGN KEY (id_producto) REFERENCES flower(id),
FOREIGN KEY (id_pedido) REFERENCES pedidos(id_pedido)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE sliders(
id INT(11) NOT NULL AUTO_INCREMENT,
imagename VARCHAR(60),
imagetype VARCHAR(20),
binaryimg LONGBLOB,
header TEXT,
description VARCHAR(100),
PRIMARY KEY (id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;