<?php
require_once 'ConnectionMySQL.php'; // Reemplaza 'DatabaseConnection.php' con el nombre real del archivo que contiene la clase

// Crear una instancia de la clase DatabaseConnection
$dbConnection = new ConnectionMySQL();

// Conectarse a la base de datos
$dbConnection->createConnection();

// Ejecutar una consulta de prueba
$query = "SELECT * FROM PLATILLOS"; // Reemplaza 'table_name' con el nombre de una tabla existente en tu base de datos
$result = $dbConnection->executeQuery($query);

// Procesar los resultados de la consulta (ejemplo)
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Realizar alguna acción con los datos obtenidos
        echo $row['nombre'] . '<br>'; // Reemplaza 'column_name' con el nombre de una columna existente en tu tabla
    }
} else {
   // echo "Error al ejecutar la consulta: " . mysqli_error($dbConnection->conn);
}

// Cerrar la conexión a la base de datos
$dbConnection->closeConnection();
?>


