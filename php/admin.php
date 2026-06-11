<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $numeroHabitaciones = $_POST['numeroHabitaciones'];
    $tipoHabitacion = $_POST['tipoHabitacion'];
    $numeroHabitacion = $_POST['numeroHabitacion'];
    $numeroPersonas = $_POST['numeroPersonas'];
    $fechaReservacion = $_POST['fechaReservacion'];

    // Conexión a la base de datos 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hotel";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Preparar la consulta SQL para insertar los datos en la tabla 'habitaciones'
    $sql = "INSERT INTO habitaciones (tipo, numero, disponibilidad) VALUES ('$tipoHabitacion', $numeroHabitacion, TRUE)";

    if ($conn->query($sql) === TRUE) {
        echo "Registro de habitación exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Preparar la consulta SQL para insertar los datos en la tabla 'reservaciones'
    $sql = "INSERT INTO reservaciones (cliente_id, habitacion_id, cantidad_personas, fecha_reserva) VALUES (1, LAST_INSERT_ID(), $numeroPersonas, '$fechaReservacion')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    
    header("Location: admin.html");
    exit();
}
?>