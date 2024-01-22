<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $confirmarContrasena = $_POST["confirmarContrasena"];

    // Validación de los datos (puedes agregar más validaciones aquí)
    if ($nombre && $usuario && $contrasena && $contrasena === $confirmarContrasena) {
        // Guardar los datos en algún lugar (por ejemplo, en una base de datos)

        // Redireccionar a "index.html"
        header("Location: index.html");
        exit();
    } else {
        // Si hay errores, puedes redirigir a una página de error o mostrar un mensaje de error
        echo "Error en los datos. Por favor, inténtalo de nuevo.";
    }
} else {
    // Si la solicitud no es de tipo POST, puedes manejarla de acuerdo a tus necesidades
    echo "Método no permitido.";
}
?>
