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
if (isset($_POST["correo-e"]) && isset($_POST["clave"]) && isset($_POST["clave-2"]) && isset($_POST["apodo"]) && isset($_POST['altcha'])) {
    $correo = $_POST["correo-e"]; $clave = $_POST["clave"]; $clave2 = $_POST["clave-2"]; $apodo = $_POST["apodo"]; $altcha = $_POST['altcha'];
    try {
        if (!altcha_es_valido($altcha)) {
            $saca_error = "Altcha inválido";
            throw new Exception("Altcha could not be verified");
        }
        if ($clave != $clave2) {
            $saca_error = "Las claves no coinciden. Inténtelo de nuevo";
            throw new Exception("Passwords don't match");
        }
        if (\preg_match('/[\x00-\x1f\x7f\/:\\\\]/', $apodo) != 0) {
            $saca_error = "El usuario contiene caracteres no válidos";
            throw new Exception("Not allowed characters");
        }
        $site_config = getSiteConfig();
        // var_dump($site_config);
        $userId = $auth->register($correo, $clave, $apodo, function ($selector, $token) {
            global $correo, $site_config;
            $hostname = $site_config['site_hostname'][0];
            $sitename = $site_config['site_name'][0];
            $url = 'https://'.$hostname.'/auth/activar.php?selector=' . \urlencode($selector) . '&token=' . \urlencode($token);
            $imgurl = "https://$hostname/favicon.png";
            sendmail(array($correo), "Activa tu cuenta de $sitename", "
<h1>$sitename – Activar cuenta</h1>
<p>Para activar tu cuenta, entra al enlace a continuación:</p>
<p><a href=\"$url\">$url</a></p>
<p>Si no pediste esto, haz caso omiso a este correo.</p>
<p><img src=\"$imgurl\" alt=\"Logotipo de $sitename\" width=\"100\" height=\"100\" /></p>
            ");
        });
        
        head();
        echo "<div class=\"container\">Bien, ahora revisa tu correo $correo para activar tu cuenta</div>";
        pies();
        die;

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
    } catch (Exception $exception) {
        if ($saca_error == "") {
            echo 'Error 500';
            throw $exception;
        }
    }

    head();
    alerta_error($saca_error, "registro.php");
    pies();


} else { // if (not registering)

    
    head();
    ?>

<script async defer src="../vendor/altcha-org/altcha/dist/altcha.js" type="module"></script>

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
                    <input type="email" class="form-control" name="correo-e" id="correo-e"
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
                    <input type="password" class="form-control" name="clave" id="clave"
                    aria-describedby="helpId-clave" placeholder="Clave..." required />
                    <small id="helpId-clave" class="form-text text-info">Esta será la clave de su cuenta. Asegúrese de que sea segura y utilice al menos 1 número, 1 letra mayúscula y 1 carácter especial</small>
                </div>
                <div class="mb-3">
                    <br>
                    <label for="clave-2" class="form-label">Nueva clave otra vez</label>
                    <input type="password" class="form-control" name="clave-2" id="clave-2"
                    aria-describedby="helpId-clave" placeholder="Clave..." required />
                    <small id="helpId-clave" class="form-text text-info">Escriba la clave de nuevo</small>
                </div>

                <br>
                
                <div class="d-flex justify-content-center">
                    <!-- Altcha -->
                    <altcha-widget challengeurl="./challenge.php?accion=challenge"></altcha-widget>
                </div>
                
                <br><br>
                
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
        
        <?php // var_dump($_POST); ?>
        
        
        
        
        
    </div>
    <div class="col-md-4"></div>
</div>
</div>

<?php
pies();


} // endif