<?php
/*
 * File: <project root>/usuario_ingresar.php
 * Project: www
 * File Created: Wednesday, 20th December 2023 2:20:05 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Copyright (C) 2023  Simx72
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 */

require_once './include/auth.php';

try {
    $auth->login($_POST['email'], $_POST['password']);

    echo 'User is logged in';
}
catch (\Delight\Auth\InvalidEmailException $e) {
    die('Wrong email address');
}
catch (\Delight\Auth\InvalidPasswordException $e) {
    die('Wrong password');
}
catch (\Delight\Auth\EmailNotVerifiedException $e) {
    die('Email not verified');
}
catch (\Delight\Auth\TooManyRequestsException $e) {
    die('Too many requests');
}


