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


echo "hola\n\n";


$ejemplo = $db->query("show databases;")->fetchAll();

var_dump($ejemplo);

try {
    $config = new \PHPAuth\Config($db);
    $auth   = new \PHPAuth\Auth($db, $config);
    if (!$auth->isLogged()) {
        header('HTTP/1.0 403 Forbidden');
        echo "Forbidden prro, qui no puedes entrar";
    
        exit();
    } else {
        echo 'logged :)';
    }
} catch (\Throwable $th) {
    throw $th;
}