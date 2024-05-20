<?php
// Credenciales de la base de datos Y VOLVERLAS JSON

// Definición de las credenciales de la base de datos
$servername = "154.12.254.242"; // Dirección del servidor de la base de datos
$username = "ratiosof74bo_uv_bd_user"; // Nombre de usuario para la base de datos
$password = "Estudiante@123"; // Contraseña del usuario de la base de datos
$dbname = "ratiosof74bo_uv_bd"; // Nombre de la base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificación de la conexión a la base de datos
if ($conn->connect_error) {
    // Si la conexión falla, se termina el script y se muestra un mensaje de error
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para seleccionar latitud y longitud de la tabla coordinates
$sql = "SELECT latitude, longitude FROM coordinates";
$result = $conn->query($sql); // Ejecución de la consulta y almacenamiento del resultado

// Creación de un array para almacenar las coordenadas
$coordinates = array();

// Verificación de si la consulta retornó resultados
if ($result->num_rows > 0) {
    // Iteración a través de cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Agrega cada fila al array de coordenadas
        $coordinates[] = array(
            'latitude' => $row['latitude'], // Agrega la latitud de la fila actual al array
            'longitude' => $row['longitude'] // Agrega la longitud de la fila actual al array
        );
    }
}

// Cierre de la conexión a la base de datos
$conn->close();

// Configuración de la cabecera para indicar que la respuesta es JSON
header('Content-Type: application/json');

// Codificación del array de coordenadas a formato JSON y salida del resultado
echo json_encode($coordinates);
?>
