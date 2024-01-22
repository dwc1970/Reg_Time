<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$database = "tu_base_de_datos";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexión a la base de datos fallida: " . $conn->connect_error);
}

// Procesar los datos del formulario
$nombre = $_POST["nombre"];
$contrasena = $_POST["contrasena"];

// Hash de la contraseña (asegúrate de usar una función segura en un entorno real)
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

// Subir la imagen de perfil al servidor
$imagen_perfil = $_FILES["foto_perfil"]["name"];
$imagen_perfil_tmp = $_FILES["foto_perfil"]["tmp_name"];
move_uploaded_file($imagen_perfil_tmp, "imagenes_perfil/" . $imagen_perfil);

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, contrasena, foto_perfil) VALUES ('$nombre', '$contrasena_hash', '$imagen_perfil')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario registrado con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
