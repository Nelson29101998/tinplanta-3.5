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

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/Exception.php';
require '../PHPMailer/PHPMailer.php';
require '../PHPMailer/SMTP.php';

require "../direcciones/conexiones.php";
include "../conexiones/conexioncuenta.php";
include "../direcciones/url.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/mdbootstrap/css/mdb.min.css">
    <title><?php echo $lang["titulo_cargaayuda"] ?></title>
    <link rel="icon" href="../../icon/logotin.png">
</head>

<body>
    <?php
    if (isset($_POST['correo'])) {

        $de = $_POST['correo'];
        $pregunta = $_POST['pregunta'];
        $solucion = $_POST['ayuda'];

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'nelsonmouatvergara@gmail.com';                     // SMTP username
            $mail->Password   = 'xzhsmmaehfzkloay';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($de, 'Tinplanta');
            $mail->addAddress('nelsonmouatvergara@gmail.com');

            // Content
            $mail->CharSet = 'UTF-8';
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $lang["cargaayuda_subject"] . ' ' . $solucion;
            $mail->Body    = "<h1>$solucion</h1> <p>" . $pregunta . "</p>";

            $mail->send();
            echo "<center><h1>" . $lang["cargaayuda_ok"] . "</h1>
            <a href='../../index.php'><button type='button' class='btn btn-primary'>" . $lang["cargaayuda_volver"] . "</button></a></center>";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<center>
            <p>
            <h1 class='display-4'>" . $lang["cargaayuda_error"] . "</h1>
            <a href='../../index.php'><button type='button' class='btn btn-primary'>" . $lang["cargaayuda_volver"] . "</button></a>
            </p>
            </center>";
    }
    ?>
</body>

</html>