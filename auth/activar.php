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

template_config('Activar cuenta', __FILE__);

head();

$saca_error = "";

try {
    if (!isset($_GET["selector"]) || !isset($_GET["token"])) {
        $saca_error = "No se pudo ativar la cuenta asociada";
        throw new Error("El selector o el token no estan definidos");
    }
    $auth->confirmEmail(urldecode($_GET['selector']), urldecode($_GET['token']));
    ?>
    <div class="container">
        Su cuenta ha sido activada con éxito <br>
        Bienvenido
    </div>
    <?php
}
catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
    $saca_error = 'Invalid token';
}
catch (\Delight\Auth\TokenExpiredException $e) {
    $saca_error = 'Token expired';
}
catch (\Delight\Auth\UserAlreadyExistsException $e) {
    $saca_error = 'Email address already exists';
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    $saca_error = 'Too many requests';
}

if ($saca_error) {
    alerta_error($saca_error, "", "El link al que ingreso no es válido");
}

pies();
