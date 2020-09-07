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

$user = $_SESSION['Usuario'];
$_SESSION["Usuario"] = $user;

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$usuario = $_POST['user'];
$direccion = $_POST['dir'];
$comuna = $_POST['com'];
$estadocivil = $_POST['estcivil'];
$rut = $_POST['rut'];
$correo = $_POST['correo'];
$discapacidad = $_POST['discap'];

$cambiarcuenta = "UPDATE cuentas set 
Nombre = '$nombre', Apellidos = '$apellidos', Usuario = '$usuario',
Direccion = '$direccion', Comuna = '$comuna', Estado_Civil = '$estadocivil',
Rut = '$rut', Correo = '$correo', Discapacidad = '$discapacidad'
WHERE Usuario = '$user'";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title><?php echo $lang["titulo_cambiarsing"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <center>
        <?php
        if ($conexion->query($cambiarcuenta) === TRUE) {
        ?>
        <h1><?php echo $lang["cambiarsing_ok"] ?></h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-green"><?php echo $lang["cambiarsing_volver"] ?></button></a>
        <?php
        } else {
        ?>
        <h1><?php echo $lang["cambiarsing_error"] ?></h1>
        <a href="../perfil/perfil.php"><button type="button" class="btn btn-green"><?php echo $lang["cambiarsing_volver"] ?></button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>