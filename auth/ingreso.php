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


$titulo = "Ingreso";


$saca_error = "";

if ($auth->isLoggedIn()) {
    header('Location: ./cuenta.php');
    die;
}


if (isset($_POST["correo-e"]) && isset($_POST["clave"])) {
    $correo = $_POST["correo-e"]; $clave = $_POST["clave"];
    
    try {
        $auth->login($_POST['correo-e'], $_POST['clave']);
        if ($auth->isLoggedIn()) {
            header('Location: ./cuenta.php');
            die;
        }
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        $saca_error = 'Wrong email address';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $saca_error = 'Wrong password';
    }
    catch (\Delight\Auth\EmailNotVerifiedException $e) {
        $saca_error = 'Email not verified';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $saca_error = 'Too many requests';
    }
        

    if ($saca_error != "") {
        head();
        alerta_error($saca_error, "ingreso.php");
        pies();
    }

} else {



head();
?>

<!-- Tight container -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">




            <h1>Ingresar</h1>

            <br />

            <?php verificar_conexion(); ?>

            <form action="ingreso.php" method="post">
                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo-e" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo-e" id="correo-e"
                        aria-describedby="helpId-correo-e" placeholder="Correo ..." required />
                </div>


                <!-- Clave -->
                <div class="mb-3">
                    <label for="clave" class="form-label">Clave</label>
                    <input type="password" class="form-control" name="clave" id="clave" aria-describedby="helpId-clave"
                        placeholder="Clave..." required />
                </div>
                <br>


                <!-- Enviar -->
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Enviar
                    </button>
                </div>

                <div class="mb-3 text-center">
                    <small>
                        <a href="./registro.php">
                            Aún no tengo una cuenta
                        </a>
                    </small>
                </div>



            </form>





        </div>
        <div class="col-md-4"></div>
    </div>
</div>

<?php
pies();

}