<?php

/**
 * python-example.php
 * Llama al microservicio Flask del contenedor 'chimera-python' por puerto 5000
 */

// Opción 1: file_get_contents
$url = "http://chimera-python:5000/sumar?a=15&b=27";
$response = file_get_contents($url);

echo "<h2>Respuesta de Python microservice (Flask):</h2>";
echo "<pre>" . htmlspecialchars($response) . "</pre>";

// Opción 2: cURL (si preferís mayor control)
echo "<hr><h3>Usando cURL:</h3>";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curlResponse = curl_exec($ch);
curl_close($ch);

echo "<pre>" . htmlspecialchars($curlResponse) . "</pre>";

