CREATE TABLE IF NOT EXISTS mensajes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    contenido VARCHAR(255) NOT NULL
);

INSERT INTO mensajes (contenido)
VALUES ('Hola Mundo desde MySQL');
