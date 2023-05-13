<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Crear una conexión a la base de datos
    $mysqli = new mysqli("localhost", "root", "jaime0454", "PROYECTORESTAURANT");

    // Verificar la conexión
    if ($mysqli->connect_error) {
        die("Error en la conexión: " . $mysqli->connect_error);
    }

    // Obtener los datos del usuario basados en el correo electrónico
    $stmt = $mysqli->prepare("SELECT id, contrasenia FROM USUARIOS WHERE email = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        // El correo electrónico existe en la base de datos
        $stmt->bind_result($id, $contrasenia_hash);
        $stmt->fetch();

        // Verificar si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($contrasena, $contrasenia_hash)) {
            // La contraseña es correcta
            // Iniciar sesión o realizar cualquier acción adicional aquí
            echo 'success';

            // La contraseña es correcta
// Iniciar sesión y almacenar los datos del usuario en variables de sesión
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['correo'] = $correo;

        } else {
            // La contraseña es incorrecta
            echo 'error';
        }
    } else {
        // El correo electrónico no existe en la base de datos
        echo 'error';
    }

    // Cerrar la conexión y liberar los recursos
    $stmt->close();
    $mysqli->close();
}