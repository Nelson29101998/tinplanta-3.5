<?php
$conexionpremium = $conexionpremium = new mysqli($servername, $user, $pass, $bd);
if($conexionpremium -> connect_error){
    die("Conexión Fallida: " . $conexionpremium -> connect_error);
}
?>