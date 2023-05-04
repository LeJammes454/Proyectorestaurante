<?php

    include 'conexion_backE.php';


    $nombre = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasenia = $_POST['contrasenia'];
    $contrasenia = hash('sha512',$contrasenia);

    

    
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo'
        <script>
        alert("Formato de correo no valido");
        window.location="../index.php";
        </script>
        ';
        exit();
    }
    
    $verificar_correo = mysqli_query($conexion,"SELECT * FROM usuarios where email='$correo'");
 
        if(mysqli_num_rows($verificar_correo)>0 ){

            echo'
            <script>
            alert("Este correo ya esta registrado, Intenta con otro");
            window.location="../index.php";
            </script>
            ';
            exit();
    }
    
    $verificar_usuario = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario='$usuario' ");
    if(mysqli_num_rows($verificar_usuario)>0 ){
        echo'
        <script>
        alert("Este usuario ya esta registrado, Intenta con otro");
        window.location="../index.php";
        </script>
        ';
        exit();
    }
    $query = "INSERT INTO usuarios(nombre,email,usuario,contrasenia)
    Values('$nombre','$correo','$usuario','$contrasenia')";

    $ejecutar = mysqli_query($conexion,$query);

    if($ejecutar){
        echo '
        <script>
        alert("Usuario Registrado Exitosamente");
        window.location="../index.php";
        </script>
        ';
    }else{
        echo '
        <script>
        alert("Ocurrio un error. Intentalo de nuevo");
        </script>
        ';
    }
    
   
    
?>