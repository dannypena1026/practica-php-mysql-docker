<?php
$mensaje = null;
$error = null;

try {
    $host = getenv('DB_HOST');
    $database = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');

    $pdo = new PDO(
        "mysql:host={$host};dbname={$database};charset=utf8mb4",
        $user,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    $consulta = $pdo->query('SELECT contenido FROM mensajes ORDER BY id LIMIT 1');
    $mensaje = $consulta->fetchColumn();
    if ($mensaje === false) {
        $error = 'La conexión funciona, pero no hay mensajes guardados.';
    }
} catch (PDOException $e) {
    $error = 'No se pudo conectar o leer la base de datos MySQL.';
    error_log($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola Mundo - PHP y MySQL</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 650px; margin: 90px auto; padding: 20px; }
        h1 { color: #184c86; }
        p { font-size: 18px; }
        .ok { color: #19723a; }
        .error { color: #b42318; }
    </style>
</head>
<body>
    <h1>Mi primera aplicación web con Docker Compose</h1>
    <?php if ($error === null): ?>
        <p><?= htmlspecialchars((string) $mensaje, ENT_QUOTES, 'UTF-8') ?></p>
        <p class="ok">Conexión con MySQL exitosa.</p>
    <?php else: ?>
        <p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
    <?php endif; ?>
</body>
</html>
