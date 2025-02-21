<?php
require 'vendor/autoload.php'; // Cargar la librería mongodb/mongodb

$client = new MongoDB\Client("mongodb://chimera-mongodb:27017");
$collection = $client->testdb->testcollection;

// Insertar documento
$result = $collection->insertOne(['nombre' => 'Diego', 'mensaje' => 'Hola, MongoDB!']);
echo "Documento insertado con _id: " . $result->getInsertedId();
