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

$titulo = "Registro";


$e_message = "";



if (isset($_POST["correo-e"]) && isset($_POST["clave"]) && isset($_POST["clave-2"])) {

    $auth->register($_POST["correo"], $_POST["clave"], $_POST["clave-2"], [], '', true);

}


head();
?>

<!-- Tight container -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">




            <h1>Registrarse</h1>

            <br/>

            <form action="." method="post">
                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo-e" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo-e" id="correo-e"
                        aria-describedby="helpId-correo-e" placeholder="Ej: pepitoperez@ejemplo.com" required />
                    <small id="helpId-correo-e" class="form-text text-info">Ingrese aquí el correo que va a estar asociado a su cuenta</small>
                </div>


                <!-- Clave -->
                <div class="mb-3">
                    <label for="clave" class="form-label">Nueva clave</label>
                    <input type="text" class="form-control" name="clave" id="clave"
                    aria-describedby="helpId-clave" placeholder="Clave..." required />
                    <small id="helpId-clave" class="form-text text-info">Esta será la clave de su cuenta. Asegúrese de que sea segura y utilice al menos 1 número, 1 letra mayúscula y 1 carácter especial</small>
                </div>
                <div class="mb-3">
                    <br>
                    <label for="clave-2" class="form-label">Nueva clave otra vez</label>
                    <input type="text" class="form-control" name="clave-2" id="clave-2"
                    aria-describedby="helpId-clave" placeholder="Clave..." required />
                    <small id="helpId-clave" class="form-text text-info">Escriba la clave de nuevo</small>
                </div>


                <!-- Enviar -->
                <div class="mb-3">
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                    >
                        Enviar
                    </button>
                </div>

                <div class="mb-3 text-center">
                    <small>
                        <a href="./ingreso.php">
                            Ya tengo una cuenta
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