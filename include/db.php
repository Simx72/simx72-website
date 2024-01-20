<?php 
/*
 * File: <project root>/include/db.php
 * Project: www
 * File Created: Wednesday, 20th December 2023 12:36:25 pm
 * Author: Simx72 (angel2600@proton.me)
 * -----
 * Copyright (C) 2023  Simx72
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



