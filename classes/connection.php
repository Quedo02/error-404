<?php
$servername = "localhost"; // Adjust as necessary
$username = "root";        // Default for XAMPP
$password = "";            // Default for XAMPP
$dbname = "project"; // Your actual database name

try {
    $con = mysqli_connect($servername, $username, $password, $dbname);
    
    if (!$con) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    echo "Error al conectar con la base de datos: " . $e->getMessage();
    $con = null;
}
return $con;
?>
