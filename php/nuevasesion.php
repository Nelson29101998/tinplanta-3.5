<?php
session_start();

//!Esto es muy importante para cambiar idioma
//! verificamos la sesion creada
if (isset($_SESSION['lang'])) {
    //! si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require "../lang/" . $lang . ".php";
    //! si no hay sesion por default se carga el lenguaje espanol
} else {
    require "../lang/es.php";
}
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../css/mdbootstrap/css/mdb.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../css/fondopantalla-style.css">
    <style>
        body,
        html {
            height: 100%;
        }
    </style>
    <title><?php echo $lang["titulo_nuevasession"] ?></title>
    <link rel="icon" href="../icon/logotin.png">
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1><?php echo $lang["titulo_nuevasession_otro"] ?></h1>
                    <main>
                        <div class="container">
                            <form name="nuevacuenta" id="nuevacuenta" method="POST" onsubmit="return formula()" action="subir/guardacuenta.php">
                                <div class="jumbotron" style="background-color: limegreen">
                                    <div class="form-group">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-signature"></i> <?php echo $lang["cambiarcuenta_tabla_col1"] ?></label>
                                                        <input type="text" class="form-control" name="nombre" id="nombre" maxlength="20">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-signature"></i> <?php echo $lang["cambiarcuenta_tabla_col2"] ?></label>
                                                        <input type="text" class="form-control" name="apellidos" id="apellidos" maxlength="40">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-user"></i> <?php echo $lang["cambiarcuenta_tabla_col3"] ?></label>
                                                        <input type="text" class="form-control" name="user" id="user" maxlength="100">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-home"></i> <?php echo $lang["cambiarcuenta_tabla_col4"] ?></label>
                                                        <textarea class="form-control" cols="30" rows="1" name="dir" id="dir" maxlength="255"></textarea>
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"> <?php echo $lang["cambiarcuenta_tabla_col5"] ?></label>
                                                        <input type="text" class="form-control" name="com" id="com" maxlength="100">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-atlas"></i> <?php echo $lang["cambiarcuenta_tabla_col6"] ?></label>
                                                        <select class="form-control" name="estcivil" id="estcivil">
                                                            <option value="sele">Selección / Selection</option>
                                                            <option <?php echo 'value="' . $lang["cambiarcuenta_tabla_col6_casado"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col6_casado"] ?></option>
                                                            <option <?php echo 'value="' . $lang["cambiarcuenta_tabla_col6_soltero"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col6_soltero"] ?></option>
                                                            <option <?php echo 'value="' . $lang["cambiarcuenta_tabla_col6_otro"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col6_otro"] ?></option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-registered"></i> <?php echo $lang["cambiarcuenta_tabla_col7"] ?></label>
                                                        <input type="text" class="form-control" name="rut" id="rut" maxlength="12">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-at"></i> <?php echo $lang["cambiarcuenta_tabla_col8"] ?></label>
                                                        <input type="email" class="form-control" name="correo" id="correo" maxlength="255">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-universal-access"></i> <?php echo $lang["nuevasession_tabla_colm_1"] ?></label>
                                                        <select class="form-control" name="disc" id="disc">
                                                            <option value="sele">Selección / Selection</option>
                                                            <option <?php 'value="' . $lang["cambiarcuenta_tabla_col9_si"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col9_si"] ?></option>
                                                            <option <?php 'value="' . $lang["cambiarcuenta_tabla_col9_no"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col9_no"] ?></option>
                                                            <option <?php 'value="' . $lang["cambiarcuenta_tabla_col9_otro"] . '"' ?>><?php echo $lang["cambiarcuenta_tabla_col9_otro"] ?></option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-key"></i> <?php echo $lang["nuevasession_tabla_colm_2"] ?></label>
                                                        <input type="password" class="form-control" name="pass1" id="pass1" maxlength="255">
                                                    </td>

                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-key"></i> <?php echo $lang["nuevasession_tabla_colm_3"] ?></label>
                                                        <input type="password" class="form-control" name="pass2" id="pass2" maxlength="255">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <?php echo '<input type="submit" class="btn btn-green" name="enviar" id="enviar" value="' . $lang["nuevasession_ok"] . '">' ?>
                                    <a href="../index.php"><button type="button" class="btn btn-green"><?php echo $lang["nuevasession_volver"] ?></button></a>
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
    <script src="../js/bootstrap/bootstrap.min.js"></script>

    <script type="text/javascript">
        function formula() {
            var nom = document.forms['nuevacuenta']['nombre'].value;
            var apell = document.forms['nuevacuenta']['apellidos'].value;
            var usuario = document.forms['nuevacuenta']['user'].value;
            var dir = document.forms['nuevacuenta']['dir'].value;
            var comun = document.forms['nuevacuenta']['com'].value;
            var ec = document.forms['nuevacuenta']['estcivil'].value;
            var rut = document.forms['nuevacuenta']['rut'].value;
            var mail = document.forms['nuevacuenta']['correo'].value;
            var disc = document.forms['nuevacuenta']['disc'].value;
            var pass1 = document.forms['nuevacuenta']['pass1'].value;
            var pass2 = document.forms['nuevacuenta']['pass2'].value;

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

            if (ec == "sele") {
                <?php echo 'alert("' . $lang["nuevasession_alert_6"] . '");' ?>
                return false;
            }

            var cadenarut = rut.length;
            if (rut == "" || rut == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_7"] . '");' ?>
                return false;
            }

            if (cadenarut < 12) {
                <?php echo 'alert("' . $lang["nuevasession_alert_8"] . '");' ?>
                return false;
            }

            if (mail == "" || mail == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_9"] . '");' ?>
                return false;
            }

            if (disc == "sele") {
                <?php echo 'alert("' . $lang["nuevasession_alert_10"] . '");' ?>
                return false;
            }

            if (pass1 == "" || pass1 == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_11"] . '");' ?>
                return false;
            }

            if (pass2 == "" || pass2 == null) {
                <?php echo 'alert("' . $lang["nuevasession_alert_12"] . '");' ?>
                return false;
            }

            if (pass1 != pass2) {
                <?php echo 'alert("' . $lang["nuevasession_alert_13"] . '");' ?>
                return false;
            }
        }
    </script>
</body>

</html>