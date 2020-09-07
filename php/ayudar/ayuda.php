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

if (isset($_SESSION['Usuario'])) {
  $user = $_SESSION['Usuario'];
  $_SESSION["Usuario"] = $user;
}
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../../css/fondopantalla-style.css">
  <style>
    body,
    html {
      height: 100%;
    }
  </style>
  <title><?php echo $lang["titulo_ayuda"] ?></title>
  <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
  <div class="container d-flex h-100">
    <div class="row align-self-center w-100">
      <div class="mx-auto">
        <center>
          <div class="animated fadeInDown">
            <h1><?php echo $lang["titulo_ayuda_2"] ?></h1>
          </div>
          <main>
            <div class="animated fadeIn">
              <form id="forml" name="forml" method="post" onsubmit="return formularios()" action="cargaayuda.php">
                <div class="jumbotron" style="background-color: limegreen">
                  <div class="form-group">
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <select class="form-control" id="ayuda" name="ayuda">
                              <option value="sele"><?php echo $lang["ayuda_seleccion"] ?></option>
                              <option <?php echo "value='" . $lang["ayuda_seleccion_1"] . "'" ?>><?php echo $lang["ayuda_seleccion_1"] ?></option>
                              <option <?php echo "value='" . $lang["ayuda_seleccion_2"] . "'" ?>><?php echo $lang["ayuda_seleccion_2"] ?></option>
                              <option <?php echo "value='" . $lang["ayuda_seleccion_3"] . "'" ?>><?php echo $lang["ayuda_seleccion_3"] ?></option>
                              <option <?php echo "value='" . $lang["ayuda_seleccion_4"] . "'" ?>><?php echo $lang["ayuda_seleccion_4"] ?></option>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;"> <textarea class="form-control" name="pregunta" id="pregunta" rows="10" cols="30"></textarea> </td>
                        </tr>
                        <tr>
                          <td style="text-align: right;"> <label><?php echo $lang["ayuda_mail"] ?> </label><input class="form-control" name="correo" id="correo" size="30" type="email"> </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">
                            <?php echo '<input class="btn btn-green" name="enviar" value="' . $lang["ayuda_enviar"] . '" type="submit">' ?>
                            <a href="../../index.php"><button type="button" class="btn btn-green" name="vol" id="vol"><?php echo $lang["ayuda_volver"] ?></button></a>
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
  <script>
    function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
    }
  </script>
  <script type="text/javascript">
    function formularios() {
      var sel = document.forms["forml"]["ayuda"].value;
      var textos = document.forms["forml"]["pregunta"].value;
      var cor = document.forms["forml"]["correo"].value;

      if (sel == "sele") {
        alert("poner el selección");
        return false;
      }
      if (textos == null || textos == "") {
        alert("Te falta ingresa de texto");
        return false;
      }
      if (cor == null || cor == "") {
        alert("Ingresa su mail");
        return false;
      }
    }
  </script>
</body>

</html>