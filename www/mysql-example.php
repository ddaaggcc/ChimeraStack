<?php
$host = 'chimera-mariadb'; // nombre de servicio en docker-compose
$db   = 'mydatabase';
$user = 'myuser';
$pass = 'mypassword';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión exitosa a MySQL!<br>";
    $stmt = $conn->query("SELECT NOW() as ahora");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "Hora actual en MySQL: " . $row['ahora'];
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
