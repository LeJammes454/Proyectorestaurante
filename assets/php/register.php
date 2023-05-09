<?php
require_once 'classConectionMySQL.php';

// Verifica si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    // Valida si todos los campos tienen contenido
    if (!empty($name) && !empty($address) && !empty($email) && !empty($phone) && !empty($password)) {
        // Crea una nueva instancia de la clase ConnectionMySQL
        $connection = new ConnectionMySQL();

        // Establece la conexión con la base de datos
        $connection->CreateConnection();

        // Inserta el nuevo usuario en la base de datos
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hashea la contraseña antes de guardarla
        $sql = "INSERT INTO USUARIOS (nombre, direccion, correo, telefono, contrasenia) VALUES ('$name', '$address', '$email', '$phone', '$hashedPassword')";

        if ($connection->ExecuteQuery($sql)) {
            echo json_encode(['status' => 'success', 'message' => 'Usuario registrado correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrar el usuario.']);
        }

        // Cierra la conexión con la base de datos
        $connection->CloseConnection();
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son obligatorios.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de solicitud no válido.']);
}
?>
