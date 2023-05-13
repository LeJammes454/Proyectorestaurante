<?php

require_once 'config_db.php';


class ConnectionMySQL
{
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
        $this->database = DB_DATABASE;
    }

    public function createConnection()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if (!$this->conn) {
            die("Error al conectar a la base de datos: " . mysqli_connect_error());
        }
    }

    public function closeConnection()
    {
        mysqli_close($this->conn);
    }

    public function executeQuery($query)
    {
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
}

/*
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
    echo "Error al ejecutar la consulta: " ;
}

// Cerrar la conexión a la base de datos
$dbConnection->closeConnection();

*/
?>