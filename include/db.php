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



$db_connect = explode(" ", getenv('DB_CONNECT'));

$db;

try {
    $db = new PDO($db_connect[0], $db_connect[1], $db_connect[2]);
} catch (Throwable $e) {
    header('HTTP/1.1 500 Internal Server Error', true, 500);
    echo("Something happened when connecting to the database, please contact the administrator of the site.");
    throw ($e);
}



