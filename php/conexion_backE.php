<?php

    $TipoConeccion = true;




    //EL IF FUNCIONA COMO SWITCH PARA ALTERNAR ENTRE LA BASE DE DATOS LOCAL Y LA BASE DE DATOS EN LA NUBE
    if($TipoConeccion){
        $conexion = mysqli_connect("localhost","root","045400","login_prueba");
         
    }else{
        $host = 'pruebaazurehtml.mysql.database.azure.com';
        $username = 'juan3000';
        $password = 'Jaime045400$';
        $db_name = 'practicaAzure';

    
    //Inicializa la coneccion a la base de datos
        $conexion = mysqli_init();
    
        mysqli_ssl_set($conexion,NULL,NULL, "../assets/DigiCertGlobalRootCA.crt.pem", NULL, NULL);
    
    // Estableciendo la coneccion
        mysqli_real_connect($conexion, $host, $username, $password, $db_name, 3306, NULL, MYSQLI_CLIENT_SSL);
    
    //Si se llega a tener un error al conectarse a la abse de datos. 
        if (mysqli_connect_errno())
        {
        die('Failed to connect to MySQL: '.mysqli_connect_error());
        }
    }
        

//    Mensaje de pruebas
    if($conexion){
        echo 'Conexion Extitosa';
    }else{
        echo 'No se pudo hacer conexion' ;
    }



?>