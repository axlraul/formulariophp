<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_planificacion'])) {
    $opcion = $_POST['opcion'];

    // Ejecutar el script de Bash (o PHP) con la opción como argumento y obtener la salida
    $output_otro_php = shell_exec("/script2.sh $opcion 2>&1");  // Cambia esta línea con la ruta a tu script2.sh o script2.php

    echo "Resultado del script 2:<br>";
    echo "<pre>$output_otro_php</pre>";  // Utilizando <pre> para conservar el formato del texto
} else {
    echo "Acceso no permitido.";
}
?>

