<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los datos del formulario
  $nombre = $_POST['nombre'];
  $direccion = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $contrasena = $_POST['contrasena'];
  $confirmar_contrasena = $_POST['confirmar_contrasena'];


  // Encriptar la contraseña
  $contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

  // Crear una conexión a la base de datos
  $mysqli = new mysqli("localhost", "root", "jaime0454", "PROYECTORESTAURANT");

  // Verificar la conexión
  if ($mysqli->connect_error) {
    die("Error en la conexión: " . $mysqli->connect_error);
  }

  // Verificar si ya existe otro usuario con el mismo correo
  $stmt = $mysqli->prepare("SELECT id FROM USUARIOS WHERE email = ?");
  $stmt->bind_param("s", $correo);
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows > 0) {
    // Ya existe un usuario con el mismo correo
    echo 'error_correo_existente';
  } else {
    // No existe otro usuario con el mismo correo, realizar la inserción

    // Preparar la consulta INSERT
    $stmt = $mysqli->prepare("INSERT INTO USUARIOS (nombre, direccion, telefono, email, contrasenia) VALUES (?, ?, ?, ?, ?)");

    // Verificar si la consulta se preparó correctamente
    if ($stmt === false) {
      die("Error en la consulta: " . $mysqli->error);
    }

    // Asignar los valores a los parámetros de la consulta
    $stmt->bind_param("sssss", $nombre, $direccion, $telefono, $correo, $contrasena_encriptada);

    // Ejecutar la consulta INSERT
    if ($stmt->execute()) {
      // La inserción se realizó con éxito
      echo "Datos insertados correctamente en la base de datos.";
    } else {
      // Ocurrió un error durante la ejecución de la consulta INSERT
      echo "Error al insertar los datos: " . $stmt->error;
    }
  }

  // Cerrar la conexión y liberar los recursos
  $stmt->close();
  $mysqli->close();
}
