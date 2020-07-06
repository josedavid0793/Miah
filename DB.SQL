CREATE DATABASE if NOT EXISTS miah_pasteleria;
USE miah_pasteleria;

CREATE TABLE productos(
id int(10) auto_increment NOT NULL PRIMARY KEY,
nombre varchar(50) NOT NULL,
descripcion varchar(300),
precio decimal(30.0),
cantidad int(10),
imagen text

)ENGINE=InnoDb;

CREATE TABLE mensaje_web(
nombres varchar(100) NOT NULL,
apellidos varchar(150),
telefono int (11) NOT NULL,
email varchar(200) NOT NULL,
mensaje text
)ENGINE=InnoDb;

CREATE TABLE clientes(
id_cliente int(10) auto_increment NOT NULL PRIMARY KEY,
nombres varchar(60) NOT NULL,
apellidos varchar(80),
no_identificacion int(10) NOT NULL,
email varchar(200)
)ENGINE=InnoDb;

CREATE TABLE ventas(
id int(11) auto_increment NOT NULL PRIMARY KEY,
claveTransaccion varchar(250),
paypalDatos text,
fecha datetime,
correo varchar(600),
total decimal(60.0),
status varchar(300)
)ENGINE=InnoDb;

CREATE TABLE detalleventa(
id int(11) auto_increment NOT NULL PRIMARY KEY,
idVenta int(11) NOT NULL,
idProducto int(11) NOT NULL,
precioUnitario decimal(30.0),
cantidad int(10),
descargado int(11)
)ENGINE=InnoDb;