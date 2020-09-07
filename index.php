<?php
session_start();
require "php/direcciones/conexiones.php";
include "php/conexiones/conexioncuenta.php";
include "php/conexiones/conexionplanta.php";

if (isset($_GET["lang"])) {
  $lang = $_GET["lang"];
  if (!empty($lang)) {
    $_SESSION["lang"] = $lang;
  }
}

//!Esto es muy importante para cambiar idioma
//! verificamos la sesion creada
if (isset($_SESSION['lang'])) {
  //! si es true, se crea el require y la variable lang
  $lang_otro = $_SESSION["lang"];
  require "lang/" . $lang_otro . ".php";
  //! si no hay sesion por default se carga el lenguaje espanol
} else {
  require "lang/es.php";
}

require_once 'mobiledetect-php/Mobile_Detect.php';
$detect = new Mobile_Detect;

if (isset($_SESSION['Usuario'])) {
  $user = $_SESSION['Usuario'];
  $_SESSION["Usuario"] = $user;
}

if (isset($_GET['buscar'])) {
  // * Para buscar su planta
  $bus = $_GET['buscar'];
  $sql = "SELECT * FROM plantas WHERE Nombre Like'$bus%'";
} else {
  // * Para ver todas las planta
  if (isset($lang_otro)) {
    if ($lang_otro == "en") {
      $sql = "SELECT * FROM plantas WHERE Idiomas = 'en' ORDER BY Fecha DESC";
    } else if ($lang_otro == "es") {
      $sql = "SELECT * FROM plantas WHERE Idiomas = 'es' ORDER BY Fecha DESC";
    }
  }else {
    $sql = "SELECT * FROM plantas WHERE Idiomas = '$lang' ORDER BY Fecha DESC";
  }
}
$res = mysqli_query($conexionplanta, $sql);
?>

<!DOCTYPE html>
<html lang="es" class="full-height">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="css/mdbootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="css/swiper/swiper.min.css">
  <script src="mobiledetect-js/mobile-detect.js"></script>

  <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
    }

    .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;

      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }

    .active-cyan-4 input[type=search]:focus:not([readonly]) {
      border: 1px solid #4dd0e1;
      box-shadow: 0 0 0 1px #4dd0e1;
    }

    .active-cyan-3 input[type=search] {
      border: 1px solid #4dd0e1;
      box-shadow: 0 0 0 1px #4dd0e1;
    }

    .golden-btn+.golden-btn {
      margin-top: 1em;
    }

    .golden-btn {
      display: inline-block;
      outline: none;
      font-family: inherit;
      font-size: 1em;
      box-sizing: border-box;
      border: none;
      border-radius: .3em;
      height: 2.75em;
      line-height: 2.5em;
      text-transform: uppercase;
      padding: 0 1em;
      box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(110, 80, 20, .4),
        inset 0 -2px 5px 1px rgba(139, 66, 8, 1),
        inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
      background-image: linear-gradient(160deg, #a54e07, #b47e11, #fef1a2, #bc881b, #a54e07);
      border: 1px solid #a55d07;
      color: rgb(120, 50, 5);
      text-shadow: 0 2px 2px rgba(250, 227, 133, 1);
      cursor: pointer;
      transition: all .2s ease-in-out;
      background-size: 100% 100%;
      background-position: center;
    }

    .golden-btn:focus,
    .golden-btn:hover {
      background-size: 150% 150%;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23),
        inset 0 -2px 5px 1px #b17d10,
        inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
      border: 1px solid rgba(165, 93, 7, .6);
      color: rgba(120, 50, 5, .8);
    }

    .golden-btn:active {
      box-shadow: 0 3px 6px rgba(0, 0, 0, .16), 0 3px 6px rgba(110, 80, 20, .4),
        inset 0 -2px 5px 1px #b17d10,
        inset 0 -1px 1px 3px rgba(250, 227, 133, 1);
    }
  </style>

  <title><?php echo $lang["titulo_index"] ?></title>
  <link rel="icon" href="icon/logotin.png">
</head>

<body style="background-color: chartreuse;">
  <div class="container-fluid text-center bg-warning py-3">
    <?php
    // * Todos los temporales de años
    require('php/seasons.php');
    ?>
  </div>

  <?php
  // * Navegación (Nav)
  require('ordenar/navegacion.php');
  ?>

  <?php
  // * Menú (Main)
  require('ordenar/menus.php');
  ?>

  <?php
  // * Pie de Página (Footer)
  require('ordenar/pie.php');
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="js/bootstrap/bootstrap.min.js"></script>

  <script src="js/swiper/swiper.min.js"></script>
  <script>
    var md = new MobileDetect(window.navigator.userAgent);

    if (md.mobile()) {
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 1,
        spaceBetween: 30,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    } else {
      var swiper = new Swiper('.swiper-container', {
        slidesPerView: 2,
        spaceBetween: 30,
        slidesPerGroup: 2,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
      });
    }
  </script>
  <script type="text/javascript">
    function formula() {
      var buscarplanta = document.forms['buscarplanta']['buscar'].value;

      if (buscarplanta == "" || buscarplanta == null) {
        alert("Introduzca su buscar");
        return false;
      }
    }
  </script>
</body>

</html>