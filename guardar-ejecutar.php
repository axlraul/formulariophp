<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $textoX = $_POST['textoX'];
    $archivo = '/contenido.txt';  // Cambia esta línea con la ruta absoluta deseada

    // Verificar si el archivo es escribible
    if (is_writable($archivo)) {
        // Guardar el contenido en el archivo
        if (file_put_contents($archivo, $textoX) !== false) {
            // Ejecutar el script de Bash
            $output = shell_exec('/ruta/al/tu-script.sh');  // Cambia esta línea con la ruta al script de Bash

            echo "Contenido guardado correctamente. Resultado del script: $output";
        } else {
            echo "Error al escribir en el archivo.";
        }
    } else {
        echo "El archivo no es escribible. Verifica los permisos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
