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
if (isset($_GET['num'])) {
    $iden = $_GET['num'];
    $sql = "SELECT * FROM plantas WHERE Id = '$iden'";
    $res = mysqli_query($conexionplanta, $sql);
}
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
    <title><?php echo $lang["titulo_cambiarplanta"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <div class="container d-flex h-100">
        <div class="row align-self-center w-100">
            <div class="mx-auto">
                <center>
                    <h1><?php echo $lang["titulo_cambiarplanta"] ?></h1>
                    <main>
                        <div class="container">
                            <form name="planta" id="planta" method="POST" onsubmit="return formula()" action="<?php echo 'actualizarplanta.php?numid=' . $iden; ?>">
                                <div class="jumbotron" style="background-color:limegreen;">
                                    <div class="form-group">
                                        <?php
                                        while ($editar = mysqli_fetch_array($res)) {
                                        ?>
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle"><?php echo $lang["nombre_planta"] ?></label>
                                                            <input type="text" class="form-control" name="nomplanta" id="nomplanta" value="<?php echo $editar['Nombre']; ?>" maxlength="20">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle"><?php echo $lang["tipo_planta"] ?>

                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="hortaliza" <?php echo "value='" . $lang["cambiarplanta_tipo_1"] . "'" ?> <?php
                                                                                                                                                                                                                        if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                                                            if ($editar['Tipo_planta'] == "Hortaliza" || $editar['Tipo_planta'] == "Vegetable") {
                                                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                                                            }
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                        ?>>
                                                                    <label class="custom-control-label" for="hortaliza">
                                                                        <?php echo $lang["cambiarplanta_tipo_1"] ?>
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="legumbre" <?php echo "value='" . $lang["cambiarplanta_tipo_2"] . "'" ?> <?php
                                                                                                                                                                                                                    if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                                                        if ($editar['Tipo_planta'] == "Legumbre" || $editar['Tipo_planta'] == "Legume") {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>>
                                                                    <label class="custom-control-label" for="legumbre">
                                                                        <?php echo $lang["cambiarplanta_tipo_2"] ?>
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="fruta" <?php echo "value='" . $lang["cambiarplanta_tipo_3"] . "'" ?> <?php
                                                                                                                                                                                                                    if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                                                        if ($editar['Tipo_planta'] == "Fruta" || $editar['Tipo_planta'] == "Fruit") {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>>
                                                                    <label class="custom-control-label" for="fruta">
                                                                        <?php echo $lang["cambiarplanta_tipo_3"] ?>
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="cereal" <?php echo "value='" . $lang["cambiarplanta_tipo_4"] . "'" ?> <?php
                                                                                                                                                                                                                    if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                                                        if ($editar['Tipo_planta'] == "Cereal") {
                                                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                                                        }
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                    ?>>
                                                                    <label class="custom-control-label" for="cereal">
                                                                        <?php echo $lang["cambiarplanta_tipo_4"] ?>
                                                                    </label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input" name="checkplanta" id="otro" <?php echo "value='" . $lang["cambiarplanta_tipo_5"] . "'" ?> <?php
                                                                                                                                                                                                                if (isset($editar['Tipo_planta'])) {
                                                                                                                                                                                                                    if ($editar['Tipo_planta'] == "Otro" || $editar['Tipo_planta'] == "Other") {
                                                                                                                                                                                                                        echo "checked";
                                                                                                                                                                                                                    }
                                                                                                                                                                                                                }
                                                                                                                                                                                                                ?>>
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
                                                                <?php
                                                                if ($editar['Epocaano'] == "Verano" || $editar['Epocaano'] == "Summer") {
                                                                ?>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_v"] . "'" ?>><?php echo $lang["estaciones_anos_v"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_o"] . "'" ?>><?php echo $lang["estaciones_anos_o"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_i"] . "'" ?>><?php echo $lang["estaciones_anos_i"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_p"] . "'" ?>><?php echo $lang["estaciones_anos_p"] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Otoño" || $editar['Epocaano'] == "Fall") {
                                                                ?>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_o"] . "'" ?>><?php echo $lang["estaciones_anos_o"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_i"] . "'" ?>><?php echo $lang["estaciones_anos_i"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_p"] . "'" ?>><?php echo $lang["estaciones_anos_p"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_v"] . "'" ?>><?php echo $lang["estaciones_anos_v"] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Invierno" || $editar['Epocaano'] == "Winter") {
                                                                ?>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_i"] . "'" ?>><?php echo $lang["estaciones_anos_i"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_p"] . "'" ?>><?php echo $lang["estaciones_anos_p"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_v"] . "'" ?>><?php echo $lang["estaciones_anos_v"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_o"] . "'" ?>><?php echo $lang["estaciones_anos_o"] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                                <?php
                                                                if ($editar['Epocaano'] == "Primavera" || $editar['Epocaano'] == "Spring") {
                                                                ?>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_p"] . "'" ?>><?php echo $lang["estaciones_anos_p"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_v"] . "'" ?>><?php echo $lang["estaciones_anos_v"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_o"] . "'" ?>><?php echo $lang["estaciones_anos_o"] ?></option>
                                                                    <option <?php echo "value='" . $lang["estaciones_anos_i"] . "'" ?>><?php echo $lang["estaciones_anos_i"] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label class="font-weight-bold align-middle" for="exampleFormControlTextarea2"><?php echo $lang["detalle_planta"] ?></label>
                                                                <textarea class="form-control rounded-0" name="detalle" id="detalle" rows="1" maxlength="255"><?php echo $editar['Detalle']; ?></textarea>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle"><?php echo $lang["tiempo_planta"] ?></label>
                                                            <?php
                                                            $md = $editar['Duracion'];
                                                            $longitud = strlen($md);
                                                            for ($sacar = 1; $sacar < $longitud; $sacar++) {
                                                                if ($md[$sacar] == "M") {
                                                                    $meses = $md[$sacar];
                                                                }
                                                            }

                                                            for ($sacar = 1; $sacar < $longitud; $sacar++) {
                                                                if ($md[$sacar] == "D") {
                                                                    $dias = $md[$sacar];
                                                                }
                                                            }
                                                            ?>
                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkdura" id="mes" value="mes" <?php
                                                                                                                                                        if (isset($meses)) {
                                                                                                                                                            if ($meses == "M") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                                <label class="custom-control-label" for="mes">
                                                                    <?php echo $lang["un_mes"] ?>:
                                                                </label>

                                                                <select class="browser-default custom-select" id="durames" name="durames">
                                                                    <?php
                                                                    if (isset($meses)) {
                                                                        if ($meses == "M") {
                                                                    ?>
                                                                            <option value="<?php echo $md; ?>"><?php echo $md; ?></option>
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>

                                                                    <?php
                                                                    for ($i = 1; $i <= 30; $i++) {
                                                                        if ($i <= 1) {
                                                                            $numeros = $i . " " . $lang["un_mes"];
                                                                            if ($md != $numeros) {
                                                                    ?>
                                                                                <option value="<?php echo $i . ' ' . $lang["un_mes"]; ?>"><?php echo $i . " " . $lang["un_mes"]; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            $numeros = $i . " " . $lang["los_meses"];
                                                                            if ($md != $numeros) {
                                                                            ?>
                                                                                <option value="<?php echo $i . ' ' . $lang["los_meses"]; ?>"><?php echo $i . " " . $lang["los_meses"]; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input" name="checkdura" id="dia" value="dia" <?php
                                                                                                                                                        if (isset($dias)) {
                                                                                                                                                            if ($dias == "D") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                        }
                                                                                                                                                        ?>>
                                                                <label class="custom-control-label" for="dia">
                                                                    <?php echo $lang["un_dia"] ?>:
                                                                </label>

                                                                <select class="browser-default custom-select" id="duradia" name="duradia">
                                                                    <?php
                                                                    if (isset($dias)) {
                                                                        if ($dias == "D") {
                                                                    ?>
                                                                            <option value="<?php echo $md; ?>"><?php echo $md; ?></option>
                                                                        <?php
                                                                        }
                                                                    } else {
                                                                        ?>
                                                                        <option selected value="sele" disabled><?php echo $lang["seleccion"] ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    for ($m = 1; $m <= 250; $m++) {
                                                                        if ($m <= 1) {
                                                                            $numeros = $i . " " . $lang["un_dia"];
                                                                            if ($md != $numeros) {
                                                                    ?>
                                                                                <option value="<?php echo $m . ' ' . $lang["un_dia"]; ?>"><?php echo $m . " " . $lang["un_dia"]; ?></option>
                                                                            <?php
                                                                            }
                                                                        } else {
                                                                            $numeros = $i . " " . $lang["los_dias"];
                                                                            if ($md != $numeros) {
                                                                            ?>
                                                                                <option value="<?php echo $m . ' ' . $lang["los_dias"]; ?>"><?php echo $m . " " . $lang["los_dias"]; ?></option>
                                                                    <?php
                                                                            }
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="font-weight-bold align-middle"><?php echo $lang["cambiarplanta_url"] ?></label>
                                                            <input type="text" class="form-control" name="imagen" id="imagen" value="<?php echo $editar['Image']; ?>" maxlength="255">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <?php echo '<input type="submit" class="btn btn-green" name="switch" id="switch" value="' . $lang["cambiarplanta_cambiar"] . '">' ?>
                                                            <a href="../perfil/perfil.php"><button type="button" class="btn btn-green"><?php echo $lang["cambiarplanta_cancelar"] ?></button></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        <?php
                                        }
                                        ?>
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
        var nom = document.forms['planta']['nomplanta'].value;
        var tipla = document.forms['planta']['checkplanta'].value;
        var ano = document.forms['planta']['ano'].value;
        var det = document.forms['planta']['detalle'].value;
        var tiempo = document.forms['planta']['checkdura'].value;
        var durames = document.forms['planta']['durames'].value;
        var duradia = document.forms['planta']['duradia'].value;

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
    }
</script>


</html>