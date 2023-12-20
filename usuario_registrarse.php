<?php
/*
 * File: <project root>/usuario_registrarse.php
 * Project: www
 * File Created: Wednesday, 20th December 2023 2:19:06 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */

require_once './include/auth.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])) {
    try {
        $userId = $auth->register($_POST['email'], $_POST['password'], $_POST['username'], function ($selector, $token) {
            echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
            echo '  For SMS, consider using a third-party service and a compatible SDK';
        });

        echo 'We have signed up a new user with the ID ' . $userId;
    } catch (\Delight\Auth\InvalidEmailException $e) {
        die('Invalid email address');
    } catch (\Delight\Auth\InvalidPasswordException $e) {
        die('Invalid password');
    } catch (\Delight\Auth\UserAlreadyExistsException $e) {
        die('User already exists');
    } catch (\Delight\Auth\TooManyRequestsException $e) {
        die('Too many requests');
    }
} else {
    ?>
    <p><h1>regístrate en el siguiente formulario</h1></p>
    <form action="." method="post">
        <?php /* T*T */ ?>
    </form>
    <?php
}
