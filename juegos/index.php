<?php
/*
 * Simx72 website
 * 
 * @author Simx72
 * @link mailto:angel2600@proton.me
 * @link http://sdesim.ca/
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html
 * -----
 * Copyright (C) 2024  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */




require_once __DIR__ . "/../include/template.php";
require_once __DIR__ . "/../include/db.php";

template_config("Juegos", __FILE__);



head();
?>
<link rel="stylesheet" href="/build/css/juegos.css" type="text/css">
<?php



function imagen_juego()
{
    ?>
    
    <div class="col-2 boton-juego"
        data-bs-toggle="tooltip"
    >
    <!-- Poner tooltips T*T -->
        <img src="/auth/img-cuenta.php" alt=""
        data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Tooltip del juego"
        data-bs-custom-class="boton-juego-tooltip"
        >
    </div>
    <?php
}


?>
<div class="row justify-content-center align-items-start g-2">

    <?php

    for ($i = 0; $i < 30; $i++) {
        imagen_juego();
    }

    ?>
</div>

<?php


pies();