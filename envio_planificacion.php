<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar_planificacion'])) {
    $tipo_planificacion = $_POST['tipo_planificacion'];

    // Ejecutar el script de Bash (o PHP) con la opción como argumento y obtener la salida
    $output_otro_php = shell_exec("/script2.sh $tipo_planificacion 2>&1"); 

    echo "Resultado del envío de la planificación:<br>";
    echo "<pre>$output_otro_php</pre>";  // Utilizando <pre> para conservar el formato del texto
} else {
    echo "Acceso no permitido.";
}
?>
