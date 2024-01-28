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

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../include/db.php';

error_reporting(E_ALL);
ini_set('display_errors', 'On');

class AuthManager extends \PHPAuth\Auth
{
    function checkCaptcha(mixed $captcha) : bool
    {
        return true;
    }
}

$config = new \PHPAuth\Config($db);
$auth = new \PHPAuth\Auth($db, $config);