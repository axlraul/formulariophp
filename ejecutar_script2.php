<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ejecutar'])) {
    $opcion = $_POST['opcion'];
    
    // Ejecutar el script de Bash 2 con la opción como argumento
    $output2 = shell_exec("/script2.sh $opcion 2>&1");  // Cambia esta línea con la ruta al script2.sh

    echo "Resultado del script 2:<br>";
    echo "<pre>$output2</pre>";  // Utilizando <pre> para conservar el formato del texto
} else {
    echo "Acceso no permitido.";
}
?>

