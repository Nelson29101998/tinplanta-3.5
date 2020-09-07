<?php
session_start();

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
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
    <title><?php echo $lang["titulo_crearplanta"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1><?php echo $lang["titulo_crearplanta"] ?></h1>
                    <main>
                        <div class="container">
                            <form name="planta" id="planta" method="POST" onsubmit="return formula()" action="guardaplantas.php" enctype="multipart/form-data">
                                <div class="jumbotron" style="background-color:limegreen;">
                                    <div class="form-group">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-signature"></i><?php echo $lang["nombre_planta"] ?></label>
                                                        <input type="text" class="form-control" name="nomplanta" id="nomplanta" maxlength="20">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-seedling"></i> <?php echo $lang["tipo_planta"] ?>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkplanta" id="hortaliza" <?php echo "value='" . $lang["cambiarplanta_tipo_1"] . "'" ?>>
                                                                <label class="custom-control-label" for="hortaliza">
                                                                    <?php echo $lang["cambiarplanta_tipo_1"] ?>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkplanta" id="legumbre" <?php echo "value='" . $lang["cambiarplanta_tipo_2"] . "'" ?>>
                                                                <label class="custom-control-label" for="legumbre">
                                                                    <?php echo $lang["cambiarplanta_tipo_2"] ?>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkplanta" id="fruta" <?php echo "value='" . $lang["cambiarplanta_tipo_3"] . "'" ?>>
                                                                <label class="custom-control-label" for="fruta">
                                                                    <?php echo $lang["cambiarplanta_tipo_3"] ?>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkplanta" id="cereal" <?php echo "value='" . $lang["cambiarplanta_tipo_4"] . "'" ?>>
                                                                <label class="custom-control-label" for="cereal">
                                                                    <?php echo $lang["cambiarplanta_tipo_4"] ?>
                                                                </label>
                                                            </div>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkplanta" id="otro" <?php echo "value='" . $lang["cambiarplanta_tipo_5"] . "'" ?>>
                                                                <label class="custom-control-label" for="otro">
                                                                    <?php echo $lang["cambiarplanta_tipo_5"] ?>
                                                                </label>
                                                            </div>
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><?php echo $lang["epoca_planta"] ?></label>
                                                        <select class="browser-default custom-select" id="ano" name="ano">
                                                            <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                            <option <?php echo "value='" . $lang["estaciones_anos_v"] . "'" ?>><?php echo $lang["estaciones_anos_v"] ?></option>
                                                            <option <?php echo "value='" . $lang["estaciones_anos_o"] . "'" ?>><?php echo $lang["estaciones_anos_o"] ?></option>
                                                            <option <?php echo "value='" . $lang["estaciones_anos_i"] . "'" ?>><?php echo $lang["estaciones_anos_i"] ?></option>
                                                            <option <?php echo "value='" . $lang["estaciones_anos_p"] . "'" ?>><?php echo $lang["estaciones_anos_p"] ?></option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold align-middle" for="exampleFormControlTextarea2"><i class="fas fa-info-circle"></i> <?php echo $lang["detalle_planta"] ?></label>
                                                            <textarea class="form-control rounded-0" name="detalle" id="detalle" rows="1" maxlength="255"></textarea>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label class="font-weight-bold align-middle"><i class="fas fa-clock"></i> <?php echo $lang["tiempo_planta"] ?></label>
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" name="checkdura" id="mes" value="mes">
                                                            <label class="custom-control-label" for="mes">
                                                                <?php echo $lang["un_mes"] ?>:
                                                            </label>

                                                            <select class="browser-default custom-select" id="durames" name="durames">
                                                                <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                                <?php
                                                                for ($i = 1; $i <= 30; $i++) {
                                                                    if ($i <= 1) {
                                                                ?>
                                                                        <option value="<?php echo $i . ' ' . $lang["un_mes"]; ?>"><?php echo $i . " " . $lang["un_mes"]; ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?php echo $i . ' ' . $lang["los_meses"]; ?>"><?php echo $i . " " . $lang["los_meses"]; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" name="checkdura" id="dia" value="dia">
                                                            <label class="custom-control-label" for="dia">
                                                                <?php echo $lang["un_dia"] ?>:
                                                            </label>

                                                            <select class="browser-default custom-select" id="duradia" name="duradia">
                                                                <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                                <?php
                                                                for ($m = 1; $m <= 250; $m++) {
                                                                    if ($m <= 1) {
                                                                ?>
                                                                        <option value="<?php echo $m . ' ' . $lang["un_dia"]; ?>"><?php echo $m . " " . $lang["un_dia"]; ?></option>
                                                                    <?php
                                                                    } else {
                                                                    ?>
                                                                        <option value="<?php echo $m . ' Días'; ?>"><?php echo $m . " Días"; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="imagen" class="font-weight-bold align-middle"><i class="fas fa-image"></i> <?php echo $lang["cambiarplanta_url"] ?></label>
                                                        <input type="text" class="form-control" id="imagen" name="imagen" maxlength="255">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <label for="idiomas" class="font-weight-bold align-middle"><?php echo $lang["menu_idioma"] ?></label>
                                                        <select class="browser-default custom-select" id="idioma" name="idioma">
                                                            <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                            <option value="es"><?php echo $lang["menu_idioma_esp"] ?></option>
                                                            <option value="en"><?php echo $lang["menu_idioma_eng"] ?></option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <button type="submit" name="guard" id="guard" class="btn btn-green"><i class="fas fa-cloud-upload-alt"></i> <?php echo $lang["crearplanta_enviar"] ?></button>
                                                        <a href="../../index.php"><button type="button" class="btn btn-green"><?php echo $lang["crearplanta_volver"] ?></button></a>
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
</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="../../js/bootstrap/bootstrap.min.js"></script>

<script type="text/javascript">
    $(".alert").alert()
</script>

<script type="text/javascript">
    function formula() {
        var imagen = document.forms['planta']['imagen'].value;
        var nom = document.forms['planta']['nomplanta'].value;
        var tipla = document.forms['planta']['checkplanta'].value;
        var ano = document.forms['planta']['ano'].value;
        var det = document.forms['planta']['detalle'].value;
        var tiempo = document.forms['planta']['checkdura'].value;
        var durames = document.forms['planta']['durames'].value;
        var duradia = document.forms['planta']['duradia'].value;
        var idiomas = document.forms['planta']['idioma'].value;

        if (nom == "" || nom == null) {
            <?php echo 'alert("' . $lang["crearplanta_alert_1"] . '");' ?>
            return false;
        }

        if (tipla == "" || tipla == null) {
            <?php echo 'alert("' . $lang["crearplanta_alert_2"] . '");' ?>
            return false;
        }

        if (ano == "sele") {
            <?php echo 'alert("' . $lang["crearplanta_alert_3"] . '");' ?>
            return false;
        }

        if (det == "" || det == null) {
            <?php echo 'alert("' . $lang["crearplanta_alert_4"] . '");' ?>
            return false;
        }

        if (tiempo == "" || tiempo == null) {
            <?php echo 'alert("' . $lang["crearplanta_alert_5"] . '");' ?>
            return false;
        }

        if (durames == "sele" && duradia == "sele") {
            <?php echo 'alert("' . $lang["crearplanta_alert_6"] . '");' ?>
            return false;
        }

        if (imagen == "" || imagen == null) {
            <?php echo 'alert("' . $lang["crearplanta_alert_7"] . '");' ?>
            return false;
        }

        if (idiomas == "sele") {
            <?php echo 'alert("' . $lang("crearplanta_alert_8") . '");' ?>
        }
    }
</script>


</html>