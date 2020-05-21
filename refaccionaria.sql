
CREATE DATABASE refaccionaria;
USE refaccionaria;

CREATE TABLE producto(
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(50)
);

CREATE TABLE factura(
    id_factura INT AUTO_INCREMENT PRIMARY KEY,
    fecha VARCHAR(10),
    hora VARCHAR(10)
);


CREATE TABLE productos_vendidos(
    id_vendidos INT AUTO_INCREMENT PRIMARY KEY,
    descripcion_p VARCHAR(100),
    cantidad_p INT,
    precio INT,
    id_factura1 int not null,
    id_producto1 int not null,

    FOREIGN KEY fk_id_factura(id_factura1)
    REFERENCES factura(id_factura),

    FOREIGN KEY fk_id_producto(id_producto1)
    REFERENCES producto(id)
);