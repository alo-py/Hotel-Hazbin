<?php
// Verifica si se ha enviado el formulario de inicio de sesión
if (isset($_POST['login'])) {
    echo "Formulario recibido en PHP"; // Mensaje de depuración

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "hotel";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $email = $_POST['correo'];
    $contrasena = $_POST['contraseña'];

    // Verificar si las credenciales son del administrador
    if ($email == "diegojesushdz2002@gmail.com" && $contrasena == "Diego2002?") {
        // Si las credenciales coinciden con las del administrador, redirige a admin.html
        header("Location: ../admin.html");
        exit();
    } else {
        // Consulta SQL preparada para verificar las credenciales
        $stmt = $conn->prepare("SELECT nombre FROM clientes WHERE email = ? AND contrasena = ?");
        $stmt->bind_param("ss", $email, $contrasena);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Inicia la sesión y guarda el nombre de usuario en una variable de sesión
            session_start();
            $stmt->bind_result($nombre);
            $stmt->fetch();
            $_SESSION['nombre'] = $nombre;
            header("Location: ../index.html"); // Redirige al usuario al index
            exit();
        } else {
            // Si no se encontraron coincidencias, muestra un mensaje de error
            echo "Nombre, email o contraseña incorrectos";
        }

        // Cierra la declaración
        $stmt->close();
    }

    // Cierra la conexión a la base de datos
    $conn->close();
}
?>
