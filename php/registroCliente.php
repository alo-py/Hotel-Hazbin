<?php
// Iniciar la sesión
session_start();

// Verificar si se ha enviado el formulario de registro
if (isset($_POST['registro'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotel";

    // conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);

    
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $nombre = $_POST['usuario'];
    $email = $_POST['correo'];
    $contrasena = $_POST['contraseña'];

    // consulta SQL para insertar un nuevo cliente
    $sql = "INSERT INTO clientes (nombre, email, contrasena) VALUES ('$nombre', '$email', '$contrasena')";

    // Ejecuta la consulta y verifica si fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}

?>