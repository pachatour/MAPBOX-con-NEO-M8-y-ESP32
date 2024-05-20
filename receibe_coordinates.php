<?php
// Verificar si los parámetros 'lat' y 'lng' están presentes en la solicitud GET
if (isset($_GET['lat']) && isset($_GET['lng'])) {
    // Asignar los valores de los parámetros a variables locales
    $latitude = $_GET['lat'];
    $longitude = $_GET['lng'];
 
    // Credenciales de la base de datos
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
 
    // Preparar la consulta SQL para insertar las coordenadas en la tabla 'coordinates'
    $sql = "INSERT INTO coordinates (latitude, longitude) VALUES ('$latitude', '$longitude')";
    // Ejecutar la consulta y verificar si fue exitosa
    if ($conn->query($sql) === TRUE) {
        // Si la consulta fue exitosa, mostrar un mensaje de confirmación
        echo "New record created successfully";
    } else {
        // Si hubo un error en la consulta, mostrar un mensaje de error con los detalles
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
 
    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    // Si no se recibieron las coordenadas, mostrar un mensaje indicándolo
    echo "No coordinates received";
}
?>
