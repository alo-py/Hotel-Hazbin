<?php
// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "hotel");

// Comprobar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$id_cliente = $_POST['id_cliente']; 
$id_habitacion = $_POST['identificador_habitacion'];
$num_personas = $_POST['numero_personas'];
$fecha_reserva = $_POST['fecha_reservacion'];

// Insertar la reservación en la tabla 'reservaciones'
$sql_reservacion = "INSERT INTO reservaciones (cliente_id, habitacion_id, cantidad_personas, fecha_reserva) VALUES ($id_cliente, $id_habitacion, $num_personas, '$fecha_reserva')";

if ($conn->query($sql_reservacion) === TRUE) {
    echo "Reservación registrada correctamente";
} else {
    echo "Error al registrar la reservación: " . $conn->error;
}

$conn->close();
?>
