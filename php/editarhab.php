<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_habitacion = $_POST['id_editar'];
$nuevo_tipo = $_POST['nuevo_tipo'];
$nuevo_numero = $_POST['nuevo_numero'];

// Actualizar los datos de la habitación en la tabla 'habitaciones'
$sql = "UPDATE habitaciones SET tipo='$nuevo_tipo', numero=$nuevo_numero WHERE id=$id_habitacion";

if ($conn->query($sql) === TRUE) {
    echo "Habitación actualizada correctamente";
} else {
    echo "Error al actualizar la habitación: " . $conn->error;
}

$conn->close();
?>
