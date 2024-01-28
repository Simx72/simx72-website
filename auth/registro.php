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
 * any later version.s
 */

require_once __DIR__ . '/../include/auth.php';
require_once __DIR__ . '/../include/template.php';

/* $auth-> */



head();
?>

<!-- Tight container -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">




            <h1>Registrarse</h1>

            <br>

            <form action="." method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo-e" id="correo-e"
                        aria-describedby="helpId-correo-e" placeholder="Ej: pepitoperez@ejemplo.com" />
                    <small id="helpId-correo-e" class="form-text text-muted">Help text</small>
                </div>
            </form>





        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php
pies();