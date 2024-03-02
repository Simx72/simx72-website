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


$saca_error = "";

echo "\t  \n";

// if (attempting to register)
if (isset($_POST["correo-e"]) && isset($_POST["clave"]) && isset($_POST["clave-2"]) && isset($_POST["apodo"])) {
    $correo = $_POST["correo-e"]; $clave = $_POST["clave"]; $clave2 = $_POST["clave-2"]; $apodo = $_POST["apodo"];
    
    
    try {
        if ($clave != $clave2) {
            $saca_error = "Las claves no coinciden. Inténtelo de nuevo";
            throw new Exception("Las claves no coinciden");
        }
        $userId = $auth->register($correo, $clave, $apodo, function ($selector, $token) {
            // mail("noreply@sdesim.ca", "Asunto", "Holaa");
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
            echo '  For SMS, consider using a third-party service and a compatible SDK';
        });
    
        echo 'We have signed up a new user with the ID ' . $userId;
    }
    catch (\Delight\Auth\InvalidEmailException $e) {
        $saca_error = 'Invalid email address';
    }
    catch (\Delight\Auth\InvalidPasswordException $e) {
        $saca_error = 'Invalid password';
    }
    catch (\Delight\Auth\UserAlreadyExistsException $e) {
        $saca_error = 'User already exists';
    }
    catch (\Delight\Auth\TooManyRequestsException $e) {
        $saca_error = 'Too many requests';
    }

    var_dump("Heloo");

} else { // if (not registering)

    
    head();
    ?>

<!-- Tight container -->
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
            
            
            
            <h1>Registrarse</h1>
            
            <br/>
            
            <form action="registro.php" method="post">
                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo-e" class="form-label">Correo</label>
                    <input type="text" class="form-control" name="correo-e" id="correo-e"
                    aria-describedby="helpId-correo-e" placeholder="Ej: pepitoperez@ejemplo.com" required />
                    <small id="helpId-correo-e" class="form-text text-info">Ingrese aquí el correo que va a estar asociado a su cuenta</small>
                </div>
                
                <!-- Apodo -->
                <div class="mb-3">
                    <label for="apodo" class="form-label">Apodo</label>
                    <input type="text" class="form-control" name="apodo" id="apodo"
                    aria-describedby="helpId-apodo" placeholder="Ej: pepito21" required />
                    <small id="helpId-apodo" class="form-text text-info">Como la gente te va a llamar</small>
                </div>
                <br><br>
                
                
                <!-- Clave -->
                <div class="mb-1">
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

                <br><br>
                
                
                <?php /* <!-- Altcha -->
                <!-- <altcha-widget
                challengeurl="./challenge.php"
                ></altcha-widget>
                <br> --> */ ?>
                
                
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
        
        <br>
        
        <?php var_dump($_POST); ?>
        
        
        
        
        
    </div>
    <div class="col-md-4"></div>
</div>
</div>

<?php
pies();


} // endif