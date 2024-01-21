<h1>Paso de comprobación</h1>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $script_validacion_planificacion = '/script1.sh'; 
    $planificacion_introducida = $_POST['planificacion_introducida'];
    $tipo_planificacion = $_POST['tipo_planificacion'];
    $archivo = '/contenido.txt';  

    // check if file $archivo is writable
    if (is_writable($archivo)) {
        // save content to a file and tipo_planificacio
#       $contenido = "$planificacion_introducida\nOpción: $tipo_planificacion";
       $contenido = "$planificacion_introducida";
        if (file_put_contents($archivo, $contenido) !== false) {
            $output_script_1 = shell_exec("$script_validacion_planificacion $tipo_planificacion 2>&1");

            echo "Resultado comprobación previo envío planificación:<br>";
            echo "<pre>$output_script_1</pre>";  // Utilizando <pre> para conservar el formato del texto

            // Adding bottom to redirect to another php file
            echo '<form action="resultado.php" method="post">';
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
