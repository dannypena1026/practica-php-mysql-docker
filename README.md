# Práctica: aplicación web Hola Mundo con PHP, MySQL y Docker Compose

Aplicación de PHP que consulta un mensaje almacenado en una base de datos MySQL. Los dos servicios se ejecutan con Docker Compose.

## Estructura

```text
practica-php-mysql-docker/
├── src/
│   ├── Dockerfile
│   └── index.php
├── db/
│   └── init.sql
├── docker-compose.yml
├── .gitignore
└── README.md
```

## Ejecutar

En GitHub Codespaces (o en un entorno con Docker instalado), abre la terminal en la carpeta raíz del proyecto:

```bash
docker compose up -d --build
docker compose ps
```

Abre el puerto 8080 desde la pestaña **Ports** de Codespaces o navega a `http://localhost:8080` cuando ejecutes localmente.

La página debe mostrar:

- **Hola Mundo desde MySQL**
- **Conexión con MySQL exitosa.**

El texto **Hola Mundo desde MySQL** es obtenido de la base de datos usando PDO desde `src/index.php`.

## Verificar que los datos están en MySQL

```bash
docker compose exec mysql mysql -uappuser -papppass123 hola_mundo -e "SELECT * FROM mensajes;"
```

## Detener contenedores

```bash
docker compose down
```

Para borrar además los datos persistidos (recrea los datos de ejemplo al siguiente inicio):

```bash
docker compose down -v
```

**Nota de seguridad:** Las contraseñas aquí son solo de demostración académica, no aptas para producción.

## Entrega

Sube el código fuente a un repositorio público en GitHub y comparte la URL en el foro de la práctica.
