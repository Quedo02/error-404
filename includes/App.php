<?php 
require 'funciones.php'; 
require_once __DIR__ . '/../vendor/autoload.php'; 

use Dotenv\Dotenv; 
use Model\ActiveRecord;
use Classes\Connection;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Crear una nueva conexión a la base de datos
$connection = new Connection(); 
$db = $connection->connect(); // Establece la conexión

// Configura la conexión en ActiveRecord
ActiveRecord::setDB($db); // Asegúrate de que esta línea esté aquí
