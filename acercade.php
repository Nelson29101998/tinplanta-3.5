<?php
session_start();
require "php/direcciones/conexiones.php";
include "php/conexiones/conexioncuenta.php";
if (isset($_SESSION['Usuario'])) {
    $user = $_SESSION['Usuario'];
    $_SESSION["Usuario"] = $user;
}

//!Esto es muy importante para cambiar idioma
//! verificamos la sesion creada
if (isset($_SESSION['lang'])) {
    //! si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require "lang/" . $lang . ".php";
    //! si no hay sesion por default se carga el lenguaje espanol
} else {
    require "lang/es.php";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">

    <title><?php echo $lang["titulo_acerca"] ?></title>
    <link rel="icon" href="icon/logotin.png">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark green sticky-top">
        <a class="navbar-brand" href="http://drive.google.com/uc?id=1ESJ6kDwOXWsM89XMbyaMdVxcJlD9OG2f">
            <img src="http://drive.google.com/uc?id=16yHHkXWlqx5tzo21075pNeJpV1Xl1MIt" alt="logo" style="width: 20px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="menus">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php"><button type="button" class="btn btn-light-green" name="inicio" id="inicio"><i class="fas fa-home"></i> <?php echo $lang["acerca_inicio"] ?></button></a>
                </li>
                <li>
                    <a href="php/ayudar/ayuda.php"><button type="button" class="btn btn-light-green" name="ayuda" id="ayuda"><i class="fas fa-hands-helping"></i> <?php echo $lang["menu_ayuda"] ?></button></a>
                </li>
                <?php
                if (isset($_SESSION['Usuario'])) {
                ?>
                    <li class="nav-item">
                        <button type="button" class="btn btn-light-green" name="perfil" id="perfil"><i class="fas fa-id-card"></i> <?php echo $lang["menu_perfil"] ?></button>
                    </li>
                <?php
                }
                ?>

                <?php
                if (empty($_SESSION['Usuario'])) {
                ?>
                    <li class="nav-item dropdown">
                        <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="cuentas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-portrait"></i> <?php echo $lang["menu_cuenta"] ?><span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="html/iniciasesion.html"><i class="fas fa-sign-in-alt"></i> <?php echo $lang["menu_cuenta_inicia"] ?></a>
                            <a class="dropdown-item" href="php/nuevasesion.php"><i class="fas fa-user-circle"></i> <?php echo $lang["menu_cuenta_nueva"] ?></a>
                            <a class="dropdown-item" href="html/olvido.html"><i class="fas fa-key"></i> <?php echo $lang["menu_cuenta_olvido"] ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=""><i class="fas fa-user-cog"></i> <?php echo $lang["menu_cuenta_adm"] ?></a>
                        </div>
                    </li>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['Usuario'])) {
                ?>
                    <li class="nav-item">
                        <a href="php/cerrar.php"><button type="button" class="btn btn-light-green" name="cerrar" id="cerrar"><i class="fas fa-sign-out-alt"></i> <?php echo $lang["menu_cuenta_cerrar"] ?></button></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </nav>

    <center>
        <p>
            <h1 class="text-success"><?php echo $lang["acerca_bienv"] ?></h1>
            <br>
            <div class="container-fluid">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <label class="text-justify">
                                    <?php echo $lang["acerca_parafo1"] ?>   
                                </label>

                                <label class="text-justify">
                                    <?php echo $lang["acerca_parafo2"] ?>
                                    </label>

                                <label class="text-justify">
                                    <?php echo $lang["acerca_parafo3"] ?>
                                    </label>

                                <label class="text-justify">
                                    <?php echo $lang["acerca_parafo4"] ?>
                            </label>

                                <div class="text-center">
                                    <img src="http://drive.google.com/uc?id=1xao-HR8db4_pbIBoPN1tqDhqafJkuJaM" class="img-thumbnail rounded" width="800">
                                </div>

                                <div class="text-center">
                                    <label class="font-weight-bold">Nelson Mouat Vergara</label>
                                </div>

                                <div class="text-center">
                                    <label class="font-weight-bold">nelsonmouatvergara@gmail.com</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </p>
    </center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>

</html>