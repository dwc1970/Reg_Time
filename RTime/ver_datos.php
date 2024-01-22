<?php
$clave = $_GET["clave"];
if ($clave === "21687062") {
    // Mostrar el contenido de MetaDat.html
    echo file_get_contents("MetaDat.html");
} else {
    echo "Clave incorrecta. No tiene acceso al contenido.";
}
?>
