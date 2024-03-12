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



function imagen_juego(int $id, string $nombre, string $href, string $desc = "")
{
    ?>
    <div class="col-2 col-juego"
    >
    <!-- Ponerlo tooltips T*T -->
        <a class="boton-juego" href="<?php echo $href; ?>" target="_blank" >
            <img src="./img-juego.php?id=<?php echo dechex($id); ?>"
            alt="Imagen de <?php echo htmlspecialchars($nombre); ?>"
            data-bs-toggle="tooltip" data-bs-placement="auto"
            data-bs-title="<b><?php echo htmlspecialchars($nombre); ?></b><br/><?php echo $desc; ?>"
            data-bs-custom-class="boton-juego-tooltip"
            data-bs-html="true"
            >
        </a>
    </div>
    <?php
}


function get_juegos(): array {
    global $db;
    $query_string = "SELECT * FROM `juegos` WHERE `hidden` = 0";
    $query = $db->prepare($query_string);
    $worked = $query->execute();
    if ($worked) {
        $res = $query->fetchAll();
        return $res;
    }
    return array();
}

$juegos = get_juegos();

// si sí hay juegos
if (sizeof($juegos) > 0) {
?>
<div class="row justify-content-center align-items-start g-2">

    <?php

    foreach ($juegos as $juego) {
        imagen_juego($juego["id"], $juego["nombre"], $juego["href"], $juego["desc"]);
    }

    ?>
</div>

<?php
} else {
    // si no hay juegos
    ?>
        <div class="container-sm">
            <div class="bloque mx-auto">
                Por ahora no hay ningún juego disponible 😿
            </div>
        </div>
    <?php
}


pies();