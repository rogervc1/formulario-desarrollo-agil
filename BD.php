<?php
// Datos de conexión a la base de datos
$servername = "localhost"; // Nombre del servidor (localhost en este caso)
$username = "tu_usuario"; // Tu nombre de usuario de MySQL
$password = "tu_contraseña"; // Tu contraseña de MySQL
$dbname = "nombre_base_de_datos"; // Nombre de la base de datos que estás utilizando

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];

    // Consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso
        echo "¡Inicio de sesión exitoso!";
        // Aquí podrías redirigir a una página de inicio de sesión exitoso
    } else {
        // Credenciales incorrectas
        echo "Usuario o contraseña incorrectos";
    }
}

// Cerrar conexión
$conn->close();
?>
