<?php
session_start();
if (isset($_SESSION["Usuario"])) {
    unset($_SESSION["Usuario"]);
}

if (isset($_SESSION["Correo"])) {
    unset($_SESSION["Correo"]);
}
session_destroy();
header('Location: ../index.php');
