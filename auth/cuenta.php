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

require_once __DIR__ . '/../include/auth.php';
require_once __DIR__ . '/../include/template.php';


$titulo = 'Mi cuenta';

head();

if (!$auth->isLoggedIn()) {
    ?>
    <div class="container">
        Primer necesitas ingresar con tus credenciales. Para hacerlo ve a <a href="/auth/ingreso.php">Ingreso</a>.
    </div>
    <?php
    pies();
    die;
}

?>


<div class="container">
    <p>
        Bienvenido <?php echo $auth->getUsername(); ?>
    </p>

    <div>
        <a href="./cerrar_sesion.php">Cerrar sesión</a>
    </div>

</div>





<?php

pies();


