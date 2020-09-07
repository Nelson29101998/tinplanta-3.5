<?php
session_start();
require "../direcciones/conexiones.php";
include "../conexiones/conexioncuenta.php";

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
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../../css/fondopantalla-style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
    <title><?php echo $lang["titulo_cambiarcuenta"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1 class="displa-4"><?php echo $lang["titulo_cambiarcuenta"] ?></h1>
                    <main>
                        <div class="container">
                            <form name="cambiarcuenta" id="cambiarcuenta" method="POST" onsubmit="return formula()" action="../cambiar/cambiarsing.php">
                                <div class="jumbotron" style="background-color:limegreen;">
                                    <div class="form-group">
                                        <?php
                                        if ($detect->isMobile()) {
                                            while ($buscar = mysqli_fetch_array($resp)) {
                                        ?>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col1"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $buscar['Nombre']; ?>" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col2"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $buscar['Apellidos']; ?>" maxlength="40">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col3"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo $buscar['Usuario']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col4"] ?>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="dir" id="dir" cols="30" rows="1" maxlength="255"><?php echo $buscar['Direccion']; ?></textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col5"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="com" id="com" value="<?php echo $buscar['Comuna']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col6"] ?>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="estcivil" id="estcivil">
                                                                    <?php
                                                                    $est = $buscar['Estado_Civil'];
                                                                    if ($est === "Soltero") {
                                                                    ?>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($est === "Casado") {
                                                                    ?>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($est === "Otro") {
                                                                    ?>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col7"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="rut" id="rut" value="<?php echo $buscar['Rut']; ?>" maxlength="12">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col8"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $buscar['Correo']; ?>" maxlength="255">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col9"] ?>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="discap" id="discap">
                                                                    <?php
                                                                    $dis = $buscar['Discapacidad'];
                                                                    if ($dis === "Si") {
                                                                    ?>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($dis === "No") {
                                                                    ?>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($dis === "Otro") {
                                                                    ?>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            <?php
                                            }
                                        } else {
                                            while ($buscar = mysqli_fetch_array($resp)) {
                                            ?>
                                                <table class="table table-sm table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col1"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $buscar['Nombre']; ?>" maxlength="20">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col2"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo $buscar['Apellidos']; ?>" maxlength="40">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col3"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="user" id="user" value="<?php echo $buscar['Usuario']; ?>" maxlength="100">
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col4"] ?>
                                                            </th>
                                                            <td>
                                                                <textarea class="form-control" name="dir" id="dir" cols="30" rows="1" maxlength="255"><?php echo $buscar['Direccion']; ?></textarea>
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col5"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="com" id="com" value="<?php echo $buscar['Comuna']; ?>" maxlength="100">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col6"] ?>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="estcivil" id="estcivil">
                                                                    <?php
                                                                    $est = $buscar['Estado_Civil'];
                                                                    if ($est === "Soltero") {
                                                                    ?>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($est === "Casado") {
                                                                    ?>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($est === "Otro") {
                                                                    ?>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                                        <option value="Casado"><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                                        <option value="Soltero"><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col7"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="text" class="form-control" name="rut" id="rut" value="<?php echo $buscar['Rut']; ?>" maxlength="12">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col8"] ?>
                                                            </th>
                                                            <td>
                                                                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo $buscar['Correo']; ?>" maxlength="255">
                                                            </td>

                                                            <th class="font-weight-bold align-middle" scope="col" style="text-align: right;">
                                                                <?php echo $lang["cambiarcuenta_tabla_col9"] ?>
                                                            </th>
                                                            <td>
                                                                <select class="form-control" name="discap" id="discap">
                                                                    <?php
                                                                    $dis = $buscar['Discapacidad'];
                                                                    if ($dis === "Si") {
                                                                    ?>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($dis === "No") {
                                                                    ?>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                    <?php
                                                                    } elseif ($dis === "Otro") {
                                                                    ?>
                                                                        <option value="Otro"><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                                        <option value="No"><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                                        <option value="Si"><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="container">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <?php echo '<input type="submit" class="btn btn-green" name="cambiar" id="cambiar" value="' . $lang["cambiarcuenta_tabla_cambiar"] . '">' ?>
                                                        <a href="perfil.php"><button type="button" class="btn btn-green"><?php echo $lang["cambiarcuenta_tabla_cancelar"] ?></button></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </main>
                </center>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="../../js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript">
        function formula() {
            var nom = document.forms['cambiarcuenta']['nombre'].value;
            var apell = document.forms['cambiarcuenta']['apellidos'].value;
            var usuario = document.forms['cambiarcuenta']['user'].value;
            var dir = document.forms['cambiarcuenta']['dir'].value;
            var comun = document.forms['cambiarcuenta']['com'].value;
            var rut = document.forms['cambiarcuenta']['rut'].value;
            var mail = document.forms['cambiarcuenta']['correo'].value;

            if (nom == "" || nom == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_1"] . '");' ?>
                return false;
            }

            if (apell == "" || apell == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_2"] . '");' ?>
                return false;
            }

            if (usuario == "" || usuario == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_3"] . '");' ?>
                return false;
            }

            if (dir == "" || dir == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_4"] . '");' ?>
                return false;
            }

            if (comun == "" || comun == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_5"] . '");' ?>
                return false;
            }

            var cadenarut = rut.length;
            if (rut == "" || rut == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_6"] . '");' ?>
                return false;
            }

            if (cadenarut < 12) {
                <?php echo 'alert("' . $lang["nuevasession_alert_7"] . '");' ?>
                return false;
            }

            if (mail == "" || mail == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_8"] . '");' ?>
                return false;
            }
        }
    </script>
</body>

</html>