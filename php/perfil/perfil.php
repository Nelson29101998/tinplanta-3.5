<?php
session_start();
require "../direcciones/conexiones.php";
include "../conexiones/conexioncuenta.php";
include "../conexiones/conexionplanta.php";

require_once '../../mobiledetect-php/Mobile_Detect.php';
$detect = new Mobile_Detect;

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

$micuenta = "SELECT * FROM cuentas WHERE Usuario = '$user'";
$resp = mysqli_query($conexion, $micuenta);

$miplanta = "SELECT * FROM plantas WHERE Autor = '$user'";
$resplant = mysqli_query($conexionplanta, $miplanta);
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
    <title>Mi Cuenta</title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <center>
        <h1 class="displa-4">Mi Cuenta</h1>
        <main>
            <div class="container">
                <?php
                if ($detect->isMobile()) {
                    while ($buscar = mysqli_fetch_array($resp)) {
                ?>
                        <table class="table table-sm table-bordered" style="background-color: #fff;">
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <?php echo $lang["cambiarcuenta_tabla_col1"] ?>
                                        <?php echo $buscar['Nombre']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <?php echo $lang["cambiarcuenta_tabla_col2"] ?>
                                        <?php echo $buscar['Apellidos']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-user"></i> <?php echo $lang["cambiarcuenta_tabla_col3"] ?>
                                        <?php echo $buscar['Usuario']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-home"></i> <?php echo $lang["cambiarcuenta_tabla_col4"] ?>
                                        <?php echo $buscar['Direccion']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <?php echo $lang["cambiarcuenta_tabla_col5"] ?>
                                        <?php echo $buscar['Comuna']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-atlas"></i> <?php echo $lang["cambiarcuenta_tabla_col6"] ?>
                                        <?php echo $buscar['Estado_Civil']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-registered"></i> <?php echo $lang["cambiarcuenta_tabla_col7"] ?>
                                        <?php echo $buscar['Rut']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-at"></i> <?php echo $lang["cambiarcuenta_tabla_col8"] ?>
                                        <?php echo $buscar['Correo']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold align-middle" scope="col" style="text-align: center;">
                                        <i class="fas fa-universal-access"></i> <?php echo $lang["cambiarcuenta_tabla_col9.1"] ?>
                                        <?php echo $buscar['Discapacidad']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php
                    }
                } else {
                    while ($buscar = mysqli_fetch_array($resp)) {
                    ?>
                        <table class="table table-sm table-bordered" style="background-color: #fff;">
                            <tbody>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <?php echo $lang["cambiarcuenta_tabla_col1"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Nombre']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <?php echo $lang["cambiarcuenta_tabla_col2"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Apellidos']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-user"></i> <?php echo $lang["cambiarcuenta_tabla_col3"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Usuario']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-home"></i> <?php echo $lang["cambiarcuenta_tabla_col4"] ?>
                                    </th>
                                    <td>
                                        <?php echo $buscar['Direccion']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <?php echo $lang["cambiarcuenta_tabla_col5"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Comuna']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-atlas"></i> <?php echo $lang["cambiarcuenta_tabla_col6"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Estado_Civil']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-registered"></i> <?php echo $lang["cambiarcuenta_tabla_col7"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Rut']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-at"></i> <?php echo $lang["cambiarcuenta_tabla_col8"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Correo']; ?>
                                    </td>

                                    <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                        <i class="fas fa-universal-access"></i> <?php echo $lang["cambiarcuenta_tabla_col9.1"] ?> 
                                    </th>
                                    <td>
                                        <?php echo $buscar['Discapacidad']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                <?php
                    }
                }
                ?>
                <h4>Tus plantas:</h4>
                <?php
                while ($planta = mysqli_fetch_array($resplant)) {
                    $ident = $planta['Id'];
                ?>
                    <div class="container">
                        <table class="table table-bordered" style="background-color: #fff;">
                            <tbody>
                                <tr>
                                    <?php
                                    if ($detect->isMobile()) {
                                    ?>
                                        <td class="text-center">
                                        <?php
                                    } else {
                                        ?>
                                        <td rowspan="4" class="text-center">
                                        <?php
                                    }
                                    echo "<img src='" . $planta['Image'] . "' width='200'>";
                                        ?>
                                        </td>
                                        <?php
                                        if ($detect->isMobile()) {
                                        ?>
                                </tr>
                                <tr>
                                <?php
                                        }
                                ?>
                                <td>
                                    <?php echo $lang["nombre_planta"] ?> <?php echo $planta['Nombre']; ?>
                                </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $lang["tipo_planta"] ?> <?php echo $planta['Tipo_planta']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $lang["epoca_planta"] ?> <?php echo $planta['Epocaano']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php echo $lang["autor_planta"] ?> <?php echo $planta['Autor']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <label class="text-justify"><?php echo $lang["detalle_planta"] ?> <?php echo $planta['Detalle']; ?></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $lang["tiempo_planta"] ?> <?php echo $planta['Duracion']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <?php echo $lang["fecha_planta"] ?> <?php echo $planta['Fecha']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <?php echo "<a href='../editarplanta/cambiarplanta.php?num=$ident'><button type='button' class='btn btn-green'><i class='fas fa-edit'></i> ".$lang["perfil_editar"]."</button></a>"; ?>
                                        <?php echo "<a href='../eliminar/seguro.php?num=$ident'><button type='button' class='btn btn-red'><i class='fas fa-trash-alt'></i> ".$lang["perfil_eliminar"]."</button></a>"; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <?php
                }
                ?>
                <div class="container">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="cambiarcuenta.php"><button type="button" class="btn btn-green"><i class="fas fa-edit"></i> <?php echo $lang["perfil_cambiar"] ?></button></a>
                                    <a href="../../index.php"><button type="button" class="btn btn-green"><i class="fas fa-arrow-left"></i> <?php echo $lang["perfil_volver"] ?></button></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>
</body>

</html>