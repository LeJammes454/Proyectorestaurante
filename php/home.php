<?php
  session_start();
  if(!isset($_SESSION['usuario'])){
echo'
<script>
        alert("Por favor deves iniciar seccion");
        window.location="../index.php";
        </script>
  ';
  
  session_destroy();
  die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/styleHome.css">
    <title>Juan300+</title>
</head>
<body>
    <header>
        <h2 class="index-logo">Restuaran</h2>
        <input type="checkbox" id="check">
        <label for="check" class="mostrar-menu">&#8801</label>
        <nav class="menu">
            <a href="#">Lorem</a>
            <a href="#">ipsum</a>
            <a href="#">dolor</a>
            <a href="#">sit</a>
            <a href = "cerrar_sesion.php"> Cerrar Sesión</a>
            <label for="check" class="esconder-menu">&#215</label>
        </nav>
    </header>
</body>
</html>