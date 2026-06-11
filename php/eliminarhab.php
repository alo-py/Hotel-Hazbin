<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener el ID de la habitación a eliminar
$id_habitacion = $_POST['id_eliminar'];

// Eliminar la habitación de la tabla 'habitaciones'
$sql = "DELETE FROM habitaciones WHERE id=$id_habitacion";

if ($conn->query($sql) === TRUE) {
    echo "Habitación eliminada correctamente";
} else {
    echo "Error al eliminar la habitación: " . $conn->error;
}

$conn->close();
?>