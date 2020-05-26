
CREATE DATABASE refaccionaria;
USE refaccionaria;

CREATE TABLE producto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(50)
);

CREATE TABLE factura(
    id_factura INT AUTO_INCREMENT PRIMARY KEY,
    fecha VARCHAR(10),
    hora VARCHAR(10),
    producto VARCHAR(30),
    descripcion VARCHAR(30),
    cantidad INT,
    precio INT,
    num_nota INT
);


INSERT INTO `factura`( `fecha`, `hora`, `producto`, `descripción`, `cantidad`, `precio`, `num_nota`) VALUES ("00/00/00","10:00:00","","",0,0,0);