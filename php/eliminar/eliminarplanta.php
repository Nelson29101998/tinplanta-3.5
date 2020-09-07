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

if (isset($_GET['identidad'])) {
    $iden = $_GET['identidad'];
    $borrarplanta = "DELETE FROM plantas WHERE Id = '$iden'";
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
        <title><?php echo $lang["titulo_eliminarplanta"] ?></title>
        <link rel="icon" href="../../icon/logotin.png">
    </head>

    <body>
        <center>
            <?php
            if ($conexionplanta->query($borrarplanta) === TRUE) {
                echo "<h1>".$lang["eliminarplanta_body1"]."</h1>
                <a href='../perfil/perfil.php'><button type='button' class='btn btn-green'>".$lang["eliminarplanta_volver"]."</button></a>";
            } else {
                echo "Error: " . $sql . $conexionplanta->error .
                    "<a href='../perfil/perfil.php'><button type='button' class='btn btn-green'>".$lang["eliminarplanta_volver"]."</button></a>";
            }
            ?>
        </center>
    </body>

    </html>
<?php
    $conexionplanta->close();
}
?>