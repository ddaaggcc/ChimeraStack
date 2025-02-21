<?php
require 'vendor/autoload.php'; // Cargar la librería predis/predis

$client = new Predis\Client([
    'scheme' => 'tcp',
    'host'   => 'chimera-redis',
    'port'   => 6379,
]);

$client->set('saludo', 'Hola desde PHP y Redis!');
echo "Valor guardado en Redis: " . $client->get('saludo');
