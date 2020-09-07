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

$usuario = $_POST['user'];
$contrasena = $_POST['pass'];

$contrasenahash = password_hash($contrasena, PASSWORD_DEFAULT);

$sql = "SELECT * FROM cuentas WHERE Usuario = '$usuario'";
$permisosql = mysqli_query($conexion, $sql);
$encotntrar = mysqli_fetch_array($permisosql, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title><?php echo $lang["titulo_abrircuenta"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <?php
    if (isset($encotntrar["Usuario"])) {
        if ($encotntrar["Verificado"] === "Si") {
            if (password_verify($contrasena, $encotntrar['Contrasena1'])) {
                $_SESSION["Usuario"] = $encotntrar['Usuario'];

                header("Location: ../../index.php");
            } else {
                echo "<center>
            <h1 class='display-4'>" . $lang["abrircuenta_error_1"] . "</h1>
            <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>" . $lang["abrircuenta_volver"] . "</button></a>
            </center>";
            }
        } else {
            echo "<center>
        <h1 class='display-4'>" . $lang["abrircuenta_error_2"] . "</h1>
        <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>" . $lang["abrircuenta_volver"] . "</button></a>
        </center>";
        }
    } else {
        echo "<center>
        <h1 class='display-4'>" . $lang["abrircuenta_error_3"] . "</h1>
        <a href='../../html/iniciasesion.html'><button type='button' class='btn btn-primary'>" . $lang["abrircuenta_volver"] . "</button></a>
        </center>";
    }
    ?>
</body>

</html>