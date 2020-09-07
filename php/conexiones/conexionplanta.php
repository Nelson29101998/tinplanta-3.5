<?php
$conexionplanta = $conexionplanta = new mysqli($servername, $user, $pass, $bd);
if($conexionplanta -> connect_error){
    die("Conexión Fallida: " . $conexionplanta -> connect_error);
}
?>
