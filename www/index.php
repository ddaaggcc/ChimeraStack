<?php
/**
 * index.php - Página de bienvenida a ChimeraStack
 * ----------------------------------------------
 * Incluye enlaces a ejemplos en PHP (MySQL, Mongo, Redis)
 * y una sección para llamar el microservicio Python (Flask).
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>ChimeraStack - Home</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 30px;
      background: #f0f0f0;
    }
    h1 {
      color: #333;
    }
    .container {
      background: #fff;
      border-radius: 8px;
      padding: 20px;
      max-width: 700px;
      margin: 0 auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    ul {
      list-style: none;
      padding-left: 0;
    }
    li {
      margin: 6px 0;
    }
    a {
      text-decoration: none;
      color: #007BFF;
    }
    a:hover {
      text-decoration: underline;
    }
    .tag {
      display: inline-block;
      background: #007BFF;
      color: #fff;
      border-radius: 5px;
      padding: 2px 8px;
      margin-right: 5px;
      font-size: 0.85rem;
    }
    .stack-info {
      background: #eee;
      padding: 10px;
      border-radius: 5px;
      margin-top: 15px;
      font-size: 0.9rem;
    }
    .microservicio {
      margin-top: 20px;
    }
    pre {
      background: #f8f8f8;
      padding: 10px;
      border-radius: 6px;
      overflow: auto;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>¡Bienvenido a ChimeraStack!</h1>
    <p>
      ChimeraStack es un entorno de desarrollo <strong>multipropósito</strong> basado en Docker, que incluye:
    </p>
    <ul>
      <li><span class="tag">Apache + PHP</span> (con Composer y extensiones comunes)</li>
      <li><span class="tag">MariaDB</span> (base de datos SQL)</li>
      <li><span class="tag">MongoDB</span> (base de datos NoSQL)</li>
      <li><span class="tag">Redis</span> (cache y almacenamiento en memoria)</li>
      <li><span class="tag">Python</span> (con <strong>Flask</strong>, para microservicios o scripts)</li>
    </ul>

    <p>
      A continuación, podés probar los distintos ejemplos en PHP y ver cómo conectan con cada servicio.
    </p>
    <ul>
      <li><a href="mysql-example.php">Ejemplo de conexión a MySQL</a></li>
      <li><a href="mongo-example.php">Ejemplo de conexión a MongoDB</a></li>
      <li><a href="redis-example.php">Ejemplo de conexión a Redis</a></li>
      <li><a href="python-example.php">Ejemplo de llamada al microservicio Python/Flask</a></li>
    </ul>

    <div class="stack-info">
      <p><strong>Credenciales MySQL:</strong></p>
      <ul>
        <li>Host: <code>chimera-mariadb</code></li>
        <li>Usuario: <code>myuser</code></li>
        <li>Contraseña: <code>mypassword</code></li>
        <li>Base de datos: <code>mydatabase</code></li>
      </ul>
      <p><strong>MongoDB:</strong> <code>chimera-mongodb:27017</code></p>
      <p><strong>Redis:</strong> <code>chimera-redis:6379</code></p>
    </div>

    <div class="microservicio">
      <h2>Microservicio Python (Flask)</h2>
      <p>
        El contenedor <span class="tag">chimera-python</span> corre una app Flask en el puerto <code>5000</code>.
        Podés probarlo directamente:
      </p>
      <ul>
        <li><a href="http://localhost:5000/" target="_blank">http://localhost:5000/</a> (mensaje de bienvenida)</li>
        <li><a href="http://localhost:5000/sumar?a=5&b=10" target="_blank">http://localhost:5000/sumar?a=5&b=10</a> (retorna JSON con la suma)</li>
      </ul>

      <p>
        El ejemplo <code>python-example.php</code> en PHP hace un <strong>request HTTP</strong> al microservicio Flask 
        y muestra la respuesta en la misma página. ¡Así podés integrar PHP con Python fácilmente!
      </p>
    </div>

    <p style="margin-top:20px;">
      <em>¡Personalizá este índice según tu proyecto y seguí desarrollando con ChimeraStack!</em>
    </p>
  </div>
</body>
</html>
