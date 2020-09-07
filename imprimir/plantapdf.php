<?php
session_start();

require "../php/direcciones/conexiones.php";
include "../php/conexiones/conexionplanta.php";

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

if (isset($_GET['numpdf'])) {
    // * Para ver una imprimir
    $num = $_GET['numpdf'];
    $sql = "SELECT * FROM plantas WHERE Id = '$num'";
}
$res = mysqli_query($conexionplanta, $sql);

if (isset($_SESSION['Usuario'])) {
    $user = $_SESSION['Usuario'];
    $_SESSION["Usuario"] = $user;
}

require '../TCPDF/tcpdf.php';
$pdf = new TCPDF('P', 'mm', 'A4');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->SetX(50);
$toolcopy = '<center><img src="img/tinplanta.PNG" width="500"></center>';

$pdf->writeHTML($toolcopy, true, 0, true, 0);
$y = $pdf->GetY();
$pdf->SetY($y + 10);
while ($paginapdf = mysqli_fetch_array($res)) {
    $nom = $paginapdf['Nombre'];
    $tipo = $paginapdf['Tipo_planta'];
    $epoca = $paginapdf['Epocaano'];
    $det = $paginapdf['Detalle'];
    $tiempo = $paginapdf['Duracion'];

    $html = "
    <table>
        <tr>
            <td>
                ".$lang["nombre_planta"]." $nom
            </td>
        </tr>
        <tr>
            <td>
                ".$lang["tipo_planta"]." $tipo
            </td>
        </tr>
        <tr>
            <td>
                ".$lang["epoca_planta"]." $epoca
            </td>
        </tr>
        <tr>
            <td><div>".$lang["detalle_planta"]." $det</div></td>
        </tr>
        <tr>
            <td>
                ".$lang["tiempo_planta"]." $tiempo
            </td>
        </tr>
    </table>
    <style>
    table{
        border-collapse:collapse;
    }
    th, td{
        border: 1px solid #888;
        text-align:center;
    }
    div{
        text-align: justify;
        text-justify: auto;
    }
    </style>
    ";

    $pdf->writeHTMLCell(192, 0, 9, '', $html, 0);
}

$pdf->Output($nom . ".pdf", "I");
?>
