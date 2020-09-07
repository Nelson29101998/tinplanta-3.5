<?php
session_start();
require "direcciones/conexiones.php";
include "conexiones/conexioncuenta.php";
if (isset($_GET['user'])) {
    $usuario = $_GET['user'];
    $_SESSION["Usuario"] = $usuario;
    $verif = "UPDATE cuentas SET Verificado = 'Si' WHERE Usuario = '$usuario'";
}

//!Esto es muy importante para cambiar idioma
//! verificamos la sesion creada
if(isset($_SESSION['lang'])){
    //! si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require "../lang/".$lang.".php";
    //! si no hay sesion por default se carga el lenguaje espanol
  }else{
    require "../lang/es.php";
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdbootstrap/css/mdb.min.css">
    <title><?php echo $lang["titulo_verificado"] ?></title>
    <link rel="icon" href="../icon/logotin.png">
</head>

<body>
    <center>
        <?php
        if ($conexion->query($verif) === TRUE) {
        ?>
            <h1><?php echo $lang["verf1"] ?></h1>
            <a href="cerrar.php"><button type="button" class="btn btn-primary"><?php echo $lang["verf_volver"] ?></button></a>
        <?php
        } else {
        ?>
            <h1><?php echo $lang["verf2"] ?></h1>
            <a href="cerrar.php"><button type="button" class="btn btn-primary"><?php echo $lang["verf_volver"] ?></button></a>
        <?php
        }
        ?>
    </center>
</body>

</html>