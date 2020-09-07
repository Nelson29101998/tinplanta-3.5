<?php 
session_start();
require "../direcciones/conexiones.php";
include "../conexiones/conexioncuenta.php";

//!Esto es muy importante para cambiar idioma
//! verificamos la sesion creada
if (isset($_SESSION['lang'])) {
    //! si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require "../../lang/" . $lang . ".php";
    //! si no hay sesion por default se carga el lenguaje espanol
} else {
    require "../../lang/es.php";
}

$m = $_SESSION['Correo'];
$_SESSION['Correo'] = $m;

$p1 = $_POST['pass1'];
$p2 = $_POST['pass2'];

$p1hash = password_hash($p1, PASSWORD_DEFAULT);
$p2hash = password_hash($p2, PASSWORD_DEFAULT);

$cambiarcontrasena = "UPDATE cuentas set Contrasena1 ='$p1hash', Contrasena2 ='$p2hash' WHERE Correo ='$m'";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title><?php echo $lang["titulo_cambiarpass"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <center>
        <?php
        if ($conexion->query($cambiarcontrasena) === TRUE) {
        ?>
        <h1><?php echo $lang["cambiarpass_1"] ?></h1>
        <a href="../cerrar.php"><button type="button" class="btn btn-primary"><?php echo $lang["cambiarpass_volver"] ?></button></a>
        <?php
        } else {
        ?>
        <h1><?php echo $lang["cambiarpass_2"] ?></h1>
        <a href="../cerrar.php"><button type="button" class="btn btn-primary"><?php echo $lang["cambiarpass_volver"] ?></button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>