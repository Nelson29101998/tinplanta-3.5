<?php
session_start();
require "../direcciones/conexiones.php";
include "../conexiones/conexionplanta.php";

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


$imagenes = $_POST['imagen'];
$nomplant = $_POST['nomplanta'];
$tipo = $_POST['checkplanta'];
$epoca = $_POST['ano'];
$detalle = $_POST['detalle'];
$checkdura = $_POST['checkdura'];
if ($checkdura == "mes") {
    $duracion = $_POST['durames'];
} else if ($checkdura == "dia") {
    $duracion = $_POST['duradia'];
}
$hoy = date("Y-m-d");
$repota = "No";
$idiomas = $_POST['idioma'];

$sql = "INSERT INTO plantas
(Image, Nombre, Tipo_planta, Epocaano, Autor, Detalle, Duracion, Fecha, Reporta, Idiomas) VALUE
('".$imagenes."', '".$nomplant."', '".$tipo."',
'".$epoca."', '".$user."', '".$detalle."',
'".$duracion."', '".$hoy."', '".$repota."' , '".$idiomas."')";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">
    <title><?php echo $lang["titulo_guardarplantas"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <?php
    if ($conexionplanta->query($sql) === TRUE) {
        echo "<center><h1>".$lang["guardarplantas_ok"]."<h1><a href='../../index.php'><button type='button' class='btn btn-green'>".$lang["guardarplantas_volver"]."</button></a></center>";
    } else {
        echo "<h1>Error: " . $sql . $conexionplanta->error . "</h1>";
        echo "<center><h1>".$lang["guardarplantas_error"]."<h1><a href='../../index.php'><button type='button'>".$lang["guardarplantas_volver"]."</button></a></center>";
    }
    $conexionplanta->close();
    ?>
</body>

</html>