<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $script_validacion_planificacion = '/script1.sh';  // Elimina el punto y coma al final de esta línea
    $planificacion_introducida = $_POST['planificacion_introducida'];
    $tipo_planificacion = $_POST['tipo_planificacion'];
    $archivo = '/contenido.txt';  // Ajusta el nombre de la variable y utiliza la ruta correcta

    // Verificar si el archivo es escribible
    if (is_writable($archivo)) {
        // Guardar el contenido y la opción en el archivo
        $contenido = "Texto X: $planificacion_introducida\nOpción: $tipo_planificacion";
        if (file_put_contents($archivo, $contenido) !== false) {
            // Ejecutar el script de Bash con la opcion como argumento
            $output_script_1 = shell_exec("$script_validacion_planificacion $tipo_planificacion 2>&1");

            echo "Resultado comprobación previa planificación:<br>";
            echo "<pre>$output_script_1</pre>";  // Utilizando <pre> para conservar el formato del texto

            // Agregar el botón "Enviar planificación" con redirección a otro php
            echo '<form action="envio_planificacion.php" method="post">';
            echo '<input type="hidden" name="tipo_planificacion" value="' . htmlspecialchars($tipo_planificacion) . '">';
            echo '<input type="submit" name="enviar_planificacion" value="Enviar planificación">';
            echo '</form>';
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

