<?php

?>
<nav class="navbar navbar-expand-lg navbar-dark green sticky-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="menus">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="idiomas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="idiomas_icon/countries.png" alt="paises" style="width: 22px;"> <?php echo $lang["menu_idioma"] ?><span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="index.php?lang=es"><img src="idiomas_icon/chile.png" alt="espanol" style="width: 30px;"> <?php echo $lang["menu_idioma_esp"] ?></a>
                    <a class="dropdown-item" href="index.php?lang=en"><img src="idiomas_icon/united-states-of-america.png" alt="ingles" style="width: 30px;"> <?php echo $lang["menu_idioma_eng"] ?></a>
                </div>
            </li>

            <li class="nav-item">
                <a href="acercade.php"><button type="button" class="btn btn-light-green" name="acercade" id="acercade"><i class="fas fa-book"></i> <?php echo $lang["menu_acerca"] ?></button></a>
            </li>

            <li>
                <a href="php/ayudar/ayuda.php"><button type="button" class="btn btn-light-green" name="ayuda" id="ayuda"><i class="fas fa-hands-helping"></i> <?php echo $lang["menu_ayuda"] ?></button></a>
            </li>

            <li class="nav-item dropdown">
                <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="mdamb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-leaf"></i> <?php echo $lang["menu_ambiente"] ?><span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="medio_ambiente/energia_solar.php"><i class="fas fa-solar-panel"></i> <?php echo $lang["menu_ambiente_solar"] ?></a>
                    <a class="dropdown-item" href="medio_ambiente/energia_eolica.php"><i class="fas fa-fan"></i> <?php echo $lang["menu_ambiente_eolica"] ?></a>
                    <a class="dropdown-item" href="medio_ambiente/auto_electrico.php"><i class="fas fa-charging-station"></i> <?php echo $lang["menu_ambiente_auto"] ?></a>
                    <a class="dropdown-item" href=""><i class="fas fa-recycle"></i> <?php echo $lang["menu_ambiente_recl"] ?></a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="buscar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search"></i> <?php echo $lang["menu_buscar"] ?><span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <form class="form-group" name="buscarplanta" id="buscarplanta" method="GET" onsubmit="return formula()">
                        <div class="active-cyan-3 active-cyan-4 mb-4">
                        <?php echo "<input class='form-control' type='search' placeholder='".$lang["menu_buscar_nom"]."' aria-label='Nombre de planta' name='buscar' id='buscar'>
                        " ?>
                            </div>
                        <div class="dropdown-divider"></div>
                        <button type="submit" class="btn btn-light-green"><i class="fas fa-search"></i> <?php echo $lang["menu_buscar_enc"] ?></button>
                        <a class="dropdown-item" href="index.php"><i class="fas fa-seedling"></i> <?php echo $lang["menu_buscar_todas"] ?></a>
                    </form>
                </div>
            </li>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li>
                    <a href="php/creadoplanta/crearplanta.php"><button type="button" class="btn btn-light-green" name="nuevaplanta" id="nuevaplanta"><i class="fas fa-leaf"></i> <?php echo $lang["menu_nueva_planta"] ?></button></a>
                </li>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item">
                    <a href="php/perfil/perfil.php"><button type="button" class="btn btn-light-green" name="perfil" id="perfil"><i class="fas fa-id-card"></i> <?php echo $lang["menu_perfil"] ?></button></a>
                </li>
            <?php
            }
            ?>

            <?php
            if (empty($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item dropdown">
                    <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="cuentas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-portrait"></i> <?php echo $lang["menu_cuenta"] ?><span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="html/iniciasesion.html"><i class="fas fa-sign-in-alt"></i> <?php echo $lang["menu_cuenta_inicia"] ?></a>
                        <a class="dropdown-item" href="php/nuevasesion.php"><i class="fas fa-user-circle"></i> <?php echo $lang["menu_cuenta_nueva"] ?></a>
                        <a class="dropdown-item" href="html/olvido.html"><i class="fas fa-key"></i> <?php echo $lang["menu_cuenta_olvido"] ?></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=""><i class="fas fa-user-cog"></i> <?php echo $lang["menu_cuenta_adm"] ?></a>
                    </div>
                </li>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item">
                    <a href="php/cerrar.php"><button type="button" class="btn btn-light-green" name="cerrar" id="cerrar"><i class="fas fa-sign-out-alt"></i> <?php echo $lang["menu_cuenta_cerrar"] ?></button></a>
                </li>
            <?php
            }
            ?>

            <li class="nav-item">
                <a href=""><button type="button" class="btn golden-btn"><i class="fas fa-crown"></i> Premium</button></a>
            </li>
        </ul>
    </div>
</nav>
<?php

?>