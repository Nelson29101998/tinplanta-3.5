<?php
$meses = date("m"); //*Meses
$dias = date("d"); //*Días

if ($meses == 1 && $dias <= 10) { // * Año Nuevo
?>
    <img src="http://drive.google.com/uc?id=1G02uH-Or_Os50sJhjkwSRoJVopDgBysd" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="400">
<?php
} else if ($meses == 2 && $dias <= 17) { // * Valentin
?>
    <img src="http://drive.google.com/uc?id=1LZwxQ0XSO2IkkZj3DIiW1vapnxppjBsp" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="400">
    <?php
} else if ($meses == 4) {
    if ($dias == 21 || $dias == 22) { // * Día de la tierra
    ?>
        <img src="http://drive.google.com/uc?id=1klxP6u5wq6xWleZ-WuIYIHPdl4ba0-8e" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="400">
    <?php
    } else { // * Pascua
    ?>
        <img src="http://drive.google.com/uc?id=1zbuAbr_rbpZFtOasDd7ywBm3zAhMtUyj" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
    <?php
    }
} else if ($meses == 9) { // * Fiesta Patria
    ?>
    <img src="http://drive.google.com/uc?id=11WfoD6KiO_K13E5sZNoKuliWeVD5yHSt" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
<?php
} else if ($meses == 10) { // * Halloween
?>
    <img src="http://drive.google.com/uc?id=1IIhG_x-Z9Qu4wChpIpaFYikQsi3gYj8G" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
<?php
} else if ($meses == 12) { // * Navidad
?>
    <img src="http://drive.google.com/uc?id=1lP8g4wAPNjIfssRYuwVHqiFi4dg_AqtZ" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
<?php
} else { // * Normal
?>
    <img src="http://drive.google.com/uc?id=16yHHkXWlqx5tzo21075pNeJpV1Xl1MIt" class="animated fadeInDown delay-1s" alt="nomemp" id="nomemp" width="300">
<?php
}
?>