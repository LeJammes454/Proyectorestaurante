<?php
//Valida si la secion esta activa
   session_start();
   //Exporta la variable 
   include 'conexion_backE.php';
   //Obtiene las variables de la 
   $correo = $_POST['correo'];
   $contrasenia = $_POST['contrasenia'];
   $contrasenia = hash('sha512',$contrasenia);

   $consulta = "SELECT * FROM USUARIOS WHERE email='$correo' AND contrasenia='$contrasenia'";
  
   $validar_login = mysqli_query($conexion,$consulta);

   if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: ../php/home.php");
    
    exit();

   }else{
        echo'
        <script>
        alert("Usuario no existe");
        window.location="../index.php";
        </script>
        ';
        exit();
   }

   
?>
