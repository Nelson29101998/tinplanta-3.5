<?php
$conexion = $conexion = new mysqli($servername, $user, $pass, $bd);
if($conexion -> connect_error){
    die("Conexión Fallida: " . $conexion -> connect_error);
}
?>
