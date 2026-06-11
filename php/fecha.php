<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener la fecha seleccionada en el Check-In
$fechaCheckIn = $_POST['FechaEntrada'];

// Consulta para verificar si hay reservaciones en la fecha seleccionada
$sql = "SELECT * FROM reservaciones WHERE fecha_reserva = '$fechaCheckIn'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Hay reservaciones en la fecha seleccionada
    echo "Esa fecha no está disponible";
} else {
    // No hay reservaciones en la fecha seleccionada
    echo "Esa fecha está disponible";
}

$conn->close();
?>