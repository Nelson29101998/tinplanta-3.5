<?php

?>
<main>
    <p>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                while ($planta = mysqli_fetch_array($res)) {
                ?>
                    <div class="swiper-slide">
                        <div class="container">
                            <table class="table table-bordered" style="background-color: #fff;">
                                <tbody>
                                    <tr>
                                        <?php
                                        if ($detect->isMobile()) {
                                        ?>
                                            <td class="text-center">
                                            <?php
                                        } else {
                                            ?>
                                            <td rowspan="4" class="text-center">
                                            <?php
                                        }
                                        echo "<img src='" . $planta['Image'] . "' width='200'>";
                                            ?>
                                            </td>
                                            <?php
                                            if ($detect->isMobile()) {
                                            ?>
                                    </tr>
                                    <tr>
                                    <?php
                                            }
                                    ?>
                                    <td>
                                        <?php echo $lang["nombre_planta"] ?> <?php echo $planta['Nombre']; ?>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $lang["tipo_planta"] ?> <?php echo $planta['Tipo_planta']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $lang["epoca_planta"] ?> <?php echo $planta['Epocaano']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?php echo $lang["autor_planta"] ?> <?php echo $planta['Autor']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label class="text-justify"><?php echo $lang["detalle_planta"] ?> <?php echo $planta['Detalle']; ?></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $lang["tiempo_planta"] ?> <?php echo $planta['Duracion']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $lang["fecha_planta"] ?> <?php echo $planta['Fecha']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $lang["menu_idioma"] ?>: <?php echo $planta['Idiomas']; ?>
                                        </td>
                                    </tr>
                                    <?php
                                    if (isset($_SESSION['Usuario'])) {
                                    ?>
                                        <tr>
                                            <td colspan="2">
                                                <?php
                                                $numplant = $planta['Id'];
                                                echo "<a href='imprimir/plantapdf.php?numpdf=$numplant' target='_blank'><button type='button' class='btn btn-blue'><i class='fas fa-print'></i> " . $lang["imprimir_planta"] . " / <i class='fas fa-file-pdf'></i> PDF</button></a>";
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a><button type="button" class="btn btn-yellow"><i class="far fa-star"></i> <?php echo $lang["favorito_planta"] ?></button></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div class="dropdown">
                                                    <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="reportes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <?php echo $lang["acuse_planta"] ?><span class="caret"></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_desnudo"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_violencia"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_acoso"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_suicidio"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_spam"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_odio"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_terror"] ?></a>
                                                        <a class="dropdown-item" href=""><?php echo $lang["acuse_planta_otro"] ?></a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </p>
</main>
<?php

?>