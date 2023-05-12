<?php
$servername = "localhost"; // reemplaza con tu nombre de servidor
$username = "root"; // reemplaza con tu nombre de usuario
$password = "jaime0454"; // reemplaza con tu contraseña
$dbname = "PROYECTORESTAURANT"; // reemplaza con el nombre de tu base de datos

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // establece el modo de error de PDO en excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // echo "¡Conexión exitosa!";
} catch (PDOException $e) {
    // echo "La conexión falló: " . $e->getMessage();
}

function getPlatillos()
{
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM PLATILLOS");
    $stmt->execute();

    // set the resulting array to associative
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

